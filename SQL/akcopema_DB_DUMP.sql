-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: 2100695_cse345
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `MOVIE_ID` int(2) NOT NULL,
  `MOVIE_NAME` tinytext NOT NULL,
  `MOVIE_DIRECTOR` tinytext NOT NULL,
  `MOVIE_LEAD_ACTOR` tinytext NOT NULL,
  `MOVIE_RATING` tinytext NOT NULL,
  `MOVIE_DESCRIPTION` mediumtext NOT NULL,
  `MOVIE_YEAR` int(11) NOT NULL,
  `MOVIE_RUNTIME` int(11) NOT NULL,
  `MOVIE_YOUTUBE` varchar(254) NOT NULL,
  PRIMARY KEY (`MOVIE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (1,'Everest','Baltasar Kormákur',' Jason Clarke','PG-13','A climbing expedition on Mt. Everest is devastated by a severe snow storm.',2015,120,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dOHS-mxn0RQ\" frameborder=\"0\" allowfullscreen></iframe>'),(2,'Dawn of the Planet of the Apes','Matt Reeves',' Gary Oldman','PG-13','A growing nation of genetically evolved apes led by Caesar is threatened by a band of human survivors of the devastating virus unleashed a decade earlier.',2014,130,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EcRIUU_QZiY\" frameborder=\"0\" allowfullscreen></iframe>'),(3,'The Dark Knight','Christopher Nolan',' Christian Bale','PG-13','When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.',2008,150,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EXeTwQWrcwY\" frameborder=\"0\" allowfullscreen></iframe>'),(4,'Interstellar','Christopher Nolan','Matthew McConaughey','PG-13','A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',2014,170,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0vxOhd4qlnA\" frameborder=\"0\" allowfullscreen></iframe>'),(5,'The Bourne Identity',' Doug Liman','Matt Damon','PG-13','A man is picked up by a fishing boat, bullet-riddled and suffering from amnesia, before racing to elude assassins and regain his memory.',2002,120,'<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/FpKaB5dvQ4g\" frameborder=\"0\" allowfullscreen></iframe>');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_times`
--

DROP TABLE IF EXISTS `movie_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_times` (
  `SHOWTIME_ID` int(2) NOT NULL,
  `MOVIE_ID` int(2) NOT NULL,
  PRIMARY KEY (`SHOWTIME_ID`,`MOVIE_ID`),
  KEY `MOVIE_ID_idx` (`MOVIE_ID`),
  CONSTRAINT `MOVIE_ID` FOREIGN KEY (`MOVIE_ID`) REFERENCES `movie` (`MOVIE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `SHOWTIME_ID` FOREIGN KEY (`SHOWTIME_ID`) REFERENCES `showtime` (`SHOWTIME_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_times`
--

LOCK TABLES `movie_times` WRITE;
/*!40000 ALTER TABLE `movie_times` DISABLE KEYS */;
INSERT INTO `movie_times` VALUES (1,1),(3,1),(5,1),(2,2),(4,2),(11,3),(12,3),(13,3),(14,3),(15,3),(6,4),(8,4),(10,4),(7,5),(9,5);
/*!40000 ALTER TABLE `movie_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `new_view`
--

DROP TABLE IF EXISTS `new_view`;
/*!50001 DROP VIEW IF EXISTS `new_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `new_view` AS SELECT 
 1 AS `MOVIE_NAME`,
 1 AS `MOVIE_ID`,
 1 AS `SHOWTIME_ID`,
 1 AS `TIME_START`,
 1 AS `TIME_END`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `RESERVATION_ID` int(3) NOT NULL AUTO_INCREMENT,
  `USER_EMAIL` varchar(254) NOT NULL,
  `SHOWTIME_ID` int(2) NOT NULL,
  `RESERVATION_TICKETNUM` int(3) NOT NULL,
  `RESERVATION_CREATION` date NOT NULL,
  `RESERVATION_DATE` date NOT NULL,
  PRIMARY KEY (`RESERVATION_ID`,`USER_EMAIL`,`SHOWTIME_ID`),
  KEY `USER_EMAIL_idx` (`USER_EMAIL`),
  KEY `FK_SHOWTIME_ID_idx` (`SHOWTIME_ID`),
  CONSTRAINT `FK_SHOWTIME_ID` FOREIGN KEY (`SHOWTIME_ID`) REFERENCES `showtime` (`SHOWTIME_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `USER_EMAIL` FOREIGN KEY (`USER_EMAIL`) REFERENCES `user_account` (`USER_EMAIL`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `showroom`
--

DROP TABLE IF EXISTS `showroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `showroom` (
  `SHOWROOM_ID` int(2) NOT NULL,
  `SHOWROOM_DESC` mediumtext,
  PRIMARY KEY (`SHOWROOM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showroom`
--

LOCK TABLES `showroom` WRITE;
/*!40000 ALTER TABLE `showroom` DISABLE KEYS */;
INSERT INTO `showroom` VALUES (1,'Room 1'),(2,'Room 2'),(3,'Room 3');
/*!40000 ALTER TABLE `showroom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `showtime`
--

DROP TABLE IF EXISTS `showtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `showtime` (
  `SHOWTIME_ID` int(2) NOT NULL,
  `SHOWROOM_ID` int(2) NOT NULL,
  `TIME_START` time NOT NULL,
  `TIME_END` time NOT NULL,
  PRIMARY KEY (`SHOWROOM_ID`,`SHOWTIME_ID`),
  KEY `SHOWROOM_ID` (`SHOWTIME_ID`),
  CONSTRAINT `SHOWROOM_ID` FOREIGN KEY (`SHOWROOM_ID`) REFERENCES `showroom` (`SHOWROOM_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `showtime`
--

LOCK TABLES `showtime` WRITE;
/*!40000 ALTER TABLE `showtime` DISABLE KEYS */;
INSERT INTO `showtime` VALUES (1,1,'10:00:00','13:00:00'),(2,1,'13:00:00','16:00:00'),(3,1,'16:00:00','19:00:00'),(4,1,'19:00:00','22:00:00'),(5,1,'22:00:00','01:00:00'),(6,2,'10:00:00','13:00:00'),(7,2,'13:00:00','16:00:00'),(8,2,'16:00:00','19:00:00'),(9,2,'19:00:00','22:00:00'),(10,2,'22:00:00','01:00:00'),(11,3,'10:00:00','13:00:00'),(12,3,'13:00:00','16:00:00'),(13,3,'16:00:00','19:00:00'),(14,3,'19:00:00','22:00:00'),(15,3,'22:00:00','01:00:00');
/*!40000 ALTER TABLE `showtime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_account` (
  `USER_EMAIL` varchar(254) NOT NULL,
  `USER_PASSENCRYPT` tinytext NOT NULL,
  `USER_FNAME` tinytext NOT NULL,
  `USER_LNAME` tinytext NOT NULL,
  `USER_STREETNUM` int(11) NOT NULL,
  `USER_STREET` tinytext NOT NULL,
  `USER_ZIP` int(11) NOT NULL,
  PRIMARY KEY (`USER_EMAIL`),
  UNIQUE KEY `USER_EMAIL_UNIQUE` (`USER_EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_account`
--

LOCK TABLES `user_account` WRITE;
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` VALUES ('jdoe@cse345.edu','1234','John','Doe',1234,'Database Street',12345);
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `new_view`
--

/*!50001 DROP VIEW IF EXISTS `new_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `new_view` AS select `t1`.`MOVIE_NAME` AS `MOVIE_NAME`,`t1`.`MOVIE_ID` AS `MOVIE_ID`,`t1`.`SHOWTIME_ID` AS `SHOWTIME_ID`,`t1`.`TIME_START` AS `TIME_START`,`t1`.`TIME_END` AS `TIME_END` from (select `2100695_cse345`.`showtime`.`SHOWTIME_ID` AS `SHOWTIME_ID`,`2100695_cse345`.`movie`.`MOVIE_ID` AS `MOVIE_ID`,`2100695_cse345`.`showtime`.`TIME_START` AS `TIME_START`,`2100695_cse345`.`showtime`.`TIME_END` AS `TIME_END`,`2100695_cse345`.`movie`.`MOVIE_NAME` AS `MOVIE_NAME` from ((`2100695_cse345`.`movie_times` join `2100695_cse345`.`showtime` on((`2100695_cse345`.`movie_times`.`SHOWTIME_ID` = `2100695_cse345`.`showtime`.`SHOWTIME_ID`))) join `2100695_cse345`.`movie` on((`2100695_cse345`.`movie`.`MOVIE_ID` = `2100695_cse345`.`movie_times`.`MOVIE_ID`)))) `t1` where (`t1`.`MOVIE_NAME` = 'The Dark Knight') */;
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

-- Dump completed on 2016-04-02 11:35:53
