-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 02:13 AM
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
(3868, 56, 'IlhamM', 'Printing', '01/02/2024 00:00:50', 'C/Keluar', 'Sidik Jari'),
(3869, 56, 'IlhamM', 'Printing', '01/02/2024 15:58:53', 'C/Masuk', 'Sidik Jari'),
(3870, 56, 'IlhamM', 'Printing', '02/02/2024 00:01:15', 'C/Keluar', 'Sidik Jari'),
(3871, 56, 'IlhamM', 'Printing', '02/02/2024 15:59:15', 'C/Masuk', 'Sidik Jari'),
(3872, 56, 'IlhamM', 'Printing', '03/02/2024 00:01:43', 'C/Keluar', 'Sidik Jari'),
(3873, 56, 'IlhamM', 'Printing', '04/02/2024 07:58:42', 'C/Masuk', 'Sidik Jari'),
(3874, 56, 'IlhamM', 'Printing', '04/02/2024 20:00:59', 'C/Keluar', 'Sidik Jari'),
(3875, 56, 'IlhamM', 'Printing', '05/02/2024 19:59:50', 'C/Masuk', 'Sidik Jari'),
(3876, 56, 'IlhamM', 'Printing', '06/02/2024 08:00:40', 'C/Keluar', 'Sidik Jari'),
(3877, 56, 'IlhamM', 'Printing', '06/02/2024 19:59:11', 'C/Masuk', 'Sidik Jari'),
(3878, 56, 'IlhamM', 'Printing', '07/02/2024 08:00:36', 'C/Keluar', 'Sidik Jari'),
(3879, 56, 'IlhamM', 'Printing', '07/02/2024 19:53:09', 'C/Masuk', 'Sidik Jari'),
(3880, 56, 'IlhamM', 'Printing', '08/02/2024 08:03:54', 'C/Keluar', 'Sidik Jari'),
(3881, 56, 'IlhamM', 'Printing', '08/02/2024 20:58:11', 'C/Masuk', 'Sidik Jari'),
(3882, 56, 'IlhamM', 'Printing', '09/02/2024 08:04:28', 'C/Keluar', 'Sidik Jari'),
(3883, 56, 'IlhamM', 'Printing', '09/02/2024 19:58:02', 'C/Masuk', 'Sidik Jari'),
(3884, 56, 'IlhamM', 'Printing', '10/02/2024 08:01:49', 'C/Keluar', 'Sidik Jari'),
(3885, 56, 'IlhamM', 'Printing', '10/02/2024 20:00:47', 'C/Masuk', 'Sidik Jari'),
(3886, 56, 'IlhamM', 'Printing', '11/02/2024 05:23:47', 'C/Keluar', 'Sidik Jari'),
(3887, 56, 'IlhamM', 'Printing', '11/02/2024 19:56:57', 'C/Masuk', 'Sidik Jari'),
(3888, 56, 'IlhamM', 'Printing', '12/02/2024 08:01:55', 'C/Keluar', 'Sidik Jari'),
(3889, 56, 'IlhamM', 'Printing', '12/02/2024 16:13:27', 'C/Masuk', 'Sidik Jari'),
(3890, 56, 'IlhamM', 'Printing', '13/02/2024 00:00:30', 'C/Keluar', 'Sidik Jari'),
(3891, 56, 'IlhamM', 'Printing', '13/02/2024 15:59:30', 'C/Masuk', 'Sidik Jari'),
(3892, 56, 'IlhamM', 'Printing', '14/02/2024 00:01:17', 'C/Keluar', 'Sidik Jari'),
(3893, 56, 'IlhamM', 'Printing', '14/02/2024 15:58:45', 'C/Masuk', 'Sidik Jari'),
(3894, 56, 'IlhamM', 'Printing', '14/02/2024 23:55:03', 'C/Keluar', 'Sidik Jari'),
(3895, 56, 'IlhamM', 'Printing', '15/02/2024 15:56:19', 'C/Masuk', 'Sidik Jari'),
(3896, 56, 'IlhamM', 'Printing', '16/02/2024 00:01:18', 'C/Keluar', 'Sidik Jari'),
(3897, 56, 'IlhamM', 'Printing', '16/02/2024 16:08:11', 'C/Masuk', 'Sidik Jari'),
(3898, 56, 'IlhamM', 'Printing', '17/02/2024 00:00:21', 'C/Keluar', 'Sidik Jari'),
(3899, 56, 'IlhamM', 'Printing', '18/02/2024 07:59:08', 'C/Masuk', 'Sidik Jari'),
(3900, 56, 'IlhamM', 'Printing', '18/02/2024 20:00:25', 'C/Keluar', 'Sidik Jari'),
(3901, 56, 'IlhamM', 'Printing', '19/02/2024 23:58:37', 'C/Masuk', 'Sidik Jari'),
(3902, 56, 'IlhamM', 'Printing', '20/02/2024 08:00:19', 'C/Keluar', 'Sidik Jari'),
(3903, 56, 'IlhamM', 'Printing', '20/02/2024 23:58:52', 'C/Masuk', 'Sidik Jari'),
(3904, 56, 'IlhamM', 'Printing', '21/02/2024 08:00:54', 'C/Keluar', 'Sidik Jari'),
(3905, 56, 'IlhamM', 'Printing', '21/02/2024 23:50:39', 'C/Masuk', 'Sidik Jari'),
(3906, 56, 'IlhamM', 'Printing', '22/02/2024 08:00:46', 'C/Keluar', 'Sidik Jari'),
(3907, 56, 'IlhamM', 'Printing', '22/02/2024 23:56:59', 'C/Masuk', 'Sidik Jari'),
(3908, 56, 'IlhamM', 'Printing', '23/02/2024 08:01:25', 'C/Keluar', 'Sidik Jari'),
(3909, 56, 'IlhamM', 'Printing', '23/02/2024 23:58:14', 'C/Masuk', 'Sidik Jari'),
(3910, 56, 'IlhamM', 'Printing', '24/02/2024 08:03:17', 'C/Keluar', 'Sidik Jari'),
(3911, 56, 'IlhamM', 'Printing', '24/02/2024 19:56:46', 'C/Masuk', 'Sidik Jari'),
(3912, 56, 'IlhamM', 'Printing', '25/02/2024 08:01:24', 'C/Keluar', 'Sidik Jari'),
(3913, 56, 'IlhamM', 'Printing', '26/02/2024 15:58:26', 'C/Masuk', 'Sidik Jari'),
(3914, 56, 'IlhamM', 'Printing', '27/02/2024 00:00:34', 'C/Keluar', 'Sidik Jari'),
(3915, 56, 'IlhamM', 'Printing', '27/02/2024 15:58:57', 'C/Masuk', 'Sidik Jari'),
(3916, 56, 'IlhamM', 'Printing', '28/02/2024 00:00:17', 'C/Keluar', 'Sidik Jari'),
(3917, 82, 'Fijar', 'Printing', '01/02/2024 00:10:01', 'C/Keluar', 'Sidik Jari'),
(3918, 82, 'Fijar', 'Printing', '01/02/2024 15:57:39', 'C/Masuk', 'Sidik Jari'),
(3919, 82, 'Fijar', 'Printing', '02/02/2024 00:06:51', 'C/Keluar', 'Sidik Jari'),
(3920, 82, 'Fijar', 'Printing', '02/02/2024 15:57:52', 'C/Masuk', 'Sidik Jari'),
(3921, 82, 'Fijar', 'Printing', '03/02/2024 00:04:50', 'C/Keluar', 'Sidik Jari'),
(3922, 82, 'Fijar', 'Printing', '04/02/2024 07:58:21', 'C/Masuk', 'Sidik Jari'),
(3923, 82, 'Fijar', 'Printing', '04/02/2024 20:03:40', 'C/Keluar', 'Sidik Jari'),
(3924, 82, 'Fijar', 'Printing', '05/02/2024 07:57:51', 'C/Masuk', 'Sidik Jari'),
(3925, 82, 'Fijar', 'Printing', '05/02/2024 16:05:03', 'C/Keluar', 'Sidik Jari'),
(3926, 82, 'Fijar', 'Printing', '06/02/2024 07:59:14', 'C/Masuk', 'Sidik Jari'),
(3927, 82, 'Fijar', 'Printing', '06/02/2024 16:05:01', 'C/Keluar', 'Sidik Jari'),
(3928, 82, 'Fijar', 'Printing', '07/02/2024 07:58:05', 'C/Masuk', 'Sidik Jari'),
(3929, 82, 'Fijar', 'Printing', '07/02/2024 16:05:49', 'C/Keluar', 'Sidik Jari'),
(3930, 82, 'Fijar', 'Printing', '08/02/2024 07:58:02', 'C/Masuk', 'Sidik Jari'),
(3931, 82, 'Fijar', 'Printing', '08/02/2024 16:04:23', 'C/Keluar', 'Sidik Jari'),
(3932, 82, 'Fijar', 'Printing', '09/02/2024 07:57:15', 'C/Masuk', 'Sidik Jari'),
(3933, 82, 'Fijar', 'Printing', '09/02/2024 16:16:39', 'C/Keluar', 'Sidik Jari'),
(3934, 82, 'Fijar', 'Printing', '10/02/2024 07:58:59', 'C/Masuk', 'Sidik Jari'),
(3935, 82, 'Fijar', 'Printing', '10/02/2024 20:02:17', 'C/Keluar', 'Sidik Jari'),
(3936, 82, 'Fijar', 'Printing', '11/02/2024 21:57:19', 'C/Masuk', 'Sidik Jari'),
(3937, 82, 'Fijar', 'Printing', '12/02/2024 08:04:20', 'C/Keluar', 'Sidik Jari'),
(3938, 82, 'Fijar', 'Printing', '12/02/2024 23:57:44', 'C/Masuk', 'Sidik Jari'),
(3939, 82, 'Fijar', 'Printing', '13/02/2024 08:02:14', 'C/Keluar', 'Sidik Jari'),
(3940, 82, 'Fijar', 'Printing', '13/02/2024 23:58:17', 'C/Masuk', 'Sidik Jari'),
(3941, 82, 'Fijar', 'Printing', '14/02/2024 09:05:51', 'C/Keluar', 'Sidik Jari'),
(3942, 82, 'Fijar', 'Printing', '15/02/2024 23:58:27', 'C/Masuk', 'Sidik Jari'),
(3943, 82, 'Fijar', 'Printing', '16/02/2024 08:03:43', 'C/Keluar', 'Sidik Jari'),
(3944, 82, 'Fijar', 'Printing', '16/02/2024 23:58:57', 'C/Masuk', 'Sidik Jari'),
(3945, 82, 'Fijar', 'Printing', '17/02/2024 08:03:22', 'C/Keluar', 'Sidik Jari'),
(3946, 82, 'Fijar', 'Printing', '17/02/2024 19:57:58', 'C/Masuk', 'Sidik Jari'),
(3947, 82, 'Fijar', 'Printing', '18/02/2024 08:07:20', 'C/Keluar', 'Sidik Jari'),
(3948, 82, 'Fijar', 'Printing', '19/02/2024 15:57:08', 'C/Masuk', 'Sidik Jari'),
(3949, 82, 'Fijar', 'Printing', '20/02/2024 00:09:05', 'C/Keluar', 'Sidik Jari'),
(3950, 82, 'Fijar', 'Printing', '20/02/2024 15:57:21', 'C/Masuk', 'Sidik Jari'),
(3951, 82, 'Fijar', 'Printing', '21/02/2024 00:03:10', 'C/Keluar', 'Sidik Jari'),
(3952, 82, 'Fijar', 'Printing', '21/02/2024 15:56:22', 'C/Masuk', 'Sidik Jari'),
(3953, 82, 'Fijar', 'Printing', '22/02/2024 00:03:58', 'C/Keluar', 'Sidik Jari'),
(3954, 82, 'Fijar', 'Printing', '22/02/2024 15:58:03', 'C/Masuk', 'Sidik Jari'),
(3955, 82, 'Fijar', 'Printing', '23/02/2024 00:04:04', 'C/Keluar', 'Sidik Jari'),
(3956, 82, 'Fijar', 'Printing', '23/02/2024 15:56:14', 'C/Masuk', 'Sidik Jari'),
(3957, 82, 'Fijar', 'Printing', '24/02/2024 00:03:13', 'C/Keluar', 'Sidik Jari'),
(3958, 82, 'Fijar', 'Printing', '25/02/2024 08:00:42', 'C/Masuk', 'Sidik Jari'),
(3959, 82, 'Fijar', 'Printing', '25/02/2024 20:03:30', 'C/Keluar', 'Sidik Jari'),
(3960, 82, 'Fijar', 'Printing', '26/02/2024 07:56:45', 'C/Masuk', 'Sidik Jari'),
(3961, 82, 'Fijar', 'Printing', '26/02/2024 18:02:57', 'C/Keluar', 'Sidik Jari'),
(3962, 82, 'Fijar', 'Printing', '27/02/2024 07:56:50', 'C/Masuk', 'Sidik Jari'),
(3963, 82, 'Fijar', 'Printing', '27/02/2024 18:02:21', 'C/Keluar', 'Sidik Jari'),
(3964, 82, 'Fijar', 'Printing', '28/02/2024 07:59:03', 'C/Masuk', 'Sidik Jari'),
(3965, 150, 'AhmadHilal', 'Printing', '01/02/2024 08:00:42', 'C/Keluar', 'Sidik Jari'),
(3966, 150, 'AhmadHilal', 'Printing', '01/02/2024 23:56:22', 'C/Masuk', 'Sidik Jari'),
(3967, 150, 'AhmadHilal', 'Printing', '02/02/2024 08:04:52', 'C/Keluar', 'Sidik Jari'),
(3968, 150, 'AhmadHilal', 'Printing', '02/02/2024 23:57:41', 'C/Masuk', 'Sidik Jari'),
(3969, 150, 'AhmadHilal', 'Printing', '03/02/2024 08:21:28', 'C/Keluar', 'Sidik Jari'),
(3970, 150, 'AhmadHilal', 'Printing', '03/02/2024 19:55:09', 'C/Masuk', 'Sidik Jari'),
(3971, 150, 'AhmadHilal', 'Printing', '04/02/2024 08:01:05', 'C/Keluar', 'Sidik Jari'),
(3972, 150, 'AhmadHilal', 'Printing', '05/02/2024 15:56:05', 'C/Masuk', 'Sidik Jari'),
(3973, 150, 'AhmadHilal', 'Printing', '06/02/2024 00:00:38', 'C/Keluar', 'Sidik Jari'),
(3974, 150, 'AhmadHilal', 'Printing', '06/02/2024 15:56:30', 'C/Masuk', 'Sidik Jari'),
(3975, 150, 'AhmadHilal', 'Printing', '07/02/2024 00:00:03', 'C/Keluar', 'Sidik Jari'),
(3976, 150, 'AhmadHilal', 'Printing', '07/02/2024 15:57:31', 'C/Masuk', 'Sidik Jari'),
(3977, 150, 'AhmadHilal', 'Printing', '08/02/2024 00:00:12', 'C/Keluar', 'Sidik Jari'),
(3978, 150, 'AhmadHilal', 'Printing', '08/02/2024 15:54:09', 'C/Masuk', 'Sidik Jari'),
(3979, 150, 'AhmadHilal', 'Printing', '09/02/2024 00:01:03', 'C/Keluar', 'Sidik Jari'),
(3980, 150, 'AhmadHilal', 'Printing', '09/02/2024 15:54:43', 'C/Masuk', 'Sidik Jari'),
(3981, 150, 'AhmadHilal', 'Printing', '10/02/2024 00:00:24', 'C/Keluar', 'Sidik Jari'),
(3982, 150, 'AhmadHilal', 'Printing', '12/02/2024 07:50:12', 'C/Masuk', 'Sidik Jari'),
(3983, 150, 'AhmadHilal', 'Printing', '12/02/2024 16:00:15', 'C/Keluar', 'Sidik Jari'),
(3984, 150, 'AhmadHilal', 'Printing', '13/02/2024 07:51:17', 'C/Masuk', 'Sidik Jari'),
(3985, 150, 'AhmadHilal', 'Printing', '13/02/2024 16:01:27', 'C/Keluar', 'Sidik Jari'),
(3986, 150, 'AhmadHilal', 'Printing', '14/02/2024 09:49:42', 'C/Masuk', 'Sidik Jari'),
(3987, 150, 'AhmadHilal', 'Printing', '14/02/2024 16:01:57', 'C/Keluar', 'Sidik Jari'),
(3988, 150, 'AhmadHilal', 'Printing', '15/02/2024 07:53:33', 'C/Masuk', 'Sidik Jari'),
(3989, 150, 'AhmadHilal', 'Printing', '15/02/2024 16:00:08', 'C/Keluar', 'Sidik Jari'),
(3990, 150, 'AhmadHilal', 'Printing', '16/02/2024 07:56:38', 'C/Masuk', 'Sidik Jari'),
(3991, 150, 'AhmadHilal', 'Printing', '16/02/2024 16:01:32', 'C/Keluar', 'Sidik Jari'),
(3992, 150, 'AhmadHilal', 'Printing', '17/02/2024 07:48:31', 'C/Masuk', 'Sidik Jari'),
(3993, 150, 'AhmadHilal', 'Printing', '17/02/2024 20:00:28', 'C/Keluar', 'Sidik Jari'),
(3994, 150, 'AhmadHilal', 'Printing', '18/02/2024 19:51:05', 'C/Masuk', 'Sidik Jari'),
(3995, 150, 'AhmadHilal', 'Printing', '19/02/2024 08:18:45', 'C/Keluar', 'Sidik Jari'),
(3996, 150, 'AhmadHilal', 'Printing', '19/02/2024 23:52:19', 'C/Masuk', 'Sidik Jari'),
(3997, 150, 'AhmadHilal', 'Printing', '20/02/2024 08:00:27', 'C/Keluar', 'Sidik Jari'),
(3998, 150, 'AhmadHilal', 'Printing', '20/02/2024 23:55:43', 'C/Masuk', 'Sidik Jari'),
(3999, 150, 'AhmadHilal', 'Printing', '21/02/2024 08:00:52', 'C/Keluar', 'Sidik Jari'),
(4000, 150, 'AhmadHilal', 'Printing', '21/02/2024 23:56:22', 'C/Masuk', 'Sidik Jari'),
(4001, 150, 'AhmadHilal', 'Printing', '22/02/2024 08:01:03', 'C/Keluar', 'Sidik Jari'),
(4002, 150, 'AhmadHilal', 'Printing', '22/02/2024 23:56:28', 'C/Masuk', 'Sidik Jari'),
(4003, 150, 'AhmadHilal', 'Printing', '23/02/2024 08:02:16', 'C/Keluar', 'Sidik Jari'),
(4004, 150, 'AhmadHilal', 'Printing', '23/02/2024 23:55:58', 'C/Masuk', 'Sidik Jari'),
(4005, 150, 'AhmadHilal', 'Printing', '24/02/2024 08:00:33', 'C/Keluar', 'Sidik Jari'),
(4006, 150, 'AhmadHilal', 'Printing', '24/02/2024 19:53:08', 'C/Masuk', 'Sidik Jari'),
(4007, 150, 'AhmadHilal', 'Printing', '25/02/2024 08:02:19', 'C/Keluar', 'Sidik Jari'),
(4008, 150, 'AhmadHilal', 'Printing', '26/02/2024 15:53:58', 'C/Masuk', 'Sidik Jari'),
(4009, 150, 'AhmadHilal', 'Printing', '27/02/2024 00:00:08', 'C/Keluar', 'Sidik Jari'),
(4010, 150, 'AhmadHilal', 'Printing', '27/02/2024 16:00:45', 'C/Masuk', 'Sidik Jari'),
(4011, 150, 'AhmadHilal', 'Printing', '28/02/2024 00:01:39', 'C/Keluar', 'Sidik Jari'),
(4012, 168, 'Tohidin', 'Printing', '01/02/2024 00:02:39', 'C/Masuk', 'Sidik Jari'),
(4013, 168, 'Tohidin', 'Printing', '01/02/2024 08:02:56', 'C/Keluar', 'Sidik Jari'),
(4014, 168, 'Tohidin', 'Printing', '02/02/2024 23:59:13', 'C/Masuk', 'Sidik Jari'),
(4015, 168, 'Tohidin', 'Printing', '03/02/2024 08:14:59', 'C/Keluar', 'Sidik Jari'),
(4016, 168, 'Tohidin', 'Printing', '03/02/2024 20:02:17', 'C/Masuk', 'Sidik Jari');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_pegawai`
--

CREATE TABLE `absensi_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `id_fingerprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_pegawai`
--

