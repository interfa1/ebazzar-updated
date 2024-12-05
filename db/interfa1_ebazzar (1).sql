-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interfa1_ebazzar`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Branded Foods'),
(2, 'Household'),
(3, 'Vaggis & Fruits'),
(4, 'Kitchen'),
(5, 'Bevarages'),
(6, 'Pet Food'),
(7, 'Frozen Food'),
(8, 'Bread & Bekary');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `name`, `username`, `password`, `mobile`, `email`, `address`, `pincode`) VALUES
(1, 'ansh chavan', 'anshchavan', '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', '9158205840', 'ansh@gmail.com', 'savarkar nagar, adasrh college road, hingoli', '431513'),
(2, 'ashish rathod11', 'ashishk123', '$2y$10$WEzsyIXLv5MgKcgc7WZSfu8pLjEkvnKTPQv543LEHGl8owB7R7vqW', '9632587410', 'ashu@gmail.com', '', ''),
(3, 'Rajaram Shinde', 'Rajaram', '$2y$10$oWWpiXv7cXNqFWVGXcKeUu9ATGJBGo2a2ohd36oN8rQApATxSiIcy', '9876543210', 'deveshkhedkar@gmail.com', '', ''),
(4, 'aaa bbb', 'abcde', '$2y$10$00mIjR.7mCcduCE1OXGqLewsOBZENGnFYrFSo74Y2zkC68Cnn4JJK', '9876543210', 'abc@xyz.com', '', ''),
(5, 'Raj kolhe', 'Rajkolhe12', '$2y$10$HcDQaW9j1b6I3qhu9lYzduzgeSWo7MLnhT/PS0gY9qNLYzx1vTpay', '1234566899', 'raj@gmail.com', '', ''),
(6, 'Raj Kolhe', 'Rajkolhe', '$2y$10$D8bIEQULhJGgAr4JKT4CFO5M0fQ8/ay946QlA46HM17wYpC9Pu9F2', '7262028776', 'kolhe.raj@gmail.com', '', ''),
(7, 'Ashish', 'Zdfxxcxc', '$2y$10$6Ae51HF.Ba2qCVUSWmt15ujUj2zXUk1kH3y5MN5NkBPbYWUgF7eke', '111111111', 'admin@skinvd.com', '', ''),
(8, 'Shailesh Jain', 'sawwakle@gmail.com', '$2y$10$uKUXjKD5z.Ne5LILGave9e18iSduCbl9LNZk9n/ct3giB73gMCb5W', '8379060956', 'sawwakle@gmail.com', '', ''),
(9, 'deva', 'devakale', '$2y$10$fvt4BfH5i7YHrXN3WYgF6OilJV0eNXuV/0suVPgkWCWGroO2PIZIG', '9657715631', 'kaledeva9651@gmail.com', '', ''),
(10, 'Devidas Kale', 'devakale', '$2y$10$k0lU4IvpRul1A92IXIcUOeBGD3HBoHPqXnAJLI.UtQGx19Z14AxkO', '9657715631', 'kaledeva9651@gmail.com', '', ''),
(11, 'Devidas Kale', 'devakale123', '$2y$10$EX4zfS901f2CHU/lkpOKCedigw3YK2kdR0g9QDCcvPboTTdUlXdFm', '9657715631', 'kaledeva9651@gmail.com', '', ''),
(12, 'Devidas Kale', 'deva1', '$2y$10$hXn.oTEA6Ty7p8eFWwtVQuFZ1rRgfA9mw.y9aRMaUn2iydWDvbysi', '9657715631', 'kaledeva9651@gmail.com', '', ''),
(13, 'Suraj Raskar', 'Suraj', '$2y$10$IEtmZ/Eov/iRQ/a2NzsXEeP2j8J2/PwnzvA6JCvYnC1uh1xOTAiSi', '9923309318', 'raskarsuraj984@gmail.com', '', ''),
(14, 'Testing Tester', 'Waiting', '$2y$10$S03yA51G3HCczgHW6sAVwOKLfa1q21eijl.1h7Sg5japUmEoCYcG.', '9876543234', 'tester05@gmail.com', '', ''),
(15, 'mahadu', 'mahadev', '$2y$10$o0DsithLiCD1JiiTn0Qm8OY4zINd/NKH0XvE9cJkdXGZoj0P.ox2.', '9146323242', 'suryawanshimj143@gmail.com', '', ''),
(16, 'Pranav', 'Pranav123', '$2y$10$K/o45gHzMa1Z9p/MVuORDurq1bIZRfV5c8GLq27v3KSZ2KNrBQ9te', '08446559671', 'pranavk@gamil.com', '', ''),
(17, 'Vinay Kshirsagar', 'Vinay123', '$2y$10$EdvxOA0AN1TGB8fFw9Xeeu3DlxP08ZarNz63Xs8U0sy.zgLMVFIPq', '9890667896', 'vinay@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:18:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:13:\"createProduct\";i:9;s:13:\"updateProduct\";i:10;s:11:\"viewProduct\";i:11;s:13:\"deleteProduct\";i:12;s:11:\"createOrder\";i:13;s:11:\"updateOrder\";i:14;s:9:\"viewOrder\";i:15;s:11:\"deleteOrder\";i:16;s:11:\"viewProfile\";i:17;s:13:\"updateSetting\";}'),
(2, 'Vendors', 'a:10:{i:0;s:13:\"createProduct\";i:1;s:13:\"updateProduct\";i:2;s:11:\"viewProduct\";i:3;s:13:\"deleteProduct\";i:4;s:11:\"createOrder\";i:5;s:11:\"updateOrder\";i:6;s:9:\"viewOrder\";i:7;s:11:\"deleteOrder\";i:8;s:11:\"viewProfile\";i:9;s:13:\"updateSetting\";}'),
(3, 'Supervisor', 'a:13:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:13:\"createProduct\";i:4;s:13:\"updateProduct\";i:5;s:11:\"viewProduct\";i:6;s:11:\"createOrder\";i:7;s:11:\"updateOrder\";i:8;s:9:\"viewOrder\";i:9;s:11:\"visitReport\";i:10;s:16:\"inspectionReport\";i:11;s:10:\"viewReport\";i:12;s:11:\"viewProfile\";}'),
(4, 'SGB Group', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `bill_no` varchar(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `landmark` text NOT NULL,
  `pincode` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `item_name` text NOT NULL,
  `qty` text NOT NULL,
  `price` text NOT NULL,
  `tot_qty` decimal(15,2) NOT NULL,
  `tot_amt` decimal(15,2) NOT NULL,
  `confirm` int(1) NOT NULL,
  `p_type` int(1) NOT NULL,
  `p_status` int(1) NOT NULL,
  `trans_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `bill_no`, `order_date`, `user_id`, `vendor_id`, `name`, `mobile`, `email`, `landmark`, `pincode`, `address`, `item_name`, `qty`, `price`, `tot_qty`, `tot_amt`, `confirm`, `p_type`, `p_status`, `trans_id`) VALUES
