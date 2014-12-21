-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 21 Des 2014 pada 12.50
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_ditama`
--
CREATE DATABASE IF NOT EXISTS `db_ditama` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_ditama`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_aplikan`
--

CREATE TABLE IF NOT EXISTS `daftar_aplikan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bdg_pekerjaan` varchar(10) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `file_cv` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `daftar_aplikan`
--

INSERT INTO `daftar_aplikan` (`id`, `nama`, `email`, `alamat`, `bdg_pekerjaan`, `no_hp`, `file_cv`) VALUES
(1, 'Robertus Sakti', 'illtelluasecret@gmail.com', 'Jl. Kebanjiran Lama no 0', 'TS-XII14', '+6282374451441', 'robertus-sakti.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_job`
--

CREATE TABLE IF NOT EXISTS `list_job` (
  `id` varchar(10) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `nama_job` varchar(50) NOT NULL,
  `requirements` text NOT NULL,
  `terpenuhi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_job` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_job`
--

INSERT INTO `list_job` (`id`, `tgl_update`, `nama_job`, `requirements`, `terpenuhi`) VALUES
('TS-XII14', '2014-12-11 00:00:00', 'Technical Support', 'Minimal pendidikan SMA/K. Rajin, jujur, usia max 30 tahun.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_admin`
--

CREATE TABLE IF NOT EXISTS `ms_admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'Panjang karena ada proses enkripsi',
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_hint` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `ms_admin`
--

INSERT INTO `ms_admin` (`id`, `username`, `password`, `nama`, `email`, `kata_hint`) VALUES
(1, 'trilogic', '$2y$10$TrilogicUBMSaltFormatecomQgGT5VopbdCvdiUGtxRKsvfr32Cu', 'Administrator', 'nichkotama@gmail.com', 'Gita'),
(3, 'nichkotama', '$2y$10$TrilogicUBMSaltFormateK2i4cOpNtkCLnQ13wayaQ8aJcB9k6e2', 'Nicholas Kotama', 'nichkotama@gmail.com', 'Gita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_berita`
--

CREATE TABLE IF NOT EXISTS `ms_berita` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `tgl_berita` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_berita`
--

INSERT INTO `ms_berita` (`id`, `judul_berita`, `isi`, `tgl_berita`) VALUES
(1, 'Discount December', 'Dapatkan diskon 10% untuk tiap layanan yang kami sediakan selama bulan Desember!!', '2014-12-11 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_contact`
--

CREATE TABLE IF NOT EXISTS `ms_contact` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp_1` varchar(50) NOT NULL,
  `no_telp_2` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  `gps_location` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_contact`
--

INSERT INTO `ms_contact` (`id`, `nama_instansi`, `alamat`, `email`, `no_telp_1`, `no_telp_2`, `no_fax`, `gps_location`) VALUES
(1, 'Ditama Technologies', 'Jl. Lodan Raya no. 2, Ancol, Jakarta Utara\r\nDKI Jakarta', 'info@ditama.com', '082374451441', '085382516899', '021212121', '-6.130399,106.81803');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_file`
--

CREATE TABLE IF NOT EXISTS `ms_file` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `file_location` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `ms_file`
--

INSERT INTO `ms_file` (`id`, `file_location`, `judul`, `deskripsi`) VALUES
(5, 'manual-book-upload-file.txt', 'Manual book upload file', 'Keterangan disini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jasa`
--

CREATE TABLE IF NOT EXISTS `ms_jasa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `ms_jasa`
--

INSERT INTO `ms_jasa` (`id`, `nama`, `detail`) VALUES
(1, 'Ditama Web Design', 'Kami menyediakan layanan desain web dengan teknologi terbaru dan mutakhir dengan harga bersahabat. Segeralah hubungi kami untuk mendapatkan penawaran khusus, dapat melalui email, telepon, ataupun kunjungi kami'),
(2, 'Ditama Payroll System', 'Anda kesulitan mengelola upah untuk human resources anda? Hubungi kami, kami punya solusinya'),
(3, 'Ditama Design Consultant', 'Apakah anda tahu graphic standard manual? Apakah usaha atau organisasi anda sudah memilikinya? Kalau belum, hubungi kami, dan dapatkan edit value lebih dari standar yang anda terapkan. Kami juga melayani konsultasi desain segala level.'),
(4, 'Ditama Product Add', 'Add product Here\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_logo`
--

CREATE TABLE IF NOT EXISTS `ms_logo` (
  `ekstensi_file` varchar(5) NOT NULL,
  `alignment` varchar(50) NOT NULL,
  `id` int(1) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_logo`
--

INSERT INTO `ms_logo` (`ekstensi_file`, `alignment`, `id`) VALUES
('png', 'left', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_portofolio`
--

CREATE TABLE IF NOT EXISTS `ms_portofolio` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_klien` varchar(100) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `id_jasa` int(3) NOT NULL,
  `deskripsi_porto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_portofolio`
--

INSERT INTO `ms_portofolio` (`id`, `nama_klien`, `tgl_update`, `id_jasa`, `deskripsi_porto`) VALUES
(1, 'PT MNC Media', '2014-11-12 00:00:00', 1, 'Layanan desain UI web MNC media');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_tamu`
--

CREATE TABLE IF NOT EXISTS `ms_tamu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `organisasi` varchar(50) NOT NULL,
  `krisar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ms_tamu`
--

INSERT INTO `ms_tamu` (`id`, `nama`, `email`, `organisasi`, `krisar`) VALUES
(1, 'Nicholas Kotama', 'nichkotama@gmail.com', 'UBM', 'Good luck broo'),
(2, 'Nicholas Kotama', 'nichkotama@gmail.com', 'UBM', 'Kedua');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ms_portofolio`
--
ALTER TABLE `ms_portofolio`
  ADD CONSTRAINT `ms_portofolio_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ms_jasa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