INSERT INTO `absensi_pegawai` (`id`, `id_pegawai`, `id_fingerprint`) VALUES
(36, 'P-002', 56),
(37, 'P-003', 82),
(38, 'P-004', 150),
(39, 'P-005', 168),
(40, 'P-006', 226);

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_awal` varchar(255) DEFAULT NULL,
  `tanggal_akhir` varchar(255) DEFAULT NULL,
  `surat` varchar(255) DEFAULT NULL,
  `acc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `id_pegawai`, `jenis`, `keterangan`, `tanggal_awal`, `tanggal_akhir`, `surat`, `acc`) VALUES
(3, 'P-003', 'Sakit', 'test', '2024-03-20', '2024-03-21', 'imasage3.png', 1),
(4, 'P-002', 'Sakit', 'gg', '2024-04-23', '2024-04-25', 'logo_bsi.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `salary` double NOT NULL,
  `bonus` float NOT NULL,
  `overtime` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `salary`, `bonus`, `overtime`) VALUES
(5, 'Leader Printing', 4601988, 1459000, 26601.086705202),
(6, 'Spvr Printing', 4601988, 0, 26601.086705202),
(7, 'Kepala Printing', 4601988, 0, 26601.086705202),
(8, 'Spvr Prepress', 4601988, 0, 26601.086705202),
(9, 'OP 1', 4601988, 987000, 26601.086705202),
(10, 'OP 2', 4601988, 420000, 26601.086705202),
(11, 'Helper Printing', 4601988, 315000, 26601.086705202),
(12, 'OB Printing', 4601988, 0, 26601.086705202),
(13, 'Press Roll', 4601988, 0, 26601.086705202);

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
  `hadir` varchar(255) NOT NULL,
  `tidak_hadir` varchar(255) NOT NULL,
  `izin` varchar(255) NOT NULL DEFAULT '0',
  `sakit` varchar(255) NOT NULL DEFAULT '0',
  `pengurangan` varchar(255) NOT NULL,
  `gaji_bersih` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_payrol`
--

INSERT INTO `tb_payrol` (`id_payrol`, `id_pegawai`, `name`, `tanggal`, `jabatan`, `gaji`, `bonus`, `jam_lembur`, `lembur`, `hadir`, `tidak_hadir`, `izin`, `sakit`, `pengurangan`, `gaji_bersih`, `keterangan`) VALUES
(24, 'P-002', 'IlhamM', '02/2024', 'Spvr Printing', '4601988', '0', '-98', '-2606906.4971098', '26', '0', '0', '0', '0', '1995081.5028902', '-'),
(25, 'P-003', 'Fijar', '02/2024', 'Spvr Printing', '4601988', '0', '195', '5187211.9075144', '27', '0', '0', '1', '153399.6', '9635800.3075144', '-'),
(26, 'P-004', 'AhmadHilal', '02/2024', 'Spvr Printing', '4601988', '0', '-125', '-3325135.8381502', '25', '0', '0', '0', '0', '1276852.1618498', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` varchar(255) NOT NULL,
  `id_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jekel` varchar(10) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `status_kepegawaian` int(2) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `id_user`, `nama_pegawai`, `jekel`, `pendidikan`, `status_kepegawaian`, `agama`, `jabatan`, `no_hp`, `alamat`, `foto`, `ktp`, `tanggal_masuk`) VALUES
