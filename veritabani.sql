-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: veritabani
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
-- Table structure for table `etkinlikler`
--

DROP TABLE IF EXISTS `etkinlikler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etkinlikler` (
  `EtkinlikID` int NOT NULL AUTO_INCREMENT,
  `EtkinlikAdi` varchar(100) DEFAULT NULL,
  `TarihSaat` datetime DEFAULT NULL,
  `Yer` varchar(100) DEFAULT NULL,
  `Aciklama` text,
  PRIMARY KEY (`EtkinlikID`),
  KEY `idx_etkinlik_adi` (`EtkinlikAdi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etkinlikler`
--

LOCK TABLES `etkinlikler` WRITE;
/*!40000 ALTER TABLE `etkinlikler` DISABLE KEYS */;
/*!40000 ALTER TABLE `etkinlikler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `etkinlikler_oturumlar`
--

DROP TABLE IF EXISTS `etkinlikler_oturumlar`;
/*!50001 DROP VIEW IF EXISTS `etkinlikler_oturumlar`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `etkinlikler_oturumlar` AS SELECT 
 1 AS `EtkinlikID`,
 1 AS `EtkinlikAdi`,
 1 AS `OturumID`,
 1 AS `OturumAdi`,
 1 AS `BaslangicTarihiSaat`,
 1 AS `BitisTarihiSaat`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `katilimci_etkinlik_bilgileri`
--

DROP TABLE IF EXISTS `katilimci_etkinlik_bilgileri`;
/*!50001 DROP VIEW IF EXISTS `katilimci_etkinlik_bilgileri`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `katilimci_etkinlik_bilgileri` AS SELECT 
 1 AS `KatilimciID`,
 1 AS `Ad`,
 1 AS `Soyad`,
 1 AS `EtkinlikID`,
 1 AS `EtkinlikAdi`,
 1 AS `TarihSaat`,
 1 AS `Yer`,
 1 AS `Aciklama`,
 1 AS `OturumID`,
 1 AS `OturumAdi`,
 1 AS `BaslangicTarihiSaat`,
 1 AS `BitisTarihiSaat`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `katilimci_stant_bilgileri`
--

DROP TABLE IF EXISTS `katilimci_stant_bilgileri`;
/*!50001 DROP VIEW IF EXISTS `katilimci_stant_bilgileri`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `katilimci_stant_bilgileri` AS SELECT 
 1 AS `KatilimciID`,
 1 AS `Ad`,
 1 AS `Soyad`,
 1 AS `StantID`,
 1 AS `StantNumarasi`,
 1 AS `KiralamaTarihi`,
 1 AS `KiralamaSuresi`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `katilimcilar`
--

DROP TABLE IF EXISTS `katilimcilar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `katilimcilar` (
  `KatilimciID` int NOT NULL AUTO_INCREMENT,
  `Ad` varchar(50) DEFAULT NULL,
  `Soyad` varchar(50) DEFAULT NULL,
  `Kurum` varchar(100) DEFAULT NULL,
  `IletisimBilgileri` varchar(100) DEFAULT NULL,
  `KayitTarihi` date DEFAULT NULL,
  PRIMARY KEY (`KatilimciID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `katilimcilar`
--

LOCK TABLES `katilimcilar` WRITE;
/*!40000 ALTER TABLE `katilimcilar` DISABLE KEYS */;
/*!40000 ALTER TABLE `katilimcilar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oturumlar`
--

DROP TABLE IF EXISTS `oturumlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oturumlar` (
  `OturumID` int NOT NULL AUTO_INCREMENT,
  `OturumAdi` varchar(100) DEFAULT NULL,
  `BaslangicTarihiSaat` datetime DEFAULT NULL,
  `BitisTarihiSaat` datetime DEFAULT NULL,
  `Konusmacilar` text,
  `EtkinlikID` int DEFAULT NULL,
  PRIMARY KEY (`OturumID`),
  KEY `idx_baslangic_tarihi` (`BaslangicTarihiSaat`),
  KEY `idx_bitis_tarihi` (`BitisTarihiSaat`),
  KEY `oturumlar_ibfk_1` (`EtkinlikID`),
  CONSTRAINT `oturumlar_ibfk_1` FOREIGN KEY (`EtkinlikID`) REFERENCES `etkinlikler` (`EtkinlikID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oturumlar`
--

LOCK TABLES `oturumlar` WRITE;
/*!40000 ALTER TABLE `oturumlar` DISABLE KEYS */;
/*!40000 ALTER TABLE `oturumlar` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `oturum_silme_trigger` AFTER DELETE ON `oturumlar` FOR EACH ROW BEGIN
    INSERT INTO silinenoturumlar (SilinenOturumID)
    VALUES (OLD.OturumID);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `silinenoturumlar`
--

DROP TABLE IF EXISTS `silinenoturumlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `silinenoturumlar` (
  `SilinenOturumID` int NOT NULL AUTO_INCREMENT,
  `SilinenOturumOturumID` int DEFAULT NULL,
  `SilinmeTarihi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SilinenOturumID`),
  KEY `SilinenOturumOturumID` (`SilinenOturumOturumID`),
  CONSTRAINT `silinenoturumlar_ibfk_1` FOREIGN KEY (`SilinenOturumOturumID`) REFERENCES `oturumlar` (`OturumID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `silinenoturumlar`
--

LOCK TABLES `silinenoturumlar` WRITE;
/*!40000 ALTER TABLE `silinenoturumlar` DISABLE KEYS */;
INSERT INTO `silinenoturumlar` VALUES (1,NULL,'2024-04-24 12:15:39'),(8,NULL,'2024-04-24 15:01:28'),(9,NULL,'2024-04-24 15:01:29'),(10,NULL,'2024-04-24 17:01:23'),(11,NULL,'2024-04-24 17:01:25');
/*!40000 ALTER TABLE `silinenoturumlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `silinenstantlar`
--

DROP TABLE IF EXISTS `silinenstantlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `silinenstantlar` (
  `StantID` int DEFAULT NULL,
  `StantNumarasi` varchar(255) DEFAULT NULL,
  `KiralamaTarihi` datetime DEFAULT NULL,
  `KiralamaSuresi` int DEFAULT NULL,
  `KatilimciID` int DEFAULT NULL,
  `SilinmeTarihi` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `silinenstantlar`
--

LOCK TABLES `silinenstantlar` WRITE;
/*!40000 ALTER TABLE `silinenstantlar` DISABLE KEYS */;
INSERT INTO `silinenstantlar` VALUES (5,'4-B','2024-04-22 00:00:00',2,1,'2024-04-23 20:32:22'),(6,'4-B','2024-12-01 00:00:00',2,1,'2024-04-23 20:32:59'),(7,'1-C','2024-04-23 19:46:00',1,1,'2024-04-23 20:52:54'),(12,'1-C','2024-04-23 19:54:00',1,1,'2024-04-23 20:55:07'),(11,'1-C','2024-04-23 19:54:00',1,1,'2024-04-23 20:55:09'),(10,'1-C','2024-04-23 19:54:00',1,1,'2024-04-23 20:55:10'),(9,'1-C','2024-04-23 19:54:00',1,1,'2024-04-23 20:55:12'),(8,'1-C','2024-04-23 19:54:00',1,1,'2024-04-23 20:55:13'),(13,'1-C','2024-04-23 19:58:00',1,1,'2024-04-23 20:59:03'),(4,'4-A','2024-04-25 20:20:00',2,1,'2024-04-24 18:03:11'),(14,'4-A','2024-04-24 20:00:16',5,5,'2024-04-24 18:15:41'),(15,'4-A','2024-04-25 19:30:22',2,6,'2024-04-24 20:01:46'),(16,'4-A','2024-04-25 22:00:34',4,7,'2024-04-24 20:04:50');
/*!40000 ALTER TABLE `silinenstantlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stantlar`
--

DROP TABLE IF EXISTS `stantlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stantlar` (
  `StantID` int NOT NULL AUTO_INCREMENT,
  `StantNumarasi` varchar(255) DEFAULT NULL,
  `KiralamaTarihi` datetime DEFAULT NULL,
  `KiralamaSuresi` int DEFAULT NULL,
  `KatilimciID` int DEFAULT NULL,
  PRIMARY KEY (`StantID`),
  KEY `KatilimciID` (`KatilimciID`),
  CONSTRAINT `stantlar_ibfk_1` FOREIGN KEY (`KatilimciID`) REFERENCES `katilimcilar` (`KatilimciID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stantlar`
--

LOCK TABLES `stantlar` WRITE;
/*!40000 ALTER TABLE `stantlar` DISABLE KEYS */;
/*!40000 ALTER TABLE `stantlar` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trg_AfterDeleteStant` AFTER DELETE ON `stantlar` FOR EACH ROW BEGIN
    INSERT INTO SilinenStantlar (StantID, StantNumarasi, KiralamaTarihi, KiralamaSuresi, KatilimciID)
    VALUES (OLD.StantID, OLD.StantNumarasi, OLD.KiralamaTarihi, OLD.KiralamaSuresi, OLD.KatilimciID);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `tum_stantlar`
--

DROP TABLE IF EXISTS `tum_stantlar`;
/*!50001 DROP VIEW IF EXISTS `tum_stantlar`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `tum_stantlar` AS SELECT 
 1 AS `StantID`,
 1 AS `StantNumarasi`,
 1 AS `KiralamaTarihi`,
 1 AS `KiralamaSuresi`,
 1 AS `KatilimciAdi`,
 1 AS `KatilimciSoyadi`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'veritabani'
--

--
-- Final view structure for view `etkinlikler_oturumlar`
--

/*!50001 DROP VIEW IF EXISTS `etkinlikler_oturumlar`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `etkinlikler_oturumlar` AS select `e`.`EtkinlikID` AS `EtkinlikID`,`e`.`EtkinlikAdi` AS `EtkinlikAdi`,`o`.`OturumID` AS `OturumID`,`o`.`OturumAdi` AS `OturumAdi`,`o`.`BaslangicTarihiSaat` AS `BaslangicTarihiSaat`,`o`.`BitisTarihiSaat` AS `BitisTarihiSaat` from (`etkinlikler` `e` join `oturumlar` `o` on((`e`.`EtkinlikID` = `o`.`EtkinlikID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `katilimci_etkinlik_bilgileri`
--

/*!50001 DROP VIEW IF EXISTS `katilimci_etkinlik_bilgileri`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `katilimci_etkinlik_bilgileri` AS select `k`.`KatilimciID` AS `KatilimciID`,`k`.`Ad` AS `Ad`,`k`.`Soyad` AS `Soyad`,`e`.`EtkinlikID` AS `EtkinlikID`,`e`.`EtkinlikAdi` AS `EtkinlikAdi`,`e`.`TarihSaat` AS `TarihSaat`,`e`.`Yer` AS `Yer`,`e`.`Aciklama` AS `Aciklama`,`o`.`OturumID` AS `OturumID`,`o`.`OturumAdi` AS `OturumAdi`,`o`.`BaslangicTarihiSaat` AS `BaslangicTarihiSaat`,`o`.`BitisTarihiSaat` AS `BitisTarihiSaat` from (((`katilimcilar` `k` join `stantlar` `s` on((`k`.`KatilimciID` = `s`.`KatilimciID`))) join `etkinlikler` `e` on((`s`.`StantID` = `e`.`EtkinlikID`))) join `oturumlar` `o` on((`e`.`EtkinlikID` = `o`.`EtkinlikID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `katilimci_stant_bilgileri`
--

/*!50001 DROP VIEW IF EXISTS `katilimci_stant_bilgileri`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `katilimci_stant_bilgileri` AS select `k`.`KatilimciID` AS `KatilimciID`,`k`.`Ad` AS `Ad`,`k`.`Soyad` AS `Soyad`,`s`.`StantID` AS `StantID`,`s`.`StantNumarasi` AS `StantNumarasi`,`s`.`KiralamaTarihi` AS `KiralamaTarihi`,`s`.`KiralamaSuresi` AS `KiralamaSuresi` from (`katilimcilar` `k` join `stantlar` `s` on((`k`.`KatilimciID` = `s`.`KatilimciID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tum_stantlar`
--

/*!50001 DROP VIEW IF EXISTS `tum_stantlar`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tum_stantlar` AS select `s`.`StantID` AS `StantID`,`s`.`StantNumarasi` AS `StantNumarasi`,`s`.`KiralamaTarihi` AS `KiralamaTarihi`,`s`.`KiralamaSuresi` AS `KiralamaSuresi`,`k`.`Ad` AS `KatilimciAdi`,`k`.`Soyad` AS `KatilimciSoyadi` from (`stantlar` `s` join `katilimcilar` `k` on((`s`.`KatilimciID` = `k`.`KatilimciID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-24 21:45:53
