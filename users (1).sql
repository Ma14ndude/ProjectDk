-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2024 г., 23:49
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `is_admin`) VALUES
(1, 'Vanya', 'sadasd@gmail.com', '123123123', 1),
(2, 'Ma1n', 'djfgdjfgj@gmail.com', '123123123', 1),
(4, 'Banan', 'djfgdjfg@gmail.com', '123123123', 0),
(5, 'Banan1', 'djfgdjfg@gmail.com', '123123123', 0),
(12, 'Vanya123', 'jdjsf@gmail.com', '213123213', 0),
(14, 'Vanya12', 'dshfdhsf@gmail.com', '213213sa', 0),
(15, 'Ma1ntop', 'dsjfjdsfj@gmail.com', '123123123', 0),
(16, 'dsfjsdjf', 'sdfdjsf@gmail.com', '$2y$10$3iKvd47AOO30UhqkDm7WJuRwE8P7Pnwfwv.t14DABDoQ2NY7ifKYO', 0),
(17, 'Learnbytipon', 'djsfjsdfj@gmail.com', '$2y$10$BimGD2RTEgqwid1hAA8gIOZphoS5RVKjg3njL3ztV9yi9Vj6/Mg3e', 0),
(18, 'Ma1ntest', 'jsadjds@gmail.com', '$2y$10$gAUUQGgGJKib9CI6QD5tNeluTmy9rGcnf/3rNIyHari3HRAVSqNxO', 0),
(19, 'Ma1n123123', 'dfgdfgd@gmail.com', '$2y$10$oegyxvHFQdDR/O.6iyEZY.vOD2gfLN7AFl.ZijO5QkECK3KoKxD6y', 0),
(20, 'Vanyanety123', 'dsjfdjsf@gmail.com', '$2y$10$01xTxHKpYR3nyFSgIO2Ll.q0KZFPHIOEOS.IFwpHJEijx9AVhVw7q', 0),
(21, 'Ma1nnety123', 'dskfdjsf@gmail.com', '$2y$10$hVdezRuCdKg//a8zde5YB.lRa2.Y9r6sGDusHsAm5e4AdtYx607HO', 0),
(22, 'Ma1n553', 'djsfdjsf@gmail.com', '$2y$10$ekOKvVgnavKBM6Ll7CCJP.z2nP8iwHKvKBOrxnZqVKFDA.SVuE0MW', 0),
(23, 'Ma1n123456', 'mdsfjdsfA@gmail.com', '$2y$10$fQmyQik.0fFx5s.TrP2Jd.G1oIIhZKvjBh3wihAqMqligY6uVBdHW', 0),
(24, 'Ban123All ', 'gmdsj@gmail.com', '$2y$10$09JIvjx6M.pyB5YYfLP/le2PqV9XW2uiO/N8Djh4sRJtTG1uWYm7.', 0),
(25, 'Admin', 'dsjfdjsf@gmail.com', '$2y$10$3g3f4ykyM03khE.LrWjmHuDTqqyzmSI4OFMJ0ONLq1U5TH2Vw9v7u', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
