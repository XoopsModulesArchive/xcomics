<?php
// $Id: xcomics_blocks.php,v 1.2 2006/03/21 07:25:11 mikhail Exp $
// ------------------------------------------------------------------------- //
//               Xoops: Content Management System                           //
//                       < http://xoopscube.org >                          //
// ---------------------------------------------------------------------- //
// Author: Jan304														 //
// Author Email : jan304@pandora.be 									//
// Author website: http://www.jan304.org							   //
// ------------------------------------------------------------------ //

/*********************************/
// Starting the function that
// creates the block.
/*********************************/
function xcomics_show($options)
{
    /**
     * Import database in function
     */ global $xoopsDB, $xoopsConfig;

    /**
     * Enabling all errors, this can be
     * commented out safely
     */ // error_reporting (E_ALL);

    /**
     * Load module handler... :)
     */

    $moduleHandler2 = xoops_getHandler('module');

    $xoopsModule2 = $moduleHandler2->getByDirname('xcomics');

    // Thx to Kazu for explaining me how this thing works...

    // Load the config handler, for then loading the configs from the xcomics module... :)

    $configHandler2 = xoops_getHandler('config');

    $xoopsModuleConfig2 = &$configHandler2->getConfigsByCat(0, $xoopsModule2->getVar('mid'));

    /**
     * // Include some functions
     */

    require XOOPS_ROOT_PATH . '/modules/xcomics/include/functions.php';

    $dumppro = new xComics();

    /**
     * Is there actually
     * a comic selected?
     */

    if ('0' == $options[0] || '00' == $options[0]) {
        $comic['xcode'] = '' . _MB_XCOMICS_NOSELECTED . '';

        $comic['copyright_url'] = XOOPS_URL;

        $comic['copyright_name'] = htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES);

        $comic['year'] = date('Y');

        return $comic;
    }

    /**
     * Starting to check what comic
     * the user has selected.
     */

    $query = $xoopsDB->query('SELECT * FROM ' . $xoopsDB->prefix('xcomics') . ' WHERE `id` = ' . $options[0]);

    /**
     * Do we got anything selected?
     */

    if (1 != ($xoopsDB->getRowsNum($query))) {
        $comic['xcode'] = _MB_XCOMICS_NOFOUND;

        $comic['copyright_url'] = XOOPS_URL;

        $comic['copyright_name'] = htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES);

        $comic['year'] = date('Y');

        return $comic;
    }

    /**
     * Yes, we got something selected,
     * lets dump it to an var... :)
     */

    $comic = $xoopsDB->fetchArray($query);

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

    if (!$dumppro->is_it_old($guess_gif, $xoopsModuleConfig2['howlong_bdia'])) {
        $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

        $vervanging = [$guess2_gif, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

        $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
    } elseif (!$dumppro->is_it_old($guess_jpg, $xoopsModuleConfig2['howlong_bdia'])) {
        $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

        $vervanging = [$guess2_jpg, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

        $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
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
            if ('No' == $xoopsModuleConfig2['force_dump'] || mb_stristr($url_to_image, XOOPS_URL)) {
                // Well, $url_to_image has been set... Prefer that to be fair... :)

                $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                $vervanging = [$url_to_image, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
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

                        $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
                    } else {
                        $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                        $vervanging = [$url_to_image, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                        $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
                    }
                } else {
                    // The file exists and is not old enough to dump a new one, server will love this :)

                    $oorspronkelijk = ['<{$comic_url}>', '<{$comic_name}>', '<{$comic_id}>', '<{$comic_author}>', '<{$comic_archive}>'];

                    $vervanging = [$urltoimage, str_replace("'", '&#039;', $comic['name']), $comic['id'], $comic['copyright_name'], $comic['copyright_url']];

                    $comic['xcode'] = str_replace($oorspronkelijk, $vervanging, $xoopsModuleConfig2['url_to_image']);
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

    /**
     * Output year for copyright notice
     */

    $comic['year'] = date('Y');

    return $comic;
}

/*********************************/
// The function that lists the
// block options.
/*********************************/
function xcomics_edit($options)
{
    global $xoopsDB;

    /*********************************/ // Select the list of comics, and

    // dump them in a variable...

    /*********************************/

    $result = $xoopsDB->query('SELECT `id`, `name` FROM ' . $xoopsDB->prefix('xcomics') . ' ORDER BY `id` ASC');

    $form = _MB_XCOMICS_CHOOSE . ':<br>';

    $form .= "<select name='options[0]'>\n\n";

    $form .= "<option value='0'>" . _MB_XCOMICS_NOSELECTED . "</option>\n";

    if (0 == ($xoopsDB->getRowsNum($result))) {
        $form .= "<option value='00' selected='selected'>" . _MB_XCOMICS_NOCFOUND . "</option>\n";
    }

    while (list($comic_id, $comic_name) = $xoopsDB->fetchRow($result)) {
        if ($options[0] == $comic_id) {
            $form .= "<option value='" . $comic_id . "' selected='selected'>- " . addslashes($comic_name) . "</option>\n";
        } else {
            $form .= "<option value='" . $comic_id . "'>- " . addslashes($comic_name) . "</option>\n";
        }
    }

    $form .= "\n</select>\n";

    $form .= '<br><ul><li>' . _MB_XCOMICS_UAGREE . '</li>';

    $form .= '<li>' . _MB_XCOMICS_SETCACHE . '</li></ul>';

    return $form;
}
?>
