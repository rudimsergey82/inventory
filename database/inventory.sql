-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 17 2017 г., 14:46
-- Версия сервера: 5.7.19
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `inventory`
--

-- --------------------------------------------------------

--
-- Структура таблицы `audits`
--

CREATE TABLE `audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `place_id` int(11) NOT NULL,
  `date_check` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `audits`
--

INSERT INTO `audits` (`id`, `place_id`, `date_check`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, '2017-09-01', NULL, NULL, NULL),
(2, 2, '2017-10-16', NULL, NULL, NULL),
(3, 21, '2017-10-16', NULL, NULL, NULL),
(4, 3, NULL, '2017-10-17 08:10:59', '2017-10-17 08:10:59', NULL),
(5, 1, NULL, '2017-10-17 08:40:39', '2017-10-17 08:40:39', NULL),
(6, 22, NULL, '2017-10-17 09:37:00', '2017-10-17 09:37:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `audit_items`
--

CREATE TABLE `audit_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `audit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_status` enum('ok','fail','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ok',
  `item_date_check` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `audit_items`
--

INSERT INTO `audit_items` (`id`, `audit_id`, `item_id`, `item_status`, `item_date_check`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'new', NULL, '2017-08-31 21:00:00', NULL, NULL),
(2, 1, 5, 'new', NULL, '2017-08-31 21:00:00', NULL, NULL),
(3, 1, 3, 'new', NULL, '2017-08-31 21:00:00', NULL, NULL),
(4, 2, 2, 'new', '2017-10-15 21:00:00', '2017-10-16 20:28:47', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(5, 2, 2, 'ok', '2017-10-16 21:00:00', '2017-10-17 06:41:16', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(6, 2, 2, 'fail', '2017-10-16 21:00:00', '2017-10-17 06:41:35', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(7, 2, 2, 'ok', '2017-10-16 21:00:00', '2017-10-17 06:52:06', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(8, 4, 2, 'new', '2017-10-16 21:00:00', '2017-10-17 08:10:59', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(9, 4, 2, 'new', '2017-10-16 21:00:00', '2017-10-17 08:11:08', '2017-10-17 09:19:12', '2017-10-17 09:19:12'),
(10, 6, 2, 'new', '2017-10-16 21:00:00', '2017-10-17 09:49:23', '2017-10-17 09:49:23', NULL),
(11, 6, 2, 'new', '2017-10-16 21:00:00', '2017-10-17 09:52:55', '2017-10-17 09:52:55', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `name_item` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification_number` bigint(20) NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci,
  `date_create` date NOT NULL,
  `date_buy` date NOT NULL,
  `coast` decimal(9,2) NOT NULL,
  `date_input_use` date NOT NULL,
  `guarantee` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`item_id`, `name_item`, `identification_number`, `serial_number`, `specifications`, `date_create`, `date_buy`, `coast`, `date_input_use`, `guarantee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hammer', 111111, '10000001', 'material: steel and tree', '2017-01-01', '2017-01-02', '55.55', '2017-01-05', 10, NULL, NULL, NULL),
(2, 'Hammer', 111001, '101010101', 'material: steel and forest', '2001-01-20', '2001-02-20', '55.00', '2005-02-20', 10, NULL, NULL, NULL),
(3, 'Screwdriver', 100001, '101', 'material: steel and plastic', '2001-01-20', '2001-02-20', '5.00', '2005-02-20', 5, NULL, NULL, NULL),
(4, 'Mouse CS-304', 1137462, 'SV0905AR11800', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, NULL, NULL, NULL),
(5, 'Mouse CS-304', 1137463, 'SV0905AR11822', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 10:39:50', '2017-09-05 10:39:50', NULL),
(6, 'Mouse CS-304', 1137465, 'SV0905AR11855', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 12:07:23', '2017-09-05 12:07:23', NULL),
(7, 'PC14', 6623344, '66123132123', 'eeek', '2014-08-24', '2014-09-24', '10080.00', '2014-09-20', 12, NULL, NULL, NULL),
(8, 'Mouse CS-305', 1115555, '1115555', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-14 11:13:19', '2017-10-14 11:13:19', NULL),
(9, 'Mouse CS-305', 1111166, '11122323131', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-16 07:58:57', '2017-10-16 07:58:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_17_122403_create_items_table', 2),
(4, '2017_08_28_164248_update_items_table', 3),
(5, '2017_08_29_131644_create_place_table', 4),
(6, '2017_08_29_142449_create_place_item_table', 4),
(7, '2017_09_01_182242_create_audits_table', 4),
(8, '2017_09_12_122118_create_audit_items_table', 5),
(9, '2017_10_16_181752_create_roles_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Volands.ua@gmail.com', '$2y$10$QwPB51F0HK7s1t4MYIH7KOz.Sv8JiQxzlOHQszf0LSUXsRw9eO3JK', '2017-10-14 10:40:39');

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name_place`, `type_place`, `parent_id`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A-level', 'Company', 0, '/A-level', NULL, '2017-10-02 14:30:06', NULL),
(2, 'Green', 'Room', 1, '/A-level/Green', NULL, '2017-10-02 16:02:33', NULL),
(3, 'Blue', 'Room', 1, '/A-level/Blue', NULL, '2017-10-02 16:02:43', NULL),
(4, 'Teacher_Y01', 'place', 10, '/A-level/Yellow', NULL, NULL, NULL),
(5, 'Teacher_G01', 'place', 2, '/A-level/Green/Teacher_G01', NULL, NULL, NULL),
(6, 'Student_Y01', 'place', 10, '/A-level/Yellow/Student_Y01', NULL, NULL, NULL),
(7, 'Student_Y02', 'place', 10, '/A-level/Yellow/Student_Y02', NULL, NULL, NULL),
(8, 'Student_G01', 'place', 2, '/A-level/Green/Student_G01', NULL, NULL, NULL),
(9, 'Student_B01', 'place', 3, '/A-level/Blue/Student_B01', NULL, NULL, NULL),
(10, 'Yellow', 'Room', 1, '/A-level/Yellow', NULL, '2017-10-02 16:02:58', NULL),
(11, 'Black', 'Room', 1, '/A-level/Black', NULL, '2017-10-02 16:05:03', NULL),
(12, 'Teacher_Bl01', 'place', 11, '/A-level/Black/Teacher_Bl01', '2017-09-14 10:14:46', '2017-09-14 10:14:46', NULL),
(13, 'White', 'Room', 1, '/A-level/White', '2017-09-14 10:31:33', '2017-10-02 16:04:26', NULL),
(14, 'Student_B02', 'place', 3, '/A-level/Blue/Student_B02', '2017-09-14 10:43:17', '2017-09-14 10:43:17', NULL),
(15, 'Student_B04', 'place', 3, '/A-level/Blue/Student_B04', '2017-09-15 12:10:39', '2017-09-15 12:10:39', NULL),
(16, 'Student_Y03', 'place', 10, '/A-level/Yellow/Student_Y03', '2017-09-28 11:46:06', '2017-10-02 05:29:41', NULL),
(17, 'Student_Y04', 'place', 10, '/A-level/Yellow/Student_Y04', '2017-09-28 11:47:05', '2017-10-02 03:37:14', NULL),
(18, 'Student_G02', 'place', 2, '/A-level/Green/Student_G02', '2017-10-02 03:37:39', '2017-10-02 03:37:49', '2017-10-02 03:37:49'),
(19, 'Student_Bl01', 'place', 11, '/A-level/Black/Student_Bl01', '2017-10-14 06:40:34', '2017-10-14 06:46:13', NULL),
(20, 'Teacher_W01', 'place', 13, '/A-level/White/Teacher_W01', '2017-10-14 08:13:11', '2017-10-14 08:13:11', NULL),
(21, 'Orange', 'Room', 1, '/A-level/Orange', '2017-10-16 08:04:24', '2017-10-16 08:04:24', NULL),
(22, 'Violet', 'Room', 1, '/A-level/Violet', '2017-10-16 09:20:10', '2017-10-16 09:20:10', NULL),
(23, 'GG', 'Room', 1, NULL, '2017-10-17 11:43:17', '2017-10-17 11:43:17', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Volands', 'Volands.ua@gmail.com', '$2y$10$tTMR3BOG.l0VThoN7zI0OurRzRhxw6GkRl2atJZzEC2JDDz6gwFim', 'yd0J2XXDEdTDXVkZKtJidUbHQChHJN78tmQLX4E4c5eTgprNU2MefYgyQJaJ', '2017-10-17 08:04:02', '2017-10-17 08:04:02'),
(4, 'manager', 'manager@manager.com', '$2y$10$s7gQw2VhspZxNpuyWiRjfObQuh9RaUay2zxGk2K.mGKx1jqHpypwC', 'UlxYGO31e3PjpUYVB98EHDuKUWc3bYANvv6esY7KA6FAVyoSqOVpwpVmf8HJ', '2017-10-17 07:37:33', '2017-10-17 07:37:33'),
(6, 'sergey', 'rudimsergey@list.ru', '$2y$10$mj.2uZTkYtjJlXP8p2yhz.wLb2w1YkOOsaWRws1N1Osh7XDg/.MDK', 't1yRBbJumj8jdEv4jxDB0v3qY4Yc0YXq1DYkTItDbNQazwMbJvHyTCTu70K2', '2017-10-17 11:38:54', '2017-10-17 11:38:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 2, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `audit_items`
--
ALTER TABLE `audit_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `items_identification_number_item_unique` (`identification_number`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_place` (`name_place`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD KEY `users_roles_user_id_foreign` (`user_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `audit_items`
--
ALTER TABLE `audit_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
