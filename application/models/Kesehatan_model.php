<?php

class Kesehatan_model extends CI_model
{
	public function getAllPertumbuhan()
	{
		$this->db->select('*');
		$this->db->from('pertumbuhan_siswa');
		$this->db->join('siswa', 'siswa.nis = pertumbuhan_siswa.nis');
		$this->db->order_by('tgl_input', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKodePertumbuhan()
	{
		return $query = $this->db->get('pertumbuhan_siswa')->result_array();
	}

	public function getPertumbuhanByNis($nis)
	{
		$this->db->select('*');
		$this->db->from('pertumbuhan_siswa');
		$this->db->join('siswa', 'siswa.nis = pertumbuhan_siswa.nis');
		$this->db->where('pertumbuhan_siswa.nis', $nis);
		$this->db->order_by('tgl_input', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPertumbuhanByNip($nip)
	{
		$this->db->select('*');
		$this->db->from('pertumbuhan_siswa');
		$this->db->join('siswa', 'siswa.nis = pertumbuhan_siswa.nis');
		$this->db->where('pertumbuhan_siswa.nip', $nip);
		$this->db->order_by('tgl_input', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPertumbuhanByKode($kode_pertumbuhan)
	{
		$this->db->select('*');
		$this->db->from('pertumbuhan_siswa');
		$this->db->join('siswa', 'siswa.nis = pertumbuhan_siswa.nis');
		$this->db->join('guru', 'guru.nip = pertumbuhan_siswa.nip');
		$this->db->where('pertumbuhan_siswa.kode_pertumbuhan', $kode_pertumbuhan);
		return $query = $this->db->get()->row_array();
	}

	public function getPertumbuhan($nis)
	{
		$tgl_input = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('pertumbuhan_siswa');
		$this->db->where('tgl_input', $tgl_input);
		$this->db->where('nis', $nis);
		return $query = $this->db->get()->result_array();
	}

	public function tambahPertumbuhan()
	{
		$data = array(
			'kode_pertumbuhan' => $this->input->post('kode_pertumbuhan', true),
			'tgl_input' => $this->input->post('tgl_input', true),
			'tinggi_badan_siswa' => $this->input->post('tinggi_badan_siswa', true),
			'berat_badan_siswa' => $this->input->post('berat_badan_siswa', true),
			'lingkar_kepala_siswa' => $this->input->post('lingkar_kepala_siswa', true),
			'ket_kesehatan_siswa' => $this->input->post('ket_kesehatan_siswa', true),
			'nis' => $this->input->post('nis', true),
			'nip' => $this->input->post('nip', true)
		);
		$this->db->insert('pertumbuhan_siswa', $data);
	}

	public function editPertumbuhan()
	{
		$data = array(
			'tinggi_badan_siswa' => $this->input->post('tinggi_badan_siswa', true),
			'berat_badan_siswa' => $this->input->post('berat_badan_siswa', true),
			'lingkar_kepala_siswa' => $this->input->post('lingkar_kepala_siswa', true),
			'ket_kesehatan_siswa' => $this->input->post('ket_kesehatan_siswa', true)
		);
		$this->db->where('kode_pertumbuhan', $this->input->post('kode_pertumbuhan'));
		$this->db->update('pertumbuhan_siswa', $data);
	}

	// ------------------------------------------------------------------------------------

	public function getAllSiswaNip($nip)
	{

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('nip', $nip);
		return $query = $this->db->get()->result_array();
	}
	
	public function getAllPerkembangan()
	{
		$this->db->select('*');
		$this->db->from('tumbuh_kembang_siswa');
		$this->db->join('siswa', 'siswa.nis = tumbuh_kembang_siswa.nis');
		$this->db->order_by('tgl_pemeriksaan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getKodePerkembangan()
	{
		return $query = $this->db->get('tumbuh_kembang_siswa')->result_array();
	}

	public function getPerkembanganByNis($nis)
	{
		$this->db->select('*');
		$this->db->from('tumbuh_kembang_siswa');
		$this->db->join('siswa', 'siswa.nis = tumbuh_kembang_siswa.nis');
		$this->db->where('tumbuh_kembang_siswa.nis', $nis);
		$this->db->order_by('tgl_pemeriksaan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPerkembanganByNip($nip)
	{
		$this->db->select('*');
		$this->db->from('tumbuh_kembang_siswa');
		$this->db->join('siswa', 'siswa.nis = tumbuh_kembang_siswa.nis');
		$this->db->where('tumbuh_kembang_siswa.nip', $nip);
		$this->db->order_by('tgl_pemeriksaan', 'DESC');
		return $query = $this->db->get()->result_array();
	}

	public function getPerkembanganByKode($kode_pemeriksaan)
	{
		$this->db->select('*');
		$this->db->from('tumbuh_kembang_siswa');
		$this->db->join('siswa', 'siswa.nis = tumbuh_kembang_siswa.nis');
		$this->db->join('guru', 'guru.nip = tumbuh_kembang_siswa.nip');
		$this->db->where('tumbuh_kembang_siswa.kode_pemeriksaan', $kode_pemeriksaan);
		return $query = $this->db->get()->row_array();
	}

	public function getGuruSiswaByNip($nip)
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('siswa', 'siswa.nip = siswa.nip');
		$this->db->where('guru.nip', $nip);
		return $query = $this->db->get()->row_array();
	}

	public function tambahPerkembangan()
	{
		$data = array(
			'kode_pemeriksaan' => $this->input->post('kode_pemeriksaan', true),
			'tgl_pemeriksaan' => $this->input->post('tgl_pemeriksaan', true),
			'semester' => $this->input->post('semester', true),
			'usia_pemeriksaan' => $this->input->post('usia_pemeriksaan', true),
			'tinggi_badan' => $this->input->post('tinggi_badan', true),
			'berat_badan' => $this->input->post('berat_badan', true),
			'lingkar_kepala' => $this->input->post('lingkar_kepala', true),
			'daya_lihat' => $this->input->post('daya_lihat', true),
			'daya_dengar' => $this->input->post('daya_dengar', true),
			'ket_kuku' => $this->input->post('ket_kuku', true),
			'ket_rambut' => $this->input->post('ket_rambut', true),
			'ket_gigi' => $this->input->post('ket_gigi', true),
			'perkembangan_anak' => $this->input->post('perkembangan_anak', true),
			'nis' => $this->input->post('nis', true),
			'nip' => $this->input->post('nip', true)
		);
		$this->db->insert('tumbuh_kembang_siswa', $data);
	}

	public function editPerkembangan()
	{
		$data = array(
			'semester' => $this->input->post('semester', true),
			'usia_pemeriksaan' => $this->input->post('usia_pemeriksaan', true),
			'tinggi_badan' => $this->input->post('tinggi_badan', true),
			'berat_badan' => $this->input->post('berat_badan', true),
			'lingkar_kepala' => $this->input->post('lingkar_kepala', true),
			'daya_lihat' => $this->input->post('daya_lihat', true),
			'daya_dengar' => $this->input->post('daya_dengar', true),
			'ket_kuku' => $this->input->post('ket_kuku', true),
			'ket_rambut' => $this->input->post('ket_rambut', true),
			'ket_gigi' => $this->input->post('ket_gigi', true),
			'perkembangan_anak' => $this->input->post('perkembangan_anak', true)
		);
		$this->db->where('kode_pemeriksaan', $this->input->post('kode_pemeriksaan'));
		$this->db->update('tumbuh_kembang_siswa', $data);
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

	// ------------------------------------------------------------------------------------

	public function hapusDataAbsensiRest($kode_pegawai)
	{
		$this->db->delete('absensi_pegawai', ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}

	public function tambahDataAbsensiRest($data)
	{
		$this->db->insert('absensi_pegawai', $data);
		return $this->db->affected_rows();
	}

	public function updateDataAbsensiRest($data, $kode_pegawai)
	{
		$this->db->update('absensi_pegawai', $data, ['kode_pegawai' => $kode_pegawai]);
		return $this->db->affected_rows();
	}
}
