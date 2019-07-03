-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2019 pada 04.58
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `data_ayam`
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
-- Dumping data untuk tabel `data_ayam`
--

INSERT INTO `data_ayam` (`id_data_ayam`, `id_periode`, `umur`, `tanggal`, `jml_mati`, `berat_rata`, `jml_pakan`, `harga`, `ip`, `fcr`, `mortalitas`, `id_kelayakan`) VALUES
(36, 16, 1, '2019-07-01', 8, 50, 1.2, 10000, 0, 0.24, 0.16, 1),
(37, 16, 2, '2019-07-02', 4, 62, 1.5, 15000, 0, 0.435, 0.24, 1),
(38, 16, 3, '2019-07-03', 8, 77, 1.9, 17000, 0, 0.597, 0.4, 1),
(39, 16, 4, '2019-07-04', 5, 96, 2.2, 17000, 0, 0.708, 0.5, 1),
(40, 16, 5, '2019-07-05', 10, 118, 2.6, 17000, 0, 0.797, 0.7, 1),
(41, 16, 6, '2019-07-06', 8, 142, 3.1, 17000, 0, 0.88, 0.86, 1),
(42, 16, 7, '2019-07-07', 7, 169, 3.5, 17000, 252.41, 0.947, 1, 1),
(43, 16, 8, '2019-07-08', 4, 198, 3.9, 17000, 243.55, 1.005, 1.08, 1),
(44, 16, 9, '2019-07-09', 4, 230, 4.4, 17000, 239.03, 1.057, 1.16, 1),
(45, 16, 10, '2019-07-10', 4, 266, 4.9, 17000, 239.26, 1.098, 1.24, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandang`
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
-- Dumping data untuk tabel `kandang`
--

INSERT INTO `kandang` (`id_kandang`, `id_pemilik_kandang`, `id_ppl`, `nama_kandang`, `lokasi`, `volume`) VALUES
(18, 11, 1, 'Kandang di Nunggar Sari', 'Jl. Diponegoro', 5000),
(21, 2, 1, 'Cubik1', 'Jl. Tubik pret', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelayakan`
--

CREATE TABLE `kelayakan` (
  `id_kelayakan` int(4) NOT NULL,
  `batas_atas` double NOT NULL,
  `batas_bawah` double NOT NULL,
  `status` enum('segera_panen','layak_penen','belum_layak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelayakan`
--

INSERT INTO `kelayakan` (`id_kelayakan`, `batas_atas`, `batas_bawah`, `status`) VALUES
(1, 0, 0.74, 'belum_layak'),
(2, 0.75, 0.76, 'layak_penen'),
(3, 0.77, 1, 'segera_panen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keputusan`
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
-- Dumping data untuk tabel `keputusan`
--

INSERT INTO `keputusan` (`id_keputusan`, `id_periode`, `n_harga`, `n_ip`, `n_fcr`, `n_mortalitas`, `preferensi`, `id_kelayakan`) VALUES
(1, 16, 1, 1, 0.22, 1, 0.77, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_kandang`, `nama_pegawai`, `no_telp`, `username`, `password`) VALUES
(13, 18, 'Pande', '085792206567', 'pande', '123'),
(14, 21, 'Widya Cubik', '098342891472', 'Cubik', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_kandang`
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
-- Dumping data untuk tabel `pemilik_kandang`
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
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pemilik_kandang` int(11) NOT NULL,
  `id_data_ayam` int(11) NOT NULL,
  `verifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(4) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `nomor_periode` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` enum('panen','belum_panen','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `id_kandang`, `nomor_periode`, `keterangan`, `status`) VALUES
(14, 18, 1, 'Jan 2019', 'panen'),
(15, 18, 2, 'feb 2019', 'panen'),
(16, 21, 1, '16 Juni 2019', 'panen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppl`
--

CREATE TABLE `ppl` (
  `id_ppl` int(11) NOT NULL,
  `nama_ppl` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ppl`
--

INSERT INTO `ppl` (`id_ppl`, `nama_ppl`, `username`, `password`) VALUES
(1, 'Kadek Deni', 'kadek', 'kadek'),
(2, 'Putu Rai', 'rai', 'rai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_ayam`
--
ALTER TABLE `data_ayam`
  ADD PRIMARY KEY (`id_data_ayam`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_kelayakan` (`id_kelayakan`);

--
-- Indeks untuk tabel `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`id_kandang`),
  ADD KEY `id_pemilik_kandang` (`id_pemilik_kandang`),
  ADD KEY `id_ppl` (`id_ppl`);

--
-- Indeks untuk tabel `kelayakan`
--
ALTER TABLE `kelayakan`
  ADD PRIMARY KEY (`id_kelayakan`);

--
-- Indeks untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_kandang` (`id_kandang`);

--
-- Indeks untuk tabel `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  ADD PRIMARY KEY (`id_pemilik_kandang`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_pemilik_kandang` (`id_pemilik_kandang`),
  ADD KEY `id_data_ayam` (`id_data_ayam`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD KEY `id_kandang` (`id_kandang`);

--
-- Indeks untuk tabel `ppl`
--
ALTER TABLE `ppl`
  ADD PRIMARY KEY (`id_ppl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_ayam`
--
ALTER TABLE `data_ayam`
  MODIFY `id_data_ayam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id_kelayakan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  MODIFY `id_pemilik_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ppl`
--
ALTER TABLE `ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_ayam`
--
ALTER TABLE `data_ayam`
  ADD CONSTRAINT `data_ayam_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`),
  ADD CONSTRAINT `data_ayam_ibfk_2` FOREIGN KEY (`id_kelayakan`) REFERENCES `kelayakan` (`id_kelayakan`);

--
-- Ketidakleluasaan untuk tabel `kandang`
--
ALTER TABLE `kandang`
  ADD CONSTRAINT `kandang_ibfk_1` FOREIGN KEY (`id_pemilik_kandang`) REFERENCES `pemilik_kandang` (`id_pemilik_kandang`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_pemilik_kandang`) REFERENCES `pemilik_kandang` (`id_pemilik_kandang`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_data_ayam`) REFERENCES `data_ayam` (`id_data_ayam`);

--
-- Ketidakleluasaan untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `periode_ibfk_1` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
