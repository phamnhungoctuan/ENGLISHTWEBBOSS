-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 12:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_05_07_150726_create_category_table', 1),
('2017_05_07_150835_create_news_table', 1),
('2017_05_12_230058_create_template_table', 2),
('2017_05_22_194936_create_lesson_table', 3),
('2017_05_22_195415_create_task_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pt32_category`
--

CREATE TABLE `pt32_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_category`
--

INSERT INTO `pt32_category` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Chưa phân loại', 'chua-phan-loai', 0, '2017-05-10 17:00:00', NULL),
(21, '  Tiếng anh cơ bản', 'tieng-anh-co-ban', 0, '2017-05-08 18:39:25', '2017-05-12 06:15:36'),
(22, 'Tiếng anh giao tiếp', 'tieng-anh-giao-tiep', 0, '2017-05-08 18:39:36', '2017-05-08 18:39:36'),
(25, 'Khóa học cơ bản 1', 'khoa-hoc-co-ban-1', 21, '2017-05-08 18:40:40', '2017-05-08 18:40:40'),
(26, 'Khóa học cơ bản 2', 'khoa-hoc-co-ban-2', 21, '2017-05-08 18:40:48', '2017-05-08 18:40:48'),
(27, 'Giao tiếp cơ bản', 'giao-tiep-co-ban', 22, '2017-05-08 18:40:58', '2017-05-08 18:40:58'),
(28, 'Tiếng anh kinh tế', 'tieng-anh-kinh-te', 21, '2017-05-08 18:41:08', '2017-05-08 18:41:08'),
(30, 'Tiếng anh maketing', 'tieng-anh-maketing', 21, '2017-05-08 18:55:07', '2017-05-08 18:55:07'),
(37, 'Giao tiếp nâng cao', 'giao-tiep-nang-cao', 22, '2017-05-10 09:20:35', '2017-05-10 09:20:35'),
(38, 'Giao tiếp kinh tế', 'giao-tiep-kinh-te', 22, '2017-05-10 09:20:45', '2017-05-10 09:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `pt32_lesson`
--

CREATE TABLE `pt32_lesson` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro_video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `new_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_lesson`
--

INSERT INTO `pt32_lesson` (`id`, `name`, `intro_video`, `url`, `parent_id`, `new_id`, `created_at`, `updated_at`) VALUES
(10, 'Past 1', 'YAVDRPb5PYQ', 'past-1', 0, 27, '2017-05-24 03:11:04', '2017-05-24 03:11:04'),
(11, 'Lesson 1 Học từ vựng', 'YAVDRPb5PYQ', 'lesson-1-name', 10, 27, '2017-05-24 03:14:15', '2017-05-24 05:29:30'),
(12, 'Lesson 2 Ngữ pháp', 'YAVDRPb5PYQ', 'lesson-2-name', 10, 27, '2017-05-24 05:28:54', '2017-05-24 05:33:01'),
(13, 'Lesson 3 Speaking', 'YAVDRPb5PYQ', 'lesson-3-name', 10, 27, '2017-05-24 05:29:47', '2017-05-24 05:29:47'),
(14, 'Past 2', 'YAVDRPb5PYQ', 'past-2', 0, 27, '2017-05-24 05:29:57', '2017-05-24 05:30:02'),
(15, 'Lesson 1 Học ăn', 'YAVDRPb5PYQ', 'lesson-1-name', 14, 27, '2017-05-24 05:30:17', '2017-05-24 05:30:17'),
(16, 'Lesson 2 Học nói', 'YAVDRPb5PYQ', 'lesson-2-name', 14, 27, '2017-05-24 05:30:30', '2017-05-24 05:30:30'),
(17, 'Lesson 3 Học gói, học mở', 'YAVDRPb5PYQ', 'lesson-3-name', 14, 27, '2017-05-24 05:30:43', '2017-05-24 05:30:43'),
(18, 'Past 1', '', 'past-1', 0, 26, '2017-05-24 06:00:02', '2017-05-24 06:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `pt32_news`
--

CREATE TABLE `pt32_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `full` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_news`
--

INSERT INTO `pt32_news` (`id`, `title`, `url`, `author`, `video`, `cost`, `intro`, `full`, `image`, `status`, `category_id`, `users_id`, `created_at`, `updated_at`) VALUES
(14, 'Những kỹ năng học tiếng anh cơ bản 1', 'nhung-ky-nang-hoc-tieng-anh-co-ban-1', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other..\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590181.E1.jpg', '1', 21, 1, '2017-05-12 11:56:21', '2017-05-12 11:56:21'),
(15, 'Tiếng anh cơ bản 1', 'tieng-anh-co-ban-1', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590215.e2.png', '1', 21, 1, '2017-05-12 11:56:55', '2017-05-12 11:56:55'),
(16, 'Tiếng Anh cơ bản 2', 'tieng-anh-co-ban-2', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590237.english-time.jpg', '1', 21, 1, '2017-05-12 11:57:17', '2017-05-12 11:57:17'),
(17, 'Những điều cần biết khi muốn học Tiếng Anh', 'nhung-dieu-can-biet-khi-muon-hoc-tieng-anh', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each othe\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590257.e4.jpg', '1', 21, 1, '2017-05-12 11:57:37', '2017-05-12 11:57:37'),
(18, 'Làm thế nào để học tốt tiếng anh', 'lam-the-nao-de-hoc-tot-tieng-anh', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590275.s3.jpg', '1', 21, 1, '2017-05-12 11:57:55', '2017-05-12 11:57:55'),
(19, 'Làm thế nào để giao tiếp giỏi', 'lam-the-nao-de-giao-tiep-gioi', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590353.E1.jpg', '1', 22, 1, '2017-05-12 11:59:13', '2017-05-12 11:59:13'),
(20, 'Giao tiếp cơ bản cho người mất gốc', 'giao-tiep-co-ban-cho-nguoi-mat-goc', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590369.english-time.jpg', '1', 22, 1, '2017-05-12 11:59:29', '2017-05-12 11:59:29'),
(21, 'Bạn muốn giao tiếp tiếng anh giỏi?', 'ban-muon-giao-tiep-tieng-anh-gioi', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590389.s3.jpg', '1', 22, 1, '2017-05-12 11:59:49', '2017-05-12 11:59:50'),
(22, 'Khóa học giao tiếp cơ bản', 'khoa-hoc-giao-tiep-co-ban', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other</p>\r\n', '1494590410.e2.png', '1', 22, 1, '2017-05-12 12:00:10', '2017-05-12 12:00:10'),
(23, 'Khóa học giao tiếp nâng cao', 'khoa-hoc-giao-tiep-nang-cao', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to &quot;how are you&quot; in English. See how Americans greet each other\n', '<p>Để đ&aacute;p ứng nhu cầu tuyển dụng của c&aacute;c doanh nghiệp, c&aacute;c bạn trẻ đ&atilde; nỗ lực học v&agrave;&nbsp;<strong><a href=\"http://ml.edu.vn/luyen-thi-toeic\">luyện thi TOEIC</a></strong>&nbsp;để lấy được tấm bằng n&agrave;y bằng c&aacute;ch t&igrave;m đến c&aacute;c Trung t&acirc;m tiếng Anh uy t&iacute;n tại H&agrave; Nội. L&agrave; một trong những&nbsp;<strong>Trung t&acirc;m luyện thi TOEIC l&ecirc;n điểm nhanh nhất H&agrave; Nội</strong>, Multi Language đ&atilde; gi&uacute;p rất nhiều học vi&ecirc;n đạt điểm cao trong c&aacute;c kỳ thi TOEIC chỉ trong một thời gian ngắn. Kh&oacute;a học TOEIC tại Multi Language được thiết kế d&agrave;nh cho nhiều đối tượng học vi&ecirc;n với mục đ&iacute;ch bất cứ ai, d&ugrave; người mới bắt đầu chập chững học tiếng Anh cho đến những người đi l&agrave;m cần n&acirc;ng cao TOEIC để ph&aacute;t triển sự nghiệp trong thời gian ngắn nhất đều c&oacute; thể theo học. C&ugrave;ng t&igrave;m hiểu xem<strong>chương tr&igrave;nh luyện thi TOEIC</strong>&nbsp;tại Multi Language c&oacute; g&igrave; đặc biệt nh&eacute;.</p>\n', '1494590426.e4.jpg', '1', 22, 1, '2017-05-12 12:00:26', '2017-05-12 12:00:26'),
(24, 'Mỗi ngày học là một ngày vui', 'moi-ngay-hoc-la-mot-ngay-vui', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to \"how are you\" in English. See how Americans greet each other', '<p>Để đ&aacute;p ứng nhu cầu tuyển dụng của c&aacute;c doanh nghiệp, c&aacute;c bạn trẻ đ&atilde; nỗ lực học v&agrave;&nbsp;<strong><a href=\"http://ml.edu.vn/luyen-thi-toeic\">luyện thi TOEIC</a></strong>&nbsp;để lấy được tấm bằng n&agrave;y bằng c&aacute;ch t&igrave;m đến c&aacute;c Trung t&acirc;m tiếng Anh uy t&iacute;n tại H&agrave; Nội. L&agrave; một trong những&nbsp;<strong>Trung t&acirc;m luyện thi TOEIC l&ecirc;n điểm nhanh nhất H&agrave; Nội</strong>, Multi Language đ&atilde; gi&uacute;p rất nhiều học vi&ecirc;n đạt điểm cao trong c&aacute;c kỳ thi TOEIC chỉ trong một thời gian ngắn. Kh&oacute;a học TOEIC tại Multi Language được thiết kế d&agrave;nh cho nhiều đối tượng học vi&ecirc;n với mục đ&iacute;ch bất cứ ai, d&ugrave; người mới bắt đầu chập chững học tiếng Anh cho đến những người đi l&agrave;m cần n&acirc;ng cao TOEIC để ph&aacute;t triển sự nghiệp trong thời gian ngắn nhất đều c&oacute; thể theo học. C&ugrave;ng t&igrave;m hiểu xem<strong>chương tr&igrave;nh luyện thi TOEIC</strong>&nbsp;tại Multi Language c&oacute; g&igrave; đặc biệt nh&eacute;.</p>\n', '1494609694.E1.jpg', '1', 21, 1, '2017-05-12 17:21:34', '2017-05-12 17:21:34'),
(25, 'Học tiếng Anh để có việc làm', 'hoc-tieng-anh-de-co-viec-lam', 'admin', 'YAVDRPb5PYQ', NULL, 'Learn how to pronounce and respond to \"how are you\" in English. See how Americans greet each other', '<p>Để đ&aacute;p ứng nhu cầu tuyển dụng của c&aacute;c doanh nghiệp, c&aacute;c bạn trẻ đ&atilde; nỗ lực học v&agrave;&nbsp;<strong><a href=\"http://ml.edu.vn/luyen-thi-toeic\">luyện thi TOEIC</a></strong>&nbsp;để lấy được tấm bằng n&agrave;y bằng c&aacute;ch t&igrave;m đến c&aacute;c Trung t&acirc;m tiếng Anh uy t&iacute;n tại H&agrave; Nội. L&agrave; một trong những&nbsp;<strong>Trung t&acirc;m luyện thi TOEIC l&ecirc;n điểm nhanh nhất H&agrave; Nội</strong>, Multi Language đ&atilde; gi&uacute;p rất nhiều học vi&ecirc;n đạt điểm cao trong c&aacute;c kỳ thi TOEIC chỉ trong một thời gian ngắn. Kh&oacute;a học TOEIC tại Multi Language được thiết kế d&agrave;nh cho nhiều đối tượng học vi&ecirc;n với mục đ&iacute;ch bất cứ ai, d&ugrave; người mới bắt đầu chập chững học tiếng Anh cho đến những người đi l&agrave;m cần n&acirc;ng cao TOEIC để ph&aacute;t triển sự nghiệp trong thời gian ngắn nhất đều c&oacute; thể theo học. C&ugrave;ng t&igrave;m hiểu xem<strong>chương tr&igrave;nh luyện thi TOEIC</strong>&nbsp;tại Multi Language c&oacute; g&igrave; đặc biệt nh&eacute;.</p>\n', '1494609714.s3.jpg', '1', 21, 1, '2017-05-12 17:21:54', '2017-05-12 17:21:54'),
(26, 'Giao tiếp khác gì với văn viết', 'giao-tiep-khac-gi-voi-van-viet', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Learn how to pronounce and respond to \"how are you\" in English. See how Americans greet each other', '<p>Để đ&aacute;p ứng nhu cầu tuyển dụng của c&aacute;c doanh nghiệp, c&aacute;c bạn trẻ đ&atilde; nỗ lực học v&agrave;&nbsp;<strong><a href=\"http://ml.edu.vn/luyen-thi-toeic\">luyện thi TOEIC</a></strong>&nbsp;để lấy được tấm bằng n&agrave;y bằng c&aacute;ch t&igrave;m đến c&aacute;c Trung t&acirc;m tiếng Anh uy t&iacute;n tại H&agrave; Nội. L&agrave; một trong những&nbsp;<strong>Trung t&acirc;m luyện thi TOEIC l&ecirc;n điểm nhanh nhất H&agrave; Nội</strong>, Multi Language đ&atilde; gi&uacute;p rất nhiều học vi&ecirc;n đạt điểm cao trong c&aacute;c kỳ thi TOEIC chỉ trong một thời gian ngắn. Kh&oacute;a học TOEIC tại Multi Language được thiết kế d&agrave;nh cho nhiều đối tượng học vi&ecirc;n với mục đ&iacute;ch bất cứ ai, d&ugrave; người mới bắt đầu chập chững học tiếng Anh cho đến những người đi l&agrave;m cần n&acirc;ng cao TOEIC để ph&aacute;t triển sự nghiệp trong thời gian ngắn nhất đều c&oacute; thể theo học. C&ugrave;ng t&igrave;m hiểu xem<strong>chương tr&igrave;nh luyện thi TOEIC</strong>&nbsp;tại Multi Language c&oacute; g&igrave; đặc biệt nh&eacute;.</p>\n', '1494609839.E1.jpg', '1', 22, 1, '2017-05-12 17:23:59', '2017-05-12 17:23:59'),
(27, 'Làm thế nào để tăng chất lượng kỹ năng giao tiếp', 'lam-the-nao-de-tang-chat-luong-ky-nang-giao-tiep', 'admin', 'YAVDRPb5PYQ', '200.00 VND', 'Là một trong những Trung tâm luyện thi TOEIC lên điểm nhanh nhất Hà Nội, Multi Language đã giúp rất nhiều học viên đạt điểm cao trong các kỳ thi TOEIC chỉ trong một thời gian ngắn', '<p>Để đ&aacute;p ứng nhu cầu tuyển dụng của c&aacute;c doanh nghiệp, c&aacute;c bạn trẻ đ&atilde; nỗ lực học v&agrave;&nbsp;<strong><a href=\"http://ml.edu.vn/luyen-thi-toeic\">luyện thi TOEIC</a></strong>&nbsp;để lấy được tấm bằng n&agrave;y bằng c&aacute;ch t&igrave;m đến c&aacute;c Trung t&acirc;m tiếng Anh uy t&iacute;n tại H&agrave; Nội. L&agrave; một trong những&nbsp;<strong>Trung t&acirc;m luyện thi TOEIC l&ecirc;n điểm nhanh nhất H&agrave; Nội</strong>, Multi Language đ&atilde; gi&uacute;p rất nhiều học vi&ecirc;n đạt điểm cao trong c&aacute;c kỳ thi TOEIC chỉ trong một thời gian ngắn. Kh&oacute;a học TOEIC tại Multi Language được thiết kế d&agrave;nh cho nhiều đối tượng học vi&ecirc;n với mục đ&iacute;ch bất cứ ai, d&ugrave; người mới bắt đầu chập chững học tiếng Anh cho đến những người đi l&agrave;m cần n&acirc;ng cao TOEIC để ph&aacute;t triển sự nghiệp trong thời gian ngắn nhất đều c&oacute; thể theo học. C&ugrave;ng t&igrave;m hiểu xem<strong>chương tr&igrave;nh luyện thi TOEIC</strong>&nbsp;tại Multi Language c&oacute; g&igrave; đặc biệt nh&eacute;.</p>\n', '1494609865.english-time.jpg', '1', 22, 1, '2017-05-12 17:24:25', '2017-05-24 05:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `pt32_password_resets`
--

CREATE TABLE `pt32_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pt32_task`
--

CREATE TABLE `pt32_task` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `A` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `C` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `D` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_task`
--

INSERT INTO `pt32_task` (`id`, `question`, `content`, `type`, `A`, `B`, `C`, `D`, `answer`, `lesson_id`, `created_at`, `updated_at`) VALUES
(13, 'Yêu cầu câu hỏi 1?', '<p>I think the restaurant which you told me in the letter is very interesting. I also like to eat out and I usually go to a restaurant for dinner with my family tiwce a month. Our favourite restaurant is a traditional restaurant in Hang Bong street. It is not big but it is always busy. There are only afew tables in the restaurant and on each table is a vase with lovely flowers. There are plants in the room corners. I usually order the traditional dishes and eat them with rice. For example, fish cooked with sauce, spring roll,…and vegetable and so on. The food is deliciuous so we enjoy it very much. The service is also quick and frienfdly . My family always have pleasant evening at our favourite restaurant.</p>', 1, 'Nội dung đáp án A', 'Nội dung đáp án B', 'Nội dung đáp án C', 'Nội dung đáp án D', 'A', 11, '2017-05-24 03:23:16', '2017-05-24 03:23:16'),
(14, 'Yêu cầu câu hỏi 2?', '1495596295.swim.jpg', 2, 'Đáp án A', 'Đáp án B', 'Đáp án C', 'Đáp án D', 'A', 11, '2017-05-24 03:24:55', '2017-05-24 03:24:55'),
(16, 'Đây là ai?', '1495601663.images.png', 2, 'Em bé', 'Công nhân', 'Tài xế', 'Phi công', 'A', 11, '2017-05-24 04:32:47', '2017-05-24 04:54:23'),
(18, 'Nội dung câu hỏi?', '1495603899.images.jpg', 2, 'Đáp án A', 'Đáp án B', 'Đáp án C', 'Đáp án D', 'A', 12, '2017-05-24 05:31:39', '2017-05-24 05:31:50'),
(19, 'Nội dung câu hỏi?', '<p>I think the restaurant which you told me in the letter is very interesting. I also like to eat out and I usually go to a restaurant for dinner with my family tiwce a month. Our favourite restaurant is a traditional restaurant in Hang Bong street. It is not big but it is always busy. There are only afew tables in the restaurant and on each table is a vase with lovely flowers. There are plants in the room corners. I usually order the traditional dishes and eat them with rice. For example, fish cooked with sauce, spring roll,…and vegetable and so on. The food is deliciuous so we enjoy it very much. The service is also quick and frienfdly . My family always have pleasant evening at our favourite restaurant.</p>', 1, 'Đáp án A', 'Đáp án B', 'Đáp án C', 'Đáp án D', 'A', 12, '2017-05-24 05:32:35', '2017-05-24 05:32:50'),
(20, 'Câu hỏi thử nghiệm?', 'asdasdasd', 4, 'Đáp án A', 'Đáp án B', 'Đáp án C', 'Đáp án D', 'A', 11, '2017-05-24 07:56:28', '2017-05-24 07:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `pt32_template`
--

CREATE TABLE `pt32_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_template`
--

INSERT INTO `pt32_template` (`id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '21', '2017-05-11 17:00:00', NULL),
(2, '22', '2017-05-11 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pt32_users`
--

CREATE TABLE `pt32_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `save_pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pt32_users`
--

INSERT INTO `pt32_users` (`id`, `username`, `email`, `password`, `save_pass`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$tpGvxBfEXd8dUQAtCJP./u9bXi91ACquwMs6H4Ln3R8v1fAHxgG7K', 'admin', 1, 'WO9KJon8v57CdlNUCE6VCIevQgF7ChytBLv8ewExt90PKgZ1zUOgLVdMcWBp', '2017-05-11 10:15:37', '2017-05-14 07:28:13'),
(3, 'mod', 'mod@gmail.com', '$2y$10$/hXrhkDD6qaG2l/SJgwvc./cCLctZKszI1yqf/QSW8pxhhaOzBNWy', '1234', 2, 'ocGbIPTyOJZBDmOaWplNu7RzZfx7GAcgTcZgLRx1jrwBi51aEIihL6uPYAES', '2017-05-07 16:36:37', '2017-05-11 09:40:16'),
(4, 'member', 'member@gmail.com', '$2y$10$8ka/kgLAhUn/LoMMlg6JAu8wvMDsPe9FIjcvculpijtOKtxHjKbbO', '1234', 3, NULL, '2017-05-07 16:37:02', '2017-05-11 09:40:38'),
(7, 'phanthanh', 'thanh@gmail.com', '$2y$10$lzrSr2mmHOhG9PtHwYD9JuwW9Yjqu1WdT1r/kpyVNtcKfk4jFqhMC', '1234', 3, 'X8egIHzQSD2EEOqiJ8oAqkgeq3htAb7xxeaxLlleBLG0M084rrfjbextZVlk', '2017-05-10 15:14:27', '2017-05-11 09:40:44'),
(11, 'tt1', 'tt1@gmail.com', '$2y$10$CsPLe3VnBHQLQ4CDuwlULuDk0.VsoXSv1KVtBRRzlsFSdE96XZJUC', '1234', 3, 'TyHYoZ5MsIiAbPIF6HvR2bzb6FKi82cX9tntjLtRbzXtbwf7CnDbmlDW7hrS', '2017-05-10 15:17:58', '2017-05-11 09:41:12'),
(13, 'tt3', 'tt3@gmail.com', '$2y$10$eNpgVljVJngE9okKduiIgu43jQHmo0kmLoSaBvaxy0TTTBK50NEnK', '1234', 3, NULL, '2017-05-10 15:19:15', '2017-05-11 09:41:25'),
(14, 'tt4', 'tt4@gmail.com', '$2y$10$3bxt.zGETlA5E6tw7jHJPeiupiPA0UCyHVAYiwK3MEm8hnF5zGEV.', '1234', 3, NULL, '2017-05-10 15:19:40', '2017-05-11 09:41:37'),
(15, 'tt5', 'tt5@gmail.com', '$2y$10$9TBi9pGQZk7ezWPmUEzVYOFbo4Rqu0ugtm6y0.9QalO.ZfC3o6jdq', '1234', 3, 'OTRnREIKFxwSzRSNB2Eq6aRpFQ5ox4KfJtWnRDm4IhqyVdiLcHu3ZYf03Q04', '2017-05-10 15:20:43', '2017-05-11 09:41:43'),
(16, 'tt6', 'tt6@gmail.com', '$2y$10$Pr.nHPjHPITU0Zi8lYgAROHFgTJU/nKe.v3XJ10VVCF2ZBaa4K4Cy', '12324', 3, 'a7VNfEpMc6UIFQ8ZyepyrCPUkyEkQlPwvCXSTjTvaS7tnBszmOGYK7VABb3s', '2017-05-10 15:21:06', '2017-05-11 09:59:07'),
(22, 'kaka', 'kaka@gmail.com', '$2y$10$VlLUTfKsf.PE666m.D3.tOexal2oassyVvUWdS1ZZ.XTIP1l4Kudy', 'admin', 1, 'FxcdGOpPWOkzOSak82k5b4J8rBlEPBxH6cr0jlzoY6MAbPUOSvSfpbQd98EK', '2017-05-11 09:19:22', '2017-05-11 09:46:56'),
(23, 'sdsd', 'dsd@gmail.com', '$2y$10$z8isCM7RTzpTF.X26btr8upJa6XTujj9q2nn/1/G/T8hbS4g22lkC', '1234', 3, NULL, '2017-05-24 05:02:43', '2017-05-24 05:02:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pt32_category`
--
ALTER TABLE `pt32_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pt32_category_name_unique` (`name`);

--
-- Indexes for table `pt32_lesson`
--
ALTER TABLE `pt32_lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt32_lesson_new_id_foreign` (`new_id`);

--
-- Indexes for table `pt32_news`
--
ALTER TABLE `pt32_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt32_news_category_id_foreign` (`category_id`),
  ADD KEY `pt32_news_users_id_foreign` (`users_id`);

--
-- Indexes for table `pt32_password_resets`
--
ALTER TABLE `pt32_password_resets`
  ADD KEY `pt32_password_resets_email_index` (`email`),
  ADD KEY `pt32_password_resets_token_index` (`token`);

--
-- Indexes for table `pt32_task`
--
ALTER TABLE `pt32_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pt32_task_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `pt32_template`
--
ALTER TABLE `pt32_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pt32_users`
--
ALTER TABLE `pt32_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pt32_users_username_unique` (`username`),
  ADD UNIQUE KEY `pt32_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pt32_category`
--
ALTER TABLE `pt32_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pt32_lesson`
--
ALTER TABLE `pt32_lesson`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pt32_news`
--
ALTER TABLE `pt32_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pt32_task`
--
ALTER TABLE `pt32_task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pt32_template`
--
ALTER TABLE `pt32_template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pt32_users`
--
ALTER TABLE `pt32_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pt32_lesson`
--
ALTER TABLE `pt32_lesson`
  ADD CONSTRAINT `pt32_lesson_new_id_foreign` FOREIGN KEY (`new_id`) REFERENCES `pt32_news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pt32_news`
--
ALTER TABLE `pt32_news`
  ADD CONSTRAINT `pt32_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `pt32_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pt32_news_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `pt32_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pt32_task`
--
ALTER TABLE `pt32_task`
  ADD CONSTRAINT `pt32_task_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `pt32_lesson` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
