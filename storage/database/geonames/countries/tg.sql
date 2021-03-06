-- MySQL dump 10.13  Distrib 5.7.32, for osx10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: it-jobSight
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Dumping data for table `<<prefix>>subadmin1`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin1` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('TG.26','TG','{\"en\":\"Savanes\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('TG.25','TG','{\"en\":\"Plateaux\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('TG.24','TG','{\"en\":\"Maritime\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('TG.22','TG','{\"en\":\"Centrale\"}',1);
INSERT INTO `<<prefix>>subadmin1` (`code`, `country_code`, `name`, `active`) VALUES ('TG.23','TG','{\"en\":\"Kara\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin1` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>subadmin2`
--

/*!40000 ALTER TABLE `<<prefix>>subadmin2` DISABLE KEYS */;
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2363489','TG','TG.24','{\"en\":\"Vo Prefecture\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2363533','TG','TG.24','{\"en\":\"Zio Prefecture\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.22.2363892','TG','TG.22','{\"en\":\"Pr??fecture de Tchaoudjo\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.22.2363907','TG','TG.22','{\"en\":\"Pr??fecture de Tchamba\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2364040','TG','TG.24','{\"en\":\"Pr??fecture de Yoto\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.22.2364078','TG','TG.22','{\"en\":\"Pr??fecture de Sotouboua\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2364751','TG','TG.25','{\"en\":\"Pr??fecture du Haho\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2364811','TG','TG.23','{\"en\":\"Pr??fecture de Doufelgou\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.26.2365189','TG','TG.26','{\"en\":\"Pr??fecture de l???Oti\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2365263','TG','TG.24','{\"en\":\"Golfe Prefecture\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2365382','TG','TG.23','{\"en\":\"Pr??fecture de la Kozah\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2365570','TG','TG.23','{\"en\":\"Pr??fecture de la Binah\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2365976','TG','TG.25','{\"en\":\"Pr??fecture du Kloto\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2366167','TG','TG.23','{\"en\":\"Pr??fecture de K??ran\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.26.2367163','TG','TG.26','{\"en\":\"Pr??fecture de Tone\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2367567','TG','TG.23','{\"en\":\"Pr??fecture de Bassar\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2367655','TG','TG.23','{\"en\":\"Pr??fecture d???Assoli\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2367659','TG','TG.25','{\"en\":\"Pr??fecture de Wawa\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2367885','TG','TG.25','{\"en\":\"Pr??fecture de l???Ogou\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2367989','TG','TG.24','{\"en\":\"Lacs Prefecture\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2368034','TG','TG.25','{\"en\":\"Pr??fecture d???Amou\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.24.2597440','TG','TG.24','{\"en\":\"Ave Prefecture\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2597441','TG','TG.25','{\"en\":\"Pr??fecture d???Agou\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2597442','TG','TG.25','{\"en\":\"Pr??fecture d???Est-Mono\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2597443','TG','TG.25','{\"en\":\"Pr??fecture du Moyen-Mono\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.25.2597444','TG','TG.25','{\"en\":\"Pr??fecture de Danyi\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.22.2597445','TG','TG.22','{\"en\":\"Pr??fecture de Blitta\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.23.2597446','TG','TG.23','{\"en\":\"Pr??fecture de Dankpen\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.26.2597447','TG','TG.26','{\"en\":\"Pr??fecture de Kpendjal\"}',1);
INSERT INTO `<<prefix>>subadmin2` (`code`, `country_code`, `subadmin1_code`, `name`, `active`) VALUES ('TG.26.2597448','TG','TG.26','{\"en\":\"Pr??fecture de Tandjouar??\"}',1);
/*!40000 ALTER TABLE `<<prefix>>subadmin2` ENABLE KEYS */;

--
-- Dumping data for table `<<prefix>>cities`
--

/*!40000 ALTER TABLE `<<prefix>>cities` DISABLE KEYS */;
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Vogan\"}',1.53,6.33,'P','PPL','TG.24',NULL,20569,'Africa/Lome',1,'2018-04-07 23:00:00','2018-04-07 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Ts??vi??\"}',1.21,6.43,'P','PPL','TG.24',NULL,55775,'Africa/Lome',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Tchamba\"}',1.42,9.03,'P','PPL','TG.22',NULL,25668,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Tabligbo\"}',1.50,6.58,'P','PPL','TG.24',NULL,13748,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Sotouboua\"}',0.98,8.56,'P','PPL','TG.22',NULL,21054,'Africa/Lome',1,'2013-01-09 23:00:00','2013-01-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Sokod??\"}',1.13,8.98,'P','PPLA','TG.22',NULL,117811,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Nots??\"}',1.17,6.95,'P','PPL','TG.25',NULL,22017,'Africa/Lome',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Niamtougou\"}',1.11,9.77,'P','PPL','TG.23',NULL,23261,'Africa/Lome',1,'2014-08-17 23:00:00','2014-08-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Sansann??-Mango\"}',0.47,10.36,'P','PPL','TG.26',NULL,37748,'Africa/Lome',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Lom??\"}',1.22,6.13,'P','PPLC','TG.24',NULL,749700,'Africa/Lome',1,'2019-09-04 23:00:00','2019-09-04 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Kpalim??\"}',0.63,6.90,'P','PPL','TG.25',NULL,75084,'Africa/Lome',1,'2013-08-16 23:00:00','2013-08-16 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Pagouda\"}',1.33,9.75,'P','PPL','TG.23',NULL,7686,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Kara\"}',1.19,9.55,'P','PPLA','TG.23',NULL,104207,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Kand??\"}',1.04,9.96,'P','PPL','TG.23',NULL,11466,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Dapaong\"}',0.21,10.86,'P','PPLA','TG.26',NULL,33324,'Africa/Lome',1,'2019-11-02 23:00:00','2019-11-02 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Bassar\"}',0.78,9.25,'P','PPL','TG.23','TG.23.2367567',61845,'Africa/Lome',1,'2014-09-02 23:00:00','2014-09-02 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Bafilo\"}',1.27,9.35,'P','PPL','TG.23',NULL,22543,'Africa/Lome',1,'2012-01-17 23:00:00','2012-01-17 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Badou\"}',0.60,7.58,'P','PPL','TG.25',NULL,24000,'Africa/Lome',1,'2013-10-29 23:00:00','2013-10-29 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Atakpam??\"}',1.13,7.53,'P','PPLA','TG.25',NULL,80683,'Africa/Lome',1,'2012-02-01 23:00:00','2012-02-01 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"An??ho\"}',1.59,6.23,'P','PPL','TG.24',NULL,47579,'Africa/Lome',1,'2014-10-16 23:00:00','2014-10-16 23:00:00');
INSERT INTO `<<prefix>>cities` (`country_code`, `name`, `longitude`, `latitude`, `feature_class`, `feature_code`, `subadmin1_code`, `subadmin2_code`, `population`, `time_zone`, `active`, `created_at`, `updated_at`) VALUES ('TG','{\"en\":\"Amlam??\"}',0.90,7.47,'P','PPL','TG.25',NULL,9870,'Africa/Lome',1,'2020-06-09 23:00:00','2020-06-09 23:00:00');
/*!40000 ALTER TABLE `<<prefix>>cities` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
