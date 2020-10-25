<?php
// $Id: xoops_version.php,v 1.2 2006/03/21 07:25:12 mikhail Exp $
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

$modversion['name'] = 'xComics';
$modversion['version'] = '2.0 RC1';
$modversion['description'] = 'Comic module';
$modversion['credits'] = 'The XOOPS Project';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'slogo.png';
$modversion['dirname'] = 'xcomics';
$modversion['author'] = 'Jan304 - http://www.jan304.org';

// Admin
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Menu
$modversion['hasMain'] = 1;

// Sql file (must contain sql generated by phpMyAdmin or phpPgAdmin)
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'xcomics';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Templates
$modversion['templates'][1]['file'] = 'xcomics_index.html';
$modversion['templates'][1]['description'] = 'The template file of the index file';
$modversion['templates'][2]['file'] = 'xcomics_showcomic.html';
$modversion['templates'][2]['description'] = 'The template file of the table of the comics.';
$modversion['templates'][3]['file'] = 'xcomics_comic.html';
$modversion['templates'][3]['description'] = 'The comic itself.';
$modversion['templates'][4]['file'] = 'xcomics_dynamicmenu.html';
$modversion['templates'][4]['description'] = 'The dynamic menu.';

// Blocks
$modversion['blocks'][1]['file'] = 'xcomics_blocks.php';
$modversion['blocks'][1]['name'] = 'xComics';
$modversion['blocks'][1]['description'] = 'Shows a comic in a blok';
$modversion['blocks'][1]['show_func'] = 'xcomics_show';
$modversion['blocks'][1]['edit_func'] = 'xcomics_edit';
$modversion['blocks'][1]['options'] = '0';
$modversion['blocks'][1]['template'] = 'xcomics_daily.html';

// Config settings:
$modversion['config'][1]['name'] = 'i_agree';
$modversion['config'][1]['title'] = '_MI_XCOMICS_TITLE1';
$modversion['config'][1]['description'] = '_MI_XCOMICS_DESC1';
$modversion['config'][1]['formtype'] = 'yesno';
$modversion['config'][1]['valuetype'] = 'int';
$modversion['config'][1]['default'] = 0;

$modversion['config'][2]['name'] = 'terms_of_use';
$modversion['config'][2]['title'] = '_MI_XCOMICS_EMPTY';
$modversion['config'][2]['description'] = '_MI_XCOMICS_EMPTY';
$modversion['config'][2]['formtype'] = 'textarea';
$modversion['config'][2]['valuetype'] = 'text';
$modversion['config'][2]['default'] = _MI_XCOMICS_TOU;

$modversion['config'][3]['name'] = 'sort_by';
$modversion['config'][3]['title'] = '_MI_XCOMICS_TITLE3';
$modversion['config'][3]['description'] = '_MI_XCOMICS_DESC3';
$modversion['config'][3]['formtype'] = 'select';
$modversion['config'][3]['valuetype'] = 'text';
$modversion['config'][3]['default'] = 'name';
$modversion['config'][3]['options'] = ['_MI_XCOMICS_OPTIONS3_ID' => 'id', '_MI_XCOMICS_OPTIONS3_ORDER' => 'order', '_MI_XCOMICS_OPTIONS3_NAME' => 'name'];

$modversion['config'][4]['name'] = 'asc_desc';
$modversion['config'][4]['title'] = '_MI_XCOMICS_EMPTY';
$modversion['config'][4]['description'] = '_MI_XCOMICS_EMPTY';
$modversion['config'][4]['formtype'] = 'select';
$modversion['config'][4]['valuetype'] = 'text';
$modversion['config'][4]['default'] = 'ASC';
$modversion['config'][4]['options'] = ['_ASCENDING' => 'ASC', '_DESCENDING' => 'DESC'];

$modversion['config'][5]['name'] = 'url_to_image';
$modversion['config'][5]['title'] = '_MI_XCOMICS_TITLE5';
$modversion['config'][5]['description'] = '_MI_XCOMICS_DESC5';
$modversion['config'][5]['formtype'] = 'textbox';
$modversion['config'][5]['valuetype'] = 'text';
$modversion['config'][5]['default'] = '<img src=\'<{$comic_url}>\' alt=\'Comic: <{$comic_name}>\'>';

$modversion['config'][6]['name'] = 'force_dump';
$modversion['config'][6]['title'] = '_MI_XCOMICS_TITLE6';
$modversion['config'][6]['description'] = '_MI_XCOMICS_DESC6';
$modversion['config'][6]['formtype'] = 'select';
$modversion['config'][6]['valuetype'] = 'text';
$modversion['config'][6]['default'] = 'Yes';
$modversion['config'][6]['options'] = ['_YES' => 'Yes', '_NO' => 'No'];

$modversion['config'][7]['name'] = 'howlong_bdia'; // Expl: before dumping image again
$modversion['config'][7]['title'] = '_MI_XCOMICS_TITLE7';
$modversion['config'][7]['description'] = '_MI_XCOMICS_DESC7';
$modversion['config'][7]['formtype'] = 'select';
$modversion['config'][7]['valuetype'] = 'text';
$modversion['config'][7]['default'] = '86400';
$modversion['config'][7]['options'] = ['_MI_XCOMICS_OPTIONS7_HOUR2' => '7200', '_MI_XCOMICS_OPTIONS7_HOUR5' => '18000', '_MI_XCOMICS_OPTIONS7_HOUR10' => '36000', '_MI_XCOMICS_OPTIONS7_HOUR24' => '86400'];
