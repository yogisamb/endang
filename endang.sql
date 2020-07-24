-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2020 at 08:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `endang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_wo`
--

CREATE TABLE `data_wo` (
  `id_wo` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `nama_wo` varchar(256) NOT NULL,
  `alamat_wo` varchar(128) NOT NULL,
  `telp_wo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_wo`
--

INSERT INTO `data_wo` (`id_wo`, `image`, `nama_wo`, `alamat_wo`, `telp_wo`) VALUES
(1, 'kelas_reuni.png', 'Kelas Reuni Wedding Organizer', 'Jalan Raya Songgolangit Nomor 30, RT 001 / RW 011, Gentan, Baki - Sukoharjo', '08983875635');

-- --------------------------------------------------------

--
-- Table structure for table `filterwo`
--

CREATE TABLE `filterwo` (
  `id_filter` int(11) NOT NULL,
  `nama_filter` varchar(128) NOT NULL,
  `batas_bawah` varchar(128) NOT NULL,
  `batas_atas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filterwo`
--

INSERT INTO `filterwo` (`id_filter`, `nama_filter`, `batas_bawah`, `batas_atas`) VALUES
(1, 'Di bawah atau sama dengan 10 Juta', '0', '10000000'),
(2, 'Di atas atau sama dengan 10 Juta', '10000000', '1000000000'),
(3, '20 sampai 60 Juta', '20000000', '60000000'),
(4, 'Di bawah atau sama dengan 50 Juta', '0', '5000000'),
(5, 'Di bawah atau sama dengan 100 Juta', '0', '100000000'),
(6, 'Di atas atau sama dengan 100 Juta', '100000000', '1000000000'),
(7, '1 sampai 5 Juta', '1000000', '5000000'),
(8, '10 sampai 50 Juta', '10000000', '50000000'),
(9, '200 Juta', '200000000', '1000000000'),
(10, '80 sampai 150 Juta', '80000000', '150000000');

-- --------------------------------------------------------

--
-- Table structure for table `filter_2`
--

CREATE TABLE `filter_2` (
  `id_filter` int(11) NOT NULL,
  `nama_filter` varchar(128) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filter_2`
--

INSERT INTO `filter_2` (`id_filter`, `nama_filter`, `kapasitas`) VALUES
(1, '100 Kapasitas', 100),
(2, '200 Kapasitas', 200),
(3, '300 Kapasitas', 300),
(4, '400 Kapasitas', 400),
(5, '500 Kapasitas', 500),
(6, '600 Kapasitas', 600),
(7, '700 Kapasitas', 700),
(8, '800 Kapasitas', 800),
(9, '900 Kapasitas', 900),
(10, '1000 Kapasitas', 100);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_wo`
--

CREATE TABLE `layanan_wo` (
  `id_layanan_wo` int(11) NOT NULL,
  `id_wo` int(11) NOT NULL,
  `layanan` text NOT NULL,
  `detail` text NOT NULL,
  `harga` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Yogi Samb', 'yogisambodo@gmail.com', 'default.png', '$2y$10$p6OANChTz7G2zNRDqT4Z9O5tmQgZ1zMlskB3p1w8R2Jm47cYzOOcC', 1, 1, 1564501529),
(2, 'admin', 'admin@admin.com', 'default.png', '$2y$10$7ghnTs1hfxIvAnizJyKwZer/KhL.ktSCpqVNfUEbahhczLJDn1fsy', 2, 1, 1593969367);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 2, 3),
(7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(256) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_id`, `menu`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard Superadmin', 'superadmin', 'fas fa-tachometer-alt', 1),
(2, 2, 'Dashboard Admin', 'dashboardadmin', 'fas fa-list-ul', 1),
(3, 3, 'Data WO', 'datawo', 'fas fa-file-alt', 1),
(4, 4, 'Data Layanan', 'datalayanan', 'fas fa-history', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_title` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_title`) VALUES
(1, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_wo`
--
ALTER TABLE `data_wo`
  ADD PRIMARY KEY (`id_wo`);

--
-- Indexes for table `filterwo`
--
ALTER TABLE `filterwo`
  ADD PRIMARY KEY (`id_filter`);

--
-- Indexes for table `filter_2`
--
ALTER TABLE `filter_2`
  ADD PRIMARY KEY (`id_filter`);

--
-- Indexes for table `layanan_wo`
--
ALTER TABLE `layanan_wo`
  ADD PRIMARY KEY (`id_layanan_wo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_wo`
--
ALTER TABLE `data_wo`
  MODIFY `id_wo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `filterwo`
--
ALTER TABLE `filterwo`
  MODIFY `id_filter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `filter_2`
--
ALTER TABLE `filter_2`
  MODIFY `id_filter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan_wo`
--
ALTER TABLE `layanan_wo`
  MODIFY `id_layanan_wo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
