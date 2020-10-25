<?php
// $Id: index.php,v 1.2 2006/03/21 07:25:08 mikhail Exp $
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
include 'admin_header.php';

function xComicsList()
{
    global $xoopsDB;

    /**
     * We make cache directory, to developers of comics:
     * use this dir to cache your comics...
     */

    if (!is_dir(XOOPS_ROOT_PATH . '/uploads/xComics')) {
        if (!mkdir(XOOPS_ROOT_PATH . '/uploads/xComics')) {
            echo '<h3>' . _AM_XCOMICS_CACHEDIR . '</h3>';
        }
    }

    include 'functions/xComicsList.php';

    echo '<br>';

    include 'functions/xComicsAdd.php';
}

function xComicsListUpdate()
{
    global $xoopsDB;

    include 'functions/xComicsListUpdate.php';
}

function xComicsEdit()
{
    global $xoopsDB;

    include 'functions/xComicsEdit.php';
}

function xComicsSave()
{
    global $xoopsDB;

    include 'functions/xComicsSave.php';
}

function xComicsAdd()
{
    global $xoopsDB;

    include 'functions/xComicsAdd.php';
}

function xComicsRemove()
{
    global $xoopsDB;

    include 'functions/xComicsRemove.php';
}

if (empty($_GET['op'])) {
    $op = '';
} else {
    $op = $_GET['op'];
}

switch ($op) {
    case 'xComicsEdit':
        xoops_cp_header();
        xComicsEdit();
        break;
    case 'xComicsSave':
        xComicsSave();
        break;
    case 'xComicsAdd':
        xoops_cp_header();
        xComicsAdd();
        echo '<br>';
        break;
    case 'xComicsRemove':
        xComicsRemove();
        echo '<br>';
        break;
    case 'xComicsListUpdate':
        xComicsListUpdate();
        echo '<br>';
        break;
    default:
        xoops_cp_header();
        xComicsList();
        echo '<br>';
        break;
}

include 'admin_footer.php';
