<?php
// $Id: xComicsSave.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <http://xoopscube.org>                             //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //

if (!defined('XOOPS_MAINFILE_INCLUDED') || !defined('XCOMICS_ADMIN_HEADER') || !mb_strstr($_SERVER['PHP_SELF'], 'admin/index.php')) {
    exit();
}
/**
 * Before we do anything I prefer to check or the admin isn't doing weird...
 */
if (!get_magic_quotes_gpc()) {
    if (isset($_POST['id'])) {
        $id = addslashes($_POST['id']);
    }

    $action = addslashes($_POST['action']);

    $xComicsName = addslashes($_POST['xComicsName']);

    $xComicsOrder = addslashes($_POST['xComicsOrder']);

    $xComicsActive = addslashes($_POST['xComicsActive']);

    $xComicsCopName = addslashes($_POST['xComicsCopName']);

    $xComicsCopUrl = addslashes($_POST['xComicsCopUrl']);

    $xComicsXcode = addslashes($_POST['xComicsXcode']);
} else {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $action = $_POST['action'];

    $xComicsName = $_POST['xComicsName'];

    $xComicsOrder = $_POST['xComicsOrder'];

    $xComicsActive = $_POST['xComicsActive'];

    $xComicsCopName = $_POST['xComicsCopName'];

    $xComicsCopUrl = $_POST['xComicsCopUrl'];

    $xComicsXcode = $_POST['xComicsXcode'];
}
/**
 * When should id be set...
 */
if (empty($id) && 'Update' == $action) {
    redirect_header('index.php', 3, _AM_XCOMICS_NOID);
}

/**
 * Check or $id is set, if so, are it only numbers?
 */
if (!empty($id) && !preg_match('/^([0-9]+)$/', $id)) {
    redirect_header('index.php', 3, _AM_XCOMICS_INID);
}
/**
 * Same for `order`
 */
if (empty($xComicsOrder) || !preg_match('/^([0-9]+)$/', $xComicsOrder)) {
    redirect_header('index.php', 3, 'The order number is not set or not a number.');
}
/**
 * Replacing those ' in the names... :)
 */
if (mb_strstr($xComicsName, "'")) {
    $xComicsName = str_replace("'", '&#039;', $xComicsName);
}

/**
 * We should really make sure there aren't nasty tags...
 */
$xComicsXcode = haakjes('weghaakjes', $xComicsXcode);

if ('Update' == $action) {
    $query = 'UPDATE `' . $xoopsDB->prefix('xcomics') . '`';

    $query .= " SET `order` = '" . $xComicsOrder . "',";

    $query .= " `name` = '" . $xComicsName . "',";

    $query .= " `copyright_name` = '" . $xComicsCopName . "',";

    $query .= " `copyright_url` = '" . $xComicsCopUrl . "',";

    $query .= " `xcode` = '" . $xComicsXcode . "',";

    $query .= " `active` = '" . $xComicsActive . "'";

    $query .= " WHERE `id` = '" . $id . "';";
} elseif ('Add' == $action) {
    $query = 'INSERT INTO `' . $xoopsDB->prefix('xcomics') . '` ';

    $query .= '(`order`, `name`, `copyright_name`, `copyright_url`, `xcode`, `active`)';

    $query .= ' VALUES ';

    $query .= "('" . $xComicsOrder . "', '" . $xComicsName . "', '" . $xComicsCopName . "', '" . $xComicsCopUrl . "', '" . $xComicsXcode . "', '" . $xComicsActive . "');";
} else {
    redirect_header('index.php', 3, 'What do I have to do?');
}

if (($result = $xoopsDB->query($query))) {
    redirect_header('index.php', 2, _AM_XCOMICS_DUP);
} else {
    redirect_header('index.php', 4, 'Error - Could not execute query...');
}