(11, 'BILPR-2303', '2020-04-20 09:47:15', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgdf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"VEggies 1\";i:1;s:5:\"Mango\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:2:\"20\";i:1;s:2:\"45\";}', 2.00, 65.00, 2, 0, 0, ''),
(12, 'ODRNO-AC08FD', '2020-04-20 10:54:47', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'ashidj', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"VEggies 1\";i:1;s:5:\"Mango\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:2:\"20\";i:1;s:2:\"45\";}', 2.00, 65.00, 1, 0, 0, ''),
(13, 'ODRNO-8CA69D', '2020-04-21 06:41:42', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgdgf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:3:{i:0;s:19:\"Dishwash Gel, Lemon\";i:1;s:9:\"product 2\";i:2;s:8:\"product3\";}', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}', 'a:3:{i:0;s:2:\"98\";i:1;s:2:\"45\";i:2;s:2:\"30\";}', 3.00, 173.00, 0, 0, 0, ''),
(17, 'ODRNO-A5E7AB', '2020-04-21 03:07:51', 3, 5, 'Rajaram Shinde', '9876543210', 'ram@gmail.com', 'hdfc atm', '411041', 'MEHER TEKDI', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 1, 0, 0, ''),
(18, 'ODRNO-C20987', '2020-04-21 03:52:09', 3, 6, 'Rajaram Shinde', '9876543210', 'ram@gmail.com', 'hdfc atm', '411041', 'jadhav nagar,\r\nvadgaon budruk,\r\n Pune.', 'a:3:{i:0;s:5:\"Mango\";i:1;s:9:\"kichewn 1\";i:2;s:6:\"sprite\";}', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";}', 'a:3:{i:0;s:2:\"45\";i:1;s:2:\"46\";i:2;s:2:\"20\";}', 5.00, 111.00, 1, 0, 0, ''),
(19, 'ODRNO-A5DA44', '2020-04-21 04:37:06', 3, 5, 'Rajaram Shinde', '9876543210', 'ram@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(20, 'ODRNO-FF24E9', '2020-04-21 04:56:38', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(21, 'ODRNO-739957', '2020-04-21 05:03:29', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(22, 'ODRNO-8D990D', '2020-04-21 05:04:21', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(23, 'ODRNO-505F9F', '2020-04-21 05:05:51', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(24, 'ODRNO-DA649A', '2020-04-21 05:06:18', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(25, 'ODRNO-01296C', '2020-04-21 06:33:49', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(26, 'ODRNO-E05FB3', '2020-04-21 06:34:10', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'pune', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(27, 'ODRNO-1A112C', '2020-04-21 06:34:46', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'MEHER TEKDI', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(28, 'ODRNO-BEB372', '2020-04-21 06:42:04', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'hdfc atm', '411041', 'MEHER TEKDI', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(29, 'ODRNO-914D5F', '2020-04-21 06:47:54', 3, 5, 'Rajaram Shinde', '9876543210', 'deveshkhedkar@gmail.com', 'Maruti Mandir', '411041', 'MEHER TEKDI', 'a:1:{i:0;s:5:\"pepsi\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"100\";}', 1.00, 100.00, 0, 0, 0, ''),
(30, 'ODRNO-0A0C41', '2020-04-29 10:52:45', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgdgf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"product 2\";i:1;s:8:\"product3\";}', 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:3:\"135\";i:1;s:2:\"30\";}', 4.00, 165.00, 0, 1, 1, ''),
(31, 'ODRNO-D72F12', '2020-04-29 11:55:33', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgdf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"product 2\";i:1;s:8:\"product3\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:2:\"45\";i:1;s:2:\"30\";}', 2.00, 75.00, 0, 2, 0, ''),
(32, 'ODRNO-967349', '2020-04-29 12:53:44', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgfdg', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"VEggies 1\";i:1;s:5:\"Mango\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}', 'a:2:{i:0;s:2:\"20\";i:1;s:2:\"90\";}', 3.00, 110.00, 0, 2, 1, ''),
(33, 'ODRNO-D6035D', '2020-04-29 01:09:00', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'dfsf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:5:\"Mango\";}', 'a:1:{i:0;s:1:\"2\";}', 'a:1:{i:0;s:2:\"90\";}', 2.00, 90.00, 0, 2, 1, ''),
(34, 'ODRNO-0598B1', '2020-04-29 01:13:32', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'vv', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:5:\"Mango\";}', 'a:1:{i:0;s:1:\"2\";}', 'a:1:{i:0;s:2:\"90\";}', 2.00, 90.00, 0, 2, 1, ''),
(35, 'ODRNO-7E0E28', '2020-04-29 01:18:49', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'xcvxc', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:5:\"Mango\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:3:\"135\";}', 3.00, 135.00, 0, 2, 1, ''),
(36, 'ODRNO-75BE37', '2020-04-29 01:45:36', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'vcfd', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:2:{i:0;s:9:\"product 2\";i:1;s:8:\"product3\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:2:\"45\";i:1;s:2:\"30\";}', 2.00, 75.00, 0, 2, 1, ''),
(37, 'ODRNO-DCD61E', '2020-04-29 02:14:07', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'dfd', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:5:\"Mango\";}', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:3:\"180\";}', 4.00, 180.00, 0, 2, 1, ''),
(38, 'ODRNO-2EAC55', '2020-04-29 02:53:19', 1, 0, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fv', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:8:\"product3\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:2:\"90\";}', 3.00, 90.00, 0, 0, 0, ''),
(39, 'ODRNO-1EF872', '2020-04-29 02:53:48', 1, 0, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'hgf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:8:\"product3\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:2:\"90\";}', 3.00, 90.00, 0, 0, 0, ''),
(40, 'ODRNO-75DE4A', '2020-04-29 03:01:02', 1, 0, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'gfhg', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:8:\"product3\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:2:\"90\";}', 3.00, 90.00, 0, 0, 0, ''),
(41, 'ODRNO-5BFF9D', '2020-04-29 03:02:50', 1, 1, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'dfgf', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:10:\"Medicine 1\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:1:\"0\";}', 3.00, 300.00, 1, 2, 1, ''),
(42, 'ODRNO-27B20B', '2020-04-29 03:09:38', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'hgh', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:8:\"product3\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:2:\"90\";}', 3.00, 90.00, 0, 2, 1, ''),
(43, 'ODRNO-92C254', '2020-04-29 04:12:06', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'fgfg', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:5:\"Mango\";}', 'a:1:{i:0;s:1:\"3\";}', 'a:1:{i:0;s:3:\"135\";}', 3.00, 135.00, 0, 2, 2, 'pay_EkMazjTmBbPtnd'),
(44, 'ODRNO-0C7E08', '2020-05-02 12:05:57', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'hfghgh', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:8:\"product3\";}', 'a:1:{i:0;s:1:\"4\";}', 'a:1:{i:0;s:3:\"120\";}', 4.00, 120.00, 0, 2, 1, ''),
(45, 'ODRNO-180D49', '2020-05-02 12:24:36', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'df', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:9:\"VEggies 1\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:2:\"20\";}', 1.00, 20.00, 0, 2, 2, '20200502111212800110168635901495582'),
(46, 'ODRNO-8D0B81', '2020-05-02 10:08:41', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'Adarsh college road', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:9:\"VEggies 1\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:2:\"10\";}', 1.00, 10.00, 0, 2, 1, ''),
(47, 'ODRNO-1FE39C', '2020-05-02 10:13:10', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'aes college', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:9:\"VEggies 1\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:2:\"10\";}', 1.00, 10.00, 0, 2, 1, ''),
(48, 'ODRNO-EC069B', '2020-05-04 09:05:50', 1, 6, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'Dff', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:9:\"VEggies 1\";}', 'a:1:{i:0;s:1:\"2\";}', 'a:1:{i:0;s:2:\"20\";}', 2.00, 20.00, 0, 2, 1, ''),
(49, 'ODRNO-F31556', '2023-12-27 08:40:46', 13, 1, 'Shree shivaji vidya mandir chakan', '9923309318', 'raskarsuraj984@gmail.com', 'varis height', '410501', 'balajinagar Pune', 'a:1:{i:0;s:4:\"cake\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"250\";}', 1.00, 250.00, 0, 0, 0, ''),
(50, 'ODRNO-7D88E0', '2023-12-27 08:40:46', 13, 1, 'Shree shivaji vidya mandir chakan', '9923309318', 'raskarsuraj984@gmail.com', 'varis height', '410501', 'balajinagar Pune', 'a:1:{i:0;s:4:\"cake\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:3:\"250\";}', 1.00, 250.00, 2, 0, 0, ''),
(51, 'ODRNO-70A0EB', '2023-12-27 08:45:27', 13, 1, 'Shree shivaji vidya mandir chakan', '9923309318', 'raskarsuraj984@gmail.com', 'Test', '410501', 'pune', 'a:2:{i:0;s:4:\"cake\";i:1;s:3:\"God\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}', 'a:2:{i:0;s:3:\"250\";i:1;s:3:\"233\";}', 2.00, 433.00, 0, 0, 0, ''),
(52, 'ODRNO-E05749', '2023-12-27 10:55:21', 1, 1, 'ansh chavan', '9158205840', 'ansh@gmail.com', 'velora ', '431513', 'savarkar nagar, adasrh college road, hingoli', 'a:1:{i:0;s:3:\"Toy\";}', 'a:1:{i:0;s:1:\"1\";}', 'a:1:{i:0;s:4:\"1000\";}', 1.00, 1000.00, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `description`, `category`, `image`, `price`, `qty`) VALUES
(26, 6, 'Dishwash Gel, Lemon', 'sdff dffdsfsdff fdfdsfsdf f df fsdf fa fafda afsdas  ffasdas asdas asdas sadasd a sasa as', 2, 'assets/images/products/5e9d887b93229.png', 98.00, 1.00),
(27, 6, 'product 2', 'dsfdfsda sdsaasd asdasdasda sadsadsadas sadasd asdsad sa dsada dsad dsdas', 2, 'assets/images/products/5e9d887b93229.png', 45.00, 1.00),
(28, 6, 'product3', 'dfdfd dfdfa fdfaf sdfdfd fdsf df dsfsd', 2, 'assets/images/products/5e9d887b93229.png', 30.00, 2.00),
(29, 6, 'VEggies 1', 'sdfdsfsdfsdf dffsdfds fsdf sdfsd sdfsdf dff d', 3, 'assets/images/products/5e9d88d7a541d.png', 10.00, 1.00),
(30, 6, 'Mango', 'fdgfgf dfsdf dfds fsd fsd sdfdsf df dfdf', 3, 'assets/images/products/5e9d88d7a541d.png', 45.00, 9.99),
(31, 6, 'kichewn 1', 'cvcvcvcvxcxcxc dfdsf', 4, 'assets/images/products/5e9d8a3fb4933.png', 23.00, 9.99),
(32, 6, 'kichten 3', 'fgfdgefgdf fgsdfsd', 4, 'assets/images/products/5e9d8a3fb4933.png', 450.00, 9.99),
(33, 6, 'thumps up', 'fdgfdg fgsfds df fdfs', 5, 'assets/images/products/5e9d8ae494724.png', 40.00, 1.00),
(34, 6, 'sprite', 'fdfgdfgd gfgfgdfw ewf', 5, 'assets/images/products/5e9d8ae4bef10.png', 10.00, 1.00),
(35, 5, 'pepsi', 'Pepsi cod drink', 5, 'assets/images/products/5e9ec967b235b.png', 100.00, 1.00),
(37, 1, 'cake', 'birthday food', 1, 'assets/images/products/658acede41cc9.jpg', 250.00, 9.99),
(39, 1, 'cake', 'birthday food to celebrate birthday', 2, 'assets/images/products/658bc549f2b13.webp', 200.00, 5.00),
(40, 1, 'cake', 'Birthday Cake', 4, 'assets/images/products/658be2218513a.jpg', 250.00, 9.99),
(41, 1, 'Toy', 'Test', 2, 'assets/images/products/658be39b948e1.jpg', 1000.00, 9.99),
(42, 1, 'God', 'Test', 1, 'assets/images/products/658be39b957c6.jpg', 233.00, 9.99),
(43, 1, 'Milkcake', 'Tasty', 4, 'assets/images/products/65e2dd29d9047.jpeg', 20.00, 2.00),
(44, 1, 'Book', 'Best book', 4, 'assets/images/products/65e2df0c000e3.jpg', 200.00, 2.00),
(45, 1, 'Book', 'best book', 4, 'assets/images/products/65e2df2dbc297.jpg', 10000.00, 9.99),
(46, 1, 'Book', 'best', 4, 'assets/images/products/65e2df5d0c8e2.jpg', 20000.00, 2.00),
(47, 1, 'banana', 'it is healthy', 3, 'assets/images/products/65eadd048090f.jpg', 40.00, 9.99),
(48, 1, 'bisut', 'healthy', 4, 'assets/images/products/661cd9b43a311.jpg', 100.00, 9.99),
(49, 1, 'hbhdb', '', 1, '<p>The filetype you are attempting to upload is not allowed.</p>', 20.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(255) NOT NULL,
  `sc_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`sc_id`, `sc_name`, `sc_img`) VALUES
(1, 'Groceries', 'grocery.jpg'),
(2, 'Ice-cream parlour', 'ice-cream.png'),
(3, 'Dairy', 'dairy.jpg'),
(4, 'Vegetables', 'vegetables.jpg'),
(5, 'Fruits', 'fruits.jpg'),
(6, 'Herbal and Ayurvedic', 'ayurvedic.jpg'),
(7, 'Baby care', 'baby.jpg'),
(8, 'Pet food and care', 'pet.jpg'),
(9, 'Bakery', 'bakery.jpg'),
(10, 'Clothing', 'clothes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL,
  `active` int(1) NOT NULL,
  `approved` int(1) NOT NULL,
  `logo` text NOT NULL,
  `shop_name` text NOT NULL,
  `shop_category` int(11) NOT NULL,
  `isChecked` int(1) NOT NULL,
  `km` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `phone`, `profile`, `address`, `created`, `active`, `approved`, `logo`, `shop_name`, `shop_category`, `isChecked`, `km`) VALUES
(1, 'developer', '$2a$12$0HgJc2xvddBpYLHxKx2cAeVisZ7YqEjyUWbQz8bzIphAmHBPHwx.y', 'admin@admin.com', 'ashish kumar', '9158205840', '', 'mumbai', '2020-01-14 12:10:03', 1, 1, 'uploads/658ad1ee15c44.png', 'Wellness', 0, 1, ''),
(4, '', '$2a$12$VFgs3uwcj9xhACYaLcQli.hB88L.TMvJNt6GIsBDvdJm6Iw32C/G.', 'ashwinighanwat99@gmail.com', 'ASHWINI', '9146015959', '', 'aurangabad', '2020-03-02 01:47:22', 1, 1, 'assets/img/user/5e5cc1843a4f7.png', 'AQUA SALES & SERVICES', 1, 1, '227'),
(5, 'devesh123', '$2y$10$hKKXC9UwVV2pWR5nCNsuzuoe1vPT4nDi.yy9fFR.M0.ziPTdNaAAK', 'dev@gmail.com', 'dev', '1234567890', '<p>You did not select a file to upload.</p>', 'vadgaon bk, pune, 411041', '2020-04-18 10:50:00', 1, 1, 'uploads/5e9b37b178647.png', 'myShop', 1, 1, '472'),
(6, 'sushil123', '$2y$10$43ZPWDlPY9ZWAZjqM7JDJ./wf8HXcW5OfpdbgR/CvLuHcHGZY3NRa', 'sushil@gmail.com', 'sushil rathod', '9158082848', '', 'latur', '2020-04-18 08:23:29', 1, 1, 'uploads/5e9b464c41af6.png', 'MrGreen Shop', 4, 1, '211'),
(7, 'abhishekM123', '$2a$12$04FrLJ6ninunlh55DM3OhOcyb1BeS3qOpr2vE4XWFOMIstKPaFBqG', 'amabhi27@gmail.com', 'abhishek Mohantey', '7757992320', '', 'yavatmal', '2020-04-20 11:52:18', 1, 1, 'uploads/5e9e1af394a27.jpg', 'Abhis Shop 123', 6, 1, '188'),
(8, 'Sample', '$2y$10$CQ0o0mT21oEkPugARdabIe1lKYCjXazSM0Y8l6IBj13TYg78FR.5S', 'pune@123.com', 'Abhi', '9999999999', '', '', '2020-05-21 07:29:00', 1, 1, '', '', 1, 0, ''),
(9, 'Sagar31', '$2y$10$XuERvzYrn7UqN6JOCjMBteqFI0Uc1qtuR2hnTRjKeLL71SjFG7gQa', 'ssagarburande@gmail.com', 'Sagar Gopal Burande', '+918793247341', '<p>You did not select a file to upload.</p>', '129, Shivganga Nagar-3, Majrewadi, Solapur', '0000-00-00 00:00:00', 1, 1, '', '', 0, 0, ''),
(10, 'deva7#', '$2y$10$kQm/BWUTZXI6p9DtkDgBvO6euSQmFsrDif1PsDApGbBsywkwTTFna', 'kaledeva9671@gmail.com', 'Deva Kale', '2342342342', '<p>You did not select a file to upload.</p>', 'sdfksd jfksdhf ksjdhfs jkdfjksd fjksdf', '0000-00-00 00:00:00', 1, 1, '', '', 0, 0, ''),
(11, 'admin2', '$2y$10$lon7U4xJ5QqC7fNmgwW6I.jiXBB.wySdjCJ3edDWmsjN7vw6SG2N2', 'welcome@gmail.com', 'Welcome To', '7612893763', '<p>You did not select a file to upload.</p>', 'Pune', '0000-00-00 00:00:00', 1, 1, '', '', 0, 0, ''),
(12, 'tril123', '$2y$10$SFq21Kqc2Wy0tsLXKiVrkO9G1YLA9zYMSvjh2PQjZ1u8.9wHlS.3i', 'tril@tril.com', 'tril', '1289346745', '', '', '2024-02-17 07:56:59', 1, 1, '', '', 0, 0, ''),
(13, 'Mahadev', '$2y$10$mxr2f3e7M/VZisSmEJKlfOl1zFJLZ5qG36OWYhTYEnUOYqqAojamy', 'suryawanshimj143@gmail.com', 'Suryawanshi Mahadev', '9146323242', '', '', '2024-02-19 08:07:14', 1, 1, '', '', 0, 0, ''),
(14, 'devidas', '$2y$10$emIh1LtzqoyAjc3dJ0NRSu2wpAPuac0WEm.4c/oTHCHv1pE7WcVBC', 'deva@gmail.com', 'Devidas shinde', '9876543210', '<p>You did not select a file to upload.</p>', 'prathmesh apartment hinjewadi pune', '0000-00-00 00:00:00', 1, 1, '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `branch_id`) VALUES
(1, 1, 1, 2),
(14, 4, 2, 0),
(15, 5, 2, 0),
(16, 6, 2, 0),
(17, 7, 2, 0),
(18, 8, 2, 0),
(19, 9, 4, 0),
(20, 10, 2, 0),
(21, 11, 2, 0),
(22, 12, 2, 0),
(23, 13, 2, 0),
(24, 14, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
