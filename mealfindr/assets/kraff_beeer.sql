-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2018 at 11:54 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kraff_beeer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Beer Type 1'),
(2, 'Beer Type 2'),
(3, 'Beer Type 3'),
(4, 'Beer Type 4'),
(5, 'Beer Type 5'),
(6, 'Beer Type 6');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_name`, `price`, `description`, `stocks`, `category_id`, `image`) VALUES
(1, 'Cerveza Negra', '200.00', 'Cerveza Negra, a full-bodied dark lager with rich caramel tones made from roasted pilsen malt from Europe and other top quality ingredients. The right balance of bitterness and sweetness, and a creamy, frothy head entice drinkers to soak in its unique fla', 0, 1, 'https://lorempixel.com/300/300/'),
(2, 'San Mig Light', '300.25', 'San Mig Light is the country\'s leading low calorie beer with only 100 calories per 330ml serving. That\'s why you\'ll feel so light as you enjoy its full beer flavor that hits just right.', 0, 3, 'https://lorempixel.com/300/300/'),
(3, 'Gold Eagle Beer', '400.10', 'The ultimate reward to a hard day\'s work is Gold Eagle Beer. It is moderately light bodied, yet flavorful, hopped just enough to give a little bite on the finish bringing out an over-all character. Relax and enjoy the moment with this beer. Its alcohol co', 0, 3, 'https://lorempixel.com/300/300/'),
(4, 'Brew Kettle', '500.00', 'Brew Kettle Belgian Witbier Style Beer is an aromatic and refreshing brew with hints of white wheat and orange, giving it a crisp and smooth taste. Light-bodied and easy to drink, garnish your bottle of Brew Kettle with an orange slice and savor that full', 0, 4, 'https://lorempixel.com/300/300/'),
(5, 'Fat Pauly\'s Ales & Lagers', '600.21', 'Fat Pauly\'s Hand-crafted Ales & Lagers is a proud local brand that makes fresh home-brewed beers using both the finest imported brew grade malt and some local indegenous ingredients such as Timoga Spring waters, and wild Putyukan Honey.', 0, 5, 'https://lorempixel.com/300/300/');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `image`, `username`, `password`, `first_name`, `last_name`, `address`, `contact`, `role_id`) VALUES
(1, 'lolo@gmail.com', 'http://lorempixel.com/300/300', 'lolo', 'lola', 'Juan', 'Dela Cruz', 'Mandaluyong City', '09997785468', 2),
(2, 'admin@yahoo.com', 'http://lorempixel.com/300/300', 'admino', 'admin', 'Juan', 'Dela Cruz', 'Mandaluyong City', '09997785468', 1),
(3, 'lala@yahoo.com', 'http://lorempixel.com/300/300', 'gandarapark', 'lalala', 'Juan', 'Dela Cruz', 'Mandaluyong City', '09997785468', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_fk0` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`),
  ADD KEY `orders_fk0` (`status_id`),
  ADD KEY `orders_fk1` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_fk0` (`item_id`),
  ADD KEY `order_items_fk1` (`order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_fk0` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_fk0` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
