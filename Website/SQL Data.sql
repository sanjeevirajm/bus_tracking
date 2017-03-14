-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2017 at 07:17 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a1410105_busdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1000, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `froms` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tos` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `busno` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `routeno` int(5) NOT NULL,
  `tripno` int(5) NOT NULL,
  `time` time NOT NULL,
  `startedtime` time NOT NULL,
  `noofpassengers` int(3) DEFAULT NULL,
  `latitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `longitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `message` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `message` (`message`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` VALUES(100, 'rajan', '100', 9898989000, 'sattur', 'sivakasi', 'TN 67 N 0987', 1, 1, '06:30:00', '22:11:00', 35, '9.356584', '77.9132702', 'Test');
INSERT INTO `conductor` VALUES(101, 'Gopal', '101', 7777777771, 'sivakasi', 'virudhunagar', 'TN 67 N 0967', 2, 2, '08:00:00', '13:41:00', 45, '9.3735838', '77.915611', '');
INSERT INTO `conductor` VALUES(200, 'sample', 'sample', 1111111111, 'Tiruchi', 'sivakasi', 'sample1', 3, 3, '08:00:00', '14:02:00', 23, '9.3586107', '77.9150168', '');
INSERT INTO `conductor` VALUES(201, 'sample ', 'sample1', 1111111111, 'villupuram', 'sivakasi', 'sample2', 3, 4, '08:00:00', '08:34:00', 70, '9.3599884', '77.9139983', '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `phoneno` bigint(10) NOT NULL,
  `froms` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tos` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `busno` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `routeno` int(5) NOT NULL,
  `tripno` int(5) NOT NULL,
  `time` time NOT NULL,
  `startedtime` time NOT NULL,
  `latitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `longitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `message` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `message` (`message`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` VALUES(100, 'karupasamy', '100', 9898989800, 'sattur', 'sivakasi', 'TN 67 N 0987', 1, 1, '06:30:00', '07:37:00', '9.4502015', '77.8043141', 'high traffic');
INSERT INTO `driver` VALUES(101, 'balaganesh', '101', 9898989801, 'sattur', 'sivakasi', 'TN 67 N 0997', 1, 2, '07:10:00', '13:38:00', '9.3599884', '77.9139983', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `froms` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tos` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `busno` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `routeno` int(5) NOT NULL,
  `tripno` int(5) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `latitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `longitude` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `startedtime` time DEFAULT NULL,
  `did` int(5) DEFAULT NULL,
  `cid` int(5) DEFAULT NULL,
  `noofpassengers` int(5) DEFAULT NULL,
  `message` varchar(25) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` VALUES('sattur', 'sivakasi', 'TN 67 N 0987', 1, 1, '06:30:00', '07:00:00', '9.356584', '77.9132702', '22:11:00', 100, 100, 35, 'high traffic');
INSERT INTO `schedule` VALUES('sattur', 'sivakasi', 'TN 67 N 0997', 1, 2, '07:10:00', '07:45:00', '9.3599884', '77.9139983', '13:38:00', 101, 0, 20, 'Test');
INSERT INTO `schedule` VALUES('sivakasi', 'virudhunagar', 'TN 67 N 0977', 2, 1, '07:30:00', '08:30:00', '9.5558', '77.9480066', '07:47:00', 0, 0, 25, '');
INSERT INTO `schedule` VALUES('sivakasi', 'virudhunagar', 'TN 67 N 0967', 2, 2, '08:00:00', '09:00:00', '9.3735838', '77.915611', '13:41:00', 0, 101, 45, '');
INSERT INTO `schedule` VALUES('Tiruchi', 'sivakasi', 'sample1', 3, 3, '08:00:00', '16:00:00', '9.3586107', '77.9150168', '14:02:00', NULL, 200, 23, '');
INSERT INTO `schedule` VALUES('villupuram', 'sivakasi', 'sample2', 3, 4, '08:00:00', '16:00:00', '9.3599884', '77.9139983', '08:34:00', NULL, 201, 70, '');
