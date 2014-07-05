-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2014 at 06:31 PM
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
('68ad373e427bccb98a1c6de8a0dd28db', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.132 Safari/537.36', 1404493774, 'a:1:{s:9:"user_data";s:0:"";}'),
('f8b95d14ad9a6ee318ea15636b859437', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.132 Safari/537.36', 1404569288, 'a:1:{s:20:"flash:new:query_data";a:6:{s:13:"document_type";s:1:"a";s:11:"document_no";s:11:"65465465431";s:21:"father_nationalnumber";s:11:"65465465431";s:21:"mother_nationalnumber";s:11:"65465465431";s:12:"father_level";s:1:"a";s:12:"mother_level";s:1:"b";}}'),
('facc409affdda40855dfe448acf478b7', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.132 Safari/537.36', 1404573241, 'a:1:{s:20:"flash:old:query_data";a:8:{s:13:"document_type";s:1:"b";s:11:"document_no";s:4:"9798";s:13:"family_status";s:1:"a";s:17:"nmbr_registration";s:5:"98798";s:21:"father_nationalnumber";s:9:"798798798";s:21:"mother_nationalnumber";s:11:"98798765465";s:12:"father_level";s:1:"a";s:12:"mother_level";s:1:"b";}}');

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
  `address` text,
  `form_details_id` int(11) DEFAULT NULL,
  `date_added` int(10) unsigned NOT NULL,
  `date_modified` int(10) unsigned NOT NULL,
  `host_name` varchar(100) NOT NULL,
  `host_phone` varchar(45) NOT NULL,
  `host_mobile` varchar(45) NOT NULL,
  `housing_desc` char(1) NOT NULL,
  `proof_of_residence` char(1) NOT NULL,
  PRIMARY KEY (`form_address_id`),
  KEY `fk_form_address_1` (`form_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `form_address`
--

INSERT INTO `form_address` (`form_address_id`, `city_id`, `zone`, `address`, `form_details_id`, `date_added`, `date_modified`, `host_name`, `host_phone`, `host_mobile`, `housing_desc`, `proof_of_residence`) VALUES
(3, 0, 'قنوات', 'شسييشسيشسي', 0, 1404561761, 1404561761, '', '', '', 'c', 'b'),
(4, 0, 'قنوات', 'شسييشسيشسي', 0, 1404561777, 1404561777, '', '', '', 'c', 'b'),
(5, 0, 'asd', 'asdas', 0, 1404561825, 1404561825, '', '', '', 'c', 'a'),
(6, 0, 'asd', 'asdas', 0, 1404561834, 1404561834, '', '', '', 'c', 'a'),
(7, 0, 'asdas', 'asdasd', 0, 1404561871, 1404561871, '', '', '', 'c', 'b'),
(8, 0, 'asdas', 'asdas', 0, 1404561896, 1404561896, '', '', '', 'c', 'a'),
(9, 0, 'asdas das', 'asdas das', 0, 1404562002, 1404562002, '', '', '', 'a', 'b'),
(10, 0, 'asdas', 'ي ليبل يبل بيل يب يبل', 0, 1404562092, 1404562092, '', '', '', 'b', 'a'),
(11, 0, 'سيب سيب س', 'سي بسي بسي بسي بسي بل بلا', 0, 1404562116, 1404562116, '', '', '', 'a', 'e'),
(12, 0, 'شسيشسي', 'يبل يبل بلا لبا لب الب ابل', 0, 1404562191, 1404562191, '', '', '', 'b', 'a'),
(13, 0, 'سيبسي بسي', 'سي بسي ب', 0, 1404562214, 1404562214, '', '', '', 'd', 'b'),
(14, 0, 'asdasd', 'asdasdas', 0, 1404563084, 1404563084, '', '', '', 'a', 'e'),
(15, 0, 'الرحى', 'جانب موقف الرحى', 4, 1404567571, 1404567571, '', '', '', 'a', 'a'),
(16, 0, 'عرى', 'بل بل بلبل', 5, 1404571017, 1404571017, '', '', '', 'b', 'd');

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
  `come_city_id` int(11) NOT NULL,
  `come_zone` varchar(50) NOT NULL,
  `come_address` text NOT NULL,
  `jump_date` int(10) NOT NULL,
  `registrar` varchar(45) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`form_details_id`),
  UNIQUE KEY `tmp_ref_UNIQUE` (`tmp_ref`),
  UNIQUE KEY `ref_id_UNIQUE` (`ref_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `form_details`
--

INSERT INTO `form_details` (`form_details_id`, `tmp_ref`, `ref_id`, `date_added`, `date_modified`, `registered_date`, `register_center`, `family_status`, `nationality`, `nmbr_registration`, `document_type`, `document_no`, `breadwinner_name`, `family_members`, `notes`, `phone`, `mobile_1`, `mobile_2`, `come_city_id`, `come_zone`, `come_address`, `jump_date`, `registrar`, `deleted`) VALUES
(1, '12345', 'wwe', 2014, 2014, 0, 'ss', 'a', 'asd', '', 'a', 'asd', '', 2, 'sdf', '1234567', '234234', '0', 0, '', '', 0, 'asdsad', 0),
(2, NULL, NULL, 1404488780, 1404488780, 1404488780, NULL, 'a', 'سوري', 'السويداء 1303', 'a', '987987', 'صالح علي سعيد', NULL, '', '310634', '33067744', '', 0, '', '', 0, NULL, 0),
(3, NULL, NULL, 1404557829, 1404557829, 1404557829, NULL, 'a', 'سوري', 'asdd', 'a', 'asdfشسيشسي', 'fg hfg', NULL, 'asd afg hgf h', '310634', '33067744', '', 0, 'الرحى', 'سيب سيب ', 0, NULL, 0),
(4, 'a12345', NULL, 1404567391, 1404567391, 1404567391, NULL, 'a', 'سوري', 'عرى 1303', 'a', '987654', '', NULL, '', '', '', '', 0, '', '', 0, NULL, 0),
(5, 'a789456', NULL, 1404570963, 1404570963, 1404570963, NULL, 'a', 'سوري', 'الرحى', 'a', '98765463', '', NULL, '', '310568', '3306474', '', 0, '', '', 0, NULL, 0);

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
  `mothername` varchar(45) NOT NULL,
  `national_number` varchar(15) DEFAULT NULL,
  `birthdate` int(10) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `form_family`
--

INSERT INTO `form_family` (`form_family_id`, `firstname`, `middlename`, `lastname`, `mothername`, `national_number`, `birthdate`, `gender`, `study_status`, `health_status`, `with_family`, `situation_in_family`, `level_in_family`, `date_added`, `date_modified`, `form_details_id`) VALUES
(1, 'saleh', 'ali', 'saiid', '', 'dasdas', 234234, '1', 'a', 'a', 'a', 'a', 'a', 2014, 2014, 1),
(4, 'عمار', 'ياسر', 'عبد الدين', 'كميلة القطيني', '3216549870', 324654654, 'a', 'a', '', 'a', 'a', 'c', 1404565504, 1404565504, 0),
(5, 'عمار', 'ياسر', 'عبد الدين', 'كميلة القطيني', '3216549870', 324654654, 'a', 'a', 'a', 'a', 'a', 'c', 1404565997, 1404565997, 0),
(6, 'عمار', 'ياسر', 'عبد الدين', 'كميلة', '65465465431', 654000, 'a', 'a', 'f', 'a', 'b', 'a', 1404566049, 1404566049, 0),
(7, 'سسس', 'لبلبن كت', 'ما نتما', 'نت اتنا', 'نتا نتا', 20, 'a', 'b', 'a', 'b', 'b', 'b', 1404571283, 1404571283, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=44 ;

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
(29, 'فقيرة', 'c', 'family_status'),
(30, 'ملك', 'a', 'housing_desc'),
(31, 'إيجار', 'b', 'housing_desc'),
(32, 'هبة', 'c', 'housing_desc'),
(33, 'ملك عام', 'd', 'housing_desc'),
(34, 'استضافة لدى عائلة نازحة', 'e', 'housing_desc'),
(35, 'استضافة لدى عائلة مقيمة', 'f', 'housing_desc'),
(36, 'أخرى', 'e', 'proof_of_residence'),
(37, 'عقد إيجار', 'a', 'proof_of_residence'),
(38, 'سند ملكية', 'b', 'proof_of_residence'),
(39, 'لا يوجد', 'c', 'proof_of_residence'),
(40, 'سند إقامة', 'd', 'proof_of_residence'),
(41, 'ذكر', 'a', 'gender'),
(42, 'أنثى', 'b', 'gender'),
(43, 'لا بوجد', 'f', 'health_status');

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
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
