<?php
ini_set('memory_limit', '800M');
/*

Each square on the grid is allocated in a spiral pattern starting at a location marked 1 and then counting up while spiraling outward. For example, the first few squares are allocated like this:

17  16  15  14  13
18   5   4   3  12
19   6   1   2  11
20   7   8   9  10
21  22  23---> ...

While this is very space-efficient (no squares are skipped), requested data must be carried back to square 1 (the location of the only access port for this memory system) by programs that can only move up, down, left, or right. They always take the shortest path: the Manhattan Distance between the location of the data and square 1.

For example:

Data from square 1 is carried 0 steps, since it's at the access port.
Data from square 12 is carried 3 steps, such as: down, left, left.
Data from square 23 is carried only 2 steps: up twice.
Data from square 1024 must be carried 31 steps.

How many steps are required to carry the data from the square identified in your puzzle input all the way to the access port?
1 8 16 24

First change here
 */
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
