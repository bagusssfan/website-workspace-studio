-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2025 pada 07.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workspace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kategori` varchar(220) NOT NULL,
  `gambar` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kategori`, `gambar`) VALUES
(28, 'fotoanak', '565-workspace.studio_302744764.jpg'),
(29, 'fotodigital', '518-.trashed-1717321931-workspace.studio_302666141.jpg'),
(30, 'fotodigital', '293-.trashed-1717321931-workspace.studio_302666237.jpg'),
(31, 'fotodigital', '774-.trashed-1717321931-workspace.studio_302666572.jpg'),
(32, 'fotodigital', '699-.trashed-1717322017-User-___1714727931345___--1.png'),
(33, 'fotodigital', '517-.trashed-1717322017-User-___1714727931345___--3.png'),
(34, 'fotodigital', '205-.trashed-1717322017-User-___1714727931345___--6.png'),
(37, 'fotodigital', '800-workspace.studio_302665929.jpg'),
(38, 'fotodigital', '345-workspace.studio_302666076.jpg'),
(39, 'fotodigital', '275-workspace.studio_302666194.jpg'),
(40, 'fotodigital', '149-workspace.studio_302666539.jpg'),
(41, 'fotoanak', '866-.trashed-1717321923-workspace.studio_302744240.jpg'),
(42, 'orcestra', '38-sandyriaervinna_303487754.jpg'),
(43, 'orcestra', '985-sandyriaervinna_303518760.jpg'),
(50, 'wisuda', '472-products-01.png'),
(51, 'prewedding', '193-.trashed-1717321951-photonara.co_302979904.jpg'),
(52, 'tunangan', '168-.trashed-1717321990-photonara.co_303101790.jpg'),
(53, 'wedding', '882-.trashed-1717321990-photonara.co_303240379.jpg'),
(54, 'wisuda', '477-.trashed-1717321938-workspace.studio_302788244.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vendor`
--

CREATE TABLE `tb_vendor` (
  `id_vendor` int(255) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `yt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_vendor`
--

INSERT INTO `tb_vendor` (`id_vendor`, `nama_vendor`, `no_wa`, `deskripsi`, `gambar`, `yt`) VALUES
(21, 'Bagi Kita Project', '6289669332012', 'Fotography dan Videography Wedding ', '800-772-Bagi kita.png', 'https://youtube.com/@karaktervisual2679?si=xlrjnQSj9GdT9Ux-'),
(22, 'Photonara.Co', '62895327225197', 'Wedding Prewedding Semarang', '75-281-Photonara.png', ''),
(23, 'Nuansa photography ', '089635699666', 'Photography Videography', '345-230-WhatsApp Image 2024-05-08 at 10.19.30.jpeg', 'https://youtube.com/@n'),
(222, 'karakter visual', '6287890317389', 'creative Photo & Video , Company profile, After Movie , Advertising, Tapping music, Live', '57-209-283-Karakter.png', 'https://youtube.com/@k');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(220) NOT NULL,
  `password` varchar(125) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `jk`, `no_telp`, `alamat`) VALUES
(30, 'ibrahim', '123456', 'l', '084569447845', 'Beji, Tulis, Batang, Jawa Tengah'),
(32, 'Baek jin Ah', '123456', 'l', '0865478912', 'Ungaran, Semarang'),
(33, 'Kim Gim hyung', '123456', 'l', '085463214578', 'Weleri, Batang, Jawa tengah'),
(34, 'Min ji Ah', '123456', 'p', '08564151234', 'Karang malang , Sragen , Jawa Tengah'),
(36, 'bagus', '123456', 'l', '869692', 'skuyskj'),
(37, 'aku', '123456', 'l', '282528652', 'dgdiugdjhd'),
(38, 'woy', '123456', 'l', '2729872972', 'diydukdh'),
(39, 'gggg', '123456', 'l', '8272927927', 'ddhlkdjdljdl'),
(40, 'Fandi Bagus Ariyanto', 'bagus1', 'l', '9378387373', 'batang'),
(41, '', '12345678', 'l', '2979792', 'duuhdukhdkdh'),
(42, '', 'sugsukhs', 'l', '98169189', 'shskssjsk'),
(43, '', '123', 'l', '37983937', 'hdljdddlj'),
(44, '', '123', 'l', '83683638', 'hsshssjk'),
(45, '', '123456', 'l', '3973338', 'ddhjdd'),
(46, 'ali', '123', 'l', '26752752', 'uhkshk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_vendor`
--
ALTER TABLE `tb_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tb_vendor`
--
ALTER TABLE `tb_vendor`
  MODIFY `id_vendor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
