<?php

class Guru_model extends CI_model
{
	public function getAllGuru()
	{
		return $query = $this->db->get('guru')->result_array();
	}

	public function getAllGuruNip()
	{

		$this->db->select('*');
		$this->db->from('guru');
		return $query = $this->db->get()->result_array();
	}

	public function getGuruByNip($nip)
	{
		return $this->db->get_where('guru', ['nip' => $nip])->row_array();
	}

	public function getNipGuru()
	{
		return $query = $this->db->get('guru')->result_array();
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

	public function tambahDataGuru()
	{
		$data = array(
			'nip' => $this->input->post('nip', true),
			'nama_guru' => $this->input->post('nama_guru', true),
			'foto_guru' => 'default.png',
			'telp_guru' => $this->input->post('telp_guru', true),
			'email_guru' => $this->input->post('email_guru', true),
			'pass_guru' => password_hash($this->input->post('pass_guru'), PASSWORD_DEFAULT),
			'jalan_guru' => $this->input->post('jalan_guru', true),
			'rt_guru' => $this->input->post('rt_guru', true),
			'rw_guru' => $this->input->post('rw_guru', true),
			'no_rumah_guru' => $this->input->post('no_rumah_guru', true),
			'kec_guru' => $this->input->post('kec_guru', true),
			'kab_guru' => $this->input->post('kab_guru', true),
			'kode_pos_guru' => $this->input->post('kode_pos_guru', true),
			'status_guru' => $this->input->post('status_guru', true),
			'is_active' => 0,
			'date_created' => time()
		);
		$token = base64_encode(random_bytes(32));

		$this->db->insert('guru', $data);
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
		$this->email->to($this->input->post('email_guru', true));

		if ($type == "verify") {
			$this->email->subject('Aktivasi Akun Guru');
			$this->email->message('Klik tautan ini untuk verifikasi akun anda : ' . base_url() . 'guru/verify?email=' . $this->input->post('email_guru') . '&token=' . urlencode($token) . '');
		} else {
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function editDataGuru()
	{
		$data = array(
			'status_guru' => $this->input->post('status_guru', true),
			'nip' => $this->input->post('nip', true)
		);
		$this->db->where('nip', $this->input->post('nip'));
		$this->db->update('guru', $data);
	}

	public function hapusDataGuru($nip)
	{
		$this->db->delete('guru', ['nip' => $nip]);
		return $this->db->affected_rows();
	}

	// ------------------------------------------------------------------------------------

	public function tambahDataGuruRest($data)
	{
		$this->db->insert('guru', $data);
		return $this->db->affected_rows();
	}

	public function updateDataGuruRest($data, $nip)
	{
		$this->db->update('guru', $data, ['nip' => $nip]);
		return $this->db->affected_rows();
	}
}
