-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 04:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `foto_guru` varchar(128) NOT NULL,
  `telp_guru` varchar(16) NOT NULL,
  `email_guru` varchar(128) NOT NULL,
  `pass_guru` varchar(128) NOT NULL,
  `jalan_guru` varchar(128) NOT NULL,
  `rt_guru` varchar(8) NOT NULL,
  `rw_guru` varchar(8) NOT NULL,
  `no_rumah_guru` varchar(16) NOT NULL,
  `kec_guru` varchar(128) NOT NULL,
  `kab_guru` varchar(128) NOT NULL,
  `kode_pos_guru` int(11) NOT NULL,
  `status_guru` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama_guru`, `foto_guru`, `telp_guru`, `email_guru`, `pass_guru`, `jalan_guru`, `rt_guru`, `rw_guru`, `no_rumah_guru`, `kec_guru`, `kab_guru`, `kode_pos_guru`, `status_guru`, `is_active`, `date_created`) VALUES
('59860876987', 'admin', 'default.png', '08122431234', 'admintkit@gmail.com', '$2y$10$lsa7WepsDSMX0sYyMRKuoutHPWYzG2smk6f.m3lz1trlKMdc//27.', 'not specify', '00', '00', '00', 'not specify', 'not specify', 12345, 'Aktif', 1, 1634568296);

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_siswa`
--

