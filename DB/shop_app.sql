-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 05:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `img`) VALUES
(1, 'test@test', '$2y$10$yakVZtqkOFEOyURI9492f.G9Smgd4txomgQ1XzZdywEXS.DJu.GgC', 'Admin', ''),
(2, 'test2@test', '1212', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'laptops', NULL, NULL),
(5, 'Mobiles', NULL, NULL),
(6, 'Cameras', NULL, NULL),
(7, 'PCs', NULL, NULL),
(16, 'Watches', NULL, NULL),
(18, 'Headphone', NULL, NULL),
(22, 'test', NULL, NULL),
(23, 'test2', NULL, NULL),
(24, 'testupdated', '2022-04-02 20:22:09', '2022-04-02 20:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 'KzfvTcTmgVyZRGQEDAfkjCT9jrbs17.jpg', 14, '2022-03-11 14:49:38', '2022-03-11 14:49:38'),
(22, 'wUNyooojNCNvk3Xhx37ppZP2RzuDGU.jpg', 14, '2022-03-11 14:49:38', '2022-03-11 14:49:38'),
(23, 'zyLD6c7Fzi1NfTCpmW50C2YPsLKiMO.jpg', 14, '2022-03-11 14:49:38', '2022-03-11 14:49:38'),
(24, 'o3YkQsAAvDU6NZ83PdxPhYMlu2X7o0.jpg', 15, '2022-03-11 16:01:04', '2022-03-11 16:01:04'),
(25, 'f88lj7VUULV8D1FMxlc21ID1BHsE20.jpg', 15, '2022-03-11 16:01:04', '2022-03-11 16:01:04'),
(26, 'aJ6NQ9SRNFnEGjFkR9E6B0KU8lRXUw.jpg', 15, '2022-03-11 16:01:04', '2022-03-11 16:01:04'),
(27, 'M3QCZWaXPQWMAeGZtcrHAZn3ojKY1F.jpg', 15, '2022-03-11 16:01:04', '2022-03-11 16:01:04'),
(55, '6bEtp5GmVLgfsafWFgvWXq74EyKtlI.jpg', 27, '2022-03-12 15:01:57', '2022-03-12 15:01:57'),
(56, 'ip6wCeOz5XBi4csZinzcRyXzBmaI22.jpg', 27, '2022-03-12 15:01:57', '2022-03-12 15:01:57'),
(57, 'V58zmTWUetvbJC06uIY7inJRQAUgnI.jpg', 27, '2022-03-12 15:01:57', '2022-03-12 15:01:57'),
(58, 'H43ysqiUc0g1jZcasvvkmm56UW5aHn.jpg', 27, '2022-03-12 15:01:57', '2022-03-12 15:01:57'),
(59, 'lr9aZAZNab3yD6GTNZrIntoMvajqix.jpg', 28, '2022-03-12 15:02:44', '2022-03-12 15:02:44'),
(60, 'pQtWTdunBneUEhDKDnUverm0Z1gHAP.jpg', 28, '2022-03-12 15:02:45', '2022-03-12 15:02:45'),
(61, 'FoDI7jvi3ySIKL3AXR4p7V3B2KPKqh.jpg', 28, '2022-03-12 15:02:45', '2022-03-12 15:02:45'),
(62, 'QFOcWRvEl4T6Sc7aZVE3wg0iPbZBZC.jpg', 28, '2022-03-12 15:02:45', '2022-03-12 15:02:45'),
(63, 'nS4rrkE2Va6amK6FoNrDfnxmL9Ciyo.jpg', 29, '2022-03-12 15:03:55', '2022-03-12 15:03:55'),
(64, 'u4KoXlwS0OKhyOAmGfhLhoSLKpsL4i.jpg', 29, '2022-03-12 15:03:55', '2022-03-12 15:03:55'),
(65, 'TwFXEKYxxeHQVqlzOsJyajuwxn2khg.jpg', 29, '2022-03-12 15:03:55', '2022-03-12 15:03:55'),
(66, 'F0HhPYgD4zihwYEHI6JrRIumj0Fhcj.jpg', 29, '2022-03-12 15:03:55', '2022-03-12 15:03:55'),
(67, 'LFACDDufxTlEYQfCDi7deEghmna3dc.jpg', 30, '2022-03-12 15:04:59', '2022-03-12 15:04:59'),
(68, '6KmeOdsEeAyRnoh7pvbhVtlWJXODU3.jpg', 30, '2022-03-12 15:04:59', '2022-03-12 15:04:59'),
(69, 'OI97CqTeQd8cu93ufs3nK7O00Qq15g.jpg', 30, '2022-03-12 15:04:59', '2022-03-12 15:04:59'),
(70, 'yl4UzjofA781uDLnaauclgPZhu5m0p.jpg', 30, '2022-03-12 15:04:59', '2022-03-12 15:04:59'),
(71, 'P7SCWuOk47b0csnYk9OwuSiyY2xDlG.jpg', 31, '2022-03-12 15:06:36', '2022-03-12 15:06:36'),
(72, 'P173FCX28DyrCVhM1RorNGsPyYlMEm.jpg', 31, '2022-03-12 15:06:36', '2022-03-12 15:06:36'),
(73, 'p3yVZbIll2sH6bxJ9vbQMQ8xjB7cSD.jpg', 31, '2022-03-12 15:06:36', '2022-03-12 15:06:36'),
(74, 'hKrKQVITQGOfdugQ6BZvTeMqp8xYi3.jpg', 31, '2022-03-12 15:06:36', '2022-03-12 15:06:36'),
(75, 'WzgJAa598QVcsGs28sFBnglE6JSOVy.jpg', 32, '2022-03-12 15:08:40', '2022-03-12 15:08:40'),
(76, '13jw3Zk0Lj6y32W5KnF8UuN9ZMBwO2.jpg', 32, '2022-03-12 15:08:41', '2022-03-12 15:08:41'),
(77, '5JlRjNnjwTahH4zMO3YAsVlrlxG5Y5.jpg', 33, '2022-03-12 15:10:16', '2022-03-12 15:10:16'),
(78, 'kXx4yepGJ1MqCvf9ybUfNY7OpBpau6.jpg', 33, '2022-03-12 15:10:16', '2022-03-12 15:10:16'),
(79, 'vwsaQ5HIdS523mV9fB8nHe3FiBxB4U.jpg', 33, '2022-03-12 15:10:16', '2022-03-12 15:10:16'),
(80, '3L2HrqFZ9uTlR3OEX986BrRrqEBVWd.jpg', 34, '2022-03-12 15:12:34', '2022-03-12 15:12:34'),
(81, 'yYLJ761ldwOTjOxwHcf8aHR7Tiw2pr.jpg', 34, '2022-03-12 15:12:34', '2022-03-12 15:12:34'),
(82, 'FNAVXyCQqUzrAILA7DnAUfUMKpgnXN.jpg', 34, '2022-03-12 15:12:34', '2022-03-12 15:12:34'),
(83, 'ROPL8WZO361S9YQSSVDHbfbxtv600T.jpg', 34, '2022-03-12 15:12:34', '2022-03-12 15:12:34'),
(84, 'Ko9V3tYzNqMPNpWTFF3eS9L80MMQpL.jpg', 35, '2022-03-12 15:15:06', '2022-03-12 15:15:06'),
(85, 'vIML0aXxnrKsGX5V81XIZrJ5AAWOpe.jpg', 35, '2022-03-12 15:15:06', '2022-03-12 15:15:06'),
(86, 'xvKqsCe1g9sDzWZhBts0gVAHv8BHbd.jpg', 35, '2022-03-12 15:15:06', '2022-03-12 15:15:06'),
(87, 'xJnfzx6uIynQWUPYTC089ODX5yaPih.jpg', 35, '2022-03-12 15:15:06', '2022-03-12 15:15:06'),
(92, 'sxfeJSXcX5b200ATnvey2oyR3CRNXM.jpg', 37, '2022-03-12 15:19:47', '2022-03-12 15:19:47'),
(93, 'TkLXjUmya8DTwQ9LztrYcyAPnUEUL5.jpg', 37, '2022-03-12 15:19:47', '2022-03-12 15:19:47'),
(94, 'YJeLqiZoBWyEbylZKKXXvb5bSV6Gpi.jpg', 37, '2022-03-12 15:19:47', '2022-03-12 15:19:47'),
(95, 'jqh63C9z3DX3tlHP4BpXbJd6rfpEls.jpg', 37, '2022-03-12 15:19:48', '2022-03-12 15:19:48'),
(96, 'uDwznuLBMy52C0tuIw3LV4eMBs5G8U.jpg', 38, '2022-03-12 15:20:43', '2022-03-12 15:20:43'),
(97, 'o8jAwTUk6nDYynB86IgnZNUVtK5V7K.jpg', 38, '2022-03-12 15:20:43', '2022-03-12 15:20:43'),
(98, 'bNQSWT93K8493QB6SjrYjyk3D0olzv.jpg', 38, '2022-03-12 15:20:43', '2022-03-12 15:20:43'),
(99, 'FO80YahDvtyBVCiVJBa4D6nkpVfx2X.jpg', 39, '2022-03-12 15:22:07', '2022-03-12 15:22:07'),
(100, 'h9ESLOkfp9J7GHrdnJh5QKOg3K1dE3.jpg', 39, '2022-03-12 15:22:07', '2022-03-12 15:22:07'),
(101, 'yrmGlKlxi8VLcyV72RzqejOmpd4IZr.jpg', 39, '2022-03-12 15:22:07', '2022-03-12 15:22:07'),
(102, '3l9sL6YfzNHdT2KKaPVaH8StkJZzA6.jpg', 40, '2022-03-12 15:24:19', '2022-03-12 15:24:19'),
(103, 'yHEwb9hQzN8T9F6f1mQ5hY90ckzHpn.jpg', 40, '2022-03-12 15:24:19', '2022-03-12 15:24:19'),
(104, 'bRepoSrzBRskjqY9Y593P5XO0FiO3B.jpg', 40, '2022-03-12 15:24:19', '2022-03-12 15:24:19'),
(105, '806GRNwVsaStO4RoJjbekjRKhKWk8U.jpg', 40, '2022-03-12 15:24:19', '2022-03-12 15:24:19'),
(106, 'VJzBxuo18dTlumZRicSW0Z7YIA6yix.jpg', 41, '2022-03-12 15:25:26', '2022-03-12 15:25:26'),
(107, 'hTBP94MS7WuPnoMkEZF59CaBLfZW1v.jpg', 41, '2022-03-12 15:25:27', '2022-03-12 15:25:27'),
(108, '8icnqVBUgJdcPqxp7yRaewnpPGdERs.jpg', 41, '2022-03-12 15:25:27', '2022-03-12 15:25:27'),
(109, 'JM47Kcqrx9Q4kKskeUEolKLUjn3v63.jpg', 41, '2022-03-12 15:25:27', '2022-03-12 15:25:27'),
(110, 'ZemTIPuG0Rng4Wr7JdqSg8nEiVS2uG.jpg', 42, '2022-03-12 15:26:25', '2022-03-12 15:26:25'),
(111, 'kPVXwEwuPanuQYO49RU6yMeCRNm4kh.jpg', 42, '2022-03-12 15:26:25', '2022-03-12 15:26:25'),
(112, 'pBPAf7Z2g8VG80D7QTRg03anJmJchn.jpg', 43, '2022-03-12 15:27:32', '2022-03-12 15:27:32'),
(113, 'IT0sdWNQ3cYYA7yXobaoqwp1iKFBOd.jpg', 43, '2022-03-12 15:27:32', '2022-03-12 15:27:32'),
(114, 'NOIbisowE2sm3F25sctW9OfE4HVwcr.jpg', 43, '2022-03-12 15:27:32', '2022-03-12 15:27:32'),
(115, 'hNRwVOoZB7bYsFtaJIGd0gZHlazUQp.jpg', 44, '2022-03-12 15:28:42', '2022-03-12 15:28:42'),
(116, 'fCBe2eULmtRUlFM0JqdNOH12Z0xcF2.jpg', 44, '2022-03-12 15:28:42', '2022-03-12 15:28:42'),
(117, '5qBpPnKoZf0NSeLoTiO34UxFtsCfRH.jpg', 44, '2022-03-12 15:28:42', '2022-03-12 15:28:42'),
(118, '4uBgNT7F6SgZVNb7L8GYpX0bw51Tsl.jpg', 45, '2022-03-12 15:30:01', '2022-03-12 15:30:01'),
(119, 'xpINoycHhvUeglpMh4slTZcKfWV2sI.jpg', 45, '2022-03-12 15:30:01', '2022-03-12 15:30:01'),
(120, 'VkTli50VRtPH4lYMzl5uHDi51yXatU.jpg', 45, '2022-03-12 15:30:01', '2022-03-12 15:30:01'),
(121, 'k0nNpXaa9GH50PxOXj9MquxvgGWJPv.jpg', 46, '2022-03-12 15:31:36', '2022-03-12 15:31:36'),
(122, '7vJgJgH6vZXZrUFp1u3X7kAbMopAIK.jpg', 46, '2022-03-12 15:31:36', '2022-03-12 15:31:36'),
(123, 'kt2eg3TTLvLr1TL36f6qcLYvYGhRbU.jpg', 46, '2022-03-12 15:31:36', '2022-03-12 15:31:36'),
(124, 'wQTHw1KPzIshwWNk93Fs5FJd1NxCJX.jpg', 46, '2022-03-12 15:31:36', '2022-03-12 15:31:36'),
(125, '92AV2LV5ZY5RCvCotG6fy3v66758W6.jpg', 47, '2022-03-12 15:33:06', '2022-03-12 15:33:06'),
(126, 'wlbyJX9deasrdJcE0szcbSxcFAlCoR.jpg', 47, '2022-03-12 15:33:06', '2022-03-12 15:33:06'),
(131, 'W1annARGgz2NAWirRJKUonaQWMrZqx.jpg', 50, '2022-03-13 21:43:14', '2022-03-13 21:43:14'),
(132, 'AM0Fo5kAOqz6O8KpwOe4lcIQLkvDYa.jpg', 50, '2022-03-13 21:43:15', '2022-03-13 21:43:15'),
(133, 'wPKC839mcA6oWLpBkarPHwtxpw71Kv.jpg', 50, '2022-03-13 21:43:15', '2022-03-13 21:43:15'),
(134, 'qk0sb2pUQCTq2jjmuXuJoQODCOxONr.jpg', 51, '2022-03-13 21:44:08', '2022-03-13 21:44:08'),
(135, 'vCD5dfQK1adf4JOf6aTJ0sasaplv4e.jpg', 51, '2022-03-13 21:44:08', '2022-03-13 21:44:08'),
(136, 'd5GIyDuRhJt5o8rZrxdBI3e6S2JNnW.jpg', 51, '2022-03-13 21:44:08', '2022-03-13 21:44:08'),
(137, '3uY0KLUA9H0QNxw0YrXagSP0PPCmLk.jpg', 52, '2022-03-13 21:45:02', '2022-03-13 21:45:02'),
(138, 'chiRhfJNdlNq95XbnOAvi9fH0fbuhg.jpg', 52, '2022-03-13 21:45:03', '2022-03-13 21:45:03'),
(139, 'YWBbSxrCRTZVCuuUQbLcMpzFcMN9KD.jpg', 52, '2022-03-13 21:45:03', '2022-03-13 21:45:03'),
(140, 'Alwz0VukqksiuyOYnNRPbjbuDvVluB.jpg', 53, '2022-03-13 21:45:52', '2022-03-13 21:45:52'),
(141, 'cFftmgiBHA0zPEwtZsobtpyYICnpjq.jpg', 53, '2022-03-13 21:45:52', '2022-03-13 21:45:52'),
(142, 'eszRpv9jbwOGagNkC9j5xIEedZ2lp6.jpg', 53, '2022-03-13 21:45:52', '2022-03-13 21:45:52'),
(149, 'hbu4MOnrx4k9SJAi4qoSucBS2EssDY.jpg', 57, '2022-03-16 00:46:42', '2022-03-16 00:46:42'),
(150, 'UiuDW5ra0ca4P5S2avkhPnwphXKlYd.jpg', 57, '2022-03-16 00:46:42', '2022-03-16 00:46:42'),
(151, '0QcYJBA6LAP2rFvkv4jNuFvjN8HFuN.jpg', 57, '2022-03-16 00:46:42', '2022-03-16 00:46:42'),
(152, 'mXtceMq4a2BRnpHYm5peRYK82t5fDI.jpg', 57, '2022-03-16 00:46:42', '2022-03-16 00:46:42'),
(153, 'AWoNYEx0pBgm4RlnP7qFJOsq6DFP5G.jpg', 58, '2022-03-16 00:59:41', '2022-03-16 00:59:41'),
(154, 'mUGGmBdgjsEf9t0nlcaH0eoLXc9JJb.jpg', 58, '2022-03-16 00:59:41', '2022-03-16 00:59:41'),
(155, 'mA25tY94weTHbPkrJnNNkL4cQ63ZzL.jpg', 59, '2022-03-16 01:00:43', '2022-03-16 01:00:43'),
(156, '8pHpoXaa3mehDxXvLMAv1lD9crMrqP.jpg', 59, '2022-03-16 01:00:44', '2022-03-16 01:00:44'),
(157, 's3Yt7pwo1kyb1WGLK7xgDQCnqSCUai.jpg', 60, '2022-03-16 01:01:56', '2022-03-16 01:01:56'),
(158, 'zisOESfXpFz6WqwyJX41Hi0kN1HrBv.jpg', 60, '2022-03-16 01:01:56', '2022-03-16 01:01:56'),
(159, 'jB5t1g1LGFGMduhaKmcCLApRsKBRWG.jpg', 61, '2022-03-17 09:53:55', '2022-03-17 09:53:55'),
(160, 'nunGiGo1X4lZ8sRr3eefxVsP7gam3C.jpg', 61, '2022-03-17 09:53:55', '2022-03-17 09:53:55'),
(161, '32hhzGUYM5168ZGaCKZoJzFymNU856.jpg', 61, '2022-03-17 09:53:55', '2022-03-17 09:53:55'),
(162, 'nmetqvvmiTJs1zM7liiLiYpuvRHWxZ.jpg', 62, '2022-03-19 07:33:18', '2022-03-19 07:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_09_012618_shop_app_create_category', 2),
(6, '2022_03_09_012730_shop_app_create_product', 3),
(7, '2022_03_09_014115_shop_app_create_order', 4),
(8, '2022_03_09_020059_shop_app_create_order_details', 5),
(9, '2022_03_09_065314_shop_app_create_admin', 6),
(10, '2022_03_09_085856_shop_app_update_admin', 7),
(11, '2022_03_10_143252_create_images_table', 8),
(12, '2022_03_14_025557_add-img-to-category_table', 9),
(13, '2022_03_17_122911_add-img-to-users_table', 10),
(14, '2022_03_18_143801_create_cart_items_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statue` enum('pendding','approve','cenceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `address`, `email`, `phone`, `statue`, `created_at`, `updated_at`) VALUES
(2, 'mohammed', 'cairo', 'm@m.com', '01066018340', 'approve', '2022-03-18 14:43:12', '2022-03-18 14:43:12'),
(4, 'test', 'cairo', 'tt@tt.com', '878787', 'approve', '2022-03-18 20:28:17', '2022-03-18 20:28:17'),
(5, 'test', 'alex', 'tt@tt.com', '457868', 'pendding', '2022-03-18 21:05:13', '2022-03-18 21:05:13'),
(6, 'test', 'vv', 'tt@tt.com', '0145646', 'pendding', '2022-03-18 21:08:24', '2022-03-18 21:08:24'),
(7, 'mohammed', '23 sajkfhas', 'm@m.com', '784543', 'pendding', '2022-03-19 00:51:39', '2022-03-19 00:51:39'),
(9, 'mohammed', 'cairo', 'm@m.com', '01215421', 'approve', '2022-03-19 07:37:25', '2022-03-19 07:37:25'),
(10, 'update3', 'vv', 'update3@update3.com', '457868', 'approve', '2022-03-20 20:03:09', '2022-03-20 20:03:09'),
(11, 'mohammed', '23 sajkfhas', 'm@m.com', '7878', 'approve', '2022-03-20 21:08:08', '2022-03-20 21:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quentity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `quentity`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 2, 32, 2, '2022-03-18 14:43:12', '2022-03-18 14:43:12'),
(2, 1, 50, 2, '2022-03-18 14:43:13', '2022-03-18 14:43:13'),
(8, 3, 27, 4, '2022-03-18 20:28:17', '2022-03-18 20:28:17'),
(9, 1, 37, 4, '2022-03-18 20:28:17', '2022-03-18 20:28:17'),
(10, 3, 59, 5, '2022-03-18 21:05:13', '2022-03-18 21:05:13'),
(11, 1, 32, 5, '2022-03-18 21:05:13', '2022-03-18 21:05:13'),
(12, 2, 51, 6, '2022-03-18 21:08:24', '2022-03-18 21:08:24'),
(13, 5, 31, 7, '2022-03-19 00:51:39', '2022-03-19 00:51:39'),
(14, 3, 35, 7, '2022-03-19 00:51:40', '2022-03-19 00:51:40'),
(16, 3, 59, 10, '2022-03-20 20:03:09', '2022-03-20 20:03:09'),
(17, 1, 35, 10, '2022-03-20 20:03:10', '2022-03-20 20:03:10'),
(18, 2, 61, 11, '2022-03-20 21:08:09', '2022-03-20 21:08:09'),
(19, 1, 60, 11, '2022-03-20 21:08:09', '2022-03-20 21:08:09'),
(20, 3, 58, 11, '2022-03-20 21:08:09', '2022-03-20 21:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `pieces_no` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `img`, `price`, `pieces_no`, `category_id`, `created_at`, `updated_at`) VALUES
(27, 'Camera nekon 5g', 'Nekon 5g 2022', '6bEtp5GmVLgfsafWFgvWXq74EyKtlI.jpg', '250000.00', 45, 6, '2022-03-12 15:01:56', '2022-03-12 15:01:57'),
(28, 'Samsong Camera', 'Samasong', 'lr9aZAZNab3yD6GTNZrIntoMvajqix.jpg', '20000.00', 5, 6, '2022-03-12 15:02:44', '2022-03-12 15:02:45'),
(29, 'Nikon length', 'Nikon length for Nikon Camera', 'nS4rrkE2Va6amK6FoNrDfnxmL9Ciyo.jpg', '5000.00', 3, 6, '2022-03-12 15:03:55', '2022-03-12 15:03:55'),
(30, 'Camera Nikon 3', 'Camera Nikon 3 2019', 'LFACDDufxTlEYQfCDi7deEghmna3dc.jpg', '20000.00', 8, 6, '2022-03-12 15:04:58', '2022-03-12 15:04:59'),
(31, 'iphone13', 'Iphone13', 'P7SCWuOk47b0csnYk9OwuSiyY2xDlG.jpg', '20000.00', 6, 5, '2022-03-12 15:06:35', '2022-03-12 15:06:36'),
(32, 'Oppo A25', 'Oppo A25 mobile', 'WzgJAa598QVcsGs28sFBnglE6JSOVy.jpg', '12200.00', 8, 5, '2022-03-12 15:08:40', '2022-03-12 15:08:41'),
(33, 'Oppo A7', 'Oppo mobile', '5JlRjNnjwTahH4zMO3YAsVlrlxG5Y5.jpg', '5000.00', 5, 5, '2022-03-12 15:10:16', '2022-03-12 15:10:16'),
(34, 'Hawai Mobile', 'Hawai', '3L2HrqFZ9uTlR3OEX986BrRrqEBVWd.jpg', '7000.00', 13, 5, '2022-03-12 15:12:34', '2022-03-12 15:12:34'),
(35, 'Hp laptop i7', 'Hp  core i7 500Gg ssd  8ram', 'Ko9V3tYzNqMPNpWTFF3eS9L80MMQpL.jpg', '250000.00', 5, 4, '2022-03-12 15:15:06', '2022-03-12 15:15:06'),
(37, 'Lenovo ideapad core i7', 'Lenovo ideapad core i7', 'sxfeJSXcX5b200ATnvey2oyR3CRNXM.jpg', '12500.00', 7, 4, '2022-03-12 15:19:47', '2022-03-12 15:19:47'),
(38, 'Dell laptop', 'Dell laptop core i7 500 ssd', 'uDwznuLBMy52C0tuIw3LV4eMBs5G8U.jpg', '50000.00', 5, 4, '2022-03-12 15:20:42', '2022-03-12 15:20:43'),
(39, 'TUF', 'TUF laptop', 'FO80YahDvtyBVCiVJBa4D6nkpVfx2X.jpg', '10000.00', 10, 4, '2022-03-12 15:22:07', '2022-03-12 15:22:07'),
(40, 'Xio watch', 'Xio watch', '3l9sL6YfzNHdT2KKaPVaH8StkJZzA6.jpg', '1000.00', 10, 16, '2022-03-12 15:24:19', '2022-03-12 15:24:19'),
(41, 'Samsung watch', 'Samsong watch', 'VJzBxuo18dTlumZRicSW0Z7YIA6yix.jpg', '1500.00', 8, 16, '2022-03-12 15:25:26', '2022-03-12 15:25:26'),
(42, 'Hawai watch', 'Hawai Watch', 'ZemTIPuG0Rng4Wr7JdqSg8nEiVS2uG.jpg', '4000.00', 5, 16, '2022-03-12 15:26:25', '2022-03-12 15:26:25'),
(43, 'Apple Watch', 'Apple Watch', 'pBPAf7Z2g8VG80D7QTRg03anJmJchn.jpg', '10000.00', 3, 16, '2022-03-12 15:27:32', '2022-03-12 15:27:32'),
(44, 'Dell PCS Gaming', 'Dell Gaming', 'hNRwVOoZB7bYsFtaJIGd0gZHlazUQp.jpg', '20000.00', 5, 7, '2022-03-12 15:28:42', '2022-03-12 15:28:42'),
(45, 'Hp PCS', 'HP Caming', '4uBgNT7F6SgZVNb7L8GYpX0bw51Tsl.jpg', '4500.00', 3, 7, '2022-03-12 15:30:01', '2022-03-12 15:30:01'),
(46, 'Azura Gaming', 'Azura Gaming  pcs Rgb', 'k0nNpXaa9GH50PxOXj9MquxvgGWJPv.jpg', '20000.00', 10, 7, '2022-03-12 15:31:36', '2022-03-12 15:31:36'),
(47, 'Think center pc', 'Normal PCS for jobs', '92AV2LV5ZY5RCvCotG6fy3v66758W6.jpg', '4500.00', 7, 7, '2022-03-12 15:33:06', '2022-03-12 15:33:06'),
(50, 'Beat headphone', 'Beat headphone 2019', 'W1annARGgz2NAWirRJKUonaQWMrZqx.jpg', '500.00', 10, 18, '2022-03-13 21:43:14', '2022-03-13 21:43:15'),
(51, 'Sony headphone', 'Sony headphone 2018', 'qk0sb2pUQCTq2jjmuXuJoQODCOxONr.jpg', '700.00', 10, 18, '2022-03-13 21:44:08', '2022-03-13 21:44:08'),
(52, 'JBL Headphone', '15', '3uY0KLUA9H0QNxw0YrXagSP0PPCmLk.jpg', '300.00', 14, 18, '2022-03-13 21:45:02', '2022-03-13 21:45:02'),
(53, 'Headphone', 'Headphone2020', 'Alwz0VukqksiuyOYnNRPbjbuDvVluB.jpg', '150.00', 6, 18, '2022-03-13 21:45:51', '2022-03-13 21:45:52'),
(57, 'Lenovo Gaming 3', 'Lenovo Gaming 3  core I7 Ram 12Gg', 'hbu4MOnrx4k9SJAi4qoSucBS2EssDY.jpg', '250000.00', 50000, 4, '2022-03-16 00:46:42', '2022-03-16 00:46:42'),
(58, 'Nikon Camera', 'Nikon Camera 2010', 'AWoNYEx0pBgm4RlnP7qFJOsq6DFP5G.jpg', '35000.00', 7, 6, '2022-03-16 00:59:41', '2022-03-16 00:59:41'),
(59, 'Samsong Mobile', 'Samsong Mobile', 'mA25tY94weTHbPkrJnNNkL4cQ63ZzL.jpg', '5000.00', 5, 5, '2022-03-16 01:00:43', '2022-03-16 01:00:44'),
(60, 'Gamaing Labtops Dell', 'Gamaing Labtops Dell 12ram intell core i7 U', 's3Yt7pwo1kyb1WGLK7xgDQCnqSCUai.jpg', '8000.00', 3, 4, '2022-03-16 01:01:54', '2022-03-16 01:01:56'),
(61, 'test', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis sapiente recusandae tempora molestias quibusdam ipsa corporis suscipit quo. Impedit aspernatur obcaecati quia maiores at libero nisi voluptatibus non labore asperiores.', 'jB5t1g1LGFGMduhaKmcCLApRsKBRWG.jpg', '100.00', 2, 4, '2022-03-17 09:53:54', '2022-03-17 09:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `img`) VALUES
(21, 'mohammed', 'm@m.com', NULL, '$2y$10$pAf8bQ8D//I8my/sgtkgte8R5JOz7kGxWGh/v2ST5kl5XLioE0yvq', NULL, '2022-03-18 11:52:02', '2022-03-18 11:52:02', '1647611522.jpg'),
(24, 'mohamed', 'mohamedmagdymohamed982@gmail.com', NULL, '$2y$10$X7Eu7JEQOQcXNnGsjbQ3K.iDV.SowvTtuP4lvXdkvrOvODOduMN4.', NULL, '2022-03-19 00:46:36', '2022-03-19 00:46:36', '1647657996.jpg'),
(25, 'ttt', 'ttt@tt.com', NULL, '$2y$10$LgGqxVU7FSZ2Vvnh7tnBVe1p0c3k.N/yBh5VwD6c..H5vkwNLI1NS', NULL, '2022-03-19 00:47:56', '2022-03-19 00:47:56', '1647658076.jpg'),
(26, 'update', 'update@update.com', NULL, '$2y$10$syZUBKpB/l8EyxUnz6LY7.EyqqbB58Ppb.Jk9TTlIZBlPkF0039Bi', NULL, '2022-03-20 19:25:45', '2022-03-20 19:25:45', '1647811545.jpg'),
(27, 'update3', 'update3@update3.com', NULL, '$2y$10$z5Sohe4Gxw2uR32U99CKdejKnFG76gPkAvS6dPYbpeAH5ORr.wcHy', NULL, '2022-03-20 19:31:12', '2022-03-20 19:31:12', '1647811872.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
