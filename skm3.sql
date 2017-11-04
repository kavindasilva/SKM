-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 04:07 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Transport'),
(2, 'Education'),
(3, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `chief_manager`
--

CREATE TABLE `chief_manager` (
  `employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `com_date` datetime DEFAULT NULL,
  `cust_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `comment`, `com_date`, `cust_id`) VALUES
(1, 'I have the same problem. What we can do???\r\n', '2017-09-15 02:10:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `r_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `user_user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`r_id`, `company_name`, `tel`, `user_user_name`) VALUES
(1, 'ICTA', 774569852, 'ICTA1');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `d_id` int(11) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `user_user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`d_id`, `shop_name`, `tel`, `user_user_name`) VALUES
(1, 'yamuna moters', 117885695, 'dealer');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `user_user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `name`, `tel`, `type`, `user_user_name`) VALUES
(1, 'dulmina renuke', 771567974, 'salex', 'dulminarenuke');

-- --------------------------------------------------------

--
-- Table structure for table `import_manager`
--

CREATE TABLE `import_manager` (
  `employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `net_amount` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `invoice_notice` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `sales_executive_uname` varchar(20) NOT NULL,
  `sales_order_sord_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `net_amount`, `discount`, `invoice_notice`, `status`, `sub_total`, `date`, `sales_executive_uname`, `sales_order_sord_no`) VALUES
(1, 50000, 0, '', 'paid', 50000, '1989', 'dulminarenuke', 1),
(2, 50000, 0, '', 'paid', 50000, '1989', 'dulminarenuke', 1),
(3, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(4, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(5, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(6, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(7, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(8, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(9, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(10, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(11, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(12, 50000, 0, '', 'paid', 50000, '2017-10-18', 'dulminarenuke', 1),
(13, 401000, 15000, 'dgrg', 'paid', 416000, '2017-10-24', 'icta1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `tire_t_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`tire_t_id`, `invoice_no`, `discount`) VALUES
(1, 13, 5),
(2, 12, 0),
(3, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `tire_t_id` int(11) NOT NULL,
  `sord_no` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`tire_t_id`, `sord_no`, `qty`, `status`) VALUES
(1, 1, 5, 'Available'),
(1, 2, 56, 'Unavailable'),
(2, 1, 2, 'Available'),
(3, 1, 12, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pc_item`
--

CREATE TABLE `pc_item` (
  `tire_t_id` int(11) NOT NULL,
  `purchase_confirmation_pc_no` int(11) NOT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_item`
--

CREATE TABLE `pr_item` (
  `tire_t_id` int(11) NOT NULL,
  `purchase_requisition_pr_no` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_confirmation`
--

CREATE TABLE `purchase_confirmation` (
  `pc_no` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `purchase_requisition_pr_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requisition`
--

CREATE TABLE `purchase_requisition` (
  `pr_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `supplier_s_id` int(11) NOT NULL,
  `import_manager_employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `q_no` int(11) NOT NULL,
  `regular_customer_r_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `quotation_note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`q_no`, `regular_customer_r_id`, `status`, `quotation_note`) VALUES
(29, 1, 'notreplied', ''),
(30, 1, 'notreplied', ''),
(31, 1, 'notreplied', 'agent'),
(32, 1, 'notreplied', 'hghh');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_item`
--

CREATE TABLE `quotation_item` (
  `tire_t_id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_executive`
--

CREATE TABLE `sales_executive` (
  `employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_executive`
--

INSERT INTO `sales_executive` (`employee_e_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sord_no` int(11) NOT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `dealer_d_id` int(11) DEFAULT NULL,
  `regular_customer_r_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`sord_no`, `total_amount`, `status`, `date`, `dealer_d_id`, `regular_customer_r_id`) VALUES
(1, 50000, 'incomplete', '2017-10-16', 1, NULL),
(2, 316000, 'incomplete', '2017-10-24', 1, NULL),
(3, 1120000, 'incomplete', '2017-10-24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_manager`
--

CREATE TABLE `stock_manager` (
  `employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `s_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `user_user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `brand`, `country`, `user_user_name`) VALUES
(1, 'dunlop', 'japan', 'dunlopjapan');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE `system_admin` (
  `employee_e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tire`
--

CREATE TABLE `tire` (
  `t_id` int(11) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `tire_size` varchar(45) DEFAULT NULL,
  `brand_name` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `supplier_s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='					';

--
-- Dumping data for table `tire`
--

INSERT INTO `tire` (`t_id`, `country`, `tire_size`, `brand_name`, `quantity`, `unit_price`, `status`, `supplier_s_id`) VALUES
(1, 'Japan', '186/65R16', 'Dunlop', 25, 20000, 'available', 1),
(2, 'Japan', '255R16', 'Dunlop', 5, 25000, 'available', 1),
(3, 'Japan', '186/65R15', 'Dunlop', 35, 18000, 'available', 1),
(4, 'Japan', '145/70R12', 'Dunlop', 45, 9900, 'available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `email`, `address`, `type`) VALUES
('dealer', '1234', 'fgfg@gmail.com', '5\r\n454', 'dealer'),
('dulminarenuke', 'skm', 'rdulmina@gmail.com', '41A diyawannawa rd etul kotte', 'salex'),
('dunlopjapan', 'skm', 'salesdunlop@gmail.com', 'ggrgr', 'suppl'),
('ICTA1', 'skm', 'rdulmina@gmail.com', 'gfg', 'cust'),
('stockmanager', '1234', 'fgf', 'gfg', 'stockmgr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chief_manager`
--
ALTER TABLE `chief_manager`
  ADD PRIMARY KEY (`employee_e_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `fk_regular_customer_user1_idx` (`user_user_name`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `fk_dealer_user1_idx` (`user_user_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `fk_employee_user1_idx` (`user_user_name`);

--
-- Indexes for table `import_manager`
--
ALTER TABLE `import_manager`
  ADD PRIMARY KEY (`employee_e_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`),
  ADD KEY `fk_invoice_sales_order1_idx` (`sales_order_sord_no`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`tire_t_id`,`invoice_no`),
  ADD KEY `fk_tire_has_invoice_invoice1_idx` (`invoice_no`),
  ADD KEY `fk_tire_has_invoice_tire1_idx` (`tire_t_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`tire_t_id`,`sord_no`),
  ADD KEY `fk_tire_has_sales_order_sales_order1_idx` (`sord_no`),
  ADD KEY `fk_tire_has_sales_order_tire1_idx` (`tire_t_id`);

--
-- Indexes for table `pc_item`
--
ALTER TABLE `pc_item`
  ADD PRIMARY KEY (`tire_t_id`,`purchase_confirmation_pc_no`),
  ADD KEY `fk_tire_has_purchase_confirmation_purchase_confirmation1_idx` (`purchase_confirmation_pc_no`),
  ADD KEY `fk_tire_has_purchase_confirmation_tire1_idx` (`tire_t_id`);

--
-- Indexes for table `pr_item`
--
ALTER TABLE `pr_item`
  ADD PRIMARY KEY (`tire_t_id`,`purchase_requisition_pr_no`),
  ADD KEY `fk_tire_has_purchase_requisition_purchase_requisition1_idx` (`purchase_requisition_pr_no`),
  ADD KEY `fk_tire_has_purchase_requisition_tire1_idx` (`tire_t_id`);

--
-- Indexes for table `purchase_confirmation`
--
ALTER TABLE `purchase_confirmation`
  ADD PRIMARY KEY (`pc_no`),
  ADD KEY `fk_purchase_confirmation_purchase_requisition1_idx` (`purchase_requisition_pr_no`);

--
-- Indexes for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  ADD PRIMARY KEY (`pr_no`),
  ADD KEY `fk_purchase_requisition_supplier1_idx` (`supplier_s_id`),
  ADD KEY `fk_purchase_requisition_import_manager1_idx` (`import_manager_employee_e_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`q_no`),
  ADD KEY `fk_quatation_regular_customer1_idx` (`regular_customer_r_id`);

--
-- Indexes for table `quotation_item`
--
ALTER TABLE `quotation_item`
  ADD PRIMARY KEY (`tire_t_id`,`q_no`) USING BTREE,
  ADD KEY `fk_tire_has_quatation_quatation1_idx` (`q_no`),
  ADD KEY `fk_tire_has_quatation_tire1_idx` (`tire_t_id`);

--
-- Indexes for table `sales_executive`
--
ALTER TABLE `sales_executive`
  ADD PRIMARY KEY (`employee_e_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sord_no`);

--
-- Indexes for table `stock_manager`
--
ALTER TABLE `stock_manager`
  ADD PRIMARY KEY (`employee_e_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_supplier_user_idx` (`user_user_name`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD PRIMARY KEY (`employee_e_id`);

--
-- Indexes for table `tire`
--
ALTER TABLE `tire`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `fk_tire_supplier1_idx` (`supplier_s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `purchase_confirmation`
--
ALTER TABLE `purchase_confirmation`
  MODIFY `pc_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  MODIFY `pr_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `q_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sord_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tire`
--
ALTER TABLE `tire`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chief_manager`
--
ALTER TABLE `chief_manager`
  ADD CONSTRAINT `fk_chief_manager_employee1` FOREIGN KEY (`employee_e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_regular_customer_user1` FOREIGN KEY (`user_user_name`) REFERENCES `user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dealer`
--
ALTER TABLE `dealer`
  ADD CONSTRAINT `fk_dealer_user1` FOREIGN KEY (`user_user_name`) REFERENCES `user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_user1` FOREIGN KEY (`user_user_name`) REFERENCES `user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `import_manager`
--
ALTER TABLE `import_manager`
  ADD CONSTRAINT `fk_import_manager_employee1` FOREIGN KEY (`employee_e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_sales_order1` FOREIGN KEY (`sales_order_sord_no`) REFERENCES `sales_order` (`sord_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD CONSTRAINT `fk_tire_has_invoice_invoice1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tire_has_invoice_tire1` FOREIGN KEY (`tire_t_id`) REFERENCES `tire` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_tire_has_sales_order_sales_order1` FOREIGN KEY (`sord_no`) REFERENCES `sales_order` (`sord_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tire_has_sales_order_tire1` FOREIGN KEY (`tire_t_id`) REFERENCES `tire` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pc_item`
--
ALTER TABLE `pc_item`
  ADD CONSTRAINT `fk_tire_has_purchase_confirmation_purchase_confirmation1` FOREIGN KEY (`purchase_confirmation_pc_no`) REFERENCES `purchase_confirmation` (`pc_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tire_has_purchase_confirmation_tire1` FOREIGN KEY (`tire_t_id`) REFERENCES `tire` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pr_item`
--
ALTER TABLE `pr_item`
  ADD CONSTRAINT `fk_tire_has_purchase_requisition_purchase_requisition1` FOREIGN KEY (`purchase_requisition_pr_no`) REFERENCES `purchase_requisition` (`pr_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tire_has_purchase_requisition_tire1` FOREIGN KEY (`tire_t_id`) REFERENCES `tire` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_confirmation`
--
ALTER TABLE `purchase_confirmation`
  ADD CONSTRAINT `fk_purchase_confirmation_purchase_requisition1` FOREIGN KEY (`purchase_requisition_pr_no`) REFERENCES `purchase_requisition` (`pr_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_requisition`
--
ALTER TABLE `purchase_requisition`
  ADD CONSTRAINT `fk_purchase_requisition_import_manager1` FOREIGN KEY (`import_manager_employee_e_id`) REFERENCES `import_manager` (`employee_e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_purchase_requisition_supplier1` FOREIGN KEY (`supplier_s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `fk_quatation_regular_customer1` FOREIGN KEY (`regular_customer_r_id`) REFERENCES `customer` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotation_item`
--
ALTER TABLE `quotation_item`
  ADD CONSTRAINT `fk_tire_has_quatation_quatation1` FOREIGN KEY (`q_no`) REFERENCES `quotation` (`q_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tire_has_quatation_tire1` FOREIGN KEY (`tire_t_id`) REFERENCES `tire` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_executive`
--
ALTER TABLE `sales_executive`
  ADD CONSTRAINT `fk_sales_executive_employee1` FOREIGN KEY (`employee_e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_manager`
--
ALTER TABLE `stock_manager`
  ADD CONSTRAINT `fk_stock_manager_employee1` FOREIGN KEY (`employee_e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fk_supplier_user` FOREIGN KEY (`user_user_name`) REFERENCES `user` (`user_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD CONSTRAINT `fk_system_admin_employee1` FOREIGN KEY (`employee_e_id`) REFERENCES `employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tire`
--
ALTER TABLE `tire`
  ADD CONSTRAINT `fk_tire_supplier1` FOREIGN KEY (`supplier_s_id`) REFERENCES `supplier` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
