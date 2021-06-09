-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 01:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `admin` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `admin`, `text`, `image`, `video`) VALUES
(1, 'Ahmed', 'Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.', 'slider3.jpg', 'https://www.youtube.com/watch?v=X2KIswfua8c');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `Governorate` text NOT NULL,
  `street` text NOT NULL,
  `phone` int(11) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `Governorate`, `street`, `phone`, `mail`) VALUES
(1, 'Buttonwood, California', 'Rosemead, CA 91770', 1009957554, 'z@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `description` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `text`, `description`, `comments`) VALUES
(1, 'blog1.jpg', 'Iphone 7+', 'That dominion stars lights dominion divide years for fourth have don\'t stars is that he earth it first without heaven in place seed it second morning saying.', 'iTs very good'),
(2, 'pro4.jpg', 'Book', 'That dominion stars lights dominion divide years for fourth have don\'t stars is that he earth it firs', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'clothes'),
(2, 'Laptops'),
(3, 'Mobiles'),
(4, 'Games'),
(5, 'Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `categories_image`
--

CREATE TABLE `categories_image` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `categoriename` text NOT NULL,
  `price` text NOT NULL,
  `text` text NOT NULL,
  `type` text NOT NULL COMMENT 'offer or new...',
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_image`
--

INSERT INTO `categories_image` (`id`, `image`, `categoriename`, `price`, `text`, `type`, `star`) VALUES
(1, 'gallery1.jpg', 'Clothes', '40', 'Jaket', '', 4),
(2, 'gallery2.jpg', 'Clothes', '502', 'T-Shirt', '', 3),
(3, 'galler2.jpg', 'Mobiles', '56', 'Iphone 7+', '', 5),
(4, 'galler1.jpg', 'Laptop', '44', 'Dell 3055', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `commentsofblogs`
--

CREATE TABLE `commentsofblogs` (
  `id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `Comment` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentsofblogs`
--

INSERT INTO `commentsofblogs` (`id`, `id_blog`, `name`, `email`, `Comment`, `Date`) VALUES
(1, 1, 'Ahmed', 'zezoa4037@gmail.com', 'its amazing', '2020-06-25'),
(8, 1, 'Mohamed', 'z@gmail.com', 'its great', '2020-06-25'),
(10, 1, 'Ahmed', 'zezoa4037@gmail.com', 'hi ', '2020-06-26'),
(11, 1, 'Ibrahim', 'a@z.com', 'rely fantastic', '2020-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `massage`) VALUES
(1, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(2, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(3, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(4, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(5, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(6, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(7, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.'),
(8, 'Ahmed', 'zezoa4037@gmail.com', 'The access to education, medicine, industry, transportation etc. has been simplified due to modern day technology.');

-- --------------------------------------------------------

--
-- Table structure for table `email_latestoffers`
--

CREATE TABLE `email_latestoffers` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL COMMENT 'email to send him any offers'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_latestoffers`
--

INSERT INTO `email_latestoffers` (`id`, `email`) VALUES
(1, 'zezoa4037@gmail.com'),
(33, 'mohamed_hassen_2012@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `PriceOfOneProduct` int(11) NOT NULL COMMENT 'Price Of One Product',
  `priceofQuantity` float NOT NULL COMMENT 'price of Quantity',
  `quantity` int(11) NOT NULL,
  `payment` text NOT NULL DEFAULT 'CASH ON DELIVERY',
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 submited , 0 unsubmited'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `id_user`, `image`, `text`, `PriceOfOneProduct`, `priceofQuantity`, `quantity`, `payment`, `date`, `status`) VALUES
(35, 3, 3, 'product6.png', 'plazer', 75, 225, 3, 'paypal', '2020-06-26', 1),
(36, 6, 3, 'product5.png', 'Shirt', 90, 180, 2, 'paypal', '2020-06-26', 1),
(37, 7, 3, 'product2.png', 'shirt', 50, 200, 4, 'paypal', '2020-06-26', 1),
(42, 5, 1, 'product4.png', 'T-shirt', 70, 140, 2, 'cash on delivery', '2020-06-26', 1),
(43, 4, 1, 'product1.png', 'Bermuda', 20, 80, 4, 'cash on delivery', '2020-06-26', 1),
(45, 7, 11, 'product2.png', 'shirt', 50, 150, 3, 'CASH ON DELIVERY', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detiles`
--

CREATE TABLE `order_detiles` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `discount` int(11) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `Quantity` int(11) NOT NULL,
  `categories` text NOT NULL COMMENT 'clothes , laptop , ...',
  `type` text NOT NULL COMMENT 'offer or new ..',
  `assort` text NOT NULL DEFAULT 'latest' COMMENT 'latest or Catagori'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `text`, `description`, `price`, `discount`, `star`, `Quantity`, `categories`, `type`, `assort`) VALUES
(1, 'pro.jpg', 'Dell 3053', '', 45, 60, 4, 200, 'Laptops', 'offer', 'latest'),
(2, 'pro2.jpg', 'Iphone 7+', '', 100, 130, 3, 50, 'Mobiles', 'new', 'latest'),
(3, 'product6.png', 'plazer', '', 75, 100, 5, 201, 'clothes', 'Featured', 'latest'),
(4, 'product1.png', 'Bermuda', '', 20, 0, 3, 50, 'clothes', 'offer', 'latest'),
(5, 'product4.png', 'T-shirt', '', 70, 0, 4, 100, 'clothes', 'new', 'Catagori'),
(6, 'product5.png', 'Shirt', '', 90, 100, 4, 50, 'clothes', 'Featured', 'Catagori'),
(7, 'product2.png', 'shirt', '', 50, 100, 4, 60, 'clothes', 'offer', 'Catagori');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `pagename` text CHARACTER SET utf8 NOT NULL COMMENT 'page name that  have slider',
  `image` text CHARACTER SET utf8 NOT NULL,
  `htext` text CHARACTER SET utf8 NOT NULL COMMENT 'header of text',
  `text` text CHARACTER SET utf8 NOT NULL COMMENT 'pragraph or any text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `pagename`, `image`, `htext`, `text`) VALUES
(1, 'Aman', 'slider3.jpg', 'New Collections', 'Best Collection Clothes'),
(2, 'Catagori', 'category.jpg', 'Product Catagori', ''),
(3, 'product list', 'category.jpg', 'Product List', ''),
(4, 'Blog', 'category.jpg', 'Blog', ''),
(5, 'contact', 'category.jpg', 'Contact Us', ''),
(6, 'Aman', 'slider4.jpg', '', ''),
(7, 'About', 'category.jpg', 'About', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider_customer`
--

CREATE TABLE `slider_customer` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `text` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_customer`
--

INSERT INTO `slider_customer` (`id`, `image`, `text`, `name`) VALUES
(1, 'client.png', 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering', 'Ahmed'),
(2, 'client_2.png', 'Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering', 'Khaled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `Address` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `zip` text NOT NULL,
  `phone` int(11) NOT NULL,
  `grouped` int(11) NOT NULL DEFAULT 0 COMMENT '1 - admin  \r\n0- user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `Address`, `city`, `country`, `zip`, `phone`, `grouped`) VALUES
(1, 'Ahmed', 'abdulaziz', 'zezoa4037@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'ELdrose street', 'sharqia , faques', 'cairo', '5014   ', 1009957554, 1),
(2, 'Mohamed', 'Omar', 'z@gmail.com', '23fd521a5a652e6ae978503d10e9cb7f85dd6a12', 'faques', 'faques', 'Elsarquia', '5488', 1009957554, 0),
(3, 'Khaled', 'Ahmed', 'z@a.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', 0, 0),
(11, 'Ibrahim', 'Khaled', 'a@z.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sharqia , faques', 'faques', 'Shirqia', '5668 ', 1009987456, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_image`
--
ALTER TABLE `categories_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentsofblogs`
--
ALTER TABLE `commentsofblogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_latestoffers`
--
ALTER TABLE `email_latestoffers`
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
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_customer`
--
ALTER TABLE `slider_customer`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories_image`
--
ALTER TABLE `categories_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentsofblogs`
--
ALTER TABLE `commentsofblogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_latestoffers`
--
ALTER TABLE `email_latestoffers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider_customer`
--
ALTER TABLE `slider_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
