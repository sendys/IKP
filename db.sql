/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - ikp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

LOCK TABLES `cache` WRITE;

UNLOCK TABLES;

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

LOCK TABLES `cache_locks` WRITE;

UNLOCK TABLES;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

LOCK TABLES `failed_jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

LOCK TABLES `job_batches` WRITE;

UNLOCK TABLES;

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

LOCK TABLES `jobs` WRITE;

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'0001_01_01_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'0001_01_01_000001_create_cache_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'0001_01_01_000002_create_jobs_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2024_11_27_101247_add_role_to_users_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2024_11_30_083023_create_penilaians_table',3);
insert  into `migrations`(`id`,`migration`,`batch`) values (6,'2024_12_14_152251_create_setting_labels_table',4);
insert  into `migrations`(`id`,`migration`,`batch`) values (9,'2025_03_08_063220_create_pegawais_table',5);

UNLOCK TABLES;

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

LOCK TABLES `password_reset_tokens` WRITE;

UNLOCK TABLES;

/*Table structure for table `pegawais` */

DROP TABLE IF EXISTS `pegawais`;

CREATE TABLE `pegawais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tlahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pegawais` */

LOCK TABLES `pegawais` WRITE;

insert  into `pegawais`(`id`,`nama`,`ktp`,`tlahir`,`tgllhr`,`jk`,`telp`,`lokasi`,`alamat`,`path`,`users_id`,`created_at`,`updated_at`,`deleted_at`) values (1,'Sandi Saryono','0','Sabang','1982-05-04','L','081360205901','Banda Aceh','Lamdingin','storage/photo/1741688554_avatar-10.jpg',NULL,'2025-03-09 08:38:58','2025-03-09 08:39:01',NULL);
insert  into `pegawais`(`id`,`nama`,`ktp`,`tlahir`,`tgllhr`,`jk`,`telp`,`lokasi`,`alamat`,`path`,`users_id`,`created_at`,`updated_at`,`deleted_at`) values (2,'sasa','44124214','sbg','2025-03-22','P','35434543','bna','wwadwada',NULL,NULL,NULL,NULL,NULL);
insert  into `pegawais`(`id`,`nama`,`ktp`,`tlahir`,`tgllhr`,`jk`,`telp`,`lokasi`,`alamat`,`path`,`users_id`,`created_at`,`updated_at`,`deleted_at`) values (3,'Ryka Mutiara Sari','232352352','Padang','1994-12-04','P','08227930301','Lhokseumawe','Banda Aceh','storage/photo/1741775639_Sania.jpg',NULL,NULL,NULL,NULL);
insert  into `pegawais`(`id`,`nama`,`ktp`,`tlahir`,`tgllhr`,`jk`,`telp`,`lokasi`,`alamat`,`path`,`users_id`,`created_at`,`updated_at`,`deleted_at`) values (40,'Azra Humaira','3643634','banda aceh','2025-03-27','P','081360205901','Lhokseumawe','banda aceh','storage/photo/1741689763_faculty-teacher-4-1.jpg',NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Table structure for table `penilaians` */

DROP TABLE IF EXISTS `penilaians`;

CREATE TABLE `penilaians` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `rating` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penilaians` */

LOCK TABLES `penilaians` WRITE;

insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (1,18,'1','2025-03-12 17:41:23','2025-03-12 17:41:23',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (2,18,'1','2025-03-12 17:41:26','2025-03-12 17:41:26',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (3,18,'2','2025-03-12 17:41:28','2025-03-12 17:41:28',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (4,18,'2','2025-03-12 17:41:30','2025-03-12 17:41:30',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (5,17,'1','2025-03-12 17:41:43','2025-03-12 17:41:43',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (6,17,'1','2025-03-12 17:41:46','2025-03-12 17:41:46',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (7,17,'2','2025-03-12 17:41:48','2025-03-12 17:41:48',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (8,17,'1','2025-03-12 17:41:50','2025-03-12 17:41:50',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (9,17,'3','2025-03-12 17:41:52','2025-03-12 17:41:52',NULL);

UNLOCK TABLES;

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

LOCK TABLES `sessions` WRITE;

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('51KDykhW1JZwhqFVy4R0ZRJlkcE5QkqclfnRahbA',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkVJSFZiRkhNd2RyN0RvV2R1T3RWT3p4TUlRVWgxZTczZFJ6dENqQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vaWtwLnRlc3QvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1741827834);
insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('CeIjQYK1YppafgPepWhkIp68jxZTtzDH2uZaVQ4p',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2hMSVAxcHB0Q0QyWkpUaFFXQzhSOHo3Tlk3TmJLdTA4NVc0S0p4ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vaWtwLnRlc3QvYWRtaW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMyOiJodHRwczovL2lrcC50ZXN0L2FkbWluL2Rhc2hib2FyZCI7fX0=',1741826278);
insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('CP3X5WkWFdO66xPjuiMwHcSDtDqgqmse1vDOs18x',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUW1PWlhacFhaUk1uYTMxSUxYV2F6R3djTGxQcUlvcERNTHpPaVlqYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1741824644);
insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('DfFj3dt7S8RBtOcorU26fFZpoQLDOU5wywVhz4im',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUE5kVWhYV1BOMG92MEw1N3ZZR3U3NGd6RmRRMzZIRnBEdXpJSVRxdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vaWtwLnRlc3QvYWRtaW4vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMyOiJodHRwczovL2lrcC50ZXN0L2FkbWluL2Rhc2hib2FyZCI7fX0=',1741827437);
insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('qzB250D6cez3ZEP6tkfkeL8Tmh85zm2c20q8ypNF',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ0pFV3hoS1VyOGpQeGpxZzhRNTkzazA1cmtrSUNmVklMa0VxWVRoVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9pa3AudGVzdC9hZG1pbi9kYXNoYm9hcmQiO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMyOiJodHRwczovL2lrcC50ZXN0L2FkbWluL2Rhc2hib2FyZCI7fX0=',1741827565);

UNLOCK TABLES;

/*Table structure for table `setting_labels` */

DROP TABLE IF EXISTS `setting_labels`;

CREATE TABLE `setting_labels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `namalabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `setting_labels` */

LOCK TABLES `setting_labels` WRITE;

insert  into `setting_labels`(`id`,`namalabel`,`created_at`,`updated_at`) values (1,'MOHON BERIKAN PENILAIAN TERHADAP KAMI AGAR KAMI DAPAT \r\nMENINGKATKAN KWALITAS PELAYANAN','2024-12-14 15:25:46','2025-03-13 07:36:00');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`pegawai_id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,1,'admin','admin@mail.com','admin',NULL,'$2y$12$VdKAxyh.AQxfJAupNp03HOyLP/sdBD7pjzdHek4bhRotbyCPMEjMG',NULL,'2024-11-27 10:16:08','2024-11-27 10:16:08');
insert  into `users`(`id`,`pegawai_id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (17,40,'Azra Humaira','azra@mail.com','user',NULL,'$2y$12$zh5AzaE0/pyTRTHiUfcSoORNke1kiGAr8ru8YaEorVxPGBUpmyFgO',NULL,'2025-03-12 17:40:37','2025-03-12 17:40:37');
insert  into `users`(`id`,`pegawai_id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (18,3,'Ryka Mutiara Sari','ryka@mail.com','user',NULL,'$2y$12$06isA72HUx9idwHmKOSh2.Fa2mTcyYNdb/jgX79c8hDglR5ImGUL6',NULL,'2025-03-12 17:40:54','2025-03-12 17:40:54');

UNLOCK TABLES;

/*Table structure for table `view_penilaian` */

DROP TABLE IF EXISTS `view_penilaian`;

/*!50001 DROP VIEW IF EXISTS `view_penilaian` */;
/*!50001 DROP TABLE IF EXISTS `view_penilaian` */;

/*!50001 CREATE TABLE  `view_penilaian`(
 `tanggal` timestamp ,
 `name` varchar(255) ,
 `sangat_puas` decimal(22,0) ,
 `puas` decimal(22,0) ,
 `tidak_puas` decimal(22,0) 
)*/;

/*View structure for view view_penilaian */

/*!50001 DROP TABLE IF EXISTS `view_penilaian` */;
/*!50001 DROP VIEW IF EXISTS `view_penilaian` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penilaian` AS (select `a`.`created_at` AS `tanggal`,`b`.`name` AS `name`,sum(case when `a`.`rating` = 1 then 1 else 0 end) AS `sangat_puas`,sum(case when `a`.`rating` = 2 then 1 else 0 end) AS `puas`,sum(case when `a`.`rating` = 3 then 1 else 0 end) AS `tidak_puas` from (`penilaians` `a` join `users` `b` on(`a`.`user_id` = `b`.`id`)) where cast(`a`.`created_at` as date) = '2024-12-01' group by `a`.`user_id` order by `a`.`id`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
