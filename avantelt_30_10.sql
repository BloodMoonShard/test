-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2014 г., 11:59
-- Версия сервера: 5.1.71-community-log
-- Версия PHP: 5.2.17

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
  `title_seo` varchar(512) DEFAULT NULL,
  `description_seo` text,
  `keywords_seo` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `building_objects`
--

INSERT INTO `building_objects` (`id`, `title`, `description`, `link`, `create_date`, `title_seo`, `description_seo`, `keywords_seo`) VALUES
(18, 'Красивый деревянный дом', 'Современные реалии загородного строительства показывают очевидный рост количества возводимых деревянных домов по всему мира. Люди, даже имеющие деньги на постройку кирпичного коттеджа, все чаще делают выбор в пользу именно деревянного дома, эта тенденция наблюдается как в странах, для которых деревянные дома традиционны (Россия, Япония, Великобритания) так и в странах, для которых более характерны постройки из камня (Германия, Скандинавия и т.п.). \r\n\r\nВо многом, это обусловлено экономическими соображениями, вместе с тем, стоит заметить, что деревянные дома имеют и эксплуатационные преимущества, так разрекламированные игроками этого бизнеса.', 'http://www.test1.ru', '2014-10-09 05:29:48', 'Красивый деревянный дом', 'Описание', 'Ключевые слова'),
(19, 'Современный кирпичный дом', 'Строительство домов из кирпича имеют многовековую историю. По всему миру возведены десятки, а может быть и сотни тысяч сооружений из кирпича, возраст которых составляет более чем 100-150 лет. Сегодня продолжают появляться и исчезать всё новые виды стройматериалов, но кирпич по-прежнему остается главным строительным материалом в мире.\r\n\r\nВ этой статье мы разберем основные преимущества кирпича, благодаря которым он настолько популярен в строительстве коттеджей и многоэтажных домов.', 'http://www.kirpich.ru', '2014-10-09 05:39:23', 'Современный кирпичный дом', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `callbacks`
--

INSERT INTO `callbacks` (`id`, `name`, `phone_number`, `theme`, `date`, `submit`) VALUES
(1, 'фывфывфы', 'фывфыв', 'С шапки сайта (обычный звонок)', '2014-10-22 09:27:17', 0);

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
('3ec9188fc9c958a4807af0c1249b7cc1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1414659161, 'a:6:{s:9:"user_data";s:0:"";s:8:"per_page";i:2;s:9:"info_user";a:6:{s:8:"id_users";s:1:"1";s:8:"username";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:8:"password";s:32:"cdedab9b02d91a2efb52f9e270467620";s:11:"date_create";s:19:"2014-09-25 14:09:31";s:9:"user_role";s:1:"1";}s:8:"id_users";s:1:"1";s:8:"username";s:5:"admin";s:9:"user_role";s:1:"1";}');

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `currency_code`, `currency`) VALUES
(19, 'Австралия', 'AUD', 'Австралийский доллар'),
(20, 'Австрия', 'EUR', 'Евро'),
(5, 'Азербайджан', 'AZN', 'Азербайджанский манат'),
(21, 'Албания', 'ALL', 'Лек'),
(22, 'Алжир', 'DZD', 'Алжирский динар'),
(23, 'Американское Самоа', 'USD', 'Доллар США'),
(24, 'Ангилья', 'XCD', 'Восточно-карибский доллар'),
(25, 'Ангола', 'AOA', 'Кванза'),
(26, 'Андорра', 'EUR', 'Евро'),
(27, 'Антигуа и Барбуда', 'XCD', 'Восточно-карибский доллар'),
(28, 'Аргентина', 'ARS', 'Аргентинское песо'),
(6, 'Армения', 'AMD', 'Армянский драм'),
(29, 'Аруба', 'AWG', 'Арубанский флорин'),
(30, 'Афганистан', 'AFN', 'Афгани'),
(31, 'Багамы', 'BSD', 'Багамский доллар'),
(32, 'Бангладеш', 'BDT', 'Така'),
(33, 'Барбадос', 'BBD', 'Барбадосский доллар'),
(34, 'Бахрейн', 'BHD', 'Бахрейнский динар'),
(3, 'Беларусь', 'BYR', 'Белорусский рубль'),
(35, 'Белиз', 'BZD', 'Белизский доллар '),
(36, 'Бельгия', 'EUR', 'Евро'),
(37, 'Бенин', 'XOF', 'Франк КФА BCEAO'),
(38, 'Бермуды', 'BMD', 'Бермудский доллар'),
(39, 'Болгария', 'BGN', 'Болгарский лев'),
(40, 'Боливия', 'BOB', 'Боливиано'),
(41, 'Босния и Герцеговина', 'BAM', 'Конвертируемая марка'),
(42, 'Ботсвана', 'BWP', 'Пула'),
(43, 'Бразилия', 'BRL', 'Бразильский реал'),
(44, 'Бруней-Даруссалам', 'BND', 'Брунейский доллар'),
(45, 'Буркина-Фасо', 'XOF', 'Франк КФА BCEAO'),
(46, 'Бурунди', 'BIF', 'Бурундийский франк'),
(47, 'Бутан', 'BTN', 'Нгултрум'),
(48, 'Вануату', 'VUV', 'Вату'),
(49, 'Великобритания', 'GBP', 'Фунт стерлингов'),
(50, 'Венгрия', 'HUF', 'Форинт'),
(51, 'Венесуэла', 'VEF', 'Боливар фуэрте'),
(52, 'Виргинские острова, Британские', 'USD', 'Доллар США'),
(53, 'Виргинские острова, США', 'USD', 'Доллар США'),
(54, 'Восточный Тимор', 'USD', 'Доллар США'),
(55, 'Вьетнам', 'VND', 'Донг'),
(56, 'Габон', 'XAF', 'Франк КФА BEAC'),
(57, 'Гаити', 'HTG', 'Гурд'),
(58, 'Гайана', 'GYD', 'Гайанский доллар'),
(59, 'Гамбия', 'GMD', 'Даласи'),
(60, 'Гана', 'GHS', 'Седи'),
(61, 'Гваделупа', 'EUR', 'Евро'),
(62, 'Гватемала', 'GTQ', 'Кетсаль'),
(63, 'Гвинея', 'GNF', 'Гвинейский франк'),
(64, 'Гвинея-Бисау', 'XFO', 'Франк КФА BCEAO'),
(65, 'Германия', 'EUR', 'Евро'),
(66, 'Гибралтар', 'GIP', 'Гибралтарский фунт'),
(67, 'Гондурас', 'HNL', 'Лемпира'),
(68, 'Гонконг', 'HKD', 'Гонконгский доллар'),
(69, 'Гренада', 'XCD', 'Восточно-карибский доллар'),
(70, 'Гренландия', 'DKK', 'Датская крона'),
(71, 'Греция', 'EUR', 'Евро'),
(7, 'Грузия', 'GEL', 'Лари'),
(72, 'Гуам', 'USD', 'Доллар США'),
(73, 'Дания', 'DKK', 'Датская крона'),
(231, 'Джибути', 'DJF', 'Франк Джибути'),
(74, 'Доминика', 'XCD', 'Восточно-карибский доллар'),
(75, 'Доминиканская Республика', 'DOP', 'Доминиканское песо'),
(76, 'Египет', 'EGP', 'Египетский фунт'),
(77, 'Замбия', 'ZMW', 'Замбийская квача'),
(78, 'Западная Сахара', 'MAD', 'Марокканский дирхам'),
(79, 'Зимбабве', 'ZWL', 'Доллар Зимбабве'),
(8, 'Израиль', 'ILS', 'Новый израильский шекель'),
(80, 'Индия', 'INR', 'Индийская рупия'),
(81, 'Индонезия', 'IDR', 'Рупия'),
(82, 'Иордания', 'JOD', 'Иорданский динар'),
(83, 'Ирак', 'IQD', 'Иракский динар'),
(84, 'Иран', 'IRR', 'Иранский риал'),
(85, 'Ирландия', 'EUR', 'Евро'),
(86, 'Исландия', 'ISK', 'Исландская крона'),
(87, 'Испания', 'EUR', 'Евро'),
(88, 'Италия', 'EUR', 'Евро'),
(89, 'Йемен', 'YER', 'Йеменский риал'),
(90, 'Кабо-Верде', 'CVE', 'Эскудо Кабо-Верде'),
(4, 'Казахстан', 'KZT', 'Тенге'),
(91, 'Камбоджа', 'KHR', 'Риель'),
(92, 'Камерун', 'XAF', 'Франк КФА BEAC'),
(10, 'Канада', 'CAD', 'Канадский доллар'),
(93, 'Катар', 'QAR', 'Катарский риал'),
(94, 'Кения', 'KES', 'Кенийский шиллинг'),
(95, 'Кипр', 'EUR', 'Евро'),
(96, 'Кирибати', 'AUD', 'Австралийский доллар'),
(97, 'Китай', 'CNY', 'Юань'),
(98, 'Колумбия', 'COP', 'Колумбийское песо'),
(99, 'Коморы', 'KMF', 'Франк Комор'),
(100, 'Конго', 'CDF', 'Конголезский франк'),
(101, 'Конго, демократическая республика', 'XAF', 'Франк КФА BEAC'),
(102, 'Коста-Рика', 'CRC', 'Костариканский колон'),
(103, 'Кот д`Ивуар', 'XOF', 'Франк КФА BCEAO'),
(104, 'Куба', 'CUP', 'Кубинское песо'),
(105, 'Кувейт', 'KWD', 'Кувейтский динар'),
(11, 'Кыргызстан', 'KGS', 'Сом'),
(106, 'Лаос', 'LAK', 'Кип'),
(12, 'Латвия', 'LVL', 'Латвийский лат'),
(107, 'Лесото', 'LSL', 'Лоти'),
(108, 'Либерия', 'LRD', 'Либерийский доллар'),
(109, 'Ливан', 'LBP', 'Ливанский фунт'),
(110, 'Ливийская Арабская Джамахирия', 'LYD', 'Ливийский динар'),
(13, 'Литва', 'LTL', 'Литовский лит'),
(111, 'Лихтенштейн', 'CHF', 'Швейцарский франк'),
(112, 'Люксембург', 'EUR', 'Евро'),
(113, 'Маврикий', 'MUR', 'Маврикийская рупия'),
(114, 'Мавритания', 'MRO', 'Угия'),
(115, 'Мадагаскар', 'MGA', 'Ариари'),
(116, 'Макао', 'MOP', 'Патака'),
(117, 'Македония', 'MKD', 'Денар'),
(118, 'Малави', 'MWK', 'Квача'),
(119, 'Малайзия', 'MYR', 'Малайзийский ринггит'),
(120, 'Мали', 'XOF', 'Франк КФА BCEAO'),
(121, 'Мальдивы', 'MVR', 'Руфия'),
(122, 'Мальта', 'EUR', 'Евро'),
(123, 'Марокко', 'MAD', 'Марокканский дирхам'),
(124, 'Мартиника', 'EUR', 'Евро'),
(125, 'Маршалловы Острова', 'USD', 'Доллар США'),
(126, 'Мексика', 'MXN', 'Мексиканское песо'),
(127, 'Микронезия, федеративные штаты', 'USD', 'Доллар США'),
(128, 'Мозамбик', 'MZN', 'Мозамбикский метикал'),
(15, 'Молдова', 'MDL', 'Молдавский лей'),
(129, 'Монако', 'EUR', 'Евро'),
(130, 'Монголия', 'MNT', 'Тугрик'),
(131, 'Монтсеррат', 'XCD', 'Восточно-карибский доллар'),
(132, 'Мьянма', 'MMK', 'Кьят'),
(133, 'Намибия', 'NAD', 'Доллар Намибии'),
(134, 'Науру', 'AUD', 'Австралийский доллар'),
(135, 'Непал', 'NPR', 'Непальская рупия'),
(136, 'Нигер', 'XOF', 'Франк КФА BCEAO'),
(137, 'Нигерия', 'NGN', 'Найра'),
(138, 'Нидерландские Антилы', 'ANG', 'Нидерландский антильский гульден'),
(139, 'Нидерланды', 'EUR', 'Евро'),
(140, 'Никарагуа', 'NIO', 'Золотая кордоба'),
(141, 'Ниуэ', 'NZD', 'Новозеландский доллар'),
(142, 'Новая Зеландия', 'NZD', 'Новозеландский доллар'),
(143, 'Новая Каледония', 'XPF', 'Франк КФП'),
(144, 'Норвегия', 'NOK', 'Норвежская крона'),
(145, 'Объединенные Арабские Эмираты', 'AED', 'Дирхам'),
(146, 'Оман', 'OMR', 'Оманский риал'),
(147, 'Остров Мэн', 'GBP', 'Фунт стерлингов'),
(148, 'Остров Норфолк', 'AUD', 'Австралийский доллар'),
(149, 'Острова Кайман', 'KYD', 'Доллар Островов Кайман'),
(150, 'Острова Кука', 'NZD', 'Новозеландский доллар'),
(151, 'Острова Теркс и Кайкос', 'USD', 'Доллар США'),
(152, 'Пакистан', 'PKR', 'Пакистанская рупия'),
(153, 'Палау', 'USD', 'Доллар США'),
(154, 'Палестинская автономия', 'ILS', 'Новый израильский шекель'),
(155, 'Панама', 'PAB', 'Бальбоа'),
(156, 'Папуа - Новая Гвинея', 'PGK', 'Кина'),
(157, 'Парагвай', 'PYG', 'Гуарани'),
(158, 'Перу', 'PEN', 'Новый соль'),
(159, 'Питкерн', 'NZD', 'Новозеландский доллар'),
(160, 'Польша', 'PLN', 'Злотый'),
(161, 'Португалия', 'EUR', 'Евро'),
(162, 'Пуэрто-Рико', 'USD', 'Доллар США'),
(163, 'Реюньон', 'EUR', 'Евро'),
(1, 'Россия', 'RUB', 'Российский рубль'),
(164, 'Руанда', 'RWF', 'Франк Руанды'),
(165, 'Румыния', 'RON', 'Лей'),
(9, 'США', 'USD', 'Доллар США'),
(166, 'Сальвадор', 'SVC', 'Сальвадорский колон'),
(167, 'Самоа', 'WST', 'Тала'),
(168, 'Сан-Марино', 'EUR', 'Евро'),
(169, 'Сан-Томе и Принсипи', 'STD', 'Добра'),
(170, 'Саудовская Аравия', 'SAR', 'Саудовский риял'),
(171, 'Свазиленд', 'SZL', 'Лилангени'),
(172, 'Святая Елена', 'SHP', 'Фунт Святой Елены'),
(173, 'Северная Корея', 'KPW', 'Северокорейская вона'),
(174, 'Северные Марианские острова', 'USD', 'Доллар США'),
(175, 'Сейшелы', 'SCR', 'Сейшельская рупия'),
(176, 'Сенегал', 'XOF', 'Франк КФА BCEAO'),
(177, 'Сент-Винсент', 'XCD', 'Восточно-карибский доллар'),
(178, 'Сент-Китс и Невис', 'XCD', 'Восточно-карибский доллар'),
(179, 'Сент-Люсия', 'XCD', 'Восточно-карибский доллар'),
(180, 'Сент-Пьер и Микелон', 'EUR', 'Евро'),
(181, 'Сербия', 'RSD', 'Сербский динар'),
(182, 'Сингапур', 'SGD', 'Сингапурский доллар'),
(183, 'Сирийская Арабская Республика', 'SYP', 'Сирийский фунт'),
(184, 'Словакия', 'EUR', 'Евро'),
(185, 'Словения', 'EUR', 'Евро'),
(186, 'Соломоновы Острова', 'SBD', 'Доллар Соломоновых Островов'),
(187, 'Сомали', 'SOS', 'Сомалийский шиллинг'),
(188, 'Судан', 'SDG', 'Суданский фунт'),
(189, 'Суринам', 'SRD', 'Суринамский доллар'),
(190, 'Сьерра-Леоне', 'SLL', 'Леоне'),
(16, 'Таджикистан', 'TJS', 'Сомони'),
(191, 'Таиланд', 'THB', 'Бат'),
(192, 'Тайвань', 'TWD', 'Новый тайваньский доллар'),
(193, 'Танзания', 'TZS', 'Танзанийский шиллинг'),
(194, 'Того', 'XOF', 'Франк КФА BCEAO'),
(195, 'Токелау', 'NZD', 'Новозеландский доллар'),
(196, 'Тонга', 'TOP', 'Паанга'),
(197, 'Тринидад и Тобаго', 'TTD', 'Доллар Тринидада и Тобаго'),
(198, 'Тувалу', 'AUD', 'Австралийский доллар'),
(199, 'Тунис', 'TND', 'Тунисский динар'),
(17, 'Туркмения', 'TMT', 'Манат'),
(200, 'Турция', 'TRY', 'Турецкая лира'),
(201, 'Уганда', 'UGX', 'Угандийский шиллинг'),
(18, 'Узбекистан', 'UZS', 'Узбекский сум'),
(2, 'Украина', 'UAH', 'Гривна'),
(202, 'Уоллис и Футуна', 'XPF', 'Франк КФП'),
(203, 'Уругвай', 'UYU', 'Уругвайское песо'),
(204, 'Фарерские острова', 'DKK', 'Датская крона'),
(205, 'Фиджи', 'FJD', 'Доллар Фиджи'),
(206, 'Филиппины', 'PHP', 'Филиппинское песо'),
(207, 'Финляндия', 'EUR', 'Евро'),
(208, 'Фолклендские острова', 'FKP', 'Фунт Фолклендских островов'),
(209, 'Франция', 'EUR', 'Евро'),
(210, 'Французская Гвиана', 'EUR', 'Евро'),
(211, 'Французская Полинезия', 'XPF', 'Франк КФП'),
(212, 'Хорватия', 'HRK', 'Хорватская куна'),
(213, 'Центрально-Африканская Республика', 'XAF', 'Франк КФА BEAC'),
(214, 'Чад', 'XAF', 'Франк КФА BEAC'),
(230, 'Черногория', 'EUR', 'Евро'),
(215, 'Чехия', 'CZK', 'Чешская крона'),
(216, 'Чили', 'CLP', 'Чилийское песо'),
(217, 'Швейцария', 'CHF', 'Швейцарский франк'),
(218, 'Швеция', 'SEK', 'Шведская крона'),
(219, 'Шпицберген и Ян Майен', 'NOK', 'Норвежская крона'),
(220, 'Шри-Ланка', 'LKR', 'Шри-ланкийская рупия'),
(221, 'Эквадор', 'USD', 'Доллар США'),
(222, 'Экваториальная Гвинея', 'XAF', 'Франк КФА BEAC'),
(223, 'Эритрея', 'ERN', 'Накфа'),
(14, 'Эстония', 'EUR', 'Евро'),
(224, 'Эфиопия', 'ETB', 'Эфиопия'),
(226, 'Южная Корея', 'KRW', 'Вона'),
(227, 'Южно-Африканская Республика', 'ZAR', 'Рэнд'),
(228, 'Ямайка', 'JMD', 'Ямайский доллар'),
(229, 'Япония', 'JPY', 'Иена');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
(7, 'Центральное', '2300300100000', 0),
(8, 'Главное шоссе', '5001800100000', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `highway_direction`
--

CREATE TABLE IF NOT EXISTS `highway_direction` (
  `id_highway_direction` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `id_city` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_highway_direction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
(7, 'Юго-восток', '2300300100000'),
(8, '123', '7700000000000');

-- --------------------------------------------------------

--
-- Структура таблицы `manager_agents`
--

CREATE TABLE IF NOT EXISTS `manager_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_manager` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `manager_agents`
--

INSERT INTO `manager_agents` (`id`, `id_manager`, `id_agent`) VALUES
(5, 10, 8),
(7, 10, 11);

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
  `article` varchar(512) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `title_seo` text,
  `description_seo` text,
  `keywords_seo` text,
  `underground` int(11) DEFAULT NULL,
  `order_flag` tinyint(1) DEFAULT '0',
  `buyer` varchar(255) DEFAULT NULL,
  `buyer_email` varchar(255) DEFAULT NULL,
  `buyer_phone` varchar(255) DEFAULT NULL,
  `performer` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `comment` text,
  `status_obj` tinyint(2) DEFAULT NULL,
  `order_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_objects`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `objects`
--

INSERT INTO `objects` (`id_objects`, `type`, `date_add`, `public`, `id_users`, `name_object`, `city`, `region`, `district`, `street`, `building`, `highway_list`, `region_list`, `city_id`, `article`, `country`, `title_seo`, `description_seo`, `keywords_seo`, `underground`, `order_flag`, `buyer`, `buyer_email`, `buyer_phone`, `performer`, `additional_info`, `comment`, `status_obj`, `order_date`) VALUES
(5, 1, '2014-10-03 04:17:23', 0, NULL, 'Дом на Витязево', 'Кирово', 'Северная Осетия - Алания', '', 'Ворошилова', '', '0', '0', '6600000200000', '', 1, 'Пум пум пум', 'Опиасчние', 'Ключеыврыао', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 1, '2014-10-06 05:35:18', 0, NULL, 'Дом 2', 'Сергиев Посад', 'Московская', 'Сергиево-Посадский', 'Гефсиманские пруды', '2а', 'Выберите шоссе', 'Выберите округ', '5003000500000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 1, '2014-10-06 05:39:20', 0, NULL, 'Дом 34', 'Сергиев Посад-7', 'Московская', 'Сергиево-Посадский', 'Ленина', '15', '0', '0', '5003000600000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 1, '2014-10-07 03:01:16', 0, NULL, 'Дом12', 'Ардатов', 'Мордовия', 'Ардатовский', 'Алатырская', '2', '0', '0', '1300200100000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 1, '2014-10-07 03:03:04', 0, NULL, 'Дом', 'Академиков', 'Московская', 'Сергиево-Посадский', 'А а а а', '13', '0', '0', '5003000600000', '999', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 1, '2014-10-14 09:17:42', 0, NULL, 'afasfasfasf', '', '', '', '', '', '0', '0', '', '', 1, 'asfasfasfasf', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 1, '2014-10-14 09:17:59', 0, NULL, 'afasfasfasf', '', '', '', '', '', '0', '0', '', '', 1, 'asfasfasfasf', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 1, '2014-10-14 09:18:49', 0, NULL, 'afasfasfasf', '', '', '', '', '', '0', '0', '', '', 1, 'asfasfasfasf', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 1, '2014-10-14 09:43:29', 0, NULL, 'С фтоками', '', '', '', '', '', '0', '0', '', '', 1, 'фыафыафыа', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 7, '2014-10-27 20:12:19', 0, 1, '2Квартира№1', 'Москва', '', '', 'Арбат', '20', '0', '0', '7700000000000', '123', 1, '', '', '', 3, 1, 'asfasfasf', 'вася@dfas', '8912312312', NULL, 'asf asf as fas af as fas', 'asf as fas fasas fa fasf as fa f', 2, 1414598130),
(24, 7, '2014-10-28 08:59:27', 0, 1, '#2 Квартира', 'Москва', '', '', '', '', 'Выберите шоссе', 'Выберите округ', '7700000000000', '', 1, '', '', '', 1, 1, 'Вася', 'вася@dfas', '8912312312', NULL, '1234 12412 412 4ыф фыафыа фыа', 'ф ыафы фыа фыа фыа фыа фыа', 1, 1414580247);

-- --------------------------------------------------------

--
-- Структура таблицы `objects_images`
--

CREATE TABLE IF NOT EXISTS `objects_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_objects` int(11) NOT NULL,
  `img_name` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `objects_images`
--

INSERT INTO `objects_images` (`id`, `id_objects`, `img_name`) VALUES
(5, 21, '123_1413279809.jpg'),
(6, 21, 'buy-house_1413279809.png'),
(7, 21, 'img3_1413344660.png'),
(8, 21, 'nutr__1413344660.jpg'),
(9, 21, 'bigimage_1413344677.png'),
(10, 21, 'img1_1413344677.png'),
(11, 5, '123_1413346644.jpg'),
(12, 5, 'buy-house_1413346644.png'),
(13, 22, ''),
(14, 23, ''),
(15, 24, ''),
(16, 25, ''),
(17, 22, ''),
(18, 22, ''),
(19, 22, ''),
(20, 22, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1335 ;

--
-- Дамп данных таблицы `objects_options`
--

INSERT INTO `objects_options` (`id_objects_options`, `id_objects`, `id_subcategory`, `id_subcategory_value`, `id_subcategory_value_input`) VALUES
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
(942, 9, 24, 35, ''),
(1127, 20, 25, 36, ''),
(1128, 20, 26, 37, ''),
(1129, 20, 27, 38, ''),
(1130, 20, 28, 45, ''),
(1131, 20, 29, 46, ''),
(1132, 20, 30, 47, NULL),
(1133, 20, 31, 50, ''),
(1134, 20, 9, 13, ''),
(1135, 20, 10, 44, ''),
(1136, 20, 11, 14, NULL),
(1137, 20, 12, 16, NULL),
(1138, 20, 14, 42, ''),
(1139, 20, 13, 43, ''),
(1140, 20, 21, 19, NULL),
(1141, 20, 22, 34, ''),
(1142, 20, 15, 24, NULL),
(1143, 20, 16, 28, NULL),
(1144, 20, 17, 41, ''),
(1145, 20, 18, 39, ''),
(1146, 20, 19, 30, NULL),
(1147, 20, 20, 33, NULL),
(1148, 20, 23, 21, NULL),
(1149, 20, 24, 35, ''),
(1196, 21, 25, 36, ''),
(1197, 21, 26, 37, ''),
(1198, 21, 27, 38, ''),
(1199, 21, 28, 45, ''),
(1200, 21, 29, 46, ''),
(1201, 21, 30, 47, NULL),
(1202, 21, 31, 50, ''),
(1203, 21, 9, 13, ''),
(1204, 21, 10, 44, ''),
(1205, 21, 11, 14, NULL),
(1206, 21, 12, 16, NULL),
(1207, 21, 14, 42, ''),
(1208, 21, 13, 43, ''),
(1209, 21, 21, 19, NULL),
(1210, 21, 22, 34, ''),
(1211, 21, 15, 24, NULL),
(1212, 21, 16, 28, NULL),
(1213, 21, 17, 41, ''),
(1214, 21, 18, 39, ''),
(1215, 21, 19, 30, NULL),
(1216, 21, 20, 33, NULL),
(1217, 21, 23, 21, NULL),
(1218, 21, 24, 35, ''),
(1219, 5, 25, 36, 'спортивный клуб; магазин; детский сад; школа; развлекательный центр; больница; ресторан'),
(1220, 5, 26, 37, 'примыкает к лесу'),
(1221, 5, 27, 38, 'вид на море'),
(1222, 5, 28, 45, '5'),
(1223, 5, 29, 46, '13100000'),
(1224, 5, 30, 49, NULL),
(1225, 5, 31, 50, 'Крутой дом'),
(1226, 5, 9, 13, '120'),
(1227, 5, 10, 44, '200'),
(1228, 5, 11, 32, NULL),
(1229, 5, 12, 18, NULL),
(1230, 5, 14, 42, 'оштукатурен и покрашен'),
(1231, 5, 13, 43, 'обои, декротивная штукатурка'),
(1232, 5, 21, 19, NULL),
(1233, 5, 22, 34, 'беседка'),
(1234, 5, 15, 24, NULL),
(1235, 5, 16, 28, NULL),
(1236, 5, 17, 41, 'документально подтвержденное'),
(1237, 5, 18, 39, '15'),
(1238, 5, 19, 30, NULL),
(1239, 5, 20, 33, NULL),
(1240, 5, 23, 23, NULL),
(1241, 5, 24, 35, 'спортивные площадки, детские площадки, освещенные улицы'),
(1303, 22, 25, 36, ''),
(1304, 22, 26, 37, ''),
(1305, 22, 27, 38, ''),
(1306, 22, 33, 61, NULL),
(1307, 22, 28, 45, ''),
(1308, 22, 29, 46, '15000000'),
(1309, 22, 30, 49, NULL),
(1310, 22, 31, 50, ''),
(1311, 22, 9, 13, '50'),
(1312, 22, 10, 44, ''),
(1313, 22, 14, 42, ''),
(1314, 22, 13, 43, ''),
(1315, 22, 22, 34, ''),
(1316, 22, 17, 41, ''),
(1317, 22, 18, 39, ''),
(1318, 22, 24, 35, ''),
(1319, 24, 25, 36, ''),
(1320, 24, 26, 37, ''),
(1321, 24, 27, 38, ''),
(1322, 24, 28, 45, ''),
(1323, 24, 32, 51, NULL),
(1324, 24, 29, 46, '1122333'),
(1325, 24, 30, 49, NULL),
(1326, 24, 31, 50, ''),
(1327, 24, 9, 13, '15'),
(1328, 24, 10, 44, ''),
(1329, 24, 14, 42, ''),
(1330, 24, 13, 43, ''),
(1331, 24, 22, 34, ''),
(1332, 24, 17, 41, ''),
(1333, 24, 18, 39, ''),
(1334, 24, 24, 35, '');

-- --------------------------------------------------------

--
-- Структура таблицы `objects_type`
--

CREATE TABLE IF NOT EXISTS `objects_type` (
  `id_objects_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `uri_name` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id_objects_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `objects_type`
--

INSERT INTO `objects_type` (`id_objects_type`, `name`, `uri_name`) VALUES
(1, 'Коттеджи, дома', 'house'),
(2, 'Земельные участки', 'land_area'),
(3, 'Зарубежная недвижимость', 'overseas_real_estate'),
(4, 'Юридические услуги', 'legal_services'),
(5, 'Кредитный брокер', 'credit_broker'),
(6, 'Партнеры', 'partners'),
(7, 'Квартиры', 'room');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
(8, 'Витязево', '2300300100000'),
(9, 'Центральный', '5001800100000');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `phone_number` varchar(512) DEFAULT NULL,
  `file_resume` varchar(512) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `name`, `phone_number`, `file_resume`, `create_date`) VALUES
(11, 'Василий Тракторист', '89007009887', 'resume-1413254139.docx', '2014-10-14 02:35:39'),
(12, 'Лариса Желудь', '89006007656', 'resume-1413254182.jpg', '2014-10-14 02:36:22'),
(13, 'Вася', '812312312312341', 'resume-1413262946.zip', '2014-10-14 05:02:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(10, 'type/building', 'Строительство', '', ''),
(11, 'type/house', 'Коттеджи, дома', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `status_options`
--

CREATE TABLE IF NOT EXISTS `status_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `status_options`
--

INSERT INTO `status_options` (`id`, `status`) VALUES
(1, 'В работе'),
(2, 'Новый'),
(3, 'Показ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

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
(28, 'Удаленность от МКАД', 23, 0, 1, 'input', 0),
(29, 'Цена', 23, 0, 3, 'input', 0),
(30, 'Тип аренда/продажа', 23, 0, 4, 'select', 0),
(31, 'Описание', 23, 0, 5, 'textarea', 0),
(32, 'Валюта', 23, 0, 2, 'select', 0),
(33, 'Количество комнат', 23, 0, NULL, 'select', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

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
(50, 31, NULL, NULL, ''),
(51, 32, NULL, NULL, 'P'),
(52, 32, NULL, NULL, '$'),
(53, 32, NULL, NULL, '€'),
(57, 33, NULL, NULL, ''),
(58, 33, NULL, NULL, '1'),
(59, 33, NULL, NULL, '2'),
(60, 33, NULL, NULL, '3'),
(61, 33, NULL, NULL, '4'),
(62, 33, NULL, NULL, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `underground`
--

CREATE TABLE IF NOT EXISTS `underground` (
  `id_underground` int(11) NOT NULL AUTO_INCREMENT,
  `name_underground` varchar(512) NOT NULL,
  `id_city` bigint(20) NOT NULL,
  PRIMARY KEY (`id_underground`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Метро' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `underground`
--

INSERT INTO `underground` (`id_underground`, `name_underground`, `id_city`) VALUES
(1, 'Новое', 7700000000000),
(2, 'Новое2', 7700000000000),
(3, 'Новое3', 7700000000000);

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
  `free_agent` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `date_create`, `user_role`, `free_agent`) VALUES
(1, 'admin', 'admin@admin.com', 'cdedab9b02d91a2efb52f9e270467620', '2014-09-25 07:09:31', 1, 0),
(8, 'Новый агент', 'a@a.ru', 'da519ef99c21c7bd396b957296d7c7dd', '2014-10-30 05:30:45', 3, 1),
(10, 'Менеджер года', 'm@m.ru', 'da519ef99c21c7bd396b957296d7c7dd', '2014-10-30 05:32:01', 4, 0),
(11, 'Новый агент 2', 'a2@a.ru', 'da519ef99c21c7bd396b957296d7c7dd', '2014-10-30 06:04:41', 3, 1),
(12, 'Новый агент 3', 'a3@a.ru', 'da519ef99c21c7bd396b957296d7c7dd', '2014-10-30 08:32:13', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_privileges`
--

CREATE TABLE IF NOT EXISTS `users_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users_privileges`
--

INSERT INTO `users_privileges` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user'),
(3, 'agent'),
(4, 'manager');

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
