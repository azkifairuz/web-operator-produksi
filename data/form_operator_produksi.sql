-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2023 at 02:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_operator_produksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_operator_produksi`
--

CREATE TABLE `data_operator_produksi` (
  `NIP` int NOT NULL,
  `nama` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'belum di isi',
  `departemen` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `lokasi` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NPWP` int DEFAULT NULL,
  `title` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_operator_produksi`
--

INSERT INTO `data_operator_produksi` (`NIP`, `nama`, `departemen`, `hire_date`, `lokasi`, `NPWP`, `title`, `gambar`) VALUES
(543, 'belum di isi', NULL, NULL, NULL, NULL, NULL, NULL),
(1223, 'belum di isi', NULL, NULL, NULL, NULL, NULL, NULL),
(1234, 'saya', 'qe', '2023-03-01', 'qwe', 1332, 'Leader', '641f46cfeaa9b.png'),
(12345678, 'asa', 'gatau', '2012-11-02', 'tangerang', 1010101, 'Operator', '641950459c8a2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `form_angel_inspeksi_area`
--

CREATE TABLE `form_angel_inspeksi_area` (
  `no_angel` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_item` set('Timbangan 5 kg','AJ.A','AJ.B','AG.A','AG.B','Container 120L','Container 50L','Jar 29L','Jar 5L','Pusher angel','Krat') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_angel_inspeksi_area`
--

INSERT INTO `form_angel_inspeksi_area` (`no_angel`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 5 kg', 'apakah ada bagian yang hilang', 'Iya', 'Lantai', 'Apakah ada sisa buah atau sayur?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `form_angel_produksi`
--

CREATE TABLE `form_angel_produksi` (
  `no_angel` int NOT NULL,
  `kode_mesin` set('AJ.A','AJ.B','AG.A','AG.B') COLLATE utf8mb4_general_ci NOT NULL,
  `raw_material` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `untuk_produk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_supplier` int NOT NULL,
  `batch` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `berat_setelah_angel` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `operator` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_angel_produksi`
--

