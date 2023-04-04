-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: mama
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'zain','zain@gmail.com','1234','zainpic.jpg','1234','india','engineer','junglee');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `p_id` int NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `qty` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `c_id` int NOT NULL,
  `p_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_order`
--

LOCK TABLES `customer_order` WRITE;
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
INSERT INTO `customer_order` VALUES (25,31,18,2000,1791055782,10,'small','2022-10-20 03:47:09','completed'),(26,37,17,225000,473167928,500,'small','2022-10-20 03:47:09','completed'),(27,38,4,1440,571961307,12,'select','2022-10-20 19:20:56','pending'),(28,38,18,4000,571961307,20,'small','2022-10-20 19:20:56','pending'),(29,39,18,2400,1211232289,12,'small','2023-01-25 14:02:38','pending'),(35,41,16,60000,976568615,100,'select','2023-04-04 10:36:31','pending'),(36,41,2,18000,976568615,120,'small','2023-04-04 10:36:31','pending');
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `c_country` text NOT NULL,
  `c_city` text NOT NULL,
  `c_contact` varchar(255) NOT NULL,
  `c_add` text NOT NULL,
  `c_image` text NOT NULL,
  `c_ip` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (35,'az','za@hotmail.com','123','mk','mk','14','mk','zainpic.jpg','127.0.0.1'),(36,'aloho','aloho@gmail.com','123','lk','lk','123','lk','zainpic.jpg','127.0.0.1'),(37,'lo','lol@hotmal.com','145236','asasa','sasasa','7878787878','sasasa','','127.0.0.1'),(38,'Zain','mozn786@gmail.com','alohomora','up','nbd','7858588555','najibabad','','::1'),(39,'honu','honu@gmail.com','zain123','uttarpradesh','najibabad','789654123','najibabad','2.1.2.png','::1'),(41,'zain','zain@hotmail.com','zain','up','Najibabad','7310672019','Najibabad','','::1');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firms`
--

DROP TABLE IF EXISTS `firms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firms` (
  `shan` text NOT NULL,
  `shad` text NOT NULL,
  `shaz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firms`
--

LOCK TABLES `firms` WRITE;
/*!40000 ALTER TABLE `firms` DISABLE KEYS */;
/*!40000 ALTER TABLE `firms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (4,14,45,'Bank transfer',45,'1998-12-08'),(5,123456,2000,'Bank transfer',1452,'1998-12-08');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `p_cat_id` int NOT NULL AUTO_INCREMENT,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Pure Wood','This Article is made with pure wood,no other material is used.'),(2,'Wood + Steel','In this article steel and wood both are used.'),(3,'Agralic','This is the new Product coming soon'),(4,'Paint','All Quality Material Related to Paint'),(5,'Premium','these are our some premium products.');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `p_cat_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,2,'2022-10-20 03:47:09','Bracket','pr5.jpeg','pr3.jpeg','img1.JPG',150,'<p>This is one of the best choice.</p>\r\n<p>Build by skilled and best workers</p>','Article'),(4,1,'2022-10-20 03:47:09','Bracket','imgpw2.jpg','imgpw2.jpg','imgpw1.jpg',120,'<p>Made only with wood</p>','Article'),(6,1,'2022-10-20 03:47:09','bracket','imgpw1.jpg','imgpw2.jpg','imgpw1.jpg',120,'<p>Example</p>','Article'),(7,2,'2022-10-20 03:47:09','Bracket','pr3.jpeg','pr5.jpeg','pr3.jpeg',150,'<p>one of the best</p>','article'),(8,1,'2022-10-20 03:47:09','wood','wood1.jpeg','imgpw1.jpg','imgpw2.jpg',300,'pure wood design','Article'),(9,1,'2022-10-20 03:47:09','wood','wood2.jpeg','wood2.jpeg','wood2.jpeg',150,'Old Design','Article'),(10,1,'2022-10-20 03:47:09','Wood Bracket','wood6.jpeg','wood3.jpeg','wood5.jpeg',200,'Pure Wood','Article'),(11,2,'2022-10-20 03:47:09','Wood+Steel','woost1.jpeg','woost4.jpeg','pr3.jpeg',500,'Wood+Steel','Article'),(12,2,'2022-10-20 03:47:09','Wood+Steel','woost5.jpeg','woost4.jpeg','woost2.jpeg',500,'Wood+Steel','Article'),(13,2,'2022-10-20 03:47:09','Wood+Steel','woost2.jpeg','woost3.jpeg','woost6.jpeg',500,'Wood+Steel','Article'),(14,3,'2022-10-20 03:47:09','Agralic','agralic1.jpeg','agralic1.jpeg','agralic1.jpeg',600,'Agralic','Article'),(15,3,'2022-10-20 03:47:09','Agralic','agralic2.jpeg','agralic2.jpeg','agralic2.jpeg',600,'Agralic','Article'),(16,3,'2022-10-20 03:47:09','Agralic','agralic3.jpeg','agralic3.jpeg','agralic3.jpeg',600,'Agralic','Article'),(17,2,'2022-10-20 03:47:09','Wood+Steel','woost7.jpeg','woost6.jpeg','woost7.jpeg',450,'Wood+Steel','Article'),(18,3,'2022-10-20 03:47:09','Agralic','agralic5.jpeg','agralic5.jpeg','agralic5.jpeg',200,'<p>Made</p>','agralic');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (1,'slider number 1','s1.jpeg'),(2,'slider number 2','s3.jpeg'),(3,'slider image 3','s2.jpeg'),(5,'slider image 5','sm3.jpg');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-04 23:29:05
