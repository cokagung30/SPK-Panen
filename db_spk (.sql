-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2019 pada 15.02
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
(60, 18, 7, '2019-07-25', 50, 169, 16, 17000, 248.634, 0.947, 2.5, 1);

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
(23, 13, 2, 'Kandang Jati Makmur', 'Jl. Bikini', 2000);

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
(2, 18, 1, 1, 1, 1, 1, 3);

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
(16, 23, 'Cok Agus', '087123456789', 'cokagus1', '123123123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_kandang`
--

CREATE TABLE `pemilik_kandang` (
  `id_pemilik_kandang` int(4) NOT NULL,
  `id_ppl` int(11) NOT NULL,
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

INSERT INTO `pemilik_kandang` (`id_pemilik_kandang`, `id_ppl`, `nama_pemilik_kandang`, `no_telp`, `email`, `alamat`, `username`, `password`) VALUES
(13, 2, 'Cokorda Gde Agung', 2147483647, 'cokkagung@gmail.com', 'Jl. Bingin sari', 'cokagung01', 'inibisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_pemilik_kandang` int(11) NOT NULL,
  `id_data_ayam` int(11) NOT NULL,
  `verifikasi` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_pemilik_kandang`, `id_data_ayam`, `verifikasi`, `status`, `catatan`) VALUES
(2, 13, 60, '3', 2, 'Segera Panen');

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
(18, 23, 1, '17 Juli 2019', 'panen');

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
  MODIFY `id_data_ayam` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `kandang`
--
ALTER TABLE `kandang`
  MODIFY `id_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kelayakan`
--
ALTER TABLE `kelayakan`
  MODIFY `id_kelayakan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pemilik_kandang`
--
ALTER TABLE `pemilik_kandang`
  MODIFY `id_pemilik_kandang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
