-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 10:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ayam`
--

CREATE TABLE `data_ayam` (
  `id_data_ayam` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `umur` int(100) NOT NULL,
  `jml_mati` int(100) NOT NULL,
  `berat_rata` double NOT NULL,
  `jml_pakan` double NOT NULL,
  `harga` int(100) NOT NULL,
  `ip` double NOT NULL,
  `fcr` double NOT NULL,
  `mortalitas` double NOT NULL,
  `n_harga` double NOT NULL,
  `n_ip` double NOT NULL,
  `n_fcr` double NOT NULL,
  `n_mortalitas` double NOT NULL,
  `preferensi` double NOT NULL,
  `id_kelayakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kandang`
--

CREATE TABLE `kandang` (
  `id_kandang` int(11) NOT NULL,
  `id_pemilik_kandang` int(11) NOT NULL,
  `nama_kandang` varchar(20) NOT NULL,
  `lokasi` tinyint(4) NOT NULL,
  `volume` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelayakan`
--

CREATE TABLE `kelayakan` (
  `id_kelayakan` int(11) NOT NULL,
  `batas_atas` double NOT NULL,
  `batas_bawah` double NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passsword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kandang`
--

CREATE TABLE `pemilik_kandang` (
  `id_pemilik_kandang` int(11) NOT NULL,
  `nama_pemilik_kandang` varchar(20) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` tinyint(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_data_ayam` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `volume` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppl`
--

CREATE TABLE `ppl` (
  `id_ppl` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ayam`
--
ALTER TABLE `data_ayam`
  ADD PRIMARY KEY (`id_data_ayam`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_kelayakan` (`id_kelayakan`);

--
-- Indexes for table `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`id_kandang`),
  ADD KEY `id_pemilik_kandang` (`id_pemilik_kandang`);

--
-- Indexes for table `kelayakan`
--
ALTER TABLE `kelayakan`
  ADD PRIMARY KEY (`id_kelayakan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_kandang` (`id_kandang`);

--
-- Indexes for table `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  ADD PRIMARY KEY (`id_pemilik_kandang`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_data_ayam` (`id_data_ayam`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD KEY `id_kandang` (`id_kandang`);

--
-- Indexes for table `ppl`
--
ALTER TABLE `ppl`
  ADD PRIMARY KEY (`id_ppl`),
  ADD KEY `id_kandang` (`id_kandang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ayam`
--
ALTER TABLE `data_ayam`
  MODIFY `id_data_ayam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id_kandang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id_kelayakan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  MODIFY `id_pemilik_kandang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppl`
--
ALTER TABLE `ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ayam`
--
ALTER TABLE `data_ayam`
  ADD CONSTRAINT `data_ayam_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`),
  ADD CONSTRAINT `data_ayam_ibfk_2` FOREIGN KEY (`id_kelayakan`) REFERENCES `kelayakan` (`id_kelayakan`);

--
-- Constraints for table `kandang`
--
ALTER TABLE `kandang`
  ADD CONSTRAINT `kandang_ibfk_1` FOREIGN KEY (`id_pemilik_kandang`) REFERENCES `pemilik_kandang` (`id_pemilik_kandang`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_data_ayam`) REFERENCES `data_ayam` (`id_data_ayam`);

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `periode_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);

--
-- Constraints for table `ppl`
--
ALTER TABLE `ppl`
  ADD CONSTRAINT `ppl_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
