-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2016 pada 12.06
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man_19`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `password`, `level`) VALUES
('1311500118', 'budiluhur', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` char(18) NOT NULL,
  `nm_guru` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nm_guru`, `password`, `telp`, `email`, `level`) VALUES
('1311500118', 'Ripal Abadi', '1311500118', '02154687590123', 'ripal@abadi.com', 'guru'),
('1311501835', 'Muhamad Ade Kumiz', 'adekumis', '321654648', 'adem.madek@gmail.com', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mp`
--

CREATE TABLE `mp` (
  `id_mp` char(6) NOT NULL,
  `nm_mp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mp`
--

INSERT INTO `mp` (`id_mp`, `nm_mp`) VALUES
('KP001', 'Kimia'),
('KP002', 'Fisika'),
('KP003', 'Algoritma'),
('KP004', 'Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(7) NOT NULL,
  `id_mp` char(6) NOT NULL,
  `nip` char(18) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `jam` varchar(11) NOT NULL,
  `jns_ujian` char(3) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `thn_ajar` varchar(10) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `nip_pan` char(18) NOT NULL,
  `key` varchar(50) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text NOT NULL,
  `tgl_download` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_mp`, `nip`, `deskripsi`, `tgl_ujian`, `jam`, `jns_ujian`, `semester`, `thn_ajar`, `kelas`, `nip_pan`, `key`, `tgl_upload`, `file`, `tgl_download`, `status`) VALUES
('SE00001', 'KP004', '1311501835', 'cxvxcvxc', '2016-08-24', '12:30', 'UTS', 'Genap', '2016/2017', '12', '1311500118', 'cmlwYWwxMjM=', '2016-08-09 09:49:56', '../upload/b.ing lanjutan.docx', '2016-08-09 16:49:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
