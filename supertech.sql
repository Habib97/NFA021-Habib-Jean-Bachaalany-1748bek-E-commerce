-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2022 at 12:05 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supertech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `a_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `a_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `a_email`, `a_pass`) VALUES
(1, 'habib', 'habib');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_cart` int NOT NULL AUTO_INCREMENT,
  `qte_cart` int NOT NULL,
  `id_pro` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_cart`),
  KEY `id_pro` (`id_pro`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `qte_cart`, `id_pro`, `id_user`) VALUES
(68, 1, 5, 7),
(78, 1, 36, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_available` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `cat_name`, `c_available`) VALUES
(1, 'Earphones', 1),
(2, 'Charging cable', 1),
(3, 'Speakers', 1),
(4, 'Cover', 1),
(6, 'stand mobilre', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_ord` date NOT NULL,
  `amount` double NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `ord_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `date_ord`, `amount`, `pay_method`, `id_user`) VALUES
(3, '2022-09-20', 118.3, 'Cash on delivery', 4),
(4, '2022-09-20', 66.8, 'Wish Money', 6),
(5, '2022-09-20', 45, 'OMT', 4),
(6, '2022-09-22', 36, 'OMT', 4),
(7, '2022-09-22', 54, 'Wish Money', 2),
(8, '2022-09-23', 72, 'Western Union', 2),
(9, '2022-09-26', 9, 'Western Union', 2),
(10, '2022-09-27', 26.4, 'OMT', 7),
(11, '2022-09-29', 71, 'OMT', 9),
(12, '2022-09-29', 12, 'Cash on delivery', 9),
(13, '2022-09-30', 112, 'Wish Money', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id_details` int NOT NULL AUTO_INCREMENT,
  `qte_pro` int NOT NULL,
  `price_pro` double NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `id_order` int UNSIGNED NOT NULL,
  `id_pro` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_details`),
  KEY `det_order` (`id_order`),
  KEY `det_product` (`id_pro`),
  KEY `det_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_details`, `qte_pro`, `price_pro`, `id_user`, `id_order`, `id_pro`) VALUES
(6, 1, 8.5, 4, 3, 3),
(7, 3, 1.5, 4, 3, 13),
(8, 2, 3, 4, 3, 28),
(9, 2, 2.6, 4, 3, 25),
(10, 4, 16, 4, 3, 32),
(11, 1, 30, 4, 3, 30),
(12, 3, 20, 6, 4, 10),
(13, 1, 6.8, 6, 4, 8),
(14, 1, 30, 4, 5, 30),
(15, 1, 15, 4, 5, 21),
(16, 4, 3, 4, 6, 15),
(17, 3, 8, 4, 6, 22),
(18, 2, 3, 2, 7, 28),
(19, 3, 16, 2, 7, 32),
(20, 2, 30, 2, 8, 30),
(21, 1, 3, 2, 8, 5),
(22, 1, 9, 2, 8, 11),
(23, 1, 3, 2, 9, 18),
(24, 1, 4, 2, 9, 20),
(25, 1, 2, 2, 9, 26),
(26, 2, 2, 7, 10, 29),
(27, 1, 1.4, 7, 10, 23),
(28, 2, 6, 7, 10, 4),
(29, 3, 3, 7, 10, 27),
(30, 4, 16, 9, 11, 32),
(31, 2, 3, 9, 11, 5),
(32, 1, 1, 9, 11, 12),
(33, 5, 2.4, 9, 12, 1),
(34, 5, 16, 2, 13, 32),
(35, 2, 2.5, 2, 13, 16),
(36, 3, 9, 2, 13, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id_pro` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_qte` int NOT NULL,
  `p_price` double NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_available` tinyint(1) NOT NULL,
  `id_cat` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id_pro`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_pro`, `p_name`, `p_desc`, `p_qte`, `p_price`, `p_image`, `p_available`, `id_cat`) VALUES
