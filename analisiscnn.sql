-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2023 at 03:27 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analisiscnn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(32) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `aktif` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `token`, `username`, `password`, `aktif`) VALUES
(1, 'Admin', '', '', 'admin', 'admin', '1'),
(12, 'Yoga', 'fchyoga@gmail.com', '936397375a7e8e9ef3dc407d11253b0e', 'yoga', 'yoga', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cleaning`
--

CREATE TABLE `cleaning` (
  `id_cleaning` int NOT NULL,
  `id_dataset` int NOT NULL,
  `text_cleaning` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cnn`
--

CREATE TABLE `cnn` (
  `id_cnn` int NOT NULL,
  `accurasi` int NOT NULL,
  `presisi` int NOT NULL,
  `recall` int NOT NULL,
  `f1score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int NOT NULL,
  `datetime` varchar(155) NOT NULL,
  `userid` varchar(155) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `id_testing` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tfidf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sentimen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `id_training` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tfidf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sentimen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasildata`
--

CREATE TABLE `hasildata` (
  `id_hasil` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sentimen` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int NOT NULL,
  `accuracy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confusion_matrix` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precision` float NOT NULL,
  `recall` float NOT NULL,
  `f1_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `split`
--

CREATE TABLE `split` (
  `id_split` int NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sentimen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tfidf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stemming`
--

CREATE TABLE `stemming` (
  `id_stemming` int NOT NULL,
  `id_stopwords` int NOT NULL,
  `text_stemming` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stopwords`
--

CREATE TABLE `stopwords` (
  `id_stopwords` int NOT NULL,
  `id_cleaning` int NOT NULL,
  `text_stopwords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tfidf`
--

CREATE TABLE `tfidf` (
  `id_tfidf` int NOT NULL,
  `id_stemming` int NOT NULL,
  `text_tfidf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vocab`
--

CREATE TABLE `vocab` (
  `id` int NOT NULL,
  `vocab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`id_cleaning`);

--
-- Indexes for table `cnn`
--
ALTER TABLE `cnn`
  ADD PRIMARY KEY (`id_cnn`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id_training`);

--
-- Indexes for table `hasildata`
--
ALTER TABLE `hasildata`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `stemming`
--
ALTER TABLE `stemming`
  ADD PRIMARY KEY (`id_stemming`);

--
-- Indexes for table `stopwords`
--
ALTER TABLE `stopwords`
  ADD PRIMARY KEY (`id_stopwords`);

--
-- Indexes for table `tfidf`
--
ALTER TABLE `tfidf`
  ADD PRIMARY KEY (`id_tfidf`);

--
-- Indexes for table `vocab`
--
ALTER TABLE `vocab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `id_cleaning` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnn`
--
ALTER TABLE `cnn`
  MODIFY `id_cnn` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
  MODIFY `id_testing` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id_training` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasildata`
--
ALTER TABLE `hasildata`
  MODIFY `id_hasil` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stemming`
--
ALTER TABLE `stemming`
  MODIFY `id_stemming` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stopwords`
--
ALTER TABLE `stopwords`
  MODIFY `id_stopwords` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tfidf`
--
ALTER TABLE `tfidf`
  MODIFY `id_tfidf` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vocab`
--
ALTER TABLE `vocab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
