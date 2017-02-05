-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 05 2017 г., 17:27
-- Версия сервера: 5.5.48-log
-- Версия PHP: 5.6.19

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
  `author_nick` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(150) NOT NULL DEFAULT 'Відсутня.'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `author_id`, `author_nick`, `description`, `banned`, `ban_reason`) VALUES
(1, 'Найсмачніші рецепти з фрутктів', 1, 'Cannoneer', 'А Ви їли карамболь? А рамбутан?Повірте, тут Ви знайдете самі екзотичні страви з фруктів з усього світу!', 0, 'Відсутня.'),
(2, 'Приховані можливості CSS', 1, 'Cannoneer', '', 0, 'Відсутня.');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(6) NOT NULL,
  `author_id` int(4) NOT NULL,
  `mcourse_id` int(4) NOT NULL,
  `title` varchar(35) NOT NULL,
  `content` text NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `author_id`, `mcourse_id`, `title`, `content`, `cdate`) VALUES
(1, 1, 1, 'Робимо смачний фруктовий салат', 'Інгредієнти для приготування фруктового салату:\nКіві - 2 шт.\nЯблуко - 1 штука\nБанан - 1штука\nАпельсин -1 штука\nВершки (жирність 10%) - 100 мл\n\nІнвентар:\nОбробна дошка\nГострий ніж\nМиска\nКреманки\n\nПриготування фруктового салату.\n\nКрок 1: Підготуємо інгредієнти\nочищаємо банан від шкірки\nДля початку необхідно добре промити всі фрукти під холодною проточною водою, потім осушити.  Очистіть   банан від шкірки, видаліть зайві волокна, потім очистіть ківі, апельсин і яблуко. Останній фрукт можете залишити і в шкірці, якщо Вам так більше подобається, але насіння виріжете обов''язково. \n\nКрок 2: Нарізаємо фрукти\nНарізаємо апельсин Тепер наріжте банан, яблуко і ківі на середні кубики.  Апельсин розділіть на часточки, а потім наріжте  на невеликі шматочки.  Тепер всі фрукти змішайте в одній глибокій мисці, заправте вершками. \n\nКрок 3: Подаємо фруктовий салат\nГотовий фруктовий салат Розкладіть салат по креманкам. В якості прикраси можете використовувати, гілочку свіжої меліси.\nПриємного Вам апетиту!\n\n\nПоради:\n— Такий салатик можна також заправити йогуртом, кефіром або подавати спільно з кульками морозива. \n— В якості прикраси Ви можете також використовувати горіхи, тертий шоколад або зерна граната.\n— Інгредієнти можна також замінювати. Наприклад, якщо Ви більше віддаєте перевагу мандаринкам, то замініть ними апельсин. ', '2016-11-02 15:28:39'),
(2, 1, 2, 'Вступ. Псевдокласси CSS', 'Псевдоклассы – это атрибуты, назначаемые строго к селекторам с намерением определить реакцию или состояние для данного селектора. Они обладают следующей структурой: selector:pseudo class { property: value; }, т.е. вам лишь надо поместить двоеточие между селектором и псевдоклассом.\r\n\r\nВы увидите, что многие браузеры не поддерживают ряд положений CSS. Однако существующие четыре псевдокласса могут применяться без какого-либо страха, если применяются к ссылкам:\r\n\r\nlink используются для непосещенных ссылок\r\nvisited используется лля ссылки на страницу, которую уже посетили.\r\nactive используется, когда пользователь кликает по ссылке.\r\nhover используется, когда пользователь наводит курсор на ссылку.', '2016-11-04 11:42:19'),
(3, 1, 1, ' Варення з груш', 'Варення з груш - неймовірно смачні солодощі, які сподобаються всім ласунам!</br> Сьогодні ми пропонуємо тобі простий і цікавий рецепт - грушки вийдуть схожими на цукати, а смак буде таким, що знадобиться сила волі, щоб зупинитися! :)</br>\r\nЦе варення з груш готується з твердих плодів, навіть трохи недостиглих.</br></br>\r\n\r\nІнгредієнти:</br>\r\n2 кг почищених груш</br>\r\n2 кг цукру</br>\r\n1 лимон</br></br>\r\n\r\nСпосіб приготування:</br>\r\n\r\nГруші підготуй : почисти і вийми серцевину, зваж - має бути рівно 2 кг.</br> Наріж скибочками.</br>\r\n\r\nУ каструлю поклади шарами груші і цукор, а кожен із шарів груш поливай свіжовичавленим лимонним соком. Цедру перемели на м''ясорубці, але поки не додавай.</br>\r\n\r\nЗалиш груші на добу.</br></br>\r\n\r\nНаступного дня перелий сироп в іншу посудину і доведи його до кипіння, всип груші і цедру та вари на повільному вогні до готовності - поки груші не стануть прозорими, а по дому проллється неймовірний аромат.</br>', '2016-11-05 19:03:05'),
(4, 1, 1, 'Test', 'SATANA', '2017-01-02 19:01:11');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` int(4) NOT NULL,
  `firstname` varchar(17) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_group` int(2) NOT NULL DEFAULT '0',
  `courses_count` int(3) NOT NULL DEFAULT '0',
  `max_courses_count` int(3) NOT NULL DEFAULT '0',
  `rdate` datetime NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `warn` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(150) NOT NULL DEFAULT 'Відсутня.',
  `l_score` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `password`, `salt`, `firstname`, `lastname`, `email`, `user_group`, `courses_count`, `max_courses_count`, `rdate`, `verified`, `warn`, `banned`, `ban_reason`, `l_score`) VALUES
