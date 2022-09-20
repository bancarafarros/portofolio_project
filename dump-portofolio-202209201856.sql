-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: portofolio
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_un` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (20,'categoryB'),(16,'categoryC'),(12,'categoryD'),(19,'categoryE'),(21,'kjgjgg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_categories` (
  `post_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  UNIQUE KEY `post_categories_un` (`post_id`,`category_id`),
  KEY `categories_FK` (`category_id`) USING BTREE,
  CONSTRAINT `post_categories_FK` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `post_categories_FK_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES (14,12),(15,12),(14,16),(15,16),(14,20),(15,20);
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_un` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'bbbbbbbb','bbbbbbbb','NodeMCU-pinOUT-493x5002.png','2022-09-12 14:57:56',4,'2022-09-13 18:06:38',4),(3,'efwgrwg','sdgewrgwr','woman2.png','2022-09-13 12:00:47',4,NULL,NULL),(4,'cccccc','cvcccccc','83790f2b43f00be.png','2022-09-13 17:14:59',4,'2022-09-13 17:15:25',4),(5,'wefqef','ewrgwgrw','boy4.png','2022-09-14 16:57:55',4,NULL,NULL),(6,'wqe','ewerf','woman3.png','2022-09-14 16:58:42',4,NULL,NULL),(7,'kjuvgiuguih','<p><u>akjbgfiuwefhwioef</u></p>','wallhaven-0qjkll.jpg','2022-09-15 17:08:57',4,NULL,NULL),(8,'klnoiio','<p><u>ugfiuqegfieufhewf</u></p>','wallhaven-nke2x7.jpg','2022-09-15 17:10:20',4,NULL,NULL),(9,'kjvfeiubefeq','<p><u>alkbfgiuqewgfqiuoefh</u></p>','wallhaven-nke2x71.jpg','2022-09-15 17:11:58',4,NULL,4),(10,'kjbkfeb','<p><b><u>klabfiuqgfuiefg</u></b></p>','NodeMCU-pinOUT-493x5008.png','2022-09-15 17:14:33',4,NULL,4),(11,'kjbfiuqkbewf','<p>ewegwegweg</p>','wallhaven-nke2x72.jpg','2022-09-15 17:17:55',4,NULL,4),(12,'kiuvawfiuvqefi','<p>kjwbdiuqwf</p>','BG_Meet_MSIB_(Peserta)1.png','2022-09-15 17:23:13',4,NULL,4),(14,'ajkfbefbekf','<p>aefewffew</p>','BG_Meet_MSIB_(Peserta)3.png','2022-09-15 17:24:10',4,NULL,4),(15,'kjagfiuewfh','<p><u style=\"background-color: rgb(0, 255, 255);\">sgrhethth</u></p>','wallhaven-nke2x74.jpg','2022-09-15 17:44:09',4,'2022-09-15 23:04:19',4);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_un` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ahayy','okoJ','uwehhh'),(2,'uyee','Joki','wawawa'),(3,'powpow','wuhuu','3817c73eba03b8734653e09cf6e4fe0dba6b8da8b010e7ecb9af3c96c2a646c9'),(4,'brabus','ayee','8a3fbbae380d617bf3c986e880297abd66b417ce1a651d642c9cfa338f510f55'),(5,'wawaw','uwiw','c99e6b155989927e6189fe85cdb31581c04c4ebdcc022c2fc8ca75cbe3fc6209');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_categories`
--

DROP TABLE IF EXISTS `work_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_categories` (
  `work_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`work_id`,`category_id`),
  UNIQUE KEY `work_categories_un` (`work_id`,`category_id`),
  KEY `categories_FK` (`category_id`),
  CONSTRAINT `categories_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `work_categories_FK` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_categories`
--

LOCK TABLES `work_categories` WRITE;
/*!40000 ALTER TABLE `work_categories` DISABLE KEYS */;
INSERT INTO `work_categories` VALUES (6,12),(6,16),(9,16),(10,16),(11,16),(12,16),(13,16),(14,16),(9,20),(10,20),(11,20),(12,20),(13,20),(14,20);
/*!40000 ALTER TABLE `work_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `content` longtext,
  `featured_image` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `works_un` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'uuuuuuuu',2001,'aswargm','NodeMCU-pinOUT-493x5001.png','2022-09-09 14:16:33',4,'2022-09-15 23:03:27',4),(4,'ewfwgrg',2012,'mcdvdvdwf','woman1.png','2022-09-12 18:44:07',4,'2022-09-13 15:36:41',4),(5,'jhuih',2001,'jghjuhu','W7wjw7c-basquiat-wallpaper1.jpg','2022-09-13 10:34:06',4,'2022-09-13 18:16:39',4),(6,'qwerty',1998,'qwerty','NodeMCU-pinOUT-493x5003.png','2022-09-14 17:10:33',4,NULL,NULL),(9,'iowrhfiwhg',1998,'qwfewfwef','NodeMCU-pinOUT-493x5006.png','2022-09-14 17:32:29',4,NULL,4),(10,'iugfiuwgf',1998,'fegegerg','wallhaven-72p97v.jpg','2022-09-14 17:35:38',4,NULL,4),(11,'hfhjf',1998,'kjfgyjufg','wallhaven-72p97v1.jpg','2022-09-14 17:53:56',4,NULL,4),(12,'aaaaaaaa',1999,'kjvjv<p><u></u></p><p></p><u><b></b></u><p></p>','83790f2b43f00be1.png','2022-09-15 15:33:22',4,'2022-09-15 22:20:58',4),(13,'khsefiuweghif',1998,'<p>egfiuqegfiueqfiwefhewiufh<u>&nbsp;</u></p>','BG_Meet_MSIB_(Peserta).png','2022-09-15 15:35:10',4,'2022-09-15 22:15:01',4),(14,'kugiuglqfefhioqef',2012,'<p><u>jydyufougloihoi</u></p>','NodeMCU-pinOUT-493x5007.png','2022-09-15 15:36:04',4,'2022-09-15 22:15:36',4);
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'portofolio'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-20 18:56:17
