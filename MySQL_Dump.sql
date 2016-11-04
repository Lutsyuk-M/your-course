-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 04 2016 г., 23:46
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `title`, `author_id`, `author_nick`, `verified`, `description`, `f_theme`, `s_theme`, `banned`) VALUES
(1, 'Найсмачніші рецепти з фрутктів', 1, 'Cannoneer', 1, '', 'Кулінарія', 'Десерти', 0),
(2, 'Приховані можливості CSS', 1, 'Cannoneer', 1, '', 'Програмування', 'CSS', 0);

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
  `cdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `author_id`, `mcourse_id`, `title`, `content`, `cdate`) VALUES
(1, 1, 1, 'Робимо смачний фруктовий салат', 'Інгредієнти для приготування фруктового салату:\nКіві - 2 шт.\nЯблуко - 1 штука\nБанан - 1штука\nАпельсин -1 штука\nВершки (жирність 10%) - 100 мл\n\nІнвентар:\nОбробна дошка\nГострий ніж\nМиска\nКреманки\n\nПриготування фруктового салату.\n\nКрок 1: Підготуємо інгредієнти\nочищаємо банан від шкірки\nДля початку необхідно добре промити всі фрукти під холодною проточною водою, потім осушити.  Очистіть   банан від шкірки, видаліть зайві волокна, потім очистіть ківі, апельсин і яблуко. Останній фрукт можете залишити і в шкірці, якщо Вам так більше подобається, але насіння виріжете обов''язково. \n\nКрок 2: Нарізаємо фрукти\nНарізаємо апельсин Тепер наріжте банан, яблуко і ківі на середні кубики.  Апельсин розділіть на часточки, а потім наріжте  на невеликі шматочки.  Тепер всі фрукти змішайте в одній глибокій мисці, заправте вершками. \n\nКрок 3: Подаємо фруктовий салат\nГотовий фруктовий салат Розкладіть салат по креманкам. В якості прикраси можете використовувати, гілочку свіжої меліси.\nПриємного Вам апетиту!\n\n\nПоради:\n— Такий салатик можна також заправити йогуртом, кефіром або подавати спільно з кульками морозива. \n— В якості прикраси Ви можете також використовувати горіхи, тертий шоколад або зерна граната.\n— Інгредієнти можна також замінювати. Наприклад, якщо Ви більше віддаєте перевагу мандаринкам, то замініть ними апельсин. ', '2016-11-02'),
(2, 1, 2, 'Вступ. Псевдокласси CSS', 'Псевдоклассы – это атрибуты, назначаемые строго к селекторам с намерением определить реакцию или состояние для данного селектора. Они обладают следующей структурой: selector:pseudo class { property: value; }, т.е. вам лишь надо поместить двоеточие между селектором и псевдоклассом.\r\n\r\nВы увидите, что многие браузеры не поддерживают ряд положений CSS. Однако существующие четыре псевдокласса могут применяться без какого-либо страха, если применяются к ссылкам:\r\n\r\nlink используются для непосещенных ссылок\r\nvisited используется лля ссылки на страницу, которую уже посетили.\r\nactive используется, когда пользователь кликает по ссылке.\r\nhover используется, когда пользователь наводит курсор на ссылку.', '2016-11-04');

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
(1, 'Cannoneer', 'Mandarin', 'Максим', 'Луцюк', 'GettingStartedMax@gmail.com', '2016-10-06', 1, 0, 0, 'Україна', 15);

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
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
