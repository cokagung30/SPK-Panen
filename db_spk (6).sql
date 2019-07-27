-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 01:27 PM
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
  `id_data_ayam` int(4) NOT NULL,
  `id_periode` int(4) NOT NULL,
  `umur` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_mati` int(4) NOT NULL,
  `berat_rata` double NOT NULL,
  `jml_pakan` double NOT NULL,
  `harga` int(100) NOT NULL,
  `ip` double NOT NULL,
  `fcr` double NOT NULL,
  `mortalitas` double NOT NULL,
  `id_kelayakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ayam`
--

INSERT INTO `data_ayam` (`id_data_ayam`, `id_periode`, `umur`, `tanggal`, `jml_mati`, `berat_rata`, `jml_pakan`, `harga`, `ip`, `fcr`, `mortalitas`, `id_kelayakan`) VALUES
(2, 20, 1, '2019-07-13', 8, 50, 1.2, 10000, 0, 0.24, 0.16, 1),
(3, 20, 2, '2019-07-14', 4, 62, 1.5, 10000, 0, 0.435, 0.24, 1),
(4, 20, 3, '2019-07-15', 8, 77, 1.9, 20000, 0, 0.597, 0.4, 1),
(5, 20, 4, '2019-07-16', 5, 96, 2.2, 10000, 0, 0.708, 0.5, 1),
(6, 20, 5, '2019-07-18', 10, 118, 2.6, 10000, 0, 0.797, 0.7, 1),
(7, 20, 6, '2019-07-17', 8, 142, 3.1, 10000, 0, 0.88, 0.86, 1),
(8, 20, 7, '2019-07-23', 7, 169, 3.5, 10000, 252.459, 0.947, 1, 1),
(9, 20, 8, '2019-07-23', 4, 198, 3.9, 18000, 243.597, 1.005, 1.08, 1),
(10, 20, 9, '2019-07-30', 4, 230, 4.4, 10000, 239.078, 1.057, 1.16, 1),
(11, 20, 10, '2019-07-26', 4, 266, 5.3, 10000, 236.12, 1.113, 1.24, 1),
(12, 20, 11, '2019-07-17', 3, 304, 5.3, 10000, 237.6, 1.148, 1.3, 1),
(13, 20, 12, '2019-07-23', 4, 346, 5.7, 10000, 242.332, 1.173, 1.38, 1),
(14, 20, 13, '2019-07-20', 2, 389, 6.2, 10000, 245.188, 1.203, 1.42, 1),
(15, 20, 14, '2019-07-25', 4, 436, 6.6, 10000, 250.461, 1.225, 1.5, 1),
(16, 20, 15, '2019-07-09', 4, 487, 7.1, 10000, 257.214, 1.242, 1.58, 1),
(17, 20, 16, '2019-07-16', 3, 541, 7.6, 10000, 264.208, 1.259, 1.64, 1),
(18, 20, 17, '2019-07-18', 3, 598, 8.1, 10000, 271.364, 1.274, 1.7, 1),
(19, 20, 18, '2019-07-25', 4, 658, 8.6, 10000, 278.601, 1.289, 1.78, 1),
(20, 20, 19, '2019-07-26', 4, 721, 9.1, 10000, 285.955, 1.302, 1.86, 1),
(21, 20, 20, '2019-07-26', 3, 789, 9.5, 10000, 295.246, 1.311, 1.92, 1),
(22, 20, 21, '2019-07-27', 36, 851, 10, 10000, 296.079, 1.333, 2.64, 1),
(23, 20, 22, '2019-07-25', 2, 919, 10.4, 10000, 301.78, 1.347, 2.68, 1),
(24, 20, 23, '2019-07-11', 9, 987, 10.8, 10000, 305.675, 1.364, 2.86, 1),
(25, 20, 24, '2019-07-17', 4, 1057, 11.7, 10000, 308.841, 1.384, 2.94, 1),
(26, 20, 25, '2019-07-24', 10, 1127, 11.7, 10000, 311.455, 1.402, 3.14, 1),
(27, 20, 26, '2019-07-23', 10, 1200, 11.7, 10000, 315.47, 1.414, 3.34, 1),
(28, 20, 27, '2019-07-23', 10, 1284, 12.8, 19000, 322.738, 1.421, 3.54, 1),
(29, 20, 28, '2019-07-27', 6, 1290, 13.1, 20000, 292.725, 1.516, 3.66, 1),
(30, 22, 7, '2019-07-20', 50, 200, 33.2, 18000, 170.396, 1.66, 1, 1),
(31, 22, 8, '2019-07-31', 2, 400, 35, 10000, 290.205, 1.705, 1.04, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kandang`
--

