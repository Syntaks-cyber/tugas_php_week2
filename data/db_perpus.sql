-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.27-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for db_buku
CREATE DATABASE IF NOT EXISTS `db_buku` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_buku`;


-- Dumping structure for table db_buku.bukus
CREATE TABLE IF NOT EXISTS `bukus` (
  `isbn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pengarang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `halaman` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_buku.bukus: ~15 rows (approximately)
/*!40000 ALTER TABLE `bukus` DISABLE KEYS */;
INSERT INTO `bukus` (`isbn`, `judul`, `pengarang`, `penerbit`, `halaman`, `created_at`, `updated_at`) VALUES
	('9786022910954', 'Perahu Kertas', 'Dee Lestari', 'Bentang Pustaka', 564, '2016-03-28 02:34:48', '2016-03-28 02:34:48'),
	('9786022910985', 'Filosofi Kopi', 'Dee Lestari', 'Bentang Pustaka', 112, '2016-03-28 02:36:44', '2016-03-28 02:36:44'),
	('9786022911029', 'Ayah', 'Andrea Hirata', 'Bentang Pustaka', 432, '2016-03-28 02:01:42', '2016-03-28 02:01:42'),
	('9786022911111', 'Rudy', 'Gina S. Noer', 'Bentang Pustaka', 280, '2016-03-28 02:05:42', '2016-03-28 02:05:42'),
	('9786028811095', 'Dwilogi Padang Bulan & Cinta di Dalam Gelas', 'Andrea Hirata', 'Bentang Pustaka', 544, '2016-03-28 02:11:52', '2016-03-28 02:11:52'),
	('9786028811521', 'Sebelas Patriot', 'Andrea Hirata', 'Bentang Pustaka', 124, '2016-03-28 02:13:45', '2016-03-28 02:13:45'),
	('9789791227025', 'Edensor', 'Andrea Hirata', 'Bentang Pustaka', 290, '2016-03-28 02:20:33', '2016-03-28 02:20:33'),
	('9789791227452', 'Maryamah Karpov', 'Andrea Hirata', 'Bentang Pustaka', 504, '2016-03-28 02:09:36', '2016-03-28 02:09:36'),
	('9789792248616', 'Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 432, '2016-03-28 02:25:54', '2016-03-28 02:25:54'),
	('9789792263251', 'Ranah 3 Warna', 'Ahmad Fuadi', 'Gramedia', 473, '2016-03-28 02:28:30', '2016-03-28 02:28:30'),
	('9789792294736', 'Rantau 1 Muara', 'Ahmad Fuadi', 'Gramedia', 400, '2016-03-28 02:30:31', '2016-03-28 02:30:31'),
	('9789793062792', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 548, '2016-03-28 02:03:48', '2016-03-28 02:03:48'),
	('9789793062921', 'Sang Pemimpi', 'Andrea Hirata', 'Bentang Pustaka', 292, '2016-03-28 02:23:41', '2016-03-28 02:23:41'),
	('9789797803629', 'Refrain', 'Winna Efendi', 'Gagas Media', 318, '2016-03-28 02:40:52', '2016-03-28 02:40:52');
/*!40000 ALTER TABLE `bukus` ENABLE KEYS */;


-- Dumping structure for table db_buku.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_buku.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_03_24_073701_create_bukus_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table db_buku.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_buku.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table db_buku.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_buku.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
