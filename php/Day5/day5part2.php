<?php
$nice = 0;
$naughty = 0;
$judacaters = 1;

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $i = 0;
        $samepair = 0;
        while ($i < strlen($line) - 1) {
             $pair = $line[$i] . $line[$i + 1];
            $howmanytimes = 0;
             $howmanytimes = substr_count($line, $pair);
           
            if ($howmanytimes >= 2)
                $samepair = 1;
            $i = $i + 1;
        }
        if ($samepair == 1)
            $judacaters = 1;
        else
            $judacaters = 0;
        
            if ($judacaters === 1 )
            {
        $sameletters = 0;
        $i = 0;
        $nexti2 = 2;
        while ($i < strlen($line)-2) {
            if ($line[$i] == $line[$nexti2])
                $sameletters = 1;
            $i = $i + 1;
            $nexti2 = $nexti2 + 1;
        }
        
        if ($sameletters == 1)
            $judacaters = 1;
        else
            $judacaters = 0;
        
        
        
        
        }
        if ($judacaters == 1)
            $nice = $nice + 1;
        if ($judacaters == 0)
            $naughty = $naughty + 1;
    }
    fclose($handle);
    echo "<br>";
    echo "No. of Nice = " . $nice;
    echo "<br>";
    echo "No. of Naughty = " . $naughty;
}
