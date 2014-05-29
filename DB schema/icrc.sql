-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(7) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `form_address`;
CREATE TABLE `form_address` (
  `form_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL,
  `address_1` varchar(45) DEFAULT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `form_details_id` int(11) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `address_type` char(1) DEFAULT NULL,
  PRIMARY KEY (`form_address_id`),
  KEY `fk_form_address_1` (`form_details_id`),
  CONSTRAINT `fk_form_address_1` FOREIGN KEY (`form_details_id`) REFERENCES `form_details` (`form_details_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `form_details`;
CREATE TABLE `form_details` (
  `form_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_ref` varchar(45) DEFAULT NULL,
  `ref_id` varchar(45) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `register_center` varchar(45) DEFAULT NULL,
  `family_status` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `document_type` varchar(45) DEFAULT NULL,
  `document_no` varchar(45) DEFAULT NULL,
  `family_members` int(11) DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `registrar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`form_details_id`),
  UNIQUE KEY `tmp_ref_UNIQUE` (`tmp_ref`),
  UNIQUE KEY `ref_id_UNIQUE` (`ref_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `form_family`;
CREATE TABLE `form_family` (
  `form_family_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `national_number` varchar(15) DEFAULT NULL,
  `birthdate` int(10) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `study_status` varchar(45) DEFAULT NULL,
  `health_status` varchar(45) DEFAULT NULL,
  `with_family` varchar(45) DEFAULT NULL,
  `situation_in_family` varchar(45) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `form_details_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`form_family_id`),
  KEY `fk_form_family_details_1` (`form_details_id`),
  CONSTRAINT `fk_form_family_details_1` FOREIGN KEY (`form_details_id`) REFERENCES `form_details` (`form_details_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2014-05-29 15:12:15
