-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 01:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refood`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityId` int(11) NOT NULL,
  `cityname` varchar(45) DEFAULT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityId`, `cityname`, `country`) VALUES
(1, 'Sousse', 1),
(2, 'Budapest', 2),
(3, 'casablanca', 3),
(5, ' shanghai ', 4),
(6, 'Jakarta', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `city_country`
-- (See below for the actual view)
--
CREATE TABLE `city_country` (
`cityId` int(11)
,`cityname` varchar(45)
,`countryId` int(11)
,`countryNAME` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `countryNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryNAME`) VALUES
(1, 'Tunisia'),
(2, 'Hungary'),
(3, 'Morocco '),
(4, 'China'),
(5, 'indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `pickUpId` int(11) NOT NULL,
  `organisationReview` int(11) DEFAULT NULL,
  `VolunteerReview` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pickUptime` datetime DEFAULT NULL,
  `portions` varchar(45) DEFAULT NULL,
  `user` int(11) NOT NULL,
  `organisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`pickUpId`, `organisationReview`, `VolunteerReview`, `quality`, `date`, `pickUptime`, `portions`, `user`, `organisation`) VALUES
(2, 1, 2, 0, '1970-01-01 00:00:00', '0000-00-00 00:00:00', '50', 0, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `delivery_view`
-- (See below for the actual view)
--
CREATE TABLE `delivery_view` (
`pickUpId` int(11)
,`organisationReview` int(11)
,`VolunteerReview` int(11)
,`quality` int(11)
,`date` datetime
,`pickUptime` datetime
,`portions` varchar(45)
,`userId` int(11)
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`organisationId` varchar(100)
,`organisationName` varchar(45)
,`organisationDescription` longtext
,`organisationLogo` varchar(150)
,`organisationJoindate` date
,`approved` int(11)
,`organisationTypeId` int(11)
,`organisationTypeName` varchar(100)
,`organisationEmail` varchar(45)
,`organisationNumber` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `donation_user`
-- (See below for the actual view)
--
CREATE TABLE `donation_user` (
`donationId` int(11)
,`userId` int(11)
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `organisationComiteeNumber` varchar(45) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `name`, `description`, `date`, `time`, `location`, `organisationComiteeNumber`, `user`) VALUES
(1, 'Christmas fund raising ', 'Fund raising for christmas', '1970-01-01 00:00:00', '2021-10-11 00:00:00', 'city center ', '1', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `event_user`
-- (See below for the actual view)
--
CREATE TABLE `event_user` (
`eventId` int(11)
,`eventName` varchar(45)
,`description` varchar(45)
,`date` datetime
,`time` datetime
,`location` varchar(45)
,`organisationComiteeNumber` varchar(45)
,`userId` int(11)
,`userName` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderId` int(11) NOT NULL,
  `gendeName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderId`, `gendeName`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `organisationId` int(11) NOT NULL,
  `organisationName` varchar(45) DEFAULT NULL,
  `organisationDescription` longtext DEFAULT NULL,
  `organisationLogo` varchar(150) DEFAULT NULL,
  `organisationJoindate` date DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `organisationType` int(11) NOT NULL,
  `organisationEmail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `organisationNumber` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`organisationId`, `organisationName`, `organisationDescription`, `organisationLogo`, `organisationJoindate`, `approved`, `organisationType`, `organisationEmail`, `password`, `organisationNumber`) VALUES
(1, 'AIESEC', 'AIESEC is a global platform for young people to explore and develop their leadership potential. ', 'aiesec.jpg', '0000-00-00', 2, 2, 'aiesec@gmail.com', NULL, ' 06 30 387 0290');

-- --------------------------------------------------------

--
-- Table structure for table `organisationtype`
--

CREATE TABLE `organisationtype` (
  `organisationTypeId` int(11) NOT NULL,
  `organisationTypeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisationtype`
--

INSERT INTO `organisationtype` (`organisationTypeId`, `organisationTypeName`) VALUES
(1, 'Operational'),
(2, 'Advocacy');

-- --------------------------------------------------------

--
-- Stand-in structure for view `organisation_organisationtype`
-- (See below for the actual view)
--
CREATE TABLE `organisation_organisationtype` (
`organisationId` int(11)
,`organisationPassword` varchar(45)
,`organisationName` varchar(45)
,`organisationDescription` longtext
,`organisationLogo` varchar(150)
,`organisationJoindate` date
,`approved` int(11)
,`organisationTypeId` int(11)
,`organisationTypeName` varchar(100)
,`organisationEmail` varchar(45)
,`organisationNumber` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `organizingcommittee`
--

CREATE TABLE `organizingcommittee` (
  `organizingCommitteeId` int(11) NOT NULL,
  `approved` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `origanizerId` int(11) DEFAULT NULL,
  `event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizingcommittee`
--

INSERT INTO `organizingcommittee` (`organizingCommitteeId`, `approved`, `type`, `origanizerId`, `event`) VALUES
(1, 1, '2', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `organizingcommittee_event`
-- (See below for the actual view)
--
CREATE TABLE `organizingcommittee_event` (
`organizingCommitteeId` int(11)
,`approved` int(11)
,`type` varchar(45)
,`origanizerId` int(11)
,`eventId` int(11)
,`eventName` varchar(45)
,`description` varchar(45)
,`date` datetime
,`time` datetime
,`location` varchar(45)
,`organisationComiteeNumber` varchar(45)
,`userId` int(11)
,`userName` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `pickUpId` int(11) NOT NULL,
  `providerReview` int(11) DEFAULT NULL,
  `VolunteerReview` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pickUptime` datetime DEFAULT NULL,
  `portions` varchar(45) DEFAULT NULL,
  `provider` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`pickUpId`, `providerReview`, `VolunteerReview`, `quality`, `date`, `pickUptime`, `portions`, `provider`, `user`) VALUES
