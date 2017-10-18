SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

INSERT INTO `audits` (`id`, `place_id`, `place_date_check`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2017-08-31 21:00:00', NULL, NULL, NULL),
(2, 2, '2017-10-15 21:00:00', NULL, NULL, NULL),
(3, 21, '2017-10-15 21:00:00', NULL, NULL, NULL),
(4, 3, NULL, '2017-10-17 08:10:59', '2017-10-17 08:10:59', NULL),
(5, 10, '2017-09-16 21:00:00', '2017-10-17 08:40:39', '2017-10-17 08:40:39', NULL),
(6, 22, NULL, '2017-10-17 09:37:00', '2017-10-17 09:37:00', NULL),
(7, 9, NULL, '2017-10-17 21:31:11', '2017-10-17 21:31:11', NULL),
(8, 11, NULL, '2017-10-17 21:31:11', '2017-10-17 21:31:11', NULL),
(9, 23, NULL, '2017-10-18 03:22:36', '2017-10-18 03:22:36', NULL);

INSERT INTO `audit_items` (`id`, `audit_id`, `item_id`, `item_status`, `item_date_check`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'new', '2017-08-31 21:00:00', '2017-08-31 21:00:00', NULL, NULL),
(2, 1, 5, 'new', '2017-08-31 21:00:00', '2017-08-31 21:00:00', NULL, NULL),
(3, 1, 3, 'new', '2017-08-31 21:00:00', '2017-08-31 21:00:00', NULL, NULL),
(4, 1, 2, 'new', '2017-10-15 21:00:00', '2017-10-16 20:28:47', '2017-10-17 09:19:12', NULL),
(5, 1, 4, 'new', '2017-10-16 21:00:00', '2017-10-17 06:41:16', '2017-10-17 09:19:12', NULL),
(6, 1, 6, 'new', '2017-10-16 21:00:00', '2017-10-17 06:41:35', '2017-10-17 09:19:12', NULL),
(7, 1, 7, 'new', '2017-10-16 21:00:00', '2017-10-17 06:52:06', '2017-10-17 09:19:12', NULL),
(8, 1, 8, 'new', '2017-10-16 21:00:00', '2017-10-17 08:10:59', '2017-10-17 09:19:12', NULL),
(9, 1, 9, 'new', '2017-10-16 21:00:00', '2017-10-17 08:11:08', '2017-10-17 09:19:12', NULL),
(10, 1, 10, 'new', '2017-10-16 21:00:00', '2017-10-17 09:49:23', '2017-10-17 09:49:23', NULL),
(11, 1, 11, 'new', '2017-10-16 21:00:00', '2017-10-17 09:52:55', '2017-10-17 09:52:55', NULL),
(12, 1, 12, 'new', '2017-10-17 17:10:48', '2017-10-17 17:43:48', '2017-10-17 17:43:48', NULL),
(13, 1, 1, 'fail', '2017-10-17 17:10:08', '2017-10-17 17:45:08', '2017-10-17 17:45:08', NULL),
(14, 9, 12, 'new', '2017-10-18 03:22:36', '2017-10-18 03:22:36', '2017-10-18 03:22:36', NULL),
(15, 9, 12, 'ok', '2017-10-18 03:49:54', '2017-10-18 03:49:54', '2017-10-18 03:49:54', NULL),
(16, 9, 12, 'ok', '2017-10-18 04:06:44', '2017-10-18 04:06:44', '2017-10-18 04:06:44', NULL),
(17, 9, 12, 'ok', '2017-10-18 04:53:13', '2017-10-18 04:53:13', '2017-10-18 04:53:13', NULL),
(18, 1, 13, 'new', '2017-10-18 06:10:32', '2017-10-18 06:23:32', '2017-10-18 06:23:32', NULL);

INSERT INTO `items` (`item_id`, `name_item`, `identification_number`, `serial_number`, `specifications`, `date_create`, `date_buy`, `coast`, `date_input_use`, `guarantee`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hammer', 111111, '10000001', 'material: steel and tree', '2017-01-01', '2017-01-02', '55.55', '2017-01-05', 10, NULL, NULL, NULL),
(2, 'Hammer', 111001, '101010101', 'material: steel and forest', '2001-01-20', '2001-02-20', '55.00', '2005-02-20', 10, NULL, NULL, NULL),
(3, 'Screwdriver', 100001, '101', 'material: steel and plastic', '2001-01-20', '2001-02-20', '5.00', '2005-02-20', 5, NULL, NULL, NULL),
(4, 'Mouse CS-304', 1137462, 'SV0905AR11800', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, NULL, NULL, NULL),
(5, 'Mouse CS-304', 1137463, 'SV0905AR11822', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 10:39:50', '2017-09-05 10:39:50', NULL),
(6, 'Mouse CS-304', 1137465, 'SV0905AR11855', 'material: plastic', '2021-03-20', '2020-04-20', '365.55', '2021-04-20', 5, '2017-09-05 12:07:23', '2017-09-05 12:07:23', NULL),
(7, 'PC14', 6623344, '66123132123', 'eeek', '2014-08-24', '2014-09-24', '10080.00', '2014-09-20', 12, NULL, NULL, NULL),
(8, 'Mouse CS-305', 1115555, '1115555', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-14 11:13:19', '2017-10-14 11:13:19', NULL),
(9, 'Mouse CS-305', 1111166, '11122323131', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-16 07:58:57', '2017-10-16 07:58:57', NULL),
(10, 'Mouse CS-304', 111122, '111221111111', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-17 17:41:46', '2017-10-17 17:41:46', NULL),
(11, 'Epson E360', 11221122, '112211221122', 'material: plastic', '2021-03-20', '2021-03-20', '32323.33', '2021-03-20', 5, '2017-10-17 17:43:48', '2017-10-17 17:43:48', NULL),
(12, 'Epson E360', 111133, '11122323333', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-17 17:45:08', '2017-10-17 17:45:08', NULL),
(13, 'Mouse CS-305', 1111444, '111223444444', 'material: plastic', '2021-03-20', '2021-03-20', '300.55', '2021-03-20', 5, '2017-10-18 06:23:31', '2017-10-18 06:23:31', NULL);

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

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('Volands.ua@gmail.com', '$2y$10$QwPB51F0HK7s1t4MYIH7KOz.Sv8JiQxzlOHQszf0LSUXsRw9eO3JK', '2017-10-14 10:40:39');

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
(23, 'GG', 'Room', 1, '/A-level/GG', '2017-10-17 11:43:17', '2017-10-17 11:43:17', NULL),
(24, 'GGG', 'Room', 1, NULL, '2017-10-18 06:16:22', '2017-10-18 08:33:58', '2017-10-18 08:33:58');

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'manager', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Volands', 'Volands.ua@gmail.com', '$2y$10$tTMR3BOG.l0VThoN7zI0OurRzRhxw6GkRl2atJZzEC2JDDz6gwFim', 'b8LDxeh0cX6FIhAsdpDmLoV5QIKRmqbOtnYc7O2anjVR7CYvgiyRdL3k74II', '2017-10-17 08:04:02', '2017-10-17 08:04:02'),
(4, 'manager', 'manager@manager.com', '$2y$10$s7gQw2VhspZxNpuyWiRjfObQuh9RaUay2zxGk2K.mGKx1jqHpypwC', 'UlxYGO31e3PjpUYVB98EHDuKUWc3bYANvv6esY7KA6FAVyoSqOVpwpVmf8HJ', '2017-10-17 07:37:33', '2017-10-17 07:37:33'),
(6, 'sergey', 'rudimsergey@list.ru', '$2y$10$mj.2uZTkYtjJlXP8p2yhz.wLb2w1YkOOsaWRws1N1Osh7XDg/.MDK', 't1yRBbJumj8jdEv4jxDB0v3qY4Yc0YXq1DYkTItDbNQazwMbJvHyTCTu70K2', '2017-10-17 11:38:54', '2017-10-17 11:38:54');

INSERT INTO `users_roles` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 2, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
