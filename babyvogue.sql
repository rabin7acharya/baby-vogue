-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 09:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

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

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL,
  `adminUsername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`, `adminUsername`) VALUES
(1, 'admin', 'admin@', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `billinginfo`
--

CREATE TABLE `billinginfo` (
  `billingID` int(11) NOT NULL,
  `billingDate` date NOT NULL,
  `billingAddress` varchar(200) NOT NULL,
  `ccNum` int(16) NOT NULL,
  `ccCvv` int(4) NOT NULL,
  `ccExpDate` date NOT NULL,
  `ccNameOn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(10) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `productID` int(11) NOT NULL,
  `numOfProducts` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userEmail`, `productID`, `numOfProducts`, `totalPrice`) VALUES
(51, 'mahesh@gmail.com', 49, 1, 5400),
(52, 'mahesh@gmail.com', 19, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `discription` varchar(250) NOT NULL,
  `imageLocation` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `address`, `country`, `postalCode`, `phone`, `password`, `city`) VALUES
(1, 'Mahesh', 'Bhandari', 'mahesh@gmail.com', 'pokhara', 'Nepal', '33700', '9812345678', 'mahesh@123', 'pokhara'),
(50, 'Sagun', 'shrestha', 'sagun@gmail.com', 'Damauli', 'Nepal', '33700', '9812457621', 'sagun@123', 'Damauli'),
(51, 'Sandesh', 'Subedi', 'sandesh@gmail.com', 'pokhara', 'Nepal', '33700', '9874185296', 'sandesh@123', 'fulbari');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderNum` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `unitTotalPrice` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderDate` date NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `ShippedDate` date NOT NULL,
  `RequiredDate` date NOT NULL,
  `customerID` int(11) NOT NULL,
  `billingID` int(11) NOT NULL,
  `orderNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitsOnOrder` int(11) NOT NULL DEFAULT 0,
  `unitPrice` int(6) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `discount` int(5) NOT NULL,
  `imageLocation` varchar(1000) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `categoryID`, `adminID`) VALUES
(19, 'Sport BIke', 5, 0, 10000, 'Features\r\nMaterial - Plastic\r\nSpeed - 4-6km/hr\r\nOperating type - Battery\r\nHand Acceleration & Foot Brake\r\nHorn,music and sound effects\r\nWorking lights', 5, 'bike 2.jpg', 5, 1),
(22, 'skatebaord', 3, 0, 5000, 'Best quality.', 5, 'skate.jpg', 5, 1),
(24, 'Duck', 5, 0, 500, 'Rubber duck.\r\nColor yellow', 1, 'duck.jpg', 5, 1),
(33, 'Car', 5, 0, 2000, 'Material - PlasticSpeed - 4-6km/hrOperating type - Battery/ Remote ControlParental Remote - YesFoot AccelerationHorn,music and sound effectsWorking lights', 5, 'resize-1679998521632637925car.jpg', 5, 1),
(34, 'Ring', 5, 0, 800, 'Rubber colorful image ', 1, 'ring.jpg', 5, 1),
(35, 'Fisher', 5, 0, 1200, '', 1, 'fisher.jpg', 5, 1),
(36, 'Smart doll', 5, 0, 15000, 'best sound quality. \r\nhigh battery backup.\r\ncan record audio and video', 3, 'smart toy.jpg', 5, 1),
(37, 'Toddler toy', 10, 0, 2999, '', 2, 'resize-16799993761252287892toddlertoys.jpg', 5, 1),
(38, 'Baby outfit', 10, 0, 3000, 'set outfit on sale', 3, 'baby-outfit.jpg', 4, 1),
(41, 'hoodie set', 5, 0, 4500, 'best quality hoodies set', 5, 'hoodie.png', 4, 1),
(43, 'Collection', 10, 0, 3999, 'collection', 3, 'image99.jpg', 4, 1),
(44, 'Baby product package', 3, 0, 6999, 'All package of baby product are available. High Quality. ', 5, 'Baby-product-Package.jpg', 4, 1),
(45, 'Be a unicron', 5, 0, 4500, 'Unicorn collection', 4, 'be-a-unicorn.jpg', 4, 1),
(46, 'Cotton Body Suit', 5, 0, 2500, 'Cotton Baby Suit ', 4, 'cotton-baby-body-suite.jpg', 4, 1),
(47, 'Crocher Pattern', 3, 0, 5210, 'Crocher Pattern best quality available ', 3, 'crochet-pattern.jpg', 4, 1),
(48, 'Floral croptop', 12, 0, 4780, 'floral-croptop', 5, 'floral-croptop.jpg', 4, 1),
(49, 'Hello kity', 10, 0, 5400, 'hello-kity color pink', 3, 'hello-kity.jpg', 4, 1),
(50, 'Melario baby dress', 3, 0, 6791, 'melario-baby-dress\r\ncolor available', 3, 'melario-baby-dress.jpg', 4, 1),
(51, 'Mom dad me bodysuite', 4, 0, 6210, 'mom-dad-me-bodysuite\r\ncolors are available ', 6, 'mom-dad-me-bodysuite.jpg', 4, 1),
(52, 'New to crew', 3, 0, 6600, 'new-to-crew\r\nmore colors available', 4, 'new-to-crew.jpg', 4, 1),
(53, 'Party Dress', 5, 0, 5999, 'Party Dress best quality', 5, 'party dress.jpg', 4, 1),
(54, 'Summer sleevless', 5, 0, 5500, 'summer-sleevless\r\nmore colors available', 3, 'summer-sleevless.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productstoke`
--

CREATE TABLE `productstoke` (
  `productID` int(50) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `quantity` double NOT NULL,
  `unitsOnOrder` double NOT NULL,
  `unitPrice` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `imageLocation` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productstoke`
--

INSERT INTO `productstoke` (`productID`, `productName`, `quantity`, `unitsOnOrder`, `unitPrice`, `description`, `discount`, `imageLocation`, `category`) VALUES
(7, 'CCTV', 12, 0, 2300, 'Best Camera', 1, 'CCHIHDCAMDS2CC12D8TAMM.jpg', '1'),
(9, 'CCTV', 12, 0, 1200, 'Good', 1, 'CCHIHDCAMDS2CE56D0TVPIR3F.jpg', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `billinginfo`
--
ALTER TABLE `billinginfo`
  ADD PRIMARY KEY (`billingID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderNum`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `billingID` (`billingID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `productstoke`
--
ALTER TABLE `productstoke`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billinginfo`
--
ALTER TABLE `billinginfo`
  MODIFY `billingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderNum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `productstoke`
--
ALTER TABLE `productstoke`
  MODIFY `productID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
