-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Feb 2020 pada 20.11
-- Versi server: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Versi PHP: 7.3.14-6+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_lsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detaillaundry`
--

CREATE TABLE `detaillaundry` (
  `iddetail` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `idlaundry` int(11) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detaillaundry`
--

INSERT INTO `detaillaundry` (`iddetail`, `idtransaksi`, `idlaundry`, `idstatus`, `harga`, `total`, `keterangan`) VALUES
(6, 9, 10, 1, 150, 1, 'Kang tani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE `laundry` (
  `idlaundry` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL,
  `type` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laundry`
--

INSERT INTO `laundry` (`idlaundry`, `nama`, `harga`, `type`) VALUES
(10, 'Wirraww', 150, 'lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `tglbayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuslaundry`
--

CREATE TABLE `statuslaundry` (
  `idstatus` int(11) NOT NULL,
  `namastatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `statuslaundry`
--

INSERT INTO `statuslaundry` (`idstatus`, `namastatus`) VALUES
(1, 'Dalam Antrean'),
(2, 'Dicuci'),
(3, 'Dikeringkan'),
(4, 'Disetrika'),
(5, 'Siap diambil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `keterangan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `id_user`, `tgltransaksi`, `keterangan`) VALUES
(9, 13, '2020-02-06', 'Ini Keteranga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(96) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` set('male','female') NOT NULL,
  `address` text NOT NULL,
  `role` set('admin','pelanggan') NOT NULL DEFAULT 'pelanggan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `fullname`, `email`, `phone`, `gender`, `address`, `role`) VALUES
(1, 'admin', '$2y$10$RGHoRjlccXZu5peHbaSNr.X5QvSX9isGXiNFG6mfZnDlZXX1NPQ96', '', '', '', '', '', 'admin'),
(13, 'johndoe', '$2y$10$PueP7QVwipXmW77jWJndG.TzlEiZ5kwJkvLRZ7q0SDeg6bGtwKujy', 'John', 'johndoe@gmail.com', '0895346266988', 'male', 'John Doe', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `idlaundry` (`idlaundry`),
  ADD KEY `idstatus` (`idstatus`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`idlaundry`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idtransaksi` (`idtransaksi`);

--
-- Indeks untuk tabel `statuslaundry`
--
ALTER TABLE `statuslaundry`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laundry`
--
ALTER TABLE `laundry`
  MODIFY `idlaundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `statuslaundry`
--
ALTER TABLE `statuslaundry`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detaillaundry`
--
ALTER TABLE `detaillaundry`
  ADD CONSTRAINT `detaillaundry_ibfk_1` FOREIGN KEY (`idlaundry`) REFERENCES `laundry` (`idlaundry`),
  ADD CONSTRAINT `detaillaundry_ibfk_2` FOREIGN KEY (`idstatus`) REFERENCES `statuslaundry` (`idstatus`),
  ADD CONSTRAINT `detaillaundry_ibfk_3` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
