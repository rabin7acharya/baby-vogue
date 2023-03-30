-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 03:32 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `babyvogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `unitsOnOrder` int NOT NULL DEFAULT '0',
  `unitPrice` int NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discount` int NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  `categoryID` int NOT NULL,
  `adminID` int NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `categoryID` (`categoryID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `categoryID`, `adminID`) VALUES
(55, 'Baby Tshirt', 10, 0, 200, 'High quality baby tshirt', 10, 'Frame 98 (1).png', 4, 1),
(56, 'Baby Jacket', 10, 0, 300, 'Puffer jacket to keep your baby warm', 10, 'Frame 103.png', 4, 1),
(61, 'Slim Baby Cap', 30, 0, 40, 'Slim baby hat for summer', 10, 'Frame 102.png', 8, 1),
(62, 'Baby Shoe', 50, 0, 80, 'Original Baby Shoe', 10, 'Frame 101.png', 6, 1),
(63, 'Baby Pant', 40, 0, 50, 'Original Baby Pant', 10, 'Frame 104.png', 7, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 03:32 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `babyvogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `unitsOnOrder` int NOT NULL DEFAULT '0',
  `unitPrice` int NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discount` int NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  `categoryID` int NOT NULL,
  `adminID` int NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `categoryID` (`categoryID`),
  KEY `adminID` (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `categoryID`, `adminID`) VALUES
(55, 'Baby Tshirt', 10, 0, 200, 'High quality baby tshirt', 10, 'Frame 98 (1).png', 4, 1),
(56, 'Baby Jacket', 10, 0, 300, 'Puffer jacket to keep your baby warm', 10, 'Frame 103.png', 4, 1),
(61, 'Slim Baby Cap', 30, 0, 40, 'Slim baby hat for summer', 10, 'Frame 102.png', 8, 1),
(62, 'Baby Shoe', 50, 0, 80, 'Original Baby Shoe', 10, 'Frame 101.png', 6, 1),
(63, 'Baby Pant', 40, 0, 50, 'Original Baby Pant', 10, 'Frame 104.png', 7, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;
