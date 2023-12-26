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

-- Dumping structure for table ci4.saran
CREATE TABLE IF NOT EXISTS `saran` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `saran` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_saran` (`user_id`),
  CONSTRAINT `user_id_saran` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table ci4.saran: ~2 rows (approximately)
DELETE FROM `saran`;
INSERT INTO `saran` (`id`, `judul`, `saran`, `from`, `user_id`, `created_at`, `updated_at`) VALUES
	(3, 'Makanan', 'Kalo dikasih cemilan auto lebih semangat!!', 'user@gmail.com', 5, '2023-12-26 13:26:39', '2023-12-26 13:26:39'),
	(4, 'Minum', 'Contoh jika user saran dari user llainnya', 'siswa@gmail.com', 20, '2023-12-26 13:26:39', '2023-12-26 13:26:39');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
