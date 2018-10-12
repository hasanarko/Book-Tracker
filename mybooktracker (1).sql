-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2018 at 09:05 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybooktracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`, `admin_fullname`, `admin_type`, `admin_phone`, `admin_email`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'arabi kabir', 'super admin', '01944009966', 'arabikabir@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `already_read_books`
--

CREATE TABLE `already_read_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `already_read_books`
--

INSERT INTO `already_read_books` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-08-10 01:46:35', '2018-08-10 01:46:35'),
(12, 1, 5, '2018-08-10 08:07:40', '2018-08-10 08:07:40'),
(14, 1, 1, '2018-08-13 12:53:07', '2018-08-13 12:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `book_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_writer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_upload_userid` int(11) NOT NULL,
  `book_release_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_publishers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_counrty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_summary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_rating` double(8,2) DEFAULT NULL,
  `book_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_category`, `book_writer_name`, `book_upload_userid`, `book_release_year`, `book_publishers`, `book_language`, `book_counrty`, `book_summary`, `book_rating`, `book_picture`, `created_at`, `updated_at`) VALUES
(1, 'মধ্যবিত্ত', 'Science', 'কিঙ্কর আহ্‌সান', 1, '2017', 'বর্ষাদুপুর', 'Bangla', 'Bangladesh', '\'মধ্যবিত্ত\' আমাদের গল্প। এ গল্প বারবার মনে করার, ভালবাসার, চোখের জলে ভেজার।', 3.00, '1.jpg', '2018-08-06 09:12:19', '2018-08-27 12:44:08'),
(2, 'প্রোগ্রামিংয়ের বলদ টু বস', 'Encyclopedias', 'ঝংকার মাহবুব', 1, '2017', 'আদর্শ', 'Bangla', 'Bangladesh', 'আমার মত যারা হাবলু টাইপের মানে ফাকিবাজ, তাদের জন্য এই বইটা পারফেক্ট।', 2.50, '2.jpg', '2018-08-06 09:13:52', '2018-08-09 23:21:35'),
(3, 'মানবজনম', 'Drama', 'সাদাত হোসাইন', 1, '2017', 'ভাষাচিত্র', 'Bangla', 'Bangladesh', 'Good Book', 4.00, '3.jpg', '2018-08-06 09:15:54', '2018-08-09 23:21:08'),
(4, 'Data Communications and Networking', 'Science', 'Behrouz A. Forouzan', 1, '2013', 'Mcgraw Hill Education', 'English', 'America', 'Book about Data Communications and Networking', 4.00, '4data-communications-and-networking.jpg', '2018-08-06 09:21:40', '2018-08-09 22:55:37'),
(6, 'PHP and MySQL Web Development', 'Science', 'Laura Thomson ,  Luke Welling', 1, '2012', 'Pearson', 'English', 'America', 'web development book', 4.00, '6php-and-mysql-web-development.gif', '2018-08-06 09:25:50', '2018-08-27 12:25:30'),
(7, 'প্রোগ্রামিং কনটেস্ট ডেটা স্ট্রাকচার ও অ্যালগরিদম', 'Romance', 'মো: মাহবুবুল হাসান', 2, '2016', 'দ্বিমিক প্রকাশনী', 'Bangla', 'Bangladesh', 'প্রোগ্রামিং কনটেস্টে যারা মাঝামাঝি একটা লেভেলে আটকে আছে কিন্তু ইচ্ছা আছে আরো কয়েক লেভেল উপরে যাবার তাদের জন্য দারুণ একটি বই।', NULL, '7.gif', '2018-08-09 02:14:42', '2018-08-09 02:14:42'),
(10, 'উইংস অব ফায়ার', 'Biographies', 'এ. পি. জে. আবদুল কালাম ,  প্রমিত হোসেন (Translator)', 3, '2005', 'অন্যধারা', 'Bangla', 'India', 'Must Read Book', NULL, '10.jpg', '2018-08-12 03:50:04', '2018-08-12 03:50:04'),
(11, 'ঈশ্বরপুত্র', 'Mystery', 'প্রফুল্ল রায়', 1, '2015', 'দে’জ পাবলিশিং', 'Bangla', 'India', 'ই-ঈশ্বরপুত্র লেখক-প্রফুল্ল রায় ধরন-উপন্যাস পৃষ্ঠা-১৮৪ মূল্য-১৫০ দেজ পাবলিশিং ....', NULL, '11.jpg', '2018-08-27 12:40:50', '2018-08-27 12:40:50'),
(12, 'মেজদিদি', 'Drama', 'শরৎচন্দ্র চট্টোপাধ্যায়', 1, '1905', 'আপন প্রকাশ', 'Bangla', 'Bangladesh', 'Good Book', NULL, '12.gif', '2018-08-27 12:46:54', '2018-08-27 12:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `book_i_haves`
--

CREATE TABLE `book_i_haves` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_i_haves`
--

INSERT INTO `book_i_haves` (`id`, `book_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2018-08-07 03:50:36', '2018-08-07 03:50:36'),
(8, 7, 2, '2018-08-09 11:56:42', '2018-08-09 11:56:42'),
(9, 6, 1, '2018-08-09 14:11:54', '2018-08-09 14:11:54'),
(10, 4, 1, '2018-08-12 03:45:41', '2018-08-12 03:45:41'),
(11, 3, 1, '2018-08-14 00:05:43', '2018-08-14 00:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `book_ratings`
--

CREATE TABLE `book_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `myRating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_ratings`
--

INSERT INTO `book_ratings` (`id`, `user_id`, `book_id`, `myRating`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, '2018-08-09 21:28:23', '2018-08-09 21:48:42'),
(3, 1, 1, 2, '2018-08-09 21:53:20', '2018-08-11 01:04:20'),
(4, 1, 6, 4, '2018-08-09 21:55:49', '2018-08-09 21:55:49'),
(5, 2, 1, 2, '2018-08-09 22:32:19', '2018-08-09 22:32:19'),
(6, 2, 5, 4, '2018-08-09 22:36:23', '2018-08-09 22:42:21'),
(7, 3, 1, 5, '2018-08-09 22:44:35', '2018-08-09 22:46:52'),
(8, 3, 2, 3, '2018-08-09 22:55:06', '2018-08-09 22:55:06'),
(9, 1, 8, 4, '2018-08-09 23:04:29', '2018-08-09 23:04:29'),
(10, 1, 2, 2, '2018-08-09 23:14:56', '2018-08-09 23:21:35'),
(11, 1, 3, 4, '2018-08-09 23:21:08', '2018-08-09 23:21:08'),
(12, 1, 9, 2, '2018-08-11 01:24:14', '2018-08-12 03:43:34'),
(13, 3, 9, 5, '2018-08-12 03:47:09', '2018-08-12 03:47:16');

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
(1, '2018_07_29_120654_create_users_table', 1),
(2, '2018_08_05_070307_create_books_table', 1),
(3, '2018_08_07_082834_create_book_i_haves_table', 2),
(4, '2018_08_09_093204_create_reviews_table', 3),
(5, '2018_08_09_181146_create_book_ratings_table', 4),
(6, '2018_08_10_055640_create_want_to_read_books_table', 5),
(7, '2018_08_10_063139_create_already_read_books_table', 6),
(8, '2018_08_11_074531_create_admins_table', 7),
(9, '2018_08_11_193900_create_user_statuses_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `review`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 'বইটা পড়ে এমন ভাল লাগছে যা বলে বুঝাতে পারবোনা। আমি জানিনা কার কি ভাবনা কিন্তু আমার মনে হয় এই বইটা বাংলাদেশি প্রোগ্রামারদের জন্য বাইবেল স্ররূপ। এতো গুছিয়ে এইরকম একটা বিশাল সিলেবাস কাভার করা বই এর আগে পরিনি। ধন্যবাদ মাহাবুবুল স্যার।', '2018-08-09 04:10:27', '2018-08-09 04:10:27'),
(7, 2, 3, '\"সাদাত হোসাইন\" - নামটির সাথে পরিচয় দীর্ঘদিনের হলেও সাদাত হোসাইন এর লিখিত উপন্যাস এর সাথে পরিচয় এই প্রথম। অর্থাৎ আমার পড়া লেখক এর প্রথম বই এই \"মানবজনম\"। এবং নির্দ্বিধায় বলবো,লেখক তাঁর একজন পাগল পাঠক পেয়ে গেলেন। যে কিনা যেকোন উপায়ে সাদাত হোসাইন এর বই পড়ার জন্য পরবর্তীতে সর্বাত্মক প্রচেষ্টা অব্যাহত রাখবে। লেখক এর বইয়ের সাথে পূর্বে পরিচয় না হওয়ার একটাই কারণ, বইয়ের মূল্য আকাশচুম্বী। এত অধিক মূল্যের বই সংগ্রহের সামর্থ্যের অভাবেই এতদিন পড়ার সৌভাগ্য হয়নি। \"মানবজনম\" বইটি আমার অনেক সাধনার ফল। আর বই পড়ার পর অধিক মূল্য সংক্রান্ত যে অভিমান ও অভিযোগ লেখক এর ওপর ছিলো তা তুলে নিলাম। এমন একটা বই পড়ার জন্য মাটির ব্যাংকে পয়সা জমানোটাও জায়েজ আছে। আমি ভাবছি এই বই এর রিভিউ কীভাবে লিখবো! বই পড়তে সময় লেগেছে ৩ দিন, আর রিভিউ লিখতে সময় নিলাম ৭ দিন। তবুও বুঝতে পারছিনা কাহিনী সংক্ষেপ কীভাবে শুরু করবো! এটাতো কোন একরেখীয় কাহিনী নয়। বৃহৎ এক গোলকের কাহিনী এটি। যে গোলক এর চারপাশ ঘিরে ঘুরছি আমরা, এই মানব সমাজ। যে বৃত্তের পরিধি পার করতে একটি মানব এর একটি জন্ম লেগে যায়! সেই মানবজনম এর কাহিনী এটা! বইয়ের কোন চরিত্র মুখ্য আর কোন চরিত্র গৌণ হিসেবে ধরবো তা আমার ক্ষুদ্র মস্তিষ্কে সম্ভব হয়নি। এখানে প্রতিটি চরিত্র এক একটা আলাদা সত্ত্বা, তাদের সবার আলাদা জীবন কাহিনী। তাদের প্রত্যেকের জন্ম একেকটা মানবজনম। এই গল্পটি সবার। একজন বৃদ্ধের, একজন বৃদ্ধার, একজন তরুণ আর তরুণীর, এক কিশোরীর কিংবা এক প্রেমিকার। একটি সন্তানের, এক বোনের বা এক ভাইয়ের।', '2018-08-09 04:14:31', '2018-08-09 04:14:31'),
(8, 2, 1, 'After reading the first few pages given hear, I couldn\'t help myself but ordering the book. Guess, he is going to be next craze in Bangladeshi writers world!', '2018-08-09 04:19:35', '2018-08-09 04:19:35'),
(9, 1, 4, 'My major is computer science but this book almost made me seriously consider choosing a different area. I thankfully didn\'t but I came pretty close.\r\n\r\nWhy? Extremely poor explanation of topics, lack of good examples, and just an overall lack of engagement with the reader. I know the goal of a textbook like this isn\'t to entertain the reader, but at least make the material interesting and meaningful. Because it is, it\'s just the way the topic is presented here makes it so difficult to learn what is being taught that I doubt most people will find this book a good learning experience.', '2018-08-09 11:55:31', '2018-08-09 11:55:31'),
(10, 2, 4, 'As one of the fastest growing technologies in our culture today, data communications and networking presents a unique challenge for instructors. As both the number and types of students are increasing, it is essential to have a textbook that provides coverage of the latest advances, while presenting the material in a way that is accessible to students with little or no background in the field. Using a bottom-up approach, Data Communications and Networking presents this highly technical subject matter without relying on complex formulas by using a strong pedagogical approach supported by more than 700 figures.', '2018-08-09 11:56:12', '2018-08-09 11:56:12'),
(11, 1, 9, 'One of the great book of misir ali series', '2018-08-12 03:43:21', '2018-08-12 03:43:21'),
(12, 1, 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially u', '2018-08-27 12:35:57', '2018-08-27 12:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_city`, `user_address`, `user_email`, `user_phone`, `created_at`, `updated_at`) VALUES
(1, 'arabi', 'aa', 'arabi kabir', 'Dhaka', 'Dhanmondi', 'latifkabirarabi@gmail.com', '01944009966', '2018-08-06 09:03:28', '2018-08-06 09:03:28'),
(2, 'moin', 'as', 'Moin Khan', 'Dhaka', 'Nikunja', 'moin@gmail.com', '1234567', '2018-08-09 02:12:29', '2018-08-09 02:12:29'),
(3, 'ironman', 'qw', 'Tony Hasan', 'Dhaka', 'Noakhali Para', 'ironman@gmail.com', '00989754', '2018-08-09 22:44:19', '2018-08-09 22:44:19'),
(4, 'habib', 'as', 'Habib Khan', 'Dhaka', 'mirpur 11', 'habib@gmail.com', '01944009966', '2018-08-27 12:58:28', '2018-08-27 12:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `user_id`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'active', NULL, '2018-08-11 14:43:24'),
(2, 2, 'block', NULL, '2018-08-12 00:54:09'),
(3, 3, 'active', NULL, '2018-08-12 03:51:29'),
(4, 4, 'active', '2018-08-27 12:58:28', '2018-08-27 12:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `want_to_read_books`
--

CREATE TABLE `want_to_read_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `want_to_read_books`
--

INSERT INTO `want_to_read_books` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(8, 1, 12, '2018-08-27 12:47:24', '2018-08-27 12:47:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `already_read_books`
--
ALTER TABLE `already_read_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_i_haves`
--
ALTER TABLE `book_i_haves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_ratings`
--
ALTER TABLE `book_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_user_email_unique` (`user_email`);

--
-- Indexes for table `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `want_to_read_books`
--
ALTER TABLE `want_to_read_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `already_read_books`
--
ALTER TABLE `already_read_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_i_haves`
--
ALTER TABLE `book_i_haves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `book_ratings`
--
ALTER TABLE `book_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `want_to_read_books`
--
ALTER TABLE `want_to_read_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
