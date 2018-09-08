/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.19-MariaDB : Database - db_sioka
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

/*Table structure for table `m_fungsi` */

DROP TABLE IF EXISTS `m_fungsi`;

CREATE TABLE `m_fungsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `indeks` decimal(6,2) DEFAULT '0.00',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `m_fungsi` */

insert  into `m_fungsi`(`id`,`nama`,`indeks`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'Hunian',0.50,0,'2018-09-08 15:16:25','2018-09-08 15:16:25'),
(2,'Keagamaan',0.00,0,'2018-09-07 13:29:39','0000-00-00 00:00:00'),
(3,'Usaha',3.00,0,'2018-09-07 13:29:42','0000-00-00 00:00:00'),
(4,'Sosial Budaya',0.00,0,'2018-09-07 13:29:47','0000-00-00 00:00:00'),
(5,'Khusus',2.00,0,'2018-09-07 13:29:57','0000-00-00 00:00:00'),
(6,'Ganda/Campuran',4.00,0,'2018-09-07 13:30:00','0000-00-00 00:00:00'),
(7,'Bangunan',0.56,1,'2018-09-08 12:33:27','2018-09-08 12:33:27');

/*Table structure for table `m_harga_bangunan` */

DROP TABLE IF EXISTS `m_harga_bangunan`;

CREATE TABLE `m_harga_bangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fungsi` int(11) DEFAULT NULL COMMENT 'm_fungsi',
  `id_klasifikasi` int(11) DEFAULT NULL COMMENT 'm_klasifikasi_bangunan',
  `is_bertingkat` tinyint(2) DEFAULT NULL COMMENT '0=tidak bertingkat; 1=bertingkat;',
  `is_bangunan_tambahan` tinyint(2) DEFAULT NULL COMMENT '0=Bangunan Utama; 1=Bangunan Pendukung',
  `harga` double DEFAULT '0',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `m_harga_bangunan` */

insert  into `m_harga_bangunan`(`id`,`id_fungsi`,`id_klasifikasi`,`is_bertingkat`,`is_bangunan_tambahan`,`harga`,`flag_delete`,`created_at`,`updated_at`) values 
(1,3,1,0,0,3000000,0,'2018-09-08 16:33:21','0000-00-00 00:00:00');

/*Table structure for table `m_jenis_imb` */

DROP TABLE IF EXISTS `m_jenis_imb`;

CREATE TABLE `m_jenis_imb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `indeks` decimal(6,2) DEFAULT '0.00',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_jenis_imb` */

insert  into `m_jenis_imb`(`id`,`nama`,`indeks`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'IMB Pembangunan baru/penambahan',1.00,0,'2018-09-07 13:57:33','0000-00-00 00:00:00'),
(2,'IMB rehablitasi/renovasi berat',0.65,0,'2018-09-07 13:57:44','0000-00-00 00:00:00'),
(3,'IMB rehabilitasi/renovasi sedang',0.45,0,'2018-09-07 13:57:42','0000-00-00 00:00:00'),
(4,'IMB Banguns',2.60,1,'2018-09-08 14:21:07','2018-09-08 14:21:07');

/*Table structure for table `m_klasifikasi_bangunan` */

DROP TABLE IF EXISTS `m_klasifikasi_bangunan`;

CREATE TABLE `m_klasifikasi_bangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `is_bangunan_tambahan` tinyint(2) DEFAULT '0' COMMENT '0=Bangunan Utama; 1=bangunan pendukung;',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `m_klasifikasi_bangunan` */

insert  into `m_klasifikasi_bangunan`(`id`,`nama`,`is_bangunan_tambahan`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'Mewah',0,0,'2018-09-07 13:37:52','0000-00-00 00:00:00'),
(2,'Bagus',0,0,'2018-09-07 13:37:52','0000-00-00 00:00:00'),
(3,'Standar',0,0,'2018-09-07 13:37:53','0000-00-00 00:00:00'),
(4,'Sederhana',0,0,'2018-09-07 13:37:54','0000-00-00 00:00:00'),
(5,'Baru',1,0,'2018-09-07 13:38:47','0000-00-00 00:00:00'),
(6,'Rehab Ringan',1,0,'2018-09-07 13:38:48','0000-00-00 00:00:00'),
(7,'Rehab Sedang',1,0,'2018-09-07 13:38:48','0000-00-00 00:00:00'),
(8,'Rehab Berat',1,0,'2018-09-07 13:38:49','0000-00-00 00:00:00');

