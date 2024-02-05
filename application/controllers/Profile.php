<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profil_model');
		$this->load->library('form_validation');
	}

	public function guru_index()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('guru');
		}
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');

		$data['judul'] = '[Guru] Halaman Profil';
		$this->load->view('guru/templates/header', $data);
		$this->load->view('guru/profile/index', $data);
		$this->load->view('guru/templates/footer');
	}

	public function guru_edit()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('guru');
		}
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');
		$data['judul'] = '[Guru] Halaman Edit Profil';

		$this->form_validation->set_rules('nama_guru', 'nama guru', 'required|trim');
		$this->form_validation->set_rules('telp_guru', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_guru', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_guru', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_guru', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_guru', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_guru', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kab_guru', 'nama kabupaten', 'required|trim');
		$this->form_validation->set_rules('kode_pos_guru', 'kode pos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('guru/templates/header', $data);
			$this->load->view('guru/profile/edit', $data);
			$this->load->view('guru/templates/footer');
		} else {
			$nama_guru = $this->input->post('nama_guru');
			$telp_guru = $this->input->post('telp_guru');
			$jalan_guru = $this->input->post('jalan_guru');
			$no_rumah_guru = $this->input->post('no_rumah_guru');
			$rt_guru = $this->input->post('rt_guru');
			$rw_guru = $this->input->post('rw_guru');
			$kec_guru = $this->input->post('kec_guru');
			$kab_guru = $this->input->post('kab_guru');
			$kode_pos_guru = $this->input->post('kode_pos_guru');

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['foto_guru']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_guru')) {
					$old_image = $data['login']['foto_guru'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_guru', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
			}
			$this->db->set('nama_guru', $nama_guru);
			$this->db->set('telp_guru', $telp_guru);
			$this->db->set('jalan_guru', $jalan_guru);
			$this->db->set('no_rumah_guru', $no_rumah_guru);
			$this->db->set('rt_guru', $rt_guru);
			$this->db->set('rw_guru', $rw_guru);
			$this->db->set('kec_guru', $kec_guru);
			$this->db->set('kab_guru', $kab_guru);
			$this->db->set('kode_pos_guru', $kode_pos_guru);
			$this->db->where('nip', $nip);
			$this->db->update('guru');

			$this->session->set_flashdata('flash', 'diperbarui');
			redirect('Profile/guru_index');
		}
	}

	public function guru_password()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('guru');
		}
		$data['login'] = $this->db->get_where('guru', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');
		$data['judul'] = '[Guru] Halaman Ganti Kata Sandi';

		$this->form_validation->set_rules('sandi_sekarang', 'current password', 'required|trim');
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('guru/templates/header', $data);
			$this->load->view('guru/profile/password', $data);
			$this->load->view('guru/templates/footer');
		} else {
			$sandi_sekarang = $this->input->post('sandi_sekarang');
			$sandi_baru = $this->input->post('sandi_baru');
			if (!password_verify($sandi_sekarang, $data['login']['pass_guru'])) {
				$this->session->set_flashdata('flash', 'salah');
				redirect('profile/guru_password');
			} else {
				if ($sandi_sekarang == $sandi_baru) {
					$this->session->set_flashdata('flash2', ' ');
					redirect('profile/guru_password');
				} else {
					$pass_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

					$this->db->set('pass_guru', $pass_hash);
					$this->db->where('nip', $nip);
					$this->db->update('guru');
					$this->session->set_flashdata('flash3', 'diperbarui');
					redirect('profile/guru_index');
				}
			}
		}
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

		$data['judul'] = 'Halaman Profil';
		$this->load->view('user/templates/header', $data);
		$this->load->view('user/profile/index', $data);
		$this->load->view('user/templates/footer');
	}

	public function user_edit()
	{
		if (!$this->session->userdata('email_orang_tua')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('siswa', [
			'nis' => $this->session->userdata('nis')
		])->row_array();

		$nis = $this->session->userdata('nis');
		$data['judul'] = 'Halaman Edit Profil';
		$data['jk'] = ['Laki-laki', 'Perempuan'];
		$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'required|trim');
		$this->form_validation->set_rules('nis', 'nomor induk siswa', 'required|trim');
		$this->form_validation->set_rules('nisn', 'nisn', 'required|trim');
		$this->form_validation->set_rules('nama_panggilan_siswa', 'nama panggilan', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir_siswa', 'tempat lahir', 'required|trim');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'required|trim');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'required|trim');
		$this->form_validation->set_rules('telp_ayah', 'telepon ayah', 'required|trim');
		$this->form_validation->set_rules('telp_ibu', 'telepon ibu', 'required|trim');
		$this->form_validation->set_rules('jalan_orang_tua', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_orang_tua', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_orang_tua', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_orang_tua', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_orang_tua', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kab_orang_tua', 'nama kabupaten', 'required|trim');
		$this->form_validation->set_rules('kode_pos_orang_tua', 'kode pos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/profile/edit', $data);
			$this->load->view('user/templates/footer');
		} else {
			$nama_siswa = $this->input->post('nama_siswa');
			$nis = $this->input->post('nis');
			$nisn = $this->input->post('nisn');
			$nama_panggilan_siswa = $this->input->post('nama_panggilan_siswa');
			$jenis_kelamin_siswa = $this->input->post('jenis_kelamin_siswa');
			$tempat_lahir_siswa = $this->input->post('tempat_lahir_siswa');
			$tgl_lahir_siswa = $this->input->post('tgl_lahir_siswa');
			$nama_ayah = $this->input->post('nama_ayah');
			$nama_ibu = $this->input->post('nama_ibu');
			$telp_ayah = $this->input->post('telp_ayah');
			$telp_ibu = $this->input->post('telp_ibu');
			$jalan_orang_tua = $this->input->post('jalan_orang_tua');
			$no_rumah_orang_tua = $this->input->post('no_rumah_orang_tua');
			$rt_orang_tua = $this->input->post('rt_orang_tua');
			$rw_orang_tua = $this->input->post('rw_orang_tua');
			$kec_orang_tua = $this->input->post('kec_orang_tua');
			$kab_orang_tua = $this->input->post('kab_orang_tua');
			$kode_pos_orang_tua = $this->input->post('kode_pos_orang_tua');

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['foto_siswa']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_siswa')) {
					$old_image = $data['login']['foto_siswa'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_siswa', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
			}
			$this->db->set('nama_siswa', $nama_siswa);
			$this->db->set('nis', $nis);
			$this->db->set('nisn', $nisn);
			$this->db->set('nama_panggilan_siswa', $nama_panggilan_siswa);
			$this->db->set('jenis_kelamin_siswa', $jenis_kelamin_siswa);
			$this->db->set('tempat_lahir_siswa', $tempat_lahir_siswa);
			$this->db->set('tgl_lahir_siswa', $tgl_lahir_siswa);
			$this->db->set('nama_ayah', $nama_ayah);
			$this->db->set('nama_ibu', $nama_ibu);
			$this->db->set('telp_ayah', $telp_ayah);
			$this->db->set('telp_ibu', $telp_ibu);
			$this->db->set('jalan_orang_tua', $jalan_orang_tua);
			$this->db->set('no_rumah_orang_tua', $no_rumah_orang_tua);
			$this->db->set('rt_orang_tua', $rt_orang_tua);
			$this->db->set('rw_orang_tua', $rw_orang_tua);
			$this->db->set('kec_orang_tua', $kec_orang_tua);
			$this->db->set('kab_orang_tua', $kab_orang_tua);
			$this->db->set('kode_pos_orang_tua', $kode_pos_orang_tua);
			$this->db->where('nis', $nis);
			$this->db->update('siswa');

			$this->session->set_flashdata('flash', 'diperbarui');
			redirect('profile/user_index');
		}
	}

	public function user_password()
	{
		if (!$this->session->userdata('email_orang_tua')) {
			redirect('auth');
		}
		$data['login'] = $this->db->get_where('siswa', [
			'nis' => $this->session->userdata('nis')
		])->row_array();

		$nis = $this->session->userdata('nis');
		$data['judul'] = 'Halaman Ganti Kata Sandi';

		$this->form_validation->set_rules('sandi_sekarang', 'current password', 'required|trim');
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('user/templates/header', $data);
			$this->load->view('user/profile/password', $data);
			$this->load->view('user/templates/footer');
		} else {
			$sandi_sekarang = $this->input->post('sandi_sekarang');
			$sandi_baru = $this->input->post('sandi_baru');
			if (!password_verify($sandi_sekarang, $data['login']['pass_orang_tua'])) {
				$this->session->set_flashdata('flash', 'salah');
				redirect('profile/user_password');
			} else {
				if ($sandi_sekarang == $sandi_baru) {
					$this->session->set_flashdata('flash2', ' ');
					redirect('profile/user_password');
				} else {
					$pass_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

					$this->db->set('pass_orang_tua', $pass_hash);
					$this->db->where('nis', $nis);
					$this->db->update('siswa');
					$this->session->set_flashdata('flash3', 'diperbarui');
					redirect('profile/user_index');
				}
			}
		}
	}

	// ------------------------------------------------------------------------------------

	public function admin_index()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('admin', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');

		$data['judul'] = '[admin] Halaman Profil';
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/profile/index', $data);
		$this->load->view('admin/templates/footer');
	}

	public function admin_edit()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('admin', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');
		$data['judul'] = '[admin] Halaman Edit Profil';

		$this->form_validation->set_rules('nama_guru', 'nama guru', 'required|trim');
		$this->form_validation->set_rules('telp_guru', 'nomor telepon', 'required|trim');
		$this->form_validation->set_rules('jalan_guru', 'nama jalan', 'required|trim');
		$this->form_validation->set_rules('no_rumah_guru', 'nomor rumah', 'required|trim');
		$this->form_validation->set_rules('rt_guru', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw_guru', 'rw', 'required|trim');
		$this->form_validation->set_rules('kec_guru', 'nama kecamatan', 'required|trim');
		$this->form_validation->set_rules('kab_guru', 'nama kabupaten', 'required|trim');
		$this->form_validation->set_rules('kode_pos_guru', 'kode pos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/profile/edit', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$nama_guru = $this->input->post('nama_guru');
			$telp_guru = $this->input->post('telp_guru');
			$jalan_guru = $this->input->post('jalan_guru');
			$no_rumah_guru = $this->input->post('no_rumah_guru');
			$rt_guru = $this->input->post('rt_guru');
			$rw_guru = $this->input->post('rw_guru');
			$kec_guru = $this->input->post('kec_guru');
			$kab_guru = $this->input->post('kab_guru');
			$kode_pos_guru = $this->input->post('kode_pos_guru');

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['foto_guru']['name'];
			if ($upload_image) {
				$config['upload_path'] = './assets/images/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('foto_guru')) {
					$old_image = $data['login']['foto_guru'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/images/profile/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto_guru', $new_image);
				} else {
					$error = array('error' => $this->upload->display_errors());
				}
			}
			$this->db->set('nama_guru', $nama_guru);
			$this->db->set('telp_guru', $telp_guru);
			$this->db->set('jalan_guru', $jalan_guru);
			$this->db->set('no_rumah_guru', $no_rumah_guru);
			$this->db->set('rt_guru', $rt_guru);
			$this->db->set('rw_guru', $rw_guru);
			$this->db->set('kec_guru', $kec_guru);
			$this->db->set('kab_guru', $kab_guru);
			$this->db->set('kode_pos_guru', $kode_pos_guru);
			$this->db->where('nip', $nip);
			$this->db->update('admin');

			$this->session->set_flashdata('flash', 'diperbarui');
			redirect('Profile/admin_index');
		}
	}

	public function admin_password()
	{
		if (!$this->session->userdata('email_guru')) {
			redirect('admin');
		}
		$data['login'] = $this->db->get_where('admin', [
			'nip' => $this->session->userdata('nip')
		])->row_array();

		$nip = $this->session->userdata('nip');
		$data['judul'] = '[admin] Halaman Ganti Kata Sandi';

		$this->form_validation->set_rules('sandi_sekarang', 'current password', 'required|trim');
		$this->form_validation->set_rules('sandi_baru', 'new password', 'required|trim|min_length[6]|matches[sandi_baru_ulang]');
		$this->form_validation->set_rules('sandi_baru_ulang', 'confirm new password', 'required|trim|min_length[6]|matches[sandi_baru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/profile/password', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$sandi_sekarang = $this->input->post('sandi_sekarang');
			$sandi_baru = $this->input->post('sandi_baru');
			if (!password_verify($sandi_sekarang, $data['login']['pass_guru'])) {
				$this->session->set_flashdata('flash', 'salah');
				redirect('profile/admin_password');
			} else {
				if ($sandi_sekarang == $sandi_baru) {
					$this->session->set_flashdata('flash2', ' ');
					redirect('profile/admin_password');
				} else {
					$pass_hash = password_hash($sandi_baru, PASSWORD_DEFAULT);

					$this->db->set('pass_guru', $pass_hash);
					$this->db->where('nip', $nip);
					$this->db->update('admin');
					$this->session->set_flashdata('flash3', 'diperbarui');
					redirect('profile/admin_index');
				}
			}
		}
	}

	// ------------------------------------------------------------------------------------
}
