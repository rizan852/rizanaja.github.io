-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 04:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Ardheano Nurulhuda', 'Ardheano', 'Ardheano'),
(5, 'Futri', 'Futri', 'Futri'),
(7, 'Rike', 'Rike', 'Rike');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `kode_obat` int(11) NOT NULL,
  `nama_obat` text NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`kode_obat`, `nama_obat`, `harga_beli`, `harga_jual`, `stok`, `satuan`) VALUES
(1, 'Paracetamol', 5454.55, 6000, 50, 'Tablet'),
(2, 'Bodrex', 4000, 4400, 60, 'Tablet'),
(3, 'Microlax', 15000, 16500, 30, 'Botol'),
(14, 'Sitrus', 15000, 16500, 60, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_obat`
--

CREATE TABLE `laporan_obat` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_obat` int(11) NOT NULL,
  `nama_obat` text NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_obat`
--

INSERT INTO `laporan_obat` (`no`, `tanggal`, `kode_obat`, `nama_obat`, `harga_beli`, `harga_jual`, `stok`, `satuan`) VALUES
(62, '2020-12-18', 1, 'Paracetamol', 5454.55, 6000, 50, 'Tablet'),
(63, '2020-12-18', 2, 'Bodrex', 4000, 4400, 60, 'Tablet'),
(64, '2020-12-18', 3, 'Microlax', 15000, 16500, 30, 'Botol'),
(88, '2020-12-18', 14, 'Sitrus', 15000, 16500, 60, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `obat_masuk`
--

CREATE TABLE `obat_masuk` (
  `kode_transaksi` int(11) NOT NULL,
  `supplier` text NOT NULL,
  `tanggal` date NOT NULL,
  `nama_obat` text NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `harga` float NOT NULL,
  `satuan` text NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat_masuk`
--

INSERT INTO `obat_masuk` (`kode_transaksi`, `supplier`, `tanggal`, `nama_obat`, `jumlah_masuk`, `harga`, `satuan`, `total_harga`) VALUES
(1, 'Ardhe', '2020-11-30', 'Paracetamol', 20, 5000, 'Tablet', 100000),
(2, 'Rike', '2020-12-07', 'Bodrex', 40, 4000, 'Tablet', 160000),
(3, 'Futri', '2020-12-02', 'Microlax', 20, 15000, 'Botol', 300000),
(7, 'Futri', '2020-12-10', 'Sitrus', 50, 30000, 'Botol', 1500000),
(8, 'Ardhe', '2020-12-08', 'Sitrus', 70, 40000, 'Botol', 800000),
(10, 'Rike', '2020-12-02', 'Sitrus', 40, 15000, 'Botol', 600000),
(11, 'Rike', '2020-12-19', 'Sitrus', 40, 15000, 'Botol', 600000),
(12, 'Rike', '2020-12-18', 'Sitrus', 40, 15000, 'Botol', 600000),
(13, 'Rike', '2020-12-18', 'Sitrus', 40, 15000, 'Botol', 600000),
(14, 'Rike', '2020-12-18', 'Sitrus', 40, 15000, 'Botol', 600000),
(15, 'Ardhe', '2020-12-18', 'Sitrus', 40, 15000, 'Botol', 600000),
(16, 'Futri', '2020-12-18', 'Sitrus', 60, 15000, 'Botol', 900000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `laporan_obat`
--
ALTER TABLE `laporan_obat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `kode_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan_obat`
--
ALTER TABLE `laporan_obat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `obat_masuk`
--
ALTER TABLE `obat_masuk`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
