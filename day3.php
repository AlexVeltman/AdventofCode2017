<?php
ini_set('memory_limit', '800M');

$buildsqare = array();

$maxArea = 325489;

$zz           = 0;
$boxSize      = 1;
$patternCount = 0;
$incramentUp  = false;
$pos          = 1;
for ($i = 1; $i <= $maxArea; $i++) {
    $buildsqare[$zz][] = array($i => $patternCount);
    $boxSize           = $zz * 8;
    $ClFl              = $boxSize / 8;
    $sideSize          = ($boxSize + 4) / 4;
    if ($pos < ($sideSize / 2) && $sideSize > 3) {
        $incramentUp = true;
        $txt         = 'first';
        if ($pos < 1) {
            $pos = $sideSize - 1;
        }
    } elseif ($pos < 1) {
        $pos         = $sideSize - 1;
        $incramentUp = false;
    } elseif ($pos - 1 > ($sideSize / 2)) {
        $incramentUp = false;
    } else {
        $incramentUp = true;
    }
    if (($pos + 1 == $sideSize || $pos == 1) && $sideSize > 3) {
        $incramentUp = false;
    }
    if ($i == 325489) {
        echo $i . ' box - ' . $zz . ' - pos - ' . $pos . ' - sideSize  - ' . $sideSize . ' - pc ' . $patternCount . ' - boxCount ' . ($yy + 1) . ' - ClFl - ' . $ClFl . ' - incramentUp - ' . (int) $incramentUp . ' ' . $txt . '<br />';
    }

    $yy++;
    if ($i == 1) {
        $zz++;
        echo '<br />';
        $patternCount++;
        $yy          = 0;
        $incramentUp = true;
    } elseif ($boxSize <= $yy) {
        $zz++;
        echo '<br />';
        $yy = 0;
        $patternCount++;
        $incramentUp = false;
        $nextBoxSize = $zz * 8;
        $sideSize    = ($nextBoxSize + 4) / 4;
        $pos         = $sideSize - 1;
    } else {
        if ($incramentUp == true) {
            $patternCount++;
            $pos--;
        } else {
            $patternCount--;
            $pos--;
        }
    }
}
