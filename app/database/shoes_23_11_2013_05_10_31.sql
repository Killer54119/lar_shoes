-- MySQL dump 10.13  Distrib 5.5.34, for Linux (x86_64)
--
-- Host: localhost    Database: taowebon_shoes
-- ------------------------------------------------------
-- Server version	5.5.34-log

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
-- Table structure for table `tbl_seller`
--

DROP TABLE IF EXISTS `tbl_seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_seller` (
  `seller_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_note` tinytext COLLATE utf8_unicode_ci,
  `paid_total` int(10) unsigned DEFAULT '0',
  `debt_total` int(10) unsigned DEFAULT '0',
  `debt_other_total` int(10) DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_seller`
--

LOCK TABLES `tbl_seller` WRITE;
/*!40000 ALTER TABLE `tbl_seller` DISABLE KEYS */;
INSERT INTO `tbl_seller` VALUES (1,'H.T 183','Chợ Bình Tây - Hoàng Trân 183','',209080,29555,NULL,NULL,'2013-10-31 15:00:04','2013-11-20 22:09:57'),(2,'P.L 219','Chợ Bình Tây - Phúc Lợi 219','',184000,40210,NULL,NULL,'2013-10-31 15:00:08','2013-11-21 20:59:35'),(3,'Q.M 207','Chợ Bình Tây - Quang Minh 207','',41760,2000,0,'','2013-10-31 15:00:11','2013-11-23 04:11:35');
/*!40000 ALTER TABLE `tbl_seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_seller_invoice`
--

DROP TABLE IF EXISTS `tbl_seller_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_seller_invoice` (
  `invoice_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) unsigned NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality` int(10) DEFAULT '0',
  `cost_price` int(10) DEFAULT '0',
  `selling_price` int(10) DEFAULT '0',
  `profits` int(10) DEFAULT '0',
  `payment` int(10) unsigned DEFAULT '0',
  `debt_total` int(10) unsigned DEFAULT '0',
  `invoice_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_return` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_seller_invoice`
--

