-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 09 Des 2014 pada 02.19
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
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bdg_pekerjaan` varchar(10) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `file_cv` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_job`
--

CREATE TABLE IF NOT EXISTS `list_job` (
  `kode_job` varchar(10) NOT NULL,
  `tgl_update` datetime NOT NULL,
  `nama_job` varchar(50) NOT NULL,
  `requirements` text NOT NULL,
  `terpenuhi` tinyint(1) NOT NULL,
  PRIMARY KEY (`kode_job`),
  UNIQUE KEY `kode_job` (`kode_job`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_admin`
--

CREATE TABLE IF NOT EXISTS `ms_admin` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'Panjang karena ada proses enkripsi',
  `nama` varchar(50) NOT NULL,
  `email_pemulihan` varchar(50) NOT NULL,
  `kata_hint` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `ms_admin`
--

INSERT INTO `ms_admin` (`id`, `username`, `password`, `nama`, `email_pemulihan`, `kata_hint`) VALUES
(1, 'trilogic', '$2y$10$TrilogicUBMSaltFormatecomQgGT5VopbdCvdiUGtxRKsvfr32Cu', 'Administrator', 'nichkotama@gmail.com', 'Gita');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_contact`
--

CREATE TABLE IF NOT EXISTS `ms_contact` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp_1` varchar(50) NOT NULL,
  `no_telp_2` varchar(50) NOT NULL,
  `no_fax` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_file`
--

CREATE TABLE IF NOT EXISTS `ms_file` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `file_location` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_jasa`
--

CREATE TABLE IF NOT EXISTS `ms_jasa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kategori`
--

CREATE TABLE IF NOT EXISTS `ms_kategori` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_logo`
--

CREATE TABLE IF NOT EXISTS `ms_logo` (
  `img_location` varchar(50) NOT NULL,
  `alignment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
