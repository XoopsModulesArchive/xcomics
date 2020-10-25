<?php
// $Id: index.php,v 1.2 2006/03/21 07:25:12 mikhail Exp $
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
include '../../mainfile.php';
// Define template
$GLOBALS['xoopsOption']['template_main'] = 'xcomics_index.html';
// Include header of xoops
require XOOPS_ROOT_PATH . '/header.php';

// Select the list of comics, and dump them in a variable...
$query1 = $xoopsDB->query('SELECT id, name FROM ' . $xoopsDB->prefix('xcomics') . ' WHERE `active` = 1 ORDER BY `' . $xoopsModuleConfig['sort_by'] . '` ' . $xoopsModuleConfig['asc_desc'] . ';');

$lijst_comics = [];

while (false !== ($lijst = $xoopsDB->fetchArray($query1))) {
    $lijst_comics[] = $lijst;
}

// The list of comics
$xoopsTpl->assign('lijst_comics', $lijst_comics);
// Language constants...
$xoopsTpl->assign('lang_choose', _MD_XCOMICS_CHOOSE . ':');

require XOOPS_ROOT_PATH . '/footer.php';
