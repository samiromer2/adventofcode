<?php
$totalofthesqual=0;
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        list($l, $w, $h) = explode("x", $line);
        $sq1 = $l*$w;
        $sq2 = $w*$h;
        $sq3 = $h*$l;
        $min=$sq1;
        if ($min>$sq2)
        $min=$sq2;
        if ($min>$sq3)
        $min=$sq3;
        $totalofsq = 2*$l*$w + 2*$w*$h + 2*$h*$l;
        $totalofsq+=$min;
        $totalofthesqual+=$totalofsq;
        
    }

    fclose($handle);
    echo $totalofthesqual;
}