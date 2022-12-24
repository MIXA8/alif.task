-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 24 2022 г., 12:35
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
-- База данных: `alif.tech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `engadedroom`
--

CREATE TABLE `engadedroom` (
  `id` int NOT NULL,
  `id_room` int NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_start_time` timestamp NOT NULL,
  `user_finish_time` timestamp NOT NULL,
  `createad_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `engadedroom`
--

INSERT INTO `engadedroom` (`id`, `id_room`, `user_name`, `email`, `user_start_time`, `user_finish_time`, `createad_at`, `updated_at`) VALUES
(2, 2, 'sadas', 'ddasda', '2022-12-23 12:43:02', '2022-12-23 14:43:02', '2022-12-23 15:13:42', '2022-12-23 15:13:42'),
(10, 1, 'asdasd', 'javonsher@list.ru', '2022-12-23 12:43:02', '2022-12-23 13:43:02', '2022-12-23 20:15:20', '2022-12-23 20:15:20');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `title` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Комната 1', '2022-12-23 12:43:02', '2022-12-23 12:43:02'),
(2, 'Комната 2', '2022-12-23 12:43:02', '2022-12-23 12:43:02'),
(3, 'Комната 3', '2022-12-23 12:43:18', '2022-12-23 12:43:18'),
(4, 'Комната 4', '2022-12-23 12:43:18', '2022-12-23 12:43:18'),
(5, 'Комната 5', '2022-12-23 12:43:19', '2022-12-23 12:43:19'),
(6, 'Комната 6', '2022-12-23 12:43:19', '2022-12-23 12:43:19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `engadedroom`
--
ALTER TABLE `engadedroom`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `engadedroom`
--
ALTER TABLE `engadedroom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
