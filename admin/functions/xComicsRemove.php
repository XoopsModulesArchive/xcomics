<?php
// $Id: xComicsRemove.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
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
 * Add the slashes!
 */
if (!get_magic_quotes_gpc()) {
    if (!empty($_GET['id'])) {
        $id = addslashes($_GET['id']);
    } else {
        $id = addslashes($_POST['id']);
    }
} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_POST['id'];
    }
}
/**
 * Is the ID empty?
 */
if (empty($id)) {
    redirect_header('index.php', 3, "Can't do anything without ID!");
}
/**
 * Are it numbers?
 */
if (!preg_match('/^([0-9]+)$/', $id)) {
    redirect_header('index.php', 3, 'Invalid ID!');
}

if (!empty($_POST['confirm']) && 'ok' == $_POST['confirm']) {
    /**
     * First Fetch the comic...
     */

    $result = $xoopsDB->query('SELECT `name` FROM ' . $xoopsDB->prefix('xcomics') . " WHERE `id` = '" . $id . "'");

    if (!$result) {
        redirect_header('index.php', 3, 'Invalid ID!');
    }

    $comic = $xoopsDB->fetchArray($result);

    /**
     * Replacing those ' in the names... :)
     */

    if (mb_strstr($comic['name'], "'")) {
        $comic['name'] = str_replace("'", '&#039;', $comic['name']);
    }

    /**
     * Deleting the comic
     */

    $result = $xoopsDB->query('DELETE FROM ' . $xoopsDB->prefix('xcomics') . " WHERE `id` = '" . $id . "';");

    if ($result) {
        redirect_header('index.php', 3, '´' . $comic['name'] . '` is removed.');
    } else {
        redirect_header('index.php', 3, 'Could not remove ´' . $comic['name'] . '´!');
    }
} else {
    /**
     * Everything looks fine
     */

    $result = $xoopsDB->query('SELECT `id`, `name` FROM ' . $xoopsDB->prefix('xcomics') . " WHERE `id` = '" . $id . "'");

    if (!$result) {
        redirect_header('index.php', 3, 'Invalid ID!');
    }

    $comic = $xoopsDB->fetchArray($result);

    /**
     * Replacing those ' in the names... :)
     */

    if (mb_strstr($comic['name'], "'")) {
        $comic['name'] = str_replace("'", '&#039;', $comic['name']);
    }

    /**
     * Load the header...
     */

    xoops_cp_header();

    OpenTable();

    echo '<h3>' . sprintf(_AM_XCOMICS_SURE, $comic['name']) . "?</h3>\n";

    echo "<form action='index.php?op=xComicsRemove' method='post'>
				<input type='hidden' name='confirm' value='ok'>
				<input type='hidden' name='id' value='" . $comic['id'] . "'>
				<input type='submit' name='submit' value='" . _YES . "'>&nbsp;
				<input type='button' onClick='location=\"index.php?op=xComicsList\"' value='" . _NO . "'>
			  </form>\n";

    CloseTable();
}
