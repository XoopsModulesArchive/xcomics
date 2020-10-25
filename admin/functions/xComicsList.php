<?php
// $Id: xComicsList.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
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

echo "<h4 style='text-align: left;'>" . _AM_XCOMICS_MAN . "</h4>\n";
echo "<form action='index.php?op=xComicsListUpdate' method='post'>\n";
echo "	<table class='outer' width='100%' cellpadding='4' cellspacing='1'>
	<tr align='center'>
		<th>" . _AM_XCOMICS_NAME . '</th>
		<th>' . _AM_XCOMICS_ACTIVE . '</th>
		<th>' . _AM_XCOMICS_ORDER . '</th>
		<th>' . _EDIT . '/' . _DELETE . "</th>
	</tr>\n";

$evodd = 'even';
$result = $xoopsDB->query('SELECT `id`, `order`, `name`, `active` FROM ' . $xoopsDB->prefix('xcomics') . ' ORDER BY `id` ASC');

if (!$xoopsDB->getRowsNum($result)) {
    echo "<tr class='even' align='center'><td colspan='4'>Could not get any comics... Where are they?</td></tr>";
}

while (list($comic_id, $comic_order, $comic_name, $comic_visible) = $xoopsDB->fetchRow($result)) {
    if (1 == $comic_visible) {
        $checked = 'checked';
    } else {
        $checked = '';
    }

    $data = "<td align='center'>
					<input type='hidden' name='list["
            . $comic_id
            . "][oldname]' value='"
            . $comic_name
            . "'>
					<input type='text' size='20' maxlength='60' name='list["
            . $comic_id
            . "][name]' value='"
            . $comic_name
            . "'>
				</td>
    			<td align='center'>
    				<input type='hidden' name='list["
            . $comic_id
            . "][oldactive]' value='"
            . $comic_visible
            . "'>
    				<input type='checkbox' "
            . $checked
            . " name='list["
            . $comic_id
            . "][active]' value='1'>
    			</td>
    			<td align='center'>
    				<input type='hidden' name='list["
            . $comic_id
            . "][oldorder]' value='"
            . $comic_order
            . "'>
    				<input type='text' name='list["
            . $comic_id
            . "][order]'size='3' maxlength='4' value='"
            . $comic_order
            . "'>
    			</td>
    			<td align='center'>
    				<input type='hidden' name='list["
            . $comic_id
            . "][id]' value='"
            . $comic_id
            . "'>
    				<a href=\"index.php?op=xComicsEdit&id="
            . $comic_id
            . "\" title='"
            . _EDIT
            . "'><img src='"
            . XOOPS_URL
            . "/modules/system/images/update.gif' alt='"
            . _EDIT
            . "'></a> <a href=\"index.php?op=xComicsRemove&id="
            . $comic_id
            . "\" title='"
            . _DELETE
            . "'><img src='"
            . XOOPS_URL
            . "/modules/system/images/uninstall.gif' alt='"
            . _DELETE
            . "'></a>
    			</td>\n";

    if ('even' == $evodd) {
        echo "<tr class='even' align='center' valign='middle'>\n";

        echo $data;

        echo "</tr>\n";

        $evodd = 'odd';
    } else {
        echo "<tr class='odd' align='center' valign='middle'>\n";

        echo $data;

        echo "</tr>\n";

        $evodd = 'even';
    }
}

echo "<tr class='foot'>
			<td colspan='4' align='center'>
				<input type='submit' name='submit' value='" . _AM_XCOMICS_SUBMIT . "'>
			</td>
		  </tr>";
echo '</table>';
echo '</form>';