('P-002', 'U-002', 'IlhamM', 'P', 'D3 MANAJAMEN INFORMATIKA', 1, 'Islam', 5, '08312232322', 'Rimbo data', 'toonmecom_ad8f15.jpeg', 'Krem_Abstrak_Bagan_Organisasi_Mahasiswa_Grafik.png', '2023-07-22'),
('P-003', 'U-003', 'Fijar', 'L', 'SMK 1 Cimahi', 1, 'Islam', 6, '08457945215748', 'Jl. Panglima no 5', 'FdVoKSTaMAAAFhx.jpg', '75ba712a8a868a54f9eb3239cb324678_(1).jpg', '2024-03-16'),
('P-004', 'U-004', 'AhmadHilal', 'L', 'S1 - Matematika', 1, 'Islam', 11, '08457945215748', 'dirumah', '400467898_358860636666582_3947776527411779473_n.jpg', '314673013_198326749315710_1156564839067922774_n.jpg', '2024-03-20'),
('P-005', 'U-005', 'Tohidin', 'L', 'SMKN YADIKA 1', 1, 'Islam', 6, '08493942941', 'Jl. daan mogot raya', 'download.jpeg', '6115edfd2672c-jaemin-nct_663_3721.jpg', '2024-04-19'),
('P-006', 'U-006', 'Ahmad Andri Rafiq', 'L', 'S1', 1, 'Islam', 5, '085591227777', 'jl. gftdfdfdfsf fdfsfsdfds bbbbbbbf', 'logo-gpi-removebg-preview14.png', 'logo_bsi11.png', '2024-05-01');

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

