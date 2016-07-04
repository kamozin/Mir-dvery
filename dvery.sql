--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 01.07.2016 17:11:41
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
-- Описание для таблицы category
--
DROP TABLE IF EXISTS category;
CREATE TABLE category (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  parent_id VARCHAR(255) NOT NULL,
  text VARCHAR(255) NOT NULL,
  img VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
AVG_ROW_LENGTH = 3276
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
  description VARCHAR(255) NOT NULL,
  keywords VARCHAR(255) NOT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
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
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 5461
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
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы category
--

-- Таблица dvery.category не содержит данных

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_24_072010_create_page', 1),
('2016_05_25_060636_create_news', 2),
('2016_05_25_060924_create_category', 2);

-- 
-- Вывод данных для таблицы news
--

-- Таблица dvery.news не содержит данных

-- 
-- Вывод данных для таблицы page
--
INSERT INTO page VALUES
(1, 'О компании', 'about', '<p><strong>Компания<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Мир дверей&raquo;</strong> была основана в&nbsp;августе 2001 года. Основным видом деятельности компании со&nbsp;дня&nbsp;ее&nbsp;основания является <strong>производство стальных дверей.</strong></p>\r\n<p>Шли годы, компания развивалась и&nbsp;в&nbsp;2007 году был&nbsp;открыт цех&nbsp;<strong>художественной ковки,</strong> где&nbsp;работают высококвалифицированные специалисты. Сейчас мы&nbsp;можем предложить вам&nbsp;широкий выбор <strong>кованных изделий: козырьки, перила, оградки, заборы, ворота, различные предметы интерьера и&nbsp;многое другое.</strong> Подробнее о&nbsp;продукции вы&nbsp;можете <a title="Художественная ковка" href="/catalog/art_smithery/">узнать здесь.</a></p>\r\n<p>Еще одним направлением нашей деятельности является <strong>продажа и&nbsp;установка межкомнатных дверей от&nbsp;эконом до&nbsp;элит класса.</strong> За&nbsp;годы работы у&nbsp;нас&nbsp;сложились хорошие отношения со&nbsp;многими нашими поставщиками. Благодаря этому мы&nbsp;рады вам&nbsp;предложить <strong>широчайший ассортимент межкомнатных дверей.</strong> Для&nbsp;удобства покупателей недавно был&nbsp;открыт <em>магазин<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Двери со&nbsp;вкусом&raquo;</em>, где&nbsp;представлен <strong>широкий ассортимент межкомнатных дверей.</strong></p>\r\n<p>Также, хотелось бы&nbsp;отметить, что&nbsp;на&nbsp;всю&nbsp;производимую и&nbsp;продаваемую нами продукцию, наша компания предоставляет <strong>гарантию качества!</strong></p>\r\n<p>Мы всегда рады видеть вас&nbsp;в&nbsp;<a title="Контакты" href="/contacts/">наших магазинах.</a></p>\r\n<h2>Сотрудничество</h2>\r\n<p>Рано&nbsp;или поздно, многие начинают задумываться о&nbsp;своем собственном бизнесе. Идеальным решением здесь может стать сотрудничество с&nbsp;нашей компанией. Мы&nbsp;окажем вам&nbsp;помощь и&nbsp;дадим консультации по&nbsp;развитию собственного бизнеса.</p>\r\n<p>У нашей компании уже&nbsp;существует своя дилерская сеть. Мы&nbsp;заинтересованы в&nbsp;дальнейшем расширении нашей сети и&nbsp;в&nbsp;увеличении производства нашей продукции.<strong></strong></p>\r\n<p><strong></strong>Мы являемся производителем и&nbsp;поэтому можем предложить оптимальные условия сотрудничества.</p>', 'О компании', 'О компании', NULL, '2016-05-24 15:21:46', '2016-05-24 15:21:48'),
(2, 'Сервис', 'service', '<p>Наша компания имеет собственную сервисную службу, которая осуществляет гарантийное обслуживание всей нашей продукции.</p>\r\n<p>Также мы&nbsp;можем произвести реставрацию уже&nbsp;установленной металлической двери другими производителями. Выполнить замену замков, отделки, произвести установку дополнительных комплектующих: глазка, задвижки, утеплителя, домофонного оборудования и&nbsp;др.</p>\r\n<p>Основным направлением деятельности нашей компании является производство стальных дверей. На&nbsp;протяжении 9 лет&nbsp;мы&nbsp;работаем в&nbsp;этом направлении. Поэтому наши клиенты могут рассчитывать на&nbsp;качественное и&nbsp;надежное выполнение всех сервисных услуг, выполняемых <strong>компанией<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Мир Дверей&raquo;</strong>.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="/includes/img/service_cars.png" height="464" width="1000" /></p>\r\n<h1 style="text-align: center;">РАБОТАЕМ КРУГЛОСУТОЧНО! ТЕЛЕФОН: 33-77-13</h1>', 'Сервис', 'Сервис', NULL, NULL, NULL),
(4, 'Кредит', 'credit', '<ol>\r\n<li>Наличие у клиента постоянной прописки в Центральном Федеральном Округе.</li>\r\n<li>Сумма кредита от 2000 до 100000 руб.</li>\r\n<li>Срок кредита от 3 месяцев до 3 лет.</li>\r\n<li>Оплачивать кредиты можно в отделениях почты РФ, любых коммерческих банках, через терминалы QIWI, через систему<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Рапида&raquo;<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(</span>в Евросети, Эльдорадо).</li>\r\n<li>Досрочное погашение кредита осуществляется в любой момент по желанию клиента, никаких плат за это не взимается. Сумму остаточной задолженности можно узнать по телефону бесплатной горячей линии 8-800-200-70-05.</li>\r\n<li>Возраст от 21 года до 69 лет включительно. В возрасте 69 лет ограничения,  лимит  до 20000  срок кредита до 12 месяцев.</li>\r\n<li>Документ необходимый для оформления кредита – паспорт.</li>\r\n</ol>Кредит оформляется в нашем центральном офисе по адресу: г. Брянск, ул. Дуки, д. 62а, гостиница<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">&laquo;</span>Турист&raquo;. Кредит оформляется в течении 30 минут.<br />Дополнительную информацию вы можете получить в нашем офисе.', 'Кредит', 'Кредит', NULL, NULL, NULL),
(5, 'Контакты', 'contacts', '<table border="0">\r\n<tbody>\r\n<tr>\r\n<td valign="top">\r\n<h2>Центральный офис<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(</span>выставочный зал&nbsp;стальных и&nbsp;межкомнатных дверей)</h2>\r\n<dl><dt>Телефоны:</dt><dd class="phone d_gray">+7<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(4832</span>) <span>33-77-13</span></dd><dd class="phone d_gray">+7<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(4832</span>) <span>30-60-34</span></dd><dd class="phone d_gray">+7<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(4832</span>) <span>30-60-35</span></dd><dt>Электронная почта:</dt><dd><script type="text/javascript">//<![CDATA[\r\nfunction hostcmsEmail(c){return c.replace(/[a-zA-Z]/g, function (c){return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c-26);})}document.write (''<a title="Написать письмо"  href="mailto:'' + hostcmsEmail(''zve-qirev@lnaqrk.eh'') + ''">'' + hostcmsEmail(''zve-qirev@lnaqrk.eh'') + ''</a>'');//]]>\r\n</script></dd><dt>Адрес:</dt><dd class="d_gray">г. Брянск, ул. Дуки, д. 65, здание МПСУ</dd></dl>\r\n<h2>Производство</h2>\r\n<dl><dt>Телефон:</dt><dd class="phone d_gray">+7<span style="margin-right: 0.3em"> </span> <span style="margin-left: -0.3em">(4832</span>) <span>62-04-74</span></dd><dt>Адрес:</dt><dd class="d_gray">г. Брянск, ул. Фрунзе, д. 64</dd></dl></td>\r\n<td style="width: 620px;" valign="top" align="center">\r\n<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=YiUUwSz4xt3lAtVwmr-zLThzww4PVTiZ&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor"></script>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2" valign="top">\r\n<h1>Фотографии выставочного зала</h1>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan="2" valign="top"><a href="/images/shops/001.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/001_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/002.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/002_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/003.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/003_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/004.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/004_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/005.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/005_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/006.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/006_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/007.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/007_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/008.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/008_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/009.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/009_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/010.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/010_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/011.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/011_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/012.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/012_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/013.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/013_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/014.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/014_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/015.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/015_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/016.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/016_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/017.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/017_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/018.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/018_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/019.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/019_sm.jpg" alt="" height="135" width="180" /></a>&nbsp;&nbsp;<a href="/images/shops/022.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/022_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/023.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/023_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/024.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/024_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/025.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/025_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/026.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/026_sm.jpg" alt="" height="135" width="180" /></a> <a href="/images/shops/027.jpg"><img style="margin: 5px; border: 0pt none; float: left;" src="/images/shops/027_sm.jpg" alt="" height="135" width="180" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'Контакты', 'Контакты', NULL, NULL, NULL);

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
(3, 'Roman Khrolenkov', 'hrolenkov1111@yandex.ru', '$2y$10$5pczLPdeayvdqfYpQx/sxO1Lj2E1KnI29BnAOg/KPrvOkkZ02JZ/G', NULL, '2016-07-01 09:04:26', '2016-07-01 09:04:26');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;