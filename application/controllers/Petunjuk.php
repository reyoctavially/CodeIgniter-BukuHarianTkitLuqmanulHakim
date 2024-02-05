<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petunjuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function guru_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $data['judul'] = '[Guru] Petunjuk Pengisian dan Tata Tertib | YAYASAN LUQMANUL HAKIM';
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/petunjuk/index', $data);
        $this->load->view('guru/templates/footer');
    }

    // ------------------------------------------------------------------------------------

    public function user_index()
    {
        if (!$this->session->userdata('email_orang_tua')) {
            redirect('auth');
        }
        $data['login'] = $this->db->get_where('orang_tua_siswa', [
            'no_ktp_orang_tua' => $this->session->userdata('no_ktp_orang_tua')
        ])->row_array();

        $data['judul'] = 'Petunjuk Pengisian dan Tata Tertib | YAYASAN LUQMANUL HAKIM';
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/petunjuk/index', $data);
        $this->load->view('user/templates/footer');
    }
}
