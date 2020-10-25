<?php
// $Id: datetime.php,v 1.1 2006/03/18 20:44:28 mikhail Exp $
//--------------------------------------------
// Fixing and defining the date's
//--------------------------------------------
// if the day is 22 july 2005
// yearfix  results: 2005
// yearfix2 results: 03
// monthfix results: 07
// dayfix   results: 21

// The normal ones first
$monthnormal = date('m');
$yearnormal = date('Y');
$yearnormal2 = date('y');
$daynormal = date('d');

$yearfix = date('Y');
$yearfix2 = date('y');
if ('1' != date('d') && '1' != date('m')) {
    $monthfix = date('m');

    $dayfix = date('d') - 1;

    if ($dayfix <= 9) {
        $dayfix = '0' . $dayfix;
    }
}
if ('1' == date('d') && '1' == date('m')) {
    $yearfix = date('Y') - 1;

    $yearfix2 = date('y') - 1;

    if ($yearfix2 <= 9) {
        $yearfix2 = '0' . $yearfix2;
    }

    $monthfix = '12';

    $dayfix = '31';
}
if ('1' == date('d') && '1' != date('m')) {
    $monthfix = date('m') - 1;

    if ($monthfix <= 9) {
        $monthfix = '0' . $monthfix;
    }

    if ('02' == $monthfix) {
        $dayfix = '28';
    } elseif ('01' == $monthfix or '03' or '05' or '07' or '08' or '10' or '12') {
        $dayfix = '31';
    } else {
        $dayfix = '30';
    }
}
if ('1' != date('d') && '1' == date('m')) {
    $monthfix = date('m');

    $dayfix = date('d') - 1;

    if ($dayfix <= 9) {
        $dayfix = '0' . $dayfix;
    }
}
