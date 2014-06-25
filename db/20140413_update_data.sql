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
  `address_line_two` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid_UNIQUE` (`aid`),
  KEY `addresses_fk_1_idx` (`uid`),
  CONSTRAINT `addresses_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,1,'Allen Zhang','(617)000-0001','8830 88ST FL2','MIDDLE VILLAGE','NEW YORK','NY','11388','United States'),(2,1,'Tracy Lin','(860)970-3003','7 SURREY WAY','','WEST HARTFORD','CT','06133','United States');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Nike'),(2,'Adidas'),(3,'Timberland'),(4,'Vans'),(5,'Polo Ralph Lauren'),(6,'Crocs'),(7,'ECCO'),(8,'Mezlan'),(9,'Converse'),(10,'Dockers'),(11,'Reebok'),(12,'New Balance');
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
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid_UNIQUE` (`cid`),
  KEY `carts_fk_1_idx` (`uid`),
  KEY `carts_fk_2_idx` (`pid`),
  CONSTRAINT `carts_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `carts_fk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,2,'mysh01010022','Men\'s 9 US',1),(2,2,'mysh01010005','Men\'s 9 US',1),(3,1,'mysh01010015','Men\'s 10 US',1),(4,1,'mysh01010022','Men\'s 10 US',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_arrivals`
--