(1, '4.4TRRRS earphones', '4.4 TRRRS for dap & amp pro in ear Earphones HIFI.', 54, 2.4, '4.4TRRRS earphones.jpg', 1, 1),
(2, 'Bluedio V2 headset', 'Bluedio V2 high-end headset PPS12 drivers Bluetooth-compatible wireless headphones with microphone for phones.', 70, 5, 'Bluedio V2 headset.jpg', 1, 1),
(3, 'Bluetooth Earphones Charging-Box', 'TWS Bluetooth 5.0 Earphones 400mAh Charging Box Wireless Headphone HIFI Sound Sports Waterproof Earbuds Headsets With Microphone.', 35, 8.5, 'Bluetooth Earphones Charging-Box.jpg', 1, 1),
(4, 'Headphones Neckband', 'Headphones Neckband, waterproof, battery 4400 mh work perfectly for all sports.', 48, 6, 'Headphones Neckband.jpg', 1, 1),
(5, 'Ipx7 Waterproof', 'TWS Bluetooth Earphones 2200mAh Charging Box Wireless Headphone Fone Stereo Wireless Headset with Mic Sports Waterproof Earbuds.', 55, 3, 'Ipx7 Waterproof.jpg', 1, 1),
(6, 'Oneodio Wired Headphones', 'Oneodio Wired Professional Studio Pro DJ Headphones With Microphone Over Ear HiFi Monitor Music Headset Earphone For Phone PC.', 45, 12, 'Oneodio Wired Headphones.jpg', 1, 1),
(7, 'shuoer S12', 'shuoer S12 |14.8mm Planar Magnetic Driver IEM Hi-Fi Earphones with Silver Plated Monocrystalline Copper Cable 3.5mm Headphones.', 100, 2.5, 'shuoer S12.jpg', 1, 1),
(8, 'Small earbuds', 'TWS Wireless Invisible bluetooth headset Mini No Pain Micro Semi-In-Ear Handfree Small earbuds Stereo Gaming Earphones For Xiaom.', 20, 6.8, 'Small earbuds.jpg', 1, 1),
(9, 'TWS Wireless Headphones', 'Newest TWS Wireless Headphones HIFI Sound Bluetooth Earphone Noise Reduction Sport Headset IPX7 Waterproof Earbuds With Dual Mic.', 62, 11.9, 'TWS Wireless Headphones.jpg', 1, 1),
(10, 'Alarm Clock Speaker', 'Digital Alarm Clock Bluetooth Speaker with Wireless Charging Temperature and Humidity Function', 65, 20, 'Alarm Clock Speaker.jpg', 1, 3),
(11, 'Bulldog Speaker', 'Portable Bluetooth Speaker 3D Model Speaker M11 Bulldog Speaker 2.0 Creative Cartoon Dog Outdoor Speaker Computer Speaker', 26, 9, 'Bulldog Speaker.jpg', 1, 3),
(12, '2M Cable iPhone', '2M Charging Cable For iPhone 13 12 Pro 6S 6 7 8 Plus 11 Pro 12 Pro XS Max X XR SE 2020 ipad Data Sync Charge Line Cord', 79, 1, '2M Cable iPhone.jpg', 1, 2),
(13, '5A USB C', '5A USB C to USB Type C Cable QC 3.0 fast Charging cable For Samsung Xiaomi Huawei Mobile Phone USB-C Cord Quick Charging Cable', 56, 1.5, '5A USB C.jpg', 1, 2),
(15, '6A 3 in 1 SuperCharging', '6A 3 in 1 SuperCharging Cable Micro USB Type-C Fast Charger Micro USB Type-C Data Cable For iPhone 14 13 Samsung Xiaomi Huawei\r\n', 40, 3, '6A 3 in 1 SuperCharging.jpg', 1, 2),
(16, '7A USB Type C', '7A USB Type C Super-Fast Charge Cable for Huawei P40 P30 Mate 40 USB Fast Charing Data Cord for Xiaomi Mi 12 Pro Oneplus Realme', 18, 2.5, '7A USB Type C.jpg', 1, 2),
(17, 'Baseus 100W USB C', 'Baseus 100W USB C To USB Type C Cable USBC PD Fast Charging Charger Cord USB-C 5A TypeC Cable 2M For Macbook Samsung Xiaomi POCO', 15, 2, 'Baseus 100W USB C.jpg', 1, 2),
(18, 'Anti theft Case', 'Anti-theft Leather Wallet Case For Samsung Galaxy A10 A20 A30 A50 A70 A11 A21S A31 A51 A71 A02S A03S A03 Core Flip Phone Cover', 25, 3, 'Anti theft Case.jpg', 1, 4),
(19, 'Flip leather Case', 'Flip leather Case for Iphone 13 12 Mini 11 Pro Max Case For Apple Iphone XR XS Max SE 2020 5 6 6s 7 8 Plus Carcasa Coque Cover', 60, 5, 'Flip leather Case.jpg', 1, 4),
(20, 'Luxury Mirror Cover', 'Luxury Smart Mirror Phone cover For iPhone 13 11 12 Pro Max Mini 8 7 6 6s Plus XR X Xs Max SE 2020 support Flip Protective case', 33, 4, 'Luxury Mirror Cover.jpg', 1, 4),
(21, 'Night Light', 'Night Light Bluetooth Speaker Wireless Portable Mini Player Touch Pat Light Colorful LED Bedside Table Lamp For Bedroom Outdoor', 10, 15, 'Night Light.jpg', 1, 3),
(22, 'TWS Mini Speaker', 'TWS Mini Wireless Bluetooth Speaker Portable Built-in Battery Loud Sound Strong Bass Metal Sport Portable Subwoofer Music Player', 40, 8, 'TWS Mini Speaker.jpg', 1, 3),
(23, 'Extension Cable Male To Female', 'USB Extension Cable USB 2.0 Extension Cable Male To Female Data Cable Suitable for PC TV USB Mobile Hard Disk Cable', 25, 1.4, 'Extension Cable Male To Female.jpg', 1, 2),
(24, 'Kebiss Mini USB', 'Kebiss Mini USB Cable Mini USB to USB Fast Data Charger Cable for MP3 MP4 Player Car DVR GPS Digital Camera HDD Mini USB', 40, 2.2, 'Kebiss Mini USB.jpg', 1, 2),
(25, 'KEYSION Magnetic', 'KEYSION LED Magnetic USB Cable Fast Charging Type C Cable Magnet Charger Data Charge Micro USB Cable Mobile Phone Cable USB Cord', 25, 2.6, 'KEYSION Magnetic Cable.jpg', 1, 2),
(26, 'Ultra Thin Case', 'Ultra Thin Hard Case For Samsung Galaxy S20 Fe S21 Note 20 Ultra 9 8 10 S9 S8 Plus S10e Lite Matte Solid Color Back Case Cover', 22, 2, 'Ultra Thin Case.jpg', 1, 4),
(27, 'X5 Lite Cover', 'For OPPO Find X5 Lite Case Cover OPPO Find X5 Lite Capas Back Bumper Shockproof Back TPU Soft Cover For OPPO Find X5 Lite Fundas', 27, 3, 'X5 Lite Cover.jpg', 1, 4),
(28, 'Baseus Cable iPhone', 'Baseus USB Cable for iPhone14 13 12 11 Pro Max Xs X 8 Plus Cable 2.4A Fast Charging Cable for iPhone Charger Cable USB Data Line', 48, 3, 'Baseus Cable iPhone.jpg', 1, 2),
(29, 'PZOZ Cable Iphone', 'PZOZ Usb Cable For iphone cable 14 13 12 11 pro max Xs Xr X SE 8 7 6s plus ipad air mini fast charging cable For iphone charger', 41, 2, 'PZOZ Cable Iphone.jpg', 1, 2),
(30, 'Waterproof Subwoofer', 'Waterproof Subwoofer Portable Bluetooth Wireless Speaker Surround Loudspeaker TF Card AUX FM Radio Sound Box TWS USB Flash Drive', 18, 30, 'Waterproof Subwoofer.jpg', 1, 3),
(31, 'Cable 90 Degree', 'QGEEM USB Type C Cable For Samsung Note 8 S8 Xiaomi Mi 90 Degree Cell Phone Type C Cable Fast Charging Cable USB C Charger Cable', 25, 3.1, 'Cable 90 Degree.jpg', 1, 2),
(32, 'Lenovo Earphone', 'Original Lenovo LP1S TWS Earphone Wireless Bluetooth 5.0 Headphones Waterproof Sport Headsets Noise Reduction Earbuds with Mic', 48, 16, 'Lenovo Earphone Bluetooth.jpg', 1, 1),
(35, 'JBL Speaker', 'JBL Flip 6 Powerful Bluetooth Speaker Portable Wireless Waterproof Partybox Music Boombox For Jbl Filp 6 Charge 4 BT5.1 Speakers', 50, 21, 'JBL Speaker.jpg', 1, 3),
(36, 'Tws Wireless ', 'Tws Wireless Earphone Bluetooth 5.1Motion Noise Reduction Earphone with Mic Touch Stereo Earphone for Apple Android Phone', 35, 6, 'Tws Wireless .jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `f_name`, `l_name`, `email`, `password`, `country`, `city`, `adress`, `contact`) VALUES
(2, 'Habib', 'karam', 'habib.bachaalany@gmail.com', 'habib123', 'Lebanon', 'mazraat yachouh', 'rue saint maron,immeuble abdallah el samia', '+96171900834'),
(4, 'Habib', 'Bachaalany', 'habib.bachaalany2020@gmail.com', 'Habib12345', 'Lebanon', 'mazraat yachouh', 'rue saint maron,immeuble abdallah el samia', '+5646545623454'),
(5, 'Habib', 'Bachaalany', 'habib.bachaalany2022@gmail.com', 'Habib123', 'Lebanon', 'mazraat yachouh', 'rue saint maron,immeuble abdallah el samia', '+8465'),
(6, 'joseph', 'karam', 'josephdfj@gmail.com', 'Joseph123', 'lebanon', 'bikfaya', 'rue cnam', '+9617856230'),
(7, 'roy', 'zgheib', 'royz_z8eib2022@gmail.com', 'Z8eib123', 'france', 'paris', 'rue du chateau, immeuble dupont', '+256465465'),
(8, 'joseph', 'hajj', 'joseph.hajj@gmail.com', 'Joseph123', 'lebanon', 'bickfaua', 'rue du chateau', '+96170123456'),
(9, 'tony', 'karam', 'tony.karam@gmail.com', 'Tony123', 'Lebanon', 'beirut', ',immeuble karam,rue 21', '+4846546546');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_pro` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ord_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `det_order` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `det_product` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id_pro`),
  ADD CONSTRAINT `det_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
