<?php
// $Id: xComicsAdd.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
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

echo "
<form action='index.php?op=xComicsSave' method='post'>
	<table width='100%' class='outer' cellspacing='1'>
		<tr>
			<th colspan='2'>Add a Comic to the Database</th>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_NAME . '</b><br>
				' . _AM_XCOMICS_NAME_2 . "
			</td>
			<td class='even'>
				<input type='text' size='30' maxlength='60' name='xComicsName' value='" . _AM_XCOMICS_NAME_2 . "'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_ORDER . '</b><br>
				' . _AM_XCOMICS_ORDER_2 . "
			</td>
			<td class='even'>
				<input type='text' size='3' maxlength='4' name='xComicsOrder' value='1'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_ACTIVE . '</b><br>
				' . _AM_XCOMICS_ACTIVE_2 . "
			</td>
			<td class='even'>
				<input type='checkbox' checked name='xComicsActive' value='1'>
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
				<input type='text' size='30' maxlength='60' name='xComicsCopName' value='" . _AM_XCOMICS_COPYRIGHT_NAME . "'><br>
				<input type='text' size='30' maxlength='60' name='xComicsCopUrl' value='http://www.archive.net/'>
			</td>
		</tr>
		<tr valign='top' align='left'>
			<td class='odd'>
				<b>" . _AM_XCOMICS_PHP . '</b><br>
				' . _AM_XCOMICS_PHP_2 . "
			</td>
			<td class='even'>
				<textarea name='xComicsXcode' rows='25' cols='70'>" . _AM_XCOMICS_PHP_CODE . "</textarea>
			</td>
		</tr>
		<tr class='foot'>
			<td colspan='2' align='center'>
				<input type='hidden' name='action' value='Add'>
				<input type='submit' name='submit' value='" . _AM_XCOMICS_SUBMIT . "'>
			</td>
		</tr>
		</table>
		";
