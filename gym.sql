-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 01:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_username`, `admin_password`) VALUES
(1, 'adminJoros', 'admin1'),
(2, 'adminAlex', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_weight` decimal(6,2) DEFAULT NULL,
  `product_picture` varchar(1000) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_weight`, `product_picture`, `product_desc`) VALUES
(1, 'Miracle Whey Protein Powder | Dr Mercola | Or', '11.50', '10.00', 'https://cdn.shopify.com/s/files/1/1606/5505/products/DrMercola_Miracle_Whey_Protein_Powder_Original_1024x1024.jpg?v=1575472141', ''),
(2, 'Schildkröt dumbbells', '20.00', '2.00', 'https://pngimg.com/uploads/dumbbell/dumbbell_PNG16396.png', 'Egyszerű 2 kilós egykezes súlyzó'),
(3, 'Creatine Monohydrate', '11.50', '0.50', 'https://shop.builder.hu/images/product_images/846_108953722b14.png', 'A táplálékkiegészítők piacán nem volt még egy olyan robbanás, mint amit a kreatin betörésekor tapasztalhattunk. Nem is véletlenül. Nincs még egy kiegészítő, ami olyan érezhető és látható hatást produk'),
(4, '100% Whey Protein Professional', '8.75', '2.35', 'https://shop.builder.hu/images/product_images/5146_6d192fd1809d.png', 'Nincs az az építkezés, ami haladna építőanyag hiányában. Tégla nélkül nem tudsz falazni. Az izmoknak is van építőanyaguk. Ez pedig a fehérje. Fehérje nélkül nincs izomépítés. Ha pedig azt akarod, hogy a falak hamar álljanak, akkor muszáj jó minőségű építőanyagot használnod, különben az építkezés sem fog hatékonyan haladni. Nincs ez másképpen az izmaiddal sem. Akkor fogsz a lehető leghamarabb célt érni, ha minőségi fehérjét használsz. Ez ilyen egyszerű.'),
(5, 'Protein Power (4 kg)', '39.79', '4.00', 'https://shop.builder.hu/images/product_images/8668_d492337d9a82.png', 'Nincs az az építkezés, ami haladna építőanyag hiányában. Tégla nélkül nem tudsz falazni. Az izmoknak is van építőanyaguk. Ez pedig a fehérje. Fehérje nélkül nincs izomépítés. Amennyiben nem veszel magadhoz elegendő mennyiségű és minőségű fehérjét, az izmaid nem fognak fejlődni.'),
(6, 'Wave Shaker', '1.69', '0.10', 'https://shop.builder.hu/images/product_images/10996_8f2f24fb9d60.png', 'BioTechUSA keverőpalack. Könnyen rögzíthető, felcsavarható tetővel, amely nem válik le mixelés közben. Változatos színekben. BPA mentes.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birth` date NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `first_name`, `last_name`, `email`, `birth`, `password`) VALUES
(1, 'Joros', 'Norbert', 'Majoros', 'majorosnorbert99@gmail.com', '1999-04-13', 'd41d8cd98f00b204e9800998ecf8427e'),
(2, 'fejes', 'Alex', 'Fejes', 'tomzonka1@gmail.com', '1999-06-08', '844d661fbb13674266c714c11b0944d7'),
(3, 'majoros', 'Norbert', 'Majoros', 'norbi0413@gmail.com', '1999-04-13', 'd4a2de6a12af96a04837385f4fdb4863');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `USER_FK` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
