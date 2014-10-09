-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2014 г., 09:52
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
-- Структура таблицы `building_images`
--

CREATE TABLE IF NOT EXISTS `building_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_building_objects` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Дамп данных таблицы `building_images`
--

INSERT INTO `building_images` (`id`, `id_building_objects`, `img_name`) VALUES
(39, 18, '8a81d49dca4dfe55d6c43cc546c2bbcd1_1412832588.jpg'),
(40, 18, 'Lighthouse_1412832588.jpg'),
(41, 18, 'sp189_1_1412832588.jpg'),
(42, 18, 'zagruzhennoe_1412832588.jpg'),
(43, 19, '55_1412833163.jpg'),
(44, 19, 'dom3_1412833163.jpg'),
(46, 19, 'zagruzhennoe_(1)_1412833163.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `building_objects`
--

CREATE TABLE IF NOT EXISTS `building_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(515) DEFAULT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `building_objects`
--

INSERT INTO `building_objects` (`id`, `title`, `description`, `link`, `create_date`) VALUES
(18, 'Красивый деревянный дом', 'Современные реалии загородного строительства показывают очевидный рост количества возводимых деревянных домов по всему мира. Люди, даже имеющие деньги на постройку кирпичного коттеджа, все чаще делают выбор в пользу именно деревянного дома, эта тенденция наблюдается как в странах, для которых деревянные дома традиционны (Россия, Япония, Великобритания) так и в странах, для которых более характерны постройки из камня (Германия, Скандинавия и т.п.). \r\n\r\nВо многом, это обусловлено экономическими соображениями, вместе с тем, стоит заметить, что деревянные дома имеют и эксплуатационные преимущества, так разрекламированные игроками этого бизнеса.', 'http://www.test1.ru', '2014-10-09 05:29:48'),
(19, 'Современный кирпичный дом', 'Строительство домов из кирпича имеют многовековую историю. По всему миру возведены десятки, а может быть и сотни тысяч сооружений из кирпича, возраст которых составляет более чем 100-150 лет. Сегодня продолжают появляться и исчезать всё новые виды стройматериалов, но кирпич по-прежнему остается главным строительным материалом в мире.\r\n\r\nВ этой статье мы разберем основные преимущества кирпича, благодаря которым он настолько популярен в строительстве коттеджей и многоэтажных домов.', 'http://www.kirpich.ru', '2014-10-09 05:39:23');

-- --------------------------------------------------------

--
-- Структура таблицы `callbacks`
--

CREATE TABLE IF NOT EXISTS `callbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `submit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COMMENT 'Name root category',
  `sortable` int(11) DEFAULT NULL COMMENT 'Sorting cateogry',
  `public` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`, `sortable`, `public`) VALUES
(16, 'Общая информация', 1, 1),
(17, 'Характеристики дома', 2, 1),
(18, 'Коммуникации', 4, 1),
(19, 'Инфраструктура поселка', 5, 1),
(20, 'Характеристики участка', 3, 1),
(21, 'Инфраструктура рядом', NULL, 1),
(22, 'Природная привлекательность', NULL, 1),
(23, 'Дополнительная категория', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` longtext NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('46e21a8874b8d1e63ba600e630697fd6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1412833851, 'a:7:{s:9:"user_data";s:0:"";s:8:"per_page";i:2;s:9:"info_user";a:6:{s:8:"id_users";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:8:"password";s:32:"cdedab9b02d91a2efb52f9e270467620";s:11:"date_create";s:19:"2014-09-25 14:09:31";s:9:"user_role";s:1:"1";}s:8:"id_users";s:1:"1";s:8:"username";s:5:"admin";s:9:"user_role";s:1:"1";s:4:"sort";i:49;}');

-- --------------------------------------------------------

--
-- Структура таблицы `highway`
--

CREATE TABLE IF NOT EXISTS `highway` (
  `id_highway` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `id_city` varchar(512) DEFAULT NULL,
  `id_highway_direction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_highway`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `highway`
--

INSERT INTO `highway` (`id_highway`, `name`, `id_city`, `id_highway_direction`) VALUES
(1, 'Тюменское', '5500000100000', NULL),
(2, 'Тюменское2', '5500000100000', NULL),
(3, 'Юго Восточное Шоссе', '7700000000000', NULL),
(4, 'Сыропятский тракт', '5500000100000', NULL),
(5, 'Западка', '7700000000000', NULL),
(6, 'Вот оно родное', '7700000000000', 6),
(7, 'Центральное', '2300300100000', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `highway_direction`
--

CREATE TABLE IF NOT EXISTS `highway_direction` (
  `id_highway_direction` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `id_city` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_highway_direction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `highway_direction`
--

INSERT INTO `highway_direction` (`id_highway_direction`, `name`, `id_city`) VALUES
(1, 'Юго-западное', '5500000100000'),
(2, 'Епануться', '5500000100000'),
(3, 'Юго-восточное', '7700000000000'),
(4, 'Сыропятка', '5500000100000'),
(5, 'Западное', '7700000000000'),
(6, 'Южное', '7700000000000'),
(7, 'Юго-восток', '2300300100000');

-- --------------------------------------------------------

--
-- Структура таблицы `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `id_objects` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `public` int(11) DEFAULT '0',
  `id_users` int(11) DEFAULT NULL,
  `name_object` varchar(512) DEFAULT NULL,
  `city` varchar(512) DEFAULT NULL,
  `region` varchar(512) DEFAULT NULL,
  `district` varchar(512) DEFAULT NULL,
  `street` varchar(512) DEFAULT NULL,
  `building` varchar(512) DEFAULT NULL,
  `highway_list` varchar(512) DEFAULT NULL,
  `region_list` varchar(512) DEFAULT NULL,
  `city_id` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_objects`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id_objects`, `type`, `date_add`, `public`, `id_users`, `name_object`, `city`, `region`, `district`, `street`, `building`, `highway_list`, `region_list`, `city_id`) VALUES
