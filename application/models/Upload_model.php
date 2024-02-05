<?php

class Upload_model extends CI_model
{
    //----------------------------File Jadwal--------------------------------
    public function getAllFileJadwal()
    {
        return $query = $this->db->get('file_jadwal')->result_array();
    }

    public function getAllFileJadwalKode()
    {

        $this->db->select('*');
        $this->db->from('file_jadwal');
        return $query = $this->db->get()->result_array();
    }

    public function getFileJadwalByKode($kode_file)
    {
        return $this->db->get_where('file_jadwal', ['kode_file' => $kode_file])->row_array();
    }

    //----------------------------File doa hadits--------------------------------
    public function getAllFileDoa()
    {
        return $query = $this->db->get('file_doa')->result_array();
    }

    public function getAllFileDoaKode()
    {

        $this->db->select('*');
        $this->db->from('file_doa');
        return $query = $this->db->get()->result_array();
    }

    public function getFileDoaByKode($kode_file)
    {
        return $this->db->get_where('file_doa', ['kode_file' => $kode_file])->row_array();
    }

    //----------------------------File kurikulum--------------------------------
    public function getAllFileKurikulum()
    {
        return $query = $this->db->get('file_kurikulum')->result_array();
    }

    public function getAllFileKurikulumKode()
    {

        $this->db->select('*');
        $this->db->from('file_kurikulum');
        return $query = $this->db->get()->result_array();
    }

    public function getFileKurikulumByKode($kode_file)
    {
        return $this->db->get_where('file_kurikulum', ['kode_file' => $kode_file])->row_array();
    }
}
