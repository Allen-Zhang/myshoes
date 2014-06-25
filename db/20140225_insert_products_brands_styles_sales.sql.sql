CREATE DATABASE  IF NOT EXISTS `myshoes` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `myshoes`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: myshoes
-- ------------------------------------------------------
-- Server version	5.6.11

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `aid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'addresses id',
  `uid` int(10) NOT NULL COMMENT 'users id',
  `rec_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rec_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_one` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_two` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(10) NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid_UNIQUE` (`aid`),
  KEY `addresses_fk_1_idx` (`uid`),
  CONSTRAINT `addresses_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `bid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'brands id',
  `brand_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bid_UNIQUE` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Nike'),(2,'Adidas'),(3,'Timberland'),(4,'Vans'),(5,'Polo Ralph Lauren'),(6,'Crocs'),(7,'ECCO'),(8,'Mezlan');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `cid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'carts id',
  `uid` int(10) NOT NULL COMMENT 'users id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'products id',
  `quantity` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid_UNIQUE` (`cid`),
  KEY `carts_fk_1_idx` (`uid`),
  KEY `carts_fk_2_idx` (`pid`),
  CONSTRAINT `carts_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `carts_fk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_arrivals`
--

DROP TABLE IF EXISTS `new_arrivals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_arrivals` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'new arrivals id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'products id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `new_arrivals_fk_1_idx` (`pid`),
  CONSTRAINT `new_arrivals_fk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_arrivals`
--

