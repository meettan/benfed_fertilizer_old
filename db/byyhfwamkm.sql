-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2019 at 05:35 AM
-- Server version: 5.5.62-0+deb8u1-log
-- PHP Version: 7.2.24-1+0~20191026.31+debian8~1.gbpbbacde

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byyhfwamkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-11-07 10:48:10', '2019-11-07 10:48:10', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0),
(2, 10, 'ActionScheduler', '', '', '', '2019-11-07 12:08:03', '2019-11-07 12:08:03', 'action created', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(3, 10, 'ActionScheduler', '', '', '', '2019-11-07 12:08:05', '2019-11-07 12:08:05', 'action started', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(4, 10, 'ActionScheduler', '', '', '', '2019-11-07 12:08:06', '2019-11-07 12:08:06', 'action complete', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(5, 11, 'ActionScheduler', '', '', '', '2019-11-07 12:08:31', '2019-11-07 12:08:31', 'action created', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(6, 12, 'ActionScheduler', '', '', '', '2019-11-07 12:08:31', '2019-11-07 12:08:31', 'action created', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(7, 13, 'ActionScheduler', '', '', '', '2019-11-07 12:08:32', '2019-11-07 12:08:32', 'action created', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(8, 11, 'ActionScheduler', '', '', '', '2019-11-07 12:09:23', '2019-11-07 12:09:23', 'action started', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(9, 11, 'ActionScheduler', '', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', 'action complete', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(10, 12, 'ActionScheduler', '', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', 'action started', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(11, 12, 'ActionScheduler', '', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', 'action complete', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(12, 13, 'ActionScheduler', '', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', 'action started', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(13, 13, 'ActionScheduler', '', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', 'action complete', 0, '1', 'ActionScheduler', 'action_log', 0, 0),
(14, 14, 'ActionScheduler', '', '', '', '2019-11-07 12:09:25', '2019-11-07 12:09:25', 'action created', 0, '1', 'ActionScheduler', 'action_log', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(0, '_transient_jetpack_idc_allowed', '1', 'no'),
(1, 'siteurl', 'http://sssprojects.co.in/topshop', 'yes'),
(2, 'home', 'http://sssprojects.co.in/topshop', 'yes'),
(3, 'blogname', 'Affiliate', 'yes'),
(4, 'blogdescription', 'Just another WordPress site', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'utsab@synergicsoftek.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:151:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:22:\"^wc-api/v([1-3]{1})/?$\";s:51:\"index.php?wc-api-version=$matches[1]&wc-api-route=/\";s:24:\"^wc-api/v([1-3]{1})(.*)?\";s:61:\"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]\";s:24:\"^wc-auth/v([1]{1})/(.*)?\";s:63:\"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:32:\"category/(.+?)/wc-api(/(.*))?/?$\";s:54:\"index.php?category_name=$matches[1]&wc-api=$matches[3]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:29:\"tag/([^/]+)/wc-api(/(.*))?/?$\";s:44:\"index.php?tag=$matches[1]&wc-api=$matches[3]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:35:\"product/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:45:\"product/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:65:\"product/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"product/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:60:\"product/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:41:\"product/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:24:\"product/([^/]+)/embed/?$\";s:40:\"index.php?product=$matches[1]&embed=true\";s:28:\"product/([^/]+)/trackback/?$\";s:34:\"index.php?product=$matches[1]&tb=1\";s:36:\"product/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&paged=$matches[2]\";s:43:\"product/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&cpage=$matches[2]\";s:33:\"product/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?product=$matches[1]&wc-api=$matches[3]\";s:39:\"product/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:50:\"product/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:32:\"product/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?product=$matches[1]&page=$matches[2]\";s:24:\"product/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:34:\"product/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:54:\"product/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"product/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:49:\"product/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:30:\"product/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:55:\"product-category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:50:\"product-category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:31:\"product-category/(.+?)/embed/?$\";s:44:\"index.php?product_cat=$matches[1]&embed=true\";s:43:\"product-category/(.+?)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_cat=$matches[1]&paged=$matches[2]\";s:25:\"product-category/(.+?)/?$\";s:33:\"index.php?product_cat=$matches[1]\";s:52:\"product-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:47:\"product-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:28:\"product-tag/([^/]+)/embed/?$\";s:44:\"index.php?product_tag=$matches[1]&embed=true\";s:40:\"product-tag/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_tag=$matches[1]&paged=$matches[2]\";s:22:\"product-tag/([^/]+)/?$\";s:33:\"index.php?product_tag=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:38:\"index.php?&page_id=2&cpage=$matches[1]\";s:17:\"wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:26:\"comments/wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:29:\"search/(.+)/wc-api(/(.*))?/?$\";s:42:\"index.php?s=$matches[1]&wc-api=$matches[3]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:32:\"author/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?author_name=$matches[1]&wc-api=$matches[3]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:54:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:82:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:41:\"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:66:\"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:28:\"([0-9]{4})/wc-api(/(.*))?/?$\";s:45:\"index.php?year=$matches[1]&wc-api=$matches[3]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:62:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/wc-api(/(.*))?/?$\";s:99:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&wc-api=$matches[6]\";s:62:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:73:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:28:\"(.?.+?)/order-pay(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&order-pay=$matches[3]\";s:33:\"(.?.+?)/order-received(/(.*))?/?$\";s:57:\"index.php?pagename=$matches[1]&order-received=$matches[3]\";s:25:\"(.?.+?)/orders(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&orders=$matches[3]\";s:29:\"(.?.+?)/view-order(/(.*))?/?$\";s:53:\"index.php?pagename=$matches[1]&view-order=$matches[3]\";s:28:\"(.?.+?)/downloads(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&downloads=$matches[3]\";s:31:\"(.?.+?)/edit-account(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-account=$matches[3]\";s:31:\"(.?.+?)/edit-address(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-address=$matches[3]\";s:34:\"(.?.+?)/payment-methods(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&payment-methods=$matches[3]\";s:32:\"(.?.+?)/lost-password(/(.*))?/?$\";s:56:\"index.php?pagename=$matches[1]&lost-password=$matches[3]\";s:34:\"(.?.+?)/customer-logout(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&customer-logout=$matches[3]\";s:37:\"(.?.+?)/add-payment-method(/(.*))?/?$\";s:61:\"index.php?pagename=$matches[1]&add-payment-method=$matches[3]\";s:40:\"(.?.+?)/delete-payment-method(/(.*))?/?$\";s:64:\"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]\";s:45:\"(.?.+?)/set-default-payment-method(/(.*))?/?$\";s:69:\"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]\";s:25:\"(.?.+?)/wc-api(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&wc-api=$matches[3]\";s:31:\".?.+?/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:42:\".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:7:{i:0;s:34:\"advanced-custom-fields-pro/acf.php\";i:1;s:19:\"jetpack/jetpack.php\";i:2;s:57:\"woocommerce-gateway-stripe/woocommerce-gateway-stripe.php\";i:3;s:45:\"woocommerce-services/woocommerce-services.php\";i:4;s:63:\"woocommerce-shipstation-integration/woocommerce-shipstation.php\";i:5;s:41:\"woocommerce-square/woocommerce-square.php\";i:6;s:27:\"woocommerce/woocommerce.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'affiliate', 'yes'),
(41, 'stylesheet', 'affiliate-child', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '44719', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:1:{s:45:\"woocommerce-services/woocommerce-services.php\";a:2:{i:0;s:17:\"WC_Connect_Loader\";i:1;s:16:\"plugin_uninstall\";}}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '2', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'initial_db_version', '44719', 'yes'),
(94, 'wp_user_roles', 'a:7:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:114:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:8:\"customer\";a:2:{s:4:\"name\";s:8:\"Customer\";s:12:\"capabilities\";a:1:{s:4:\"read\";b:1;}}s:12:\"shop_manager\";a:2:{s:4:\"name\";s:12:\"Shop manager\";s:12:\"capabilities\";a:92:{s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:4:\"read\";b:1;s:18:\"read_private_pages\";b:1;s:18:\"read_private_posts\";b:1;s:10:\"edit_posts\";b:1;s:10:\"edit_pages\";b:1;s:20:\"edit_published_posts\";b:1;s:20:\"edit_published_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"edit_private_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:17:\"edit_others_pages\";b:1;s:13:\"publish_posts\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_posts\";b:1;s:12:\"delete_pages\";b:1;s:20:\"delete_private_pages\";b:1;s:20:\"delete_private_posts\";b:1;s:22:\"delete_published_pages\";b:1;s:22:\"delete_published_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:19:\"delete_others_pages\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:17:\"moderate_comments\";b:1;s:12:\"upload_files\";b:1;s:6:\"export\";b:1;s:6:\"import\";b:1;s:10:\"list_users\";b:1;s:18:\"edit_theme_options\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(97, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'sidebars_widgets', 'a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:13:\"array_version\";i:3;}', 'yes'),
(102, 'cron', 'a:16:{i:1573219517;a:1:{s:26:\"action_scheduler_run_queue\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:12:\"every_minute\";s:4:\"args\";a:0:{}s:8:\"interval\";i:60;}}}i:1573220892;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1573222852;a:1:{s:20:\"jetpack_clean_nonces\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1573223075;a:1:{s:32:\"woocommerce_cancel_unpaid_orders\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}i:1573226296;a:1:{s:24:\"woocommerce_cleanup_logs\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573237096;a:1:{s:28:\"woocommerce_cleanup_sessions\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1573253292;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1573257600;a:1:{s:27:\"woocommerce_scheduled_sales\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573296491;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573296496;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573387110;a:1:{s:28:\"wp_1_wc_privacy_cleanup_cron\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:37:\"wp_1_wc_privacy_cleanup_cron_interval\";s:4:\"args\";a:0:{}s:8:\"interval\";i:300;}}}i:1573388296;a:1:{s:33:\"woocommerce_cleanup_personal_data\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573388306;a:1:{s:30:\"woocommerce_tracker_send_event\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1573469300;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1575331200;a:1:{s:25:\"woocommerce_geoip_updater\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:7:\"monthly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:2635200;}}}s:7:\"version\";i:2;}', 'yes'),
(103, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'recovery_keys', 'a:0:{}', 'yes'),
(114, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.2.4.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.2.4.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.2.4-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.2.4-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.2.4\";s:7:\"version\";s:5:\"5.2.4\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.0\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1573219537;s:15:\"version_checked\";s:5:\"5.2.4\";s:12:\"translations\";a:0:{}}', 'no'),
(115, 'theme_mods_twentynineteen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1573124102;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(120, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1573219539;s:7:\"checked\";a:5:{s:15:\"affiliate-child\";s:3:\"1.2\";s:9:\"affiliate\";s:3:\"2.2\";s:14:\"twentynineteen\";s:3:\"1.4\";s:15:\"twentyseventeen\";s:3:\"2.2\";s:13:\"twentysixteen\";s:3:\"2.0\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(122, '_site_transient_timeout_browser_37ac1218abb55baa7809c88793948426', '1573728498', 'no'),
(123, '_site_transient_browser_37ac1218abb55baa7809c88793948426', 'a:10:{s:4:\"name\";s:7:\"Firefox\";s:7:\"version\";s:4:\"70.0\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:24:\"https://www.firefox.com/\";s:7:\"img_src\";s:44:\"http://s.w.org/images/browsers/firefox.png?1\";s:11:\"img_src_ssl\";s:45:\"https://s.w.org/images/browsers/firefox.png?1\";s:15:\"current_version\";s:2:\"56\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(124, '_site_transient_timeout_php_check_97f83d63b8a66f6e8c057d89a83d8845', '1573728500', 'no'),
(125, '_site_transient_php_check_97f83d63b8a66f6e8c057d89a83d8845', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(129, 'can_compress_scripts', '1', 'no'),
(140, 'current_theme', 'affiliate Child', 'yes'),
(141, 'theme_mods_affiliate-child', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;}', 'yes'),
(142, 'theme_switched', '', 'yes'),
(144, '_transient_twentysixteen_categories', '1', 'yes'),
(145, 'recovery_mode_email_last_sent', '1573124241', 'yes'),
(151, 'recently_activated', 'a:2:{s:39:\"woocommerce-admin/woocommerce-admin.php\";i:1573128581;s:30:\"advanced-custom-fields/acf.php\";i:1573126738;}', 'yes'),
(157, 'acf_version', '5.8.6', 'yes'),
(158, 'category_children', 'a:0:{}', 'yes'),
(163, 'woocommerce_store_address', 'none', 'yes'),
(164, 'woocommerce_store_address_2', '', 'yes'),
(165, 'woocommerce_store_city', 'uk', 'yes'),
(166, 'woocommerce_default_country', 'GB:*', 'yes'),
(167, 'woocommerce_store_postcode', '', 'yes'),
(168, 'woocommerce_allowed_countries', 'all', 'yes'),
(169, 'woocommerce_all_except_countries', '', 'yes'),
(170, 'woocommerce_specific_allowed_countries', '', 'yes'),
(171, 'woocommerce_ship_to_countries', '', 'yes'),
(172, 'woocommerce_specific_ship_to_countries', '', 'yes'),
(173, 'woocommerce_default_customer_address', 'geolocation', 'yes'),
(174, 'woocommerce_calc_taxes', 'no', 'yes'),
(175, 'woocommerce_enable_coupons', 'yes', 'yes'),
(176, 'woocommerce_calc_discounts_sequentially', 'no', 'no'),
(177, 'woocommerce_currency', 'GBP', 'yes'),
(178, 'woocommerce_currency_pos', 'left', 'yes'),
(179, 'woocommerce_price_thousand_sep', ',', 'yes'),
(180, 'woocommerce_price_decimal_sep', '.', 'yes'),
(181, 'woocommerce_price_num_decimals', '2', 'yes'),
(182, 'woocommerce_shop_page_id', '15', 'yes'),
(183, 'woocommerce_cart_redirect_after_add', 'no', 'yes'),
(184, 'woocommerce_enable_ajax_add_to_cart', 'yes', 'yes'),
(185, 'woocommerce_placeholder_image', '9', 'yes'),
(186, 'woocommerce_weight_unit', 'kg', 'yes'),
(187, 'woocommerce_dimension_unit', 'cm', 'yes'),
(188, 'woocommerce_enable_reviews', 'yes', 'yes'),
(189, 'woocommerce_review_rating_verification_label', 'yes', 'no'),
(190, 'woocommerce_review_rating_verification_required', 'no', 'no'),
(191, 'woocommerce_enable_review_rating', 'yes', 'yes'),
(192, 'woocommerce_review_rating_required', 'yes', 'no'),
(193, 'woocommerce_manage_stock', 'yes', 'yes'),
(194, 'woocommerce_hold_stock_minutes', '60', 'no'),
(195, 'woocommerce_notify_low_stock', 'yes', 'no'),
(196, 'woocommerce_notify_no_stock', 'yes', 'no'),
(197, 'woocommerce_stock_email_recipient', 'utsab@synergicsoftek.com', 'no'),
(198, 'woocommerce_notify_low_stock_amount', '2', 'no'),
(199, 'woocommerce_notify_no_stock_amount', '0', 'yes'),
(200, 'woocommerce_hide_out_of_stock_items', 'no', 'yes'),
(201, 'woocommerce_stock_format', '', 'yes'),
(202, 'woocommerce_file_download_method', 'force', 'no'),
(203, 'woocommerce_downloads_require_login', 'no', 'no'),
(204, 'woocommerce_downloads_grant_access_after_payment', 'yes', 'no'),
(205, 'woocommerce_prices_include_tax', 'no', 'yes'),
(206, 'woocommerce_tax_based_on', 'shipping', 'yes'),
(207, 'woocommerce_shipping_tax_class', 'inherit', 'yes'),
(208, 'woocommerce_tax_round_at_subtotal', 'no', 'yes'),
(209, 'woocommerce_tax_classes', '', 'yes'),
(210, 'woocommerce_tax_display_shop', 'excl', 'yes'),
(211, 'woocommerce_tax_display_cart', 'excl', 'yes'),
(212, 'woocommerce_price_display_suffix', '', 'yes'),
(213, 'woocommerce_tax_total_display', 'itemized', 'no'),
(214, 'woocommerce_enable_shipping_calc', 'yes', 'no'),
(215, 'woocommerce_shipping_cost_requires_address', 'no', 'yes'),
(216, 'woocommerce_ship_to_destination', 'billing', 'no'),
(217, 'woocommerce_shipping_debug_mode', 'no', 'yes'),
(218, 'woocommerce_enable_guest_checkout', 'yes', 'no'),
(219, 'woocommerce_enable_checkout_login_reminder', 'no', 'no'),
(220, 'woocommerce_enable_signup_and_login_from_checkout', 'no', 'no'),
(221, 'woocommerce_enable_myaccount_registration', 'no', 'no'),
(222, 'woocommerce_registration_generate_username', 'yes', 'no'),
(223, 'woocommerce_registration_generate_password', 'yes', 'no'),
(224, 'woocommerce_erasure_request_removes_order_data', 'no', 'no'),
(225, 'woocommerce_erasure_request_removes_download_data', 'no', 'no'),
(226, 'woocommerce_allow_bulk_remove_personal_data', 'no', 'no'),
(227, 'woocommerce_registration_privacy_policy_text', 'Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our [privacy_policy].', 'yes'),
(228, 'woocommerce_checkout_privacy_policy_text', 'Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our [privacy_policy].', 'yes'),
(229, 'woocommerce_delete_inactive_accounts', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(230, 'woocommerce_trash_pending_orders', '', 'no'),
(231, 'woocommerce_trash_failed_orders', '', 'no'),
(232, 'woocommerce_trash_cancelled_orders', '', 'no'),
(233, 'woocommerce_anonymize_completed_orders', 'a:2:{s:6:\"number\";s:0:\"\";s:4:\"unit\";s:6:\"months\";}', 'no'),
(234, 'woocommerce_email_from_name', 'Affiliate', 'no'),
(235, 'woocommerce_email_from_address', 'utsab@synergicsoftek.com', 'no'),
(236, 'woocommerce_email_header_image', '', 'no'),
(237, 'woocommerce_email_footer_text', '{site_title} &mdash; Built with {WooCommerce}', 'no'),
(238, 'woocommerce_email_base_color', '#96588a', 'no'),
(239, 'woocommerce_email_background_color', '#f7f7f7', 'no'),
(240, 'woocommerce_email_body_background_color', '#ffffff', 'no'),
(241, 'woocommerce_email_text_color', '#3c3c3c', 'no'),
(242, 'woocommerce_cart_page_id', '16', 'no'),
(243, 'woocommerce_checkout_page_id', '17', 'no'),
(244, 'woocommerce_myaccount_page_id', '18', 'no'),
(245, 'woocommerce_terms_page_id', '', 'no'),
(246, 'woocommerce_force_ssl_checkout', 'no', 'yes'),
(247, 'woocommerce_unforce_ssl_checkout', 'no', 'yes'),
(248, 'woocommerce_checkout_pay_endpoint', 'order-pay', 'yes'),
(249, 'woocommerce_checkout_order_received_endpoint', 'order-received', 'yes'),
(250, 'woocommerce_myaccount_add_payment_method_endpoint', 'add-payment-method', 'yes'),
(251, 'woocommerce_myaccount_delete_payment_method_endpoint', 'delete-payment-method', 'yes'),
(252, 'woocommerce_myaccount_set_default_payment_method_endpoint', 'set-default-payment-method', 'yes'),
(253, 'woocommerce_myaccount_orders_endpoint', 'orders', 'yes'),
(254, 'woocommerce_myaccount_view_order_endpoint', 'view-order', 'yes'),
(255, 'woocommerce_myaccount_downloads_endpoint', 'downloads', 'yes'),
(256, 'woocommerce_myaccount_edit_account_endpoint', 'edit-account', 'yes'),
(257, 'woocommerce_myaccount_edit_address_endpoint', 'edit-address', 'yes'),
(258, 'woocommerce_myaccount_payment_methods_endpoint', 'payment-methods', 'yes'),
(259, 'woocommerce_myaccount_lost_password_endpoint', 'lost-password', 'yes'),
(260, 'woocommerce_logout_endpoint', 'customer-logout', 'yes'),
(261, 'woocommerce_api_enabled', 'no', 'yes'),
(262, 'woocommerce_allow_tracking', 'no', 'no'),
(263, 'woocommerce_show_marketplace_suggestions', 'yes', 'no'),
(264, 'woocommerce_single_image_width', '600', 'yes'),
(265, 'woocommerce_thumbnail_image_width', '300', 'yes'),
(266, 'woocommerce_checkout_highlight_required_fields', 'yes', 'yes'),
(267, 'woocommerce_demo_store', 'no', 'no'),
(268, 'woocommerce_permalinks', 'a:5:{s:12:\"product_base\";s:7:\"product\";s:13:\"category_base\";s:16:\"product-category\";s:8:\"tag_base\";s:11:\"product-tag\";s:14:\"attribute_base\";s:0:\"\";s:22:\"use_verbose_page_rules\";b:0;}', 'yes'),
(269, 'current_theme_supports_woocommerce', 'no', 'yes'),
(270, 'woocommerce_queue_flush_rewrite_rules', 'no', 'yes'),
(272, 'product_cat_children', 'a:0:{}', 'yes'),
(273, 'default_product_cat', '15', 'yes'),
(278, 'woocommerce_admin_notices', 'a:3:{i:1;s:20:\"no_secure_connection\";i:2;s:8:\"wc_admin\";i:4;s:19:\"no_shipping_methods\";}', 'yes'),
(279, '_transient_woocommerce_webhook_ids_status_active', 'a:0:{}', 'yes'),
(280, 'widget_woocommerce_widget_cart', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(281, 'widget_woocommerce_layered_nav_filters', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(282, 'widget_woocommerce_layered_nav', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(283, 'widget_woocommerce_price_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(284, 'widget_woocommerce_product_categories', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(285, 'widget_woocommerce_product_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(286, 'widget_woocommerce_product_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(287, 'widget_woocommerce_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(288, 'widget_woocommerce_recently_viewed_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(289, 'widget_woocommerce_top_rated_products', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(290, 'widget_woocommerce_recent_reviews', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(291, 'widget_woocommerce_rating_filter', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(296, 'woocommerce_meta_box_errors', 'a:0:{}', 'yes'),
(297, '_transient_timeout_external_ip_address_::1', '1573732988', 'no'),
(298, '_transient_external_ip_address_::1', '122.176.27.53', 'no'),
(303, '_transient_product_query-transient-version', '1573128565', 'yes');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(307, 'woocommerce_marketplace_suggestions', 'a:2:{s:11:\"suggestions\";a:26:{i:0;a:4:{s:4:\"slug\";s:28:\"product-edit-meta-tab-header\";s:7:\"context\";s:28:\"product-edit-meta-tab-header\";s:5:\"title\";s:22:\"Recommended extensions\";s:13:\"allow-dismiss\";b:0;}i:1;a:6:{s:4:\"slug\";s:39:\"product-edit-meta-tab-footer-browse-all\";s:7:\"context\";s:28:\"product-edit-meta-tab-footer\";s:9:\"link-text\";s:21:\"Browse all extensions\";s:3:\"url\";s:64:\"https://woocommerce.com/product-category/woocommerce-extensions/\";s:8:\"promoted\";s:31:\"category-woocommerce-extensions\";s:13:\"allow-dismiss\";b:0;}i:2;a:9:{s:4:\"slug\";s:46:\"product-edit-mailchimp-woocommerce-memberships\";s:7:\"product\";s:33:\"woocommerce-memberships-mailchimp\";s:14:\"show-if-active\";a:1:{i:0;s:23:\"woocommerce-memberships\";}s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:117:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/mailchimp-for-memberships.svg\";s:5:\"title\";s:25:\"Mailchimp for Memberships\";s:4:\"copy\";s:79:\"Completely automate your email lists by syncing membership changes to Mailchimp\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:67:\"https://woocommerce.com/products/mailchimp-woocommerce-memberships/\";}i:3;a:9:{s:4:\"slug\";s:19:\"product-edit-addons\";s:7:\"product\";s:26:\"woocommerce-product-addons\";s:14:\"show-if-active\";a:2:{i:0;s:25:\"woocommerce-subscriptions\";i:1;s:20:\"woocommerce-bookings\";}s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:107:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/product-add-ons.svg\";s:5:\"title\";s:15:\"Product Add-Ons\";s:4:\"copy\";s:93:\"Offer add-ons like gift wrapping, special messages or other special options for your products\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:49:\"https://woocommerce.com/products/product-add-ons/\";}i:4;a:9:{s:4:\"slug\";s:46:\"product-edit-woocommerce-subscriptions-gifting\";s:7:\"product\";s:33:\"woocommerce-subscriptions-gifting\";s:14:\"show-if-active\";a:1:{i:0;s:25:\"woocommerce-subscriptions\";}s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:117:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/gifting-for-subscriptions.svg\";s:5:\"title\";s:25:\"Gifting for Subscriptions\";s:4:\"copy\";s:70:\"Let customers buy subscriptions for others - they\'re the ultimate gift\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:67:\"https://woocommerce.com/products/woocommerce-subscriptions-gifting/\";}i:5;a:9:{s:4:\"slug\";s:42:\"product-edit-teams-woocommerce-memberships\";s:7:\"product\";s:33:\"woocommerce-memberships-for-teams\";s:14:\"show-if-active\";a:1:{i:0;s:23:\"woocommerce-memberships\";}s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:113:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/teams-for-memberships.svg\";s:5:\"title\";s:21:\"Teams for Memberships\";s:4:\"copy\";s:123:\"Adds B2B functionality to WooCommerce Memberships, allowing sites to sell team, group, corporate, or family member accounts\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:63:\"https://woocommerce.com/products/teams-woocommerce-memberships/\";}i:6;a:8:{s:4:\"slug\";s:29:\"product-edit-variation-images\";s:7:\"product\";s:39:\"woocommerce-additional-variation-images\";s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:119:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/additional-variation-images.svg\";s:5:\"title\";s:27:\"Additional Variation Images\";s:4:\"copy\";s:72:\"Showcase your products in the best light with a image for each variation\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:73:\"https://woocommerce.com/products/woocommerce-additional-variation-images/\";}i:7;a:9:{s:4:\"slug\";s:47:\"product-edit-woocommerce-subscription-downloads\";s:7:\"product\";s:34:\"woocommerce-subscription-downloads\";s:14:\"show-if-active\";a:1:{i:0;s:25:\"woocommerce-subscriptions\";}s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:114:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/subscription-downloads.svg\";s:5:\"title\";s:22:\"Subscription Downloads\";s:4:\"copy\";s:57:\"Give customers special downloads with their subscriptions\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:68:\"https://woocommerce.com/products/woocommerce-subscription-downloads/\";}i:8;a:8:{s:4:\"slug\";s:31:\"product-edit-min-max-quantities\";s:7:\"product\";s:30:\"woocommerce-min-max-quantities\";s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:110:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/min-max-quantities.svg\";s:5:\"title\";s:18:\"Min/Max Quantities\";s:4:\"copy\";s:81:\"Specify minimum and maximum allowed product quantities for orders to be completed\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:52:\"https://woocommerce.com/products/min-max-quantities/\";}i:9;a:8:{s:4:\"slug\";s:28:\"product-edit-name-your-price\";s:7:\"product\";s:27:\"woocommerce-name-your-price\";s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:107:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/name-your-price.svg\";s:5:\"title\";s:15:\"Name Your Price\";s:4:\"copy\";s:70:\"Let customers pay what they want - useful for donations, tips and more\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:49:\"https://woocommerce.com/products/name-your-price/\";}i:10;a:8:{s:4:\"slug\";s:42:\"product-edit-woocommerce-one-page-checkout\";s:7:\"product\";s:29:\"woocommerce-one-page-checkout\";s:7:\"context\";a:1:{i:0;s:26:\"product-edit-meta-tab-body\";}s:4:\"icon\";s:109:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/one-page-checkout.svg\";s:5:\"title\";s:17:\"One Page Checkout\";s:4:\"copy\";s:92:\"Don\'t make customers click around - let them choose products, checkout & pay all on one page\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:63:\"https://woocommerce.com/products/woocommerce-one-page-checkout/\";}i:11;a:4:{s:4:\"slug\";s:19:\"orders-empty-header\";s:7:\"context\";s:24:\"orders-list-empty-header\";s:5:\"title\";s:20:\"Tools for your store\";s:13:\"allow-dismiss\";b:0;}i:12;a:6:{s:4:\"slug\";s:30:\"orders-empty-footer-browse-all\";s:7:\"context\";s:24:\"orders-list-empty-footer\";s:9:\"link-text\";s:21:\"Browse all extensions\";s:3:\"url\";s:64:\"https://woocommerce.com/product-category/woocommerce-extensions/\";s:8:\"promoted\";s:31:\"category-woocommerce-extensions\";s:13:\"allow-dismiss\";b:0;}i:13;a:8:{s:4:\"slug\";s:19:\"orders-empty-zapier\";s:7:\"context\";s:22:\"orders-list-empty-body\";s:7:\"product\";s:18:\"woocommerce-zapier\";s:4:\"icon\";s:98:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/zapier.svg\";s:5:\"title\";s:6:\"Zapier\";s:4:\"copy\";s:88:\"Save time and increase productivity by connecting your store to more than 1000+ services\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:52:\"https://woocommerce.com/products/woocommerce-zapier/\";}i:14;a:8:{s:4:\"slug\";s:30:\"orders-empty-shipment-tracking\";s:7:\"context\";s:22:\"orders-list-empty-body\";s:7:\"product\";s:29:\"woocommerce-shipment-tracking\";s:4:\"icon\";s:109:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/shipment-tracking.svg\";s:5:\"title\";s:17:\"Shipment Tracking\";s:4:\"copy\";s:86:\"Let customers know when their orders will arrive by adding shipment tracking to emails\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:51:\"https://woocommerce.com/products/shipment-tracking/\";}i:15;a:8:{s:4:\"slug\";s:32:\"orders-empty-table-rate-shipping\";s:7:\"context\";s:22:\"orders-list-empty-body\";s:7:\"product\";s:31:\"woocommerce-table-rate-shipping\";s:4:\"icon\";s:111:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/table-rate-shipping.svg\";s:5:\"title\";s:19:\"Table Rate Shipping\";s:4:\"copy\";s:122:\"Advanced, flexible shipping. Define multiple shipping rates based on location, price, weight, shipping class or item count\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:53:\"https://woocommerce.com/products/table-rate-shipping/\";}i:16;a:8:{s:4:\"slug\";s:40:\"orders-empty-shipping-carrier-extensions\";s:7:\"context\";s:22:\"orders-list-empty-body\";s:4:\"icon\";s:119:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/shipping-carrier-extensions.svg\";s:5:\"title\";s:27:\"Shipping Carrier Extensions\";s:4:\"copy\";s:116:\"Show live rates from FedEx, UPS, USPS and more directly on your store - never under or overcharge for shipping again\";s:11:\"button-text\";s:13:\"Find Carriers\";s:8:\"promoted\";s:26:\"category-shipping-carriers\";s:3:\"url\";s:99:\"https://woocommerce.com/product-category/woocommerce-extensions/shipping-methods/shipping-carriers/\";}i:17;a:8:{s:4:\"slug\";s:32:\"orders-empty-google-product-feed\";s:7:\"context\";s:22:\"orders-list-empty-body\";s:7:\"product\";s:25:\"woocommerce-product-feeds\";s:4:\"icon\";s:111:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/google-product-feed.svg\";s:5:\"title\";s:19:\"Google Product Feed\";s:4:\"copy\";s:76:\"Increase sales by letting customers find you when they\'re shopping on Google\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:53:\"https://woocommerce.com/products/google-product-feed/\";}i:18;a:4:{s:4:\"slug\";s:35:\"products-empty-header-product-types\";s:7:\"context\";s:26:\"products-list-empty-header\";s:5:\"title\";s:23:\"Other types of products\";s:13:\"allow-dismiss\";b:0;}i:19;a:6:{s:4:\"slug\";s:32:\"products-empty-footer-browse-all\";s:7:\"context\";s:26:\"products-list-empty-footer\";s:9:\"link-text\";s:21:\"Browse all extensions\";s:3:\"url\";s:64:\"https://woocommerce.com/product-category/woocommerce-extensions/\";s:8:\"promoted\";s:31:\"category-woocommerce-extensions\";s:13:\"allow-dismiss\";b:0;}i:20;a:8:{s:4:\"slug\";s:30:\"products-empty-product-vendors\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:27:\"woocommerce-product-vendors\";s:4:\"icon\";s:107:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/product-vendors.svg\";s:5:\"title\";s:15:\"Product Vendors\";s:4:\"copy\";s:47:\"Turn your store into a multi-vendor marketplace\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:49:\"https://woocommerce.com/products/product-vendors/\";}i:21;a:8:{s:4:\"slug\";s:26:\"products-empty-memberships\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:23:\"woocommerce-memberships\";s:4:\"icon\";s:103:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/memberships.svg\";s:5:\"title\";s:11:\"Memberships\";s:4:\"copy\";s:76:\"Give members access to restricted content or products, for a fee or for free\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:57:\"https://woocommerce.com/products/woocommerce-memberships/\";}i:22;a:9:{s:4:\"slug\";s:35:\"products-empty-woocommerce-deposits\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:20:\"woocommerce-deposits\";s:14:\"show-if-active\";a:1:{i:0;s:20:\"woocommerce-bookings\";}s:4:\"icon\";s:100:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/deposits.svg\";s:5:\"title\";s:8:\"Deposits\";s:4:\"copy\";s:75:\"Make it easier for customers to pay by offering a deposit or a payment plan\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:54:\"https://woocommerce.com/products/woocommerce-deposits/\";}i:23;a:8:{s:4:\"slug\";s:40:\"products-empty-woocommerce-subscriptions\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:25:\"woocommerce-subscriptions\";s:4:\"icon\";s:105:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/subscriptions.svg\";s:5:\"title\";s:13:\"Subscriptions\";s:4:\"copy\";s:97:\"Let customers subscribe to your products or services and pay on a weekly, monthly or annual basis\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:59:\"https://woocommerce.com/products/woocommerce-subscriptions/\";}i:24;a:8:{s:4:\"slug\";s:35:\"products-empty-woocommerce-bookings\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:20:\"woocommerce-bookings\";s:4:\"icon\";s:100:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/bookings.svg\";s:5:\"title\";s:8:\"Bookings\";s:4:\"copy\";s:99:\"Allow customers to book appointments, make reservations or rent equipment without leaving your site\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:54:\"https://woocommerce.com/products/woocommerce-bookings/\";}i:25;a:8:{s:4:\"slug\";s:30:\"products-empty-product-bundles\";s:7:\"context\";s:24:\"products-list-empty-body\";s:7:\"product\";s:27:\"woocommerce-product-bundles\";s:4:\"icon\";s:107:\"https://woocommerce.com/wp-content/plugins/wccom-plugins//marketplace-suggestions/icons/product-bundles.svg\";s:5:\"title\";s:15:\"Product Bundles\";s:4:\"copy\";s:49:\"Offer customizable bundles and assembled products\";s:11:\"button-text\";s:10:\"Learn More\";s:3:\"url\";s:49:\"https://woocommerce.com/products/product-bundles/\";}}s:7:\"updated\";i:1573128485;}', 'no'),
(317, '_transient_timeout_acf_plugin_updates', '1573301300', 'no'),
(318, '_transient_acf_plugin_updates', 'a:4:{s:7:\"plugins\";a:0:{}s:10:\"expiration\";i:172800;s:6:\"status\";i:1;s:7:\"checked\";a:1:{s:34:\"advanced-custom-fields-pro/acf.php\";s:5:\"5.8.6\";}}', 'no'),
(321, 'wc_admin_install_timestamp', '1573128574', 'yes'),
(324, 'wc_admin_last_orders_milestone', '0', 'yes'),
(332, '_transient_woocommerce_reports-transient-version', '1573128526', 'yes'),
(333, '_transient_timeout_wc_report_orders_stats_97e8fdc1943e8ea005ce33d9c749fd50', '1573733326', 'no'),
(334, '_transient_wc_report_orders_stats_97e8fdc1943e8ea005ce33d9c749fd50', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2019-45\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 17:38:00\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 17:38:00\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2019-44\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(335, '_transient_timeout_wc_report_orders_stats_0e4e3680b21a552b9271b5e4041bce2f', '1573733326', 'no'),
(336, '_transient_wc_report_orders_stats_0e4e3680b21a552b9271b5e4041bce2f', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2019-45\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 17:38:00\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 17:38:00\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2019-44\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(337, '_transient_timeout_wc_report_orders_stats_8ef39df0b5b0ebbbd6179a066600d69c', '1573733327', 'no'),
(338, '_transient_wc_report_orders_stats_8ef39df0b5b0ebbbd6179a066600d69c', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2019-11-01\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2019-11-02\";s:10:\"date_start\";s:19:\"2019-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2019-11-03\";s:10:\"date_start\";s:19:\"2019-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2019-11-04\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2019-11-05\";s:10:\"date_start\";s:19:\"2019-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2019-11-06\";s:10:\"date_start\";s:19:\"2019-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2019-11-07\";s:10:\"date_start\";s:19:\"2019-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(339, '_transient_timeout_wc_report_orders_stats_898280680d5d58d7b073f75ef4af520b', '1573733327', 'no'),
(340, '_transient_timeout_wc_report_orders_stats_e3b25cbda7b93fb2519ca3ca6c9f6ec5', '1573733327', 'no'),
(341, '_transient_wc_report_orders_stats_898280680d5d58d7b073f75ef4af520b', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2018-45\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2018-44\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(342, '_transient_timeout_wc_report_orders_stats_3da1ed01768a401d0d7ba7255ace215c', '1573733327', 'no'),
(343, '_transient_timeout_wc_report_orders_stats_451292db07e0b2cb54d076019045eca6', '1573733327', 'no'),
(344, '_transient_wc_report_orders_stats_e3b25cbda7b93fb2519ca3ca6c9f6ec5', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2018-11-01\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2018-11-02\";s:10:\"date_start\";s:19:\"2018-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2018-11-03\";s:10:\"date_start\";s:19:\"2018-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2018-11-04\";s:10:\"date_start\";s:19:\"2018-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2018-11-05\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2018-11-06\";s:10:\"date_start\";s:19:\"2018-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2018-11-07\";s:10:\"date_start\";s:19:\"2018-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(345, '_transient_timeout_wc_report_orders_stats_9d1152413a487e80908bb2ceb7416f0b', '1573733327', 'no'),
(346, '_transient_wc_report_orders_stats_451292db07e0b2cb54d076019045eca6', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2018-11-01\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2018-11-02\";s:10:\"date_start\";s:19:\"2018-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2018-11-03\";s:10:\"date_start\";s:19:\"2018-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2018-11-04\";s:10:\"date_start\";s:19:\"2018-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2018-11-05\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2018-11-06\";s:10:\"date_start\";s:19:\"2018-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2018-11-07\";s:10:\"date_start\";s:19:\"2018-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(347, '_transient_wc_report_orders_stats_3da1ed01768a401d0d7ba7255ace215c', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2019-11-01\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2019-11-02\";s:10:\"date_start\";s:19:\"2019-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2019-11-03\";s:10:\"date_start\";s:19:\"2019-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2019-11-04\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2019-11-05\";s:10:\"date_start\";s:19:\"2019-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2019-11-06\";s:10:\"date_start\";s:19:\"2019-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2019-11-07\";s:10:\"date_start\";s:19:\"2019-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(348, '_transient_wc_report_orders_stats_9d1152413a487e80908bb2ceb7416f0b', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2018-45\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2018-44\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(349, '_transient_timeout_wc_report_coupons_stats_3b1c4cb7421e11583294609adb199759', '1573733328', 'no'),
(350, '_transient_timeout_wc_report_coupons_stats_6b8cec581b64331c7aef4a7f8a28fd2d', '1573733328', 'no'),
(351, '_transient_wc_report_coupons_stats_3b1c4cb7421e11583294609adb199759', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2019-11-01\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2019-11-02\";s:10:\"date_start\";s:19:\"2019-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2019-11-03\";s:10:\"date_start\";s:19:\"2019-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2019-11-04\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2019-11-05\";s:10:\"date_start\";s:19:\"2019-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2019-11-06\";s:10:\"date_start\";s:19:\"2019-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2019-11-07\";s:10:\"date_start\";s:19:\"2019-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(352, '_transient_wc_report_coupons_stats_6b8cec581b64331c7aef4a7f8a28fd2d', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2018-11-01\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2018-11-02\";s:10:\"date_start\";s:19:\"2018-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2018-11-03\";s:10:\"date_start\";s:19:\"2018-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2018-11-04\";s:10:\"date_start\";s:19:\"2018-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2018-11-05\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2018-11-06\";s:10:\"date_start\";s:19:\"2018-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2018-11-07\";s:10:\"date_start\";s:19:\"2018-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":4:{s:6:\"amount\";d:0;s:13:\"coupons_count\";i:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(353, '_transient_timeout_wc_report_taxes_stats_9fab8c8d9a7524f74dc46d9bf7ef41e9', '1573733328', 'no'),
(354, '_transient_timeout_wc_report_taxes_stats_e263d9ebeb68b42556df6530c87ea94e', '1573733328', 'no'),
(355, '_transient_wc_report_taxes_stats_e263d9ebeb68b42556df6530c87ea94e', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2018-11-01\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2018-11-02\";s:10:\"date_start\";s:19:\"2018-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2018-11-03\";s:10:\"date_start\";s:19:\"2018-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2018-11-04\";s:10:\"date_start\";s:19:\"2018-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2018-11-05\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2018-11-06\";s:10:\"date_start\";s:19:\"2018-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2018-11-07\";s:10:\"date_start\";s:19:\"2018-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no');
INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(356, '_transient_wc_report_taxes_stats_9fab8c8d9a7524f74dc46d9bf7ef41e9', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2019-11-01\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:10:\"2019-11-02\";s:10:\"date_start\";s:19:\"2019-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:2;a:6:{s:8:\"interval\";s:10:\"2019-11-03\";s:10:\"date_start\";s:19:\"2019-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:3;a:6:{s:8:\"interval\";s:10:\"2019-11-04\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:4;a:6:{s:8:\"interval\";s:10:\"2019-11-05\";s:10:\"date_start\";s:19:\"2019-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:5;a:6:{s:8:\"interval\";s:10:\"2019-11-06\";s:10:\"date_start\";s:19:\"2019-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}i:6;a:6:{s:8:\"interval\";s:10:\"2019-11-07\";s:10:\"date_start\";s:19:\"2019-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":6:{s:9:\"tax_codes\";i:0;s:9:\"total_tax\";d:0;s:9:\"order_tax\";d:0;s:12:\"shipping_tax\";d:0;s:12:\"orders_count\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(357, '_transient_timeout_wc_report_downloads_stats_ef49bf474565632ff24214744c0cd2e3', '1573733328', 'no'),
(358, '_transient_wc_report_downloads_stats_ef49bf474565632ff24214744c0cd2e3', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2019-11-01\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:1;a:6:{s:8:\"interval\";s:10:\"2019-11-02\";s:10:\"date_start\";s:19:\"2019-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:2;a:6:{s:8:\"interval\";s:10:\"2019-11-03\";s:10:\"date_start\";s:19:\"2019-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:3;a:6:{s:8:\"interval\";s:10:\"2019-11-04\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:4;a:6:{s:8:\"interval\";s:10:\"2019-11-05\";s:10:\"date_start\";s:19:\"2019-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:5;a:6:{s:8:\"interval\";s:10:\"2019-11-06\";s:10:\"date_start\";s:19:\"2019-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:6;a:6:{s:8:\"interval\";s:10:\"2019-11-07\";s:10:\"date_start\";s:19:\"2019-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(359, '_transient_timeout_wc_report_downloads_stats_5f5e77881058bed33579322b212042da', '1573733328', 'no'),
(360, '_transient_wc_report_downloads_stats_5f5e77881058bed33579322b212042da', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}s:9:\"intervals\";a:7:{i:0;a:6:{s:8:\"interval\";s:10:\"2018-11-01\";s:10:\"date_start\";s:19:\"2018-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-01 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-01 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:1;a:6:{s:8:\"interval\";s:10:\"2018-11-02\";s:10:\"date_start\";s:19:\"2018-11-02 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-02 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-02 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-02 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:2;a:6:{s:8:\"interval\";s:10:\"2018-11-03\";s:10:\"date_start\";s:19:\"2018-11-03 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-03 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:3;a:6:{s:8:\"interval\";s:10:\"2018-11-04\";s:10:\"date_start\";s:19:\"2018-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-04 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-04 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:4;a:6:{s:8:\"interval\";s:10:\"2018-11-05\";s:10:\"date_start\";s:19:\"2018-11-05 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-05 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-05 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-05 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:5;a:6:{s:8:\"interval\";s:10:\"2018-11-06\";s:10:\"date_start\";s:19:\"2018-11-06 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-06 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-06 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-06 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}i:6;a:6:{s:8:\"interval\";s:10:\"2018-11-07\";s:10:\"date_start\";s:19:\"2018-11-07 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2018-11-07 00:00:00\";s:8:\"date_end\";s:19:\"2018-11-07 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2018-11-07 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":1:{s:14:\"download_count\";i:0;}}}s:5:\"total\";i:7;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(362, '_transient_timeout_wc_report_orders_stats_e5f4a0fd8043cb576286ef6803a5eb5b', '1573733363', 'no'),
(363, '_transient_wc_report_orders_stats_e5f4a0fd8043cb576286ef6803a5eb5b', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2019-45\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 17:39:00\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 17:39:00\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2019-44\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:12:\"orders_count\";i:0;s:14:\"num_items_sold\";i:0;s:13:\"gross_revenue\";d:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:7:\"refunds\";d:0;s:5:\"taxes\";d:0;s:8:\"shipping\";d:0;s:11:\"net_revenue\";d:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(364, '_transient_timeout_wc_report_orders_stats_265a1b4b58b82471370e5ff9617fe834', '1573733363', 'no'),
(365, '_transient_wc_report_orders_stats_265a1b4b58b82471370e5ff9617fe834', 'a:2:{s:7:\"version\";s:10:\"1573128526\";s:5:\"value\";O:8:\"stdClass\":5:{s:6:\"totals\";O:8:\"stdClass\":11:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"products\";i:0;s:8:\"segments\";a:0:{}}s:9:\"intervals\";a:2:{i:0;a:6:{s:8:\"interval\";s:7:\"2019-45\";s:10:\"date_start\";s:19:\"2019-11-04 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-04 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-07 17:39:00\";s:12:\"date_end_gmt\";s:19:\"2019-11-07 17:39:00\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}i:1;a:6:{s:8:\"interval\";s:7:\"2019-44\";s:10:\"date_start\";s:19:\"2019-11-01 00:00:00\";s:14:\"date_start_gmt\";s:19:\"2019-11-01 00:00:00\";s:8:\"date_end\";s:19:\"2019-11-03 23:59:59\";s:12:\"date_end_gmt\";s:19:\"2019-11-03 23:59:59\";s:9:\"subtotals\";O:8:\"stdClass\":10:{s:11:\"net_revenue\";d:0;s:15:\"avg_order_value\";d:0;s:12:\"orders_count\";i:0;s:19:\"avg_items_per_order\";d:0;s:14:\"num_items_sold\";i:0;s:7:\"coupons\";d:0;s:13:\"coupons_count\";i:0;s:23:\"num_returning_customers\";i:0;s:17:\"num_new_customers\";i:0;s:8:\"segments\";a:0:{}}}}s:5:\"total\";i:2;s:5:\"pages\";i:1;s:7:\"page_no\";i:1;}}', 'no'),
(367, '_transient_wc_count_comments', 'O:8:\"stdClass\":7:{s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:8:\"approved\";s:1:\"1\";s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(368, '_transient_as_comment_count', 'O:8:\"stdClass\":7:{s:8:\"approved\";s:1:\"1\";s:14:\"total_comments\";i:1;s:3:\"all\";i:1;s:9:\"moderated\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}', 'yes'),
(371, 'wc_admin_version', '0.21.0', 'yes'),
(375, '_transient_wc_attribute_taxonomies', 'a:0:{}', 'yes'),
(378, 'woocommerce_version', '3.8.0', 'yes'),
(379, 'woocommerce_db_version', '3.8.0', 'yes'),
(385, 'woocommerce_product_type', 'both', 'yes'),
(386, 'woocommerce_sell_in_person', '1', 'yes'),
(392, 'woocommerce_stripe_settings', 'a:3:{s:7:\"enabled\";s:3:\"yes\";s:14:\"create_account\";s:3:\"yes\";s:5:\"email\";s:24:\"utsab@synergicsoftek.com\";}', 'yes'),
(394, 'woocommerce_square_settings', 'a:1:{s:7:\"enabled\";s:3:\"yes\";}', 'yes'),
(395, 'woocommerce_ppec_paypal_settings', 'a:2:{s:16:\"reroute_requests\";b:0;s:5:\"email\";b:0;}', 'yes'),
(396, 'woocommerce_cheque_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(397, 'woocommerce_bacs_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(398, 'woocommerce_cod_settings', 'a:1:{s:7:\"enabled\";s:2:\"no\";}', 'yes'),
(401, 'jetpack_activated', '1', 'yes'),
(404, 'jetpack_activation_source', 'a:2:{i:0;s:7:\"unknown\";i:1;N;}', 'yes'),
(405, 'jetpack_options', 'a:4:{s:7:\"version\";s:14:\"7.9:1573129254\";s:11:\"old_version\";s:14:\"7.9:1573129254\";s:28:\"fallback_no_verify_ssl_certs\";i:0;s:9:\"time_diff\";i:-1;}', 'yes'),
(406, 'jetpack_sync_settings_disable', '0', 'yes'),
(408, 'jetpack_testimonial', '0', 'yes'),
(409, 'wc_square_is_active', 'yes', 'yes'),
(410, 'wc_square_lifecycle_events', '[{\"name\":\"install\",\"time\":1573129283,\"version\":\"2.0.6\"}]', 'no'),
(411, 'wc_square_version', '2.0.6', 'yes'),
(415, 'do_activate', '0', 'yes'),
(418, '_transient_timeout_jetpack_https_test_message', '1573305945', 'no'),
(419, '_transient_jetpack_https_test_message', '', 'no'),
(420, 'wc_stripe_show_style_notice', 'no', 'yes'),
(421, 'wc_stripe_show_sca_notice', 'no', 'yes'),
(422, 'wc_stripe_version', '4.3.0', 'yes'),
(425, 'woocommerce_shipstation_auth_key', 'WCSS-8940c1980a00108d65e370b103a4a4bf', 'yes'),
(431, 'jetpack_tos_agreed', '1', 'yes'),
(432, 'jetpack_secrets', 'a:1:{s:18:\"jetpack_register_1\";a:3:{s:8:\"secret_1\";s:32:\"hFAI2VPRgY7WjMryOS7Q1F7okaH1f5CH\";s:8:\"secret_2\";s:32:\"sRKp1wK5pcfN5QeJ8H2L2CdeZBzWVO0n\";s:3:\"exp\";i:1573130031;}}', 'no'),
(433, '_transient_jetpack_assumed_site_creation_date', '2019-11-07 10:48:09', 'yes'),
(434, 'wc_connect_options', 'a:1:{s:12:\"tos_accepted\";b:1;}', 'yes'),
(437, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1573219543;s:7:\"checked\";a:9:{s:34:\"advanced-custom-fields-pro/acf.php\";s:5:\"5.8.6\";s:19:\"akismet/akismet.php\";s:5:\"4.1.2\";s:9:\"hello.php\";s:5:\"1.7.2\";s:19:\"jetpack/jetpack.php\";s:3:\"7.9\";s:27:\"woocommerce/woocommerce.php\";s:5:\"3.8.0\";s:63:\"woocommerce-shipstation-integration/woocommerce-shipstation.php\";s:6:\"4.1.30\";s:45:\"woocommerce-services/woocommerce-services.php\";s:6:\"1.21.1\";s:41:\"woocommerce-square/woocommerce-square.php\";s:5:\"2.0.6\";s:57:\"woocommerce-gateway-stripe/woocommerce-gateway-stripe.php\";s:5:\"4.3.0\";}s:8:\"response\";a:1:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.1.3\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.1.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}s:6:\"tested\";s:5:\"5.2.4\";s:12:\"requires_php\";b:0;s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:7:{s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}}s:19:\"jetpack/jetpack.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/jetpack\";s:4:\"slug\";s:7:\"jetpack\";s:6:\"plugin\";s:19:\"jetpack/jetpack.php\";s:11:\"new_version\";s:3:\"7.9\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/jetpack/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/jetpack.7.9.zip\";s:5:\"icons\";a:3:{s:2:\"2x\";s:60:\"https://ps.w.org/jetpack/assets/icon-256x256.png?rev=1791404\";s:2:\"1x\";s:52:\"https://ps.w.org/jetpack/assets/icon.svg?rev=1791404\";s:3:\"svg\";s:52:\"https://ps.w.org/jetpack/assets/icon.svg?rev=1791404\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/jetpack/assets/banner-1544x500.png?rev=1791404\";s:2:\"1x\";s:62:\"https://ps.w.org/jetpack/assets/banner-772x250.png?rev=1791404\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"woocommerce/woocommerce.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/woocommerce\";s:4:\"slug\";s:11:\"woocommerce\";s:6:\"plugin\";s:27:\"woocommerce/woocommerce.php\";s:11:\"new_version\";s:5:\"3.8.0\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/woocommerce/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/woocommerce.3.8.0.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=2075035\";s:2:\"1x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-128x128.png?rev=2075035\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=2075035\";s:2:\"1x\";s:66:\"https://ps.w.org/woocommerce/assets/banner-772x250.png?rev=2075035\";}s:11:\"banners_rtl\";a:0:{}}s:63:\"woocommerce-shipstation-integration/woocommerce-shipstation.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:49:\"w.org/plugins/woocommerce-shipstation-integration\";s:4:\"slug\";s:35:\"woocommerce-shipstation-integration\";s:6:\"plugin\";s:63:\"woocommerce-shipstation-integration/woocommerce-shipstation.php\";s:11:\"new_version\";s:6:\"4.1.30\";s:3:\"url\";s:66:\"https://wordpress.org/plugins/woocommerce-shipstation-integration/\";s:7:\"package\";s:85:\"https://downloads.wordpress.org/plugin/woocommerce-shipstation-integration.4.1.30.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:88:\"https://ps.w.org/woocommerce-shipstation-integration/assets/icon-256x256.png?rev=1944808\";s:2:\"1x\";s:88:\"https://ps.w.org/woocommerce-shipstation-integration/assets/icon-128x128.png?rev=1944808\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:91:\"https://ps.w.org/woocommerce-shipstation-integration/assets/banner-1544x500.png?rev=1944808\";s:2:\"1x\";s:90:\"https://ps.w.org/woocommerce-shipstation-integration/assets/banner-772x250.png?rev=1944808\";}s:11:\"banners_rtl\";a:0:{}}s:45:\"woocommerce-services/woocommerce-services.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:34:\"w.org/plugins/woocommerce-services\";s:4:\"slug\";s:20:\"woocommerce-services\";s:6:\"plugin\";s:45:\"woocommerce-services/woocommerce-services.php\";s:11:\"new_version\";s:6:\"1.21.1\";s:3:\"url\";s:51:\"https://wordpress.org/plugins/woocommerce-services/\";s:7:\"package\";s:70:\"https://downloads.wordpress.org/plugin/woocommerce-services.1.21.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:73:\"https://ps.w.org/woocommerce-services/assets/icon-256x256.png?rev=1910075\";s:2:\"1x\";s:73:\"https://ps.w.org/woocommerce-services/assets/icon-128x128.png?rev=1910075\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:76:\"https://ps.w.org/woocommerce-services/assets/banner-1544x500.png?rev=1962920\";s:2:\"1x\";s:75:\"https://ps.w.org/woocommerce-services/assets/banner-772x250.png?rev=1962920\";}s:11:\"banners_rtl\";a:0:{}}s:41:\"woocommerce-square/woocommerce-square.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:32:\"w.org/plugins/woocommerce-square\";s:4:\"slug\";s:18:\"woocommerce-square\";s:6:\"plugin\";s:41:\"woocommerce-square/woocommerce-square.php\";s:11:\"new_version\";s:5:\"2.0.6\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/woocommerce-square/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/woocommerce-square.2.0.6.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:71:\"https://ps.w.org/woocommerce-square/assets/icon-256x256.png?rev=1909974\";s:2:\"1x\";s:71:\"https://ps.w.org/woocommerce-square/assets/icon-128x128.png?rev=1909974\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:74:\"https://ps.w.org/woocommerce-square/assets/banner-1544x500.png?rev=1909974\";s:2:\"1x\";s:73:\"https://ps.w.org/woocommerce-square/assets/banner-772x250.png?rev=1909974\";}s:11:\"banners_rtl\";a:0:{}}s:57:\"woocommerce-gateway-stripe/woocommerce-gateway-stripe.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:40:\"w.org/plugins/woocommerce-gateway-stripe\";s:4:\"slug\";s:26:\"woocommerce-gateway-stripe\";s:6:\"plugin\";s:57:\"woocommerce-gateway-stripe/woocommerce-gateway-stripe.php\";s:11:\"new_version\";s:5:\"4.3.0\";s:3:\"url\";s:57:\"https://wordpress.org/plugins/woocommerce-gateway-stripe/\";s:7:\"package\";s:75:\"https://downloads.wordpress.org/plugin/woocommerce-gateway-stripe.4.3.0.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:79:\"https://ps.w.org/woocommerce-gateway-stripe/assets/icon-256x256.png?rev=1917495\";s:2:\"1x\";s:79:\"https://ps.w.org/woocommerce-gateway-stripe/assets/icon-128x128.png?rev=1917495\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:82:\"https://ps.w.org/woocommerce-gateway-stripe/assets/banner-1544x500.png?rev=1917495\";s:2:\"1x\";s:81:\"https://ps.w.org/woocommerce-gateway-stripe/assets/banner-772x250.png?rev=1917495\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(438, '_transient_shipping-transient-version', '1573129447', 'yes'),
(439, '_transient_timeout_wc_shipping_method_count', '1575721447', 'no'),
(440, '_transient_wc_shipping_method_count', 'a:2:{s:7:\"version\";s:10:\"1573129447\";s:5:\"value\";i:0;}', 'no'),
(441, '_transient_timeout_wc_low_stock_count', '1575721447', 'no'),
(442, '_transient_wc_low_stock_count', '0', 'no'),
(443, '_transient_timeout_wc_outofstock_count', '1575721447', 'no'),
(444, '_transient_wc_outofstock_count', '0', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 2, '_edit_last', '1'),
(4, 2, '_edit_lock', '1573125305:1'),
(5, 6, '_edit_last', '1'),
(6, 6, '_edit_lock', '1573128945:1'),
(7, 9, '_wp_attached_file', 'woocommerce-placeholder.png'),
(8, 9, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1200;s:6:\"height\";i:1200;s:4:\"file\";s:27:\"woocommerce-placeholder.png\";s:5:\"sizes\";a:6:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-300x300.png\";s:5:\"width\";i:300;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-768x768.png\";s:5:\"width\";i:768;s:6:\"height\";i:768;s:9:\"mime-type\";s:9:\"image/png\";}s:5:\"large\";a:4:{s:4:\"file\";s:37:\"woocommerce-placeholder-1024x1024.png\";s:5:\"width\";i:1024;s:6:\"height\";i:1024;s:9:\"mime-type\";s:9:\"image/png\";}s:30:\"twentyseventeen-featured-image\";a:4:{s:4:\"file\";s:37:\"woocommerce-placeholder-1200x1200.png\";s:5:\"width\";i:1200;s:6:\"height\";i:1200;s:9:\"mime-type\";s:9:\"image/png\";}s:32:\"twentyseventeen-thumbnail-avatar\";a:4:{s:4:\"file\";s:35:\"woocommerce-placeholder-100x100.png\";s:5:\"width\";i:100;s:6:\"height\";i:100;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(9, 10, '_action_manager_schedule', 'O:30:\"ActionScheduler_SimpleSchedule\":1:{s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1573128483;}'),
(10, 11, '_action_manager_schedule', 'O:30:\"ActionScheduler_SimpleSchedule\":1:{s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1573128511;}'),
(11, 12, '_action_manager_schedule', 'O:30:\"ActionScheduler_SimpleSchedule\":1:{s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1573128512;}'),
(12, 13, '_action_manager_schedule', 'O:32:\"ActionScheduler_IntervalSchedule\":2:{s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1573128512;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:3600;}'),
(13, 14, '_action_manager_schedule', 'O:32:\"ActionScheduler_IntervalSchedule\":2:{s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1573132165;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:3600;}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2019-11-07 10:48:10', '2019-11-07 10:48:10', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2019-11-07 10:48:10', '2019-11-07 10:48:10', '', 0, 'http://localhost/Affiliate/?p=1', 0, 'post', '', 1),
(2, 1, '2019-11-07 10:48:10', '2019-11-07 10:48:10', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/Affiliate/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2019-11-07 11:15:05', '2019-11-07 11:15:05', '', 0, 'http://localhost/Affiliate/?page_id=2', 0, 'page', '', 0),
(3, 1, '2019-11-07 10:48:10', '2019-11-07 10:48:10', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://localhost/Affiliate.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2019-11-07 10:48:10', '2019-11-07 10:48:10', '', 0, 'http://localhost/Affiliate/?page_id=3', 0, 'page', '', 0),
(4, 1, '2019-11-07 10:48:20', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2019-11-07 10:48:20', '0000-00-00 00:00:00', '', 0, 'http://localhost/Affiliate/?p=4', 0, 'post', '', 0),
(5, 1, '2019-11-07 11:14:58', '2019-11-07 11:14:58', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/Affiliate/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Home', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2019-11-07 11:14:58', '2019-11-07 11:14:58', '', 2, 'http://localhost/Affiliate/2019/11/07/2-revision-v1/', 0, 'revision', '', 0),
(6, 1, '2019-11-07 11:24:44', '2019-11-07 11:24:44', 'a:7:{s:8:\"location\";a:1:{i:0;a:1:{i:0;a:3:{s:5:\"param\";s:9:\"post_type\";s:8:\"operator\";s:2:\"==\";s:5:\"value\";s:4:\"post\";}}}s:8:\"position\";s:6:\"normal\";s:5:\"style\";s:7:\"default\";s:15:\"label_placement\";s:3:\"top\";s:21:\"instruction_placement\";s:5:\"label\";s:14:\"hide_on_screen\";s:0:\"\";s:11:\"description\";s:0:\"\";}', 'test', 'test', 'publish', 'closed', 'closed', '', 'group_5dc3fef180581', '', '', '2019-11-07 11:24:44', '2019-11-07 11:24:44', '', 0, 'http://localhost/Affiliate/?post_type=acf-field-group&#038;p=6', 0, 'acf-field-group', '', 0),
(7, 1, '2019-11-07 11:24:43', '2019-11-07 11:24:43', 'a:10:{s:4:\"type\";s:4:\"text\";s:12:\"instructions\";s:0:\"\";s:8:\"required\";i:0;s:17:\"conditional_logic\";i:0;s:7:\"wrapper\";a:3:{s:5:\"width\";s:0:\"\";s:5:\"class\";s:0:\"\";s:2:\"id\";s:0:\"\";}s:13:\"default_value\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:7:\"prepend\";s:0:\"\";s:6:\"append\";s:0:\"\";s:9:\"maxlength\";s:0:\"\";}', 'repet', '', 'publish', 'closed', 'closed', '', 'field_5dc3fef6df002', '', '', '2019-11-07 11:24:43', '2019-11-07 11:24:43', '', 6, 'http://localhost/Affiliate/?post_type=acf-field&p=7', 0, 'acf-field', '', 0),
(8, 1, '2019-11-07 11:39:40', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2019-11-07 11:39:40', '0000-00-00 00:00:00', '', 0, 'http://localhost/Affiliate/?post_type=acf-field-group&p=8', 0, 'acf-field-group', '', 0),
(9, 1, '2019-11-07 12:03:01', '2019-11-07 12:03:01', '', 'woocommerce-placeholder', '', 'inherit', 'open', 'closed', '', 'woocommerce-placeholder', '', '', '2019-11-07 12:03:01', '2019-11-07 12:03:01', '', 0, 'http://localhost/Affiliate/wp-content/uploads/2019/11/woocommerce-placeholder.png', 0, 'attachment', 'image/png', 0),
(10, 0, '2019-11-07 12:08:03', '2019-11-07 12:08:03', '[]', 'woocommerce_update_marketplace_suggestions', '', 'publish', 'open', 'closed', '', 'scheduled-action-5dc409265f84f6.61132237-3USenWyKUJefkAOFjbyQ31NFfiYKNrYU', '', '', '2019-11-07 12:08:06', '2019-11-07 12:08:06', '', 0, 'http://localhost/Affiliate/?post_type=scheduled-action&#038;p=10', 0, 'scheduled-action', '', 3),
(11, 0, '2019-11-07 12:08:31', '2019-11-07 12:08:31', '[\"wc_admin_update_0201_order_status_index\"]', 'woocommerce_run_update_callback', '', 'publish', 'open', 'closed', '', 'scheduled-action-5dc4097419a081.20813732-2b2TcbQaV2Lf642PHxY2dsqw48w4UOyO', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', '', 0, 'http://localhost/Affiliate/?post_type=scheduled-action&#038;p=11', 0, 'scheduled-action', '', 3),
(12, 0, '2019-11-07 12:08:32', '2019-11-07 12:08:32', '[\"wc_admin_update_0201_db_version\"]', 'woocommerce_run_update_callback', '', 'publish', 'open', 'closed', '', 'scheduled-action-5dc40974c15815.14090030-KpCuZe1Wc7iBJPCjBlSObhUHiKppwvZ0', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', '', 0, 'http://localhost/Affiliate/?post_type=scheduled-action&#038;p=12', 0, 'scheduled-action', '', 3),
(13, 0, '2019-11-07 12:08:32', '2019-11-07 12:08:32', '[]', 'wc_admin_unsnooze_admin_notes', '', 'publish', 'open', 'closed', '', 'scheduled-action-5dc40974f03131.48269364-dH2krYHLOsdP3MO19t4SL0y1kx0Ph1mI', '', '', '2019-11-07 12:09:24', '2019-11-07 12:09:24', '', 0, 'http://localhost/Affiliate/?post_type=scheduled-action&#038;p=13', 0, 'scheduled-action', '', 3),
(14, 0, '2019-11-07 13:09:25', '2019-11-07 13:09:25', '[]', 'wc_admin_unsnooze_admin_notes', '', 'trash', 'open', 'closed', '', '', '', '', '2019-11-07 13:09:25', '2019-11-07 13:09:25', '', 0, 'http://localhost/Affiliate/?post_type=scheduled-action&p=14', 0, 'scheduled-action', '', 1),
(15, 1, '2019-11-07 12:20:14', '2019-11-07 12:20:14', '', 'Shop', '', 'publish', 'closed', 'closed', '', 'shop', '', '', '2019-11-07 12:20:14', '2019-11-07 12:20:14', '', 0, 'http://localhost/Affiliate/shop/', 0, 'page', '', 0),
(16, 1, '2019-11-07 12:20:14', '2019-11-07 12:20:14', '<!-- wp:shortcode -->[woocommerce_cart]<!-- /wp:shortcode -->', 'Cart', '', 'publish', 'closed', 'closed', '', 'cart', '', '', '2019-11-07 12:20:14', '2019-11-07 12:20:14', '', 0, 'http://localhost/Affiliate/cart/', 0, 'page', '', 0),
(17, 1, '2019-11-07 12:20:14', '2019-11-07 12:20:14', '<!-- wp:shortcode -->[woocommerce_checkout]<!-- /wp:shortcode -->', 'Checkout', '', 'publish', 'closed', 'closed', '', 'checkout', '', '', '2019-11-07 12:20:14', '2019-11-07 12:20:14', '', 0, 'http://localhost/Affiliate/checkout/', 0, 'page', '', 0),
(18, 1, '2019-11-07 12:20:14', '2019-11-07 12:20:14', '<!-- wp:shortcode -->[woocommerce_my_account]<!-- /wp:shortcode -->', 'My account', '', 'publish', 'closed', 'closed', '', 'my-account', '', '', '2019-11-07 12:20:14', '2019-11-07 12:20:14', '', 0, 'http://localhost/Affiliate/my-account/', 0, 'page', '', 0),
(19, 1, '2019-11-07 12:24:24', '0000-00-00 00:00:00', '', 'AUTO-DRAFT', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2019-11-07 12:24:24', '0000-00-00 00:00:00', '', 0, 'http://localhost/Affiliate/?post_type=product&p=19', 0, 'product', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'exclude-from-search', 'exclude-from-search', 0),
(7, 'exclude-from-catalog', 'exclude-from-catalog', 0),
(8, 'featured', 'featured', 0),
(9, 'outofstock', 'outofstock', 0),
(10, 'rated-1', 'rated-1', 0),
(11, 'rated-2', 'rated-2', 0),
(12, 'rated-3', 'rated-3', 0),
(13, 'rated-4', 'rated-4', 0),
(14, 'rated-5', 'rated-5', 0),
(15, 'Uncategorized', 'uncategorized', 0),
(16, 'woocommerce-db-updates', 'woocommerce-db-updates', 0),
(17, 'wc-admin-notes', 'wc-admin-notes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(11, 16, 0),
(12, 16, 0),
(13, 17, 0),
(14, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'product_type', '', 0, 0),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 0),
(6, 6, 'product_visibility', '', 0, 0),
(7, 7, 'product_visibility', '', 0, 0),
(8, 8, 'product_visibility', '', 0, 0),
(9, 9, 'product_visibility', '', 0, 0),
(10, 10, 'product_visibility', '', 0, 0),
(11, 11, 'product_visibility', '', 0, 0),
(12, 12, 'product_visibility', '', 0, 0),
(13, 13, 'product_visibility', '', 0, 0),
(14, 14, 'product_visibility', '', 0, 0),
(15, 15, 'product_cat', '', 0, 0),
(16, 16, 'action-group', '', 0, 2),
(17, 17, 'action-group', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(0, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:12:\"122.176.27.0\";}'),
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"1e677c08880170ef5c7260250e67b0c55b047a102bb139ee587e5041b7dd50ef\";a:4:{s:10:\"expiration\";i:1573296496;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:78:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0\";s:5:\"login\";i:1573123696;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4'),
(18, 1, '_woocommerce_tracks_anon_id', 'woo:yYiW2o2gaVmjfYRsv8FBA6OF'),
(19, 1, 'wc_last_active', '1573171200'),
(20, 1, 'jetpack_tracks_anon_id', 'jetpack:ab4enJj3L+U7aAsncUUp637G');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$Bj42DQlvl0drCRNbtdWUtd3XPUqAyZ.', 'admin', 'utsab@synergicsoftek.com', '', '2019-11-07 10:48:09', '', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_admin_notes`
--

CREATE TABLE `wp_wc_admin_notes` (
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_data` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_reminder` datetime DEFAULT NULL,
  `is_snoozable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_admin_note_actions`
--

CREATE TABLE `wp_wc_admin_note_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_category_lookup`
--

CREATE TABLE `wp_wc_category_lookup` (
  `category_tree_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_customer_lookup`
--

CREATE TABLE `wp_wc_customer_lookup` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_last_active` timestamp NULL DEFAULT NULL,
  `date_registered` timestamp NULL DEFAULT NULL,
  `country` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_download_log`
--

CREATE TABLE `wp_wc_download_log` (
  `download_log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_order_coupon_lookup`
--

CREATE TABLE `wp_wc_order_coupon_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount_amount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_order_product_lookup`
--

CREATE TABLE `wp_wc_order_product_lookup` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_qty` int(11) NOT NULL,
  `product_net_revenue` double NOT NULL DEFAULT '0',
  `product_gross_revenue` double NOT NULL DEFAULT '0',
  `coupon_amount` double NOT NULL DEFAULT '0',
  `tax_amount` double NOT NULL DEFAULT '0',
  `shipping_amount` double NOT NULL DEFAULT '0',
  `shipping_tax_amount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_order_stats`
--

CREATE TABLE `wp_wc_order_stats` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_items_sold` int(11) NOT NULL DEFAULT '0',
  `gross_total` double NOT NULL DEFAULT '0',
  `tax_total` double NOT NULL DEFAULT '0',
  `shipping_total` double NOT NULL DEFAULT '0',
  `net_total` double NOT NULL DEFAULT '0',
  `returning_customer` tinyint(1) DEFAULT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_order_tax_lookup`
--

CREATE TABLE `wp_wc_order_tax_lookup` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_tax` double NOT NULL DEFAULT '0',
  `order_tax` double NOT NULL DEFAULT '0',
  `total_tax` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_product_meta_lookup`
--

CREATE TABLE `wp_wc_product_meta_lookup` (
  `product_id` bigint(20) NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `virtual` tinyint(1) DEFAULT '0',
  `downloadable` tinyint(1) DEFAULT '0',
  `min_price` decimal(10,2) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  `onsale` tinyint(1) DEFAULT '0',
  `stock_quantity` double DEFAULT NULL,
  `stock_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'instock',
  `rating_count` bigint(20) DEFAULT '0',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `total_sales` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_tax_rate_classes`
--

CREATE TABLE `wp_wc_tax_rate_classes` (
  `tax_rate_class_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_wc_tax_rate_classes`
--

INSERT INTO `wp_wc_tax_rate_classes` (`tax_rate_class_id`, `name`, `slug`) VALUES
(1, 'Reduced rate', 'reduced-rate'),
(2, 'Zero rate', 'zero-rate');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wc_webhooks`
--

CREATE TABLE `wp_wc_webhooks` (
  `webhook_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_created_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `api_version` smallint(4) NOT NULL,
  `failure_count` smallint(10) NOT NULL DEFAULT '0',
  `pending_delivery` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_api_keys`
--

CREATE TABLE `wp_woocommerce_api_keys` (
  `key_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

CREATE TABLE `wp_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_label` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_orderby` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

CREATE TABLE `wp_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `download_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_log`
--

CREATE TABLE `wp_woocommerce_log` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `context` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

CREATE TABLE `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_items`
--

CREATE TABLE `wp_woocommerce_order_items` (
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `order_item_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokenmeta`
--

CREATE TABLE `wp_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `payment_token_id` bigint(20) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokens`
--

CREATE TABLE `wp_woocommerce_payment_tokens` (
  `token_id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_sessions`
--

CREATE TABLE `wp_woocommerce_sessions` (
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `session_key` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_expiry` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_woocommerce_sessions`
--

INSERT INTO `wp_woocommerce_sessions` (`session_id`, `session_key`, `session_value`, `session_expiry`) VALUES
(0, '1', 'a:1:{s:8:\"customer\";s:712:\"a:26:{s:2:\"id\";s:1:\"1\";s:13:\"date_modified\";s:0:\"\";s:8:\"postcode\";s:0:\"\";s:4:\"city\";s:0:\"\";s:9:\"address_1\";s:0:\"\";s:7:\"address\";s:0:\"\";s:9:\"address_2\";s:0:\"\";s:5:\"state\";s:0:\"\";s:7:\"country\";s:2:\"GB\";s:17:\"shipping_postcode\";s:0:\"\";s:13:\"shipping_city\";s:0:\"\";s:18:\"shipping_address_1\";s:0:\"\";s:16:\"shipping_address\";s:0:\"\";s:18:\"shipping_address_2\";s:0:\"\";s:14:\"shipping_state\";s:0:\"\";s:16:\"shipping_country\";s:2:\"GB\";s:13:\"is_vat_exempt\";s:0:\"\";s:19:\"calculated_shipping\";s:0:\"\";s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:7:\"company\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:5:\"email\";s:24:\"utsab@synergicsoftek.com\";s:19:\"shipping_first_name\";s:0:\"\";s:18:\"shipping_last_name\";s:0:\"\";s:16:\"shipping_company\";s:0:\"\";}\";}', 1573392368);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zones`
--

CREATE TABLE `wp_woocommerce_shipping_zones` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_order` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_locations`
--

CREATE TABLE `wp_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_methods`
--

CREATE TABLE `wp_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) UNSIGNED NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `method_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_order` bigint(20) UNSIGNED NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_square_customers`
--

CREATE TABLE `wp_woocommerce_square_customers` (
  `square_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

CREATE TABLE `wp_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_country` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) UNSIGNED NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

CREATE TABLE `wp_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate_id` bigint(20) UNSIGNED NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10)),
  ADD KEY `woo_idx_comment_type` (`comment_type`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wc_admin_notes`
--
ALTER TABLE `wp_wc_admin_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `wp_wc_admin_note_actions`
--
ALTER TABLE `wp_wc_admin_note_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Indexes for table `wp_wc_category_lookup`
--
ALTER TABLE `wp_wc_category_lookup`
  ADD PRIMARY KEY (`category_tree_id`,`category_id`);

--
-- Indexes for table `wp_wc_customer_lookup`
--
ALTER TABLE `wp_wc_customer_lookup`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `wp_wc_download_log`
--
ALTER TABLE `wp_wc_download_log`
  ADD PRIMARY KEY (`download_log_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `wp_wc_order_coupon_lookup`
--
ALTER TABLE `wp_wc_order_coupon_lookup`
  ADD PRIMARY KEY (`order_id`,`coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indexes for table `wp_wc_order_product_lookup`
--
ALTER TABLE `wp_wc_order_product_lookup`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indexes for table `wp_wc_order_stats`
--
ALTER TABLE `wp_wc_order_stats`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `date_created` (`date_created`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status` (`status`(191));

--
-- Indexes for table `wp_wc_order_tax_lookup`
--
ALTER TABLE `wp_wc_order_tax_lookup`
  ADD PRIMARY KEY (`order_id`,`tax_rate_id`),
  ADD KEY `tax_rate_id` (`tax_rate_id`),
  ADD KEY `date_created` (`date_created`);

--
-- Indexes for table `wp_wc_product_meta_lookup`
--
ALTER TABLE `wp_wc_product_meta_lookup`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `virtual` (`virtual`),
  ADD KEY `downloadable` (`downloadable`),
  ADD KEY `stock_status` (`stock_status`),
  ADD KEY `stock_quantity` (`stock_quantity`),
  ADD KEY `onsale` (`onsale`),
  ADD KEY `min_max_price` (`min_price`,`max_price`);

--
-- Indexes for table `wp_wc_tax_rate_classes`
--
ALTER TABLE `wp_wc_tax_rate_classes`
  ADD PRIMARY KEY (`tax_rate_class_id`),
  ADD UNIQUE KEY `slug` (`slug`(191));

--
-- Indexes for table `wp_wc_webhooks`
--
ALTER TABLE `wp_wc_webhooks`
  ADD PRIMARY KEY (`webhook_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_api_keys`
--
ALTER TABLE `wp_woocommerce_api_keys`
  ADD PRIMARY KEY (`key_id`),
  ADD KEY `consumer_key` (`consumer_key`),
  ADD KEY `consumer_secret` (`consumer_secret`);

--
-- Indexes for table `wp_woocommerce_attribute_taxonomies`
--
ALTER TABLE `wp_woocommerce_attribute_taxonomies`
  ADD PRIMARY KEY (`attribute_id`),
  ADD KEY `attribute_name` (`attribute_name`(20));

--
-- Indexes for table `wp_woocommerce_downloadable_product_permissions`
--
ALTER TABLE `wp_woocommerce_downloadable_product_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  ADD KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_order_remaining_expires` (`user_id`,`order_id`,`downloads_remaining`,`access_expires`);

--
-- Indexes for table `wp_woocommerce_log`
--
ALTER TABLE `wp_woocommerce_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `wp_woocommerce_order_itemmeta`
--
ALTER TABLE `wp_woocommerce_order_itemmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_order_items`
--
ALTER TABLE `wp_woocommerce_order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `wp_woocommerce_payment_tokenmeta`
--
ALTER TABLE `wp_woocommerce_payment_tokenmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `payment_token_id` (`payment_token_id`),
  ADD KEY `meta_key` (`meta_key`(32));

--
-- Indexes for table `wp_woocommerce_payment_tokens`
--
ALTER TABLE `wp_woocommerce_payment_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `wp_woocommerce_sessions`
--
ALTER TABLE `wp_woocommerce_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_key` (`session_key`);

--
-- Indexes for table `wp_woocommerce_shipping_zones`
--
ALTER TABLE `wp_woocommerce_shipping_zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `wp_woocommerce_shipping_zone_locations`
--
ALTER TABLE `wp_woocommerce_shipping_zone_locations`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `location_type_code` (`location_type`(10),`location_code`(20));

--
-- Indexes for table `wp_woocommerce_shipping_zone_methods`
--
ALTER TABLE `wp_woocommerce_shipping_zone_methods`
  ADD PRIMARY KEY (`instance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
