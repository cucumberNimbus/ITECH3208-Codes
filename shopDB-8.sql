-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2024 at 11:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT 'not_set',
  `full_name` varchar(100) DEFAULT 'not_set',
  `address` text NOT NULL DEFAULT 'not_set',
  `phone_number` text NOT NULL DEFAULT 'not_set',
  `dob` text NOT NULL DEFAULT 'not_set',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `username`, `pwd`, `email`, `full_name`, `address`, `phone_number`, `dob`, `date_created`) VALUES
(6, 'emp15', '$2y$12$x2WQj2XuI4hcjekCj.3FBOYz3RYB.Wb0Um5lvpIKNM8U9SHJXJWw2', 'not_set', 'not_set', 'not_set', 'not_set', 'not_set', '2024-06-06 04:22:02'),
(7, 'emp', '$2y$12$7urt5TJlgz68FHU.sazx7.ZzG0g0mvSTSh0QwO67ENmQbnS27IMzC', 'emp@gmail.com', 'emplouee', 'emp address', '9923992398', '83/23/2332', '2024-06-09 04:17:11'),
(8, 'user4`', '$2y$12$oPGzzWjCI8llgLL9v5G95OxKC3hcMvG4qOcoLgj7lTDUf2mwJ1xGW', 'not_set', 'not_set', 'not_set', 'not_set', 'not_set', '2024-06-13 08:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`item_id`, `order_id`, `prod_id`, `quantity`, `total_price`) VALUES
(50, 66, 4, 1, 110.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_placed`
--

CREATE TABLE `order_placed` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_address` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `delivery_status` enum('in progress','delivered') DEFAULT 'in progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_placed`
--

INSERT INTO `order_placed` (`order_id`, `user_id`, `user_address`, `total_price`, `order_date`, `delivery_status`) VALUES
(66, 16, '231 Cooper Road, Yagoona, Sydney', 110.00, '2024-06-13 17:20:24', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking_updates`
--

CREATE TABLE `order_tracking_updates` (
  `update_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `update_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','order received','order shipped','order in transit','order delivered') DEFAULT 'pending',
  `comment` text DEFAULT 'No comment yet',
  `updated_by` varchar(50) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tracking_updates`
--

INSERT INTO `order_tracking_updates` (`update_id`, `order_id`, `update_date`, `status`, `comment`, `updated_by`) VALUES
(14, 66, '2024-06-13 17:20:24', 'pending', 'No comment yet', 'User'),
(15, 66, '2024-06-13 09:23:12', 'order shipped', 'Ongoing progress', 'admin'),
(16, 66, '2024-06-13 09:23:36', 'order in transit', 'Will arrive soon later', 'admin'),
(17, 66, '2024-06-13 09:28:20', 'pending', 'sorry, error in transit', 'emp');

-- --------------------------------------------------------

--
-- Table structure for table `prod_detail`
--

CREATE TABLE `prod_detail` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `search_name` text NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_gender` char(5) NOT NULL,
  `prod_image_location` text NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `in_stock` int(10) DEFAULT 0,
  `number_bought` int(11) NOT NULL DEFAULT 0,
  `number_viewed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prod_detail`
--

INSERT INTO `prod_detail` (`id`, `prod_name`, `search_name`, `prod_price`, `prod_description`, `prod_gender`, `prod_image_location`, `image_type`, `in_stock`, `number_bought`, `number_viewed`) VALUES
(5, 'Bleecker Pima Cotton Chinos', 'bleeckerpimacottonchinos', 184.00, 'One of the world\'s leading designer lifestyle brands, embodies the spirit of classic American style. This collection debuted in the mid-1980s, with timeless classics like button-up shirts, chinos, and', 'men', '../prod_image/bleeckerpimacottonchinos.png', 'image/png', 1000, 5, 0),
(6, 'Therma Fit taper pants', 'thermafittaperpants', 149.00, 'Your workouts don\'t stop when the cool weather begins, so we added supersoft fleece to our Therma Pants. Designed to keep you feeling warm and comfortable wherever you exercise, their relaxed and tape', 'men', '../prod_image/thermafittaperpants.png', 'image/png', 1000, 0, 0),
(8, ' Staple Trackpants', 'stapletrackpants', 145.00, 'Introducing our Commons Mens basic trackpants, an essential complement to any outfit. These trackpants are comprised of a soft and breathable cotton/polyester combination for maximum comfort throughou', 'men', '../prod_image/stapletrackpants.png', 'image/png', 998, 2, 0),
(10, 'Short  Sleeve Stitch Top', 'shortsleevestitchtop', 49.00, 'This fashionable blouse features a loose knit style with a deep V-Neck collar, turn-up short sleeves, and stitched embellishments', 'women', '../prod_image/shortsleevestitchtop.png', 'image/png', 1000, 0, 0),
(11, 'Cap Sleeve T-Shirts ', 'capsleevet-shirts', 56.00, 'Update your basics with this pack of three flattering capsleeve T-shirts. Made with 100% cotton thatis breathable and comfortable.', 'women', '../prod_image/capsleevet-shirts.png', 'image/png', 1000, 0, 0),
(12, 'Lipsy High Neck Long Sleeve Blouse', 'lipsyhighnecklongsleeveblouse', 89.00, 'A beautiful printed blouse from Lipsy. This stylish blouse is perfect for date to dinner. Featuring: Printed, Long sleeves, lightweight fabric, Button fastening.', 'women', '../prod_image/lipsyhighnecklongsleeveblouse.png', 'image/png', 1000, 0, 0),
(13, 'Maternity And Nursing Vest Tops', 'maternityandnursingvesttops', 29.00, 'Our best-selling Maternity & Nursing Vest Tops will become wardrobe classics, thanks to their timeless design and ingenious features that are ideal for pregnant and nursing women. The soft-stretch cot', 'women', '../prod_image/maternityandnursingvesttops.png', 'image/png', 1000, 0, 0),
(14, ' Joules Erin Short Sleeve T-Shirt', 'jouleserinshortsleevet-shirt', 65.00, 'Regular fit t-shirt, perfect partner to a Lipsy jeans and tipped sleeves. Featuring Lipsy logo, stretchy jersey fabric, contrast piping.', 'women', '../prod_image/jouleserinshortsleevet-shirt.png', 'image/png', 1000, 0, 0),
(15, 'JDY Broderie Frill Detail T-Shirt', 'jdybroderiefrilldetailt-shirt', 70.00, 'Cotton is made of natural fibres creating a soft, breathable fabric. JDY is a full-concept, international fashion brand offering affordable and on-trend products to the fashion-conscious consumer.', 'women', '../prod_image/jdybroderiefrilldetailt-shirt.png', 'image/png', 1000, 0, 0),
(16, 'Short Sleeve Lettuce Edge T-Shirt', 'shortsleevelettuceedget-shirt', 59.00, 'This short sleeve top is perfect for the gym, running or sports, featuring a sweat-wicking fabric with raglan sleeves and a crewneck collar, finished in a geometric pattern.', 'women', '../prod_image/shortsleevelettuceedget-shirt.png', 'image/png', 1000, 0, 0),
(17, 'Twill Chore Shacket over-shirt', 'twillchoreshacketover-shirt', 150.00, ': Inspired by heritage workplace attire, this fashionably basic shacket is made of 100% cotton and features a button-up front, dual patch pockets, and a single chest pocket for the ultimate chore jack', 'men', '../prod_image/twillchoreshacketover-shirt.png', 'image/png', 1000, 0, 0),
(18, 'Easy Care Double Cuff Shirt', 'easycaredoublecuffshirt', 139.00, 'Make everyday styling a breeze with our slim fit, double cuff easy care shirt in black. Easy to iron, comfortable and practical, this shirt is designed to take the stress out of dressing.', 'men', '../prod_image/easycaredoublecuffshirt.png', 'image/png', 999, 1, 0),
(19, 'Single Cuff Signature Trimmed Shirt', 'singlecuffsignaturetrimmedshirt', 150.00, 'In a choice of a regular or slim fit, our pure cotton long sleeve shirts are the perfect addition to your smart casual and formal wear staples, featuring a split back yoke, a button-up fastening and a', 'men', '../prod_image/singlecuffsignaturetrimmedshirt.png', 'image/png', 998, 2, 0),
(20, 'Male Clothes For Spring And Fall Business- Occasion', 'maleclothesforspringandfallbusiness-occasion', 120.00, 'The design of this button-up shirt is perfect for any formal occasion, making it a must-have in your wardrobe.', 'men', '../prod_image/maleclothesforspringandfallbusiness-occasion.png', 'image/png', 999, 1, 0),
(21, 'Reiss Scott Brushed Check Overshirt', 'reissscottbrushedcheckovershirt', 130.00, 'No autumn wardrobe is complete without an overshirt. Consider the Scott, a wool-cotton blend that has been brushed for a pleasant hand feel and woven into a classic blue checked design. A press-stud f', 'men', '../prod_image/reissscottbrushedcheckovershirt.png', 'image/png', 999, 1, 0),
(22, 'Printed Trimmed Shirt', 'printedtrimmedshirt', 125.00, 'This attractive trimmed shirt has a traditional regular fit, a single cuff, a button-up closure, and a classic collar. It is made of easy-to-iron material.', 'men', '../prod_image/printedtrimmedshirt.png', 'image/png', 999, 1, 0),
(23, ' Linen Blend Short Sleeve Shirt', 'linenblendshortsleeveshirt', 87.00, 'Our short sleeve shirt, a summer essential, will keep you looking and feeling cool even in the heat. The traditional shirt is made of a soft and breathable linen blend and features button fastenings d', 'men', '../prod_image/linenblendshortsleeveshirt.png', 'image/png', 1000, 0, 0),
(24, 'Easy Iron Button-Down Oxford Shirt', 'easyironbutton-downoxfordshirt', 99.00, 'Elevate your smart attire with our easy iron button-down oxford shirt. Designed in a classic and trendy gingham print, this shirt features short sleeves, a smart collar, and a chest pocket. With an ea', 'men', '../prod_image/easyironbutton-downoxfordshirt.png', 'image/png', 998, 2, 0),
(25, 'Classic Denim Jacket', 'classicdenimjacket', 69.00, ' Elevate your casual style with our Classic Denim Jacket. Crafted from premium quality denim, this jacket features a timeless design with button-front closure and multiple pockets. Perfect for layerin', 'men', '../prod_image/classicdenimjacket.jpg', 'image/jpeg', 1000, 0, 0),
(27, 'Leather Moto Jacket', 'leathermotojacket', 89.00, 'Make a statement with our Leather Moto Jacket. Crafted from supple genuine leather, this jacket exudes rugged sophistication. With its asymmetrical zip closure and multiple pockets, it combines style ', 'men', '../prod_image/leathermotojacket.jpg', 'image/jpeg', 1000, 0, 0),
(28, 'Waterproof Windbreaker', 'waterproofwindbreaker', 114.00, 'Conquer the elements with our Waterproof Windbreaker. Designed for outdoor enthusiasts, this jacket offers superior protection against wind and rain while keeping you comfortable with its breathable f', 'men', '../prod_image/waterproofwindbreaker.jpg', 'image/jpeg', 1000, 0, 0),
(29, 'Puffer Jacket', 'pufferjacket', 78.00, 'Stay cozy and stylish in our Puffer Jacket. Filled with lightweight yet insulating down, this jacket provides warmth without the bulk. The sleek design and versatile colour options make it a perfect c', 'men', '../prod_image/pufferjacket.jpg', 'image/jpeg', 1000, 0, 0),
(31, 'Fleece-Lined Hoodie Jacket', 'fleece-linedhoodiejacket', 156.00, 'Stay comfortable on chilly days with our Fleece-Lined Hoodie Jacket. This jacket combines the casual style of a hoodie with the warmth of fleece lining, making it perfect for layering or wearing on it', 'men', '../prod_image/fleece-linedhoodiejacket.jpg', 'image/jpeg', 1000, 0, 0),
(32, 'Techwear Utility Jacket', 'techwearutilityjacket', 167.00, 'Embrace urban utility with our Techwear Utility Jacket. Constructed from durable technical fabrics, this jacket offers a modern take on functional outerwear. With its multiple pockets and adjustable f', 'men', '../prod_image/techwearutilityjacket.jpg', 'image/jpeg', 1000, 0, 0),
(33, 'Faux Leather Moto Jacket', 'fauxleathermotojacket', 121.00, 'Add a touch of edge to your look with our faux leather moto jacket. Crafted from high-quality faux leather, this jacket features a stylish asymmetrical zip closure, zippered pockets, and quilted detai', 'women', '../prod_image/fauxleathermotojacket.jpg', 'image/jpeg', 1000, 0, 0),
(36, 'Fleece-Lined Bomber Jacket', 'fleece-linedbomberjacket', 110.00, 'Stay cozy on chilly days with our fleece-lined bomber jacket. Made from soft and warm fleece, this jacket features a zip-up front, ribbed cuffs and hem, and two side pockets. Perfect for casual outing', 'women', '../prod_image/fleece-linedbomberjacket.jpg', 'image/jpeg', 1000, 0, 0),
(37, 'Denim Trucker Jacket', 'denimtruckerjacket', 115.00, 'Add a classic staple to your wardrobe with our denim trucker jacket. Made from durable denim fabric, this jacket features a button-up front, chest pockets, and a versatile medium wash. Perfect for lay', 'women', '../prod_image/denimtruckerjacket.jpg', 'image/jpeg', 1000, 0, 0),
(38, 'Faux Fur Teddy Coat', 'fauxfurteddycoat', 134.00, 'Stay cozy and chic in our faux fur teddy coat. Made from plush faux fur, this coat features a relaxed silhouette, notched lapels, and concealed snap button closure. Perfect for adding a luxurious touc', 'women', '../prod_image/fauxfurteddycoat.jpg', 'image/jpeg', 1000, 0, 0),
(39, 'Hooded Parka Jacket', 'hoodedparkajacket', 189.00, 'Brave the elements in style with our hooded parka jacket. Made from water-resistant fabric, this jacket features a faux fur-lined hood, adjustable drawstring waist, and multiple pockets. Perfect for s', 'women', '../prod_image/hoodedparkajacket.jpg', 'image/jpeg', 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `delivery_address` text NOT NULL DEFAULT 'not_set',
  `payment_details` text NOT NULL DEFAULT 'not_set',
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `delivery_address`, `payment_details`, `created_at`) VALUES
(5, 'admin', '$2y$12$P3QNXTkICu6KgZxh97D5we1Y9iHdBLdGTdAqjEdlabBZAVwJKRHJO', 'admin@gmai.com', 'not_set', 'not_set', '2024-04-18 15:36:15'),
(16, 'user', '$2y$12$jskA8pESNR5G2qLpMhxZQ.5dImT2E5vxaeFhyUgy.R5Jo.I8upIOe', 'user@gmail.com', '231 Cooper Road, Yagoona, Sydney', '2923 2343 2245 2345', '2024-06-06 13:09:38'),
(17, 'user3', '$2y$12$mCGW3QgyhIXO0laG8oiameW0H/YlJoDRWk8D/4X0ccmBIZRmqY6YC', 'email@gmail.com', 'skjdnvkjsn', '2309230923', '2024-06-09 13:01:34'),
(18, 'username', '$2y$12$I1lzwx6m1CE1vxW.B.8y1u32sa0.kUaMe6ruDaPH6xGea4l9BGed2', 'slkdjnvc@gmail.com', 'nksjdnvkj', '239823', '2024-06-09 13:02:18'),
(19, 'jahscb', '$2y$12$iW5MjMidohcv2tj2hoH0Iu3bVhk.sQle4giPOsQHiEnDYar8ZkM4W', 'ksjdbcvn@gmail.com', 'jkdnbvcksj ', '29823', '2024-06-09 13:03:10'),
(20, 'kjsdbvksjdbvksjdbv', '$2y$12$Qlu2FrpmypKKrIMXN63QceP.7Pai5QJRh/fxwBLgP0hGHDyaQrnpu', 'ksdjvnskjdvnksjdvnksjb@gmail.com', 'skjdnv', '9023920832', '2024-06-09 13:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('read','unread') DEFAULT 'unread',
  `action` text NOT NULL DEFAULT 'unactioned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `email`, `message`, `status`, `action`) VALUES
(23, 'email@gmail.com', 'message 1', 'read', 'actioned'),
(24, 'email@gmail.com', 'message 2', 'read', 'actioned'),
(25, 'email@gmail.com', 'message 3', 'read', 'actioned'),
(26, 'email@gmail.com', 'message 4', 'read', 'actioned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order_placed`
--
ALTER TABLE `order_placed`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_tracking_updates`
--
ALTER TABLE `order_tracking_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `prod_detail`
--
ALTER TABLE `prod_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `order_placed`
--
ALTER TABLE `order_placed`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `order_tracking_updates`
--
ALTER TABLE `order_tracking_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prod_detail`
--
ALTER TABLE `prod_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
