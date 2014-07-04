-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2014 at 05:06 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.14-2+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icrc`
--
CREATE DATABASE IF NOT EXISTS `icrc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `icrc`;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'السويداء');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('002ce607f4b679013550331b1986ca31', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.132 Safari/537.36', 1404477581, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(7) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_address`
--

DROP TABLE IF EXISTS `form_address`;
CREATE TABLE IF NOT EXISTS `form_address` (
  `form_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL,
  `address_1` varchar(45) DEFAULT NULL,
  `address_2` varchar(45) DEFAULT NULL,
  `form_details_id` int(11) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `address_type` char(1) DEFAULT NULL,
  `jump_date` int(10) unsigned NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `host_phone` varchar(45) NOT NULL,
  `host_modile` varchar(45) NOT NULL,
  PRIMARY KEY (`form_address_id`),
  KEY `fk_form_address_1` (`form_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_details`
--

DROP TABLE IF EXISTS `form_details`;
CREATE TABLE IF NOT EXISTS `form_details` (
  `form_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `tmp_ref` varchar(45) DEFAULT NULL,
  `ref_id` varchar(45) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `registered_date` int(10) NOT NULL,
  `register_center` varchar(45) DEFAULT NULL,
  `family_status` char(1) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `nmbr_registration` varchar(100) NOT NULL,
  `document_type` char(1) DEFAULT NULL,
  `document_no` varchar(45) DEFAULT NULL,
  `breadwinner_name` varchar(100) NOT NULL,
  `family_members` int(11) DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile_1` varchar(45) DEFAULT NULL,
  `mobile_2` varchar(45) NOT NULL,
  `registrar` varchar(45) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`form_details_id`),
  UNIQUE KEY `tmp_ref_UNIQUE` (`tmp_ref`),
  UNIQUE KEY `ref_id_UNIQUE` (`ref_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `form_details`
--

INSERT INTO `form_details` (`form_details_id`, `tmp_ref`, `ref_id`, `date_added`, `date_modified`, `registered_date`, `register_center`, `family_status`, `nationality`, `nmbr_registration`, `document_type`, `document_no`, `breadwinner_name`, `family_members`, `notes`, `phone`, `mobile_1`, `mobile_2`, `registrar`, `deleted`) VALUES
(1, '12345', 'wwe', 2014, 2014, 0, 'ss', 'a', 'asd', '', 'a', 'asd', '', 2, 'sdf', '1234567', '234234', '0', 'asdsad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_family`
--

DROP TABLE IF EXISTS `form_family`;
CREATE TABLE IF NOT EXISTS `form_family` (
  `form_family_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `national_number` varchar(15) DEFAULT NULL,
  `birthdate` int(10) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `study_status` char(1) DEFAULT NULL,
  `health_status` char(1) DEFAULT NULL,
  `with_family` char(1) DEFAULT NULL,
  `situation_in_family` char(1) DEFAULT NULL,
  `level_in_family` char(1) NOT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `form_details_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`form_family_id`),
  KEY `fk_form_family_details_1` (`form_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `form_family`
--

INSERT INTO `form_family` (`form_family_id`, `firstname`, `middlename`, `lastname`, `national_number`, `birthdate`, `gender`, `study_status`, `health_status`, `with_family`, `situation_in_family`, `level_in_family`, `date_added`, `date_modified`, `form_details_id`) VALUES
(1, 'saleh', 'ali', 'saiid', 'dasdas', 234234, '1', 'a', 'a', 'a', 'a', 'a', 2014, 2014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `value` varchar(45) NOT NULL,
  `group` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `value`, `group`) VALUES
(1, 'أب', 'a', 'level_in_family'),
(2, 'أم', 'b', 'level_in_family'),
(3, 'ابن / ابنة', 'c', 'level_in_family'),
(4, 'أخ / أخت', 'd', 'level_in_family'),
(5, 'أقارب', 'e', 'level_in_family'),
(6, 'أعزب', 'a', 'situation_in_family'),
(7, 'متزوج', 'b', 'situation_in_family'),
(8, 'مطلق', 'c', 'situation_in_family'),
(9, 'أرمل', 'd', 'situation_in_family'),
(10, 'لا يدرس', 'a', 'study_status'),
(11, 'يدرس', 'b', 'study_status'),
(12, 'أنهى الدراسة', 'c', 'study_status'),
(13, 'مشاكل نفسية', 'a', 'health_status'),
(14, 'أعاقة جسدية', 'b', 'health_status'),
(15, 'إعاقة ذهنية', 'c', 'health_status'),
(16, 'أمراض مزمنة', 'd', 'health_status'),
(17, 'السل', 'e', 'health_status'),
(18, 'متواجد مع الأسرة', 'a', 'with_family'),
(19, 'مسافر', 'b', 'with_family'),
(20, 'متوفي', 'c', 'with_family'),
(21, 'مفقود', 'd', 'with_family'),
(22, 'غير موجود', 'e', 'with_family'),
(23, 'دفتر عائلة حديث', 'a', 'document_type'),
(24, 'دفتر عائلة قديم', 'b', 'document_type'),
(25, 'إخراج قيد عائلي', 'c', 'document_type'),
(26, 'لا يوجد', 'd', 'document_type'),
(27, 'نازحة', 'a', 'family_status'),
(28, 'متضررة', 'b', 'family_status'),
(29, 'فقيرة', 'c', 'family_status');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1404119707, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_address`
--
ALTER TABLE `form_address`
  ADD CONSTRAINT `fk_form_address_1` FOREIGN KEY (`form_details_id`) REFERENCES `form_details` (`form_details_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form_family`
--
ALTER TABLE `form_family`
  ADD CONSTRAINT `fk_form_family_details_1` FOREIGN KEY (`form_details_id`) REFERENCES `form_details` (`form_details_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
