<?php
// $Id: modinfo.php,v 1.1 2006/03/10 18:33:06 mikhail Exp $
// Define language constants for options...
define('_MI_XCOMICS_TITLE1', 'Agreement');
define('_MI_XCOMICS_DESC1', 'You <b>have</b> to agree with the Terms Of Use before you may use this module!');
define('_MI_XCOMICS_TITLE3', 'Sort by');
define('_MI_XCOMICS_DESC3', 'By what do we have to sort the list of comics?');
define('_MI_XCOMICS_OPTIONS3_ID', 'Sort by "ID"');
define('_MI_XCOMICS_OPTIONS3_ORDER', 'Sort by "Order"');
define('_MI_XCOMICS_OPTIONS3_NAME', 'Sort by "Name"');
define('_MI_XCOMICS_TITLE5', 'Output IMG');
define('_MI_XCOMICS_DESC5', 'Most of the default comics do output the url to $url_to_image, how to form it?<br><br><small><i>The following tags are available:</i><br>[<{$comic_name}>, <{$comic_url}>, <{$comic_id}>, <{$comic_author}> and <{$comic_archive}>]</small>');
define('_MI_XCOMICS_TITLE6', 'Force a dump');
define('_MI_XCOMICS_DESC6', 'Should the module force every comic, that uses the $url_to_image method, to dump the comic to your server?');
define('_MI_XCOMICS_TITLE7', 'Lifetime');
define('_MI_XCOMICS_DESC7', 'If yes, after how long should the comic be downloaded again to your server?');
define('_MI_XCOMICS_OPTIONS7_HOUR2', '02 Hours');
define('_MI_XCOMICS_OPTIONS7_HOUR5', '05 Hours');
define('_MI_XCOMICS_OPTIONS7_HOUR10', '10 Hours');
define('_MI_XCOMICS_OPTIONS7_HOUR24', '1 Day');
// This is for things that doesn't get an name
define('_MI_XCOMICS_EMPTY', '');
// Terms Of Use - Who wants to translate that... ;)
define(
    '_MI_XCOMICS_TOU',
    'PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS MODULE.
==================================================================
By using this module, you acknowledge your agreement to be bound
by these terms of use. If you do not agree to be bound by these
terms of use, please do not use the module.
Ownership and Reproduction of Materials. The contents of the
comics (the \'Materials\') may be subject to copyright licences,
and may therefore not be copied, reproduced, republished, uploaded,
posted, transmitted, or distributed, in whole or in part, for any
purpose other than individual viewing on t he original web site,
without the express prior written consent of the publisher. This
means that use of any Materials on any other web site or networked
computer environment may be prohibited.
Use of any Materials on your website by utilising this module must
be preceded by aknowledging the copyright licence to which the
Materials are subject to.
The author of this module and the parties distributing this module
are in no way responsible for illegal use of any Materials.'
);
