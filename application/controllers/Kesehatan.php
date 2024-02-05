<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesehatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kesehatan_model');
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

        $data['pertumbuhan'] = $this->Kesehatan_model->getAllPertumbuhan();
        $data['kode_pertumbuhan'] = $this->Kesehatan_model->getKodePertumbuhan();

        $data['perkembangan'] = $this->Kesehatan_model->getAllPerkembangan();
        $data['kode_perkembangan'] = $this->Kesehatan_model->getKodePerkembangan();

        $data['siswa'] = $this->Kesehatan_model->getAllSiswa();

        $data['judul'] = '[Guru] Catatan Kesehatan Siswa';
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/kesehatan/index', $data);
        $this->load->view('guru/templates/footer');
    }

    public function guru_tambah_pertumbuhan()
    {
        if (!$this->session->userdata('email_guru')) {
            redirect('authguru');
        }
        $data['login'] = $this->db->get_where('guru', [
            'nip' => $this->session->userdata('nip')
        ])->row_array();

        $nip = $this->session->userdata('nip');

        $data['judul'] = '[Guru] Tambah Data Pertumbuhan';

        $data['kode'] = $this->Kesehatan_model->getKodePertumbuhan();
        $data['siswa'] = $this->Kesehatan_model->getAllSiswa();

        $this->form_validation->set_rules('tgl_input', 'tanggal', 'required');
        $this->form_validation->set_rules('tinggi_badan_siswa', 'tinggi badan', 'required');
        $this->form_validation->set_rules('berat_badan_siswa', 'berat badan', 'required');
        $this->form_validation->set_rules('lingkar_kepala_siswa', 'lingkar kepala', 'required');
        $this->form_validation->set_rules('ket_kesehatan_siswa', 'keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('guru/templates/header', $data);
            $this->load->view('guru/kesehatan/tambah_pertumbuhan', $data);
            $this->load->view('guru/templates/footer');
        } else {
            $this->Kesehatan_model->tambahPertumbuhan();
            $this->session->set_flashdata('flash', 'menyimpan data kesehatan');
            redirect('Kesehatan/guru_index');
        }   
    }

    public function guru_edit_pertumbuhan($kode_pertumbuhan)
    {
     if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['judul'] = '[Guru] Edit Data Pertumbuhan';
    $data['pertumbuhan'] = $this->Kesehatan_model->getPertumbuhanByKode($kode_pertumbuhan);

    $this->form_validation->set_rules('tinggi_badan_siswa', 'tinggi badan', 'required');
    $this->form_validation->set_rules('berat_badan_siswa', 'berat badan', 'required');
    $this->form_validation->set_rules('lingkar_kepala_siswa', 'lingkar kepala', 'required');
    $this->form_validation->set_rules('ket_kesehatan_siswa', 'keterangan', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('guru/templates/header', $data);
        $this->load->view('guru/kesehatan/edit_pertumbuhan', $data);
        $this->load->view('guru/templates/footer');
    } else {
        $this->Kesehatan_model->editPertumbuhan();
        $this->session->set_flashdata('flash', 'memperbarui data pertumbuhan');
        redirect('kesehatan/guru_index');
    }   
}

public function guru_detail_pertumbuhan($kode_pertumbuhan)
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['judul'] = '[Guru] Rincian Pertumbuhan Siswa';
    $data['pertumbuhan'] = $this->Kesehatan_model->getPertumbuhanByKode($kode_pertumbuhan);
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/detail_pertumbuhan', $data);
    $this->load->view('guru/templates/footer');
}

public function cetak_pertumbuhan()
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['pertumbuhan'] = $this->Kesehatan_model->getPertumbuhanByNip($nip);

    $data['judul'] = '[Guru] Cetak Data Pertumbuhan Siswa';
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/cetak_pertumbuhan', $data);
}

    // ------------------------------------------------------------------------------------

public function guru_detail_perkembangan($kode_pemeriksaan)
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['judul'] = '[Guru] Perkembangan Siswa';
    $data['perkembangan'] = $this->Kesehatan_model->getPerkembanganByKode($kode_pemeriksaan);
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/detail_perkembangan', $data);
    $this->load->view('guru/templates/footer');
}    

