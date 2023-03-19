-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2023 pada 14.56
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `data_operator_produksi`
--

CREATE TABLE `data_operator_produksi` (
  `NIP` int(10) NOT NULL,
  `nama` char(20) NOT NULL,
  `departemen` char(20) NOT NULL,
  `hire_date` date NOT NULL,
  `lokasi` char(50) NOT NULL,
  `NPWP` int(20) NOT NULL,
  `title` char(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_operator_produksi`
--

INSERT INTO `data_operator_produksi` (`NIP`, `nama`, `departemen`, `hire_date`, `lokasi`, `NPWP`, `title`, `gambar`) VALUES
(12345678, 'asu', 'gatau', '2012-11-02', 'tangerang', 1010101, 'Operator', '6416e21118485.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_angel_inspeksi_area`
--

CREATE TABLE `form_angel_inspeksi_area` (
  `no_angel` int(10) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') NOT NULL,
  `nama_item` set('Timbangan 5 kg','AJ.A','AJ.B','AG.A','AG.B','Container 120L','Container 50L','Jar 29L','Jar 5L','Pusher angel','Krat') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_angel_inspeksi_area`
--

INSERT INTO `form_angel_inspeksi_area` (`no_angel`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 5 kg', 'apakah ada bagian yang hilang', 'Iya', 'Lantai', 'Apakah ada sisa buah atau sayur?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_angel_produksi`
--

CREATE TABLE `form_angel_produksi` (
  `no_angel` int(10) NOT NULL,
  `kode_mesin` set('AJ.A','AJ.B','AG.A','AG.B') NOT NULL,
  `raw_material` varchar(20) NOT NULL,
  `untuk_produk` varchar(20) NOT NULL,
  `kode_supplier` int(5) NOT NULL,
  `batch` int(3) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `berat_setelah_angel` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `operator` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_angel_produksi`
--

INSERT INTO `form_angel_produksi` (`no_angel`, `kode_mesin`, `raw_material`, `untuk_produk`, `kode_supplier`, `batch`, `jam_mulai`, `jam_keluar`, `berat_setelah_angel`, `keterangan`, `operator`, `tanggal`) VALUES
(1, 'AJ.A', '', 'asd', 0, 123, '12:03:00', '12:21:00', 321, 'wdadsdads', 'asu', '2023-03-30'),
(2, 'AJ.A', 'eqw', 'asd', 0, 12, '12:03:00', '03:21:00', 123, 'asdadsd', 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_filling_inspeksi_area`
--

CREATE TABLE `form_filling_inspeksi_area` (
  `no_filling` int(10) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan') NOT NULL,
  `part_mesin/peralatan` set('Body tank','Motor agilator','Pipa dan selang product','Conveyor','Nozzle','Mesin digital filling','Kaki mesin','Kabel selang angin','Krat','Slat','Jar 29L','Jar 5L','Selang air','Gelas ukur') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah berbau bahan kimia?','Apakah ada berjamur dan berkarat?','Apakah sudah diberi pelumas?','Apakah ada bagian yang kendor/part hilang?','Apakah ada bagian pecah/sobek/bocor/patah?','Apakah berfungsi normal?') NOT NULL,
  `keterangan_mesin` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Gutter','Convayor','Wastafel stainless','pipa dan selang air') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Tools','Sikat','Sikat gagang','Sponge') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_filling_inspeksi_area`
--

INSERT INTO `form_filling_inspeksi_area` (`no_filling`, `inspeksi_mesin/peralatan`, `part_mesin/peralatan`, `kondisi_mesin/peralatan`, `keterangan_mesin`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Body tank', 'Apakah berbau bahan kimia?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_filling_produksi`
--

CREATE TABLE `form_filling_produksi` (
  `no_filling` int(10) NOT NULL,
  `varian_produk` set('Asian green','Beat that','Classic green','Firey beat','Green glory','I glow','Golden apple','Golden orange','U glow','Glowing apple','Minty Apple','Firey Apple','Crush watermelon','Glowing Golden','Tropic golden','Glowing calamansi','Tropic calamansi') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `line` varchar(10) NOT NULL,
  `plan` set('5000ML','1350ML','435ML','330ML','250ML','50ML') NOT NULL,
  `no_plan` int(20) NOT NULL,
  `hasil` set('5000ML','1350ML','435ML','330ML','250ML','50ML') NOT NULL,
  `no_hasil` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `waste` char(10) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kupas_inspeksi_area`
--

CREATE TABLE `form_kupas_inspeksi_area` (
  `no_kupas` int(20) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') NOT NULL,
  `nama_item` set('Timbangan 120kg','Pisau','Container 120 L','Container 50 L','Talenan','Meja','Selang air') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_kupas_inspeksi_area`
--

INSERT INTO `form_kupas_inspeksi_area` (`no_kupas`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 120kg', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kupas_produksi`
--

CREATE TABLE `form_kupas_produksi` (
  `no_kupas` int(20) NOT NULL,
  `nama_material` set('Nanas','Jeruk','Jambu') NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int(5) NOT NULL,
  `hasil_kg` int(5) NOT NULL,
  `waste_kg` int(5) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_kupas_produksi`
--

INSERT INTO `form_kupas_produksi` (`no_kupas`, `nama_material`, `kode_supplier`, `mulai`, `berakhir`, `durasi`, `hasil_kg`, `waste_kg`, `operator`, `tanggal`) VALUES
(1, 'Nanas', 'qwe', '12:03:00', '13:02:00', 12, 123, 121, 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_preparation_inspeksi_area`
--

CREATE TABLE `form_preparation_inspeksi_area` (
  `no_preparation` int(20) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') NOT NULL,
  `nama_item` set('Brushing','Conveyor 1','Conveyor 2','Timbangan 120kg','Pisau','Talenan','Slat','Keranjang') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_preparation_inspeksi_area`
--

INSERT INTO `form_preparation_inspeksi_area` (`no_preparation`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(20, 'Mesin', 'Brushing', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(21, 'Mesin', 'Brushing', 'apakah ada bagian yang hilang', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(22, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(23, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00'),
(24, 'Mesin', '', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_preparation_mesin_brushing`
--

CREATE TABLE `form_preparation_mesin_brushing` (
  `no_preparation` int(20) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `raw_material` char(20) NOT NULL,
  `QTY` int(5) NOT NULL,
  `kg` int(5) NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_RM` int(5) NOT NULL,
  `waste(kg)` int(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_preparation_mesin_brushing`
--

INSERT INTO `form_preparation_mesin_brushing` (`no_preparation`, `operator`, `kode_supplier`, `raw_material`, `QTY`, `kg`, `mulai`, `berakhir`, `durasi`, `jumlah`, `total_RM`, `waste(kg)`, `tanggal`) VALUES
(1, 'asu', 'asda', 'asdads', 123, 13, '13:23:00', '03:13:00', 32, 321, 32, 13, '2023-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_preparation_produksi`
--

CREATE TABLE `form_preparation_produksi` (
  `no_preparation` int(20) NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `raw_material` char(20) NOT NULL,
  `QTY` int(5) NOT NULL,
  `jam_keluar` time NOT NULL,
  `total_RM` int(5) NOT NULL,
  `waste` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_preparation_produksi`
--

INSERT INTO `form_preparation_produksi` (`no_preparation`, `kode_supplier`, `raw_material`, `QTY`, `jam_keluar`, `total_RM`, `waste`, `tanggal`) VALUES
(1, 'ca', 'asda', 123, '12:01:00', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pressing_inspeksi_area`
--

CREATE TABLE `form_pressing_inspeksi_area` (
  `no_pressing` int(11) NOT NULL,
  `kode_mesin` set('X6','X1') NOT NULL,
  `part_mesin` set('HOPPER','GRINDER','MOVING PLATE','PRESS RACK','BAG PRESS','SAFETY GUARD','JUICE TRAY','START/STOP SWITCH BOX','PRESSURE GAUGE DAN FLOW CONTROL','DIRECTIONAL CONTROL VALVE','MOTOR HYDRAULIC DAN RESERVOIR','AS MOVING PLATE','SHIMS DAN RAIL','CASTER') NOT NULL,
  `kondisi_mesin` set('Apakah berbau bahan kimia?','Apakah ada berjamur dan berkarat?','Apakah sudah diberi pelumas?','Apakah ada bagian yang kendor/part hilang?','Apakah ada bagian pecah/sobek/bocor/patah?','Apakah part berfungsi dengan baik?') NOT NULL,
  `keterangan_mesin` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Gutter','Convayor','Wastafel stainless','pipa dan selang air') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Ember rendaman bag press','Sikat','Sikat gagang','Pembersih dinding') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_pressing_inspeksi_area`
--

INSERT INTO `form_pressing_inspeksi_area` (`no_pressing`, `kode_mesin`, `part_mesin`, `kondisi_mesin`, `keterangan_mesin`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'X1', 'SHIMS DAN RAIL', 'Apakah berbau bahan kimia?', 'Iya', 'Dinding', 'Apakah area bersih?', 'Tidak', '', 'Apakah alat ada identitas?', 'Iya', '2023-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pressing_produksi`
--

CREATE TABLE `form_pressing_produksi` (
  `no_pressing` int(11) NOT NULL,
  `kode_mesin` set('X6','X1') NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `batch` int(3) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `berat_juice_kg` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `operator` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_pressing_produksi`
--

INSERT INTO `form_pressing_produksi` (`no_pressing`, `kode_mesin`, `nama_produk`, `batch`, `jam_mulai`, `jam_keluar`, `berat_juice_kg`, `keterangan`, `operator`, `tanggal`) VALUES
(1, 'X6', 'qwe', 213, '21:03:00', '21:03:00', 12, 'wqeq', '[asu', '2023-03-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_washing_inspeksi_area`
--

CREATE TABLE `form_washing_inspeksi_area` (
  `no_washing` int(20) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') NOT NULL,
  `nama_item` set('Washing 1','Washing 2','Washing 3','Spinner 1','Spinner 2','Convayer 1 dan 2','Bak stainless steel','Container','Saringan','Dosing pump klorin','Selang air') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_washing_inspeksi_area`
--

INSERT INTO `form_washing_inspeksi_area` (`no_washing`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Washing 1', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '2023-03-22'),
(2, 'Mesin', 'Washing 1', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_washing_produksi`
--

CREATE TABLE `form_washing_produksi` (
  `no_washing` int(20) NOT NULL,
  `kode_supplier` char(5) NOT NULL,
  `nama_mesin` set('washing','spiner') NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `durasi` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total_RM` int(10) NOT NULL,
  `waste` int(10) NOT NULL,
  `operator` char(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_washing_produksi`
--

INSERT INTO `form_washing_produksi` (`no_washing`, `kode_supplier`, `nama_mesin`, `mulai`, `berakhir`, `durasi`, `jumlah`, `total_RM`, `waste`, `operator`, `tanggal`) VALUES
(1, '13', 'washing', '12:03:00', '12:22:00', 1233, 0, 0, 0, '[value-9]', '0000-00-00'),
(2, '213', 'spiner', '12:03:00', '00:32:32', 332, 21332, 2132, 3232, 'asu', '0000-00-00'),
(3, 'sds', 'washing', '12:03:00', '21:33:00', 32313, 2131, 3, 21, 'asu', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_weighing_inspeksi_area`
--

CREATE TABLE `form_weighing_inspeksi_area` (
  `no_weighing` int(20) NOT NULL,
  `inspeksi_mesin/peralatan` set('Mesin','Peralatan Produksi') NOT NULL,
  `nama_item` set('Timbangan 120 kg','Timbangan 50 kg','Conveyor','Container 120 L','Container 50 L','Talenan','Pisau','Asahan pisau','Selang air') NOT NULL,
  `kondisi_mesin/peralatan` set('Apakah tercium bau cleaner atau chemical?','Apakah part berfungsi dengan baik?','Apakah ada bagian berjamur?','Apakah ada bagian berkarat?','Apakah ada bagian yang kendor?','Apakah ada bagian pecah/sobek/bocor/patah?','apakah ada bagian yang hilang') NOT NULL,
  `keterangan_mesin/peralatan` enum('Iya','Tidak') NOT NULL,
  `inpeksi_area` set('Lantai','Dinding','Plafond','Pintu','Plastic Curtain','Gutter') NOT NULL,
  `kondisi_area` set('Apakah area bersih?','Apakah ada area yang terkelupas?','Apakah ada area yang retak?','Apakah ada area yang berjamur?','Apakah ada sisa buah atau sayur?') NOT NULL,
  `keterangan_area` enum('Iya','Tidak') NOT NULL,
  `inspeksi_alat_cleaning` set('Alat pel','Tarikan air','Kuraray','Sikat','Sikat gagang','Sponges') NOT NULL,
  `kondisi_alat_cleaning` set('Apakah alat bersih?','Apakah alat berfungsi normal?','Apakah alat ada identitas?','Apakah alat bebas dari jamur?') NOT NULL,
  `keterangan_alat_cleaning` enum('Iya','Tidak') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_weighing_inspeksi_area`
--

INSERT INTO `form_weighing_inspeksi_area` (`no_weighing`, `inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES
(1, 'Mesin', 'Timbangan 120 kg', 'Apakah tercium bau cleaner atau chemical?', 'Iya', 'Lantai', 'Apakah area bersih?', 'Iya', 'Alat pel', 'Apakah alat bersih?', 'Iya', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_weighing_perendaman_apel`
--

CREATE TABLE `form_weighing_perendaman_apel` (
  `no_weighing` int(20) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `jumlah_apel` int(10) NOT NULL,
  `jumlah_batch` int(10) NOT NULL,
  `jumlah_garam` int(10) NOT NULL,
  `jumlah_air_RO` int(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `suhu air` varchar(5) NOT NULL,
  `operator` varchar(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_weighing_perendaman_apel`
--

INSERT INTO `form_weighing_perendaman_apel` (`no_weighing`, `nama_produk`, `jumlah_apel`, `jumlah_batch`, `jumlah_garam`, `jumlah_air_RO`, `jam_mulai`, `jam_selesai`, `suhu air`, `operator`, `tanggal`) VALUES
(1, 'dsas', 23, 32, 32, 32, '13:02:00', '21:03:00', '3121', 'asu', '2023-03-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_weighing_produksi`
--

CREATE TABLE `form_weighing_produksi` (
  `no_weighing` int(20) NOT NULL,
  `varian_produk` set('Asian green','Beat that','Classic green','Firey beat','Green glory','I glow','Golden apple','Golden orange','U glow','Glowing apple','Minty Apple','Firey Apple','Crush watermelon','Glowing Golden','Tropic golden','Glowing calamansi','Tropic calamansi') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jumlah_batch` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `waste` char(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_weighing_produksi`
--

INSERT INTO `form_weighing_produksi` (`no_weighing`, `varian_produk`, `jam_mulai`, `jam_selesai`, `jumlah_batch`, `keterangan`, `waste`, `tanggal`) VALUES
(1, 'Beat that', '12:03:00', '13:01:00', 211, 'adasads', '23', '2023-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leader_kelola_operator`
--

CREATE TABLE `leader_kelola_operator` (
  `no` int(10) NOT NULL,
  `departemen` enum('Preparation','Washing','Weighing','Kupas','Pressing','Angel','Filling') NOT NULL,
  `jenis_laporan` enum('Form inspeksi area','Form Produksi','Form Mesin','Form lain - lain') NOT NULL,
  `verifikasi` enum('Approve','Not Approve') NOT NULL,
  `leader` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_aplikasi`
--

CREATE TABLE `tentang_aplikasi` (
  `tentang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `user_nip` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` set('Operator','Leader') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nip`, `user_password`, `user_status`) VALUES
('a201', '12345678', 'tes123', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_operator_produksi`
--
ALTER TABLE `data_operator_produksi`
  ADD PRIMARY KEY (`NIP`);

--
-- Indeks untuk tabel `form_angel_inspeksi_area`
--
ALTER TABLE `form_angel_inspeksi_area`
  ADD PRIMARY KEY (`no_angel`);

--
-- Indeks untuk tabel `form_angel_produksi`
--
ALTER TABLE `form_angel_produksi`
  ADD PRIMARY KEY (`no_angel`);

--
-- Indeks untuk tabel `form_filling_inspeksi_area`
--
ALTER TABLE `form_filling_inspeksi_area`
  ADD PRIMARY KEY (`no_filling`);

--
-- Indeks untuk tabel `form_filling_produksi`
--
ALTER TABLE `form_filling_produksi`
  ADD PRIMARY KEY (`no_filling`);

--
-- Indeks untuk tabel `form_kupas_inspeksi_area`
--
ALTER TABLE `form_kupas_inspeksi_area`
  ADD PRIMARY KEY (`no_kupas`);

--
-- Indeks untuk tabel `form_kupas_produksi`
--
ALTER TABLE `form_kupas_produksi`
  ADD PRIMARY KEY (`no_kupas`);

--
-- Indeks untuk tabel `form_preparation_inspeksi_area`
--
ALTER TABLE `form_preparation_inspeksi_area`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indeks untuk tabel `form_preparation_mesin_brushing`
--
ALTER TABLE `form_preparation_mesin_brushing`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indeks untuk tabel `form_preparation_produksi`
--
ALTER TABLE `form_preparation_produksi`
  ADD PRIMARY KEY (`no_preparation`);

--
-- Indeks untuk tabel `form_pressing_inspeksi_area`
--
ALTER TABLE `form_pressing_inspeksi_area`
  ADD PRIMARY KEY (`no_pressing`);

--
-- Indeks untuk tabel `form_pressing_produksi`
--
ALTER TABLE `form_pressing_produksi`
  ADD PRIMARY KEY (`no_pressing`);

--
-- Indeks untuk tabel `form_washing_inspeksi_area`
--
ALTER TABLE `form_washing_inspeksi_area`
  ADD PRIMARY KEY (`no_washing`);

--
-- Indeks untuk tabel `form_washing_produksi`
--
ALTER TABLE `form_washing_produksi`
  ADD PRIMARY KEY (`no_washing`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `form_weighing_inspeksi_area`
--
ALTER TABLE `form_weighing_inspeksi_area`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indeks untuk tabel `form_weighing_perendaman_apel`
--
ALTER TABLE `form_weighing_perendaman_apel`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indeks untuk tabel `form_weighing_produksi`
--
ALTER TABLE `form_weighing_produksi`
  ADD PRIMARY KEY (`no_weighing`);

--
-- Indeks untuk tabel `leader_kelola_operator`
--
ALTER TABLE `leader_kelola_operator`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_angel_inspeksi_area`
--
ALTER TABLE `form_angel_inspeksi_area`
  MODIFY `no_angel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_angel_produksi`
--
ALTER TABLE `form_angel_produksi`
  MODIFY `no_angel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `form_filling_inspeksi_area`
--
ALTER TABLE `form_filling_inspeksi_area`
  MODIFY `no_filling` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_filling_produksi`
--
ALTER TABLE `form_filling_produksi`
  MODIFY `no_filling` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `form_kupas_inspeksi_area`
--
ALTER TABLE `form_kupas_inspeksi_area`
  MODIFY `no_kupas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_kupas_produksi`
--
ALTER TABLE `form_kupas_produksi`
  MODIFY `no_kupas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_preparation_inspeksi_area`
--
ALTER TABLE `form_preparation_inspeksi_area`
  MODIFY `no_preparation` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `form_preparation_mesin_brushing`
--
ALTER TABLE `form_preparation_mesin_brushing`
  MODIFY `no_preparation` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_preparation_produksi`
--
ALTER TABLE `form_preparation_produksi`
  MODIFY `no_preparation` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_pressing_inspeksi_area`
--
ALTER TABLE `form_pressing_inspeksi_area`
  MODIFY `no_pressing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_pressing_produksi`
--
ALTER TABLE `form_pressing_produksi`
  MODIFY `no_pressing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_washing_inspeksi_area`
--
ALTER TABLE `form_washing_inspeksi_area`
  MODIFY `no_washing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `form_washing_produksi`
--
ALTER TABLE `form_washing_produksi`
  MODIFY `no_washing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `form_weighing_inspeksi_area`
--
ALTER TABLE `form_weighing_inspeksi_area`
  MODIFY `no_weighing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_weighing_perendaman_apel`
--
ALTER TABLE `form_weighing_perendaman_apel`
  MODIFY `no_weighing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_weighing_produksi`
--
ALTER TABLE `form_weighing_produksi`
  MODIFY `no_weighing` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
