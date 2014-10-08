-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 07 2014 г., 13:58
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `avantelt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `seo_static`
--

CREATE TABLE IF NOT EXISTS `seo_static` (
  `id_seo` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`id_seo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `seo_static`
--

INSERT INTO `seo_static` (`id_seo`, `url`, `title`, `description`, `keywords`) VALUES
(1, '', 'Продажа и аренда недвижимости', 'Описание главной страницы', 'кейворды, главной, страницы'),
(2, 'about_company', 'О компании', 'Описание  страницы о компании', 'страница, о компании'),
(3, 'contacts', 'Контакты', 'Описание страницы контактов', 'страница, контакты'),
(4, 'legal_services', 'Юридические услуги', 'Описание юридических услуг', 'юридические, услуги'),
(5, 'credit_broker', 'Кредитный брокер', 'Описание кредитного брокера', 'кредитный, брокер'),
(6, 'partners', 'Партнеры', 'Описание партнеров', 'партнеры'),
(8, 'vacancy', 'Вакансии', 'Описание вакансий', 'вакансии'),
(9, 'ads/ads_view', 'Доска объявлений', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
