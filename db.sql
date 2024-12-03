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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'0001_01_01_000000_create_users_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (2,'0001_01_01_000001_create_cache_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (3,'0001_01_01_000002_create_jobs_table',1);
insert  into `migrations`(`id`,`migration`,`batch`) values (4,'2024_11_27_101247_add_role_to_users_table',2);
insert  into `migrations`(`id`,`migration`,`batch`) values (5,'2024_11_30_083023_create_penilaians_table',3);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penilaians` */

LOCK TABLES `penilaians` WRITE;

insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (1,1,'1','2024-12-01 09:31:16','2024-12-01 09:31:16',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (2,4,'2','2024-12-01 09:31:46','2024-12-01 09:31:46',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (3,3,'3','2024-12-01 09:32:05','2024-12-01 09:32:05',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (4,3,'2','2024-12-01 09:37:31','2024-12-01 09:37:31',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (5,3,'1','2024-12-01 09:38:07','2024-12-01 09:38:07',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (6,3,'1','2024-12-01 09:38:36','2024-12-01 09:38:36',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (7,3,'1','2024-12-01 09:42:57','2024-12-01 09:42:57',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (8,1,'1','2024-12-01 09:46:29','2024-12-01 09:46:29',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (9,4,'3','2024-12-01 09:48:23','2024-12-01 09:48:23',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (10,4,'1','2024-12-01 09:48:40','2024-12-01 09:48:40',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (11,4,'1','2024-12-01 09:48:47','2024-12-01 09:48:47',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (12,4,'1','2024-12-01 09:48:49','2024-12-01 09:48:49',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (13,4,'1','2024-12-01 09:48:52','2024-12-01 09:48:52',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (14,4,'1','2024-12-01 22:37:16','2024-12-01 22:37:16',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (15,4,'2','2024-12-01 22:46:24','2024-12-01 22:46:24',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (16,4,'1','2024-12-01 22:48:33','2024-12-01 22:48:33',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (17,4,'3','2024-12-02 05:49:20','2024-12-02 05:49:20',NULL);
insert  into `penilaians`(`id`,`user_id`,`rating`,`created_at`,`updated_at`,`deleted_at`) values (18,1,'1','2024-12-03 04:54:04','2024-12-03 04:54:04',NULL);

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

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('10lHRm4T3zJYROG63AG19MXjQYRPPqCg0YKhHRZY',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoibVBKTUpwU284VjFaQTF4eVpzelc0T1AwS0F6eUh3dVJwVUJVTFV1aiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vaWtwLnRlc3QvYWRtaW4vZGFzaGJvYXJkIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==',1733185149);

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Sandi Saryono','user@mail.com','user',NULL,'$2y$12$KlK94AvCbTX9VOtaxLjqo.5JkcE/JJSPm/CTgcSXq49Ye1pCuLih2','YpVojzxy0b6xUVjPCSbOiyjhKXO0SXSrSE4IoQ4Q6E5eE7uaiL4xN11xKHxr','2024-11-27 09:56:24','2024-11-27 09:56:24');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (2,'admin','admin@mail.com','admin',NULL,'$2y$12$VdKAxyh.AQxfJAupNp03HOyLP/sdBD7pjzdHek4bhRotbyCPMEjMG',NULL,'2024-11-27 10:16:08','2024-11-27 10:16:08');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (3,'Ryka Mutiara Sari','ryka@mail.com','user',NULL,'$2y$12$cleN/eWLe5COUasUOd7n2./7xQ6o7u1/5/QBsKMNDbGw23DeeO8rq',NULL,'2024-11-30 08:03:50','2024-11-30 08:03:50');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (4,'Muhammad Zaid Assyauqi','zaid@mail.com','user',NULL,'$2y$12$SaaN3AtsPgvYZPV.huCQkO96k/qBxc//3FxF2yQwol.EkLB3ufaQi',NULL,'2024-11-30 08:08:29','2024-11-30 08:08:29');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (5,'Riri Astari','riri@mail.com','user',NULL,'$2y$12$DrkQw0BmvZZkzvWnmaX4Vu0y6sofhVHiVS/48959pPIob33VcrG5K',NULL,'2024-12-02 07:18:43','2024-12-02 07:18:43');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (6,'zayyan','zay@mail.com','user',NULL,'$2y$12$EH7ohrT.Uqzyubs9wR4.muNnMzQ5IJ8K3jRXw12v6P1ZsrhQR5RIu',NULL,'2024-12-02 07:24:54','2024-12-02 07:24:54');
insert  into `users`(`id`,`name`,`email`,`role`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (7,'gifar','gifar@mail.com','admin',NULL,'$2y$12$KNVxwFfdjQpJZ7Di4RIym.sAxuROLyyfEGfGF87CLuUSjxrZsoOQW',NULL,'2024-12-03 04:58:14','2024-12-03 04:58:14');

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
