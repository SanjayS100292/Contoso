/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.8-log : Database - hotelmanagementsystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hotelmanagementsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hotelmanagementsystem`;

/*Table structure for table `hotels` */

DROP TABLE IF EXISTS `hotels`;

CREATE TABLE `hotels` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `hotel` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hotels` */

insert  into `hotels`(`hid`,`hotel`,`phone`,`email`,`address`,`license`,`image`,`district`) values 
(5,'LCC','7897897899','lcc@mail.com','LCC\r\nAdrs','LLLMMM','./images/Build-Weather-App-in-JavaScript (1).jpg','Ernakulam');

/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
  `cId` int(11) NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) NOT NULL,
  `cAddress` varchar(50) NOT NULL,
  `cContact` varchar(50) NOT NULL,
  `cEmail` varchar(50) NOT NULL,
  `cDistrict` varchar(50) NOT NULL,
  `cAge` int(11) NOT NULL,
  `cGender` varchar(20) NOT NULL,
  PRIMARY KEY (`cId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblcustomer` */

insert  into `tblcustomer`(`cId`,`cName`,`cAddress`,`cContact`,`cEmail`,`cDistrict`,`cAge`,`cGender`) values 
(6,'AK','Ak Adrs\r\nVVV','9090909090','ak@mail.com','Thrissur',25,'Male');

/*Table structure for table `tblfeedback` */

DROP TABLE IF EXISTS `tblfeedback`;

CREATE TABLE `tblfeedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tblfeedback` */

insert  into `tblfeedback`(`fid`,`cid`,`feedback`,`date`) values 
(1,6,'Nice','2023-03-07'),
(2,6,'nhjbajshck\r\ncakm jn','2023-03-08');

/*Table structure for table `tbllogin` */

DROP TABLE IF EXISTS `tbllogin`;

CREATE TABLE `tbllogin` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbllogin` */

insert  into `tbllogin`(`logid`,`uid`,`username`,`password`,`usertype`,`status`) values 
(1,0,'admin@gmail.com','admin','Admin','Active'),
(2,6,'ak@mail.com','Ak@12345','Customer','Active'),
(3,5,'lcc@mail.com','Lcc@12345','Hotel','Active');

/*Table structure for table `tblrequest` */

DROP TABLE IF EXISTS `tblrequest`;

CREATE TABLE `tblrequest` (
  `reqId` int(11) NOT NULL AUTO_INCREMENT,
  `roomId` int(11) DEFAULT NULL,
  `cId` int(11) NOT NULL,
  `reqDate` datetime NOT NULL,
  `bokDate` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`reqId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblrequest` */

insert  into `tblrequest`(`reqId`,`roomId`,`cId`,`reqDate`,`bokDate`,`status`) values 
(8,8,6,'2023-03-07 00:00:00','2023-03-08 22:05:34','Vacated'),
(9,8,6,'2023-03-07 23:05:56',NULL,'Vacated'),
(10,9,6,'2023-03-08 17:10:40','2023-03-09 17:10:00','Vacated');

/*Table structure for table `tblroom` */

DROP TABLE IF EXISTS `tblroom`;

CREATE TABLE `tblroom` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `roomNo` varchar(50) NOT NULL,
  `roomDesc` varchar(50) NOT NULL,
  `roomRent` int(11) NOT NULL,
  `roomStatus` varchar(50) NOT NULL DEFAULT 'Available',
  `img` varchar(200) DEFAULT NULL,
  `hid` int(11) DEFAULT NULL,
  PRIMARY KEY (`roomId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblroom` */

insert  into `tblroom`(`roomId`,`roomNo`,`roomDesc`,`roomRent`,`roomStatus`,`img`,`hid`) values 
(8,'101','a bb ccc',10000,'Available','./images/Screenshot (2) (1).png',5),
(9,'102','jndchb',10000,'Available','./images/1level.jpg',5),
(10,'105','jncdjks\r\ncsdjbj',20000,'Available','./images/Build-Weather-App-in-JavaScript (1).jpg',5);

/*Table structure for table `tblservice` */

DROP TABLE IF EXISTS `tblservice`;

CREATE TABLE `tblservice` (
  `servId` int(11) NOT NULL AUTO_INCREMENT,
  `servName` varchar(50) NOT NULL,
  `servDesc` varchar(100) NOT NULL,
  `servRate` varchar(50) NOT NULL,
  `hid` int(11) DEFAULT NULL,
  PRIMARY KEY (`servId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tblservice` */

insert  into `tblservice`(`servId`,`servName`,`servDesc`,`servRate`,`hid`) values 
(7,'Ac','AC AVA','1000',5),
(8,'BC','BC BVB','2000',5),
(9,'CC','CC CVC','1500',5),
(10,'jkhi','kjnkhjbn','2000',5);

/*Table structure for table `tblservicebook` */

DROP TABLE IF EXISTS `tblservicebook`;

CREATE TABLE `tblservicebook` (
  `sbid` int(11) NOT NULL AUTO_INCREMENT,
  `reqId` int(11) DEFAULT NULL,
  `servid` int(11) DEFAULT NULL,
  PRIMARY KEY (`sbid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblservicebook` */

insert  into `tblservicebook`(`sbid`,`reqId`,`servid`) values 
(4,8,7),
(5,8,9),
(6,9,7),
(7,9,9),
(8,10,9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
