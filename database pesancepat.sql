/*
SQLyog Community v12.2.1 (64 bit)
MySQL - 10.1.16-MariaDB : Database - pesancepat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pesancepat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pesancepat`;

/*Table structure for table `makananminuman` */

DROP TABLE IF EXISTS `makananminuman`;

CREATE TABLE `makananminuman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rumahmakan_id` int(11) NOT NULL,
  `nama_rm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `makananminuman` */

insert  into `makananminuman`(`id`,`nama`,`jenis`,`harga`,`image`,`rumahmakan_id`,`nama_rm`,`created_at`,`updated_at`) values 
(1,'Makanan A','Makanan',12000,'7.jpg',4,'Rumah Makan A','2016-12-04 08:03:14','2016-12-04 08:03:14'),
(2,'Makanan B','Makanan',21000,'2.jpg',4,'Rumah Makan A','2016-12-04 08:15:14','2016-12-04 08:15:14'),
(3,'Makanan A','Makanan',15000,'6.jpg',5,'Rumah Makan B','2016-12-04 08:16:12','2016-12-04 08:16:12'),
(5,'Minuman A','Minuman',5000,'5.jpg',6,'Rumah Makan C','2016-12-04 08:49:28','2016-12-04 08:49:28'),
(6,'Makanan A','Makanan',19000,'1.jpg',6,'Rumah Makan C','2016-12-04 08:49:55','2016-12-04 08:49:55'),
(7,'Makanan A','Makanan',9000,'3.jpg',15,'Rumah Makan L','2016-12-04 09:14:02','2016-12-04 09:14:02'),
(8,'Makanan C','Makanan',5000,'8.jpg',4,'Rumah Makan A','2016-12-05 07:47:08','2016-12-05 07:47:08'),
(11,'Minuman A','Minuman',3500,'4.jpg',5,'Rumah Makan B','2016-12-05 08:00:09','2016-12-05 08:00:09'),
(19,'Makanan B','Makanan',14000,'3.jpg',5,'Rumah Makan B','2016-12-11 16:17:32','2016-12-11 16:17:32');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_11_28_082543_user',1),
(4,'2016_11_29_145908_rumahmakan',2),
(5,'2016_11_29_150403_RumahMakan',3),
(6,'2016_11_29_151508_makananminuman',4),
(7,'2016_11_29_151538_order',4);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pesanan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rumahmakan_id` int(11) NOT NULL,
  `nama_rm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pukul` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `order` */

insert  into `order`(`id`,`id_pemesan`,`nama_pemesan`,`pesanan`,`jumlah`,`total`,`rumahmakan_id`,`nama_rm`,`tanggal`,`pukul`,`status`,`created_at`,`updated_at`) values 
(31,2,'frans','Makanan A',1,12000,4,'Rumah Makan A','13/12/2016','11.00','belum bayar','2016-12-13 03:17:25','2016-12-13 03:17:25'),
(32,5,'bernando','Makanan A',1,12000,4,'Rumah Makan A','13/12/2016','12.00','sudah bayar','2016-12-13 03:22:29','2016-12-13 03:23:14'),
(33,5,'bernando','Makanan C',3,15000,4,'Rumah Makan A','13/12/2016','15.00','belum bayar','2016-12-13 03:22:43','2016-12-13 03:22:43');

/*Table structure for table `rumahmakan` */

DROP TABLE IF EXISTS `rumahmakan`;

CREATE TABLE `rumahmakan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_rm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `rumahmakan` */

insert  into `rumahmakan`(`id`,`image`,`nama_rm`,`nomor`,`kota`,`alamat`,`nama_pemilik`,`username`,`password`,`created_at`,`updated_at`) values 
(4,'RM1.jpg','Rumah Makan A','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','a','a','2016-12-03 13:17:29','2016-12-03 13:17:29'),
(5,'RM1.jpg','Rumah Makan B','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','b','b','2016-12-03 13:25:08','2016-12-03 13:25:08'),
(6,'RM6.jpg','Rumah Makan C','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','c','c','2016-12-03 13:38:25','2016-12-03 13:38:25'),
(7,'RM6.jpg','Rumah Makan D','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','d','d','2016-12-03 13:38:54','2016-12-03 13:38:54'),
(8,'RM2.jpg','Rumah Makan E','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','e','e','2016-12-03 13:39:20','2016-12-03 13:39:20'),
(9,'RM2.jpg','Rumah Makan F','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','f','f','2016-12-03 13:40:01','2016-12-03 13:40:01'),
(10,'RM11.jpg','Rumah Makan G','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','g','g','2016-12-03 13:40:55','2016-12-03 13:40:55'),
(11,'RM11.jpg','Rumah Makan H','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','h','h','2016-12-03 13:41:22','2016-12-03 13:41:22'),
(12,'RM5.jpg','Rumah Makan I','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','i','i','2016-12-03 13:41:45','2016-12-03 13:41:45'),
(13,'RM5.jpg','Rumah Makan J','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','j','j','2016-12-03 14:10:40','2016-12-03 14:10:40'),
(14,'RM4.jpg','Rumah Makan K','085373253114','Laguboti','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','k','k','2016-12-03 14:12:40','2016-12-03 14:12:40'),
(15,'RM4.jpg','Rumah Makan L','085373253114','Balige','Jl. Sisingamangaraja, Sitoluama\r\nLaguboti, Toba Samosir\r\nSumatera Utara, Indonesia','Amir Syamir Simarmata','l','l','2016-12-03 14:13:44','2016-12-03 14:13:44');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nomor_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jenis_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`nomor_id`,`jenis_id`,`jk`,`kota`,`alamat`,`username`,`password`,`created_at`,`updated_at`) values 
(1,'yakim','234','KTM','Pria','Medan','asdkljkj','asldjkl','dj','2016-11-28 09:18:04','2016-11-28 09:18:04'),
(2,'frans','234af','KTP','Pria','Balige','jln. sisingamangaraja','frans','bisajadi','2016-11-30 02:48:15','2016-11-30 02:48:15'),
(3,'Yan','1124128728','KTP','Pria','laguboti','sjifhisfhsfui','yan','yan','2016-11-30 03:12:57','2016-11-30 03:12:57'),
(4,'test user','24','KTM','Pria','sdf','sdf','apa','apa','2016-12-10 16:12:02','2016-12-10 16:12:02'),
(5,'bernando','1234','SIM','Pria','Medan','tak terhingga','bernando','bernando','2016-12-13 03:21:43','2016-12-13 03:21:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