public function guru_tambah_perkembangan()
{
 if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');

$data['judul'] = '[Guru] Tambah Data Perkembangan';

$data['kode'] = $this->Kesehatan_model->getKodePerkembangan();
$data['siswa'] = $this->Kesehatan_model->getAllSiswa();

$this->form_validation->set_rules('tgl_pemeriksaan', 'tanggal', 'required');
$this->form_validation->set_rules('semester', 'semester', 'required');
$this->form_validation->set_rules('usia_pemeriksaan', 'usia', 'required');
$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'required');
$this->form_validation->set_rules('berat_badan', 'berat badan', 'required');
$this->form_validation->set_rules('lingkar_kepala', 'lingkar kepala', 'required');
$this->form_validation->set_rules('daya_lihat', 'daya lihat', 'required');
$this->form_validation->set_rules('daya_dengar', 'daya dengar', 'required');
$this->form_validation->set_rules('ket_kuku', 'keterangan kuku', 'required');
$this->form_validation->set_rules('ket_rambut', 'keterangan rambut', 'required');
$this->form_validation->set_rules('ket_gigi', 'keterangan gigi', 'required');
$this->form_validation->set_rules('perkembangan_anak', 'catatan', 'required');


if ($this->form_validation->run() == FALSE) {
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/tambah_perkembangan', $data);
    $this->load->view('guru/templates/footer');
} else {
    $this->Kesehatan_model->tambahPerkembangan();
    $this->session->set_flashdata('flash', 'menyimpan data kesehatan');
    redirect('Kesehatan/guru_index');
}   
}

public function guru_edit_perkembangan($kode_pemeriksaan)
{
 if (!$this->session->userdata('email_guru')) {
    redirect('authguru');
}
$data['login'] = $this->db->get_where('guru', [
    'nip' => $this->session->userdata('nip')
])->row_array();

$nip = $this->session->userdata('nip');

$data['judul'] = '[Guru] Edit Data Perkembangan';

$data['perkembangan'] = $this->Kesehatan_model->getPerkembanganByKode($kode_pemeriksaan);

$this->form_validation->set_rules('semester', 'semester', 'required');
$this->form_validation->set_rules('usia_pemeriksaan', 'usia', 'required');
$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'required');
$this->form_validation->set_rules('berat_badan', 'berat badan', 'required');
$this->form_validation->set_rules('lingkar_kepala', 'lingkar kepala', 'required');
$this->form_validation->set_rules('daya_lihat', 'daya lihat', 'required');
$this->form_validation->set_rules('daya_dengar', 'daya dengar', 'required');
$this->form_validation->set_rules('ket_kuku', 'keterangan kuku', 'required');
$this->form_validation->set_rules('ket_rambut', 'keterangan rambut', 'required');
$this->form_validation->set_rules('ket_gigi', 'keterangan gigi', 'required');
$this->form_validation->set_rules('perkembangan_anak', 'catatan', 'required');

if ($this->form_validation->run() == FALSE) {
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/edit_perkembangan', $data);
    $this->load->view('guru/templates/footer');
} else {
    $this->Kesehatan_model->editPerkembangan();
    $this->session->set_flashdata('flash', 'memperbarui data pertumbuhan');
    redirect('kesehatan/guru_index');
}   
}

public function cetak_perkembangan()
{
    if (!$this->session->userdata('email_guru')) {
        redirect('authguru');
    }
    $data['login'] = $this->db->get_where('guru', [
        'nip' => $this->session->userdata('nip')
    ])->row_array();

    $nip = $this->session->userdata('nip');

    $data['perkembangan'] = $this->Kesehatan_model->getPerkembanganByNip($nip);

    $data['judul'] = '[Guru] Cetak Data Perkembangan Siswa';
    $this->load->view('guru/templates/header', $data);
    $this->load->view('guru/kesehatan/cetak_perkembangan', $data);
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

    $data['pertumbuhan'] = $this->Kesehatan_model->getPertumbuhanByNis($nis);
    $data['kode_pertumbuhan'] = $this->Kesehatan_model->getKodePertumbuhan();

    $data['perkembangan'] = $this->Kesehatan_model->getPerkembanganByNis($nis);
    $data['kode_perkembangan'] = $this->Kesehatan_model->getKodePerkembangan();

    $data['judul'] = 'Catatan Kesehatan';
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/kesehatan/index', $data);
    $this->load->view('user/templates/footer');
}

public function user_detail_pertumbuhan($kode_pertumbuhan)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $data['judul'] = 'Rincian Pertumbuhan Siswa';
    $data['pertumbuhan'] = $this->Kesehatan_model->getPertumbuhanByKode($kode_pertumbuhan);
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/kesehatan/detail_pertumbuhan', $data);
    $this->load->view('user/templates/footer');
}

public function user_detail_perkembangan($kode_pemeriksaan)
{
    if (!$this->session->userdata('email_orang_tua')) {
        redirect('auth');
    }
    $data['login'] = $this->db->get_where('siswa', [
        'nis' => $this->session->userdata('nis')
    ])->row_array();

    $nis = $this->session->userdata('nis');

    $data['judul'] = 'Rincian Perkembangan Siswa';
    $data['perkembangan'] = $this->Kesehatan_model->getPerkembanganByKode($kode_pemeriksaan);
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/kesehatan/detail_perkembangan', $data);
    $this->load->view('user/templates/footer');
}
}