LOCK TABLES `new_arrivals` WRITE;
/*!40000 ALTER TABLE `new_arrivals` DISABLE KEYS */;
INSERT INTO `new_arrivals` VALUES (1,'mysh01010002'),(2,'mysh01010003');
/*!40000 ALTER TABLE `new_arrivals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `oid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'orders id',
  `uid` int(10) NOT NULL COMMENT 'users id',
  `aid` int(10) NOT NULL COMMENT 'addresses id',
  `cid` int(10) NOT NULL COMMENT 'carts id',
  `created` datetime DEFAULT NULL,
  `estimated` datetime DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('Shipping','Delivered') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oid_UNIQUE` (`oid`),
  KEY `orders_fk_1_idx` (`uid`),
  KEY `orders_fk_2_idx` (`aid`),
  KEY `orders_fk_3_idx` (`cid`),
  CONSTRAINT `orders_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orders_fk_2` FOREIGN KEY (`aid`) REFERENCES `addresses` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orders_fk_3` FOREIGN KEY (`cid`) REFERENCES `carts` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'products id',
  `bid` int(10) NOT NULL COMMENT 'brands id',
  `sid` int(10) NOT NULL COMMENT 'sytles id',
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `list_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `desc_one` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_two` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_three` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid_UNIQUE` (`pid`),
  KEY `products_fk_1_idx` (`bid`),
  KEY `products_fk_2_idx` (`sid`),
  CONSTRAINT `products_fk_1` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `products_fk_2` FOREIGN KEY (`sid`) REFERENCES `styles` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('mysh01010001',1,1,'Nike Rosherun Running Shoes',100.00,49.99,'Full Mesh Upper - For excellent breathability','Phylon Midsole - For low-profile and lightweight cushioning','Cushioned Collar - For protection around ankle',1000,'images/shoes/nike/Nike_Rosherun_Running_Shoes.jpg'),('mysh01010002',1,1,'Nike Rosherun Mid Running Shoes',90.00,45.00,'Mesh','Rubber sole','Durable',200,'images/shoes/nike/Nike_Rosherun_Mid_Running_Shoes.jpg'),('mysh01010003',1,1,'Nike Dart 10 Running Shoes',60.00,45.99,'Synthetic-and-mesh','Rubber sole','Durable',400,'images/shoes/nike/Nike_Dart_10_Running_Shoes.jpg'),('mysh01010004',1,1,'Nike Revolution 2 Running Shoes',75.00,55.00,'Synthetic-and-mesh','Ballistic mesh uppers with synthetic overlays for comfort and durability','Soft terry cloth and textile cushioned footbed for performance comfort',500,'images/shoes/nike/Nike_Revolution_2_Running_Shoes.jpg'),('mysh01010005',1,1,'Nike Downshifter 5 Running Shoes',58.00,48.00,'Synthetic-and-mesh','Rubber sole','Durable',300,'images/shoes/nike/Nike_Downshifter_5_Running_Shoes.jpg'),('mysh01010006',1,1,'Nike Flex 2013 RN Running Shoes',115.00,67.00,'Synthetic-and-mesh','Rubber sole','Durable',450,'images/shoes/nike/Nike_Flex_2013_RN_Running_Shoes.jpg'),('mysh01010007',1,1,'Nike Air Max Lebron X Low Basketball Shoes',175.00,137.00,'Hyperfuse upper with leather overlays placed in key zones','Air Max unit at the heel','Perforated at the toe box for breathability',600,'images/shoes/nike/Nike_Air_Max_Lebron_X_Low_Basketball_Shoes.jpg'),('mysh01010008',1,1,'Nike Hyperdunk 2013 Basketball Shoes',140.00,112.00,'Ultra light, Lunarloin cushioning provides responsive shox absorbtion','Phylon midsole for maximum cushioning without weighing you down','Rubber sole',500,'images/shoes/nike/Nike_Hyperdunk_2013_Basketball_Shoes.jpg'),('mysh01010009',1,1,'Nike Air Revolution Basketball Shoes ',135.00,107.00,'Rubber outsole for traction and durability','Air Max unit at the heel','Perforated at the toe box for breathability',400,'images/shoes/nike/Nike_Air_Revolution_Basketball_Shoes .jpg'),('mysh01010010',1,1,'Nike Jordan Superfly 2 Basketball Shoes',130.00,76.00,'Sandwich mesh inner sleeve with an integrated tongue for ventilation','Pull-tab on the heel for easy on and off','Modified herringbone pattern on the outsole for multidirectional traction',600,'images/shoes/nike/Nike_Jordan_Superfly_2_Basketball_Shoes.jpg'),('mysh01010011',1,1,'Nike Dual Fusion BB II Basketball Shoes',95.00,72.00,'Pull-tab on the heel for easy on and off','Synthetic-and-mesh','Rubber sole',200,'images/shoes/nike/Nike_Dual_Fusion_BB_II_Basketball_Shoes.jpg'),('mysh01010012',1,6,'Nike Air Force 1 High Shoes',100.00,65.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',700,'images/shoes/nike/Nike_Air_Force_1_High_Shoes.jpg'),('mysh01010013',1,6,'Nike Air Force 1 Mid Shoes',100.00,60.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',600,'images/shoes/nike/Nike_Air_Force_1_Mid_Shoes.jpg'),('mysh01010014',1,6,'Nike Air Force 1 Low Shoes',100.00,56.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',0,'images/shoes/nike/Nike_Air_Force_1_Low_Shoes.jpg'),('mysh01010015',1,2,'Nike Air Force 1 Duckboot Boot',190.00,126.00,'Soft, insulated lining','Soft, insulated lining','Rubber sole',200,'images/shoes/nike/Nike_Air_Force_1_Duckboot_Boot.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'sales id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'products id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `sales_fk_1_idx` (`pid`),
  CONSTRAINT `sales_fk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'mysh01010001'),(2,'mysh01010002'),(3,'mysh01010006'),(4,'mysh01010010'),(5,'mysh01010014'),(6,'mysh01010015');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `styles`
--

DROP TABLE IF EXISTS `styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `styles` (
  `sid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'styles id',
  `style_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid_UNIQUE` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `styles`
--

LOCK TABLES `styles` WRITE;
/*!40000 ALTER TABLE `styles` DISABLE KEYS */;
INSERT INTO `styles` VALUES (1,'Athletic'),(2,'Boots'),(3,'Oxfords'),(4,'Flip Flops'),(5,'Sandals'),(6,'Sneakers');
/*!40000 ALTER TABLE `styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'subscribers id',
  `uid` int(10) NOT NULL COMMENT 'users id',
  `subscribe_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email for subscriber',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `subscribers_fk_1_idx` (`uid`),
  CONSTRAINT `subscribers_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'users id',
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userphone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid_UNIQUE` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'allenzhang@gmail.com','allenzhang','Allen Zhang','(617)000-0001'),(2,'jeffgreen@gmail.com','jeffgreen','Jeff Green','(617)000-0002');
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

-- Dump completed on 2014-02-26  0:24:21