(1, 3, 3, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '50', 0, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pickup_view`
-- (See below for the actual view)
--
CREATE TABLE `pickup_view` (
`pickUpId` int(11)
,`providerReview` int(11)
,`VolunteerReview` int(11)
,`quality` int(11)
,`date` datetime
,`pickUptime` datetime
,`portions` varchar(45)
,`providerId` int(11)
,`providerName` varchar(45)
,`providerDescription` varchar(45)
,`providerLogo` varchar(45)
,`providerJoinDate` datetime
,`approved` int(11)
,`providerEmail` varchar(45)
,`providerPhone` varchar(45)
,`providerTypeId` int(11)
,`providerTypeName` varchar(100)
,`userId` int(11)
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `preparation`
--

CREATE TABLE `preparation` (
  `preparationId` int(11) NOT NULL,
  `expireAt` datetime DEFAULT NULL,
  `portions` int(11) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preparation`
--

INSERT INTO `preparation` (`preparationId`, `expireAt`, `portions`, `user`) VALUES
(1, '2021-01-11 00:00:00', 50, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `preparation_user`
-- (See below for the actual view)
--
CREATE TABLE `preparation_user` (
`preparationId` int(11)
,`expireat` datetime
,`portions` int(11)
,`userId` int(11)
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `providerId` int(11) NOT NULL,
  `providerName` varchar(45) DEFAULT NULL,
  `providerDescription` varchar(45) DEFAULT NULL,
  `providerLogo` varchar(45) DEFAULT NULL,
  `providerJoinDate` datetime DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `providerEmail` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `providerPhone` varchar(45) DEFAULT NULL,
  `providerType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`providerId`, `providerName`, `providerDescription`, `providerLogo`, `providerJoinDate`, `approved`, `providerEmail`, `password`, `providerPhone`, `providerType`) VALUES
(0, 'Tesco ', 'Tesco is a British supermarket chain: ', 'tesco.jpg', '1970-01-01 00:00:00', 1, 'tesco@gmail.com', 'tesco', '+36707178781', 2);

-- --------------------------------------------------------

--
-- Table structure for table `providertype`
--

CREATE TABLE `providertype` (
  `providerTypeId` int(11) NOT NULL,
  `providerTypeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providertype`
--

INSERT INTO `providertype` (`providerTypeId`, `providerTypeName`) VALUES
(1, 'Restaurant '),
(2, 'Super Market');

-- --------------------------------------------------------

--
-- Stand-in structure for view `provider_providertype`
-- (See below for the actual view)
--
CREATE TABLE `provider_providertype` (
`providerId` int(11)
,`providerPassword` varchar(45)
,`providerName` varchar(45)
,`providerDescription` varchar(45)
,`providerLogo` varchar(45)
,`providerJoinDate` datetime
,`approved` int(11)
,`providerEmail` varchar(45)
,`providerPhone` varchar(45)
,`providerTypeId` int(11)
,`providerTypeName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `datebirthday` datetime DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `volunteer` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `cityFrom` int(11) NOT NULL,
  `cityResident` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `name`, `lastname`, `email`, `datebirthday`, `photo`, `createdAt`, `updatedAt`, `password`, `volunteer`, `admin`, `gender`, `cityFrom`, `cityResident`) VALUES
(4, 'Donia', 'Gharbi', 'doniagharbi@gmail.com', '1970-01-01 00:00:00', 'WhatsApp Image 2021-10-06 at 15.50.10.jpeg', '0000-00-00 00:00:00', '2021-11-10 00:00:00', 'donia', 0, 0, 2, 1, 2),
(5, 'Chaima', 'Ben salem', 'chaimabensalem@gmail.com', '1970-01-01 00:00:00', 'WhatsApp Image 2021-11-07 at 18.02.29.jpeg', '2021-11-10 00:00:00', '2021-11-11 00:00:00', 'chaima', 2, 0, 2, 1, 2),
(6, 'Yzhi', 'Wang', 'doniagharbi@gmail.com', '1970-01-01 00:00:00', 'YIZHI.PNG', '2021-11-10 00:00:00', '2021-11-10 00:00:00', '1996-05-18', 3, 1, 2, 5, 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`userId` int(11)
,`name` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`datebirthday` datetime
,`photo` varchar(250)
,`createdAt` datetime
,`updatedAt` datetime
,`password` varchar(45)
,`volunteer` int(11)
,`admin` int(11)
,`genderId` int(11)
,`gendeName` varchar(45)
,`cityFromId` int(11)
,`cityFromName` varchar(45)
,`cityFromCountryId` int(11)
,`cityFromCountryName` varchar(100)
,`cityResidentId` int(11)
,`cityResidentName` varchar(45)
,`cityResidentCountryId` int(11)
,`cityResidentCountryName` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `city_country`
--
DROP TABLE IF EXISTS `city_country`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `city_country`  AS SELECT `city`.`cityId` AS `cityId`, `city`.`cityname` AS `cityname`, `country`.`countryID` AS `countryId`, `country`.`countryNAME` AS `countryNAME` FROM (`city` join `country` on(`city`.`country` = `country`.`countryID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `delivery_view`
--
DROP TABLE IF EXISTS `delivery_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `delivery_view`  AS SELECT `delivery`.`pickUpId` AS `pickUpId`, `delivery`.`organisationReview` AS `organisationReview`, `delivery`.`VolunteerReview` AS `VolunteerReview`, `delivery`.`quality` AS `quality`, `delivery`.`date` AS `date`, `delivery`.`pickUptime` AS `pickUptime`, `delivery`.`portions` AS `portions`, `user_view`.`userId` AS `userId`, `user_view`.`name` AS `name`, `user_view`.`lastname` AS `lastname`, `user_view`.`email` AS `email`, `user_view`.`datebirthday` AS `datebirthday`, `user_view`.`photo` AS `photo`, `user_view`.`createdAt` AS `createdAt`, `user_view`.`updatedAt` AS `updatedAt`, `user_view`.`password` AS `password`, `user_view`.`volunteer` AS `volunteer`, `user_view`.`admin` AS `admin`, `user_view`.`genderId` AS `genderId`, `user_view`.`gendeName` AS `gendeName`, `user_view`.`cityFromId` AS `cityFromId`, `user_view`.`cityFromName` AS `cityFromName`, `user_view`.`cityFromCountryId` AS `cityFromCountryId`, `user_view`.`cityFromCountryName` AS `cityFromCountryName`, `user_view`.`cityResidentId` AS `cityResidentId`, `user_view`.`cityResidentName` AS `cityResidentName`, `user_view`.`cityResidentCountryId` AS `cityResidentCountryId`, `user_view`.`cityResidentCountryName` AS `organisationId`, `organisation_organisationtype`.`organisationName` AS `organisationName`, `organisation_organisationtype`.`organisationDescription` AS `organisationDescription`, `organisation_organisationtype`.`organisationLogo` AS `organisationLogo`, `organisation_organisationtype`.`organisationJoindate` AS `organisationJoindate`, `organisation_organisationtype`.`approved` AS `approved`, `organisation_organisationtype`.`organisationTypeId` AS `organisationTypeId`, `organisation_organisationtype`.`organisationTypeName` AS `organisationTypeName`, `organisation_organisationtype`.`organisationEmail` AS `organisationEmail`, `organisation_organisationtype`.`organisationNumber` AS `organisationNumber` FROM ((`delivery` join `user_view` on(`delivery`.`user` = `user_view`.`userId`)) join `organisation_organisationtype` on(`delivery`.`organisation` = `organisation_organisationtype`.`organisationId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `donation_user`
--
DROP TABLE IF EXISTS `donation_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donation_user`  AS SELECT `donation`.`donationId` AS `donationId`, `user_view`.`userId` AS `userId`, `user_view`.`name` AS `name`, `user_view`.`lastname` AS `lastname`, `user_view`.`email` AS `email`, `user_view`.`datebirthday` AS `datebirthday`, `user_view`.`photo` AS `photo`, `user_view`.`createdAt` AS `createdAt`, `user_view`.`updatedAt` AS `updatedAt`, `user_view`.`password` AS `password`, `user_view`.`volunteer` AS `volunteer`, `user_view`.`admin` AS `admin`, `user_view`.`genderId` AS `genderId`, `user_view`.`gendeName` AS `gendeName`, `user_view`.`cityFromId` AS `cityFromId`, `user_view`.`cityFromName` AS `cityFromName`, `user_view`.`cityFromCountryId` AS `cityFromCountryId`, `user_view`.`cityFromCountryName` AS `cityFromCountryName`, `user_view`.`cityResidentId` AS `cityResidentId`, `user_view`.`cityResidentName` AS `cityResidentName`, `user_view`.`cityResidentCountryId` AS `cityResidentCountryId`, `user_view`.`cityResidentCountryName` AS `cityResidentCountryName` FROM (`donation` join `user_view` on(`donation`.`userId` = `user_view`.`userId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `event_user`
--
DROP TABLE IF EXISTS `event_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `event_user`  AS SELECT `event`.`eventId` AS `eventId`, `event`.`name` AS `eventName`, `event`.`description` AS `description`, `event`.`date` AS `date`, `event`.`time` AS `time`, `event`.`location` AS `location`, `event`.`organisationComiteeNumber` AS `organisationComiteeNumber`, `user_view`.`userId` AS `userId`, `user_view`.`name` AS `userName`, `user_view`.`lastname` AS `lastname`, `user_view`.`email` AS `email`, `user_view`.`datebirthday` AS `datebirthday`, `user_view`.`photo` AS `photo`, `user_view`.`createdAt` AS `createdAt`, `user_view`.`updatedAt` AS `updatedAt`, `user_view`.`password` AS `password`, `user_view`.`volunteer` AS `volunteer`, `user_view`.`admin` AS `admin`, `user_view`.`genderId` AS `genderId`, `user_view`.`gendeName` AS `gendeName`, `user_view`.`cityFromId` AS `cityFromId`, `user_view`.`cityFromName` AS `cityFromName`, `user_view`.`cityFromCountryId` AS `cityFromCountryId`, `user_view`.`cityFromCountryName` AS `cityFromCountryName`, `user_view`.`cityResidentId` AS `cityResidentId`, `user_view`.`cityResidentName` AS `cityResidentName`, `user_view`.`cityResidentCountryId` AS `cityResidentCountryId`, `user_view`.`cityResidentCountryName` AS `cityResidentCountryName` FROM (`event` join `user_view` on(`event`.`user` = `user_view`.`userId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `organisation_organisationtype`
--
DROP TABLE IF EXISTS `organisation_organisationtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `organisation_organisationtype`  AS SELECT `organisation`.`organisationId` AS `organisationId`, `organisation`.`password` AS `organisationPassword`, `organisation`.`organisationName` AS `organisationName`, `organisation`.`organisationDescription` AS `organisationDescription`, `organisation`.`organisationLogo` AS `organisationLogo`, `organisation`.`organisationJoindate` AS `organisationJoindate`, `organisation`.`approved` AS `approved`, `organisationtype`.`organisationTypeId` AS `organisationTypeId`, `organisationtype`.`organisationTypeName` AS `organisationTypeName`, `organisation`.`organisationEmail` AS `organisationEmail`, `organisation`.`organisationNumber` AS `organisationNumber` FROM (`organisation` join `organisationtype` on(`organisation`.`organisationType` = `organisationtype`.`organisationTypeId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `organizingcommittee_event`
--
DROP TABLE IF EXISTS `organizingcommittee_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `organizingcommittee_event`  AS SELECT `organizingcommittee`.`organizingCommitteeId` AS `organizingCommitteeId`, `organizingcommittee`.`approved` AS `approved`, `organizingcommittee`.`type` AS `type`, `organizingcommittee`.`origanizerId` AS `origanizerId`, `event_user`.`eventId` AS `eventId`, `event_user`.`eventName` AS `eventName`, `event_user`.`description` AS `description`, `event_user`.`date` AS `date`, `event_user`.`time` AS `time`, `event_user`.`location` AS `location`, `event_user`.`organisationComiteeNumber` AS `organisationComiteeNumber`, `event_user`.`userId` AS `userId`, `event_user`.`userName` AS `userName`, `event_user`.`lastname` AS `lastname`, `event_user`.`email` AS `email`, `event_user`.`datebirthday` AS `datebirthday`, `event_user`.`photo` AS `photo`, `event_user`.`createdAt` AS `createdAt`, `event_user`.`updatedAt` AS `updatedAt`, `event_user`.`password` AS `password`, `event_user`.`volunteer` AS `volunteer`, `event_user`.`admin` AS `admin`, `event_user`.`genderId` AS `genderId`, `event_user`.`gendeName` AS `gendeName`, `event_user`.`cityFromId` AS `cityFromId`, `event_user`.`cityFromName` AS `cityFromName`, `event_user`.`cityFromCountryId` AS `cityFromCountryId`, `event_user`.`cityFromCountryName` AS `cityFromCountryName`, `event_user`.`cityResidentId` AS `cityResidentId`, `event_user`.`cityResidentName` AS `cityResidentName`, `event_user`.`cityResidentCountryId` AS `cityResidentCountryId`, `event_user`.`cityResidentCountryName` AS `cityResidentCountryName` FROM (`organizingcommittee` join `event_user` on(`organizingcommittee`.`event` = `event_user`.`eventId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `pickup_view`
--
DROP TABLE IF EXISTS `pickup_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pickup_view`  AS SELECT `pickup`.`pickUpId` AS `pickUpId`, `pickup`.`providerReview` AS `providerReview`, `pickup`.`VolunteerReview` AS `VolunteerReview`, `pickup`.`quality` AS `quality`, `pickup`.`date` AS `date`, `pickup`.`pickUptime` AS `pickUptime`, `pickup`.`portions` AS `portions`, `provider_providertype`.`providerId` AS `providerId`, `provider_providertype`.`providerName` AS `providerName`, `provider_providertype`.`providerDescription` AS `providerDescription`, `provider_providertype`.`providerLogo` AS `providerLogo`, `provider_providertype`.`providerJoinDate` AS `providerJoinDate`, `provider_providertype`.`approved` AS `approved`, `provider_providertype`.`providerEmail` AS `providerEmail`, `provider_providertype`.`providerPhone` AS `providerPhone`, `provider_providertype`.`providerTypeId` AS `providerTypeId`, `provider_providertype`.`providerTypeName` AS `providerTypeName`, `user_view`.`userId` AS `userId`, `user_view`.`name` AS `name`, `user_view`.`lastname` AS `lastname`, `user_view`.`email` AS `email`, `user_view`.`datebirthday` AS `datebirthday`, `user_view`.`photo` AS `photo`, `user_view`.`createdAt` AS `createdAt`, `user_view`.`updatedAt` AS `updatedAt`, `user_view`.`password` AS `password`, `user_view`.`volunteer` AS `volunteer`, `user_view`.`admin` AS `admin`, `user_view`.`genderId` AS `genderId`, `user_view`.`gendeName` AS `gendeName`, `user_view`.`cityFromId` AS `cityFromId`, `user_view`.`cityFromName` AS `cityFromName`, `user_view`.`cityFromCountryId` AS `cityFromCountryId`, `user_view`.`cityFromCountryName` AS `cityFromCountryName`, `user_view`.`cityResidentId` AS `cityResidentId`, `user_view`.`cityResidentName` AS `cityResidentName`, `user_view`.`cityResidentCountryId` AS `cityResidentCountryId`, `user_view`.`cityResidentCountryName` AS `cityResidentCountryName` FROM ((`pickup` join `user_view` on(`pickup`.`user` = `user_view`.`userId`)) join `provider_providertype` on(`pickup`.`provider` = `provider_providertype`.`providerId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `preparation_user`
--
DROP TABLE IF EXISTS `preparation_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preparation_user`  AS SELECT `preparation`.`preparationId` AS `preparationId`, `preparation`.`expireAt` AS `expireat`, `preparation`.`portions` AS `portions`, `user_view`.`userId` AS `userId`, `user_view`.`name` AS `name`, `user_view`.`lastname` AS `lastname`, `user_view`.`email` AS `email`, `user_view`.`datebirthday` AS `datebirthday`, `user_view`.`photo` AS `photo`, `user_view`.`createdAt` AS `createdAt`, `user_view`.`updatedAt` AS `updatedAt`, `user_view`.`password` AS `password`, `user_view`.`volunteer` AS `volunteer`, `user_view`.`admin` AS `admin`, `user_view`.`genderId` AS `genderId`, `user_view`.`gendeName` AS `gendeName`, `user_view`.`cityFromId` AS `cityFromId`, `user_view`.`cityFromName` AS `cityFromName`, `user_view`.`cityFromCountryId` AS `cityFromCountryId`, `user_view`.`cityFromCountryName` AS `cityFromCountryName`, `user_view`.`cityResidentId` AS `cityResidentId`, `user_view`.`cityResidentName` AS `cityResidentName`, `user_view`.`cityResidentCountryId` AS `cityResidentCountryId`, `user_view`.`cityResidentCountryName` AS `cityResidentCountryName` FROM (`preparation` join `user_view` on(`preparation`.`user` = `user_view`.`userId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `provider_providertype`
--
DROP TABLE IF EXISTS `provider_providertype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `provider_providertype`  AS SELECT `provider`.`providerId` AS `providerId`, `provider`.`password` AS `providerPassword`, `provider`.`providerName` AS `providerName`, `provider`.`providerDescription` AS `providerDescription`, `provider`.`providerLogo` AS `providerLogo`, `provider`.`providerJoinDate` AS `providerJoinDate`, `provider`.`approved` AS `approved`, `provider`.`providerEmail` AS `providerEmail`, `provider`.`providerPhone` AS `providerPhone`, `providertype`.`providerTypeId` AS `providerTypeId`, `providertype`.`providerTypeName` AS `providerTypeName` FROM (`provider` join `providertype` on(`provider`.`providerType` = `providertype`.`providerTypeId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `user`.`UserId` AS `userId`, `user`.`name` AS `name`, `user`.`lastname` AS `lastname`, `user`.`email` AS `email`, `user`.`datebirthday` AS `datebirthday`, `user`.`photo` AS `photo`, `user`.`createdAt` AS `createdAt`, `user`.`updatedAt` AS `updatedAt`, `user`.`password` AS `password`, `user`.`volunteer` AS `volunteer`, `user`.`admin` AS `admin`, `gender`.`genderId` AS `genderId`, `gender`.`gendeName` AS `gendeName`, `user`.`cityFrom` AS `cityFromId`, `city1`.`cityname` AS `cityFromName`, `city1`.`country` AS `cityFromCountryId`, `country1`.`countryNAME` AS `cityFromCountryName`, `user`.`cityResident` AS `cityResidentId`, `city2`.`cityname` AS `cityResidentName`, `city2`.`country` AS `cityResidentCountryId`, `country2`.`countryNAME` AS `cityResidentCountryName` FROM (((((`user` join `gender`) join `city` `city1`) join `city` `city2`) join `country` `country1`) join `country` `country2`) WHERE `user`.`gender` = `gender`.`genderId` AND `user`.`cityFrom` = `city1`.`cityId` AND `user`.`cityResident` = `city2`.`cityId` AND `city1`.`country` = `country1`.`countryID` AND `city2`.`country` = `country2`.`countryID` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`),
  ADD KEY `fk_city_country1_idx` (`country`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`pickUpId`),
  ADD KEY `fk_delivery_user1_idx` (`user`),
  ADD KEY `fk_delivery_organisation1_idx` (`organisation`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donationId`),
  ADD KEY `fk_donation_user1_idx` (`userId`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `fk_event_user1_idx` (`user`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`organisationId`),
  ADD KEY `fk_organisation_organisationType1_idx` (`organisationType`);

--
-- Indexes for table `organisationtype`
--
ALTER TABLE `organisationtype`
  ADD PRIMARY KEY (`organisationTypeId`);

--
-- Indexes for table `organizingcommittee`
--
ALTER TABLE `organizingcommittee`
  ADD PRIMARY KEY (`organizingCommitteeId`),
  ADD KEY `fk_organizingCommittee_event1_idx` (`event`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`pickUpId`),
  ADD KEY `fk_pickUp_provider1_idx` (`provider`),
  ADD KEY `fk_pickUp_user1_idx` (`user`);

--
-- Indexes for table `preparation`
--
ALTER TABLE `preparation`
  ADD PRIMARY KEY (`preparationId`),
  ADD KEY `fk_preparation_user1_idx` (`user`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`providerId`),
  ADD KEY `fk_provider_providerType1_idx` (`providerType`);

--
-- Indexes for table `providertype`
--
ALTER TABLE `providertype`
  ADD PRIMARY KEY (`providerTypeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `fk_user_sexe_idx` (`gender`),
  ADD KEY `fk_user_city1_idx` (`cityFrom`),
  ADD KEY `fk_user_city2_idx` (`cityResident`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `pickUpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `organisationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organisationtype`
--
ALTER TABLE `organisationtype`
  MODIFY `organisationTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizingcommittee`
--
ALTER TABLE `organizingcommittee`
  MODIFY `organizingCommitteeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `pickUpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `providertype`
--
ALTER TABLE `providertype`
  MODIFY `providerTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
