-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medixktc_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'طلب احتياج أصناف RFM', '2022-08-07 20:23:16', '2023-07-14 13:17:36', NULL),
(2, 'أمر الشراء - توريد PO', '2022-08-14 23:52:57', '2022-10-23 19:17:00', NULL),
(3, 'طلب مقايسة BOQ', '2022-08-15 21:58:43', '2022-08-20 22:54:20', NULL),
(4, 'طلب تعاقد مقاولي الباطن BOQ', '2022-08-15 21:59:35', '2022-10-23 19:18:15', NULL),
(5, 'أمر شراء مباشر RFQ', '2022-08-15 22:02:04', '2023-02-23 11:58:58', NULL),
(6, 'طلب أصناف', '2022-09-01 01:14:50', '2022-09-01 01:17:58', '2022-09-01 01:17:58'),
(7, 'طلب احتياج أصناف', '2022-09-01 17:33:45', '2022-09-01 17:34:30', '2022-09-01 17:34:30'),
(8, 'طلب احتياج أصناف', '2022-09-03 02:03:24', '2022-09-03 02:06:48', '2022-09-03 02:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id_p` int(20) UNSIGNED NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id_p`, `id`, `title`, `section`, `type`, `created_at`, `updated_at`) VALUES
(167, 1, 'أجــــــــــور الاشراف الفنـــى', '100000', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(168, 1, 'أجــــــــــور العمالة الذاتية المتخصصة', '200000', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(169, 1, 'اسكان عمالة ذاتى', '900500', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(170, 1, 'تجهيزات موقع - بداية المشروع', '900401', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(171, 1, 'أجهزة كمبيوتر', '900404', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(172, 1, 'مصاريف مكتبية و بوفية', '900516', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(173, 1, 'تكاليف وسائل النقل', '900800', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(174, 1, 'معدات', '900507', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(175, 1, 'نقل مخلفات غير محملة', '900517', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(176, 1, 'أجهزة مساحة', '900902', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(177, 1, 'الشدات / السقالات المعدنية', '900700', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(178, 1, 'استشارات هندسية', '900300', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(179, 1, 'تجهيزات شبكات موقع', '900400', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(180, 1, 'انشاء مخازن', '900410', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(181, 1, 'مصروفات امن وحماية + اعلانات', '900411', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(182, 1, 'سلامة مهنية ( سيفتي )', '901003', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(183, 1, 'إكراميات', '901304', 'تكاليف غير مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(184, 1, 'اعمال ترابية', '400100', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(185, 1, 'الاعمال الخرسانية ', '400300', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(186, 1, 'اعمال المباني', '400325', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(187, 1, 'اعمال تجاليد حجر/رخام', '400350', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(188, 1, 'اعمال معدنية', '400400', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(189, 1, 'اعمال الومنيوم', '400450', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(190, 1, 'اعمال خشبيه', '400550', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(191, 1, 'اعمال بياض ', '400602', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(192, 1, 'ارضيات موزايكو', '400608', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(193, 1, 'اعمال سيراميك', '400609', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(194, 1, 'ارضيات موكيت', '400614', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(195, 1, 'اعمال دهانات ', '400616', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(196, 1, 'ايبوكسي', '400617', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(197, 1, 'أعمال العزل ', '400700', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(198, 1, 'اعمال فرش', '400900', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(199, 1, 'اعمال طرق + لاند سكيب', '400950', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(200, 1, 'اعمال صحية', '401175', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(201, 1, 'اعمال الكهرباء', '401050', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(202, 1, 'اعمال التصميمات الهندسية', '700100', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20'),
(203, 1, 'التجهيزات المباشرة', '401300', 'تكاليف مباشرة', '2022-10-26 00:13:20', '2022-10-26 00:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `responsible_name` varchar(255) DEFAULT NULL,
  `responsible_mobile` varchar(255) DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `name`, `address`, `mobile`, `website_url`, `responsible_name`, `responsible_mobile`, `attachments`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'حاتم أبو رية', 'الحي العاشر', '01010299933', NULL, 'محمود فهمي', '01010299935', NULL, 1, '2022-11-03 22:47:17', '2022-11-03 22:47:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_code` varchar(255) NOT NULL DEFAULT '',
  `terms_code` varchar(255) DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT '$',
  `unit` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `general_manager_notes` text DEFAULT NULL,
  `cto_manager_notes` text DEFAULT NULL,
  `signature_notes` text DEFAULT NULL,
  `hse_manager_notes` text DEFAULT NULL,
  `operation_manager_notes` text DEFAULT NULL,
  `stock_manager_notes` text DEFAULT NULL,
  `asset_manager_notes` text DEFAULT NULL,
  `cost_control_manager_notes` text DEFAULT NULL,
  `commercial_sector_manager_notes` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `contractual_qty` int(11) DEFAULT NULL,
  `returned_qty` int(11) DEFAULT 0,
  `management_name` varchar(100) DEFAULT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `request_id`, `name`, `category_code`, `terms_code`, `terms`, `code`, `currency`, `unit`, `description`, `notes`, `general_manager_notes`, `cto_manager_notes`, `signature_notes`, `hse_manager_notes`, `operation_manager_notes`, `stock_manager_notes`, `asset_manager_notes`, `cost_control_manager_notes`, `commercial_sector_manager_notes`, `qty`, `contractual_qty`, `returned_qty`, `management_name`, `supplier_id`, `price`, `total`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 57, 'اسمنت', '3000', '1000', NULL, NULL, 'جنيه', 'متر طولي', 'الاسمنت الاصلي', 'يدفع مقدم', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, 22, 0, NULL, NULL, 3000, NULL, NULL, NULL, '2023-07-17 18:13:33', '2023-07-17 18:13:33', NULL),
(43, 59, 'الوان', '21', '500', NULL, '33', 'جنيه', 'متر مسطح', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 400, 300, 300, 'المشروعات', '1', 3444, NULL, NULL, '2023-07-26', '2023-07-17 19:49:07', '2023-07-17 19:49:07', NULL),
(44, 60, 'بوهية', '400', '300', NULL, NULL, 'جنيه', 'لتر', 'طلاء المدرسة', 'طلاء المدرسة مع كامل ملحقاته', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 2000, 0, NULL, NULL, 500, NULL, NULL, NULL, '2023-07-18 07:52:22', '2023-07-18 07:52:22', NULL),
(45, 61, NULL, '', '12000', 'السماح للمتعاقدين فقط', NULL, 'جنيه', 'شيكارة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 300, 500, 0, NULL, NULL, 300, NULL, '2023-07-20', '2023-07-20', '2023-07-18 08:02:03', '2023-07-18 08:02:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `key` int(11) DEFAULT NULL,
  `name_ar` text DEFAULT NULL,
  `name_en` text DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_11_15_194319_laratrust_setup_tables', 1),
(10, '2021_11_16_193024_create_logs_table', 1),
(11, '2022_08_03_170708_create_categories_table', 1),
(15, '2022_08_03_170845_create_requests_table', 2),
(16, '2022_08_03_182825_create_items_table', 2),
(17, '2022_08_17_113816_create_settings_table', 3),
(18, '2022_08_23_084401_create_suppliers_table', 4),
(19, '2022_08_23_084555_create_contractors_table', 4),
(20, '2022_09_16_193242_create_cats_table', 5),
(21, '2023_03_01_140743_add_category_code_and_contractual_qte_to_items_table', 6),
(22, '2023_03_01_150553_add_project_manager_to_requests_table', 6),
(23, '2023_03_01_162633_add_contractor_id_to_requests_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create_categories', 'Create Categories', 'Create Categories', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(2, 'read_categories', 'Read Categories', 'Read Categories', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(3, 'update_categories', 'Update Categories', 'Update Categories', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(4, 'delete_categories', 'Delete Categories', 'Delete Categories', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(5, 'create_requests', 'Create Requests', 'Create Requests', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(6, 'read_requests', 'Read Requests', 'Read Requests', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(7, 'update_requests', 'Update Requests', 'Update Requests', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(8, 'delete_requests', 'Delete Requests', 'Delete Requests', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(9, 'create_items', 'Create Items', 'Create Items', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(10, 'read_items', 'Read Items', 'Read Items', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(11, 'update_items', 'Update Items', 'Update Items', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(12, 'delete_items', 'Delete Items', 'Delete Items', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(13, 'create_users', 'Create Users', 'Create Users', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(14, 'read_users', 'Read Users', 'Read Users', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(15, 'update_users', 'Update Users', 'Update Users', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(16, 'delete_users', 'Delete Users', 'Delete Users', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(17, 'create_reports', 'Create Reports', 'Create Reports', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(18, 'read_reports', 'Read Reports', 'Read Reports', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(19, 'update_reports', 'Update Reports', 'Update Reports', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(20, 'delete_reports', 'Delete Reports', 'Delete Reports', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(21, 'create_logs', 'Create Logs', 'Create Logs', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(22, 'read_logs', 'Read Logs', 'Read Logs', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(23, 'update_logs', 'Update Logs', 'Update Logs', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(24, 'delete_logs', 'Delete Logs', 'Delete Logs', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(25, 'read_hse_manager', 'Read Hse_manager', 'Read Hse_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(26, 'update_hse_manager', 'Update Hse_manager', 'Update Hse_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(27, 'read_it_manager', 'Read It_manager', 'Read It_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(28, 'update_it_manager', 'Update It_manager', 'Update It_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(29, 'read_stock_manager', 'Read Stock_manager', 'Read Stock_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(30, 'update_stock_manager', 'Update Stock_manager', 'Update Stock_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(31, 'read_asset_manager', 'Read Asset_manager', 'Read Asset_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(32, 'update_asset_manager', 'Update Asset_manager', 'Update Asset_manager', '2022-08-18 06:45:03', '2022-08-18 06:45:03'),
(33, 'read_cost_control_manager', 'Read Cost_control_manager', 'Read Cost_control_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(34, 'update_cost_control_manager', 'Update Cost_control_manager', 'Update Cost_control_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(35, 'read_commercial_sector_manager', 'Read Commercial_sector_manager', 'Read Commercial_sector_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(36, 'update_commercial_sector_manager', 'Update Commercial_sector_manager', 'Update Commercial_sector_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(37, 'read_general_manager_notes', 'Read General_manager_notes', 'Read General_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(38, 'update_general_manager_notes', 'Update General_manager_notes', 'Update General_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(39, 'read_cto_manager_notes', 'Read Cto_manager_notes', 'Read Cto_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(40, 'update_cto_manager_notes', 'Update Cto_manager_notes', 'Update Cto_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(41, 'read_signature_notes', 'Read Signature_notes', 'Read Signature_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(42, 'update_signature_notes', 'Update Signature_notes', 'Update Signature_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(43, 'read_stock_manager_notes', 'Read Stock_manager_notes', 'Read Stock_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(44, 'update_stock_manager_notes', 'Update Stock_manager_notes', 'Update Stock_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(45, 'read_asset_manager_notes', 'Read Asset_manager_notes', 'Read Asset_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(46, 'update_asset_manager_notes', 'Update Asset_manager_notes', 'Update Asset_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(48, 'update_cost_control_manager_notes', 'Update Cost_control_manager_notes', 'Update Cost_control_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(50, 'update_commercial_sector_manager_notes', 'Update Commercial_sector_manager_notes', 'Update Commercial_sector_manager_notes', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(51, 'update_project_manager', 'Update the project manager', 'Update the project manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(58, 'read_cto_manager', 'Read Cto_manager', 'Read Cto_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04'),
(59, 'update_cto_manager', 'Update Cto_manager', 'Update Cto_manager', '2022-08-18 06:45:04', '2022-08-18 06:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(5, 1),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(6, 1),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(7, 1),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(7, 7),
(7, 8),
(7, 9),
(8, 1),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(9, 1),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(10, 1),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(11, 1),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(12, 1),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(13, 1),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(14, 1),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 7),
(14, 8),
(14, 9),
(15, 1),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(16, 1),
(16, 3),
(16, 4),
(16, 5),
(16, 6),
(16, 7),
(16, 8),
(16, 9),
(17, 1),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(17, 8),
(17, 9),
(18, 1),
(18, 3),
(18, 4),
(18, 5),
(18, 6),
(18, 7),
(18, 8),
(18, 9),
(19, 1),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(20, 1),
(20, 3),
(20, 4),
(20, 5),
(20, 6),
(20, 7),
(20, 8),
(20, 9),
(21, 1),
(21, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(22, 1),
(22, 3),
(22, 4),
(22, 5),
(22, 6),
(22, 7),
(22, 8),
(22, 9),
(23, 1),
(23, 3),
(23, 4),
(23, 5),
(23, 6),
(23, 7),
(23, 8),
(23, 9),
(24, 1),
(24, 3),
(24, 4),
(24, 5),
(24, 6),
(24, 7),
(24, 8),
(24, 9),
(25, 1),
(25, 3),
(25, 4),
(25, 5),
(25, 6),
(25, 7),
(25, 8),
(25, 9),
(26, 1),
(26, 3),
(26, 4),
(26, 5),
(26, 6),
(26, 7),
(26, 8),
(26, 9),
(27, 1),
(27, 3),
(27, 4),
(27, 5),
(27, 6),
(27, 7),
(27, 8),
(27, 9),
(28, 1),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(28, 7),
(28, 8),
(28, 9),
(29, 1),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(29, 7),
(29, 8),
(29, 9),
(30, 1),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(30, 7),
(30, 8),
(30, 9),
(31, 1),
(31, 3),
(31, 4),
(31, 5),
(31, 6),
(31, 7),
(31, 8),
(31, 9),
(32, 1),
(32, 3),
(32, 4),
(32, 5),
(32, 6),
(32, 7),
(32, 8),
(32, 9),
(33, 1),
(33, 3),
(33, 4),
(33, 5),
(33, 6),
(33, 7),
(33, 8),
(33, 9),
(34, 1),
(34, 3),
(34, 4),
(34, 5),
(34, 6),
(34, 7),
(34, 8),
(34, 9),
(35, 1),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(35, 7),
(35, 8),
(35, 9),
(36, 1),
(36, 3),
(36, 4),
(36, 5),
(36, 6),
(36, 7),
(36, 8),
(36, 9),
(37, 1),
(37, 3),
(37, 4),
(37, 5),
(37, 6),
(37, 7),
(37, 8),
(37, 9),
(38, 1),
(38, 3),
(38, 4),
(38, 5),
(38, 6),
(38, 7),
(38, 8),
(38, 9),
(39, 1),
(39, 3),
(39, 4),
(39, 5),
(39, 6),
(39, 7),
(39, 8),
(39, 9),
(40, 1),
(40, 3),
(40, 4),
(40, 5),
(40, 6),
(40, 7),
(40, 8),
(40, 9),
(41, 1),
(41, 3),
(41, 4),
(41, 5),
(41, 6),
(41, 7),
(41, 8),
(41, 9),
(42, 1),
(42, 3),
(42, 4),
(42, 5),
(42, 6),
(42, 7),
(42, 8),
(42, 9),
(43, 1),
(43, 3),
(43, 4),
(43, 5),
(43, 6),
(43, 7),
(43, 8),
(43, 9),
(44, 1),
(44, 3),
(44, 4),
(44, 5),
(44, 6),
(44, 7),
(44, 8),
(44, 9),
(45, 1),
(45, 3),
(45, 4),
(45, 5),
(45, 6),
(45, 7),
(45, 8),
(45, 9),
(46, 1),
(46, 3),
(46, 4),
(46, 5),
(46, 6),
(46, 7),
(46, 8),
(46, 9),
(51, 1),
(58, 1),
(58, 3),
(58, 4),
(58, 5),
(58, 6),
(58, 7),
(58, 8),
(58, 9),
(58, 10),
(58, 11),
(59, 1),
(59, 3),
(59, 4),
(59, 5),
(59, 6),
(59, 7),
(59, 8),
(59, 9),
(59, 10),
(59, 11);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_et` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ref` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `type_req` varchar(255) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `kind_h` varchar(255) NOT NULL DEFAULT '0',
  `link_with` int(11) DEFAULT NULL,
  `time_req` varchar(255) NOT NULL,
  `location_req` varchar(255) NOT NULL,
  `type_l_req` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `hse_manager` tinyint(1) NOT NULL DEFAULT 0,
  `stock_manager` tinyint(1) NOT NULL DEFAULT 0,
  `asset_manager` tinyint(1) NOT NULL DEFAULT 0,
  `cost_control_manager` tinyint(1) NOT NULL DEFAULT 0,
  `commercial_sector_manager` tinyint(1) NOT NULL DEFAULT 0,
  `it_manager` tinyint(1) DEFAULT 0,
  `it_manager_name` varchar(100) DEFAULT NULL,
  `hse_manager_name` varchar(255) DEFAULT NULL,
  `stock_manager_name` varchar(255) DEFAULT NULL,
  `asset_manager_name` varchar(255) DEFAULT NULL,
  `cost_control_manager_name` varchar(255) DEFAULT NULL,
  `commercial_sector_manager_name` varchar(255) DEFAULT NULL,
  `it_manager_date` timestamp NULL DEFAULT NULL,
  `hse_manager_date` timestamp NULL DEFAULT NULL,
  `stock_manager_date` timestamp NULL DEFAULT NULL,
  `asset_manager_date` timestamp NULL DEFAULT NULL,
  `cost_control_manager_date` timestamp NULL DEFAULT NULL,
  `commercial_sector_manager_date` timestamp NULL DEFAULT NULL,
  `cto_manager` tinyint(4) NOT NULL DEFAULT 0,
  `cto_manager_name` varchar(255) DEFAULT NULL,
  `cto_manager_date` timestamp NULL DEFAULT NULL,
  `start_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `project_manager` tinyint(1) NOT NULL DEFAULT 0,
  `project_manager_name` varchar(255) DEFAULT NULL,
  `project_manager_date` datetime DEFAULT NULL,
  `hse_manager_note` varchar(255) DEFAULT NULL,
  `stock_manager_note` varchar(255) DEFAULT NULL,
  `cost_control_manager_note` varchar(255) DEFAULT NULL,
  `asset_manager_note` varchar(255) DEFAULT NULL,
  `cto_manager_note` varchar(255) DEFAULT NULL,
  `project_manager_note` varchar(255) DEFAULT NULL,
  `commercial_sector_manager_note` varchar(255) DEFAULT NULL,
  `it_manager_note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `name_et`, `title`, `ref`, `code`, `notes`, `type_req`, `supplier_id`, `contractor_id`, `kind_h`, `link_with`, `time_req`, `location_req`, `type_l_req`, `category_id`, `created_by`, `hse_manager`, `stock_manager`, `asset_manager`, `cost_control_manager`, `commercial_sector_manager`, `it_manager`, `it_manager_name`, `hse_manager_name`, `stock_manager_name`, `asset_manager_name`, `cost_control_manager_name`, `commercial_sector_manager_name`, `it_manager_date`, `hse_manager_date`, `stock_manager_date`, `asset_manager_date`, `cost_control_manager_date`, `commercial_sector_manager_date`, `cto_manager`, `cto_manager_name`, `cto_manager_date`, `start_date`, `created_at`, `updated_at`, `deleted_at`, `project_manager`, `project_manager_name`, `project_manager_date`, `hse_manager_note`, `stock_manager_note`, `cost_control_manager_note`, `asset_manager_note`, `cto_manager_note`, `project_manager_note`, `commercial_sector_manager_note`, `it_manager_note`) VALUES
(57, 'مشروعات', 'منظمة الدعوة', 'بناء مدرسة', '400325', '3000', NULL, 'تكاليف مباشرة', NULL, NULL, '186', NULL, '', '', '', 1, 6, 1, 1, 1, 2, 1, 1, 'موافق', 'موافق', 'موافق', 'موافق', 'غير مختص', 'موافق', '2023-08-07 12:33:10', '2023-08-07 12:32:50', '2023-07-30 16:43:56', '2023-07-30 16:47:14', '2023-07-30 16:45:52', '2023-07-18 07:16:15', 1, 'موافق', '2023-07-30 16:46:19', '2023-07-19', '2023-07-17 18:13:33', '2023-08-07 12:33:10', NULL, 1, 'موافق', '2023-08-07 14:31:51', 'انا اوافق', 'نعم انا اؤيد ذلك', 'غير مختص في هذا', 'ليه العبس', 'هذا راي سديد', 'لقد قمت بالموافقة', NULL, 'انا اوافق'),
(58, 'تصميم مبنى', NULL, NULL, '22', '32', NULL, '', NULL, NULL, '0', NULL, '', '', '', 5, 6, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, 'موافق', NULL, NULL, NULL, NULL, NULL, '2023-07-17 20:11:27', NULL, 0, NULL, NULL, '2023-07-06', '2023-07-17 19:43:14', '2023-07-17 20:11:27', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'تصميم مبنى', NULL, NULL, '22', '32', NULL, '', NULL, NULL, '0', NULL, '', '', '', 5, 6, 0, 0, 0, 1, 0, 0, NULL, NULL, NULL, NULL, 'موافق', NULL, NULL, NULL, NULL, NULL, '2023-07-17 20:13:18', NULL, 0, NULL, NULL, '2023-07-06', '2023-07-17 19:49:06', '2023-07-17 20:13:18', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'مشروعات', 'مدرسة المؤمنين', 'الديكور', '2500', '300', NULL, 'تكاليف غير مباشرة', NULL, NULL, '170', NULL, '', '', '', 1, 6, 0, 0, 0, 1, 0, 1, 'موافق', NULL, NULL, 'غير موافق', 'موافق', NULL, '2023-07-18 07:52:57', NULL, '2023-07-18 15:29:37', '2023-07-18 15:12:41', '2023-07-18 14:01:37', NULL, 0, 'غير موافق', '2023-07-18 16:14:50', '2023-07-21', '2023-07-18 07:52:22', '2023-07-18 16:14:50', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'متجر ملابس', NULL, NULL, '2000', '1000', NULL, '', NULL, 1, '0', NULL, '', '', '', 4, 6, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-07-18 08:02:02', '2023-07-18 08:02:02', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'منظمة الدعوة', NULL, 'المظاهر', '22222', '', 'بناء المدرسة كامل', '', 1, NULL, '0', 57, '20', 'الموقع', 'بنكك', 2, 6, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '2023-08-07 12:35:13', '2023-08-07 12:35:13', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2022-08-18 06:45:02', '2022-08-18 06:45:02'),
(3, 'hse_manager', 'hse Manager', NULL, '2022-08-20 12:24:52', '2022-08-20 12:24:52'),
(4, 'it_manager', 'hse Manager', NULL, '2022-08-20 12:25:12', '2022-08-20 12:25:12'),
(5, 'stock_manager', 'stock manager', NULL, '2022-08-20 12:25:41', '2022-08-20 12:25:41'),
(6, 'asset_manager', 'asset Manager', NULL, '2022-08-20 12:26:13', '2022-08-20 12:26:13'),
(7, 'cost_control_manager', 'commercial_sector', NULL, '2022-08-20 12:26:38', '2022-08-20 12:26:38'),
(8, 'commercial_sector_manager', 'cost_control', NULL, '2022-08-20 12:27:09', '2022-08-20 12:27:09'),
(9, 'cto_manager', 'cto_manger', NULL, '2022-08-20 12:27:40', '2022-08-20 12:27:40'),
(10, 'general_manager', 'general_manager', NULL, '2022-08-20 12:27:40', '2022-08-20 12:27:40'),
(11, 'operation_manager', 'operation_manager', NULL, '2022-08-20 12:27:40', '2022-08-20 12:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(1, 2, 'App\\Models\\User'),
(1, 3, 'App\\Models\\User'),
(10, 4, 'App\\Models\\User'),
(1, 6, 'App\\Models\\User'),
(4, 7, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7wReue4vUOwHcYH75VPCvHyIv5EaG2rs3q4Yzdrb.png', 'إدارة المشتربات', '2022-08-17 09:43:24', '2022-08-23 02:46:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `responsible_name` varchar(255) DEFAULT NULL,
  `responsible_mobile` varchar(255) DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `mobile`, `website_url`, `responsible_name`, `responsible_mobile`, `attachments`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'سيد صاري', 'السيدة زينب', '٠١٥٨٧٦٥٣٢٢٩', 'https://www.vymysocenogoluf.info', 'خالد سيد', '٠١٥٨٧٦٥٣٢٢٨', '1667557870.pdf', 1, '2022-08-23 15:57:48', '2022-11-04 14:31:10', NULL),
(2, 'rr', 'rrr', '24242442', 'dfsdf.com', 'sqdsqf', '15151414', '1667557618.pdf', 1, '2022-11-04 14:26:58', '2022-11-04 14:27:20', '2022-11-04 14:27:20'),
(3, 'العلا لتوريد حديد التسليح', 'ديمو', '٠١٥٨٧٦٥٣٢٢٩', 'سيلببلا', 'لبليلب', '01010299935', NULL, 1, '2022-11-20 18:15:57', '2022-11-20 18:15:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile_code` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `title`, `email`, `email_verified_at`, `password`, `mobile_code`, `mobile`, `address`, `avatar`, `type`, `gender`, `active`, `verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'محمد سيد', ' Manger ', 'mohamedsayedfci95@gmail.com', NULL, '$2y$10$JZjIGPy.oHM/wWGmPalVtubnqKJaDlGHJuVVZRUI1SLo9SC1Yw9Ni', NULL, NULL, NULL, 'oJRShz6SfEvFBszUN8h7iUcMXwsnpIsYcTWdPPfu.png', 'super_admin', 1, 0, NULL, NULL, '2022-08-18 06:45:06', '2022-08-23 02:48:47'),
(2, 'Simon Watkins', NULL, 'gajekunow@mailinator.com', NULL, '$2y$10$BgrIQl3Td.It84VBZn3Phun71aELt/WC3py8bGpxMHB3363AhQRxe', NULL, 'Error eveniet volup', NULL, NULL, 'super_admin', 1, 0, NULL, NULL, '2022-08-20 07:42:39', '2022-08-20 12:12:04'),
(3, 'Mohamed Elfeky', NULL, 'elfekymohamed1@gmail.com', NULL, '$2y$10$I/z4BuD5mhIi4Zy3kFc.f.4hdzNzRFPSlUWX/QMyFG8WmrXZGnjTm', NULL, '+201050002499', NULL, 'ZNziywOIPLYeZVdJcBPIWb131dXMRulccmhRGwrY.png', 'super_admin', 1, 0, NULL, NULL, '2022-08-29 21:51:55', '2022-08-29 21:54:18'),
(4, 'محمد بنداري', NULL, 'support@esnadbusinness.com', NULL, '$2y$10$ByqwTeMqUU/2MnOUCnPvguo2P2tlM7heJiPgYz83XvZZ/FfSKxJza', NULL, '01050002499', NULL, 'r9jIAVzfcoZG38S6ww1M2KZRZqkk6JS0QIrnMKkA.png', 'general_manager', 1, 0, NULL, NULL, '2023-05-31 14:02:26', '2023-07-17 02:36:30'),
(6, 'Mohammed Abdullah', ' Manger ', 'mohammed10257883@gmail.com', NULL, '$2y$10$/I.yZfKBBrOicAQI0i96/e0Zcfu2yyBuKQZoc6T6.YC6reqaHZu6K', NULL, '01050002490', NULL, '/tmp/phpSBRPnQ', 'super_admin', 1, 0, NULL, NULL, '2023-05-31 14:02:26', '2023-07-11 00:11:40'),
(7, 'musa', NULL, 'musa@gmail.com', NULL, '$2y$10$UuDx7hVdFKdtwTudis.VgeMtHzWNG8KDDW44XM/O2W5YqUBSpyLMi', NULL, '0919977513', NULL, 'C:\\xampp\\tmp\\php3F6.tmp', 'it_manager', 1, 0, NULL, NULL, '2023-07-17 03:11:59', '2023-07-17 03:11:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_request_id_foreign` (`request_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id_p` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `contractors`
--
ALTER TABLE `contractors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
