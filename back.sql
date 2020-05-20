-- MySQL dump 10.16  Distrib 10.1.44-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: san
-- ------------------------------------------------------
-- Server version	10.1.44-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audits`
--

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` VALUES (1,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"timezone\":null,\"last_login_at\":null,\"last_login_ip\":null}','{\"timezone\":\"America\\/Mexico_City\",\"last_login_at\":\"2020-03-30 09:28:05\",\"last_login_ip\":\"127.0.0.1\"}','http://127.0.0.1:8000/login','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-03-30 09:28:05','2020-03-30 09:28:05'),(2,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-03-30 14:30:53\",\"last_login_ip\":\"187.205.31.115\"}','{\"last_login_at\":\"2020-03-30 10:11:14\",\"last_login_ip\":\"127.0.0.1\"}','http://127.0.0.1:8000/login','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-03-30 10:11:14','2020-03-30 10:11:14'),(3,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-03-30 10:11:14\",\"last_login_ip\":\"127.0.0.1\"}','{\"last_login_at\":\"2020-03-30 16:36:15\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-03-30 16:36:15','2020-03-30 16:36:15'),(4,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-03-30 16:36:15\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-03-30 16:38:55\",\"last_login_ip\":\"201.175.205.225\"}','https://sanjoseuniformes.com/login','201.175.205.225','Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1',NULL,'2020-03-30 16:38:55','2020-03-30 16:38:55'),(5,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-03-30 16:38:55\",\"last_login_ip\":\"201.175.205.225\"}','{\"last_login_at\":\"2020-03-31 10:03:26\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-03-31 10:03:26','2020-03-31 10:03:26'),(6,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-03-31 10:03:26\"}','{\"last_login_at\":\"2020-04-01 09:58:39\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-01 09:58:39','2020-04-01 09:58:39'),(7,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-01 09:58:39\"}','{\"last_login_at\":\"2020-04-01 17:22:53\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-01 17:22:53','2020-04-01 17:22:53'),(8,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-01 17:22:53\"}','{\"last_login_at\":\"2020-04-02 01:26:03\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-02 01:26:03','2020-04-02 01:26:03'),(9,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-02 01:26:03\"}','{\"last_login_at\":\"2020-04-02 18:14:14\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-02 18:14:14','2020-04-02 18:14:14'),(10,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-02 18:14:14\"}','{\"last_login_at\":\"2020-04-03 21:56:20\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-03 21:56:20','2020-04-03 21:56:20'),(11,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-03 21:56:20\"}','{\"last_login_at\":\"2020-04-04 08:37:35\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-04 08:37:35','2020-04-04 08:37:35'),(12,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-04 08:37:35\"}','{\"last_login_at\":\"2020-04-04 08:40:43\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36',NULL,'2020-04-04 08:40:43','2020-04-04 08:40:43'),(13,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-04 08:40:43\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-04-04 10:19:14\",\"last_login_ip\":\"85.203.32.5\"}','https://www.sanjoseuniformes.com/login','85.203.32.5','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0',NULL,'2020-04-04 10:19:14','2020-04-04 10:19:14'),(14,'App\\Models\\Auth\\User',1,'created','App\\Models\\Auth\\User',192,'[]','{\"first_name\":\"Armando\",\"last_name\":\"Reyes\",\"email\":\"sju.armandor@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"5f95d4db-2b34-4506-b513-68941bf24b22\"}','https://www.sanjoseuniformes.com/admin/auth/user','85.203.32.5','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0',NULL,'2020-04-04 10:29:56','2020-04-04 10:29:56'),(15,'App\\Models\\Auth\\User',1,'created','App\\Models\\Auth\\Role',4,'[]','{\"name\":\"cortador\",\"guard_name\":\"web\"}','https://www.sanjoseuniformes.com/admin/auth/role','85.203.32.5','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0',NULL,'2020-04-04 10:32:06','2020-04-04 10:32:06'),(16,'App\\Models\\Auth\\User',1,'created','App\\Models\\Auth\\User',193,'[]','{\"first_name\":\"Ram\\u00f3n\",\"last_name\":\"Martinez\",\"email\":\"sju.ramonm@gmail.com\",\"active\":true,\"confirmed\":true,\"uuid\":\"e400e27d-ad10-453a-a177-8cd339089768\"}','https://www.sanjoseuniformes.com/admin/auth/user','85.203.32.5','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0',NULL,'2020-04-04 10:37:54','2020-04-04 10:37:54'),(17,'App\\Models\\Auth\\User',1,'created','App\\Models\\Auth\\Role',5,'[]','{\"name\":\"bordador\",\"guard_name\":\"web\"}','https://www.sanjoseuniformes.com/admin/auth/role','85.203.32.5','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:74.0) Gecko/20100101 Firefox/74.0',NULL,'2020-04-04 10:39:57','2020-04-04 10:39:57'),(18,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-04 10:19:14\",\"last_login_ip\":\"85.203.32.5\"}','{\"last_login_at\":\"2020-04-07 21:33:55\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36',NULL,'2020-04-07 21:33:55','2020-04-07 21:33:55'),(19,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-07 21:33:55\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-04-12 21:53:55\",\"last_login_ip\":\"187.212.193.253\"}','https://www.sanjoseuniformes.com/login','187.212.193.253','Mozilla/5.0 (Linux; Android 8.1.0; SM-N960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36',NULL,'2020-04-12 21:53:55','2020-04-12 21:53:55'),(20,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-12 21:53:55\",\"last_login_ip\":\"187.212.193.253\"}','{\"last_login_at\":\"2020-04-17 10:52:45\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-17 10:52:45','2020-04-17 10:52:45'),(21,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-17 10:52:45\"}','{\"last_login_at\":\"2020-04-18 10:51:21\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-18 10:51:21','2020-04-18 10:51:21'),(22,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-18 10:51:21\"}','{\"last_login_at\":\"2020-04-20 11:26:06\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-20 11:26:06','2020-04-20 11:26:06'),(23,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-20 11:26:06\"}','{\"last_login_at\":\"2020-04-23 10:42:03\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-23 10:42:03','2020-04-23 10:42:03'),(24,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-23 10:42:03\"}','{\"last_login_at\":\"2020-04-30 16:15:58\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-30 16:15:58','2020-04-30 16:15:58'),(25,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-30 16:15:58\"}','{\"last_login_at\":\"2020-04-30 19:47:21\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-04-30 19:47:21','2020-04-30 19:47:21'),(26,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-04-30 19:47:21\"}','{\"last_login_at\":\"2020-05-02 16:39:10\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-05-02 16:39:10','2020-05-02 16:39:10'),(27,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-02 16:39:10\"}','{\"last_login_at\":\"2020-05-04 10:37:14\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (Linux; Android 9; SM-A207M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.117 Mobile Safari/537.36',NULL,'2020-05-04 10:37:14','2020-05-04 10:37:14'),(28,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-04 10:37:14\"}','{\"last_login_at\":\"2020-05-04 18:38:54\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-05-04 18:38:55','2020-05-04 18:38:55'),(29,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-04 18:38:54\"}','{\"last_login_at\":\"2020-05-05 10:53:38\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-05-05 10:53:38','2020-05-05 10:53:38'),(30,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-05 10:53:38\"}','{\"last_login_at\":\"2020-05-06 10:07:12\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.92 Safari/537.36',NULL,'2020-05-06 10:07:12','2020-05-06 10:07:12'),(31,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-06 10:07:12\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-08 14:50:15\",\"last_login_ip\":\"187.205.29.33\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-08 14:50:15','2020-05-08 14:50:15'),(32,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-08 14:50:15\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-09 08:49:04\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-09 08:49:04','2020-05-09 08:49:04'),(33,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-09 08:49:04\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-09 09:34:30\",\"last_login_ip\":\"187.205.29.33\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-09 09:34:30','2020-05-09 09:34:30'),(34,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-09 09:34:30\"}','{\"last_login_at\":\"2020-05-09 10:42:36\"}','https://sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36',NULL,'2020-05-09 10:42:36','2020-05-09 10:42:36'),(35,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-09 10:42:36\"}','{\"last_login_at\":\"2020-05-09 11:55:40\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-09 11:55:40','2020-05-09 11:55:40'),(36,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-09 11:55:40\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-09 19:50:37\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-09 19:50:38','2020-05-09 19:50:38'),(37,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-09 19:50:37\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-10 19:19:31\",\"last_login_ip\":\"201.175.203.103\"}','https://www.sanjoseuniformes.com/login','201.175.203.103','Mozilla/5.0 (Linux; Android 8.1.0; SM-N960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Mobile Safari/537.36',NULL,'2020-05-10 19:19:31','2020-05-10 19:19:31'),(38,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-10 19:19:31\",\"last_login_ip\":\"201.175.203.103\"}','{\"last_login_at\":\"2020-05-11 09:24:31\",\"last_login_ip\":\"187.205.29.33\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-11 09:24:31','2020-05-11 09:24:31'),(39,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-11 09:24:31\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-12 12:08:30\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-12 12:08:30','2020-05-12 12:08:30'),(40,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-12 12:08:30\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-12 14:54:40\",\"last_login_ip\":\"187.205.29.33\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-12 14:54:40','2020-05-12 14:54:40'),(41,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-12 14:54:40\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-12 23:18:26\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-12 23:18:26','2020-05-12 23:18:26'),(42,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-12 23:18:26\"}','{\"last_login_at\":\"2020-05-14 12:52:26\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-14 12:52:26','2020-05-14 12:52:26'),(43,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-14 12:52:26\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-16 11:41:58\",\"last_login_ip\":\"187.205.29.33\"}','https://sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-16 11:41:58','2020-05-16 11:41:58'),(44,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-16 11:41:58\"}','{\"last_login_at\":\"2020-05-16 11:55:48\"}','https://sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-16 11:55:48','2020-05-16 11:55:48'),(45,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-16 11:55:48\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-16 12:05:45\",\"last_login_ip\":\"85.203.32.4\"}','https://www.sanjoseuniformes.com/login','85.203.32.4','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-16 12:05:45','2020-05-16 12:05:45'),(46,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-16 12:05:45\",\"last_login_ip\":\"85.203.32.4\"}','{\"last_login_at\":\"2020-05-19 11:27:44\",\"last_login_ip\":\"187.205.29.33\"}','https://www.sanjoseuniformes.com/login','187.205.29.33','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:76.0) Gecko/20100101 Firefox/76.0',NULL,'2020-05-19 11:27:44','2020-05-19 11:27:44'),(47,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-19 11:27:44\",\"last_login_ip\":\"187.205.29.33\"}','{\"last_login_at\":\"2020-05-19 19:16:30\",\"last_login_ip\":\"201.163.10.205\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-19 19:16:30','2020-05-19 19:16:30'),(48,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-19 19:16:30\"}','{\"last_login_at\":\"2020-05-20 02:01:29\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-20 02:01:29','2020-05-20 02:01:29'),(49,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-20 02:01:29\"}','{\"last_login_at\":\"2020-05-20 11:12:45\"}','https://sanjoseuniformes.com/login','201.163.10.205','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-20 11:12:45','2020-05-20 11:12:45'),(50,'App\\Models\\Auth\\User',1,'updated','App\\Models\\Auth\\User',1,'{\"last_login_at\":\"2020-05-20 06:12:45\",\"last_login_ip\":\"201.163.10.205\"}','{\"last_login_at\":\"2020-05-20 11:50:21\",\"last_login_ip\":\"127.0.0.1\"}','http://127.0.0.1:8000/login','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36',NULL,'2020-05-20 16:50:21','2020-05-20 16:50:21');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boms`
--

DROP TABLE IF EXISTS `boms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `material_id` int(10) unsigned NOT NULL,
  `quantity` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boms`
--

LOCK TABLES `boms` WRITE;
/*!40000 ALTER TABLE `boms` DISABLE KEYS */;
INSERT INTO `boms` VALUES (3,2,23,1.2,'2020-03-20 10:11:38','2020-03-20 10:11:38'),(4,2,149,0.8,'2020-03-20 10:16:03','2020-03-20 10:16:03'),(5,2,165,0.004,'2020-03-20 10:17:49','2020-03-20 10:17:49');
/*!40000 ALTER TABLE `boms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  UNIQUE KEY `cache_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_sale`
--

DROP TABLE IF EXISTS `cart_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_sale` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` mediumint(8) unsigned DEFAULT NULL,
  `cart_id` mediumint(8) unsigned DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_sale_sale_id_foreign` (`sale_id`),
  CONSTRAINT `cart_sale_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_sale`
--

LOCK TABLES `cart_sale` WRITE;
/*!40000 ALTER TABLE `cart_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `audi_id` mediumint(8) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `color_size_product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Playeras','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(2,'Pantalones','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(3,'Camisas','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(4,'Mandiles','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cloths`
--

DROP TABLE IF EXISTS `cloths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cloths` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cloths`
--

LOCK TABLES `cloths` WRITE;
/*!40000 ALTER TABLE `cloths` DISABLE KEYS */;
INSERT INTO `cloths` VALUES (1,'Praga','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(2,'Oslo','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(3,'Filare','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(4,'Venecia','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(5,'Milan','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(6,'Torino','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(7,'Niza','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(8,'Lucca','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(9,'Florencia','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(10,'Toscana','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(11,'Capri','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(12,'Napoles','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(13,'Mezclilla','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(14,'Oxford','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(15,'Premium','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(16,'Gabardina','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(17,'Mil Rayas','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(18,'Mezclilla Elite','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(19,'Dry','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(20,'Elite','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(21,'Dinamo','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(22,'Cambridge','2020-02-19 10:57:39','2020-02-19 10:57:39',NULL),(23,'Diamante','2020-02-19 10:57:52','2020-02-19 10:57:52',NULL),(24,'Uniforme','2020-02-19 10:58:22','2020-02-19 10:58:22',NULL),(25,'Borus','2020-02-19 10:59:00','2020-02-19 10:59:00',NULL),(26,'Atenas','2020-02-19 10:59:08','2020-02-19 10:59:08',NULL),(27,'Manchester','2020-02-19 10:59:22','2020-02-19 10:59:22',NULL),(28,'Popelina','2020-02-19 10:59:51','2020-02-19 10:59:51',NULL),(29,'Pique 1 frontura','2020-02-19 11:00:06','2020-02-19 11:00:06',NULL),(30,'Pique 2 fronturas','2020-02-19 11:00:21','2020-02-19 11:00:21',NULL),(31,'Flipol','2020-02-19 11:00:34','2020-02-19 11:00:34',NULL),(32,'Millenium','2020-02-19 11:00:50','2020-02-19 11:00:50',NULL);
/*!40000 ALTER TABLE `cloths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color_size_product`
--

DROP TABLE IF EXISTS `color_size_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color_size_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `color_id` mediumint(8) unsigned DEFAULT NULL,
  `size_id` smallint(5) unsigned DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `color_size_product_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color_size_product`
--

LOCK TABLES `color_size_product` WRITE;
/*!40000 ALTER TABLE `color_size_product` DISABLE KEYS */;
INSERT INTO `color_size_product` VALUES (1,NULL,2,1,18,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(2,NULL,2,1,19,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(3,NULL,2,1,20,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(4,NULL,2,1,21,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(5,NULL,2,1,22,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(6,NULL,2,1,23,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(7,NULL,2,1,24,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(8,NULL,2,1,25,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(9,NULL,2,2,18,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(10,NULL,2,2,19,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(11,NULL,2,2,20,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(12,NULL,2,2,21,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(13,NULL,2,2,22,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(14,NULL,2,2,23,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(15,NULL,2,2,24,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(16,NULL,2,2,25,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(17,NULL,2,12,18,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(18,NULL,2,12,19,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(19,NULL,2,12,20,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(20,NULL,2,12,21,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(21,NULL,2,12,22,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(22,NULL,2,12,23,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(23,NULL,2,12,24,0,129.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(24,NULL,2,12,25,0,149.6,'2020-03-20 10:22:25','2020-03-20 10:22:25',NULL),(25,NULL,58,92,41,0,285,'2020-05-09 12:56:15','2020-05-09 12:56:15',NULL),(26,NULL,58,92,42,0,285,'2020-05-09 12:56:15','2020-05-09 12:56:15',NULL),(27,NULL,58,2,41,0,285,'2020-05-09 12:56:15','2020-05-09 12:56:15',NULL),(28,NULL,58,2,42,0,285,'2020-05-09 12:56:15','2020-05-09 12:56:15',NULL),(29,NULL,60,1,47,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(30,NULL,60,1,49,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(31,NULL,60,1,20,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(32,NULL,60,1,21,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(33,NULL,60,1,22,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(34,NULL,60,1,23,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(35,NULL,60,1,24,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(36,NULL,60,1,25,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(37,NULL,60,1,26,10,0.25,'2020-05-19 13:45:21','2020-05-19 13:45:21',NULL),(38,NULL,61,1,40,10,0.25,'2020-05-19 13:52:46','2020-05-19 13:52:46',NULL),(39,NULL,59,1,41,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(40,NULL,59,1,43,4,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(41,NULL,59,1,17,4,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(42,NULL,59,1,18,4,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(43,NULL,59,1,49,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(44,NULL,59,2,41,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(45,NULL,59,2,43,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(46,NULL,59,2,17,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(47,NULL,59,2,18,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(48,NULL,59,2,49,1,121,'2020-05-19 14:06:02','2020-05-19 14:06:02',NULL),(49,NULL,62,2,1,977,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(50,NULL,62,2,2,2847,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(51,NULL,62,2,3,3658,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(52,NULL,62,2,4,4751,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(53,NULL,62,2,5,1281,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(54,NULL,62,2,15,1020,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL),(55,NULL,62,2,16,540,0.65,'2020-05-19 14:15:53','2020-05-19 14:15:53',NULL);
/*!40000 ALTER TABLE `color_size_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'Blanco','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(2,'Negro','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(3,'Chocolate','2020-02-05 10:37:12','2020-02-22 13:17:10',NULL),(4,'Kakhi','2020-02-05 10:37:12','2020-02-22 13:17:28',NULL),(5,'Azul marino','2020-02-05 10:37:12','2020-02-22 13:17:39',NULL),(6,'Azul cielo','2020-02-05 10:37:12','2020-02-22 13:18:18',NULL),(7,'Rosa','2020-02-05 10:37:12','2020-02-22 13:18:33',NULL),(8,'Uva','2020-02-05 10:37:12','2020-02-22 13:35:31',NULL),(9,'Verde botella','2020-02-05 10:37:12','2020-02-22 13:35:43',NULL),(10,'Verde bandera','2020-02-05 10:37:12','2020-02-22 13:35:56',NULL),(11,'Azul rey','2020-02-05 10:37:12','2020-02-22 13:36:08',NULL),(12,'Azul acero','2020-02-05 10:37:12','2020-02-22 13:36:19',NULL),(13,'Mango','2020-02-22 13:36:41','2020-02-22 13:36:41',NULL),(14,'Rojo','2020-02-22 13:36:49','2020-02-22 13:36:49',NULL),(15,'Naranja','2020-02-22 13:36:59','2020-02-22 13:36:59',NULL),(16,'Violeta','2020-02-22 13:37:07','2020-02-22 13:37:07',NULL),(17,'Morado','2020-02-22 13:37:16','2020-02-22 13:37:16',NULL),(18,'Olivo','2020-02-22 13:37:25','2020-02-22 13:37:25',NULL),(19,'Mandarina','2020-02-22 13:37:34','2020-02-22 13:37:34',NULL),(20,'Aqua','2020-02-22 13:37:50','2020-02-22 13:37:50',NULL),(21,'Paja','2020-02-22 13:37:58','2020-02-22 13:37:58',NULL),(22,'Turquesa','2020-02-22 13:38:06','2020-02-22 13:38:06',NULL),(23,'Lila','2020-02-22 13:39:27','2020-02-22 13:39:27',NULL),(24,'Grecia','2020-02-22 13:39:38','2020-02-22 13:39:38',NULL),(25,'Océano','2020-02-22 13:39:58','2020-02-22 13:39:58',NULL),(26,'Indigo','2020-02-22 13:40:05','2020-02-22 13:40:05',NULL),(27,'Stone','2020-02-22 13:40:13','2020-02-22 13:40:13',NULL),(28,'Stone medio','2020-02-22 13:40:22','2020-02-22 13:40:22',NULL),(29,'Platino','2020-02-22 13:40:32','2020-02-22 13:40:32',NULL),(30,'Beige','2020-02-22 13:40:41','2020-02-22 13:40:41',NULL),(31,'Gris oxford','2020-02-22 13:40:49','2020-02-22 13:40:49',NULL),(32,'Gris plata','2020-02-22 13:41:03','2020-02-22 13:41:03',NULL),(33,'Gris jaspe','2020-02-22 13:41:45','2020-02-22 13:41:45',NULL),(34,'Oro','2020-02-22 13:41:53','2020-02-22 13:41:53',NULL),(35,'Verde limon','2020-02-22 13:42:05','2020-02-22 13:42:05',NULL),(36,'Verde lima','2020-02-22 13:42:13','2020-02-22 13:42:13',NULL),(37,'verde militar','2020-02-22 13:42:19','2020-02-22 13:42:19',NULL),(38,'naranja texas','2020-02-22 13:42:26','2020-02-22 13:42:26',NULL),(39,'fucsia','2020-02-22 13:42:50','2020-02-22 13:42:50',NULL),(40,'Verde pasto','2020-02-22 13:43:01','2020-02-22 13:43:01',NULL),(41,'Rojo cardenal','2020-02-22 13:43:28','2020-02-22 13:43:28',NULL),(42,'Vino','2020-02-22 13:43:35','2020-02-22 13:43:35',NULL),(43,'Ladrillo','2020-02-22 13:43:43','2020-02-22 13:43:43',NULL),(44,'Jaspe oscuro','2020-02-22 13:43:51','2020-02-22 13:43:51',NULL),(45,'Verde seguridad','2020-02-22 13:43:58','2020-02-22 13:43:58',NULL),(46,'Naranja seguridad','2020-02-22 13:44:06','2020-02-22 13:44:06',NULL),(47,'Azul carolina','2020-02-22 13:44:14','2020-02-22 13:44:14',NULL),(48,'Rojo brillante o cereza','2020-02-22 13:44:24','2020-02-22 13:44:24',NULL),(49,'Gris grava','2020-02-22 13:44:31','2020-02-22 13:44:31',NULL),(50,'Pistache','2020-02-22 13:44:38','2020-02-22 13:44:38',NULL),(51,'Heather orange','2020-02-22 13:45:01','2020-02-22 13:45:01',NULL),(52,'Amarillo','2020-02-22 13:45:09','2020-02-22 13:45:09',NULL),(53,'Amarillo Fluor','2020-02-22 13:45:22','2020-02-22 13:45:22',NULL),(54,'Royal','2020-02-22 13:45:28','2020-02-22 13:45:28',NULL),(55,'Azul celeste','2020-02-22 13:45:35','2020-02-22 13:45:35',NULL),(56,'Verde manzana','2020-02-22 13:45:43','2020-02-22 13:45:43',NULL),(57,'Verde flúor','2020-02-22 13:45:56','2020-02-22 13:45:56',NULL),(58,'Marrón','2020-02-22 13:46:03','2020-02-22 13:46:03',NULL),(59,'Salmón','2020-02-22 13:46:14','2020-02-22 13:46:14',NULL),(60,'Purpura','2020-02-22 13:46:24','2020-02-22 13:46:24',NULL),(61,'Rosa flúor','2020-02-22 13:46:31','2020-02-22 13:46:31',NULL),(62,'Palo de rosa','2020-02-22 13:46:36','2020-02-22 13:46:36',NULL),(63,'Carbón','2020-02-22 13:46:43','2020-02-22 13:46:43',NULL),(64,'Arena','2020-02-22 13:46:48','2020-02-22 13:46:48',NULL),(65,'Cobalto','2020-02-22 13:46:54','2020-02-22 13:46:54',NULL),(66,'Marino con blanco','2020-02-22 13:47:04','2020-02-22 13:47:04',NULL),(67,'Rojo con blanco','2020-02-22 13:47:11','2020-02-22 13:47:11',NULL),(68,'Rojo con azul','2020-02-22 13:47:18','2020-02-22 13:47:18',NULL),(69,'Negro con blanco','2020-02-22 13:47:28','2020-02-22 13:47:28',NULL),(70,'Gris con negro','2020-02-22 13:47:37','2020-02-22 13:47:37',NULL),(71,'Rey con blanco','2020-02-22 13:47:43','2020-02-22 13:47:43',NULL),(72,'Amarillo con rey','2020-02-22 13:47:50','2020-02-22 13:47:50',NULL),(73,'Kakhi con vino','2020-02-22 13:48:02','2020-02-22 13:48:02',NULL),(74,'Negro con rosa','2020-02-22 13:48:09','2020-02-22 13:48:09',NULL),(75,'Gris con amarillo','2020-02-22 13:48:18','2020-02-22 13:48:18',NULL),(76,'Camuflaje verde','2020-02-22 13:48:25','2020-02-22 13:48:25',NULL),(77,'Camuflaje kakhi','2020-02-22 13:48:35','2020-02-22 13:48:35',NULL),(78,'Jade','2020-02-22 13:48:41','2020-02-22 13:48:41',NULL),(79,'Camuflaje blanco','2020-02-22 13:48:51','2020-02-22 13:48:51',NULL),(80,'Camuflaje rojo','2020-02-22 13:48:59','2020-02-22 13:48:59',NULL),(81,'Camuflaje naranja','2020-02-22 13:49:48','2020-02-22 13:49:48',NULL),(82,'Camuflaje azul','2020-02-22 13:49:55','2020-02-22 13:49:55',NULL),(83,'Camuflaje','2020-02-22 13:50:06','2020-02-22 13:50:06',NULL),(84,'Verde jaspe','2020-02-22 13:50:13','2020-02-22 13:50:13',NULL),(85,'Amarillo con verde','2020-02-22 13:50:21','2020-02-22 13:50:21',NULL),(86,'Marino con gris','2020-02-22 13:50:29','2020-02-22 13:50:29',NULL),(87,'Azul jaspe','2020-02-22 13:50:36','2020-02-22 13:50:36',NULL),(88,'Naranja jaspe','2020-02-22 13:50:45','2020-02-22 13:50:45',NULL),(89,'Verde irlandes','2020-02-22 13:50:53','2020-02-22 13:50:53',NULL),(90,'Rojo con jaspe','2020-02-22 13:51:01','2020-02-22 13:51:01',NULL),(91,'Coral','2020-02-22 13:51:07','2020-02-22 13:51:07',NULL),(92,'café','2020-02-24 12:03:05','2020-02-24 12:03:05',NULL),(93,'Esmeralda','2020-03-03 00:56:14','2020-03-03 00:56:14',NULL),(94,'Espuma','2020-03-03 00:59:56','2020-03-03 00:59:56',NULL),(95,'Rosa pálido','2020-03-03 01:03:56','2020-03-03 01:03:56',NULL),(96,'Verde seco','2020-03-03 01:13:33','2020-03-03 01:13:33',NULL),(97,'Tinto','2020-03-03 01:23:54','2020-03-03 01:23:54',NULL),(98,'Naranja Fluor','2020-03-03 01:28:10','2020-03-03 01:28:10',NULL),(99,'Plata','2020-03-10 12:40:11','2020-03-10 12:40:11',NULL),(100,'Oro','2020-03-10 12:41:25','2020-03-10 12:41:25',NULL),(101,'Naranja Plata','2020-03-10 12:58:11','2020-03-10 12:58:11',NULL),(102,'Verde Plata','2020-03-10 12:58:24','2020-03-10 12:58:24',NULL),(103,'Amarillo Plata','2020-03-10 12:58:38','2020-03-10 12:58:38',NULL),(104,'Blanco y marino','2020-03-10 13:02:51','2020-03-10 13:02:51',NULL),(105,'Transparente','2020-03-10 13:06:10','2020-03-10 13:06:10',NULL),(106,'Tabaco','2020-03-10 13:37:42','2020-03-10 13:37:42',NULL),(107,'Shedron','2020-03-10 13:40:10','2020-03-10 13:40:10',NULL),(108,'Verde','2020-03-20 09:34:28','2020-03-20 09:34:31','2020-03-20 09:34:31');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_user_id_foreign` (`user_id`),
  CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,5,NULL,NULL,'ASI020730PU7','Cafetal #399B Col. Granjas, C.P. 08400 Iztacalco, Ciudad De México',NULL,NULL),(2,6,NULL,NULL,'ACI981010BG9','Luis Moreno #520 , C.P. 47470 Lagos De Moreno, Jalisco',NULL,'2020-02-05 11:17:30'),(3,7,NULL,NULL,'AMM141007FN2','Avenida Cazcanes #2210 Col. Parque Industrial Colinas De Lagos, C.P. 47515 Lagos De Moreno, Jalisco',NULL,NULL),(4,8,NULL,NULL,'ACO1406244G3','Jose Becerra #557 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(5,9,NULL,NULL,'ADL9711247B4','Rio Papaloapan #113 Col. Arquitos Queretaro, C.P. 76050 Queretaro, Queretaro',NULL,NULL),(6,10,NULL,NULL,'ANS030714176','Juventino Rosas #118 Col. La Martinica, C.P. 47020 San Juan De Los Lagos, Jalisco',NULL,NULL),(7,11,NULL,NULL,'ASU8409142U8','Carretera Lagos - Leon Km 1  Col. Cañada De Ricos, C.P. 47450 Lagos De Moreno, Jalisco',NULL,NULL),(8,12,NULL,NULL,'AST890609EK0','Juventino Rosas #10 Col. La Martinica, C.P. 47020 San Juan De Los Lagos, Jalisco',NULL,NULL),(9,13,NULL,NULL,'AAO110211FZ6','Blvd. Felix Ramirez Renteria #1492 Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(10,14,NULL,NULL,'ALA120309NC7','Av. El Conalep #150 , C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(11,15,NULL,NULL,'MUAA690126SF4','Encino #280 Col. Lomas Del Valle, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(12,16,NULL,NULL,'EORA7004284Z4','Hidalgo #494 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(13,17,NULL,NULL,'ABO950601EQ3','Francisco Javier Nuño #83 A Col. Centro, C.P. 47000 San Juan De Los Lagos, Jalisco',NULL,NULL),(14,18,NULL,NULL,'ACO941018225','Loma De Prados #1332 Col. La Marimba, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(15,19,NULL,NULL,'APN000704681','Blvd. Diaz Ordaz #693-A Col. El Herrero, C.P. 47030 San Juan De Los Lagos, Jalisco',NULL,NULL),(16,20,NULL,NULL,'AME100806LD2','Calle Cooperacion #23 Col. La Joya Parque Industrial, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(17,21,NULL,NULL,'POGA711007F61','Agustin Rivera #350 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(18,22,NULL,NULL,'TOAA701012FB6','Hidalgo #611 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(19,23,NULL,NULL,'BABA7202236H0','Republica #429 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(20,24,NULL,NULL,'RACA870316KN4','Libramiento Norte #2883 Col. Fte. Colonia Tepeyac, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(21,25,NULL,NULL,'AAM971203ND5','Blvd. Orozco Y Jiménez #2306 Col. Los Jacales,  Lagos De Moreno, Jalisco',NULL,NULL),(22,26,NULL,NULL,'AEA031125142','Blvd. Felix Ramirez Renteria #931 Col. Pueblo De Moya, C.P. 47430 Lagos De Moreno, Jalisco',NULL,NULL),(23,27,NULL,NULL,'ATV9207103R3','Juan Pablo Anaya #462 Col. Alcaldes, C.P. 47474 Lagos De Moreno, Jalisco',NULL,NULL),(24,28,NULL,NULL,'ADE011218G72','Lasallistas #122 Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(25,29,NULL,NULL,'APA9606197Q8','Blvd. Diaz Ordaz #620 Col. Nuevo San Juan, C.P. 47040 San Juan De Los Lagos, Jalisco',NULL,NULL),(26,30,NULL,NULL,'ADE140530G64','Francisco I. Madero #644 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(27,31,NULL,NULL,'CULB890506MX9','Tlaxcaltecas #18 Col. La Laguna, C.P. 47510 Lagos De Moreno, Jalisco',NULL,NULL),(28,32,NULL,NULL,'CGU8712024W9','Margarito Gonzalez Rubio #888 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(29,33,NULL,NULL,'GOOC921218UH5','Don Luis Moya #542 ,  Lagos De Moreno, Jalisco',NULL,NULL),(30,34,NULL,NULL,'DUCC821109471','15 De Septiembre #14 Col. San Miguel 2, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(31,35,NULL,NULL,'AAMC7011078G9','Carr. A San Juan Km. 7  , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(32,36,NULL,NULL,'CVA090710259','Calle Cooperacion #23 Col. La Joya Parque Industrial, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(33,37,NULL,NULL,'GAJC760926V3A','Orozco Y Jimenez #1731 Col. La Aurora, C.P. 47473 Lagos De Moreno, Jalisco',NULL,NULL),(34,38,NULL,NULL,'CCL850209BS3','Camino Al Puesto Km. 2 #S/N , C.P. 47425 Lagos De Moreno, Jalisco',NULL,NULL),(35,39,NULL,NULL,'COL630902EH5','Agustin Rivera #25 Norte Col. El Calvario, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(36,40,NULL,NULL,'CTA9305173K4','Blvd. Teresa De Avila #200 , C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(37,41,NULL,NULL,'CSC9801289U7','Rio Suchiate  Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(38,42,NULL,NULL,'CAS9009216K0','Felix Ramirez Renteria #1490 Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(39,43,NULL,NULL,'CTP120529UH9','Platon #27 Col. Santa Elena, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(40,44,NULL,NULL,'CLA870525B51','Felix Ramirez Renteria #1498 Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(41,45,NULL,NULL,'CMB0210103D5','Av. Ferrocarril Moctezuma 2Da Seccion  Col. Deleg. Venustiano Carranza, C.P. 15530 Venustiano Carranza, Ciudad De México',NULL,NULL),(42,46,NULL,NULL,'CSL970617TP5','Eutiquia Medina #640 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(43,47,NULL,NULL,'CAZ121114N17','Francisco I. Madero #644 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(44,48,NULL,NULL,'CON040206Q16','Ramon Corona #344 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(45,49,NULL,NULL,'CPA120910AAA','Nuestra Señora De San Juan #46 Col. Laureles Del Campanario, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(46,50,NULL,NULL,'MEAD6607039G4','Calle Colon #334 Col. Santa Anita, C.P. 45600 Tlaquepaque, Jalisco',NULL,NULL),(47,51,NULL,NULL,'DDL0902122N5','Padre Torres #585 Col. La Otra Banda, C.P. 47490 Lagos De Moreno, Jalisco',NULL,NULL),(48,52,NULL,NULL,'GUMD931220DU1','Boulevard Orozco Y Jiménez #209-4 Col. El Refugio, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(49,53,NULL,NULL,'DAL9707143N9','Libramiento Norte #1270 Col. Granadillas, C.P. 47433 Lagos De Moreno, Jalisco',NULL,NULL),(50,54,NULL,NULL,'DIL080905L67','Carretera A Colombia #502 Col. Los Altos, C.P. 66052 Gral. Escobedo, Nuevo Leon',NULL,NULL),(51,55,NULL,NULL,'DBC040909524','Block A Bodega 44 Central De Abastos  ,  Aguascalientes, Aguascalientes',NULL,NULL),(52,56,NULL,NULL,'EME151217KI4','Av.Villa De Lagos Sur #1080 , C.P. 47515 Lagos De Moreno, Jalisco',NULL,NULL),(53,57,NULL,NULL,'SSA011124UB9','Sauz Amarillo #1 Col. El Arenal, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(54,58,NULL,NULL,'EBS9204056N0','Pino Suarez #210 Col. Centro, C.P. 47280 Encarnacion De Diaz, Jalisco',NULL,NULL),(55,59,NULL,NULL,'EJA0502168B4','Carret Al Puesto Km 6  , C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(56,60,NULL,NULL,'CASE290414166','Km. 12 Carretera Lagos De Moreno A San Juan De Los Lagos  Col. Rancho Los Fresnos, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(57,61,NULL,NULL,'AUME7305037M0','Carretera Panamericana S/N  Col. Pueblo De Moya, C.P. 47430 Lagos De Moreno, Jalisco',NULL,NULL),(58,62,NULL,NULL,'OIMF8506267LA','Rio Nazas #85 Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(59,63,NULL,NULL,'FLO050504TJ8','De La Oracion #105 Col. Los Gavilanes, C.P. 37270 Leon, Guanajuato',NULL,NULL),(60,64,NULL,NULL,'HETF5108262IA','Ave. Tepetate #3 , C.P. 47450 Lagos De Moreno, Jalisco',NULL,NULL),(61,65,NULL,NULL,'EORF680311D92','Carr. Rancho Santa Ines Km 2  , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(62,66,NULL,NULL,'CAHF810424E82','Av Santiago Mendez Bravo #39 Col. Laureles Del Campanario, C.P. 47483 Lagos De Moreno, Jalisco',NULL,NULL),(63,67,NULL,NULL,'LILF660113NP6','Limon #48 Col. Huertos Familiares San Pedro, C.P. 47472 Lagos De Moreno, Jalisco',NULL,NULL),(64,68,NULL,NULL,'FAG910730KH6','Blvd Orozco Y Jimenez #13 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(65,69,NULL,NULL,'FLO980123PB4','Blvd Orozco Y Jimenez #1020 Col. Camino Real, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(66,70,NULL,NULL,'FHE020220121','Blvd: Orozco Y Jimenez #490 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(67,71,NULL,NULL,'CAL890719JX1','Carretera A Lagos Km2  Col. El Herrero, C.P. 47030 San Juan De Los Lagos, Jalisco',NULL,NULL),(68,72,NULL,NULL,'FIN101130S16','Lasallistas #122 , C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(69,73,NULL,NULL,'FSE150722FN0','Maricopa #28 Col. Napoles, C.P. 03810 Benito Juarez, Ciudad De México',NULL,NULL),(70,74,NULL,NULL,'GAJF560207919','Juan Aldana #474 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(71,75,NULL,NULL,'FFS0511032S9','Cooperacion #23 Col. La Joya Parque Industrial, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(72,76,NULL,NULL,'MOPG640201E95','Lic. Verdad #294 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(73,77,NULL,NULL,'GAG1604073A8','Ignacio Rosales #39 Col. Centro, C.P. 47000 San Juan De Los Lagos, Jalisco',NULL,NULL),(74,78,NULL,NULL,'GRI910823EN0','Paseo De La Rivera #101 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(75,79,NULL,NULL,'GEN070719BU7','Carretera Libramiento Norte #8970 Col. Torrecillas, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(76,80,NULL,NULL,'GAM131009G14','Colon #334 Col. Santa Anita, C.P. 45600 Tlaquepaque, Jalisco',NULL,NULL),(77,81,NULL,NULL,'GIS100715P13','Hernando De Martel #52 Col. La Luz, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(78,82,NULL,NULL,'GJH131209T45','Abraham Vega #348 Col. Alcaldes, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(79,83,NULL,NULL,'GOG050121FU1','Bernardo Cossin #776 Col. El Tepeyac, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(80,84,NULL,NULL,'GSE1304125F7','Periférico Manuel Gómez Morin #4001-D Col. Ciudad Granja, C.P. 45010 Zapopan, Jalisco',NULL,NULL),(81,85,NULL,NULL,'AOSH740823AI5','Cedro #136 Col. Lomas Del Valle, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(82,86,NULL,NULL,'HRL801013QD2','Jardin Hidalgo #574 Col. San Felipe, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(83,87,NULL,NULL,'HEWH700307A73','Morelos #157 Col. La Adelita, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(84,88,NULL,NULL,'GOMH801123VC8','Santa Cecilia #43 Col. Santa Elena, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(85,89,NULL,NULL,'ILA681101NW0','Nicolas Bravo #834 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(86,90,NULL,NULL,'INE140404NI0','Av. Lopez Mateos Norte #1066 Col. Col. Ladrón De Guevara, C.P. 44600 Guadalajara, Jalisco',NULL,NULL),(87,91,NULL,NULL,'ITJ160824UV2','Rinconada Del Agua #2811 Col. Rinconada Del Bosque, C.P. 44530 Guadalajara, Jalisco',NULL,NULL),(88,92,NULL,NULL,'ITS000609K11','Libramiento Tecnologico #5000 Col. Portugalejo De Los Romanes, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(89,93,NULL,NULL,'ICS0404237U7','Carr A San Juan De Los Lagos Km 1  Col. La Aurora, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(90,94,NULL,NULL,'ISE000922UJ5','Lasallistas #122 Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(91,95,NULL,NULL,'ICO970102HN4','Av. 39 Poniente #2907 Col. Las Animas, C.P. 72400 Puebla, Puebla',NULL,NULL),(92,96,NULL,NULL,'COLJ741010SE1','Topacio #227 Col. Colinas De San Javier, C.P. 47463 Lagos De Moreno, Jalisco',NULL,NULL),(93,97,NULL,NULL,'ZEAJ581113K84','Hidalgo #625-14A Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(94,98,NULL,NULL,'SOHJ5608177B5','Agustin Padilla #449 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(95,99,NULL,NULL,'AAGJ5112094S9','Nicolas Bravo #10 Col. Viborillas, C.P. 47270 Encarnacion De Diaz, Jalisco',NULL,NULL),(96,100,NULL,NULL,'GUMJ891015GFA','Boulevard Orozco Y Jiménez #209-3 Col. El Refugio, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(97,101,NULL,NULL,'MOGA750125SA3','Martin Diaz  Col. Cañada De Ricos, C.P. 47450 Lagos De Moreno, Jalisco',NULL,NULL),(98,102,NULL,NULL,'CAVJ6511086P7','Cerro De La Bufa #322 Col. Bosques Del Prado, C.P. 20020 Aguascalientes, Aguascalientes',NULL,NULL),(99,103,NULL,NULL,'MUHJ720609J86','Topacio #247 Col. Colinas De San Javier, C.P. 47463 Lagos De Moreno, Jalisco',NULL,NULL),(100,104,NULL,NULL,'RAMJ681025848','Agustin Rivera #368 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(101,105,NULL,NULL,'ROSE720904FC1','Ciruela #119 Col. Las Huertitas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(102,106,NULL,NULL,'GACF6608145G8','Carretera Lagos La Union #Km 2-A Col. El Arenal, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(103,107,NULL,NULL,'GUGG411027EX7','Zaragoza #465 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(104,108,NULL,NULL,'GUML720925D17','Manuel Avila Camacho #47 Col. Vista Hermosa, C.P. 47532 Lagos De Moreno, Jalisco',NULL,NULL),(105,109,NULL,NULL,'RORT690406677','Carr. Lagos - San Luis Potosi Km. 12.5 #S/N , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(106,110,NULL,NULL,'GUMJ690920U89','Santa Monica #40 Col. Los Chirlitos, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(107,111,NULL,NULL,'ROMJ5209144Q0','Lasallistas #122 Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(108,112,NULL,NULL,'DECJ821104AM8','Ejido Lagos #112 Col. Plan De Los Rodriguez, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(109,113,NULL,NULL,'ZEQK770607AC8','Hermion Larios #830 Col. San Felipe, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(110,114,NULL,NULL,'BARK9102152A1','Tlacopan #809 Col. Santa Maria De Granjeno, C.P. 37520 Leon, Guanajuato',NULL,NULL),(111,115,NULL,NULL,'KML130109SJ2','Tamaulipas #80 Col. La Adelita, C.P. 47432 Lagos De Moreno, Jalisco',NULL,NULL),(112,116,NULL,NULL,'LGA870615TWA','Camino A La Higuera #S/N Col. El Charco, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(113,117,NULL,NULL,'LGO870615986','Blvd. Orozco Y Jimenez #2802 Col. Huertos Familiares San Pedro, C.P. 47472 Lagos De Moreno, Jalisco',NULL,NULL),(114,118,NULL,NULL,'LJU9210027NA','Carretera Union San Diego Km1 # , C.P. 47570 Union De San Antonio, Jalisco',NULL,NULL),(115,119,NULL,NULL,'LTR1410311A8','Prolongacion Nicolas Bravo #2273 Col. Alvarez Del Castillo, C.P. 47473 Lagos De Moreno, Jalisco',NULL,NULL),(116,120,NULL,NULL,'LER0107249T1','Carretera A Aguascalientes Km.3  Col. La Ladera, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(117,121,NULL,NULL,'GOML780222CH1','Callejon Del Milo #1295 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(118,122,NULL,NULL,'AURM5103224N0','Francisco I. Madero #753 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(119,123,NULL,NULL,'ROMM4707152N5','Lasallistas #122 Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(120,124,NULL,NULL,'MMB981126FB8','Rio Lerma S/N Esq. Rio Hondo #S/N Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(121,125,NULL,NULL,'GOPD640826NK9','Carretera Lagos - San Juan ##3698 Col. Los Jacales, C.P. 47472 Lagos De Moreno, Jalisco',NULL,NULL),(122,126,NULL,NULL,'ROHS680824SBA','Santa Elena #596 Col. Santa Elena, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(123,127,NULL,NULL,'PAGD611108Q99','Jesus Ramirez #74 Col. El Calvario, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(124,128,NULL,NULL,'LORF920709RB8','Libramiento Norte #2571 Col. Torrecillas, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(125,129,NULL,NULL,'MAEG6809285M8','Hidalgo #786 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(126,130,NULL,NULL,'ROGL7303069P7','Division Del Norte #170 Col. Division Del Norte, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(127,131,NULL,NULL,'AUSM640810TV8','Blvd. Orozco Y Jimenez #562 Col. Alcaldes, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(128,132,NULL,NULL,'MLU930119RN5','Av. 8 De Julio #2270 Col. Zona Industrial, C.P. 44940 Guadalajara, Jalisco',NULL,NULL),(129,133,NULL,NULL,'VARM830830MP1','Ramón Corona #45 C , C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(130,134,NULL,NULL,'MAAM8205076IA','Calle Prolongacion Morelos #1300 Col. Cuauhtemoc, C.P. 36310 San Francisco Del Rincon, Guanajuato',NULL,NULL),(131,135,NULL,NULL,'MSM140310U6A','Av.Villa De Lagos Sur #1126 , C.P. 47515 Lagos De Moreno, Jalisco',NULL,NULL),(132,136,NULL,NULL,'MLM630725HU4','Juarez Esq.Francisco Gonzalez Leon #S/N , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(133,137,NULL,NULL,'NUT8210073U3','Av. Palmas #215 Col. Lomas De Chapultepec, C.P. 11000 Miguel Hidalgo, Ciudad De México',NULL,NULL),(134,138,NULL,NULL,'OPR140121FG0','Cedro #136 Col. Lomas Del Valle, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(135,139,NULL,NULL,'OHD911231M4A','Blvd. Orozco Y Jimenez #230 Col. Alcaldes, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(136,140,NULL,NULL,'OHR930624RZ2','Retorno Laureles #12 Col. Sol Nuevo, Rincon De Guayabitos, C.P. 63727 Bahia De Banderas, Nayarit',NULL,NULL),(137,141,NULL,NULL,'OPC000803FI3','Blvd. Adolfo Lopez Mateos Esq. Francisco Villa  Col. Oriental, C.P. 37510 Leon, Guanajuato',NULL,NULL),(138,142,NULL,NULL,'BADO711116LJA','Circon #248 Col. Colinas De San Javier, C.P. 47463 Lagos De Moreno, Jalisco',NULL,NULL),(139,143,NULL,NULL,'ZAVO681005SK1','Margarito Gonzalez Rubio #1093 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(140,144,NULL,NULL,'ZUPO730918NS2','Aldama #597 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(141,145,NULL,NULL,'PCA9307275T2','Felix Ramirez Rentería #150 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(142,146,NULL,NULL,'PDE101119U6A','Lasallistas #122 Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(143,147,NULL,NULL,'PAL131121Q78','Lasallistas #122 Int 1-C Col. El Rosario, C.P. 47095 San Juan De Los Lagos, Jalisco',NULL,NULL),(144,148,NULL,NULL,'PAT9110289PA','Abasolo #97 , C.P. 47600 Tepatitlan De Morelos, Jalisco',NULL,NULL),(145,149,NULL,NULL,'PTP070411BU6','Km 3.2 Carretera Guadalajara #S/N ,  San Juan De Los Lagos, Jalisco',NULL,NULL),(146,150,NULL,NULL,'PRO9011191U0','Carretera Lagos-Union Km2  Col. Rancho Santa Cruz, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(147,151,NULL,NULL,'PTE1209131E7','Miguel Hidalgo #21 Col. Vista Hermosa, C.P. 47423 Lagos De Moreno, Jalisco',NULL,NULL),(148,152,NULL,NULL,'PAN921013AK7','Km 2 Carr. San Juan-Guadalajara  , C.P. 47000 San Juan De Los Lagos, Jalisco',NULL,NULL),(149,153,NULL,NULL,'PMS910109CU8','27 De Octubre #S/N Col. Pueblo De Moya, C.P. 47430 Lagos De Moreno, Jalisco',NULL,NULL),(150,154,NULL,NULL,'QME030611BV0','San Isidro #4 Col. Fraccionamiento. San Isidro, C.P. 47570 Union De San Antonio, Jalisco',NULL,NULL),(151,155,NULL,NULL,'RBP130404BH4','Macedonio Ayala #100 Col. Plan De Los Rodriguez, C.P. 47480 Lagos De Moreno, Jalisco',NULL,NULL),(152,156,NULL,NULL,'MEMR690425NZ1','Morelos #542 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(153,157,NULL,NULL,'RFU990526Q13','Camino A Mezquitic Km. 1.5  Col. Sangre De Cristo, C.P. 47000 San Juan De Los Lagos, Jalisco',NULL,NULL),(154,158,NULL,NULL,'RVE130211SQ3','Pedro Moreno #479 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(155,159,NULL,NULL,'VAPR620725VC0','Blvd. Feliz Ramirez Renteria #1490 Col. Las Ceibas, C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(156,160,NULL,NULL,'MADR680801K75','Allende #435 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(157,161,NULL,NULL,'RAGR561010JW9','Av. Convencion Poniente #710 ,  Aguascalientes, Aguascalientes',NULL,NULL),(158,162,NULL,NULL,'SOGR790807B84','Av. Circuito Paseos De La Montaña #1135 Col. Paseos De La Montaña, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(159,163,NULL,NULL,'FOHS560321DM8','16 De Septiembre #520 Col. Barrio Bajo De Moya, C.P. 47430 Lagos De Moreno, Jalisco',NULL,NULL),(160,164,NULL,NULL,'REES9207064U8','Mariano Escobedo #93 Col. El Calvario, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(161,165,NULL,NULL,'GOLS810828F69','Esmeralda #297 Col. Colinas De San Javier, C.P. 47463 Lagos De Moreno, Jalisco',NULL,NULL),(162,166,NULL,NULL,'SEL1001139W2','Ave. Insurgentes Sur #605 Col. Benito Juarez, C.P. 03810 Benito Juarez, Ciudad De México',NULL,NULL),(163,167,NULL,NULL,'HERS6411161E9','Cometa #122 Col. San Miguel, C.P. 47420 Lagos De Moreno, Jalisco',NULL,NULL),(164,168,NULL,NULL,'CECS8010015J9','Carrt. Tampico Barra De Navidad Km 29.5  Col. Paso Del Cuarenta, C.P. 47525 Lagos De Moreno, Jalisco',NULL,NULL),(165,169,NULL,NULL,'SLL981021IB2','Carr San Luis Potosí #Km 202 , C.P. 47440 Lagos De Moreno, Jalisco',NULL,NULL),(166,170,NULL,NULL,'SAP011212CI9','Carretera San Juan-Guadalajara Km.2.8  , C.P. 47000 San Juan De Los Lagos, Jalisco',NULL,NULL),(167,171,NULL,NULL,'SUA960920NP0','Carretera Union-San Diego Km 1.5  Col. La Loma, C.P. 47570 Union De San Antonio, Jalisco',NULL,NULL),(168,172,NULL,NULL,'SAL0204182X9','Carretera Libramiento Norte #75 Col. Tepeyac, C.P. 47410 Lagos De Moreno, Jalisco',NULL,NULL),(169,173,NULL,NULL,'SIC940711Q12','Francisco I. Madero #664 Col. Centro, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(170,174,NULL,NULL,'GOTS740516AQ9','El Eden #2 Col. La Isla, C.P. 47514 Lagos De Moreno, Jalisco',NULL,NULL),(171,175,NULL,NULL,'AAGT4908126D1','Hernando De Martell #17 Col. La Luz, C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(172,176,NULL,NULL,'TBE140927UF6','Cjon Hacienda Del Refugio #94 Col. El Refugio, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(173,177,NULL,NULL,'TGS9705145VA','16 De Septiembre #139 Col. El Rosario,  San Juan De Los Lagos, Jalisco',NULL,NULL),(174,178,NULL,NULL,'TRL050804AP6','Carrt. A Los Arquitos #601 Col. Jesus Maria, C.P. 20900 Jesus Maria, Aguascalientes',NULL,NULL),(175,179,NULL,NULL,'TSE970313GW9','Carretera Al Puesto Km 6- B #Sn , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(176,180,NULL,NULL,'TGO9605209F3','5 De Mayo #895 Col. Lomas Del Valle, C.P. 47460 Lagos De Moreno, Jalisco',NULL,NULL),(177,181,NULL,NULL,'TTR0608256T6','Carretera Al Puesto Km 6- B #Sn Col. , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(178,182,NULL,NULL,'TCB041124UD3','Carr. Lagos-San Juan Km 5 #3097 Col. San Pedro, C.P. 47470 Lagos De Moreno, Jalisco',NULL,NULL),(179,183,NULL,NULL,'UCC951209R85','Encarnación De Díaz y San Sebastián El Álamo Km 2.05  Col. Sin Colonia, C.P. 47290 Encarnacion De Diaz, Jalisco',NULL,NULL),(180,184,NULL,NULL,'UGU250907MH5','Av. Juarez #976 , C.P. 44100 Guadalajara, Jalisco',NULL,NULL),(181,185,NULL,NULL,'UUV0506176Z3','Valencia #3 Col. Loma Bonita, C.P. 47450 Lagos De Moreno, Jalisco',NULL,NULL),(182,186,NULL,NULL,'XAXX010101000','Margarito Gonzalez Rubio #856 ,  Lagos De Moreno, Jalisco',NULL,NULL),(183,187,NULL,NULL,'VTH981105F90','Salvador Quezada Limon #1512 Col. Curtidores Aguascalientes, C.P. 20284 Aguascalientes, Aguascalientes',NULL,NULL),(184,188,NULL,NULL,'BECV821005M45','Torre Latinoamericana #76 Col. La Huitlacocha, C.P. 47490 Lagos De Moreno, Jalisco',NULL,NULL),(185,189,NULL,NULL,'LESV660107R17','Moreno Valley #178 Col. La Martinica, C.P. 47020 San Juan De Los Lagos, Jalisco',NULL,NULL),(186,190,NULL,NULL,'VAM131206HT4','Villa De Lagos Sur #1080 , C.P. 47515 Lagos De Moreno, Jalisco',NULL,NULL),(187,191,NULL,NULL,'LOAY890205PG1','Priv. Padre Chimino #100 , C.P. 47400 Lagos De Moreno, Jalisco',NULL,NULL),(188,192,NULL,'4741068127',NULL,NULL,'2020-04-04 10:29:56','2020-04-04 10:29:56'),(189,193,NULL,'4741083436',NULL,NULL,'2020-04-04 10:37:54','2020-04-04 10:37:54');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `ticket_text` longtext COLLATE utf8mb4_unicode_ci,
  `audi_id` mediumint(8) unsigned DEFAULT NULL,
  `box` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Hombre','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(2,'Mujer','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(3,'Niños','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(4,'Niños','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(5,'Bebes','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(6,'Sin genero','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL);
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `box` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lines`
--

DROP TABLE IF EXISTS `lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lines` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lines`
--

LOCK TABLES `lines` WRITE;
/*!40000 ALTER TABLE `lines` DISABLE KEYS */;
INSERT INTO `lines` VALUES (1,'Basico','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(2,'Esencial','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(3,'Unico','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(4,'Dinamica','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(5,'DAMA','2020-02-19 10:54:05','2020-02-19 10:54:05',NULL),(6,'CABALLERO','2020-02-19 10:54:13','2020-02-19 10:54:13',NULL),(7,'UNISEX','2020-02-19 10:54:21','2020-02-19 10:54:21',NULL),(8,'JOVEN','2020-02-19 10:54:30','2020-02-19 10:54:30',NULL),(9,'NIÑO','2020-02-19 10:54:46','2020-02-19 10:54:46',NULL);
/*!40000 ALTER TABLE `lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_histories`
--

DROP TABLE IF EXISTS `material_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` int(10) unsigned DEFAULT NULL,
  `old_quantity` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `price_actual` double DEFAULT NULL,
  `price_entered` double DEFAULT NULL,
  `date_entered` date DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_histories`
--

LOCK TABLES `material_histories` WRITE;
/*!40000 ALTER TABLE `material_histories` DISABLE KEYS */;
INSERT INTO `material_histories` VALUES (1,32,52,120,1,NULL,NULL,NULL,1,'2020-03-20 16:51:27','2020-03-20 16:51:27'),(2,229,10,18.75,1,NULL,NULL,NULL,1,'2020-05-19 17:01:06','2020-05-19 17:01:06'),(3,228,200,154.14,1,NULL,NULL,NULL,1,'2020-05-19 17:02:00','2020-05-19 17:02:00');
/*!40000 ALTER TABLE `material_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_product_sale`
--

DROP TABLE IF EXISTS `material_product_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_product_sale` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` mediumint(8) unsigned DEFAULT NULL,
  `material_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_product_sale`
--

LOCK TABLES `material_product_sale` WRITE;
/*!40000 ALTER TABLE `material_product_sale` DISABLE KEYS */;
INSERT INTO `material_product_sale` VALUES (1,1,23,17,6.4,'2020-03-20 10:26:21','2020-03-20 10:31:32'),(2,1,149,17,1.6,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(3,1,165,17,0.008,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(4,1,23,18,6,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(5,1,149,18,4,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(6,1,165,18,0.02,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(7,1,23,19,16.8,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(8,1,149,19,11.200000000000001,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(9,1,165,19,0.056,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(10,1,23,22,6,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(11,1,149,22,4,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(12,1,165,22,0.02,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(13,1,23,24,4.8,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(14,1,149,24,3.2,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(15,1,165,24,0.016,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(16,2,23,17,24,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(17,2,149,17,16,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(18,2,165,17,0.08,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(19,2,23,19,12,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(20,2,149,19,8,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(21,2,165,19,0.04,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(22,2,23,21,12,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(23,2,149,21,8,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(24,2,165,21,0.04,'2020-05-09 10:05:21','2020-05-09 10:05:21');
/*!40000 ALTER TABLE `material_product_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_product_sale_histories`
--

DROP TABLE IF EXISTS `material_product_sale_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_product_sale_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `material_product_sale_id` bigint(20) unsigned DEFAULT NULL,
  `old_quantity` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_product_sale_histories`
--

LOCK TABLES `material_product_sale_histories` WRITE;
/*!40000 ALTER TABLE `material_product_sale_histories` DISABLE KEYS */;
INSERT INTO `material_product_sale_histories` VALUES (1,1,2.4,4,1,1,'2020-03-20 10:31:32','2020-03-20 10:31:32');
/*!40000 ALTER TABLE `material_product_sale_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_product_sale_user`
--

DROP TABLE IF EXISTS `material_product_sale_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_product_sale_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` mediumint(8) unsigned DEFAULT NULL,
  `material_id` int(10) unsigned DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `folio` int(11) DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_product_sale_user`
--

LOCK TABLES `material_product_sale_user` WRITE;
/*!40000 ALTER TABLE `material_product_sale_user` DISABLE KEYS */;
INSERT INTO `material_product_sale_user` VALUES (1,1,17,0,192,4,1,1,'2020-04-04 10:41:10','2020-04-04 10:41:10'),(2,1,18,0,192,4,1,1,'2020-04-04 10:41:10','2020-04-04 10:41:10'),(3,1,19,0,192,4,1,1,'2020-04-04 10:41:10','2020-04-04 10:41:10'),(4,1,22,0,192,4,1,1,'2020-04-04 10:41:10','2020-04-04 10:41:10'),(5,1,24,0,192,4,1,1,'2020-04-04 10:41:10','2020-04-04 10:41:10'),(6,1,17,2,193,4,2,1,'2020-04-04 10:43:24','2020-04-04 10:43:24'),(7,1,18,5,193,4,2,1,'2020-04-04 10:43:24','2020-04-04 10:43:24'),(8,1,19,0,193,4,2,1,'2020-04-04 10:43:24','2020-04-04 10:43:24'),(9,1,22,0,193,4,2,1,'2020-04-04 10:43:24','2020-04-04 10:43:24'),(10,1,24,0,193,4,2,1,'2020-04-04 10:43:24','2020-04-04 10:43:24'),(11,1,17,0,192,4,3,1,'2020-04-04 10:45:28','2020-04-04 10:45:28'),(12,1,18,0,192,4,3,1,'2020-04-04 10:45:28','2020-04-04 10:45:28'),(13,1,19,14,192,4,3,1,'2020-04-04 10:45:28','2020-04-04 10:45:28'),(14,1,22,5,192,4,3,1,'2020-04-04 10:45:28','2020-04-04 10:45:28'),(15,1,24,4,192,4,3,1,'2020-04-04 10:45:28','2020-04-04 10:45:28'),(16,1,17,2,3,5,4,1,'2020-04-04 10:51:55','2020-04-04 10:51:55'),(17,1,18,5,3,5,4,1,'2020-04-04 10:51:55','2020-04-04 10:51:55'),(18,1,19,14,3,5,4,1,'2020-04-04 10:51:55','2020-04-04 10:51:55'),(19,1,22,5,3,5,4,1,'2020-04-04 10:51:55','2020-04-04 10:51:55'),(20,1,24,2,3,5,4,1,'2020-04-04 10:51:55','2020-04-04 10:51:55');
/*!40000 ALTER TABLE `material_product_sale_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `acquisition_cost` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `unit_id` smallint(5) unsigned DEFAULT NULL,
  `color_id` mediumint(8) unsigned DEFAULT NULL,
  `size_id` smallint(5) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,'FDEC100','Decada 50 Pol/ 50 Alg',NULL,133.62,133.62,11,5,1,0,'2020-02-01 10:37:12','2020-03-03 00:52:27',NULL),(2,'FDEC101','Decada 50 Pol/ 50 Alg',NULL,133.62,133.62,7,5,92,0,'2020-02-01 10:37:12','2020-03-03 00:52:38',NULL),(3,'P2F100','Pique Doble Frontura',NULL,102.59,102.59,0,5,1,0,'2020-02-01 10:37:12','2020-03-03 00:52:53',NULL),(4,'P2F101','Pique Doble Frontura',NULL,101.72,101.72,0,5,2,0,'2020-02-01 10:37:12','2020-03-03 00:53:06',NULL),(5,'P2F102','Pique Doble Frontura',NULL,101.72,101.72,7,5,52,0,'2020-02-01 10:37:12','2020-03-03 00:53:36',NULL),(6,'P2F103','Pique Doble Frontura',NULL,101.72,101.72,2,5,10,0,'2020-02-01 10:37:12','2020-03-03 00:53:49',NULL),(7,'P2F104','Pique Doble Frontura',NULL,101.72,101.72,1,5,13,0,'2020-02-01 10:37:12','2020-03-03 00:54:03',NULL),(8,'P2F105','Pique Doble Frontura',NULL,101.72,101.72,1,5,14,0,'2020-02-01 10:37:12','2020-03-03 00:55:22',NULL),(9,'P2F106','Pique Doble Frontura',NULL,101.72,101.72,3,5,93,0,'2020-02-01 10:37:12','2020-03-03 00:56:40',NULL),(10,'P2F107','Pique Doble Frontura',NULL,101.72,101.72,2,5,7,0,'2020-02-01 10:37:12','2020-03-03 00:56:52',NULL),(11,'P2F108','Pique Doble Frontura',NULL,101.72,101.72,9,5,33,0,'2020-02-01 10:37:12','2020-03-03 00:57:08',NULL),(12,'P2F109','Pique Doble Frontura',NULL,101.72,101.72,3,5,31,0,'2020-02-01 10:37:12','2020-03-03 00:57:27',NULL),(13,'P2F110','Pique Doble Frontura',NULL,101.72,101.72,5,5,32,0,'2020-02-01 10:37:12','2020-03-03 00:57:45',NULL),(14,'P2F111','Pique Doble Frontura',NULL,101.72,101.72,1,5,4,0,'2020-02-01 10:37:12','2020-03-03 00:57:58',NULL),(15,'P2F112','Pique Doble Frontura',NULL,101.72,101.72,7,5,42,0,'2020-02-01 10:37:12','2020-03-03 00:58:12',NULL),(16,'P2F113','Pique Doble Frontura',NULL,101.72,101.72,2,5,22,0,'2020-02-01 10:37:12','2020-03-03 00:58:22',NULL),(17,'P2F114','Pique Doble Frontura',NULL,101.72,101.72,1,5,15,0,'2020-02-01 10:37:12','2020-03-03 00:58:35',NULL),(18,'P2F115','Pique Doble Frontura',NULL,101.72,101.72,1,5,12,0,'2020-02-01 10:37:12','2020-03-03 00:58:48',NULL),(19,'P2F116','Pique Doble Frontura',NULL,101.72,101.72,2,5,39,0,'2020-02-01 10:37:12','2020-03-03 00:59:03',NULL),(20,'P2F117','Pique Doble Frontura',NULL,101.72,101.72,1,5,5,0,'2020-02-01 10:37:12','2020-03-03 00:59:20',NULL),(21,'P2F118','Pique Doble Frontura',NULL,101.72,101.72,15,5,94,0,'2020-02-01 10:37:12','2020-03-03 01:00:23',NULL),(22,'PDF119','Pique Dry Fit',NULL,115,115,8,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:00:36',NULL),(23,'GCAM100','Gabardina Cambridge','Cambridge',64.74,64.74,12,7,12,0,'2020-02-01 10:37:12','2020-05-19 13:10:04',NULL),(24,'GCAM101','Gabardina Cambridge',NULL,58,58,0,7,1,0,'2020-02-01 10:37:12','2020-03-02 12:13:48',NULL),(25,'GCAM102','Gabardina Cambridge',NULL,58,58,18,7,4,0,'2020-02-01 10:37:12','2020-03-02 12:16:34',NULL),(26,'GCAM103','Gabardina Cambridge',NULL,58,58,1,7,15,0,'2020-02-01 10:37:12','2020-03-02 12:16:59',NULL),(27,'GCAM104','Gabardina Cambridge',NULL,58,58,2,7,10,0,'2020-02-01 10:37:12','2020-03-02 12:17:27',NULL),(28,'GCAM105','Gabardina Cambridge','Cambridge',64.74,64.74,2,7,31,0,'2020-02-01 10:37:12','2020-05-19 13:11:25',NULL),(29,'GCAM106','Gabardina Cambridge','Cambridge',64.74,64.74,50,7,5,0,'2020-02-01 10:37:12','2020-05-19 13:10:55',NULL),(30,'GCAM107','Gabardina Cambridge',NULL,58,58,20,7,52,0,'2020-02-01 10:37:12','2020-03-02 12:18:48',NULL),(31,'GAPO100','Gabardina Apolo',NULL,58,58,40,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:01:05',NULL),(32,'GAPO101','Gabardina Apolo',NULL,58,58,172,7,5,0,'2020-02-01 10:37:12','2020-03-20 10:51:27',NULL),(33,'GATE100','Gabardina Atenas 80/20',NULL,54,54,5,7,14,0,'2020-02-01 10:37:12','2020-03-03 01:01:39',NULL),(34,'GATE101','Gabardina Atenas 80/20',NULL,54,54,4,7,15,0,'2020-02-01 10:37:12','2020-03-03 01:02:14',NULL),(35,'GATE102','Gabardina Atenas 80/20',NULL,54,54,51,7,5,0,'2020-02-01 10:37:12','2020-03-07 09:59:46',NULL),(36,'GATE103','Gabardina Atenas 80/20',NULL,54,54,10,7,7,0,'2020-02-01 10:37:12','2020-03-03 01:02:56',NULL),(37,'GATE104','Gabardina Atenas 80/20',NULL,54,54,2,7,95,0,'2020-02-01 10:37:12','2020-03-03 01:04:22',NULL),(38,'GATE105','Gabardina Atenas 80/20',NULL,54,54,2,7,10,0,'2020-02-01 10:37:12','2020-03-10 12:12:40',NULL),(39,'GATE106','Gabardina Atenas 80/20',NULL,54,54,6,7,7,0,'2020-02-01 10:37:12','2020-03-03 01:04:58',NULL),(40,'MIT100','Mitex',NULL,21.98,21.98,2,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:05:30',NULL),(41,'CPOL100','Cuello Para Polo 50Pol/50Alg',NULL,4.96,4.96,0,1,1,0,'2020-02-01 10:37:12','2020-03-10 12:17:10',NULL),(42,'INT100','Interlock',NULL,131,131,8,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:06:05',NULL),(43,'INT101','Interlock',NULL,144,144,22,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:06:17',NULL),(44,'INT102','Interlock',NULL,144,144,1,5,52,0,'2020-02-01 10:37:12','2020-03-03 01:06:30',NULL),(45,'INT103','Interlock',NULL,144,144,0,5,13,0,'2020-02-01 10:37:12','2020-03-03 01:06:43',NULL),(46,'INT104','Interlock',NULL,144,144,1,5,14,0,'2020-02-01 10:37:12','2020-03-03 01:06:57',NULL),(47,'INT105','Interlock',NULL,144,144,1,5,22,0,'2020-02-01 10:37:12','2020-03-03 01:07:12',NULL),(48,'INT106','Interlock',NULL,144,144,1,5,33,0,'2020-02-01 10:37:12','2020-03-03 01:07:24',NULL),(49,'INT107','Interlock',NULL,144,144,0,5,31,0,'2020-02-01 10:37:12','2020-03-03 01:07:38',NULL),(50,'INT108','Interlock',NULL,144,144,0,5,42,0,'2020-02-01 10:37:12','2020-03-03 01:07:49',NULL),(51,'INT109','Interlock',NULL,144,144,0,5,5,0,'2020-02-01 10:37:12','2020-03-03 01:08:02',NULL),(52,'INT110','Interlock',NULL,144,144,1,5,15,0,'2020-02-01 10:37:12','2020-03-03 01:08:12',NULL),(53,'FFLE100','Flecce',NULL,129,129,0,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:08:34',NULL),(54,'FFLE101','Flecce',NULL,135,135,0,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:08:46',NULL),(55,'FFLE102','Flecce',NULL,135,135,1,5,10,0,'2020-02-01 10:37:12','2020-03-03 01:08:59',NULL),(56,'FFLE103','Flecce',NULL,135,135,1,5,22,0,'2020-02-01 10:37:12','2020-03-03 01:09:12',NULL),(57,'FFLE104','Flecce',NULL,135,135,1,5,5,0,'2020-02-01 10:37:12','2020-03-10 12:19:04',NULL),(58,'FFLE105','Flecce',NULL,135,135,0,5,12,0,'2020-02-01 10:37:12','2020-03-10 12:19:35',NULL),(59,'FFLE106','Flecce',NULL,135,135,0,5,87,0,'2020-02-01 10:37:12','2020-03-10 12:20:01',NULL),(60,'FFLE107','Flecce',NULL,135,135,2,5,11,0,'2020-02-01 10:37:12','2020-03-10 12:20:22',NULL),(61,'FFLE108','Flecce',NULL,135,135,5,5,33,0,'2020-02-01 10:37:12','2020-03-10 12:21:09',NULL),(62,'FFLE109','Flecce',NULL,135,135,5,5,52,0,'2020-02-01 10:37:12','2020-03-03 01:09:45',NULL),(63,'FFLE110','Flecce',NULL,135,135,3,5,31,0,'2020-02-01 10:37:12','2020-03-03 01:10:00',NULL),(64,'FFLE111','Flecce',NULL,135,135,1,5,22,0,'2020-02-01 10:37:12','2020-03-03 01:10:11',NULL),(65,'FFLE112','Flecce',NULL,135,135,8,5,5,0,'2020-02-01 10:37:12','2020-03-03 01:10:44',NULL),(66,'FFLE113','Flecce',NULL,135,135,3,5,37,0,'2020-02-01 10:37:12','2020-03-03 01:10:58',NULL),(67,'CARD100','Cardigan 50 Pol/ 50 Alg millenium',NULL,110.34,110.34,20,5,1,0,'2020-02-01 10:37:12','2020-05-09 12:02:23',NULL),(68,'CARD101','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,1,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:11:34',NULL),(69,'CARD102','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,2,5,4,0,'2020-02-01 10:37:12','2020-03-03 01:11:57',NULL),(70,'CARD103','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,0,5,13,0,'2020-02-01 10:37:12','2020-03-03 01:12:11',NULL),(71,'CARD104','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,15,5,52,0,'2020-02-01 10:37:12','2020-03-03 01:12:30',NULL),(72,'CARD105','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,0,5,14,0,'2020-02-01 10:37:12','2020-03-03 01:12:44',NULL),(73,'CARD106','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,2,5,93,0,'2020-02-01 10:37:12','2020-03-03 01:12:57',NULL),(74,'CARD107','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,3,5,3,0,'2020-02-01 10:37:12','2020-03-03 01:13:09',NULL),(75,'CARD108','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,1,5,96,0,'2020-02-01 10:37:12','2020-03-03 01:13:52',NULL),(76,'CARD109','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,0,5,33,0,'2020-02-01 10:37:12','2020-03-03 01:14:07',NULL),(77,'CARD110','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,15,5,31,0,'2020-02-01 10:37:12','2020-03-03 01:14:27',NULL),(78,'CARD111','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,0,5,42,0,'2020-02-01 10:37:12','2020-03-03 01:14:40',NULL),(79,'CARD112','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,15,5,5,0,'2020-02-01 10:37:12','2020-03-03 01:14:52',NULL),(80,'CARD113','Cardigan 50 Pol/ 50 Alg',NULL,110.34,110.34,7,5,94,0,'2020-02-01 10:37:12','2020-03-03 01:15:01',NULL),(81,'POL100','Polifoam',NULL,119.83,119.83,3,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:15:50',NULL),(82,'POL200','Polifoam Moroleon',NULL,89,89,6,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:16:02',NULL),(83,'CARGA100','Cardigan Galaxia',NULL,127.59,127.59,2,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:16:15',NULL),(84,'CARGA101','Cardigan Galaxia',NULL,127.59,127.59,1,5,14,0,'2020-02-01 10:37:12','2020-03-03 01:16:39',NULL),(85,'CARGA102','Cardigan Galaxia',NULL,127.59,127.59,1,5,12,0,'2020-02-01 10:37:12','2020-03-03 01:16:52',NULL),(86,'CARGA103','Cardigan Galaxia',NULL,127.59,127.59,2,5,17,0,'2020-02-01 10:37:12','2020-03-03 01:17:07',NULL),(87,'INTGAL100','Galaxia',NULL,129.31,129.31,0,5,17,0,'2020-02-01 10:37:12','2020-03-03 01:17:19',NULL),(88,'INTGAL101','Galaxia',NULL,129.31,129.31,1,5,14,0,'2020-02-01 10:37:12','2020-03-03 01:17:30',NULL),(89,'INTGAL102','Galaxia',NULL,129.31,129.31,1,5,92,0,'2020-02-01 10:37:12','2020-03-03 01:17:39',NULL),(90,'INTGAL103','Galaxia',NULL,129.31,129.31,2,5,12,0,'2020-02-01 10:37:12','2020-03-03 01:17:49',NULL),(91,'INTGAL104','Galaxia',NULL,129.31,129.31,3,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:17:57',NULL),(92,'NHOL100','Nueva Holanda',NULL,95.69,95.69,1,5,15,0,'2020-02-01 10:37:12','2020-03-03 01:18:07',NULL),(93,'NHOL101','Nueva Holanda',NULL,95.69,95.69,1,5,5,0,'2020-02-01 10:37:12','2020-03-03 01:18:18',NULL),(94,'NHOL102','Nueva Holanda',NULL,95.69,95.69,1,5,3,0,'2020-02-01 10:37:12','2020-03-03 01:18:28',NULL),(95,'NHOL103','Nueva Holanda',NULL,95.69,95.69,5,5,32,0,'2020-02-01 10:37:12','2020-03-03 01:18:41',NULL),(96,'MHOL200','Micro Holanda',NULL,95.69,95.69,1,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:18:51',NULL),(97,'HOL100','Holanda',NULL,95.69,95.69,1,5,15,0,'2020-02-01 10:37:12','2020-03-03 01:19:19',NULL),(98,'HOL101','Holanda',NULL,95.69,95.69,1,5,10,0,'2020-02-01 10:37:12','2020-03-10 12:24:41',NULL),(99,'HOL102','Holanda',NULL,95.69,95.69,2,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:19:51',NULL),(100,'DEP100','Deportiva Gaytan',NULL,125,125,7,5,53,0,'2020-02-01 10:37:12','2020-03-03 01:20:02',NULL),(101,'FBOR100','Forro Borrega',NULL,120,120,2,7,4,0,'2020-02-01 10:37:12','2020-03-03 01:20:13',NULL),(102,'GUA100','Guata',NULL,60,60,5,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:20:22',NULL),(103,'FO100','Foami',NULL,180,180,1,8,15,0,'2020-02-01 10:37:12','2020-03-03 01:20:35',NULL),(104,'WA100','Waffle',NULL,129,129,1,5,2,0,'2020-02-01 10:37:12','2020-03-03 01:20:45',NULL),(105,'WA101','Waffle',NULL,129,129,0,5,92,0,'2020-02-01 10:37:12','2020-03-03 01:20:54',NULL),(106,'WA102','Waffle',NULL,129,129,17,5,1,0,'2020-02-01 10:37:12','2020-03-03 01:21:02',NULL),(107,'FIE100','Fieltro',NULL,10,10,2,7,5,0,'2020-02-01 10:37:12','2020-03-10 12:25:39',NULL),(108,'FIE101','Fieltro',NULL,10,10,2,7,92,0,'2020-02-01 10:37:12','2020-03-03 01:21:29',NULL),(109,'FIE102','Fieltro',NULL,10,10,2,7,2,0,'2020-02-01 10:37:12','2020-03-03 01:21:46',NULL),(110,'FIE103','Fieltro',NULL,10,10,2,7,15,0,'2020-02-01 10:37:12','2020-03-03 01:21:58',NULL),(111,'FIE104','Fieltro',NULL,10,10,2,7,6,0,'2020-02-01 10:37:12','2020-03-10 12:26:28',NULL),(112,'FIE105','Fieltro',NULL,10,10,2,7,30,0,'2020-02-01 10:37:12','2020-03-03 01:22:11',NULL),(113,'FIE106','Fieltro',NULL,10,10,2,7,52,0,'2020-02-01 10:37:12','2020-03-03 01:22:21',NULL),(114,'FIE107','Fieltro',NULL,10,10,2,7,7,0,'2020-02-01 10:37:12','2020-03-03 01:22:29',NULL),(115,'FIE108','Fieltro',NULL,10,10,2,7,4,0,'2020-02-01 10:37:12','2020-03-03 01:22:38',NULL),(116,'HAP100','Hule Aplicación',NULL,25,25,6,7,14,0,'2020-02-01 10:37:12','2020-03-03 01:22:48',NULL),(117,'HAP101','Hule Aplicación',NULL,25,25,2,7,5,0,'2020-02-01 10:37:12','2020-03-10 12:27:11',NULL),(118,'HAP102','Hule Aplicación',NULL,25,25,6,7,2,0,'2020-02-01 10:37:12','2020-03-03 01:23:26',NULL),(119,'HAP103','Hule Aplicación',NULL,25,25,1,7,97,0,'2020-02-01 10:37:12','2020-03-03 01:26:15',NULL),(120,'HAP104','Hule Aplicación',NULL,25,25,1,7,15,0,'2020-02-01 10:37:12','2020-03-03 01:26:27',NULL),(121,'HAP105','Hule Aplicación',NULL,25,25,2,7,52,0,'2020-02-01 10:37:12','2020-03-03 01:26:36',NULL),(122,'HAP106','Hule Aplicación',NULL,25,25,1,7,35,0,'2020-02-01 10:37:12','2020-03-03 01:26:45',NULL),(123,'HAP107','Hule Aplicación',NULL,25,25,1,7,9,0,'2020-02-01 10:37:12','2020-03-10 12:28:19',NULL),(124,'HAP108','Hule Aplicación',NULL,25,25,1,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:27:09',NULL),(125,'HAP109','Hule Aplicación',NULL,25,25,1,7,69,0,'2020-02-01 10:37:12','2020-03-10 12:30:01',NULL),(126,'HAP110','Hule Aplicación',NULL,25,25,0,7,74,0,'2020-02-01 10:37:12','2020-03-10 12:30:50',NULL),(127,'HAP111','Hule Aplicación',NULL,25,25,2,7,2,0,'2020-02-01 10:37:12','2020-03-10 12:31:23',NULL),(128,'NACO100','Nylon Acolchado',NULL,35,35,6,7,1,0,'2020-02-01 10:37:12','2020-03-03 01:27:30',NULL),(129,'NACO101','Nylon Acolchado',NULL,35,35,3,7,10,0,'2020-02-01 10:37:12','2020-03-10 12:32:14',NULL),(130,'MICR100','Microfibra',NULL,58,58,6,7,98,0,'2020-02-01 10:37:12','2020-03-03 01:28:26',NULL),(131,'MICR101','Microfibra',NULL,58,58,7,7,53,0,'2020-02-01 10:37:12','2020-03-03 01:28:36',NULL),(132,'TAF100','Tafeta',NULL,25,25,30,7,2,0,'2020-02-01 10:37:12','2020-03-10 12:33:15',NULL),(133,'TAF101','Tafeta',NULL,25,25,15,7,5,0,'2020-02-01 10:37:12','2020-03-10 12:33:51',NULL),(134,'TAF102','Tafeta',NULL,25,25,3,7,52,0,'2020-02-01 10:37:12','2020-03-10 12:36:50',NULL),(135,'TAF103','Tafeta',NULL,25,25,5,7,92,0,'2020-02-01 10:37:12','2020-03-10 12:37:21',NULL),(136,'TAF104','Tafeta',NULL,25,25,18,7,4,0,'2020-02-01 10:37:12','2020-03-10 12:37:58',NULL),(137,'TAF105','Tafeta',NULL,25,25,4,7,15,0,'2020-02-01 10:37:12','2020-03-10 12:38:26',NULL),(138,'TAF106','Tafeta',NULL,25,25,1,7,99,0,'2020-02-01 10:37:12','2020-03-10 12:40:55',NULL),(139,'TAF107','Tafeta',NULL,25,25,1,7,34,0,'2020-02-01 10:37:12','2020-03-10 12:42:07',NULL),(140,'POP100','Popelina','super blanca',16.38,16.38,30,7,1,0,'2020-02-01 10:37:12','2020-05-19 13:13:34',NULL),(141,'POP101','Popelina',NULL,29,29,1,7,14,0,'2020-02-01 10:37:12','2020-03-10 12:43:48',NULL),(142,'POP102','Popelina',NULL,29,29,1,7,97,0,'2020-02-01 10:37:12','2020-03-10 12:44:15',NULL),(143,'POP103','Popelina',NULL,29,29,1,7,9,0,'2020-02-01 10:37:12','2020-03-10 12:45:10',NULL),(144,'POP104','Popelina',NULL,29,29,1,7,5,0,'2020-02-01 10:37:12','2020-03-10 12:45:55',NULL),(145,'POP105','Popelina',NULL,29,29,3,7,95,0,'2020-02-01 10:37:12','2020-03-10 12:46:52',NULL),(146,'POP106','Popelina',NULL,29,29,4,7,7,0,'2020-02-01 10:37:12','2020-03-10 12:47:44',NULL),(147,'CAL100','Calado Mesh',NULL,135.34,135.34,0,7,1,0,'2020-02-01 10:37:12','2020-03-10 12:50:41',NULL),(148,'CAL2000','Calado 2000',NULL,19.4,19.4,0,7,5,0,'2020-02-01 10:37:12','2020-03-10 12:51:01',NULL),(149,'EJR38R','Elastico Jareta 38 S/R',NULL,2.53,2.63,-5.9999999999999964,7,1,0,'2020-02-01 10:37:12','2020-05-09 10:05:21',NULL),(150,'PEL800','Pellon 800',NULL,4.23,4.23,65,7,1,0,'2020-02-01 10:37:12','2020-03-10 12:51:29',NULL),(151,'CS50DDBCO','Cierre Separable Diente Delgado #50',NULL,2.2,2.2,22,1,1,0,'2020-02-01 10:37:12','2020-03-10 12:52:03',NULL),(152,'CS50DDCIE','Cierre Separable Diente Delgado #50',NULL,2.2,2.2,1,1,6,0,'2020-02-01 10:37:12','2020-03-10 12:52:31',NULL),(153,'CS15DLBCO','Cierre Sep Diente Laton Delgado #15',NULL,2.2,2.2,32,1,1,0,'2020-02-01 10:37:12','2020-03-10 12:52:59',NULL),(154,'CS15DLKAH','Cierre Sep Diente Laton Delgado #15',NULL,2.2,2.2,46,1,4,0,'2020-02-01 10:37:12','2020-03-10 12:53:46',NULL),(155,'CS65DDREY','Cierre Separable Diente Delgado #65',NULL,2.2,2.2,1,1,11,0,'2020-02-01 10:37:12','2020-03-10 12:54:05',NULL),(156,'CS50DDCIE','Cierre Separable Diente Delgado #60',NULL,2.2,2.2,1,1,6,0,'2020-02-01 10:37:12','2020-03-10 12:54:23',NULL),(157,'CS60DGMAR','Cierre Separable Diente Grueso #60',NULL,2.2,2.2,6,1,5,0,'2020-02-01 10:37:12','2020-03-10 12:54:42',NULL),(158,'CS85DGMAR','Cierre Separable Diente Grueso #85',NULL,2.2,2.2,4,1,5,0,'2020-02-01 10:37:12','2020-03-10 12:55:09',NULL),(159,'CS70DDNEG','Cierre Separable Diente Delgado #70',NULL,2.2,2.2,12,1,2,0,'2020-02-01 10:37:12','2020-03-10 12:55:45',NULL),(160,'CS85DDBCO','Cierre Separable Diente Delgado #85',NULL,2.2,2.2,2,1,1,0,'2020-02-01 10:37:12','2020-03-10 12:56:07',NULL),(161,'CREF100','Cinta Reflejante Seguridad Plata 50Mm',NULL,6.08,6.08,50,7,99,0,'2020-02-01 10:37:12','2020-03-10 12:56:59',NULL),(162,'CREF101','Cinta Reflejante Seguridad Plata 50Mm',NULL,6.08,6.08,75,7,101,0,'2020-02-01 10:37:12','2020-03-10 12:59:37',NULL),(163,'HMA100','Hilo Macrame',NULL,0.84,0.84,820,7,1,0,'2020-02-01 10:37:12','2020-03-10 12:59:58',NULL),(164,'CON100','Contactel 20Mm',NULL,2.16,2.16,37,7,1,0,'2020-02-01 10:37:12','2020-03-10 13:00:41',NULL),(165,'HK402BCO','Hilo Kingtex 40/2 delgado','Kintex Delgado',22.07,22.07,14.720000000000004,9,1,0,'2020-02-01 10:37:12','2020-05-09 10:05:21',NULL),(166,'HMOBCO','Hilo Poliester Blanco Monofilamento',NULL,62.93,62.93,0,10,1,0,'2020-02-01 10:37:12','2020-03-10 13:01:23',NULL),(167,'CTAP100','Cintilla Tapa Costura',NULL,0.95,0.95,1550,7,104,0,'2020-02-01 10:37:12','2020-03-10 13:03:17',NULL),(168,'HK402NA033','Hilo Kingtex 40/2 delgado',NULL,22.07,22.07,1,9,15,0,'2020-02-01 10:37:12','2020-03-20 12:37:05',NULL),(169,'CREF50P','Cinta Reflejante Seguridad Plata 50Mm',NULL,304.31,304.31,1,7,99,0,'2020-02-01 10:37:12','2020-03-10 13:05:02',NULL),(170,'SPSAN10','Spray Adhesivo Seritec',NULL,72.2,72.2,2,12,105,0,'2020-02-01 10:37:12','2020-03-10 13:06:55',NULL),(171,'SPSAN20','Spray Adhesivo Stickco',NULL,65,65,1,12,105,0,'2020-02-01 10:37:12','2020-03-10 13:07:28',NULL),(172,'PF75D/2','Bobina Pequeña Blanca Caja C/144 Piezas',NULL,236.13,236.13,1,1,1,0,'2020-02-01 10:37:12','2020-03-10 13:07:43',NULL),(173,'BT-800','Entretela 1.45X100M R800',NULL,790.8,790.8,0,7,1,0,'2020-02-01 10:37:12','2020-03-10 13:08:01',NULL),(174,'HROYPS001-5','Cono Plata 4,687Mts# Ant. Royal Ps001-5',NULL,141.22,141.22,2,9,99,0,'2020-02-01 10:37:12','2020-03-10 13:08:26',NULL),(175,'HROY064P','Hilo Bordado Royal 120/2 064P',NULL,46.59,46.59,2,9,11,0,'2020-02-01 10:37:12','2020-03-10 13:09:11',NULL),(176,'HROY7082P','Hilo Bordado Royal 120/2 7082P',NULL,48.75,48.75,0,9,30,0,'2020-02-01 10:37:12','2020-03-10 13:16:33',NULL),(177,'HROY179P','Hilo Bordad Royal 120/2 179P',NULL,45.25,45.25,0,9,1,0,'2020-02-01 10:37:12','2020-03-10 13:17:01',NULL),(178,'HROY180P','Hilo Bordad Royal 120/2 180P',NULL,45.25,45.25,0,9,2,0,'2020-02-01 10:37:12','2020-03-10 13:17:28',NULL),(179,'HROY050P','Hilo Bordad Royal 120/2 050P',NULL,45.25,45.25,0,9,14,0,'2020-02-01 10:37:12','2020-03-10 13:18:37',NULL),(180,'HROY012P','Hilo Bordar Royal 120/2 012P',NULL,48.75,48.75,0,9,34,0,'2020-02-01 10:37:12','2020-03-10 13:19:00',NULL),(181,'HROY7078P','Hilo Bordar Royal  120/2 7078P',NULL,48.75,48.75,2,9,15,0,'2020-02-01 10:37:12','2020-03-10 13:35:07',NULL),(182,'HROY7056P','Hilo Bordar Royal 120/2 7056P',NULL,48.75,48.75,0,9,106,0,'2020-02-01 10:37:12','2020-03-10 13:38:26',NULL),(183,'HROY7221P','Hilo Bordar Royal 120/2 7221P',NULL,48.75,48.75,2,9,107,0,'2020-02-01 10:37:12','2020-03-10 13:40:45',NULL),(184,'HROY1102P','Hilo Bordar Royal 120/2 1102P',NULL,48.75,48.75,7,9,52,0,'2020-02-01 10:37:12','2020-03-10 13:41:09',NULL),(185,'HROY801P','Hilo Bordar Royal 120/2 801P',NULL,48.75,48.75,2,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:15:10',NULL),(186,'HROY116P','Hilo Bordar Royal 120/2 116P',NULL,48.75,48.75,4,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:15:22',NULL),(187,'HROY302P','Hilo Bordar Royal 120/2 302P',NULL,48.75,48.75,8,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:15:34',NULL),(188,'HROY164P','Hilo Bordar Royal 120/2 164P',NULL,48.75,48.75,4,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:15:46',NULL),(189,'HROY156P','Hilo Bordar Royal 120/2 156P',NULL,48.75,48.75,4,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:16:06',NULL),(190,'HROY7145P','Hilo Bordar Royal 120/2 7145P',NULL,48.75,48.75,2,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:16:26',NULL),(191,'HROY160P','Hilo Bordar Royal 120/2 160P',NULL,48.75,48.75,5,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:16:41',NULL),(192,'HROY7022P','Hilo Bordar Royal 120/2 7022P',NULL,48.75,48.75,3,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:16:56',NULL),(193,'HROY7060P','Hilo Bordar Royal 120/2 7060P',NULL,48.75,48.75,1,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:17:11',NULL),(194,'HROY227P','Hilo Bordar Royal 120/2 227P',NULL,48.75,48.75,3,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:17:25',NULL),(195,'HROY160P','Hilo Bordar Royal 120/2 160P',NULL,48.75,48.75,5,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:17:43',NULL),(196,'HMAD7778','Hilo Bordar Madeira 120/2 7778',NULL,55,55,6,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:18:39',NULL),(197,'HMAD7801','Hilo Bordar Madeira 120/2 7801',NULL,55,55,2,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:18:50',NULL),(198,'HMAD7725','Hilo Bordar Madeira 120/2 7725',NULL,55,55,6,9,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:19:00',NULL),(199,'ETFC100','Etiqueta De Fibra De Coco Jean Hombre',NULL,2232,2232,0,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:19:21',NULL),(200,'ETFC101','Etiqueta De Fibra De Coco Jean Dama',NULL,205,205,0,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:19:38',NULL),(201,'ETBBPRO10','Etiqueta Bordada Bacaloni Pro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-01 10:37:12','2020-02-01 10:37:12',NULL),(202,'ETBBPRO11','Etiqueta Bordada Bacaloni Pro Bandera',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-01 10:37:12','2020-02-01 10:37:12',NULL),(203,'ETAL100XCH','Etiqueta Talla Xtra Chica',NULL,0.2,0.2,1010,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:29:38',NULL),(204,'ETAL100CH','Etiqueta Talla Chica',NULL,0.2,0.2,982,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:29:27',NULL),(205,'ETAL100MED','Etiqueta Talla Mediana',NULL,0.2,0.2,3026,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:27:47',NULL),(206,'ETAL100GDE','Etiqueta Talla Grande',NULL,0.2,0.2,4010,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:27:34',NULL),(207,'ETAL100XG','Etiqueta Talla Xtra Gde',NULL,0.2,0.2,3031,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:27:19',NULL),(208,'ETAL100XXG','Etiqueta Talla 2Xtragde',NULL,0.2,0.2,1003,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:27:07',NULL),(209,'ETMBPRO','Etiqueta Marca Bacaloni Pro',NULL,0.74,0.74,2905,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:26:52',NULL),(210,'ETMBPROL','Etiqueta Marca Bacaloni Pro Lateral',NULL,0.76,0.76,3022,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:25:30',NULL),(211,'ETMBPROB','Etiqueta Marca Bacaloni Pro Banderita',NULL,0.33,0.33,5600,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:26:41',NULL),(212,'ETMBURB','Etiqueta Marca Bacaloni Urban',NULL,0.74,0.74,3068,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:26:27',NULL),(213,'ETMBURBL','Etiqueta Marca Bacaloni Urban Lateral',NULL,0.76,0.76,2886,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:26:15',NULL),(214,'ETMBURBB','Etiqueta Marca Bacaloni Urban Banderita',NULL,0.33,0.33,5500,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:26:04',NULL),(215,'X152044RD3F6198','Etiq. Bca. Bacaloni Pro Neg/Beig',NULL,0.26,0.26,25000,1,1,0,'2020-02-01 10:37:12','2020-03-03 10:19:24',NULL),(216,'X152044RD3F6199','Etiq. Bca. Bacaloni Urban Neg/Oro',NULL,0.26,0.26,25000,1,NULL,NULL,'2020-02-01 10:37:12','2020-02-25 13:25:42',NULL),(217,'10343911840','Papel Epson Profesional S.Sublimacion',NULL,2300,2300,11,7,1,0,'2020-02-01 10:37:12','2020-03-10 12:49:06',NULL),(218,'GDIA102','Gabardina Diamante negro','Gabardina Diamante negro',46.98,46.98,5,7,2,NULL,'2020-03-20 11:01:11','2020-03-20 11:01:11',NULL),(219,'HK302BCO','Hilo Kintex 30/2 grueso','hilo kintex coser',22.07,22.07,8,9,1,0,'2020-03-20 12:39:10','2020-03-20 14:10:41',NULL),(220,'HK402ACE','Hilo Kintex 40/2 delgado','Hilo Kintex coser',22.07,22.07,1,9,12,NULL,'2020-03-20 12:40:43','2020-03-20 12:40:43',NULL),(221,'HK302ACE','Hilo Kintex 30/2 grueso','Hilo Kintex coser',22.07,22.07,10,9,12,0,'2020-03-20 12:41:58','2020-03-20 12:42:43',NULL),(222,'HK402NEG','Hilo Kintex 40/2 delgado','Hilo Kintex coser',22.07,22.07,10,9,2,NULL,'2020-03-20 12:44:06','2020-03-20 12:44:06',NULL),(223,'HK302NEG','Hilo Kintex 30/2 grueso','Hilo Kintex coser',22.07,22.07,10,9,2,NULL,'2020-03-20 12:45:09','2020-03-20 12:45:09',NULL),(224,'HK302NA','Hilo Kintex 30/2 grueso','Hilo Kintex coser',22.07,22.07,2,9,15,NULL,'2020-03-20 12:51:57','2020-03-20 12:51:57',NULL),(225,'HK402AM','Hilo kintex 40/2 delgado','Hilo Kintex coser',22.07,22.07,5,9,5,NULL,'2020-03-20 12:53:06','2020-03-20 12:53:06',NULL),(226,'HK302AM','Hilo Kintex 30/2 grueso','Hilo Kintex coser',22.07,22.07,4,9,5,NULL,'2020-03-20 12:54:03','2020-03-20 12:54:03',NULL),(227,'CARD101','CARDIGAN  FLIPOL','CARDIGAN FLIPOL',120,120,0,5,1,NULL,'2020-05-09 12:05:30','2020-05-09 12:05:30',NULL),(228,'FELPM100','FELPA MILLENIUM','MILLENIUM',126.73,126.73,354.14,5,1,NULL,'2020-05-09 12:29:48','2020-05-19 12:02:00',NULL),(229,'FELFP100','FELPA FLIPOL','FLIPOL',121.55,121.55,28.75,5,1,NULL,'2020-05-09 12:31:50','2020-05-19 12:01:06',NULL),(230,'ETTPS28','Etiqueta talla Pantalón Sublimada','Talla Pantalón',0.25,0.25,10,1,1,17,'2020-05-19 14:30:19','2020-05-19 14:30:19',NULL),(231,'ETTPS28','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,47,'2020-05-19 14:34:16','2020-05-19 14:34:16',NULL),(232,'ETTPS30','Etiqueta Talla Pantalón Sublimada','talla pantalón',0.25,0.25,10,1,1,49,'2020-05-19 14:35:43','2020-05-19 14:35:43',NULL),(233,'ETTPS32','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,20,'2020-05-19 14:36:56','2020-05-19 14:36:56',NULL),(234,'ETTPS34','Etiqueta Talla Pantalón Sublimada','talla pantalón',0.25,0.25,10,1,1,21,'2020-05-19 14:37:49','2020-05-19 14:37:49',NULL),(235,'ETTPS36','Etiqueta Talla Pantalón Sublimada','talla pantalón',0.25,0.25,10,1,1,22,'2020-05-19 14:39:00','2020-05-19 14:39:00',NULL),(236,'ETTPS38','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,23,'2020-05-19 14:40:25','2020-05-19 14:40:52',NULL),(237,'ETTPS40','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,24,'2020-05-19 14:41:52','2020-05-19 14:41:52',NULL),(238,'ETTPS42','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,25,'2020-05-19 14:42:45','2020-05-19 14:43:04',NULL),(239,'ETTPS44','Etiqueta Talla Pantalón Sublimada','talla pantalon',0.25,0.25,10,1,1,26,'2020-05-19 14:43:54','2020-05-19 14:43:54',NULL);
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_09_03_144628_create_permission_tables',1),(4,'2017_09_11_174816_create_social_accounts_table',1),(5,'2017_09_26_140332_create_cache_table',1),(6,'2017_09_26_140528_create_sessions_table',1),(7,'2017_09_26_140609_create_jobs_table',1),(8,'2018_04_08_033256_create_password_histories_table',1),(9,'2019_03_26_000344_create_audits_table',1),(10,'2019_09_03_151510_create_payment_methods_table',1),(11,'2019_09_03_232440_create_customers_table',1),(12,'2019_09_12_122106_create_products_table',1),(13,'2019_09_12_123317_create_sales_table',1),(14,'2019_09_16_054517_create_color_size_product_table',1),(15,'2019_09_22_061126_create_product_stocks_table',1),(16,'2019_09_22_073549_create_stocks_table',1),(17,'2019_09_23_123307_create_carts_table',1),(18,'2019_09_23_141141_create_product_sale_table',1),(19,'2019_09_23_215827_create_cart_sale_table',1),(20,'2019_09_23_232414_create_expenses_table',1),(21,'2019_09_23_232425_create_incomes_table',1),(22,'2019_09_27_095259_create_notes_table',1),(23,'2019_10_07_002404_create_small_boxes_table',1),(24,'2019_10_07_154618_create_settings_table',1),(25,'2019_10_15_110457_create_product_details_table',1),(26,'2019_11_14_052626_create_small_cards_table',1),(27,'2019_11_28_065615_create_colors_table',1),(28,'2019_11_28_094331_create_product_colors_table',1),(29,'2019_12_12_075943_create_genders_table',1),(30,'2019_12_12_080154_create_sleeves_table',1),(31,'2019_12_12_080241_create_cloths_table',1),(32,'2019_12_12_080313_create_lines_table',1),(33,'2019_12_12_080411_create_sizes_table',1),(34,'2019_12_12_080418_create_units_table',1),(35,'2019_12_17_051220_create_categories_table',1),(36,'2019_12_18_085625_create_product_sizes',1),(37,'2020_01_07_043540_create_materials_table',1),(38,'2020_01_23_073025_create_boms_table',1),(39,'2020_03_03_080456_create_material_histories_table',1),(40,'2020_03_06_064608_create_product_stock_histories_table',1),(41,'2020_03_10_051051_create_statuses_table',1),(42,'2020_03_10_063119_create_status_sale_table',1),(43,'2020_03_19_054150_create_material_product_sale_table',1),(44,'2020_03_19_224059_create_material_product_sale_histories',1),(45,'2020_03_27_034840_create_material_product_sale_user_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (1,'App\\Models\\Auth\\User',193),(3,'App\\Models\\Auth\\User',193),(5,'App\\Models\\Auth\\User',193),(6,'App\\Models\\Auth\\User',193),(11,'App\\Models\\Auth\\User',193),(12,'App\\Models\\Auth\\User',193),(14,'App\\Models\\Auth\\User',193),(15,'App\\Models\\Auth\\User',193),(16,'App\\Models\\Auth\\User',193),(17,'App\\Models\\Auth\\User',193),(18,'App\\Models\\Auth\\User',193),(19,'App\\Models\\Auth\\User',193),(20,'App\\Models\\Auth\\User',193),(21,'App\\Models\\Auth\\User',193),(22,'App\\Models\\Auth\\User',193);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\Auth\\User',1),(2,'App\\Models\\Auth\\User',2),(3,'App\\Models\\Auth\\User',3),(3,'App\\Models\\Auth\\User',5),(3,'App\\Models\\Auth\\User',6),(3,'App\\Models\\Auth\\User',7),(3,'App\\Models\\Auth\\User',8),(3,'App\\Models\\Auth\\User',9),(3,'App\\Models\\Auth\\User',10),(3,'App\\Models\\Auth\\User',11),(3,'App\\Models\\Auth\\User',12),(3,'App\\Models\\Auth\\User',13),(3,'App\\Models\\Auth\\User',14),(3,'App\\Models\\Auth\\User',15),(3,'App\\Models\\Auth\\User',16),(3,'App\\Models\\Auth\\User',17),(3,'App\\Models\\Auth\\User',18),(3,'App\\Models\\Auth\\User',19),(3,'App\\Models\\Auth\\User',20),(3,'App\\Models\\Auth\\User',21),(3,'App\\Models\\Auth\\User',22),(3,'App\\Models\\Auth\\User',23),(3,'App\\Models\\Auth\\User',24),(3,'App\\Models\\Auth\\User',25),(3,'App\\Models\\Auth\\User',26),(3,'App\\Models\\Auth\\User',27),(3,'App\\Models\\Auth\\User',28),(3,'App\\Models\\Auth\\User',29),(3,'App\\Models\\Auth\\User',30),(3,'App\\Models\\Auth\\User',31),(3,'App\\Models\\Auth\\User',32),(3,'App\\Models\\Auth\\User',33),(3,'App\\Models\\Auth\\User',34),(3,'App\\Models\\Auth\\User',35),(3,'App\\Models\\Auth\\User',36),(3,'App\\Models\\Auth\\User',37),(3,'App\\Models\\Auth\\User',38),(3,'App\\Models\\Auth\\User',39),(3,'App\\Models\\Auth\\User',40),(3,'App\\Models\\Auth\\User',41),(3,'App\\Models\\Auth\\User',42),(3,'App\\Models\\Auth\\User',43),(3,'App\\Models\\Auth\\User',44),(3,'App\\Models\\Auth\\User',45),(3,'App\\Models\\Auth\\User',46),(3,'App\\Models\\Auth\\User',47),(3,'App\\Models\\Auth\\User',48),(3,'App\\Models\\Auth\\User',49),(3,'App\\Models\\Auth\\User',50),(3,'App\\Models\\Auth\\User',51),(3,'App\\Models\\Auth\\User',52),(3,'App\\Models\\Auth\\User',53),(3,'App\\Models\\Auth\\User',54),(3,'App\\Models\\Auth\\User',55),(3,'App\\Models\\Auth\\User',56),(3,'App\\Models\\Auth\\User',57),(3,'App\\Models\\Auth\\User',58),(3,'App\\Models\\Auth\\User',59),(3,'App\\Models\\Auth\\User',60),(3,'App\\Models\\Auth\\User',61),(3,'App\\Models\\Auth\\User',62),(3,'App\\Models\\Auth\\User',63),(3,'App\\Models\\Auth\\User',64),(3,'App\\Models\\Auth\\User',65),(3,'App\\Models\\Auth\\User',66),(3,'App\\Models\\Auth\\User',67),(3,'App\\Models\\Auth\\User',68),(3,'App\\Models\\Auth\\User',69),(3,'App\\Models\\Auth\\User',70),(3,'App\\Models\\Auth\\User',71),(3,'App\\Models\\Auth\\User',72),(3,'App\\Models\\Auth\\User',73),(3,'App\\Models\\Auth\\User',74),(3,'App\\Models\\Auth\\User',75),(3,'App\\Models\\Auth\\User',76),(3,'App\\Models\\Auth\\User',77),(3,'App\\Models\\Auth\\User',78),(3,'App\\Models\\Auth\\User',79),(3,'App\\Models\\Auth\\User',80),(3,'App\\Models\\Auth\\User',81),(3,'App\\Models\\Auth\\User',82),(3,'App\\Models\\Auth\\User',83),(3,'App\\Models\\Auth\\User',84),(3,'App\\Models\\Auth\\User',85),(3,'App\\Models\\Auth\\User',86),(3,'App\\Models\\Auth\\User',87),(3,'App\\Models\\Auth\\User',88),(3,'App\\Models\\Auth\\User',89),(3,'App\\Models\\Auth\\User',90),(3,'App\\Models\\Auth\\User',91),(3,'App\\Models\\Auth\\User',92),(3,'App\\Models\\Auth\\User',93),(3,'App\\Models\\Auth\\User',94),(3,'App\\Models\\Auth\\User',95),(3,'App\\Models\\Auth\\User',96),(3,'App\\Models\\Auth\\User',97),(3,'App\\Models\\Auth\\User',98),(3,'App\\Models\\Auth\\User',99),(3,'App\\Models\\Auth\\User',100),(3,'App\\Models\\Auth\\User',101),(3,'App\\Models\\Auth\\User',102),(3,'App\\Models\\Auth\\User',103),(3,'App\\Models\\Auth\\User',104),(3,'App\\Models\\Auth\\User',105),(3,'App\\Models\\Auth\\User',106),(3,'App\\Models\\Auth\\User',107),(3,'App\\Models\\Auth\\User',108),(3,'App\\Models\\Auth\\User',109),(3,'App\\Models\\Auth\\User',110),(3,'App\\Models\\Auth\\User',111),(3,'App\\Models\\Auth\\User',112),(3,'App\\Models\\Auth\\User',113),(3,'App\\Models\\Auth\\User',114),(3,'App\\Models\\Auth\\User',115),(3,'App\\Models\\Auth\\User',116),(3,'App\\Models\\Auth\\User',117),(3,'App\\Models\\Auth\\User',118),(3,'App\\Models\\Auth\\User',119),(3,'App\\Models\\Auth\\User',120),(3,'App\\Models\\Auth\\User',121),(3,'App\\Models\\Auth\\User',122),(3,'App\\Models\\Auth\\User',123),(3,'App\\Models\\Auth\\User',124),(3,'App\\Models\\Auth\\User',125),(3,'App\\Models\\Auth\\User',126),(3,'App\\Models\\Auth\\User',127),(3,'App\\Models\\Auth\\User',128),(3,'App\\Models\\Auth\\User',129),(3,'App\\Models\\Auth\\User',130),(3,'App\\Models\\Auth\\User',131),(3,'App\\Models\\Auth\\User',132),(3,'App\\Models\\Auth\\User',133),(3,'App\\Models\\Auth\\User',134),(3,'App\\Models\\Auth\\User',135),(3,'App\\Models\\Auth\\User',136),(3,'App\\Models\\Auth\\User',137),(3,'App\\Models\\Auth\\User',138),(3,'App\\Models\\Auth\\User',139),(3,'App\\Models\\Auth\\User',140),(3,'App\\Models\\Auth\\User',141),(3,'App\\Models\\Auth\\User',142),(3,'App\\Models\\Auth\\User',143),(3,'App\\Models\\Auth\\User',144),(3,'App\\Models\\Auth\\User',145),(3,'App\\Models\\Auth\\User',146),(3,'App\\Models\\Auth\\User',147),(3,'App\\Models\\Auth\\User',148),(3,'App\\Models\\Auth\\User',149),(3,'App\\Models\\Auth\\User',150),(3,'App\\Models\\Auth\\User',151),(3,'App\\Models\\Auth\\User',152),(3,'App\\Models\\Auth\\User',153),(3,'App\\Models\\Auth\\User',154),(3,'App\\Models\\Auth\\User',155),(3,'App\\Models\\Auth\\User',156),(3,'App\\Models\\Auth\\User',157),(3,'App\\Models\\Auth\\User',158),(3,'App\\Models\\Auth\\User',159),(3,'App\\Models\\Auth\\User',160),(3,'App\\Models\\Auth\\User',161),(3,'App\\Models\\Auth\\User',162),(3,'App\\Models\\Auth\\User',163),(3,'App\\Models\\Auth\\User',164),(3,'App\\Models\\Auth\\User',165),(3,'App\\Models\\Auth\\User',166),(3,'App\\Models\\Auth\\User',167),(3,'App\\Models\\Auth\\User',168),(3,'App\\Models\\Auth\\User',169),(3,'App\\Models\\Auth\\User',170),(3,'App\\Models\\Auth\\User',171),(3,'App\\Models\\Auth\\User',172),(3,'App\\Models\\Auth\\User',173),(3,'App\\Models\\Auth\\User',174),(3,'App\\Models\\Auth\\User',175),(3,'App\\Models\\Auth\\User',176),(3,'App\\Models\\Auth\\User',177),(3,'App\\Models\\Auth\\User',178),(3,'App\\Models\\Auth\\User',179),(3,'App\\Models\\Auth\\User',180),(3,'App\\Models\\Auth\\User',181),(3,'App\\Models\\Auth\\User',182),(3,'App\\Models\\Auth\\User',183),(3,'App\\Models\\Auth\\User',184),(3,'App\\Models\\Auth\\User',185),(3,'App\\Models\\Auth\\User',186),(3,'App\\Models\\Auth\\User',187),(3,'App\\Models\\Auth\\User',188),(3,'App\\Models\\Auth\\User',189),(3,'App\\Models\\Auth\\User',190),(3,'App\\Models\\Auth\\User',191),(3,'App\\Models\\Auth\\User',193),(4,'App\\Models\\Auth\\User',192);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'Mertz-Langworth',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(2,'Feeney Group',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(3,'Parisian Ltd',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(4,'Nolan-Borer',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(5,'Ratke-Prohaska',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(6,'Wolf PLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(7,'Emmerich-Feeney',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(8,'Grant PLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(9,'Carter and Sons',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(10,'Howell LLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(11,'Thompson-Sauer',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(12,'Bosco Group',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(13,'Kuphal, Frami and Nicolas',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(14,'Labadie Inc',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(15,'Koss, Jacobi and Shanahann',1,2,'2020-03-30 09:28:00','2020-04-04 08:42:05'),(16,'Haag, Schulist and Turner',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(17,'Mraz, Sauer and Bruen',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(18,'Skiles-DuBuque',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(19,'Farrell, Cormier and Schoen',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(20,'McClure-Predovic',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(21,'Carter, Cummerata and Rippin',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(22,'Waters-Morar',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(23,'Thiel-Schaefer',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(24,'D\'Amore and Sons',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(25,'Schumm-Schimmel',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(26,'Oberbrunner-Haag',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(27,'Bogisich-Abbott',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(28,'Bechtelar LLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(29,'Waters, Smitham and Donnelly',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(30,'Schmidt-Franecki',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(31,'Strosin LLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(32,'Anderson-Schulist',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(33,'Windler-Dooley',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(34,'Halvorson Group',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(35,'Little, Kemmer and Steuber',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(36,'McLaughlin, Kilback and Zulauf',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(37,'Nader PLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(38,'Hills-Maggio',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(39,'Weissnat, Legros and Walker',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(40,'Farrell, Buckridge and Rogahn',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(41,'Cronin, Gaylord and Weissnat',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(42,'Carter, Casper and West',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(43,'Grady-Schneider',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(44,'Bashirian-Vandervort',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(45,'Green, Roberts and Jenkins',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(46,'Sanford, Dicki and Connelly',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(47,'O\'Keefe Inc',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(48,'Torphy, Beahan and Wisoky',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(49,'Schaden-Ernser',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(50,'Heller-Terry',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(51,'Hermann LLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(52,'Abbott, Rippin and Funk',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(53,'Yost, Gaylord and Mante',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(54,'Gislason-Wunsch',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(55,'Maggio, Olson and Renner',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(56,'Brown-Howell',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(57,'Cruickshank-Lemke',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(58,'Smith, Upton and Brown',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(59,'Shanahan LLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(60,'Graham PLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(61,'Koelpin-Kuvalis',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(62,'Jacobs-Kshlerin',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(63,'Kunze-Klocko',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(64,'Heaney, Stehr and Gerhold',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(65,'Kub Inc',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(66,'Moen-Emmerich',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(67,'Beatty LLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(68,'McKenzie-Wisozk',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(69,'Jacobi PLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(70,'Lindgren-D\'Amore',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(71,'Konopelski, Renner and Goodwin',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(72,'Daugherty, Spinka and King',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(73,'Dickinson, Hegmann and Hayes',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(74,'Bergnaum-Balistreri',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(75,'Schiller-Barton',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(76,'Berge, Yost and Balistreri',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(77,'Harvey-Mante',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(78,'Bailey-Collier',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(79,'Fahey, Lynch and Price',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(80,'Mraz and Sons',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(81,'Schroeder-Lebsack',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(82,'Kovacek, Brown and Hintz',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(83,'Stehr, Bashirian and Nicolas',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(84,'Hilpert LLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(85,'Schuppe-Mertz',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(86,'Davis Ltd',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(87,'Zieme-Grady',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(88,'Feest-Padberg',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(89,'O\'Keefe and Sons',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(90,'Sauer, Bauch and Schiller',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(91,'Cassin PLC',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(92,'Green-Luettgen',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(93,'Miller-Durgan',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(94,'Harris Ltd',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(95,'Carroll-Thiel',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(96,'Friesen, Greenfelder and Bogan',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(97,'Mraz PLC',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(98,'Moore, Gulgowski and Schaden',1,1,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(99,'Glover, Mills and Erdman',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00'),(100,'Ullrich, Kessler and Jones',1,2,'2020-03-30 09:28:00','2020-03-30 09:28:00');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_histories`
--

DROP TABLE IF EXISTS `password_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_histories_user_id_foreign` (`user_id`),
  CONSTRAINT `password_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_histories`
--

LOCK TABLES `password_histories` WRITE;
/*!40000 ALTER TABLE `password_histories` DISABLE KEYS */;
INSERT INTO `password_histories` VALUES (1,1,'$2y$10$nBtOWrFl1WuCrSiDAkV.g.OCm38tdlIwhlAMfPa9kssYhP7KTwEyG','2020-03-20 02:43:27','2020-03-20 02:43:27'),(2,2,'$2y$10$3N/xy8AoKW/7qDdliPkDw.pCdsMqSOrL93AzYUjOK84bl1OsTMf1e','2020-03-20 02:43:27','2020-03-20 02:43:27'),(14,192,'$2y$10$wMlPHukJ.XPyuZx7PPIkUOI1m4iXy3t2YLnbXu/pTeYt/r1q7kTU.','2020-04-04 10:29:56','2020-04-04 10:29:56'),(15,193,'$2y$10$2x0ia/TZGnSq5uhBaUDkjO7wzOtitcXV15IYheCXS1/6jCTAw0Ydy','2020-04-04 10:37:54','2020-04-04 10:37:54');
/*!40000 ALTER TABLE `password_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
INSERT INTO `payment_methods` VALUES (1,'Efectivo','2020-03-30 09:27:58','2020-03-30 09:27:58',NULL),(2,'Tarjeta','2020-03-30 09:27:58','2020-03-30 09:27:58',NULL),(3,'transferencia electronica','2020-05-09 10:04:09','2020-05-09 10:04:09',NULL),(4,'cheque','2020-05-09 10:04:25','2020-05-09 10:04:25',NULL);
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'ver panel','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(2,'metodos de pago','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(3,'productos','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(4,'servicios','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(5,'generar venta','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(6,'ver ventas','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(7,'ingresos','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(8,'categorias de ingresos','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(9,'egresos','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(10,'categorias de egresos','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(11,'notas generales','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(12,'caja chica','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(13,'configuraciones generales','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(14,'clientes','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(15,'colores','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(16,'corte de manga','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(17,'telas','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(18,'lineas','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(19,'tallas','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(20,'unidades de medida','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(21,'materia prima','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(22,'explosion de materiales','web','2020-03-30 09:27:58','2020-03-30 09:27:58');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_colors`
--

DROP TABLE IF EXISTS `product_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `color_id` mediumint(8) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colors`
--

LOCK TABLES `product_colors` WRITE;
/*!40000 ALTER TABLE `product_colors` DISABLE KEYS */;
INSERT INTO `product_colors` VALUES (1,1,1,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(2,2,1,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(3,2,2,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(4,3,1,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(5,3,2,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(6,4,1,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(7,4,2,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(8,5,1,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(9,5,2,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(10,6,1,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(11,6,2,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(12,7,1,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(13,8,5,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(14,9,5,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(15,10,1,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(16,11,1,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(17,11,2,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(18,12,1,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(19,12,2,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(20,13,1,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(21,13,2,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(22,14,1,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(23,14,2,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(24,15,1,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(25,16,1,'2020-02-22 12:44:03','2020-02-22 12:44:03'),(26,17,1,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(27,18,1,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(28,19,1,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(29,20,1,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(30,21,1,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(31,21,2,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(32,21,4,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(33,21,5,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(34,22,1,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(35,22,2,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(36,22,4,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(37,22,5,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(38,23,1,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(39,23,2,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(40,23,4,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(41,23,5,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(42,24,1,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(43,24,2,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(44,24,5,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(45,24,10,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(46,24,13,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(47,24,33,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(48,25,1,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(49,25,2,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(50,25,5,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(51,25,11,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(52,25,14,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(53,26,1,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(54,26,2,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(55,26,5,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(56,26,11,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(57,26,14,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(58,27,5,'2020-02-24 10:19:35','2020-02-24 10:19:35'),(59,28,1,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(60,29,1,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(61,29,5,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(62,29,6,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(63,30,1,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(64,30,5,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(65,30,6,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(66,30,7,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(67,31,1,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(68,31,5,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(69,31,12,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(70,31,31,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(71,31,11,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(72,31,37,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(73,32,1,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(74,32,5,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(75,32,32,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(76,32,12,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(77,32,31,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(78,32,11,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(79,32,37,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(80,33,1,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(81,33,5,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(82,34,1,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(83,34,2,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(84,34,14,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(85,35,2,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(86,35,4,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(87,35,5,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(88,35,31,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(89,35,32,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(90,35,37,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(91,36,2,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(92,36,5,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(93,36,4,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(94,36,31,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(95,36,32,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(96,36,37,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(97,37,1,'2020-02-24 10:52:55','2020-02-24 10:52:55'),(98,37,2,'2020-02-24 10:52:55','2020-02-24 10:52:55'),(99,37,5,'2020-02-24 10:52:55','2020-02-24 10:52:55'),(100,38,26,'2020-02-24 10:54:16','2020-02-24 10:54:16'),(101,39,1,'2020-02-24 10:55:33','2020-02-24 10:55:33'),(102,39,2,'2020-02-24 10:55:33','2020-02-24 10:55:33'),(103,39,3,'2020-02-24 10:55:33','2020-02-24 10:55:33'),(104,39,5,'2020-02-24 10:55:33','2020-02-24 10:55:33'),(105,40,26,'2020-02-24 10:56:17','2020-02-24 10:56:17'),(106,41,2,'2020-02-24 10:57:06','2020-02-24 10:57:06'),(107,42,2,'2020-02-24 11:00:18','2020-02-24 11:00:18'),(108,42,1,'2020-02-24 11:00:18','2020-02-24 11:00:18'),(109,43,26,'2020-02-24 11:01:04','2020-02-24 11:01:04'),(110,44,5,'2020-02-24 11:02:21','2020-02-24 11:02:21'),(111,45,4,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(112,45,2,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(113,45,5,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(114,45,15,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(115,46,45,'2020-02-24 11:31:52','2020-02-24 11:31:52'),(116,46,46,'2020-02-24 11:31:52','2020-02-24 11:31:52'),(117,47,45,'2020-02-24 11:32:50','2020-02-24 11:32:50'),(118,47,46,'2020-02-24 11:32:50','2020-02-24 11:32:50'),(119,48,1,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(120,48,2,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(121,48,5,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(122,48,45,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(123,48,46,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(124,49,1,'2020-02-24 11:36:10','2020-02-24 11:36:10'),(125,50,1,'2020-02-24 11:37:38','2020-02-24 11:37:38'),(126,51,1,'2020-02-24 11:38:18','2020-02-24 11:38:18'),(127,52,1,'2020-02-24 11:39:39','2020-02-24 11:39:39'),(128,53,1,'2020-02-24 11:41:01','2020-02-24 11:41:01'),(129,54,1,'2020-02-24 11:42:03','2020-02-24 11:42:03'),(130,55,1,'2020-02-24 11:43:29','2020-02-24 11:43:29'),(131,56,30,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(132,57,1,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(133,58,92,'2020-02-24 12:03:59','2020-02-24 12:03:59'),(134,58,2,'2020-02-24 12:03:59','2020-02-24 12:03:59'),(135,59,1,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(136,59,2,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(137,2,12,'2020-03-20 10:20:58','2020-03-20 10:20:58'),(138,60,1,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(139,61,1,'2020-05-19 13:52:34','2020-05-19 13:52:34'),(140,62,2,'2020-05-19 14:15:08','2020-05-19 14:15:08');
/*!40000 ALTER TABLE `product_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `old_quantity` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_details_product_id_foreign` (`product_id`),
  CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sale`
--

DROP TABLE IF EXISTS `product_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` mediumint(8) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_sale_sale_id_foreign` (`sale_id`),
  KEY `product_sale_product_id_foreign` (`product_id`),
  CONSTRAINT `product_sale_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `color_size_product` (`id`),
  CONSTRAINT `product_sale_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sale`
--

LOCK TABLES `product_sale` WRITE;
/*!40000 ALTER TABLE `product_sale` DISABLE KEYS */;
INSERT INTO `product_sale` VALUES (1,1,17,2,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(2,1,18,5,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(3,1,19,14,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(4,1,22,5,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(5,1,24,4,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(6,2,17,20,NULL,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(7,2,19,10,NULL,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(8,2,21,10,NULL,'2020-05-09 10:05:21','2020-05-09 10:05:21');
/*!40000 ALTER TABLE `product_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_sizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `size_id` smallint(5) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_sizes`
--

LOCK TABLES `product_sizes` WRITE;
/*!40000 ALTER TABLE `product_sizes` DISABLE KEYS */;
INSERT INTO `product_sizes` VALUES (1,1,18,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(2,1,19,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(3,1,20,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(4,1,21,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(5,1,22,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(6,1,23,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(7,1,24,'2020-02-19 11:05:18','2020-02-19 11:05:18'),(8,2,18,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(9,2,19,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(10,2,20,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(11,2,21,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(12,2,22,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(13,2,23,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(14,2,24,'2020-02-22 12:19:08','2020-02-22 12:19:08'),(15,3,18,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(16,3,19,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(17,3,20,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(18,3,21,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(19,3,22,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(20,3,23,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(21,3,24,'2020-02-22 12:21:40','2020-02-22 12:21:40'),(22,4,18,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(23,4,19,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(24,4,20,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(25,4,21,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(26,4,22,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(27,4,23,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(28,4,24,'2020-02-22 12:23:33','2020-02-22 12:23:33'),(29,5,18,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(30,5,19,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(31,5,20,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(32,5,21,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(33,5,22,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(34,5,23,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(35,5,24,'2020-02-22 12:25:09','2020-02-22 12:25:09'),(36,6,18,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(37,6,19,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(38,6,20,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(39,6,21,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(40,6,22,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(41,6,23,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(42,6,24,'2020-02-22 12:28:33','2020-02-22 12:28:33'),(43,7,18,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(44,7,19,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(45,7,20,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(46,7,21,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(47,7,22,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(48,7,23,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(49,7,24,'2020-02-22 12:30:00','2020-02-22 12:30:00'),(50,8,18,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(51,8,19,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(52,8,20,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(53,8,21,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(54,8,22,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(55,8,23,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(56,8,24,'2020-02-22 12:31:40','2020-02-22 12:31:40'),(57,9,18,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(58,9,19,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(59,9,20,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(60,9,21,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(61,9,22,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(62,9,23,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(63,9,24,'2020-02-22 12:32:38','2020-02-22 12:32:38'),(64,10,1,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(65,10,2,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(66,10,3,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(67,10,4,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(68,10,5,'2020-02-22 12:35:04','2020-02-22 12:35:04'),(69,11,1,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(70,11,2,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(71,11,3,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(72,11,4,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(73,11,5,'2020-02-22 12:37:05','2020-02-22 12:37:05'),(74,12,1,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(75,12,2,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(76,12,3,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(77,12,4,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(78,12,5,'2020-02-22 12:38:21','2020-02-22 12:38:21'),(79,13,2,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(80,13,1,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(81,13,3,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(82,13,4,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(83,13,5,'2020-02-22 12:40:18','2020-02-22 12:40:18'),(84,14,1,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(85,14,2,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(86,14,3,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(87,14,4,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(88,14,5,'2020-02-22 12:41:27','2020-02-22 12:41:27'),(89,15,1,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(90,15,2,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(91,15,3,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(92,15,4,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(93,15,5,'2020-02-22 12:42:29','2020-02-22 12:42:29'),(94,16,1,'2020-02-22 12:44:03','2020-02-22 12:44:03'),(95,16,2,'2020-02-22 12:44:04','2020-02-22 12:44:04'),(96,16,3,'2020-02-22 12:44:04','2020-02-22 12:44:04'),(97,16,4,'2020-02-22 12:44:04','2020-02-22 12:44:04'),(98,16,5,'2020-02-22 12:44:04','2020-02-22 12:44:04'),(99,17,1,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(100,17,2,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(101,17,3,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(102,17,4,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(103,17,5,'2020-02-22 12:45:55','2020-02-22 12:45:55'),(104,18,1,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(105,18,2,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(106,18,3,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(107,18,4,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(108,18,5,'2020-02-22 12:47:25','2020-02-22 12:47:25'),(109,19,1,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(110,19,2,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(111,19,3,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(112,19,4,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(113,19,5,'2020-02-22 12:48:52','2020-02-22 12:48:52'),(114,20,1,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(115,20,2,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(116,20,3,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(117,20,4,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(118,20,5,'2020-02-22 12:50:53','2020-02-22 12:50:53'),(119,21,2,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(120,21,3,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(121,21,4,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(122,21,5,'2020-02-24 09:51:29','2020-02-24 09:51:29'),(123,22,2,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(124,22,3,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(125,22,4,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(126,22,5,'2020-02-24 09:55:26','2020-02-24 09:55:26'),(127,23,2,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(128,23,3,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(129,23,4,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(130,23,5,'2020-02-24 09:56:42','2020-02-24 09:56:42'),(131,24,2,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(132,24,3,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(133,24,4,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(134,24,5,'2020-02-24 10:06:40','2020-02-24 10:06:40'),(135,25,2,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(136,25,3,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(137,25,4,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(138,25,5,'2020-02-24 10:08:30','2020-02-24 10:08:30'),(139,26,2,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(140,26,3,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(141,26,4,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(142,26,5,'2020-02-24 10:18:21','2020-02-24 10:18:21'),(143,27,2,'2020-02-24 10:19:35','2020-02-24 10:19:35'),(144,27,3,'2020-02-24 10:19:35','2020-02-24 10:19:35'),(145,27,4,'2020-02-24 10:19:35','2020-02-24 10:19:35'),(146,27,5,'2020-02-24 10:19:35','2020-02-24 10:19:35'),(147,28,2,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(148,28,1,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(149,28,3,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(150,28,4,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(151,28,5,'2020-02-24 10:21:23','2020-02-24 10:21:23'),(152,29,1,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(153,29,2,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(154,29,3,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(155,29,4,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(156,29,5,'2020-02-24 10:23:11','2020-02-24 10:23:11'),(157,30,1,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(158,30,2,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(159,30,3,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(160,30,4,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(161,30,5,'2020-02-24 10:25:58','2020-02-24 10:25:58'),(162,31,2,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(163,31,3,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(164,31,4,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(165,31,5,'2020-02-24 10:28:34','2020-02-24 10:28:34'),(166,32,2,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(167,32,3,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(168,32,4,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(169,32,5,'2020-02-24 10:41:57','2020-02-24 10:41:57'),(170,33,2,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(171,33,3,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(172,33,4,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(173,33,5,'2020-02-24 10:44:52','2020-02-24 10:44:52'),(174,34,1,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(175,34,2,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(176,34,3,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(177,34,4,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(178,34,5,'2020-02-24 10:46:45','2020-02-24 10:46:45'),(179,35,2,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(180,35,3,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(181,35,4,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(182,35,5,'2020-02-24 10:49:02','2020-02-24 10:49:02'),(183,36,2,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(184,36,3,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(185,36,4,'2020-02-24 10:50:43','2020-02-24 10:50:43'),(186,37,2,'2020-02-24 10:52:55','2020-02-24 10:52:55'),(187,38,40,'2020-02-24 10:54:16','2020-02-24 10:54:16'),(188,39,40,'2020-02-24 10:55:33','2020-02-24 10:55:33'),(189,40,40,'2020-02-24 10:56:17','2020-02-24 10:56:17'),(190,41,40,'2020-02-24 10:57:06','2020-02-24 10:57:06'),(191,42,40,'2020-02-24 11:00:18','2020-02-24 11:00:18'),(192,43,40,'2020-02-24 11:01:04','2020-02-24 11:01:04'),(193,44,40,'2020-02-24 11:02:22','2020-02-24 11:02:22'),(194,45,1,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(195,45,2,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(196,45,3,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(197,45,4,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(198,45,5,'2020-02-24 11:30:17','2020-02-24 11:30:17'),(199,46,40,'2020-02-24 11:31:52','2020-02-24 11:31:52'),(200,47,40,'2020-02-24 11:32:50','2020-02-24 11:32:50'),(201,48,2,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(202,48,3,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(203,48,4,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(204,48,5,'2020-02-24 11:34:31','2020-02-24 11:34:31'),(205,49,2,'2020-02-24 11:36:10','2020-02-24 11:36:10'),(206,49,3,'2020-02-24 11:36:10','2020-02-24 11:36:10'),(207,49,4,'2020-02-24 11:36:10','2020-02-24 11:36:10'),(208,49,5,'2020-02-24 11:36:10','2020-02-24 11:36:10'),(209,50,40,'2020-02-24 11:37:38','2020-02-24 11:37:38'),(210,51,40,'2020-02-24 11:38:18','2020-02-24 11:38:18'),(211,52,40,'2020-02-24 11:39:39','2020-02-24 11:39:39'),(212,53,40,'2020-02-24 11:41:01','2020-02-24 11:41:01'),(213,54,40,'2020-02-24 11:42:03','2020-02-24 11:42:03'),(214,55,40,'2020-02-24 11:43:29','2020-02-24 11:43:29'),(215,56,44,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(216,56,45,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(217,56,46,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(218,56,18,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(219,56,48,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(220,56,19,'2020-02-24 11:48:18','2020-02-24 11:48:18'),(221,57,1,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(222,57,2,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(223,57,3,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(224,57,4,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(225,57,5,'2020-02-24 12:01:23','2020-02-24 12:01:23'),(226,58,41,'2020-02-24 12:03:59','2020-02-24 12:03:59'),(227,58,42,'2020-02-24 12:03:59','2020-02-24 12:03:59'),(228,59,41,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(229,59,43,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(230,59,17,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(231,59,18,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(232,59,49,'2020-02-24 12:05:53','2020-02-24 12:05:53'),(233,2,25,'2020-03-20 10:22:06','2020-03-20 10:22:06'),(234,60,47,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(235,60,49,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(236,60,20,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(237,60,21,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(238,60,22,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(239,60,23,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(240,60,24,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(241,60,25,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(242,60,26,'2020-05-19 13:43:45','2020-05-19 13:43:45'),(243,61,40,'2020-05-19 13:52:34','2020-05-19 13:52:34'),(244,62,1,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(245,62,2,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(246,62,3,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(247,62,4,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(248,62,5,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(249,62,15,'2020-05-19 14:15:08','2020-05-19 14:15:08'),(250,62,16,'2020-05-19 14:15:08','2020-05-19 14:15:08');
/*!40000 ALTER TABLE `product_sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_stock_histories`
--

DROP TABLE IF EXISTS `product_stock_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_stock_histories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_stock_id` bigint(20) unsigned DEFAULT NULL,
  `old_quantity` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_stock_histories`
--

LOCK TABLES `product_stock_histories` WRITE;
/*!40000 ALTER TABLE `product_stock_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_stock_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_stocks`
--

DROP TABLE IF EXISTS `product_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `color_id` mediumint(8) unsigned DEFAULT NULL,
  `size_id` smallint(5) unsigned DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_stocks_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_stocks`
--

LOCK TABLES `product_stocks` WRITE;
/*!40000 ALTER TABLE `product_stocks` DISABLE KEYS */;
INSERT INTO `product_stocks` VALUES (8,NULL,2,1,18,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(9,NULL,2,1,19,40,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(10,NULL,2,1,20,40,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(11,NULL,2,1,21,40,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(12,NULL,2,1,22,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(13,NULL,2,1,23,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(14,NULL,2,1,24,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(15,NULL,2,2,18,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(16,NULL,2,2,19,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(17,NULL,2,2,20,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(18,NULL,2,2,21,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(19,NULL,2,2,22,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(20,NULL,2,2,23,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47'),(21,NULL,2,2,24,0,1,'2020-02-26 16:55:47','2020-02-26 16:55:47');
/*!40000 ALTER TABLE `product_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'ut','1azul',16,27,1,1,'2020-03-20 02:43:28','2020-05-08 14:54:32','2020-05-08 14:54:32'),(2,'Pantalón Jareta Sin Boxer','PAJA01',1,129.6,1,1,'2020-02-22 12:19:08','2020-03-20 10:20:58',NULL),(3,'Pantalón Jareta Con Boxer','PAJA02',1,1,1,1,'2020-02-22 12:21:40','2020-02-22 12:21:40',NULL),(4,'Pantaón jareta Bolsa lateral sin cierre','PAJA03',1,1,1,1,'2020-02-22 12:23:33','2020-02-22 12:23:33',NULL),(5,'Pantalón de Jareta Bolsa lateral con cierre','PAJA04',1,1,1,1,'2020-02-22 12:25:09','2020-02-22 12:25:09',NULL),(6,'Pantalón Jareta Rodillera y cierre','PAJA05',1,1,1,1,'2020-02-22 12:28:33','2020-02-22 12:28:33',NULL),(7,'Pantalon Jareta Rodillera sin cierre','PAJA06',1,1,1,1,'2020-02-22 12:30:00','2020-02-22 12:30:00',NULL),(8,'Pantalon Mezclilla Caballero','PAMC',1,1,1,1,'2020-02-22 12:31:40','2020-02-22 12:31:40',NULL),(9,'Pantalon de mezclilla Dama','PAMD',1,1,1,1,'2020-02-22 12:32:38','2020-02-22 12:32:38',NULL),(10,'Camisola manga larga contactel','CANL',1,1,1,1,'2020-02-22 12:35:04','2020-02-22 12:35:04',NULL),(11,'Camisola trabajo manga larga','CATL',1,1,1,1,'2020-02-22 12:37:05','2020-02-22 12:37:05',NULL),(12,'Camisola trabajo manga corta','CATC',1,1,1,1,'2020-02-22 12:38:21','2020-02-22 12:38:21',NULL),(13,'Camisola seguridad manga larga','CASL',1,1,1,1,'2020-02-22 12:40:18','2020-02-22 12:40:18',NULL),(14,'Camisola seguridad manga corta','CASC',1,1,1,1,'2020-02-22 12:41:27','2020-02-22 12:41:27',NULL),(16,'Playera cuello V 1 frontura','PACVUF',1,1,1,1,'2020-02-22 12:44:03','2020-02-22 12:44:03',NULL),(17,'Playera cuello V 2 fronturas','PACVDF',1,1,1,1,'2020-02-22 12:45:55','2020-02-22 12:45:55',NULL),(18,'Playera cuello V gabardina','PACVG',1,1,1,1,'2020-02-22 12:47:25','2020-02-22 12:47:25',NULL),(19,'Playera POLO manga larga','PAPLDF',1,1,1,1,'2020-02-22 12:48:52','2020-02-22 12:48:52',NULL),(20,'Playera POLO manga larga 1 frontura','PAPLUF',1,1,1,1,'2020-02-22 12:50:53','2020-02-22 12:50:53',NULL),(21,'Playera Polo manga corta 1 frontura','PACPUF',1,1,1,1,'2020-02-24 09:51:29','2020-02-24 09:51:29',NULL),(22,'Playera Polo manga corta 2 frontura','PAPCDF',1,1,1,1,'2020-02-24 09:55:26','2020-02-24 09:55:26',NULL),(23,'Playera Polo manga corta Poliester','PAPOCP',1,1,1,1,'2020-02-24 09:56:42','2020-02-24 09:56:42',NULL),(24,'Sudadera cuello redondo','SUCR',1,1,1,1,'2020-02-24 10:06:40','2020-02-24 10:06:40',NULL),(25,'Sudadera Cangurera Capucha','SUCA',1,1,1,1,'2020-02-24 10:08:30','2020-02-24 10:08:30',NULL),(26,'Sudadera con capucha y cierre','SUCAC',1,1,1,1,'2020-02-24 10:18:21','2020-02-24 10:18:21',NULL),(27,'Chamarra Bacaloni Pro','CHBA',1,1,1,1,'2020-02-24 10:19:35','2020-02-24 10:19:35',NULL),(28,'Bata Laboratorio Manga Larga','BALL',1,1,1,1,'2020-02-24 10:21:23','2020-02-24 10:21:23',NULL),(29,'Filipina Médica Caballero','FIMC',1,1,1,1,'2020-02-24 10:23:11','2020-02-24 10:23:11',NULL),(30,'Filipina Médica Dama','FIMD',1,1,1,1,'2020-02-24 10:25:58','2020-02-24 10:25:58',NULL),(31,'Bata unisex botón oculto manga larga','BAUL',1,1,1,1,'2020-02-24 10:28:34','2020-02-24 10:28:34',NULL),(32,'Bata Unisex botón oculto manga corta','BAUC',1,1,1,1,'2020-02-24 10:41:57','2020-02-24 10:41:57',NULL),(33,'Bata Unisex cierre manga corta','BAUC02',1,2,1,1,'2020-02-24 10:44:52','2020-02-24 10:44:52',NULL),(34,'Filipina Chef unisex Manga 3/4','FICU',1,1,1,1,'2020-02-24 10:46:45','2020-02-24 10:46:45',NULL),(35,'Overol unisex manga larga','OVUL',1,1,1,1,'2020-02-24 10:49:02','2020-02-24 10:49:02',NULL),(36,'Overol unisex manga corta','OVUC',1,1,1,1,'2020-02-24 10:50:43','2020-02-24 10:50:43',NULL),(37,'Mandil sin bolsa unitalla','MASU01',1,1,1,1,'2020-02-24 10:52:55','2020-02-24 10:52:55',NULL),(38,'Mandil son bolsa mezclilla','MASU02',1,1,1,1,'2020-02-24 10:54:16','2020-02-24 10:54:16',NULL),(39,'Mandil bolsa unitalla','MACU01',1,1,1,1,'2020-02-24 10:55:33','2020-02-24 10:55:33',NULL),(40,'Mandil Bolsa mezclilla','MACU02',1,1,1,1,'2020-02-24 10:56:17','2020-02-24 10:56:17',NULL),(41,'Mandil Bistro unitalla','MAUB',1,0,1,1,'2020-02-24 10:57:06','2020-02-24 10:57:06',NULL),(42,'Mandil mesero unitalla','MAMU',1,1,1,1,'2020-02-24 11:00:18','2020-02-24 11:00:18',NULL),(43,'Mandil Kinder unitalla','MAKU',1,1,1,1,'2020-02-24 11:01:04','2020-02-24 11:01:04',NULL),(44,'Casaca Unitalla con bolsa','CAUB',1,1,1,1,'2020-02-24 11:02:21','2020-02-24 11:02:21',NULL),(45,'Chaleco Bacaloni Pro','CHBP',1,1,1,1,'2020-02-24 11:30:17','2020-02-24 11:30:17',NULL),(46,'Chaleco alta visibilidad reflejantes unitalla','CAAV',1,1,1,1,'2020-02-24 11:31:52','2020-02-24 11:31:52',NULL),(47,'Chaleco malla Seguridad reflejantes','CAMS',1,1,1,1,'2020-02-24 11:32:50','2020-02-24 11:32:50',NULL),(48,'Chaleco seguridad gabardina bolsas','CHSG',1,1,1,1,'2020-02-24 11:34:31','2020-02-24 11:34:31',NULL),(49,'Cofia cubreboca y visera','COCV',1,1,1,1,'2020-02-24 11:36:10','2020-02-24 11:36:10',NULL),(50,'Pasamontañas Bacaloni Pro popelina','PABP01',1,1,1,1,'2020-02-24 11:37:38','2020-02-24 11:37:38',NULL),(51,'Pasamontañas bacaloni Pro licra','PABP',1,1,1,1,'2020-02-24 11:38:18','2020-02-24 11:38:18',NULL),(52,'Pasamontañas Bacaloni Pro mitex','PABP03',1,1,1,1,'2020-02-24 11:39:39','2020-02-24 11:39:39',NULL),(53,'Cofia Jareta popelina','COJP',1,1,1,1,'2020-02-24 11:41:01','2020-02-24 11:41:01',NULL),(54,'Escafranda Bacaloni Pro mitex','ESBP01',1,1,1,1,'2020-02-24 11:42:03','2020-02-24 11:42:03',NULL),(55,'Escafandra Bacaloni Pro 80/20','ESBP',1,1,1,1,'2020-02-24 11:43:29','2020-02-24 11:43:29',NULL),(56,'Calcetón borrega unisex','CABU',1,1,1,1,'2020-02-24 11:48:18','2020-02-24 11:48:18',NULL),(57,'Camisola Bolonia cierre manga larga','CABO',1,1,1,1,'2020-02-24 12:01:23','2020-02-24 12:01:23',NULL),(58,'Botin granjas Bacaloni Pro','BOGR',1,1,1,1,'2020-02-24 12:03:59','2020-02-24 12:03:59',NULL),(59,'Huarache EVA','HUGR',1,1,1,1,'2020-02-24 12:05:53','2020-02-24 12:05:53',NULL),(60,'Etiqueta Sublimada Talla Pantalón','ESPAN100',NULL,0.25,1,1,'2020-05-19 13:43:45','2020-05-19 13:43:45',NULL),(61,'Etiqueta Control de Calidad sublimada','ECC100',NULL,0.25,1,1,'2020-05-19 13:52:34','2020-05-19 13:52:34',NULL),(62,'Etiqueta bordada talla Bacaloni Pro','EBTBP100',NULL,0.65,1,1,'2020-05-19 14:15:07','2020-05-19 14:15:07',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(1,2),(1,4),(1,5),(2,1),(3,1),(3,4),(3,5),(4,1),(4,5),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(11,4),(11,5),(12,1),(13,1),(14,1),(14,4),(14,5),(15,1),(15,4),(15,5),(16,1),(16,4),(16,5),(17,1),(17,4),(17,5),(18,1),(18,4),(18,5),(19,1),(19,4),(19,5),(20,1),(20,4),(20,5),(21,1),(21,4),(22,1),(22,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(2,'ejecutivo','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(3,'user','web','2020-03-30 09:27:58','2020-03-30 09:27:58'),(4,'cortador','web','2020-04-04 10:32:06','2020-04-04 10:32:06'),(5,'bordador','web','2020-04-04 10:39:57','2020-04-04 10:39:57');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ticket_text` longtext COLLATE utf8mb4_unicode_ci,
  `payment_method_id` smallint(5) unsigned DEFAULT NULL,
  `audi_id` mediumint(8) unsigned DEFAULT NULL,
  `box` int(10) unsigned DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,28,'granja santa isabel',1,1,NULL,2,NULL,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(2,148,'prueba',3,1,NULL,2,NULL,'2020-05-09 10:05:21','2020-05-09 10:05:21');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (1,'ECH','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(2,'CH','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(3,'M','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(4,'G','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(5,'EG','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(15,'2XL','2020-02-10 12:26:28','2020-02-10 12:26:28',NULL),(16,'3XL','2020-02-10 12:26:39','2020-02-10 12:26:39',NULL),(17,'26','2020-02-10 12:26:49','2020-02-10 12:26:49',NULL),(18,'28','2020-02-10 12:26:56','2020-02-10 12:26:56',NULL),(19,'30','2020-02-10 12:27:07','2020-02-10 12:27:07',NULL),(20,'32','2020-02-10 12:27:18','2020-02-10 12:27:18',NULL),(21,'34','2020-02-10 12:27:35','2020-02-10 12:27:35',NULL),(22,'36','2020-02-10 12:28:29','2020-02-10 12:28:29',NULL),(23,'38','2020-02-10 12:29:19','2020-02-10 12:29:19',NULL),(24,'40','2020-02-10 12:29:25','2020-02-10 12:29:25',NULL),(25,'42','2020-02-10 12:29:32','2020-02-10 12:29:32',NULL),(26,'44','2020-02-10 12:29:39','2020-02-10 12:29:39',NULL),(28,'46','2020-02-10 12:35:52','2020-02-10 12:35:52',NULL),(29,'48','2020-02-10 12:35:58','2020-02-10 12:35:58',NULL),(30,'50','2020-02-10 12:36:04','2020-02-10 12:36:04',NULL),(31,'5 PANT DAMA','2020-02-10 12:36:46','2020-02-10 12:36:46',NULL),(32,'7 PANT DAMA','2020-02-10 12:37:01','2020-02-10 12:37:01',NULL),(33,'9 PANT DAMA','2020-02-10 12:37:15','2020-02-10 12:37:15',NULL),(34,'11 PANT DAMA','2020-02-10 12:37:26','2020-02-10 12:37:26',NULL),(35,'13 PANT DAMA','2020-02-10 12:37:37','2020-02-10 12:37:37',NULL),(36,'15 PANT DAMA','2020-02-10 12:37:50','2020-02-10 12:37:50',NULL),(37,'17 PANT DAMA','2020-02-10 12:38:02','2020-02-10 12:38:02',NULL),(38,'19 PANT DAMA','2020-02-10 12:38:13','2020-02-10 12:38:13',NULL),(39,'21 PANT DAMA','2020-02-10 12:38:24','2020-02-10 12:38:24',NULL),(40,'Unitalla','2020-02-24 10:53:23','2020-02-24 10:53:23',NULL),(41,'22','2020-02-24 11:45:50','2020-02-24 11:45:50',NULL),(42,'23','2020-02-24 11:45:56','2020-02-24 11:45:56',NULL),(43,'24','2020-02-24 11:46:03','2020-02-24 11:46:03',NULL),(44,'25','2020-02-24 11:46:11','2020-02-24 11:46:11',NULL),(45,'26','2020-02-24 11:46:16','2020-02-24 11:46:16',NULL),(46,'27','2020-02-24 11:46:21','2020-02-24 11:46:21',NULL),(47,'28','2020-02-24 11:46:26','2020-02-24 11:46:26',NULL),(48,'29','2020-02-24 11:46:33','2020-02-24 11:46:33',NULL),(49,'30','2020-02-24 11:46:59','2020-02-24 11:46:59',NULL);
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sleeves`
--

DROP TABLE IF EXISTS `sleeves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sleeves` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sleeves`
--

LOCK TABLES `sleeves` WRITE;
/*!40000 ALTER TABLE `sleeves` DISABLE KEYS */;
INSERT INTO `sleeves` VALUES (1,'Corta','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(2,'Larga','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(3,'Musculosa','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(4,'Strapless','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(5,'Tres-cuartos','2020-03-20 02:43:30','2020-03-20 02:43:30',NULL);
/*!40000 ALTER TABLE `sleeves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `small_boxes`
--

DROP TABLE IF EXISTS `small_boxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `small_boxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `small_boxes`
--

LOCK TABLES `small_boxes` WRITE;
/*!40000 ALTER TABLE `small_boxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `small_boxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `small_cards`
--

DROP TABLE IF EXISTS `small_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `small_cards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `small_cards`
--

LOCK TABLES `small_cards` WRITE;
/*!40000 ALTER TABLE `small_cards` DISABLE KEYS */;
/*!40000 ALTER TABLE `small_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_sale`
--

DROP TABLE IF EXISTS `status_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_sale` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` mediumint(8) unsigned DEFAULT NULL,
  `status_id` smallint(5) unsigned DEFAULT NULL,
  `audi_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_sale`
--

LOCK TABLES `status_sale` WRITE;
/*!40000 ALTER TABLE `status_sale` DISABLE KEYS */;
INSERT INTO `status_sale` VALUES (1,1,1,1,'2020-03-20 10:26:21','2020-03-20 10:26:21'),(2,1,3,1,'2020-03-20 10:26:49','2020-03-20 10:26:49'),(3,1,5,1,'2020-04-04 10:50:56','2020-04-04 10:50:56'),(4,1,7,1,'2020-05-08 14:57:02','2020-05-08 14:57:02'),(5,2,1,1,'2020-05-09 10:05:21','2020-05-09 10:05:21'),(6,2,3,1,'2020-05-09 10:09:19','2020-05-09 10:09:19');
/*!40000 ALTER TABLE `status_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `level` smallint(6) DEFAULT NULL,
  `percentage` smallint(6) DEFAULT NULL,
  `to_add_users` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statuses_level_unique` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Inicio de orden','Inicio de orden',-1,10,0,'2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(2,'Final de orden','Final de orden',10,100,0,'2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(3,'Producción','Producción',0,20,0,'2020-03-20 02:43:30','2020-03-20 02:43:30',NULL),(4,'Corte','Corte de  tela y tallas',1,30,1,'2020-03-20 10:36:51','2020-03-20 10:36:51',NULL),(5,'Confección','Maquila de costura',3,50,1,'2020-03-20 10:37:36','2020-03-20 10:38:51',NULL),(6,'Sublimación full print','Sublimación para refilado',2,40,0,'2020-03-20 10:39:22','2020-03-20 10:39:22',NULL),(7,'Personalización de producto','Personalización, bordado, serigrafia,sublimacion o recorte de vinil',4,60,0,'2020-03-20 10:41:19','2020-03-20 10:41:19',NULL),(8,'Revisión final','revisión de final mercancia y empaque para entrega',5,90,0,'2020-03-20 10:42:22','2020-03-20 10:42:22',NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` smallint(5) unsigned DEFAULT NULL,
  `color_id` mediumint(8) unsigned DEFAULT NULL,
  `size_id` smallint(5) unsigned DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'Pieza','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(2,'Paquete','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(3,'Gramo','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(4,'Centimetro','2020-02-05 10:37:12','2020-02-05 10:37:12',NULL),(5,'Kilo','2020-02-19 10:55:21','2020-02-22 11:18:09',NULL),(6,'Par','2020-02-19 10:55:29','2020-02-22 11:18:18',NULL),(7,'Metro','2020-02-19 10:55:37','2020-02-22 11:18:27',NULL),(8,'lámina','2020-02-25 12:36:54','2020-02-25 12:36:54',NULL),(9,'Cono','2020-02-25 13:06:53','2020-02-25 13:06:53',NULL),(10,'Piña','2020-02-25 13:07:03','2020-02-25 13:07:03',NULL),(11,'Frasco','2020-02-25 13:10:16','2020-02-25 13:10:16',NULL),(12,'Bote','2020-02-25 13:10:23','2020-02-25 13:10:23',NULL);
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gravatar',
  `avatar_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_changed_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_be_logged_out` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'807a8339-9497-4f0f-818d-83e3f2344d60','Admin','Istrator','admin@admin.com','gravatar',NULL,'$2y$10$oYFAO7Q.W3s.QzHQQ3nTRetUtBGB3nzE5IZF2zBn5YhW19CozEvPO',NULL,1,'9345ebc889274f63a0736396a9a1a521',1,'America/Mexico_City','2020-05-20 16:50:21','127.0.0.1',0,NULL,'2020-03-06 09:34:42','2020-05-20 16:50:21',NULL),(2,'6a5b890f-d409-4b32-b0a7-30d27a0d64aa','Ejecutivo','Usuario','executive@executive.com','gravatar',NULL,'$2y$10$XXJJEyRpXt3DH8.NyuDxxuwW/84.RcyKDyRhT9Ca8hbwxAe1yL.VG',NULL,1,'2a8eb43b8d721c3699c7a32235396041',1,NULL,NULL,NULL,0,NULL,'2020-03-06 09:34:42','2020-03-06 09:34:42',NULL),(3,'d168ff0d-3b02-4bf1-858d-166aec28e86f','Defecto','Usuario','usuario@usuario.com','gravatar',NULL,'$2y$10$ogm1M.qlnIvTeqTKoWaLZuv/IyRR4KhO4IIYqAA33oWPPnHIUmBNe',NULL,1,'cb308a474d7e26a685b104b5aba364a4',1,NULL,NULL,NULL,0,NULL,'2020-03-06 09:34:42','2020-03-06 09:34:42',NULL),(5,'','Adeti Seguridad Industrial Sa De Cv',' ','facturacion2@adeti.com.mx','gravatar',NULL,NULL,NULL,1,NULL,1,'America/Mexico_City',NULL,NULL,0,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(6,'','Administracion Y Cobranza Integral Sc',' ','oficina@victordeleon.com.mx','gravatar',NULL,NULL,NULL,1,NULL,1,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-03-06 10:39:05',NULL),(7,'','Advics Manufacturing Mexico S. De R.L. De C.V.',' ','leila.castro@advics-mx.com,factsadvics@dimsa.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(8,'','Agroequipos Y Construcciones S.A. De C.V.',' ','administracion@aeco.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(9,'','Agropecuaria Adlt Sa De Cv',' ','marla-icsa@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(10,'','Agropecuaria Nuevo Siglo Sa De Cv',' ','compras@nuevo-siglo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(11,'','Agropecuaria Sanfandila Sa De Cv',' ','encargado.inocuidad@sanfandila.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(12,'','Agropecuaria Santa Teresa Sa De Cv',' ','compras@stateresa.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(13,'','Agropecuario Apoyo De Occidente S.A. De C.V. Sofom E.N.R.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(14,'','Alazan De Lagos S.A De C.V.',' ','emoreno@alazandelagos.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(15,'','Alejandro Muñoz De Anda',' ','alejandrocontador@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(16,'','Alfonso Escobar Ramirez',' ','amparog.pons@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(17,'','Alimentos Bolonia Sa De Cv',' ','martha.mendoza@bolonia.com.mx,aunis.ramirez@bolonia.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(18,'','Alimentos La Concordia Sa De Cv',' ','nbriseno@aldia.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(19,'','Alta Proteina Nutricional, S.A. De C.V.',' ','altaproteinanutricional@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(20,'','Amebeef S.A. De C.V.',' ','compraslm@amebeef.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(21,'','Amparo Gabriela Pons Garza',' ','','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(22,'','Ana Citlalli Torres De Anda',' ','cicel_1@outlook.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(23,'','Ana Nelly Barabata Basurto',' ','cronos1160@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(24,'','Angelica Ramirez Cerrillo',' ','facturacion@arcdiesel.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(25,'','Asociación Angus Mexicana, A.C.',' ','gerenteangusmex@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(26,'','Autos Europeos De Los Altos, S.A. De C.V.',' ','judymasther23@hotmail.comm','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(27,'','Auto Transportes Velazquez Sa De Cv',' ','autotransportes.velazquez@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(28,'','Aves En Desarrollo S.A. De C.V.',' ','facturas.proveedores@ade.com,auxiliar.cce@proan.com,margarita.marquez@proan.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(29,'','Avicola Y Porcicola De Los Altos S.A. De C.V.',' ','addyr17@hotmail.com,logistica@avipor.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(30,'','Azzensu Desarrolladora S.A. De C.V.',' ','constructora-azzequi@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(31,'','Brenda Berenice Cruz Lopez',' ','lacteoslagranreserva@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(32,'','Calzado Guemart Sa De Cv',' ','admon@calzadoguemart.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(33,'','Carlos Alfredo Gonzalez Ortiz',' ','ruth.saavedra@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(34,'','Carmen Liliana Duron Chico',' ','el.carton.lgs@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(35,'','Cecilia Álvarez Márquez',' ','super_sanpedro@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(36,'','Centro De Valor Agregado Lagos De Moreno A.C.',' ','lpalos@cvajalisco.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(37,'','Cesar Damian Gallardo Jimenez',' ','oficina.asm@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(38,'','Club Campestre De Lagos S.A. De C.V.',' ','mauricioalb@hotmiail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(39,'','Colegio Orientacion De Lagos De Moreno A.C.',' ','colegioorientacion@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(40,'','Colegio Teresa De Avila Lagos A.C.',' ','paty_irene@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(41,'','Colinde S.C.',' ','jlcolinde@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(42,'','Comercial Agricola El Sol S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(43,'','Comercializadora Y Transportadora El Pastor Sa De Cv',' ','transporteselpastor@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(44,'','Comercial Laguense, Sa De Cv',' ','almanoriega@coronalagos.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(45,'','Construcciones Martin Bautista Salazar S.A. De C.V.',' ','cortiz@mabasa.com.mx,armandogonzalezderiva@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(46,'','Construcciones Y Servicios De Lagos S.A. De C.V.',' ','contabilidad.conser@outlook.com,contabilidad.conser@outlook.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(47,'','Constructora Azzequi Sa De Cv',' ','constructora_azzequi@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(48,'','Convesa S.A. De C.V.',' ','luisvglez@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(49,'','Corporativo Profesional De Ajustes De Lagos S.C.',' ','corporativodeajustes@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(50,'','David Mercado Aguilera',' ','tadevaporcva@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(51,'','Delicias De Lagos S.A. De C.V.',' ','deliciasdelagos@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(52,'','Diego Eduardo Guerra Márquez',' ','facturas_diego@outlook.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(53,'','Diesel Automotriz De Lagos S.A. De C.V.',' ','dialasa_facturas@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(54,'','Distribuciones Industriales Litoral S.A De C.V.',' ','facturacion.dilsa.jalisco@hotmail.com,adminproyectos@dklokmexico.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(55,'','Distribuidora De Basicos Del Centro S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(56,'','Eldisy De Mexico Sa De Cv',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(57,'','El Sauz Amarillo A.G. S.A. De C.V.',' ','sauzcaja@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(58,'','Enfriadora Bajio De San Jose Sa De Cv',' ','gabilucha760@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(59,'','Enfriadora Jalisciense Sa De Cv',' ','enrique@gserrano.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(60,'','Enrique Gustavo Candiani Y Segura',' ','losfresnosangus@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(61,'','Everardo Aguiñaga Muñoz',' ','agropecuariamarvic@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(62,'','Fabian Ismael Ortiz Marquez',' ','filos_1985@hotmail.com,ventas@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(63,'','Farma Logistic Sa De Cv',' ','manuel@leon_mexico.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(64,'','Felipe De Jesus Hernandez Torres',' ','tmecanica_industrial@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(65,'','Fernanda Del Carmen Escobar Ramirez',' ','grupocastelhondo@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(66,'','Fernando Cardona Hernandez',' ','lafondadelchefe@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(67,'','Fernando Limon Lopez',' ','siccfee@eninfinitum.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(68,'','Ferregon Ag Sa De Cv',' ','cfdi.ferregonag@hotmail.com,ferregonag@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(69,'','Ferremateriales Lozano S.A. De C.V.',' ','ferrematerialeslozano@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(70,'','Ferreteria La Herradura Sa De Cv',' ','aglez7892@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(71,'','Flocar Automotriz De Los Altos Sa De Cv',' ','saog001@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(72,'','Formadora Industrial S.A. De C.V.',' ','fcastillo@panovo.mx,jazminnn304@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(73,'','Fortaleciendo Su Empresa Con Soluciones Sa De Cv',' ','igonzalez@nutrical.com.mx,cdelgado@nutrical.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(74,'','Francisco Javier Gallardo Jimenez',' ','fjaviergaj@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(75,'','Frozen And Food Services Sa De Cv',' ','calidad.frozen@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(76,'','Gabriela Valentina Moreno Perez',' ','notaria5lagos@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(77,'','Gagro Sa De Cv',' ','comprasgagro@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(78,'','Gastronomia La Rinconada Sa De Cv',' ','rinconada.91@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(79,'','Global Ends Sa De Cv',' ','k.mata@globalends.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(80,'','Grupo Alimenticio Mercald S De Rl De Cv',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(81,'','Grupo Industrial Solis Lopez S.A. De C.V.',' ','compras@gisl.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(82,'','Grupo Jchk Sa De Cv',' ','facturasproveedores@grupojchk.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(83,'','Grupo Operador De Guarderías S.C.',' ','guartepeyac@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(84,'','Guadaval Servicos S.A. De C.V.',' ','urania.davalos@administracion.degestec.net','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(85,'','Hector Axel Arzola Serna',' ','aarzola@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(86,'','Hospital Rafael Larios, A.C.',' ','hrafaellarios8010@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(87,'','Hugo Alberto Hernandez Wario',' ','hugoindswario@hotmail.com,ventas@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(88,'','Hugo Manuel Gomez Marquez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(89,'','Instituto Laguense A.C.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(90,'','Instituto Nacional Electoral',' ','agustin.morenog@ine.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(91,'','Instituto Tecnologico Jose Mario Molina Pasquel Y Henriquez',' ','marco.gonzalez@tmm.edu.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(92,'','Instituto Tecnológico Superior De Lagos De Moreno',' ','comprasteclagos@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(93,'','Integradora Central De Servicios Agropecuarios S.A. De C.V.',' ','icsalagos@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(94,'','Integradora De Servicios Express S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(95,'','Italian Coffee Sa De Cv',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(96,'','Jaime Coronado Lamelas',' ','mallacorla@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(97,'','Jaime Zermeño De Alba',' ','Ziber_club@hotmail.com,zerpa_1311@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(98,'','Joel Soto Hernandez',' ','contabilidad@carino.com.mx,ventas@carino.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(99,'','Jorge Alba Gonzalez',' ','trans_viborillas@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(100,'','Jorge Alberto Guerra Marquez',' ','facturas_jorgea@outlook.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(101,'','Jose Artemio Morales Gutierrez',' ','Moralesa_2575@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(102,'','Jose Carrillo Vizcaino',' ','granjacarmelita@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(103,'','Jose De Jesus Muñoz Hernandez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(104,'','Jose De Jesus Ramirez Martinez',' ','shuy_lee@hotmsil.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(105,'','José Enrique Rocha Sandoval',' ','dielagosdemoreno@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(106,'','Jose Francisco Garcia Campos',' ','supercuaco@hotmail.com,supercuacofolios@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(107,'','José Gildardo Guerra González',' ','gilguerra@jacome.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(108,'','Jose Luis Gutierrez Mendoza',' ','jose-luis1000@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(109,'','Jose Trinidad Romo Romo',' ','complementolindavista@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(110,'','Juan Carlos Guerra Martinez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(111,'','Juan Jose Romo Muñoz',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(112,'','Juan Ramon Delgado Cardona',' ','amayrany_radelg@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(113,'','Karla Beatriz Zermeño Quezada',' ','Karla_zq@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(114,'','Karla Paola Barrera Reyes',' ','marla-icsa@hotmail.com,icsalagos@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(115,'','Kayal Multiservicios De Lagos Sa De Cv',' ','kayal.multiservicios@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(116,'','Lacteos Gama S.A. De C.V.',' ','contabilidad@lacteosgama.com,produccion@lacteosgama.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(117,'','Lacteos Gosa S.A. De C.V.',' ','facturas@lacteosgosa.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(118,'','Lacteos Juquira Sa De Cv',' ','lacteosjuquira@yahoo.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(119,'','Lacteos Trici Sa De Cv',' ','lacteostrici67@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(120,'','Lavados Especializados Razo, S.A. De C.V.',' ','lavarazo@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(121,'','Luis Gerardo Gomez Marquez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(122,'','Manuela Acuña Resendez',' ','calzadobiano@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(123,'','Manuel Romo Muñoz',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(124,'','Manufacturas Metalicas Del Bajio S.A. De C.V.',' ','javier.guerra@mmb.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(125,'','Maria De Los Dolores Gonzalez Pedroza',' ','seintegralagos@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(126,'','Maria Del Socorro Rosas Hernandez',' ','quesosayerim@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(127,'','Maria Dolores Padilla Gutierrez',' ','hotel_cuestareal@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(128,'','Maria Fernanda Lopez Rodriguez',' ','mflop09@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(129,'','Maria Guadalupe Marquez Escobedo',' ','mgm_e68@hotamil.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(130,'','Maria Lilia Rodriguez Gallardo',' ','marialilia@misfacturas.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(131,'','Marisela Anguiano Sanchez',' ','rodamientosdejalisco@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(132,'','Mexicana De Lubricantes Sa De Cv',' ','a.arias@akron.com.mx,j.uriostegui@akron.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(133,'','Miguel Dario Vazquez Rodriguez',' ','administracion@consultoriadetecnologia.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(134,'','Miryam Ivonne Marquez Aguilar',' ','evamateriales@gmail.com,produccion.evaligth@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(135,'','Miyazaki Seiko Demexico S.A. De C.V.',' ','msm.facturas@hotmail.com,c.rochas@miyazaki.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(136,'','Municipio De Lagos De Moreno Jalisco',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(137,'','Nutrical S.A. De C.V.',' ','fnaveja@nutrical.com.mx,cdelgado@nutrical.com.mx,aramirez@nutrical.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(138,'','Opal Prehispanicos S.P.R. De R.L. De C.V.',' ','ceylat@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(139,'','Operadora De Hoteles Damago S.A. De C.V.',' ','contacto@lagosinn.com,reservaciones@lagosinn.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(140,'','Operadora De Hoteles Roma S.A. De C.V.',' ','rocma_1881@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(141,'','Operadora Poliforum Conexpo S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(142,'','Oscar Francisco Barba Diaz',' ','comprasbarloz@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(143,'','Oscar Zamora Villaseñor',' ','insumospecuario@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(144,'','Oscar Zurita Paredes',' ','dielz@live.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(145,'','Plaza Capuchinas S.A. De C.V.',' ','plazacapuchinas@yahoo.com.mx,pepe_martap@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(146,'','Porcicultura En Desarrollo S.A. De C.V.',' ','auxiliar.jr@proan.com,compras.syap@syap.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(147,'','Proan Alimentos S De Rl De Cv',' ','edgar.ruiz@proan.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(148,'','Procesadora De Aves De Tepa S.A. De C.V.',' ','carolina.loza@pate.com.mx,compras.pate@pate.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(149,'','Procesadora Tecnologica De Polimeros S.A. De C.V.',' ','yuri.vazquez@plaztek.com.mx,compras@plaztek.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(150,'','Prodelac Sa De Cv',' ','mapaty70@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(151,'','Productos Techani Sa De Cv',' ','contabilidad@dulcesyohari.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(152,'','Proteina Animal Sa De Cv',' ','eloisa.garcia@proan.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(153,'','Proveedores De Maquinaria Y Servicios Agricolas S.A De C.V.',' ','promasagarcias@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(154,'','Quesos Las Mesitas .A De C.V',' ','mesitas203@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(155,'','Ranger By Products Sa De Cv',' ','facturas@rbp.mx,magnolia.brp@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(156,'','Raul Mendoza Montoya',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(157,'','Remolques Futuristas S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(158,'','Roca Venados S.P.R. De R.L. De C.V.',' ','rocavenados@hotmail.com,notaira5lagos@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(159,'','Rodolfo Vazquez Perez',' ','agroproductoselcienegal@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(160,'','Rogelia Martin Duran',' ','labodegadesanjuan@hotmail.com,ventas@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(161,'','Rosalina Ramirez Gomez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(162,'','Ruben Solis Gomez',' ','ruso007@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(163,'','Salvador Flores Hernandez',' ','lacteosdonchava@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(164,'','Salvador Reyes Esparza',' ','cocina.de.maru@outlook.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(165,'','Sara Patricia Godinez De Leon',' ','facturasnpt@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(166,'','Selecper, S.A. De C.V.',' ','igonzalez@nutrical.com.mx,c.delgado@nutrical.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(167,'','Sergio Antonio Hernandez Ruvalcaba',' ','montaje_electrico_ruvalcaba@yahoo.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(168,'','Sergio Cervantes Cardona',' ','ranero_2@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(169,'','Servicio Loma De Lagos S.A. De C.V.',' ','slll2001@prodigy.net.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(170,'','Servicios Y Alimentos Proteinicos Sc De Rl De Cv',' ','delia.loera@plaztek.com.mx,ventas_borrego@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(171,'','Servicio Union A.G. S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(172,'','Sespe Almacen S.A. De C.V.',' ','beatriz@gola.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(173,'','Siconaqui, A.C.',' ','siconaquiac@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(174,'','Sigrid Patricia Gomez Thomsen',' ','swimmingsgt@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(175,'','Teresa Alba Gonzalez',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(176,'','Toda Bella S.De R.L. De C.V.',' ','Todabella-1@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(177,'','Transgran S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(178,'','Transliquidos Refrigerados Lopez S.A. De C.V.',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(179,'','Transliquidos Serra Sa De Cv',' ',NULL,'gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(180,'','Transportadora Gola S.A. De C.V.',' ','cuentasapagar@gola.com.mx,beatriz@gola.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(181,'','Transportadora Tralisol Sa De Cv',' ','cristina@gserrano.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(182,'','Transportes Combustibles Del Bajio Sa De Cv',' ','jose.amador@dicoce.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(183,'','Union De Cooperativas De Consumo Alteñas, S.C. De R.L.',' ','rh@ucca.com.mx,ventas@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(184,'','Universidad De Guadalajara',' ','ruth.saaveedra@lagos.udg.mx,ruth.saavedra@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(185,'','Universidad Univer Del Valle Campus Lagos De Moreno, A.C',' ','finanzas_lagos_carmen@hotmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(186,'','Venta De Mostrador Publico En General',' ','facturas.clientes@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(187,'','Vianney Textil Hogar S.A De C.V.',' ','blanca.aranda@vianney.mx,ventas@sj-uniformes.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(188,'','Victor Becerra Cordoba',' ','direccion@newsoft.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(189,'','Victor Manuel De Leon Santana',' ','seguros@victordeleon.com.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(190,'','Vorwerk Autotec De Mexico',' ','b.gonzalez@vorwerk-automotive.mx','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(191,'','Yadira Janeth Loza Amador',' ','yadira.noticia@gmail.com','gravatar',NULL,NULL,NULL,1,NULL,0,NULL,NULL,NULL,1,NULL,'2020-02-01 10:37:10','2020-02-01 10:37:10',NULL),(192,'5f95d4db-2b34-4506-b513-68941bf24b22','Armando','Reyes','sju.armandor@gmail.com','gravatar',NULL,'$2y$10$wMlPHukJ.XPyuZx7PPIkUOI1m4iXy3t2YLnbXu/pTeYt/r1q7kTU.',NULL,1,'6330063e9c0c73487a0816fa4656e553',1,NULL,NULL,NULL,0,NULL,'2020-04-04 10:29:56','2020-04-04 10:29:56',NULL),(193,'e400e27d-ad10-453a-a177-8cd339089768','Ramón','Martinez','sju.ramonm@gmail.com','gravatar',NULL,'$2y$10$2x0ia/TZGnSq5uhBaUDkjO7wzOtitcXV15IYheCXS1/6jCTAw0Ydy',NULL,1,'ab7d310394482288dfa42c5eddb889fe',1,NULL,NULL,NULL,0,NULL,'2020-04-04 10:37:54','2020-04-04 10:37:54',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-20 11:52:27
