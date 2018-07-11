-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2018 at 02:50 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_ws`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(10) NOT NULL,
  `mem_username` varchar(50) NOT NULL,
  `mem_password` varchar(50) NOT NULL,
  `mem_fname` varchar(50) NOT NULL,
  `mem_lname` varchar(50) NOT NULL,
  `mem_bd` date NOT NULL,
  `mem_address` text NOT NULL,
  `mem_tel` varchar(20) NOT NULL,
  `mem_mtel` varchar(20) NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_username`, `mem_password`, `mem_fname`, `mem_lname`, `mem_bd`, `mem_address`, `mem_tel`, `mem_mtel`, `mem_email`, `mem_type`) VALUES
(1, 'admin', 'passadmin', 'fadmin', 'ladmin', '2537-11-23', 'admin 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', '027380239', '0891149400', 'admin@gmail.com', 'admin'),
(2, 'admin2', 'passadmin2', 'fadmin2', 'ladmin2', '2537-11-23', 'admin2 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', '027380239', '0891149400', 'admin2@gmail.com', 'admin'),
(3, 'test', 'testpass', 'ftest', 'ltest', '2537-11-23', 'test 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540 ก', '027380239', '0891149400', 'test@gmail.com', 'user'),
(4, 'test2edt', 'passtest2edt', 'ftest2edt', 'ltest2edt', '2537-11-23', 'test2edt 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', '02738023', '089114940', 'test2edt@gmail.com', 'user'),
(5, 'testtest', 'test', 'firstname', 'lastname', '2002-03-01', 'address', '025456545', '0954567890', 'test@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `mem_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `mem_id`, `product_id`, `product_num`) VALUES
(2, 1, 2, 1),
(3, 1, 7, 1),
(8, 1, 3, 4),
(9, 1, 6, 1),
(12, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_gen` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_detail` text NOT NULL,
  `product_gender` varchar(10) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `product_pic` text NOT NULL,
  `product_num` int(11) NOT NULL,
  `product_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `product_gen`, `product_price`, `product_detail`, `product_gender`, `product_type`, `product_pic`, `product_num`, `product_update`) VALUES
(2, 'name', 'brand', '2', 1200, 'dsd', 'all', 'ring', 'img_5b29c8f2f246b.jpg', 2, '2018-06-28 11:18:59'),
(3, 'เข็มขัดหนัง', '-', '-', 1250, 'เข็มขัดหนังมือสอง', 'male', 'belt', 'img_5b29f5306794b.jpg', 1, '2018-06-28 11:18:55'),
(4, 'สร้อยสวย', '-', '-', 750, 'สร้อยข้อมือมือ 1', 'female', 'bracelet', 'img_5b29f5a97c1dc.jpg', 0, '2018-06-30 05:13:47'),
(5, 'สร้อยคอกางเขน', '-', '-', 690, 'สร้อยมือสอง', 'all', 'necklace', 'img_5b2a2ae11f274.jpg', 1, '2018-06-28 11:18:52'),
(6, 'กระเป๋าเป้', 'แบรนแหนม', '-', 1600, 'กระเป๋าสีเขียว', 'all', 'bag', 'img_5b2b6c415c306.jpg', 1, '2018-06-28 11:18:23'),
(7, 'นาฬิกาเท่ๆ', 'tixtox', '-', 2400, 'นาฬิกาสีดำ', 'all', 'watch', 'img_5b2b78d15e42d.jpg', 0, '2018-06-28 11:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `orders_price` int(11) NOT NULL,
  `orders_num` int(11) NOT NULL,
  `orders_total` int(11) NOT NULL,
  `mem_fname` varchar(20) NOT NULL,
  `mem_lname` varchar(20) NOT NULL,
  `mem_mtel` varchar(15) NOT NULL,
  `mem_email` varchar(50) NOT NULL,
  `mem_address` text NOT NULL,
  `orders_amount` int(11) NOT NULL,
  `orders_date` varchar(10) NOT NULL,
  `orders_time` varchar(5) NOT NULL,
  `orders_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `orders_id`, `product_id`, `product_name`, `orders_price`, `orders_num`, `orders_total`, `mem_fname`, `mem_lname`, `mem_mtel`, `mem_email`, `mem_address`, `orders_amount`, `orders_date`, `orders_time`, `orders_status`) VALUES
(1, 2, 2, 'name', 1200, 2, 2400, 'fadmin', 'ladmin', '0891149400', 'admin@gmail.com', 'admin 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', 2400, '2018-06-01', '13:21', 'confirm'),
(4, 3, 7, 'นาฬิกาเท่ๆ', 2400, 1, 2400, 'fadmin', 'ladmin', '0891149400', 'admin@gmail.com', 'admin 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', 2400, '2018-06-12', '11:12', 'warning'),
(5, 8, 3, 'เข็มขัดหนัง', 1250, 4, 5000, 'fadmin', 'ladmin', '0891149400', 'admin@gmail.com', 'admin 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540', 5000, '2018-06-02', '13:11', 'wait'),
(6, 12, 4, 'สร้อยสวย', 750, 1, 750, 'ftest', 'ltest', '0891149400', 'test@gmail.com', 'test 53/91 ม.1 ต.ศีรษะจรเข้น้อย อ.บางเสาธง จ.สมุทรปราการ 10540 ก', 750, '2018-06-06', '11:13', 'confirm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
