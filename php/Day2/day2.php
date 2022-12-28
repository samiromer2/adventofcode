<?php
$totalofthesqual=0;
$totaloftheribbon=0;
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

      
        $secondsmallest=$w;
        if ($secondsmallest>$l)
        $secondsmallest=$l;
        if ($secondsmallest>$h)
        $secondsmallest=$h;

        if ($secondsmallest == $w)
        {
        $firstsmallest=$l;
        if ($firstsmallest>$h)
            $firstsmallest=$h;
        }

        if ($secondsmallest == $l)
        {
        $firstsmallest=$w;
        if ($firstsmallest>$h)
        $firstsmallest=$h;
        }
        if ($secondsmallest == $h)
        {
        $firstsmallest=$l;
        if ($firstsmallest>$w)
        $firstsmallest=$w;
        }  
 //$h

        $dim = $secondsmallest+$secondsmallest+$firstsmallest+$firstsmallest;
        $feetofribbon= $l*$w*$h;
        $totaloftheribbon += $dim;
        $totaloftheribbon += $feetofribbon;
    }

    fclose($handle);
    echo $totalofthesqual;
    echo "<br>";
    echo $totaloftheribbon;
}