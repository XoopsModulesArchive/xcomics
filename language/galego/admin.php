<?php
// $Id: admin.php,v 1.1 2006/03/18 03:23:33 mikhail Exp $

// xComicsList & all the rest
define('_AM_XCOMICS_CACHEDIR', 'Could not create cache dir. Please create "your_root/uploads/xComics" if you want to make use of comics like User Friendly & Dilbert.');
define('_AM_XCOMICS_MAN', 'xComics Management');
define('_AM_XCOMICS_NAME', 'Name');
define('_AM_XCOMICS_ACTIVE', 'Active');
define('_AM_XCOMICS_ORDER', 'Order');
define('_AM_XCOMICS_SUBMIT', 'Submit');

// xComicsAdd & xComicsEdit
define('_AM_XCOMICS_NAME_2', 'Name of the comic.');
define('_AM_XCOMICS_ORDER_2', 'Position of comic.');
define('_AM_XCOMICS_ACTIVE_2', 'Should this comic be active?');
define('_AM_XCOMICS_COPYRIGHT', 'Copyright');
define('_AM_XCOMICS_COPYRIGHT_NAME', 'Author of the comic');
define('_AM_XCOMICS_COPYRIGHT_URL', 'Website of the author or archive');
define('_AM_XCOMICS_PHP', 'PHP Code');
define('_AM_XCOMICS_PHP_2', 'Here the php code.<br><br><small>You can place here your code in php. You can echo the result, or place it in a variable $url_to_image (If the result is an url to an image!) if you want to use the pre-formatted tag.</small>');
define('_AM_XCOMICS_PHP_CODE', "echo \"<big>You can echo anything you want...</big>\";\n\n// OR\n\n\$url_to_image = \"http://www.website.com/image.png\";");
define('_AM_XCOMICS_NOTFOUND', 'No comic found with this ID.');

// xComicsRemove
define('_AM_XCOMICS_SURE', 'Are you sure you want to delete ´%s´'); // (Name of comic)

//xComicsListUpdate & xComicsSave
define('_AM_XCOMICS_NOID', 'Can\'t do anything without ID!');
define('_AM_XCOMICS_INID', 'Invalid ID!');
define('_AM_XCOMICS_COULDNOTUPDATE', 'Error - Could not update comic ´%s´'); // (Name of comic)
define('_AM_XCOMICS_SUCCESFULUPDATE', 'Successfully updated comic ´%s´'); // (Name of comic)
define('_AM_XCOMICS_CONFIRM', 'Please confirm');
define('_AM_XCOMICS_ACTION', 'Action');
define('_AM_XCOMICS_ACTIVATE', 'Activate');
define('_AM_XCOMICS_DEACTIVATE', 'Deactivate');
define('_AM_XCOMICS_NOCHANGE', 'No change');
define('_AM_XCOMICS_DUP', 'Database updated!');
define('_AM_XCOMICS_RETURNMA', 'Return back to xComics admin section.');
define('_AM_XCOMICS_NOTUPDATE', 'Nothing to update.');
