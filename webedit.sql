-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 24. čen 2014, 00:01
-- Verze serveru: 5.6.16
-- Verze PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `webedit`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
	`id`               INT(11) NOT NULL AUTO_INCREMENT,
	`gallery_photo_id` INT(11) DEFAULT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =17;

--
-- Vypisuji data pro tabulku `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_photo_id`) VALUES
	(13, 5),
	(15, 6),
	(16, 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `gallery_album`
--

CREATE TABLE IF NOT EXISTS `gallery_album` (
	`id`         INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id`    INT(11) NOT NULL,
	`gallery_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =1;

-- --------------------------------------------------------

--
-- Struktura tabulky `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
	`id`          INT(11) NOT NULL AUTO_INCREMENT,
	`gallery_id`  INT(11) NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =8;

--
-- Vypisuji data pro tabulku `gallery_photo`
--

INSERT INTO `gallery_photo` (`id`, `gallery_id`, `description`) VALUES
	(5, 13, 'supr popis fotky'),
	(6, 15, 'super mobil'),
	(7, 16, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
	`id`      INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id` INT(11) DEFAULT NULL,
	`title`   TEXT    NOT NULL,
	`link`    TEXT,
	`link_id` INT(11) DEFAULT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =73;

--
-- Vypisuji data pro tabulku `menu`
--

INSERT INTO `menu` (`id`, `menu_id`, `title`, `link`, `link_id`) VALUES
	(1, NULL, 'Titulní strana', ':Home:Presenter:view', NULL),
	(2, NULL, 'Administrace', ':Home:Admin:Presenter:view', NULL),
	(4, 72, 'Pages', ':Page:Admin:Presenter:view', NULL),
	(5, 4, 'Create new', ':Page:Admin:Presenter:add', NULL),
	(10, 72, 'Categories', ':Shop:Category:Admin:Presenter:view', NULL),
	(11, 10, 'Create new', ':Shop:Category:Admin:Presenter:add', NULL),
	(12, 72, 'Products', ':Shop:Product:Admin:Presenter:view', NULL),
	(13, 12, 'Create new', ':Shop:Product:Admin:Presenter:add', NULL),
	(15, 1, 'Trička', ':Shop:Category:Presenter:view', 1),
	(18, 1, 'TODO', ':Page:Presenter:view', 2),
	(21, 1, 'Počítače', ':Shop:Category:Presenter:view', 2),
	(22, 1, 'Nákupní košík', ':Shop:Cart:Presenter:view', NULL),
	(38, 1, 'Kalhoty', ':Shop:Category:Presenter:view', 3),
	(43, 1, 'Boty', ':Shop:Category:Presenter:view', 6),
	(47, 48, 'Create new', ':Sitemap:Admin:Presenter:add', NULL),
	(48, 72, 'Sitemaps', ':Sitemap:Admin:Presenter:view', NULL),
	(49, 1, 'Mapa webu', ':Sitemap:Presenter:view', 4),
	(66, 21, 'Notebooky', ':Shop:Category:Presenter:view', 7),
	(67, 1, 'Smartphony', ':Shop:Category:Presenter:view', 8),
	(72, 2, 'Modules', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `menu_group`
--

CREATE TABLE IF NOT EXISTS `menu_group` (
	`id`      INT(11)     NOT NULL AUTO_INCREMENT,
	`menu_id` INT(11)     NOT NULL,
	`key`     VARCHAR(32) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `menu_id` (`menu_id`),
	UNIQUE KEY `key` (`key`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =8;

--
-- Vypisuji data pro tabulku `menu_group`
--

INSERT INTO `menu_group` (`id`, `menu_id`, `key`) VALUES
	(1, 1, 'front'),
	(2, 2, 'admin'),
	(7, 72, 'modules');

-- --------------------------------------------------------

--
-- Struktura tabulky `page`
--

CREATE TABLE IF NOT EXISTS `page` (
	`id`      INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id` INT(11) NOT NULL,
	`content` TEXT    NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `menu_id` (`menu_id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =3;

--
-- Vypisuji data pro tabulku `page`
--

INSERT INTO `page` (`id`, `menu_id`, `content`) VALUES
	(2, 18,
	 '<pre>\nget module name from namespace\nmenu groups, not needed control ? <- sitemap control will be useless... should use menuControl with entity $sitemap->menu->mnue... and render as list.... menuControl should have render as xml\nflashmessage control\nuser module\nrouting module\nuse ORM\n\nshop module AGAIN\nshop -> only category done\n\ntranslations for non-static content\n\nmarkdown - it will also allow custom tags eg. for links in nette way\n\ngallery edit\ngallery photo presenter component to provide img\ngallery route\ngallery photo route remove duplicity\nnette/caching, <- gallery photos\n\nbetter session repo + cart repo && facade\n\nformatTemplateFiles && formatLayoutTemplateFiles for presenter and controls\n\nblog module\nblog_category... like shop_category ... one category should be ''News''.\nblog_article\n\nreduce sql\n	menu travers\n	double queries while creating breadcrumb\n	two queries when creating menu control\n\nmenu option - hide from menu - will be still accesible through URL\n\npublisher\n\ngallery\n	photo\n	video\n\nsocial\n	comments\n	rating\n	review\n\nmodules composer install script\n     register extensions\n	can run db scheme create too\n</pre>');

-- --------------------------------------------------------

--
-- Struktura tabulky `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
	`id`          INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id`     INT(11) NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =9;

--
-- Vypisuji data pro tabulku `shop_category`
--

INSERT INTO `shop_category` (`id`, `menu_id`, `description`) VALUES
	(1, 15, 'supr trička'),
	(2, 21, NULL),
	(3, 38, 'Oblékají se na nohy.'),
	(6, 43, 'Super botky od Baťi'),
	(7, 66, NULL),
	(8, 67, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `shop_product`
--

CREATE TABLE IF NOT EXISTS `shop_product` (
	`id`          INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id`     INT(11) NOT NULL,
	`gallery_id`  INT(11) NOT NULL,
	`title`       TEXT    NOT NULL,
	`description` TEXT,
	`content`     TEXT,
	`price`       INT(11) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =6;

--
-- Vypisuji data pro tabulku `shop_product`
--

INSERT INTO `shop_product` (`id`, `menu_id`, `gallery_id`, `title`, `description`, `content`, `price`) VALUES
	(2, 66, 13, 'Lenovo IdeaPad Z710',
	 'Notebook - Intel Core i7 4700MQ Haswell, 17.3" LED 1920x1080 lesklý, RAM 8GB, NVIDIA GeForce GT 745 2GB, SSHD 1TB+ 8GB cache pro zrychlení běhu OS, DVD, WiFi, Bluetooth 4.0, Webkamera 1.0 Mpx, HDMI, podsvícená klávesnice, bez operačního systému',
	 '<div id="descAnnotation">\nNotebook Lenovo IdeaPad Z710 je zaměřen především na maximální multimediální zážitek a vysokou flexibilitu ke splnění všech vašich požadavků. Použitý displej s úhlopříčkou 17,3" disponuje rozlišením <strong>Full-HD</strong> (1920x1080) se zaručeně ostrým obrazem v každé situaci. V kombinaci s duálními reproduktory <strong>Dolby Home Theater v4</strong> tak tvoří skvělý základ pro sledování filmů ve vysokém rozlišení nebo hraní her, na které je připravena grafická karta <strong>NVIDIA GeForce GT 745 2GB</strong>.<br><br>Stylové a tenké černé šasi ve svých útrobách ukrývá procesor <strong>Intel Core i7 4700MQ</strong>, založený na architektuře Haswell. Hlavní předností tohoto modelu je funkce<strong> Intel Turbo Boost</strong>, která při potřebě vyššího výkonu automaticky přetaktuje procesor ze základních 2,4 GHz až na <strong>3,4 GHz</strong>. Další urychlení běhu operačního systému zajišťuje <strong>8 GB cache</strong>, která úzce spolupracuje s 8 GB operační paměti DDR3. Pro ukládání vašich dat je určen <strong>pevný disk s kapacitou 1 TB</strong>, takže nedostatek volného místa na disku jen tak nehrozí.<br><br>Notebooky od Lenova jsou vyhlášeny pohodlným ovládáním - IdeaPad Z710 není výjimkou. Kromě toho, že se na <strong>klávesnici AccuType</strong> skvěle píší delší texty, je dokonce <strong>podsvícená</strong>, čímž se stává večerní práce u počítače podstatně příjemnější. Touchpad poté plně podporuje <strong>dotyková gesta</strong> - např. pro scrollování, zoom nebo rotaci obrazu.\n</div>',
	 16528),
	(4, 67, 15, 'Nokia Lumia 1020',
	 'Mobilní telefon 4.5" 768x1280 AMOLED ClearBlack Puremotion HD+, CPU Qualcomm Snapdragon S4 1.5GHz Dual-Core, RAM 2GB, interní paměť 32GB, fotoaparát 41mpx PureView, GPS, WiFi, Bluetooth, NFC, LTE/3G, micro USB, Windows Phone 8',
	 '<div id="desc">\n<div id="descAnnotation">\nTop model od finské společnosti Nokia v sobě snoubí špičkovou hardwarovou i softwarovou výbavu. <strong>Fotoaparát PureView s 41 Mpx</strong> snímačem totiž nemá na trhu žádnou konkurenci. <strong>Jedinečný design</strong>, dnes již typický pro řadu Lumia, působí velice atraktivně a použití pouze <strong>kvalitních polykarbonátů</strong> zaručuje výbornou pevnost a odolnost. Plnými doušky si užijete všechny vymoženosti nového operačního systému <strong>Windows Phone 8</strong>. O jeho svižný chod se postará <strong>dvoujádrový procesor</strong> od Qualcommu, kterému sekundují rovné <strong>2 GB operační paměti</strong>. Nechybí ani podpora sítí<strong> LTE</strong> a <strong>NFC</strong> čip.<br>&nbsp;<h3>Výkonný základ</h3><br>Prohlížejte si webové stránky rychle jako na počítači a hrajte moderní, vizuálně pokročilé 3D hry. To vše vám umožní <strong>dvojice jader</strong> ukrytých v mikroprocesoru <strong>Qualcomm MSM8960</strong>. I přes relativně vysokou frekvenci <strong>1500 MHz</strong> je jeho spotřeba minimální a poslouchání písniček tak může na jedno nabití vydržet i <strong>přes 53 hodin</strong>. Jemnými detaily disponuje <strong>4,5" AMOLED displej</strong> s rozlišením 1280 x 768 pixelů, který za vydatné pomoci technologie <strong>Puremotion HD+</strong> vykreslí ty nejzářivější barvy. Jakékoliv škrábance odpuzuje krycí sklo <strong>Gorilla Glass</strong> už ve své třetí verzi. Kapacita vnitřní paměti nabízí <strong>štědrých 32 GB</strong>.<br><img alt="" src="http://img.alza.cz/foto/legendfoto/379201.jpg" style="PADDING-BOTTOM: 20px; PADDING-LEFT: 0px; WIDTH: 740px; PADDING-RIGHT: 0px; FLOAT: right; HEIGHT: 200px; MARGIN-LEFT: 2px; MARGIN-RIGHT: 2px; PADDING-TOP: 25px"> <img alt="" src="http://img.alza.cz/foto/legendfoto/467698_2.jpg" style="padding: 50px 0px 20px; width: 330px; float: right; height: 310px; margin-left: 15px; margin-right: 15px;"><h3>Přivítejte královnu fotomobilů</h3><br>Zachyťte si všechny vaše <strong>jedinečné okamžiky</strong> s bezprecedentní technologií PureView. Díky optické stabilizaci budou snímky <strong>ostré jako břitva</strong> a to nejen ve dne, ale i za šera a v noci. Vysoké rozlišení <strong>41 Mpx </strong>nevynechá žádný detail a kvalitní<strong> čočky Carl Zeiss </strong>se postarají o přesné navedení světla do senzoru. <strong>Vysoká světelnost objektivu</strong> a přítomnost <strong>xenonového blesku</strong> učiní z každé fotky za zhoršených světelných podmínek mistrovské dílo bez nechtěného šumu.<br><br>Dedikovaná aplikace Nokia Pro Camera dovoluje zcela <strong>podrobné nastavení</strong> všech parametrů a v mnohém předčí i klasické fotoaparáty. Možnost natáčení videí ve vysokém<strong> Full HD rozlišení</strong> nově doplňuje precizní záznam zvuku. S technologií <strong>Rich Recording</strong> uslyšíte natočený záznam z koncertu s bohatým a živějším nádechem.<br><img alt="" src="http://img.alza.cz/foto/legendfoto/467698_4.jpg" style="padding: 25px 0px 20px; width: 310px; float: left; height: 206px; margin: 10px 20px;"><h3><br><br>Jde to i bez drátů</h3><br>Zapomeňte na vytahování nabíječky v případě docházející baterie, Nokia totiž se svými smartphony <strong>předběhla dobu</strong>. Pomocí speciálních nabíječek a zadního krytu telefonu můžete váš přístroj <strong>bezdrátově nabít během pár hodin.</strong> Stačí si dokoupit zadní kryt a bezdrátovou nabíječku, položit na ni telefon a nabíjecí proces ihned započne. Je to jednoduché, účelné a hlavně elegantní řešení - <strong>budoucnost, jak si ji představují ve firmě Nokia</strong>.<h3><br><img alt="" src="http://img.alza.cz/foto/legendfoto/467698_6.jpg" style="padding: 30px 0px 20px; width: 310px; float: right; height: 289px; margin-left: 15px; margin-right: 15px;"><br><br><br>S Lumií se neztratíte</h3><br>Zabudovaný <strong>GPS senzor</strong> vám kdykoliv přesně umožní sledovat vaši polohu. K dispozici máte velice propracované a rozsáhlé <strong>Bing i Nokia mapy</strong> pro snadnou orientaci.<br><br>Vybavena nejmodernějším operačním systémem <strong>Windows Phone 8</strong>, patří Nokia Lumia 920 mezi špičkové chytré telefony se spoustou funkcí a vychytávek. Na propracované úvodní obrazovce si můžete <strong>měnit velikost dlaždic</strong>, nechybí <strong>zpětná kompatibilita</strong> s aplikacemi pro Windows Phone 7 a navíc získáte plné verze kancelářských aplikací <strong>Office</strong>. K synchronizaci pošty a kontaktů z vašeho emailového účtu poslouží známy klient <strong>Outlook.</strong>\n</div>\n</div>',
	 9909),
	(5, 67, 16, 'Nokia Lumia 930', NULL, NULL, 13628);

-- --------------------------------------------------------

--
-- Struktura tabulky `sitemap`
--

CREATE TABLE IF NOT EXISTS `sitemap` (
	`id`      INT(11) NOT NULL AUTO_INCREMENT,
	`menu_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `menu_id` (`menu_id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8
	AUTO_INCREMENT =5;

--
-- Vypisuji data pro tabulku `sitemap`
--

INSERT INTO `sitemap` (`id`, `menu_id`) VALUES
	(4, 49);

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
