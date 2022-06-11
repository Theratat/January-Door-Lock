-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 05:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `january_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `PIN` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`PIN`, `username`, `password`, `firstname`, `lastname`, `email`, `owner_status`) VALUES
('1FOJQPC0', 'receivered', '$2y$10$HiWFSsbyfzOiSla5UGuK/OYRJ0QDTsq9qxp17gv6CdKoogQLwG7pW', 'receiverer', 'receiver', 'receiver@example.com', 0),
('2EU2Z5IH', 'edach', 'typa57=-7-Q', 'Carmella', 'Graham', 'adolph28@example.com', 0),
('2JUPB88O', 'kulas.gabriel', 'Kn:d(V99wc', 'Myra', 'Larson', 'khudson@example.com', 0),
('2MRG5XVR', 'brady32', 'R,gQ@<;_h', 'Jalen', 'Tillman', 'feil.ruby@example.net', 0),
('4H53RISW', 'lovelydeadpool', '$2y$10$NZGl8943WtwKmrNTYpSp2.wVmFITXN.wmN29J6g0ZAenroPJ2zKji', 'Deadpool', 'Wilson', 'ddd@example.com', 1),
('4I3X3ZTY', 'kevimaew123', '$2y$10$JWX2ChbpZmLQKUYZBYs/eOGd/i5mW5bBCaKdweh.zHqx1uj432YZy', 'Kevi', 'Target', 'Kevii_maew@example.cpm', 1),
('5SK0YGGE', 'soulloveirin', '$2y$10$tPydi3gIs6sxZyYYk.qxKeUqgN8ylYCUKQPHFO/0JBwDiMAtoytIC', 'Soul', 'Cool', 'Soul_prisident@example.com', 0),
('5VN70VU0', 'samantha91', 'X3A[2L', 'Dorcas', 'Conn', 'npowlowski@example.com', 0),
('6IWX2XM9', 'breitenberg.brody', ';|LnOb', 'Erich', 'Cronin', 'roma.lesch@example.net', 0),
('7B24LJNE', 'helen70', '-VjWO5|QJzLx+#5A\\sQ|', 'Jeffrey', 'Okuneva', 'annalise46@example.net', 0),
('7CU21ADD', 'account', '$2y$10$Cp0cfD97zIiTVVMim6dX4uhMEl63Ruulw9w16fJ3vSoW9R1Roi82i', 'Hello', 'world', 'suckcode@example.com', 1),
('96YP6TMB', 'jammie.mann', '#A=!RY@@(;?$zs%JS', 'Joan', 'Macejkovic', 'erica22@example.net', 0),
('9CTMW43G', 'fkreiger', 'jDMR#TmTvJ(Zzt', 'Murray', 'Hackett', 'mccullough.braulio@example.com', 0),
('9MLAZRKJ', 'january', '$2y$10$ROzLCrU0tqwEF7Tvd4zAKOLkfEGK/vpL5nLGuc5P.vgtQH.rWJAXy', 'ASD', 'WASD', 'mail@example.com', 1),
('B5RDNW9D', 'nader.sydnee', 'xUy;\"?4.%S7ESz', 'Katheryn', 'Carroll', 'rtremblay@example.net', 0),
('BADI9E3M', 'cummerata.kadin', '8454u$zrjl`b,Ml', 'Robyn', 'Howe', 'davis.betty@example.net', 0),
('BG7RP0CV', 'receiver', '$2y$10$PThyVCaJXWsoq.b3tkAJl.jTv56GZRdgAvCAoFjCFMFaWhPMxcDTK', 'receiver', 'receiver', 'receiver@example.com', 0),
('CM41MMVZ', 'aliyah.ernser', 'Q0ST)\'\'({p]M#o', 'Kimberly', 'Bahringer', 'boyd.lind@example.com', 0),
('CV2ZRBBR', 'margot.connelly', '%[h(-#R_zs;', 'Hector', 'Koss', 'shanelle28@example.net', 0),
('DQRTKPXJ', 'pcast', '$2y$10$qnLXFJMzpCOtFH1PIyu3quBjuP2pdmKuzMAVLJ8jPaY7OXJbj1.Ga', 'pod', 'cast', 'pcastp@example.com', 1),
('EY8ID25B', 'maggie08', '7O6(.4', 'Pearline', 'Schuppe', 'berniece.kerluke@example.net', 0),
('FBGZ7VCW', 'ssom', '$2y$10$Hswz.a92NZer4JFatwgotuTaKU22MH62G8Y/G6rB0VTpX/4tvXHXS', 'Theratat', 'Somprasert', 'ssom.ts@gmail.com', 0),
('FGN051TS', 'jan123', '$2y$10$7q4C63FKMbvzXIZd/8iTU.DdrPDlmqmXvjSBiWqQUw/urCjuVR2gO', 'January', 'Doorlock', 'jan_doorlock@example.com', 0),
('FGU5QRQR', 'aruto', '$2y$10$srgjBTJcYhCIrQ9FVCTLM.olTFCfySChiiqp5SHz/aS/K8hnCKwIi', 'Aruto', 'Shinai', 'Aruto_janito@example.cpm', 0),
('FI3B5XZJ', 'martz', '$2y$10$FJwofDbrzly/YFFXXJIjgOM6itN8MXDPKMJgc5Zs7ppFMAQ7X5cna', 'Martin', 'Laws', 'play_hard123@example.com', 1),
('GIV8F4QM', 'oharvey', '!KgNyPi8V$|1g', 'Hallie', 'Greenholt', 'mohr.ruthie@example.com', 0),
('HNA09CK9', 'account1', '$2y$10$zznjXD0TByZNNjI7ANYwf.yG.fWUNMQeeoIeyTpZN.ncIgrGYAM26', 'Test', 'User', 'wanttosleep.example.com', 0),
('IIKS7VF8', 'Qurtez111', '$2y$10$K/1iA7wcbR8Etfix8NI8hevTyARGoAkogAUTxQFmaRJ2d9QxmSr6G', 'Theratat', 'Somprasert', 'ssom.ts@gmail.com', 0),
('JKI2YEA2', 'receiver3', '$2y$10$Cs/9esISQnjESwaJMdaB4u4SlXS3tj3CcE18JJvGlLh6GaQ3KQJBa', 'receiver', 'receiver', 'receiver@example.com', 0),
('JL9KJ6IV', 'hackett.pat', '\'d1&}q[OCG', 'Kaden', 'Reichert', 'wilderman.madisyn@example.com', 0),
('L1HDZSOE', 'ruby', '$2y$10$QFAqoPI3qS.poY6oekDu2.DE.uQSX0hoZi2hnSxMfNfvkoCDFD.hm', 'Tharatut', 'Singhak', 'jaja1234@example.com', 1),
('NTCBKJ31', 'lo', '$2y$10$2FyznTCEUskge1trGdrXMeTVg/0jFED1nEfexnroptgadpW3n4Xqe', 'LO', 'WELO', 'lolweller@example.com', 0),
('P2EEFEBC', 'receiver2', '$2y$10$rhrKbGVeDFRwiAP67avlTOr/x2orOhuSB1vM98HbHfgg/dBg0g0LO', 'receiver', 'receiver', 'receiver@example.com', 0),
('P2HXT57Q', 'runolfsdottir.delta', '<Q-D|^Uu1[', 'Aditya', 'Stanton', 'samanta.lueilwitz@example.org', 0),
('P5U2M3V5', 'banana', '$2y$10$6IhmQVNDgaBu5RqoKro43.q52kgnhNUfB6VPlVMF4n2fZmGkCbdv.', 'January', 'Testing', 'jantest@example.com', 1),
('PVZS1GR1', 'anderson.loma', 'e9al\"Ok\'v<', 'Thelma', 'Jaskolski', 'pboyer@example.org', 0),
('QCUPF31D', 'roma.rohan', '@/0deY,#02^Xy,Mz', 'Jacynthe', 'Kuphal', 'katheryn20@example.org', 0),
('S4AMOS6V', 'harber.sammie', '^~XWfqkZ*', 'Jazlyn', 'Cartwright', 'reilly.kassulke@example.org', 0),
('SX08QSS1', 'ignatius.reichert', 'cN-6$D+TE]K0<6~DWL#', 'Eli', 'Mosciski', 'zola71@example.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`owner`, `contact`) VALUES
('4H53RISW', '2EU2Z5IH'),
('4H53RISW', '2JUPB88O'),
('4H53RISW', '2MRG5XVR'),
('7CU21ADD', '1FOJQPC0'),
('7CU21ADD', '2EU2Z5IH'),
('7CU21ADD', '2JUPB88O'),
('7CU21ADD', '2MRG5XVR'),
('7CU21ADD', 'FI3B5XZJ'),
('7CU21ADD', 'P2HXT57Q'),
('7CU21ADD', 'PVZS1GR1'),
('7CU21ADD', 'QCUPF31D'),
('7CU21ADD', 'S4AMOS6V'),
('7CU21ADD', 'SX08QSS1'),
('9MLAZRKJ', '2EU2Z5IH'),
('9MLAZRKJ', '2JUPB88O'),
('9MLAZRKJ', '2MRG5XVR'),
('9MLAZRKJ', 'FGN051TS'),
('FI3B5XZJ', '2EU2Z5IH'),
('FI3B5XZJ', '7CU21ADD'),
('L1HDZSOE', '2EU2Z5IH'),
('L1HDZSOE', '2JUPB88O'),
('L1HDZSOE', '2MRG5XVR'),
('P5U2M3V5', '2EU2Z5IH'),
('P5U2M3V5', '2JUPB88O');

-- --------------------------------------------------------

--
-- Table structure for table `contact_groups`
--

CREATE TABLE `contact_groups` (
  `groupid` int(20) NOT NULL,
  `groupname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_pin` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_groups`
--

INSERT INTO `contact_groups` (`groupid`, `groupname`, `owner_pin`) VALUES
(25, 'CMU freshy', '4I3X3ZTY'),
(26, 'NeW_WorlD', 'FI3B5XZJ'),
(27, 'helloworld', 'FI3B5XZJ'),
(28, 'newgroup', 'L1HDZSOE'),
(29, 'hollowworld', '7CU21ADD'),
(34, 'Sawatdeewanparuhat', 'FI3B5XZJ'),
(36, '1234', 'FI3B5XZJ'),
(37, 'Banana staff', 'P5U2M3V5'),
(38, 'January Staff', '9MLAZRKJ'),
(46, 'Proper groupname', '7CU21ADD'),
(60, 'hel', '7CU21ADD'),
(61, 'Grape', '7CU21ADD'),
(69, 'Highschool', '7CU21ADD'),
(70, 'Highschool', '7CU21ADD');

-- --------------------------------------------------------

--
-- Table structure for table `contact_group_members`
--

CREATE TABLE `contact_group_members` (
  `groupid` int(11) DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_group_members`
--

INSERT INTO `contact_group_members` (`groupid`, `contact`) VALUES
(28, '2EU2Z5IH'),
(28, '2JUPB88O'),
(28, '2MRG5XVR'),
(29, '2EU2Z5IH'),
(29, '2JUPB88O'),
(29, '2MRG5XVR'),
(29, 'P2HXT57Q'),
(29, 'PVZS1GR1'),
(29, 'QCUPF31D'),
(29, 'S4AMOS6V'),
(29, 'SX08QSS1'),
(36, '2EU2Z5IH'),
(37, '2EU2Z5IH'),
(38, '2EU2Z5IH'),
(38, '2JUPB88O'),
(38, '2MRG5XVR'),
(61, '2EU2Z5IH'),
(61, '2JUPB88O'),
(61, '2MRG5XVR'),
(69, '1FOJQPC0'),
(69, '2EU2Z5IH'),
(69, '2JUPB88O'),
(69, '2MRG5XVR'),
(69, 'FI3B5XZJ');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `deviceid` int(20) NOT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`deviceid`, `device_name`, `device_location`, `owner`) VALUES
(25, 'Deva hall of fame', '123/456/789/hell/heaven', 'FI3B5XZJ'),
(26, 'Boss room', 'unknown', 'FI3B5XZJ'),
(27, 'Hall', '1', 'L1HDZSOE'),
(28, 'Room', 'Building', 'L1HDZSOE'),
(29, 'Room 123', 'huihin resort ansapa 123/45 hui hin', '7CU21ADD'),
(30, 'Device', 'Device Location', 'P5U2M3V5'),
(31, 'Device2', 'Location2', '9MLAZRKJ'),
(32, 'Device3', 'Location3', '9MLAZRKJ'),
(33, 'Hidden device', '1234/4321 Oma Castle', '7CU21ADD'),
(34, 'Gohan', 'Castle', '7CU21ADD'),
(35, 'Device Exception', 'Exception test', 'DQRTKPXJ'),
(36, 'xxxx', 'xxxxxxxxxxx', 'DQRTKPXJ'),
(37, 'ppppp', 'pppppppppp', 'DQRTKPXJ'),
(38, 'Pub', 'Bage street', '4H53RISW'),
(39, 'Bar', 'Bager Street', '4H53RISW'),
(40, 'rgergs', 'gwrgsgr', '4H53RISW'),
(41, 'Test device', 'Test location', '7CU21ADD'),
(42, 'TestApp', '2778272', '7CU21ADD'),
(43, 'fjgffgj', 'fjfgjgfjgfjgf', '7CU21ADD'),
(44, 'jgtmfhtdchgf', 'rdrgg', 'FI3B5XZJ');

-- --------------------------------------------------------

--
-- Table structure for table `group_keys`
--

CREATE TABLE `group_keys` (
  `groupid` int(11) NOT NULL,
  `deviceid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_keys`
--

INSERT INTO `group_keys` (`groupid`, `deviceid`) VALUES
(26, 25),
(29, 33),
(29, 34),
(29, 43),
(36, 25),
(36, 26),
(37, 30);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `firstname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`created_at`, `firstname`, `lastname`, `device_name`, `deviceid`) VALUES
('2019-10-16 02:44:55', 'Carmella', 'Graham', 'Hidden device', 33),
('2019-10-16 02:50:23', 'Carmella', 'Graham', 'Hidden device', 33),
('2019-10-16 03:04:57', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 07:46:36', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 07:46:42', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 07:46:47', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:05:54', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:05:54', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:06:07', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:06:28', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:07:15', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:07:24', 'Thelma', 'Jaskolski', 'Gohan', 34),
('2019-10-16 08:25:31', 'Thelma', 'Jaskolski', 'Gohan', 34);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_30_135400_create_accounts_table', 1),
(2, '2019_08_30_140127_create_contacts_table', 1),
(3, '2019_08_30_140202_create_contact_groups_table', 1),
(4, '2019_08_30_140242_create_contact_group_members_table', 1),
(5, '2019_08_30_140301_create_devices_table', 1),
(6, '2019_08_30_140320_create_logs_table', 1),
(7, '2019_08_30_140340_create_notifications_table', 1),
(8, '2019_08_30_140353_create_notification_statuses_table', 1),
(9, '2019_08_30_140416_create_permission_keys_table', 1),
(10, '2019_08_30_145856_create_office_hours_table', 1),
(11, '2019_09_03_163223_create_serials_table', 2),
(21, '2019_09_09_104342_create_group_keys_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `receiver` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`receiver`, `description`, `created_at`) VALUES
('1FOJQPC0', 'You received Hall key (permanant) from Tharatut Singhak', '2019-09-13 08:09:42'),
('2EU2Z5IH', 'You received Hall key (permanant) from Tharatut Singhak', '2019-09-13 08:09:42'),
('2JUPB88O', 'You received Hall key (permanant) from Tharatut Singhak', '2019-09-13 08:09:42'),
('2MRG5XVR', 'You received Hall key (permanant) from Tharatut Singhak', '2019-09-13 08:09:42'),
('1FOJQPC0', 'You received Room key (permanant) from Tharatut Singhak', '2019-09-13 08:19:19'),
('2EU2Z5IH', 'You received Room key (permanant) from Tharatut Singhak', '2019-09-13 08:19:19'),
('2JUPB88O', 'You received Room key (permanant) from Tharatut Singhak', '2019-09-13 08:19:19'),
('2MRG5XVR', 'You received Room key (permanant) from Tharatut Singhak', '2019-09-13 08:19:19'),
('1FOJQPC0', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:13:43'),
('2EU2Z5IH', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:57'),
('2JUPB88O', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:57'),
('2MRG5XVR', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:57'),
('P2HXT57Q', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:57'),
('PVZS1GR1', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:57'),
('QCUPF31D', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:58'),
('S4AMOS6V', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:58'),
('SX08QSS1', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:14:58'),
('1FOJQPC0', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('2EU2Z5IH', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('2JUPB88O', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('2MRG5XVR', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('P2HXT57Q', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('PVZS1GR1', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('QCUPF31D', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('S4AMOS6V', 'Your Room 123 key has been remove.', '2019-09-13 16:15:07'),
('SX08QSS1', 'Your Room 123 key has been remove.', '2019-09-13 16:15:08'),
('1FOJQPC0', 'You received Room 123 key (permanant) from Hello world', '2019-09-13 16:15:48'),
('1FOJQPC0', 'Your Room 123 key has been remove.', '2019-09-13 16:15:51'),
('1FOJQPC0', 'You received Device key (schedule,[Monday,Tuesday],-) from January Testing', '2019-09-16 04:43:05'),
('2EU2Z5IH', 'You received Device key (schedule,[Monday,Tuesday],-) from January Testing', '2019-09-16 04:43:05'),
('2JUPB88O', 'You received Device key (schedule,[Monday],-) from January Testing', '2019-09-16 04:44:46'),
('2EU2Z5IH', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:03:59'),
('2JUPB88O', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('2MRG5XVR', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('P2HXT57Q', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('PVZS1GR1', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('QCUPF31D', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('S4AMOS6V', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('SX08QSS1', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:04:00'),
('2EU2Z5IH', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('2JUPB88O', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('2MRG5XVR', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('P2HXT57Q', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('PVZS1GR1', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('QCUPF31D', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('S4AMOS6V', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('SX08QSS1', 'Your Room 123 key has been remove.', '2019-09-16 05:04:19'),
('1FOJQPC0', 'You received Room 123 key (permanant) from Hello world', '2019-09-16 05:07:53'),
('1FOJQPC0', 'You received Device2 key (schedule,[Monday,Tuesday,Wednesday,Thursday,Friday],-) from ASD WASD', '2019-09-16 09:42:49'),
('2EU2Z5IH', 'You received Device2 key (schedule,[Monday,Tuesday,Wednesday,Thursday,Friday],-) from ASD WASD', '2019-09-16 09:42:49'),
('2JUPB88O', 'You received Device2 key (schedule,[Monday,Tuesday,Wednesday,Thursday,Friday],-) from ASD WASD', '2019-09-16 09:42:49'),
('2MRG5XVR', 'You received Device2 key (schedule,[Monday,Tuesday,Wednesday,Thursday,Friday],-) from ASD WASD', '2019-09-16 09:42:49'),
('FGN051TS', 'You received Device3 key (permanant) from ASD WASD', '2019-09-16 09:43:37'),
('1FOJQPC0', 'Your Device2 key has been remove.', '2019-09-16 09:44:06'),
('2EU2Z5IH', 'Your Device2 key has been remove.', '2019-09-16 09:44:06'),
('2JUPB88O', 'Your Device2 key has been remove.', '2019-09-16 09:44:07'),
('2MRG5XVR', 'Your Device2 key has been remove.', '2019-09-16 09:44:07'),
('FGN051TS', 'Your Device3 key has been remove.', '2019-09-16 09:44:40'),
('2EU2Z5IH', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:54'),
('2JUPB88O', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:54'),
('2MRG5XVR', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:54'),
('P2HXT57Q', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:54'),
('PVZS1GR1', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:54'),
('QCUPF31D', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:55'),
('S4AMOS6V', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:55'),
('SX08QSS1', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 09:30:55'),
('2EU2Z5IH', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:39'),
('2JUPB88O', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('2MRG5XVR', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('P2HXT57Q', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('PVZS1GR1', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('QCUPF31D', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('S4AMOS6V', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('SX08QSS1', 'You received Hidden device key (permanant) from Hello world', '2019-09-17 13:54:40'),
('2EU2Z5IH', 'Your Room 123 key has been remove.', '2019-09-17 14:13:47'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:33:20'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:33:21'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:33:21'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:42:29'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:42:30'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:42:30'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:50:21'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:50:22'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:50:23'),
('2EU2Z5IH', 'You received  key (permanant) from Hello world', '2019-09-17 14:50:24'),
('2EU2Z5IH', 'You received Room 123 key (permanant) from Hello world', '2019-09-17 14:54:36'),
('2EU2Z5IH', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:33:26'),
('2EU2Z5IH', 'Your Gohan key has been remove.', '2019-09-17 15:33:43'),
('2EU2Z5IH', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:34:19'),
('2JUPB88O', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:27'),
('2MRG5XVR', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('P2HXT57Q', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('PVZS1GR1', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('QCUPF31D', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('S4AMOS6V', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('SX08QSS1', 'You received Gohan key (schedule,[Sunday,Monday],-) from Hello world', '2019-09-17 15:35:28'),
('2EU2Z5IH', 'Your Gohan key has been remove.', '2019-09-17 15:37:21'),
('2JUPB88O', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('2MRG5XVR', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('P2HXT57Q', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('PVZS1GR1', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('QCUPF31D', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('S4AMOS6V', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('SX08QSS1', 'Your Gohan key has been remove.', '2019-09-17 15:37:22'),
('P2HXT57Q', 'You received Gohan key (One-time) from Hello world', '2019-09-17 15:37:33'),
('2EU2Z5IH', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:39:35'),
('2JUPB88O', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:39:41'),
('SX08QSS1', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:44:23'),
('2MRG5XVR', 'Your Gohan key has been remove.', '2019-09-17 15:46:50'),
('2MRG5XVR', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:46:56'),
('2MRG5XVR', 'Your Gohan key has been remove.', '2019-09-17 15:47:00'),
('2MRG5XVR', 'You received Gohan key (permanant) from Hello world', '2019-09-17 15:47:34'),
('PVZS1GR1', 'You received Gohan key (schedule,[Thursday,Friday,Saturday],-) from Hello world', '2019-09-17 15:50:43'),
('QCUPF31D', 'You received Gohan key (schedule,[Thursday,Friday,Saturday],-) from Hello world', '2019-09-17 15:50:44'),
('S4AMOS6V', 'You received Gohan key (schedule,[Thursday,Friday,Saturday],-) from Hello world', '2019-09-17 15:50:44'),
('1FOJQPC0', 'You received Bar key (schedule,[Monday],-) from Deadpool Wilson', '2019-09-22 04:28:26'),
('2EU2Z5IH', 'You received Bar key (schedule,[Monday],-) from Deadpool Wilson', '2019-09-22 04:28:26'),
('2JUPB88O', 'You received Bar key (schedule,[Monday],-) from Deadpool Wilson', '2019-09-22 04:28:26'),
('2MRG5XVR', 'You received Bar key (schedule,[Monday],-) from Deadpool Wilson', '2019-09-22 04:28:26'),
('1FOJQPC0', 'Your Bar key has been remove.', '2019-09-22 04:36:47'),
('2EU2Z5IH', 'Your Bar key has been remove.', '2019-09-22 04:36:47'),
('2JUPB88O', 'Your Bar key has been remove.', '2019-09-22 04:36:48'),
('2MRG5XVR', 'Your Bar key has been remove.', '2019-09-22 04:36:48'),
('1FOJQPC0', 'You received Pub key (schedule,[Sunday,Saturday],-) from Deadpool Wilson', '2019-09-22 04:37:49'),
('2EU2Z5IH', 'You received Pub key (schedule,[Sunday,Saturday],-) from Deadpool Wilson', '2019-09-22 04:37:49'),
('2JUPB88O', 'You received Pub key (schedule,[Sunday,Saturday],-) from Deadpool Wilson', '2019-09-22 04:37:49'),
('2MRG5XVR', 'You received Pub key (schedule,[Sunday,Saturday],-) from Deadpool Wilson', '2019-09-22 04:37:49'),
('1FOJQPC0', 'Your Pub key has been remove.', '2019-09-22 04:45:03'),
('2EU2Z5IH', 'Your Pub key has been remove.', '2019-09-22 05:17:33'),
('2JUPB88O', 'Your Pub key has been remove.', '2019-09-22 05:17:33'),
('2MRG5XVR', 'Your Pub key has been remove.', '2019-09-22 05:17:34'),
('2EU2Z5IH', 'You received Bar key (permanant) from Deadpool Wilson', '2019-09-23 06:53:36'),
('2EU2Z5IH', 'Your Pub key has been remove.', '2019-09-23 06:53:42'),
('FI3B5XZJ', 'You received Room 123 key (permanant) from Hello world', '2019-10-08 16:20:18'),
('FI3B5XZJ', 'You received Hidden device key (schedule,[Sunday,Monday],-) from Hello world', '2019-10-08 16:21:03'),
('FI3B5XZJ', 'You received Gohan key (One-time) from Hello world', '2019-10-08 16:21:13'),
('FI3B5XZJ', 'You received Test device key (permanant) from Hello world', '2019-10-08 16:21:21'),
('1FOJQPC0', 'You received Hidden device key (schedule,[Sunday],-) from Hello world', '2019-10-10 03:42:00'),
('FI3B5XZJ', 'You received TestApp key (schedule,[Monday,Tuesday,Wednesday,Thursday,Friday],04:00:00-22:00:00) from Hello world', '2019-10-10 03:57:02'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:17'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:19'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:20'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:21'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:21'),
('2EU2Z5IH', 'You received Boss room key (permanant) from Martin Laws', '2019-10-13 09:01:21'),
('2EU2Z5IH', 'You received Deva hall of fame key (permanant) from Martin Laws', '2019-10-13 09:06:38'),
('2EU2Z5IH', 'You received Deva hall of fame key (permanant) from Martin Laws', '2019-10-13 09:07:54'),
('2EU2Z5IH', 'You received Boss room key (schedule,[Sunday,Monday,Tuesday],-) from Martin Laws', '2019-10-13 09:14:01'),
('2EU2Z5IH', 'Your Boss room key has been remove.', '2019-10-13 09:16:23'),
('2EU2Z5IH', 'You received Boss room key (One-time) from Martin Laws', '2019-10-13 09:17:56'),
('2EU2Z5IH', 'You received Boss room key (One-time) from Martin Laws', '2019-10-13 09:18:54'),
('1FOJQPC0', 'You received Test device key (One-time) from Hello world', '2019-10-13 09:29:04'),
('2EU2Z5IH', 'Your Room 123 key has been remove.', '2019-10-13 09:31:11'),
('2JUPB88O', 'Your Room 123 key has been remove.', '2019-10-13 09:31:11'),
('2MRG5XVR', 'Your Room 123 key has been remove.', '2019-10-13 09:31:11'),
('P2HXT57Q', 'Your Room 123 key has been remove.', '2019-10-13 09:31:12'),
('PVZS1GR1', 'Your Room 123 key has been remove.', '2019-10-13 09:31:12'),
('QCUPF31D', 'Your Room 123 key has been remove.', '2019-10-13 09:31:12'),
('S4AMOS6V', 'Your Room 123 key has been remove.', '2019-10-13 09:31:12'),
('SX08QSS1', 'Your Room 123 key has been remove.', '2019-10-13 09:31:12'),
('1FOJQPC0', 'You received Room 123 key (One-time) from Hello world', '2019-10-13 09:31:31'),
('SX08QSS1', 'You received Room 123 key (One-time) from Hello world', '2019-10-13 09:34:28'),
('2MRG5XVR', 'You received Test device key (One-time) from Hello world', '2019-10-13 09:46:22'),
('PVZS1GR1', 'You received Test device key (One-time) from Hello world', '2019-10-13 09:48:27'),
('SX08QSS1', 'You received Room 123 key (One-time) from Hello world', '2019-10-13 09:49:00'),
('PVZS1GR1', 'You received Test device key (One-time) from Hello world', '2019-10-13 09:54:20'),
('1FOJQPC0', 'You received fjgffgj key (One-time) from Hello world', '2019-10-13 09:56:30'),
('S4AMOS6V', 'You received fjgffgj key (One-time) from Hello world', '2019-10-13 09:57:27'),
('FI3B5XZJ', 'You received fjgffgj key (One-time) from Hello world', '2019-10-13 09:59:21'),
('SX08QSS1', 'You received fjgffgj key (One-time) from Hello world', '2019-10-13 09:59:27'),
('1FOJQPC0', 'You received TestApp key (One-time) from Hello world', '2019-10-13 10:21:45'),
('7CU21ADD', 'You received Boss room key (One-time) from Martin Laws', '2019-10-13 10:23:09'),
('7CU21ADD', 'You received Deva hall of fame key (One-time) from Martin Laws', '2019-10-13 10:54:57'),
('7CU21ADD', 'You received Boss room key (One-time) from Martin Laws', '2019-10-13 10:55:03'),
('7CU21ADD', 'You received jgtmfhtdchgf key (schedule,[Monday,Tuesday,Wednesday],00:20:00-01:20:00) from Martin Laws', '2019-10-13 12:12:08'),
('7CU21ADD', 'Your jgtmfhtdchgf key has been remove.', '2019-10-13 12:18:24'),
('7CU21ADD', 'You received jgtmfhtdchgf key (schedule,[Sunday,Monday,Tuesday,Wednesday],04:00:00-05:00:00) from Martin Laws', '2019-10-13 12:18:46'),
('7CU21ADD', 'Your Deva hall of fame key has expired.', '2019-10-13 12:57:33'),
('7CU21ADD', 'Your Boss room key has expired.', '2019-10-13 12:57:33'),
('7CU21ADD', 'Your Deva hall of fame key has expired.', '2019-10-13 12:58:23'),
('7CU21ADD', 'Your Boss room key has expired.', '2019-10-13 12:58:23'),
('2EU2Z5IH', 'You received jgtmfhtdchgf key (One-time) from Martin Laws', '2019-10-13 13:06:39'),
('2EU2Z5IH', 'Your jgtmfhtdchgf key has expired.', '2019-10-13 13:15:48'),
('7CU21ADD', 'Your jgtmfhtdchgf key has been remove.', '2019-10-13 13:16:51'),
('7CU21ADD', 'You received jgtmfhtdchgf key (One-time) from Martin Laws', '2019-10-13 13:16:58'),
('7CU21ADD', 'Your jgtmfhtdchgf key has expired.', '2019-10-13 13:18:40'),
('2EU2Z5IH', 'You received jgtmfhtdchgf key (One-time) from Martin Laws', '2019-10-13 13:24:09'),
('SX08QSS1', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:12:36'),
('S4AMOS6V', 'You received TestApp key (schedule,[Sunday,Monday],00:00:00-20:00:00) from Hello world', '2019-10-15 09:13:12'),
('2EU2Z5IH', 'Your jgtmfhtdchgf key has expired.', '2019-10-15 09:16:24'),
('2JUPB88O', 'Your Test device key has been remove.', '2019-10-15 09:17:21'),
('2EU2Z5IH', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:13'),
('2JUPB88O', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:13'),
('2MRG5XVR', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:13'),
('P2HXT57Q', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:14'),
('PVZS1GR1', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:14'),
('QCUPF31D', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:14'),
('S4AMOS6V', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:14'),
('SX08QSS1', 'You received fjgffgj key (One-time) from Hello world', '2019-10-15 09:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `notification_statuses`
--

CREATE TABLE `notification_statuses` (
  `noti_form_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_statuses`
--

INSERT INTO `notification_statuses` (`noti_form_id`, `description`) VALUES
(1, 'You received $ from $ .'),
(2, 'Your $ has been remove.'),
(3, 'Your $ expired.');

-- --------------------------------------------------------

--
-- Table structure for table `office_hours`
--

CREATE TABLE `office_hours` (
  `deviceid` int(11) NOT NULL,
  `avi_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avi_time_start` time DEFAULT NULL,
  `avi_time_stop` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_hours`
--

INSERT INTO `office_hours` (`deviceid`, `avi_day`, `avi_time_start`, `avi_time_stop`, `status`) VALUES
(25, '[\"Sunday\",\"Monday\",\"Tuesday\"]', '00:13:00', '22:00:00', 1),
(26, '[\"Monday\"]', '14:56:00', '00:23:00', 1),
(27, NULL, NULL, NULL, 1),
(29, '[\"Monday\",\"Tuesday\"]', '01:00:00', '23:00:00', 1),
(31, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '12:00:00', '18:00:00', 0),
(33, '[\"Sunday\",\"Monday\",\"Tuesday\"]', '12:00:00', '23:00:00', 1),
(39, '[\"Sunday\",\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\",\"Saturday\"]', '08:00:00', '22:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_keys`
--

CREATE TABLE `permission_keys` (
  `token_key` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deviceid` int(20) NOT NULL,
  `ext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_keys`
--

INSERT INTO `permission_keys` (`token_key`, `holder`, `deviceid`, `ext`, `time_created`, `expire`) VALUES
('12cx2y4op2us8sswwccowcgwwk0gs8k', '2EU2Z5IH', 34, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:39:35', NULL),
('142setrrt074wsk4oko08oowg0o0wkg', '7CU21ADD', 43, '{\"key_type\":\"permanant\"}', '2019-10-13 09:56:20', NULL),
('1robqcoskds04ck4w04c48cw408w0s0', 'S4AMOS6V', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('2ftl9gjr6vvo44gowwsg488s84ok0so', '2EU2Z5IH', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:39', NULL),
('2kytnap4or28g04k88o0c4cwsgowcs0', '7CU21ADD', 41, '{\"key_type\":\"permanant\"}', '2019-09-23 07:43:55', NULL),
('3k9t798epj8k8s0wwwsso0sws04sw8w', 'S4AMOS6V', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:14'),
('463vwubjlh4wkg0s8cw4wso4o80so4g', '2MRG5XVR', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('4ctgjzri1pogw844gookg0kss8c4co0', 'PVZS1GR1', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:14'),
('4pxzfytn99usko0s0gc4c4o00s0gos8', 'SX08QSS1', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:14'),
('54spx2btkg840840oc8884csc8g04wc', 'S4AMOS6V', 34, '{\"key_type\":\"schedule\",\"day\":[\"Thursday\",\"Friday\",\"Saturday\"],\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:50:44', NULL),
('5xist75kwf40sg80s4kow0kk08cs4c4', '1FOJQPC0', 41, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-13 09:29:04', NULL),
('65yyef9vfxwcskkw0kc80s4g8o0s8s4', 'PVZS1GR1', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('66imrmiknxc0ssoc0wcgoowsoogww4c', 'SX08QSS1', 34, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:44:23', NULL),
('6xwvvdzhg0ows8so0cw4wsw4gggscw', '7CU21ADD', 42, '{\"key_type\":\"permanant\"}', '2019-10-10 03:56:33', NULL),
('7lpnmgxw06sco4k8og88kc0c4sww4os', 'PVZS1GR1', 34, '{\"key_type\":\"schedule\",\"day\":[\"Thursday\",\"Friday\",\"Saturday\"],\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:50:43', NULL),
('8xzrirhowtoo4cs04880w4kc0wcok0c', '7CU21ADD', 34, '{\"key_type\":\"permanant\"}', '2019-09-17 15:06:52', NULL),
('bbjemagebi80gcgo4gwwk44o0sg0ogo', 'DQRTKPXJ', 35, '{\"key_type\":\"permanant\"}', '2019-09-18 08:01:09', NULL),
('bctoeu9i0i884wso0ck4oso4k4ckk4w', '2EU2Z5IH', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:13', '2019-10-15 16:28:13'),
('caovrytay7co0css4k00kg4gwwosw0k', '2EU2Z5IH', 39, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-23 06:53:36', NULL),
('ch3tl5nmqh44okcccs4w4w084wgcw4', 'SX08QSS1', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('fa848usr5googoo80ogwww84sc08oos', '4H53RISW', 39, '{\"key_type\":\"permanant\"}', '2019-09-22 04:14:02', NULL),
('fgzaixcsspkc8oks4ccs8cwgccccwwk', 'FI3B5XZJ', 29, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-08 16:20:18', NULL),
('h5k4qd00h6gwow4gcc4scgw8g88gkwc', '2JUPB88O', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:13', '2019-10-15 16:28:13'),
('hqeeo5rnwxwk4k0w84gkwogswcooc4c', 'DQRTKPXJ', 36, '{\"key_type\":\"permanant\"}', '2019-09-18 08:03:11', NULL),
('i605y6o74w004osskoows4wskocgkco', '7CU21ADD', 33, '{\"key_type\":\"permanant\"}', '2019-09-17 13:38:31', NULL),
('jbgwni4ezdw0o8oscccwo084w4gsck8', 'FI3B5XZJ', 34, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-08 16:21:13', NULL),
('jqvnphnnq800w4o0c0gg4kcowok80kg', 'FI3B5XZJ', 41, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-08 16:21:21', NULL),
('ke5umjykrn4sok4k0wc4cgc8skcgssk', 'QCUPF31D', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:14'),
('ks1luxnegtw80k40k80sgso0og4kw4g', '2JUPB88O', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('mbtxl2623jks000c4cc4wkokgw0s84o', '2EU2Z5IH', 25, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-13 09:07:54', NULL),
('mbzkb6c90e844co0g8c00s0oko0s0kg', '2MRG5XVR', 34, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:47:34', NULL),
('mykecdpjyj48ss8kwg84wwkw80c4wss', '2MRG5XVR', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:13'),
('ob329phmodwc4g8wckcg0k44scsssw4', 'P2HXT57Q', 43, '{\"key_type\":\"One-time\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-10-15 09:18:14', '2019-10-15 16:28:14'),
('p1bxarnh0r48ccg4cg8c0sgwkwck404', '4H53RISW', 40, '{\"key_type\":\"permanant\"}', '2019-09-23 07:31:32', NULL),
('p3aje8dsaas008w4ksg0osowso4k808', 'FI3B5XZJ', 42, '{\"key_type\":\"schedule\",\"day\":[\"Monday\",\"Tuesday\",\"Wednesday\",\"Thursday\",\"Friday\"],\"time_start\":\"04:00:00\",\"time_stop\":\"22:00:00\"}', '2019-10-10 03:57:02', NULL),
('p7yf2lma05c4w8os08g0s4k48so4sg4', 'FI3B5XZJ', 44, '{\"key_type\":\"permanant\"}', '2019-10-13 12:11:44', NULL),
('pjho9cwo2u8kwk00k800ock8c08wckc', '1FOJQPC0', 33, '{\"key_type\":\"schedule\",\"day\":[\"Sunday\"],\"time_start\":null,\"time_stop\":null}', '2019-10-10 03:42:00', NULL),
('pqxxf49gviss0s8og4w0oo48g88kwk0', 'QCUPF31D', 34, '{\"key_type\":\"schedule\",\"day\":[\"Thursday\",\"Friday\",\"Saturday\"],\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:50:44', NULL),
('pzzcgvj3i28ooogwsgogkg480ccgc8s', 'DQRTKPXJ', 37, '{\"key_type\":\"permanant\"}', '2019-09-18 08:04:55', NULL),
('qdc021diu8g8s48k0wg8wwo80owcwko', 'QCUPF31D', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL),
('re3zw4dxgjk0s00wwkoscc8cw4gw0wk', '2JUPB88O', 34, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 15:39:41', NULL),
('rf4uuciv5r4k0wokgkcg444c8skgoss', '4H53RISW', 38, '{\"key_type\":\"permanant\"}', '2019-09-22 04:12:33', NULL),
('sg0spnfrl3k8soc4s0g4co084w0wc04', 'S4AMOS6V', 42, '{\"key_type\":\"schedule\",\"day\":[\"Sunday\",\"Monday\"],\"time_start\":\"00:00:00\",\"time_stop\":\"20:00:00\"}', '2019-10-15 09:13:12', '2019-10-31 00:00:00'),
('up25jdar0sgw4kgkwoc8scsssgc44k', 'P2HXT57Q', 33, '{\"key_type\":\"permanant\",\"day\":null,\"time_start\":null,\"time_stop\":null}', '2019-09-17 13:54:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serials`
--

CREATE TABLE `serials` (
  `SERIAL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serials`
--

INSERT INTO `serials` (`SERIAL`) VALUES
('7U0M35QJ5AG4GOW0'),
('8STC466DA800SK8O'),
('SQJOGPU2URKW0G80'),
('RO83V1W0OXWGSGWS'),
('PMWHGAS8WDCK88S0'),
('M38XM0WC9Q84OC0K'),
('8X5R8KM2A4O40K4G'),
('HSK4GAXI1I8GKGK0'),
('K921TH6M528GGCKC'),
('M5MCQAM2JXCKO04O'),
('PGT33M5E76S4S4KS'),
('DMARKMLGGH4OGCWW'),
('J8V7BDB9K0004K4W'),
('5W4QRUCP2FK80W0K'),
('5BI29V6ZHW4C0SWO'),
('9H83P6N3OE0W88C0'),
('5T08WKG86X44K40K'),
('9O9UMJBQKCW8S80C'),
('CXLQMJPY04OOWW4C'),
('RUQKEXMDGN40W4WW'),
('T4OO96YERN4S80WW'),
('BRP4P07ZK2GC0SS4'),
('BDTFBMW4UVWWS0GK'),
('EH98J9OWCC0S0CWG'),
('NTT6XQG7QGGOSSCG'),
('9Q25J0VFI24OWCO0'),
('4A8MWWS3FHC0S48G'),
('RA4E7N8LFMOKCCO4'),
('PL7WPST3RE8SGO0C'),
('LJFZSL9KB5WKC8K8'),
('8OHR6SA5IYSKC8SK'),
('EBVL1TEYYB4SGK04'),
('3Q2GRPM5T7C4CGO8'),
('AK1NNVLWMOOC48SK'),
('MMU0H3CKIRK00K4S'),
('BLK78MN5PTS0SSKC'),
('PBJ9Q0LA6XC8SK4S'),
('IBVRMYKIOX4O00S0'),
('LHT28FSYQJKKKGGC'),
('EIA2ZAVW2U8K4GWC'),
('QQ5LXBMK7UO48CCW'),
('JODTRS0XTG8CK004'),
('2ZJZPT1NRSQOC0GC'),
('P6W9P5KZFOGGSGCW'),
('OAU5DM920O0K04GS'),
('M8ZE3YZC3TCC0KSK'),
('DPBZ86RZ9R4KKOK4'),
('T3842RPQ11C4SO8W'),
('4XAHOH464JOKO8SC'),
('LAP40DDFFM8C48KK'),
('OS02RJRP7QSC8KOK'),
('CIPTHDJD4M8G40CC'),
('FG12NTS1VXKOCS4K'),
('2RO40OIK1PICCKK0'),
('LT8U3B9MSO0G40WO'),
('I2Q6FPY1EBWOG44G'),
('A7RHAEGCJOWSK88C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`PIN`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD UNIQUE KEY `my_unique_key` (`owner`,`contact`),
  ADD KEY `contact` (`contact`);

--
-- Indexes for table `contact_groups`
--
ALTER TABLE `contact_groups`
  ADD PRIMARY KEY (`groupid`),
  ADD KEY `owner_pin` (`owner_pin`);

--
-- Indexes for table `contact_group_members`
--
ALTER TABLE `contact_group_members`
  ADD UNIQUE KEY `my_unique_key` (`groupid`,`contact`),
  ADD KEY `contact_group_members_ibfk_1` (`contact`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`deviceid`),
  ADD KEY `devices_ibfk_1` (`owner`);

--
-- Indexes for table `group_keys`
--
ALTER TABLE `group_keys`
  ADD UNIQUE KEY `groupid_2` (`groupid`,`deviceid`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `deviceid` (`deviceid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `deviceid` (`deviceid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `notifications_ibfk_1` (`receiver`);

--
-- Indexes for table `notification_statuses`
--
ALTER TABLE `notification_statuses`
  ADD PRIMARY KEY (`noti_form_id`);

--
-- Indexes for table `office_hours`
--
ALTER TABLE `office_hours`
  ADD KEY `office_hours_ibfk_1` (`deviceid`);

--
-- Indexes for table `permission_keys`
--
ALTER TABLE `permission_keys`
  ADD PRIMARY KEY (`token_key`),
  ADD UNIQUE KEY `holder` (`holder`,`deviceid`),
  ADD KEY `deviceid` (`deviceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_groups`
--
ALTER TABLE `contact_groups`
  MODIFY `groupid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `deviceid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification_statuses`
--
ALTER TABLE `notification_statuses`
  MODIFY `noti_form_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`contact`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_groups`
--
ALTER TABLE `contact_groups`
  ADD CONSTRAINT `contact_groups_ibfk_1` FOREIGN KEY (`owner_pin`) REFERENCES `accounts` (`PIN`);

--
-- Constraints for table `contact_group_members`
--
ALTER TABLE `contact_group_members`
  ADD CONSTRAINT `contact_group_members_ibfk_1` FOREIGN KEY (`contact`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_group_members_ibfk_2` FOREIGN KEY (`groupid`) REFERENCES `contact_groups` (`groupid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_keys`
--
ALTER TABLE `group_keys`
  ADD CONSTRAINT `group_keys_ibfk_1` FOREIGN KEY (`deviceid`) REFERENCES `devices` (`deviceid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_keys_ibfk_2` FOREIGN KEY (`groupid`) REFERENCES `contact_groups` (`groupid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`deviceid`) REFERENCES `devices` (`deviceid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`receiver`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `office_hours`
--
ALTER TABLE `office_hours`
  ADD CONSTRAINT `office_hours_ibfk_1` FOREIGN KEY (`deviceid`) REFERENCES `devices` (`deviceid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_keys`
--
ALTER TABLE `permission_keys`
  ADD CONSTRAINT `permission_keys_ibfk_1` FOREIGN KEY (`holder`) REFERENCES `accounts` (`PIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_keys_ibfk_2` FOREIGN KEY (`deviceid`) REFERENCES `devices` (`deviceid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
