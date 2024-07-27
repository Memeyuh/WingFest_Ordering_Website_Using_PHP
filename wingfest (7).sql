-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 07:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
-- Table structure for table `acart`
--

CREATE TABLE `acart` (
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Total` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acart`
--

INSERT INTO `acart` (`CID`, `UID`, `PID`, `Product_name`, `Price`, `Quantity`, `Total`) VALUES
(3, 1, 3, 'Buffalo Wings', 400, 2, 800);

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `citem_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`citem_id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`) VALUES
(71, 'Royal Milktea', '85', 'image/F19.PNG', 1, '85'),
(72, 'Buffalo Wings', '330', 'image/F3.PNG', 2, '660'),
(73, 'Garlic Parmesan Wings', '380', 'image/F2.PNG', 1, '380'),
(74, 'Honey Glazed Wings', '350', 'image/F1.PNG', 1, '350'),
(75, 'Soy Garlic Wings', '330', 'image/F4.PNG', 1, '330'),
(76, 'Italian Pesto', '165', 'image/F8.PNG', 1, '165'),
(77, 'Crispy French Fries', '80', 'image/F11.PNG', 1, '80'),
(78, 'U-Berry Shake', '100', 'image/F18.PNG', 1, '100');

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
(6, 'Drinks', 'drinks', 'Beverages to freshen up your day', 'Visible', '2023-07-14 04:29:02'),
(11, 'Salad', 'Salad', 'Mix of vegetables', 'Visible', '2023-07-19 02:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`CID`, `UID`, `PID`, `Product_name`, `Price`, `Quantity`, `Total`, `created_at`) VALUES
(1, 9, 3, 'Buffalo Wings', 430, 1, 430, '2023-07-18 21:07:16'),
(2, 9, 17, 'Lemon Juice', 45, 1, 45, '2023-07-18 21:07:16'),
(3, 9, 16, 'Orange Juice', 45, 5, 225, '2023-07-18 21:07:16'),
(4, 9, 15, 'Coca cola', 30, 1, 30, '2023-07-18 21:07:16'),
(5, 9, 16, 'Orange Juice', 45, 10, 450, '2023-07-18 21:07:16'),
(6, 9, 10, 'Mac and Cheese', 150, 1, 150, '2023-07-18 21:07:16'),
(7, 9, 4, 'Soy Garlic Wings', 330, 1, 330, '2023-07-18 21:07:16'),
(8, 8, 3, 'Buffalo Wings', 430, 6, 2580, '2023-07-19 03:41:03'),
(9, 8, 17, 'Lemon Juice', 45, 3, 135, '2023-07-19 03:41:30'),
(10, 8, 18, 'U-Berry Shake', 100, 1, 100, '2023-07-19 03:41:35'),
(11, 8, 8, 'Italian Pesto', 165, 1, 165, '2023-07-19 03:41:39');

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
(9, '23SD2SDFGODOZC91', 3, 'machaluver', '0928-129-2984', '2931 Utopia Villaroza, Quezon City', 190, 'COD', NULL, 'Pending', '2023-07-16 07:10:49'),
(10, '64b590ff6f845', 9, 'lalapot', '09122341234', 'Carbonara(1), Crispy Hash Brown(1), Buffalo Wings(3), Buffalo Wings(1), Garlic Parmesan Wings(1)', 1800, 'cod', NULL, 'Delivered', '2023-07-18 02:17:25'),
(11, '64b5fa471f3aa', 8, 'junieboy', '09849842147', '199 sesame st. bukidnon philippines', 710, 'netbanking', NULL, 'Pending', '2023-07-18 02:34:47'),
(12, '64b5ff0182620', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'cod', NULL, 'Pending', '2023-07-18 02:54:57'),
(13, '64b5ff0cb8701', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'cod', NULL, 'Pending', '2023-07-18 02:55:08'),
(14, '64b6000c30242', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'cod', NULL, 'Pending', '2023-07-18 02:59:24'),
(15, '64b6007778197', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'cod', NULL, 'Pending', '2023-07-18 03:01:11'),
(16, '64b6008c1e25f', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'netbanking', NULL, 'Pending', '2023-07-18 03:01:32'),
(17, '64b600cf678ae', 9, 'lalapot', '09122341234', 'Miles Stone Village, Karuhatan\r\nValenzuela City, Philippines', 330, 'netbanking', NULL, 'Pending', '2023-07-18 03:02:39'),
(20, '64b689e695335', 8, 'junieboy', '09849842147', 'Karuhatan Valenzuela City BRGY 79 Philippines', 1320, 'cod', NULL, 'Pending', '2023-07-18 12:47:34'),
(31, '64b6fb8038cb2', 9, 'lalapot', '09122341234', '038 Harmony Hills, Bulacan', 300, 'DEBIT/CREDIT', NULL, 'Pending', '2023-07-18 20:52:16'),
(32, '64b6fc8c39495', 9, 'lalapot', '09122341234', 'sesame st', 450, 'COD', NULL, 'Pending', '2023-07-18 20:56:44'),
(33, '64b6fe55c279e', 9, 'lalapot', '09122341234', '038 Harmony Hills, Bulacan', 150, 'COD', NULL, 'Pending', '2023-07-18 21:04:21'),
(34, '64b6ff0437d19', 9, 'lalapot', '09122341234', '038 Harmony Hills, Bulacan', 330, 'COD', NULL, 'Pending', '2023-07-18 21:07:16'),
(35, '64b75b8eef76c', 8, 'junieboy', '09849842147', 'caloocan city', 400, 'GCASH', NULL, 'Pending', '2023-07-19 03:42:06');

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
(3, 'Buffalo Wings', 'Wings', 15, 430, 'Deep-fried chicken wings, slathered in spicy sauce and served with blue cheese dressing and raw celery and carrots.', 'F3.png'),
(4, 'Soy Garlic Wings', 'Wings', 5, 330, 'Soy garlic ginger chicken wings are a sticky, sweet and flavorful appetizer infused with soy, ginger, and garlic marinade.', '14-142416_hooters-chicken-wings-food-png-removebg-preview.png'),
(5, 'Original Wings', 'Wings', 5, 300, 'Fresh chicken wings that are marinated in buttermilk, then coated in seasoned flour and deep fried to golden brown perfection.', 'png-clipart-fried-chicken-on-round-white-plate-buffalo-wing-crispy-fried-chicken-chicken-fingers-chicken-fried-steak-fried-chicken-buffalo-wing-crispy-fried-chicken-removebg-preview.png'),
(6, 'Spaghetti', 'Pasta', 5, 100, 'Perfectly cooked spaghetti topped with tangy tomato sauce pairs with blended herbs and spices.', 'Spaghetti-in-dish-isolated-on-transparent-background-PNG-removebg-preview.png'),
(8, 'Italian Pesto', 'Pasta', 5, 165, 'A pasta topped with a flavorful sauce made of basil, extra-virgin olive oil, parmesan cheese, pecorino cheese, pine nuts, garlic and salt', 'plate-with-tasty-pesto-pasta-on-white-background-T9XPDK-removebg-preview.png'),
(9, 'Creamy Lasagna', 'Pasta', 8, 195, 'A rich and creamy whole-wheat pasta dish with refreshingly fresh onions and garlic, lathered in a succulent sauce and topped with mozzarella.', 'italian-food-lasagna-pasta-plate-hd-transparent-png-11676754455nktxbaygtc-removebg-preview.png'),
(10, 'Mac and Cheese', 'Pasta', 5, 150, 'A classic macaroni and cheese recipe featuring a special blend of cheeses including Parmesan, Cheddar, and Romano.', '09b25bca-f931-4a25-8234-e67b01b0bf65-removebg-preview.png'),
(11, 'Crispy French Fries', 'Sides', 5, 90, 'Piping-hot french fries, made from deep fried potatoes crispy and made flavorful with special seasoning.', 'hd-plate-of-french-fries-with-ketchup-and-mayo-png-11646352372qxme1nhqyl-removebg-preview.png'),
(12, 'Mozzarella Sticks', 'Sides', 5, 120, 'Sticks of mozzarella cheese that are coated in seasoned Italian breadcrumbs, then deep fried until golden brown.', '360_F_189346821_UT9mYX9iqgReUcC26kVy3PZzRH3rAPbU-removebg-preview.png'),
(13, 'Crispy Nachos', 'Sides', 5, 100, 'Fresh corn tortilla chips layered with homemade queso, piled high and topped with Monterey jack and Cheddar cheeses', 'round-isolated-plate-of-delicious-nachos-salsa-and-guacamole-over-KR3X0T-removebg-preview.png'),
(14, 'Crispy Hash Brown', 'Sides', 5, 40, 'Finely julienned potatoes that have been fried until golden browned', 'istockphoto-466481889-612x612-removebg-preview.png'),
(15, 'Coca cola', 'Drinks', 5, 30, 'Fizzy and thirst-quenching soda served with cold ice', 'fizzy-drinks-coca-cola-rum-and-coke-ice-cube-coca-cola-removebg-preview-removebg-preview.png'),
(16, 'Orange Juice', 'Drinks', 5, 45, 'A classic source of Vitamin C that is good any time of day. Made with fresh squeezed oranges.', 'Screenshot_2023-07-13_155507-removebg-preview__1_-removebg-preview.png'),
(17, 'Lemon Juice', 'Drinks', 5, 45, 'A simple, refreshing, and healthy drink loaded with bright and lemony flavor', 'cranberry-juice-lemonade-fizzy-drinks-gyro-lemonade-removebg-preview-removebg-preview.png'),
(18, 'U-Berry Shake', 'Drinks', 5, 100, 'A wonderful mix of blended fresh strawberries, banana, blueberries, blackberries, and raspberry. ', 'png-transparent-clear-glass-drinking-cup-filled-with-strawberries-shake-illustration-smoothie-milkshake-juice-health-shake-fruit-strawberries-with-strawberry-juice-food-blueberry-grape-juice-thumbnail (1).png'),
(19, 'Royal Milktea', 'Drinks', 5, 85, 'A cold, frothy drink made with a tea base shaken with flavors, sweeteners and milk with tapioca pearls.', 'pngtree-delicious-milk-tea-pearls-png-image_6682125-removebg-preview-removebg-preview-removebg-preview.png'),
(20, 'Mashed Potatoes', 'Sides', 40, 35, 'a dish made by mashing boiled or steamed potatoes,', 'Sous_vide_mashed_potatoes-removebg-preview.png'),
(33, 'Newdrink', 'Drinks', 8, 100, 'Lemonade', 'F13.png');

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
(1, 'Rich', 'Beach', '357 Sesame St. Caloocan City', '1997-01-16', 26, '09123456789', 'richb@gmail.com', 'male', 'richB', '1234'),
(2, 'Johnny', 'Brabs', '246 East Blue, Valenzuela City', '2002-05-24', 21, '09828412924', 'jBrabs@gmail.com', 'male', 'jBrabs', 'bravo'),
(3, 'Macha', 'Cappa', '2931 Utopia Villaroza, Quezon City', '1998-12-28', 24, '09281292984', 'macha.cappa@gmail.com', 'female', 'machaluver', 'machaislumot'),
(4, 'Hansel', 'Gretel', '123 Banana St. Caloocan City', '2000-02-09', 23, '09281292984', 'hanselgretel@gmail.com', 'male', 'hansg', '123'),
(8, 'Junie', 'Boy', '1293 Appleville, Caloocan City', '1970-03-05', 53, '09849842147', 'junieboy@gmail.com', 'male', 'junieboy', 'juniejunie'),
(9, 'Lala', 'Potter', '038 Harmony Hills, Bulacan', '2003-05-29', 20, '09122341234', 'lalapotter@gmail.com', 'female', 'lalapot', '0987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acart`
--
ALTER TABLE `acart`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`citem_id`);

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `checked`
--
ALTER TABLE `checked`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OID`);

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
-- AUTO_INCREMENT for table `acart`
--
ALTER TABLE `acart`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `citem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `categ`
--
ALTER TABLE `categ`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `checked`
--
ALTER TABLE `checked`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