INSERT INTO `form_angel_produksi` (`no_angel`, `kode_mesin`, `raw_material`, `untuk_produk`, `kode_supplier`, `batch`, `jam_mulai`, `jam_keluar`, `berat_setelah_angel`, `keterangan`, `operator`, `tanggal`) VALUES
(1, 'AJ.A', '', 'asd', 0, 123, '12:03:00', '12:21:00', 321, 'wdadsdads', 'asu', '2023-03-30'),
(2, 'AJ.A', 'eqw', 'asd', 0, 12, '12:03:00', '03:21:00', 123, 'asdadsd', 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `form_filling_inspeksi_area`
--

CREATE TABLE `form_filling_inspeksi_area` (
  `no_filling` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan') COLLATE utf8mb4_general_ci NOT NULL,
  `part_mesin/peralatan` set('Body tank','Motor agilator','Pipa dan selang product','Conveyor','Nozzle','Mesin digital filling','Kaki mesin','Kabel selang angin','Krat','Slat','Jar 29L','Jar 5L','Selang air','Gelas ukur') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah berbau bahan kimia?','Apakah ada berjamur dan berkarat?','Apakah sudah diberi pelumas?','Apakah ada bagian yang kendor/part hilang?','Apakah ada bagian pecah/sobek/bocor/patah?','Apakah berfungsi normal?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Gutter','Convayor','Wastafel stainless','pipa dan selang air') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Tools','Sikat','Sikat gagang','Sponge') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_filling_inspeksi_area`
--

INSERT INTO `form_filling_inspeksi_area` (`no_filling`, `inspeksi_mesin/peralatan`, `part_mesin/peralatan`, `kondisi_mesin/peralatan`, `keterangan_mesin`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Body tank', 'Apakah berbau bahan kimia?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `form_filling_produksi`
--

CREATE TABLE `form_filling_produksi` (
  `no_filling` int NOT NULL,
  `varian_produk` set('Asian green','Beat that','Classic green','Firey beat','Green glory','I glow','Golden apple','Golden orange','U glow','Glowing apple','Minty Apple','Firey Apple','Crush watermelon','Glowing Golden','Tropic golden','Glowing calamansi','Tropic calamansi') COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `line` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `plan` set('5000ML','1350ML','435ML','330ML','250ML','50ML') COLLATE utf8mb4_general_ci NOT NULL,
  `no_plan` int NOT NULL,
  `hasil` set('5000ML','1350ML','435ML','330ML','250ML','50ML') COLLATE utf8mb4_general_ci NOT NULL,
  `no_hasil` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `waste` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `operator` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_filling_produksi`
--

INSERT INTO `form_filling_produksi` (`no_filling`, `varian_produk`, `jam_mulai`, `jam_selesai`, `line`, `plan`, `no_plan`, `hasil`, `no_hasil`, `keterangan`, `waste`, `operator`, `tanggal`) VALUES
(9, 'Classic green', '12:03:00', '12:31:00', 'wqe', '5000ML', 2132, '5000ML', 3213, 'wewe', '23', 'asu', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `form_kupas_inspeksi_area`
--

CREATE TABLE `form_kupas_inspeksi_area` (
  `no_kupas` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_item` set('Timbangan 120kg','Pisau','Container 120 L','Container 50 L','Talenan','Meja','Selang air') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_kupas_inspeksi_area`
--

INSERT INTO `form_kupas_inspeksi_area` (`no_kupas`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 120kg', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `form_kupas_produksi`
--

CREATE TABLE `form_kupas_produksi` (
  `no_kupas` int NOT NULL,
  `nama_material` set('Nanas','Jeruk','Jambu') COLLATE utf8mb4_general_ci NOT NULL,
  `kode_supplier` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int NOT NULL,
  `hasil_kg` int NOT NULL,
  `waste_kg` int NOT NULL,
  `operator` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_kupas_produksi`
--

INSERT INTO `form_kupas_produksi` (`no_kupas`, `nama_material`, `kode_supplier`, `mulai`, `berakhir`, `durasi`, `hasil_kg`, `waste_kg`, `operator`, `tanggal`) VALUES
(1, 'Nanas', 'qwe', '12:03:00', '13:02:00', 12, 123, 121, 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `form_preparation_inspeksi_area`
--

CREATE TABLE `form_preparation_inspeksi_area` (
  `no_preparation` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_item` set('Brushing','Conveyor 1','Conveyor 2','Timbangan 120kg','Pisau','Talenan','Slat','Keranjang') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_preparation_inspeksi_area`
--

INSERT INTO `form_preparation_inspeksi_area` (`no_preparation`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(20, 'Mesin', 'Brushing', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(22, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(23, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(24, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(25, 'Mesin', 'Conveyor 1', 'Apakah tercium bau cleaner atau chemical?', 'Tidak', 'Lantai', 'Apakah ada area yang terkelupas?', 'Iya', 'Tarikan air', 'Apakah alat bersih?', 'Iya', '2023-03-25'),
(27, 'Mesin', 'Brushing', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-07'),
(28, 'Mesin', 'Conveyor 2', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `form_preparation_mesin_brushing`
--

CREATE TABLE `form_preparation_mesin_brushing` (
  `no_preparation` int NOT NULL,
  `operator` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_supplier` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `raw_material` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `QTY` int NOT NULL,
  `kg` int NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_RM` int NOT NULL,
  `waste(kg)` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_preparation_mesin_brushing`
--

INSERT INTO `form_preparation_mesin_brushing` (`no_preparation`, `operator`, `kode_supplier`, `raw_material`, `QTY`, `kg`, `mulai`, `berakhir`, `durasi`, `jumlah`, `total_RM`, `waste(kg)`, `tanggal`) VALUES
(2, 'asa', '213', '213', 3213, 1321, '12:21:00', '23:03:00', 123, 3232, 2331, 323, '2023-03-25'),
(3, 'asu', '213', '213', 3213, 1321, '03:03:00', '23:03:00', 123, 3232, 2331, 323, '2023-03-24'),
(4, 'asu', '123', '132', 13, 213, '12:03:00', '21:03:00', 123, 123, 213, 213, '2023-03-25'),
(5, 'asa', 'tes', 'as', 123, 123, '12:03:00', '12:03:00', 123, 132, 123, 123, '2023-03-25'),
(6, 'asa', 'tes', '123', 123, 1213, '21:03:00', '12:03:00', 132, 21, 123, 123, '2023-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `form_preparation_produksi`
--

CREATE TABLE `form_preparation_produksi` (
  `no_preparation` int NOT NULL,
  `kode_supplier` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `raw_material` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `QTY` int NOT NULL,
  `jam_keluar` time NOT NULL,
  `total_RM` int NOT NULL,
  `waste` int NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_preparation_produksi`
--

INSERT INTO `form_preparation_produksi` (`no_preparation`, `kode_supplier`, `raw_material`, `QTY`, `jam_keluar`, `total_RM`, `waste`, `tanggal`) VALUES
(2, '123', '123', 213, '12:03:00', 132, 213, '2023-03-25'),
(3, '123', '123', 123, '01:21:23', 123, 123, '2023-03-25'),
(4, 'tes', 'tes', 123, '12:20:23', 123, 123, '2023-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `form_pressing_inspeksi_area`
--

CREATE TABLE `form_pressing_inspeksi_area` (
  `no_pressing` int NOT NULL,
  `kode_mesin` set('X6','X1') COLLATE utf8mb4_general_ci NOT NULL,
  `part_mesin` set('HOPPER','GRINDER','MOVING PLATE','PRESS RACK','BAG PRESS','SAFETY GUARD','JUICE TRAY','START/STOP SWITCH BOX','PRESSURE GAUGE DAN FLOW CONTROL','DIRECTIONAL CONTROL VALVE','MOTOR HYDRAULIC DAN RESERVOIR','AS MOVING PLATE','SHIMS DAN RAIL','CASTER') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin` set('Apakah berbau bahan kimia?','Apakah ada berjamur dan berkarat?','Apakah sudah diberi pelumas?','Apakah ada bagian yang kendor/part hilang?','Apakah ada bagian pecah/sobek/bocor/patah?','Apakah part berfungsi dengan baik?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Gutter','Convayor','Wastafel stainless','pipa dan selang air') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Ember rendaman bag press','Sikat','Sikat gagang','Pembersih dinding') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pressing_inspeksi_area`
--

INSERT INTO `form_pressing_inspeksi_area` (`no_pressing`, `kode_mesin`, `part_mesin`, `kondisi_mesin`, `keterangan_mesin`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'X1', 'SHIMS DAN RAIL', 'Apakah berbau bahan kimia?', 'Iya', 'Dinding', 'Apakah area bersih?', 'Tidak', '', 'Apakah alat ada identitas?', 'Iya', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `form_pressing_produksi`
--

CREATE TABLE `form_pressing_produksi` (
  `no_pressing` int NOT NULL,
  `kode_mesin` set('X6','X1') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `berat_juice_kg` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `operator` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_pressing_produksi`
--

INSERT INTO `form_pressing_produksi` (`no_pressing`, `kode_mesin`, `nama_produk`, `batch`, `jam_mulai`, `jam_keluar`, `berat_juice_kg`, `keterangan`, `operator`, `tanggal`) VALUES
(1, 'X6', 'qwe', 213, '21:03:00', '21:03:00', 12, 'wqeq', '[asu', '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `form_washing_inspeksi_area`
--

CREATE TABLE `form_washing_inspeksi_area` (
  `no_washing` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_item` set('Washing 1','Washing 2','Washing 3','Spinner 1','Spinner 2','Convayer 1 dan 2','Bak stainless steel','Container','Saringan','Dosing pump klorin','Selang air') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_washing_inspeksi_area`
--

INSERT INTO `form_washing_inspeksi_area` (`no_washing`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Washing 1', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-22'),
(2, 'Mesin', 'Washing 1', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `form_washing_produksi`
--

CREATE TABLE `form_washing_produksi` (
  `no_washing` int NOT NULL,
  `kode_supplier` char(5) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mesin` set('washing','spiner') COLLATE utf8mb4_general_ci NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int NOT NULL,
  `jumlah` int NOT NULL,
  `total_RM` int NOT NULL,
  `waste` int NOT NULL,
  `operator` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_washing_produksi`
--

INSERT INTO `form_washing_produksi` (`no_washing`, `kode_supplier`, `nama_mesin`, `mulai`, `berakhir`, `durasi`, `jumlah`, `total_RM`, `waste`, `operator`, `tanggal`) VALUES
(1, '13', 'washing', '12:03:00', '12:22:00', 1233, 0, 0, 0, '[value-9]', '0000-00-00'),
(2, '213', 'spiner', '12:03:00', '00:32:32', 332, 21332, 2132, 3232, 'asu', '0000-00-00'),
(3, 'sds', 'washing', '12:03:00', '21:33:00', 32313, 2131, 3, 21, 'asu', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `form_weighing_inspeksi_area`
--

CREATE TABLE `form_weighing_inspeksi_area` (
  `no_weighing` int NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') COLLATE utf8mb4_general_ci NOT NULL,
  `nama_item` set('Timbangan 120 kg','Timbangan 50 kg','Conveyor','Container 120 L','Container 50 L','Talenan','Pisau','Asahan pisau','Selang air') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_area` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_weighing_inspeksi_area`
--

INSERT INTO `form_weighing_inspeksi_area` (`no_weighing`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 120 kg', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `form_weighing_perendaman_apel`
--

CREATE TABLE `form_weighing_perendaman_apel` (
  `no_weighing` int NOT NULL,
  `nama_produk` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_apel` int NOT NULL,
  `jumlah_batch` int NOT NULL,
  `jumlah_garam` int NOT NULL,
  `jumlah_air_RO` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `suhu air` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `operator` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_weighing_perendaman_apel`
--

INSERT INTO `form_weighing_perendaman_apel` (`no_weighing`, `nama_produk`, `jumlah_apel`, `jumlah_batch`, `jumlah_garam`, `jumlah_air_RO`, `jam_mulai`, `jam_selesai`, `suhu air`, `operator`, `tanggal`) VALUES
(1, 'dsas', 23, 32, 32, 32, '13:02:00', '21:03:00', '3121', 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `form_weighing_produksi`
--

CREATE TABLE `form_weighing_produksi` (
  `no_weighing` int NOT NULL,
  `varian_produk` set('Asian green','Beat that','Classic green','Firey beat','Green glory','I glow','Golden apple','Golden orange','U glow','Glowing apple','Minty Apple','Firey Apple','Crush watermelon','Glowing Golden','Tropic golden','Glowing calamansi','Tropic calamansi') COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jumlah_batch` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `waste` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_weighing_produksi`
--

INSERT INTO `form_weighing_produksi` (`no_weighing`, `varian_produk`, `jam_mulai`, `jam_selesai`, `jumlah_batch`, `keterangan`, `waste`, `tanggal`) VALUES
(1, 'Beat that', '12:03:00', '13:01:00', 211, 'adasads', '23', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `leader_kelola_operator`
--

CREATE TABLE `leader_kelola_operator` (
  `no` int NOT NULL,
  `departemen` enum('Preparation','Washing','Weighing','Kupas','Pressing','Angel','Filling') COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_laporan` enum('Form inspeksi area','Form Produksi','Form Mesin','Form lain - lain') COLLATE utf8mb4_general_ci NOT NULL,
  `verifikasi` enum('Approve','Not Approve') COLLATE utf8mb4_general_ci NOT NULL,
  `leader` char(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leader_kelola_operator`
--

INSERT INTO `leader_kelola_operator` (`no`, `departemen`, `jenis_laporan`, `verifikasi`, `leader`) VALUES
(4, 'Weighing', 'Form inspeksi area', 'Approve', 'saya');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_aplikasi`
--

CREATE TABLE `tentang_aplikasi` (
  `id` int NOT NULL,
  `tentang` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_aplikasi`
--

INSERT INTO `tentang_aplikasi` (`id`, `tentang`) VALUES
(3, ' Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae, ipsum maiores est doloremque illo in veritatis atque tenetur nobis suscipit repellendus, at error, quod aut repudiandae fugiat ea. Labore mollitia aut modi, impedit sunt tempora ipsam eveniet ratione atque earum architecto ea dolores qui deserunt placeat maiores perferendis. Accusamus, necessitatibus.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_nip` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_status` set('Operator','Leader') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nip`, `user_password`, `user_status`) VALUES
('38210c3f-d681-4fba-b057-f365fc411f6f', '1223', '222', 'Leader'),
('a201', '12345678', 'tes123', 'Operator'),
('a23', '1234', '123', 'Leader'),
('f9703d21-4e33-4c2c-9044-ecfa8fb253c6', '543', '123', 'Leader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_operator_produksi`
--
ALTER TABLE `data_operator_produksi`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `form_angel_inspeksi_area`
--
ALTER TABLE `form_angel_inspeksi_area`
  ADD PRIMARY KEY (`no_angel`);

--
-- Indexes for table `form_angel_produksi`
--
ALTER TABLE `form_angel_produksi`
  ADD PRIMARY KEY (`no_angel`);

--
-- Indexes for table `form_filling_inspeksi_area`
--
ALTER TABLE `form_filling_inspeksi_area`
  ADD PRIMARY KEY (`no_filling`);

--
-- Indexes for table `form_filling_produksi`
--
ALTER TABLE `form_filling_produksi`
  ADD PRIMARY KEY (`no_filling`);

--
-- Indexes for table `form_kupas_inspeksi_area`
--
ALTER TABLE `form_kupas_inspeksi_area`
  ADD PRIMARY KEY (`no_kupas`);

--
-- Indexes for table `form_kupas_produksi`
--
ALTER TABLE `form_kupas_produksi`
  ADD PRIMARY KEY (`no_kupas`);

--
-- Indexes for table `form_preparation_inspeksi_area`
--
ALTER TABLE `form_preparation_inspeksi_area`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indexes for table `form_preparation_mesin_brushing`
--
ALTER TABLE `form_preparation_mesin_brushing`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indexes for table `form_preparation_produksi`
--
ALTER TABLE `form_preparation_produksi`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indexes for table `form_pressing_inspeksi_area`
--
ALTER TABLE `form_pressing_inspeksi_area`
  ADD PRIMARY KEY (`no_pressing`);

--
-- Indexes for table `form_pressing_produksi`
--
ALTER TABLE `form_pressing_produksi`
  ADD PRIMARY KEY (`no_pressing`);

--
-- Indexes for table `form_washing_inspeksi_area`
--
ALTER TABLE `form_washing_inspeksi_area`
  ADD PRIMARY KEY (`no_washing`);

--
-- Indexes for table `form_washing_produksi`
--
ALTER TABLE `form_washing_produksi`
  ADD PRIMARY KEY (`no_washing`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `form_weighing_inspeksi_area`
--
ALTER TABLE `form_weighing_inspeksi_area`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indexes for table `form_weighing_perendaman_apel`
--
ALTER TABLE `form_weighing_perendaman_apel`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indexes for table `form_weighing_produksi`
--
ALTER TABLE `form_weighing_produksi`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indexes for table `leader_kelola_operator`
--
ALTER TABLE `leader_kelola_operator`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tentang_aplikasi`
--
ALTER TABLE `tentang_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_angel_inspeksi_area`
--
ALTER TABLE `form_angel_inspeksi_area`
  MODIFY `no_angel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_angel_produksi`
--
ALTER TABLE `form_angel_produksi`
  MODIFY `no_angel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_filling_inspeksi_area`
--
ALTER TABLE `form_filling_inspeksi_area`
  MODIFY `no_filling` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_filling_produksi`
--
ALTER TABLE `form_filling_produksi`
  MODIFY `no_filling` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `form_kupas_inspeksi_area`
--
ALTER TABLE `form_kupas_inspeksi_area`
  MODIFY `no_kupas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_kupas_produksi`
--
ALTER TABLE `form_kupas_produksi`
  MODIFY `no_kupas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_preparation_inspeksi_area`
--
ALTER TABLE `form_preparation_inspeksi_area`
  MODIFY `no_preparation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `form_preparation_mesin_brushing`
--
ALTER TABLE `form_preparation_mesin_brushing`
  MODIFY `no_preparation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `form_preparation_produksi`
--
ALTER TABLE `form_preparation_produksi`
  MODIFY `no_preparation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_pressing_inspeksi_area`
--
ALTER TABLE `form_pressing_inspeksi_area`
  MODIFY `no_pressing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_pressing_produksi`
--
ALTER TABLE `form_pressing_produksi`
  MODIFY `no_pressing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_washing_inspeksi_area`
--
ALTER TABLE `form_washing_inspeksi_area`
  MODIFY `no_washing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_washing_produksi`
--
ALTER TABLE `form_washing_produksi`
  MODIFY `no_washing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_weighing_inspeksi_area`
--
ALTER TABLE `form_weighing_inspeksi_area`
  MODIFY `no_weighing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_weighing_perendaman_apel`
--
ALTER TABLE `form_weighing_perendaman_apel`
  MODIFY `no_weighing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_weighing_produksi`
--
ALTER TABLE `form_weighing_produksi`
  MODIFY `no_weighing` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leader_kelola_operator`
--
ALTER TABLE `leader_kelola_operator`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tentang_aplikasi`
--
ALTER TABLE `tentang_aplikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
