<?php
// $Id: modinfo.php,v 1.1 2004/11/04 14:47:18 mikhail Exp $

// Define language constants for options...
define('_MI_XCOMICS_TITLE1', 'Disclaimer');
define('_MI_XCOMICS_DESC1', 'Je moet akkoord gaan met deze disclaimer voordat je gebruik mag maken van deze module!');
define('_MI_XCOMICS_TITLE3', 'Sorteer volgens');
define('_MI_XCOMICS_DESC3', 'Hoe moeten we de lijst van comics sorteren?');
define('_MI_XCOMICS_OPTIONS3_ID', 'Sorteer volgens "ID"');
define('_MI_XCOMICS_OPTIONS3_ORDER', 'Sorteer volgens "Order"');
define('_MI_XCOMICS_OPTIONS3_NAME', 'Sorteer volgens "Name"');
define('_MI_XCOMICS_TITLE5', 'Output IMG');
define(
    '_MI_XCOMICS_DESC5',
    'Het overgrote deel van de standaard voert de url van prentje uit naar $url_to_image, wat moeten we er van maken?<br><br><small><i>De volgende labels zijn beschikbaar:</i><br>[<{$comic_name}>, <{$comic_url}>, <{$comic_id}>, <{$comic_author}>, <{$comic_archive}>]</small>'
);
define('_MI_XCOMICS_TITLE6', 'Forceer het kopiëren');
define('_MI_XCOMICS_DESC6', 'Moet de module van elke comic, dat de $url_to_image methode gebruikt, een lokaal kopie van de comic maken?');
define('_MI_XCOMICS_TITLE7', 'Overlevings Tijd');
define('_MI_XCOMICS_DESC7', 'Indien ja, na hoeveel tijd zou het kopie gewist moeten worden en opnieuw gedownload moeten worden');
define('_MI_XCOMICS_OPTIONS7_HOUR2', '02 Uren');
define('_MI_XCOMICS_OPTIONS7_HOUR5', '05 Uren');
define('_MI_XCOMICS_OPTIONS7_HOUR10', '10 Uren');
define('_MI_XCOMICS_OPTIONS7_HOUR24', '1 Dag');

// This is for things that doesn't get an name
define('_MI_XCOMICS_EMPTY', '');

// Terms Of Use - Who wants to translate that... ;)
define(
    '_MI_XCOMICS_TOU',
    'PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS MODULE.
==================================================================
By using this module, you acknowledge your  agreement to be  bound
by these terms of use. If you do not agree  to  be bound  by these
terms of use, please do not use the module.

Ownership and  Reproduction  of  Materials.  The contents  of  the
comics  (the \'Materials\') may  be  subject to  copyright licences,
and may therefore not be copied, reproduced, republished, uploaded,
posted,  transmitted, or distributed, in whole or in part, for any
purpose  other than individual viewing  on t he original web site,
without  the  express prior written consent of the publisher. This
means that use of any Materials on any other web site or networked
computer environment may be prohibited.

Use of any Materials on your website by utilising this module must
be  preceded  by  aknowledging the copyright  licence to which the
Materials are subject to.

The author of this module and the parties distributing this module
are in no way responsible for illegal use of any Materials.'
);
