<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email_guru', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass_guru', 'password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = '[Guru] Halaman Login';
            $this->load->view('guru/templates/auth_header', $data);
            $this->load->view('guru/auth/login', $data);
            $this->load->view('guru/templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email_guru = $this->input->post('email_guru');
        $pass_guru = $this->input->post('pass_guru');

        $guru = $this->db->get_where('guru', ['email_guru' => $email_guru])->row_array();
        if ($guru) {
            if ($guru['is_active'] == 1) {
                if ($guru['status_guru'] == "Nonaktif") {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, anda tidak dapat bisa login!</div');
                    redirect('guru');
                } else {
                    if (password_verify($pass_guru, $guru['pass_guru'])) {
                        $data = [
                            'nip' => $guru['nip'],
                            'email_guru' => $guru['email_guru']
                        ];
                        $this->session->set_userdata($data);
                        redirect('home/guru_index');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, password salah!</div');
                        redirect('guru');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum melakukan aktivasi!</div');
                redirect('guru');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum terdaftar!</div');
            redirect('guru');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('email_guru');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih, Anda telah berhasil logout!</div');
        redirect('guru');
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('guru', ['email_guru' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email_guru', $email);
                    $this->db->update('guru');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' berhasil di aktivasi, silahkan login!</div');
                    redirect('guru');
                } else {
                    $this->db->delete('guru', ['email_guru' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token sudah tidak berlaku.</div');
                    redirect('guru');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token tidak valid.</div');
                redirect('guru');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! email salah.</div');
            redirect('guru');
        }
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email_guru', 'email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['judul'] = '[Guru] Halaman Lupa Kata Sandi';
            $this->load->view('guru/templates/auth_header', $data);
            $this->load->view('guru/auth/forgotPassword', $data);
            $this->load->view('guru/templates/auth_footer');
        } else {
            $email = $this->input->post('email_guru');
            $user = $this->db->get_where('guru', ['email_guru' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tolong cek email untuk reset kata sandi anda!</div');
                redirect('guru/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum aktivasi!</div');
                redirect('guru/forgotPassword');
            }
        }
    }

    public function reset()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('guru', ['email_guru' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! token tidak valid.</div');
                redirect('guru');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! email tidak terdaftar</div');
            redirect('guru');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('guru');
        }
        $this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
        $this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');
        if ($this->form_validation->run() == false) {
            $data['judul'] = '[Guru] Halaman Reset Kata Sandi';
            $this->load->view('guru/templates/auth_header', $data);
            $this->load->view('guru/auth/changePassword', $data);
            $this->load->view('guru/templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('sandi_baru'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('pass_guru', $password);
            $this->db->where('email_guru', $email);
            $this->db->update('guru');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi telah diganti! silahkan login</div');
            redirect('guru');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bukupenghubung096@gmail.com',
            'smtp_pass' => '@Aquila1998',
            'smtp_port' => 465,
            'meiltype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('bukupenghubung096@gmail.com', 'TK Islam Terpadu Luqmanul Hakim');
        $this->email->to($this->input->post('email_orang_tua', true));

        if ($type == "verify") {
            $this->email->subject('Aktivasi Akun Orang Tua');
            $this->email->message('Klik tautan ini untuk verifikasi akun anda : ' . base_url() . 'guru/verify?email=' . $this->input->post('email_guru') . '&token=' . urlencode($token) . '');
        } else if ($type == "forgot") {
            $this->email->subject('Reset kata sandi');
            $this->email->message('Klik tautan ini untuk reset kata sandi anda : ' . base_url() . 'guru/reset?email=' . $this->input->post('email_guru') . '&token=' . urlencode($token) . '');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
