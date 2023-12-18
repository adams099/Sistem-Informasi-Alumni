-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ci4.alumni
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(50) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `tahun_lulus` int(5) DEFAULT NULL,
  `angkatan` int(20) DEFAULT NULL,
  `perkerjaan` varchar(50) DEFAULT NULL,
  `posisi_pekerjaan` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `status` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `prestasi` varchar(50) DEFAULT NULL,
  `pencapaian_karir` varchar(50) DEFAULT NULL,
  `ipk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.alumni: ~1 rows (approximately)
DELETE FROM `alumni`;
INSERT INTO `alumni` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `nim`, `prodi`, `tahun_lulus`, `angkatan`, `perkerjaan`, `posisi_pekerjaan`, `created_at`, `updated_at`, `user_id`, `status`, `pendidikan`, `prestasi`, `pencapaian_karir`, `ipk`) VALUES
	(49, 'Adam MA', 'Tangerang', '2023-12-18', '0812999999', '999999999', 'Informatika AbalAbal', 2999, 99, 'Tidur Sambil Salto', '', '2023-12-18 13:48:10', '2023-12-18 14:34:46', 5, 'Approved', 'D99 Poltek GT', '', '', '3.9');

-- Dumping structure for table ci4.approval
DROP TABLE IF EXISTS `approval`;
CREATE TABLE IF NOT EXISTS `approval` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `req_by` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `id_alumni` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_alumni` (`id_alumni`),
  CONSTRAINT `id_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.approval: ~1 rows (approximately)
DELETE FROM `approval`;
INSERT INTO `approval` (`id`, `status`, `req_by`, `approved_by`, `created_at`, `updated_at`, `id_user`, `id_alumni`) VALUES
	(34, 'Approved', 'user@gmail.com', 'admin@gmail.com', '2023-12-18 13:48:10', '2023-12-18 14:34:46', 5, 49);

-- Dumping structure for table ci4.auth_activation_attempts
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_activation_attempts: ~0 rows (approximately)
DELETE FROM `auth_activation_attempts`;

-- Dumping structure for table ci4.auth_groups
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_groups: ~2 rows (approximately)
DELETE FROM `auth_groups`;
INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'user', 'General User');

-- Dumping structure for table ci4.auth_groups_permissions
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_groups_permissions: ~0 rows (approximately)
DELETE FROM `auth_groups_permissions`;

-- Dumping structure for table ci4.auth_groups_users
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_groups_users: ~2 rows (approximately)
DELETE FROM `auth_groups_users`;
INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
	(1, 4),
	(2, 5);

-- Dumping structure for table ci4.auth_logins
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_logins: ~125 rows (approximately)
DELETE FROM `auth_logins`;
INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
	(1, '::1', 'admin@admin.com', 1, '2023-12-10 05:50:51', 1),
	(2, '::1', 'adam@gmail.com', 2, '2023-12-10 05:52:46', 1),
	(3, '::1', 'adam@gmail.com', 2, '2023-12-10 05:54:10', 1),
	(4, '::1', 'adam@gmail.com', 2, '2023-12-10 07:05:25', 1),
	(5, '::1', 'galih@gmail.com', 3, '2023-12-10 07:59:28', 1),
	(6, '::1', 'adam', NULL, '2023-12-10 08:05:33', 0),
	(7, '::1', 'adam@gmail.com', 2, '2023-12-10 08:05:42', 1),
	(8, '::1', 'adam', NULL, '2023-12-10 09:05:18', 0),
	(9, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:27', 1),
	(10, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:28', 1),
	(11, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:29', 1),
	(12, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:39', 1),
	(13, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:40', 1),
	(14, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:40', 1),
	(15, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:40', 1),
	(16, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:41', 1),
	(17, '::1', 'adam@gmail.com', 2, '2023-12-10 09:26:41', 1),
	(18, '::1', 'adam@gmail.com', 2, '2023-12-10 13:31:45', 1),
	(19, '::1', 'admin', NULL, '2023-12-10 14:08:48', 0),
	(20, '::1', 'admin@gmail.com', 4, '2023-12-10 14:08:58', 1),
	(21, '::1', 'user@gmail.com', 5, '2023-12-10 14:12:47', 1),
	(22, '::1', 'admin@gmail.com', 4, '2023-12-10 14:27:14', 1),
	(23, '::1', 'user@gmail.com', 5, '2023-12-10 14:51:57', 1),
	(24, '::1', 'admin@gmail.com', 4, '2023-12-10 14:52:11', 1),
	(25, '::1', 'user@gmail.com', 5, '2023-12-10 15:17:51', 1),
	(26, '::1', 'admin@gmail.com', 4, '2023-12-10 15:18:47', 1),
	(27, '::1', 'user@gmail.com', 5, '2023-12-10 15:20:34', 1),
	(28, '::1', 'admin@gmail.com', 4, '2023-12-10 15:21:36', 1),
	(29, '::1', 'admin@gmail.com', 4, '2023-12-10 15:26:16', 1),
	(30, '::1', 'user@gmail.com', 5, '2023-12-10 15:59:22', 1),
	(31, '::1', 'admin@gmail.com', 4, '2023-12-10 16:01:38', 1),
	(32, '::1', 'user@gmail.com', 5, '2023-12-10 16:38:12', 1),
	(33, '::1', 'random@random.com', 6, '2023-12-10 17:15:30', 1),
	(34, '::1', 'admin@gmail.com', 4, '2023-12-11 11:52:33', 1),
	(35, '::1', 'user@gmail.com', 5, '2023-12-11 11:53:14', 1),
	(36, '::1', 'admin@gmail.com', 4, '2023-12-11 11:54:07', 1),
	(37, '::1', 'user@gmail.com', 5, '2023-12-11 15:15:37', 1),
	(38, '::1', 'admin@gmail.com', 4, '2023-12-11 15:17:51', 1),
	(39, '::1', 'admin@gmail.com', 4, '2023-12-11 15:25:10', 1),
	(40, '::1', 'admin@gmail.com', 4, '2023-12-12 12:43:32', 1),
	(41, '::1', 'user@gmail.com', 5, '2023-12-12 12:44:46', 1),
	(42, '::1', 'user@gmail.com', 5, '2023-12-13 12:06:12', 1),
	(43, '::1', 'admin@gmail.com', 4, '2023-12-13 14:13:35', 1),
	(44, '::1', 'user@gmail.com', 5, '2023-12-13 14:13:56', 1),
	(45, '::1', 'admin@gmail.com', 4, '2023-12-13 16:08:18', 1),
	(46, '::1', 'user@gmail.com', 5, '2023-12-14 12:13:16', 1),
	(47, '::1', 'admin', NULL, '2023-12-14 14:11:36', 0),
	(48, '::1', 'admin@gmail.com', 4, '2023-12-14 14:11:45', 1),
	(49, '::1', 'user@gmail.com', 5, '2023-12-14 14:14:54', 1),
	(50, '::1', 'admin@gmail.com', 4, '2023-12-14 14:16:06', 1),
	(51, '::1', 'user@gmail.com', 5, '2023-12-14 14:18:40', 1),
	(52, '::1', 'admin@gmail.com', 4, '2023-12-14 14:21:49', 1),
	(53, '::1', 'user@gmail.com', 5, '2023-12-14 14:22:03', 1),
	(54, '::1', 'admin@gmail.com', 4, '2023-12-14 14:22:17', 1),
	(55, '::1', 'user@gmail.com', 5, '2023-12-14 14:25:28', 1),
	(56, '::1', 'user@gmail.com', 5, '2023-12-14 15:24:35', 1),
	(57, '::1', 'user@gmail.com', 5, '2023-12-14 15:33:11', 1),
	(58, '::1', 'user@gmail.com', 5, '2023-12-14 15:49:17', 1),
	(59, '::1', 'admin@gmail.com', 4, '2023-12-14 15:51:03', 1),
	(60, '::1', 'user@gmail.com', 5, '2023-12-14 15:51:41', 1),
	(61, '::1', 'admin@gmail.com', 4, '2023-12-15 11:52:05', 1),
	(62, '::1', 'admin@gmail.com', 4, '2023-12-15 12:42:20', 1),
	(63, '::1', 'user@gmail.com', 5, '2023-12-15 14:39:44', 1),
	(64, '::1', 'user@gmail.com', 5, '2023-12-15 14:41:15', 1),
	(65, '::1', 'admin@gmail.com', 4, '2023-12-15 14:45:44', 1),
	(66, '::1', 'user', NULL, '2023-12-15 14:46:07', 0),
	(67, '::1', 'user@gmail.com', 5, '2023-12-15 14:46:15', 1),
	(68, '::1', 'admin@gmail.com', 4, '2023-12-15 15:01:47', 1),
	(69, '::1', 'admin@gmail.com', 4, '2023-12-16 00:35:50', 1),
	(70, '::1', 'user@gmail.com', 5, '2023-12-16 01:35:50', 1),
	(71, '::1', 'admin@gmail.com', 4, '2023-12-16 01:36:50', 1),
	(72, '::1', 'user@gmail.com', 5, '2023-12-16 01:40:10', 1),
	(73, '::1', 'admin@gmail.com', 4, '2023-12-16 01:40:45', 1),
	(74, '::1', 'user@gmail.com', 5, '2023-12-16 05:40:23', 1),
	(75, '::1', 'admin@gmail.com', 4, '2023-12-16 05:49:45', 1),
	(76, '::1', 'user@gmail.com', 5, '2023-12-16 05:52:55', 1),
	(77, '::1', 'admin@gmail.com', 4, '2023-12-16 05:53:23', 1),
	(78, '::1', 'user@gmail.com', 5, '2023-12-16 05:53:47', 1),
	(79, '::1', 'admin@gmail.com', 4, '2023-12-16 05:54:17', 1),
	(80, '::1', 'user@gmail.com', 5, '2023-12-16 06:00:24', 1),
	(81, '::1', 'admin', NULL, '2023-12-16 06:00:52', 0),
	(82, '::1', 'admin@gmail.com', 4, '2023-12-16 06:01:10', 1),
	(83, '::1', 'user@gmail.com', 5, '2023-12-16 06:02:04', 1),
	(84, '::1', 'user@gmail.com', 5, '2023-12-16 10:38:34', 1),
	(85, '::1', 'admin@gmail.com', 4, '2023-12-16 10:39:06', 1),
	(86, '::1', 'admin@gmail.com', 4, '2023-12-16 10:58:36', 1),
	(87, '::1', 'user@gmail.com', 5, '2023-12-16 11:02:58', 1),
	(88, '::1', 'admin@gmail.com', 4, '2023-12-16 11:03:08', 1),
	(89, '::1', 'user@gmail.com', 5, '2023-12-16 11:55:04', 1),
	(90, '::1', 'admin@gmail.com', 4, '2023-12-16 12:00:35', 1),
	(91, '::1', 'user123', NULL, '2023-12-16 16:56:13', 0),
	(92, '::1', 'user@gmail.com', 5, '2023-12-16 16:56:21', 1),
	(93, '::1', 'admin@gmail.com', 4, '2023-12-16 17:04:23', 1),
	(94, '::1', 'user@gmail.com', 5, '2023-12-16 17:05:12', 1),
	(95, '::1', 'admin@gmail.com', 4, '2023-12-16 17:05:39', 1),
	(96, '::1', 'user@gmail.com', 5, '2023-12-16 17:06:20', 1),
	(97, '::1', 'admin@gmail.com', 4, '2023-12-16 17:09:41', 1),
	(98, '::1', 'admin@gmail.com', 4, '2023-12-17 01:51:58', 1),
	(99, '::1', 'admin@gmail.com', 4, '2023-12-17 03:47:22', 1),
	(100, '::1', 'admin@gmail.com', 4, '2023-12-17 10:16:33', 1),
	(101, '::1', 'user@gmail.com', 5, '2023-12-17 12:33:44', 1),
	(102, '::1', 'admin@gmail.com', 4, '2023-12-17 12:33:54', 1),
	(103, '::1', 'user@gmail.com', 5, '2023-12-17 12:34:31', 1),
	(104, '::1', 'admin@gmail.com', 4, '2023-12-17 12:34:58', 1),
	(105, '::1', 'admin@gmail.com', 4, '2023-12-17 13:30:17', 1),
	(106, '::1', 'user@gmail.com', 5, '2023-12-17 13:36:49', 1),
	(107, '::1', 'admin@gmail.com', 4, '2023-12-17 13:40:27', 1),
	(108, '::1', 'user@gmail.com', 5, '2023-12-17 13:40:48', 1),
	(109, '::1', 'user@gmail.com', 5, '2023-12-18 12:13:24', 1),
	(110, '::1', 'admin@gmail.com', 4, '2023-12-18 12:13:41', 1),
	(111, '::1', 'user@gmail.com', 5, '2023-12-18 12:14:04', 1),
	(112, '::1', 'admin@gmail.com', 4, '2023-12-18 12:55:54', 1),
	(113, '::1', 'user@gmail.com', 5, '2023-12-18 12:56:17', 1),
	(114, '::1', 'admin', NULL, '2023-12-18 13:08:00', 0),
	(115, '::1', 'admin@gmail.com', 4, '2023-12-18 13:08:07', 1),
	(116, '::1', 'user@gmail.com', 5, '2023-12-18 13:08:28', 1),
	(117, '::1', 'admin@gmail.com', 4, '2023-12-18 13:18:52', 1),
	(118, '::1', 'user@gmail.com', 5, '2023-12-18 13:40:12', 1),
	(119, '::1', 'admin@gmail.com', 4, '2023-12-18 13:43:13', 1),
	(120, '::1', 'user@gmail.com', 5, '2023-12-18 13:45:48', 1),
	(121, '::1', 'admin@gmail.com', 4, '2023-12-18 13:46:26', 1),
	(122, '::1', 'user@gmail.com', 5, '2023-12-18 13:46:42', 1),
	(123, '::1', 'admin@gmail.com', 4, '2023-12-18 13:48:29', 1),
	(124, '::1', 'user@gmail.com', 5, '2023-12-18 14:23:10', 1),
	(125, '::1', 'admin@gmail.com', 4, '2023-12-18 14:26:51', 1);

-- Dumping structure for table ci4.auth_permissions
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_permissions: ~0 rows (approximately)
DELETE FROM `auth_permissions`;

-- Dumping structure for table ci4.auth_reset_attempts
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_reset_attempts: ~0 rows (approximately)
DELETE FROM `auth_reset_attempts`;

-- Dumping structure for table ci4.auth_tokens
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_tokens: ~0 rows (approximately)
DELETE FROM `auth_tokens`;

-- Dumping structure for table ci4.auth_users_permissions
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.auth_users_permissions: ~0 rows (approximately)
DELETE FROM `auth_users_permissions`;

-- Dumping structure for table ci4.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.migrations: ~1 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1702186522, 1);

-- Dumping structure for table ci4.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.users: ~2 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `email`, `user_image`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'admin@gmail.com', 'default.jpg', 'admin', '$2y$10$5jSQIdHN/UOycffAIZdFAOigPijqIHu/qNFiuciA7NJ71W2/h1ElW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-12-10 14:07:10', '2023-12-10 14:07:10', NULL),
	(5, 'user@gmail.com', 'image_5.PNG', 'user', '$2y$10$VR5dqDhjrTyZ8zocFurPDOcGouietnrX8nGkec8qrpn1AE2..qbGK', NULL, NULL, NULL, NULL, NULL, 'updated', 1, 0, '2023-12-10 14:08:10', '2023-12-18 13:48:10', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