CREATE TABLE `aktivitas_siswa` (
  `kode_aktivitas_siswa` varchar(16) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `jam_input_aktivitas` time NOT NULL,
  `jam_bangun` time NOT NULL,
  `jam_tidur` time NOT NULL,
  `pembiasaan_sholat` int(1) NOT NULL,
  `membaca_doa_harian` int(1) NOT NULL,
  `mengulang_hafalan_dan_ummi` int(1) NOT NULL,
  `review` int(11) NOT NULL,
  `catatan_kegiatan` varchar(256) NOT NULL,
  `catatan_guru` varchar(256) NOT NULL,
  `nis` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas_siswa`
--

INSERT INTO `aktivitas_siswa` (`kode_aktivitas_siswa`, `tgl_aktivitas`, `jam_input_aktivitas`, `jam_bangun`, `jam_tidur`, `pembiasaan_sholat`, `membaca_doa_harian`, `mengulang_hafalan_dan_ummi`, `review`, `catatan_kegiatan`, `catatan_guru`, `nis`) VALUES
('AV-001', '2021-10-10', '20:35:30', '05:30:11', '20:10:15', 0, 1, 1, 1, 'Kadang sudah untuk disuruh sholat', 'Sudah cukup baik', 1301208569),
('AV-002', '2021-10-11', '04:39:46', '05:36:00', '20:42:00', 1, 0, 1, 1, 'Sedang susah untuk disuruh hafalan', 'Bagus sekali', 1301208569),
('AV-003', '2021-10-15', '05:36:18', '10:36:00', '13:39:00', 1, 0, 0, 0, 'coba yuk', '', 1301208569);

-- --------------------------------------------------------

--
-- Table structure for table `file_doa`
--

CREATE TABLE `file_doa` (
  `kode_file` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_doa`
--

INSERT INTO `file_doa` (`kode_file`, `nama_file`) VALUES
(24, 'Hadist_dan_Doa_kelas_A_Sem_1.pdf'),
(25, 'Hadist_dan_Doa_kelas_B_Sem_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `file_jadwal`
--

CREATE TABLE `file_jadwal` (
  `kode_file` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_jadwal`
--

INSERT INTO `file_jadwal` (`kode_file`, `nama_file`) VALUES
(23, 'Jadwal_KBM.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `file_kurikulum`
--

CREATE TABLE `file_kurikulum` (
  `kode_file` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_kurikulum`
--

INSERT INTO `file_kurikulum` (`kode_file`, `nama_file`) VALUES
(26, 'Materi_Kurikulum_Yayasan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `foto_guru` varchar(128) NOT NULL,
  `telp_guru` varchar(16) NOT NULL,
  `email_guru` varchar(128) NOT NULL,
  `pass_guru` varchar(128) NOT NULL,
  `jalan_guru` varchar(128) NOT NULL,
  `rt_guru` varchar(8) NOT NULL,
  `rw_guru` varchar(8) NOT NULL,
  `no_rumah_guru` varchar(16) NOT NULL,
  `kec_guru` varchar(128) NOT NULL,
  `kab_guru` varchar(128) NOT NULL,
  `kode_pos_guru` int(11) NOT NULL,
  `status_guru` varchar(15) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `foto_guru`, `telp_guru`, `email_guru`, `pass_guru`, `jalan_guru`, `rt_guru`, `rw_guru`, `no_rumah_guru`, `kec_guru`, `kab_guru`, `kode_pos_guru`, `status_guru`, `is_active`, `date_created`) VALUES
('198206142001234123', 'Chandra Wahyuni, S. Pd', 'default.png', '08122439998', 'chandrawahyuni@gmail.com', '$2y$10$WuysiFLRRLc/jTAgslivPudHf7o03I7pC1o67.36Tu4sGhV4AYMe.', 'Jl.Dummy', '01', '01', '01', 'Dummy', 'Bandung', 12345, 'Aktif', 1, 1617252839),
('198206142009011005', 'Indra Budhiman, S.AP', 'default.png', '08122438800', 'indrabulle125@gmail.com', '$2y$10$WuysiFLRRLc/jTAgslivPudHf7o03I7pC1o67.36Tu4sGhV4AYMe.', 'Jl. Mutiara Blok B Desa Rajagaluh', '04', '06', '15', 'Rajagaluh', 'Majalengka', 45472, 'Aktif', 1, 1617252839),
('413242345234', 'Pepi Rogers, S. Pd', 'default.png', '08122434839', 'pepskut@gmail.com', '$2y$10$lsa7WepsDSMX0sYyMRKuoutHPWYzG2smk6f.m3lz1trlKMdc//27.', 'Jl Martadinata', '3', '3', '3', 'Cianjur', 'Cianjur', 12412, 'Nonaktif', 0, 1634568296);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai` varchar(8) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai`, `keterangan`) VALUES
('A+', 'Jika siswa dalam membaca satu halaman benar semua dan kualitasnya bagus sekali'),
('A', 'Jika siswa dalam membaca satu halaman benar semua dan kualitasnya bacaanya biasa-biasa'),
('B+', 'Jika siswa dalam membaca satu halaman salah satu kali dan bisa membetulkan sendiri'),
('B', 'Jika siswa dalam membaca satu halaman salah dua kali dan bisa membetulkan sendiri'),
('B-', 'Jika siswa dalam membaca satu halaman salah tiga kali dan bisa membetulkan sendiri'),
('C+', 'Jika siswa dalam membaca satu halaman salah empat kali dan bisa membetulkan sendiri'),
('C', 'Jika siswa dalam membaca satu halaman salah lima kali dan bisa membetulkan sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran_alquran`
--

CREATE TABLE `pembelajaran_alquran` (
  `kode_pembelajaran_alquran` varchar(16) NOT NULL,
  `tgl_belajar` date NOT NULL,
  `hafalan_surat` varchar(128) NOT NULL,
  `murajaah_hafalan` varchar(128) NOT NULL,
  `ummi_jilid` int(8) NOT NULL,
  `ummi_halaman` int(8) NOT NULL,
  `nilai` varchar(8) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `review` int(11) NOT NULL,
  `nis` int(128) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelajaran_alquran`
--

INSERT INTO `pembelajaran_alquran` (`kode_pembelajaran_alquran`, `tgl_belajar`, `hafalan_surat`, `murajaah_hafalan`, `ummi_jilid`, `ummi_halaman`, `nilai`, `keterangan`, `review`, `nis`, `nip`) VALUES
('QRN-001', '2021-10-12', 'Al-Baqarah', 'An-Nas', 1, 1, 'A+', 'Coba', 1, 1301208569, '198206142009011005'),
('QRN-002', '2021-10-13', 'Al-Ikhlas', 'Al-Kautsar', 2, 5, 'B', 'Sudah cukup lancar bacanya', 1, 1301208569, '198206142001234123');

-- --------------------------------------------------------

--
-- Table structure for table `pertumbuhan_siswa`
--

CREATE TABLE `pertumbuhan_siswa` (
  `kode_pertumbuhan` varchar(16) NOT NULL,
  `tgl_input` date NOT NULL,
  `tinggi_badan_siswa` int(11) NOT NULL,
  `berat_badan_siswa` int(11) NOT NULL,
  `lingkar_kepala_siswa` int(11) NOT NULL,
  `ket_kesehatan_siswa` varchar(128) NOT NULL,
  `nis` int(128) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertumbuhan_siswa`
--

INSERT INTO `pertumbuhan_siswa` (`kode_pertumbuhan`, `tgl_input`, `tinggi_badan_siswa`, `berat_badan_siswa`, `lingkar_kepala_siswa`, `ket_kesehatan_siswa`, `nis`, `nip`) VALUES
('PRN-001', '2021-10-12', 110, 40, 7, 'Perkembangannya cukup baik', 1301208569, '198206142009011005'),
('PRN-002', '2021-10-13', 60, 30, 5, 'Cukup baik', 1301208569, '198206142009011005');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(128) NOT NULL,
  `nisn` int(128) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `nama_panggilan_siswa` varchar(128) NOT NULL,
  `foto_siswa` varchar(128) NOT NULL,
  `tempat_lahir_siswa` varchar(128) NOT NULL,
  `tgl_lahir_siswa` date NOT NULL,
  `jenis_kelamin_siswa` varchar(128) NOT NULL,
  `angkatan` int(16) NOT NULL,
  `status_siswa` varchar(16) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `telp_ayah` varchar(16) NOT NULL,
  `telp_ibu` varchar(16) NOT NULL,
  `email_orang_tua` varchar(128) NOT NULL,
  `pass_orang_tua` varchar(128) NOT NULL,
  `jalan_orang_tua` varchar(128) NOT NULL,
  `no_rumah_orang_tua` varchar(8) NOT NULL,
  `rt_orang_tua` varchar(8) NOT NULL,
  `rw_orang_tua` varchar(8) NOT NULL,
  `kec_orang_tua` varchar(128) NOT NULL,
  `kab_orang_tua` varchar(128) NOT NULL,
  `kode_pos_orang_tua` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `nama_siswa`, `nama_panggilan_siswa`, `foto_siswa`, `tempat_lahir_siswa`, `tgl_lahir_siswa`, `jenis_kelamin_siswa`, `angkatan`, `status_siswa`, `nama_ayah`, `nama_ibu`, `telp_ayah`, `telp_ibu`, `email_orang_tua`, `pass_orang_tua`, `jalan_orang_tua`, `no_rumah_orang_tua`, `rt_orang_tua`, `rw_orang_tua`, `kec_orang_tua`, `kab_orang_tua`, `kode_pos_orang_tua`, `date_created`, `is_active`) VALUES
(321020121, 331098071, 'Shalsa Adiartin Mulyani', 'Caca', 'default.png', 'Majalengka', '2017-02-02', 'Perempuan', 2020, 'Aktif', 'Andi Mulya', 'Dede Elin', '082216805580', '082216887567', 'reynaldipo@gmail.com', '$2y$10$BjhrvqOJqeOBwr1AZpQDz.K93zpJ6jsZlO0dIws.V.GG8JhSevrE.', 'Jalan Pramuka', '1', '1', '1', 'Cigasong', 'Majalengka', 45476, 1634267289, 1),
(1301208569, 2147483647, 'Reynaldi Prama Octavially', 'Rey', 'default.png', 'Majalengka', '2016-10-18', 'Laki-laki', 2021, 'Aktif', 'Beni Suparno', 'Lilis Lisnawati', '082216805580', '082216887567', 'reynaldi.octavially@gmail.com', '$2y$10$KJuadAt9MJ9xUy2OHmZVAO.5zOyZbl6gPjUAKhuMN01rMUROg5yxu', 'Jalan Desa Karayunan', '03', '01', '08', 'Cigasong', 'Majalengka', 45476, 1617252839, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tumbuh_kembang_siswa`
--

CREATE TABLE `tumbuh_kembang_siswa` (
  `kode_pemeriksaan` varchar(16) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `semester` int(11) NOT NULL,
  `usia_pemeriksaan` int(8) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `lingkar_kepala` int(11) NOT NULL,
  `daya_lihat` varchar(16) NOT NULL,
  `daya_dengar` varchar(16) NOT NULL,
  `ket_kuku` varchar(16) NOT NULL,
  `ket_rambut` varchar(16) NOT NULL,
  `ket_gigi` varchar(16) NOT NULL,
  `perkembangan_anak` varchar(16) NOT NULL,
  `nis` int(128) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tumbuh_kembang_siswa`
--

INSERT INTO `tumbuh_kembang_siswa` (`kode_pemeriksaan`, `tgl_pemeriksaan`, `semester`, `usia_pemeriksaan`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `daya_lihat`, `daya_dengar`, `ket_kuku`, `ket_rambut`, `ket_gigi`, `perkembangan_anak`, `nis`, `nip`) VALUES
('PMN-001', '2021-10-13', 1, 5, 90, 40, 5, 'Normal', 'Normal', 'Sehat', 'Sehat', 'Sehat', 'Ya', 1301208569, '198206142009011005'),
('PMN-002', '2021-10-15', 1, 6, 5, 5, 5, 'normal', 'normal', 'bagus', 'bagus', 'bagus', 'bagus', 321020121, '198206142009011005');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(35, 'reynaldi.octavially@gmail.com', 'GTSDlS4y6rM/+fnfxiU4wNhzTOnlVmIpXzTkxcPFKRs=', 1634266770);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `aktivitas_siswa`
--
ALTER TABLE `aktivitas_siswa`
  ADD PRIMARY KEY (`kode_aktivitas_siswa`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `file_doa`
--
ALTER TABLE `file_doa`
  ADD PRIMARY KEY (`kode_file`);

--
-- Indexes for table `file_jadwal`
--
ALTER TABLE `file_jadwal`
  ADD PRIMARY KEY (`kode_file`);

--
-- Indexes for table `file_kurikulum`
--
ALTER TABLE `file_kurikulum`
  ADD PRIMARY KEY (`kode_file`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pembelajaran_alquran`
--
ALTER TABLE `pembelajaran_alquran`
  ADD PRIMARY KEY (`kode_pembelajaran_alquran`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pertumbuhan_siswa`
--
ALTER TABLE `pertumbuhan_siswa`
  ADD PRIMARY KEY (`kode_pertumbuhan`),
  ADD KEY `nis` (`nis`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tumbuh_kembang_siswa`
--
ALTER TABLE `tumbuh_kembang_siswa`
  ADD PRIMARY KEY (`kode_pemeriksaan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas_siswa`
--
ALTER TABLE `aktivitas_siswa`
  ADD CONSTRAINT `aktivitas_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelajaran_alquran`
--
ALTER TABLE `pembelajaran_alquran`
  ADD CONSTRAINT `pembelajaran_alquran_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelajaran_alquran_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertumbuhan_siswa`
--
ALTER TABLE `pertumbuhan_siswa`
  ADD CONSTRAINT `pertumbuhan_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertumbuhan_siswa_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tumbuh_kembang_siswa`
--
ALTER TABLE `tumbuh_kembang_siswa`
  ADD CONSTRAINT `tumbuh_kembang_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tumbuh_kembang_siswa_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
