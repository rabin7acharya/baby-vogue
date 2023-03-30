-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2023 at 08:47 AM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`, `adminUsername`) VALUES
(1, 'admin', 'admin@', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `billinginfo`
--

DROP TABLE IF EXISTS `billinginfo`;
CREATE TABLE IF NOT EXISTS `billinginfo` (
  `billingID` int NOT NULL AUTO_INCREMENT,
  `billingDate` date NOT NULL,
  `billingAddress` varchar(200) NOT NULL,
  `ccNum` int NOT NULL,
  `ccCvv` int NOT NULL,
  `ccExpDate` date NOT NULL,
  `ccNameOn` varchar(30) NOT NULL,
  PRIMARY KEY (`billingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(50) NOT NULL,
  `productID` int NOT NULL,
  `numOfProducts` int NOT NULL,
  `totalPrice` int NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userEmail`, `productID`, `numOfProducts`, `totalPrice`) VALUES
(55, 'rabin7acharya@gmail.com', 55, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(20) NOT NULL,
  `discription` varchar(250) NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `discription`, `imageLocation`) VALUES
(4, 'Clothes', 'All clothes are available here ', ''),
(5, 'Toys', 'only toys are available here', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `address`, `country`, `postalCode`, `phone`, `password`, `city`) VALUES
(1, 'Mahesh', 'Bhandari', 'mahesh@gmail.com', 'pokhara', 'Nepal', '33700', '9812345678', 'mahesh@123', 'pokhara'),
(51, 'Sandesh', 'Subedi', 'sandesh@gmail.com', 'pokhara', 'Nepal', '33700', '9874185296', 'sandesh@123', 'fulbari'),
(52, 'Rabin', 'Acharya', 'rabin7acharya@gmail.com', 'Sardikhola', 'Nepal', '33700', '1234567890', 'rabin123*', 'Pokhara');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderNum` int NOT NULL AUTO_INCREMENT,
  `unitPrice` int NOT NULL,
  `quantity` int NOT NULL,
  `discount` int NOT NULL,
  `unitTotalPrice` int NOT NULL,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  PRIMARY KEY (`orderNum`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderDate` date NOT NULL,
  `totalPrice` int NOT NULL,
  `ShippedDate` date NOT NULL,
  `RequiredDate` date NOT NULL,
  `customerID` int NOT NULL,
  `billingID` int NOT NULL,
  `orderNum` int NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `billingID` (`billingID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `categoryID`, `adminID`) VALUES
(55, 'Baby Tshirt', 10, 0, 200, 'High quality baby tshirt', 10, 'Frame 98 (1).png', 4, 1),
(56, 'Baby Jacket', 10, 0, 300, 'Puffer jacket to keep your baby warm', 10, 'Frame 103.png', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productstoke`
--

DROP TABLE IF EXISTS `productstoke`;
CREATE TABLE IF NOT EXISTS `productstoke` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) NOT NULL,
  `quantity` double NOT NULL,
  `unitsOnOrder` double NOT NULL,
  `unitPrice` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `imageLocation` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productstoke`
--

INSERT INTO `productstoke` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `category`) VALUES
(7, 'CCTV', 12, 0, 2300, 'Best Camera', 1, 'CCHIHDCAMDS2CC12D8TAMM.jpg', '1'),
(9, 'CCTV', 12, 0, 1200, 'Good', 1, 'CCHIHDCAMDS2CE56D0TVPIR3F.jpg', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`billingID`) REFERENCES `billinginfo` (`billingID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`);
COMMIT;
