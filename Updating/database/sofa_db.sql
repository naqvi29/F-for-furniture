-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 03:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'InterWood'),
(2, 'Chenone homes'),
(3, 'Habitt'),
(4, 'Index Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_status` enum('Pending','Completed','Cancelled') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `qty`, `order_status`, `created`) VALUES
(66, 4, 1, 1, 'Completed', '2022-12-28 13:14:39'),
(69, 4, 2, 1, 'Completed', '2022-12-28 13:14:39'),
(70, 4, 4, 3, 'Completed', '2022-12-28 13:14:39'),
(71, 5, 2, 2, 'Pending', '2022-12-27 10:07:55'),
(72, 5, 4, 2, 'Pending', '2022-12-27 10:07:59'),
(73, 4, 1, 1, 'Completed', '2022-12-28 13:18:20'),
(74, 4, 2, 1, 'Completed', '2022-12-28 13:21:15'),
(75, 4, 1, 1, 'Completed', '2022-12-28 13:24:06'),
(76, 4, 1, 1, 'Completed', '2022-12-28 13:38:20'),
(77, 4, 2, 1, 'Completed', '2022-12-28 13:38:20'),
(78, 4, 2, 1, 'Completed', '2022-12-28 13:54:58'),
(79, 4, 4, 1, 'Completed', '2022-12-28 13:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'bedstore sofas'),
(2, 'corner sofas'),
(3, 'sofas'),
(4, 'chairs'),
(5, 'stools & chaise lounges'),
(6, 'popular'),
(9, 'sofa beds'),
(10, 'instock');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(40) NOT NULL,
  `street` varchar(300) NOT NULL,
  `apartment` varchar(300) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `town_or_city` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `pay_method` varchar(20) NOT NULL,
  `c_number` varchar(50) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_expiry` varchar(50) DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `order_number` int(11) NOT NULL,
  `costumer_id` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `fname`, `lname`, `company_name`, `country`, `street`, `apartment`, `zip_code`, `town_or_city`, `email_address`, `phone`, `pay_method`, `c_number`, `c_name`, `c_expiry`, `cvc`, `amount`, `order_number`, `costumer_id`, `date_time`) VALUES
(1, 'Anis', 'Ali', 'Webtrica', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '7064', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '', 0, 4, '2022-12-28 13:14:36'),
(2, 'Muhammad ', 'Anis', 'Webtrica', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '7064', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '1429', 0, 4, '2022-12-28 13:18:17'),
(3, 'Anis', 'Ali', 'Webtrica', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '7064', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '1409', 0, 4, '2022-12-28 13:21:13'),
(4, 'Anis', 'Ali', 'Webtrica', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '1429', 0, 4, '2022-12-28 13:24:03'),
(5, 'Anis', 'Ali', 'Webtrica', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '7064', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '2838', 0, 4, '2022-12-28 13:38:05'),
(6, 'Anis', 'Ali', '', 'Pakistan', 'House # 75 Street # 5 Sector A-3 Saeedabad', '', '', 'Baldia Town Karachi', 'princeanees456@gmail.com', '+92 324 0211371', 'COD', '', '', '2023-01', 0, '2648', 0, 4, '2022-12-28 13:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`) VALUES
(1, 'Alice Blue', '#F0F8FF'),
(2, 'Amaranth', '#E52B50'),
(3, 'Amber', '#FFBF00'),
(4, 'Amethyst', '#9966CC'),
(5, 'Apricot', '#FBCEB1'),
(6, 'Aquamarine', '#7FFFD4'),
(7, 'Azure', '#007FFF'),
(8, 'Baby Blue', '#89CFF0'),
(9, 'Beige', '#F5F5DC'),
(10, 'Brick Red', '#CB4154'),
(11, 'Black', '#000000'),
(12, 'Blue', '#0000FF'),
(13, 'Blue-Green', '#0095B6'),
(14, 'Blue-Violet', '#8A2BE2'),
(15, 'Blush', '#DE5D83'),
(16, 'Bronze', '#CD7F32'),
(17, 'Brown', '#993300'),
(18, 'Burgandy', '#80020'),
(19, 'Byzantium', '#702963'),
(20, 'Carmine', '#960018'),
(21, 'Cerise', '#DE3163'),
(22, 'Cerulean', '#007BA7'),
(23, 'Champagne', '#F7E7CE'),
(24, 'Chartreuse Green', '#7FFF00'),
(25, 'Chocolate', '#7B3F00'),
(26, 'Cobalt Blue', '#0047AB'),
(27, 'Coffee', '#6F4E37'),
(28, 'Copper', '#B87333'),
(29, 'Coral', '#FF7F50'),
(30, 'Crimson', '#DC143C'),
(31, 'Cyan', '#00FFFF'),
(32, 'Desert Sand', '#EDC9AF'),
(33, 'Electric Blue', '#7DF9FF'),
(34, 'Emerald', '#50C878'),
(35, 'Erin', '#00FF3F'),
(36, 'Gold', '#FFD700'),
(37, 'Gray', '#BEBEBE'),
(38, 'Green', '#008001'),
(39, 'Harlequin', '#3FFF00'),
(40, 'Indigo', '#4B0082'),
(41, 'Ivory', '#FFFFF0'),
(42, 'Jade', '#00A86B'),
(43, 'Jungle Green', '#29AB87'),
(44, 'Lavender', '#B57EDC'),
(45, 'Lemon', '#FFF700'),
(46, 'Lilac', '#C8A2C8'),
(47, 'Lime', '#BFFF00'),
(48, 'Magenta', '#FF00FF'),
(49, 'Magenta Rose', '#FF00AF'),
(50, 'Maroon', '#800000'),
(51, 'Mauve', '#E0B0FF'),
(52, 'Navy Blue', '#000080'),
(53, 'Ochre', '#CC7722'),
(54, 'Olive', '#808000'),
(55, 'Orange', '#FF8000'),
(56, 'Orange-Red', '#FF4500'),
(57, 'Orchid', '#DA70D6'),
(58, 'Peach', '#FFE5B4'),
(59, 'Pear', '#D1E231'),
(60, 'Periwinkle', '#CCCCFF'),
(61, 'Persian Blue', '#1C39BB'),
(62, 'Pink', '#FFC0CB'),
(63, 'Plum', '#8E4585'),
(64, 'Prussian Blue', '#003153'),
(65, 'Puce', '#CC8899'),
(66, 'Purple', '#6A0DAD'),
(67, 'Navy Blue', '#000080'),
(68, 'Ruspberry', '#E30B5C'),
(69, 'Red', '#FF0000'),
(70, 'Red-Violet', '#C71585'),
(71, 'Rose', '#FF007F'),
(72, 'Ruby', '#E0115F'),
(73, 'Salmon', '#FA8072'),
(74, 'Sangria', '#92000A'),
(75, 'Sapphire', '#0F52BA'),
(76, 'Scarlet', '#FF2400'),
(77, 'Silver', '#C0C0C0'),
(78, 'Slate Gray', '#708090'),
(79, 'Spring Bud', '#A7FC00'),
(80, 'Spring Green', '#00FF7F'),
(81, 'Tan', '#D2B48C'),
(82, 'Taupe', '#483C32'),
(83, 'Teal', '#008080'),
(84, 'Turquoise', '#40E0D0'),
(85, 'Ultramarine', '#3F00FF'),
(86, 'Violet', '#8000FF'),
(87, 'Viridian', '#40826D'),
(88, 'White', '#FFFFFF'),
(89, 'Yellow', '#FFFF00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `c_id` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `C_Email` varchar(255) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Postal_Code` varchar(255) NOT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`c_id`, `First_Name`, `Last_Name`, `C_Email`, `Phone_Number`, `Postal_Code`, `Subject`, `Message`) VALUES
(1, 'Anis', 'Ali', 'mohammadanis75786@gmail.com', '0324-0211371', '7064', 'Others', 'Hi There I am facing some problem regarding products');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` text DEFAULT NULL,
  `p_brand` int(11) DEFAULT NULL,
  `p_price` varchar(50) DEFAULT NULL,
  `p_desc` varchar(2000) DEFAULT NULL,
  `p_image` blob DEFAULT NULL,
  `p_tags` varchar(500) DEFAULT NULL,
  `p_cat` int(11) DEFAULT NULL,
  `p_color` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive',
  `p_size` enum('1','2','3','4','5') NOT NULL COMMENT '1-XS, 2-S, 3-M, 4-L, 5-XL',
  `p_seats` enum('0','1','2','3','4') NOT NULL COMMENT '0-2_Seats, 1-3_Seats, 2-4_Seats, 3-5_Seats, 4-1_Seats'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_brand`, `p_price`, `p_desc`, `p_image`, `p_tags`, `p_cat`, `p_color`, `status`, `p_size`, `p_seats`) VALUES
(1, 'Hampton Bedstore Sofa', 2, '1429.00', 'Our best-selling Chesterfield, The Hampton is also the biggest model in our collection.\r\n\r\nCombining extra deep seats lined with soft seat cushions, with traditional upright Chesterfield arms, the Hampton provides relaxed, soft comfort.\r\n\r\nOozing with the distinct markers of a Chesterfield, this model boasts a deep buttoned back, pleated border, and studded detailing, making it impossible to ignore this statement piece.\r\n\r\nAvailable in a range of colours and fabrics, from luxurious leathers to smooth velvets, the Hampton promises to deliver style and substance to any space.', 0x62656473746f72652d736f66612d312e706e67, 'BEDSTORESOFA, BROWNSOFA, MEDIUM, 2SEATS, ', 1, 'Brown', '0', '3', '0'),
(2, 'London Bedstore Sofa', 1, '1409.00', 'A recent addition to our collection, the London Chesterfield Sofa brings with it the elegance and poise of a traditional Chesterfield, with a clean and contemporary edge.\r\n\r\nInspired by its namesake, this model mirrors the cool, cosmopolitan London spirit.\r\n\r\nA deep seat, supported with snug seat cushions against a traditional buttoned back, the London offers a softer sit, remaining surprisingly supportive around the back.\r\n\r\nHandcrafted with a single button border, studded trim, and mahogany-stained feet, the London captures the timeless characteristics of a traditional Chesterfield with a contemporary style unique to this model.\r\n\r\nMake the London unique to your space with a choice of fabrics and leathers in a range of bold, muted, and traditional colours', 0x62656473746f72652d736f66612d322e706e67, 'BEDSTORESOFA, GRAY, GREY, 2SEATS, MEDIUM', 1, 'Gray', '0', '3', '0'),
(4, 'Holyrood Bedstore Sofa', 3, '1239.00', 'Our Holyrood Chesterfield effortlessly combines firm support with comfort and style.\r\n\r\nThis model features a deep seat and plush, supportive cushions.\r\n\r\nThe Holyrood has it all – a deep buttoned back, statement upright Chesterfield arms, studded detailing with a lavish double buttoned border.\r\n\r\nA classic, timeless design adapted to offer supreme support and iconic Chesterfield quality. The Holyrood is a guaranteed choice for any space.', 0x62656473746f72652d736f66612d332e706e67, 'SMALL, BEDSTORESOFA, CHOCOLATE, BROWN, 2SEATS', 1, 'Chocolate', '0', '2', '0'),
(5, 'Washington Bedstore Sofa', 4, '3229.00', 'Introducing our newest model, the Washington – our first fully-buttoned Chesterfield sofa, with a fixed buttoned seat.\r\n\r\nModernising the traditional Chesterfield design, deep-buttoning spans the entire frame.\r\n\r\nWith its deep seat, and fully-buttoned body, the Washington is one of our comfiest models.', 0x62656473746f72652d736f66612d342e706e67, 'BEDSTORESOFA, WHITE, 2SEATS, SMALL', 1, 'White', '0', '2', '0'),
(6, 'Wandsworth Bedstore Sofa', 1, '1589.00', 'The softest Chesterfield in our collection, you’ll be hard-pressed to find a more comfortable model than the Wandsworth.\r\n\r\nA deep seat, dreamy seat cushions, and lavish curved arms leading into a cradling tilted back, this model makes for the perfect place to curl up and relax.\r\n\r\nLovingly finished with a plain border and mahogany feet the Wandsworth is as stylish as it is comfortable. Additional options such as hand studded detailing and French-polished feet make the Wandsworth the perfect choice for those looking for luxury.\r\n\r\nBring your vision to life with a choice of leathers and fabrics available in a spectrum of colours, guaranteed to make your bespoke Chesterfield the perfect statement piece to any space.', 0x62656473746f72652d736f66612d352e6a7067, 'GRAY, GREY, 2SEATS, BEDSTORESOFA, MEDIUM', 1, 'Gray', '0', '3', '0'),
(7, 'Manhattan Bedstore Sofa', 4, '1459.00', 'Introducing you to our latest model, The Manhattan Chesterfield Sofa.\r\n\r\nThe Manhattan sofa is an adaptation of a timeless Chesterfield. Featuring extra depth and classic upright arms and button seat.\r\n\r\nAvailable in a range of colours and fabrics, from luxurious leathers to smooth velvets, the Manhattan will deliver style and substance to any space.', 0x62656473746f72652d736f66612d362e706e67, 'MEDIUM, BEDSTORESOFA, 2SEATS, BROWN, COFFEE', 1, 'Coffee', '0', '3', '0'),
(8, 'Wally Sofa', 3, '1359.00', 'A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.\r\n\r\nThe deep buttoned back and smooth, soft seat provide support and comfort in equal measure, resulting in a luxuriously comfortable experience.\r\n\r\nPictured here in House Velvet – Pink.', 0x62656473746f72652d736f66612d372e706e67, '2SEATS, PINK, SMALL, BEDSTORESOFA', 1, 'Pink', '0', '2', '0'),
(9, 'Flora Sofa', 2, '1339.00', 'A modern take on the iconic Chesterfield silhouette – with its traditional buttoned back, coupled with a smooth seat and staple Chesterfield arms, the Flora’s extra-deep seat is designed to offer a more comfortable experience.\r\n\r\nAvailable as a chair, love seat, or small, medium, and large sofa, the Flora is the perfect addition to any space.', 0x62656473746f72652d736f66612d382e6a7067, '3SEATS, BEDSTORESOFA, ORANGERED, MEDIUM', 1, 'Orange-Red', '0', '3', '1'),
(10, 'Burghley Bedstore Sofa', 1, '1069.00', 'One of our smallest and most compact models, the Burghley’s unique silhouette displays the iconic Chesterfield presence in the most original way.\r\n\r\nClosely related to a traditional ‘tub’ chair, the Burghley features a rounded buttoned back, buttoned seat, and high arms. Making for a firmer cushion, but super easy sitting with comfortable, relaxed support.\r\n\r\nIts slender, compact dimensions are perfect for injecting a boost of character to compact spaces. While availability as a chair, two, three, and four seat sofas makes the Burghley an excellent choice for any space. Particularly, those craving a contemporary piece.', 0x62656473746f72652d736f66612d392e6a7067, '2SEATS, SMALL, BEDSTORESOFA, YELLOW', 1, 'Yellow', '0', '2', '0'),
(11, 'Drummond Bedstore Sofa', 4, '1399.00', 'With its lavish proportions, the Drummond boasts the elegant features of a signature Chesterfield –  available in a single chair to four seater sofa, it makes the perfect statement piece for any space.\r\n\r\nThe Drummond boasts all the signature staples of a traditional Chesterfield, from a deep buttoned back, low seat, and arch-flared arms to pipe and stud detailing.\r\n\r\nMake the Drummond unique to your space and interior, with a wide choice of fabrics, leathers, and colours. Bringing your dream statement piece to life.', 0x62656473746f72652d736f66612d31302e706e67, '2SEATS, BLACK, BEDSTORESOFA, MEDIUM', 1, 'Black', '0', '3', '0'),
(12, 'Blenheim Bedstore Sofa', 3, '1419.00', 'Grand in quality and proportion, the Blenheim is sure to make a bold and distinguished statement in your space. With its traditional silhouette, fans of the classic Chesterfield style will adore the Blenheim.\r\n\r\nIts deep buttoned seat and back, single button border and studded detailing has earned the Blenheim a spot amongst our best sellers, and it’s easy to see why.\r\n\r\nPerfect for reception rooms, its tilted back and fixed button seat ensures a firmer and more supportive sit while maintaining the signature style of a quality Chesterfield.\r\n\r\nWhether looking for traditional elegance or contemporary chic our selection of fabrics, leathers, and colours ensure your Blenheim will tick every box.', 0x62656473746f72652d736f66612d31312e706e67, '3SEATS, BEDTORESOFA, MEDIUM, MAROON, RED', 1, 'Maroon', '0', '3', '1'),
(13, 'Kensington Bedstore Sofa', 3, '1259.00', 'Don’t be fooled by the Kensington’s understated elegance. Its traditional characteristics radiate the quintessential Chesterfield poise.\r\n\r\nA high back cascading into a low buttoned seat, supported by traditional upright arms, this sofa is supportive and stylish in equal measure.\r\n\r\nHand-finished with all the trimmings, there is nothing lackluster about the Kensington. Sporting a buttoned border, mahogany stained feet, and studded trim, the Kensington’s silhouette is unapologetically classic.\r\n\r\nChoose from a diverse selection of leathers, fabrics, and colours to bring your Kensington to life in your space.', 0x62656473746f72652d736f66612d31322e706e67, 'SMALL, 2SEATS, BEDSTORESOFA, GREEN', 1, 'Green', '0', '2', '0'),
(14, 'Paris Bedstore Sofa', 1, '1139.00', 'The Paris is undoubtedly one of our most unique silhouettes. Combining the Chesterfield silhouette with a contemporary twist, this sofa is the perfect addition to any modern space.\r\n\r\nSporting a curved frame and an elegantly rolled head and foot, all enveloped in fully-buttoned upholstery. This model offers a supportive and comfortable sit with an uncompromisingly chic style. Available in four sizes, starting with a single chair, the Paris is the perfect statement piece for any space.', 0x62656473746f72652d736f66612d31332e706e67, '3SEATS, BEDSTORESOFA, LARGE, BLACK ', 1, 'Black', '0', '4', '1'),
(15, 'Goodwood Bedstore Sofa', 3, '1549.00', 'Showcasing a tilted deep buttoned back that leads into a buttoned seat base and arch-flared arms, the Goodwood is the perfect choice for those looking for a softer sit, without compromising the style of a  fixed buttoned base.\r\n\r\nDetailed with opulent fabric piping, a plain border, and available in four sizes, this piece radiates opulence throughout any space, no matter its size.\r\n\r\nMake the Goodwood your own with a choice of luxurious leathers, dreamy velvets, and striking fabrics in a variety of colours and tones', 0x62656473746f72652d736f66612d31342e706e67, '2SEATS, BEDSTORESOFA, MEDIUM, IVORY', 1, 'Ivory', '0', '3', '0'),
(16, 'Sandringham Bedstore Sofa', 2, '1409.00', 'As the name implies, the grandeur of the Sandringham makes this model a choice fit for royalty.\r\n\r\nUpright Chesterfield arms, a deep buttoned back, and a single cushion buttoned seat offer a firmer sitting experience, perfect for those wanting a comfortable sofa with firm support.\r\n\r\nWith a single buttoned border, studded detailing, and rich mahogany stained feet complete with brass castors, the luxury of the Sandringham is embedded in every detail.\r\n\r\nAvailable in all sizes ranging from a single chair to a grand four seat sofa, the Sandringham will be at home in any space.', 0x62656473746f72652d736f66612d31352e706e67, '2SEATS, BEDSTORESOFA, BROWN, COPPER, SMALL', 1, 'Copper', '0', '2', '0'),
(17, 'Windsor Bedstore Sofa', 4, '1219.00', 'Our most timeless piece, the Windsor Chesterfield is regal in both name and nature. As a result, it has become a resident amongst our best-selling pieces.\r\n\r\nWhen many people envision a Chesterfield, the Windsor is the image that springs to mind. Staple features such as classic upright arms with a fully buttoned back and seat radiate the signature style.\r\n\r\nNotably, with its slightly shallower, buttoned seat, the Windsor offers a more firm and supportive sit than other models.\r\n\r\nA sturdy base traditionally adorned with the finest foams and encased in luxury leathers, the Windsor embodies everything Chesterfield.\r\n\r\nFrom its bun feet, to the single button border, studded detailing, and quality exterior piping, the Windsor is the blueprint for the Chesterfield. British furniture at its absolute best.', 0x62656473746f72652d736f66612d31362e706e67, '3SEATS, LARGE, BEDSTORE SOFA, CARMINE', 1, 'Carmine', '0', '4', '1'),
(18, 'Chatsworth Bedstore Sofa', 2, '1449.00', 'The charismatic charm of the Chatsworth sofa will command the attention in any space – combining both classic design and comfort.\r\n\r\nA deep seat, fully sprung foam interior, buttoned back and additional seat cushions offer regal relaxation. A softer, more relaxed sit than other traditional models, the Chatsworth avoids compromise on both style and substance. The plush pleated border, studded detailing, and mahogany stained, turned feet ensure that the Chatsworth exudes elegance from head to foot.', 0x62656473746f72652d736f66612d31372e706e67, '2SEATS, SMALL, BEDSTORESOFA, CHATSWORTH, TAUPE, WOODY', 1, 'Taupe', '0', '2', '0'),
(19, 'Belchamp Bedstore Sofa', 3, '1259.00', 'The Belchamp combines a formal, distinguished look with a softer, yet surprisingly supportive sit.\r\n\r\nBuilt over a solid Beech frame, the Belchamp boasts a deep buttoned back, traditional upright arms, and soft seat cushions. As a result, you can expect a comfortable, soft seat with additional cradling on the back.\r\n\r\nA single-buttoned border, with studded detailing and mahogany-stained feet, finished off with polished brass castors equip the Belchamp with all the hallmarks of a quality, crafted Chesterfield.', 0x62656473746f72652d736f66612d31382e706e67, 'LARGE, BEDSTORESOFA, BRWON, BELCHAMP, 2SEATS, BRONZE', 1, 'Bronze', '0', '4', '0'),
(20, 'Harewood Bedstore Sofa', 3, '1399.00', 'The Harewood is one of our most traditional silhouettes, bringing a truly authentic Chesterfield presence into any space.\r\n\r\nWith a classic buttoned back, upright arms, and extended T-cushion seats, nestled in an extra-deep seat, the Harewood exudes comfort. While the T-cushions provide a soft seat for you to sink into, the seat depth supports your back in all the right places.\r\n\r\nRich in the classic Chesterfield hallmarks, this model is lovingly finished with a single button border, studded detailing, and wide, deep mahogany bun feet. A perfectly polished example of a Chesterfield.', 0x62656473746f72652d736f66612d31392e706e67, 'SMALL, BEDSTORESOFA, 2SEATS, HAREWOOD, APRICOT', 1, 'Apricot', '0', '2', '0'),
(21, 'London Corner Sofa', 1, '4699.00', 'We have introduced a number of corner units to our collection, including our best-selling London Chesterfield sofa. Our corner units are extra spacious, with 8 size options available. Designed with the same quality in mind, our modular units are the perfect piece for any home, contemporary or traditional. Our London Chesterfield Sofa brings with it the elegance and poise of a traditional Chesterfield, with a clean and contemporary edge.', 0x636f726e65722d736f66612d312e706e67, 'CORNERSOFA, LONDON, MAROON, 4SEATS, EXTRALARGE, BURGANDY', 2, 'Burgandy', '0', '5', '2'),
(22, 'Windsor Corner Sofa', 4, '4179.00', 'Available in over 120 luxury leathers and fabrics, our most timeless Chesterfield, the Windsor is now available as a corner unit. With all of the recognisable features of a classic Chesterfield sofa, it has become a resident amongst our best-selling pieces.\r\n\r\nWhen many people envision a Chesterfield, the Windsor is the image that springs to mind. With traditional features such as classic upright arms and a fully buttoned seat, the Windsor corner unit boasts timeless style.', 0x636f726e65722d736f66612d322e706e67, 'EXTRALARGE, CORNERSOFA, GRAY, GREY, WINDSOR, 4SEATS, SILVER', 2, 'Silver', '0', '5', '2'),
(23, 'Blenheim Corner Sofa', 4, '4389.00', 'Even grander in quality and proportion, the Blenheim corner sofa is sure to make a bold and distinguished statement in any space. The Blenheim is favoured for its traditional silhouette with its deep buttoned seat and back, single button border and studded detailing. We have reimagined a number of our best sellers into corner units, perfect for reception rooms and larger spaces, its tilted back and fixed button seat ensures a firmer and more supportive sit while maintaining the signature style of a quality Chesterfield.', 0x636f726e65722d736f66612d332e706e67, 'EXTRALARGE, CORNERSOFA, BLENHEIM, GOLD, 4SEATS', 2, 'Gold', '0', '5', '2'),
(24, 'Hampton Corner Sofa', 4, '4699.00', 'One of our best-selling models the Hampton combines the elegance of a traditional Chesterfield model with subtle contemporary alterations. At long last we have created several standard corner options of this best-seller brand new to our collection. Don’t worry this corner chesterfield brings with it the great style and comfort of the Hampton, with super spacious seating for a truly homely feel.\r\n\r\nIts straight back and luxe seat cushions give the Hampton a relaxed support with a soft sit, making it one of our comfiest Chesterfield models. While traditional studding and bordering to the bottom exude traditional Chesterfield poise.\r\n\r\nAvailable as both a right and left facing corner across 5 different styles, the Hampton Corner Chesterfield is the perfect comfy addition to any space.', 0x636f726e65722d736f66612d342e706e67, 'EXTRALARGE, 4SEATS, CORNERSOFA, BROWN, OCHRE', 2, 'Ochre', '0', '5', '2'),
(25, 'Wandsworth Corner Sofa', 2, '5359.00', 'The softest Chesterfield in our collection, you’ll be hard-pressed to find a more comfortable model than the Wandsworth and now we’ve made it extra snug as a corner unit!\r\n\r\nIt’s deep seat, dreamy seat cushions, and lavish curved arms leading into a cradling tilted back, you can now tailor your Wandsworth with extra space.\r\n\r\nLovingly finished with a plain border and mahogany feet the Wandsworth is as stylish as it is comfortable. Whatever your space make the Wandsworth corner the perfect choice for your space with a choice of left or right facing units.', 0x636f726e65722d736f66612d352e706e67, '4SEATS, EXTRALARGE, CORNERSOFA, GOLD, WANDSWORTH', 2, 'Gold', '0', '5', '2'),
(26, 'Arnie Modular Sofa', 1, '499.00', 'Say hello to the Arnie sofa – soft, squishy and generously proportioned.\r\n\r\nThis is a modular unit, each section is to be purchased individually, dependent on style and size of sofa required.', 0x636f726e65722d736f66612d362e706e67, '5SEATS, EXTRALARGE, VIOLET, ARNIE, MODULARSOFA, TEAL', 2, 'Teal', '0', '5', '2'),
(27, 'Betty Sofa', 4, '1269.00', 'Available in a chair, love seat, or small, medium or large sofa, this absolute beauty will be a welcome update to your home.\r\n\r\nContemporary, comfortable and cute.\r\n\r\nRelax in style with Betty’s extremely soft cushions – once you’ve sat down, you won’t want to get back up.', 0x736f66612d312e6a7067, '2SEATS, MEDIUM, BETTY, SOFAS, BLUE, VIOLET, TEAL', 3, 'Teal', '0', '3', '0'),
(28, 'Arnie Modular Sofa', 1, '499.00', 'Say hello to the Arnie sofa – soft, squishy and generously proportioned.\r\n\r\nThis is a modular unit, each section is to be purchased individually, dependent on style and size of sofa required.', 0x736f66612d322e706e67, 'EXTRALARGE, SOFAS, CORNERSOFA, TEAL, VIOLET, TEAL, BLUE, 5SEATS', 3, 'Teal', '0', '5', '2'),
(29, 'Northbank Sofa', 2, '1449.00', 'The Northbank sofa – featuring superior springs and foam specifications.\r\n\r\nThe foam specifications make this piece of furniture extra comfortable – the Northbank sofa comes plain and unbuttoned for a simple yet stylish look.', 0x736f66612d332e6a7067, '2SEATS, SOFAS, NORTHBANK, SMALL, GOLD', 3, 'Gold', '0', '2', '0'),
(30, 'Annie Sofa', 4, '1309.00', 'Sink into the beautifully plush cushions of Annie. This sofa is soft, luxurious and oh so pretty to look at in a sumptuous velvet.\r\n\r\nAvailable as a chair, love seat, or a small, medium or large sofa, this pretty piece can be customised by colour, too.', 0x736f66612d342e6a7067, '3SEATS, MEDIUM, BABYPINK, PINK, SOFAS, ANNIE', 3, 'Pink', '0', '3', '1'),
(31, 'Berkeley Sofa', 3, '1179.00', 'The Berkeley is built over our solid Beech Chesterfield frame, and is sprung softer and built deeper than some of our standard Chesterfields.\r\n\r\nIf you’re looking for simplicity, then look no further – with its soft foam and plain upholstery – this is a stunning piece.', 0x736f66612d352e6a7067, 'SMALL, 2SEATS, BROWN, BERKELEY, SOFAS', 3, 'Brown', '0', '2', '0'),
(32, 'Wally Sofa', 3, '1359.00', 'A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.\r\n\r\nThe deep buttoned back and smooth, soft seat provide support and comfort in equal measure, resulting in a luxuriously comfortable experience.', 0x736f66612d362e706e67, '2SEATS, SOFAS, PINK, SMALL, WALLY, MAGENTAROSE', 3, 'Magenta Rose', '0', '2', '0'),
(33, 'Flora Sofa', 2, '1339.00', 'A modern take on the iconic Chesterfield silhouette – with its traditional buttoned back, coupled with a smooth seat and staple Chesterfield arms, the Flora’s extra-deep seat is designed to offer a more comfortable experience.', 0x736f66612d372e706e67, '3SEATS, BEDSTORESOFA, ORANGERED, MEDIUM', 3, 'Orange-Red', '0', '3', '1'),
(34, 'London Bedstore Sofa Bed', 3, '2649.00', 'A newcomer amongst our collection of Chesterfields, the London is elegant with a refreshing, contemporary edge.\r\n\r\nBoasting the same lavish details and distinctive markers as our standard model, this stylish staple comes with all the trimmings. Hand studded detailing, a single button border, and luxurious deep buttoning spilling from the back onto traditional upright arms, the London sofa bed truly looks the part.\r\n\r\nNestled under this refined Chesterfield silhouette is a sturdy, pull-out mechanism topped with a well-sized double mattress, ensuring a great night’s sleep.\r\n\r\nBoasting style and substance, our collection of Sofa Beds combine the classic markers of a Chesterfield with modern ingenuity and practicality. Choosing a Chesterfield Sofa Bed with Distinctive Chesterfields means you’ll never have to compromise.', 0x736f66612d6265642d312e706e67, 'LARGE, 2SEATS, BROWN, CHOCOLATE, LONDON, BEDSTORESOFABED', 9, 'Chocolate', '0', '4', '0'),
(35, 'Wandsworth Bedstore Sofa Bed', 4, '2969.00', 'Holding the title of our comfiest Chesterfield sofa, the Wandsworth Sofa Bed offers the supreme comfort of our standard model, combined with the convenience of a great additional sleeping space.\r\n\r\nIn our Wandsworth Sofa Bed, you’ll discover the same luxury quality as its sister model. From its deep buttoned back and sides, to its arch flared arms and cosy cushioned seats. This sofa bed promises extreme style and even more comfort, whether sitting or sleeping with its handy pull-out mechanism and full-sized mattress.\r\n\r\nOur collection of Chesterfield Sofa Beds has been developed to embody style and substance. Giving you the undeniable charm and poise of a quality built Chesterfield sofa with uncompromising quality and convenience. We promise that by choosing a Sofa Bed with Distinctive Chesterfields you’ll get style, quality, and comfort.', 0x736f66612d6265642d322e706e67, 'LARGE, 2SEATS, BEIGE, OFFWHITE, WANDSWORTH, BEDSTORESOFABED', 9, 'Beige', '0', '4', '0'),
(36, 'Downtown Bedstore Sofa Bed', 1, '2689.00', 'The Downton is as classic as they come in silhouette and style.\r\n\r\nStandout features such as a curved arch back and slightly inset arms bring this timeless design to life while the additional sofa cushions inject a cosy comfort, without compromising that classic Chesterfield feel.\r\n\r\nSoft, durable springs and a hardwood frame give the Downton a sturdy structure encasing a supportive, full-size mattress on a convenient pull-out mechanism.\r\n\r\nCareful and precise finishing such as a deep buttoned back and sides, upright rolled arms and a single button border give this sofa its Chesterfield spirit.', 0x736f66612d6265642d332e706e67, 'LARGE, 3SEATS, DARKBROWN, BURGANDY, CHOCOLATE, DOWNTOWN, BEDSTORESOFABED', 9, 'Burgandy', '0', '4', '1'),
(37, 'London Footstool', 4, '799.00', 'Looking for a touch of class and sophistication in your home? The London Footstool is the perfect choice. This elegant footstool is available in a range of leathers and fabrics, making it easy to find the perfect match for your decor. The London Footstool is one of our best selling models and is sure to add a touch of luxury to any space.', 0x73746f6f6c2d312e706e67, 'FOOTSTOOL, LONDON, SMALL, CHAMPAGNE', 5, 'Champagne', '0', '2', ''),
(38, 'Stringer Stool', 4, '559.00', 'One of our best selling models this stool is available in 4 sizes from our smallest at 55cm to our longest at 120cm in length, making it a perfect addition to any space.\r\n\r\nThe ultimate in style and comfort the Stringer is a stunning footstool. A fully padded and upholstered body boasting deep buttoning throughout, this model stands close to the floor making it extra sturdy, as well as extra luxurious.', 0x73746f6f6c2d322e706e67, 'STOOL, STRINGER, SMALL, SLATEGRAY, GREY, GRAY', 5, 'Slate Gray', '0', '2', ''),
(39, 'Marlborough Footstool', 4, '679.00', 'Sit back, relax, and put your feet up in lavish style with the Marlborough footstool.\r\n\r\nThe Marlborough’s deep buttoned upholstery and pleated border make it the perfect piece for any space whether accompanying a Chesterfield sofa or chair or adding a touch of luxury to a lounge or office.\r\n\r\nSitting proudly on four wide turned ‘Vegas’ style feet there is no denying that the Marlborough is dripping in elegance and class from head to toe.\r\n\r\nCombining style, luxury, and purpose, this model is also available as a footstool. Give your space a helping of clever storage without compromising on style or quality.', 0x73746f6f6c2d332e706e67, 'MEDIUM, FOOTSTOOL, OLIVE, MARLBOROUGH', 5, 'Olive', '0', '3', ''),
(40, 'Duchess Chaise Longue', 4, '1448.00', 'As the name suggests the Duchess is a truly regal piece. An elegant silhouette with a timeless poise, the Duchess is a traditional Chaise Longue modernised with quality craftsmanship and build.\r\n\r\nFlaunting smooth, gentle curves throughout its back and side and a fixed seat this model radiates glamour and elegance throughout any space while being a supportive sit.\r\n\r\nAs standard, this model boasts deep buttoning to the back and sides with a delicately rolled top, a smooth leather fixed seat, and exquisite cabriole legs; giving the Duchess some serious wow factor.', 0x6c6f756e67652d312e706e67, 'CHAISELOUNGES, DUCHESS, LONGUE, WHITE, MEDIUM', 5, 'White', '0', '3', '0'),
(41, 'Chatsworth Footstool', 3, '469.00', 'The Chatsworth encompasses all the style and charm of a Chatsworth Chesterfield Sofa, on a much smaller scale.\r\n\r\nThe perfect complement to your Chatsworth as well as any of our other models, this footstool boasts the same deeply buttoned top, soft cushioning, hand studded finish, and strong wooden legs expected from a quality Chesterfield inspired piece.', 0x73746f6f6c2d342e706e67, 'CHATSWORTH, FOOTSTOOL, IVORY, SMALL', 5, 'Ivory', '0', '2', ''),
(42, 'Walcott Footstool', 1, '419.00', 'Offering a beautiful blend of contemporary and classic the Walcott footstool is the perfect accessory to your Chesterfield sofa, suite, or chair.\r\n\r\nSoftly padded with a smooth upholstered seat the Walcott offers a firm and comfortable footrest, perfect for those looking for a firmer, more supportive footstool.\r\n\r\nAesthetically, the Walcott offers luxury in the details. A plain border, hand finished studding framing the upholstery, and support from a sturdy, solid mahogany H bar undercarriage guarantee a luxury that will last.', 0x73746f6f6c2d352e706e67, 'SMALL, FOOTSTOOL, WALCOTT, CHOCOLATE, DARKBROWN', 5, 'Chocolate', '0', '2', ''),
(43, 'Newby Footstool', 2, '479.00', 'Offering the same luxurious poise as our Newby wing chair, this footstool is an exquisite example of formal elegance.\r\n\r\nBoasting a solid hardwood frame and soft, gently padding encased in deeply buttoned upholstery, finished with hand studding and luxe cabriole legs. The Newby footstool though small in size lacks nothing in substance.', 0x73746f6f6c2d362e706e67, 'SMALL, NEWBY, FOOTSTOOL, CHOCOLATE, DARKBROWN', 5, 'Chocolate', '0', '2', ''),
(44, 'ragley Footstool', 1, '389.00', 'With a regal look, the Ragley footstool has a buttoned top and straight hardwood legs – both make it the perfect option for a traditional home.\r\n\r\nWhen it comes to colour, you will be spoiled for choice. Our fabrics and luxury Italian leather is available in a host of shades, from antique browns to vibrant reds. The standard configuration for this piece is bronze renaissance studs and mahogany stain wood, but each of these details can be customised to allow you to create a truly bespoke piece.', 0x73746f6f6c2d372e706e67, 'SMALL, BLACK, RAGLEY, FOOTSTOOL', 5, 'Black', '0', '2', ''),
(45, 'Topper Cusion', 4, '159.00', 'If you would like to make your new chesterfield sofa even more comfortable to sit on, why not purchase one of our superb topper cushions. These can be made to match your existing sofa, with a vast range of colours, leathers and fabrics to choose from.\r\n\r\nLike each of our sofas, our skilled craftsmen in our UK workshop make our topper cushions to order and for your additional peace of mind that you will be getting only the best, they won’t be released for delivery until they have undergone our rigorous quality inspection program. Once our craftsmen are satisfied, your new topper cushion or cushions will be sent out directly to you.', 0x63757368696f6e2d312e706e67, 'SMALL, CUSHION, RED, TOPPER', 5, 'Red', '0', '2', ''),
(46, 'Paris Chaise Longue', 3, '2009.00', 'Offering the ultimate in comfort, our Paris chaise lounge has a fully-padded and buttoned back to give the whole body the support it needs.\r\n\r\nWith a fully-buttoned finish, rolled head and foot endings, this chaise lounge offers an extremely modern look. Featuring serpentine springs buttoned down over a beechwood frame, the chaise lounge is studded in a style of your choice.', 0x6c6f756e67652d322e706e67, 'MEDIUM, CHAISELOUNGES, LONGUE, CHAISE, BLUE, DARKBLUE, NAVYBLUE, PARIS', 5, 'Navy Blue', '0', '3', ''),
(47, 'Lincoln Chair', 1, '1259.00', 'Looking for a regal and timeless addition to your home? Look no further than the Lincoln Chair! This grandiose and stately chair is perfect for any space, from living rooms and dens to offices and studies. The Lincoln Chair features a classic silhouette that is sure to impress, and its spacious proportions make it incredibly comfortable. Whether you’re relaxing with a good book or entertaining guests, the Lincoln Chair is sure to be a hit. Order yours today and see what all the fuss is about!', 0x63686169722d312e706e67, 'CHIARS, LINCOLN, CHOCOLATE, DARKBROWN, SMALL, 1SEAT', 4, 'Chocolate', '0', '2', '4'),
(48, 'Newby Wing Chair', 2, '1179.00', 'The Newby radiates the formal grandeur of a Wingback chair in style, matching that and then some in substance. Offering a very comfortable seat and a soothing, snuggly design.\r\n\r\nA solid beech frame, high supportive back, upright arms, and an additional seat cushion support your body in a soft yet supportive sit. Not to mention its beautiful winged sides, blocking out drafts, keeping the heat in, and ensuring you are sitting snuggly.\r\n\r\nPerfect for perching in front of an open fire or as a supportive and stylish addition to a traditional office.', 0x63686169722d322e706e67, 'CHOCOLATE, DARKBROWN, SMALL, NEWBY, WING CHAIR, CHAIRS', 4, 'Chocolate', '0', '2', '4'),
(49, 'Paxton Wing Chair', 3, '1489.00', 'Boasting grandiose proportions and a timeless silhouette, the Paxton Wing Chair will look stunning in every space.\r\n\r\nShowcasing a high back measuring over 120cm tall, a fully buttoned interior, and a plush seat cushion, the Paxton simply cradles you with comfort and support. Its extra-deep, hand-stuffed cushions, solid mahogany H-bar undercarriage and, luxurious wings truly set the Paxton apart as a statement piece.\r\n\r\n', 0x63686169722d332e706e67, 'DIMGRAY, GREY, GRAY, PAXTON, WING CHAIR, CHAIRS, 1SEAT, SLATEGRAY', 4, 'Slate Gray', '0', '2', '4'),
(50, 'Highlcere Wing CHair', 4, '1169.00', 'One of our original and oldest designs the Highclere Wing Chair is a testament to our high quality and enduring design, promising to stand the test of time.\r\n\r\nA foundation of strong solid beech for its frame, mounted on polished mahogany cabriole legs and enveloped in rich buttoned upholstery and hand studded detailing, the Highclere showcases its premium quality throughout.\r\n\r\nA high buttoned back and additional seat cushion provide ample support for the back while maintaining a soft and comfortable sit. Flaunting the elegant winged sides of a traditional wingback chair the silhouette of the Highclere promises to impress in any setting.', 0x63686169722d342e706e67, 'CHAIRS, HIGHCLERE WING CHAIR, RED, 1SEAT, MEDIUM', 4, 'Red', '0', '3', '4'),
(51, 'Richmond Tub Chair', 1, '949.00', 'A uniquely low sitting silhouette boasting the snuggle style of a tub chair, The Richmond is a unique has buckets of charm and charisma. Perfect for injecting some style into compact spaces in the home or office.\r\n\r\nIt’s sloping back and gently curved arms provide comfort and support where you need it most while keeping you cosy in a snug low seat.\r\n\r\nOne of our most minimalist silhouettes the Richmond doesn’t lack the finer details! With tapered mahogany legs, a plain border, subtle piping, and hand studded detailing the Richmond combines traditional design staples with a sleek minimal look.', 0x63686169722d352e706e67, 'SMALL, TURQUOISE, CHAIRS, RICHMOND TUB CHAIR, 1SEAT', 4, 'Turquoise', '0', '2', '4'),
(52, 'Rockingham Club Chair', 2, '1259.00', 'A timeless silhouette, the Rockingham Tub Chair oozes sophistication.\r\n\r\nA slightly raised back and gently sloping arms give this model undeniable elegance and ample support for the back, while its added seat cushion provides a comfortable, padded sit. Making the Rockingham the perfect choice for the office or the home.\r\n\r\nTraditional elements such as a deep buttoned back and hand studded detailing bring the Rockingham’s elegance to life. Don’t let this quaint elegance fool you, supported with fixed, straight mahogany legs the Rockingham boasts both style and substance. Guaranteed to stand the test of time in any home or office environment.', 0x63686169722d362e706e67, 'IVORY, CHAIRS, ROCKINGHAM CLUB CHAIR, SMALL, 1SEAT', 4, 'Ivory', '0', '2', '4'),
(53, 'Oxford Plain Tub Chair', 3, '939.00', 'Just as striking as our classic Oxford Tub Chair, the Plain Oxford offers the same solid hardwood frame and poised elegance with a sleeker and more contemporary twist.\r\n\r\nA fixed, semi-rounded back and flat, sprung seat with interior padding throughout, the Oxford is finished with a smooth leather exterior.  This makes for some serious support and a slightly softer sit than our classic Oxford model.\r\n\r\nWhile sleek in appearance, the Oxford isn’t lacking in the markers of a quality piece. Flaunting subtle piping, a hand studded trim and mahogany turned feet finished with brass castors to the front this Oxford seamlessly combines modern sleek with traditional quality.', 0x63686169722d372e706e67, 'OLIVE, CHAIRS, SMALL, OXFORD PLAIN TUB CHAIR, 1SEAT', 4, 'Olive', '0', '2', '4'),
(54, 'Burghley Tub Chair', 4, '1069.00', 'Radiating the same unique, individual flair of the Burghley sofa, this chair perfectly combines subtle originality with elegant professionalism. Perfect for contemporary office spaces, reception rooms, or studies.\r\n\r\nFollowing the Burghley sofa in shape, the chair boasts a double contoured back, chamfered upper line tapering to its silhouette, and a quality buttoning throughout the arms, back, and seat base. The shape and composition of this model offers a firmer and more supportive sit, making this an excellent choice for offices and studies where you’ll need prolonged support.\r\n\r\nThe finer details such as a hand studded trim following the curves of its silhouette and tapered mahogany legs the Burghley is the definition of compact quality.', 0x63686169722d382e706e67, 'TEAL, SMALL, CHAIRS, BURGHLEY TUB CHAIR, 1SEAT', 4, 'Teal', '0', '2', '4'),
(55, 'Chelsea Tub Chair', 2, '1159.00', 'A super stylish traditional tub chair the Chelsea is built for maximum comfort and a super soft sit.\r\n\r\nA higher back supports your body where you need it most, combined with a low frame, and traditional upright arms cradling your body with support and a soft sit. With ample padding covering its hardwood frame and a cushioned fixed seat the Chelsea offers a double dose of comfort to an elegant and stylish design.\r\n\r\nHand-made and lovingly finished with elegant piping, studded detailing, and subtly tapered mahogany legs the Chelsea promises to make a statement in any space from home offices and studies to reception rooms and lounges.', 0x63686169722d392e706e67, 'IVORY, CHELSEA TUB CHAIR, CHAIRS, 1SEAT, MEDIUM', 4, 'Ivory', '0', '3', '4'),
(56, 'Paris Chair', 4, '1139.00', 'Featuring the same unique silhouette as the Paris sofa, the Paris chair exudes a real wow factor.\r\n\r\nWith a fully buttoned and delicately curved body, this model promises the support and comfort your body deserves while giving your space the style it longs for.\r\n\r\nFlaunting a lavish, rolled head and foot it is certain that opulent style and extreme comfort go hand in hand with the Paris. A comfort built into the spring buttoned beech wood frame, ensuring quality and style that lasts. Finish the delicate design with studded detailing of your choice to bring your vision to life.', 0x63686169722d31372e706e67, 'PURPLE, CHAIRS, PARIS CHAIR, LARGE, 1SEAT', 4, 'Purple', '0', '4', '4'),
(57, 'Ragley Tub Chair', 1, '1039.00', 'The Ragley, like most tub chairs within our collection, provides an easy, comfortable sit and an undeniably charming style.\r\n\r\nIts low semi-circular back and level arms support your posture, while the cushioning in the back, arms and, seat cradle you in a firm and comfortable style. A sturdy beech hardwood frame topped with serpentine springs and arched padding gives the Ragley its extremely comfortable seat. Quality craftsmanship and materials ensure that this comfort stands the test of time.', 0x63686169722d31392e706e67, 'BEIGE, OFFWHITE, CHAIRS, RAGLEY TUB CHAIR, SMALL, 1SEAT', 4, 'Beige', '0', '2', '4'),
(58, 'Oxford Tub Chair', 4, '1079.00', 'Striking and traditional, the Oxford Tub Chair possesses the grace of a Chesterfield sofa, on a much smaller scale.\r\n\r\nA deep buttoned, semi-circular back offers a firm yet comfortable support while a sprung and padded seat provides a comfortable and cosy sit.\r\n\r\nBoasting solid mahogany legs to the rear and quality brass castors to the front and a hand studded trim along classic upright arms, the Oxford is a seriously stylish, traditional build.', 0x63686169722d31382e706e67, 'SMALL, CHAIRS, OXFORD TUB CHAIR, RED, 1SEAT', 4, 'Red', '0', '2', '4'),
(59, 'Osborne Wing Chair', 2, '1289.00', 'If you are looking for a chair that is as striking as it is comfortable look no further than the Osborne Wing Chair.\r\n\r\nAn ideal blend of traditional elegance and complete comfort, our Osborne has it all. Flaunting luxurious padding throughout the frame, a deep buttoned back and opulent winged sides comfort and support are in ample measure. A high buttoned back offers support, while the padding boosts all-around comfort, made even more heavenly with an additional seat cushion.\r\n\r\nMahogany Cabriole legs and hand finished studding along its curves the Osborne boasts lavish style in every inch.', 0x63686169722d31302e706e67, 'MEDIUM, CHAIRS, OSBORNE WING CHAIR, 1SEAT, GREEN', 4, 'Green', '0', '3', '4'),
(60, 'Spencer Office Chair', 3, '1239.00', 'A traditional and timeless silhouette, the Spencer sets the blueprint for a comfortable and professional office chair.\r\n\r\nElegant hand-carved wooden arms lend support to a high back and padded seat, offering cushioned comfort with support for the back and arms, helping maintain posture while staying comfortable. The structural quality of this chair can be felt from its beech wood frame to its hand-carved 5-point legs and the rich fabrics, paddings, and materials used throughout.\r\n\r\nCareful finishing touches such as hand studding give this chair a subtle wow factor that completes this traditional style.', 0x63686169722d31312e706e67, 'COFFEE, BROWN, DARKBROWN, CHAIRS, SPENCER OFFICE CHAIR, MEDIUM, 1SEAT', 4, 'Coffee', '0', '3', '4'),
(61, 'Gainsborough Chair', 1, '1279.00', 'The Gainsborough is grand in quality, poise, and structure with support, and style built to stand the test of time.\r\n\r\nA luxuriously deep buttoned back, smooth padded leather seat, and 5-point hand-carved legs there’s opulence embedded in every inch of the Gainsborough. Carefully handcrafted with metallic studding and carved wooden arms, matching the lavish mahogany legs there is no end to the elegance of the Gainsborough.\r\n\r\nConstructed with comfort and support in mind this chair couples a supportive back with a soft seat, encased in padding and premium quality fabrics. So, this chair is perfect for hard-wearing office use, promising to remain not only stylish but comfortable.', 0x63686169722d31322e706e67, 'MEDIUM, CHOCOLATE, DARKBROWN, 1SEAT, CHAIRS, GAINSBOROUGH CHAIR', 4, 'Chocolate', '0', '3', '4'),
(62, 'Directors Office Chair', 3, '1659.00', 'There are few styles offering the grandeur that our Director’s Chair does.\r\n\r\nFlaunting a high, rounded back and padded upright arms encased in deeply buttoned upholstery this is perfect for prolonged support. Its smooth seat brimming with soft padding guarantees that this chair certainly has the executive appeal in both appearance and comfort.\r\n\r\nHardwearing and sturdy, the Director’s chair is as its name suggests, is the ideal choice for professional spaces, from director’s offices to boardrooms. Boasting an enduring quality and build promising to retain its style and comfort even with daily use.', 0x63686169722d31332e706e67, 'DESERT SAND, GOLD, 1SEAT, CHAIRS, DIRECTORS OFFICE CHAIR, MEDIUM', 4, 'Desert Sand', '0', '3', '4'),
(63, 'Captains Chair', 2, '1239.00', 'Giving off a classic naval feeling, the Captain’s chair is a timeless piece ideal for a more traditional office space.\r\n\r\nA curved back, extending to lightly padded arms offers a combination of sturdy wood and cushioned padding, topped with deeply buttoned upholstery. These design features mean the Captain’s chair provides a more supportive sit than our other models. While padding to the back and seat help it retain heaps of comfort where it matters.\r\n\r\nA fixed seat topped with smooth leather this offers a firm yet comfortable sit, maintaining the refined look of the Captain’s chair.\r\n\r\nCarefully finished with hand studded detailing and mahogany stain 5-point legs on castors the Captain’s chair is robust and practical, perfect for an office space that needs both style and substance.', 0x63686169722d31342e706e67, 'BLACK, BROWN, WOOD, CHAIRS, CAPTAINS CHAIR, SMALL, 1SEAT', 4, 'Black', '0', '2', '4'),
(64, 'Brocket Swivel Chair', 4, '1339.00', 'Classically built and elegant, the Brocket Swivel Chair is the perfect piece for a traditional study or home office.\r\n\r\nIts high, buttoned leather back and lower, upright arms offer sturdier back support while padding in this area provides a subtle comfort. A smooth leather seat with cushioned padding gives this chair a boost of comfort that ties in perfectly with the supportive upright back.\r\n\r\nElegant hand studded detailing gives the Brocket a luxurious feel while mahogany stain arms and legs amplify a sturdy and hard-wearing frame.', 0x63686169722d31352e706e67, 'MEDIUM, RED, CHAIRS, BROCKET SWIVEL CHAIR, 1SEAT', 4, 'Red', '0', '3', '4'),
(65, 'Admiral Office Chair', 1, '1279.00', 'The Admiral Office Chair is a definite attention seeker, capturing any space with its bold presence.\r\n\r\nIts traditional design features ooze sophistication. Flaunting a padded and buttoned back, a smooth leather seat with internal padding and mahogany stain arms and subtle padding this chair is the perfect fusion of comfort and support. As a result, the Admiral is the ideal seat for offices and studies.', 0x63686169722d31362e706e67, 'MEDIUM, CHOCOLATE, DARKBROWN, 1SEAT, CHAIRS, ADMIRAL OFFICE CHAIR', 4, 'Chocolate', '0', '3', '4'),
(66, 'Hampton 3 Seat Bedstore Sofa - Selvaggio Sage Leather', 1, '1699.00', 'Hampton 3 Seat Chesterfield Sofa in Selvaggio Sage leather.\r\nBrand new, built for Stock in limited edition leather.\r\n\r\nFoam and Fibre Seats, Bronze Studs, Mahogany Legs.', 0x696e73746f636b2d312e706e67, 'INSTOCK, SELVAGGIO SAGE LEATHER, SOFA, LARGE, OLIVE', 10, 'Olive', '0', '4', '1'),
(67, 'Hampton 3 Seat Bedstore Sofa - Selvaggio Rum Leather', 1, '1699.00', 'Hampton 3 Seat Chesterfield Sofa in Selvaggio Rum leather.\r\nFoam and Fibre Seats, Bronze Studs, Mahogany Legs.\r\n\r\nBrand new, made for Stock in limited edition leather.', 0x696e73746f636b2d322e706e67, 'INSTOCK, SELVAGGIO RUM LEATHER, BROWN, HAMPTON, LIGHT BROWN, 3 SEATS, COPPER', 10, 'Copper', '0', '4', '1'),
(68, 'Hampton 3 Seat Bedstore Sofa - Selvaggio Hare Leather', 2, '1699.00', 'Hampton 3 Seat Chesterfield Sofa in Selvaggio Hare leather.\r\nBrand new, made for Stock in a limited edition leather.\r\nFoam and Fibre Seats, Bronze Studs, Mahogany Legs.', 0x696e73746f636b2d332e706e67, '3SEATS, LARGE, HAMPTON, SELVAGGIO HARE LEATHER, BRONZE', 10, 'Bronze', '0', '4', '1'),
(69, 'Hampton 3 Seat Bedstore Sofa - Lovely Asphalt FR Velvet', 4, '1399.00', 'Hampton 3 Seat Chesterfield Sofa in Lovely Asphalt velvet.\r\n\r\nFoam and Fibre Seats, Pleates Border, Renaissance Studs, Mahogany Legs.', 0x696e73746f636b2d342e706e67, '3SEATS, LOVELY ASPHALT FR VELVET, HAMPTON, TAUPE, DARKGREY', 10, 'Taupe', '0', '4', '1'),
(70, 'Wally Medium Sofa - House Grey Boucle', 4, '1499.00', 'Wally MEDIUM Sofa in House Grey Boucle. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.\r\n\r\n', 0x696e73746f636b2d352e706e67, '3SEATS, HOUSE GREY BOUCLE, WALLY, MEDIUM, GREY, GRAY', 10, 'Gray', '0', '3', '1'),
(71, 'Wally Medium Sofa - Plush Plate', 1, '1449.00', 'Wally MEDIUM Sofa in Plush Slate Velvet. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d362e706e67, '3SEATS, WALLY, PLUSH PLATE, GRAY, GREY, MEDIUM', 10, 'Gray', '0', '3', '1'),
(72, 'Wally Medium Sofa - Plush Silver', 3, '1499.00', 'Wally MEDIUM Sofa in Plush Silver Velvet. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d372e706e67, 'MEDIUM, 3SEATS, WHITE, SILVER, WALLY, SOFA, PLUSH SILVER', 10, 'Silver', '0', '3', '1'),
(73, 'Wally Medium Sofa - Amalfi Dove Velvet', 2, '1499.00', 'Wally MEDIUM Sofa in Amalfi Dove Velvet. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.\r\n\r\n', 0x696e73746f636b2d382e706e67, 'MEDIUM, 3SEATS, SILVER, WHITE, WALLY, SOFA, AMALFI DOVE VELVET', 10, 'Silver', '0', '3', '1'),
(74, 'Wally Medium Sofa - Amalfi Dark Blue', 1, '1449.00', 'Wally MEDIUM Sofa in Amalfi Dark Blue Velvet. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d392e706e67, 'MEDIUM, WALLY, SOFA, AMALFI DARK BLUE, PERSIAN BLUE, 3SEATS', 10, 'Persian Blue', '0', '3', '1'),
(75, 'Wally Medium Sofa - Plush Airforce Velvet', 4, '1499.00', 'Wally MEDIUM Sofa in Plush Airforce Velvet. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d31302e706e67, '3SEATS, WALLY, SOFA, VIRIDIAN, GREEN, PLUSH AIRFORCE VELVET, MEDIUM', 10, 'Viridian', '0', '3', '1'),
(76, 'Wally Small Sofa - Wild Rose Fabric', 3, '1399.00', 'Wally SMALL Sofa in Wild Rose FR Fabric. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d31312e706e67, 'SMALL, 2SEATS, WALLY, SOFA, WILD ROSE FABRIC, SALMON', 10, 'Salmon', '0', '2', '0'),
(77, 'Wally Small Sofa - LF1961FR 101 Dove Linen', 3, '1399.00', 'Wally SMALL Sofa in LF1961FR 101 Dove Linen. A statement piece, boasting elegantly arched arms, a deep seat, and turned feet, the Wally sofa is a contemporary adaptation of the Chesterfield sofa.', 0x696e73746f636b2d31322e706e67, 'SMALL, 2SEATS, WALLY, SOFA, LF1961FR 101 DOVE LINEN, APRICOT', 10, 'Apricot', '0', '2', '0'),
(78, 'London Bedstore Sofa (Option E) - Dune Sand Leather', 2, '6139.00', 'London Chesterfield Corner Sofa in Dune Sand Leather* (colour in gallery).\r\n\r\nOption E (see original listing for sizing)\r\n\r\nSingle Button, Foam and Fibre Seats, Renaissance Studs, 8 x Mahogany Legs.', 0x696e73746f636b2d31332e706e67, 'EXTRALARGE, 5SEATS, BURGANDY, RED, BROWN, LONDON, SOFA, DUNE SAND LEATHER', 10, 'Burgandy', '0', '5', '3'),
(79, 'Windsor Corner Bedstore Sofa - Dune Grey Leather', 3, '4799.00', 'Windsor Chesterfield Corner Sofa in Dune Grey leather (Option E).\r\n\r\nStandard Base, Single Button Border, Renaissance studs, mahogany legs.', 0x696e73746f636b2d31342e706e67, '5SEATS, GREY, GRAY, DUNE GREY LEATHER, WINDSOR, CORNER, EXTRALARGE, BEDSTORESOFA', 10, 'Gray', '0', '5', '3'),
(80, 'Blenheim Corner Sofa (Option E) - Dune Tan Leather', 3, '6099.00', 'Blenheim Chesterfield Corner Sofa (option E) in dune tan leather.\r\n\r\nGrand in quality and proportion, the Blenheim is sure to make a bold and distinguished statement in your space. With its traditional silhouette, fans of the classic Chesterfield style will adore the Blenheim.\r\n\r\nStandard Base, Renaissance Studs, Single Buttoned Border, Mahogany legs.', 0x696e73746f636b2d31352e706e67, 'EXTRALARGE, GOLD, 5SEATS, BLENHEIM, CORNER SOFA, DUNE TAN LEATHER', 10, 'Gold', '0', '5', '3');
INSERT INTO `products` (`p_id`, `p_name`, `p_brand`, `p_price`, `p_desc`, `p_image`, `p_tags`, `p_cat`, `p_color`, `status`, `p_size`, `p_seats`) VALUES
(81, 'Belchamp 2 Seat Bedstore Sofa - LF1961FR 101 Dove', 3, '1049.00', 'Belchamp 2 Seat Chesterfield Sofa in LF1961FR 101 Dove. The Belchamp combines a formal, distinguished look with a softer, yet surprisingly supportive sit.\r\n\r\nFoam and Fibre seats, Piping Only, Brass Casters/ Mahogany Legs.\r\n\r\nPleated Border. Brand new condition, made for Stock.', 0x696e73746f636b2d31362e706e67, '2SEATS, BELCHAMP, BEDSTORESOFA, MEDIUM, DESERT SAND, LF1961FR 101 DOVE', 10, 'Desert Sand', '0', '3', '0'),
(82, 'Belchamp 2 Seat Bedstore Sofa - LF1961FR 126 Graphite Fabric', 1, '1049.00', 'Belchamp 2 Seat Chesterfield Sofa in LF1961FR 126 Graphite Fabric. The Belchamp combines a formal, distinguished look with a softer, yet surprisingly supportive sit.\r\n\r\nFoam and Fibre seats, Piping Only, Brass Casters/ Mahogany Legs.\r\n\r\nPleated Border. Brand new condition, made for Stock.', 0x696e73746f636b2d31382e706e67, '2SEATS, MEDIUM, BEDSTORESOFA, BELCHAMP, LF1961FR 126 GRAPHITE FABRIC, GREY, GRAY, SLATE GRAY', 10, 'Slate Gray', '0', '3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'Anees@gmail.com'),
(2, ''),
(3, 'Anees123@gmail.com'),
(4, 'Anees1234@gmail.com'),
(5, 'princeanees456@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(4, 'Anis', 'anis@gmail.com', '19f3877d01660401e6644601b2df1665'),
(5, 'prince anees', 'princeanees456@gmail.com', '19f3877d01660401e6644601b2df1665');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costumer_id` (`costumer_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_cat` (`p_cat`),
  ADD KEY `p_brand` (`p_brand`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`p_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`p_brand`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
