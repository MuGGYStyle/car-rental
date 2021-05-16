-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: localhost    Database: rent_car
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `car_transmission`
--

DROP TABLE IF EXISTS `car_transmission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_transmission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_transmission`
--

LOCK TABLES `car_transmission` WRITE;
/*!40000 ALTER TABLE `car_transmission` DISABLE KEYS */;
INSERT INTO `car_transmission` VALUES (1,'Автомат'),(2,'Механик');
/*!40000 ALTER TABLE `car_transmission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `fuel` int DEFAULT NULL,
  `seat` int DEFAULT NULL,
  `uild_on` varchar(45) DEFAULT NULL,
  `price_per_day` float DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo_url` varchar(255) DEFAULT NULL,
  `car_trans_id` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `car_trans_id` (`car_trans_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`car_trans_id`) REFERENCES `car_transmission` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Prius 20',8,5,'2006',10000,1,'2021-05-12 22:36:06','2021-05-14 07:35:20','http://localhost:8000/storage/image/car/1620889489.jpg',1,NULL,NULL),(2,'Land 200',20,5,'2011',150000,1,'2021-05-12 23:07:24','2021-05-14 07:35:30','http://localhost:8000/storage/image/car/1620889644.jpg',1,NULL,NULL),(3,'Lexus RX 450h',6,5,'2011',50000,1,'2021-05-12 23:10:22','2021-05-14 07:35:35','http://localhost:8000/storage/image/car/1620889822.jpg',1,NULL,NULL),(4,'Subaru SH5',12,5,'2012',50000,1,'2021-05-13 23:20:21','2021-05-14 07:35:41','http://localhost:8000/storage/image/car/1620976821.jpg',2,NULL,NULL),(5,'Prius 11',5,5,'2003',10000,1,'2021-05-13 23:46:18','2021-05-14 07:46:18','http://localhost:8000/storage/image/car/1620978378.jpg',1,NULL,NULL),(6,'Harrier',12,5,'2006',20000,1,'2021-05-13 23:48:23','2021-05-14 07:48:23','http://localhost:8000/storage/image/car/1620978503.jpg',1,NULL,NULL),(7,'G-class',20,5,'2010',200000,1,'2021-05-13 23:49:07','2021-05-14 07:49:07','http://localhost:8000/storage/image/car/1620978547.jpg',2,NULL,NULL),(8,'Delica',13,7,'2003',50000,1,'2021-05-13 23:49:40','2021-05-14 07:49:40','http://localhost:8000/storage/image/car/1620978580.jpg',2,NULL,NULL),(9,'Camry',10,5,'2009',20000,1,'2021-05-14 02:48:32','2021-05-14 10:48:32','http://localhost:8000/storage/image/car/1620989311.jpg',1,NULL,NULL),(10,'Land 180',20,5,'2005',150000,1,'2021-05-14 02:49:11','2021-05-14 10:49:11','http://localhost:8000/storage/image/car/1620989351.jpg',2,NULL,NULL);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `c_fname` varchar(45) DEFAULT NULL,
  `c_lname` varchar(45) DEFAULT NULL,
  `c_email` varchar(45) DEFAULT NULL,
  `c_message` text,
  `car_id` int DEFAULT NULL,
  `status` enum('new','verified','received','handed') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2021-05-14','2021-05-30','Itgel','Sukh','itgel@gmail.com','хөдөө явна',4,'handed','2021-05-14 08:13:46','2021-05-14 16:13:46'),(2,'2021-05-20','2021-05-25','Itgel','Sukh','itgel@gmail.com','хөдөө явна',1,'verified','2021-05-14 09:12:24','2021-05-16 12:34:53'),(3,'2021-06-05','2021-06-10','Itgel','Sukh','itgel@gmail.com','хөдөө явна',5,'verified','2021-05-14 10:32:09','2021-05-16 12:34:58'),(4,'2021-06-01','2021-06-30','Мөнх-Итгэл','Сүхбаатар','muggystyle24@gmail.com','aaaa',3,'new','2021-05-16 03:32:19','2021-05-16 12:30:55'),(5,'2021-06-01','2021-06-30','Батцэцэг','Шижирбат','btsg.dragon999@yahoo.com','Дархан дотор унана',2,'new','2021-05-16 04:55:56','2021-05-16 12:55:56');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin',NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','$2y$10$2o7VvnMgiGRtPGwU2XshfOsgdHKzuyz5W.BypGdeFrA/SoswxfoQ2',NULL,1,'2021-05-12 20:06:11','2021-05-13 04:06:11');
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

-- Dump completed on 2021-05-16 21:17:15
