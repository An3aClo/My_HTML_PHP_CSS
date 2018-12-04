-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 04:49 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbexpress`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `alldetail` ()  BEGIN
select * FROM itemdetail JOIN dropofdetail ON (itemdetail.itemdetailID = dropofdetail.dropofdetailID) JOIN payment ON (itemdetail.itemdetailID=payment.paymentId) JOIN pickupdetail ON (itemdetail.itemdetailID=pickupdetail.pickupdetailID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `clientdetail` ()  BEGIN
SELECT * FROM `clients`;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordersummery` ()  BEGIN
SELECT `paymentId`,  `state`,  `datAdded`, `prize` FROM `payment` WHERE `state` ='Confirmed';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(45) NOT NULL,
  `adminPassword` varchar(10) NOT NULL,
  `adminSurname` varchar(45) NOT NULL,
  `adminStartDate` date NOT NULL,
  `adminContactNumber` varchar(10) NOT NULL,
  `adminPosition` varchar(45) NOT NULL,
  `adminEmail` varchar(45) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`adminID`, `adminName`, `adminPassword`, `adminSurname`, `adminStartDate`, `adminContactNumber`, `adminPosition`, `adminEmail`, `timeAdded`) VALUES
(12345, 'Ruan', 'password', 'Bard', '2018-01-01', '0123355936', 'Manager', 'ruanbard@jbexpress.com', '2018-10-08 20:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientEmail` varchar(45) NOT NULL,
  `clientName` varchar(45) NOT NULL,
  `clientSurname` varchar(45) NOT NULL,
  `clientContactNumber` varchar(45) NOT NULL,
  `clientPassword` char(10) NOT NULL,
  `timeRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientEmail`, `clientName`, `clientSurname`, `clientContactNumber`, `clientPassword`, `timeRegistered`) VALUES
