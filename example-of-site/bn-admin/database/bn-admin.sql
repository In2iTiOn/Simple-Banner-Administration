-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Трв 10 2015 р., 17:07
-- Версія сервера: 5.6.24
-- Версія PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `bn-admin`
--

-- --------------------------------------------------------

--
-- Структура таблиці `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `banners`
--

INSERT INTO `banners` (`id`, `name`, `visible`, `body`) VALUES
(2, 'MyBanner2', 0, '<p style="text-align:center"><a href="http://www.trevoga.su/"><img src="http://www.trevoga.su/http/images/images/88x31.gif"></a></p>'),
(4, 'MyBanner3', 1, '<p style="text-align:center"><a href="http://www.trevoga.su/"><img src="http://www.trevoga.su/http/images/images/800x90-2.gif"></a></p>'),
(7, 'VK', 1, '<a title="vk" href="http://vk.com"><img title="vk" src="http://vk.com/images/safari_152.png"></a>'),
(8, 'TemplateMonster', 1, '<a title="TM" href="http://templatemonster.com">\r\n<img title="TM" src="http://www.microsoft.com/web/locale/en-us/media/webmatrix/partners/Templatemonster.png"></a>');

-- --------------------------------------------------------

--
-- Структура таблиці `banners_pages`
--

CREATE TABLE IF NOT EXISTS `banners_pages` (
  `bannerID` int(11) NOT NULL,
  `pageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `banners_pages`
--

INSERT INTO `banners_pages` (`bannerID`, `pageID`) VALUES
(2, 1),
(4, 1),
(2, 3),
(8, 1),
(7, 1),
(7, 9),
(8, 9),
(8, 7),
(8, 2),
(8, 3),
(7, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `url`) VALUES
(1, 'index'),
(2, 'about'),
(3, 'contact'),
(7, 'items'),
(9, 'category');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
