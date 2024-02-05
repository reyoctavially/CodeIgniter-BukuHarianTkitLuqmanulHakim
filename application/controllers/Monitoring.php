<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
    public function __construct()
    {
     parent::__construct();
     $this->load->model('Monitoring_model');
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
    
    $data['monitoring'] = $this->Monitoring_model->getAllMonitoring();
    $data['kode'] = $this->Monitoring_model->getKodeMonitoring();
    $data['siswa'] = $this->Monitoring_model->getAllSiswa();

    $data['judul'] = '[Guru] Monitoring Pembelajaran AlQuran';
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/monitoringalquran/index', $data);
    $this->load->view('guru/templates/footer');
}

public function guru_lihat_nilai()
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $data['judul'] = '[Guru] Daftar Konversi Nilai';
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/monitoringalquran/nilai', $data);
    $this->load->view('guru/templates/footer');
}

public function guru_detail($kode_pembelajaran_alquran)
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['judul'] = '[Guru] Rincian Monitoring Al-Quran';
    $data['monitoring'] = $this->Monitoring_model->getMonitoringByKode($kode_pembelajaran_alquran);
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/monitoringalquran/detail', $data);
    $this->load->view('guru/templates/footer');
}

public function guru_tambah()
{
 if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');

$data['judul'] = '[Guru] Tambah Monitoring Al-Quran';
$data['siswa'] = $this->Monitoring_model->getAllSiswa();
$data['kode'] = $this->Monitoring_model->getKodeMonitoring();
$data['nilai'] = ['A+', 'A', 'B+', 'B', 'B-', 'C+', 'C'];

$this->form_validation->set_rules('tgl_belajar', 'tanggal', 'required');
$this->form_validation->set_rules('hafalan_surat', 'hafalan', 'required');
$this->form_validation->set_rules('murajaah_hafalan', 'murajaah', 'required');
$this->form_validation->set_rules('ummi_jilid', 'jilid', 'required');
$this->form_validation->set_rules('ummi_halaman', 'halaman', 'required');
$this->form_validation->set_rules('keterangan', 'keterangan', 'required');


if ($this->form_validation->run() == FALSE) {
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/monitoringalquran/tambah', $data);
    $this->load->view('guru/templates/footer');
} else {
    $this->Monitoring_model->tambahMonitoring();
    $this->session->set_flashdata('flash', 'menyimpan data monitoring');
    redirect('Monitoring/guru_index');
} 

}

public function guru_edit($kode_pembelajaran_alquran)
{
   if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');

$data['judul'] = '[Guru] Edit Monitoring Al-Quran';
$data['monitoring'] = $this->Monitoring_model->getMonitoringByKode($kode_pembelajaran_alquran);
$data['nilai'] = $this->Monitoring_model->getNilai();

$this->form_validation->set_rules('hafalan_surat', 'hafalan', 'required');
$this->form_validation->set_rules('murajaah_hafalan', 'murajaah', 'required');
$this->form_validation->set_rules('ummi_jilid', 'jilid', 'required');
$this->form_validation->set_rules('ummi_halaman', 'halaman', 'required');
$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

if ($this->form_validation->run() == FALSE) {
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/monitoringalquran/edit', $data);
    $this->load->view('guru/templates/footer');
} else {
    $this->Monitoring_model->editDataMonitoring();
    $this->session->set_flashdata('flash', 'memperbarui monitoring');
    redirect('Monitoring/guru_index');
}   
}

public function cetak()
{
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

$data['judul'] = '[Guru] Cetak Data Monitoring Al-Quran';
$data['monitoring'] = $this->Monitoring_model->cetakMonitoringByNis($nis, $awal, $akhir);
$this->load->view('guru/templates/header', $data);
$this->load->view('guru/monitoringalquran/cetak', $data);
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
    $data['monitoring'] = $this->Monitoring_model->getMonitoringByNis($nis);
    $data['kode'] = $this->Monitoring_model->getKodeMonitoring();

    $data['judul'] = 'Monitoring Pembelajaran Al-Quran';
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/monitoringalquran/index', $data);
    $this->load->view('user/templates/footer');
}

public function lihat_nilai()
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $data['judul'] = 'Daftar Konversi Nilai';
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/monitoringalquran/nilai', $data);
    $this->load->view('user/templates/footer');
}

public function user_detail($kode_pembelajaran_alquran)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $data['judul'] = 'Rincian Monitoring Al-Quran';
    $data['monitoring'] = $this->Monitoring_model->getMonitoringByKode($kode_pembelajaran_alquran);
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/monitoringalquran/detail', $data);
    $this->load->view('user/templates/footer');
}
public function user_check($kode_pembelajaran_alquran)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $this->Monitoring_model->checkMonitoring($kode_pembelajaran_alquran);
    redirect('Monitoring/user_index');
}
}
