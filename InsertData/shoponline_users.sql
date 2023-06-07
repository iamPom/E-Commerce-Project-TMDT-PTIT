-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: shoponline
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nguyen Van A','a@gmail.com',NULL,'$2y$10$vUH2WPgPjSeRJD3lMwlEDucNuI8FYdo.sDDFefdJrIMhGGXUCeDkm','admin',NULL,'rJn6dRjXqhfNYkquFzNnp5klmzz5a8sl7yXmtimhxWKSlaN3xRVlvh8MUvcm','2023-04-16 02:51:10','2023-04-23 03:48:11'),(2,'Ninh Thị Phượng','ninhphuongnghia@gmail.com',NULL,'$2y$10$metEZcCgpOPhrDwACT4c1eaKpNuLruSUncAm/V86pi4slaYQ7FagW','user','113019776582081667442',NULL,'2023-04-16 03:59:10','2023-05-12 01:32:10'),(3,'Admin','admin@admin.com',NULL,'$2y$10$5MUD9TjncciEUp9IcGk0l.mZucBH5zYdbfH4wc2FkSwSqE4A5L0US','user',NULL,NULL,'2023-04-21 08:05:16','2023-04-21 08:05:16'),(4,'Ngoc','123@gmail.com',NULL,'$2y$10$511toGSQNdqF4J1fZSCNgu/3LkYgzhRZnSdP7674q/F26oJUePzke','admin',NULL,'Tup8Va7oksm37bu5taOhpbY12lTOiAYGgKjxBdN4vklhxenJTulALnxhs97H','2023-04-21 08:07:09','2023-05-20 08:23:17'),(5,'- B19DCCN516_Ninh Thị Phượng','ninhphuong2k1nb@gmail.com',NULL,NULL,'user','110084024588864010795',NULL,'2023-04-23 00:30:28','2023-04-23 00:30:28'),(6,'Nguyên A','men1@men.com',NULL,'$2y$10$QVZrhbmWDZvOtV9mxRbPn.wmb0D2pICY9.bqovk6GgQLdm6ind3zC','user',NULL,NULL,'2023-05-10 08:49:50','2023-05-10 08:49:50'),(7,'Nguyễn Bích Ngọc','english9999@gmail.com',NULL,'123456','admin','117136655607246484882',NULL,'2023-05-12 03:15:11','2023-05-19 20:07:09'),(8,'Ngoc','b@example.com',NULL,'$2y$10$0oc/VusF1b72fSmMzRbgFOe4ROI4Fgu/.Gdb8GeHZIX8dlQLoD9mK','admin',NULL,NULL,'2023-05-20 00:46:48','2023-05-20 00:46:48'),(9,'Trang','b1@example.com',NULL,'$2y$10$i.UctGOO0VzIPTAhShfcAOlpT3GZz6CNKrGso/Qu.P4UxHKUSlTpy','admin',NULL,'SaVWi4nVaAWY8j2O1jCnX7NIL8QjZ8qyuVobKnKQeY5seGQZDGBFjC6QeG3W','2023-05-20 07:53:11','2023-05-20 07:53:11'),(10,'Ninh Phượng','b3@example.com',NULL,'$2y$10$bW5H9KdNXaTO6gEFcEJgzeIO/WG9dWKAWYF4NO4Y4wRuPkr0gWx0K','user',NULL,NULL,'2023-05-20 08:37:16','2023-05-20 08:37:16'),(11,'Ninh','b3@gmail.com',NULL,'$2y$10$BDIiGZzEL6vS7v2kW6hrnu528usBfv3J83z4IHW4y6jPiAeITAweu','user',NULL,'JvuMAAVCtKTrc4m1qeQmpr9Vcq1OzmwrkksBYnzYwwkyPgR0P5WgQzeyseGK','2023-05-20 08:38:16','2023-05-20 08:38:16'),(12,'aaaa','ngoc.nwb@beetechsoft.vn',NULL,'$2y$10$r77RgPpGuDwuWq6El9H8DOd9KcB3DfZBQJdM//ufmJW9Zu/kqnx4y','user',NULL,NULL,'2023-05-20 08:52:00','2023-05-20 08:52:00');
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

-- Dump completed on 2023-05-30  5:28:27
