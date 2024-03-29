<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Upload_model');
    }

    public function guru_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[Guru] Jadwal Kegiatan Belajar Mengajar | YAYASAN LUQMANUL HAKIM';
        $data['files'] = $this->Upload_model->getFileJadwalByKode(23);
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/jadwalkbm/index', $data);
        $this->load->view('guru/templates/footer');
    }

    // ------------------------------------------------------------------------------------

    public function user_index()
    {
        if (!$this->session->userdata('email_orang_tua')) {
            redirect('auth');
        }
        $data['login'] = $this->db->get_where('siswa', [
            'nis' => $this->session->userdata('nis')
        ])->row_array();

        $nis = $this->session->userdata('nis');

        $data['judul'] = 'Jadwal Kegiatan Belajar Mengajar | YAYASAN LUQMANUL HAKIM';
        $data['files'] = $this->Upload_model->getFileJadwalByKode(23);
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/jadwalkbm/index', $data);
        $this->load->view('user/templates/footer');
    }
}