/*Table structure for table `m_klasifikasi_parameter` */

DROP TABLE IF EXISTS `m_klasifikasi_parameter`;

CREATE TABLE `m_klasifikasi_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `indeks` decimal(6,2) DEFAULT '0.00',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `m_klasifikasi_parameter` */

insert  into `m_klasifikasi_parameter`(`id`,`nama`,`indeks`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'Kompleksitas',0.25,0,'2018-09-08 17:20:10','0000-00-00 00:00:00'),
(2,'Permanensi',0.20,0,'2018-09-08 17:20:10','0000-00-00 00:00:00'),
(3,'Resiko kebakaran',0.15,0,'2018-09-08 17:20:10','0000-00-00 00:00:00'),
(4,'Zona Gempa',0.15,0,'2018-09-08 17:20:10','0000-00-00 00:00:00'),
(5,'Lokasi (Kepadatan Bangunan Gedung)',0.10,0,'2018-09-08 17:20:30','0000-00-00 00:00:00'),
(6,'Ketinggian Bangunan Gedung',0.10,0,'2018-09-08 17:20:52','0000-00-00 00:00:00'),
(7,'Kepemilikan',0.05,0,'2018-09-08 17:21:00','0000-00-00 00:00:00'),
(8,'Waktu Penggunaan',1.00,0,'2018-09-08 17:24:17','0000-00-00 00:00:00'),
(9,'Indeks Jalan',1.00,0,'2018-09-08 17:24:18','0000-00-00 00:00:00');

/*Table structure for table `m_klasifikasi_parameter_detail` */

DROP TABLE IF EXISTS `m_klasifikasi_parameter_detail`;

CREATE TABLE `m_klasifikasi_parameter_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_klasifikasi_parameter` int(11) DEFAULT NULL COMMENT 'm_klasifikasi_parameter',
  `nama` varchar(255) DEFAULT NULL,
  `indeks` decimal(6,2) DEFAULT '0.00',
  `flag_delete` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_klasifikasi_parameter_detail` */

/*Table structure for table `m_persyaratan_teknis` */

DROP TABLE IF EXISTS `m_persyaratan_teknis`;

CREATE TABLE `m_persyaratan_teknis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `m_persyaratan_teknis` */

insert  into `m_persyaratan_teknis`(`id`,`nama`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'Tata Ruang Peruntukan',0,'2018-09-07 13:35:28','0000-00-00 00:00:00'),
(2,'Tata Ruang Jalur Hijau',0,'2018-09-07 13:35:38','0000-00-00 00:00:00'),
(3,'Sempadan Jalan',0,'2018-09-07 13:35:52','0000-00-00 00:00:00'),
(4,'Sempadan Sungai',0,'2018-09-07 13:36:16','0000-00-00 00:00:00'),
(5,'Sempadan Pantai',0,'2018-09-08 16:55:13','2018-09-08 14:31:35'),
(6,'KDB/KLB Total',0,'2018-09-08 16:55:28','0000-00-00 00:00:00'),
(7,'Arsitektur Bangunan',0,'2018-09-08 16:55:53','0000-00-00 00:00:00'),
(8,'Struktur Bangunan',0,'2018-09-08 16:56:02','0000-00-00 00:00:00');

/*Table structure for table `m_status_pengajuan` */

DROP TABLE IF EXISTS `m_status_pengajuan`;

CREATE TABLE `m_status_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `label` varchar(50) DEFAULT 'label label-default',
  `flag_delete` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `m_status_pengajuan` */

insert  into `m_status_pengajuan`(`id`,`nama`,`label`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'Pendaftaran','label label-info',0,'2018-09-08 17:43:14','0000-00-00 00:00:00'),
(2,'Sedang Survey','label label-warning',0,'2018-09-08 17:43:20','0000-00-00 00:00:00'),
(3,'Menunggu Hasil Survey','label label-primary',0,'2018-09-08 17:43:29','0000-00-00 00:00:00'),
(4,'Survey Ulang','label label-warning',0,'2018-09-08 17:44:19','0000-00-00 00:00:00'),
(5,'Disteujui','label label-success',0,'2018-09-08 17:43:59','0000-00-00 00:00:00'),
(6,'Ditolak','label label-danger',0,'2018-09-08 17:44:11','0000-00-00 00:00:00'),
(7,'yak','label label-default',1,'2018-09-08 14:26:29','2018-09-08 14:26:29');

