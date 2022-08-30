

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nascimento', '', '2022-08-15 17:47:42', '2022-08-15 14:47:12', '2022-08-15 14:47:12'),
(2, 'Miguel', '', '2022-08-15 17:47:58', '2022-08-15 14:47:49', '2022-08-15 14:47:49'),
(3, 'Leonardo', '', '2022-08-15 17:48:06', '2022-08-15 14:47:59', '2022-08-15 14:47:59'),
(4, 'Josimar', '', '2022-08-15 17:48:20', '2022-08-15 14:48:07', '2022-08-15 14:48:07');


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
