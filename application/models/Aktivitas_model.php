<?php

class Aktivitas_model extends CI_model
{
	public function getAllAktivitas()
	{
		$this->db->select('*');
		$this->db->from('aktivitas_siswa');
		$this->db->join('siswa', 'siswa.nis = aktivitas_siswa.nis');
		$this->db->order_by('tgl_aktivitas', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKodeAktivitas()
	{
		return $query = $this->db->get('aktivitas_siswa')->result_array();
	}

	public function getAktivitasByNis($nis)
	{
		$this->db->select('*');
		$this->db->from('aktivitas_siswa');
		$this->db->join('siswa', 'siswa.nis = aktivitas_siswa.nis');
		$this->db->where('aktivitas_siswa.nis', $nis);
		$this->db->order_by('tgl_aktivitas', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function cetakAktivitasByNis($nis, $awal, $akhir)
	{
		return $query = $this->db->query("SELECT * FROM aktivitas_siswa JOIN siswa USING(nis) WHERE nis = '$nis' AND tgl_aktivitas BETWEEN '$awal' AND '$akhir'")->result_array();
	}

	public function getSiswaNip($nip)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nip', $nip);
		return $query = $this->db->get()->result_array();
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

	public function getAktivitasByKode($kode_aktivitas)
	{
		$this->db->select('*');
		$this->db->from('aktivitas_siswa');
		$this->db->join('siswa', 'siswa.nis = aktivitas_siswa.nis');
		$this->db->where('aktivitas_siswa.kode_aktivitas_siswa', $kode_aktivitas);
		return $query = $this->db->get()->row_array();
	}

	public function getAktivitas($nis)
	{
		$tgl_aktivitas = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('aktivitas_siswa');
		$this->db->where('tgl_aktivitas', $tgl_aktivitas);
		$this->db->where('nis', $nis);
		return $query = $this->db->get()->result_array();
	}

	public function getSiswaByKode($nis)
	{
		$this->db->select('*');
		$this->db->from('siswa');;
		$this->db->where('nis', $nis);
		return $query = $this->db->get()->row_array();
	}

	public function tambahAktivitas()
	{
		$data = array(
			'kode_aktivitas_siswa' => $this->input->post('kode_aktivitas_siswa', true),
			'tgl_aktivitas' => $this->input->post('tgl_aktivitas', true),
			'jam_input_aktivitas' => date('h:i:s'),
			'jam_bangun' => $this->input->post('jam_bangun', true),
			'jam_tidur' => $this->input->post('jam_tidur', true),
			'pembiasaan_sholat' => $this->input->post('pembiasaan_sholat', true),
			'membaca_doa_harian' => $this->input->post('membaca_doa_harian', true),
			'mengulang_hafalan_dan_ummi' => $this->input->post('mengulang_hafalan_dan_ummi', true),
			'catatan_kegiatan' => $this->input->post('catatan_kegiatan', true),
			'review' => 0,
			'catatan_guru' => '',
			'nis' => $this->input->post('nis', true)
		);
		$this->db->insert('aktivitas_siswa', $data);
	}

	public function editDataAktivitas()
	{
		$data = array(
			'jam_bangun' => $this->input->post('jam_bangun', true),
			'jam_tidur' => $this->input->post('jam_tidur', true),
			'pembiasaan_sholat' => $this->input->post('pembiasaan_sholat', true),
			'membaca_doa_harian' => $this->input->post('membaca_doa_harian', true),
			'mengulang_hafalan_dan_ummi' => $this->input->post('mengulang_hafalan_dan_ummi', true),
			'catatan_kegiatan' => $this->input->post('catatan_kegiatan', true),
			'catatan_guru' => ''
		);
		$this->db->where('kode_aktivitas_siswa', $this->input->post('kode_aktivitas_siswa'));
		$this->db->update('aktivitas_siswa', $data);
	}

	public function catatDataAktivitas()
	{
		$data = array(
			'catatan_guru' => $this->input->post('catatan_guru', true)
		);
		$this->db->where('kode_aktivitas_siswa', $this->input->post('kode_aktivitas_siswa'));
		$this->db->update('aktivitas_siswa', $data);
	}

	public function checkAktivitas($kode_aktivitas_siswa)
	{
		$this->db->set('review', 1);
		$this->db->where('kode_aktivitas_siswa', $kode_aktivitas_siswa);
		$this->db->update('aktivitas_siswa');
	}

	// ------------------------------------------------------------------------------------

	public function hapusDataAktivitasRest($nis)
	{
		$this->db->delete('aktivitas_siswa', ['nis' => $nis]);
		return $this->db->affected_rows();
	}

	public function tambahDataAktivitasRest($data)
	{
		$this->db->insert('aktivitas_siswa', $data);
		return $this->db->affected_rows();
	}

	public function updateDataAktivitasRest($data, $nis)
	{
		$this->db->update('aktivitas_siswa', $data, ['nis' => $nis]);
		return $this->db->affected_rows();
	}
}
