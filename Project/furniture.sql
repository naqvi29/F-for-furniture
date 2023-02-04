-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 06:12 PM
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
  `cushion_filling` text DEFAULT NULL,
  `border` text DEFAULT NULL,
  `wood` text DEFAULT NULL,
  `stud` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `product_name`, `qty`, `price`, `image`, `size_name`, `color_name`, `cushion_filling`, `border`, `wood`, `stud`) VALUES
(21, 3, 53, 'DOWNTON CHESTERFIELD SOFA BED', 1, 5489, 'Downton_chesterfield_sofabed-600x326.png', '3_seat', '', '', '', '', '');

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
  `code` text NOT NULL,
  `product_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `product_ids`) VALUES
(1, 'Black', '#000000', '[1, 2, 9, 20, 21, 22, 23, 24, 25, 26, 29, 31, 40]'),
(2, 'Blue', '#0000FF', '[1, 2, 9, 20, 21, 22, 23, 26, 29, 30, 31, 32, 33, 34, 35, 36, 37, 39, 45, 47, 48, 49, 50, 51]'),
(3, 'Red', '#FF0000', '[1, 2, 9, 20, 21, 22, 23, 25, 26, 29, 30, 31, 35, 36, 37, 38, 39, 40, 43, 45, 46, 48]'),
(4, 'Purple', '#800080', '[2, 9, 20, 21, 22, 23, 26, 33, 34, 36, 38, 39, 44, 49, 51]'),
(5, 'Yellow', '#FFFF00', '[2, 9, 20, 21, 35, 36, 38, 39]'),
(6, 'Green', '#008000', '[2, 9, 20, 21, 22, 24, 32, 33, 34, 39, 40]');

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
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stripe_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `color_ids`, `category`, `brand`, `name`, `price`, `sizes`, `tags`, `description`, `image`, `stripe_ids`) VALUES
(53, 9, 1, NULL, 'Sofa Beds', 'InterWood', 'DOWNTON CHESTERFIELD SOFA BED', 4839, '[{\"size\": \"2_seat\", \"price\": 4839.0}, {\"size\": \"3_seat\", \"price\": 5489.0}]', '', 'One of the latest additions to our range, the Downtown is a beautifully traditional chesterfield sofa with the added benefit of easily transforming into a bed. Boasting a soft and supple sprung back over a hardwood frame, this piece features serpentine sprung seating and can be made up in two sumptuous sizes.  Borrowing aesthetic details from the Buckingham sofa, the curved arch of the back and slightly inset arms help make this a standout sofa in our already ‘Distinctive’ range.', 'Downton_chesterfield_sofabed-600x326.png', '[{\"size\": \"2_seat\", \"price\": 4839.0, \"stripe_product_id\": \"prod_NCsMhUupeIFQsl\", \"stripe_price_id\": \"price_1MSSbWKjEPLlj8i7x5UutLd0\"}, {\"size\": \"3_seat\", \"price\": 5489.0, \"stripe_product_id\": \"prod_NCsM3NR64IzU7k\", \"stripe_price_id\": \"price_1MSSbWKjEPLlj8i7vgQiEELS\"}]'),
(54, 1, 2, NULL, 'Restopedic Sofas', 'Chenone homes', 'LONDON CHESTERFIELD SOFA', 2539, '[{\"size\": \"club_chair\", \"price\": 2539.0}, {\"size\": \"2_seat\", \"price\": 3289.0}, {\"size\": \"3_seat\", \"price\": 3849.0}, {\"size\": \"4_seat\", \"price\": 4519.0}]', '', 'The London Chesterfield Sofa was only recently introduced to Distinctive Chesterfields’ existing collection. Named after the English capital – thanks to its inner city style and fresh, clean design – this is the perfect sofa for anyone looking for a piece that’s contemporary in appearance.  While still holding all the much-loved characteristics of a classic chesterfield, this modern- proportioned piece has a comfortable depth similar to our best-selling Hampton model.', 'London_Chesterfield_Sofa-1024x556.png', '[{\"size\": \"club_chair\", \"price\": 2539.0, \"stripe_product_id\": \"prod_NCt8ESJP0oyM0r\", \"stripe_price_id\": \"price_1MSTLlKjEPLlj8i74v1mFxYZ\"}, {\"size\": \"2_seat\", \"price\": 3289.0, \"stripe_product_id\": \"prod_NCt8yEQTL1PBYO\", \"stripe_price_id\": \"price_1MSTLmKjEPLlj8i7YxZUq7p3\"}, {\"size\": \"3_seat\", \"price\": 3849.0, \"stripe_product_id\": \"prod_NCt85lEcQc5RGd\", \"stripe_price_id\": \"price_1MSTLnKjEPLlj8i7FmRAbn0o\"}, {\"size\": \"4_seat\", \"price\": 4519.0, \"stripe_product_id\": \"prod_NCt83ZObEsjX1s\", \"stripe_price_id\": \"price_1MSTLnKjEPLlj8i76R3VMzuP\"}]'),
(55, 4, 3, NULL, 'Chairs', 'Habitt', 'PAXTON WING CHAIR', 2000, '[{\"size\": \"club_chair\", \"price\": 2000.0}, {\"size\": \"tub_chair\", \"price\": 2500.0}, {\"size\": \"wing_chair\", \"price\": 2679.0}, {\"size\": \"office_chair\", \"price\": 3500.0}]', '', 'Looking for a classic wing chair of grand proportions? The Paxton wing chair is the chair for you. Standing at over 120cm tall and featuring a fully-buttoned interior, this is a chair that certainly has presence. But it’s not until you sit back and relax into the Paxton that you fully appreciate its scale.  With a solid mahogany H-bar undercarriage and extra deep hand-stuffed cushions, the Paxton is the perfect piece for the study or fireside. Seen here in Vintage Dolphin, the standard configuration for this piece is bronze renaissance studs, plain border, fibre cushion and mahogany stain feet.', 'Paxton_Wing_Chair-600x326.png', '[{\"size\": \"club_chair\", \"price\": 2000.0, \"stripe_product_id\": \"prod_NCtDCoSgKUkBL9\", \"stripe_price_id\": \"price_1MSTRWKjEPLlj8i70j2yGAPA\"}, {\"size\": \"tub_chair\", \"price\": 2500.0, \"stripe_product_id\": \"prod_NCtDm3jURju0qC\", \"stripe_price_id\": \"price_1MSTRWKjEPLlj8i7Pe4CSf1g\"}, {\"size\": \"wing_chair\", \"price\": 2679.0, \"stripe_product_id\": \"prod_NCtDfDmpA4gJI0\", \"stripe_price_id\": \"price_1MSTRXKjEPLlj8i7e9l2AXlS\"}, {\"size\": \"office_chair\", \"price\": 3500.0, \"stripe_product_id\": \"prod_NCtD8bKNbY5ePG\", \"stripe_price_id\": \"price_1MSTRXKjEPLlj8i7RP4kjKS1\"}]'),
(56, 5, 4, NULL, 'Stools & Chaise Lounges', 'Index Furniture', 'STRINGER STOOL', 1009, '[{\"size\": \"tiny_stool\", \"price\": 1009.0}, {\"size\": \"small_stool\", \"price\": 1289.0}, {\"size\": \"medium_stool\", \"price\": 1599.0}, {\"size\": \"large_stool\", \"price\": 2229.0}]', '', 'With a width of 75cm, depth of 75cm and height of 35cm, the Stringer small footstool makes the perfect addition to your living room.  Pair it with one of our stunning sofas or chairs and enjoy the ultimate in style and comfort. As with all our pieces, it can be upholstered in a leather or fabric of your choice and thanks to its high quality craftsmanship, it will grace your home for decades.', 'stringer_stool-1024x556.png', '[{\"size\": \"tiny_stool\", \"price\": 1009.0, \"stripe_product_id\": \"prod_NCtJYjl6o7hj3D\", \"stripe_price_id\": \"price_1MSTX5KjEPLlj8i7cLyo0eVf\"}, {\"size\": \"small_stool\", \"price\": 1289.0, \"stripe_product_id\": \"prod_NCtJ3USVYL96gL\", \"stripe_price_id\": \"price_1MSTX5KjEPLlj8i7rDRHPmG6\"}, {\"size\": \"medium_stool\", \"price\": 1599.0, \"stripe_product_id\": \"prod_NCtJK1Ggaf5VfD\", \"stripe_price_id\": \"price_1MSTX6KjEPLlj8i7EnvAc8qj\"}, {\"size\": \"large_stool\", \"price\": 2229.0, \"stripe_product_id\": \"prod_NCtJIo2dF6tEXL\", \"stripe_price_id\": \"price_1MSTX7KjEPLlj8i7zwrYJsOv\"}]'),
(57, 8, 5, NULL, 'In Stock', 'example', 'SANDRINGHAM CHESTERFIELD SOFA', 2539, '[{\"size\": \"small\", \"price\": 2539.0}, {\"size\": \"medium\", \"price\": 3399.0}, {\"size\": \"large\", \"price\": 3919.0}, {\"size\": \"extra_large\", \"price\": 4569.0}]', '', 'You are sure to love every part of the Sandringham Chesterfield Sofa, as it boasts an elegant fanfare arm and a full deep buttoned interior covering the back, arms and the seat itself. The lack of separate seating cushions creates a firmer yet equally comfortable sitting experience, which makes it the perfect choice if you don’t want to “sink in” to your sofa when you sit down.  The fully sprung arm and back and serpentine sprung seating with soft padding creates the ultimate in comfort when sitting, so you will rarely have to readjust yourself. Its traditional look is complimented by full piping and a studded front-facing border, which adds to the charm of this particular piece.', 'Sandringham_Chesterfield_Sofa-1024x556.png', '[{\"size\": \"small\", \"price\": 2539.0, \"stripe_product_id\": \"prod_NCtSiskJ0xM639\", \"stripe_price_id\": \"price_1MSTfMKjEPLlj8i7m33Z2hZe\"}, {\"size\": \"medium\", \"price\": 3399.0, \"stripe_product_id\": \"prod_NCtSWvn3ie4aRq\", \"stripe_price_id\": \"price_1MSTfNKjEPLlj8i7iYbRM98V\"}, {\"size\": \"large\", \"price\": 3919.0, \"stripe_product_id\": \"prod_NCtSYliOCyQnsQ\", \"stripe_price_id\": \"price_1MSTfNKjEPLlj8i7qedooLyR\"}, {\"size\": \"extra_large\", \"price\": 4569.0, \"stripe_product_id\": \"prod_NCtSMNgZp5bLaO\", \"stripe_price_id\": \"price_1MSTfOKjEPLlj8i7yHiP0QJc\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `product_ids`) VALUES
(1, 'S', '[1, 2, 22, 23, 24, 25, 26, 35, 38, 39]'),
(2, 'M', '[1, 2, 22, 23, 26, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39]'),
(3, 'L', '[1, 23, 26, 29, 30, 31, 32, 33, 34, 35, 36, 37]'),
(4, 'XS', '[1, 22, 2, 24, 25]');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
