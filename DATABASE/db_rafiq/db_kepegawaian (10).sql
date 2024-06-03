-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 12:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_fingerprint` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `departement` varchar(60) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_fingerprint`, `name`, `departement`, `datetime`, `status`, `verification_code`) VALUES
(4017, 56, 'IlhamM', 'Printing', '01/02/2024 00:00:50', 'C/Keluar', 'Sidik Jari'),
(4018, 56, 'IlhamM', 'Printing', '01/02/2024 15:58:53', 'C/Masuk', 'Sidik Jari'),
(4019, 56, 'IlhamM', 'Printing', '02/02/2024 00:01:15', 'C/Keluar', 'Sidik Jari'),
(4020, 56, 'IlhamM', 'Printing', '02/02/2024 15:59:15', 'C/Masuk', 'Sidik Jari'),
(4021, 56, 'IlhamM', 'Printing', '03/02/2024 00:01:43', 'C/Keluar', 'Sidik Jari'),
(4022, 56, 'IlhamM', 'Printing', '04/02/2024 07:58:42', 'C/Masuk', 'Sidik Jari'),
(4023, 56, 'IlhamM', 'Printing', '04/02/2024 20:00:59', 'C/Keluar', 'Sidik Jari'),
(4024, 56, 'IlhamM', 'Printing', '05/02/2024 19:59:50', 'C/Masuk', 'Sidik Jari'),
(4025, 56, 'IlhamM', 'Printing', '06/02/2024 08:00:40', 'C/Keluar', 'Sidik Jari'),
(4026, 56, 'IlhamM', 'Printing', '06/02/2024 19:59:11', 'C/Masuk', 'Sidik Jari'),
(4027, 56, 'IlhamM', 'Printing', '07/02/2024 08:00:36', 'C/Keluar', 'Sidik Jari'),
(4028, 56, 'IlhamM', 'Printing', '07/02/2024 19:53:09', 'C/Masuk', 'Sidik Jari'),
(4029, 56, 'IlhamM', 'Printing', '08/02/2024 08:03:54', 'C/Keluar', 'Sidik Jari'),
(4030, 56, 'IlhamM', 'Printing', '08/02/2024 20:58:11', 'C/Masuk', 'Sidik Jari'),
(4031, 56, 'IlhamM', 'Printing', '09/02/2024 08:04:28', 'C/Keluar', 'Sidik Jari'),
(4032, 56, 'IlhamM', 'Printing', '09/02/2024 19:58:02', 'C/Masuk', 'Sidik Jari'),
(4033, 56, 'IlhamM', 'Printing', '10/02/2024 08:01:49', 'C/Keluar', 'Sidik Jari'),
(4034, 56, 'IlhamM', 'Printing', '10/02/2024 20:00:47', 'C/Masuk', 'Sidik Jari'),
(4035, 56, 'IlhamM', 'Printing', '11/02/2024 05:23:47', 'C/Keluar', 'Sidik Jari'),
(4036, 56, 'IlhamM', 'Printing', '11/02/2024 19:56:57', 'C/Masuk', 'Sidik Jari'),
(4037, 56, 'IlhamM', 'Printing', '12/02/2024 08:01:55', 'C/Keluar', 'Sidik Jari'),
(4038, 56, 'IlhamM', 'Printing', '12/02/2024 16:13:27', 'C/Masuk', 'Sidik Jari'),
(4039, 56, 'IlhamM', 'Printing', '13/02/2024 00:00:30', 'C/Keluar', 'Sidik Jari'),
(4040, 56, 'IlhamM', 'Printing', '13/02/2024 15:59:30', 'C/Masuk', 'Sidik Jari'),
(4041, 56, 'IlhamM', 'Printing', '14/02/2024 00:01:17', 'C/Keluar', 'Sidik Jari'),
(4042, 56, 'IlhamM', 'Printing', '14/02/2024 15:58:45', 'C/Masuk', 'Sidik Jari'),
(4043, 56, 'IlhamM', 'Printing', '14/02/2024 23:55:03', 'C/Keluar', 'Sidik Jari'),
(4044, 56, 'IlhamM', 'Printing', '15/02/2024 15:56:19', 'C/Masuk', 'Sidik Jari'),
(4045, 56, 'IlhamM', 'Printing', '16/02/2024 00:01:18', 'C/Keluar', 'Sidik Jari'),
(4046, 56, 'IlhamM', 'Printing', '16/02/2024 16:08:11', 'C/Masuk', 'Sidik Jari'),
(4047, 56, 'IlhamM', 'Printing', '17/02/2024 00:00:21', 'C/Keluar', 'Sidik Jari'),
(4048, 56, 'IlhamM', 'Printing', '18/02/2024 07:59:08', 'C/Masuk', 'Sidik Jari'),
(4049, 56, 'IlhamM', 'Printing', '18/02/2024 20:00:25', 'C/Keluar', 'Sidik Jari'),
(4050, 56, 'IlhamM', 'Printing', '19/02/2024 23:58:37', 'C/Masuk', 'Sidik Jari'),
(4051, 56, 'IlhamM', 'Printing', '20/02/2024 08:00:19', 'C/Keluar', 'Sidik Jari'),
(4052, 56, 'IlhamM', 'Printing', '20/02/2024 23:58:52', 'C/Masuk', 'Sidik Jari'),
(4053, 56, 'IlhamM', 'Printing', '21/02/2024 08:00:54', 'C/Keluar', 'Sidik Jari'),
(4054, 56, 'IlhamM', 'Printing', '21/02/2024 23:50:39', 'C/Masuk', 'Sidik Jari'),
(4055, 56, 'IlhamM', 'Printing', '22/02/2024 08:00:46', 'C/Keluar', 'Sidik Jari'),
(4056, 56, 'IlhamM', 'Printing', '22/02/2024 23:56:59', 'C/Masuk', 'Sidik Jari'),
(4057, 56, 'IlhamM', 'Printing', '23/02/2024 08:01:25', 'C/Keluar', 'Sidik Jari'),
(4058, 56, 'IlhamM', 'Printing', '23/02/2024 23:58:14', 'C/Masuk', 'Sidik Jari'),
(4059, 56, 'IlhamM', 'Printing', '24/02/2024 08:03:17', 'C/Keluar', 'Sidik Jari'),
(4060, 56, 'IlhamM', 'Printing', '24/02/2024 19:56:46', 'C/Masuk', 'Sidik Jari'),
(4061, 56, 'IlhamM', 'Printing', '25/02/2024 08:01:24', 'C/Keluar', 'Sidik Jari'),
(4062, 56, 'IlhamM', 'Printing', '26/02/2024 15:58:26', 'C/Masuk', 'Sidik Jari'),
(4063, 56, 'IlhamM', 'Printing', '27/02/2024 00:00:34', 'C/Keluar', 'Sidik Jari'),
(4064, 56, 'IlhamM', 'Printing', '27/02/2024 15:58:57', 'C/Masuk', 'Sidik Jari'),
(4065, 56, 'IlhamM', 'Printing', '28/02/2024 00:00:17', 'C/Keluar', 'Sidik Jari'),
(4066, 82, 'Fijar', 'Printing', '01/02/2024 00:10:01', 'C/Keluar', 'Sidik Jari'),
(4067, 82, 'Fijar', 'Printing', '01/02/2024 15:57:39', 'C/Masuk', 'Sidik Jari'),
(4068, 82, 'Fijar', 'Printing', '02/02/2024 00:06:51', 'C/Keluar', 'Sidik Jari'),
(4069, 82, 'Fijar', 'Printing', '02/02/2024 15:57:52', 'C/Masuk', 'Sidik Jari'),
(4070, 82, 'Fijar', 'Printing', '03/02/2024 00:04:50', 'C/Keluar', 'Sidik Jari'),
(4071, 82, 'Fijar', 'Printing', '04/02/2024 07:58:21', 'C/Masuk', 'Sidik Jari'),
(4072, 82, 'Fijar', 'Printing', '04/02/2024 20:03:40', 'C/Keluar', 'Sidik Jari'),
(4073, 82, 'Fijar', 'Printing', '05/02/2024 07:57:51', 'C/Masuk', 'Sidik Jari'),
(4074, 82, 'Fijar', 'Printing', '05/02/2024 16:05:03', 'C/Keluar', 'Sidik Jari'),
(4075, 82, 'Fijar', 'Printing', '06/02/2024 07:59:14', 'C/Masuk', 'Sidik Jari'),
(4076, 82, 'Fijar', 'Printing', '06/02/2024 16:05:01', 'C/Keluar', 'Sidik Jari'),
(4077, 82, 'Fijar', 'Printing', '07/02/2024 07:58:05', 'C/Masuk', 'Sidik Jari'),
(4078, 82, 'Fijar', 'Printing', '07/02/2024 16:05:49', 'C/Keluar', 'Sidik Jari'),
(4079, 82, 'Fijar', 'Printing', '08/02/2024 07:58:02', 'C/Masuk', 'Sidik Jari'),
(4080, 82, 'Fijar', 'Printing', '08/02/2024 16:04:23', 'C/Keluar', 'Sidik Jari'),
(4081, 82, 'Fijar', 'Printing', '09/02/2024 07:57:15', 'C/Masuk', 'Sidik Jari'),
(4082, 82, 'Fijar', 'Printing', '09/02/2024 16:16:39', 'C/Keluar', 'Sidik Jari'),
(4083, 82, 'Fijar', 'Printing', '10/02/2024 07:58:59', 'C/Masuk', 'Sidik Jari'),
(4084, 82, 'Fijar', 'Printing', '10/02/2024 20:02:17', 'C/Keluar', 'Sidik Jari'),
(4085, 82, 'Fijar', 'Printing', '11/02/2024 21:57:19', 'C/Masuk', 'Sidik Jari'),
(4086, 82, 'Fijar', 'Printing', '12/02/2024 08:04:20', 'C/Keluar', 'Sidik Jari'),
(4087, 82, 'Fijar', 'Printing', '12/02/2024 23:57:44', 'C/Masuk', 'Sidik Jari'),
(4088, 82, 'Fijar', 'Printing', '13/02/2024 08:02:14', 'C/Keluar', 'Sidik Jari'),
(4089, 82, 'Fijar', 'Printing', '13/02/2024 23:58:17', 'C/Masuk', 'Sidik Jari'),
(4090, 82, 'Fijar', 'Printing', '14/02/2024 09:05:51', 'C/Keluar', 'Sidik Jari'),
(4091, 82, 'Fijar', 'Printing', '15/02/2024 23:58:27', 'C/Masuk', 'Sidik Jari'),
(4092, 82, 'Fijar', 'Printing', '16/02/2024 08:03:43', 'C/Keluar', 'Sidik Jari'),
(4093, 82, 'Fijar', 'Printing', '16/02/2024 23:58:57', 'C/Masuk', 'Sidik Jari'),
(4094, 82, 'Fijar', 'Printing', '17/02/2024 08:03:22', 'C/Keluar', 'Sidik Jari'),
(4095, 82, 'Fijar', 'Printing', '17/02/2024 19:57:58', 'C/Masuk', 'Sidik Jari'),
(4096, 82, 'Fijar', 'Printing', '18/02/2024 08:07:20', 'C/Keluar', 'Sidik Jari'),
(4097, 82, 'Fijar', 'Printing', '19/02/2024 15:57:08', 'C/Masuk', 'Sidik Jari'),
(4098, 82, 'Fijar', 'Printing', '20/02/2024 00:09:05', 'C/Keluar', 'Sidik Jari'),
(4099, 82, 'Fijar', 'Printing', '20/02/2024 15:57:21', 'C/Masuk', 'Sidik Jari'),
(4100, 82, 'Fijar', 'Printing', '21/02/2024 00:03:10', 'C/Keluar', 'Sidik Jari'),
(4101, 82, 'Fijar', 'Printing', '21/02/2024 15:56:22', 'C/Masuk', 'Sidik Jari'),
(4102, 82, 'Fijar', 'Printing', '22/02/2024 00:03:58', 'C/Keluar', 'Sidik Jari'),
(4103, 82, 'Fijar', 'Printing', '22/02/2024 15:58:03', 'C/Masuk', 'Sidik Jari'),
(4104, 82, 'Fijar', 'Printing', '23/02/2024 00:04:04', 'C/Keluar', 'Sidik Jari'),
(4105, 82, 'Fijar', 'Printing', '23/02/2024 15:56:14', 'C/Masuk', 'Sidik Jari'),
(4106, 82, 'Fijar', 'Printing', '24/02/2024 00:03:13', 'C/Keluar', 'Sidik Jari'),
(4107, 82, 'Fijar', 'Printing', '25/02/2024 08:00:42', 'C/Masuk', 'Sidik Jari'),
(4108, 82, 'Fijar', 'Printing', '25/02/2024 20:03:30', 'C/Keluar', 'Sidik Jari'),
(4109, 82, 'Fijar', 'Printing', '26/02/2024 07:56:45', 'C/Masuk', 'Sidik Jari'),
(4110, 82, 'Fijar', 'Printing', '26/02/2024 18:02:57', 'C/Keluar', 'Sidik Jari'),
(4111, 82, 'Fijar', 'Printing', '27/02/2024 07:56:50', 'C/Masuk', 'Sidik Jari'),
(4112, 82, 'Fijar', 'Printing', '27/02/2024 18:02:21', 'C/Keluar', 'Sidik Jari'),
(4113, 82, 'Fijar', 'Printing', '28/02/2024 07:59:03', 'C/Masuk', 'Sidik Jari'),
(4114, 150, 'AhmadHilal', 'Printing', '01/02/2024 08:00:42', 'C/Keluar', 'Sidik Jari'),
(4115, 150, 'AhmadHilal', 'Printing', '01/02/2024 23:56:22', 'C/Masuk', 'Sidik Jari'),
(4116, 150, 'AhmadHilal', 'Printing', '02/02/2024 08:04:52', 'C/Keluar', 'Sidik Jari'),
(4117, 150, 'AhmadHilal', 'Printing', '02/02/2024 23:57:41', 'C/Masuk', 'Sidik Jari'),
(4118, 150, 'AhmadHilal', 'Printing', '03/02/2024 08:21:28', 'C/Keluar', 'Sidik Jari'),
(4119, 150, 'AhmadHilal', 'Printing', '03/02/2024 19:55:09', 'C/Masuk', 'Sidik Jari'),
(4120, 150, 'AhmadHilal', 'Printing', '04/02/2024 08:01:05', 'C/Keluar', 'Sidik Jari'),
(4121, 150, 'AhmadHilal', 'Printing', '05/02/2024 15:56:05', 'C/Masuk', 'Sidik Jari'),
(4122, 150, 'AhmadHilal', 'Printing', '06/02/2024 00:00:38', 'C/Keluar', 'Sidik Jari'),
(4123, 150, 'AhmadHilal', 'Printing', '06/02/2024 15:56:30', 'C/Masuk', 'Sidik Jari'),
(4124, 150, 'AhmadHilal', 'Printing', '07/02/2024 00:00:03', 'C/Keluar', 'Sidik Jari'),
(4125, 150, 'AhmadHilal', 'Printing', '07/02/2024 15:57:31', 'C/Masuk', 'Sidik Jari'),
(4126, 150, 'AhmadHilal', 'Printing', '08/02/2024 00:00:12', 'C/Keluar', 'Sidik Jari'),
(4127, 150, 'AhmadHilal', 'Printing', '08/02/2024 15:54:09', 'C/Masuk', 'Sidik Jari'),
(4128, 150, 'AhmadHilal', 'Printing', '09/02/2024 00:01:03', 'C/Keluar', 'Sidik Jari'),
(4129, 150, 'AhmadHilal', 'Printing', '09/02/2024 15:54:43', 'C/Masuk', 'Sidik Jari'),
(4130, 150, 'AhmadHilal', 'Printing', '10/02/2024 00:00:24', 'C/Keluar', 'Sidik Jari'),
(4131, 150, 'AhmadHilal', 'Printing', '12/02/2024 07:50:12', 'C/Masuk', 'Sidik Jari'),
(4132, 150, 'AhmadHilal', 'Printing', '12/02/2024 16:00:15', 'C/Keluar', 'Sidik Jari'),
(4133, 150, 'AhmadHilal', 'Printing', '13/02/2024 07:51:17', 'C/Masuk', 'Sidik Jari'),
(4134, 150, 'AhmadHilal', 'Printing', '13/02/2024 16:01:27', 'C/Keluar', 'Sidik Jari'),
(4135, 150, 'AhmadHilal', 'Printing', '14/02/2024 09:49:42', 'C/Masuk', 'Sidik Jari'),
(4136, 150, 'AhmadHilal', 'Printing', '14/02/2024 16:01:57', 'C/Keluar', 'Sidik Jari'),
(4137, 150, 'AhmadHilal', 'Printing', '15/02/2024 07:53:33', 'C/Masuk', 'Sidik Jari'),
(4138, 150, 'AhmadHilal', 'Printing', '15/02/2024 16:00:08', 'C/Keluar', 'Sidik Jari'),
(4139, 150, 'AhmadHilal', 'Printing', '16/02/2024 07:56:38', 'C/Masuk', 'Sidik Jari'),
(4140, 150, 'AhmadHilal', 'Printing', '16/02/2024 16:01:32', 'C/Keluar', 'Sidik Jari'),
(4141, 150, 'AhmadHilal', 'Printing', '17/02/2024 07:48:31', 'C/Masuk', 'Sidik Jari'),
(4142, 150, 'AhmadHilal', 'Printing', '17/02/2024 20:00:28', 'C/Keluar', 'Sidik Jari'),
(4143, 150, 'AhmadHilal', 'Printing', '18/02/2024 19:51:05', 'C/Masuk', 'Sidik Jari'),
(4144, 150, 'AhmadHilal', 'Printing', '19/02/2024 08:18:45', 'C/Keluar', 'Sidik Jari'),
(4145, 150, 'AhmadHilal', 'Printing', '19/02/2024 23:52:19', 'C/Masuk', 'Sidik Jari'),
(4146, 150, 'AhmadHilal', 'Printing', '20/02/2024 08:00:27', 'C/Keluar', 'Sidik Jari'),
(4147, 150, 'AhmadHilal', 'Printing', '20/02/2024 23:55:43', 'C/Masuk', 'Sidik Jari'),
(4148, 150, 'AhmadHilal', 'Printing', '21/02/2024 08:00:52', 'C/Keluar', 'Sidik Jari'),
(4149, 150, 'AhmadHilal', 'Printing', '21/02/2024 23:56:22', 'C/Masuk', 'Sidik Jari'),
(4150, 150, 'AhmadHilal', 'Printing', '22/02/2024 08:01:03', 'C/Keluar', 'Sidik Jari'),
(4151, 150, 'AhmadHilal', 'Printing', '22/02/2024 23:56:28', 'C/Masuk', 'Sidik Jari'),
(4152, 150, 'AhmadHilal', 'Printing', '23/02/2024 08:02:16', 'C/Keluar', 'Sidik Jari'),
(4153, 150, 'AhmadHilal', 'Printing', '23/02/2024 23:55:58', 'C/Masuk', 'Sidik Jari'),
(4154, 150, 'AhmadHilal', 'Printing', '24/02/2024 08:00:33', 'C/Keluar', 'Sidik Jari'),
(4155, 150, 'AhmadHilal', 'Printing', '24/02/2024 19:53:08', 'C/Masuk', 'Sidik Jari'),
(4156, 150, 'AhmadHilal', 'Printing', '25/02/2024 08:02:19', 'C/Keluar', 'Sidik Jari'),
(4157, 150, 'AhmadHilal', 'Printing', '26/02/2024 15:53:58', 'C/Masuk', 'Sidik Jari'),
(4158, 150, 'AhmadHilal', 'Printing', '27/02/2024 00:00:08', 'C/Keluar', 'Sidik Jari'),
(4159, 150, 'AhmadHilal', 'Printing', '27/02/2024 16:00:45', 'C/Masuk', 'Sidik Jari'),
(4160, 150, 'AhmadHilal', 'Printing', '28/02/2024 00:01:39', 'C/Keluar', 'Sidik Jari'),
(4161, 168, 'Tohidin', 'Printing', '01/02/2024 00:02:39', 'C/Masuk', 'Sidik Jari'),
(4162, 168, 'Tohidin', 'Printing', '01/02/2024 08:02:56', 'C/Keluar', 'Sidik Jari'),
(4163, 168, 'Tohidin', 'Printing', '02/02/2024 23:59:13', 'C/Masuk', 'Sidik Jari'),
(4164, 168, 'Tohidin', 'Printing', '03/02/2024 08:14:59', 'C/Keluar', 'Sidik Jari'),
(4165, 168, 'Tohidin', 'Printing', '03/02/2024 20:02:17', 'C/Masuk', 'Sidik Jari');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_pegawai`
--

CREATE TABLE `absensi_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(255) DEFAULT NULL,
  `id_fingerprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_pegawai`
