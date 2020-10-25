<?php
// $Id: xComicsCacheDel.php,v 1.1 2006/03/04 16:46:51 jan304 Exp $
// ------------------------------------------------------------------------- //
//                XOOPS - PHP Content Management System                      //
//                       <https://www.xoops.org>                             //
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

if (isset($_POST['confirm']) && 'ok' == $_POST['confirm']) {
    if (!$GLOBALS['xoopsSecurity']->check()) {
        redirect_header('index.php', 3, implode('<br>', $GLOBALS['xoopsSecurity']->getErrors()));
    }

    $dirname = XOOPS_ROOT_PATH . '/uploads/xComics/';

    // Loop through the folder

    $dir = dir($dirname);

    while (false !== $entry = $dir->read()) {
        // Skip pointers

        if ('.' == $entry || '..' == $entry) {
            continue;
        }

        // Keep deeper directories

        if (is_dir("$dirname/$entry")) {
            continue;
        }  

        if (unlink("$dirname/$entry")) {
            echo '<li>' . sprintf(_AM_XCOMICS_DEL_SUCC, $entry) . "</li>\n";
        } else {
            echo '<li>' . sprintf(_AM_XCOMICS_DEL_FAIL, $entry) . "</li>\n";
        }
    }

    // Empty cache_filename of all comics.

    $query = 'UPDATE `' . $xoopsDB->prefix('xcomics') . "` SET `cache_filename` = ''";

    if ($xoopsDB->queryF($query)) {
        echo '<li>' . _AM_XCOMICS_DEL_DB_SUCC . "</li>\n";
    } else {
        echo '<li>' . _AM_XCOMICS_DEL_DB_FAIL . "</li>\n";
    }

    echo '<br><a href="index.php?op=xComicsList">' . _AM_XCOMICS_RETURNMA . '</a>';
} else {
    echo _AM_XCOMICS_WILLDEL . ":\n" . "<ul>\n";

    $dirname = XOOPS_ROOT_PATH . '/uploads/xComics/';

    // Loop through the folder

    $dir = dir($dirname);

    while (false !== $entry = $dir->read()) {
        // Skip pointers

        if ('.' == $entry || '..' == $entry) {
            continue;
        }

        // Keep deeper directories

        if (is_dir("$dirname/$entry")) {
            continue;
        }  

        echo "<li>$entry</li>\n";
    }

    echo "</ul>\n" . "<hr>\n";

    // Create confirm form

    xoops_confirm(['confirm' => 'ok'], 'index.php?op=xComicsCacheDel', _AM_XCOMICS_DEL_SURE, _AM_XCOMICS_SUBMIT);
}
