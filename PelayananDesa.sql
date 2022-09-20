-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table pelayanansurat.business_infos: ~2 rows (approximately)
/*!40000 ALTER TABLE `business_infos` DISABLE KEYS */;
INSERT INTO `business_infos` (`id`, `telegram_id`, `name`, `identity_number`, `birth_place`, `birth_date`, `marriage_status`, `address`, `rt`, `rw`, `jenisusaha`, `jenisbarang`, `mulaiusaha`, `lokasiusaha`, `status`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Muro', '1234123412341234', 'BNA', '2000-10-31', 'kawin', 'asd', 'asd', 'asd', 'asd', 'asd', '2020', 'asd', 'Belum Dicetak', '2022-09-12 22:28:12', '2022-09-12 22:28:12'),
	(2, NULL, 'MuroR', '1234123412341234', 'BNA', '2000-10-31', 'kawin', 'asd', 'asd', 'asd', 'asd', 'asd', '2020', 'asd', 'Sudah Dicetak', '2022-09-12 22:28:20', '2022-09-12 22:35:47');
/*!40000 ALTER TABLE `business_infos` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.certificates: ~2 rows (approximately)
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
INSERT INTO `certificates` (`id`, `telegram_id`, `name`, `identity_number`, `birth_place`, `birth_date`, `gender`, `nationality`, `religion`, `rt`, `rw`, `address`, `status`, `created_at`, `updated_at`) VALUES
	(1, '12345678', 'Muro', '1234123412341234', 'BNA', '2000-10-31', 'laki-laki', 'WNA', 'islam', '1', '1', 'aaaa', 'Belum Dicetak', '2022-09-12 22:22:25', '2022-09-12 22:22:25'),
	(2, '12345678', 'MuroR', '1234123412341234', 'BNA', '2000-10-31', 'laki-laki', 'WNA', 'islam', '1', '1', 'aaaa', 'Sudah Dicetak', '2022-09-12 22:22:32', '2022-09-12 22:34:04');
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.cover_letters: ~2 rows (approximately)
/*!40000 ALTER TABLE `cover_letters` DISABLE KEYS */;
INSERT INTO `cover_letters` (`id`, `telegram_id`, `name`, `identity_number`, `gender`, `birth_place`, `birth_date`, `nationality`, `religion`, `marriage_status`, `occupation`, `education`, `rt`, `rw`, `address`, `proof_of_self`, `necessity`, `valid_from`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, '12345678', 'Muro', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'WNI', 'islam', 'kawin', 'Mhs', 'S1', 'asd', 'asd', 'asd', 'asd', 'skck', '2022-09-10', 'skck', 'Belum Dicetak', '2022-09-12 22:22:45', '2022-09-12 22:22:45'),
	(2, '12345678', 'MuroR', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'WNI', 'islam', 'kawin', 'Mhs', 'S1', 'asd', 'asd', 'asd', 'asd', 'skck', '2022-09-10', 'skck', 'Sudah Dicetak', '2022-09-12 22:22:51', '2022-09-12 22:33:21');
/*!40000 ALTER TABLE `cover_letters` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.death_people: ~0 rows (approximately)
/*!40000 ALTER TABLE `death_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `death_people` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.different_data: ~2 rows (approximately)
/*!40000 ALTER TABLE `different_data` DISABLE KEYS */;
INSERT INTO `different_data` (`id`, `telegram_id`, `name`, `identity_number`, `gender`, `birth_place`, `birth_date`, `rt`, `rw`, `address`, `document`, `number`, `status`, `created_at`, `updated_at`) VALUES
	(1, '12345678', 'MuroFFF', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'asd', 'asd', 'asd', 'asd', '1234', 'Belum Dicetak', '2022-09-12 22:23:01', '2022-09-12 22:23:01'),
	(2, '12345678', 'MuroFFF', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'asd', 'asd', 'asd', 'asd', '1234', 'Sudah Dicetak', '2022-09-12 22:23:05', '2022-09-12 22:35:43');
/*!40000 ALTER TABLE `different_data` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.mail_poors: ~2 rows (approximately)
/*!40000 ALTER TABLE `mail_poors` DISABLE KEYS */;
INSERT INTO `mail_poors` (`id`, `telegram_id`, `name`, `identity_number`, `gender`, `birth_place`, `birth_date`, `rt`, `rw`, `address`, `occupation`, `necessity`, `status`, `created_at`, `updated_at`) VALUES
	(1, '12345678', 'Hann11', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'asd', 'asd', 'asd', 'asd', 'asd', 'Belum Dicetak', '2022-09-12 22:23:11', '2022-09-12 22:23:11'),
	(2, '12345678', 'Muro', '1234123412341234', 'laki-laki', 'BNA', '2000-10-31', 'asd', 'asd', 'asd', 'asd', 'asd', 'Sudah Dicetak', '2022-09-12 22:23:18', '2022-09-12 22:35:56');
/*!40000 ALTER TABLE `mail_poors` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(550, '2014_10_12_000000_create_users_table', 1),
	(551, '2014_10_12_100000_create_password_resets_table', 1),
	(552, '2019_08_19_000000_create_failed_jobs_table', 1),
	(553, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(554, '2022_04_04_173456_create_cover_letters_table', 1),
	(555, '2022_04_04_173522_create_death_people_table', 1),
	(556, '2022_04_12_133754_create_certificates_table', 1),
	(557, '2022_04_12_210846_create_public_complaints_table', 1),
	(558, '2022_04_28_000439_create_different_data_table', 1),
	(559, '2022_05_15_224457_create_business_infos_table', 1),
	(560, '2022_05_30_201743_create_mail_poors_table', 1),
	(561, '2022_06_30_201645_create_user_lists_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.public_complaints: ~0 rows (approximately)
/*!40000 ALTER TABLE `public_complaints` DISABLE KEYS */;
/*!40000 ALTER TABLE `public_complaints` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@pelayanan-surat.test', '2022-09-12 22:20:18', '$2y$10$AAHoOnMGA/zCufURKx4cf.QOGocs54KHajgRg85AqyA/ukjAKDioe', NULL, '2022-09-12 22:20:18', '2022-09-12 22:20:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.user_lists: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_lists` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_lists` ENABLE KEYS */;

-- Dumping data for table pelayanansurat.user_session: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
INSERT INTO `user_session` (`id_session`, `id_telegram`, `num_session`) VALUES
	(72, '752211658', '28'),
	(76, '172353956', '73'),
	(77, '1598076823', '75'),
	(86, '1203205920', '1');
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
