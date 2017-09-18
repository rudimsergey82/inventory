-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 16 2017 г., 22:43
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
  `item_id` int(11) NOT NULL,
  `date_check` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `audit_items`
--

CREATE TABLE `audit_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `audit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_status` enum('ok','fail','new') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ok',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `items` (`id`, `name`, `identification_number`, `serial_number`, `specifications`, `date_create`, `date_buy`, `coast`, `date_input_use`, `guarantee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hammer', 111111, '10000001', 'material: steel and tree', '2017-01-01', '2017-01-02', '55.55', '2017-01-05', 10, NULL, NULL, NULL),
(2, 'Hammer', 111001, '101010101', 'material: steel and forest', '2001-01-20', '2001-02-20', '55.00', '2005-02-20', 10, NULL, NULL, NULL),
(3, 'Screwdriver', 100001, '101', 'material: steel and plastic', '2001-01-20', '2001-02-20', '5.00', '2005-02-20', 5, NULL, NULL, NULL),
(4, 'Mouse CS-304', 1137462, 'SV0905AR11800', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, NULL, NULL, NULL),
(5, 'Mouse CS-304', 1137463, 'SV0905AR11822', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 10:39:50', '2017-09-05 10:39:50', NULL),
(6, 'Mouse CS-304', 1137465, 'SV0905AR11855', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 12:07:23', '2017-09-05 12:07:23', NULL);

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
(8, '2017_09_12_122118_create_audit_items_table', 5);

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
('Volands.ua@gmail.com', '$2y$10$4EIRSKPgQmm.pz6l60EuPOW8G.1V5qdTLjeHyW4YS4awrxqV4mJpu', '2017-08-22 12:21:19');

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name`, `type_place`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Green', 'room', 0, NULL, NULL, NULL),
(3, 'Blue', 'room', 0, NULL, NULL, NULL),
(4, 'Teacher', 'place', 10, NULL, NULL, NULL),
(5, 'Teacher', 'place', 2, NULL, NULL, NULL),
(6, 'Student1', 'place', 10, NULL, NULL, NULL),
(7, 'Student2', 'place', 10, NULL, NULL, NULL),
(8, 'Student1', 'place', 2, NULL, NULL, NULL),
(9, 'Student1', 'place', 3, NULL, NULL, NULL),
(10, 'Yellow', 'room', 0, NULL, NULL, NULL),
(11, 'Black', 'room', 0, NULL, NULL, NULL),
(12, 'Pm 202', 'place', 11, '2017-09-14 10:14:46', '2017-09-14 10:14:46', NULL),
(13, 'White', 'room', 0, '2017-09-14 10:31:33', '2017-09-14 10:31:33', NULL),
(14, 'Stud1.1', 'place', 9, '2017-09-14 10:43:17', '2017-09-14 10:43:17', NULL),
(15, 'Stud1.1.1', 'place', 14, '2017-09-15 12:10:39', '2017-09-15 12:10:39', NULL);

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
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `audit_items`
--
ALTER TABLE `audit_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