('andreacloetekaap@outlook.com', 'Andrea', 'Cloete', '0720949108', 'password', '2018-10-08 20:32:06'),
('joeyMororia@gmail.com', 'Joey', 'Mororia', '0629758426', 'jowy', '2018-10-08 20:52:16'),
('ndaim@cti.ac.za', 'Ndai', 'Makhurane', '0123456987', 'anything', '2018-10-09 07:34:32'),
('renecloetekaap@outlook.com', 'Rene', 'Cloete', '0123654789', 'rene12345', '2018-10-08 20:32:15'),
('sannie@gmail.com', 'Sanie', 'Vissagie', '082759542', 'myPassword', '2018-10-08 20:32:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clients`
-- (See below for the actual view)
--
CREATE TABLE `clients` (
`clientEmail` varchar(45)
,`clientName` varchar(45)
,`clientSurname` varchar(45)
,`clientContactNumber` varchar(45)
,`timeRegistered` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `dropofdetail`
--

CREATE TABLE `dropofdetail` (
  `dropofdetailID` char(5) NOT NULL,
  `dropofdetailStreetNumber` varchar(45) NOT NULL,
  `dropofdetailStreetName` varchar(45) NOT NULL,
  `dropofdetailSuburb` varchar(45) NOT NULL,
  `dropofdetailProvince` varchar(45) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dropOfName` varchar(45) NOT NULL,
  `dropOfSurname` varchar(45) NOT NULL,
  `dropOfNumber` varchar(10) NOT NULL,
  `dropOffEmail` varchar(45) NOT NULL,
  `clientEmail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropofdetail`
--

INSERT INTO `dropofdetail` (`dropofdetailID`, `dropofdetailStreetNumber`, `dropofdetailStreetName`, `dropofdetailSuburb`, `dropofdetailProvince`, `timeAdded`, `dropOfName`, `dropOfSurname`, `dropOfNumber`, `dropOffEmail`, `clientEmail`) VALUES
('15793', '45', 'DunkenDoughNut Rd', 'Claremont', 'Cape Town', '2018-10-08 22:58:43', 'Daniel', 'Hentels', '0725987485', 'daniel@yahoo.com', ''),
('33348', '45', 'Corelli AV', 'Waverly', 'Pretoria', '2018-10-09 07:41:45', 'andrea', 'cloete', '0123654789', 'ndaim@cti.ac.za', ''),
('65381', '548', 'River Road', 'Waverly', 'Free States', '2018-10-09 06:26:48', 'Kevin', 'Tondo', '0125478596', 'k@gmail.com', ''),
('65582', '46', 'sdvxfv', 'sdgv', 'fgvxd', '2018-10-09 07:48:02', 'sdgvd', 'dvsgzd', '4527421145', 'saf@dtsh.dff', ''),
('89438', '4598', 'Jentle Ave', 'Waverly', 'Pretoria', '2018-10-08 22:52:21', 'Cecilia', 'Truter', '0219874857', 'cecilia@outlook.com', ''),
('91216', '751', 'Correlilaan', 'Mayville', 'Pretoria', '2018-10-08 21:03:31', 'Monica', 'Labernosky', '0137859436', 'monica@yahoo.com', ''),
('94263', '234', 'Veters Ave', 'Verterburg', 'Bloenfontein', '2018-10-08 23:17:27', 'Racheal', 'Jackson', '0345789512', 'racheal@gmial.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `itemdetail`
--

CREATE TABLE `itemdetail` (
  `itemdetailID` char(5) NOT NULL,
  `clientEmail` varchar(45) NOT NULL,
  `itemDescriprion` varchar(45) NOT NULL,
  `itemWeight` double NOT NULL,
  `itemHeight` double NOT NULL,
  `itemLenght` double NOT NULL,
  `itemWidth` double NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemdetail`
--

INSERT INTO `itemdetail` (`itemdetailID`, `clientEmail`, `itemDescriprion`, `itemWeight`, `itemHeight`, `itemLenght`, `itemWidth`, `timeAdded`) VALUES
('15793', 'joeyMororia@gmail.com', 'Kitchen table ', 15, 150, 150, 100, '2018-10-08 22:54:13'),
('33348', 'ndaim@cti.ac.za', '2kg of suger', 2, 30, 15, 3, '2018-10-09 07:36:11'),
('65381', 'renecloetekaap@outlook.com', 'Laptop', 5, 5, 25, 30, '2018-10-09 06:22:54'),
('65582', 'ndaim@cti.ac.za', 'bag of sweets', 2, 52, 55, 55, '2018-10-09 07:47:05'),
('89438', 'joeyMororia@gmail.com', 'Chair', 10, 100, 50, 50, '2018-10-08 22:47:08'),
('91216', 'andreacloetekaap@outlook.com', 'Mattress (King Size/Standard) ', 100, 150, 150, 30, '2018-10-08 20:59:35'),
('94263', 'sannie@gmail.com', 'Coffee Machine ', 0.5, 45, 50, 30, '2018-10-08 23:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `messagerName` varchar(45) NOT NULL,
  `messangerSurnme` varchar(45) NOT NULL,
  `messangerNumber` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  `messageEmail` varchar(45) NOT NULL,
  `timeSend` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`idmessage`, `messagerName`, `messangerSurnme`, `messangerNumber`, `message`, `messageEmail`, `timeSend`) VALUES
(62, 'Zeldene', 'Else', '0829759463', 'Thank you very much for the fast delivery services. ', 'zeldeneelse@gmail.com', '2018-10-08 20:44:15'),
(63, 'Jeandre', 'van der Merve', '0127784945', 'Please be informed that I am impressed with the services I received.\r\n', 'jvdm@outlook.com', '2018-10-08 20:47:40'),
(64, 'Christie', 'Venter', '0129874869', 'My parcel was damaged please call me it is urgent.', 'cventer@yahoo.com', '2018-10-08 20:48:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `neworder`
-- (See below for the actual view)
--
CREATE TABLE `neworder` (
`itemdetailID` char(5)
,`clientEmail` varchar(45)
,`itemDescriprion` varchar(45)
,`itemWeight` double
,`itemHeight` double
,`itemLenght` double
,`itemWidth` double
,`dropofdetailStreetNumber` varchar(45)
,`dropofdetailStreetName` varchar(45)
,`dropofdetailSuburb` varchar(45)
,`dropofdetailProvince` varchar(45)
,`dropOfName` varchar(45)
,`dropOfSurname` varchar(45)
,`dropOfNumber` varchar(10)
,`dropOffEmail` varchar(45)
,`paymentMethod` varchar(45)
,`AditionalNotes` longtext
,`pickupStreetNumber` varchar(45)
,`pickupdetailStreetName` varchar(45)
,`pickupdetailSuburb` varchar(45)
,`pickupdetailProvince` varchar(45)
,`pickupdetailTime` varchar(15)
,`bName` varchar(45)
,`bSurname` varchar(45)
,`bNumber` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` char(5) NOT NULL,
  `paymentMethod` varchar(45) NOT NULL,
  `AditionalNotes` longtext NOT NULL,
  `state` varchar(45) NOT NULL,
  `userCancelationReason` text NOT NULL,
  `clientEmail` varchar(45) NOT NULL,
  `datAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prize` varchar(50) NOT NULL,
  `Process` varchar(45) NOT NULL DEFAULT 'Under review',
  `PaymentStatus` varchar(45) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `paymentMethod`, `AditionalNotes`, `state`, `userCancelationReason`, `clientEmail`, `datAdded`, `prize`, `Process`, `PaymentStatus`) VALUES
('15793', 'Cash on collection', '', 'Confirmed', '', 'joeyMororia@gmail.com', '2018-10-09 06:31:47', '500.00', 'Accepted', ''),
('33348', 'Cash on collection', 'HANDEL WITH CARE', 'Confirmed', '', 'ndaim@cti.ac.za', '2018-10-09 07:45:25', '100', 'Accepted', 'Pending'),
('65381', 'Cash on collection', 'Please handle with care ', 'Cancled by user', '', 'renecloetekaap@outlook.com', '2018-10-09 06:29:25', 'Please check your your email inbox for invoice', 'Under review', 'Pending'),
('65582', 'EFT', '', 'Confirmed', '', 'ndaim@cti.ac.za', '2018-10-09 07:50:17', 'Please check your your email inbox for invoice', 'Delivered', 'Payed'),
('89438', 'Cash on collection', '', 'Cancled by user', 'Change of mind ', 'joeyMororia@gmail.com', '2018-10-08 22:53:08', 'Please check your your email inbox for invoice', '', ''),
('91216', 'EFT', 'Please bring glad wrap', 'Confirmed', '', 'andreacloetekaap@outlook.com', '2018-10-09 05:04:56', '100.00', 'Delivered', 'Payed'),
('94263', 'EFT', '', 'Confirmed', '', 'sannie@gmail.com', '2018-10-09 05:15:04', 'Please check your your email inbox for invoice', 'Order Declined', '');

-- --------------------------------------------------------

--
-- Table structure for table `pickupdetail`
--

CREATE TABLE `pickupdetail` (
  `pickupdetailID` char(5) NOT NULL,
  `pickupStreetNumber` varchar(45) NOT NULL,
  `pickupdetailStreetName` varchar(45) NOT NULL,
  `pickupdetailSuburb` varchar(45) NOT NULL,
  `pickupdetailProvince` varchar(45) NOT NULL,
  `pickupdetailTime` varchar(15) NOT NULL,
  `bName` varchar(45) NOT NULL,
  `bSurname` varchar(45) NOT NULL,
  `bNumber` varchar(10) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clientEmail` varchar(45) NOT NULL,
  `pickupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickupdetail`
--

INSERT INTO `pickupdetail` (`pickupdetailID`, `pickupStreetNumber`, `pickupdetailStreetName`, `pickupdetailSuburb`, `pickupdetailProvince`, `pickupdetailTime`, `bName`, `bSurname`, `bNumber`, `timeAdded`, `clientEmail`, `pickupdate`) VALUES
('15793', '123', 'Frikkel St', 'Mayville', 'Free states ', '15:00 to 16:00', 'Gerrie', 'Grobrer', '0720987584', '2018-10-08 22:58:46', 'joeyMororia@gmail.com', '2018-10-30'),
('33348', '11', 'Ihamhram', 'Claremond', 'Cape Town', '12:00 to 13:00', 'Ndai', 'Makhurane', '0123456987', '2018-10-09 07:42:17', 'ndaim@cti.ac.za', '0000-00-00'),
('65381', '123', 'Lentel Ave', 'Kylsrivier', 'Cape Town', '10:00 to 11:00', 'Rene', 'Cloete', '0125748963', '2018-10-09 06:27:01', 'renecloetekaap@outlook.com', '2018-10-08'),
('65582', '55', 'aGSD', 'sdGVdsf', 'fDFv', '08:00 to 09:00', 'Andrea', 'Cloete', '5757685478', '2018-10-09 07:48:14', 'ndaim@cti.ac.za', '0000-00-00'),
('89438', '526', 'Hettels', 'Mayville', 'Pretoria', '08:00 to 09:00', 'Joey', 'Mororia', '0629758426', '2018-10-08 22:52:24', 'joeyMororia@gmail.com', '2018-10-12'),
('91216', '15', 'Kettley Way', 'Table view', 'Cape Town', '12:00 to 13:00', 'Andrea', 'Cloete', '0720949108', '2018-10-08 21:03:51', 'andreacloetekaap@outlook.com', '2018-10-10'),
('94263', '748', 'Gobbly St', 'Blouberg ', 'Cape Town', '10:00 to 11:00', 'Genifer', 'Huiser', '0726984152', '2018-10-08 23:17:30', 'sannie@gmail.com', '2018-11-09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `shortorderview`
-- (See below for the actual view)
--
CREATE TABLE `shortorderview` (
`paymentId` char(5)
,`state` varchar(45)
,`datAdded` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `clients`
--
DROP TABLE IF EXISTS `clients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clients`  AS  select `client`.`clientEmail` AS `clientEmail`,`client`.`clientName` AS `clientName`,`client`.`clientSurname` AS `clientSurname`,`client`.`clientContactNumber` AS `clientContactNumber`,`client`.`timeRegistered` AS `timeRegistered` from `client` order by `client`.`timeRegistered` desc ;

-- --------------------------------------------------------

--
-- Structure for view `neworder`
--
DROP TABLE IF EXISTS `neworder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `neworder`  AS  select `itemdetail`.`itemdetailID` AS `itemdetailID`,`itemdetail`.`clientEmail` AS `clientEmail`,`itemdetail`.`itemDescriprion` AS `itemDescriprion`,`itemdetail`.`itemWeight` AS `itemWeight`,`itemdetail`.`itemHeight` AS `itemHeight`,`itemdetail`.`itemLenght` AS `itemLenght`,`itemdetail`.`itemWidth` AS `itemWidth`,`dropofdetail`.`dropofdetailStreetNumber` AS `dropofdetailStreetNumber`,`dropofdetail`.`dropofdetailStreetName` AS `dropofdetailStreetName`,`dropofdetail`.`dropofdetailSuburb` AS `dropofdetailSuburb`,`dropofdetail`.`dropofdetailProvince` AS `dropofdetailProvince`,`dropofdetail`.`dropOfName` AS `dropOfName`,`dropofdetail`.`dropOfSurname` AS `dropOfSurname`,`dropofdetail`.`dropOfNumber` AS `dropOfNumber`,`dropofdetail`.`dropOffEmail` AS `dropOffEmail`,`payment`.`paymentMethod` AS `paymentMethod`,`payment`.`AditionalNotes` AS `AditionalNotes`,`pickupdetail`.`pickupStreetNumber` AS `pickupStreetNumber`,`pickupdetail`.`pickupdetailStreetName` AS `pickupdetailStreetName`,`pickupdetail`.`pickupdetailSuburb` AS `pickupdetailSuburb`,`pickupdetail`.`pickupdetailProvince` AS `pickupdetailProvince`,`pickupdetail`.`pickupdetailTime` AS `pickupdetailTime`,`pickupdetail`.`bName` AS `bName`,`pickupdetail`.`bSurname` AS `bSurname`,`pickupdetail`.`bNumber` AS `bNumber` from (((`itemdetail` join `dropofdetail` on((`itemdetail`.`itemdetailID` = `dropofdetail`.`dropofdetailID`))) join `payment` on((`itemdetail`.`itemdetailID` = `payment`.`paymentId`))) join `pickupdetail` on((`itemdetail`.`itemdetailID` = `pickupdetail`.`pickupdetailID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `shortorderview`
--
DROP TABLE IF EXISTS `shortorderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shortorderview`  AS  select `payment`.`paymentId` AS `paymentId`,`payment`.`state` AS `state`,`payment`.`datAdded` AS `datAdded` from `payment` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientEmail`);

--
-- Indexes for table `dropofdetail`
--
ALTER TABLE `dropofdetail`
  ADD PRIMARY KEY (`dropofdetailID`);

--
-- Indexes for table `itemdetail`
--
ALTER TABLE `itemdetail`
  ADD PRIMARY KEY (`itemdetailID`),
  ADD KEY `clientEmail_idx` (`clientEmail`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `pickupdetail`
--
ALTER TABLE `pickupdetail`
  ADD PRIMARY KEY (`pickupdetailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dropofdetail`
--
ALTER TABLE `dropofdetail`
  ADD CONSTRAINT `id` FOREIGN KEY (`dropofdetailID`) REFERENCES `itemdetail` (`itemdetailID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `paymentId` FOREIGN KEY (`paymentId`) REFERENCES `itemdetail` (`itemdetailID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pickupdetail`
--
ALTER TABLE `pickupdetail`
  ADD CONSTRAINT `pickupId` FOREIGN KEY (`pickupdetailID`) REFERENCES `itemdetail` (`itemdetailID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
