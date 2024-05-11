-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 02:25 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swapme`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(5) NOT NULL,
  `categoryType` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryType`) VALUES
('C01', 'Accessories'),
('C02', 'Fashion'),
('C03', 'Books and Stationery'),
('C04', 'Musical Instrument'),
('C05', 'Outdoor Equipment'),
('C06', 'Electronic Devices'),
('C07', 'Kitchen Crockery');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(35) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `imageURL` varchar(500) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `categoryID` varchar(5) DEFAULT NULL,
  `publisherEmail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `title`, `description`, `imageURL`, `price`, `categoryID`, `publisherEmail`) VALUES
('IT01', 'Muji Stationary Set', 'A pre-owned Muji stationery set, brimming with minimalist charm and creative history, is ready to inspire its next user\'s writing journey.', './upload_img/muji_pencil.png', 10, 'C03', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT02', 'Longchamp Small Bag', 'This second-hand Longchamp bag, used only once, boasts pristine condition and unparalleled quality. With its classic design and minimal wear, it\'s a rare find for those seeking luxury at a fraction of the cost.', './upload_img/longchamp_bag.jpeg', 35, 'C02', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT03', 'Yamaha Bb Clarinet', 'This second-hand clarinet offers aspiring musicians an affordable opportunity to explore the instrument\'s enchanting sounds with reliability despite previous use.', './upload_img/clarinet.jpg', 95, 'C04', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT04', 'Disney Bear Keychain', 'This second-hand Disney Bear Keychain brings Disney magic to your keys or bag at an affordable price, maintaining its charm despite previous use.', './upload_img/shirley_bear.jpg', 5, 'C01', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT05', 'Fujifilm Instax Camera', 'This second-hand Fujifilm Instax Camera offers instant vintage-inspired photography at a budget-friendly price, perfect for spontaneous snapshots on the go.', './upload_img/instax_camera.jpg', 35, 'C06', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT06', 'Sony Wireless Headphone', 'This second-hand Sony headphone delivers high-quality sound at an affordable price, perfect for enjoying music on the go. Despite previous use, it still offers comfort and reliability for your listening pleasure.', './upload_img/sony_headphone.jpg', 85, 'C06', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT07', 'Black String Bag', 'This second-hand black string bag offers practicality and style at a budget-friendly price, perfect for carrying your essentials with ease.', './upload_img/string_bag.jpg', 15, 'C02', 'Celine2.Na@live.uwe.ac.uk'),
('IT08', 'Piano Keyboard', 'This second-hand piano keyboard offers aspiring musicians an affordable way to practice and create music. Despite previous use, it still provides quality sound and performance for enjoyable playing sessions.', './upload_img/piano_keyboard.jpg', 100, 'C04', 'Celine2.Na@live.uwe.ac.uk'),
('IT09', 'Xiaomi Scooter', 'This second-hand Xiaomi Scooter offers convenient and eco-friendly transportation at a budget-friendly price. Despite previous use, it still delivers reliable performance for your commuting needs.', './upload_img/scooter.jpg', 95, 'C05', 'Celine2.Na@live.uwe.ac.uk'),
('IT10', 'Pearl Flute', 'This second-hand Pearl Flute provides aspiring musicians with a quality instrument at a more affordable price. ', './upload_img/flute.jpg', 90, 'C04', 'Celine2.Na@live.uwe.ac.uk'),
('IT11', 'Casetify Iphone 15 Cases', 'This second-hand bundle includes three Casetify iPhone 15 cases, offering stylish protection for your device at a discounted price. ', './upload_img/casetify_case.jpg', 10, 'C01', 'Celine2.Na@live.uwe.ac.uk'),
('IT12', 'Black Simple Backpack', 'This second-hand black simple backpack offers practicality and style at an affordable price. Despite previous use, it remains durable and functional, perfect for everyday use.', './upload_img/black_bag.jpg', 15, 'C02', 'Celine2.Na@live.uwe.ac.uk'),
('IT13', 'Cute AirPods Case', 'This second-hand cute AirPods case, used only once, provides both style and protection for your wireless earbuds.', './upload_img/airpod_case.jpg', 5, 'C01', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT14', '4PCs Mechanical Pencil', 'These second-hand mechanical pencil offers precision and durability, perfect for sketching or note-taking. Despite previous use, it still provides smooth writing and reliable performance.', './upload_img/pencil.jpg', 8, 'C03', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT15', 'Stanley Tumbler', 'This second-hand Stanley tumbler, clean and defect-free, provides durable and insulated beverage storage at a reduced price.', './upload_img/stanley_bottle.jpg', 15, 'C01', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT16', 'AirPods Gen 3', 'This second-hand pair of AirPods Gen 3 offers wireless convenience and premium audio quality at a discounted price. Clean and defect-free, they also provide an immersive listening experience.', './upload_img/airpods.jpg', 100, 'C06', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT17', 'Harry Potter Book 6', 'This second-hand Harry Potter book offers an enchanting journey into the magical world of Hogwarts at a discounted price. Despite previous ownership, it still delivers the same captivating storytelling and adventures.', './upload_img/harrypotter_book.jpg', 10, 'C03', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT18', 'Amazon Bike', 'This second-hand Amazon bike provides reliable transportation at a discounted price, perfect for commuting or leisure rides. It offers functionality and convenience for your cycling needs.', './upload_img/bike.jpg', 105, 'C05', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT19', 'Frying Pan', 'It is ready to continue its culinary journey in the hands of its next owner.', './upload_img/pan.jpg', 5, 'C07', 'Celine2.Na@live.uwe.ac.uk'),
('IT20', 'Cooking Plates Set', 'A complete second-hand cooking plates set, showcasing signs of use yet promising functionality, awaits a new kitchen to serve with its seasoned charm and practicality.\r\n\r\n\r\n\r\n', './upload_img/plates.jpg', 10, 'C07', 'Yi3.Khoo@live.uwe.ac.uk'),
('IT21', 'Cooking Clay Pot', 'A used cooking clay pot, rich with flavor and rustic appeal, seeks a new kitchen to continue its culinary legacy.', './upload_img/clay_pot.jpg', 15, 'C07', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT22', 'Glass Cooking Pot', 'A pre-owned cooking glass pot, still gleaming with the promise of countless flavorful creations, awaits its next culinary chapter in a new kitchen.', './upload_img/glass_pot.jpg', 20, 'C07', 'Abi2.Khaw@live.uwe.ac.uk'),
('IT23', 'Stainless Steel Stock Pot', 'A previously owned stainless steel stock pot, resilient and ready for simmering soups or savory stews, seeks a new home in a bustling kitchen.', './upload_img/stainless_steel.jpg', 40, 'C07', 'Celine2.Na@live.uwe.ac.uk');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` varchar(5) NOT NULL,
  `locationName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `locationName`) VALUES
('L01', 'Library'),
('L02', 'Student Union'),
('L03', 'X-Block'),
('L04', 'S-Block'),
('L05', 'Student Village'),
('L06', 'Wallscourt Park'),
('L07', 'Centre for Music'),
('L08', 'Centre for Sport');

-- --------------------------------------------------------

--
-- Table structure for table `swap_offer`
--

CREATE TABLE `swap_offer` (
  `offerID` varchar(5) NOT NULL,
  `itemToSwapID` varchar(25) DEFAULT NULL,
  `itemForSwapID` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `locationID` varchar(5) DEFAULT NULL,
  `requesterEmail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `swap_offer`
