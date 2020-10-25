<?php
// $Id: xComicsEdit.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
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
 * Before we do anything I prefer to
 * check or the admin isn't doing weird...
 */
if (!get_magic_quotes_gpc()) {
    $id = addslashes($_GET['id']);
} else {
    $id = $_GET['id'];
}

if (!preg_match('/^([0-9]+)$/', $id)) {
    redirect_header('index.php', 3, _AM_XCOMICS_NOID);
}

/**
 * Do the query
 */
$query = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('xcomics') . ' WHERE `id` = ' . $id);
/**
 * Do we got one?
 */
if (1 != $xoopsDB->getRowsNum($query)) {
    /**
     * Or we got none, or something really strange happend here...
     */

    redirect_header('index.php', 3, _AM_XCOMICS_NOTFOUND);
}

/*
 * Make the array (to prevent lame code), and dump...
 */
$xComic = [];
$xComic = $xoopsDB->fetchArray($query);

if (1 == $xComic['active']) {
    $checked = 'checked';
} else {
    $checked = '';
}
/**
 * Replacing some stuff...
 */
//$xComic['xcode'] = preg_replace("&lt;", "<", $xComic['xcode']);
//$xComic['xcode'] = preg_replace("&gt;", ">", $xComic['xcode']);
//$xComic['xcode'] = preg_replace("\|lt;\|", "&amp;lt;", $xComic['xcode']);
//$xComic['xcode'] = preg_replace("\|gt;\|", "&amp;gt;", $xComic['xcode']);
$xComic['xcode'] = haakjes('terughaakjes', $xComic['xcode']);
/**
 * Prevent weird things from happening...
 */
if (mb_strstr($xComic['name'], "'")) {
    $lijst['name'] = stripslashes(str_replace("'", '&#039;', $xComic['name']));
} else {
    $lijst['name'] = stripslashes($xComic['name']);
}

if (mb_strstr($xComic['copyright_name'], "'")) {
    $lijst['name'] = stripslashes(str_replace("'", '&#039;', $xComic['copyright_name']));
} else {
    $lijst['name'] = stripslashes($xComic['copyright_name']);
}

if (mb_strstr($xComic['copyright_url'], "'")) {
    $lijst['name'] = stripslashes(str_replace("'", '&#039;', $xComic['copyright_url']));
} else {
    $lijst['name'] = stripslashes($xComic['copyright_url']);
}

echo "
<form action='index.php?op=xComicsSave' method='post'>
	<table width='100%' class='outer' cellspacing='1'>
	<tbody>
		<tr>
			<th colspan='2'>Edit of \"" . $xComic['name'] . "\"</th>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_NAME . '</b><br>
				' . _AM_XCOMICS_NAME_2 . "
			</td>
			<td class='even'>
				<input type='text' size='30' maxlength='60' name='xComicsName' value='" . $xComic['name'] . "'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_ORDER . '</b><br>
				' . _AM_XCOMICS_ORDER_2 . "
			</td>
			<td class='even'>
				<input type='text' size='3' maxlength='4' name='xComicsOrder' value='" . $xComic['order'] . "'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_ACTIVE . '</b><br>
				' . _AM_XCOMICS_ACTIVE_2 . "
			</td>
			<td class='even'>
				<input type='checkbox' " . $checked . " name='xComicsActive' value='1'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_COPYRIGHT . '</b><br>
				<ul><li>' . _AM_XCOMICS_COPYRIGHT_NAME . '</li>
				<li>' . _AM_XCOMICS_COPYRIGHT_URL . "</li></ul>
			</td>
			<td class='even'>
				<br>
				<input type='text' size='30' maxlength='60' name='xComicsCopName' value='" . $xComic['copyright_name'] . "'><br>
				<input type='text' size='30' maxlength='60' name='xComicsCopUrl' value='" . $xComic['copyright_url'] . "'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_PHP . '</b><br>
				' . _AM_XCOMICS_PHP_2 . "
			</td>
			<td class='even'>
				<textarea name='xComicsXcode' rows='25' cols='98%'>" . $xComic['xcode'] . "</textarea>
			</td>
		</tr>
		<tr class='foot'>
			<td colspan='2' align='center'>
				<input type='hidden' name='id' value='" . $xComic['id'] . "'>
				<input type='hidden' name='action' value='Update'>
				<input type='submit' name='submit' value='" . _AM_XCOMICS_SUBMIT . "'>&nbsp;<input type='button' value='" . _CANCEL . "' onClick='location=\"index.php?op=xComicsList\"'
			</td>
		</tr>
	<tbody>
	</table>
</form>";
