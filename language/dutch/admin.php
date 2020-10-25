<?php
// $Id: admin.php,v 1.1 2006/03/10 18:33:04 mikhail Exp $

// xComicsList & all the rest
define('_AM_XCOMICS_CACHEDIR', 'Kon cache map niet aanmaken. Gelieve "jouw_root/uploads/xComics" aan te maken indien je gebruik wilt maken van comics zoals User Friendly & Dilbert.');
define('_AM_XCOMICS_MAN', 'xComics Beheer');
define('_AM_XCOMICS_NAME', 'Naam');
define('_AM_XCOMICS_ACTIVE', 'Actief');
define('_AM_XCOMICS_ORDER', 'Volgorde');
define('_AM_XCOMICS_SUBMIT', 'Versturen');

// xComicsAdd & xComicsEdit
define('_AM_XCOMICS_NAME_2', 'Naam van de comic.');
define('_AM_XCOMICS_ORDER_2', 'Positie van de comic.');
define('_AM_XCOMICS_ACTIVE_2', 'Hoort dit actief te zijn?');
define('_AM_XCOMICS_COPYRIGHT', 'Copyright');
define('_AM_XCOMICS_COPYRIGHT_NAME', 'Auteur van deze comic');
define('_AM_XCOMICS_COPYRIGHT_URL', 'Website van de auteur of archief');
define('_AM_XCOMICS_PHP', 'PHP Code');
define(
    '_AM_XCOMICS_PHP_2',
    'Gelieve hier je PHP Code te plaatsen.<br><br><small>Je kan hier je code plaatsen in php. Je kunt het resultaat echo\'en of het plaatsen in de variable $url_to_image (Enkel het indien het resultaat een url naar een afbeelding is!) zodat je gebruik maakt van het voor-geformatteerde formaat.</small>'
);
define('_AM_XCOMICS_PHP_CODE', "echo \"<big>You can echo anything you want...</big>\";\n\n// OR\n\n\$url_to_image = \"http://www.website.com/image.png\";");
define('_AM_XCOMICS_NOTFOUND', 'Geen comic gevonden met dit ID.');

// xComicsRemove
define('_AM_XCOMICS_SURE', 'Ben je zeker dat je ´%s´ wilt verwijderen'); // (Name of comic)

//xComicsListUpdate & xComicsSave
define('_AM_XCOMICS_NOID', 'Kan niets doen zonder ID!');
define('_AM_XCOMICS_INID', 'Ongeldig ID!');
define('_AM_XCOMICS_COULDNOTUPDATE', 'Fout - Er liep iets fout met het updaten van ´%s´'); // (Name of comic)
define('_AM_XCOMICS_SUCCESFULUPDATE', 'Update succesvol comic ´%s´'); // (Name of comic)
define('_AM_XCOMICS_CONFIRM', 'Gelieve te bevestigen');
define('_AM_XCOMICS_ACTION', 'Actie');
define('_AM_XCOMICS_ACTIVATE', 'Inschakelen');
define('_AM_XCOMICS_DEACTIVATE', 'Uitschakelen');
define('_AM_XCOMICS_NOCHANGE', 'Geen verandering');
define('_AM_XCOMICS_DUP', 'Database geupdate!');
define('_AM_XCOMICS_RETURNMA', 'Keer terug naar de xComics admin sectie.');
define('_AM_XCOMICS_NOTUPDATE', 'Niets om te veranderen.');
