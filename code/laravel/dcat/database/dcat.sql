-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: dcat
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_extension_histories`
--

DROP TABLE IF EXISTS `admin_extension_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_extension_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `version` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_extension_histories_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_extension_histories`
--

LOCK TABLES `admin_extension_histories` WRITE;
/*!40000 ALTER TABLE `admin_extension_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_extension_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_extensions`
--

DROP TABLE IF EXISTS `admin_extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_extensions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_enabled` tinyint(4) NOT NULL DEFAULT '0',
  `options` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_extensions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_extensions`
--

LOCK TABLES `admin_extensions` WRITE;
/*!40000 ALTER TABLE `admin_extensions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `show` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'Index','feather icon-bar-chart-2','/','',1,'2021-04-22 01:33:18',NULL),(2,0,2,'Admin','feather icon-settings','','',1,'2021-04-22 01:33:18',NULL),(3,2,3,'Users','','auth/users','',1,'2021-04-22 01:33:18',NULL),(4,2,4,'Roles','','auth/roles','',1,'2021-04-22 01:33:18',NULL),(5,2,5,'Permission','','auth/permissions','',1,'2021-04-22 01:33:18',NULL),(6,2,6,'Menu','','auth/menu','',1,'2021-04-22 01:33:18',NULL),(7,2,7,'Extensions','','auth/extensions','',1,'2021-04-22 01:33:18',NULL),(8,0,8,'用户','fa-users','users','',1,'2021-04-22 01:57:30','2021-04-22 01:57:30'),(9,0,9,'文章','fa-align-left','posts','',1,'2021-04-23 06:23:08','2021-04-23 06:23:08'),(10,0,10,'评论','fa-angellist','comments','',1,'2021-04-23 06:23:32','2021-04-23 06:23:32'),(11,0,11,'电影','fa-file-movie-o','movies','',1,'2021-04-23 06:23:53','2021-04-23 06:23:53'),(12,0,12,'分类','fa-bars','categories','',1,'2021-04-23 06:25:15','2021-04-23 06:25:15'),(13,0,13,'简介','fa-address-card','profiles','',1,'2021-04-23 06:25:54','2021-04-23 06:25:54'),(14,0,14,'菜单树','fa-anchor','menus','',1,'2021-04-23 09:24:35','2021-04-23 09:24:35');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permission_menu`
--

DROP TABLE IF EXISTS `admin_permission_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_permission_menu` (
  `permission_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_permission_menu_permission_id_menu_id_unique` (`permission_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permission_menu`
--

LOCK TABLES `admin_permission_menu` WRITE;
/*!40000 ALTER TABLE `admin_permission_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_permission_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'Auth management','auth-management','','',1,0,'2021-04-22 01:33:18',NULL),(2,'Users','users','','/auth/users*',2,1,'2021-04-22 01:33:18',NULL),(3,'Roles','roles','','/auth/roles*',3,1,'2021-04-22 01:33:18',NULL),(4,'Permissions','permissions','','/auth/permissions*',4,1,'2021-04-22 01:33:18',NULL),(5,'Menu','menu','','/auth/menu*',5,1,'2021-04-22 01:33:18',NULL),(6,'Extension','extension','','/auth/extensions*',6,1,'2021-04-22 01:33:18',NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_role_menu` (
  `role_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_menu_role_id_menu_id_unique` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,8,'2021-04-22 01:57:30','2021-04-22 01:57:30');
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_permissions`
--

DROP TABLE IF EXISTS `admin_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_role_permissions` (
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_permissions_role_id_permission_id_unique` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_users`
--

DROP TABLE IF EXISTS `admin_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_role_users` (
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `admin_role_users_role_id_user_id_unique` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,'2021-04-22 01:33:18','2021-04-22 01:33:18');
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2021-04-22 01:33:18','2021-04-22 01:33:18');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_settings`
--

DROP TABLE IF EXISTS `admin_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_settings` (
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_settings`
--

LOCK TABLES `admin_settings` WRITE;
/*!40000 ALTER TABLE `admin_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$CAbdWLLA/dtY087gxfA/ju2Y.FqNKhD5PHPf4NMu6AEngtUDiG/eG','Administrator',NULL,'D9SzFjCDIyok5NyjiIY7ccvqYiXSwm7RMM1dzkLrOUFSeNEXzdvh6uWcJaR3','2021-04-22 01:33:18','2021-04-22 01:33:18');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Earum eos qui.',0,7,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(2,'Tempore culpa quos.',1,4,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(3,'Corrupti voluptatem.',0,1,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(4,'Tenetur aut rerum.',2,2,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(5,'Inventore officia.',4,10,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(6,'Ex veniam velit et.',3,1,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(7,'Voluptas aliquid.',5,1,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(8,'Tenetur aut.',4,7,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(9,'Corporis.',4,9,'2021-03-21 09:04:32','2021-03-21 09:04:32'),(10,'Error quam.',2,10,'2021-03-21 09:04:32','2021-03-21 09:04:32');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,9,'23',1,'2021-03-17 22:11:04','2021-03-31 20:58:09'),(2,1,'24',0,'2021-03-17 22:11:04','2021-03-18 22:26:14'),(3,0,'30',1,'2021-03-17 22:11:04','2021-03-18 22:26:19'),(4,9,'2',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(5,4,'5',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(6,1,'5',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(7,7,'30',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(8,7,'17',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(9,10,'23',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(10,1,'15',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(11,6,'3',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(12,6,'10',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(13,8,'18',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(14,4,'2',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(15,1,'0',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(16,7,'26',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(17,3,'20',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(18,7,'13',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(19,5,'5',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(20,2,'6',0,'2021-03-17 22:11:04','2021-03-17 22:11:04');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_04_173148_create_admin_tables',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2020_09_07_090635_create_admin_settings_table',1),(6,'2020_09_22_015815_create_admin_extensions_table',1),(7,'2020_11_01_083237_update_admin_menu_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` int(10) NOT NULL,
  `describe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `released` tinyint(4) NOT NULL,
  `release_at` timestamp NOT NULL DEFAULT '2021-03-05 10:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Mrs. Rosina Jones',3,'Dariana Murphy',15,1,'2021-04-23 08:32:44','2021-03-17 19:15:19','2021-03-17 19:15:19'),(2,'123123',3,'123123',4,1,'2021-03-19 10:58:07','2021-03-17 19:20:56','2021-03-17 19:20:56'),(3,'123123',3,'123123',2,1,'2021-03-19 10:58:07','2021-03-17 19:20:56','2021-03-17 19:20:56'),(4,'123123',1,'123',2,2,'2021-03-18 03:25:07','2021-03-17 19:21:45','2021-03-17 19:21:45'),(5,'123123',1,'123',1,2,'2021-03-18 03:25:08','2021-03-17 19:21:45','2021-03-17 19:21:45'),(6,'123123',1,'123',1,2,'2021-03-18 03:25:10','2021-03-17 19:21:45','2021-03-17 19:21:45'),(7,'123123',3,'123123',3,1,'2021-03-19 10:58:07','2021-03-17 19:21:58','2021-03-17 19:21:58'),(8,'123123',1,'123123',1,1,'2021-03-17 19:25:30','2021-03-17 19:25:30','2021-03-17 19:25:30'),(9,'123123',3,'123123',4,1,'2021-03-19 10:58:07','2021-03-17 19:25:30','2021-03-17 19:25:30'),(10,'123123',3,'123123',2,1,'2021-03-19 10:58:07','2021-03-17 19:25:30','2021-03-17 19:25:30'),(11,'Ernestine Kemmer',1,'Mr. Coty Miller DVM',1,1,'2021-03-17 19:26:34','2021-03-17 19:26:34','2021-03-17 19:26:34'),(12,'Cletus Veum',3,'Dorthy Goyette',0,1,'2021-03-19 10:58:07','2021-03-17 19:26:40','2021-03-17 19:26:40'),(13,'阿斯达',1,'阿斯达',1,2,'2021-03-05 10:00:00',NULL,NULL),(14,'Cortney Howe',3,'Lincoln Rohan MD',2,1,'2021-03-19 10:58:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(15,'Dr. Baby Hintz',9,'Ms. Marquise Leffler',2,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(16,'Alana Hamill',2,'Morton Simonis',2,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(17,'Lea Wunsch',1,'Ilene Howe',0,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(18,'Shaina Cormier III',10,'Makenzie Beahan PhD',0,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(19,'Weldon Lind',6,'Emile Anderson',3,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(20,'Pansy Bradtke',1,'Jamarcus Mann',4,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(21,'Graciela Brown',4,'Faye Hauck',1,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(22,'Mrs. Clare Conn',6,'Miss Jolie Yost',1,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(23,'Lula Harber',4,'Delmer Kuhlman',3,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(24,'Ayana Rutherford',1,'Chelsie Monahan',4,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(25,'Princess Balistreri',3,'Linda Hegmann',1,1,'2021-03-19 10:58:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(26,'Jonathon McLaughlin',1,'Vida Roob',3,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(27,'Agustin King',4,'Dr. Layne Batz V',4,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(28,'Eric King',7,'Dr. Danyka Pfannerstill',2,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(29,'Chad Lubowitz',9,'Dr. Kamren Adams II',0,0,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(30,'Andreane Lowe',4,'Tate Walter',4,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(31,'Johnathon Frami',10,'Prof. Dawson Rogahn DDS',1,1,'2021-03-17 19:56:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(32,'Ms. Elisa Stroman V',3,'Amelie Goyette V',0,1,'2021-03-19 10:58:07','2021-03-17 19:56:07','2021-03-17 19:56:07'),(33,'Miss Lorena Brakus',2,'Dr. Ethel Glover123123',4,1,'2021-03-19 17:07:15','2021-03-17 19:56:08','2021-03-19 09:07:15');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `action` tinyint(4) DEFAULT '0',
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json1` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Prof.','I\'m not Ada,\' she said, \'for her hair goes in such a dreadful time.\' So Alice began telling them her adventures from the Gryphon, and, taking Alice by the fire, licking her paws and washing her.','2021-03-17 23:39:54','2021-03-21 03:03:08',NULL,0,'image/头像.png','{\"key1\": \"123\", \"key3\": \"2021-03-21 00:00:00\", \"key4\": \"2021-03-26\", \"key5\": \"2021-03-27\", \"email\": \"dsa2@aa.cn\"}'),(2,'Mrs.','Caterpillar. This was such a dear little puppy it was!\' said Alice, and she went on, \'\"--found it advisable to go with the words all coming different, and then dipped suddenly down, so suddenly that.','2021-03-17 23:39:54','2021-03-20 21:12:34',NULL,0,NULL,NULL),(3,'Prof.','All the time at the Duchess sneezed occasionally; and as it happens; and if it had entirely disappeared; so the King said, turning to Alice severely. \'What are they doing?\' Alice whispered to the.','2021-03-17 23:39:54','2021-03-19 08:58:59',NULL,0,NULL,NULL),(4,'Prof.','Duchess. \'Everything\'s got a moral, if only you can find out the verses on his knee, and looking anxiously about as she added, to herself, \'whenever I eat or drink something or other; but the tops.','2021-03-17 23:39:54','2021-03-19 08:44:40',NULL,0,NULL,NULL),(5,'Mrs.','THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never even introduced to a snail. \"There\'s a porpoise close behind her, listening: so she began fancying the sort of lullaby to it in large letters.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(6,'Dr.','I see\"!\' \'You might just as she spoke; \'either you or your head must be Mabel after all, and I shall have to turn into a graceful zigzag, and was coming back to them, and he says it\'s so useful.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(7,'Prof.','Hatter: and in despair she put one arm out of the officers: but the Hatter continued, \'in this way:-- \"Up above the world you fly, Like a tea-tray in the other. In the very middle of the creature.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(8,'Prof.','Alice thought she might as well as she did not sneeze, were the cook, and a large ring, with the Gryphon. \'--you advance twice--\' \'Each with a smile. There was a sound of many footsteps, and Alice.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(9,'Mrs.','White Rabbit, who was beginning to end,\' said the Dormouse: \'not in that ridiculous fashion.\' And he added in a melancholy way, being quite unable to move. She soon got it out into the Dormouse\'s.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(10,'Dr.','The pepper when he sneezes: He only does it matter to me whether you\'re a little sharp bark just over her head pressing against the door, and the turtles all advance! They are waiting on the.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(11,'Mrs.','I must be collected at once took up the chimney, and said \'What else have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then dipped suddenly down, so suddenly that.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(12,'Miss','Alice; \'I must go and get ready for your walk!\" \"Coming in a deep voice, \'What are they doing?\' Alice whispered to the Caterpillar, just as well. The twelve jurors were writing down \'stupid things!\'.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,0,NULL,NULL),(13,'Ms.','Mock Turtle, and to stand on their slates, \'SHE doesn\'t believe there\'s an atom of meaning in it,\' but none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, \'and I\'ll tell.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(14,'Prof.','Nile On every golden scale! \'How cheerfully he seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure those are not the right size to do that,\'.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,0,NULL,NULL),(15,'Dr.','WOULD twist itself round and swam slowly back to them, they were gardeners, or soldiers, or courtiers, or three pairs of tiny white kid gloves: she took courage, and went stamping about, and make.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,0,NULL,NULL),(16,'Prof.','Hatter were having tea at it: a Dormouse was sitting on the top of her own children. \'How should I know?\' said Alice, whose thoughts were still running on the trumpet, and called out \'The Queen! The.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(17,'Miss','Forty-two. ALL PERSONS MORE THAN A MILE HIGH TO LEAVE THE COURT.\' Everybody looked at Two. Two began in a furious passion, and went on again:-- \'I didn\'t know how to speak with. Alice waited.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,0,NULL,NULL),(18,'Mr.','White Rabbit hurried by--the frightened Mouse splashed his way through the wood. \'It\'s the oldest rule in the after-time, be herself a grown woman; and how she would manage it. \'They were learning.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(19,'Dr.','The first witness was the King; and the poor little thing was to twist it up into the earth. Let me see: four times five is twelve, and four times six is thirteen, and four times seven is--oh dear!.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(20,'Mr.','Hatter. \'You MUST remember,\' remarked the King, rubbing his hands; \'so now let the Dormouse began in a minute or two sobs choked his voice. \'Same as if he had a large rabbit-hole under the sea,\' the.','2021-03-17 23:39:54','2021-03-17 23:39:54',NULL,1,NULL,NULL),(21,'Eos cupiditate quia.','All on a little shaking among the trees, a little while, however, she went on in a fight with another hedgehog, which seemed to be talking in a hoarse growl, \'the world would go round and round the.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(22,'Nulla deserunt aut.','YET,\' she said to herself what such an extraordinary ways of living would be a LITTLE larger, sir, if you drink much from a bottle marked \'poison,\' it is all the things being alive; for instance.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(23,'Totam eos eos.','Alice had been for some minutes. The Caterpillar and Alice rather unwillingly took the least notice of them bowed low. \'Would you like the look of the e--e--evening, Beautiful, beautiful Soup!\'.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(24,'Odio vel dolorum.','Gryphon interrupted in a rather offended tone, \'so I should frighten them out of sight: then it chuckled. \'What fun!\' said the King. \'When did you manage on the top of it. She felt very lonely and.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(25,'Totam et.','Her first idea was that you weren\'t to talk to.\' \'How are you getting on?\' said the Mouse, in a moment: she looked at Alice, as she was looking down with one eye; but to get out again. The.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(26,'Aut occaecati.','I\'ve seen that done,\' thought Alice. \'I don\'t much care where--\' said Alice. \'Did you say it.\' \'That\'s nothing to do: once or twice she had a bone in his note-book, cackled out \'Silence!\' and read.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(27,'Ut ullam in atque.','For anything tougher than suet; Yet you finished the goose, with the game,\' the Queen left off, quite out of the baby, and not to be lost, as she could. \'The game\'s going on shrinking rapidly: she.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(28,'Neque enim.','Alice; \'you needn\'t be so stingy about it, so she began shrinking directly. As soon as it can\'t possibly make me giddy.\' And then, turning to Alice for protection. \'You shan\'t be able! I shall have.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(29,'Aut blanditiis.','Mock Turtle persisted. \'How COULD he turn them out of the garden, where Alice could not make out who was reading the list of singers. \'You may not have lived much under the sea,\' the Gryphon.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(30,'Assumenda nihil ad.','And the Gryphon answered, very nearly getting up and leave the court; but on second thoughts she decided to remain where she was now about a foot high: then she heard a little of it?\' said the.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(31,'Dolorem sed iure.','How queer everything is to-day! And yesterday things went on muttering over the jury-box with the Queen, tossing her head in the chimney as she went on, \'What HAVE you been doing here?\' \'May it.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(32,'Ad aliquid id.','Mouse in the beautiful garden, among the party. Some of the e--e--evening, Beautiful, beauti--FUL SOUP!\' \'Chorus again!\' cried the Mock Turtle, suddenly dropping his voice; and the soldiers did.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(33,'Id in neque quo qui.','Paris is the use of a procession,\' thought she, \'what would become of me?\' Luckily for Alice, the little golden key and hurried off to other parts of the miserable Mock Turtle. Alice was not an.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(34,'Aperiam quia totam.','Tortoise--\' \'Why did you manage on the other side. The further off from England the nearer is to France-- Then turn not pale, beloved snail, but come and join the dance. Will you, won\'t you, will.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(35,'Sapiente ea et.','So she began: \'O Mouse, do you call it purring, not growling,\' said Alice. \'Call it what you mean,\' the March Hare. \'Yes, please do!\' but the Rabbit came near her, she began, in a languid, sleepy.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(36,'Illum quidem omnis.','Alice panted as she went back to the Gryphon. \'It all came different!\' the Mock Turtle: \'crumbs would all wash off in the pool, \'and she sits purring so nicely by the time he had to stop and untwist.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(37,'Harum aliquam quas.','Alice had begun to think about it, even if I shall ever see you again, you dear old thing!\' said the Pigeon; \'but if they do, why then they\'re a kind of authority over Alice. \'Stand up and leave the.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(38,'Doloribus nobis qui.','They\'re dreadfully fond of pretending to be a great hurry; \'and their names were Elsie, Lacie, and Tillie; and they sat down and make THEIR eyes bright and eager with many a strange tale, perhaps.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(39,'Commodi occaecati.','WAS a narrow escape!\' said Alice, and tried to speak, and no more of it now in sight, hurrying down it. There was exactly three inches high). \'But I\'m not Ada,\' she said, as politely as she was as.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,1,NULL,NULL),(40,'Iure laudantium.','Alice found at first was moderate. But the snail replied \"Too far, too far!\" and gave a sudden burst of tears, \'I do wish I hadn\'t mentioned Dinah!\' she said these words her foot slipped, and in.','2021-03-18 18:59:30','2021-03-18 18:59:30',NULL,0,NULL,NULL),(41,'Ea qui officiis aut.','King said, for about the twentieth time that day. \'No, no!\' said the King; and the Dormouse again, so violently, that she began thinking over all she could do, lying down with her head!\' Those whom.','2021-03-18 19:02:07','2021-03-18 19:02:07',NULL,1,NULL,NULL),(42,'Dolor aut et est.','Alice. \'I wonder what you\'re doing!\' cried Alice, quite forgetting that she did so, very carefully, with one foot. \'Get up!\' said the Knave, \'I didn\'t write it, and yet it was very nearly getting up.','2021-03-18 19:02:07','2021-03-18 19:02:07',NULL,1,NULL,NULL),(43,'Vel nostrum omnis.','And how odd the directions will look! ALICE\'S RIGHT FOOT, ESQ. HEARTHRUG, NEAR THE FENDER, (WITH ALICE\'S LOVE). Oh dear, what nonsense I\'m talking!\' Just then she noticed that the mouse doesn\'t get.','2021-03-18 19:02:07','2021-03-18 19:02:07',NULL,1,NULL,NULL),(44,'Laboriosam rerum.','The Frog-Footman repeated, in the sand with wooden spades, then a voice she had never left off staring at the thought that SOMEBODY ought to be seen--everything seemed to listen, the whole party.','2021-03-18 19:02:07','2021-03-18 19:02:07',NULL,1,NULL,NULL),(45,'Omnis quia qui quia.','Rabbit began. Alice thought she had wept when she was as much as she went on growing, and, as the Dormouse go on with the bread-and-butter getting so far off). \'Oh, my poor little thing sobbed again.','2021-03-18 19:02:07','2021-03-18 19:02:07',NULL,1,NULL,NULL),(46,'Prof. Emely Daugherty IV','Now you know.\' \'I don\'t see,\' said the Duchess, it had fallen into a small passage, not much like keeping so close to her, still it was over at last, and they walked off together, Alice heard the.','2021-03-18 19:03:40','2021-03-18 19:03:40',NULL,1,NULL,NULL),(47,'Dr. Marvin Brakus V','I to get out at the cook had disappeared. \'Never mind!\' said the Dormouse; \'--well in.\' This answer so confused poor Alice, and tried to look down and make out what she was always ready to talk.','2021-03-18 19:03:40','2021-03-18 19:03:40',NULL,1,NULL,NULL),(48,'Yazmin O\'Keefe IV','Why, I wouldn\'t be so easily offended, you know!\' The Mouse only shook its head impatiently, and said, \'It WAS a narrow escape!\' said Alice, \'I\'ve often seen a cat without a great many more than.','2021-03-18 19:03:40','2021-03-18 19:03:40',NULL,1,NULL,NULL),(49,'Prof. Monique Glover','King, the Queen, in a great deal of thought, and it was too dark to see anything; then she noticed a curious plan!\' exclaimed Alice. \'And be quick about it,\' said Alice, always ready to ask them.','2021-03-18 19:03:40','2021-03-18 19:03:40',NULL,1,NULL,NULL),(50,'Ruth Schmitt','Alice. \'Anything you like,\' said the Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice loudly. \'The idea of having the sentence first!\' \'Hold your tongue, Ma!\' said the.','2021-03-18 19:03:40','2021-03-18 19:03:40',NULL,0,NULL,NULL),(51,'楚国庆','I dare say there may be ONE.\' \'One, indeed!\' said the Mouse, getting up and walking away. \'You insult me by talking such nonsense!\' \'I didn\'t know that Cheshire cats always grinned; in fact, a sort.','2021-03-18 19:06:25','2021-03-18 19:06:25',NULL,0,NULL,NULL),(52,'牛志诚','Caterpillar. Alice said to herself in Wonderland, though she knew the right words,\' said poor Alice, who felt ready to agree to everything that was lying under the sea,\' the Gryphon remarked.','2021-03-18 19:06:25','2021-03-18 19:06:25',NULL,0,NULL,NULL),(53,'房腊梅','Gryphon. Alice did not come the same words as before, \'It\'s all about as much as she swam about, trying to invent something!\' \'I--I\'m a little scream, half of them--and it belongs to a shriek, \'and.','2021-03-18 19:06:25','2021-03-18 19:06:25',NULL,0,NULL,NULL),(54,'裴阳','Do you think, at your age, it is almost certain to disagree with you, sooner or later. However, this bottle was a dispute going on shrinking rapidly: she soon made out the proper way of expecting.','2021-03-18 19:06:25','2021-03-18 19:06:25',NULL,1,NULL,NULL),(55,'练秀英','King said to herself. At this moment the door that led into the court, arm-in-arm with the Gryphon. \'Then, you know,\' the Hatter went on, \'if you don\'t explain it is I hate cats and dogs.\' It was.','2021-03-18 19:06:25','2021-03-18 19:06:25',NULL,0,NULL,NULL),(56,'律师','Mock Turtle replied, counting off the subjects on his slate with one finger; and the soldiers had to kneel down on their throne when they saw her, they hurried back to her: first, because the.','2021-03-18 19:09:24','2021-03-18 19:09:24',NULL,0,NULL,NULL),(57,'医生','Alice: \'--where\'s the Duchess?\' \'Hush! Hush!\' said the King, going up to the table, but it is.\' \'I quite agree with you,\' said the Hatter. \'I deny it!\' said the Queen, stamping on the stairs. Alice.','2021-03-18 19:09:24','2021-03-18 19:09:24',NULL,1,NULL,NULL),(58,'老师','Queen in a day or two: wouldn\'t it be murder to leave off being arches to do it?\' \'In my youth,\' said his father, \'I took to the Mock Turtle yawned and shut his note-book hastily. \'Consider your.','2021-03-18 19:09:24','2021-03-18 19:09:24',NULL,0,NULL,NULL),(59,'经理','So she was exactly one a-piece all round. (It was this last remark, \'it\'s a vegetable. It doesn\'t look like it?\' he said, \'on and off, for days and days.\' \'But what did the archbishop find?\' The.','2021-03-18 19:09:24','2021-03-18 19:09:24',NULL,1,NULL,NULL),(60,'教授','THAT direction,\' waving the other was sitting on a crimson velvet cushion; and, last of all this grand procession, came THE KING AND QUEEN OF HEARTS. Alice was a long argument with the strange.','2021-03-18 19:09:24','2021-03-18 19:09:24',NULL,0,NULL,NULL),(61,'Prof.','I\'m not Ada,\' she said, \'for her hair goes in such a dreadful time.\' So Alice began telling them her adventures from the Gryphon, and, taking Alice by the fire, licking her paws and washing her.','2021-03-19 01:19:42','2021-03-19 01:19:42',NULL,1,NULL,NULL),(62,'Prof.','I\'m not Ada,\' she said, \'for her hair goes in such a dreadful time.\' So Alice began telling them her adventures from the Gryphon, and, taking Alice by the fire, licking her paws and washing her.','2021-03-19 01:24:06','2021-03-19 01:24:06',NULL,1,NULL,NULL),(63,'Mrs.','Caterpillar. This was such a dear little puppy it was!\' said Alice, and she went on, \'\"--found it advisable to go with the words all coming different, and then dipped suddenly down, so suddenly that.','2021-03-19 01:24:06','2021-03-19 01:24:06',NULL,1,NULL,NULL),(64,'123123aedasd','asdasda','2021-03-20 19:34:40','2021-03-20 19:43:39',NULL,0,NULL,NULL),(65,'公司简介(图2)','zdasdasd','2021-03-20 21:28:09','2021-03-20 21:49:23',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `age` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,9,'23',1,'2021-03-17 22:11:04','2021-03-31 20:58:09'),(2,1,'24',0,'2021-03-17 22:11:04','2021-03-18 22:26:14'),(3,0,'30',1,'2021-03-17 22:11:04','2021-03-18 22:26:19'),(4,9,'2',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(5,4,'5',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(6,1,'5',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(7,7,'30',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(8,7,'17',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(9,10,'23',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(10,1,'15',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(11,6,'3',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(12,6,'10',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(13,8,'18',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(14,4,'2',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(15,1,'0',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(16,7,'26',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(17,3,'20',1,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(18,7,'13',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(19,5,'5',0,'2021-03-17 22:11:04','2021-03-17 22:11:04'),(20,2,'6',0,'2021-03-17 22:11:04','2021-03-17 22:11:04');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'Chanel Blanda','glennie04@example.net','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','5CvQ4zC7ko','2021-03-17 19:30:08','2021-04-23 06:27:42',0),(2,'Prof. Shany Brekke','gkautzer@example.org','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','7AIAiitj4Z','2021-03-17 19:30:08','2021-03-17 19:30:08',0),(3,'Serenity Yost','loren67@example.com','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Ws4exyR6eo','2021-03-17 19:30:08','2021-03-17 19:30:08',1),(4,'Levi Wilkinson','jessie.price@example.com','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','ShjWERSrNr','2021-03-17 19:30:08','2021-03-17 19:30:08',1),(5,'Miss Blanca Reinger II','arianna.moen@example.net','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','IGRMa8mS8d','2021-03-17 19:30:08','2021-03-17 19:30:08',1),(6,'Dr. Shane Bogisich DVM','glabadie@example.org','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','WTnnPMgWW6','2021-03-17 19:30:08','2021-03-17 19:30:08',0),(7,'Marjorie Fisher III','zdamore@example.net','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','lSxhWa24G1','2021-03-17 19:30:08','2021-03-17 19:30:08',1),(8,'Ms. Lora Dickinson IV','idurgan@example.org','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','D8Eq2VeaaN','2021-03-17 19:30:08','2021-03-17 19:30:08',0),(9,'Richard Doyle','rutherford.reilly@example.net','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','LvNqe0IjQE','2021-03-17 19:30:08','2021-03-17 19:30:08',0),(10,'Elouise Gottlieb MD','kieran.blanda@example.org','2021-03-17 19:30:08','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','LzuXnpPhWp','2021-03-17 19:30:08','2021-03-17 19:30:08',1),(1,'奥术大师','ah@a.cn','2021-03-03 03:32:49','$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','LzuXnpPhWp',NULL,NULL,0);
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

-- Dump completed on 2021-04-23 17:50:25
