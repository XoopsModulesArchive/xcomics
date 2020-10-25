# $Id: mysql.sql,v 1.1 2006/03/10 18:33:07 mikhail Exp $
# phpMyAdmin SQL Dump
# version 2.5.7-pl1
# http://www.phpmyadmin.net
#
# Host: localhost
# Generatie Tijd: 31 Aug 2004 om 17:43
# Server versie: 4.0.20
# PHP Versie: 4.3.8
# 
# Database : `xoops_with_xcomics`
# 

# --------------------------------------------------------

#
# Tabel structuur voor tabel `xcomics`
#
# Gecreëerd: 31 Aug 2004 om 16:59
# Laatst bijgewerkt: 18 Sept 2004 om 12:52
#

CREATE TABLE `xcomics` (
    `id`             MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    `order`          INT(11)               NOT NULL DEFAULT '1',
    `name`           VARCHAR(60)           NOT NULL DEFAULT '',
    `copyright_name` VARCHAR(100)          NOT NULL DEFAULT '',
    `copyright_url`  VARCHAR(100)          NOT NULL DEFAULT '',
    `xcode`          LONGTEXT              NOT NULL,
    `active`         TINYINT(1) UNSIGNED   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY `name` (`name`, `active`)
)
    ENGINE = ISAM
    AUTO_INCREMENT = 14;

#
# Gegevens worden uitgevoerd voor tabel `xcomics`
#

INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (1, 1, 'Dilbert', 'dilbert.com', 'http://www.dilbert.com',
        '$root_image = XOOPS_ROOT_PATH."/uploads/xComics/dilbert.gif";\r\n$url_image = XOOPS_URL."/uploads/xComics/dilbert.gif";\r\n\r\nif((!file_exists($root_image)) || ( (36000 + filemtime($root_image)) &lt;= time() ))\r\n{\r\n	// Dilbert part Created by Ali (^_^) \r\n	// dbz_gt01@hotmail.com \r\n	$inhoud = file("http://www.dilbert.com/"); \r\n	$inhoud = implode("", $inhoud); \r\n	$part = explode("&lt;!-- TABS AND COMIC TABLE BEGIN --&gt;",$inhoud); \r\n	$part1 = explode("&lt;IMG SRC=\\"/comics/dilbert/archive",$part[1]); \r\n	$part2 = explode("\\" ",$part1[1]); \r\n	$picture = $part2[0]; \r\n	$urltoimage = "http://www.dilbert.com/comics/dilbert/archive".$picture."";\r\n	\r\n	// Load class\r\n	$xComics = New xComics();\r\n	\r\n	// Dump file...\r\n	if($xComics-&gt;dump_image($urltoimage, $root_image))\r\n	{\r\n		$url_to_image = $url_image;\r\n	}else{\r\n		echo "Could not dump image. Failed, sorry...";\r\n		$url_to_image = \'\';\r\n	}\r\n	\r\n}else{\r\n	$url_to_image = $url_image;\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (2, 2, 'Garfield', 'Paws, Inc', 'http://www.ucomics.com/garfield/',
        '$xComics = New xComics();\r\n\r\n// url example: http://images.ucomics.com/comics/ga/2003/ga031227.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'1\', \'ga\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	unset($url_to_image);\r\n	// We already tried today, so start yesterday...\r\n	$xComics-&gt;back_in_time(\'4\', \'1\', \'ga\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (3, 3, '9 to 5', 'Harley Schwadron', 'http://www.ucomics.com/9to5/',
        '$xComics = New xComics();\r\n\r\n// url: http://images.ucomics.com/comics/tmntf/2003/tmntf031227.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'1\', \'tmntf\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	unset($url_to_image);\r\n	\r\n	$xComics-&gt;back_in_time(\'4\', \'1\', \'tmntf\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (6, 6, 'User Friendly', 'Userfriendly.org', 'http://www.userfriendly.org/',
        '// To the UF creator: If u want me to remove this peace of code out of xComics just e-mail me in place of blocking weird referers... File is now cached so people won\'t overload your server... :)\r\n\r\n$root_image = XOOPS_ROOT_PATH."/uploads/xComics/userfriendly.gif";\r\n$url_image = XOOPS_URL."/uploads/xComics/userfriendly.gif";\r\n\r\nif((!file_exists($root_image)) || ( (36000 + filemtime($root_image)) &lt;= time() ))\r\n{\r\n	ini_set(\'user_agent\',\'Mozilla/5.0 (Windows; U; Windows NT 5.1) Firefox/0.9.3\');\r\n	$inhoud = file("http://ars.userfriendly.org/cartoons/?id=".date(\'Ymd\', strtotime(\'-1 day\')).""); \r\n	$inhoud = implode("", $inhoud); \r\n	$part = explode("&lt;a href=\\"/cartoons/?id=".date(\'Ymd\', strtotime(\'-1 day\'))."\\"&gt;",$inhoud); \r\n	$part1 = explode("&lt;img border=\\"0\\" src=\\"http://www.userfriendly.org/cartoons/archives/",$part[1]); \r\n	$part2 = explode("\\" width=\\"",$part1[1]); \r\n	$picture = $part2[0]; \r\n	$urltoimage = "http://www.userfriendly.org/cartoons/archives/".$picture."";\r\n	\r\n	// Load class\r\n	$xComics = New xComics();\r\n	\r\n	// Dump file...\r\n	if($xComics-&gt;dump_image($urltoimage, $root_image))\r\n	{\r\n		$url_to_image = $url_image;\r\n	}else{\r\n		echo "Could not dump image. Failed, sorry...";\r\n		$url_to_image = \'\';\r\n	}\r\n	\r\n}else{\r\n	$url_to_image = XOOPS_URL."/uploads/xComics/userfriendly.gif";\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (4, 4, 'Close To Home', 'John McPherson', 'http://www.ucomics.com/closetohome/',
        '$xComics = New xComics();\r\n\r\n// url: http://images.ucomics.com/comics/cl/2003/cl031227.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'1\', \'cl\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	$url_to_image = \'\';\r\n	\r\n	$xComics-&gt;back_in_time(\'4\', \'1\', \'cl\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (5, 5, 'Baldo', 'Hector D. Cantu and Carlos Castellanos', 'http://www.ucomics.com/baldo/',
        '$xComics = New xComics();\r\n\r\n// url: http://images.ucomics.com/comics/ba/2003/ba031227.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'1\', \'ba\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	unset($url_to_image);\r\n	$xComics-&gt;back_in_time(4, \'1\', \'ba\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (7, 7, 'Momma', 'Mell Lazarus', 'http://www.comics.com/creators/momma/',
        '$inhoud = file("http://www.comics.com/creators/momma/"); \r\n$inhoud = implode("", $inhoud); \r\n$part = explode("&lt;TD WIDTH=\\"609\\" BGCOLOR=\\"#FFFFFF\\" COLSPAN=\\"8\\"&gt;",$inhoud); \r\n$part1 = explode("&lt;IMG SRC=\\"/creators/momma/archive/images/",$part[1]); \r\n$part2 = explode("\\" ALT=\\"Today\'s Comic\\" BORDER=\\"0\\"&gt;",$part1[1]); \r\n$picture = $part2[0]; \r\n$url_to_image = "http://www.comics.com/creators/momma/archive/images/".$picture."";',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (8, 8, 'Sinfest', 'Sinfest Productions', 'http://www.sinfest.net/',
        '$xComics = New xComics();\r\n\r\n// url: http://www.sinfest.net/comics/sf20031227.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'2\', \'sf\', \'1\', \'sinfest.net\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	unset($url_to_image);\r\n	\r\n	$xComics-&gt;back_in_time(\'4\', \'2\', \'sf\', \'sinfest.net\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (9, 9, 'The Born Loser', 'Neo, Inc.', 'http://www.comics.com/comics/bornloser/',
        '$inhoud = file("http://www.comics.com/comics/bornloser/"); \r\n$inhoud = implode("", $inhoud); \r\n$part = explode("&lt;TD WIDTH=\\"609\\" BGCOLOR=\\"#FFFFFF\\" COLSPAN=\\"8\\"&gt;",$inhoud); \r\n$part1 = explode("&lt;IMG SRC=\\"/comics/bornloser/archive/images/",$part[1]); \r\n$part2 = explode("\\" ALT=\\"Today\'s Comic\\" BORDER=\\"0\\"&gt;",$part1[1]); \r\n$picture = $part2[0]; \r\n$url_to_image = "http://www.comics.com/comics/bornloser/archive/images/".$picture."";',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (10, 10, 'Calvin & Hobbes', 'Bill Watterson', 'http://www.ucomics.com/calvinandhobbe',
        '// url: http://images.ucomics.com/comics/ch/1992/ch921226.gif\r\n$url_to_image = "http://images.ucomics.com/comics/ch/".(date(\'Y\', strtotime(\'-1 day\')) - 11)."/ch".(date(\'Y\', strtotime(\'-1 day\')) - 1911).date(\'md\', strtotime(\'-1 day\')).".gif";', 0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (11, 11, 'Adam@Home', 'Brian Basset', 'http://www.ucomics.com/adamathome/',
        '$xComics = New xComics();\r\n\r\n// url: http://images.ucomics.com/comics/ad/2003/ad031228.gif\r\n$url_to_image = $xComics-&gt;build_image_url(\'1\', \'ad\');\r\n\r\nif(!$xComics-&gt;exists_image($url_to_image))\r\n{\r\n	unset($url_to_image);\r\n	\r\n	$xComics-&gt;back_in_time(\'3\', \'1\', \'ad\');\r\n}',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (12, 12, 'Moppenton (Dutch)', 'Moppen.be', 'http://www.moppen.be',
        '$bestand = file("http://www.moppen.be/?screenwidth=1024"); \r\n$bestand = implode("", $bestand); \r\n$titel1 = explode("&lt;TD ROWSPAN=2 WIDTH=356 VALIGN=top BACKGROUND=",$bestand); \r\n$titel2 = explode("&lt;TD ALIGN=right&gt;&lt;B&gt;&lt;I&gt;Titel :&lt;/I&gt;&lt;/B&gt;&lt;BR&gt;",$titel1[1]); \r\n$titel3 = explode("&lt;/TD&gt;",$titel2[1]); \r\n$titel = $titel3[0]; \r\n$inhoud1 = explode("&lt;TABLE BORDER=0 WIDTH=100% BACKGROUND=", $bestand); \r\n$inhoud2 = explode("&lt;TR&gt;&lt;TD&gt;", $inhoud1[1]); \r\n$inhoud3 = explode("&lt;/TD&gt;&lt;/TR&gt;", $inhoud2[1]); \r\n$inhoud = $inhoud3[0]; \r\n$inhoud =eregi_replace(\'&lt;br[[:space:]]*/?[[:space:]]*&gt;\', "\\n", $inhoud);\r\necho "&lt;h3&gt;".$titel."&lt;/h3&gt;";\r\necho "&lt;textarea cols=\'45\' rows=\'7\'&gt;".$inhoud."&lt;/textarea&gt;";',
        0);
INSERT INTO `xcomics` (`id`, `order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)
VALUES (13, 13, 'Humor Grafico (Spanish)', 'humornegro.com', 'http://www.humornegro.com/', '$url_to_image = "http://www.humornegro.com/modules/fotodeldia/foto_del_dia.jpg";', 0);
