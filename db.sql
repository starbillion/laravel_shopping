/*
SQLyog Enterprise Trial - MySQL GUI v7.11 
MySQL - 5.5.5-10.1.26-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cart` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2017_09_28_093821_create_shoppingcart_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `imageurl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`price`,`imageurl`,`created_at`,`updated_at`,`stock`) values (33,'First Product','This is my first product',111.00,'1506573256.jpg','2017-09-26 16:32:14','2017-09-26 16:32:14',10),(34,'Second Product','This is my second product that is good for you. welcome to out market.',180.00,'1506443610.jpg','2017-09-26 16:33:30','2017-09-26 16:33:30',5),(35,'aaaa','ttttttttppppppppppppppppppp',555.00,'1506572871.jpg','2017-09-27 07:47:34','2017-09-27 07:47:34',45),(36,'eqweqw','3wqerew32erwer',234.00,'jpg','2017-09-27 08:05:53','2017-09-27 08:05:53',15),(37,'qqqq','sdasd',111.00,'1506572924.jpg','2017-09-28 03:08:23','2017-09-28 03:08:23',89),(38,'dfgdf','sdfsdfsdfsdfsdf',453.00,'1506573274.jpg','2017-09-28 04:21:05','2017-09-28 04:21:05',9),(39,'vxcv','xcvxcxcvxc',123.00,'1506573237.jpg','2017-09-28 04:33:43','2017-09-28 04:33:43',5),(40,'dsfsdf','sdafasdfsdaaf',2321.00,'1506573315.jpg','2017-09-28 04:35:15','2017-09-28 04:35:15',9),(42,'wewe','dsadasdasdasd',13.00,'1506705819.jpg','2017-09-29 17:23:39','2017-09-29 17:23:39',2);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_temp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`name`,`password`,`password_temp`,`code`,`active`,`remember_token`,`created_at`,`updated_at`) values (49,'pickdollarim@gmail.com','pickdollarim','$2y$10$s54NigU3FUJquU7Ji.ahkuD1frJ6vPd0OdmKkxtc/1lb45jzSN68a',NULL,'',2,'kA61sBdiCviqFv1ZcunFB4y5DU3WV5zEivdAacNYx81hT2pJiafw3nCINhh4','2017-09-24 15:58:20','2017-09-24 16:00:43'),(52,'rainbowtan924@gmail.com','rainbowtan','$2y$10$J7geIGVI1Moh.HuiSGinOuqqEQtqNg0MLmAJ88jaCeOJCZ3FUtYLm',NULL,'',1,NULL,'2017-09-25 14:24:37','2017-09-25 14:25:47'),(54,'aaa@gmail.com','aaaaa','$2y$10$p/aik3zrF9Qtx2p1KdQDX.wlWu9yYVSuZ5CKBVHuywaTE91Cf8Ahm',NULL,'kfoHBF',0,NULL,'2017-09-26 08:32:13','2017-09-26 08:32:13'),(55,'asd@adf.com','asd','$2y$10$6n83fFE.xRHa0it8SfkFeeqShuVaNl/NpvIO6Z2NAVGXPbQLYLsgO',NULL,'58FXJL',0,NULL,'2017-09-26 12:06:49','2017-09-26 12:06:49'),(56,'fasdsd@fasdf.com','dfasdf','$2y$10$dY/EUjw4OhrRQji.XCtj9uFMZXSxz7IfzWMkjfao/7yuj58APGIy2',NULL,'dvUWuB',0,'EhnvgwetLIgUoD71iIcyXWjexZQI02aib0YZOhYMVTYbImPwgoA4dEgbMqSe','2017-09-29 09:29:37','2017-09-29 09:29:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
