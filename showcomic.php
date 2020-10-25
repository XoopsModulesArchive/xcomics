<?php
// $Id: showcomic.php,v 1.2 2006/03/21 07:25:12 mikhail Exp $
// ------------------------------------------------------------------------- //
//               Xoops: Content Management System                           //
//                       < http://xoopscube.org >                          //
// ---------------------------------------------------------------------- //
// Author: Jan304														 //
// Author Email : jan304@pandora.be 									//
// Author website: http://www.jan304.org							   //
// ------------------------------------------------------------------ //
// Thx to PF Lafontaine (Aka WismeriL) for helping me				 //
// ---------------------------------------------------------------- //

// Include mainfile
require dirname(__DIR__, 2) . '/mainfile.php';
// Define template
$GLOBALS['xoopsOption']['template_main'] = 'xcomics_showcomic.html';
// Include header of xoops
require XOOPS_ROOT_PATH . '/header.php';

if (empty($_GET['id'])) {
    redirect_header('index.php', 2, _MD_XCOMICS_NOID);
}

// I'm not familiar to mysql, so this may look to overkill protection......
if (!get_magic_quotes_gpc()) {
    $id = addslashes($_GET['id']);
} else {
    $id = $_GET['id'];
}

if (!preg_match('/^([0-9]+)$/', $id)) {
    redirect_header('index.php', 2, _MD_XCOMICS_INID);
}

if ('0' == $xoopsModuleConfig['i_agree']) {
    redirect_header('index.php', 2, _MD_XCOMICS_AGREE);
}

// Select the comic, and dump it!
$query1 = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('xcomics') . ' WHERE `active` = 1 AND `id` = ' . $id);

// Do we got anything selected?
if (1 != $xoopsDB->getRowsNum($query1)) {
    redirect_header('index.php', 3, _MD_XCOMICS_NOFOUND);
}

$comic = [];
$comic = $xoopsDB->fetchArray($query1);

/**
 * Include xComics class &
 * load it
 */
require __DIR__ . '/include/functions.php';
$dumppro = new xComics();

/**
 * Remove chars that are
 * illegal in filenames...
 */
$comic_name = str_replace(' ', '_', $comic['name']);
$comic_name = preg_replace('[^a-zA-Z0-9@_]', '', $comic_name);

/**
 * This is a temporary solution
 * and should be replaced...
 */
$guess_gif = XOOPS_ROOT_PATH . '/uploads/xComics/' . $comic_name . '.gif';
$guess2_gif = XOOPS_URL . '/uploads/xComics/' . $comic_name . '.gif';
$guess_jpg = XOOPS_ROOT_PATH . '/uploads/xComics/' . $comic_name . '.jpg';
$guess2_jpg = XOOPS_URL . '/uploads/xComics/' . $comic_name . '.jpg';

if (!$dumppro->is_it_old($guess_gif, $xoopsModuleConfig['howlong_bdia'])) {
    $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

    $vervanging = [$guess2_gif, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

    $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
} elseif (!$dumppro->is_it_old($guess_jpg, $xoopsModuleConfig['howlong_bdia'])) {
    $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

    $vervanging = [$guess2_jpg, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

    $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
} else {
    // Open buffer

    ob_start();

    // Execute Code, but first replace some things...

    $comic['xcode'] = haakjes('toonhaakjes', $comic['xcode']);

    $bout = eval($comic['xcode']);

    // Check or $url_to_image is set, or not...

    if (empty($url_to_image)) {
        // Get the buffer and dump into $xcode... Cool huh?

        $comic['xcode'] = ob_get_contents();
    } else {
        if ('No' == $xoopsModuleConfig['force_dump'] || mb_stristr($url_to_image, XOOPS_URL)) {
            // Well, $url_to_image has been set... Prefer that to be fair... :)

            $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

            $vervanging = [$url_to_image, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

            $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
        } else {
            // All possible path:

            // Ackbarr helped me with this one... Thx

            $extension = str_replace('http://', '', $url_to_image);

            $extension = explode('.', $extension);

            $extension = array_pop($extension);

            $root_image = XOOPS_ROOT_PATH . '/uploads/xComics/' . $comic_name . '.' . $extension;

            $urltoimage = XOOPS_URL . '/uploads/xComics/' . $comic_name . '.' . $extension;

            // Check or the file should be written or doesn't exists

            if ($dumppro->is_it_old($root_image, $xoopsModuleConfig['howlong_bdia'])) {
                if ($dumppro->dump_image($url_to_image, $root_image)) {
                    $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                    $vervanging = [$urltoimage, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                    $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
                } else {
                    $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                    $vervanging = [$url_to_image, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                    $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
                }
            } else {
                // The file exists and is not old enough to dump a new one, server will love this :)

                $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                $vervanging = [$urltoimage, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig['url_to_image']);
            }
        }
    }

    // Although this code is not too heavy, going to unset some things...

    unset($oorspronkelijk);

    unset($vervanging);

    unset($dumppro);

    // Delete the buffer

    ob_end_clean();
}

// Select the list of comics, and dump them in a variable...
$query2 = $xoopsDB->query('SELECT id, name FROM ' . $xoopsDB->prefix('xcomics') . ' WHERE `active` = 1 ORDER BY `' . $xoopsModuleConfig['sort_by'] . '` ' . $xoopsModuleConfig['asc_desc'] . '');

$lijst_comics = [];
while (false !== ($lijst = $xoopsDB->fetchArray($query2))) {
    $lijst_comics[] = $lijst;
}

// Assign what has to go to templates... OVERLOAD[Should get optimised...]
$xoopsTpl->assign('lijst_comics', $lijst_comics);
$xoopsTpl->assign('active_id', $id);
$xoopsTpl->assign('comic', $comic);
$xoopsTpl->assign('year', date('Y'));

// Language:
$xoopsTpl->assign('lang_auto', _MD_XCOMICS_AUTO);

// Include footer...
require XOOPS_ROOT_PATH . '/footer.php';
