-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 11:49 AM
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
  `total_mati` double NOT NULL,
  `berat_rata` double NOT NULL,
  `jml_pakan` double NOT NULL,
  `total_pakan` double NOT NULL,
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

--
-- Dumping data for table `data_ayam`
--

INSERT INTO `data_ayam` (`id_data_ayam`, `id_periode`, `umur`, `tanggal`, `jml_mati`, `total_mati`, `berat_rata`, `jml_pakan`, `total_pakan`, `harga`, `ip`, `fcr`, `mortalitas`, `n_harga`, `n_ip`, `n_fcr`, `n_mortalitas`, `preferensi`, `id_kelayakan`) VALUES
(23, 14, 1, '0000-00-00', 8, 0, 50, 1.2, 0, 19000, 2080, 0.24, 0.16, 0, 0, 0, 0, 0, 1),
(24, 15, 1, '0000-00-00', 8, 0, 50, 1.2, 0, 19000, 2080, 0.24, 0.16, 0, 0, 0, 0, 0, 1),
(25, 16, 1, '0000-00-00', 8, 0, 50, 1.2, 0, 10000, 2080, 0.24, 0.16, 0, 0, 0, 0, 0, 1),
(26, 16, 2, '0000-00-00', 12, 0, 62, 1.5, 0, 17000, 709.004, 0.435, 0.4, 0, 0, 0, 0, 0, 1),
(27, 16, 3, '2010-01-12', 15, 0, 70, 1.8, 0, 20000, 360.422, 0.643, 0.7, 0, 0, 0, 0, 0, 1),
(28, 16, 4, '2010-01-02', 13, 48, 100, 2, 6.5, 21000, 380.923, 0.65, 0.96, 0, 0, 0, 0, 0, 1);

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
(18, 11, 1, 'Kandang di Nunggar Sari', 'Jl. Diponegoro', 5000),
(19, 11, 2, 'Kandang Putri', 'jl bukit sari', 5000),
(20, 11, 1, 'Kandang di Nunggar Sari', 'Singaraja', 5000),
(21, 2, 1, 'Cubik1', 'Jl. Tubik pret', 5000);

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
(1, 200, 200, 'layak_penen');

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
(13, 18, 'Pande', '085792206567', 'pande', '123'),
(14, 21, 'Widya Cubik', '098342891472', 'Cubik', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kandang`
--

CREATE TABLE `pemilik_kandang` (
  `id_pemilik_kandang` int(4) NOT NULL,
  `nama_pemilik_kandang` varchar(20) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik_kandang`
--

INSERT INTO `pemilik_kandang` (`id_pemilik_kandang`, `nama_pemilik_kandang`, `no_telp`, `email`, `alamat`, `username`, `password`) VALUES
(2, 'Widya sari', 2147483647, 'test@gmail.co,', 'Tabanan', 'superuser', '12345678'),
(3, 'Test', 2147483647, 'test@gmail.com', 'Jl. Mengwi', 'test', '12345678'),
(4, 'Putri', 2147483647, 'anantaputri@gmail.com', 'Sukawati', 'anantai', '123123123'),
(5, 'pande', 21424, 'tsyaG@gmail.com', 'fdfsd', 'ss', 'widya12345'),
(6, 'ayu', 2147483647, 'widya@gmail.com', 'dijalan', 'saras', '12345678'),
(7, 'putu widya', 2147483647, 'putu@gmail.com', 'Tabanan bali Indonesia', 'putu', 'putu123456'),
(8, 'Cok Agung', 2147483647, 'cokkagung30@yahoo.com', 'Jl. Bingin Sari', 'cokagung30', '09Juni1998'),
(9, 'Putu Ananta', 812345678, 'anantawirya@gmail.com', 'Pujungan ', 'Ananta', '1234567890'),
(10, 'made', 2147483647, 'agung_ardana2002@yahoo.co', 'pegending', 'madesaputra', '12345678'),
(11, 'Widya sari', 2147483647, 'widya@gmail.com', 'Tabanan bali Indonesia', 'widya', 'widya12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pemilik_kandang` int(11) NOT NULL,
  `id_data_ayam` int(11) NOT NULL,
  `verifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_pemilik_kandang`, `id_data_ayam`, `verifikasi`) VALUES
(4, 11, 24, 'Belum Terverifikasi'),
(5, 2, 25, 'Belum Terverifikasi'),
(6, 2, 26, 'Belum Terverifikasi'),
(7, 2, 27, 'Belum Terverifikasi');

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
(14, 18, 1, 'Jan 2019', 'panen'),
(15, 18, 2, 'feb 2019', 'panen'),
(16, 21, 1, '16 Juni 2019', 'panen'),
(17, 21, 2, '17 Juni 2019', 'panen');

-- --------------------------------------------------------

--
-- Table structure for table `ppl`
--

CREATE TABLE `ppl` (
  `id_ppl` int(11) NOT NULL,
  `nama_ppl` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppl`
--

INSERT INTO `ppl` (`id_ppl`, `nama_ppl`, `username`, `password`) VALUES
(1, 'Kadek Deni', 'kadek', 'kadek'),
(2, 'Putu Rai', 'rai', 'rai');

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
  ADD KEY `id_pemilik_kandang` (`id_pemilik_kandang`),
  ADD KEY `id_ppl` (`id_ppl`);

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
  MODIFY `id_data_ayam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id_kelayakan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  MODIFY `id_pemilik_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ppl`
--
ALTER TABLE `ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