LOCK TABLES `tbl_seller_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_seller_invoice` DISABLE KEYS */;
INSERT INTO `tbl_seller_invoice` VALUES (1,3,NULL,100,84,89,5,0,10900,'',0,'2013-09-26 06:00:00','2013-11-20 20:18:34'),(2,3,NULL,-25,85,94,9,6550,2000,'',0,'2013-09-27 06:00:00','2013-11-20 20:19:33'),(5,3,NULL,100,85,89,4,0,10900,'',0,'2013-10-02 06:00:00','2013-11-20 20:26:36'),(6,3,NULL,100,84,87,3,0,19600,'',0,'2013-10-02 06:00:00','2013-11-20 20:26:59'),(7,3,NULL,0,0,0,0,17600,2000,'',0,'2013-10-04 06:00:00','2013-11-20 20:27:35'),(8,3,NULL,50,74,78,4,0,5900,'',0,'2013-10-10 06:00:00','2013-11-20 20:28:42'),(9,3,NULL,70,68,73,5,9010,2000,'',0,'2013-10-10 06:00:00','2013-11-20 20:29:08'),(10,3,NULL,150,80,86,6,0,14900,'',0,'2013-10-12 06:00:00','2013-11-20 20:29:35'),(11,3,NULL,-50,80,86,6,8600,2000,'',0,'2013-11-20 07:00:00','2013-11-20 20:30:00'),(12,1,NULL,50,69,77,8,0,18850,'',0,'2013-10-07 06:00:00','2013-11-20 20:33:42'),(13,1,NULL,50,89,97,8,0,23700,'',0,'2013-10-07 06:00:00','2013-11-20 20:34:01'),(14,1,NULL,100,104,112,8,10000,24900,'',0,'2013-10-07 06:00:00','2013-11-20 20:34:21'),(15,1,NULL,-5,81,89,8,0,24455,'',0,'2013-10-07 06:00:00','2013-11-20 20:35:17'),(16,1,NULL,-5,103,114,11,0,23885,'',0,'2013-10-07 06:00:00','2013-11-20 20:35:55'),(17,1,NULL,-1,2140,2140,0,0,21745,'hư 3/10, bớt giá tháng 5',0,'2013-10-07 06:00:00','2013-11-20 20:37:17'),(18,1,NULL,100,115,122,7,0,33945,'',0,'2013-10-09 06:00:00','2013-11-20 20:37:48'),(19,1,NULL,-2,103,114,11,0,33717,'',0,'2013-10-09 06:00:00','2013-11-20 20:38:06'),(20,1,NULL,-1,99,109,10,0,33608,'',0,'2013-10-09 06:00:00','2013-11-20 20:38:16'),(21,1,NULL,-1,54,59,5,0,33549,'',0,'2013-10-09 06:00:00','2013-11-20 20:38:30'),(22,1,NULL,-1,107,118,11,0,33431,'',0,'2013-10-09 06:00:00','2013-11-20 20:38:40'),(23,1,NULL,-5,72,79,7,11291,21745,'',0,'2013-10-09 06:00:00','2013-11-20 20:39:10'),(24,1,NULL,100,100,107,7,0,32445,'',0,'2013-10-10 06:00:00','2013-11-20 20:39:35'),(25,1,NULL,50,80,89,9,0,36895,'',0,'2013-10-10 06:00:00','2013-11-20 20:39:45'),(26,1,NULL,0,0,0,0,12885,24010,'đã sữa 20đ',0,'2013-10-10 06:00:00','2013-11-20 20:40:29'),(27,1,NULL,80,120,124,4,0,33930,'',0,'2013-10-11 06:00:00','2013-11-20 20:42:27'),(28,1,NULL,100,95,102,7,0,44130,'',0,'2013-10-11 06:00:00','2013-11-20 20:43:05'),(29,1,NULL,-5,67,74,7,19750,24010,'',0,'2013-10-11 06:00:00','2013-11-20 20:43:24'),(30,1,NULL,60,44,49,5,0,26950,'',0,'2013-10-15 06:00:00','2013-11-20 20:43:58'),(31,1,NULL,60,56,60,4,0,30550,'',0,'2013-10-16 06:00:00','2013-11-20 20:44:16'),(32,1,NULL,60,50,54,4,0,33790,'',0,'2013-10-16 06:00:00','2013-11-20 20:44:26'),(33,1,NULL,50,60,64,4,0,36990,'',0,'2013-10-16 06:00:00','2013-11-20 20:45:11'),(34,1,NULL,-3,80,89,9,6073,30650,'',0,'2013-10-16 06:00:00','2013-11-20 20:45:35'),(35,1,NULL,40,44,44,0,6665,25745,'lộn giá 50k',0,'2013-10-15 06:00:00','2013-11-20 20:46:01'),(36,1,NULL,100,102,107,5,0,36445,'',0,'2013-10-17 06:00:00','2013-11-20 20:46:18'),(37,1,NULL,50,90,97,7,0,41295,'',0,'2013-10-18 06:00:00','2013-11-20 20:48:11'),(38,1,NULL,70,110,117,7,0,49485,'',0,'2013-10-19 06:00:00','2013-11-20 20:48:28'),(39,1,NULL,-1,103,114,11,12076,37295,'trả xưởng rồi',0,'2013-10-19 06:00:00','2013-11-20 20:48:55'),(40,1,NULL,70,81,89,8,0,43525,'',0,'2013-10-20 06:00:00','2013-11-20 21:09:56'),(41,1,NULL,60,85,94,9,0,49165,'',0,'2013-10-23 06:00:00','2013-11-20 21:10:18'),(42,1,NULL,80,110,119,9,15300,43385,'',0,'2013-10-23 06:00:00','2013-11-20 21:10:35'),(43,1,NULL,50,45,49,4,6090,39745,'',0,'2013-10-24 06:00:00','2013-11-20 21:11:04'),(44,1,NULL,50,101,107,6,0,45095,'',0,'2013-10-25 06:00:00','2013-11-20 21:11:19'),(45,1,NULL,10,81,89,8,0,45985,'',0,'2013-10-25 06:00:00','2013-11-20 21:11:36'),(46,1,NULL,-7,90,99,9,7997,37295,'',0,'2013-10-26 06:00:00','2013-11-20 21:12:24'),(47,1,NULL,60,60,64,4,0,41135,'',0,'2013-10-26 06:00:00','2013-11-20 21:12:45'),(48,1,NULL,70,70,79,9,0,46665,'',0,'2013-10-26 06:00:00','2013-11-20 21:13:02'),(49,1,NULL,-10,110,119,9,0,45475,'',0,'2013-10-26 06:00:00','2013-11-20 21:13:14'),(50,1,NULL,-10,94,104,10,0,44435,'',0,'2013-10-26 06:00:00','2013-11-20 21:14:59'),(51,1,NULL,-5,99,109,10,0,43890,'',0,'2013-10-26 06:00:00','2013-11-20 21:15:28'),(52,1,NULL,-1,85,94,9,6501,37295,'',0,'2013-10-28 06:00:00','2013-11-20 21:17:36'),(53,1,NULL,50,87,94,7,0,41995,'',0,'2013-10-29 06:00:00','2013-11-20 21:17:58'),(54,1,NULL,0,0,0,0,4700,37295,'',0,'2013-10-29 06:00:00','2013-11-20 21:19:29'),(55,1,NULL,60,90,97,7,5820,37295,'',0,'2013-10-30 06:00:00','2013-11-20 21:20:25'),(56,1,NULL,30,115,121,6,0,40925,'',0,'2013-10-31 06:00:00','2013-11-20 21:20:53'),(57,1,NULL,20,105,111,6,0,43145,'',0,'2013-10-31 06:00:00','2013-11-20 21:21:19'),(58,1,NULL,30,120,124,4,10680,36185,'',0,'2013-11-02 06:00:00','2013-11-20 21:25:54'),(59,1,NULL,10,105,111,6,0,37295,'',0,'2013-11-02 06:00:00','2013-11-20 21:26:06'),(60,1,NULL,50,107,114,7,15100,27895,'',0,'2013-11-04 07:00:00','2013-11-20 21:26:27'),(62,1,NULL,100,87,94,7,0,37295,'',0,'2013-11-04 07:00:00','2013-11-20 21:27:25'),(63,1,NULL,100,45,49,4,0,42195,'',0,'2013-11-05 07:00:00','2013-11-20 21:29:53'),(64,1,NULL,-5,81,89,8,0,41750,'',0,'2013-11-05 07:00:00','2013-11-20 21:30:15'),(65,1,NULL,-7,94,104,10,0,41022,'',0,'2013-11-05 07:00:00','2013-11-20 21:30:29'),(66,1,NULL,30,100,106,6,10000,34202,'',0,'2013-11-06 07:00:00','2013-11-20 21:30:48'),(67,1,NULL,30,114,119,0,0,37622,'',0,'2013-11-06 07:00:00','2013-11-20 21:31:19'),(68,1,NULL,30,81,89,8,0,40292,'',0,'2013-11-06 07:00:00','2013-11-20 21:31:53'),(69,1,NULL,100,87,94,7,0,49692,'',0,'2013-11-07 07:00:00','2013-11-20 21:32:36'),(70,1,NULL,-5,90,99,9,0,49197,'',0,'2013-11-07 07:00:00','2013-11-20 21:32:53'),(71,1,NULL,50,100,109,9,12000,42647,'',0,'2013-11-08 07:00:00','2013-11-20 21:33:12'),(72,1,NULL,20,120,129,9,5502,39725,'',0,'2013-11-09 07:00:00','2013-11-20 21:33:39'),(73,1,NULL,20,130,139,9,0,42505,'',0,'2013-11-09 07:00:00','2013-11-20 21:34:04'),(74,1,NULL,50,45,49,4,0,44955,'',0,'2013-11-16 07:00:00','2013-11-20 21:38:15'),(75,1,NULL,0,0,0,0,15550,29555,'',0,'2013-10-18 06:00:00','2013-11-20 21:42:43'),(76,2,NULL,50,67,73,6,0,16330,'',0,'2013-09-28 06:00:00','2013-11-20 21:56:12'),(77,2,NULL,70,66,73,7,5000,16440,'',0,'2013-09-28 06:00:00','2013-11-20 21:56:34'),(78,2,NULL,-1,63,70,7,0,16370,'',0,'2013-09-28 06:00:00','2013-11-20 21:58:34'),(79,2,NULL,70,64,71,7,4000,17340,'',0,'2013-09-30 06:00:00','2013-11-20 21:59:14'),(80,2,NULL,200,85,90,5,0,35340,'',0,'2013-10-01 06:00:00','2013-11-20 21:59:31'),(81,2,NULL,50,94,100,6,20000,20340,'',0,'2013-10-01 06:00:00','2013-11-20 21:59:47'),(82,2,NULL,100,80,88,8,5000,24140,'',0,'2013-10-07 06:00:00','2013-11-20 22:02:08'),(83,2,NULL,100,74,78,4,5000,26940,'',0,'2013-10-08 06:00:00','2013-11-20 22:02:58'),(84,2,NULL,50,94,100,6,10000,21940,'',0,'2013-10-09 06:00:00','2013-11-20 22:03:34'),(85,2,NULL,50,81,87,6,5000,21290,'',0,'2013-10-10 06:00:00','2013-11-20 22:09:57'),(86,2,NULL,25,65,71,6,0,23065,'',0,'2013-10-12 06:00:00','2013-11-20 22:11:09'),(87,2,NULL,45,68,73,5,0,26350,'',0,'2013-10-12 06:00:00','2013-11-20 22:11:27'),(88,2,NULL,50,84,90,6,0,30850,'',0,'2013-10-15 06:00:00','2013-11-20 22:11:44'),(89,2,NULL,50,94,100,6,0,35850,'',0,'2013-10-15 06:00:00','2013-11-20 22:12:11'),(90,2,NULL,100,86,93,7,0,45150,'',0,'2013-10-15 06:00:00','2013-11-20 22:12:22'),(91,2,NULL,-5,83,92,9,15000,29690,'hàng cũ',0,'2013-10-15 06:00:00','2013-11-20 22:12:58'),(92,2,NULL,50,94,100,6,5000,29690,'',0,'2013-10-16 06:00:00','2013-11-20 22:13:21'),(93,2,NULL,60,80,85,5,0,34790,'',0,'2013-10-19 06:00:00','2013-11-20 22:13:36'),(94,2,NULL,50,93,103,10,10000,29940,'',0,'2013-10-20 06:00:00','2013-11-20 22:13:57'),(95,2,NULL,60,95,103,8,0,36120,'',0,'2013-10-23 06:00:00','2013-11-20 22:14:13'),(96,2,NULL,50,85,90,5,10000,30620,'',0,'2013-10-24 06:00:00','2013-11-20 22:14:42'),(97,2,NULL,50,80,80,0,0,34620,'Giá bán 86k từ sạp 207',0,'2013-10-24 06:00:00','2013-11-20 22:15:23'),(98,2,NULL,100,90,98,8,0,44420,'',0,'2013-10-24 06:00:00','2013-11-20 22:15:40'),(99,2,NULL,45,106,115,9,0,49595,'',0,'2013-10-25 06:00:00','2013-11-20 22:15:57'),(100,2,NULL,-1,500,500,0,0,49095,'mua sữa cho Hoa',0,'2013-10-27 06:00:00','2013-11-20 22:16:18'),(101,2,NULL,100,107,115,8,8000,52595,'',0,'2013-10-28 06:00:00','2013-11-20 22:16:44'),(102,2,NULL,80,72,80,8,10000,48995,'',0,'2013-10-29 06:00:00','2013-11-20 22:17:00'),(103,2,NULL,15,77,85,8,10000,40270,'',0,'2013-10-29 06:00:00','2013-11-20 22:17:21'),(104,2,NULL,20,42,47,5,0,41210,'',0,'2013-10-29 06:00:00','2013-11-20 22:17:34'),(105,2,NULL,50,106,115,9,15000,31960,'',0,'2013-10-30 06:00:00','2013-11-20 22:17:55'),(106,2,NULL,50,84,90,6,5000,31460,'',0,'2013-11-02 06:00:00','2013-11-20 22:18:16'),(107,2,NULL,50,86,92,6,0,36060,'',0,'2013-11-02 06:00:00','2013-11-20 22:18:35'),(108,2,NULL,100,45,48,3,0,40860,'',0,'2013-11-05 07:00:00','2013-11-20 22:18:49'),(109,2,NULL,0,0,0,0,5000,35860,'',0,'2013-11-06 07:00:00','2013-11-20 22:19:03'),(110,2,NULL,50,85,92,7,5000,35460,'',0,'2013-11-10 07:00:00','2013-11-20 22:20:29'),(124,2,NULL,100,90,98,8,0,45260,'',0,'2013-11-15 07:00:00','2013-11-21 20:54:39'),(125,2,NULL,-1,75,80,5,7000,38180,'',0,'2013-11-15 07:00:00','2013-11-21 20:55:42'),(126,2,NULL,50,95,105,10,0,43430,'',0,'2013-11-16 07:00:00','2013-11-21 20:56:32'),(127,2,NULL,60,67,73,6,0,47810,'',0,'2013-11-18 07:00:00','2013-11-21 20:57:04'),(128,2,NULL,50,86,92,6,0,52410,'',0,'2013-11-19 07:00:00','2013-11-21 20:57:29'),(129,2,NULL,0,0,0,0,10000,42410,'',0,'2013-11-19 07:00:00','2013-11-21 20:58:15'),(130,2,NULL,70,72,80,8,0,48010,'',0,'2013-11-20 07:00:00','2013-11-21 20:58:50'),(131,2,NULL,80,82,90,8,5000,50210,'',0,'2013-11-20 07:00:00','2013-11-21 20:59:19'),(132,2,NULL,0,0,0,0,10000,40210,'',0,'2013-11-21 07:00:00','2013-11-21 20:59:35');
/*!40000 ALTER TABLE `tbl_seller_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_share_holder`
--

DROP TABLE IF EXISTS `tbl_share_holder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_share_holder` (
  `share_holder_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `share_holder_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `share_holder_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `share_holder_note` tinytext COLLATE utf8_unicode_ci,
  `share_holder_capital` int(10) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`share_holder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_share_holder`
--

LOCK TABLES `tbl_share_holder` WRITE;
/*!40000 ALTER TABLE `tbl_share_holder` DISABLE KEYS */;
INSERT INTO `tbl_share_holder` VALUES (1,'Hoàng Phúc','Đồng Nai','Sổ nợ: 28,380 \r\n\r\n-1000  [28/9:   Rút]  \r\n-2000  [12/10: Đ.cưới Lập] \r\n-4000  [18/10: Rút] \r\n-500    [26/10: Sửa xe]',-7500,'0907933886','2013-10-31 15:09:21','2013-11-23 04:25:57'),(2,'Kim Liên','410B/16 Hậu Giang','30000  [26/09:Thêm ]\r\n30000  [9/10:  Thêm]\r\n-1000   [4/11: Rút ]',59000,'01669133398','2013-10-31 15:09:26','2013-11-23 04:22:50'),(3,'Đã trả hàng về xưởng','','170    [15/10: 2x85]\r\n400    [15/10: 5x80]\r\n375    [17/10: 5x75]\r\n75      [18/11:1x75]\r\n110    [19/10: 1x110 Liên mua]\r\n120    [19/10: 1x120 Liên mua]\r\n850    [19/11:10x85]\r\n1000  [19/11:10x100]',3100,'','2013-11-17 15:01:26','2013-11-23 12:08:35'),(4,'Nguồn chi khác','','-3000 [11/10: Lấy đế]',-3000,'','2013-11-17 15:19:56','2013-11-23 04:13:46');
/*!40000 ALTER TABLE `tbl_share_holder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_share_holder_cost`
--

DROP TABLE IF EXISTS `tbl_share_holder_cost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_share_holder_cost` (
  `cost_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cost_for` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_share_holder_cost`
--

LOCK TABLES `tbl_share_holder_cost` WRITE;
/*!40000 ALTER TABLE `tbl_share_holder_cost` DISABLE KEYS */;
INSERT INTO `tbl_share_holder_cost` VALUES (1,'12/10 Lệch sổ',270,'2013-10-02 02:45:11','2013-10-02 02:45:11'),(2,'18/10 Thu thiếu Hoàng Trân',500,'2013-10-02 02:45:11','2013-10-02 02:45:11'),(3,'Xăng',100,'2013-10-02 02:45:11','2013-10-02 02:50:07'),(4,'2kg bọc',76,'2013-10-02 02:45:11','2013-10-02 02:50:07'),(5,'Xăng, DT, Bốc xếp',500,'2013-10-02 02:45:11','2013-10-02 02:45:11'),(6,'Bị phạt giao thông',500,'2013-10-02 02:45:11','2013-10-03 02:45:11'),(7,'Xăng',80,'2013-10-02 02:45:11','2013-10-05 02:45:11'),(8,'Xăng',500,'2013-10-02 02:45:11','2013-10-11 02:45:11'),(9,'Boa',15,'2013-10-02 02:45:11','2013-10-13 02:45:11'),(10,'Xăng',420,'2013-10-02 02:45:11','2013-10-16 02:45:11'),(11,'Xăng',90,'2013-10-02 02:45:11','2013-10-16 02:45:11'),(12,'Thay bình xe novo',275,'2013-10-02 02:45:11','2013-10-18 02:45:11'),(13,'Đám ma',200,'2013-10-02 02:45:11','2013-10-20 02:45:11'),(14,'Xăng, DT, Bốc xếp',420,'2013-10-02 02:45:11','2013-10-20 02:45:11'),(15,'SN Hoàng Trân',500,'2013-10-02 02:45:11','2013-10-20 02:45:11'),(16,'Xe, sửa',3000,'2013-10-02 02:45:11','2013-10-20 02:45:11'),(17,'Xăng 90, gửi xe',150,'2013-10-02 02:45:11','2013-10-25 02:45:11'),(18,'Phí lên mẫu dép',500,'2013-10-02 02:45:11','2013-10-25 02:45:11'),(19,'Xăng, DT, Bốc xếp',370,'2013-10-02 02:45:11','2013-10-26 02:45:11'),(20,'Bia SN bé Thu',205,'2013-10-02 02:45:11','2013-10-30 02:45:11'),(21,'Bao hiem xe',100,'2013-10-02 02:45:11','2013-10-30 02:45:11'),(22,'Xăng, DT, Bốc xếp',450,'2013-10-02 02:45:11','2013-11-01 02:45:11'),(23,'Xăng, gửi xe',150,'2013-10-02 02:45:11','2013-11-01 02:45:11'),(24,'Thay sên',200,'2013-10-02 02:45:11','2013-11-01 02:45:11'),(25,'Liên điện thoại',200,'2013-11-11 03:45:17','2013-11-05 03:45:17'),(26,'Xăng, DT, Bốc xếp',400,'2013-11-11 03:45:22','2013-11-06 03:45:22'),(27,'Bị phạt giao thông',200,'2013-11-11 03:45:30','2013-11-06 03:45:30'),(28,'Khuôn đế',60,'2013-11-11 03:45:43','2013-11-08 03:45:30'),(29,'Xăng, DT, Bốc xếp',300,'2013-11-11 22:36:00','2013-11-10 22:36:00'),(30,'Xang',100,'2013-11-21 00:10:43','2013-11-21 00:10:43'),(31,'Xang, dt, boc xep',300,'2013-11-21 00:11:20','2013-11-21 00:11:20'),(32,'Hợp đồng sim dt, phí giao hàng',85,'2013-11-23 04:27:35','2013-11-23 04:27:35');
/*!40000 ALTER TABLE `tbl_share_holder_cost` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-22 22:10:31