CREATE TABLE `kandang` (
  `id_kandang` int(4) NOT NULL,
  `id_pemilik_kandang` int(4) NOT NULL,
  `id_ppl` int(11) NOT NULL,
  `nama_kandang` varchar(100) NOT NULL,
  `lokasi` text NOT NULL,
  `volume` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandang`
--

INSERT INTO `kandang` (`id_kandang`, `id_pemilik_kandang`, `id_ppl`, `nama_kandang`, `lokasi`, `volume`) VALUES
(31, 14, 1, 'Kandang 1', 'Tabanan', 5000),
(32, 14, 1, 'Kandang Putri', 'Tabanan', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `kelayakan`
--

CREATE TABLE `kelayakan` (
  `id_kelayakan` int(4) NOT NULL,
  `batas_atas` double NOT NULL,
  `batas_bawah` double NOT NULL,
  `status` enum('segera_panen','layak_penen','belum_layak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelayakan`
--

INSERT INTO `kelayakan` (`id_kelayakan`, `batas_atas`, `batas_bawah`, `status`) VALUES
(1, 0, 0.74, 'belum_layak'),
(2, 0.75, 0.77, 'layak_penen'),
(3, 0.78, 1, 'segera_panen');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `n_harga` double NOT NULL,
  `n_ip` double NOT NULL,
  `n_fcr` double NOT NULL,
  `n_mortalitas` double NOT NULL,
  `preferensi` double NOT NULL,
  `id_kelayakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`id_keputusan`, `id_periode`, `n_harga`, `n_ip`, `n_fcr`, `n_mortalitas`, `preferensi`, `id_kelayakan`) VALUES
(6, 20, 1, 1, 0.17, 1, 0.75, 2),
(8, 22, 1, 1, 0.97, 1, 0.99, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(4) NOT NULL,
  `id_kandang` int(4) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_kandang`, `nama_pegawai`, `no_telp`, `username`, `password`) VALUES
(1, 31, 'Pande', '085792206567', 'pande', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kandang`
--

CREATE TABLE `pemilik_kandang` (
  `id_pemilik_kandang` int(4) NOT NULL,
  `id_ppl` int(11) NOT NULL,
  `nama_pemilik_kandang` varchar(20) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_kandang`
--

INSERT INTO `pemilik_kandang` (`id_pemilik_kandang`, `id_ppl`, `nama_pemilik_kandang`, `no_telp`, `email`, `alamat`, `username`, `password`) VALUES
(14, 1, 'Widya sari Ni Made', '123456', 'widya@gmail.com', 'ddfhfj', 'widya', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pemilik_kandang` int(11) NOT NULL,
  `id_data_ayam` int(11) NOT NULL,
  `verifikasi` varchar(200) NOT NULL,
  `status_pengajuan` int(11) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  `notif` int(11) NOT NULL,
  `notif_pemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_pemilik_kandang`, `id_data_ayam`, `verifikasi`, `status_pengajuan`, `catatan`, `notif`, `notif_pemilik`) VALUES
(67, 14, 28, '2', 1, '', 1, 2),
(69, 14, 29, '2', 2, '', 1, 2),
(70, 14, 31, '3', 1, '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(4) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `nomor_periode` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` enum('panen','belum_panen','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `id_kandang`, `nomor_periode`, `keterangan`, `status`) VALUES
(20, 31, 1, 'Periode 1', 'panen'),
(22, 31, 2, 'Periode 2', 'panen');

-- --------------------------------------------------------

--
-- Table structure for table `ppl`
--

CREATE TABLE `ppl` (
  `id_ppl` int(11) NOT NULL,
  `nama_ppl` varchar(100) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppl`
--

INSERT INTO `ppl` (`id_ppl`, `nama_ppl`, `no_telp`, `alamat`, `username`, `password`) VALUES
(1, 'ppl', '1234567', 'gg', 'ppl', 'ppl');

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
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`),
  ADD KEY `id_periode` (`id_periode`);

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
  ADD KEY `id_pemilik_kandang` (`id_pemilik_kandang`),
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
  ADD PRIMARY KEY (`id_ppl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ayam`
--
ALTER TABLE `data_ayam`
  MODIFY `id_data_ayam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id_kelayakan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  MODIFY `id_pemilik_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ppl`
--
ALTER TABLE `ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pemilik_kandang`) REFERENCES `pemilik_kandang` (`id_pemilik_kandang`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_data_ayam`) REFERENCES `data_ayam` (`id_data_ayam`);

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `periode_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
