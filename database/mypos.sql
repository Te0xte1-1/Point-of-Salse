-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 09:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_type` int(11) DEFAULT NULL COMMENT 'نوع الحساب هل هو رأس مال ,عميل,مورد',
  `is_parent` tinyint(4) DEFAULT 0,
  `parrent_account_number` int(11) DEFAULT NULL COMMENT 'حساب الأب',
  `name` varchar(50) DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL COMMENT 'رقم الحساب ويجب ان يكون مميز',
  `start_balance_status` varchar(50) DEFAULT NULL COMMENT 'حالة الحساب عند الإضافة هل هو متزن ام دائن ام مدين',
  `start_balance` decimal(10,2) DEFAULT NULL COMMENT 'رصيد الحساب اول المده',
  `current_balance` decimal(10,2) DEFAULT 0.00 COMMENT 'رصيد الحساب الحالي',
  `is_archived` tinyint(4) DEFAULT 0 COMMENT 'هل تمت أرشفته لان الحسابات المالية لا تحذف',
  `other_table_FK` int(11) DEFAULT NULL COMMENT 'جميع الحركات التي تأتي من الجداول الداخلية بيكون معاها  ',
  `com_code` int(11) DEFAULT NULL COMMENT 'كود الشركة',
  `notes` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='جدول الشجره المحاسبية';

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_type`, `is_parent`, `parrent_account_number`, `name`, `account_number`, `start_balance_status`, `start_balance`, `current_balance`, `is_archived`, `other_table_FK`, `com_code`, `notes`, `created_at`, `updated_at`, `added_by`, `updated_by`) VALUES
(1, 3, 0, 3, 'محمد عثمان محمد', 31, '1', '5000.00', '0.00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, NULL, 'رأس المال', 32, '1', '0.00', '0.00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, NULL, 'مصروفات الأب', 33, '2', '0.00', '0.00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 6, 1, NULL, 'بنك الخرطوم', 34, '3', '0.00', '0.00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 0, NULL, 'بنك فيصل الإسلامي السوداني', 6, '3', NULL, NULL, 1, NULL, NULL, 'لا توجد ملاحظات', '2023-08-01', '2023-08-01', NULL, NULL),
(6, 6, 0, NULL, 'بنك فيصل الإسلامي السوداني', 6, '3', NULL, NULL, 1, NULL, NULL, 'لا توجد ملاحظات', '2023-08-01', '2023-08-01', NULL, NULL),
(7, 6, 0, NULL, 'بنك فيصل الإسلامي السوداني', 6, '3', NULL, NULL, 1, NULL, NULL, 'لا توجد ملاحظات', '2023-08-01', '2023-08-01', NULL, NULL),
(8, 6, 0, NULL, 'بنك فيصل الإسلامي السوداني', 6, '3', NULL, NULL, 1, NULL, NULL, 'لا توجد ملاحظات', '2023-08-01', '2023-08-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_type`
--

CREATE TABLE `accounts_type` (
  `id` int(11) NOT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `related_internal_account` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='أنواع الحسابات المالية';

--
-- Dumping data for table `accounts_type`
--

INSERT INTO `accounts_type` (`id`, `account_name`, `status`, `related_internal_account`) VALUES
(1, 'رأس المال', 1, 0),
(2, 'مورد', 1, NULL),
(3, 'عميل', 1, NULL),
(4, 'مندوب', 1, NULL),
(5, 'موظف', 1, NULL),
(6, 'بنكي', 1, 0),
(7, 'مصروفات', 1, 0),
(8, 'قسم داخلي', 0, NULL),
(9, 'عام', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins_shifts`
--

CREATE TABLE `admins_shifts` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins_treasures`
--

CREATE TABLE `admins_treasures` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_type`
--

CREATE TABLE `bill_type` (
  `id` int(11) NOT NULL,
  `bill_type_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_type`
--

INSERT INTO `bill_type` (`id`, `bill_type_name`) VALUES
(1, 'فاتورة مبدئية'),
(2, 'فاتورة مشتريات'),
(3, 'فاتورة مبيعات'),
(4, 'فاتورة  مردود مشتريات'),
(5, 'فاتورة  مردود مبيعات');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(191) NOT NULL,
  `cat_description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_description`, `created_at`, `updated_at`) VALUES
(1, 'watches', NULL, NULL, NULL),
(2, 'cats', NULL, NULL, NULL),
(3, 'Laptops', NULL, NULL, NULL),
(4, 'Phones', NULL, NULL, NULL),
(5, 'New Clothes', 'Sprint Clothes', '2023-06-30 12:47:19', '2023-06-30 12:47:19'),
(6, 'الأدوية', NULL, '2023-08-01 19:04:34', '2023-08-01 19:04:34'),
(7, 'الأدوية', NULL, '2023-08-01 19:04:34', '2023-08-01 19:04:34'),
(8, 'مستحضرات التجميل', NULL, '2023-08-01 19:04:47', '2023-08-01 19:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `account_number` int(11) DEFAULT NULL,
  `customer_name` varchar(191) NOT NULL,
  `start_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `current_balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customer_address` varchar(191) DEFAULT NULL,
  `customer_phone` varchar(191) DEFAULT NULL,
  `customer_imge` varchar(191) DEFAULT NULL,
  `customer_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `account_number`, `customer_name`, `start_balance`, `current_balance`, `customer_address`, `customer_phone`, `customer_imge`, `customer_email`, `created_at`, `updated_at`) VALUES
(1, 13, 'احمد عبدالحليم', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 15, 'مرتضى يوسف', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'محمد عثمان محمد', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 31, 'منظومة الصناعات الدفاعية\r\n', '0.00', '0.00', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mony_move_type`
--

CREATE TABLE `mony_move_type` (
  `id` int(11) NOT NULL,
  `mony_move_type` varchar(50) DEFAULT NULL,
  `screen_show` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='انواع الحركات المالية';

--
-- Dumping data for table `mony_move_type`
--

INSERT INTO `mony_move_type` (`id`, `mony_move_type`, `screen_show`, `status`) VALUES
(1, ' مراجعة واستلام نقدية شفت على نفس الخزينة', 'بشاشة التحصيل', 1),
(2, 'مراجعة واستلام نقدية شفت خزنة اخرى', 'بشاشة التحصيل', 1),
(3, 'صرف مبلغ لحساب مالي', 'بشاشة الصرف', 1),
(4, 'تحصيل مبلغ من حساب مالي', 'بشاشة التحصيل', 1),
(5, 'تحصيل ايراد مبيعات', 'بشاشة التحصيل', 1),
(6, 'صرف نظير مرتجع مبيعات', 'بشاشة الصرف', 1),
(7, 'صرف نظير مشتريات من مورد', 'بشاشة الصرف', 1),
(8, 'تحصيل نظير مرتجع مشتريات الى مورد', 'بشاشة التحصيل', 1),
(9, 'ايراد زيادة رأس المال', 'بشاشة التحصيل', 1),
(10, 'مصاريف شراء مثل تكاليف شراء البضاعة(مصاريف السيارة', 'بشاشة الصرف', 1),
(11, 'صرف للإيداع البنكي', 'بشاشة الصرف', 1),
(12, 'سحب من البنك', 'بشاشة التحصيل', 1),
(13, 'صرف لرد رأس المال', 'بشاشة الصرف', 1);

-- --------------------------------------------------------

--
-- Table structure for table `move_type`
--

CREATE TABLE `move_type` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `customer_email` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_name`, `Total`, `customer_email`, `created_at`, `updated_at`) VALUES
(48, NULL, NULL, NULL, '2023-07-21 10:41:22', '2023-07-21 10:41:22'),
(49, NULL, NULL, NULL, '2023-07-21 10:41:55', '2023-07-21 10:41:55'),
(50, NULL, NULL, NULL, '2023-07-21 10:42:10', '2023-07-21 10:42:10'),
(51, NULL, NULL, NULL, '2023-07-21 10:42:18', '2023-07-21 10:42:18'),
(52, NULL, NULL, NULL, '2023-07-21 10:43:14', '2023-07-21 10:43:14'),
(53, NULL, NULL, NULL, '2023-07-21 10:43:30', '2023-07-21 10:43:30'),
(54, NULL, NULL, NULL, '2023-07-21 10:44:25', '2023-07-21 10:44:25'),
(55, NULL, NULL, NULL, '2023-07-21 10:44:36', '2023-07-21 10:44:36'),
(56, NULL, NULL, NULL, '2023-07-21 10:45:11', '2023-07-21 10:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_type`
--

CREATE TABLE `pay_type` (
  `id` int(11) NOT NULL,
  `pay_type_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_type`
--

INSERT INTO `pay_type` (`id`, `pay_type_name`) VALUES
(1, 'كاش'),
(2, 'أجل');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `product_description` varchar(191) DEFAULT NULL,
  `purshace_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `does_has_unit` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'هل للصنف وحدة تجزئة',
  `unit_id` int(11) NOT NULL DEFAULT 0 COMMENT 'كود وحدة قياس الأب',
  `retail_uom_qty_to_parent` int(11) NOT NULL DEFAULT 0 COMMENT 'كم حبة في الوحدة',
  `risk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_description`, `purshace_price`, `price`, `stock`, `does_has_unit`, `unit_id`, `retail_uom_qty_to_parent`, `risk`, `created_at`, `updated_at`) VALUES
(1, 1, 'samsung', NULL, 10, 15, 100, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(15, 1, 'catti', NULL, 200, 400, 52, 0, 0, 0, 6, '2023-06-30 18:10:24', NULL),
(16, 1, 'acer', NULL, 15, 20, 10, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(17, 1, 'samsung', NULL, 150, 200, 30, 0, 0, 0, 20, '2023-06-30 18:10:24', NULL),
(18, 3, 'toshipa', NULL, 150, 200, 10, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(19, 4, 'shaoumi', NULL, 150, 200, 30, 0, 0, 0, 20, '2023-06-30 18:10:24', NULL),
(20, 3, 'hp', NULL, 150, 200, 10, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(21, 4, 'lenovo', NULL, 150, 200, 30, 0, 0, 0, 20, '2023-06-30 18:10:24', NULL),
(22, 3, 'sony', NULL, 150, 200, 10, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(23, 4, 'itel', NULL, 150, 200, 30, 0, 0, 0, 20, '2023-06-30 18:10:24', NULL),
(24, 3, 'dell', NULL, 150, 200, 10, 0, 0, 0, 5, '2023-06-30 18:10:24', NULL),
(25, 4, 'hawauit', NULL, 150, 200, 30, 0, 0, 0, 20, '2023-06-30 18:10:24', NULL),
(26, 8, 'xray', 'x box status new old', NULL, NULL, 100, 0, 0, 0, 10, '2023-08-01 19:12:59', '2023-08-01 19:12:59'),
(27, 8, 'xray', 'x box status new old', NULL, NULL, 100, 0, 0, 0, 10, '2023-08-01 19:13:07', '2023-08-01 19:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_with_store`
--

CREATE TABLE `product_with_store` (
  `id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL COMMENT 'كود المخزن',
  `pro_id` int(11) DEFAULT NULL COMMENT 'كود المنتج',
  `unit_id` int(11) DEFAULT NULL COMMENT 'وحدة قياس التجزئة',
  `unit_cost_price` int(11) DEFAULT NULL COMMENT 'سعر الشراء للوحدة',
  `qty_of_unit` int(11) DEFAULT NULL COMMENT 'الكمية بالوحدة',
  `total_cost_price` int(11) DEFAULT NULL COMMENT 'إجمالي سعر شراء الباتش ككل',
  `production_date` int(11) DEFAULT NULL,
  `expire_date` int(11) DEFAULT NULL,
  `auto_serial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purshace`
--

CREATE TABLE `purshace` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_number` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `serial` varchar(191) NOT NULL,
  `is_approved` tinyint(4) DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `amil_name` varchar(50) DEFAULT NULL,
  `supplier_phone` varchar(50) DEFAULT NULL,
  `supplier_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purshace`
--

INSERT INTO `purshace` (`id`, `account_number`, `total`, `serial`, `is_approved`, `supplier_id`, `amil_name`, `supplier_phone`, `supplier_address`, `created_at`, `updated_at`) VALUES
(1, NULL, 2000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(2, NULL, 8000, '6533', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(3, NULL, 6000, '35523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(4, NULL, 24000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(5, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(6, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(7, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(8, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(9, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(10, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(11, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(12, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(13, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(14, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(15, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL),
(16, NULL, 17000, '45523', 0, 14, 'نصرالدين عثمان محمد', '144454223', 'امدرمان كرري', '2023-07-18 11:07:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purshace_detailse`
--

CREATE TABLE `purshace_detailse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salse`
--

CREATE TABLE `salse` (
  `id` int(11) NOT NULL,
  `account_number` int(11) DEFAULT NULL,
  `serial` varchar(191) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bill_type` int(11) DEFAULT NULL,
  `pay_type` int(11) DEFAULT NULL,
  `what_paid` int(11) DEFAULT NULL,
  `what_not_yet_paid` int(11) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL, 
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salse_detailse`
--

CREATE TABLE `salse_detailse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salse_id` int(20) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_company`
--

CREATE TABLE `settings_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `company_logo` varchar(191) NOT NULL,
  `company_address` varchar(191) NOT NULL,
  `company_phone` varchar(191) NOT NULL,
  `company_description` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_name` varchar(50) NOT NULL DEFAULT '',
  `stock_location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--



-- --------------------------------------------------------

--
-- Table structure for table `stock_data`
--

CREATE TABLE `stock_data` (
  `id` int(11) NOT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `pro_id` int(10) UNSIGNED DEFAULT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `qty` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `sup_code` bigint(20) DEFAULT NULL,
  `sup_name` varchar(155) NOT NULL,
  `sup_phone` varchar(155) NOT NULL,
  `sup_address` varchar(155) NOT NULL,
  `start_balance` decimal(10,2) DEFAULT NULL,
  `current_balance` decimal(10,2) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sup_code`, `sup_name`, `sup_phone`, `sup_address`, `start_balance`, `current_balance`, `created_at`) VALUES
(1, 15, 'نصرالدين عثمان محمد', '249914475421', 'أمدرمان محلية كرري', NULL, NULL, NULL),
(2, 16, 'عباس ابن فرناس', '249914475421', 'أمدرمان ', NULL, NULL, NULL),
(3, 18, 'احمد فتح الرحمن', '5653245', 'أمدرمان محلية كرري', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_with_order`
--

CREATE TABLE `supplier_with_order` (
  `id` int(11) NOT NULL,
  `auto_serial` int(11) DEFAULT NULL,
  `is_approved` tinyint(4) DEFAULT 0 COMMENT 'هل تم اعتماد الفاتورة\r\n',
  `order_type` tinyint(4) DEFAULT NULL COMMENT 'نوع الفاتورة هل هي\r\n1- فاتورة مشتريات\r\n2- فاتورة مرتجع مشتريات على نفس الفاتورة\r\n3- هل هي مرتجع عام بترجع بدون تقيد بأصل الفاتورة',
  `order_pay_type` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `account_number` int(11) DEFAULT NULL,
  `total_before_descount` decimal(10,0) DEFAULT 0,
  `discount_type` int(11) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `discount_value` decimal(10,0) DEFAULT 0,
  `tax_percent` int(11) DEFAULT NULL,
  `tax_value` decimal(10,0) DEFAULT 0,
  `total_cost` decimal(10,0) DEFAULT 0,
  `money_for_account` decimal(10,0) DEFAULT 0,
  `what_paid` decimal(10,0) DEFAULT 0,
  `what_remain` decimal(10,0) DEFAULT 0,
  `treasures_transaction_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL COMMENT 'كود المخزن',
  `supplier_balance_before` decimal(10,0) DEFAULT 0 COMMENT 'حاله رصيد المورد قبل الفاتورة',
  `supplier_balance_fater` decimal(10,0) DEFAULT NULL COMMENT 'حاله رصيد المورد بعد الفاتورة',
  `note` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='جدول مشتريات ومرتجعات الموردين';

--
-- Dumping data for table `supplier_with_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplier_with_order_detailse`
--

CREATE TABLE `supplier_with_order_detailse` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL COMMENT 'سعر الوحدة',
  `total_price` decimal(10,2) DEFAULT NULL COMMENT 'سعر الوحدة ضرب الكمية',
  `batch_id` int(11) DEFAULT NULL COMMENT 'رقم الباتش في المخزن الذي تم التخزين الصنف بها'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='تفاصيل أصناف فاتورة المشتريات والمرتجعات';

--
-- Dumping data for table `supplier_with_order_detailse`
--

-- --------------------------------------------------------

--
-- Table structure for table `treasures`
--

CREATE TABLE `treasures` (
  `id` int(11) NOT NULL,
  `treasure_serial` int(11) DEFAULT NULL,
  `treasures_name` varchar(155) NOT NULL,
  `is_master` tinyint(4) DEFAULT 0,
  `last_isal_exchange` bigint(20) DEFAULT NULL,
  `last_isal_collect` bigint(20) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treasures`
--

-- --------------------------------------------------------

--
-- Table structure for table `treasures_delevry`
--

CREATE TABLE `treasures_delevry` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treasures_transactions`
--

CREATE TABLE `treasures_transactions` (
  `id` int(11) NOT NULL,
  `isal_number` int(11) DEFAULT NULL COMMENT 'كود العملية',
  `shift_code` int(11) DEFAULT NULL COMMENT 'كود الشفت للمستخدم',
  `treasures_id` int(11) DEFAULT NULL,
  `is_account` int(11) DEFAULT NULL COMMENT 'هل هو حساب مالي',
  `account_number` bigint(20) DEFAULT NULL COMMENT 'رقم الحساب المالي',
  `money` int(11) DEFAULT NULL COMMENT 'قيمة المبلغ المتحصل او المصروف بالخزنة',
  `money_for_account` int(11) DEFAULT NULL COMMENT 'قيمة المبلغ المستحق او المخصوم من الحساب المالي',
  `foreign_key` bigint(20) DEFAULT NULL COMMENT 'كود الجدول الأخر المرتبط بالحركة',
  `move_type_id` bigint(20) DEFAULT NULL COMMENT 'نوع الحركة النقدية',
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='جدول حركة النقدية\r\nكل العمليات المالية بتصب فيه \r\nلازم كل العمليات تسمع عليه';

--
-- Dumping data for table `treasures_transactions`
--


-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type` (`account_type`);

--
-- Indexes for table `accounts_type`
--
ALTER TABLE `accounts_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_type`
--
ALTER TABLE `bill_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mony_move_type`
--
ALTER TABLE `mony_move_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `move_type`
--
ALTER TABLE `move_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_key` (`product_id`),
  ADD KEY `order_key` (`order_id`);

--
-- Indexes for table `pay_type`
--
ALTER TABLE `pay_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_with_store`
--
ALTER TABLE `product_with_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purshace`
--
ALTER TABLE `purshace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purshace_detailse`
--
ALTER TABLE `purshace_detailse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salse`
--
ALTER TABLE `salse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salse_detailse`
--
ALTER TABLE `salse_detailse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salse_id` (`salse_id`);

--
-- Indexes for table `settings_company`
--
ALTER TABLE `settings_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_data`
--
ALTER TABLE `stock_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_with_order`
--
ALTER TABLE `supplier_with_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_with_order_detailse`
--
ALTER TABLE `supplier_with_order_detailse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasures`
--
ALTER TABLE `treasures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treasures_transactions`
--
ALTER TABLE `treasures_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bill_type`
--
ALTER TABLE `bill_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mony_move_type`
--
ALTER TABLE `mony_move_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `move_type`
--
ALTER TABLE `move_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pay_type`
--
ALTER TABLE `pay_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_with_store`
--
ALTER TABLE `product_with_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purshace`
--
ALTER TABLE `purshace`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purshace_detailse`
--
ALTER TABLE `purshace_detailse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salse`
--
ALTER TABLE `salse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salse_detailse`
--
ALTER TABLE `salse_detailse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings_company`
--
ALTER TABLE `settings_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_data`
--
ALTER TABLE `stock_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_with_order`
--
ALTER TABLE `supplier_with_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier_with_order_detailse`
--
ALTER TABLE `supplier_with_order_detailse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `treasures`
--
ALTER TABLE `treasures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `treasures_transactions`
--
ALTER TABLE `treasures_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `account_type` FOREIGN KEY (`account_type`) REFERENCES `accounts_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salse_detailse`
--
ALTER TABLE `salse_detailse`
  ADD CONSTRAINT `salse_id` FOREIGN KEY (`salse_id`) REFERENCES `salse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
