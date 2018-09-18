<?php

/*
 * Patrick Bradshaw 2018, probably.
 */

function explodeKey($resultKey) {
    $hexagram1 = $resultKey;

    $isMoving = false;
    $hexagram2 = null;
    $lines = null;

    if (strpos($resultKey, ":") !== false) {
        $isMoving = true;

        $first = explode(':', $resultKey);
        $hexagram1 = $first[0];

        $second = explode('=', $first[1]);
        $hexagram2 = $second[1];

        $lines = explode(',', $second[0]);
    }

    $keyArray['isMoving'] = $isMoving;
    $keyArray['hex1'] = $hexagram1;
    $keyArray['hex2'] = $hexagram2;
    $keyArray['lines'] = $lines;

    return $keyArray;
}
