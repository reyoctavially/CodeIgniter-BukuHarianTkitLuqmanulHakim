<?php

class Profil_model extends CI_model {
	public function getAllSiswaNik($no_ktp_orang_tua)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('no_ktp_orang_tua', $no_ktp_orang_tua);
		return $query = $this->db->get()->result_array();
	}
}