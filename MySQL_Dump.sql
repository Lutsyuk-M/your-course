-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 24 2016 г., 21:00
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `your-course`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(3) NOT NULL,
  `title` varchar(75) NOT NULL,
  `author_id` int(3) NOT NULL,
  `author_nick` varchar(25) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `f_theme` varchar(20) NOT NULL,
  `s_theme` varchar(25) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `author_id`, `author_nick`, `verified`, `description`, `f_theme`, `s_theme`, `banned`) VALUES
(1, 'Створення проектів у программі Scratch', 1, 'Cannoneer', 1, '', 'Програмне забезпечен', 'Навчання', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(2) NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `title` varchar(55) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mcourse_id` int(4) NOT NULL,
  `author_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(17) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(43) NOT NULL,
  `rdate` date NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `warn` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `country` varchar(24) NOT NULL DEFAULT 'Не вказано.',
  `l_score` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `firstname`, `lastname`, `email`, `rdate`, `verified`, `warn`, `banned`, `country`, `l_score`) VALUES
(1, 'Cannoneer', 'pass', 'Максим', 'Луцюк', 'GettingStartedMax@gmail.com', '2016-10-06', 1, 0, 0, 'Україна', 15);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
