-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2023 г., 17:01
-- Версия сервера: 5.7.38
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coinskiper`
--

-- --------------------------------------------------------

--
-- Структура таблицы `balance`
--

CREATE TABLE `balance` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `balance`
--

INSERT INTO `balance` (`id`, `id_user`, `id_category`, `date`, `sum`, `type`) VALUES
(1, 1, 31, '2023-02-16', '30000', 'Расход'),
(2, 1, 31, '2023-02-16', '30000', 'Доход'),
(3, 1, 31, '2023-02-15', '2000', 'Расход');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(31, 'Реклама');

-- --------------------------------------------------------

--
-- Структура таблицы `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `expense`
--

INSERT INTO `expense` (`id`, `id_user`, `id_category`, `sum`) VALUES
(7, 1, 31, '3000'),
(8, 1, 31, '3100');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `expense_all_info`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `expense_all_info` (
`id` int(10)
,`id_user` int(10)
,`user_name` varchar(255)
,`id_category` int(10)
,`name_category` varchar(255)
,`sum` varchar(255)
);

-- --------------------------------------------------------

--
-- Структура таблицы `income`
--

CREATE TABLE `income` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `income`
--

INSERT INTO `income` (`id`, `id_user`, `id_category`, `sum`) VALUES
(3, 1, 31, '3000');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `income_all_info`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `income_all_info` (
`id` int(10)
,`id_user` int(10)
,`user_name` varchar(255)
,`id_category` int(10)
,`name_category` varchar(255)
,`sum` varchar(255)
);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `token`, `name`) VALUES
(1, '1', '1', '1', 'Name');

-- --------------------------------------------------------

--
-- Структура для представления `expense_all_info`
--
DROP TABLE IF EXISTS `expense_all_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `expense_all_info`  AS SELECT `expense`.`id` AS `id`, `expense`.`id_user` AS `id_user`, `users`.`name` AS `user_name`, `expense`.`id_category` AS `id_category`, `category`.`name_category` AS `name_category`, `expense`.`sum` AS `sum` FROM ((`expense` left join `category` on((`expense`.`id_category` = `category`.`id`))) left join `users` on((`expense`.`id_user` = `users`.`id`)))  ;

-- --------------------------------------------------------

--
-- Структура для представления `income_all_info`
--
DROP TABLE IF EXISTS `income_all_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `income_all_info`  AS SELECT `income`.`id` AS `id`, `income`.`id_user` AS `id_user`, `users`.`name` AS `user_name`, `income`.`id_category` AS `id_category`, `category`.`name_category` AS `name_category`, `income`.`sum` AS `sum` FROM ((`income` left join `category` on((`income`.`id_category` = `category`.`id`))) left join `users` on((`income`.`id_user` = `users`.`id`)))  ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_category`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
