--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 06.07.2016 18:04:36
-- Версия сервера: 5.5.5-10.1.9-MariaDB
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
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
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
AUTO_INCREMENT = 10
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
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
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
AVG_ROW_LENGTH = 2048
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
AUTO_INCREMENT = 5
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
(1, 'Анабель 1', 'anabel-1', '0', 'bbb', 'ремонт кровли-1467716438.jpg', NULL, NULL, '2016-07-04 11:08:11', '2016-07-05 11:00:38'),
(2, 'kamozin', 'kamozin', '0', 'aaaa', 'uAQR6K4MXyQ-1467708789.jpg', NULL, NULL, '2016-07-04 13:34:40', '2016-07-05 08:53:09');

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
(9, 'dfkldfjklsldfs', 6, NULL, NULL, '2016-07-06 11:19:51', '2016-07-06 11:19:51');

-- 
-- Вывод данных для таблицы im
--
INSERT INTO im VALUES
(1, 'Фрезировка 1', 'rem_krov-1467798398.jpg', 1, 2, NULL, NULL, '2016-07-06 09:46:38', '2016-07-06 09:46:38'),
(2, 'Фрезировка 2', 'rem_krov-1467799633.jpg', 1, 2, NULL, NULL, '2016-07-06 10:07:13', '2016-07-06 10:07:13'),
(3, 'jklfdjl', 'nadstroyka-zhilogo-uteplennogo-etazha-1467804277.jpg', 1, 4, NULL, NULL, '2016-07-06 11:24:37', '2016-07-06 11:24:37');

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
('2016_07_06_085134_CreateHareckteristic', 5);

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
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'kamozin', 'hrolenkov@yandex.ru', '$2y$10$CrQLXixJsqsjj9VwK2.FVevOR6p01GDo2szKcfh.yu2PpsTmZAcB2', NULL, '2016-05-24 12:06:38', '2016-05-24 12:06:38'),
(2, 'Иван Иванов', 'hr@yandex.ru', '$2y$10$ihUzxK7hFILAqJcHN0KU/OrSjI.X9q.Qcygg2SP/rYpD6apEFoQxG', NULL, '2016-05-25 12:03:28', '2016-05-25 12:03:28'),
(3, 'Roman Khrolenkov', 'hrolenkov1111@yandex.ru', '$2y$10$5pczLPdeayvdqfYpQx/sxO1Lj2E1KnI29BnAOg/KPrvOkkZ02JZ/G', NULL, '2016-07-01 09:04:26', '2016-07-01 09:04:26'),
(4, 'Roman Khrolenkov1', 'hrolenkov1121@yandex.ru', '$2y$10$ZyRBbimwh/bX1w/trw32gOIE2lLnxN9x.jTc61M1naHfGPDWt4/fi', NULL, '2016-07-04 07:18:35', '2016-07-04 07:18:35');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;