(1, 'Cannoneer', '2a2d82300711d5a66f86dba48f419deb', 3927, 'Максим', 'Луцюк', 'GettingStartedMax@gmail.com', 1, 0, 1, '2016-10-06 17:57:20', 1, 0, 0, 'Відсутня.', 15),
(2, 'ValeronKonb', '1dcd341ad1b64af7196d703eeabc95d9', 443, '', '', 'lutsyuk11@yandex.ru', 1, 0, 1, '0000-00-00 00:00:00', 1, 0, 0, 'Відсутня.', 15),
(3, 'Anton', '77e41aa43e81301f368370910be3dd4c', 329, '', '', 'lutsyuk2002@mail.ru', 1, 0, 1, '2016-12-25 19:20:49', 1, 0, 0, 'Відсутня.', 15),
(4, 'Valera', 'd5097602c423efd01b6fb2e74d517b1c', 9526, '', '', 'lutsyuk2003@mail.ru', 1, 0, 1, '2016-12-25 19:44:13', 1, 0, 0, 'Відсутня.', 15),
(5, 'Antion', '3a5011be57feb7c583e26c0678a50728', 3, '', '', 'Valeroncheavbkfaslf', 0, 0, 0, '2017-01-16 22:01:16', 0, 0, 0, 'Відсутня.', 0),
(6, 'sadh', '24e4015a020ebb02d060021fc99082ff', 60, '', '', 'asgg', 0, 0, 0, '2017-01-16 22:01:29', 0, 0, 0, 'Відсутня.', 0),
(7, '#', 'd25217a3f897979baa62da1f9179ed6a', 8119, '', '', '#', 0, 0, 0, '2017-01-16 22:01:17', 0, 0, 0, 'Відсутня.', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `verification`
--

CREATE TABLE IF NOT EXISTS `verification` (
  `id` int(6) NOT NULL,
  `user_id` int(4) NOT NULL,
  `verification_code` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `verification`
--

INSERT INTO `verification` (`id`, `user_id`, `verification_code`, `used`) VALUES
(1, 0, '', 0),
(2, 0, 'mz7P32zECpgNBUo0Y5J2aYrdbdf0tUnD', 0),
(3, 0, 'akjvHLLOkLj1rN5fRPBhUj2lrfT0O7kT', 0),
(4, 0, 'Tj8UR5Cy8Y6yTPtxU5gzmsrg1nsJ3Fiz', 0),
(5, 2, 'nY6JT1fo173p6It2XPeUYVliZXsXjmD3', 1),
(6, 4, 'bvUsAD7gfdCDaOaTNz1T93NYBiNZc1Jf', 1),
(7, 5, 'TuCJv3dmim4Xd9MMInFJMKo0SidSYEOe', 0),
(8, 6, 'vSr7vzNMoP80af6xhXXMHtpfUYILRZzG', 0),
(9, 7, '3CaPmtfzmF4J2LfFJS7dvAiIOZ73DFau', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `warnings`
--

CREATE TABLE IF NOT EXISTS `warnings` (
  `id` int(5) NOT NULL,
  `offender_id` int(4) NOT NULL,
  `type` varchar(32) NOT NULL,
  `page_id` int(6) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
