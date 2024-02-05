<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->library('form_validation');
		if (!$this->session->userdata('email_guru')) {
			redirect('guru');
		}
	}
	public function index()
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $data['login']['nip'];

		$data['judul'] = '[Guru] Data Siswa';
		$data['angkatan'] = $this->Siswa_model->getAngkatan();
		$data['siswa'] = $this->Siswa_model->getAllSiswa();
		$this->load->view('guru/templates/header', $data);
		$this->load->view('guru/siswa/index', $data);
		$this->load->view('guru/templates/footer');
	}

	public function tambah()
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $data['login']['nip'];

		$data['judul'] = '[Guru] Tambah Data Siswa';
		$data['siswa'] = $this->Siswa_model->getNisSiswa();
		$data['guru'] = $this->Siswa_model->getGuruNip($nip);
		$data['angkatan'] = $this->Siswa_model->getAngkatan();
		$data['status'] = ['Aktif', 'Nonaktif'];
		$this->form_validation->set_rules('nis', 'nis', 'required|trim');
		$this->form_validation->set_rules('nisn', 'nisn', 'required|trim');
		$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required|trim');
		$this->form_validation->set_rules('nama_panggilan_siswa', 'nama panggilan', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir_siswa', 'tempat lahir', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir_siswa', 'tanggal lahir', 'required|trim');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'required|trim');
		$this->form_validation->set_rules('telp_ayah', 'telepon ayah', 'required|trim');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'required|trim');
		$this->form_validation->set_rules('telp_ibu', 'telepon ibu', 'required|trim');
		$this->form_validation->set_rules('email_orang_tua', 'email', 'required|trim|valid_email|is_unique[siswa.email_orang_tua]',[
			'is_unique' => 'This email hash already registered!'
		]);
		$this->form_validation->set_rules('pass_orang_tua', 'password', 'required|trim|min_length[6]|matches[pass_orang_tua2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('pass_orang_tua2', 'password', 'required|trim|matches[pass_orang_tua]');
		$this->form_validation->set_rules('jalan_orang_tua', 'jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_orang_tua', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_orang_tua', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_orang_tua', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_orang_tua', 'kecamatan', 'required|trim');
		$this->form_validation->set_rules('kab_orang_tua', 'kabupaten/kota', 'required|trim');
		$this->form_validation->set_rules('kode_pos_orang_tua', 'kode_pos', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('guru/templates/header', $data);
			$this->load->view('guru/siswa/tambah', $data);
			$this->load->view('guru/templates/footer');
		} else {
			$this->Siswa_model->tambahDataSiswa();
			$this->session->set_flashdata('flash', 'ditambahkan');
			redirect('siswa');
		}	
	}

	public function edit($nis)
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$data['judul'] = '[Guru] Edit Data Siswa';
		$data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
		$data['guru'] = $this->Siswa_model->getguru();
		$data['status'] = ['Aktif', 'Nonaktif'];
		$data['angkatan'] = $this->Siswa_model->getAngkatan();

		$this->form_validation->set_rules('nis', 'nomor induk siswa', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('guru/templates/header', $data);
			$this->load->view('guru/siswa/edit', $data);
			$this->load->view('guru/templates/footer');
		} else {
			$this->Siswa_model->editDataSiswa();
			$this->session->set_flashdata('flash2', 'diubah');
			redirect('siswa');
		}	
	}

	public function hapus($nis)
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$this->Siswa_model->hapusDataSiswa($nis);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('siswa');
	}

	public function detail($nis)
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$data['judul'] = '[Guru] Rincian Data Siswa';
		$data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
		$this->load->view('guru/templates/header', $data);
		$this->load->view('guru/siswa/detail', $data);
		$this->load->view('guru/templates/footer');
	}

	public function cetak()
	{
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $data['login']['nip'];
		
		$data['judul'] = '[Guru] Cetak Data Siswa';

		$angkatan = $this->input->post('angkatan');
		$data['siswa'] = $this->Siswa_model->cetakSiswa($angkatan);
		$this->load->view('guru/templates/header', $data);
		$this->load->view('guru/siswa/cetak', $data);
	}
}