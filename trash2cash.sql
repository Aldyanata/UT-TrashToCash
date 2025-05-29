-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2025 pada 17.20
-- Versi server: 10.4.32-MariaDB-log
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bukti_transaksi`
--

CREATE TABLE `tb_bukti_transaksi` (
  `no_nota` varchar(12) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jml` int(11) NOT NULL,
  `nm_sampah` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_bukti_transaksi`
--

INSERT INTO `tb_bukti_transaksi` (`no_nota`, `tgl_transaksi`, `jml`, `nm_sampah`, `harga`, `total`) VALUES
('101150', '2022-03-12', 12, 'Botol Plastik', 4000, 48000),
('101151', '2022-03-14', 12, 'Besi Bekas', 6000, 72000),
('101150', '2022-03-12', 12, 'Botol Plastik', 4000, 48000),
('101153', '2024-01-19', 12, 'Besi Bekas', 5000, 60000),
('101165', '2025-05-29', 12, 'Besi Bekas', 5000, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_client`
--

CREATE TABLE `tb_client` (
  `id_client` varchar(10) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `nama`, `alamat`, `jenis`) VALUES
('aldy', 'Aldyanata', 'sby', 'penjual'),
('IDC001', 'Adnan', 'pasuruhan', 'pembeli'),
('none', '', '', 'penjual'),
('pengguna1', 'Pengguna 1', 'Watansoppeng', 'penjual'),
('pengguna2', 'Pengguna 2', 'Watansoppeng', 'penjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sampah`
--

CREATE TABLE `tb_sampah` (
  `kd_sampah` varchar(8) NOT NULL,
  `nm_sampah` varchar(32) NOT NULL,
  `jns_sampah` varchar(15) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_sampah`
--

INSERT INTO `tb_sampah` (`kd_sampah`, `nm_sampah`, `jns_sampah`, `harga_beli`, `harga_jual`, `satuan`) VALUES
('KDS001', 'Besi Bekas', 'Non-Organik', 5000, 6000, 'Kg'),
('KDS002', 'Botol Plastik', 'Non-Organik', 4000, 5000, 'Kg'),
('KDS003', 'Pupuk Kompos', 'Organik', 5000, 6000, 'KG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_client` varchar(12) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jml` int(11) NOT NULL,
  `kd_sampah` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_client`, `tgl_transaksi`, `jml`, `kd_sampah`, `harga`) VALUES
(101147, 'CL01', '2022-03-12', 12, 'KDS001', 5000),
(101148, 'none', '2022-03-12', 10, 'KDS001', 5000),
(101149, 'none', '2022-03-12', 4, 'KDS001', 5000),
(101150, 'none', '2022-03-12', 12, 'KDS002', 4000),
(101151, 'IDC001', '2022-03-14', 12, 'KDS001', 6000),
(101152, 'none', '2022-08-04', 10, 'KDS001', 5000),
(101153, 'none', '2024-01-19', 12, 'KDS001', 5000),
(101154, 'none', '2025-04-24', 2, 'KDS001', 0),
(101155, 'none', '2025-04-29', 12, 'KDS001', 0),
(101156, 'none', '2025-04-30', 12, '--PILIH ', 123),
(101157, 'none', '2025-04-30', 15, '--PILIH ', 123),
(101158, 'none', '2025-04-30', 56, '--PILIH ', 5000),
(101159, 'none', '2025-04-30', 1, '--PILIH ', 0),
(101160, 'none', '2025-04-30', 12, 'KDS002', 0),
(101161, 'none', '2025-04-30', 56, 'KDS001', 5000),
(101162, 'none', '2025-04-30', 12, 'KDS002', 0),
(101163, 'none', '2025-05-29', 10, 'KDS001', 5000),
(101164, 'IDC001', '2025-05-29', 10, 'KDS002', 5000),
(101165, 'none', '2025-05-29', 12, 'KDS001', 5000),
(101166, 'IDC001', '2025-05-29', 325, 'KDS001', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Mutmainna', 'admin'),
('aldy', '3b2fb88da8c86baef513883eb2f8fa37', 'Aldyanata', 'masyarakat'),
('pengguna', '8b097b8a86f9d6a991357d40d3d58634', 'Pengguna', 'masyarakat'),
('pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Test', 'pimpinan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_transaksi` (
`id_client` varchar(10)
,`nama` varchar(32)
,`alamat` varchar(50)
,`jenis` varchar(10)
,`id_transaksi` int(11)
,`tgl_transaksi` date
,`jml` int(11)
,`harga` int(11)
,`kd_sampah` varchar(8)
,`nm_sampah` varchar(32)
,`jns_sampah` varchar(15)
,`satuan` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `tb_client`.`id_client` AS `id_client`, `tb_client`.`nama` AS `nama`, `tb_client`.`alamat` AS `alamat`, `tb_client`.`jenis` AS `jenis`, `tb_transaksi`.`id_transaksi` AS `id_transaksi`, `tb_transaksi`.`tgl_transaksi` AS `tgl_transaksi`, `tb_transaksi`.`jml` AS `jml`, `tb_transaksi`.`harga` AS `harga`, `tb_sampah`.`kd_sampah` AS `kd_sampah`, `tb_sampah`.`nm_sampah` AS `nm_sampah`, `tb_sampah`.`jns_sampah` AS `jns_sampah`, `tb_sampah`.`satuan` AS `satuan` FROM ((`tb_client` join `tb_transaksi` on(`tb_client`.`id_client` = `tb_transaksi`.`id_client`)) join `tb_sampah` on(`tb_transaksi`.`kd_sampah` = `tb_sampah`.`kd_sampah`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `tb_sampah`
--
ALTER TABLE `tb_sampah`
  ADD PRIMARY KEY (`kd_sampah`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
