-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2021 at 12:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payu`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostings`
--

CREATE TABLE `hostings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doamin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hosting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `expire_date` date NOT NULL,
  `renewal_amount` double(8,2) NOT NULL,
  `gst` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '18%',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostings`
--

INSERT INTO `hostings` (`id`, `customer_name`, `customer_email`, `customer_mobile`, `doamin_name`, `hosting`, `date`, `expire_date`, `renewal_amount`, `gst`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tara', 'tara@gmail.com', '9878900000', 'rashmi.com', 'test', '2020-11-30', '2020-11-30', 7000.00, 'disabled', 1, NULL, NULL),
(2, 'kavi', 'kavi@gmail.com', '9303232961', 'kavi.com', 'cloud', '2020-11-30', '2021-11-30', 5.00, 'enabled', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2020_11_01_163520_create_sessions_table', 2),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(10, '2016_06_01_000004_create_oauth_clients_table', 3),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(12, '2020_11_13_165748_create_products_table', 3),
(14, '2020_11_25_123406_create_hostings_table', 4),
(17, '2020_12_12_054031_create_paytms_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0161ced26a14e29fd9b9147682567ab9dae92e96e74ec7ea69b12d87c5460503899a6d7b54a7a4c8', 2, 3, 'MyApp', '[]', 0, '2020-11-19 12:41:39', '2020-11-19 12:41:39', '2021-11-19 18:11:39'),
('026ca91eb6f46ab48dd7e0017a7911c0ce78d68f2e460a40b6ca21d2412a32e8865a897aba0cda0f', 114, 3, 'MyApp', '[]', 0, '2020-11-17 13:52:29', '2020-11-17 13:52:29', '2021-11-17 19:22:29'),
('08126a09820c0ac80d59c2c029ba6ef6a968f9b24bda2da29782b749edd31d9f6c76ca6c871f1517', 2, 3, 'MyApp', '[]', 0, '2020-11-22 15:11:01', '2020-11-22 15:11:01', '2021-11-22 20:41:01'),
('12d174bb59cc4190da72aa72408e43878a2ae3ee1b0db72197f4ff05a2a88b18defe8078911cb141', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:31:35', '2020-11-17 13:31:35', '2021-11-17 19:01:35'),
('20aae9d959f1b7ce524d64a019c7ca9895d81511522096d9d6d919a84e785eff5707f1a6294d27e0', 116, 3, 'MyApp', '[]', 0, '2020-11-17 14:11:37', '2020-11-17 14:11:37', '2021-11-17 19:41:37'),
('211e342a7bc7cfde7c0f4ef5fea196b9b84c83bd6914e06a013815754255119061772efd0c6c633f', 1, 3, 'MyApp', '[]', 0, '2020-11-19 12:33:19', '2020-11-19 12:33:19', '2021-11-19 18:03:19'),
('23ea02c251f64f90de61402c327194d57108aa159c5a8cfa4da273c5f14484bc29925eff1d365d03', 2, 3, 'MyApp', '[]', 0, '2020-11-22 15:13:52', '2020-11-22 15:13:52', '2021-11-22 20:43:52'),
('2bb0bd58700c63ec010e287ea111aa84720d336327d5d1a16ff924d0f7759f0342a28d62329fb5eb', 113, 3, 'MyApp', '[]', 0, '2020-11-17 12:34:50', '2020-11-17 12:34:50', '2021-11-17 18:04:50'),
('32fcc4ef89ba0802817ac3899f2b3b5d30ad9f7044fb951b601279ad9fc385cf9bf7d79426531d16', 2, 3, 'MyApp', '[]', 0, '2020-11-25 01:02:08', '2020-11-25 01:02:08', '2021-11-25 06:32:08'),
('47faabfe3514d159f7714a3878916d32c6d747c45917327bb68343fa23eb303a71b6d25b86218c38', 2, 3, 'MyApp', '[]', 0, '2020-11-17 13:42:23', '2020-11-17 13:42:23', '2021-11-17 19:12:23'),
('4bc8b090be462f622bec423dfacd81c23e4a242e0d43d4711e2e8f173d3b1ed2f18f86b794105aaa', 2, 3, 'MyApp', '[]', 0, '2020-11-24 04:16:54', '2020-11-24 04:16:54', '2021-11-24 09:46:54'),
('52de67b200f9976e034e986400a08d8f4e8bd84fcd7b09a2efc56e7224ee39eaec7642dccac84ef1', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:23:51', '2020-11-17 13:23:51', '2021-11-17 18:53:51'),
('54a6367504b0ccdd46e580af942e61712529664bfef817741bf2c4a291048f1f93f1b53a29e5b6b5', 2, 3, 'MyApp', '[]', 0, '2020-11-24 04:16:21', '2020-11-24 04:16:21', '2021-11-24 09:46:21'),
('58e84ae63c4e8845044627fe4cd748fffa7b551ef3495eca39d9a9e9c32bc81e663a86abe7debcf4', 4, 3, 'MyApp', '[]', 0, '2020-11-19 12:36:55', '2020-11-19 12:36:55', '2021-11-19 18:06:55'),
('59c40798a4a8bed2c88a729d2a68c57db59f0fb3561f98c58bc3cdfb5b7ed2d0cc1d724ef71a693b', 113, 3, 'MyApp', '[]', 0, '2020-11-17 12:33:47', '2020-11-17 12:33:47', '2021-11-17 18:03:47'),
('5be4cc62e746a5e11851af249d86c016bccda0d8d5c4b9cb3a8a2101d4a0c21a4d3c4d19c3ef5d55', 115, 3, 'MyApp', '[]', 0, '2020-11-17 14:02:12', '2020-11-17 14:02:12', '2021-11-17 19:32:12'),
('5f44c3131af9ad7169e2b1bad6ddde4f2eca88b1a8546448088232f81466f0bd0607b047484adf3a', 2, 3, 'MyApp', '[]', 0, '2020-11-24 11:51:21', '2020-11-24 11:51:21', '2021-11-24 17:21:21'),
('6408270b14ea1907cdd6964e7c945e573ec31d976bc35925f184a5cf8207fb7fc8b6ba5131178a6a', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:24:55', '2020-11-17 13:24:55', '2021-11-17 18:54:55'),
('71eac51e1a8b2fe78436377b409a5d839cf1cec043121ff1b3bd70913820cd33c74e5cde1bd14d98', 113, 3, 'MyApp', '[]', 0, '2020-11-17 12:40:13', '2020-11-17 12:40:13', '2021-11-17 18:10:13'),
('7788bda42c1b06e733b735198fd9c53001edd3b752f28264725c00351e8e8a338560eedc0db7bf50', 2, 3, 'MyApp', '[]', 0, '2020-11-19 12:35:05', '2020-11-19 12:35:05', '2021-11-19 18:05:05'),
('7a0c313ba493e9964d5f549214cbf97bf3e980eab05018e192814c019566d2f93c5792657d6bc4d8', 2, 3, 'MyApp', '[]', 0, '2020-11-24 04:16:14', '2020-11-24 04:16:14', '2021-11-24 09:46:14'),
('82ad30c78b70a11f25982d10c7f79d6a7409bf0598f04eb764da596c468c90b4d498b8b817ee7727', 1, 3, 'MyApp', '[]', 0, '2020-11-16 13:00:45', '2020-11-16 13:00:45', '2021-11-16 18:30:45'),
('83dce2b0962510495ebe84d3db197480f0efa52c646ed90e8f757c6b50895b6c941a470a64ee7bc8', 115, 3, 'MyApp', '[]', 0, '2020-11-17 14:02:30', '2020-11-17 14:02:30', '2021-11-17 19:32:30'),
('88eb956c403cf94eb991803d8bf369d61db559c79ce8e778a7c2c7e33f7a389530b36cc1af46d25a', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:21:48', '2020-11-17 13:21:48', '2021-11-17 18:51:48'),
('8cb49996be9e6df39356cc58336a3e767a4b14cc7f304765310551b439fe77f1e01c8d61b6dea639', 202, 3, 'MyApp', '[]', 0, '2020-11-19 12:29:50', '2020-11-19 12:29:50', '2021-11-19 17:59:50'),
('907c7fe46cebe1336eb36bd156f1ebe32615d019591a7151df9e41620df79f2e511d58b7d2a51d9f', 101, 3, 'MyApp', '[]', 0, '2020-11-18 13:28:18', '2020-11-18 13:28:18', '2021-11-18 18:58:18'),
('91b9aa36d3884f32a79e6a6cf72ea5fbec475af51ad4d83dcfcf5ceb5b290b7f6c325280bc01eeee', 2, 3, 'MyApp', '[]', 0, '2020-11-22 15:49:46', '2020-11-22 15:49:46', '2021-11-22 21:19:46'),
('92fea73bcd8c1518fe77d787bccdef54d76979b5a43046f28a6460a692d309d3fbfb8a2706ee57b4', 2, 3, 'MyApp', '[]', 0, '2020-11-22 15:17:55', '2020-11-22 15:17:55', '2021-11-22 20:47:55'),
('9605edeb68761dc49c9527e032c8bb9f9a495c4416ecfe1a617de9b915acb6da6ffb5c32f63a22c8', 5, 3, 'MyApp', '[]', 0, '2020-11-16 11:35:58', '2020-11-16 11:35:58', '2021-11-16 17:05:58'),
('9cb13e3b84880b022000802f4230cbd9f1e4228ba2bc5a083d61688ba81a4cd6f272a7710d7c418b', 101, 3, 'MyApp', '[]', 0, '2020-11-18 14:57:53', '2020-11-18 14:57:53', '2021-11-18 20:27:53'),
('9cff0191b85797726f99a625dd568f895d581ab4ae55c50db7458f2fbaa3c1bf47369b4d000281f9', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:30:46', '2020-11-17 13:30:46', '2021-11-17 19:00:46'),
('9d32b7200966749a35789eeff43e431036dd82d5c92c9ca3e12cd811d288cacdbdc75d9e41c7211a', 2, 3, 'MyApp', '[]', 0, '2020-11-24 11:56:01', '2020-11-24 11:56:01', '2021-11-24 17:26:01'),
('a3417e73646bd86f81f4d235eca3ea17d6b1afbe8f69b5c4e507588ee07ea17254d973d6c742cd2a', 115, 3, 'MyApp', '[]', 0, '2020-11-17 13:59:07', '2020-11-17 13:59:07', '2021-11-17 19:29:07'),
('a5d1f439676d6f028a65c1b816bbce008c7b436a6b0e346782ead631f527382d0c36aa09fb46ee55', 2, 3, 'MyApp', '[]', 0, '2020-11-19 12:42:16', '2020-11-19 12:42:16', '2021-11-19 18:12:16'),
('aaca65876c20970814841c423a33931e87b168eca400bdadf9e08a466022087c6acc2285716c6721', 2, 3, 'MyApp', '[]', 0, '2020-11-19 12:41:59', '2020-11-19 12:41:59', '2021-11-19 18:11:59'),
('b5f3423065244edc29b159973fd1ff481376b31926ae6f2ccaba456d1c807901483a13936a7513d7', 2, 3, 'MyApp', '[]', 0, '2020-11-22 15:53:04', '2020-11-22 15:53:04', '2021-11-22 21:23:04'),
('c86b28bb16270ec8477dc14fce64304c2b1364c943e5cf7ba039653eb1b04cd22d749aa91c026b5d', 3, 3, 'MyApp', '[]', 0, '2020-11-19 12:35:30', '2020-11-19 12:35:30', '2021-11-19 18:05:30'),
('dcec39f24bbda94ba9252d54ea50608b98342d6cf6a5be59ea34f7a679d3b6eb9efafbf04546ab6b', 2, 3, 'MyApp', '[]', 0, '2020-11-17 14:01:23', '2020-11-17 14:01:23', '2021-11-17 19:31:23'),
('ddd70b52bcfda091b23be8dda726b76e9c59746ec5f01e5b584bc453469b53304858f0ba50823329', 203, 3, 'MyApp', '[]', 0, '2020-11-19 12:31:00', '2020-11-19 12:31:00', '2021-11-19 18:01:00'),
('e1ae2c7bdf162fdc91515777b9c6e60b857cb5c94c325e8979d86aa2fec5065e20a34c26d3bc72ee', 115, 3, 'MyApp', '[]', 0, '2020-11-17 14:02:43', '2020-11-17 14:02:43', '2021-11-17 19:32:43'),
('eb2549bc49b6948b3a507f7d0dc26d1306ccc32e7152f77990b7c958b24e5beaaa86e8192ad77503', 2, 3, 'MyApp', '[]', 0, '2020-11-22 12:36:02', '2020-11-22 12:36:02', '2021-11-22 18:06:02'),
('ecafe81608f1de3d1b598bf21fce7d2a26f35766ac829c4fb16e712ee1b355d934e00a20da05b426', 1, 3, 'MyApp', '[]', 0, '2020-11-17 13:25:03', '2020-11-17 13:25:03', '2021-11-17 18:55:03'),
('f0409c07e9901c3c123cd98eba48865bfdd0beb6305fb73425519c1fd7b20e9bda0e89d091408e3e', 2, 3, 'MyApp', '[]', 0, '2020-11-17 14:02:05', '2020-11-17 14:02:05', '2021-11-17 19:32:05'),
('f5b990da14b95c0b5753193ead1f2a751179f4afd8cfbd7dc75886d1fbfce7a7387b4760f37c72e1', 5, 3, 'MyApp', '[]', 0, '2020-11-22 15:40:28', '2020-11-22 15:40:28', '2021-11-22 21:10:28'),
('fafb793d5b49e4e3088ac86762d8ac1a74018f1e6870fc92be956e7c359ff88bc97752cc6fbf7ecb', 2, 3, 'MyApp', '[]', 0, '2020-11-19 12:37:55', '2020-11-19 12:37:55', '2021-11-19 18:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'l07B0h2X4oeHamY2FWcZDlkV7vOLxP9iLogbyLc4', NULL, 'http://localhost', 1, 0, 0, '2020-11-16 11:35:19', '2020-11-16 11:35:19'),
(2, NULL, 'Laravel Password Grant Client', 'nVWICTk1jSLurCyKwUy9PKZgJzxp9qI5PVgbZ6Ba', 'users', 'http://localhost', 0, 1, 0, '2020-11-16 11:35:19', '2020-11-16 11:35:19'),
(3, NULL, 'Laravel Personal Access Client', 'sxwQCbB4QHwvUzanm2Uq8kHohZOmUqPoSLyHuU50', NULL, 'http://localhost', 1, 0, 0, '2020-11-16 11:35:38', '2020-11-16 11:35:38'),
(4, NULL, 'Laravel Password Grant Client', 'VyujmrxL1LNG5DbzoPYRdoJJKtZIjpWtyI8MiILM', 'users', 'http://localhost', 0, 1, 0, '2020-11-16 11:35:38', '2020-11-16 11:35:38');

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

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-11-16 11:35:19', '2020-11-16 11:35:19'),
(2, 3, '2020-11-16 11:35:38', '2020-11-16 11:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytms`
--

CREATE TABLE `paytms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Successful, 0=Failed, 2=processing',
  `fee` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paytms`
--

INSERT INTO `paytms` (`id`, `host_id`, `name`, `mobile`, `email`, `status`, `fee`, `order_id`, `transaction_id`, `date`, `created_at`, `updated_at`) VALUES
(27, 0, 'Tara', 9878900000, 'tara@gmail.com', 1, 7000, '1', '0', '2020-12-12', '2020-12-12 12:02:06', '2020-12-12 12:02:06'),
(31, 0, 'Tara', 9878900000, 'tara@gmail.com', 0, 7000, '1', '0', '2020-12-12', '2020-12-12 12:14:20', '2020-12-12 12:14:20'),
(32, 0, 'Tara', 9878900000, 'tara@gmail.com', 0, 7000, '1', '0', '2020-12-12', '2020-12-12 13:30:41', '2020-12-12 13:30:41'),
(33, 0, 'Tara', 9878900000, 'tara@gmail.com', 0, 7000, '1_410', '0', '2020-12-12', '2020-12-12 13:41:42', '2020-12-12 13:41:42'),
(34, 0, 'Tara', 9878900000, 'tara@gmail.com', 2, 7000, '1_635352707137', '0', '2020-12-16', '2020-12-16 09:29:38', '2020-12-16 09:29:38'),
(35, 0, 'Tirit sahu', 9303232961, 'tirit.superuser@gmail.com', 0, 5, '1_316830182488', '0', '2020-12-21', '2020-12-21 05:35:50', '2020-12-21 05:35:50'),
(36, 0, 'amit sahu', 7828129127, 'amit@gmail.com', 1, 5, '2_593832099401', '0', '2020-12-21', '2020-12-21 06:00:12', '2020-12-21 06:00:12'),
(37, 0, 'kavi', 9303232961, 'kavi@gmail.com', 0, 5, '2_628330436115', '0', '2020-12-21', '2020-12-21 06:33:23', '2020-12-21 06:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0WIbenNChWgdOwrvaWFDr7oQlYk8VITyCgcizR0Z', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYzU3WlBXd3ZjWTV0MVlCQ2FXN2w0aVEwdDBSNXJpRUpZVFpaU3dZViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3QvcGF5dS9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWml0aGhtS3V3WUNSbzI4Lkk1MllSdVIwMFpCZXVUenJLQ1FaZjA5Y1FMN05LT2xvaEowRVMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFppdGhobUt1d1lDUm8yOC5JNTJZUnVSMDBaQmV1VHpyS0NRWmYwOWNRTDdOS09sb2hKMEVTIjt9', 1615980315),
('rkIbMp1bAXXcn71oMbEYdluTyrzcfHbUzls5p0fP', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOUFTaVU5b2tBZDEyTVZZNXlPRmwyUjdSVnZRVmNDamd4bWVsMngwRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3QvdGl3YXJpU0lSL2hvc3RpbmdzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFppdGhobUt1d1lDUm8yOC5JNTJZUnVSMDBaQmV1VHpyS0NRWmYwOWNRTDdOS09sb2hKMEVTIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRaaXRoaG1LdXdZQ1JvMjguSTUyWVJ1UjAwWkJldVR6cktDUVpmMDljUUw3TktPbG9oSjBFUyI7fQ==', 1611480427);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=unblocked, 1=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `role`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tirit sahu', 'tirit@gmail.com', NULL, '$2y$10$ZithhmKuwYCRo28.I52YRuR00ZBeuTzrKCQZf09cQL7NKOlohJ0ES', '9303232000', 1, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-19 12:33:19', '2020-11-19 12:33:19'),
(2, 'Kavi', 'kavi@gmail.com', NULL, '$2y$10$HO0R3e1dK1O/FQ/4Ug9AfuLxMQcV6HNByItsXRNfoBvPQC1W4106u', '9303232111', 0, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-19 12:35:05', '2020-11-19 12:35:05'),
(3, 'Kishan', 'kk@gmail.com', NULL, '$2y$10$TESrgez/oGc5Mev7Ag3s9.L9.YpIsJrCD4XbPXLKvOOCUqPXo9H1i', '70003232111', 0, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-19 12:35:30', '2020-11-19 12:35:30'),
(4, 'Amit sahu', 'aks@gmail.com', NULL, '$2y$10$usJFwWt59Ftcl0sGw4gKSO7IlhJZxD/4wK7pJWHJA46avQPvHXAWq', '7828323211', 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-19 12:36:55', '2020-11-19 12:36:55'),
(5, 'manav', 'manav@gmail.com', NULL, '$2y$10$qQCsc/hEHE8503J8K7bW9.bfb2UTAZw0UBI7g1IpbrXyXYn2PV5VG', '6260691111', 0, NULL, NULL, NULL, NULL, NULL, 0, '2020-11-22 15:40:28', '2020-11-22 15:40:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hostings`
--
ALTER TABLE `hostings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `paytms`
--
ALTER TABLE `paytms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostings`
--
ALTER TABLE `hostings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paytms`
--
ALTER TABLE `paytms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
