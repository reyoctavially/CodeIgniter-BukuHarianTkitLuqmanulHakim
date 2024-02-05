<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->model('Upload_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email_guru')) {
            redirect('guru');
        }
    }
    public function index()
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Data Guru';
        $data['guru'] = $this->Guru_model->getAllGuru();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/home/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function upload_jadwal_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload Jadwal';
        $data['files'] = $this->Upload_model->getAllFileJadwal();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/jadwal/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function upload_doa_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload Doa & Hadits';
        $data['files1'] = $this->Upload_model->getFileDoaByKode(24);
        $data['files2'] = $this->Upload_model->getFileDoaByKode(25);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/doa/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function upload_kurikulum_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload Kurikulum Yayasan';
        $data['files'] = $this->Upload_model->getAllFileKurikulum();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kurikulum/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function tambah()
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Tambah Data Guru';
        $data['status'] = ['Aktif', 'Nonaktif'];
        $this->form_validation->set_rules('nip', 'nomor induk pegawai', 'required|trim');
        $this->form_validation->set_rules('nama_guru', 'nama guru', 'required|trim');
        $this->form_validation->set_rules('telp_guru', 'telepon', 'required|trim');
        $this->form_validation->set_rules('email_guru', 'email', 'required|trim|valid_email|is_unique[guru.email_guru]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('pass_guru', 'password', 'required|trim|min_length[6]|matches[pass_guru2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('pass_guru2', 'password', 'required|trim|matches[pass_guru]');
        $this->form_validation->set_rules('jalan_guru', 'jalan', 'required|trim');
        $this->form_validation->set_rules('rt_guru', 'rt', 'required|trim');
        $this->form_validation->set_rules('rw_guru', 'rw', 'required|trim');
        $this->form_validation->set_rules('no_rumah_guru', 'nomor rumah', 'required|trim');
        $this->form_validation->set_rules('kec_guru', 'kecamatan', 'required|trim');
        $this->form_validation->set_rules('kab_guru', 'kabupaten/kota', 'required|trim');
        $this->form_validation->set_rules('kode_pos_guru', 'kode_pos', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/home/tambah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Guru_model->tambahDataGuru();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('adminpanel');
        }
    }

    public function edit($nip)
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Edit Data Guru';
        $data['guru'] = $this->Guru_model->getGuruByNip($nip);
        $data['status'] = ['Aktif', 'Nonaktif'];

        $this->form_validation->set_rules('nip', 'nomor induk pegawai', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/home/edit', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $this->Guru_model->editDataGuru();
            $this->session->set_flashdata('flash2', 'diubah');
            redirect('adminpanel');
        }
    }

    public function hapus($nip)
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $this->Guru_model->hapusDataGuru($nip);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('adminpanel');
    }

    public function detail($nip)
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Rincian Data Guru';
        $data['guru'] = $this->Guru_model->getGuruByNip($nip);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/home/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    public function cetak()
    {
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Cetak Data Guru';
        $data['guru'] = $this->Guru_model->getAllGuru();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/home/cetak', $data);
    }

    //------------------- Upload File Jadwal -------------------------
    public function editFileJadwal()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload File Jadwal Baru';
        $data['files'] = $this->Upload_model->getFileJadwalByKode(23);
        $kode_file_inside = 23;

        $this->form_validation->set_rules('kode_file', 'kode file', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/jadwal/edit', $data);
            $this->load->view('admin/templates/footer');
        } else {
            //cek jika ada file yang di upload
            $upload_file = $_FILES['nama_file']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/documents/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('nama_file')) {
                    $old_file = $data['files']['nama_file'];
                    if ($old_file != 'jadwalkbm.pdf') {
                        unlink(FCPATH . 'assets/documents/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $new_file);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->db->where('kode_file', $kode_file_inside);
            $this->db->update('file_jadwal');

            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('adminpanel/upload_jadwal_index');
        }
    }

    public function detailFileJadwal($kode_file)
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Lihat File Jadwal';
        $data['files'] = $this->Upload_model->getFileJadwalByKode($kode_file);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/jadwal/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    //------------------- Upload File doa hadits -------------------------
    public function editFileDoaKelompokA()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload File Doa & Hadits Baru';
        $data['files1'] = $this->Upload_model->getFileDoaByKode(24);
        $kode_file_inside = 24;

        $this->form_validation->set_rules('kode_file', 'kode file', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/doa/edit', $data);
            $this->load->view('admin/templates/footer');
        } else {
            //cek jika ada file yang di upload
            $upload_file = $_FILES['nama_file']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/documents/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '12288';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('nama_file')) {
                    $old_file = $data['files1']['nama_file'];
                    if ($old_file != 'Hadist dan Doa kelas A Sem 1.pdf') {
                        unlink(FCPATH . 'assets/documents/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $new_file);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->db->where('kode_file', $kode_file_inside);
            $this->db->update('file_doa');

            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('adminpanel/upload_doa_index');
        }
    }

    public function editFileDoaKelompokB()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload File Doa & Hadits Baru';
        $data['files2'] = $this->Upload_model->getFileDoaByKode(25);
        $kode_file_inside = 25;

        $this->form_validation->set_rules('kode_file', 'kode file', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/doa/editalt', $data);
            $this->load->view('admin/templates/footer');
        } else {
            //cek jika ada file yang di upload
            $upload_file = $_FILES['nama_file']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/documents/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '12288';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('nama_file')) {
                    $old_file = $data['files2']['nama_file'];
                    if ($old_file != 'Hadist dan Doa kelas B Sem 1.pdf') {
                        unlink(FCPATH . 'assets/documents/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $new_file);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->db->where('kode_file', $kode_file_inside);
            $this->db->update('file_doa');

            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('adminpanel/upload_doa_index');
        }
    }

    public function detailFileDoa($kode_file)
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Lihat File Doa & Hadits';
        $data['files'] = $this->Upload_model->getFileDoaByKode($kode_file);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/doa/detail', $data);
        $this->load->view('admin/templates/footer');
    }

    //------------------- Upload File kurikulum -------------------------
    public function editFileKurikulum()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Upload File kurikulum Baru';
        $data['files'] = $this->Upload_model->getFileKurikulumByKode(26);
        $kode_file_inside = 26;

        $this->form_validation->set_rules('kode_file', 'kode file', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/kurikulum/edit', $data);
            $this->load->view('admin/templates/footer');
        } else {
            //cek jika ada file yang di upload
            $upload_file = $_FILES['nama_file']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/documents/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('nama_file')) {
                    $old_file = $data['files']['nama_file'];
                    if ($old_file != 'Materi Kurikulum Yayasan.pdf') {
                        unlink(FCPATH . 'assets/documents/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $new_file);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->db->where('kode_file', $kode_file_inside);
            $this->db->update('file_kurikulum');

            $this->session->set_flashdata('flash', 'diperbarui');
            redirect('adminpanel/upload_kurikulum_index');
        }
    }

    public function detailFileKurikulum($kode_file)
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('admin');
        }
        $data['login'] = $this->db->get_where('admin', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[admin] Lihat File kurikulum';
        $data['files'] = $this->Upload_model->getFileKurikulumByKode($kode_file);
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kurikulum/detail', $data);
        $this->load->view('admin/templates/footer');
    }
}