--

INSERT INTO `swap_offer` (`offerID`, `itemToSwapID`, `itemForSwapID`, `date`, `time`, `locationID`, `requesterEmail`) VALUES
('OFR01', 'IT12', 'IT22', '2024-05-09', '01:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR02', 'IT12', 'IT21', '2024-05-09', '01:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR03', 'IT08', 'IT18', '2024-05-09', '01:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR04', 'IT07', 'IT20', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR05', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR06', 'IT13', 'IT20', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR07', 'IT13', 'IT20', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR08', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR09', 'IT13', 'IT20', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR10', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR15', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR16', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR17', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR18', 'IT13', 'IT04', '2024-05-09', '01:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR19', 'IT13', 'IT20', '2024-05-09', '03:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR20', 'IT13', 'IT20', '2024-05-09', '03:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR21', 'IT12', 'IT21', '2024-05-09', '08:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR22', 'IT13', 'IT11', '2024-05-09', '12:00:00', 'L08', 'Celine2.Na@live.uwe.ac.uk'),
('OFR23', 'IT15', 'IT12', '2024-05-09', '08:00:00', 'L08', 'Celine2.Na@live.uwe.ac.uk'),
('OFR24', 'IT13', 'IT19', '2024-05-09', '08:00:00', 'L08', 'Celine2.Na@live.uwe.ac.uk'),
('OFR25', 'IT11', 'IT14', '2024-05-09', '19:04:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR26', 'IT11', 'IT13', '2024-05-09', '19:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR27', 'IT11', 'IT14', '2024-05-09', '00:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR28', 'IT01', 'IT15', '2024-05-09', '23:00:00', 'L08', 'Abi2.Khaw@live.uwe.ac.uk'),
('OFR29', 'IT19', 'IT01', '2024-05-21', '14:30:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR30', 'IT19', 'IT01', '2024-05-21', '14:30:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR31', 'IT19', 'IT04', '2024-05-10', '03:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR32', 'IT12', 'IT20', '2024-05-23', '17:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR33', 'IT15', 'IT20', '2024-05-11', '17:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR34', 'IT15', 'IT20', '2024-05-11', '18:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR35', 'IT07', 'IT20', '2024-05-21', '19:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR36', 'IT15', 'IT20', '2024-05-25', '20:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR37', 'IT15', 'IT01', '2024-05-11', '09:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR38', 'IT15', 'IT20', '2024-05-21', '09:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR39', 'IT13', 'IT04', '2024-05-11', '12:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk'),
('OFR40', 'IT13', 'IT04', '2024-05-11', '14:00:00', 'L08', 'Yi3.Khoo@live.uwe.ac.uk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `dateBirth` date DEFAULT NULL,
  `profilePic` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `firstName`, `lastName`, `dateBirth`, `profilePic`) VALUES
