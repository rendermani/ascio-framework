-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 10, 2020 at 01:54 AM
-- Server version: 10.4.12-MariaDB-1:10.4.12+maria~bionic
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ascio`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `failed_grouped_type_msg`
-- (See below for the actual view)
--
CREATE TABLE `failed_grouped_type_msg` (
`Type` varchar(255)
,`Msg` longtext
,`count_fails` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `failed_messages`
-- (See below for the actual view)
--
CREATE TABLE `failed_messages` (
`CreDate` varchar(255)
,`OrderId` varchar(255)
,`Type` varchar(255)
,`Msg` longtext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fails_grouped_date`
-- (See below for the actual view)
--
CREATE TABLE `fails_grouped_date` (
`D` varchar(7)
,`count_fails` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fails_grouped_msg`
-- (See below for the actual view)
--
CREATE TABLE `fails_grouped_msg` (
`Msg` longtext
,`count_fails` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `failed_grouped_type_msg`
--
DROP TABLE IF EXISTS `failed_grouped_type_msg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ascio`@`%` SQL SECURITY DEFINER VIEW `failed_grouped_type_msg`  AS  select `failed_messages`.`Type` AS `Type`,`failed_messages`.`Msg` AS `Msg`,count(0) AS `count_fails` from `failed_messages` group by `failed_messages`.`Type`,`failed_messages`.`Msg` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `failed_messages`
--
DROP TABLE IF EXISTS `failed_messages`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`ascio`@`%` SQL SECURITY DEFINER VIEW `failed_messages`  AS  select `v2_Order`.`CreDate` AS `CreDate`,`v2_Order`.`OrderId` AS `OrderId`,`v2_Order`.`Type` AS `Type`,regexp_replace(regexp_replace(`v2_Message`.`Body`,'A[0-9]{8}','$orderId'),'[a-z0-9-]+\\.[a-z\\.]+','$domain') AS `Msg` from (`v2_Order` left join `v2_Message` on(`v2_Message`.`_orderId` = `v2_Order`.`OrderId`)) where `v2_Message`.`FromAddress` = 'AWS' and `v2_Message`.`Body` is not null and `v2_Message`.`Body`  not like '%REMINDERNO%' and `v2_Message`.`Subject` like '%Failed%' ;

-- --------------------------------------------------------

--
-- Structure for view `fails_grouped_date`
--
DROP TABLE IF EXISTS `fails_grouped_date`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ascio`@`%` SQL SECURITY DEFINER VIEW `fails_grouped_date`  AS  select concat(date_format(`failed_messages`.`CreDate`,'%Y'),'-',date_format(`failed_messages`.`CreDate`,'%m')) AS `D`,count(0) AS `count_fails` from `failed_messages` group by concat(date_format(`failed_messages`.`CreDate`,'%Y'),'-',date_format(`failed_messages`.`CreDate`,'%m')) ;

-- --------------------------------------------------------

--
-- Structure for view `fails_grouped_msg`
--
DROP TABLE IF EXISTS `fails_grouped_msg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ascio`@`%` SQL SECURITY DEFINER VIEW `fails_grouped_msg`  AS  select `failed_messages`.`Msg` AS `Msg`,count(0) AS `count_fails` from `failed_messages` group by `failed_messages`.`Msg` order by count(0) desc ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
