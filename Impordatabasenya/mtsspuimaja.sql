-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 06:45 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtsspuimaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `ip` varchar(20) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `online` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`ip`, `id_siswa`, `tanggal`, `online`) VALUES
('116.206.15.8', 1, '2020-03-31 00:00:00', 'T'),
('114.125.15.179', 1, '2020-04-06 22:37:07', 'T'),
('114.5.210.228', 1, '2020-04-13 16:50:28', 'T'),
('114.125.15.124', 1, '2020-04-13 20:33:49', 'T'),
('114.125.31.141', 1, '2020-04-13 20:36:06', 'T'),
('114.5.253.43', 1, '2020-04-13 20:54:41', 'T'),
('114.5.253.43', 1, '2020-04-13 21:29:52', 'T'),
('114.125.15.124', 1, '2020-04-13 21:35:40', 'T'),
('120.188.38.57', 1, '2020-04-18 23:01:57', 'T'),
('120.188.38.57', 1, '2020-04-18 23:25:11', 'Y'),
('114.5.253.92', 1, '2020-04-19 21:27:56', 'Y'),
('114.122.6.149', 2, '2020-04-19 22:03:17', 'Y'),
('114.5.248.83', 1, '2020-04-20 21:25:23', 'Y'),
('114.5.248.83', 1, '2020-04-20 22:29:15', 'Y'),
('114.5.216.246', 1, '2020-04-21 21:15:44', 'Y'),
('114.5.216.246', 7, '2020-04-21 21:17:56', 'Y'),
('114.5.216.246', 7, '2020-04-21 21:30:23', 'Y'),
('114.5.216.246', 7, '2020-04-21 21:38:02', 'Y'),
('114.5.216.246', 7, '2020-04-21 22:20:43', 'Y'),
('114.5.216.246', 7, '2020-04-21 22:52:35', 'Y'),
('114.5.216.246', 11, '2020-04-22 22:00:34', 'Y'),
('114.5.216.246', 11, '2020-04-22 22:32:36', 'Y'),
('114.5.216.246', 11, '2020-04-22 22:34:18', 'Y'),
('::1', 7, '2020-05-24 10:46:34', 'Y'),
('::1', 1, '2020-05-24 10:51:12', 'Y'),
('::1', 1, '2020-05-24 10:59:29', 'Y'),
('::1', 1, '2020-05-24 11:03:34', 'Y'),
('::1', 1, '2020-05-24 11:09:59', 'Y'),
('::1', 1, '2020-05-24 11:36:43', 'Y'),
('::1', 1, '2020-05-24 11:40:30', 'Y'),
('::1', 2, '2020-05-24 11:53:41', 'Y'),
('::1', 1, '2020-05-24 12:59:07', 'Y'),
('::1', 21, '2020-05-24 13:18:49', 'Y'),
('::1', 1, '2020-06-16 09:58:55', 'Y'),
('::1', 1, '2020-06-18 04:21:57', 'Y'),
('::1', 16, '2020-06-18 04:50:50', 'Y'),
('::1', 23, '2020-06-19 14:22:14', 'Y'),
('::1', 23, '2020-06-19 14:32:04', 'Y'),
('::1', 23, '2020-06-19 14:41:56', 'Y'),
('::1', 23, '2020-06-19 14:48:23', 'Y'),
('::1', 23, '2020-06-19 15:14:33', 'Y'),
('::1', 23, '2020-06-20 04:34:23', 'Y'),
('::1', 16, '2020-06-21 06:10:35', 'Y'),
('::1', 23, '2020-06-21 06:15:25', 'Y'),
('::1', 23, '2020-06-22 04:09:48', 'Y'),
('::1', 23, '2020-06-22 07:36:43', 'Y'),
('::1', 4, '2020-06-25 15:45:49', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT 'administrator',
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'admin',
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_session` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `level`, `alamat`, `no_telp`, `email`, `blokir`, `id_session`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin SMP MTSS PUI Maja', 'admin', 'Majalengka', '081546405120', 'mtsspuimaja@gmail.com', 'N', 'eg7tns2mkb4vuk4s329p155vn2');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `aktif`) VALUES
(2, 2, 'Jadwal masuk kelas 7a', 'diberitahukan untuk kelas 7 A masuk pada tanggal 8 agustus', 'Minggu', '2020-07-12', '16:42:11', '', 4, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_materi`
--

CREATE TABLE `file_materi` (
  `id_file` int(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_matapelajaran` varchar(5) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tgl_posting` date NOT NULL,
  `tgl_batas_upload` date NOT NULL,
  `pembuat` varchar(50) NOT NULL,
  `hits` int(3) NOT NULL,
  `uploads` int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_materi`
--

INSERT INTO `file_materi` (`id_file`, `judul`, `id_kelas`, `id_matapelajaran`, `nama_file`, `tgl_posting`, `tgl_batas_upload`, `pembuat`, `hits`, `uploads`) VALUES
(4, 'bahasa inggris lanjut per 4', 'k9a', 'Bi29', 'Intro.pdf', '2020-07-08', '0000-00-00', '1', 0, 0),
(5, 'agama8', 'K7a', 'AGK7a', '', '2020-07-11', '0000-00-00', '1', 4, 0),
(6, 'Agama pert 9', 'K7a', 'AGK7a', 'riwayat hidup melamar kerja.pdf', '2020-07-12', '2020-07-13', '1', 5, 1),
(7, 'agama part 10', 'K7a', 'AGK7a', 'FORMAT-SURAT-LAMARAN.pdf', '2020-07-18', '2020-07-19', '1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(50) NOT NULL,
  `id_tq` int(50) NOT NULL,
  `id_quiz` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_tq`, `id_quiz`, `id_siswa`, `jawaban`) VALUES
(1, 1, 1, 1, ''),
(2, 1, 1, 7, 'enam\r\n'),
(3, 1, 1, 11, '4\r\n'),
(4, 8, 6, 4, 'Sulaiman'),
(5, 9, 7, 4, 'api\r\n'),
(6, 10, 8, 4, 'Wajib\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`) VALUES
(1, 'jadwal ibur', 'jadwal-ibur', 'Y'),
(2, 'Jadwal Masuk', 'jadwal-masuk', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(5) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_pengajar` int(9) NOT NULL,
  `id_siswa` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_kelas`, `nama`, `id_pengajar`, `id_siswa`) VALUES
(28, 'K7a', 'Kelas VII-A', 1, 5),
(29, 'K7b', 'Kelas VII-B', 2, 1),
(30, 'K7c', 'Kelas VII-C', 3, 3),
(32, 'K8a', 'Kelas VIII-A', 3, 2),
(33, 'k9a', 'Kelas IX-A', 1, 0),
(35, '9d', 'IX-D', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(5) NOT NULL,
  `id_matapelajaran` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_pengajar` int(9) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `id_matapelajaran`, `nama`, `id_kelas`, `id_pengajar`, `deskripsi`) VALUES
(1, 'AGK7a', 'Agama', 'K7a', 1, 'Agama Kelas VII-A'),
(2, 'AGK7b', 'Agama', 'K7b', 0, ''),
(3, 'BIK7a', 'Bahasa Indonesia', 'K7a', 2, 'Bahasa Indonesia Kelas 7a'),
(4, 'BIK7b', 'Bahasa Indonesia', 'K7b', 2, 'Bahasa Indonesia Kelas 7b'),
(5, 'Bi29', 'Bahasa Inggris 2', 'k9a', 1, 'Bahasa inggris 9a'),
(6, 'k8', 'kesenian kelas 8', 'K8a', 5, 'Pelajaran kesenian kelas delapan'),
(7, '9olahraga', 'olah raga', '9d', 5, 'pelajarann');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('pengajar','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(1, 'Manajemen Admin', '?module=admin', '', '', 'N', 'admin', 'N', 2, ''),
(2, 'Materi', '?module=materi', '', '', 'N', 'pengajar', 'Y', 6, 'semua-berita.html'),
(3, 'Manajemen Siswa', '?module=siswa', '', 'gedungku.jpg', 'Y', 'admin', 'Y', 3, 'profil-kami.html'),
(4, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'N', 1, ''),
(5, 'Mata Pelajaran', '?module=matapelajaran', '', '', 'Y', 'pengajar', 'Y', 5, ''),
(6, 'Manajemen Quiz', '?module=quiz', '', '', 'N', 'pengajar', 'Y', 7, ''),
(7, 'Manajemen Kelas', ' ?module=kelas', '', '', 'N', 'pengajar', 'Y', 4, 'semua-agenda.html'),
(8, 'Registrasi Siswa', '?module=registrasi', '', '', 'Y', 'admin', 'Y', 8, ''),
(9, 'Laporan Absensi', '?module=laporanabsensi', '', '', 'Y', 'pengajar', 'Y', 9, ''),
(10, 'Laporan Nilai', '?module=laporannilai', '', '', 'Y', 'pengajar', 'Y', 10, ''),
(11, 'Kategori Berita', '?module=kategori', '', '', 'Y', 'admin', 'Y', 11, ''),
(12, 'Berita', '?module=berita', '', '', 'Y', 'admin', 'Y', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(50) NOT NULL,
  `id_tq` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `benar` int(10) NOT NULL,
  `salah` int(10) NOT NULL,
  `tidak_dikerjakan` int(50) NOT NULL,
  `persentase` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_soal_esay`
--

CREATE TABLE `nilai_soal_esay` (
  `id` int(50) NOT NULL,
  `id_tq` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_soal_esay`
--

INSERT INTO `nilai_soal_esay` (`id`, `id_tq`, `id_siswa`, `nilai`) VALUES
(1, 1, 1, '10'),
(2, 1, 7, '100'),
(3, 1, 11, '10'),
(4, 9, 4, '100');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

CREATE TABLE `online` (
  `ip` varchar(20) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `online` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`ip`, `id_siswa`, `tanggal`, `online`) VALUES
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 1, '2020-06-18 04:21:57', 'T'),
('::1', 7, '2020-05-24 10:46:34', 'T'),
('114.5.216.246', 11, '2020-04-22 22:34:18', 'Y'),
('::1', 2, '2020-05-24 11:53:41', 'T'),
('::1', 21, '2020-05-24 13:18:49', 'Y'),
('::1', 16, '2020-06-21 06:10:35', 'T'),
('::1', 23, '2020-06-22 07:36:43', 'Y'),
('::1', 4, '2020-06-25 15:45:49', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(9) NOT NULL,
  `nip` char(12) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username_login` varchar(100) NOT NULL,
  `password_login` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'pengajar',
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `jabatan` varchar(200) NOT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_session` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nip`, `nama_lengkap`, `username_login`, `password_login`, `level`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `foto`, `website`, `jabatan`, `blokir`, `id_session`) VALUES
(1, '10101010102', 'Amiruddin S.Ag', 'amiruddin', '097e20b79a9d707245c2aba5d231b909', 'pengajar', 'Jln. Kartini No.102 - Majalengka', 'Surabaya', '1989-10-23', 'L', 'Islam', '085228482669', 'amiruddin@gmail.com', 'foto.jpg', 'www.amiruddin.com', 'Kepala Sekolah', 'N', 'ou351hcs07ajj5dj359df98kc1'),
(2, '10101010103', 'Rina Agustin', 'rina', '3aea9516d222934e35dd30f142fda18c', 'pengajar', '', '', '1990-08-03', 'P', 'Islam', '', '', '', 'http://', 'Guru', 'N', '35227322311f800ce1cb9d1ccc8a58fa'),
(3, '10101010104', 'Agus Suryo', 'agus', 'fdf169558242ee051cca1479770ebac3', 'pengajar', '', '', '1983-04-19', 'L', 'Islam', '', '', '', 'http://', '', 'N', '10101010104'),
(4, '1444', 'Jordi Irawan', 'jordi', '83d53db77bff97220353e490bf373403', 'pengajar', 'medan jaya , bunga cirebon', 'medan ', '1967-04-20', 'L', 'Islam', '099383', 'jordi@gmail.com', '', 'http://', 'Guru', 'N', '1444'),
(5, '1900', 'tono sucioto', 'tono', '14d2d4119982cd6c68a566e523cb16ae', 'pengajar', 'jln surabaya', 'medan', '1988-06-19', 'L', 'Islam', '089999', 'tono@gmail.com', '', 'http://', 'Guru', 'N', '29eu1oj6bsthagunstn71n68i4');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_esay`
--

CREATE TABLE `quiz_esay` (
  `id_quiz` int(9) NOT NULL,
  `id_tq` int(9) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL,
  `jenis_soal` varchar(50) NOT NULL DEFAULT 'esay'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_esay`
--

INSERT INTO `quiz_esay` (`id_quiz`, `id_tq`, `pertanyaan`, `gambar`, `tgl_buat`, `jenis_soal`) VALUES
(9, 11, 'nabi isa mempunyai kitab?', '', '2020-07-08', 'esay'),
(7, 9, 'manusia terbuat', '', '2020-06-28', 'esay'),
(8, 10, 'Hukum puasa ramadhan adalah?', '', '2020-07-03', 'esay');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_pilganda`
--

CREATE TABLE `quiz_pilganda` (
  `id_quiz` int(10) NOT NULL,
  `id_tq` int(9) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `kunci` varchar(1) NOT NULL,
  `tgl_buat` date NOT NULL,
  `jenis_soal` varchar(50) NOT NULL DEFAULT 'pilganda'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_pilganda`
--

INSERT INTO `quiz_pilganda` (`id_quiz`, `id_tq`, `pertanyaan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `kunci`, `tgl_buat`, `jenis_soal`) VALUES
(21, 11, 'nabi terakhir', '', 'muhammad', 'ibrahim', 'isa', 'sulaeman', 'A', '2020-07-08', 'pilganda'),
(20, 10, 'Babi dimakan?', '', 'Boleh', 'Sunah', 'Haram', 'Mubah', 'C', '2020-07-03', 'pilganda'),
(19, 10, 'Naik haji', '', 'Wajib bagi yang mampu', 'sunah', 'murtad', 'dosa', 'A', '2020-07-03', 'pilganda'),
(18, 9, 'bunuh diri?', '', 'dosa', 'sunah', 'pahala', 'mubah', 'A', '2020-06-28', 'pilganda'),
(14, 7, 'cristiano ronaldo adalah atlet?', '', 'bulu tangkis', 'sepak bola', 'bulu tangkis', 'renang', 'B', '2020-06-19', 'pilganda'),
(13, 7, 'yang main 11 orang', '', 'sepak bola', 'poli', 'renang', 'carut', 'A', '2020-06-19', 'pilganda'),
(12, 7, 'olah raga yang diair', '', 'renang', 'poli', 'badminton', 'panah', 'A', '2020-06-19', 'pilganda');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_siswa`
--

CREATE TABLE `registrasi_siswa` (
  `id_registrasi` int(9) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username_login` varchar(50) NOT NULL,
  `password_login` varchar(50) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `th_masuk` varchar(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_session_soal` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'siswa'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(9) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username_login` varchar(50) NOT NULL,
  `password_login` varchar(50) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `th_masuk` varchar(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_session_soal` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'siswa'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_lengkap`, `username_login`, `password_login`, `id_kelas`, `jabatan`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `nama_ayah`, `nama_ibu`, `th_masuk`, `email`, `no_telp`, `foto`, `blokir`, `id_session`, `id_session_soal`, `level`) VALUES
(1, '99999', 'Hasan', 'hasan', 'fc3f318fba8b3c1502bece62a27712df', 'K7b', 'siswa', 'Delima No.0 Rt 0 Rw 2 Majalengka', 'Bekasi', '2007-08-10', 'L', 'Islam', '--', '--', '2007', 'hasan@yahoo.com', '090909', 'IMG_4186.JPG', 'N', 'p134tqsslo1nej6a6dpsrbgat1', '99999', 'siswa'),
(2, '13112064', 'Hilman ', 'hilman', 'cf081b11e184de45ecce347f758936f9', 'K7b', '', '', '', '2007-03-31', 'L', 'Islam', '', '', '2007', 'hilman@gmail.com', '', '', 'N', '13112064', '13112064', 'siswa'),
(3, '10800800', 'Sugianto', 'sugianto', '64209e8f856591b9adb1223cb92af807', 'K7c', 'siswa', 'alamat', 'tempat lahir', '2007-05-15', 'L', 'Islam', 'emboh', 'emboh', '2007', 'sugianto@yahoo.com', '0000', '', 'N', '10800800', '10800800', 'siswa'),
(4, '10800801', 'Siska', 'siska', 'afa0b885505255964c06188e2b4e8f59', 'K7a', 'Ketua Kelas', 'alamat', 'tempat lahir', '2007-12-28', 'P', 'islam', '--', '--', '2007', 'siska@gmail.com', '', '', 'N', '10800801', '10800801', 'siswa'),
(5, '10800802', 'Syamsul', 'syamsul', '564d5ea829ce8977fb848c0a654c7888', 'K7a', '', 'alamat', 'asdf', '2007-03-10', 'L', 'islam', 'asd', 'asdfgas', '2012', 'syamsul@gmail.com', '', '', 'N', '10800802', '10800802', 'siswa'),
(6, '80000000', 'Fatimah', 'fatimah', '3610528e7fee68c6ffb0445603ef2c8e', 'K7c', 'murid', 'jln jatiwangi majalengka', 'majalengka', '2004-04-20', 'P', 'Islam', 'tikkg ', 'gmhg ', '2019', 'hasnnsn@gmail.com', '08887', '', 'N', '80000000', '80000000', 'siswa'),
(7, '71234455', 'Firman ', 'firman', '74bfebec67d1a87b161e5cbcf6f72a4a', 'K7a', 'murid', 'jln maja utara 20', 'majalengka', '2020-04-20', 'L', 'Islam', 'rosandi', 'tika ', '2019', 'tika@mail.com', '0888777', '', 'N', '6fh9jfvdftjegbctm4sk27rpd7', '71234455', 'siswa'),
(8, '0899', 'yaya taure', '0899', '47c8c701a4cd6e769579376af52560cc', 'k9a', '', 'jln cigasong no 1 majalengka', 'majalengka', '2003-04-21', 'L', 'islam', 'tio subroto', 'hesti niken', '2018', 'yaya@gmail.com', '', '', 'Y', '', '', 'siswa'),
(9, '88', 'hikma', '88', '2a38a4a9316c49e5a833517c45d31070', 'k9a', '', 'hdjjdkl', 'jdjjdj', '2014-04-21', 'L', 'islam', 'firza', 'siti', '2020', 'hikma@gmail.com', '', '', 'Y', '', '', 'siswa'),
(10, '4455', 'mantap', '4455', 'd2b15c75c0c389b49c2efbea79cdc946', 'K7a', '', 'bhjdkdk', 'jombang', '2008-04-21', 'L', 'islam', 'herman', 'eka', '2020', 'mantap@gmail.com', '', '', 'N', '4455', '4455', 'siswa'),
(12, '23444', 'benar', '23444', '0cdb1d5ad16db6803413590d6ae7cb2e', 'K7a', '', 'jkl', 'jogja', '2004-04-22', 'L', 'islam', 'benar', 'benar', '2020', 'benar@gmail.com', '', '', 'N', '23444', '23444', 'siswa'),
(13, '133', 'toni', '133', '9fc3d7152ba9336a670e36d0ed79bc43', 'K7a', '', 'jkgkgkgk', 'maja', '2014-05-07', 'L', 'islam', 'mmm', 'mm', '2019', 'toni@gmail.com', '', '', 'Y', '', '', 'siswa'),
(14, '0987', 'Randy putra', '0987', '9e1e06ec8e02f0a0074f2fcc6b26303b', 'K7c', '', 'jln merdeka maja', 'pontianak', '2009-05-09', 'L', 'islam', 'iman', 'imah', '2019', 'rs@gmail.com', '', '', 'Y', '', '', 'siswa'),
(15, '133', 'toni', '133', '9fc3d7152ba9336a670e36d0ed79bc43', 'K7a', '', 'jkgkgkgk', 'maja', '2014-05-07', 'L', 'islam', 'mmm', 'mm', '2019', 'toni@gmail.com', '', '', 'Y', '', '', 'siswa'),
(16, '4555', 'giro', 'giro', 'ab3b6f18a4615949298d38c3fd3cc32b', 'k9a', '', 'jklll', 'cirebon', '2012-05-24', 'L', 'islam', 'nuttti', 'jirro', '2020', 'giro@gmail.com', '', '', 'N', 'cpkq04q2sohe4csiietpv300u0', '4555', 'siswa'),
(23, '09871', 'Tagor sinaga', 'tagor', 'e4c51775272b2a54a17cb05506d3f5fa', '9d', '', 'jln subuh', 'subang', '2014-06-19', 'L', 'islam', 'sunan', 'surti', '2020', 'tagors@gmail.com', '', '', 'N', 'li6mb6oe061l2e5f466ouuv6f6', '09871', 'siswa'),
(18, '878', 'tika pangabean', '878', 'c27cd12c8034c739304c22a3a3748e39', 'K7b', '', 'jln.padang nomer 9', 'cirebon', '2009-05-24', 'P', 'islam', 'Rudi sunarto', 'Amelia tika', '2016', 'tika@gmail.com', '', '', 'Y', '878', '878', 'siswa'),
(24, '222', 'hamka', 'hamka', '2dd6f2805d944550e511188d124b54d9', 'K7c', '', 'jlkkkk', 'cirebon', '2018-07-08', 'L', 'islam', 'iman', 'rina', '2020', 'hamka@gmail.com', '', '', 'N', '222', '222', 'siswa'),
(19, 'abas', 'abas irfan', 'abas', '8462a1a67fbed2bef22d490d88e35944', 'K7b', '', 'jln bandung', 'bandung', '2008-05-24', 'L', 'islam', 'hirta', 'tini', '2019', 'irfan@gmail.com', '', '', 'Y', '', '', 'siswa'),
(20, '91234', ' hansam', '91234', 'ca1305ba0cdbb2805ed431c3adc47b20', 'K7b', '', 'jln maja', 'cirebon', '2020-05-24', 'P', 'islam', 'andini', 'rita', '2020', 'hansam@yahoo.com', '', '', 'Y', '', '', 'siswa'),
(21, '0555', 'tika baru', 'tika', 'c27cd12c8034c739304c22a3a3748e39', 'K7b', '', 'jln jakarta', 'bandung', '2020-05-24', 'P', 'islam', 'jaj', 'eer', '2020', 'tikabaru@yahoo.com', '', '', 'N', '0fuoccqjv8imv43goumfjp3e36', '0555', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_sudah_mengerjakan`
--

CREATE TABLE `siswa_sudah_mengerjakan` (
  `id` int(20) NOT NULL,
  `id_tq` int(20) NOT NULL,
  `id_siswa` int(9) NOT NULL,
  `dikoreksi` varchar(1) NOT NULL DEFAULT 'B',
  `hits` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_sudah_mengerjakan`
--

INSERT INTO `siswa_sudah_mengerjakan` (`id`, `id_tq`, `id_siswa`, `dikoreksi`, `hits`) VALUES
(1, 1, 1, 'S', 1),
(2, 1, 7, 'S', 1),
(3, 0, 7, 'B', 1),
(4, 1, 11, 'S', 1),
(6, 4, 2, 'B', 1),
(7, 4, 21, 'B', 1),
(8, 8, 4, 'B', 1),
(9, 9, 4, 'S', 1),
(10, 10, 4, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_sudah_upload`
--

CREATE TABLE `siswa_sudah_upload` (
  `id` int(20) NOT NULL,
  `id_file` int(7) NOT NULL,
  `id_siswa` int(9) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hits` int(11) NOT NULL DEFAULT '0',
  `downloads` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_sudah_upload`
--

INSERT INTO `siswa_sudah_upload` (`id`, `id_file`, `id_siswa`, `nama_file`, `tgl_upload`, `hits`, `downloads`) VALUES
(1, 7, 4, '1.pdf', '2020-07-18 11:22:52', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(1, 'Standar', 'Pui Maja', 'templates/puimaja', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `topik_quiz`
--

CREATE TABLE `topik_quiz` (
  `id_tq` int(9) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_matapelajaran` varchar(10) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `waktu_pengerjaan` int(50) NOT NULL,
  `info` text NOT NULL,
  `terbit` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topik_quiz`
--

INSERT INTO `topik_quiz` (`id_tq`, `judul`, `id_kelas`, `id_matapelajaran`, `tgl_buat`, `pembuat`, `waktu_pengerjaan`, `info`, `terbit`) VALUES
(11, 'Agama Part 6', 'K7a', 'AGK7a', '2020-07-08', '1', 1800, 'kerjakan', 'Y'),
(9, 'Agama pert 4', 'K7a', 'AGK7a', '2020-06-28', '1', 1800, 'kerjakan', 'Y'),
(7, 'olahraga pert1', '9d', '9olahraga', '2020-06-21', '5', 1200, 'kerjakan', 'Y'),
(10, 'Agama Part 5', 'K7a', 'AGK7a', '2020-07-03', '1', 1800, 'Kerjakan dengan benar', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_materi`
--
ALTER TABLE `file_materi`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_soal_esay`
--
ALTER TABLE `nilai_soal_esay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `quiz_esay`
--
ALTER TABLE `quiz_esay`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `quiz_pilganda`
--
ALTER TABLE `quiz_pilganda`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `registrasi_siswa`
--
ALTER TABLE `registrasi_siswa`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_sudah_mengerjakan`
--
ALTER TABLE `siswa_sudah_mengerjakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_sudah_upload`
--
ALTER TABLE `siswa_sudah_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `topik_quiz`
--
ALTER TABLE `topik_quiz`
  ADD PRIMARY KEY (`id_tq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_materi`
--
ALTER TABLE `file_materi`
  MODIFY `id_file` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `nilai_soal_esay`
--
ALTER TABLE `nilai_soal_esay`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz_esay`
--
ALTER TABLE `quiz_esay`
  MODIFY `id_quiz` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `quiz_pilganda`
--
ALTER TABLE `quiz_pilganda`
  MODIFY `id_quiz` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `registrasi_siswa`
--
ALTER TABLE `registrasi_siswa`
  MODIFY `id_registrasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `siswa_sudah_mengerjakan`
--
ALTER TABLE `siswa_sudah_mengerjakan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `siswa_sudah_upload`
--
ALTER TABLE `siswa_sudah_upload`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topik_quiz`
--
ALTER TABLE `topik_quiz`
  MODIFY `id_tq` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