(5, 1, '2014-10-03 04:17:23', 0, NULL, 'Дом на Витязево', 'Астафьево', 'Московская', 'Можайский', 'Маховская', '1', '0', '0', '7700000000000'),
(6, 1, '2014-10-06 05:35:18', 0, NULL, 'Дом 2', 'Сергиев Посад', 'Московская', 'Сергиево-Посадский', 'Гефсиманские пруды', '2а', 'Выберите шоссе', 'Выберите округ', '5003000500000'),
(7, 1, '2014-10-06 05:39:20', 0, NULL, 'Дом 34', 'Сергиев Посад-7', 'Московская', 'Сергиево-Посадский', 'Ленина', '15', '0', '0', '5003000600000'),
(8, 1, '2014-10-07 03:01:16', 0, NULL, 'Дом12', 'Ардатов', 'Мордовия', 'Ардатовский', 'Алатырская', '2', '0', '0', '1300200100000'),
(9, 1, '2014-10-07 03:03:04', 0, NULL, 'Дом', 'Академиков', 'Московская', 'Сергиево-Посадский', 'А а а а', '13', '0', '0', '5003000600000');

-- --------------------------------------------------------

--
-- Структура таблицы `objects_options`
--

CREATE TABLE IF NOT EXISTS `objects_options` (
  `id_objects_options` int(11) NOT NULL AUTO_INCREMENT,
  `id_objects` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `id_subcategory_value` int(11) NOT NULL,
  `id_subcategory_value_input` text,
  PRIMARY KEY (`id_objects_options`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=943 ;

--
-- Дамп данных таблицы `objects_options`
--

INSERT INTO `objects_options` (`id_objects_options`, `id_objects`, `id_subcategory`, `id_subcategory_value`, `id_subcategory_value_input`) VALUES
(667, 5, 25, 36, 'спортивный клуб; магазин; детский сад; школа; развлекательный центр; больница; ресторан'),
(668, 5, 26, 37, 'примыкает к лесу'),
(669, 5, 27, 38, 'вид на море'),
(670, 5, 28, 45, '5'),
(671, 5, 29, 46, '13100000'),
(672, 5, 30, 49, NULL),
(673, 5, 31, 50, 'Крутой дом'),
(674, 5, 9, 13, '120'),
(675, 5, 10, 44, '200'),
(676, 5, 11, 32, NULL),
(677, 5, 12, 18, NULL),
(678, 5, 14, 42, 'оштукатурен и покрашен'),
(679, 5, 13, 43, 'обои, декротивная штукатурка'),
(680, 5, 21, 19, NULL),
(681, 5, 22, 34, 'беседка'),
(682, 5, 15, 24, NULL),
(683, 5, 16, 28, NULL),
(684, 5, 17, 41, 'документально подтвержденное'),
(685, 5, 18, 39, '15'),
(686, 5, 19, 30, NULL),
(687, 5, 20, 33, NULL),
(688, 5, 23, 23, NULL),
(689, 5, 24, 35, 'спортивные площадки, детские площадки, освещенные улицы'),
(690, 6, 25, 36, '5'),
(691, 6, 26, 37, '12'),
(692, 6, 27, 38, '13'),
(693, 6, 28, 45, '15'),
(694, 6, 29, 46, '15000000'),
(695, 6, 30, 49, NULL),
(696, 6, 31, 50, 'Крутой домяра'),
(697, 6, 9, 13, '500'),
(698, 6, 10, 44, '1000'),
(699, 6, 11, 32, NULL),
(700, 6, 12, 17, NULL),
(701, 6, 14, 42, ''),
(702, 6, 13, 43, ''),
(703, 6, 21, 19, NULL),
(704, 6, 22, 34, ''),
(705, 6, 15, 24, NULL),
(706, 6, 16, 28, NULL),
(707, 6, 17, 41, ''),
(708, 6, 18, 39, ''),
(709, 6, 19, 30, NULL),
(710, 6, 20, 33, NULL),
(711, 6, 23, 21, NULL),
(712, 6, 24, 35, ''),
(851, 7, 25, 36, '15'),
(852, 7, 26, 37, '37'),
(853, 7, 27, 38, '38'),
(854, 7, 28, 45, '1500'),
(855, 7, 29, 46, '500000'),
(856, 7, 30, 49, NULL),
(857, 7, 31, 50, '1233123123'),
(858, 7, 9, 13, '6501'),
(859, 7, 10, 44, '15001'),
(860, 7, 11, 14, NULL),
(861, 7, 12, 16, NULL),
(862, 7, 14, 42, '42'),
(863, 7, 13, 43, '43'),
(864, 7, 21, 19, NULL),
(865, 7, 22, 34, '34'),
(866, 7, 15, 24, NULL),
(867, 7, 16, 28, NULL),
(868, 7, 17, 41, '41'),
(869, 7, 18, 39, '39'),
(870, 7, 19, 30, NULL),
(871, 7, 20, 33, NULL),
(872, 7, 23, 21, NULL),
(873, 7, 24, 35, '35'),
(874, 8, 25, 36, '36'),
(875, 8, 26, 37, '37'),
(876, 8, 27, 38, '38'),
(877, 8, 28, 45, '121212'),
(878, 8, 29, 46, '20500000'),
(879, 8, 30, 48, NULL),
(880, 8, 31, 50, '20500000 12312'),
(881, 8, 9, 13, '1555'),
(882, 8, 10, 44, '125'),
(883, 8, 11, 14, NULL),
(884, 8, 12, 16, NULL),
(885, 8, 14, 42, '42'),
(886, 8, 13, 43, '43'),
(887, 8, 21, 19, NULL),
(888, 8, 22, 34, '34'),
(889, 8, 15, 24, NULL),
(890, 8, 16, 28, NULL),
(891, 8, 17, 41, '41'),
(892, 8, 18, 39, '39'),
(893, 8, 19, 30, NULL),
(894, 8, 20, 33, NULL),
(895, 8, 23, 21, NULL),
(896, 8, 24, 35, '35'),
(920, 9, 25, 36, ''),
(921, 9, 26, 37, ''),
(922, 9, 27, 38, ''),
(923, 9, 28, 45, '111'),
(924, 9, 29, 46, '1500'),
(925, 9, 30, 48, NULL),
(926, 9, 31, 50, 'вфывфыв'),
(927, 9, 9, 13, '155'),
(928, 9, 10, 44, '133'),
(929, 9, 11, 14, NULL),
(930, 9, 12, 16, NULL),
(931, 9, 14, 42, ''),
(932, 9, 13, 43, ''),
(933, 9, 21, 19, NULL),
(934, 9, 22, 34, ''),
(935, 9, 15, 24, NULL),
(936, 9, 16, 28, NULL),
(937, 9, 17, 41, ''),
(938, 9, 18, 39, ''),
(939, 9, 19, 30, NULL),
(940, 9, 20, 33, NULL),
(941, 9, 23, 21, NULL),
(942, 9, 24, 35, '');

-- --------------------------------------------------------

--
-- Структура таблицы `objects_type`
--

CREATE TABLE IF NOT EXISTS `objects_type` (
  `id_objects_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `uri_name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_objects_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `objects_type`
--

INSERT INTO `objects_type` (`id_objects_type`, `name`, `uri_name`) VALUES
(1, 'Коттеджи, дома', 'house'),
(2, 'Земельные участки', 'land_area'),
(3, 'Зарубежная недвижимость', 'overseas_real_estate'),
(4, 'Юридические услуги', 'legal_services'),
(5, 'Кредитный брокер', 'credit_broker'),
(6, 'Партнеры', 'partners');

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `partners`
--

INSERT INTO `partners` (`id`, `name`, `description`, `img`) VALUES
(1, 'Партнер1', 'СОВРЕМЕННЫЙ ДОМ И ОФИС — практический информационно-рекламный журнал о строительстве и интерьере. ', '123_1412572993.jpg'),
(4, 'Партнер 4', 'Журнал «СОВРЕМЕННЫЙ ДОМ И ОФИС» - авторитетный эксперт по интерьеру и строительству.', 'bigimage_1412579120.png'),
(5, 'Партнер 5', 'СОВРЕМЕННЫЙ ДОМ И ОФИС  — практический информационно-рекламный журнал о строительстве и интерьере.', 'buy-house_1412579145.png');

-- --------------------------------------------------------

--
-- Структура таблицы `region_city`
--

CREATE TABLE IF NOT EXISTS `region_city` (
  `id_region_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `id_city` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_region_city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `region_city`
--

INSERT INTO `region_city` (`id_region_city`, `name`, `id_city`) VALUES
(2, 'Советский', '5500000100000'),
(3, 'Кировский', '5500000100000'),
(4, 'Арбат', '7700000000000'),
(5, 'Центральный', '5500000100000'),
(6, 'Какойто', '7700000000000'),
(7, 'Новое', '7700000000000'),
(8, 'Витязево', '2300300100000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(10, 'type/building', 'Строительство', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id_subcategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COMMENT 'name subcategory',
  `parent` int(11) DEFAULT NULL,
  `inner_parent` int(11) DEFAULT '0' COMMENT 'if 0 than it''s children category, if 1 it''s value current subcategory',
  `sortable` int(11) DEFAULT NULL,
  `format` varchar(256) DEFAULT NULL,
  `public` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_subcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `name`, `parent`, `inner_parent`, `sortable`, `format`, `public`) VALUES
(8, 'Общая информация', 15, 0, NULL, NULL, 1),
(9, 'Площадь дома', 16, 0, NULL, 'input', 0),
(10, 'Площадь участка', 16, 0, NULL, 'input', 0),
(11, 'Тип застройки', 16, 0, NULL, 'select', 1),
(12, 'Уровень отделки', 17, 0, 1, 'select', 1),
(13, 'Внутренняя отделка стен', 17, 0, 3, 'input', 1),
(14, 'Внешняя отделка стен', 17, 0, 2, 'input', 1),
(15, 'Отопление', 18, 0, NULL, 'select', 1),
(16, 'Газ', 18, 0, NULL, 'select', 1),
(17, 'Электричество', 18, 0, NULL, 'input', 1),
(18, 'Мощность', 18, 0, NULL, 'input', 1),
(19, 'Водоснабжение', 18, 0, NULL, 'select', 1),
(20, 'Канализация', 18, 0, NULL, 'select', 1),
(21, 'Тип ландшафта', 20, 0, NULL, 'select', 1),
(22, 'Дополнительные строения', 20, 0, NULL, 'input', 1),
(23, 'Охрана', 19, 0, NULL, 'select', 1),
(24, 'Благоустроенность', 19, 0, NULL, 'input', 1),
(25, 'Объекты до 5 км', 21, 0, NULL, 'input', 1),
(26, 'Расстояние до леса', 22, 0, NULL, 'input', 1),
(27, 'Водоем для купания', 22, 0, NULL, 'input', 1),
(28, 'Удаленность от МКАД', 23, 0, NULL, 'input', 0),
(29, 'Цена', 23, 0, NULL, 'input', 0),
(30, 'Тип аренда/продажа', 23, 0, NULL, 'select', 0),
(31, 'Описание', 23, 0, NULL, 'textarea', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategory_value`
--

CREATE TABLE IF NOT EXISTS `subcategory_value` (
  `id_subcategory_value` int(11) NOT NULL AUTO_INCREMENT,
  `id_subcategory` int(11) DEFAULT NULL,
  `format_value` varchar(30) DEFAULT NULL,
  `sortable` int(11) DEFAULT NULL,
  `value` text COMMENT 'value if format_value text',
  PRIMARY KEY (`id_subcategory_value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Дамп данных таблицы `subcategory_value`
--

INSERT INTO `subcategory_value` (`id_subcategory_value`, `id_subcategory`, `format_value`, `sortable`, `value`) VALUES
(1, 3, 'select', NULL, 'asdasdasd'),
(2, 3, 'select', NULL, 'asdasd'),
(3, 3, 'select', NULL, 'asd'),
(4, 4, 'select', NULL, 'газон'),
(5, 4, 'select', NULL, 'лес'),
(9, 4, 'select', NULL, 'Поле'),
(10, 4, 'input', NULL, 'Море'),
(11, 7, 'input', NULL, 'Есть'),
(12, 7, 'select', NULL, 'Нет'),
(13, 9, NULL, NULL, ''),
(14, 11, NULL, NULL, ''),
(16, 12, NULL, NULL, ''),
(17, 12, NULL, NULL, 'под ключ'),
(18, 12, NULL, NULL, 'частично'),
(19, 21, NULL, NULL, 'газон'),
(20, 21, NULL, NULL, 'грунт'),
(21, 23, NULL, NULL, 'строгоохраняемый поселок'),
(22, 23, NULL, NULL, 'охроняемый поселок'),
(23, 23, NULL, NULL, 'неохроняемый поселок'),
(24, 15, NULL, NULL, 'газовый котел'),
(25, 15, NULL, NULL, 'центральное'),
(28, 16, NULL, NULL, 'магистральный'),
(29, 16, NULL, NULL, 'балон'),
(30, 19, NULL, NULL, 'центральное'),
(31, 19, NULL, NULL, 'скважина'),
(32, 11, NULL, NULL, 'Дом'),
(33, 20, NULL, NULL, 'централизованная на поселок, септик'),
(34, 22, NULL, NULL, ''),
(35, 24, NULL, NULL, ''),
(36, 25, NULL, NULL, ''),
(37, 26, NULL, NULL, ''),
(38, 27, NULL, NULL, ''),
(39, 18, NULL, NULL, ''),
(41, 17, NULL, NULL, ''),
(42, 14, NULL, NULL, ''),
(43, 13, NULL, NULL, ''),
(44, 10, NULL, NULL, ''),
(45, 28, NULL, NULL, ''),
(46, 29, NULL, NULL, ''),
(47, 30, NULL, NULL, ''),
(48, 30, NULL, NULL, 'Аренда'),
(49, 30, NULL, NULL, 'Продажа'),
(50, 31, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` int(11) NOT NULL DEFAULT '0' COMMENT '0 - user, 1 - admin',
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `date_create`, `user_role`) VALUES
(1, 'admin', 'admin@admin.com', 'cdedab9b02d91a2efb52f9e270467620', '2014-09-25 07:09:31', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `responsibility` text NOT NULL,
  `requirements` text NOT NULL,
  `conditions` text NOT NULL,
  `display` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`id`, `title`, `responsibility`, `requirements`, `conditions`, `display`) VALUES
(1, 'Топ-менеджер  22212121', 'Быть добрым\nМного работать\nНе спать на работе и не на работе\nОставаться работать после работы', 'Пол: не имеет значения\nВозраст: от 18 до 45\nВы должны быть выносливым человеком\nКонечно у вас должно все полчаться', 'Зарплата: от 8000 рублей (это уже с премией)\nГрафик: Полный рабочий день и ночь\nРабота в огромной компании монополисте', 1),
(2, 'Водитель на краш-тесты', 'Ответственное выполнение своей работы\r\nСбор и оценка результатов\r\nТестирование', 'Не опаздывать на работу\r\nВыполнение полного списка работ\r\nОтношение к работе с душой', 'Пол: неважно\r\nВозраст: от 30\r\nПолный соцпакет\r\nБесплатный бассейн', 1),
(3, 'Маркетолог-аналитик', 'Сбор и систематизация маркетинговой информации\r\nИзучение конъюнктуры и тенденций рынка (потребители, конкуренты, продукция)\r\nПроведение маркетинговых исследований (анкетирование, фокус-группы)\r\nРазработка и оптимизация форм внешней и внутренней отчетности\r\nПодготовка регулярной и разовой отчетности\r\nАнализ эффективности мероприятий и решений компании\r\nВыработка детальных рекомендаций для достижения целей компании\r\nУчастие в ценообразовании\r\nУчастие в планировании продаж и производства\r\nУчастие в управлении ассортиментом\r\nУчастие в оптимизации бизнес-процессов и регламентации деятельности', 'Пол: Не важно\r\nВозраст: от 25 до 35\r\nОбразование: Высшее (математическое, экономическое, маркетинговое)\r\nСтаж работы: 2 года\r\nСистемность: (обязательно)\r\nУспешный опыт и наличие реальных достижений в аналогичной области: (обязательно)', 'Зарплата: От 25 000 руб. (оклад + премия)\r\nГрафик: Полный рабочий день \r\nМесто: Новосибирск, Ленинский район \r\nПроизводственная компания федерального масштаба, лидер рынка', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
