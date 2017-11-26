/*
SQLyog Community v12.12 (32 bit)
MySQL - 5.7.14 : Database - rest-api-db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rest-api-db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rest-api-db`;

/*Data for the table `teams` */

insert  into `teams`(`id`,`name`,`code`,`short_name`,`logo`) values (1,'Club Africain','CA','Club Africain',NULL),(2,'Espérance Sportive de Tunis','EST','ES Tunis',NULL),(3,'Club Athlétique Bizertin','CAB','CA Bizertin',NULL),(4,'Union Sportive Monastirienne','USMO','US Monastir',NULL),(5,'Club Sportif Sfaxien','CSS','CS Sfaxien',NULL),(6,'Etoile Sportive du Sahel','ESS','ES Sahel',NULL),(7,'Etoile Sportive de Metlaoui','ESM','ES Metlaoui',NULL),(8,'Jeunesse Sportive de Kairouan','JSK','JS Kairouanaise',NULL),(9,'Avenir Sportif de Gabès','ASG','AS Gabes',NULL),(10,'Stade Tunisien','ST','Stade Tunisien',NULL),(11,'Stade Gabesien','SG','Stade Gabesien',NULL),(12,'Club Olympique de Médenine','COM','CO Medenine',NULL),(13,'Espérance Sportive de Zarzis','ESZ','ES Zarzis',NULL),(14,'Union Sportive de Ben Guerdane','USBG','US Ben Guerdane',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