('Abi2.Khaw@live.uwe.ac.uk', 'Abigail2002', 'Abigail', 'Khaw', '2002-10-25', 'https://media.istockphoto.com/id/1311858467/photo/head-shot-portrait-attractive-young-indian-woman-looking-at-camera.jpg?s=612x612&w=0&k=20&c=0QWC0t9uc6tptvQkWZxlFKK6hsnOxQBCobTfgkuNbLA='),
('Celine2.Na@live.uwe.ac.uk', 'Celine2001', 'Celine', 'Na', '2002-09-17', 'https://img.freepik.com/free-photo/business-concept-portrait-confident-young-businesswoman-keeping-arms-crossed-looking-camera-w_1258-104422.jpg'),
('Yi3.Khoo@live.uwe.ac.uk', 'Yiqing2002', 'Yi Qing', 'Khoo', '2002-09-30', 'https://img.freepik.com/premium-photo/portrait-young-modern-businesswoman-classic-suit_253512-24.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `publisherEmail` (`publisherEmail`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `swap_offer`
--
ALTER TABLE `swap_offer`
  ADD PRIMARY KEY (`offerID`),
  ADD KEY `itemToSwapID` (`itemToSwapID`),
  ADD KEY `itemForSwapID` (`itemForSwapID`),
  ADD KEY `locationID` (`locationID`),
  ADD KEY `requesterEmail` (`requesterEmail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`publisherEmail`) REFERENCES `user` (`email`);

--
-- Constraints for table `swap_offer`
--
ALTER TABLE `swap_offer`
  ADD CONSTRAINT `swap_offer_ibfk_1` FOREIGN KEY (`itemToSwapID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `swap_offer_ibfk_2` FOREIGN KEY (`itemForSwapID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `swap_offer_ibfk_3` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `swap_offer_ibfk_4` FOREIGN KEY (`requesterEmail`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