--

INSERT INTO `absensi_pegawai` (`id`, `id_pegawai`, `id_fingerprint`) VALUES
(41, 'P-003', 56),
(42, 'P-0034', 82),
(43, 'P-0036', 150),
(44, 'P-0037', 168);

-- --------------------------------------------------------

--
-- Table structure for table `bpjs_jamsos`
--

CREATE TABLE `bpjs_jamsos` (
  `id_bpjs_sos` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `iuran_jjk` varchar(255) NOT NULL,
  `iuran_jkm` varchar(255) NOT NULL,
  `iuran_jht_tk` varchar(255) NOT NULL,
  `iuran_jht` varchar(255) NOT NULL,
  `total_iuran_sos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bpjs_kes`
--

CREATE TABLE `bpjs_kes` (
  `id_bpjs_kes` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `no_kartu` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `total_salary` varchar(255) NOT NULL,
  `total_salary_iuran` varchar(255) NOT NULL,
  `iuran_4` varchar(255) NOT NULL,
  `iuran_1` varchar(255) NOT NULL,
  `total_iuran_kes` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `devisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `devisi`) VALUES
(1, 'HRD GA '),
(2, 'Printing'),
(3, 'Laminasi');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_awal` varchar(255) DEFAULT NULL,
  `tanggal_akhir` varchar(255) DEFAULT NULL,
  `surat` varchar(255) DEFAULT NULL,
  `acc` tinyint(1) NOT NULL,
  `acc_by` varchar(255) DEFAULT NULL,
  `penolakan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `id_pegawai`, `role_id`, `jenis`, `keterangan`, `tanggal_awal`, `tanggal_akhir`, `surat`, `acc`, `acc_by`, `penolakan`) VALUES
(47, 'P-0037', 3, 'Cuti', 'Sakit', '2024/05/15', '2024/05/24', NULL, 0, NULL, NULL),
(48, 'P-0037', 3, 'Cuti', 'Sakit', '2024/05/15', '2024/05/24', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `role_group` varchar(255) NOT NULL,
  `bonus` float NOT NULL,
  `overtime` double NOT NULL,
  `devisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `salary`, `role_group`, `bonus`, `overtime`, `devisi`) VALUES
(1, 'Supervisor HRD GA', 10000000, '2', 300000, 57803.468208092, 1),
(2, 'Supervisor Printing', 10000000, '2', 500000, 57803.468208092, 2),
(3, 'Pegawai HRD GA', 10000000, '4', 300000, 57803.468208092, 1),
(4, 'Leader HRD-GA', 10000000, '3', 300000, 57803.468208092, 1),
(6, 'Leader Printing', 10000000, '3', 300000, 57803.468208092, 2),
(7, 'Pegawai Printing', 10000000, '4', 300000, 57803.468208092, 2),
(8, 'Supervisor Laminasi', 10000000, '2', 300000, 57803.468208092, 3),
(9, 'Pegawai Laminasi', 10000000, '4', 300000, 57803.468208092, 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelaporan_absen`
--

CREATE TABLE `pelaporan_absen` (
  `id_pelaporan` int(255) NOT NULL,
  `id_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi_masalah` text NOT NULL,
  `file` text NOT NULL,
  `jenispelaporan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lembur`
--

CREATE TABLE `tb_lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `waktu_lembur` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_lembur`
--

INSERT INTO `tb_lembur` (`id_lembur`, `id_pegawai`, `date`, `waktu_lembur`, `status`) VALUES
(8, 'P-002', '2023-06-11', '20:00:00', 1),
(9, 'P-002', '2023-07-24', '20:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_payrol`
--

CREATE TABLE `tb_payrol` (
  `id_payrol` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `bonus` varchar(255) NOT NULL,
  `jam_lembur` varchar(255) NOT NULL,
  `lembur` varchar(255) NOT NULL,
  `total_iuran_sos` varchar(255) DEFAULT NULL,
  `total_iuran_kes` varchar(255) DEFAULT NULL,
  `hadir` varchar(255) NOT NULL,
  `tidak_hadir` varchar(255) NOT NULL,
  `izin` varchar(255) NOT NULL DEFAULT '0',
  `sakit` varchar(255) NOT NULL DEFAULT '0',
  `cuti` varchar(250) NOT NULL,
  `pengurangan` varchar(255) NOT NULL,
  `gaji_bersih` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_payrol`
--

INSERT INTO `tb_payrol` (`id_payrol`, `id_pegawai`, `name`, `tanggal`, `jabatan`, `gaji`, `bonus`, `jam_lembur`, `lembur`, `total_iuran_sos`, `total_iuran_kes`, `hadir`, `tidak_hadir`, `izin`, `sakit`, `cuti`, `pengurangan`, `gaji_bersih`, `keterangan`) VALUES
(39, 'P-003', 'Fijar', '02/2024', 'Supervisor Printing', '8000000', '300000', '31', '1433526.0115607', '635200', '400000', '9', '12', '1', '0', '0', '3466666.6666667', '7302059.344894', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(255) NOT NULL,
  `id_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_kepegawaian` int(2) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `devisi` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_user`, `nama_pegawai`, `role_id`, `jekel`, `pendidikan`, `status_kepegawaian`, `agama`, `jabatan`, `no_hp`, `alamat`, `foto`, `ktp`, `devisi`, `tanggal_masuk`) VALUES
('P-003', 'U-003', 'Fijar', 3, 'L', 'SMK 1 Cimahi', 1, 'Islam', 4, '08457945215748', 'Jl. Panglima no 5', 'logo-gpi-removebg-preview45.png', '75ba712a8a868a54f9eb3239cb324678_(1).jpg', '1', '2024-03-16'),
('P-0034', 'U-0034', 'Arlyn', 2, 'L', 'SD 01', 1, 'Islam', 1, '69696969669', 'Lapas sukamiskin', 'monyet11.png', 'test5.png', '1', '2024-05-25'),
('P-0036', 'U-0036', 'Rusdi', 2, 'L', 'SD 01', 1, 'Islam', 2, '69696969669', 'Lapas sukamiskin', 'test12.png', 'test13.png', '2', '2024-05-25'),
('P-0037', 'U-0037', 'Rina', 3, 'L', 'SD 01', 1, 'Islam', 6, '69696969669', 'Lapas sukamiskin', 'test16.png', 'test17.png', '2', '2023-01-25'),
('P-005', 'U-005', 'Tohidin', 3, 'L', 'SMKN YADIKA 1', 1, 'Islam', 3, '08493942941', 'Jl. daan mogot raya', 'codingan4.jpg', '6115edfd2672c-jaemin-nct_663_3721.jpg', '1', '2024-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_presents`
--

CREATE TABLE `tb_presents` (
  `id_presents` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` int(2) NOT NULL,
  `foto_selfie_masuk` varchar(255) DEFAULT NULL,
  `foto_selfie_pulang` varchar(255) DEFAULT NULL,
  `keterangan_izin` text NOT NULL,
  `id_lembur` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `password` varchar(260) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `temp` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`, `created_at`, `updated_at`) VALUES
('U-001', 'PT. GLOBAL PRINTPACK INDONESIA', 'admin@gmail.com', 'logo-gpi.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1, '2024-04-21 02:53:18', '2024-05-11 16:24:12'),
('U-003', 'Fijar', 'abib@gmail.com', 'logo-gpi-removebg-preview45.png', '$2y$10$bqpUP5.HVLH.iaRY8.CYzuZEZnjw2HkEIPaaPQadtPY2K77tUbKNW', 3, 1, 1710567302, 3, '2024-04-21 02:53:18', '2024-05-29 09:18:28'),
('U-0034', 'Arlyn', 'arlyn@gmail.com', 'monyet11.png', '$2y$10$fYKEzU2GdIZgfVDqoAyZueRgeb6zU4gzRWGE1ER9xj1M3UzNl9XHi', 2, 1, 1716657051, 34, '2024-05-25 17:10:51', '2024-05-29 09:17:15'),
('U-0036', 'Rusdi', 'rusdi@gmail.com', NULL, '$2y$10$0l/6q9pSaVRlXEvhWA5nFOYozZ3XyODkZOyULWlZ4TXxz8OQV0Agy', 2, 1, 1716657200, 36, '2024-05-25 17:13:20', '2024-05-26 11:26:16'),
('U-0037', 'Rina', 'rina@gmail.com', 'test16.png', '$2y$10$MZwq7gUBWGQyVMAGQXtTt.WvR1jamzsfAHm4vCwmgVr39Pn2e.0qW', 3, 1, 1716657750, 37, '2024-05-25 17:22:30', '2024-05-25 17:22:30'),
('U-005', 'Tohidin', 'tohidin123@gmail.com', 'codingan4.jpg', '$2y$10$Ow41QP4I/cPRCsjjS71qcuipiu/j33Q3AblR54eALgZPqvbL7qHx2', 4, 1, 1713486286, 5, '2024-04-21 02:53:18', '2024-05-28 10:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'Supervisor'),
(3, 'Leader'),
(4, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `id_user`, `email`, `token`, `date_created`) VALUES
(52, 'U-0034', 'arlyn@gmail.com', 'i0IZahAgBtPZxurxbm4HR5VewaB93EuKHWgjjhpjbDc=', 1716657051),
(53, 'U-0036', 'rusdi@gmail.com', 'ZnL20GDg3+UEQwJH3luwe57Os53PWUgmNOn74owv7Sw=', 1716657200),
(55, 'U-0037', 'rina@gmail.com', 'sH2IIk24AxDqQBYw/cwGefRpsmw8Dp75LTdkYpAhSt4=', 1716657750);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_pegawai` (`id_fingerprint`);

--
-- Indexes for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_fingerprint` (`id_fingerprint`),
  ADD KEY `absensi_pegawai` (`id_pegawai`);

--
-- Indexes for table `bpjs_jamsos`
--
ALTER TABLE `bpjs_jamsos`
  ADD PRIMARY KEY (`id_bpjs_sos`),
  ADD KEY `bpjs_jamsos_pegawai` (`id_pegawai`);

--
-- Indexes for table `bpjs_kes`
--
ALTER TABLE `bpjs_kes`
  ADD PRIMARY KEY (`id_bpjs_kes`),
  ADD KEY `bpjs_kes_pegawai` (`id_pegawai`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_pegawai` (`id_pegawai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_department` (`devisi`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pelaporan_absen`
--
ALTER TABLE `pelaporan_absen`
  ADD PRIMARY KEY (`id_pelaporan`),
  ADD KEY `pelaporan_user` (`id_user`);

--
-- Indexes for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indexes for table `tb_payrol`
--
ALTER TABLE `tb_payrol`
  ADD PRIMARY KEY (`id_payrol`),
  ADD KEY `payrol_pegawai` (`id_pegawai`),
  ADD KEY `payrol_jabatan` (`jabatan`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pegawai_jabatan` (`jabatan`),
  ADD KEY `pegawai_user` (`id_user`);

--
-- Indexes for table `tb_presents`
--
ALTER TABLE `tb_presents`
  ADD PRIMARY KEY (`id_presents`),
  ADD KEY `presents_lembur` (`id_lembur`),
  ADD KEY `presents_pegawai` (`id_pegawai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4166;

--
-- AUTO_INCREMENT for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `bpjs_jamsos`
--
ALTER TABLE `bpjs_jamsos`
  MODIFY `id_bpjs_sos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bpjs_kes`
--
ALTER TABLE `bpjs_kes`
  MODIFY `id_bpjs_kes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelaporan_absen`
--
ALTER TABLE `pelaporan_absen`
  MODIFY `id_pelaporan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_lembur`
--
ALTER TABLE `tb_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_payrol`
--
ALTER TABLE `tb_payrol`
  MODIFY `id_payrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_presents`
--
ALTER TABLE `tb_presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_fingerprint` FOREIGN KEY (`id_fingerprint`) REFERENCES `absensi_pegawai` (`id_fingerprint`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE SET NULL;

--
-- Constraints for table `bpjs_jamsos`
--
ALTER TABLE `bpjs_jamsos`
  ADD CONSTRAINT `bpjs_jamsos_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bpjs_kes`
--
ALTER TABLE `bpjs_kes`
  ADD CONSTRAINT `bpjs_kes_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `id_department` FOREIGN KEY (`devisi`) REFERENCES `department` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelaporan_absen`
--
ALTER TABLE `pelaporan_absen`
  ADD CONSTRAINT `pelaporan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `tb_payrol`
--
ALTER TABLE `tb_payrol`
  ADD CONSTRAINT `payrol_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `pegawai_jabatan` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `tb_presents`
--
ALTER TABLE `tb_presents`
  ADD CONSTRAINT `presents_lembur` FOREIGN KEY (`id_lembur`) REFERENCES `tb_lembur` (`id_lembur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presents_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
