/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.5.8-MariaDB : Database - namaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`namaan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `namaan`;

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `fullname` text NOT NULL,
  `phonenumber` int(12) NOT NULL,
  `date` int(10) NOT NULL,
  `session` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `appointment` */

insert  into `appointment`(`fullname`,`phonenumber`,`date`,`session`) values ('Chhiring Moktan',452658002,2022,'AM'),('Chhiring Moktan',452658002,2022,'AM'),('Chhiring Moktan',450512521,6,'AM'),('Temullen',456789034,6122022,'AM'),('Chhiring Moktan',450512521,6122022,'AM');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `fullname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `contact` */

insert  into `contact`(`fullname`,`email`,`subject`) values ('','abc',''),('Chhiring Moktan','moktanchhiring07@gma','Parramatta'),('Chhiring Moktan','moktanchhiring07@gma','granville'),('Chhiring Moktan','moktanchhiring07@gmail.com','abc'),('Chhiring Moktan','moktanchhiring07@gmail.com','granville'),('Chhiring Moktan','moktanchhiring07@gmail.com','dfsssssssssssssssssssssssssssssssssssssssssssssssssss'),('Resume-Chhiring','moktanchhiring07@gmail.com','ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss'),('dfsfsf','moktanchhiring07@gmail.com','ssss'),('Chhiring Moktan','moktanchhiring07@gmail.com','abcdedgghh'),('Aquanox','aquanox04@gmail.com','Hi, I am having a problem on logging on in the website. Can you please help me out?'),('Chhiring Moktan','moktanchhiring07@gmail.com','m'),('Black','black07@gmail.com','Hi, I want to make a visit in your organisation.'),('Chhiring Moktan','moktanchhiring07@gmail.com','Hi, I need to make a visit tomorrow.');

/*Table structure for table `registration` */

DROP TABLE IF EXISTS `registration`;

CREATE TABLE `registration` (
  `fullname` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `registration` */

insert  into `registration`(`fullname`,`username`,`email`,`phonenumber`,`password`) values ('Chhiring Moktan','cmokta03','moktanchhiring07@gmail.com',452658002,'chhiring'),('ABCDE','chhiring07','chhiring07@gmail.com',450512521,'Chhiring'),('','moktanchhi','',0,'chhiring'),('Temullen','Temullen07','temullen07@gmail.com',456789034,'ABCDEFG'),('ABC','CDE','abc@gmail.com',452658002,'abc'),('Chhiring Moktan','moktanchhi','moktanchhiring07@gmail.com',452658002,'chhiring'),('Roshan Saud','roshan','roshansaud07@gmail.com',434521558,'roshansu'),('Dinesh Kartik','dineshkart','dineshkartik098@gmail.com',452345857,'Chhiring'),('ABC','ding','abc@gmail.com',456358558,'Cap2301@'),('Chhiring Moktan','roshansaud','moktanchhiring07@gmail.com',452658002,'roshansu'),('Waiba Lama','waibalama','waibalama@gmail.com',456789810,'Apple07'),('SSSS','sss07','sss07@gmail.com',452658002,'Ball07'),('Chhiring Tamang','apple07','apple07@gmail.com',452658002,'Text07'),('Yasas','admin','admin@gmail.com',12222222,'123');

/*Table structure for table `tbl_article` */

DROP TABLE IF EXISTS `tbl_article`;

CREATE TABLE `tbl_article` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_article` */

insert  into `tbl_article`(`id`,`article_title`,`description`,`created_by`,`created_datetime`) values (1,'asdsad','sadsadsad sadasdasdas asdasdsad asdsadsa dsadsadsadas dsadsasad sadsadsad sadasdasdas asdasdsad asdsadsa dsadsadsadas dsadsasad','phy','2022-06-06 05:53:26'),(2,'sdasdasdasd','sadsadsad sadasdasdas asdasdsad asdsadsa dsadsadsadas dsadsasad sadsadsad sadasdasdas asdasdsad asdsadsa dsadsadsadas dsadsasadasdasdsadsadsadsads\r\nasdsad\r\nsadsa\r\nasdsadasdsadsd','phy','2022-06-06 05:53:26');

/*Table structure for table `tbl_comment` */

DROP TABLE IF EXISTS `tbl_comment`;

CREATE TABLE `tbl_comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `story_comment` varchar(100) DEFAULT NULL,
  `story_id` int(5) DEFAULT NULL,
  `comment_by` varchar(20) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_comment` */

insert  into `tbl_comment`(`id`,`story_comment`,`story_id`,`comment_by`,`rating`,`created_date`) values (1,'asdasdsa',0,'pat',2,'2022-06-05 22:08:01'),(2,'asdsadsad',1,'pat',2,'2022-06-05 22:08:49'),(3,'sdfsdfsdfsd',2,'pat',5,'2022-06-05 22:17:04'),(4,'xczxczczxc',1,'pat',3,'2022-06-05 22:17:15');

/*Table structure for table `tbl_question` */

DROP TABLE IF EXISTS `tbl_question`;

CREATE TABLE `tbl_question` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` varchar(20) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `answer_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_question` */

insert  into `tbl_question`(`id`,`title`,`question`,`created_date`,`created_user`,`answer`,`answer_by`) values (2,'Sapmpe title','sample question','2022-06-02 22:05:55','Temullen07','sample answer',NULL),(3,'weqweas','asdasd','2022-06-02 22:06:42','Temullen07',NULL,NULL);

/*Table structure for table `tbl_stories` */

DROP TABLE IF EXISTS `tbl_stories`;

CREATE TABLE `tbl_stories` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `privacy_level` varchar(50) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_stories` */

insert  into `tbl_stories`(`id`,`post_title`,`description`,`privacy_level`,`created_by`,`created_date`) values (1,'khjkjhk','jhkhk','LOW-PRIVACY','pat','2022-06-05 21:00:45'),(2,'khjkjhk','sdsad','HIGH-PRIVACY','pat','2022-06-05 21:14:57');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `pword` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `proof_of` varchar(100) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`first_name`,`last_name`,`username`,`user_type`,`pword`,`email`,`address`,`phone_number`,`profession`,`proof_of`,`created_datetime`,`status_code`) values (1,'Admin','Admin','admin','admin','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9','admin@gmail.com','','0715833470',NULL,NULL,'2022-06-05 19:15:45','ACTIVE'),(2,'asd','pat','pat','patient','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9','ravinathdo@gmail.com','10C Raddoluwa\r\nSeeduwa','0715833470',NULL,NULL,'2022-06-05 19:17:30','ACTIVE'),(3,'fdf','phy','phy','physician','*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9','ravinathdo@gmail.com','10C Raddoluwa\r\nSeeduwa','0715833470',NULL,NULL,'2022-06-05 19:20:04','ACTIVE');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
