-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 03:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'InterWood'),
(2, 'Chenone homes'),
(3, 'Habitt'),
(4, 'Index Furniture'),
(5, 'example');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL,
  `size_name` text DEFAULT NULL,
  `color_name` text DEFAULT NULL,
  `finishing_item` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `product_name`, `qty`, `price`, `image`, `size_name`, `color_name`, `finishing_item`) VALUES
(25, 3, 59, 'LONDON CHESTERFIELD SOFA BED', 1, 3328, 'london_chesterfield-600x326.png', '3 SEAT SOFA BED', 'Lana Plum', 'PLEATED BORDER');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Restopedic Sofas'),
(2, 'Corner Sofas'),
(3, 'Sofas'),
(4, 'Chairs'),
(5, 'Stools & Chaise Lounges'),
(6, 'Popular'),
(7, 'Glass furniture'),
(8, 'In Stock'),
(9, 'Sofa Beds');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `category_id`, `image`) VALUES
(7, 'House Boucle Ivory2', 2, 'coaster2.jpg'),
(9, 'asdsadasd', 3, 'London_Chesterfield_Sofa-1024x556.png'),
(10, 'House Boucle Ivory', 6, 'everest-ivory-1-150x150.png'),
(11, 'House Boucle Grey', 6, 'EVEREST-GREY-1-150x150.jpg'),
(12, 'Antique Red', 7, 'Antique-Red-150x150.jpg'),
(13, 'Antique Olive', 7, 'house_antique_olive-150x150.jpg'),
(14, 'Lana Denim', 8, 'lana-denim-3-150x150.png'),
(15, 'Lana Plum', 8, 'lana-plum-3-150x150.png');

-- --------------------------------------------------------

--
-- Table structure for table `finishing_categories`
--

CREATE TABLE `finishing_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `finishing_categories`
--

INSERT INTO `finishing_categories` (`id`, `name`) VALUES
(1, 'CUSHION FILLING'),
(2, 'SEATING'),
(3, 'FRONT BORDER'),
(4, 'WOOD STAIN'),
(6, 'STUD FINISH');

-- --------------------------------------------------------

--
-- Table structure for table `finishing_items`
--

CREATE TABLE `finishing_items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `finishing_category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `additional_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `finishing_items`
--

INSERT INTO `finishing_items` (`id`, `name`, `finishing_category_id`, `image`, `additional_price`) VALUES
(4, 'FOAM & FIBRE', 1, 'foam_and_fibre.png', 0),
(5, 'FEATHER & FOAM', 1, 'feather_and_foam.png', 98),
(6, '2 SEAT CUSHIONS', 1, 'Seat-cushion-x-2.png', 0),
(7, 'PLAIN BORDER', 3, 'plain_border-4.png', 29),
(8, 'PLEATED BORDER', 3, 'pleated_border-2.png', 29),
(9, 'MAHOGANY', 4, 'mahogany_feature.png', 0),
(10, 'OAK', 4, 'oak_featured_image.png', 49),
(11, 'BRONZE RENAISSANCE', 6, 'bronze2_featured-1.png', 49),
(13, 'CHROME', 6, 'chrome_feature.png', 49);

-- --------------------------------------------------------

--
-- Table structure for table `leather_categories`
--

CREATE TABLE `leather_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `additional_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leather_categories`
--

INSERT INTO `leather_categories` (`id`, `name`, `additional_price`) VALUES
(6, 'HOUSE BOUCLE', 0),
(7, 'ANTIQUE LEATHERS', 0),
(8, 'WOOLS', 300);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `total_products` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `product_ids_with_qty` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_ids_with_qty`)),
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `total_products`, `order_amount`, `product_ids_with_qty`, `date`) VALUES
(3, 'admin', 'admin@admin.com', 2, 50, '{\"24\": 1, \"25\": 2}', 'Sat Dec 24 22:13:38 2022');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `color_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `category` text NOT NULL,
  `brand` text NOT NULL,
  `name` text NOT NULL,
  `price` float DEFAULT NULL,
  `sizes_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stripe_ids` text NOT NULL,
  `finishing_items_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`finishing_items_ids`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `color_ids`, `category`, `brand`, `name`, `price`, `sizes_ids`, `tags`, `description`, `image`, `stripe_ids`, `finishing_items_ids`) VALUES
(59, 9, 1, '[\"10\", \"11\", \"12\", \"13\", \"14\", \"15\"]', 'Sofa Beds', 'InterWood', 'LONDON CHESTERFIELD SOFA BED', 2649, '[\"8\", \"9\"]', NULL, 'A newcomer amongst our collection of Chesterfields, the London is elegant with a refreshing, contemporary edge.  Boasting the same lavish details and distinctive markers as our standard model, this stylish staple comes with all the trimmings. Hand studded detailing, a single button border, and luxurious deep buttoning spilling from the back onto traditional upright arms, the London sofa bed truly looks the part.  Nestled under this refined Chesterfield silhouette is a sturdy, pull-out mechanism topped with a well-sized double mattress, ensuring a great night’s sleep.  Boasting style and substance, our collection of Sofa Beds combine the classic markers of a Chesterfield with modern ingenuity and practicality. Choosing a Chesterfield Sofa Bed with Distinctive Chesterfields means you’ll never have to compromise.  All this and a choice of colour across our range of luxe leathers and dreamy velvets, the London will look perfect in your space and offer much more than meets the eye.', 'london_chesterfield-600x326.png', '{\"price\": 2649.0, \"stripe_product_id\": \"prod_NI0jSBLMwaN2Fn\", \"stripe_price_id\": \"price_1MXQiRKjEPLlj8i7YNJJ7NGq\"}', '[\"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\", \"11\", \"13\"]');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `additional_cost` float NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `additional_cost`, `height`, `width`, `depth`, `image`) VALUES
(8, '2 SEAT SOFA BED', 0, 75, 200, 105, 'sofabed_small.png'),
(9, '3 SEAT SOFA BED', 350, 75, 230, 100, 'sofabed_big.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `type`) VALUES
(2, 'dev@test.com', 'Developer', '1234', 'user'),
(3, 'admin@admin.com', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finishing_categories`
--
ALTER TABLE `finishing_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finishing_items`
--
ALTER TABLE `finishing_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leather_categories`
--
ALTER TABLE `leather_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `finishing_categories`
--
ALTER TABLE `finishing_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finishing_items`
--
ALTER TABLE `finishing_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leather_categories`
--
ALTER TABLE `leather_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
