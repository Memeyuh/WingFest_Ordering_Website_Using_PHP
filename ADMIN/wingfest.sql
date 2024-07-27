-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wingfest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `pwd` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE `categ` (
  `CID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('Visible','Hidden') NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categ`
--

INSERT INTO `categ` (`CID`, `name`, `slug`, `description`, `status`, `last_modified`) VALUES
(1, 'Wings', 'wings', 'Variety of flavorful chicken wings', 'Visible', '2023-07-15 20:25:40'),
(2, 'Pasta', 'pasta', 'Selection of mouthwatering pasta noodles', 'Visible', '2023-07-13 16:11:36'),
(3, 'Sides', 'sides', 'Combination of different side dishes', 'Visible', '2023-07-13 16:12:02'),
(6, 'Drinks', 'drinks', 'Beverages to freshen up your day', 'Visible', '2023-07-14 04:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OID` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `UID` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` double NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `status` enum('Delivered','Pending','Cancelled') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OID`, `tracking_no`, `UID`, `uname`, `contact`, `address`, `total_price`, `payment_mode`, `payment_id`, `status`, `created_at`) VALUES
(1, 'SAIDJWQIDDF91238', 1, 'richB', '0912-345-6789', '357 Sesame St. Caloocan City', 1200, 'COD', NULL, 'Pending', '2023-07-16 07:02:13'),
(4, 'ASDS9Z9SD224213', 3, 'machaluver', '0928-129-2984', '2931 Utopia Villaroza, Quezon City', 300, 'GCASH', NULL, 'Cancelled', '2023-07-16 07:05:10'),
(5, 'IASD9S012JDKAVCM', 9, 'lalapot', '0912-234-1234', '038 Harmony Hills, Bulacan', 902, 'GCASH', NULL, 'Pending', '2023-07-16 06:58:56'),
(7, 'AKSMX929SAO129', 8, 'junieboy', '0984-984-2147', '1293 Appleville, Caloocan City', 125, 'COD', NULL, 'Delivered', '2023-07-16 07:04:54'),
(8, '2023039SDSAAKS0O', 4, 'hansg', '0928-129-2984', '123 Banana St. Caloocan City', 210, 'BANK', NULL, 'Delivered', '2023-06-22 07:03:02'),
(9, '23SD2SDFGODOZC91', 3, 'machaluver', '0928-129-2984', '2931 Utopia Villaroza, Quezon City', 190, 'COD', NULL, 'Pending', '2023-07-16 07:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `user_ordersID` int(11) NOT NULL,
  `OID` int(11) NOT NULL,
  `Prod_ID` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`user_ordersID`, `OID`, `Prod_ID`, `price`, `quantity`) VALUES
(1, 2, 4, 660, 2),
(2, 3, 17, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Prod_ID` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Prod_ID`, `Product_name`, `Category`, `quantity`, `Price`, `Description`, `image`) VALUES
(1, 'Honey Glazed Wings', 'Wings', 7, 250, 'This honey chicken is cooked in a sticky-sweet sauce of honey, soy sauce, and red pepper flakes for a delicious glazed chicken experience.', 'korean-fried-chicken-bonchon-chicken-buffalo-wing-chicken-fried-chicken-removebg-preview.png'),
(2, 'Garlic Parmesan Wings', 'Wings', 5, 380, 'Deep fried chicken wings coated with a crispy garlic coating seasoned with garlic and Parmesan cheese infused with butter, topped with more Parmesan cheese.', 'Garlic-Parmesan-Wings_-11-removebg-preview.png'),
(3, 'Buffalo Wings', 'Wings', 5, 330, 'Deep-fried chicken wings, slathered in spicy sauce and served with blue cheese dressing and raw celery and carrots.', '150-1508295_menu-hooters-wings-removebg-preview.png'),
(4, 'Soy Garlic Wings', 'Wings', 5, 330, 'Soy garlic ginger chicken wings are a sticky, sweet and flavorful appetizer infused with soy, ginger, and garlic marinade.', '14-142416_hooters-chicken-wings-food-png-removebg-preview.png'),
(5, 'Original Wings', 'Wings', 5, 300, 'Fresh chicken wings that are marinated in buttermilk, then coated in seasoned flour and deep fried to golden brown perfection.', 'png-clipart-fried-chicken-on-round-white-plate-buffalo-wing-crispy-fried-chicken-chicken-fingers-chicken-fried-steak-fried-chicken-buffalo-wing-crispy-fried-chicken-removebg-preview.png'),
(6, 'Spaghetti', 'Pasta', 5, 100, 'Perfectly cooked spaghetti topped with tangy tomato sauce pairs with blended herbs and spices.', 'Spaghetti-in-dish-isolated-on-transparent-background-PNG-removebg-preview.png'),
(7, 'Carbonara', 'Pasta', 5, 100, 'Spaghetti in an indulgent and creamy sauce made with egg yolk and Grana Padano, with smoked back bacon and a touch of parsley.', 'kisspng-carbonara-bolognese-sauce-pasta-italian-cuisine-cr-5d0eb63eee1126.6784945415612452469751-removebg-preview.png'),
(8, 'Italian Pesto', 'Pasta', 5, 165, 'A pasta topped with a flavorful sauce made of basil, extra-virgin olive oil, parmesan cheese, pecorino cheese, pine nuts, garlic and salt', 'plate-with-tasty-pesto-pasta-on-white-background-T9XPDK-removebg-preview.png'),
(9, 'Creamy Lasagna', 'Pasta', 8, 195, 'A rich and creamy whole-wheat pasta dish with refreshingly fresh onions and garlic, lathered in a succulent sauce and topped with mozzarella.', 'italian-food-lasagna-pasta-plate-hd-transparent-png-11676754455nktxbaygtc-removebg-preview.png'),
(10, 'Mac and Cheese', 'Pasta', 5, 150, 'A classic macaroni and cheese recipe featuring a special blend of cheeses including Parmesan, Cheddar, and Romano.', '09b25bca-f931-4a25-8234-e67b01b0bf65-removebg-preview.png'),
(11, 'Crispy French Fries', 'Sides', 5, 90, 'Piping-hot french fries, made from deep fried potatoes crispy and made flavorful with special seasoning.', 'hd-plate-of-french-fries-with-ketchup-and-mayo-png-11646352372qxme1nhqyl-removebg-preview.png'),
(12, 'Mozzarella Sticks', 'Sides', 5, 120, 'Sticks of mozzarella cheese that are coated in seasoned Italian breadcrumbs, then deep fried until golden brown.', '360_F_189346821_UT9mYX9iqgReUcC26kVy3PZzRH3rAPbU-removebg-preview.png'),
(13, 'Crispy Nachos', 'Sides', 5, 100, 'Fresh corn tortilla chips layered with homemade queso, piled high and topped with Monterey jack and Cheddar cheeses', 'round-isolated-plate-of-delicious-nachos-salsa-and-guacamole-over-KR3X0T-removebg-preview.png'),
(14, 'Crispy Hash Brown', 'Sides', 5, 40, 'Finely julienned potatoes that have been fried until golden browned', 'istockphoto-466481889-612x612-removebg-preview.png'),
(15, 'Coca cola', 'Drinks', 5, 30, 'Fizzy and thirst-quenching soda served with cold ice', 'fizzy-drinks-coca-cola-rum-and-coke-ice-cube-coca-cola-removebg-preview-removebg-preview.png'),
(16, 'Orange Juice', 'Drinks', 5, 45, 'A classic source of Vitamin C that is good any time of day. Made with fresh squeezed oranges.', 'Screenshot_2023-07-13_155507-removebg-preview__1_-removebg-preview.png'),
(17, 'Lemon Juice', 'Drinks', 5, 45, 'A simple, refreshing, and healthy drink loaded with bright and lemony flavor', 'Screenshot_2023-07-13_155507-removebg-preview__1_-removebg-preview.png'),
(18, 'U-Berry Shake', 'Drinks', 5, 100, 'A wonderful mix of blended fresh strawberries, banana, blueberries, blackberries, and raspberry. ', 'png-transparent-clear-glass-drinking-cup-filled-with-strawberries-shake-illustration-smoothie-milkshake-juice-health-shake-fruit-strawberries-with-strawberry-juice-food-blueberry-grape-juice-thumbnail (1).png'),
(19, 'Royal Milktea', 'Drinks', 5, 85, 'A cold, frothy drink made with a tea base shaken with flavors, sweeteners and milk with tapioca pearls.', 'pngtree-delicious-milk-tea-pearls-png-image_6682125-removebg-preview-removebg-preview-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(33) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(33) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `fname`, `lname`, `address`, `birthdate`, `age`, `contact`, `email`, `gender`, `uname`, `pwd`) VALUES
(1, 'Rich', 'Beach', '357 Sesame St. Caloocan City', '1997-01-16', 26, '0912-345-6789', 'richb@gmail.com', 'male', 'richB', '1234'),
(2, 'Johnny', 'Brabs', '246 East Blue, Valenzuela City', '2002-05-24', 21, '0982-841-2924', 'jBrabs@gmail.com', 'male', 'jBrabs', 'bravo'),
(3, 'Macha', 'Cappa', '2931 Utopia Villaroza, Quezon City', '1998-12-28', 24, '0928-129-2984', 'macha.cappa@gmail.com', 'female', 'machaluver', 'machaislumot'),
(4, 'Hansel', 'Gretel', '123 Banana St. Caloocan City', '2000-02-09', 23, '0928-129-2984', 'hanselgretel@gmail.com', 'male', 'hansg', '123'),
(8, 'Junie', 'Boy', '1293 Appleville, Caloocan City', '1970-03-05', 53, '0984-984-2147', 'junieboy@gmail.com', 'male', 'junieboy', '1234'),
(9, 'Lala', 'Potter', '038 Harmony Hills, Bulacan', '2003-05-29', 20, '0912-234-1234', 'lalapotter@gmail.com', 'female', 'lalapot', '0987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`user_ordersID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Prod_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categ`
--
ALTER TABLE `categ`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `user_ordersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
