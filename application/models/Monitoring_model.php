<?php

class Monitoring_model extends CI_model
{
	public function getAllMonitoring()
	{
		$this->db->select('*');
		$this->db->from('pembelajaran_alquran');
		$this->db->join('siswa', 'siswa.nis = pembelajaran_alquran.nis');
		$this->db->order_by('tgl_belajar', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKodeMonitoring()
	{
		return $query = $this->db->get('pembelajaran_alquran')->result_array();
	}

	public function getMonitoringByNis($nis)
	{
		$this->db->select('*');
		$this->db->from('pembelajaran_alquran');
		$this->db->join('siswa', 'siswa.nis = pembelajaran_alquran.nis');
		$this->db->where('pembelajaran_alquran.nis', $nis);
		$this->db->order_by('tgl_belajar', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getMonitoringByKode($kode_pembelajaran_alquran)
	{
		$this->db->select('*');
		$this->db->from('pembelajaran_alquran');
		$this->db->join('siswa', 'siswa.nis = pembelajaran_alquran.nis');
		$this->db->join('guru', 'guru.nip = pembelajaran_alquran.nip');
		$this->db->where('pembelajaran_alquran.kode_pembelajaran_alquran', $kode_pembelajaran_alquran);
		return $query = $this->db->get()->row_array();
	}

	public function tambahMonitoring()
	{
		$data = array(
			'kode_pembelajaran_alquran' => $this->input->post('kode_pembelajaran_alquran', true),
			'tgl_belajar' => $this->input->post('tgl_belajar', true),
			'hafalan_surat' => $this->input->post('hafalan_surat', true),
			'murajaah_hafalan' => $this->input->post('murajaah_hafalan', true),
			'ummi_jilid' => $this->input->post('ummi_jilid', true),
			'ummi_halaman' => $this->input->post('ummi_halaman', true),
			'nilai' => $this->input->post('nilai', true),
			'keterangan' => $this->input->post('keterangan', true),
			'nis' => $this->input->post('nis', true),
			'nip' => $this->input->post('nip', true)
		);
		$this->db->insert('pembelajaran_alquran', $data);
	}

	public function editDataMonitoring()
	{
		$data = array(
			'hafalan_surat' => $this->input->post('hafalan_surat', true),
			'murajaah_hafalan' => $this->input->post('murajaah_hafalan', true),
			'ummi_jilid' => $this->input->post('ummi_jilid', true),
			'ummi_halaman' => $this->input->post('ummi_halaman', true),
			'nilai' => $this->input->post('nilai', true),
			'keterangan' => $this->input->post('keterangan', true)
		);
		$this->db->where('kode_pembelajaran_alquran', $this->input->post('kode_pembelajaran_alquran'));
		$this->db->update('pembelajaran_alquran', $data);
	}

	public function cetakMonitoringByNis($nis, $awal, $akhir)
	{
		return $query = $this->db->query("SELECT * FROM pembelajaran_alquran JOIN siswa USING(nis) WHERE nis = '$nis' AND tgl_belajar BETWEEN '$awal' AND '$akhir'")->result_array();
	}

	public function getAllSiswa()
	{
		$status = 'Aktif';
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('status_siswa', $status);
		$this->db->order_by('nama_siswa', 'ASC');
		return $query = $this->db->get()->result_array();
	}

	public function getNilai()
	{
		return $query = $this->db->get('nilai')->result_array();
	}

	public function checkMonitoring($kode_pembelajaran_alquran)
	{
		$this->db->set('review', 1);
		$this->db->where('kode_pembelajaran_alquran', $kode_pembelajaran_alquran);
		$this->db->update('pembelajaran_alquran');
	}

	// ------------------------------------------------------------------------------------

	public function hapusDataMonitoringRest($nis)
	{
		$this->db->delete('pembelajaran_alquran', ['nis' => $nis]);
		return $this->db->affected_rows();
	}

	public function tambahDataMonitoringRest($data)
	{
		$this->db->insert('pembelajaran_alquran', $data);
		return $this->db->affected_rows();
	}

	public function updateDataMonitoringRest($data, $nis)
	{
		$this->db->update('pembelajaran_alquran', $data, ['nis' => $nis]);
		return $this->db->affected_rows();
	}
}
