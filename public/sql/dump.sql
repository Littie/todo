-- MySQL dump 10.14  Distrib 5.5.47-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: todo
-- ------------------------------------------------------
-- Server version	5.5.47-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Work','2016-06-02 04:20:54','2016-06-02 04:20:54'),(2,'Home','2016-06-02 04:22:22','2016-06-02 04:22:22'),(3,'School','2016-06-02 04:23:33','2016-06-02 04:23:33'),(5,'Education','2016-06-08 11:26:20','2016-06-08 11:26:20');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_06_01_141525_add_role_field',2),('2016_06_02_065651_create_tasks_table',3),('2016_06_02_070839_create_groups_table',3),('2016_06_03_150724_add_email_confirmation_fields',4),('2016_06_06_151424_add_check_field',5),('2016_06_07_101610_creat_reminder_field',6),('2016_06_07_154545_create_is_overdue_field',7),('2016_06_08_131936_create_is_delete_field',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_check` tinyint(1) NOT NULL,
  `is_overdue` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `reminder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Go to school','I am going to school','2016-06-05 08:00:00',1,0,1,2,3,'2016-06-07 16:06:01','2016-06-02 04:34:31','2016-06-07 13:06:01'),(2,'Go to ','I am going to home guest ','2016-06-17 16:00:00',1,0,0,2,3,'0000-00-00 00:00:00','2016-06-02 04:48:45','2016-06-06 06:44:37'),(3,'Go to work','I am going to work ehh','2016-06-12 16:00:00',0,0,0,2,1,'0000-00-00 00:00:00','2016-06-02 04:50:47','2016-06-06 06:41:51'),(4,'Go to work again','I am going to work again','2016-03-31 21:10:00',1,0,1,2,1,'2016-06-07 16:06:01','2016-06-02 04:52:49','2016-06-07 13:06:01'),(5,'Go to home again','I am going to home again','2016-06-11 17:00:00',0,1,0,2,2,'2016-06-07 15:52:59','2016-06-02 04:53:32','2016-06-07 12:38:59'),(6,'User 2 go home','User 2 go home again','2016-06-11 17:00:00',0,0,0,3,1,'0000-00-00 00:00:00','2016-06-03 04:53:32','2016-06-03 04:12:55'),(7,'Automatic create task','Automatic create task','2016-06-12 16:00:00',0,0,0,2,3,'2016-06-07 15:26:22','2016-06-03 07:11:15','2016-06-03 07:11:15'),(8,'Automatic create task 2','Automatic create task 2','2016-06-12 16:00:00',0,1,0,2,2,'2016-06-07 15:38:57','2016-06-03 07:13:19','2016-06-07 12:38:57'),(9,'Artem Birthday You','Happy birthday Artem','2016-06-17 17:00:00',1,0,0,2,2,'0000-00-00 00:00:00','2016-06-03 10:24:21','2016-06-07 05:03:46'),(10,'Guest 1','Hello hello hello','2016-06-15 09:30:00',0,0,0,3,2,'0000-00-00 00:00:00','2016-06-04 03:30:14','2016-06-04 03:30:14'),(11,'Vasja task','Vasja new task','2016-06-21 20:00:00',0,0,0,18,3,'2016-06-07 14:48:22','2016-06-04 10:25:54','2016-06-06 03:43:50'),(12,'Hello world','Hello world!!!','2016-06-14 20:00:00',0,0,0,2,3,'0000-00-00 00:00:00','2016-06-06 04:45:24','2016-06-07 04:35:54'),(13,'Artem task','Hello Artem ','2016-06-12 16:00:00',0,0,0,2,2,'0000-00-00 00:00:00','2016-06-06 06:46:54','2016-06-06 06:46:54'),(14,'Today 0','Today 0','2016-06-07 17:30:00',1,0,1,2,1,'2016-06-07 16:14:09','2016-06-06 09:46:26','2016-06-07 13:14:09'),(15,'Today 11','Today 1111','2016-06-08 18:42:00',0,0,1,2,3,'2016-06-08 15:43:02','2016-06-06 09:47:00','2016-06-08 12:43:02'),(16,'Today 2','Today 2','2016-06-06 18:00:00',1,1,1,2,2,'2016-06-07 16:06:01','2016-06-06 09:47:28','2016-06-07 13:06:01'),(17,'Yesterday','Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday Yesterday ','2016-06-07 21:00:00',0,1,1,2,1,'2016-06-08 06:07:26','2016-06-06 10:59:14','2016-06-08 03:07:26'),(18,'One two three','One two three','2016-06-10 16:00:00',0,0,0,2,2,'0000-00-00 00:00:00','2016-06-07 04:09:55','2016-06-07 04:09:55'),(19,'Time','afafasdfas','2016-06-08 09:34:00',0,1,1,2,2,'2016-06-08 06:36:27','2016-06-07 09:37:46','2016-06-08 03:33:02'),(20,'Minuto','Minuto','2016-06-07 22:16:00',0,1,1,2,1,'2016-06-08 06:07:31','2016-06-07 09:54:00','2016-06-08 03:07:31'),(21,'Secundo','Secundo do','2016-07-06 20:00:00',0,0,0,2,2,'2016-06-07 13:15:11','2016-06-07 10:15:11','2016-06-07 10:15:11'),(22,'Menuto','Menuto','2016-06-07 22:19:00',0,1,1,2,1,'2016-06-08 06:07:32','2016-06-07 10:16:16','2016-06-08 03:07:32'),(23,'NOw','Now now now','2016-06-07 19:45:00',0,1,1,2,2,'2016-06-08 06:07:23','2016-06-07 13:15:18','2016-06-08 03:07:23'),(24,'NOw','Now now now','2016-06-07 20:19:00',0,1,1,2,2,'2016-06-08 06:07:25','2016-06-07 13:17:11','2016-06-08 03:07:25'),(25,'Now',';lkja;sdkfja;sldkf','2016-06-07 21:00:00',0,1,1,2,2,'2016-06-08 06:07:27','2016-06-07 13:17:37','2016-06-08 03:07:27'),(26,'Now',';lkja;sdkfja;sldkf','2016-06-07 21:00:00',0,1,1,2,2,'2016-06-08 06:07:28','2016-06-07 13:18:11','2016-06-08 03:07:28'),(27,'Now',';lkja;sdkfja;sldkf','2016-06-07 21:00:00',0,1,1,2,2,'2016-06-08 06:07:29','2016-06-07 13:18:24','2016-06-08 03:07:29'),(39,'Task new','New Task created','2016-06-07 22:00:00',0,1,1,2,2,'2016-06-08 06:07:30','2016-06-07 13:39:15','2016-06-08 03:07:30'),(40,'Last task','Test test test','2016-06-08 10:00:00',0,0,1,2,2,'2016-06-08 07:01:01','2016-06-08 03:36:54','2016-06-08 04:01:01'),(41,'One','One','2016-06-08 11:30:00',0,0,1,2,2,'2016-06-08 08:31:01','2016-06-08 04:40:45','2016-06-08 05:31:01'),(42,'Two','Two','2016-06-08 14:00:00',0,0,1,2,1,'2016-06-08 11:01:02','2016-06-08 04:41:09','2016-06-08 08:01:02'),(43,'Three','Three','2016-06-08 17:30:00',0,0,1,2,2,'2016-06-08 14:31:01','2016-06-08 04:41:30','2016-06-08 11:31:01'),(44,'Four','Four','2016-06-30 20:30:00',0,0,0,2,2,'2016-06-30 17:15:00','2016-06-08 06:36:08','2016-06-08 06:36:08'),(45,'Admin task','Admin task ','2016-06-09 15:52:11',0,1,1,1,2,'2016-06-09 13:03:15','2016-06-08 13:26:50','2016-06-09 09:56:12'),(46,'Task ','kdjf;askdfj;asklfj;alskdf','2016-06-09 22:30:00',0,0,0,1,5,'2016-06-09 10:42:40','2016-06-09 06:35:05','2016-06-09 07:42:40'),(47,'Correct task','dasfasdfasdf','2016-06-30 12:47:00',0,0,0,1,1,'2016-06-30 09:32:00','2016-06-09 06:48:08','2016-06-09 06:48:08'),(48,'asdfkajs;dlfkja;sldkfj;alsdkjfasd','fasdfasdfasdfasdfasdfsad','2016-06-10 13:56:00',0,0,0,1,2,'2016-06-10 10:41:00','2016-06-09 07:56:53','2016-06-09 08:00:41'),(49,'afdasdfa','asdfasfasdf','2016-06-10 15:51:56',0,0,0,1,2,'2016-06-10 12:36:56','2016-06-09 08:59:41','2016-06-09 09:52:03'),(50,'123123123','asdfasdfas','2016-06-09 15:31:41',0,1,1,1,1,'2016-06-09 15:15:47','2016-06-09 09:31:49','2016-06-09 12:15:47'),(51,'sdaafsfdafad','fasdfasdfasd','2016-06-09 16:20:00',1,0,1,1,5,'2016-06-09 13:30:37','2016-06-09 10:04:00','2016-06-09 10:30:37'),(52,'dasdasdasd','','2016-06-09 16:25:25',1,0,1,1,1,'2016-06-09 13:30:39','2016-06-09 10:07:56','2016-06-09 10:30:39'),(53,'Test','teset','2016-06-09 17:04:00',0,1,1,1,5,'2016-06-09 15:15:51','2016-06-09 10:30:31','2016-06-09 12:15:51'),(54,'taasfsd','sadfasfasdf','2016-06-09 16:57:00',0,1,1,1,5,'2016-06-09 15:15:48','2016-06-09 10:40:15','2016-06-09 12:15:48'),(55,'asdfasdf','sdfasdf','2016-06-09 17:00:00',0,1,1,1,2,'2016-06-09 15:15:49','2016-06-09 10:43:25','2016-06-09 12:15:49');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest',
  `is_delete` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Polikarpov','polikarpov_aj@groupbwt.com','$2y$10$W26FxcAptCENoJf6L/lw3OVS0Mfib/1z2.z.0lx2SFVrUVxOc3m2q','admin',0,'MrCqvk3YXJRZkFHGn69lLletyKWeUAmp6BGdxXE5Vn9G39FREsqYWvwlbCCL','2016-05-31 13:12:54','2016-06-09 11:59:52',1,NULL),(2,'Guest','polikarpov@groupbwt.com','$2y$10$nDiXOyGOhzn2Zqu2ypJ3VeHBRmf3.7SLVjccYwKFiTX7n7c9Oievq','guest',0,'pdSeDuT5Gm2LjRBuG6z1ywCmtzYliaehDmOdW4HvfO0ILq1Kp6dU1IxuTkl0','2016-06-01 10:30:55','2016-06-08 09:54:22',1,NULL),(3,'Guest1','guest1@groupbwt.com','$2y$10$5K0k30SVZrDWmqr6Y7XSD.RyZBT2zlbww5SH7.Oc7hZkVBwOizhlO','guest',0,'i6KPVoQ1u3vmOwG8jMyuytx9lCqAekHbuSshSAEcdOtYwJ1ZiTmSQrwwUcAZ','2016-06-02 13:05:30','2016-06-04 03:44:09',1,NULL),(18,'Vasja','vasja@groupbwt.com','$2y$10$mhyegHt.g5KOeJegrgXMRuhlJ/UUPEtqihUEU01z3sR1hWXqMuaj.','guest',1,'gaQkEfDydt05yXRPlhrFy9zvQiTQUS5g0Hi0oNcVxeaGNsHl2BBtLci80aU6','2016-06-04 10:23:54','2016-06-06 05:55:29',1,NULL),(23,'Ivan','ivan@groupbwt.com','$2y$10$b/gd1lYAet99miVUc3W4W.I3EsH6k3VTGjPzS05OTQGXAWfZKmQFi','guest',1,NULL,'2016-06-08 13:16:18','2016-06-09 11:51:25',1,NULL),(24,'Hoo','hoo@groupbwt.com','$2y$10$cMyq1LISmebES2/E22k8fucDizrDztVhlQxNgrBpm4t30peOvCmoe','guest',0,NULL,'2016-06-09 05:03:21','2016-06-09 11:51:33',1,NULL),(25,'test2','test2@groupbwt.com','$2y$10$NHDdNAQBEGRLnlp9Yqm3q.X9q1Vhg8zm5uwE9Bjb/4KNaxVTfHgx.','guest',0,NULL,'2016-06-09 12:00:35','2016-06-09 12:00:35',0,'tOugLTtPVzWEtEOcNfGYNO98bxpQVNoL1qP68x'),(26,'Guest3','guest3@groupbwt.com','$2y$10$rC4irEBLbf4iMr3r3KNiwe1nJKXKIfwNa.bcf2ZsIJDiyDxnlnRZm','guest',0,NULL,'2016-06-09 12:14:24','2016-06-09 12:14:24',0,'VJ3TILFQA4UTJaiFP3huS1hI5OWLX3FsPO2jRY'),(27,'Admin','admin@example.com','$2y$10$RVrzF8NyOftX2cJiCMbWZutVUScfqlt7HwgI5P/Sa4FFCaaIvMFk6','admin',0,NULL,'2016-06-09 12:58:43','2016-06-09 12:58:43',1,NULL);
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

-- Dump completed on 2016-06-09 19:04:07
