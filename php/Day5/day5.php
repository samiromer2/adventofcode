<?php
$nice = 0;
$naughty = 0;
$judacaters = 1;
$not_contains = array('ab', 'cd', 'pq', 'xy');
$vowels = array('a', 'e', 'i', 'o', 'u');
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $i = 0;
        $found = 0;
        while ($i < strlen($line)) {
            foreach ($vowels as $vowel) {
                //if (strstr($string, $url)) { 
                if ($line[$i] == $vowel)
                    $found = $found + 1;
            }
            $i = $i + 1;
        }
        if ($found >= 3)
            $judacaters = 1;
        else
            $judacaters = 0;

        if ($judacaters !== 0) {
            $sameletters = 0;
            $oldi = 0;
            $i = 1;
            while ($i < strlen($line)) {
                if ($line[$i] == $line[$oldi])
                    $sameletters = 1;
                $i = $i + 1;
                $oldi = $oldi + 1;
            }

            if ($sameletters == 1)
                $judacaters = 1;
            else
                $judacaters = 0;
        }
        if ($judacaters !== 0) {
            foreach ($not_contains as $not_contain) {
                //if (strstr($string, $url)) { 
                if (strpos($line, $not_contain) !== FALSE)
                    $judacaters = 0;
            }
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