/*Table structure for table `m_surveyor` */

DROP TABLE IF EXISTS `m_surveyor`;

CREATE TABLE `m_surveyor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telp` varchar(14) DEFAULT NULL,
  `flag_delete` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `m_surveyor` */

insert  into `m_surveyor`(`id`,`nip`,`nama`,`telp`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'627647','Lely Meilina','834959',0,'2018-09-08 13:21:04','2018-09-08 13:21:04'),
(2,NULL,'adipanca',NULL,1,'2018-09-08 13:17:02','2018-09-08 13:17:02'),
(3,NULL,'adipanca',NULL,1,'2018-09-08 13:17:11','2018-09-08 13:17:11'),
(4,'2948','adipanca','39',1,'2018-09-08 13:21:23','2018-09-08 13:21:23'),
(5,'3874','tes','38',0,'2018-09-08 13:21:19','2018-09-08 13:21:19');

/*Table structure for table `rbac_permission_role` */

DROP TABLE IF EXISTS `rbac_permission_role`;

CREATE TABLE `rbac_permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_permission_role` */

insert  into `rbac_permission_role`(`id`,`permission_id`,`role_id`,`created_at`,`updated_at`) values 
(1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(11,11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(12,12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(13,13,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(14,14,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(15,15,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(16,16,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(17,17,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rbac_permissions` */

insert  into `rbac_permissions`(`id`,`permission_title`,`permission_slug`,`icon`,`parent`,`attribute`,`weight`,`created_at`,`updated_at`) values 
(1,'Halaman Utama','admin','fa fa-home',0,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Master Data','#','fa fa-database',0,'',2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,'User','admin/user','fa fa-user',2,'',3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,'Fungsi Bangunan','admin/fungsi','fa fa-sliders',2,NULL,4,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,'Harga Bangunan','admin/hargabangunan','fa fa-money',2,NULL,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,'Klasifikasi Bangunan','admin/klasifikasibangunan','fa fa-bar-chart',2,NULL,6,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(7,'Klasifikasi Parameter','admin/klasifikasiparameter','fa fa-cubes',2,NULL,7,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(8,'Parameter Detail','admin/parameterdetail','fa fa-file',2,NULL,8,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(9,'Persyaratan Teknis','admin/persyaratanteknis','fa fa-file-o',2,NULL,9,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(10,'Status Pengajuan','admin/statuspengajuan','fa fa-eye',2,NULL,10,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(11,'Surveyor','admin/surveyor','fa fa-users',2,NULL,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(12,'Frontend','#','fa fa-globe',0,NULL,12,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(13,'Slider','admin/slider','fa fa-sliders',12,NULL,13,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(14,'Profile','admin/profile','fa fa-globe',12,NULL,14,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(15,'Jenis Imb','admin/jenisimb','fa fa-eye',2,NULL,15,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(16,'IMB','#','fa fa-send',0,'',16,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(17,'Data Pengajuan','admin/pengajuan','fa fa-star',16,NULL,17,'0000-00-00 00:00:00','0000-00-00 00:00:00');

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
(1,1,11101420,'2018-06-05 16:06:15','2018-06-05 16:06:15'),
(181,1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');

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

/*Table structure for table `t_pengajuan` */

DROP TABLE IF EXISTS `t_pengajuan`;

CREATE TABLE `t_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(100) DEFAULT '0',
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_jenis_imb` int(11) DEFAULT NULL COMMENT 'm_jenis_imb',
  `id_harga_bangunan` int(11) DEFAULT NULL COMMENT 'm_harga_bangunan',
  `deskripsi_bangunan` varchar(255) DEFAULT NULL COMMENT 'deskripsi detail bangunan',
  `lokasi` text COMMENT 'alamat pendaftara pengajuan',
  `tahun` int(11) DEFAULT NULL,
  `luas` decimal(6,2) DEFAULT '0.00',
  `jumlah_biaya` double DEFAULT '0',
  `id_surveyor_1` int(11) DEFAULT '0' COMMENT 'm_surveyor',
  `id_surveyor_2` int(11) DEFAULT '0' COMMENT 'm_surveyor',
  `id_status_pengajuan` int(11) DEFAULT '1' COMMENT 'm_status_pengajuan',
  `flag_delete` tinyint(4) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_pengajuan` */

insert  into `t_pengajuan`(`id`,`no_registrasi`,`nik`,`nama`,`id_jenis_imb`,`id_harga_bangunan`,`deskripsi_bangunan`,`lokasi`,`tahun`,`luas`,`jumlah_biaya`,`id_surveyor_1`,`id_surveyor_2`,`id_status_pengajuan`,`flag_delete`,`created_at`,`updated_at`) values 
(1,'2018010010001','5371992051300006','Adi Panca Saputra Iskandar',1,1,'Akomodasi Pariwisata Non Bintang (Villa)','Banjar Dinas Tebola, Desa Sidemen, Kecamatan Sidemen, Kabupaten Karangasem',2018,0.00,0,0,0,1,0,'2018-09-08 17:28:17','2018-09-08 17:28:17');

/*Table structure for table `t_pengajuan_parameter` */

DROP TABLE IF EXISTS `t_pengajuan_parameter`;

CREATE TABLE `t_pengajuan_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(100) DEFAULT NULL,
  `id_pengajuan` int(11) DEFAULT NULL COMMENT 't_pengajuan',
  `id_klasifikasi_parameter` int(11) DEFAULT NULL COMMENT 'm_klasifikasi_parameter',
  `id_klasifikasi_parameter_detail` int(11) DEFAULT NULL COMMENT 'm_klasifikasi_parameter_detail',
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `t_pengajuan_parameter` */

insert  into `t_pengajuan_parameter`(`id`,`no_registrasi`,`id_pengajuan`,`id_klasifikasi_parameter`,`id_klasifikasi_parameter_detail`,`keterangan`,`created_at`,`updated_at`) values 
(1,'2018010010001',1,1,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(2,'2018010010001',1,2,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(3,'2018010010001',1,3,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(4,'2018010010001',1,4,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(5,'2018010010001',1,5,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(6,'2018010010001',1,6,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(7,'2018010010001',1,7,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(8,'2018010010001',1,8,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18'),
(9,'2018010010001',1,9,NULL,NULL,'2018-09-08 17:28:18','2018-09-08 17:28:18');

/*Table structure for table `t_pengajuan_persyaratan` */

DROP TABLE IF EXISTS `t_pengajuan_persyaratan`;

CREATE TABLE `t_pengajuan_persyaratan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` varchar(100) DEFAULT NULL,
  `id_pengajuan` int(11) DEFAULT NULL COMMENT 't_pengajuan',
  `id_persyaratan` int(11) DEFAULT NULL COMMENT 'm_persyaratan_teknis',
  `is_memenuhi` tinyint(2) DEFAULT NULL COMMENT '0=tidak memenuhi; 1=memenuhi;',
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `t_pengajuan_persyaratan` */

insert  into `t_pengajuan_persyaratan`(`id`,`no_registrasi`,`id_pengajuan`,`id_persyaratan`,`is_memenuhi`,`keterangan`,`created_at`,`updated_at`) values 
(1,'2018010010001',1,1,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(2,'2018010010001',1,2,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(3,'2018010010001',1,3,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(4,'2018010010001',1,4,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(5,'2018010010001',1,5,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(6,'2018010010001',1,6,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(7,'2018010010001',1,7,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17'),
(8,'2018010010001',1,8,NULL,NULL,'2018-09-08 17:28:17','2018-09-08 17:28:17');

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
(1,'Adi Panca Saputra Iskandar, S.Kom., M.T.','adipancaiskandar@gmail.com','11101420','11101420','$2y$10$F7Z3.hvsjqj.d5.JnEJmGeTV6TCimVaurXAPeBnr7pRKwnARMu9Ou','protected/storage/foto/11101420.jpeg',NULL,'EwO9ht2to6RmSm4Bpheg9ow0TMp0CsBVfryhH437Wx7K0tTJVuemuLeYG0Sv','2018-06-05 16:06:15','2018-09-08 18:18:47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
