-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadgetex`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `adds_id` int(11) NOT NULL,
  `adds_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adds_link` varchar(555) COLLATE utf8_unicode_ci DEFAULT '#',
  `media_path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `adds_type` varchar(7) COLLATE utf8_unicode_ci DEFAULT 'sidebar',
  `created_time` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `order_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_coupon_code`
--

CREATE TABLE `affiliate_coupon_code` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `coupon_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `coupon_code` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_seo_title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_seo_keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_seo_content` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `share_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medium_banner` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_title` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `category_name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `rank_order` int(11) DEFAULT 0,
  `seo_title` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_title` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_content` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_meta_content` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `registered_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courier_status` tinyint(4) NOT NULL COMMENT '1 for inside 2 outside',
  `created_time` datetime NOT NULL,
  `active` tinyint(4) DEFAULT 0 COMMENT '1 active 0 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_type` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_title` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_total` float DEFAULT NULL,
  `expense_data` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_summary` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_cat_id` int(11) NOT NULL,
  `expense_cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hitcounter`
--

CREATE TABLE `hitcounter` (
  `hitcounter_id` int(11) NOT NULL,
  `client_ip` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `platform` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `agent` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homeslider`
--

CREATE TABLE `homeslider` (
  `homeslider_id` int(11) NOT NULL,
  `homeslider_title` varchar(555) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `homeslider_text` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_url` varchar(555) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#',
  `homeslider_picture` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `media_title` varchar(555) COLLATE utf8_unicode_ci DEFAULT '#',
  `product_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media_path` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `media_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `message_by` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `message_status` tinyint(4) DEFAULT 0 COMMENT '0 new\r\n1 pending\r\n2 done\r\n',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `newsletter_email` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `option_value` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `order_id` bigint(20) NOT NULL,
  `created_by` varchar(55) COLLATE utf8_unicode_ci DEFAULT 'customer',
  `order_from` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'sohojaffilate.com',
  `staff_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_from_affilite_id` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `order_total` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_charge` int(11) DEFAULT NULL,
  `discount_price` int(11) NOT NULL DEFAULT 0,
  `affiliate_discount` int(11) DEFAULT NULL,
  `advabced_price` int(11) DEFAULT 0,
  `order_status` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `payment_type` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `courier_service` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipment_time` datetime DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `order_date` date NOT NULL,
  `modified_time` datetime DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delevery_address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_note` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_order_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `affiliate_order_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash_back` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bonus_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `payWith` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `cashback_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `changed_affilite_commision` float DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_edit_track`
--

CREATE TABLE `order_edit_track` (
  `order_edit_track_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_note` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_order_count` int(11) DEFAULT 0,
  `product_price` double DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `product_specification` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `product_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `warranty_policy` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_terms` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_stock` int(11) DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 active 0 in active',
  `product_ram_rom` varchar(199) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'general',
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL,
  `folder` int(11) NOT NULL,
  `feasured_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_6` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_7` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_8` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_9` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_10` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `galary_image_3` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_4` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `galary_image_5` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_alert` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `delivery_in_dhaka` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_out_dhaka` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emi` tinyint(4) DEFAULT 0,
  `warenty` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_click`
--

CREATE TABLE `product_click` (
  `click_id` bigint(20) NOT NULL,
  `view_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `ip` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `click_date` date DEFAULT NULL,
  `click_date_time` datetime DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `product_color_id` int(11) NOT NULL,
  `color_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_color_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_color_by_product_id`
--

CREATE TABLE `product_color_by_product_id` (
  `id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `comment_from_customer` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_from_admin` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staus` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `question_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail_media`
--

CREATE TABLE `product_detail_media` (
  `id` int(11) NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_hit_count`
--

CREATE TABLE `product_hit_count` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `unique_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_of_order_data`
--

CREATE TABLE `product_of_order_data` (
  `id` bigint(20) NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order_history`
--

CREATE TABLE `product_order_history` (
  `product_order_history_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_count` tinyint(4) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_permission_report`
--

CREATE TABLE `product_permission_report` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `affilate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_size_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(5) COLLATE utf8_unicode_ci DEFAULT '1',
  `review_active` int(11) NOT NULL DEFAULT 0,
  `created_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` int(11) NOT NULL,
  `driver` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `total_affiliates` int(11) DEFAULT 0,
  `total_products` int(11) DEFAULT 0,
  `total_income` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `total_sell_amounts` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `total_sell_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_product`
--

CREATE TABLE `stock_product` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_status` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `stock_qty` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testmonial`
--

CREATE TABLE `testmonial` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bonus_blance` int(11) DEFAULT 0,
  `wallet_blance` int(11) DEFAULT 0,
  `cashback_blance` int(11) DEFAULT 0,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `affiliate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_name`
-- (See below for the actual view)
--
CREATE TABLE `view_name` (
`order_id` bigint(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `view_name`
--
DROP TABLE IF EXISTS `view_name`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_name`  AS  select `order_data`.`order_id` AS `order_id` from `order_data` group by `order_data`.`order_status` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affiliate_coupon_code`
--
ALTER TABLE `affiliate_coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `hitcounter`
--
ALTER TABLE `hitcounter`
  ADD PRIMARY KEY (`hitcounter_id`);

--
-- Indexes for table `homeslider`
--
ALTER TABLE `homeslider`
  ADD PRIMARY KEY (`homeslider_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messages_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_edit_track`
--
ALTER TABLE `order_edit_track`
  ADD PRIMARY KEY (`order_edit_track_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`,`product_name`,`sku`),
  ADD KEY `product_title` (`product_title`);

--
-- Indexes for table `product_click`
--
ALTER TABLE `product_click`
  ADD PRIMARY KEY (`click_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`product_color_id`);

--
-- Indexes for table `product_color_by_product_id`
--
ALTER TABLE `product_color_by_product_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `product_detail_media`
--
ALTER TABLE `product_detail_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_hit_count`
--
ALTER TABLE `product_hit_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_of_order_data`
--
ALTER TABLE `product_of_order_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order_history`
--
ALTER TABLE `product_order_history`
  ADD PRIMARY KEY (`product_order_history_id`);

--
-- Indexes for table `product_permission_report`
--
ALTER TABLE `product_permission_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testmonial`
--
ALTER TABLE `testmonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `affiliate_coupon_code`
--
ALTER TABLE `affiliate_coupon_code`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hitcounter`
--
ALTER TABLE `hitcounter`
  MODIFY `hitcounter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homeslider`
--
ALTER TABLE `homeslider`
  MODIFY `homeslider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_edit_track`
--
ALTER TABLE `order_edit_track`
  MODIFY `order_edit_track_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_click`
--
ALTER TABLE `product_click`
  MODIFY `click_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `product_color_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color_by_product_id`
--
ALTER TABLE `product_color_by_product_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_detail_media`
--
ALTER TABLE `product_detail_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_hit_count`
--
ALTER TABLE `product_hit_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_of_order_data`
--
ALTER TABLE `product_of_order_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_order_history`
--
ALTER TABLE `product_order_history`
  MODIFY `product_order_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_permission_report`
--
ALTER TABLE `product_permission_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testmonial`
--
ALTER TABLE `testmonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
