/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.33-MariaDB : Database - db_sioka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sioka` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_sioka`;

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) DEFAULT NULL COMMENT '0=slider; 1=profile;',
  `judul` varchar(255) DEFAULT NULL,
  `katakunci` varchar(255) DEFAULT NULL,
  `content` text,
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `content` */

insert  into `content`(`id`,`jenis`,`judul`,`katakunci`,`content`,`flag_delete`,`created_at`,`updated_at`) values 
(1,1,'SITASI','LPPM STIKI INDONESIA','<p>&nbsp;SITASI merupakan sistem yang dapat melakukan pengajuan Penelitian, Pengabdian Dosen dan membantu proses yang terlibat didalamnya seperti progres pengajuan, mengelola data pengajuan, dll. sistem ini dibuat dengan tujuan meringankan pekerjaan ketua LPPM, mencegah hilangnya file karena virus atau bencana alam, dengan menggunakan tempat penyimpanan yang lebih terstruktur dan efektif seperti database, memperkecil kesalahan dalam penulisan nama dosen, dll.&nbsp; &nbsp;<br></p>',0,'2018-07-30 09:41:45','2018-07-30 09:41:45'),
(2,0,'SELAMAT DATANG DI SISTEM IMB KARANGASEM','IMB KARANGASEM','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/aac41d76ba895ab889e4f6cf3dafd6b8.jpg',0,'2018-09-06 19:46:45','2018-09-06 19:46:45'),
(3,0,'Penelitian','LPPM STIKI','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/990d5b8bf4e95429c19fbdb1a7760b01.jpg',1,'2018-07-30 09:22:22','2018-07-30 09:22:22'),
(4,1,'Penelitian','LPPM STIKI INDONESIA','<p>Peneitian dan pengembangan juga sangatlah penting bagi kemajuan perguruan tinggi,kesejahteraan masyarakat serta kemajuan bangsa dan negara.<br></p>',0,'2018-07-30 09:42:00','2018-07-30 09:42:00'),
(5,0,'SITASI','LPPM STIKI INDONESIA','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/f2b5a20068f32dd9e6e75033c8e38204.jpg',1,'2018-07-30 09:28:23','2018-07-30 09:28:23'),
(6,0,'SITASI','LPPM STIKI INDONESIA','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/27a5b5c701ceb52c3f51c51c0c70c20d.jpg',1,'2018-07-30 09:31:03','2018-07-30 09:31:03'),
(7,0,'SITASI','SITASI','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/c2d75b774be7928bf5007739c69c0bcb.jpg',1,'2018-07-30 09:20:05','2018-07-30 09:20:05'),
(8,0,'Saya coba','COba Aja','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/8f8d92049a0e9a6049d162133b57a382.jpg',1,'2018-07-30 08:59:58','2018-07-30 08:59:58'),
(9,1,'Tentang Sitasi','Kunciss','Kunci',1,'2018-07-30 09:34:38','2018-07-30 09:34:38'),
(10,0,'TAMPAK SIRING','KAB KARANGASEM','protected/storage/quickcount/slider/content/10bf08f0bbd6689475be65b4ae441bd9/779304ae46b32f7fac25ea49318df073.jpg',0,'2018-09-06 19:47:05','2018-09-06 19:47:05');

/*Table structure for table `rbac_permission_role` */

DROP TABLE IF EXISTS `rbac_permission_role`;

CREATE TABLE `rbac_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_permission_role` */

insert  into `rbac_permission_role`(`id`,`permission_id`,`role_id`,`created_at`,`updated_at`) values 
(1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `rbac_permissions` */

DROP TABLE IF EXISTS `rbac_permissions`;

CREATE TABLE `rbac_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `attribute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_permissions` */

insert  into `rbac_permissions`(`id`,`permission_title`,`permission_slug`,`icon`,`parent`,`attribute`,`weight`,`created_at`,`updated_at`) values 
(1,'Halaman Utama','admin','fa fa-globe',0,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Master Data','#','fa fa-database',0,'',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,'Master User','admin/user','fa fa-user',2,'',37,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,'Master Slider','admin/slider','fa fa-sliders',2,NULL,40,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,'Master Profile','admin/profile','fa fa-eye',2,NULL,41,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `rbac_role_user` */

DROP TABLE IF EXISTS `rbac_role_user`;

CREATE TABLE `rbac_role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_role_user` */

insert  into `rbac_role_user`(`id`,`role_id`,`user_id`,`created_at`,`updated_at`) values 
(1,2,11101420,'2018-06-05 16:06:15','2018-06-05 16:06:15'),
(181,2,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `rbac_roles` */

DROP TABLE IF EXISTS `rbac_roles`;

CREATE TABLE `rbac_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_roles` */

insert  into `rbac_roles`(`id`,`role_title`,`role_slug`,`created_at`,`updated_at`) values 
(1,'Admin','','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Dosen','','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`identifier`,`username`,`password`,`foto`,`telp`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Adi Panca Saputra Iskandar, S.Kom., M.T.','adipancaiskandar@gmail.com','11101420','admin','$2y$10$F7Z3.hvsjqj.d5.JnEJmGeTV6TCimVaurXAPeBnr7pRKwnARMu9Ou',NULL,NULL,'vxDCmGQxLDUxJNV6LHmv7Jx3UvizliWarAGGv7LOqDbzfL8XdiiY0BHmP3JD','2018-06-05 16:06:15','2018-09-06 22:26:21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
