-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2024 г., 14:20
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `city-portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` bigint UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `background_color` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#000',
  `text_color` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#fff',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status_name`, `background_color`, `text_color`, `created_at`, `updated_at`) VALUES
(1, 'Выполнено', '#198754', '#fff', '2024-04-27 07:14:07', '2024-04-27 07:14:07'),
(2, 'В процессе', '#ffc107', '#fff', '2024-04-27 07:16:37', '2024-04-27 07:16:37'),
(3, 'Создано', '#0ecaf0', '#fff', '2024-04-27 07:18:59', '2024-04-27 07:18:59');

-- --------------------------------------------------------

--
-- Структура таблицы `tikets`
--

CREATE TABLE `tikets` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tikets`
--

INSERT INTO `tikets` (`id`, `title`, `description`, `image`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'test', 'test test test', 'uploads/66331cb7f02b2-image-1.jpg', 3, 1, '2024-05-02 04:55:19', '2024-05-02 07:55:19'),
(4, 'test 2', 'Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки форм развития. Товарищи! начало повседневной работы по формированию позиции требуют от нас анализа соответствующий условий активизации. Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовки и реализации дальнейших направлений развития. Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности позволяет оценить значение соответствующий условий активизации. Равным образом рамки и место обучения кадров позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что консультация с широким активом представляет собой интересный эксперимент проверки дальнейших направлений развития.', 'uploads/66335f80dc0d9-image-3.jpg', 2, 37, '2024-05-02 09:40:16', '2024-05-02 12:40:16'),
(5, 'тест 3', 'Задача организации, в особенности же новая модель организационной деятельности играет важную роль в формировании существенных финансовых и административных условий. Не следует, однако забывать, что постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение существенных финансовых и административных условий. Товарищи! дальнейшее развитие различных форм деятельности в значительной степени обуславливает создание системы обучения кадров, соответствует насущным потребностям. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение дальнейших направлений развития. Таким образом постоянный количественный рост и сфера нашей активности позволяет оценить значение дальнейших направлений развития.', 'uploads/66335fa2a6923-image-2.jpg', 1, 37, '2024-05-02 09:40:50', '2024-05-02 12:40:50'),
(6, 'eeeee', 'eeeeeeeeeeeeeeeeeeeeeee    fff', 'uploads/663360aa92f9c-image-3.jpg', 3, 1, '2024-05-02 09:45:14', '2024-05-02 12:45:14'),
(7, 'eeeee', 'ertrteyeryeryeryryryreyeryeryeryeryey', 'uploads/66336c68730e9-image-3.jpg', 2, 1, '2024-05-02 10:35:20', '2024-05-02 13:35:20'),
(8, '123456', '123456', 'uploads/66336ce28b758-image-1.jpg', 1, 1, '2024-05-02 10:37:22', '2024-05-02 13:37:22'),
(9, 'Рыба текст', 'Товарищи! новая модель организационной деятельности требуют от нас анализа форм развития. С другой стороны постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач.', 'uploads/663370b79cb96-image-2.jpg', 3, 1, '2024-05-02 10:53:43', '2024-05-02 13:53:43');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `group_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `birth_date`, `password`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'sergeykms@googlemail.com', 'Ромба', '2024-04-27', '$2y$10$hqzNsGPFOrrYRa5F/Vog1uqeXf94YR6d4fd8DyGLyc8xrK5zruRbu', 2, '2024-04-29 10:53:34', '2024-04-29 10:53:34'),
(37, 'sergeykms@gmail.com', 'wptest', '2024-04-11', '$2y$10$ETWYQcYviATuv.JGtoeXFeArM3ZraPN5DYaUqmUpMX553AsUUsony', 2, '2024-04-30 00:47:35', '2024-04-30 00:47:35');

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Администратор', '2024-04-27 06:56:42', '2024-04-27 06:56:42'),
(2, 'Пользователь', '2024-04-27 06:59:30', '2024-04-27 06:59:30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tikets`
--
ALTER TABLE `tikets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tikets_ibfk_1` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tikets`
--
ALTER TABLE `tikets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tikets`
--
ALTER TABLE `tikets`
  ADD CONSTRAINT `tikets_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tikets_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_groups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
