-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 03:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allbooks`
--
CREATE TABLE `allbooks` (
`AName` varchar(45)
,`ADescription` varchar(45)
,`Isbn` varchar(10)
,`BName` varchar(45)
,`BType` varchar(45)
,`Bcategory` varchar(45)
,`BPrice` decimal(5,0)
,`bEdition` varchar(5)
,`PName` varchar(45)
,`PCity` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `AName` varchar(45) NOT NULL,
  `ADescription` varchar(45) DEFAULT NULL,
  `AId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AName`, `ADescription`, `AId`) VALUES
('Paul ', 'Young man', '22222'),
('Nina', 'Clasen', '99999');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Isbn` varchar(10) NOT NULL,
  `BName` varchar(45) NOT NULL,
  `BType` varchar(45) NOT NULL,
  `Bcategory` varchar(45) NOT NULL,
  `BPrice` decimal(5,0) NOT NULL,
  `AId` varchar(5) NOT NULL,
  `PId` varchar(5) NOT NULL,
  `bEdition` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Isbn`, `BName`, `BType`, `Bcategory`, `BPrice`, `AId`, `PId`, `bEdition`) VALUES
('1111111111', 'Magic', 'Hard copy', 'Fantasy', '151', '22222', '33333', '1'),
('8457912487', 'Dreams', 'Hard copy', 'Fiction', '487', '99999', '66666', '2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ClientEMail` varchar(45) NOT NULL,
  `CQuantity` int(11) NOT NULL,
  `CStatus` varchar(45) NOT NULL,
  `CTotal` decimal(5,0) NOT NULL,
  `Isbn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ClientEMail`, `CQuantity`, `CStatus`, `CTotal`, `Isbn`) VALUES
('andrea@gmail.com', 1, 'Available', '100', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientFirstName` varchar(45) NOT NULL,
  `clientSurname` varchar(45) NOT NULL,
  `clientEMail` varchar(45) NOT NULL,
  `clientNumber` varchar(10) NOT NULL,
  `clientPassword` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientFirstName`, `clientSurname`, `clientEMail`, `clientNumber`, `clientPassword`) VALUES
('Drea', 'Cloe', 'andrea@gmail.com', '0720949108', '12345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ourbooks`
--
CREATE TABLE `ourbooks` (
`AName` varchar(45)
,`ADescription` varchar(45)
,`Isbn` varchar(10)
,`BName` varchar(45)
,`BType` varchar(45)
,`Bcategory` varchar(45)
,`BPrice` decimal(5,0)
,`bEdition` varchar(5)
,`PName` varchar(45)
,`PCity` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PName` varchar(45) NOT NULL,
  `PId` varchar(5) NOT NULL,
  `PCity` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PName`, `PId`, `PCity`) VALUES
('Pearson', '33333', 'L'),
('J&B', '66666', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `SId` varchar(5) NOT NULL,
  `SName` varchar(45) NOT NULL,
  `SPosition` varchar(45) NOT NULL,
  `SSurname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`SId`, `SName`, `SPosition`, `SSurname`) VALUES
('44444', 'Sandrea', 'Admin', 'Botha');

-- --------------------------------------------------------

--
-- Structure for view `allbooks`
--
DROP TABLE IF EXISTS `allbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allbooks`  AS  select `author`.`AName` AS `AName`,`author`.`ADescription` AS `ADescription`,`book`.`Isbn` AS `Isbn`,`book`.`BName` AS `BName`,`book`.`BType` AS `BType`,`book`.`Bcategory` AS `Bcategory`,`book`.`BPrice` AS `BPrice`,`book`.`bEdition` AS `bEdition`,`publisher`.`PName` AS `PName`,`publisher`.`PCity` AS `PCity` from ((`book` join `author`) join `publisher`) ;

-- --------------------------------------------------------

--
-- Structure for view `ourbooks`
--
DROP TABLE IF EXISTS `ourbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ourbooks`  AS  select `author`.`AName` AS `AName`,`author`.`ADescription` AS `ADescription`,`book`.`Isbn` AS `Isbn`,`book`.`BName` AS `BName`,`book`.`BType` AS `BType`,`book`.`Bcategory` AS `Bcategory`,`book`.`BPrice` AS `BPrice`,`book`.`bEdition` AS `bEdition`,`publisher`.`PName` AS `PName`,`publisher`.`PCity` AS `PCity` from ((`book` join `author`) join `publisher`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AId`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Isbn`),
  ADD KEY `AId_idx` (`AId`),
  ADD KEY `PId_idx` (`PId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ClientEMail`,`Isbn`),
  ADD KEY `ClientEmail_idx` (`ClientEMail`),
  ADD KEY `Isbn_idx` (`Isbn`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientEMail`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`SId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `AId` FOREIGN KEY (`AId`) REFERENCES `author` (`AId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PId` FOREIGN KEY (`PId`) REFERENCES `publisher` (`PId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `ClientEmail` FOREIGN KEY (`ClientEMail`) REFERENCES `client` (`clientEMail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Isbn` FOREIGN KEY (`Isbn`) REFERENCES `book` (`Isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
