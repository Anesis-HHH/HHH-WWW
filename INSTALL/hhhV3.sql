-- MySQL dump 10.16  Distrib 10.1.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: hhhV3
-- ------------------------------------------------------
-- Server version	10.1.12-MariaDB-1~jessie

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
-- Table structure for table `boite_a_erreur`
--

DROP TABLE IF EXISTS `boite_a_erreur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boite_a_erreur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `objet` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commentaire_news`
--

DROP TABLE IF EXISTS `commentaire_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentaire_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `commentaire` text COLLATE utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4455 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commentaire_projets`
--

DROP TABLE IF EXISTS `commentaire_projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentaire_projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `commentaire` text COLLATE utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=492 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `volume` varchar(50) COLLATE utf8_bin NOT NULL,
  `traducteur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `check` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `editeur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `qcheck` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `numero_chapitre` varchar(20) COLLATE utf8_bin NOT NULL,
  `dl` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `pop` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=550 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `download2`
--

DROP TABLE IF EXISTS `download2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `volume` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `traducteur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `checkeur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `editeur` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `qcheck` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `numero_chapitre` varchar(20) COLLATE utf8_bin NOT NULL,
  `dl` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `pop` int(11) NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `numero` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=666 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `membre`
--

DROP TABLE IF EXISTS `membre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(200) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `msn` varchar(100) COLLATE utf8_bin NOT NULL,
  `birthday` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `loisirs` text COLLATE utf8_bin NOT NULL,
  `poste` varchar(80) COLLATE utf8_bin NOT NULL,
  `pole1` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pole2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pole3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `pole4` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `contribution` text COLLATE utf8_bin NOT NULL,
  `statut` varchar(20) COLLATE utf8_bin NOT NULL,
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `titre` varchar(200) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(100) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  `best` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT 'non',
  `contextbest` text COLLATE utf8_bin,
  `merci` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=338 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notation`
--

DROP TABLE IF EXISTS `notation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_projet` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `nombre_vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projets`
--

DROP TABLE IF EXISTS `projets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(20) COLLATE utf8_bin NOT NULL,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `titre_jap` varchar(100) COLLATE utf8_bin NOT NULL,
  `titre_romanji` varchar(100) COLLATE utf8_bin NOT NULL,
  `couverture` varchar(150) COLLATE utf8_bin NOT NULL,
  `extrait` text COLLATE utf8_bin NOT NULL,
  `auteur` varchar(50) COLLATE utf8_bin NOT NULL,
  `volume` varchar(50) COLLATE utf8_bin NOT NULL,
  `annee` varchar(20) COLLATE utf8_bin NOT NULL,
  `genre1` varchar(100) COLLATE utf8_bin NOT NULL,
  `genre2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `genre3` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `editeur_jap` varchar(50) COLLATE utf8_bin NOT NULL,
  `traduction_us` varchar(80) COLLATE utf8_bin NOT NULL,
  `traduction_fr` varchar(80) COLLATE utf8_bin NOT NULL,
  `edition` varchar(80) COLLATE utf8_bin NOT NULL,
  `nombre_chapitre` int(11) NOT NULL,
  `resume` text COLLATE utf8_bin NOT NULL,
  `release` text COLLATE utf8_bin NOT NULL,
  `statut` varchar(20) COLLATE utf8_bin NOT NULL,
  `licencie` varchar(80) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `releases`
--

DROP TABLE IF EXISTS `releases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `releases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) COLLATE utf8_bin NOT NULL,
  `release` varchar(100) COLLATE utf8_bin NOT NULL,
  `chapitre` varchar(20) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(100) COLLATE utf8_bin NOT NULL,
  `traducteur` varchar(50) COLLATE utf8_bin NOT NULL,
  `editeur` varchar(50) COLLATE utf8_bin NOT NULL,
  `checkeur` varchar(50) COLLATE utf8_bin NOT NULL,
  `timestamp` bigint(20) NOT NULL DEFAULT '0',
  `timestamp_modification` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=446 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-04  2:42:02
