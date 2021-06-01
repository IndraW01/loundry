-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 07:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` enum('Biasa','Cepat','Express') NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga_paket`) VALUES
(1, 'Biasa', 5000),
(2, 'Cepat', 6000),
(3, 'Express', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_saldo`
--

INSERT INTO `tb_saldo` (`id_saldo`, `id_user`, `pin`, `saldo`) VALUES
(3, 3, 1111, 1000),
(4, 4, 2222, 2000),
(7, 9, 3333, 21000),
(8, 11, 8888, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_kiloan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_paket`, `tanggal_terima`, `tanggal_selesai`, `jumlah_kiloan`, `nominal`, `catatan`, `status`) VALUES
(9, 3, 1, '2021-05-26', '2021-05-27', 2, 10000, 'Baju Koko', 'Lunas'),
(13, 3, 2, '2021-06-01', '2021-06-02', 2, 12000, 'Celana Tartan', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Kasir','Pelanggan') NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `jenis_kelamin` enum('LK','PR') NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `nama_user`, `jenis_kelamin`, `no_hp`, `alamat`, `gambar`) VALUES
(1, 'admin', 'admin', 'Admin', 'Indra Wijaya', 'LK', 858215576, 'Samboja Jaya', 'avatar.png'),
(2, 'kasir', 'kasir', 'Kasir', 'Alpit', 'LK', 858215576, 'Botang Keren', 'avatar.png'),
(3, 'pelanggan', 'pelanggan', 'Pelanggan', 'Jauhari Fadli Jaunum', 'LK', 858215576, 'Paser Jaya', '60b05a08e48d1.jpg'),
(4, 'pelanggan2', 'pelanggan2', 'Pelanggan', 'asrofi  Afrizaldi', 'LK', 85332323, 'Muara Jawa', '60b057f9792cb.png'),
(11, 'indra', 'indra', 'Pelanggan', 'Indra', 'LK', 34324324, 'Samboja Jaya', '60b0583b5799e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
