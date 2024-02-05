<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function guru_index()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('guru');
		}
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$data['judul'] = 'Halaman home';
		$this->load->view('guru/templates/header', $data);
		$this->load->view('guru/home/index', $data);
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

		$data['judul'] = 'Halaman home';
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/home/index', $data);
		$this->load->view('user/templates/footer');
	}

	// ------------------------------------------------------------------------------------

	// public function admin_index()
	// {
	// 	if (!$this->session->userdata('email_guru')) {
	// 		redirect('guru');
	// 	}
	// 	$data['login'] = $this->db->get_where('guru', [
	// 		'nip' => $this->session->userdata('nip')
	// 	])->row_array();

	// 	$data['judul'] = 'Halaman home';
	// 	$this->load->view('admin/templates/header', $data);
	// 	$this->load->view('admin/home/index', $data);
	// 	$this->load->view('admin/templates/footer');
	// }
}
