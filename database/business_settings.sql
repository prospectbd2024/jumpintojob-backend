-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2023 at 08:01 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitechh_careerhub_global`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `value` longtext DEFAULT NULL,
  `lang` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'home_default_currency', '1', NULL, '2018-10-16 01:35:52', '2019-01-28 01:26:53'),
(2, 'system_default_currency', '1', NULL, '2018-10-16 01:36:58', '2020-01-26 04:22:13'),
(3, 'currency_format', '1', NULL, '2018-10-17 03:01:59', '2018-10-17 03:01:59'),
(4, 'symbol_format', '1', NULL, '2018-10-17 03:01:59', '2019-01-20 02:10:55'),
(5, 'no_of_decimals', '2', NULL, '2018-10-17 03:01:59', '2020-03-04 00:57:16'),
(6, 'product_activation', '1', NULL, '2018-10-28 01:38:37', '2019-02-04 01:11:41'),
(7, 'vendor_system_activation', '1', NULL, '2018-10-28 07:44:16', '2019-02-04 01:11:38'),
(8, 'show_vendors', '1', NULL, '2018-10-28 07:44:47', '2019-02-04 01:11:13'),
(9, 'paypal_payment', '0', NULL, '2018-10-28 07:45:16', '2019-01-31 05:09:10'),
(10, 'stripe_payment', '0', NULL, '2018-10-28 07:45:47', '2018-11-14 01:51:51'),
(11, 'cash_payment', '1', NULL, '2018-10-28 07:46:05', '2019-01-24 03:40:18'),
(12, 'payumoney_payment', '0', NULL, '2018-10-28 07:46:27', '2019-03-05 05:41:36'),
(13, 'best_selling', '1', NULL, '2018-12-24 08:13:44', '2019-02-14 05:29:13'),
(14, 'paypal_sandbox', '0', NULL, '2019-01-16 12:44:18', '2019-01-16 12:44:18'),
(15, 'sslcommerz_sandbox', '1', NULL, '2019-01-16 12:44:18', '2019-03-14 00:07:26'),
(16, 'sslcommerz_payment', '0', NULL, '2019-01-24 09:39:07', '2019-01-29 06:13:46'),
(17, 'vendor_commission', '20', NULL, '2019-01-31 06:18:04', '2019-04-13 06:49:26'),
(18, 'verification_form', '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Shop name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"License No\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"file\",\"label\":\"Tax Papers\"}]', NULL, '2019-02-03 11:36:58', '2019-02-16 06:14:42'),
(19, 'google_analytics', '0', NULL, '2019-02-06 12:22:35', '2019-02-06 12:22:35'),
(20, 'facebook_login', '0', NULL, '2019-02-07 12:51:59', '2019-02-08 19:41:15'),
(21, 'google_login', '0', NULL, '2019-02-07 12:52:10', '2019-02-08 19:41:14'),
(22, 'twitter_login', '0', NULL, '2019-02-07 12:52:20', '2019-02-08 02:32:56'),
(23, 'payumoney_payment', '1', NULL, '2019-03-05 11:38:17', '2019-03-05 11:38:17'),
(24, 'payumoney_sandbox', '1', NULL, '2019-03-05 11:38:17', '2019-03-05 05:39:18'),
(36, 'facebook_chat', '0', NULL, '2019-04-15 11:45:04', '2019-04-15 11:45:04'),
(37, 'email_verification', '1', NULL, '2019-04-30 07:30:07', '2019-04-30 07:30:07'),
(38, 'wallet_system', '0', NULL, '2019-05-19 08:05:44', '2019-05-19 02:11:57'),
(39, 'coupon_system', '0', NULL, '2019-06-11 09:46:18', '2019-06-11 09:46:18'),
(40, 'current_version', '7.7.0', NULL, '2019-06-11 09:46:18', '2019-06-11 09:46:18'),
(41, 'instamojo_payment', '0', NULL, '2019-07-06 09:58:03', '2019-07-06 09:58:03'),
(42, 'instamojo_sandbox', '1', NULL, '2019-07-06 09:58:43', '2019-07-06 09:58:43'),
(43, 'razorpay', '0', NULL, '2019-07-06 09:58:43', '2019-07-06 09:58:43'),
(44, 'paystack', '0', NULL, '2019-07-21 13:00:38', '2019-07-21 13:00:38'),
(45, 'pickup_point', '0', NULL, '2019-10-17 11:50:39', '2019-10-17 11:50:39'),
(46, 'maintenance_mode', '0', NULL, '2019-10-17 11:51:04', '2019-10-17 11:51:04'),
(47, 'voguepay', '0', NULL, '2019-10-17 11:51:24', '2019-10-17 11:51:24'),
(48, 'voguepay_sandbox', '0', NULL, '2019-10-17 11:51:38', '2019-10-17 11:51:38'),
(50, 'category_wise_commission', '0', NULL, '2020-01-21 07:22:47', '2020-01-21 07:22:47'),
(51, 'conversation_system', '1', NULL, '2020-01-21 07:23:21', '2020-01-21 07:23:21'),
(52, 'guest_checkout_active', '1', NULL, '2020-01-22 07:36:38', '2020-01-22 07:36:38'),
(53, 'facebook_pixel', '0', NULL, '2020-01-22 11:43:58', '2020-01-22 11:43:58'),
(55, 'classified_product', '0', NULL, '2020-05-13 13:01:05', '2020-05-13 13:01:05'),
(56, 'pos_activation_for_seller', '1', NULL, '2020-06-11 09:45:02', '2020-06-11 09:45:02'),
(57, 'shipping_type', 'product_wise_shipping', NULL, '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(58, 'flat_rate_shipping_cost', '0', NULL, '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(59, 'shipping_cost_admin', '0', NULL, '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(60, 'payhere_sandbox', '0', NULL, '2020-07-30 18:23:53', '2020-07-30 18:23:53'),
(61, 'payhere', '0', NULL, '2020-07-30 18:23:53', '2020-07-30 18:23:53'),
(62, 'google_recaptcha', '0', NULL, '2020-08-17 07:13:37', '2020-08-17 07:13:37'),
(63, 'ngenius', '0', NULL, '2020-09-22 10:58:21', '2020-09-22 10:58:21'),
(64, 'header_logo', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(65, 'show_language_switcher', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(66, 'show_currency_switcher', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(67, 'header_stikcy', 'on', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(68, 'footer_logo', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(69, 'about_us_description', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(70, 'contact_address', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(71, 'contact_phone', +8801902549358, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(72, 'contact_email', 'info@careerhubglobal.com', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(73, 'widget_one_labels', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(74, 'widget_one_links', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(75, 'widget_one', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(76, 'frontend_copyright_text', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(77, 'show_social_links', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(78, 'facebook_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(79, 'twitter_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(80, 'instagram_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(81, 'youtube_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(82, 'linkedin_link', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(83, 'payment_method_images', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(84, 'home_slider_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(85, 'home_slider_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(86, 'home_banner1_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(87, 'home_banner1_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(88, 'home_banner2_images', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(89, 'home_banner2_links', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(90, 'home_categories', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(91, 'top10_categories', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(92, 'top10_brands', '[]', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(93, 'website_name', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(94, 'site_motto', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(95, 'site_icon', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(96, 'base_color', '#e62e04', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(97, 'base_hov_color', '#e62e04', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(98, 'meta_title', CareerHubGlobal, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(99, 'meta_description', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(100, 'meta_keywords', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(101, 'meta_image', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(102, 'site_name', "CareerHubGlobal corp.", NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(103, 'system_logo_white', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(104, 'system_logo_black', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(105, 'timezone', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(106, 'admin_login_background', NULL, NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(107, 'iyzico_sandbox', '1', NULL, '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(108, 'iyzico', '1', NULL, '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(109, 'decimal_separator', '1', NULL, '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(110, 'nagad', '0', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(111, 'bkash', '0', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(112, 'bkash_sandbox', '1', NULL, '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(113, 'header_menu_labels', '[\"Home\",\"Flash Sale\",\"Blogs\",\"All Brands\",\"All Categories\"]', NULL, '2021-02-16 02:43:11', '2021-02-16 02:52:18'),
(114, 'header_menu_links', '[\"http:\\/\\/domain.com\",\"http:\\/\\/domain.com\\/flash-deals\",\"http:\\/\\/domain.com\\/blog\",\"http:\\/\\/domain.com\\/brands\",\"http:\\/\\/domain.com\\/categories\"]', NULL, '2021-02-16 02:43:11', '2021-02-18 01:20:04'),
(115, 'proxypay', '1', NULL, '2021-06-20 11:25:42', '2021-06-20 11:25:42'),
(116, 'proxypay_sandbox', '1', NULL, '2021-06-20 11:25:42', '2021-06-20 11:25:42'),
(117, 'google_map', '0', NULL, '2021-07-27 15:49:39', '2021-07-27 15:49:39'),
(118, 'google_firebase', '0', NULL, '2021-07-27 15:49:39', '2021-07-27 15:49:39'),
(119, 'authorizenet_sandbox', '1', NULL, '2021-02-16 02:43:11', '2021-06-14 05:00:23'),
(120, 'min_order_amount_check_activat', NULL, NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(121, 'minimum_order_amount', NULL, NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17'),
(122, 'item_name', 'eCommerce', NULL, '2022-04-17 06:57:17', '2022-04-17 06:57:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
