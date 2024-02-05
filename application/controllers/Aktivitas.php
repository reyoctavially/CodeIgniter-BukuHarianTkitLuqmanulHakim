<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Aktivitas_model');
        $this->load->library('form_validation');
    }

    public function guru_index()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $nip = $this->session->userdata('nip');
        $data['aktivitas'] = $this->Aktivitas_model->getAllAktivitas();
        $data['kode'] = $this->Aktivitas_model->getKodeAktivitas();
        $data['siswa'] = $this->Aktivitas_model->getAllSiswa();

        $data['judul'] = '[Guru] Catatan Aktivitas Siswa';
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/aktivitas/index', $data);
        $this->load->view('guru/templates/footer');
    }

    public function guru_detail($kode_aktivitas)
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $nip = $this->session->userdata('nip');

        $data['judul'] = '[Guru] Rincian Aktivitas Siswa';
        $data['aktivitas'] = $this->Aktivitas_model->getAktivitasByKode($kode_aktivitas);
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/aktivitas/detail', $data);
        $this->load->view('guru/templates/footer');
    }

    public function cetak(){
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $nip = $this->session->userdata('nip');

        $nis = $this->input->post('nis');
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');

        $data['judul'] = '[Guru] Cetak Catatan Aktivitas Siswa';
        $data['aktivitas'] = $this->Aktivitas_model->cetakAktivitasByNis($nis, $awal, $akhir);
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/aktivitas/cetak', $data);
    }

    public function catatan($kode_aktivitas)
    {
       if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['judul'] = '[Guru] Tambah Catatan Aktivitas Siswa';
    $data['aktivitas'] = $this->Aktivitas_model->getAktivitasByKode($kode_aktivitas);

    $this->form_validation->set_rules('catatan_guru', 'catatan kegiatan', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/aktivitas/catatan', $data);
        $this->load->view('guru/templates/footer');
    } else {
        $this->Aktivitas_model->catatDataAktivitas();
        $this->session->set_flashdata('flash', 'menyimpan catatan aktivitas');
        redirect('Aktivitas/guru_index');
    }   
}

public function edit_catatan($kode_aktivitas)
{
   if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');

$data['judul'] = '[Guru] Tambah Catatan Aktivitas Siswa';
$data['aktivitas'] = $this->Aktivitas_model->getAktivitasByKode($kode_aktivitas);

$this->form_validation->set_rules('catatan_guru', 'catatan kegiatan', 'required');

if ($this->form_validation->run() == FALSE) {
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/aktivitas/edit', $data);
    $this->load->view('guru/templates/footer');
} else {
    $this->Aktivitas_model->catatDataAktivitas();
    $this->session->set_flashdata('flash', 'menyimpan catatan aktivitas');
    redirect('Aktivitas/guru_index');
}   
}

public function guru_check($kode_aktivitas_siswa)
{
 if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');


$this->Aktivitas_model->checkAktivitas($kode_aktivitas_siswa);
redirect('Aktivitas/guru_index');
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

    $data['aktivitas'] = $this->Aktivitas_model->getAktivitasByNis($nis);
    $data['kode'] = $this->Aktivitas_model->getKodeAktivitas();

    $data['judul'] = 'Catatan Aktivitas Siswa';
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/aktivitas/index', $data);
    $this->load->view('user/templates/footer');
}

public function user_detail($kode_aktivitas)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $data['judul'] = 'Rincian Aktivitas Siswa';
    $data['aktivitas'] = $this->Aktivitas_model->getAktivitasByKode($kode_aktivitas);
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/aktivitas/detail', $data);
    $this->load->view('user/templates/footer');
}

public function user_tambah()
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $data['judul'] = 'Tambah Aktivitas Siswa';

    $get = $this->Aktivitas_model->getAktivitas($nis);
    $data['kode'] = $this->Aktivitas_model->getKodeAktivitas();
    $data['aktivitas'] = $this->Aktivitas_model->getSiswaByKode($nis);

    $this->form_validation->set_rules('tgl_aktivitas', 'tanggal', 'required');
    $this->form_validation->set_rules('jam_bangun', 'jam bangun', 'required');
    $this->form_validation->set_rules('jam_tidur', 'jam tidur', 'required');
    $this->form_validation->set_rules('catatan_kegiatan', 'catatan kegiatan', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/aktivitas/tambah', $data);
        $this->load->view('user/templates/footer');
    } else {
        if ($get != false) {
            $this->session->set_flashdata('flash2', 'input aktivitas pada hari tersebut');
            redirect('Aktivitas/user_index');
        } else {
            $this->Aktivitas_model->tambahAktivitas();
            $this->session->set_flashdata('flash', 'menyimpan aktivitas');
            redirect('Aktivitas/user_index');
        }
    }   
}

public function user_edit($kode_aktivitas)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $data['judul'] = 'Edit Aktivitas Siswa';
    $data['aktivitas'] = $this->Aktivitas_model->getAktivitasByKode($kode_aktivitas);

    $this->form_validation->set_rules('jam_bangun', 'jam bangun', 'required');
    $this->form_validation->set_rules('jam_tidur', 'jam tidur', 'required');
    $this->form_validation->set_rules('catatan_kegiatan', 'catatan kegiatan', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/templates/header', $data);
        $this->load->view('user/aktivitas/edit', $data);
        $this->load->view('user/templates/footer');
    } else {
        $this->Aktivitas_model->editDataAktivitas();
        $this->session->set_flashdata('flash', 'memperbarui aktivitas');
        redirect('Aktivitas/user_index');
    }   
}
}