--
-- Dumping data for table `tb_presents`
--

INSERT INTO `tb_presents` (`id_presents`, `id_pegawai`, `tanggal`, `waktu`, `keterangan`, `foto_selfie_masuk`, `foto_selfie_pulang`, `keterangan_izin`, `id_lembur`, `status`) VALUES
(102, 'P-002', '2023-07-23', '21:44:24', 2, '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y1.png', '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y11.png', '', NULL, 2),
(103, 'P-002', '2023-07-24', '21:46:34', 3, '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y12.png', '1ba9d4dc89ceae0f6802359673761fde6b3e5aaa_s2_n2_y13.png', '', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
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
('U-001', 'PT. GLOBAL PRINTPACK INDONESIA', 'admin@gmail.com', 'logo-gpi.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1, '2024-04-21 02:53:18', '2024-04-24 03:35:27'),
('U-002', 'fira venika', 'firavenika06@gmail.com', 'toonmecom_ad8f15.jpeg', '$2y$10$xlH6ligEzlAiUyFenD5PCuyFhcx5alMP7k8n/DByhq.2gDfeJNqOe', 2, 1, 1690209672, 2, '2024-04-21 02:53:18', '2024-04-21 02:53:18'),
('U-003', 'Fijar', 'abib@gmail.com', '', '$2y$10$FPT9s0hp512HxrUoKahGd.5oBdpOS7fHqRUvkM4IQfMJSeRJuf8nC', 2, 1, 1710567302, 3, '2024-04-21 02:53:18', '2024-04-21 02:53:18'),
('U-004', 'AhmadHilal', 'abib2@gmail.com', '', '$2y$10$mznptia4MmfpSYa/HgqHX.V9YrhRZVsHu7ilGlJJgEARBvXVmyslm', 2, 1, 1710567387, 4, '2024-04-21 02:53:18', '2024-04-21 02:53:18'),
('U-005', 'Tohidin', 'tohidin123@gmail.com', 'download.jpeg', '$2y$10$P/VJu5bRXXEiKu7RQeeiguoQgRC7lZL.zIgeuTfH3EkKHs5enQgLu', 2, 1, 1713486286, 5, '2024-04-21 02:53:18', '2024-04-30 22:21:01'),
('U-006', 'Ahmad Andri Rafiq', 'a.andri.rafiq247@gmail.com', 'logo-gpi-removebg-preview14.png', '$2y$10$aA/hDthOc1N0UAN0dlPbQehyxTym/Uh6QeAs6CMhr0y2US7bAIqJK', 2, 1, 1714515755, 6, '2024-04-30 22:22:35', '2024-04-30 22:35:11');

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
(2, 'petugas');

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
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_pegawai` (`id_pegawai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4017;

--
-- AUTO_INCREMENT for table `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id_payrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_presents`
--
ALTER TABLE `tb_presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `absensi_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

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