LOCK TABLES `new_arrivals` WRITE;
/*!40000 ALTER TABLE `new_arrivals` DISABLE KEYS */;
INSERT INTO `new_arrivals` VALUES (1,'mysh01010004'),(2,'mysh01010005'),(3,'mysh01010010'),(4,'mysh01010011'),(5,'mysh01010014'),(6,'mysh01010015'),(7,'mysh01010021'),(8,'mysh01010025'),(9,'mysh01010026'),(10,'mysh01010027'),(11,'mysh01010028'),(12,'mysh01010031'),(13,'mysh01010032');
/*!40000 ALTER TABLE `new_arrivals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `odid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'order details id',
  `order_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`odid`),
  UNIQUE KEY `odid_UNIQUE` (`odid`),
  KEY `order_details_fk_1_idx` (`order_num`),
  KEY `order_details_fk_2_idx` (`pid`),
  CONSTRAINT `order_details_fk_1` FOREIGN KEY (`order_num`) REFERENCES `orders` (`order_num`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `order_details_fk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,'20140304-195202-403320','mysh01010010','Men\'s 8.5 US',1),(2,'20140304-195202-403320','mysh01010011','Men\'s 9.5 US',3),(3,'20140305-232844-165991','mysh01010001','Men\'s 14 US',1),(4,'20140413-140500-222680','mysh01010026','Men\'s 9 US',2);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `oid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'orders id',
  `order_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'order number',
  `uid` int(10) NOT NULL COMMENT 'users id',
  `aid` int(10) NOT NULL COMMENT 'addresses id',
  `created_date` date DEFAULT NULL COMMENT 'order create date',
  `estimated_date` date DEFAULT NULL COMMENT 'estimated deliveried date',
  `name_on_card` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'name on card',
  `card_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'card number',
  `exp_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'expiration date',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('Shipping','Delivered') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oid_UNIQUE` (`oid`),
  UNIQUE KEY `order_number_UNIQUE` (`order_num`),
  KEY `orders_fk_1_idx` (`uid`),
  KEY `orders_fk_2_idx` (`aid`),
  CONSTRAINT `orders_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orders_fk_2` FOREIGN KEY (`aid`) REFERENCES `addresses` (`aid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'20140304-195202-403320',1,1,'2014-03-04','2014-03-09','Allen Zhang','3333333312323213','08/2027',319.29,'Delivered'),(2,'20140305-232844-165991',1,1,'2014-03-15','2014-03-20','Allen Zhang','3333333312323213','08/2027',61.91,'Delivered'),(3,'20140413-140500-222680',1,2,'2014-04-13','2014-04-18','Tracy Lin','5008678540012239','05/2024',176.78,'Shipping');
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
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
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
INSERT INTO `products` VALUES ('mysh01010001',1,1,'Nike Rosherun Running Shoes',100.00,49.99,'Full Mesh Upper - For excellent breathability','Phylon Midsole - For low-profile and lightweight cushioning','Cushioned Collar - For protection around ankle',599,'images/shoes/nike/Nike_Rosherun_Running_Shoes/Nike_Rosherun_Running_Shoes'),('mysh01010002',1,1,'Nike Rosherun Mid Running Shoes',90.00,45.00,'Mesh','Rubber sole','Durable',200,'images/shoes/nike/Nike_Rosherun_Mid_Running_Shoes/Nike_Rosherun_Mid_Running_Shoes'),('mysh01010003',1,1,'Nike Dart 10 Running Shoes',60.00,45.99,'Synthetic-and-mesh','Rubber sole','Durable',300,'images/shoes/nike/Nike_Dart_10_Running_Shoes/Nike_Dart_10_Running_Shoes'),('mysh01010004',1,1,'Nike Revolution 2 Running Shoes',75.00,65.00,'Synthetic-and-mesh','Ballistic mesh uppers with synthetic overlays for comfort and durability','Soft terry cloth and textile cushioned footbed for performance comfort',50,'images/shoes/nike/Nike_Revolution_2_Running_Shoes/Nike_Revolution_2_Running_Shoes'),('mysh01010005',1,1,'Nike Downshifter 5 Running Shoes',78.00,68.00,'Synthetic-and-mesh','Rubber sole','Durable',300,'images/shoes/nike/Nike_Downshifter_5_Running_Shoes/Nike_Downshifter_5_Running_Shoes'),('mysh01010006',1,1,'Nike Flex 2013 RN Running Shoes',115.00,67.00,'Synthetic-and-mesh','Rubber sole','Durable',450,'images/shoes/nike/Nike_Flex_2013_RN_Running_Shoes/Nike_Flex_2013_RN_Running_Shoes'),('mysh01010007',1,1,'Nike Air Max Lebron X Low Basketball Shoes',175.00,137.00,'Hyperfuse upper with leather overlays placed in key zones','Air Max unit at the heel','Perforated at the toe box for breathability',600,'images/shoes/nike/Nike_Air_Max_Lebron_X_Low_Basketball_Shoes/Nike_Air_Max_Lebron_X_Low_Basketball_Shoes'),('mysh01010008',1,1,'Nike Hyperdunk 2013 Basketball Shoes',140.00,112.00,'Ultra light, Lunarloin cushioning provides responsive shox absorbtion','Phylon midsole for maximum cushioning without weighing you down','Rubber sole',490,'images/shoes/nike/Nike_Hyperdunk_2013_Basketball_Shoes/Nike_Hyperdunk_2013_Basketball_Shoes'),('mysh01010009',1,1,'Nike Air Revolution Basketball Shoes ',135.00,67.00,'Rubber outsole for traction and durability','Air Max unit at the heel','Perforated at the toe box for breathability',400,'images/shoes/nike/Nike_Air_Revolution_Basketball_Shoes/Nike_Air_Revolution_Basketball_Shoes'),('mysh01010010',1,1,'Nike Jordan Superfly 2 Basketball Shoes',130.00,76.00,'Sandwich mesh inner sleeve with an integrated tongue for ventilation','Pull-tab on the heel for easy on and off','Modified herringbone pattern on the outsole for multidirectional traction',600,'images/shoes/nike/Nike_Jordan_Superfly_2_Basketball_Shoes/Nike_Jordan_Superfly_2_Basketball_Shoes'),('mysh01010011',1,1,'Nike Dual Fusion BB II Basketball Shoes',95.00,72.00,'Pull-tab on the heel for easy on and off','Synthetic-and-mesh','Rubber sole',197,'images/shoes/nike/Nike_Dual_Fusion_BB_II_Basketball_Shoes/Nike_Dual_Fusion_BB_II_Basketball_Shoes'),('mysh01010012',1,6,'Nike Air Force 1 High Shoes',100.00,65.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',700,'images/shoes/nike/Nike_Air_Force_1_High_Shoes/Nike_Air_Force_1_High_Shoes'),('mysh01010013',1,6,'Nike Air Force 1 Mid Shoes',100.00,55.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',600,'images/shoes/nike/Nike_Air_Force_1_Mid_Shoes/Nike_Air_Force_1_Mid_Shoes'),('mysh01010014',1,6,'Nike Air Force 1 Low Shoes',100.00,76.00,'Leather and nubuck upper','Pivot points in the forefoot and heel for smooth transitions in all directions','Ankle strap for enhanced support',300,'images/shoes/nike/Nike_Air_Force_1_Low_Shoes/Nike_Air_Force_1_Low_Shoes'),('mysh01010015',1,2,'Nike Air Force 1 Duckboot Boot',190.00,126.00,'Soft, insulated lining','Soft, insulated lining','Rubber sole',279,'images/shoes/nike/Nike_Air_Force_1_Duckboot_Boot/Nike_Air_Force_1_Duckboot_Boot'),('mysh01010016',2,1,'Adidas Neo Star 2012 Running Shoes',135.00,60.00,'Synthetic upper islight-weight and breathable','Moisture- wicking fabric lining absorbs excessperspiration to keep foot cooler anddrier','Reflectiveaccenting for improved safety',240,'images/shoes/adidas/Adidas_Neo_Star_2012_Running_Shoes/Adidas_Neo_Star_2012_Running_Shoes'),('mysh01010017',2,1,'Adidas Kanadia TR 6 Running Shoes',110.00,55.00,'Blown rubber outsole lugs for better cushioning and response','Phylon midsole with Adidas Shox columns for responsive cushioning','Synthetic leather and textile upper',250,'images/shoes/adidas/Adidas_Kanadia_TR_6_Running_Shoes/Adidas_Kanadia_TR_6_Running_Shoes'),('mysh01010018',2,6,'AdidasThe AR 3.0 Sneakers',108.00,67.00,'Leather','Rubber sole','Manufactured by adidas',299,'images/shoes/adidas/Adidas_The_AR_3_Sneakers/Adidas_The_AR_3_Sneakers'),('mysh01010019',2,6,'Adidas Originals Gazelle Shoes',90.00,46.00,'Leather','Rubber sole','Manufactured by adidas',250,'images/shoes/adidas/Adidas_Originals_Gazelle_Shoes/Adidas_Originals_Gazelle_Shoes'),('mysh01010020',2,1,'Adidas Crazy Shadow 2 Basketball Shoes',120.00,79.00,'Synthetic leather upper for light weight and durability','Seamlessly bonded SPRINTWEB provides breathable, lightweight support','Synthetic-and-leather',300,'images/shoes/adidas/Adidas_Crazy_Shadow_2_Basketball_Shoes/Adidas_Crazy_Shadow_2_Basketball_Shoes'),('mysh01010021',2,1,'Adidas Commander TD 4 Red Basketball Shoes',85.00,77.00,'Synthetic leather upper for light weight and durability','Cushioned EVA insole and soft textile lining for a comfortable feel','EVA midsole for a comfortable fit',300,'images/shoes/adidas/Adidas_Commander_TD_4_Red_Basketball_Shoes/Adidas_Commander_TD_4_Red_Basketball_Shoes'),('mysh01010022',2,1,'Adidas Rose 3 Basketball Shoes',87.00,49.99,'Synthetic leather upper for light weight and durability','Rubber sole','Ankle strap for enhanced support',350,'images/shoes/adidas/Adidas_Rose_3_Basketball_Shoes/Adidas_Rose_3_Basketball_Shoes'),('mysh01010023',2,1,'Adidas Adipure Crazy Quick Basketball Shoes',96.00,45.99,'Leather-and-synthetic','Four zones of flex for motion plus stability','Techfit upper is engineered for natural, flexible support and a seamless',430,'images/shoes/adidas/Adidas_Adipure_Crazy_Quick_Basketball_Shoes/Adidas_Adipure_Crazy_Quick_Basketball_Shoes'),('mysh01010024',2,6,'Adidas Originals Samba Fashion Sneakers',76.00,43.00,'Lightly padded collar and tongue','Textile lining and a cushioned insole for all day comfort','Cleat-inspired grippy rubber outsole',350,'images/shoes/adidas/Adidas_Originals_Samba_Fashion_Sneakers/Adidas_Originals_Samba_Fashion_Sneakers'),('mysh01010025',2,6,'Adidas Seeley Skate Sneakers',80.00,69.99,'Canvas','Nano heel cushioning for comfort and padding','Geofit technology for good fit and padding',400,'images/shoes/adidas/Adidas_Seeley_Skate_Sneakers/Adidas_Seeley_Skate_Sneakers'),('mysh01010026',2,6,'Adidas High Heel Originals Sneakers',90.00,79.00,'Leather','EVA midsole offers lightweight cushioning','Perforated toe area',381,'images/shoes/adidas/Adidas_High_Heel_Originals_Sneakers/Adidas_High_Heel_Originals_Sneakers'),('mysh01010027',3,2,'Timberland Premium White Boot',220.00,186.00,'Premium nubuck leather upper for comfort, durability and long-lasting wear','Exclusive anti-fatigue comfort technology provides all day comfort','The styles incorporate leathers with natural variations',500,'images/shoes/timberland/Timberland_Premium_White_Boot/Timberland_Premium_White_Boot'),('mysh01010028',3,2,'Timberland Earthkeepers Lace-Up Boot',198.00,165.00,'Leather','Manmade sole','Slight variations in the hue of the premium leather may naturally occur',455,'images/shoes/timberland/Timberland_Earthkeepers_Lace-Up_Boot/Timberland_Earthkeepers_Lace-Up_Boot'),('mysh01010029',3,2,'Timberland Ledge Boot',142.00,85.00,'Leather and synthetic','Rubber sole','Seam-sealed waterproof hiking boot with cushioned EVA foam footbed',300,'images/shoes/timberland/Timberland_Ledge_Boot/Timberland_Ledge_Boot'),('mysh01010030',3,2,'Timberland PRO Pitboss Steel-Toe Boot',167.00,117.00,'Leather','Rubber sole','Anti-Microbial Lining',240,'images/shoes/timberland/Timberland_PRO_Pitboss_Steel-Toe_Boot/Timberland_PRO_Pitboss_Steel-Toe_Boot'),('mysh01010031',3,2,'Timberland Field Boot',180.00,159.99,'Leather','Rubber sole','Rustproof hardware for long-lasting wear',400,'images/shoes/timberland/Timberland_Field_Boot/Timberland_Field_Boot'),('mysh01010032',3,2,'Timberland Rime Ridge Shell Toe Waterproof Boot',150.00,109.99,'Leather and rubber','400 grams primaloft insulation for warmth','Waterproof membrane keeps feet dry',340,'images/shoes/timberland/Timberland_Rime_Ridge_Shell_Toe_Waterproof_Boot/Timberland_Rime_Ridge_Shell_Toe_Waterproof_Boot'),('mysh01010033',3,2,'Timberland 6 Inch Premium Waterproof Boot ',160.00,87.99,'Padded collar','Premium waterproof nubuck leather upper','Moisture wicking textile',555,'images/shoes/timberland/Timberland_6_Inch_Premium_Waterproof_Boot/Timberland_6_Inch_Premium_Waterproof_Boot'),('mysh01010034',3,2,'Timberland Chillberg Mid Waterproof Boot',157.00,93.00,'Green rubber lug outsole for excellent traction','Polartec recycled fleece lining in collar for warmth and comfort','Waterproof membrane keeps feet dry and comfortable in any weather',240,'images/shoes/timberland/Timberland_Chillberg_Mid_Waterproof_Boot/Timberland_Chillberg_Mid_Waterproof_Boot'),('mysh01010035',3,2,'Timberland Flume Boot',146.00,97.00,'Leather','Padded collar and gusseted tongue for comfort','Waterproof membrane keeps feet dry',260,'images/shoes/timberland/Timberland_Flume_Boot/Timberland_Flume_Boot'),('mysh01010036',3,2,'Timberland Whiteledge Hiker Boot',169.00,95.99,'Leather','Seam-sealed waterproof construction','Removable dual density EVA footbed for comfort',330,'images/shoes/timberland/Timberland_Whiteledge_Hiker_Boot/Timberland_Whiteledge_Hiker_Boot');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'mysh01010001'),(2,'mysh01010002'),(3,'mysh01010006'),(4,'mysh01010009'),(5,'mysh01010013'),(6,'mysh01010016'),(7,'mysh01010017'),(8,'mysh01010019'),(9,'mysh01010022'),(10,'mysh01010023'),(11,'mysh01010024'),(12,'mysh01010029'),(13,'mysh01010030'),(14,'mysh01010033'),(15,'mysh01010034'),(16,'mysh01010035'),(17,'mysh01010036');
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
  `uid` int(10) NOT NULL,
  `subscribe_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email for subscriber',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `subscribers_fk_1_idx` (`uid`),
  CONSTRAINT `subscribers_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (1,1,'allenzhang@gmail.com'),(2,4,'katherine2013@bu.edu');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'allenzhang@gmail.com','a56ab2cbc8fd0274c75fe2982b668872','Allen Zhang','(617)000-0001'),(2,'jeffgreen@gmail.com','0565c23f8d243e7f8ea48ce0074f7546 ','Jeff Green','(617)000-0002'),(3,'franklee@yahoo.com','fa57f6da1bf1d85eef65f79920b9b087','',''),(4,'katherine2013@bu.edu','34427e3fa44df71d4c0a73190f132401','',NULL);
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

-- Dump completed on 2014-04-13 14:09:22
