--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 12.07.2016 10:09:42
-- Версия сервера: 5.5.47-0+deb8u1
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE dvery;

--
-- Описание для таблицы actions
--
DROP TABLE IF EXISTS actions;
CREATE TABLE actions (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  description VARCHAR(255) NOT NULL,
  keywords VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  img VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы category
--
DROP TABLE IF EXISTS category;
CREATE TABLE category (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  parent_id VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  img VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 28
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы directory
--
DROP TABLE IF EXISTS directory;
CREATE TABLE directory (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  parent_id INT(11) DEFAULT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 18
AVG_ROW_LENGTH = 2048
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы im
--
DROP TABLE IF EXISTS im;
CREATE TABLE im (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  img VARCHAR(255) NOT NULL,
  id_directory INT(11) NOT NULL,
  id_razdel INT(11) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 35
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы migrations
--
DROP TABLE IF EXISTS migrations;
CREATE TABLE migrations (
  migration VARCHAR(255) NOT NULL,
  batch INT(11) NOT NULL
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2340
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы news
--
DROP TABLE IF EXISTS news;
CREATE TABLE news (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  description VARCHAR(255) DEFAULT NULL,
  img VARCHAR(255) DEFAULT NULL,
  title VARCHAR(255) DEFAULT NULL,
  keywords VARCHAR(255) NOT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы page
--
DROP TABLE IF EXISTS page;
CREATE TABLE page (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  description VARCHAR(255) NOT NULL,
  keywords VARCHAR(255) DEFAULT NULL,
  title VARCHAR(255) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы password_resets
--
DROP TABLE IF EXISTS password_resets;
CREATE TABLE password_resets (
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX password_resets_email_index (email),
  INDEX password_resets_token_index (token)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы products
--
DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  price VARCHAR(255) NOT NULL,
  text TEXT NOT NULL,
  keywords VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  id_category INT(11) NOT NULL,
  properties VARCHAR(255) NOT NULL,
  img_one VARCHAR(255) NOT NULL,
  img_too VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX users_email_unique (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 3276
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы actions
--
INSERT INTO actions VALUES
(1, 'МагазинТовар акция', 'magazintovar-akciya', '<p>ыв фв в ыфв ыф</p>\r\n', 'фыв фыв ыф выфв ыф', ' выфв ыфв фы', 'в ыфв фыв ыфв ы ф', 'rem_krov-1467723556.jpg', NULL, NULL, '2016-07-05 12:59:16', '2016-07-05 12:59:16'),
(2, 'dr20086n', 'dr20086n', '<p>фыв &nbsp;фыфыв фы</p>\r\n', 'ывыфвыф фыв', 'ыф вф фыв ', ' выффыв фыв ', 'фасадные работы-1467730150.jpg', NULL, NULL, '2016-07-05 14:49:11', '2016-07-05 14:49:11');

-- 
-- Вывод данных для таблицы category
--
INSERT INTO category VALUES
(1, 'Входные двери', 'vhodnye-dveri', '0', '123', ' двери-1467986827.png', NULL, NULL, '2016-07-04 11:08:11', '2016-07-08 14:07:07'),
(3, 'Межкомнатные двери', 'mezhkomnatnye-dveri', '0', 'уцаак ка укцу куц', ' двери-1467986843.jpg', NULL, NULL, '2016-07-07 06:46:41', '2016-07-08 14:07:23'),
(4, 'Художественная ковка', 'hudozhestvennaya-kovka', '0', '', '-1467986895.jpg', NULL, NULL, '2016-07-08 14:08:15', '2016-07-08 14:08:15'),
(5, 'Межкомнатные перегородки', 'mezhkomnatnye-peregorodki', '0', '', '-1467987028.jpg', NULL, NULL, '2016-07-08 14:10:28', '2016-07-08 14:10:28'),
(6, 'Отделка откосов', 'otdelka-otkosov', '0', '', ' откосов-1467987049.jpg', NULL, NULL, '2016-07-08 14:10:49', '2016-07-08 14:10:49'),
(7, 'Белые межкомнатные двери', 'belye-mezhkomnatnye-dveri', '0', '', '-1467987091.jpg', NULL, NULL, '2016-07-08 14:11:31', '2016-07-08 14:11:31'),
(8, 'Элит', 'elit', '1', '', '-1467987359.png', NULL, NULL, '2016-07-08 14:15:59', '2016-07-08 14:15:59'),
(9, 'Стандарт', 'standart', '1', '', '-1467987381.png', NULL, NULL, '2016-07-08 14:16:21', '2016-07-08 14:16:21'),
(10, 'Нестандарт', 'nestandart', '1', '', '-1467987403.png', NULL, NULL, '2016-07-08 14:16:43', '2016-07-08 14:16:43'),
(11, 'Тамбурная', 'tamburnaya', '10', '', '-1467987497.jpg', NULL, NULL, '2016-07-08 14:18:17', '2016-07-08 14:18:17'),
(12, 'Противопожарная', 'protivopozharnaya', '10', '', '-1467987535.jpg', NULL, NULL, '2016-07-08 14:18:55', '2016-07-08 14:18:55'),
(13, 'Подъездная', 'pod-ezdnaya', '10', '', '-1467987564.jpg', NULL, NULL, '2016-07-08 14:19:24', '2016-07-08 14:19:24'),
(14, 'Дверь в кассу', 'dver-v-kassu', '10', '', '-1467987605.jpg', NULL, NULL, '2016-07-08 14:20:05', '2016-07-08 14:20:05'),
(15, 'Дверь в оружейную', 'dver-v-oruzheynuyu', '10', '', '-1467987644.jpg', NULL, NULL, '2016-07-08 14:20:44', '2016-07-08 14:20:44'),
(16, 'Дверь в лифтерную', 'dver-v-lifternuyu', '10', '', '-1467987677.jpg', NULL, NULL, '2016-07-08 14:21:17', '2016-07-08 14:21:17'),
(17, 'Дверь в электрощитовую', 'dver-v-elektroschitovuyu', '10', '', '-1467987699.jpg', NULL, NULL, '2016-07-08 14:21:39', '2016-07-08 14:21:39'),
(18, 'Двери хозяйственного назначения', 'dveri-hozyaystvennogo-naznacheniya', '10', '', '-1467987753.jpg', NULL, NULL, '2016-07-08 14:22:33', '2016-07-08 14:22:33'),
(19, 'Варадор', 'varador', '3', '', '-1467988111.png', NULL, NULL, '2016-07-08 14:28:31', '2016-07-08 14:28:31'),
(20, 'Владимирская Фабрика Дверей', 'vladimirskaya-fabrika-dverey', '3', '', ' фаьрика дверей-1467988139.jpg', NULL, NULL, '2016-07-08 14:28:59', '2016-07-08 14:28:59'),
(21, 'Дариано', 'dariano', '3', '', '-1467988160.png', NULL, NULL, '2016-07-08 14:29:20', '2016-07-08 14:29:20'),
(22, 'Луидор', 'luidor', '3', '', '-1467988178.png', NULL, NULL, '2016-07-08 14:29:38', '2016-07-08 14:29:38'),
(23, 'Мариам', 'mariam', '3', '', '-1467988198.png', NULL, NULL, '2016-07-08 14:29:58', '2016-07-08 14:29:58'),
(24, 'Мебель массив', 'mebel-massiv', '3', '', ' массив-1467988216.png', NULL, NULL, '2016-07-08 14:30:16', '2016-07-08 14:30:16'),
(25, 'Океан', 'okean', '3', '', '-1467988235.png', NULL, NULL, '2016-07-08 14:30:35', '2016-07-08 14:30:35'),
(26, 'Практика', 'praktika', '3', '', '-1467988254.png', NULL, NULL, '2016-07-08 14:30:54', '2016-07-08 14:30:54'),
(27, 'Фурнитура Zambrotto', 'furnitura-zambrotto', '3', '', ' zambrotto-1467988279.png', NULL, NULL, '2016-07-08 14:31:19', '2016-07-08 14:31:19');

-- 
-- Вывод данных для таблицы directory
--
INSERT INTO directory VALUES
(1, 'Виды фрезеровок', 0, NULL, NULL, '2016-07-06 07:37:24', '2016-07-06 07:37:24'),
(2, 'Стандарт', 1, NULL, NULL, '2016-07-06 08:19:00', '2016-07-06 08:19:00'),
(4, 'Премиум', 1, NULL, NULL, '2016-07-06 10:46:33', '2016-07-06 10:46:33'),
(5, 'Элит', 1, NULL, NULL, '2016-07-06 10:47:08', '2016-07-06 10:47:08'),
(6, 'Цвета пленок', 0, NULL, NULL, '2016-07-06 10:47:35', '2016-07-06 10:47:35'),
(7, 'ПВХ', 6, NULL, NULL, '2016-07-06 10:47:50', '2016-07-06 10:47:50'),
(8, 'Винорит', 6, NULL, NULL, '2016-07-06 10:48:03', '2016-07-06 10:48:03'),
(9, 'dfkldfjklsldfs', 6, NULL, NULL, '2016-07-06 11:19:51', '2016-07-06 11:19:51'),
(10, 'Цвета порошкового напыления', 0, NULL, NULL, '2016-07-11 10:42:02', '2016-07-11 10:42:02'),
(11, 'Шагрень', 0, NULL, NULL, '2016-07-11 10:42:49', '2016-07-11 10:42:49'),
(12, 'Шагрень', 10, NULL, NULL, '2016-07-11 10:43:12', '2016-07-11 10:43:12'),
(13, 'Крокодил', 10, NULL, NULL, '2016-07-11 10:43:42', '2016-07-11 10:43:42'),
(14, 'Крокодил', 10, NULL, NULL, '2016-07-11 10:45:21', '2016-07-11 10:45:21'),
(15, 'Замки', 0, NULL, NULL, '2016-07-11 11:02:31', '2016-07-11 11:02:31'),
(16, 'Верхние замки', 15, NULL, NULL, '2016-07-11 11:02:52', '2016-07-11 11:02:52'),
(17, 'Нижние замки', 15, NULL, NULL, '2016-07-11 11:03:10', '2016-07-11 11:03:10');

-- 
-- Вывод данных для таблицы im
--
INSERT INTO im VALUES
(1, 'Фрезировка 1', 'rem_krov-1467798398.jpg', 1, 2, NULL, NULL, '2016-07-06 09:46:38', '2016-07-06 09:46:38'),
(2, 'Фрезировка 2', 'rem_krov-1467799633.jpg', 1, 2, NULL, NULL, '2016-07-06 10:07:13', '2016-07-06 10:07:13'),
(3, 'jklfdjl', 'nadstroyka-zhilogo-uteplennogo-etazha-1467804277.jpg', 1, 4, NULL, NULL, '2016-07-06 11:24:37', '2016-07-06 11:24:37'),
(4, 'Венге светлый', 'iloveimg_com-1-1468233268.jpg', 6, 7, NULL, NULL, '2016-07-11 10:34:28', '2016-07-11 10:34:28'),
(5, 'Дуб антик', 'iloveimg_com-2-1468233300.jpg', 6, 7, NULL, NULL, '2016-07-11 10:35:00', '2016-07-11 10:35:00'),
(6, 'Ольха', 'iloveimg_com-3-1468233328.jpg', 6, 7, NULL, NULL, '2016-07-11 10:35:28', '2016-07-11 10:35:28'),
(7, 'Орех темный', 'iloveimg_com-4-1468233357.jpg', 6, 7, NULL, NULL, '2016-07-11 10:35:57', '2016-07-11 10:35:57'),
(8, 'Дикий дуб', 'iloveimg_com-5-1468233437.jpg', 6, 8, NULL, NULL, '2016-07-11 10:37:17', '2016-07-11 10:37:17'),
(9, 'Белый дуб', 'iloveimg_com-6-1468233457.jpg', 6, 8, NULL, NULL, '2016-07-11 10:37:37', '2016-07-11 10:37:37'),
(10, 'Дуб седой', 'iloveimg_com-7-1468233480.jpg', 6, 8, NULL, NULL, '2016-07-11 10:38:00', '2016-07-11 10:38:00'),
(11, 'Золотой дуб', 'iloveimg_com-8-1468233506.jpg', 6, 8, NULL, NULL, '2016-07-11 10:38:26', '2016-07-11 10:38:26'),
(12, 'Темная вишня', 'iloveimg_com-1468233531.jpg', 6, 8, NULL, NULL, '2016-07-11 10:38:51', '2016-07-11 10:38:51'),
(13, 'Темный орех', 'iloveimg_com-0-1468233553.jpg', 6, 8, NULL, NULL, '2016-07-11 10:39:13', '2016-07-11 10:39:13'),
(14, 'Белая', 'iloveimg_com-1468233850.jpg', 10, 12, NULL, NULL, '2016-07-11 10:44:10', '2016-07-11 10:44:10'),
(15, 'Серая', 'iloveimg_com-0-1468233866.jpg', 10, 12, NULL, NULL, '2016-07-11 10:44:26', '2016-07-11 10:44:26'),
(16, 'Черная', 'iloveimg_com-1-1468233886.jpg', 10, 12, NULL, NULL, '2016-07-11 10:44:46', '2016-07-11 10:44:46'),
(17, 'Коричневая', 'iloveimg_com-2-1468233905.jpg', 10, 12, NULL, NULL, '2016-07-11 10:45:05', '2016-07-11 10:45:05'),
(18, 'Коричневый', 'iloveimg_com-3-1468233962.jpg', 10, 13, NULL, NULL, '2016-07-11 10:46:02', '2016-07-11 10:46:02'),
(19, 'Guardian 3211 (под цилиндр)', 'iloveimg_com-0-1468235064.jpg', 15, 16, NULL, NULL, '2016-07-11 11:04:24', '2016-07-11 11:04:24'),
(20, 'Меттем 06 4-х ригельный', 'iloveimg_com-1-1468235108.jpg', 15, 16, NULL, NULL, '2016-07-11 11:05:08', '2016-07-11 11:05:08'),
(21, 'Меттем 08 3-х ригельный', 'iloveimg_com-2-1468235154.jpg', 15, 16, NULL, NULL, '2016-07-11 11:05:54', '2016-07-11 11:05:54'),
(22, 'Сам ЗВ-8У.1', 'iloveimg_com-1468235197.jpg', 15, 16, NULL, NULL, '2016-07-11 11:06:37', '2016-07-11 11:06:37'),
(23, 'Guardian  3001', 'guardian--3001-1468235791.jpg', 15, 17, NULL, NULL, '2016-07-11 11:16:31', '2016-07-11 11:16:31'),
(24, 'APECS противопожарный, ручка на планке черная', 'iloveimg_com-3-1468235842.jpg', 15, 17, NULL, NULL, '2016-07-11 11:17:22', '2016-07-11 11:17:22'),
(25, 'Меттем комбинированный (двухключевой)', 'iloveimg_com-1468235884.jpg', 15, 17, NULL, NULL, '2016-07-11 11:18:04', '2016-07-11 11:18:04'),
(26, 'Сам под цилиндр, ручка фалевая', 'iloveimg_com-2-1468236212.jpg', 15, 17, NULL, NULL, '2016-07-11 11:23:32', '2016-07-11 11:23:32'),
(27, 'Меттем под сувальдный ключ с ночной задвижкой', 'iloveimg_com-1-1468236455.jpg', 15, 17, NULL, NULL, '2016-07-11 11:27:35', '2016-07-11 11:27:35'),
(28, 'Меттем под личинку', 'iloveimg_com-0-1468236601.jpg', 15, 17, NULL, NULL, '2016-07-11 11:30:01', '2016-07-11 11:30:01'),
(29, 'zv4-713.0.0_n', 'iloveimg_com-1468236782.jpg', 15, 17, NULL, NULL, '2016-07-11 11:33:02', '2016-07-11 11:33:02'),
(30, 'Duble', 'duble-1468238416.jpg', 1, 2, NULL, NULL, '2016-07-11 12:00:16', '2016-07-11 12:00:16'),
(31, 'Festival', 'festival-1468238436.jpg', 1, 2, NULL, NULL, '2016-07-11 12:00:36', '2016-07-11 12:00:36'),
(32, 'G-3', 'g-3-1468238450.jpg', 1, 2, NULL, NULL, '2016-07-11 12:00:50', '2016-07-11 12:00:50'),
(33, 'Petr', 'petr-1468238469.jpg', 1, 2, NULL, NULL, '2016-07-11 12:01:09', '2016-07-11 12:01:09'),
(34, 'Sfinx', 'sfinx-1468238484.jpg', 1, 2, NULL, NULL, '2016-07-11 12:01:24', '2016-07-11 12:01:24');

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_24_072010_create_page', 1),
('2016_05_25_060636_create_news', 2),
('2016_05_25_060924_create_category', 2),
('2016_05_25_123001_create_news', 3),
('2016_05_25_123010_create_actions', 3),
('2016_07_05_071838_CreateDirectory', 4),
('2016_07_06_085134_CreateHareckteristic', 5),
('2016_07_06_144648_CreateProducts', 6);

-- 
-- Вывод данных для таблицы news
--
INSERT INTO news VALUES
(5, 'asdasdasd', 'asdasdasd', '<p>&nbsp;dsad asd asd sad asd sa dasd sa</p>\r\n', 'dsad asd sd asd ', 'nadstroyka-zhilogo-uteplennogo-etazha-1467724387.jpg', ' dd dasd asd sad sa', 'asd asd sa aasd sa', NULL, '2016-07-05 13:13:07', '2016-07-05 13:13:07');

-- 
-- Вывод данных для таблицы page
--
INSERT INTO page VALUES
(1, 'О компании', 'about', '<p><strong>Компания<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Мир дверей&raquo;</strong> была основана в&nbsp;августе 2001 года. Основным видом деятельности компании со&nbsp;дня&nbsp;ее&nbsp;основания является <strong>производство стальных дверей.</strong></p>\r\n<p>Шли годы, компания развивалась и&nbsp;в&nbsp;2007 году был&nbsp;открыт цех&nbsp;<strong>художественной ковки,</strong> где&nbsp;работают высококвалифицированные специалисты. Сейчас мы&nbsp;можем предложить вам&nbsp;широкий выбор <strong>кованных изделий: козырьки, перила, оградки, заборы, ворота, различные предметы интерьера и&nbsp;многое другое.</strong> Подробнее о&nbsp;продукции вы&nbsp;можете <a title="Художественная ковка" href="/catalog/art_smithery/">узнать здесь.</a></p>\r\n<p>Еще одним направлением нашей деятельности является <strong>продажа и&nbsp;установка межкомнатных дверей от&nbsp;эконом до&nbsp;элит класса.</strong> За&nbsp;годы работы у&nbsp;нас&nbsp;сложились хорошие отношения со&nbsp;многими нашими поставщиками. Благодаря этому мы&nbsp;рады вам&nbsp;предложить <strong>широчайший ассортимент межкомнатных дверей.</strong> Для&nbsp;удобства покупателей недавно был&nbsp;открыт <em>магазин<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Двери со&nbsp;вкусом&raquo;</em>, где&nbsp;представлен <strong>широкий ассортимент межкомнатных дверей.</strong></p>\r\n<p>Также, хотелось бы&nbsp;отметить, что&nbsp;на&nbsp;всю&nbsp;производимую и&nbsp;продаваемую нами продукцию, наша компания предоставляет <strong>гарантию качества!</strong></p>\r\n<p>Мы всегда рады видеть вас&nbsp;в&nbsp;<a title="Контакты" href="/contacts/">наших магазинах.</a></p>\r\n<h2>Сотрудничество</h2>\r\n<p>Рано&nbsp;или поздно, многие начинают задумываться о&nbsp;своем собственном бизнесе. Идеальным решением здесь может стать сотрудничество с&nbsp;нашей компанией. Мы&nbsp;окажем вам&nbsp;помощь и&nbsp;дадим консультации по&nbsp;развитию собственного бизнеса.</p>\r\n<p>У нашей компании уже&nbsp;существует своя дилерская сеть. Мы&nbsp;заинтересованы в&nbsp;дальнейшем расширении нашей сети и&nbsp;в&nbsp;увеличении производства нашей продукции.<strong></strong></p>\r\n<p><strong></strong>Мы являемся производителем и&nbsp;поэтому можем предложить оптимальные условия сотрудничества.</p>', 'О компании', 'О компании', NULL, NULL, '2016-05-24 15:21:46', '2016-05-24 15:21:48'),
(2, 'Сервис', 'service', '<p>Наша компания имеет собственную сервисную службу, которая осуществляет гарантийное обслуживание всей нашей продукции.</p>\r\n<p>Также мы&nbsp;можем произвести реставрацию уже&nbsp;установленной металлической двери другими производителями. Выполнить замену замков, отделки, произвести установку дополнительных комплектующих: глазка, задвижки, утеплителя, домофонного оборудования и&nbsp;др.</p>\r\n<p>Основным направлением деятельности нашей компании является производство стальных дверей. На&nbsp;протяжении 9 лет&nbsp;мы&nbsp;работаем в&nbsp;этом направлении. Поэтому наши клиенты могут рассчитывать на&nbsp;качественное и&nbsp;надежное выполнение всех сервисных услуг, выполняемых <strong>компанией<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Мир Дверей&raquo;</strong>.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/includes/image/service_cars.png" height="464" width="1000" /></p>\r\n<h1 style="text-align: center;">РАБОТАЕМ КРУГЛОСУТОЧНО! ТЕЛЕФОН: 33-77-13</h1>', 'Сервис', 'Сервис', NULL, NULL, NULL, NULL),
(4, 'Кредит', 'credit', '<ol>\r\n<li>Наличие у клиента постоянной прописки в Центральном Федеральном Округе.</li>\r\n<li>Сумма кредита от 2000 до 100000 руб.</li>\r\n<li>Срок кредита от 3 месяцев до 3 лет.</li>\r\n<li>Оплачивать кредиты можно в отделениях почты РФ, любых коммерческих банках, через терминалы QIWI, через систему<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Рапида&raquo;<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(</span>в Евросети, Эльдорадо).</li>\r\n<li>Досрочное погашение кредита осуществляется в любой момент по желанию клиента, никаких плат за это не взимается. Сумму остаточной задолженности можно узнать по телефону бесплатной горячей линии 8-800-200-70-05.</li>\r\n<li>Возраст от 21 года до 69 лет включительно. В возрасте 69 лет ограничения,  лимит  до 20000  срок кредита до 12 месяцев.</li>\r\n<li>Документ необходимый для оформления кредита – паспорт.</li>\r\n</ol>Кредит оформляется в нашем центральном офисе по адресу: г. Брянск, ул. Дуки, д. 62а, гостиница<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Турист&raquo;. Кредит оформляется в течении 30 минут.<br />Дополнительную информацию вы можете получить в нашем офисе.', 'Кредит', 'Кредит', NULL, NULL, NULL, NULL),
(5, 'Контакты', 'kontakty', '\r\n<div id="information">\r\n<h2>Центральный офис (выставочный зал стальных и межкомнатных дверей)</h2>\r\n\r\n  <p>Телефоны: \r\n  <p id="telefon_cont">+7 (4832) 33-77-13</p>\r\n  <p id="telefon_cont">+7 (4832) 30-60-34</p>\r\n  <p id="telefon_cont">+7 (4832) 30-60-35</p>\r\n  </p>\r\n  <p> Электронная почта: \r\n  <p id="telefon_cont"><script type="text/javascript">//<![CDATA[\r\nfunction hostcmsEmail(c){return c.replace(/[a-zA-Z]/g, function (c){return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c-26);})}document.write (''<a title="Написать письмо"  href="mailto:'' + hostcmsEmail(''zve-qirev@lnaqrk.eh'') + ''">'' + hostcmsEmail(''zve-qirev@lnaqrk.eh'') + ''</a>'');//]]>\r\n</script><a title="Написать письмо" href="mailto:mir-dveri@yandex.ru">mir-dveri@yandex.ru</a> </p></p>\r\n<p>Адрес: \r\n<p id="telefon_cont">г. Брянск, ул. Дуки, д. 65, здание МПСУ</p>\r\n</p>\r\n\r\n\r\n<h2>Производство</h2>\r\n\r\n<p>Телефон: \r\n<p id="telefon_cont">+7 (4832) 62-04-74 </p>\r\n</p> \r\n<p>Адрес: \r\n<p id="telefon_cont">г. Брянск, ул. Фрунзе, д. 64</p>\r\n</p>\r\n</div>\r\n\r\n<div id="yandex_map">\r\n\t<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=nj3L-0d41qLgjU8Cpi1xvelmQJbVbssX&width=100%&height=550&lang=ru_RU&sourceType=constructor&scroll=true"></script>\r\n</div>\r\n\r\n\r\n<div class="gallery">\r\n<h2>Фотографии выставочного зала</h2>\r\n\r\n<div class="zoom-gallery">\r\n<a href="/gallery/contact/002.jpg" style="width:100%;"><img id="zoom" src="/gallery/contact/002.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/016.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/016.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/017.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/017.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/018.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/018.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/019.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/019.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/016.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/016.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/017.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/017.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/018.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/018.jpg" style="height:400px; width:400px" /> </a> <a href="/gallery/contact/019.jpg" style="width:100%;"> <img id="zoom" src="/gallery/contact/019.jpg" style="height:400px; width:400px" /> </a></div>\r\n</div>\r\n', 'Контакты', 'Контакты', 'Контакты', NULL, NULL, '2016-07-05 08:12:17');

-- 
-- Вывод данных для таблицы password_resets
--

-- Таблица dvery.password_resets не содержит данных

-- 
-- Вывод данных для таблицы products
--
INSERT INTO products VALUES
(1, 'Дверь', 'dver', '111', '  вавыа выа вы авыа ', 'олвыаоа лвоа ', ' вловалыо алд', 'йв ололы', 1, '1,2,3', 'nadstroyka-zhilogo-uteplennogo-etazha-1467872746.jpg', 'krov_kluch-1467872746.png', NULL, NULL, '2016-07-07 06:25:46', '2016-07-07 06:25:46'),
(2, 'Дверь', 'dver', '111', '  вавыа выа вы авыа ', 'олвыаоа лвоа ', ' вловалыо алд', 'йв ололы', 1, '1,2,3', 'nadstroyka-zhilogo-uteplennogo-etazha-1467873387.jpg', 'krov_kluch-1467873387.png', NULL, NULL, '2016-07-07 06:36:27', '2016-07-07 06:36:27');

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'kamozin', 'hrolenkov@yandex.ru', '$2y$10$CrQLXixJsqsjj9VwK2.FVevOR6p01GDo2szKcfh.yu2PpsTmZAcB2', NULL, '2016-05-24 12:06:38', '2016-05-24 12:06:38'),
(2, 'Иван Иванов', 'hr@yandex.ru', '$2y$10$ihUzxK7hFILAqJcHN0KU/OrSjI.X9q.Qcygg2SP/rYpD6apEFoQxG', NULL, '2016-05-25 12:03:28', '2016-05-25 12:03:28'),
(3, 'Roman Khrolenkov', 'hrolenkov1111@yandex.ru', '$2y$10$5pczLPdeayvdqfYpQx/sxO1Lj2E1KnI29BnAOg/KPrvOkkZ02JZ/G', NULL, '2016-07-01 09:04:26', '2016-07-01 09:04:26'),
(4, 'Roman Khrolenkov1', 'hrolenkov1121@yandex.ru', '$2y$10$ZyRBbimwh/bX1w/trw32gOIE2lLnxN9x.jTc61M1naHfGPDWt4/fi', NULL, '2016-07-04 07:18:35', '2016-07-04 07:18:35'),
(5, 'Иван', 'ivan@dynamicweb.su', '$2y$10$GM0PoUJk5BGKXzDRhdVyoOZlFfJgkrun.jOkBecL.2KaSCGhMeXkW', 'mkbtukl4U1skxKSMSnrHUKOu0aVLko1RoyIC8p4VdhDafzCmL1KVothKjIfm', '2016-07-08 11:42:46', '2016-07-08 13:49:44');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;