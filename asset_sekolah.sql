-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 05:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `asets`
--

CREATE TABLE `asets` (
  `id_aset` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_tipe_harta` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga` double NOT NULL,
  `kondisi` varchar(128) NOT NULL,
  `status_aset` int(11) NOT NULL,
  `jenis_aset` varchar(128) NOT NULL,
  `qr_code` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asets`
--

INSERT INTO `asets` (`id_aset`, `id_barang`, `id_lokasi`, `id_tipe_harta`, `kode_barang`, `volume`, `satuan`, `harga`, `kondisi`, `status_aset`, `jenis_aset`, `qr_code`) VALUES
(1, 1, 1, 1, 'DSjksdgsh - as123', 12345, 'pcs', 7000000, 'bsd', 0, 'sdsd', 'DSjksdgsh - as123'),
(2, 1, 1, 0, 'AS- KG12342', 5, 'fg', 4000, 'baik', 1, 'sdsd', 'AS- KG12342');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `tahun_perolehan` year(4) NOT NULL,
  `spesifikasi` text NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `merek`, `tahun_perolehan`, `spesifikasi`, `picture`) VALUES
(1, 1, 'Laptop e', 'Lenovo', 2020, 'RAM 8', 'pngtree-laptop-icon-png-image_5184705.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(128) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `kode_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'KA231', 'Kategori A', '2023-12-09 06:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(128) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`, `tgl_input`) VALUES
(1, 'Lab Komputer', '2023-12-09 10:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_aset`
--

CREATE TABLE `monitoring_aset` (
  `id_monitoring` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `kerusakan` text NOT NULL,
  `akibat` text NOT NULL,
  `faktor` text NOT NULL,
  `monitoring` text NOT NULL,
  `pemeliharaan` text NOT NULL,
  `jml_rusak` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring_aset`
--

INSERT INTO `monitoring_aset` (`id_monitoring`, `id_aset`, `kerusakan`, `akibat`, `faktor`, `monitoring`, `pemeliharaan`, `jml_rusak`, `foto`, `tgl_input`) VALUES
(1, 1, '							<p>zdsds edit</p>						', '<p>dfdfe</p>', '<p>asasa</p>', '<p>rww</p>', '<p>fdfd</p>', '2', 'pngtree-laptop-icon-png-image_5184705.jpg', '2023-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `nama_peminjam` varchar(128) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status` varchar(128) NOT NULL,
  `tgl_input` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `id_aset`, `nama_peminjam`, `tgl_peminjaman`, `tgl_pengembalian`, `status`, `tgl_input`) VALUES
(1, 1, 'Ahmad edit', '2023-12-10', '2023-12-10', '1', '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_aset` varchar(128) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `harga_satuan` double NOT NULL,
  `tahun_pengadaan` varchar(4) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `id_lokasi`, `id_user`, `nama_aset`, `volume`, `satuan`, `harga_satuan`, `tahun_pengadaan`, `status`, `tgl_input`) VALUES
(1, 1, 1, 'asas', 12, 'pcs', 4000, '2019', '2', '2023-12-09 15:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `id_penghapusan` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `faktor` text NOT NULL,
  `tgl_penghapusan` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`id_penghapusan`, `id_aset`, `jumlah`, `faktor`, `tgl_penghapusan`, `status`) VALUES
(1, 2, 2, 'dfdfd edit', '2023-12-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_harta`
--

CREATE TABLE `tipe_harta` (
  `id_tipe_harta` int(11) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `umur_ekonomis` int(11) NOT NULL,
  `nilai_residu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_harta`
--

INSERT INTO `tipe_harta` (`id_tipe_harta`, `kelompok`, `umur_ekonomis`, `nilai_residu`) VALUES
(1, 'sdsds', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `role` enum('1','2') NOT NULL,
  `foto` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`, `role`, `foto`) VALUES
(1, 'wakasek', 'wakasek', 'Wakasek Kesiswaan', '1', '219983.png'),
(2, 'kepala_sekolah', 'kepala_sekolah', 'Kepala Sekolah', '2', '4205906.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `monitoring_aset`
--
ALTER TABLE `monitoring_aset`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`);

--
-- Indexes for table `tipe_harta`
--
ALTER TABLE `tipe_harta`
  ADD PRIMARY KEY (`id_tipe_harta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asets`
--
ALTER TABLE `asets`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `monitoring_aset`
--
ALTER TABLE `monitoring_aset`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penghapusan`
--
ALTER TABLE `penghapusan`
  MODIFY `id_penghapusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipe_harta`
--
ALTER TABLE `tipe_harta`
  MODIFY `id_tipe_harta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
