<?php
// $Id: xComicsListUpdate.php,v 1.2 2006/03/21 07:25:04 mikhail Exp $
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

if (!get_magic_quotes_gpc()) {
    $list = addslashes($_POST['list']);
} else {
    $list = $_POST['list'];
}

/*foreach ($list as $lijst){
   echo "ID: ".$lijst['id']."<br>";
   echo "Oldname: ".$lijst['oldname']."<br>";
   echo "Name: ".$lijst['name']."<br>";
   echo "Oldactive: ".$lijst['oldactive']."<br>";
   echo "Active: ".$lijst['active']."<br>";
   echo "Oldorder: ".$lijst['oldorder']."<br>";
   echo "Order: ".$lijst['order']."<br><br>";
}*/

if (isset($_POST['confirm']) && 'ok' == $_POST['confirm']) {
    $notf = '<ul>';

    foreach ($list as $lijst) {
        /**
         * Is the ID empty?
         */

        if (empty($lijst['id'])) {
            redirect_header('index.php', 3, _AM_XCOMICS_NOID);
        }

        /**
         * Are it numbers?
         */

        if (!preg_match('/^([0-9]+)$/', $lijst['id'])) {
            redirect_header('index.php', 3, _AM_XCOMICS_INID);
        }

        /**
         * Fix some things to prevent
         * complains of debug...
         */

        if (!isset($lijst['oldactive'])) {
            $lijst['oldactive'] = '0';
        }

        if (!isset($lijst['active'])) {
            $lijst['active'] = '0';
        }

        /**
         * If EVERYTHING is the same, why running an query?
         */

        if (($lijst['oldactive'] == $lijst['active']) && ($lijst['oldname'] == $lijst['name']) && ($lijst['oldorder'] == $lijst['order'])) {
            /**
             * Everything stayed to same, so wo won't do anything... :)
             */
        } else {
            if (isset($query)) {
                $query = '';
            }

            if (isset($query1)) {
                $query1 = '';
            }

            if ($lijst['oldname'] != $lijst['name']) {
                $query1 = " `name` = '" . $lijst['name'] . "'";
            }

            if ($lijst['oldactive'] != $lijst['active']) {
                if (empty($query1)) {
                    $query1 = " `active` = '" . $lijst['active'] . "'";
                } else {
                    $query1 .= ", `active` = '" . $lijst['active'] . "'";
                }
            }

            if ($lijst['oldorder'] != $lijst['order']) {
                if (empty($query1)) {
                    $query1 = " `order` = '" . $lijst['order'] . "'";
                } else {
                    $query1 .= ", `order` = '" . $lijst['order'] . "'";
                }
            }

            $query = 'UPDATE `' . $xoopsDB->prefix('xcomics') . '`';

            $query .= ' SET' . $query1 . " WHERE `id` = '" . $lijst['id'] . "'";

            if (!($result = $xoopsDB->queryF($query))) {
                $notf .= "<li><span style='color:#ff0000;font-weight:bold;'>" . sprintf(_AM_XCOMICS_COULDNOTUPDATE, $lijst['name']) . '</span></li>';
            } else {
                $notf .= '<li>' . sprintf(_AM_XCOMICS_SUCCESFULUPDATE, $lijst['name']) . '</li>';
            }
        }
    }

    /**
     * Load xoops header
     */

    xoops_cp_header();

    echo '<br>';

    /**
     * Has there actually anything happend there?
     */

    if ('<ul>' != $notf) {
        echo $notf . '</ul>';
    } else {
        echo _AM_XCOMICS_NOTUPDATE . '<br>';
    }

    echo '<br><a href="index.php?op=xComicsList">' . _AM_XCOMICS_RETURNMA . '</a>';
} else {
    /**
     * Header of admin
     */

    xoops_cp_header();

    echo "
	<h4 style='text-align:left;'>" . _AM_XCOMICS_CONFIRM . ":</h4>
	<form action='index.php?op=xComicsListUpdate' method='post'>
		<input type='hidden' name='confirm' value='ok'>
		
	<table width='100%' border='0' cellspacing='1' class='outer'>
	<tbody>
		<tr align='center'>
			<th>" . _AM_XCOMICS_NAME . '</th>
			<th>' . _AM_XCOMICS_ACTION . '</th>
			<th>' . _AM_XCOMICS_ORDER . '</th>
		</tr>';

    foreach ($list as $lijst) {
        /**
         * Fix some tings to prevent complains of debug...
         */

        if (!isset($lijst['oldactive'])) {
            $lijst['oldactive'] = '0';
        }

        if (!isset($lijst['active'])) {
            $lijst['active'] = '0';
        }

        if (mb_strstr($lijst['oldname'], "'")) {
            $lijst['oldname'] = stripslashes(str_replace("'", '&#039;', $lijst['oldname']));
        } else {
            $lijst['oldname'] = stripslashes($lijst['oldname']);
        }

        if (mb_strstr($lijst['name'], "'")) {
            $lijst['name'] = stripslashes(str_replace("'", '&#039;', $lijst['name']));
        } else {
            $lijst['name'] = stripslashes($lijst['name']);
        }

        /**
         * Let we dump the hidden inputs before the rest...
         */

        echo "\n\n<input type='hidden' name='list[" . $lijst['id'] . "][oldname]' value='" . $lijst['oldname'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][name]' value='" . $lijst['name'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][oldactive]' value='" . $lijst['oldactive'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][active]' value='" . $lijst['active'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][oldorder]' value='" . $lijst['oldorder'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][order]' value='" . $lijst['order'] . "'>\n";

        echo "<input type='hidden' name='list[" . $lijst['id'] . "][id]' value='" . $lijst['id'] . "'>\n\n";

        echo "<tr class='even'>\n<td align='center'>";

        /**
         * Name check
         */

        if ($lijst['oldname'] == $lijst['name']) {
            echo $lijst['name'];
        } else {
            echo $lijst['oldname'] . " &raquo;&raquo; <span style='color:#ff0000;font-weight:bold;'>" . $lijst['name'] . '</span>';
        }

        echo "</td>\n<td align='center'>";

        /**
         * Status (active or not) check
         */

        if ($lijst['oldactive'] == $lijst['active']) {
            echo _AM_XCOMICS_NOCHANGE;
        } else {
            if ('1' == $lijst['oldactive'] && '0' == $lijst['active']) {
                echo "<span style='color:#ff0000;font-weight:bold;'>" . _AM_XCOMICS_DEACTIVATE . '</span>';
            } else {
                echo "<span style='color:#ff0000;font-weight:bold;'>" . _AM_XCOMICS_ACTIVATE . '</span>';
            }
        }

        echo "</td>\n<td align='center'>";

        /**
         * Order check!
         */

        if ($lijst['oldorder'] == $lijst['order']) {
            echo $lijst['order'];
        } else {
            echo "<span style='color:#ff0000;font-weight:bold;'>" . $lijst['order'] . '</span>';
        }

        echo "</td>\n</tr>";
    }

    echo "<tr class='foot' align='center'>
		<td colspan='3'>
			<input type='submit' value='" . _AM_XCOMICS_SUBMIT . "'>&nbsp;<input type='button' value='" . _CANCEL . "' onClick='location=\"index.php?op=xComicsList\"'>
		</td>
	</tr>
	</tbody>
	</table>";
}
