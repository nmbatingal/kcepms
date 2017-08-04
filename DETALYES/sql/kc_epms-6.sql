-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 07:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kc_epms`
--
CREATE DATABASE IF NOT EXISTS `kc_epms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kc_epms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tx5zAUfmE6ehX-nOrpFojaSC5zxxAPCJ', '$2y$13$kdyuSw6Y7GFTtUKJmfFR7eyveHsU0rT4NZojklUGX5BnDViEM8Xma', NULL, 'batingalnarz11@gmail.com', 10, 1497604440, 1497604440);

-- --------------------------------------------------------

--
-- Table structure for table `assignatories`
--

CREATE TABLE `assignatories` (
  `contact_id` int(11) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `mi` varchar(10) DEFAULT NULL,
  `position_abr` varchar(50) DEFAULT NULL,
  `position_desc` text,
  `tel_no` varchar(50) DEFAULT NULL,
  `fax_no` varchar(50) DEFAULT NULL,
  `cell_no` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignatories`
--

INSERT INTO `assignatories` (`contact_id`, `lastname`, `firstname`, `mi`, `position_abr`, `position_desc`, `tel_no`, `fax_no`, `cell_no`, `email`, `status`) VALUES
(1, 'Taculod', 'Ramil', 'Mendes', 'AO V', 'Regional Program Coordinator', '3425619 local 101', '815-91-73', '09773140473', 'rmtaculod.focrg@dswd.gov.ph', 1),
(2, 'Lim', 'Mita Chuchi', 'Gupana', 'OIC', 'Regional Director', NULL, NULL, NULL, NULL, 1),
(3, 'Japitana', 'Pio', 'V', 'Finance', 'Finance', NULL, NULL, NULL, NULL, 1),
(4, 'Manla', 'Mary Ann', 'M', 'PDO III', 'Regional Program Coordinator', NULL, NULL, NULL, NULL, 1),
(5, 'Lamela', 'Esphar', 'G', 'RPO', 'Regional Procurement Officer', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_item`
--

CREATE TABLE `lib_item` (
  `item_id` int(11) NOT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `generic_id` int(11) DEFAULT NULL,
  `subgeneric_id` int(11) DEFAULT NULL,
  `item_description` text NOT NULL,
  `unit_id` int(11) NOT NULL,
  `uacs_id` int(11) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `price` double(14,2) NOT NULL DEFAULT '0.00',
  `date_added` datetime DEFAULT NULL,
  `encoder` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lib_item_category`
--

CREATE TABLE `lib_item_category` (
  `item_category_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `account_title` text NOT NULL,
  `rca_code` varchar(100) DEFAULT NULL,
  `form` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_item_category`
--

INSERT INTO `lib_item_category` (`item_category_id`, `store_id`, `account_title`, `rca_code`, `form`, `status`) VALUES
(1, NULL, 'Advertising', NULL, NULL, 1),
(2, NULL, 'Board and Lodging', NULL, NULL, 1),
(3, NULL, 'Cash Advance', NULL, NULL, 1),
(4, NULL, 'Catering Services', NULL, NULL, 1),
(5, NULL, 'Cellcards', NULL, NULL, 1),
(6, NULL, 'Cleaning Supplies', NULL, NULL, 1),
(7, NULL, 'Communication Equipment', NULL, NULL, 1),
(8, NULL, 'Communication Supplies', NULL, NULL, 1),
(9, NULL, 'Computer Parts and Accessories', NULL, NULL, 1),
(10, NULL, 'Construction Equipment', NULL, NULL, 1),
(11, NULL, 'Construction Supplies', NULL, NULL, 1),
(12, NULL, 'Cooking Gas Expenses', NULL, NULL, 1),
(13, NULL, 'Dry Goods', NULL, NULL, 1),
(14, NULL, 'Electric Expenses', NULL, NULL, 1),
(15, NULL, 'Food Supplies', NULL, NULL, 1),
(16, NULL, 'Furnitures', NULL, NULL, 1),
(17, NULL, 'Gardening Supplies and Equipment', NULL, NULL, 1),
(18, NULL, 'Ink', NULL, NULL, 1),
(19, NULL, 'Ink Supplies', NULL, NULL, 1),
(20, NULL, 'Internet', NULL, NULL, 1),
(21, NULL, 'IT Equipment', NULL, NULL, 1),
(22, NULL, 'IT Supplies', NULL, NULL, 1),
(23, NULL, 'Kitchenware', NULL, NULL, 1),
(24, NULL, 'Labor', NULL, NULL, 1),
(25, NULL, 'Musical Equipment and Accessories', NULL, NULL, 1),
(26, NULL, 'Office Equipment', NULL, NULL, 1),
(27, NULL, 'Office Supplies', NULL, NULL, 1),
(28, NULL, 'Other Supplies', NULL, NULL, 1),
(29, NULL, 'Physical Fitness Equipment and Accessories', NULL, NULL, 1),
(30, NULL, 'Printing and Binding', NULL, NULL, 1),
(31, NULL, 'Rent', NULL, NULL, 1),
(32, NULL, 'Repair and Maintenance (Furniture and Fixture)', NULL, NULL, 1),
(33, NULL, 'Repair and Maintenance (IT Equipment)', NULL, NULL, 1),
(34, NULL, 'Repair and Maintenance (Motor Vehicle)', NULL, NULL, 1),
(35, NULL, 'Repair and Maintenance (Office Building)', NULL, NULL, 1),
(36, NULL, 'Repair and Maintenance (Other Structure)', NULL, NULL, 1),
(37, NULL, 'Repair and Maintenance (Vehicle)', NULL, NULL, 1),
(38, NULL, 'Software', NULL, NULL, 1),
(39, NULL, 'Welfare Goods', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_item_generic`
--

CREATE TABLE `lib_item_generic` (
  `generic_id` int(11) NOT NULL,
  `description` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_item_generic`
--

INSERT INTO `lib_item_generic` (`generic_id`, `description`, `status`) VALUES
(1, 'Acid', 1),
(2, 'Alcohol', 1),
(3, 'Bag', 1),
(4, 'Baking powder', 1),
(5, 'Band', 1),
(6, 'Bar', 1),
(7, 'Basketball', 1),
(8, 'Battery', 1),
(9, 'Billeting', 1),
(10, 'Bin', 1),
(11, 'Binder', 1),
(12, 'Bisagra', 1),
(13, 'Biscuits', 1),
(14, 'Blade', 1),
(15, 'Blanket', 1),
(16, 'Blouse', 1),
(17, 'Board', 1),
(18, 'Booties', 1),
(19, 'Boots', 1),
(20, 'Box', 1),
(21, 'Bracket', 1),
(22, 'Broom', 1),
(23, 'Brush', 1),
(24, 'Bulb', 1),
(25, 'Can', 1),
(26, 'Candies', 1),
(27, 'Carbon Film', 1),
(28, 'Card', 1),
(29, 'Cartolina', 1),
(30, 'Cartridge', 1),
(31, 'Cement', 1),
(32, 'Cereal', 1),
(33, 'Chair', 1),
(34, 'Chalk', 1),
(35, 'Chisel', 1),
(36, 'Circuit breaker', 1),
(37, 'Cleaner', 1),
(38, 'Cleanser', 1),
(39, 'Clearbook', 1),
(40, 'Clip', 1),
(41, 'Clock', 1),
(42, 'Coffee', 1),
(43, 'Columnar Pad', 1),
(44, 'Compact Disc', 1),
(45, 'Computer', 1),
(46, 'Container', 1),
(47, 'Curtain', 1),
(48, 'Cutter', 1),
(49, 'Deodorizer', 1),
(50, 'Disinfectant', 1),
(51, 'Dispenser', 1),
(52, 'Door', 1),
(53, 'Drum', 1),
(54, 'DVD', 1),
(55, 'Emergency Light', 1),
(56, 'Envelope', 1),
(57, 'Eraser', 1),
(58, 'External Memory', 1),
(59, 'Fan', 1),
(60, 'Fastener', 1),
(61, 'File Organizer', 1),
(62, 'Fish', 1),
(63, 'Flash Drive', 1),
(64, 'Flashlight', 1),
(65, 'Folder', 1),
(66, 'Garden soil', 1),
(67, 'Glass Door', 1),
(68, 'Globe', 1),
(69, 'Gloves', 1),
(70, 'Glue', 1),
(71, 'Grout', 1),
(72, 'Guitar', 1),
(73, 'Hardiflex', 1),
(74, 'Helmet', 1),
(75, 'Hollow Block', 1),
(76, 'Hose', 1),
(77, 'Ink', 1),
(78, 'Internal Memory', 1),
(79, 'Knob', 1),
(80, 'Lamp', 1),
(81, 'Logbook', 1),
(82, 'Lumber', 1),
(83, 'Lyre', 1),
(84, 'Machine', 1),
(85, 'Mallet', 1),
(86, 'Marker', 1),
(87, 'Meal', 1),
(88, 'Meat', 1),
(89, 'Microphone', 1),
(90, 'Mirror', 1),
(91, 'Mittens', 1),
(92, 'Moblie Phone', 1),
(93, 'Monitor', 1),
(94, 'Mop', 1),
(95, 'Mosquitonette', 1),
(96, 'Mouse', 1),
(97, 'Nails', 1),
(98, 'Noodles', 1),
(99, 'Notebook', 1),
(100, 'Notepad', 1),
(101, 'Ordinary plywood', 1),
(102, 'Padlock', 1),
(103, 'Paint', 1),
(104, 'Pan', 1),
(105, 'Pants', 1),
(106, 'Paper', 1),
(107, 'Paper Clip', 1),
(108, 'Pen', 1),
(109, 'Pencil', 1),
(110, 'Pin', 1),
(111, 'Pipe', 1),
(112, 'Pipes', 1),
(113, 'Plug', 1),
(114, 'Plyboard', 1),
(115, 'Plywood', 1),
(116, 'Pot', 1),
(117, 'Powdered Drink', 1),
(118, 'Power bank', 1),
(119, 'Puncher', 1),
(120, 'PVC', 1),
(121, 'Raincoat', 1),
(122, 'RAM', 1),
(123, 'Remover', 1),
(124, 'Ribbon', 1),
(125, 'Rod', 1),
(126, 'Ruler', 1),
(127, 'Sand', 1),
(128, 'Sandwich Spread', 1),
(129, 'Sanitizer', 1),
(130, 'Sauce', 1),
(131, 'Scale', 1),
(132, 'Scissors', 1),
(133, 'Screen', 1),
(134, 'Sea foods', 1),
(135, 'Search Light', 1),
(136, 'Seasoning', 1),
(137, 'Sharpener', 1),
(138, 'Sheet', 1),
(139, 'Shirt', 1),
(140, 'Skirt', 1),
(141, 'Slippers', 1),
(142, 'Snack', 1),
(143, 'Soap', 1),
(144, 'Sock', 1),
(145, 'Sponge', 1),
(146, 'Stamp', 1),
(147, 'Stamp Pad', 1),
(148, 'Stand', 1),
(149, 'Stapler', 1),
(150, 'Starch', 1),
(151, 'Stick-on Toilet Bowl', 1),
(152, 'Sugar', 1),
(153, 'System', 1),
(154, 'T-Shirt', 1),
(155, 'Table', 1),
(156, 'Tape', 1),
(157, 'Tile Edger', 1),
(158, 'Tiles', 1),
(159, 'Toner', 1),
(160, 'Tool', 1),
(161, 'Towel', 1),
(162, 'Trim', 1),
(163, 'Turn Buckle', 1),
(164, 'Umbrella', 1),
(165, 'Underwear', 1),
(166, 'UPS', 1),
(167, 'UPVC', 1),
(168, 'Vegetables', 1),
(169, 'Vinegar', 1),
(170, 'Volleyball', 1),
(171, 'Vulcaseal', 1),
(172, 'Wax', 1),
(173, 'Wheel barrow', 1),
(174, 'Wire', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_item_store_category`
--

CREATE TABLE `lib_item_store_category` (
  `store_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_item_store_category`
--

INSERT INTO `lib_item_store_category` (`store_id`, `description`, `status`) VALUES
(1, 'Accountable Forms, Plates and Stickers Inventory', 1),
(2, 'Advertising', 1),
(3, 'Board and Lodging', 1),
(4, 'Books', 1),
(5, 'Cash Advance', 1),
(6, 'Catering Services', 1),
(7, 'Cellcards', 1),
(8, 'Cleaning Supplies', 1),
(9, 'Communication Equipment', 1),
(10, 'Communication Supplies', 1),
(11, 'Computer Parts and Accessories', 1),
(12, 'Construction and Heavy Equipment', 1),
(13, 'Construction Equipment', 1),
(14, 'Construction in Progress-Land Improvements', 1),
(15, 'Construction Materials for Distribution', 1),
(16, 'Construction Materials Inventory', 1),
(17, 'Construction Supplies', 1),
(18, 'Cooking Gas Expenses', 1),
(19, 'Disaster Response and Rescue Equipment', 1),
(20, 'Dry Goods', 1),
(21, 'Electric Expenses', 1),
(22, 'Firefighting Equipment and Accessories', 1),
(23, 'Food Supplies', 1),
(24, 'Food Supplies for Distribution', 1),
(25, 'Food Supplies Inventory', 1),
(26, 'Fuel, Oil and Lubricants Inventory', 1),
(27, 'Furniture and Fixtures', 1),
(28, 'Furnitures', 1),
(29, 'Gardening Supplies and Equipment', 1),
(30, 'Information and Communications Technology Equipment', 1),
(31, 'Ink', 1),
(32, 'Ink Supplies', 1),
(33, 'Internet', 1),
(34, 'IT Equipment', 1),
(35, 'IT Supplies', 1),
(36, 'Kitchenware', 1),
(37, 'Labor', 1),
(38, 'Machinery', 1),
(39, 'Motor Vehicles', 1),
(40, 'Musical Equipment and Accessories', 1),
(41, 'Non-Accountable Forms Inventory', 1),
(42, 'Office Equipment', 1),
(43, 'Office Supplies', 1),
(44, 'Office Supplies Inventory', 1),
(45, 'Other Land Improvements', 1),
(46, 'Other Machinery and Equipment', 1),
(47, 'Other Property, Plant and Equipment', 1),
(48, 'Other Structures', 1),
(49, 'Other Supplies', 1),
(50, 'Other Supplies and Materials Inventory', 1),
(51, 'Physical Fitness Equipment and Accessories', 1),
(52, 'Printing and Binding', 1),
(53, 'Printing Equipment', 1),
(54, 'Rent', 1),
(55, 'Repair and Maintenance (Furniture and Fixture)', 1),
(56, 'Repair and Maintenance (IT Equipment)', 1),
(57, 'Repair and Maintenance (Motor Vehicle)', 1),
(58, 'Repair and Maintenance (Office Building)', 1),
(59, 'Repair and Maintenance (Other Structure)', 1),
(60, 'Repair and Maintenance (Vehicle)', 1),
(61, 'Semi-Expendable Books', 1),
(62, 'Semi-Expendable Communications Equipment', 1),
(63, 'Semi-Expendable Furniture and Fixtures', 1),
(64, 'Semi-Expendable Information and Communications Technology Equipment', 1),
(65, 'Semi-Expendable Machinery', 1),
(66, 'Semi-Expendable Office Equipment', 1),
(67, 'Semi-Expendable Other Machinery and Equipment', 1),
(68, 'Semi-Expendable Printing Equipment', 1),
(69, 'Semi-Expendable Sports Equipment', 1),
(70, 'Software', 1),
(71, 'Sports Equipment', 1),
(72, 'Welfare Goods', 1),
(73, 'Welfare Goods for Distribution', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_item_subgeneric`
--

CREATE TABLE `lib_item_subgeneric` (
  `subgeneric_id` int(11) NOT NULL,
  `description` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_item_subgeneric`
--

INSERT INTO `lib_item_subgeneric` (`subgeneric_id`, `description`, `status`) VALUES
(1, 'Aluminum', 1),
(2, 'Angular', 1),
(3, 'Brass', 1),
(4, 'C.W.', 1),
(5, 'Ceramic Floor', 1),
(6, 'Ceramic Wall', 1),
(7, 'Clip', 1),
(8, 'Coco', 1),
(9, 'Concrete', 1),
(10, 'Coupling', 1),
(11, 'Door', 1),
(12, 'Elbow', 1),
(13, 'Electrical', 1),
(14, 'Enamel', 1),
(15, 'Extension', 1),
(16, 'Finishing', 1),
(17, 'Flat Latex', 1),
(18, 'Flourescent', 1),
(19, 'GI', 1),
(20, 'Gloss', 1),
(21, 'Granite', 1),
(22, 'Hacksaw', 1),
(23, 'Iron', 1),
(24, 'Lawaan', 1),
(25, 'Lighting', 1),
(26, 'Male', 1),
(27, 'Paper', 1),
(28, 'Reducer Tee', 1),
(29, 'Roller', 1),
(30, 'Screen', 1),
(31, 'Screened', 1),
(32, 'Semi Gloss', 1),
(33, 'Solvent', 1),
(34, 'Steel', 1),
(35, 'Tee', 1),
(36, 'Teflon', 1),
(37, 'Tie', 1),
(38, 'Tile', 1),
(39, 'Welding', 1),
(40, 'Window', 1),
(41, 'Wood', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_item_unit`
--

CREATE TABLE `lib_item_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_item_unit`
--

INSERT INTO `lib_item_unit` (`unit_id`, `name`) VALUES
(23, 'bar'),
(19, 'book'),
(9, 'bottle'),
(5, 'box'),
(13, 'bundle'),
(8, 'can'),
(22, 'canister'),
(6, 'cart'),
(4, 'case'),
(24, 'container'),
(14, 'jar'),
(25, 'kilo'),
(29, 'lot'),
(12, 'pack'),
(2, 'packet'),
(11, 'pad'),
(10, 'pair'),
(28, 'pax'),
(1, 'piece'),
(26, 'pouch'),
(21, 'quire'),
(18, 'ream'),
(7, 'roll'),
(3, 'set'),
(30, 'sheet'),
(20, 'spool'),
(15, 'tube'),
(27, 'unit');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1497604340),
('m130524_201442_init', 1497604344);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp`
--

CREATE TABLE `ppmp` (
  `ppmp_id` int(11) NOT NULL,
  `ppmp_unit_id` int(11) DEFAULT NULL,
  `ppmp_category_id` int(11) DEFAULT NULL,
  `size_quantity` double(10,2) DEFAULT NULL,
  `budget` double(10,2) DEFAULT NULL,
  `deduction` double(10,2) DEFAULT NULL,
  `ppmp_mode_id` int(11) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `encoder` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp`
--

INSERT INTO `ppmp` (`ppmp_id`, `ppmp_unit_id`, `ppmp_category_id`, `size_quantity`, `budget`, `deduction`, `ppmp_mode_id`, `year`, `date_created`, `encoder`, `status`) VALUES
(1, 1, 1, NULL, NULL, NULL, 9, '2017', '2017-06-28 11:39:10', 1, 1),
(2, 1, 2, NULL, 2385853.00, 78450.00, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(3, 1, 3, NULL, 111000.00, NULL, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(4, 1, 4, NULL, NULL, NULL, NULL, '2017', '2017-06-28 11:39:10', 1, 1),
(5, 1, 5, NULL, NULL, NULL, NULL, '2017', '2017-06-28 11:39:10', 1, 1),
(6, 1, 6, NULL, NULL, NULL, NULL, '2017', '2017-06-28 11:39:10', 1, 1),
(7, 1, 7, NULL, 195000.00, NULL, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(8, 1, 8, NULL, 24358686.00, 3200.00, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(9, 1, 9, NULL, 5453250.00, NULL, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(10, 1, 10, NULL, 6810100.00, 0.00, 7, '2017', '2017-06-28 11:39:10', 1, 1),
(11, 1, 11, NULL, 11046624.00, NULL, 5, '2017', '2017-06-28 11:39:10', 1, 1),
(12, 1, 12, NULL, NULL, NULL, NULL, '2017', '2017-06-28 11:39:10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_category`
--

CREATE TABLE `ppmp_category` (
  `ppmp_category_id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_category`
--

INSERT INTO `ppmp_category` (`ppmp_category_id`, `code`, `description`) VALUES
(1, '5020301000', 'A . DBM-PS Supplies and Equipment'),
(2, '5020301000', 'B. Outside DBM-PS Supplies '),
(3, '5020201000', 'C. Training Supplies'),
(4, '5060405003', 'D. Information and Communication Technlogy Supplies'),
(5, '5060405022', 'E. Equipment'),
(6, '5060407001', 'F. Furniture and Fixtures'),
(7, '5029902000', 'G. Advertisement and Printing'),
(8, '5020201000', 'H. Catering Services'),
(9, '5020201000', 'I. Board and Lodging'),
(10, NULL, 'J. Other Goods and Services'),
(11, NULL, 'II. CONSULTING SERVICES'),
(12, '5060404001', 'III. CIVIL WORKS');

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_item_category`
--

CREATE TABLE `ppmp_item_category` (
  `ppmp_item_cat_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_item_category`
--

INSERT INTO `ppmp_item_category` (`ppmp_item_cat_id`, `description`, `status`) VALUES
(1, 'A. Office Supplies', 1),
(2, 'B. Other Supplies', 1),
(3, 'C. Semi-Expendables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_item_deduction`
--

CREATE TABLE `ppmp_item_deduction` (
  `ppmp_item_deduct_id` int(11) NOT NULL,
  `ppmp_item_original_id` int(11) NOT NULL,
  `item_price` double(14,2) NOT NULL,
  `january` int(11) DEFAULT '0',
  `february` int(11) DEFAULT '0',
  `march` int(11) DEFAULT '0',
  `april` int(11) DEFAULT '0',
  `may` int(11) DEFAULT '0',
  `june` int(11) DEFAULT '0',
  `july` int(11) DEFAULT '0',
  `august` int(11) DEFAULT '0',
  `september` int(11) DEFAULT '0',
  `october` int(11) DEFAULT '0',
  `november` int(11) DEFAULT '0',
  `december` int(11) DEFAULT '0',
  `total_count` int(11) NOT NULL,
  `total_amount` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_item_original`
--

CREATE TABLE `ppmp_item_original` (
  `ppmp_item_original_id` int(11) NOT NULL,
  `ppmp_id` int(11) NOT NULL,
  `ppmp_item_cat_id` int(11) DEFAULT NULL,
  `ppmp_item_subcat_id` int(11) NOT NULL,
  `item_description` text NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `addtitional_number` varchar(100) DEFAULT NULL,
  `item_price` double(14,2) NOT NULL,
  `january` int(11) DEFAULT '0',
  `february` int(11) DEFAULT '0',
  `march` int(11) DEFAULT '0',
  `april` int(11) DEFAULT '0',
  `may` int(11) DEFAULT '0',
  `june` int(11) DEFAULT '0',
  `july` int(11) DEFAULT '0',
  `august` int(11) DEFAULT '0',
  `september` int(11) DEFAULT '0',
  `october` int(11) DEFAULT '0',
  `november` int(11) DEFAULT '0',
  `december` int(11) DEFAULT '0',
  `total_count` int(11) NOT NULL,
  `total_amount` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_item_original`
--

INSERT INTO `ppmp_item_original` (`ppmp_item_original_id`, `ppmp_id`, `ppmp_item_cat_id`, `ppmp_item_subcat_id`, `item_description`, `inventory_id`, `unit_id`, `addtitional_number`, `item_price`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `total_count`, `total_amount`) VALUES
(1, 2, 1, 3, 'Bondpaper, A3 size, substance 20', NULL, 18, '', 500.00, 0, 20, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 40, 20000.00),
(2, 2, 1, 3, 'Bondpaper, A4 size, substance 20', NULL, 18, NULL, 145.00, 0, 1800, 0, 0, 1200, 0, 0, 0, 0, 0, 0, 0, 3000, 435000.00),
(3, 2, 1, 3, 'Bondpaper, long size, substance 20', NULL, 18, NULL, 160.00, 0, 1350, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 0, 2350, 376000.00),
(4, 2, 1, 3, 'Clip binder, backfold, 1-1/4", 12s/box (Double Clips)', NULL, 12, NULL, 20.00, 0, 15, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 30, 600.00),
(5, 2, 1, 3, 'Clip binder, backfold, 2", 12s/box (Double Clips)', NULL, 12, NULL, 40.00, 0, 15, 0, 0, 15, 0, 0, 0, 0, 0, 0, 0, 30, 1200.00),
(6, 2, 1, 3, 'Correction Pen, at least 7 ml.', NULL, 1, NULL, 60.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(7, 2, 1, 3, 'Correction Tape, 5mm x 8m', NULL, 1, NULL, 25.00, 0, 150, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 300, 7500.00),
(8, 2, 1, 3, 'Envelope, Brown, legal 100s/box', NULL, 18, NULL, 500.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 30000.00),
(9, 2, 1, 3, 'Envelope, expanding with garter, kraft, legal size, 100s/box', NULL, 18, NULL, 950.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 57000.00),
(10, 2, 1, 3, 'Fastener long hand, for paper, 50 sets/box', NULL, 5, NULL, 100.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(11, 2, 1, 3, 'Fastener, for paper, metal, 50 sets/box', NULL, 5, NULL, 40.00, 0, 100, 0, 0, 120, 0, 0, 0, 0, 0, 0, 0, 220, 8800.00),
(12, 2, 1, 3, 'Folder Plain, Legal,  100s/box', NULL, 18, NULL, 380.00, 0, 60, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 120, 45600.00),
(13, 2, 1, 3, 'Glue, all purpose, 200 grams min.', NULL, 1, NULL, 60.00, 0, 60, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 120, 7200.00),
(14, 2, 1, 3, 'Linen Paper, short size', NULL, 12, NULL, 50.00, 0, 20, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 40, 2000.00),
(15, 2, 1, 3, 'Manila Paper', NULL, 1, NULL, 3.00, 0, 2000, 0, 0, 2000, 0, 0, 0, 0, 0, 0, 0, 4000, 12000.00),
(16, 2, 1, 3, 'Photo Paper, A3 size', NULL, 18, NULL, 150.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(17, 2, 1, 3, 'PUSH PIN, flat head type, assorted colors, 100s/case', NULL, 4, NULL, 35.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(18, 2, 1, 3, 'RECORD BOOK, 300 pages, smythe sewn', NULL, 19, NULL, 65.00, 0, 120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 120, 7800.00),
(19, 2, 1, 3, 'RING BINDER, 19mm x 1.12m(3/4"x44"), plastic', NULL, 1, NULL, 15.00, 0, 25, 0, 0, 25, 0, 0, 0, 0, 0, 0, 0, 50, 750.00),
(20, 2, 1, 3, 'Rubber Stamp', NULL, 1, NULL, 200.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(21, 2, 1, 3, 'Rubber Bands, all purpose, size atleast no.18, atleast 225 gms', NULL, 5, NULL, 160.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(22, 2, 1, 3, 'Ruler, Plastic, Flexible Transparent 12"', NULL, 1, NULL, 10.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(23, 2, 1, 3, 'Sign Pen, black, 0.5mm', NULL, 1, NULL, 25.00, 0, 100, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 200, 5000.00),
(24, 2, 1, 3, 'Sign Pen, blue, 0.5mm', NULL, 1, NULL, 25.00, 0, 100, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 200, 5000.00),
(25, 2, 1, 3, 'Sign Pen, green, 0.5mm', NULL, 1, NULL, 25.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(26, 2, 1, 3, 'STAMP PAD INK, violet, 50mL', NULL, 9, NULL, 35.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 2100.00),
(27, 2, 1, 3, 'STAMP PAD, felt pad, min 60mm x 100mm ', NULL, 1, NULL, 35.00, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 5, 175.00),
(28, 2, 1, 3, 'TAPE, masking, 24mm, 50 meters length', NULL, 7, NULL, 30.00, 0, 120, 0, 0, 120, 0, 0, 0, 0, 0, 0, 0, 240, 7200.00),
(29, 2, 1, 3, 'TAPE, packaging, 48mm, 50 meters length', NULL, 7, NULL, 35.00, 0, 30, 0, 0, 30, 0, 0, 0, 0, 0, 0, 0, 60, 2100.00),
(30, 2, 1, 3, 'TAPE, transparent, 24mm, 50 meters', NULL, 7, NULL, 30.00, 0, 30, 0, 0, 30, 0, 0, 0, 0, 0, 0, 0, 60, 1800.00),
(31, 2, 1, 3, 'TWINE, plastic, one kilo per roll', NULL, 7, NULL, 150.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 1500.00),
(32, 2, 1, 3, 'Training Box Big, plastic, jumbo size, atleast 120 liters', NULL, 1, NULL, 1200.00, 0, 10, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 20, 24000.00),
(33, 2, 1, 4, 'Pencil Sharpener, desk manual, heavy duty', NULL, 1, NULL, 300.00, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 1500.00),
(34, 2, 1, 4, 'STAPLE REMOVER, twin jaws', NULL, 1, NULL, 25.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(35, 2, 1, 4, 'TAPE DISPENSER, heavy duty, for 24mm(1")', NULL, 1, NULL, 75.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(36, 2, 1, 9, 'Photocopier Toner TN-114 Develop Ineo or equivalent (atleast 8,000 to 15,000 copies)', NULL, 1, NULL, 3500.00, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 6, 21000.00),
(37, 2, 1, 9, 'Photocopier Toner for 4501i (At least 35,000 pages) or equivalent', NULL, 1, NULL, 13000.00, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 6, 78000.00),
(38, 2, 1, 9, 'Photocopier Toner TN 118 or equivalent', NULL, 1, NULL, 3500.00, 0, 12, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 24, 84000.00),
(39, 2, 1, 9, 'Imaging unit, life atleast 80,000 copies to 140,000 copies (consumables)', NULL, 27, NULL, 21000.00, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 3, 63000.00),
(40, 2, 1, 10, 'Printer Ink # 810 black or equivalent', NULL, 1, NULL, 1000.00, 0, 70, 0, 0, 75, 0, 0, 0, 0, 0, 0, 0, 145, 145000.00),
(41, 2, 1, 10, 'Printer Ink # 811 colored or equivalent', NULL, 1, NULL, 1000.00, 0, 70, 0, 0, 75, 0, 0, 0, 0, 0, 0, 0, 145, 145000.00),
(42, 2, 1, 10, 'Printer Ink TONER 83A or equivalent', NULL, 1, NULL, 4300.00, 0, 30, 0, 0, 20, 0, 0, 0, 0, 0, 0, 0, 50, 215000.00),
(43, 2, 1, 10, 'Printer Ink # 678 Black  or equivalent', NULL, 1, NULL, 800.00, 0, 10, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 20, 16000.00),
(44, 2, 1, 10, 'Printer Ink # 678 Colored  or equivalent', NULL, 1, NULL, 800.00, 0, 10, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 20, 16000.00),
(45, 2, 1, 10, 'Potable Printer Ink No. 35 or equivalent', NULL, 1, NULL, 870.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 8700.00),
(46, 2, 1, 10, 'Potable Printer Ink No. 36 or equivalent', NULL, 1, NULL, 1200.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 12000.00),
(47, 2, 2, 11, 'Cork Board 1/4', NULL, 1, NULL, 1000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(48, 2, 2, 5, 'Trash Can (Big) atleast 17 L', NULL, 1, NULL, 500.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(49, 2, 2, 5, 'Trash Can (small) atleast 9 L', NULL, 1, NULL, 250.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(50, 2, 2, 5, 'Rag', NULL, 1, NULL, 50.00, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 500.00),
(51, 2, 2, 5, 'Floor Mop', NULL, 1, NULL, 500.00, 0, 0, 3, 0, 0, 3, 0, 0, 0, 0, 0, 0, 6, 3000.00),
(52, 2, 2, 5, 'Dustpan, Plastic', NULL, 1, NULL, 500.00, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 1500.00),
(53, 2, 2, 5, 'Toilet Brush Set', NULL, 1, NULL, 300.00, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 900.00),
(54, 2, 2, 5, 'Muriatic Acid 1000 ml. min.', NULL, 1, NULL, 100.00, 0, 0, 12, 0, 0, 12, 0, 0, 0, 0, 0, 0, 24, 2400.00),
(55, 2, 2, 5, 'Liquid dishwashing soap 250 ml. min.', NULL, 1, NULL, 100.00, 0, 0, 12, 0, 0, 12, 0, 0, 0, 0, 0, 0, 24, 2400.00),
(56, 2, 2, 5, 'BROOM, soft (tambo)', NULL, 1, NULL, 114.00, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 228.00),
(57, 2, 2, 5, 'BROOM, STICK (tingting)', NULL, 1, NULL, 50.00, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 150.00),
(58, 2, 1, 3, 'Ballpen, black 50''s/box', NULL, 5, NULL, 225.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 22500.00),
(59, 2, 1, 3, 'Ballpen, Red 50''s/box', NULL, 5, NULL, 225.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 2250.00),
(60, 2, 1, 3, 'Battery "AA"', NULL, 1, NULL, 30.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(61, 2, 1, 3, 'Battery "AAA"', NULL, 1, NULL, 30.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(62, 2, 1, 3, 'CARBON FILM, polyehtylene, 216mm x 330mm, 100s/box', NULL, 5, NULL, 360.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(63, 2, 1, 3, 'CARTOLINA, assorted color, 20s/pack', NULL, 12, NULL, 100.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 10000.00),
(64, 2, 1, 3, 'ERASER, blackboard/whiteboard', NULL, 1, NULL, 50.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(65, 2, 1, 3, 'Highlighter Pen, assorted color', NULL, 1, NULL, 30.00, 0, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 600.00),
(66, 2, 1, 3, 'MARKING PEN, whiteboard, black', NULL, 1, NULL, 350.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 3500.00),
(67, 2, 1, 3, 'Mounting Double Adhesive Tape', NULL, 7, NULL, 150.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(68, 2, 1, 3, 'Note book, stenographer''s, at least 40 leaves', NULL, 1, NULL, 10.00, 0, 1000, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 0, 2000, 20000.00),
(69, 2, 1, 3, 'PAPER CLIP, gem type, 32mm, 100s/box', NULL, 5, NULL, 15.00, 0, 60, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 120, 1800.00),
(70, 2, 1, 3, 'PAPER CLIP, gem type,jumbo, 48mm, 100s/box', NULL, 5, NULL, 25.00, 0, 60, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 120, 3000.00),
(71, 2, 1, 3, 'PENCIL, lead, w/eraser, 0ne(1) dozen per box', NULL, 5, '', 85.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 8500.00),
(72, 2, 1, 3, 'Pentel Pen Marker, permanent, black', NULL, 12, NULL, 350.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 21000.00),
(73, 2, 1, 3, 'Staple Wire, standard, # 35', NULL, 5, NULL, 30.00, 0, 60, 0, 0, 60, 0, 0, 0, 0, 0, 0, 0, 120, 3600.00),
(74, 2, 1, 3, 'Sticky Note Pad, (3"x3"), 100 sheets/pad', NULL, 1, NULL, 30.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(75, 2, 1, 4, 'Calculator, desktop, 12 Digits', NULL, 1, NULL, 500.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(76, 2, 1, 4, 'CUTTER, heavy duty ', NULL, 1, NULL, 50.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 3000.00),
(77, 2, 1, 4, 'Puncher, standard 2 hole, heavy duty', NULL, 1, NULL, 135.00, 0, 20, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 30, 4050.00),
(78, 2, 1, 4, 'Scissors, atleast 6"', NULL, 1, NULL, 25.00, 0, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 60, 1500.00),
(79, 2, 1, 4, 'Stapler, heavy duty, # 35 with remover', NULL, 1, NULL, 175.00, 0, 20, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 30, 5250.00),
(80, 2, 1, 10, 'Printer Ink TONER 85A or equivalent', NULL, 1, NULL, 3500.00, 0, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 10, 35000.00),
(81, 2, 1, 10, 'CISS Ink Black T6641 or Equivalent 70 ml.', NULL, 1, NULL, 350.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 35000.00),
(82, 2, 1, 10, 'CISS Ink Cyan T6642 or Equivalent 70 ml.', NULL, 1, NULL, 350.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 35000.00),
(83, 2, 1, 10, 'CISS Ink Magenta T6643 or Equivalent 70 ml.', NULL, 1, NULL, 350.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 35000.00),
(84, 2, 1, 10, 'CISS Ink Yellow T6664 or Equivalent 70 ml.', NULL, 1, NULL, 350.00, 0, 50, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 100, 35000.00),
(85, 2, 1, 10, 'Epson Ink 664  Cyan for A3 printer', NULL, 1, NULL, 350.00, 0, 9, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 18, 6300.00),
(86, 2, 1, 10, 'Epson Ink 664 Black for A3 printer', NULL, 1, NULL, 350.00, 0, 18, 0, 0, 18, 0, 0, 0, 0, 0, 0, 0, 36, 12600.00),
(87, 2, 1, 10, 'Epson Ink 664 Magenta for A3 printer', NULL, 1, NULL, 350.00, 0, 9, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 18, 6300.00),
(88, 2, 1, 10, 'Epson Ink 664 Yellow for A3 printer', NULL, 1, NULL, 350.00, 0, 9, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 18, 6300.00),
(89, 2, 2, 5, 'Detergent powder, all purpose, sachet, 500 grams min.', NULL, 26, NULL, 50.00, 0, 0, 12, 0, 0, 12, 0, 0, 0, 0, 0, 0, 24, 1200.00),
(90, 2, 2, 5, 'Disinfectant Spray/Air Freshener, 280 ml. min.', NULL, 8, NULL, 200.00, 0, 0, 12, 0, 0, 12, 0, 0, 0, 0, 0, 0, 24, 4800.00),
(91, 2, 2, 5, 'Floor Wax, Natural, can 2kgs. min.', NULL, 8, NULL, 300.00, 0, 0, 2, 0, 0, 2, 0, 0, 0, 0, 0, 0, 4, 1200.00),
(92, 2, 2, 11, 'White Board (4''x8'') without stand', NULL, 1, NULL, 4000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(93, 2, 2, 11, 'White Board 1/2', NULL, 1, NULL, 2000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(94, 2, 2, 12, 'Beverage Glass (Tall)', NULL, 1, NULL, 25.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(95, 2, 2, 12, 'Coffe Mugs', NULL, 1, NULL, 75.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(96, 2, 2, 12, 'Dining Plates (round)', NULL, 1, NULL, 50.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(97, 2, 2, 12, 'Dining Table Fork', NULL, 1, NULL, 25.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(98, 2, 2, 12, 'Dining Table Spoon', NULL, 1, NULL, 25.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(99, 2, 2, 12, 'Kitchen Knife with brand (Big)', NULL, 1, NULL, 322.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(100, 2, 2, 12, 'Kitchen Utensil Racks', NULL, 1, NULL, 3000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(101, 2, 2, 13, 'Cell Cards (Globe/Smart) for RPMO & ACT M&E Database Uploading', NULL, 1, NULL, 500.00, 0, 150, 0, 0, 150, 0, 0, 0, 0, 0, 0, 0, 300, 150000.00),
(102, 2, 3, 14, 'External Hard Drive 1TB', NULL, 27, NULL, 5000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(103, 2, 3, 14, 'Power bank 20,000 mAh branded', NULL, 27, NULL, 5000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(104, 2, 3, 14, 'Printer colored multi-function (3 in 1)', NULL, 27, NULL, 8000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(105, 2, 3, 14, 'USB 32GB', NULL, 27, NULL, 1000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(106, 2, 3, 11, '4 Drawers Steel Filing Cabinet heavy duty', NULL, 27, NULL, 10000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(107, 2, 3, 11, 'Office  Chair', NULL, 27, NULL, 3000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(108, 2, 3, 11, 'Office Table', NULL, 27, NULL, 6000.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00),
(109, 2, 3, 15, 'Tokens: Program Implementation Updating', NULL, 29, NULL, 1000.00, 0, 15, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 35, 35000.00),
(110, 3, NULL, 16, 'Construction Safety Training Supplies', NULL, 28, NULL, 200.00, 0, 85, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 85, 17000.00),
(111, 3, NULL, 16, 'ACT Refresher Course on CEAC Stage 1 to 4 Training Supplies', NULL, 28, NULL, 200.00, 0, 189, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 189, 37800.00),
(112, 3, NULL, 16, 'Writeshop on Packaging Kalahi-CIDSS Development Stories in the Field and Introduction to Photography and Photo Captioning (Batch 2) Training Supplies', NULL, 28, NULL, 150.00, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 15000.00),
(113, 3, NULL, 17, 'Contractors/Suppliers Conference Training Supplies', NULL, 29, NULL, 10000.00, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 10000.00),
(114, 3, NULL, 17, 'Stakeholders Forum Training Supplies', NULL, 29, NULL, 150.00, 0, 0, 0, 0, 40, 0, 0, 0, 0, 0, 0, 0, 40, 6000.00),
(115, 3, NULL, 17, 'Technical Session/Workshop on Preparation of Plan Design and POW Training Supplies', NULL, 29, NULL, 25200.00, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 25200.00),
(116, 7, NULL, 20, 'Newsletter (Pukot)', NULL, 1, NULL, 120.00, 0, 0, 0, 0, 0, 250, 0, 0, 0, 0, 0, 0, 250, 30000.00),
(117, 7, NULL, 20, 'KC-NCDDP Advocacy Posters (Transparency and Accountability)', NULL, 1, NULL, 50.00, 0, 0, 0, 0, 0, 1000, 0, 0, 0, 0, 0, 0, 1000, 50000.00),
(118, 7, NULL, 20, 'Caraga Frontline Magazine', NULL, 1, NULL, 150.00, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 100, 15000.00),
(119, 7, NULL, 20, 'Film Making Competition (Documentary Film) Price, Advertising/Promotional Expenses', NULL, 1, NULL, 100000.00, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 100000.00),
(120, 11, NULL, 41, 'TAF Technical Service Provider CAD Operator & Supervision', NULL, 29, NULL, 279000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 1674000.00),
(121, 11, NULL, 41, 'TAF Technical Service Provider Procurement Monitoring', NULL, 29, NULL, 124000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 744000.00),
(122, 11, NULL, 41, 'TAF Technical Service Provider Infrastructure Supervision', NULL, 29, NULL, 310000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 1860000.00),
(123, 11, NULL, 41, 'TAF Technical Service Provider Finance Supervision', NULL, 29, NULL, 332000.00, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 6, 1992000.00),
(124, 11, NULL, 41, 'TAF Technical Service Provider Monitoring & Evaluation', NULL, 29, NULL, 548000.00, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 6, 3288000.00),
(125, 11, NULL, 41, 'TAF Resource Speaker in Coaching Session on Procurement & Infra Related Legal Concerns', NULL, 29, NULL, 72000.00, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 72000.00),
(126, 10, NULL, 25, 'Communication ACT', NULL, 29, NULL, 291600.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 1749600.00),
(127, 10, NULL, 25, 'Communication SRPMO', NULL, 29, NULL, 43600.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 261600.00),
(128, 10, NULL, 26, 'Hauling of Supplies RPMO', NULL, 29, NULL, 10000.00, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 3, 30000.00),
(129, 10, NULL, 26, 'Hauling of Supplies SRPMO\r\n', NULL, 29, NULL, 25000.00, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 3, 75000.00),
(130, 10, NULL, 27, 'Internet RPMO', NULL, 29, NULL, 10500.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 63000.00),
(131, 10, NULL, 27, 'Internet SRPMO', NULL, 29, NULL, 5000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 30000.00),
(132, 10, NULL, 28, 'Mobile RPMO', NULL, 29, NULL, 86400.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 518400.00),
(133, 10, NULL, 29, 'Landline RPMO', NULL, 29, NULL, 5000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 30000.00),
(134, 10, NULL, 43, 'Telephone SRPMO', NULL, 29, NULL, 5000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 30000.00),
(135, 8, NULL, 21, 'CEAC/Social Preparation Activities for 642 Barangays (Please Refer to WFP 2017 Approved Without Tier 2)\r\n', NULL, 29, NULL, 3210000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 19260000.00),
(136, 8, NULL, 16, 'Cluster 1 Bimonthly Coaching Session\r\n', NULL, 28, NULL, 750.00, 0, 60, 0, 60, 0, 60, 0, 0, 0, 0, 0, 0, 180, 135000.00),
(137, 8, NULL, 16, 'Cluster 2 Bimonthly Coaching Session\r\n', NULL, 28, NULL, 750.00, 0, 60, 0, 60, 0, 60, 0, 0, 0, 0, 0, 0, 180, 135000.00),
(138, 8, NULL, 16, 'Cluster 3 Bimonthly Coaching Session\r\n', NULL, 28, NULL, 750.00, 0, 60, 0, 60, 0, 60, 0, 0, 0, 0, 0, 0, 180, 135000.00),
(139, 8, NULL, 16, 'Cluster 4 Bimonthly Coaching Session\r\n', NULL, 28, NULL, 750.00, 0, 60, 0, 60, 0, 60, 0, 0, 0, 0, 0, 0, 180, 135000.00),
(140, 8, NULL, 16, 'Expanded RPMT Meeting\r\n', NULL, 28, NULL, 750.00, 0, 0, 120, 0, 0, 120, 0, 0, 0, 0, 0, 0, 240, 180000.00),
(141, 8, NULL, 16, 'Regular RCDS-CDO-ACs Coaching Session\r\n', NULL, 28, NULL, 750.00, 55, 55, 55, 55, 55, 55, 0, 0, 0, 0, 0, 0, 330, 247500.00),
(142, 8, NULL, 17, 'KC Engineers and LGU Engineers Forum/Meeting\r\n', NULL, 28, NULL, 750.00, 153, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 153, 114750.00),
(143, 8, NULL, 17, 'Contractors/Suppliers Conference\r\n', NULL, 28, NULL, 750.00, 190, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 190, 142500.00),
(144, 8, NULL, 17, 'Stakeholders Forum \r\n', NULL, 28, NULL, 750.00, 0, 0, 0, 0, 120, 0, 0, 0, 0, 0, 0, 0, 120, 90000.00),
(145, 8, NULL, 17, 'Program Implementation Updating\r\n\r\n', NULL, 28, NULL, 750.00, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 37500.00),
(146, 8, NULL, 22, '2018 Work and Financial Planning Workshop 2 Days\r\n', NULL, 28, NULL, 750.00, 0, 0, 0, 0, 0, 0, 0, 20, 0, 0, 0, 0, 20, 30000.00),
(147, 8, NULL, 22, 'KC-NCDDP Account Management Team Meeting\r\n', NULL, 28, NULL, 350.00, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 216, 75600.00),
(148, 8, NULL, 23, 'Representation/Meetings RPMO\r\n', NULL, 28, NULL, 72741.83, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 436450.98),
(149, 8, NULL, 23, 'Representation/Meetings SRPMO\r\n', NULL, 28, NULL, 73000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 438000.00),
(150, 8, NULL, 24, 'Municipal Talakayan (26 Municipalities)\r\n', NULL, 28, '26', 106399.42, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2766384.92),
(151, 9, NULL, 16, 'Regional Fiduciary Workshop First Day', NULL, NULL, NULL, 1500.00, 0, 174, 174, 174, 174, 174, 0, 0, 0, 0, 0, 0, 870, 1305000.00),
(152, 9, NULL, 16, 'Regional Fiduciary Workshop Second Day', NULL, 28, NULL, 750.00, 0, 174, 174, 174, 174, 174, 0, 0, 0, 0, 0, 0, 870, 652500.00),
(153, 9, NULL, 16, 'MFA Tactic Sessions First Day', NULL, 28, NULL, 1500.00, 0, 0, 0, 0, 107, 0, 0, 0, 0, 0, 0, 0, 107, 160500.00),
(154, 9, NULL, 16, 'MFA Tactic Sessions Second Day', NULL, 28, NULL, 750.00, 0, 0, 0, 0, 107, 0, 0, 0, 0, 0, 0, 0, 107, 80250.00),
(155, 9, NULL, 16, 'Construction Safety Training (Full Board 5 Days)', NULL, 28, '5', 1500.00, 0, 85, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 85, 637500.00),
(156, 9, NULL, 16, 'ACT Refresher Course on CEAC Stage 1 to 4 (Full Board 5 Days)', NULL, 28, '5', 1500.00, 0, 189, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 189, 1417500.00),
(157, 9, NULL, 16, 'Writeshop on Packaging Kalahi-CIDSS Development Stories in the Field and Introduction to Photography and Photo Captioning (Batch 2) x 3', NULL, 28, '3', 1500.00, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, 450000.00),
(158, 9, NULL, 17, 'Field Based Investigation/Validation to KC-NCDDP Sub-Projects', NULL, 28, NULL, 1500.00, 0, 250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 250, 375000.00),
(159, 9, NULL, 17, 'Technical Session/Workshop on Preparation of Plan Design and POW x 5', NULL, 28, '5', 1500.00, 0, 0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 0, 50, 375000.00),
(160, 10, NULL, 30, 'Security RPMO', NULL, 29, NULL, 25000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 150000.00),
(161, 10, NULL, 30, 'Janitorial RPMO', NULL, 29, NULL, 63000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 378000.00),
(162, 10, NULL, 30, 'Security SRPMO', NULL, 29, NULL, 75000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 450000.00),
(163, 10, NULL, 30, 'Janitorial SRPMO', NULL, 29, NULL, 18000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 108000.00),
(164, 10, NULL, 31, 'Repair and Maintenance Vehicle', NULL, 29, NULL, 125000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 750000.00),
(165, 10, NULL, 31, 'Repair and Maintenance OE', NULL, 29, NULL, 8333.33, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 49999.98),
(166, 10, NULL, 31, 'Repair and Maintenance ICT', NULL, 29, NULL, 8333.33, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 49999.98),
(167, 10, NULL, 31, 'Repair and maintenance OB', NULL, 29, NULL, 25000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 150000.00),
(168, 10, NULL, 32, 'Courier/Postage RPMO', NULL, 29, NULL, 3000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 18000.00),
(169, 10, NULL, 32, 'Courier/Postage SRPMO', NULL, 29, NULL, 6000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 36000.00),
(170, 10, NULL, 33, 'Office Rental SRPMO', NULL, 29, NULL, 58333.33, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 349999.98),
(171, 10, NULL, 33, 'Office Rental RPMO', NULL, 29, NULL, 140000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 840000.00),
(172, 10, NULL, 34, 'Utilities Light RPMO', NULL, 29, NULL, 65000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 390000.00),
(173, 10, NULL, 34, 'Utilities Water RPMO', NULL, 29, NULL, 5000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 30000.00),
(174, 10, NULL, 34, 'Utilities Light SRPMO', NULL, 29, NULL, 20000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 120000.00),
(175, 10, NULL, 34, 'Utilities Water SRPMO', NULL, 29, NULL, 5000.00, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 6, 30000.00),
(176, 10, NULL, 37, 'Writeshop on Packaging Kalahi-CIDSS Development Stories in the Field and Introduction to Photography and Photo Captioning (Batch 2) Fuel', NULL, 29, NULL, 5000.00, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 5000.00),
(177, 10, NULL, 39, 'Program Implementation Updating Tokens', NULL, 28, NULL, 450.00, 0, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 22500.00),
(178, 10, NULL, 40, 'Construction Safety Training Honorarium', NULL, 29, NULL, 50000.00, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 50000.00),
(179, 10, NULL, 40, 'Writeshop on Packaging Kalahi-CIDSS Development Stories in the Field and Introduction to Photography and Photo Captioning (Batch 2) Honorarium', NULL, 29, NULL, 45000.00, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 45000.00),
(180, 11, NULL, 46, 'Deputy Regional Program Manager', NULL, 29, NULL, 86856.00, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 260568.00),
(181, 11, NULL, 46, 'Regional Community Development Specialist', NULL, 29, NULL, 78623.60, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 235870.80),
(182, 11, NULL, 46, 'Regional Community Infrastructure Specialist', NULL, 29, NULL, 78623.60, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 235870.80),
(183, 11, NULL, 46, 'Regional Financial Analyst', NULL, 29, NULL, 78623.60, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 235870.80),
(184, 11, NULL, 46, 'Regional Monitoring and Evaluation Specialist', NULL, 29, NULL, 78623.60, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 235870.80),
(185, 11, NULL, 46, 'Regional Capability Building Specialist', NULL, 29, NULL, 70857.60, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 212572.80);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_item_subcategory`
--

CREATE TABLE `ppmp_item_subcategory` (
  `ppmp_item_subcat_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_item_subcategory`
--

INSERT INTO `ppmp_item_subcategory` (`ppmp_item_subcat_id`, `description`, `status`) VALUES
(1, 'Common Electrical Supplies', 1),
(2, 'Common Computer Supplies / Consumables', 1),
(3, 'Common Office Supplies', 1),
(4, 'Common Office Devices', 1),
(5, 'Common Janitorial Supplies', 1),
(6, 'Legal Size Paper', 1),
(7, 'Common Office Equipment', 1),
(8, 'Handbook on Procurement', 1),
(9, 'Copier Supplies / Consumables', 1),
(10, 'Computer Supplies / Consumables', 1),
(11, 'Other Categories', 1),
(12, 'Dining & Utensils Categories', 1),
(13, 'Mobile Communication', 1),
(14, 'Computer Equipment & Accessories', 1),
(15, 'Other Matters', 1),
(16, 'Component 2 - Area Coordinating Team', 1),
(17, 'Component 2 - Stakeholder Training / Meeting / Conference', 1),
(18, 'ICT Supplies', 1),
(19, 'Capital Outlay', 1),
(20, 'SMO Activities', 1),
(21, 'Component 1 - CEAC / Social Preparation Activities', 1),
(22, 'Component 3 - Training / Meeting / Conference (RPMO)', 1),
(23, 'Representation / Meetings', 1),
(24, 'Monitoring & Evaluation Activities', 1),
(25, 'Communication', 1),
(26, 'Hauling', 1),
(27, 'Internet Subscription', 1),
(28, 'Mobile Subscription', 1),
(29, 'Landline Subscription', 1),
(30, 'Services', 1),
(31, 'Repair & Maintenance', 1),
(32, 'Courier / Postage', 1),
(33, 'Office Rental', 1),
(34, 'Utilities', 1),
(35, 'Salaries / Travel', 1),
(36, 'Insurance', 1),
(37, 'Gasoline', 1),
(38, 'Registration Fee', 1),
(39, 'Token', 1),
(40, 'Honorarium', 1),
(41, 'A. Individual', 1),
(42, 'Component 1 - Community Grants', 1),
(43, 'Telephone Subscription', 1),
(44, 'ADDITIONAL INK', 1),
(45, 'ADDITIONAL MEAL', 1),
(46, 'B. Technical Specialist', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_mode`
--

CREATE TABLE `ppmp_mode` (
  `ppmp_mode_id` int(11) NOT NULL,
  `mode` varchar(100) DEFAULT NULL,
  `description` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_mode`
--

INSERT INTO `ppmp_mode` (`ppmp_mode_id`, `mode`, `description`, `status`) VALUES
(1, 'Bidding', 'Bidding', 1),
(2, 'Reimbursement', 'Small Value', 1),
(3, 'CQS', 'Consultant''s Qualification Selection', 1),
(4, 'Direct Contracting', 'Direct Contracting', 1),
(5, 'ICS', 'Individual Consultant Selection ', 1),
(6, 'Agency to Agency', 'Agency to Agency', 1),
(7, 'Shopping', 'Shopping', 1),
(8, 'SSS', 'Single Source Selection ', 1),
(9, 'DBM-PS', 'DBM-PS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ppmp_unit`
--

CREATE TABLE `ppmp_unit` (
  `ppmp_unit_id` int(11) NOT NULL,
  `unit_description` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppmp_unit`
--

INSERT INTO `ppmp_unit` (`ppmp_unit_id`, `unit_description`, `status`) VALUES
(1, 'CDDKC', 1),
(2, 'PANTAWID - ADN', 1),
(3, 'PANTAWID - ADS', 1),
(4, 'PANTAWID - SDN', 1),
(5, 'PANTAWID - SDS', 1),
(6, 'PANTAWID - PDI', 1),
(7, 'GASSD - PERSONNEL', 1),
(8, 'RRCY', 1),
(9, 'HRDU', 1),
(10, 'SU & STU', 1),
(11, 'IDD/ PSU', 1),
(12, 'SLP', 1),
(13, 'NHTS / LISTAHANAN', 1),
(14, 'PSU - ARRS', 1),
(15, 'CBU', 1),
(16, 'ACCOUNTING SECTION', 1),
(17, 'CASH UNIT', 1),
(18, 'SMU', 1),
(19, 'BUDGET', 1),
(20, 'BAC', 1),
(21, 'RECORDS', 1),
(22, 'PSU - COMBASE', 1),
(23, 'PLANNING', 1),
(24, 'HOME FOR GIRLS', 1),
(25, 'ORD', 1),
(26, 'GSS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_item_details`
--

CREATE TABLE `pr_item_details` (
  `pr_item_id` int(11) NOT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `item_type` int(11) DEFAULT NULL,
  `ppmp_item_original_id` int(11) DEFAULT NULL,
  `ppmp_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `group_label` varchar(200) DEFAULT NULL,
  `unit_id` varchar(100) DEFAULT NULL,
  `item_description` text,
  `add_description` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `total_amount` double(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_item_details`
--

INSERT INTO `pr_item_details` (`pr_item_id`, `pr_id`, `item_type`, `ppmp_item_original_id`, `ppmp_id`, `item_id`, `group_label`, `unit_id`, `item_description`, `add_description`, `quantity`, `item_price`, `total_amount`, `date`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 3, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 4, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 5, 1, NULL, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 6, 1, NULL, 2, 1, '', '', 'Bond Paper  ((Substance 20 - 70GSM, A3))', '', 20, 100.00, 2000.00, NULL, 1),
(7, 7, 3, NULL, 10, 1, '', '', 'Bond Paper  ((Substance 20 - 70GSM, A3))', '', 100, 300.00, 30000.00, '2017-07-25 17:46:00', 1),
(8, 8, 2, NULL, 8, 1, '', '', 'Bond Paper  ((Substance 20 - 70GSM, A3))', '', 10, 20.00, 200.00, '2017-07-25 17:47:10', 1),
(9, 8, 2, NULL, 8, 2, '', '', 'Bond Paper  ((Substance 24 - 80GSM, A3))', '', 100, 30.00, 3000.00, '2017-07-25 17:47:10', 1),
(10, 9, 1, NULL, 2, 1, '', '', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 0, 0.00, 0.00, '2017-07-27 09:43:26', 1),
(11, 9, 1, NULL, 2, 2, '', '', 'Bond Paper ((Substance 24 - 80GSM, A3))', '', 0, 0.00, 0.00, '2017-07-27 09:43:26', 1),
(12, 9, 1, NULL, 2, 3, '', '', 'Bond Paper ((Substance 20 - 70GSM, A4))', '', 0, 0.00, 0.00, '2017-07-27 09:43:26', 1),
(13, 10, 1, NULL, 2, 1, '', '', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 10, 100.00, 1000.00, '2017-07-27 09:50:45', 1),
(14, 10, 1, NULL, 2, 2, '', '', 'Bond Paper ((Substance 24 - 80GSM, A3))', '', 10, 20.00, 200.00, '2017-07-27 09:50:45', 1),
(15, 10, 1, NULL, 2, 3, '', '', 'Bond Paper ((Substance 20 - 70GSM, A4))', '', 10, 500.00, 5000.00, '2017-07-27 09:50:45', 1),
(16, 11, 1, NULL, 2, 1, '', '9', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 0, 0.00, 0.00, '2017-07-27 10:20:57', 1),
(17, 11, 2, NULL, 10, 1, '', '', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 0, 0.00, 0.00, '2017-07-27 10:20:57', 1),
(18, 12, 1, NULL, 2, 2835, '', '28', ' 1 meal and 2 Snacks', '3 days', 75, 250.00, 56250.00, '2017-07-27 10:50:35', 1),
(19, 19, 1, NULL, 2, 1, '', '', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 0, 0.00, 0.00, '2017-07-27 13:02:53', 1),
(20, 23, 1, NULL, 2, 1, '', '12', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 0, 0.00, 0.00, '2017-08-01 12:09:19', 1),
(21, 24, 1, NULL, 2, 1, '', '11', 'Bond Paper ((Substance 20 - 70GSM, A3))', '', 10, 100.00, 1000.00, '2017-08-01 12:12:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_item_sppmp_details`
--

CREATE TABLE `pr_item_sppmp_details` (
  `pr_item_id` int(11) NOT NULL,
  `pr_id` int(11) DEFAULT NULL,
  `item_type` int(11) DEFAULT NULL,
  `group_label` text,
  `unit_id` varchar(100) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_description` text,
  `add_description` varchar(100) DEFAULT NULL,
  `item_price` double(14,2) NOT NULL,
  `january` double(10,2) DEFAULT '0.00',
  `february` double(10,2) DEFAULT '0.00',
  `march` double(10,2) DEFAULT '0.00',
  `april` double(10,2) DEFAULT '0.00',
  `may` double(10,2) DEFAULT '0.00',
  `june` double(10,2) DEFAULT '0.00',
  `july` double(10,2) DEFAULT '0.00',
  `august` double(10,2) DEFAULT '0.00',
  `september` double(10,2) DEFAULT '0.00',
  `october` double(10,2) DEFAULT '0.00',
  `november` double(10,2) DEFAULT '0.00',
  `december` double(10,2) DEFAULT '0.00',
  `quantity` double(10,2) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_item_sppmp_details`
--

INSERT INTO `pr_item_sppmp_details` (`pr_item_id`, `pr_id`, `item_type`, `group_label`, `unit_id`, `item_id`, `item_description`, `add_description`, `item_price`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `quantity`, `total_amount`, `status`) VALUES
(1, 13, NULL, '', '28', NULL, ' 2 Meals and 1 Snack with Billeting', '3 days', 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 40.00, 0.00, 0.00, 0.00, 0.00, 40.00, 3000.00, 1),
(2, 14, NULL, '', '28', NULL, ' 3 Meals and 2 Snacks ', '', 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 40.00, 0.00, 0.00, 0.00, 0.00, 40.00, 10000.00, 1),
(3, 15, NULL, '', '28', NULL, ' Meal (Dinner)', '', 150.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 10.00, 1500.00, 1),
(4, 16, NULL, '', '5', NULL, 'Bond Paper (Substance 20 - 70GSM, A3)', '', 100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 10.00, 1000.00, 1),
(5, 17, NULL, '', '12', NULL, ' Meal and Billeting (2nd Day)', '', 100.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 1000.00, 1),
(6, 17, NULL, '', '20', NULL, 'Bond Paper (Substance 24 - 80GSM, A3)', '', 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 30.00, 750.00, 1),
(7, 18, NULL, '', '12', NULL, ' Meal and Billeting (2nd Day)', '', 100.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 1000.00, 1),
(8, 18, NULL, '', '20', NULL, 'Bond Paper (Substance 24 - 80GSM, A3)', '', 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 0.00, 0.00, 0.00, 0.00, 30.00, 750.00, 1),
(9, 22, 0, '', '23', NULL, 'asdasdasd', '', 1111.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 11110.00, 1),
(10, 25, NULL, '', '28', NULL, ' Meal and Billeting (1st Day)', '', 102.00, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 1020.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_report`
--

CREATE TABLE `pr_report` (
  `pr_id` int(11) NOT NULL,
  `pr_no` varchar(100) DEFAULT NULL,
  `tracker_id` int(11) DEFAULT NULL,
  `purpose` text,
  `date_created` datetime DEFAULT NULL,
  `total_pr_amount` double(10,2) DEFAULT NULL,
  `requested_by` int(11) DEFAULT NULL,
  `noted_by` int(11) DEFAULT NULL,
  `reviewed_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `encoder` int(11) DEFAULT NULL,
  `pr_type` int(11) DEFAULT '1',
  `ppmp_mode` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_report`
--

INSERT INTO `pr_report` (`pr_id`, `pr_no`, `tracker_id`, `purpose`, `date_created`, `total_pr_amount`, `requested_by`, `noted_by`, `reviewed_by`, `approved_by`, `encoder`, `pr_type`, `ppmp_mode`, `status`) VALUES
(1, '1175-07-17', 1, 'SAMPLE 1', '2017-07-25 17:37:56', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(2, '1176-07-17', 1, 'SAMPLE 2', '2017-07-25 17:39:05', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(3, '1177-07-17', 1, 'SAMPLE 3', '2017-07-25 17:40:29', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(4, '1178-07-17', 1, 'SAMPLE 4', '2017-07-25 17:41:31', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(5, '1179-07-17', 1, 'SAMPLE 5', '2017-07-25 17:42:59', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(6, '1180-07-17', 1, 'SAMPLE 6', '2017-07-25 17:43:53', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(7, '1181-07-17', 1, 'SAMPLE 7', '2017-07-25 17:46:00', NULL, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(8, '1182-07-17', 1, 'SAMPLE 7', '2017-07-25 17:47:10', 3200.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(9, '1183-07-17', 2, 'SAMPLE 10', '2017-07-27 09:43:26', 0.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(10, '1184-07-17', 2, 'SAMPLE 11', '2017-07-27 09:50:45', 6200.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(11, '1185-07-17', 2, 'SAMPLE 12', '2017-07-27 10:20:57', 0.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(12, '1186-07-17', 2, 'SAMPLE 13', '2017-07-27 10:50:35', 56250.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(13, '1187-07-17', 2, 'SAMPLE 14', '2017-07-27 11:19:43', 3000.00, 1, 5, 1, 2, 1, 1, NULL, 1),
(14, '1188-07-17', 2, 'SAMPLE 15', '2017-07-27 11:23:33', 10000.00, 1, 5, 1, 2, 1, 1, NULL, 1),
(15, '1189-07-17', 2, 'SAMPLE 16', '2017-07-27 11:26:48', 1500.00, 1, 5, 1, 2, 1, 1, NULL, 1),
(16, '1190-07-17', 2, 'SAMPLE 17', '2017-07-27 11:29:26', 1000.00, 1, 5, 1, 2, 1, 1, 7, 1),
(17, '1191-07-17', 2, 'SAMPLE 17', '2017-07-27 12:46:00', 1750.00, 1, 5, 1, 2, 1, 1, 6, 0),
(18, '1192-07-17', 2, 'SAMPLE 17', '2017-07-27 12:46:01', 1750.00, 1, 5, 1, 2, 1, 1, 6, 1),
(19, '1193-07-17', 2, 'as', '2017-07-27 13:02:53', 0.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(20, '1194-07-17', 2, 'asd as', '2017-07-27 13:03:41', 0.00, 1, 5, 1, 2, 1, 1, 6, 1),
(21, '1195-07-17', 2, 'asdasd', '2017-07-27 13:24:21', 0.00, 1, 5, 1, 2, 1, 1, 6, 1),
(22, '1196-07-17', 2, 'a', '2017-07-27 13:24:43', 11110.00, 1, 5, 1, 2, 1, 1, 6, 1),
(23, '1197-08-17', 10, 'sample pr # 1', '2017-08-01 12:09:19', 0.00, 1, NULL, NULL, 2, 1, 0, NULL, 1),
(24, '1198-08-17', 10, 'SAMPLE PR # 2', '2017-08-01 12:12:13', 1000.00, 1, NULL, NULL, 2, 1, 0, NULL, 0),
(25, '1199-08-17', 10, 'SAMPLE PR # 4', '2017-08-01 12:20:40', 1020.00, 1, 5, 1, 2, 1, 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_tracker`
--

CREATE TABLE `pr_tracker` (
  `pr_tracker_id` int(11) NOT NULL,
  `tracker_no` varchar(100) DEFAULT NULL,
  `tracker_year` int(11) DEFAULT NULL,
  `tracker_month` int(11) DEFAULT NULL,
  `tracker_seq` int(11) DEFAULT NULL,
  `proposal_no` varchar(100) DEFAULT NULL,
  `tracker_title` text,
  `unit_responsible` varchar(500) DEFAULT NULL,
  `responsibility_code` varchar(100) DEFAULT NULL,
  `proponent` varchar(100) DEFAULT NULL,
  `encoder` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1 - true, 0 - false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr_tracker`
--

INSERT INTO `pr_tracker` (`pr_tracker_id`, `tracker_no`, `tracker_year`, `tracker_month`, `tracker_seq`, `proposal_no`, `tracker_title`, `unit_responsible`, `responsibility_code`, `proponent`, `encoder`, `date_created`, `date_updated`, `status`) VALUES
(1, 'KC-2017-07-0001', 2017, 7, 1, '', 'Sample Tracker 1\r\n', 'OPD/PRPU/CDDKC', '20-001-03-00016-00003-02-03', 'Narciso Batingal Jr.', 1, '2017-07-07 11:06:34', '2017-08-04 11:01:02', 1),
(2, 'KC-2017-07-0002', 2017, 7, 2, NULL, 'Office Supplies', 'ORD', '20-001-03-00016-00001', 'Mita Lim', 1, '2017-07-26 15:47:08', '2017-07-26 15:46:29', 1),
(7, 'KC-2017-07-0003', 2017, 7, 3, NULL, 'Sample Tracker #1', 'OPD/PRPU/CDDKC', '20-001-03-00016-00003-02-03', 'Jonason Macalalag', 1, '2017-07-31 16:25:29', '2017-07-31 16:25:40', 0),
(10, 'KC-2017-07-0004', 2017, 7, 4, NULL, 'Sample Tracker #2', 'OPD/PRPU/CDDKC', '20-001-03-00016-00003-02-03', 'Jonason Macalalag', 1, '2017-07-31 16:33:12', '2017-08-01 11:24:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `encoder` int(11) DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `tbl_name` varchar(100) DEFAULT NULL,
  `tbl_col` varchar(100) DEFAULT NULL,
  `tbl_id` int(11) DEFAULT NULL,
  `details` text,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `encoder`, `action`, `tbl_name`, `tbl_col`, `tbl_id`, `details`, `log_date`) VALUES
(2, 1, 1, 'pr_tracker', 'pr_tracker_id', 7, 'updated pr tracker with tracking number ##KC-2017-07-0004##.', '2017-07-21 16:25:43'),
(4, 1, 0, 'pr_tracker', 'pr_tracker_id', 10, 'created new pr tracker with tracking number ##KC-2017-07-0004##.', '2017-07-29 16:33:12'),
(7, 1, 4, NULL, NULL, NULL, 'has logged out.', '2017-08-01 10:51:56'),
(8, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-01 10:52:04'),
(9, 1, 1, 'pr_tracker', 'pr_tracker_id', 10, 'updated tracker with tracking number ##KC-2017-07-0004##.', '2017-08-01 11:24:32'),
(10, 1, 2, 'pr_tracker', 'pr_tracker_id', 10, 'Remove Tracker', '2017-07-19 11:28:56'),
(11, 1, 2, 'pr_tracker', 'pr_tracker_id', 7, 'removed pr tracker with tracking number ##KC-2017-07-0003##.', '2017-08-01 11:30:14'),
(12, 1, 2, 'pr_tracker', 'pr_tracker_id', 7, 'removed pr tracker ##KC-2017-07-0003##.', '2017-07-13 11:31:15'),
(13, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-01 11:46:29'),
(14, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-01 11:46:36'),
(15, 1, 0, 'pr_report', 'pr_id', 23, 'created new purchase request with pr number ##1197-08-17##.', '2017-08-01 12:09:19'),
(16, 1, 0, 'pr_report', 'pr_id', 24, 'created new purchase request with pr number ##1198-08-17##.', '2017-08-01 12:12:14'),
(17, 1, 2, 'pr_report', 'pr_id', 24, 'removed <i class="text-orange"><u>purchase request</u></i> with pr number ##1198-08-17##.', '2017-08-01 12:15:41'),
(18, 1, 0, 'pr_report', 'pr_id', 25, 'created new <i class="text-orange"><u>supplemental-purchase request</u></i> with pr number ##1199-08-17##.', '2017-08-01 12:20:40'),
(19, 1, 0, 'ppmp', NULL, 2, 'updated a <i class="text-orange"><u>PPMP</u></i> account ##B. Outside DBM-PS Supplies ##.', '2017-08-03 10:27:36'),
(20, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 10:28:16'),
(21, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 10:28:26'),
(22, 1, 0, 'ppmp', NULL, 3, 'updated a <i class="text-orange"><u>PPMP</u></i> account ##C. Training Supplies##.', '2017-08-03 11:04:53'),
(23, 1, 0, 'ppmp', NULL, 3, 'updated a <i class="text-orange"><u>PPMP</u></i> account ##C. Training Supplies##.', '2017-08-03 11:05:34'),
(24, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 12:03:53'),
(25, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 12:14:58'),
(26, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 12:32:30'),
(27, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 12:32:33'),
(28, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 13:25:47'),
(29, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 13:25:53'),
(30, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 13:57:26'),
(31, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 13:57:30'),
(32, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 14:36:02'),
(33, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 14:41:42'),
(34, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 14:45:24'),
(35, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 14:46:14'),
(36, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 15:35:48'),
(37, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 16:09:55'),
(38, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-03 16:37:09'),
(39, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-03 16:37:13'),
(40, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 10:59:10'),
(41, 1, 1, 'pr_tracker', 'pr_tracker_id', 1, 'updated <i class="text-orange"><u>pr tracker</u></i> with tracking number ##KC-2017-07-0001##.', '2017-08-04 11:01:05'),
(42, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 11:01:25'),
(43, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 11:36:57'),
(44, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 11:39:33'),
(45, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 11:39:37'),
(46, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 11:52:37'),
(47, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 11:52:39'),
(48, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 12:43:45'),
(49, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 12:44:01'),
(50, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 12:44:28'),
(51, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 12:44:30'),
(52, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 12:46:24'),
(53, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 12:46:26'),
(54, 1, 4, NULL, NULL, NULL, 'has logged in.', '2017-08-04 12:46:42'),
(55, 1, 4, NULL, NULL, NULL, 'logged out.', '2017-08-04 12:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr_no`
--

CREATE TABLE `tbl_pr_no` (
  `id` int(11) NOT NULL,
  `pr_year` int(11) DEFAULT NULL,
  `pr_month` int(11) DEFAULT NULL,
  `pr_seq` int(11) DEFAULT NULL,
  `pr_no` varchar(100) DEFAULT NULL,
  `pr_title` text,
  `program` varchar(100) DEFAULT NULL,
  `pr_amount` decimal(14,2) DEFAULT NULL,
  `requested_by` varchar(100) DEFAULT NULL,
  `ppo_assigned` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `encoder` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_abr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `lastname`, `firstname`, `mi`, `position_abr`, `user_level`) VALUES
(1, 'nmbatingal', 'tx5zAUfmE6ehX-nOrpFojaSC5zxxAPCJ', '$2y$13$P63E8gkO8xI151RB8wf1geIm8dmGhMUhhNyiAvsYOo5AK4FcvEHGe', NULL, 'batingalnarz11@gmail.com', 10, 1497604440, 1501821763, 'Batingal Jr.', 'Narciso', 'M', 'FA II', NULL),
(2, 'janrix', 'tx5zAUfmE6ehX-nOrpFojaSC5zxxAPCJ', '$2y$13$kdyuSw6Y7GFTtUKJmfFR7eyveHsU0rT4NZojklUGX5BnDViEM8Xma', NULL, 'borjzaljun621@gmail.com', 10, 1497604440, 1497604440, 'Borja Jr.', 'Alejandro', 'T', 'AO II', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `assignatories`
--
ALTER TABLE `assignatories`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `lib_item`
--
ALTER TABLE `lib_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `lib_item_category`
--
ALTER TABLE `lib_item_category`
  ADD PRIMARY KEY (`item_category_id`);

--
-- Indexes for table `lib_item_generic`
--
ALTER TABLE `lib_item_generic`
  ADD PRIMARY KEY (`generic_id`);

--
-- Indexes for table `lib_item_store_category`
--
ALTER TABLE `lib_item_store_category`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `lib_item_subgeneric`
--
ALTER TABLE `lib_item_subgeneric`
  ADD PRIMARY KEY (`subgeneric_id`);

--
-- Indexes for table `lib_item_unit`
--
ALTER TABLE `lib_item_unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit` (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `ppmp`
--
ALTER TABLE `ppmp`
  ADD PRIMARY KEY (`ppmp_id`),
  ADD UNIQUE KEY `ppmp_unit_id` (`ppmp_unit_id`,`ppmp_category_id`,`year`);

--
-- Indexes for table `ppmp_category`
--
ALTER TABLE `ppmp_category`
  ADD PRIMARY KEY (`ppmp_category_id`);

--
-- Indexes for table `ppmp_item_category`
--
ALTER TABLE `ppmp_item_category`
  ADD PRIMARY KEY (`ppmp_item_cat_id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `ppmp_item_deduction`
--
ALTER TABLE `ppmp_item_deduction`
  ADD PRIMARY KEY (`ppmp_item_deduct_id`);

--
-- Indexes for table `ppmp_item_original`
--
ALTER TABLE `ppmp_item_original`
  ADD PRIMARY KEY (`ppmp_item_original_id`),
  ADD UNIQUE KEY `p_item_id` (`ppmp_id`,`ppmp_item_cat_id`,`ppmp_item_subcat_id`,`inventory_id`),
  ADD UNIQUE KEY `p_item_id_3` (`ppmp_id`,`ppmp_item_cat_id`,`ppmp_item_subcat_id`,`inventory_id`),
  ADD KEY `p_item_id_2` (`ppmp_id`,`ppmp_item_cat_id`,`ppmp_item_subcat_id`,`inventory_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `pr_cat_id` (`ppmp_item_cat_id`),
  ADD KEY `pr_subcat_id` (`ppmp_item_subcat_id`);

--
-- Indexes for table `ppmp_item_subcategory`
--
ALTER TABLE `ppmp_item_subcategory`
  ADD PRIMARY KEY (`ppmp_item_subcat_id`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indexes for table `ppmp_mode`
--
ALTER TABLE `ppmp_mode`
  ADD PRIMARY KEY (`ppmp_mode_id`);

--
-- Indexes for table `ppmp_unit`
--
ALTER TABLE `ppmp_unit`
  ADD PRIMARY KEY (`ppmp_unit_id`);

--
-- Indexes for table `pr_item_details`
--
ALTER TABLE `pr_item_details`
  ADD PRIMARY KEY (`pr_item_id`);

--
-- Indexes for table `pr_item_sppmp_details`
--
ALTER TABLE `pr_item_sppmp_details`
  ADD PRIMARY KEY (`pr_item_id`);

--
-- Indexes for table `pr_report`
--
ALTER TABLE `pr_report`
  ADD PRIMARY KEY (`pr_id`),
  ADD UNIQUE KEY `pr_no` (`pr_no`);

--
-- Indexes for table `pr_tracker`
--
ALTER TABLE `pr_tracker`
  ADD PRIMARY KEY (`pr_tracker_id`),
  ADD UNIQUE KEY `tracker_seq` (`tracker_seq`,`tracker_no`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_pr_no`
--
ALTER TABLE `tbl_pr_no`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pr_no` (`pr_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assignatories`
--
ALTER TABLE `assignatories`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lib_item`
--
ALTER TABLE `lib_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lib_item_category`
--
ALTER TABLE `lib_item_category`
  MODIFY `item_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `lib_item_generic`
--
ALTER TABLE `lib_item_generic`
  MODIFY `generic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `lib_item_store_category`
--
ALTER TABLE `lib_item_store_category`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `lib_item_subgeneric`
--
ALTER TABLE `lib_item_subgeneric`
  MODIFY `subgeneric_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `lib_item_unit`
--
ALTER TABLE `lib_item_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ppmp`
--
ALTER TABLE `ppmp`
  MODIFY `ppmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ppmp_category`
--
ALTER TABLE `ppmp_category`
  MODIFY `ppmp_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ppmp_item_category`
--
ALTER TABLE `ppmp_item_category`
  MODIFY `ppmp_item_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ppmp_item_deduction`
--
ALTER TABLE `ppmp_item_deduction`
  MODIFY `ppmp_item_deduct_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppmp_item_original`
--
ALTER TABLE `ppmp_item_original`
  MODIFY `ppmp_item_original_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `ppmp_item_subcategory`
--
ALTER TABLE `ppmp_item_subcategory`
  MODIFY `ppmp_item_subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ppmp_mode`
--
ALTER TABLE `ppmp_mode`
  MODIFY `ppmp_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ppmp_unit`
--
ALTER TABLE `ppmp_unit`
  MODIFY `ppmp_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pr_item_details`
--
ALTER TABLE `pr_item_details`
  MODIFY `pr_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pr_item_sppmp_details`
--
ALTER TABLE `pr_item_sppmp_details`
  MODIFY `pr_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pr_report`
--
ALTER TABLE `pr_report`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pr_tracker`
--
ALTER TABLE `pr_tracker`
  MODIFY `pr_tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_pr_no`
--
ALTER TABLE `tbl_pr_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
