<?php

class Siswa_model extends CI_model
{
	public function getAllSiswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->order_by('date_created', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getAngkatan()
	{
		$this->db->select('angkatan');
		$this->db->from('siswa');
		$this->db->order_by('angkatan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function cetakSiswa($angkatan)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('angkatan', $angkatan);
		$this->db->order_by('nama_siswa', 'ASC');
		return $query = $this->db->get()->result_array();
	}

	public function getAllSiswaNip($nip)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nip', $nip);
		return $query = $this->db->get()->result_array();
	}

	public function getSiswaByNis($nis)
	{
		return $this->db->get_where('siswa', ['nis' => $nis])->row_array();
	}

	public function getNisSiswa()
	{
		return $query = $this->db->get('siswa')->result_array();
	}

	public function getGuru()
	{
		return $query = $this->db->get('guru')->result_array();
	}

	public function getGuruNip($nip)
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->where('nip', $nip);
		return $query = $this->db->get()->result_array();
	}

	public function tambahDataSiswa()
	{
		$data = array(
			'nis' => $this->input->post('nis', true),
			'nisn' => $this->input->post('nisn', true),
			'nama_siswa' => $this->input->post('nama_siswa', true),
			'nama_panggilan_siswa' => $this->input->post('nama_panggilan_siswa', true),
			'foto_siswa' => 'default.png',
			'tempat_lahir_siswa' => $this->input->post('tempat_lahir_siswa', true),
			'tgl_lahir_siswa' => $this->input->post('tgl_lahir_siswa', true),
			'jenis_kelamin_siswa' => $this->input->post('jenis_kelamin_siswa', true),
			'angkatan' => $this->input->post('angkatan', true),
			'status_siswa' => $this->input->post('status_siswa', true),
			'nama_ayah' => $this->input->post('nama_ayah', true),
			'telp_ayah' => $this->input->post('telp_ayah', true),
			'nama_ibu' => $this->input->post('nama_ibu', true),
			'telp_ibu' => $this->input->post('telp_ibu', true),
			'email_orang_tua' => $this->input->post('email_orang_tua', true),
			'pass_orang_tua' => password_hash($this->input->post('pass_orang_tua'), PASSWORD_DEFAULT),
			'jalan_orang_tua' => $this->input->post('jalan_orang_tua', true),
			'no_rumah_orang_tua' => $this->input->post('no_rumah_orang_tua', true),
			'rt_orang_tua' => $this->input->post('rt_orang_tua', true),
			'rw_orang_tua' => $this->input->post('rw_orang_tua', true),
			'kec_orang_tua' => $this->input->post('kec_orang_tua', true),
			'kab_orang_tua' => $this->input->post('kab_orang_tua', true),
			'kode_pos_orang_tua' => $this->input->post('kode_pos_orang_tua', true),
			'date_created' => time(),
			'is_active' => 0
		);
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $this->input->post('email_orang_tua'),
			'token' => $token,
			'date_created' => time()
		];

		$this->db->insert('siswa', $data);
		$this->db->insert('user_token', $user_token);
		$this->_sendEmail($token, 'verify');
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
		} else {
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function editDataSiswa()
	{
		$data = array(
			'status_siswa' => $this->input->post('status_siswa', true),
			'angkatan' => $this->input->post('angkatan', true)
		);
		$this->db->where('nis', $this->input->post('nis'));
		$this->db->update('siswa', $data);
	}

	public function hapusDataSiswa($nis)
	{
		$this->db->delete('siswa', ['nis' => $nis]);
		return $this->db->affected_rows();
	}

	// ------------------------------------------------------------------------------------

	public function tambahDataSiswaRest($data)
	{
		$this->db->insert('siswa', $data);
		return $this->db->affected_rows();
	}

	public function updateDataSiswaRest($data, $nis)
	{
		$this->db->update('siswa', $data, ['nis' => $nis]);
		return $this->db->affected_rows();
	}
}
