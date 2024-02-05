<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email_orang_tua', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass_orang_tua', 'password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('user/templates/auth_header', $data);
			$this->load->view('user/auth/login', $data);
			$this->load->view('user/templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email_orang_tua = $this->input->post('email_orang_tua');
		$pass_orang_tua = $this->input->post('pass_orang_tua');

		$siswa = $this->db->get_where('siswa', ['email_orang_tua' => $email_orang_tua])->row_array();
		if ($siswa) {
			if ($siswa['is_active'] == 1) {
				if ($siswa['status_siswa'] == "Nonaktif") {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, anda tidak dapat login!</div');
					redirect('auth');
				} else {
					if (password_verify($pass_orang_tua, $siswa['pass_orang_tua'])) {
						$data = [
							'nis' => $siswa['nis'],
							'email_orang_tua' => $siswa['email_orang_tua']
						];
						$this->session->set_userdata($data);
						redirect('home/user_index');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, password salah!</div');
						redirect('auth');
					}
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum melakukan aktivasi!</div');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, email tersebut belum terdaftar!</div');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('email_orang_tua');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terimakasih, Anda telah berhasil logout!</div');
		redirect('auth');
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('siswa', ['email_orang_tua' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email_orang_tua', $email);
					$this->db->update('siswa');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' berhasil di aktivasi, silahkan login!</div');
					redirect('auth');
				} else {
					$this->db->delete('siswa', ['email_orang_tua' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token sudah tidak berlaku.</div');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! token tidak valid.</div');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal aktivasi akun! email salah.</div');
			redirect('auth');
		}
	}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email_orang_tua', 'email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Lupa Kata Sandi';
			$this->load->view('user/templates/auth_header', $data);
			$this->load->view('user/auth/forgotPassword', $data);
			$this->load->view('user/templates/auth_footer');
		} else {
			$email = $this->input->post('email_orang_tua');
			$user = $this->db->get_where('siswa', ['email_orang_tua' => $email, 'is_active' => 1])->row_array();
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
				redirect('auth/forgotPassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum aktivasi!</div');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('siswa', ['email_orang_tua' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! token tidak valid.</div');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal reset kata sandi! email tidak terdaftar</div');
			redirect('auth');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Reset Kata Sandi';
			$this->load->view('user/templates/auth_header', $data);
			$this->load->view('user/auth/changePassword', $data);
			$this->load->view('user/templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('sandi_baru'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('pass_orang_tua', $password);
			$this->db->where('email_orang_tua', $email);
			$this->db->update('siswa');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata sandi telah diganti! silahkan login</div');
			redirect('auth');
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
			$this->email->message('Klik tautan ini untuk verifikasi akun anda : ' . base_url() . 'auth/verify?email=' . $this->input->post('email_orang_tua') . '&token=' . urlencode($token) . '');
		} else if ($type == "forgot") {
			$this->email->subject('Reset kata sandi');
			$this->email->message('Klik tautan ini untuk reset kata sandi anda : ' . base_url() . 'auth/reset?email=' . $this->input->post('email_orang_tua') . '&token=' . urlencode($token) . '');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}
}
