<?php
$light = 0;
$maxRows = 1000;
$maxCols = 1000;
$lights = [];
for ($col = 0; $col < $maxCols; $col++) {
    for ($row = 0; $row < $maxRows; $row++) {
        $lights[$col][$row] = 0;
    }
}

$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {

        list($part1, $part2) = explode("through", $line);
        $word = preg_replace('/[0-9]+/', '', $part1);
        $word = preg_replace('/ ,/', '', $word);
        $words = array('turn', 'on', 'off', 'toggle');
        $part1 = str_replace($words, '', $part1);

        list($part11, $part12) = explode(",", $part1);
        list($part21, $part22) = explode(",", $part2);

        if ($word === "toggle ") {
            $maxRows = intval($part21);
            $maxCols = intval($part22);
            for ($col = intval($part11); $col <= $maxCols; $col++) {
                for ($row = intval($part12); $row <= $maxRows; $row++) {
                    $valtochange = $lights[$col][$row];
                    if ($valtochange == 0) {
                        $newval = 1;
                    }
                    if ($valtochange == 1) {
                        $newval = 0;
                    }
                    $lights[$col][$row] = $newval;
                }
            }
        }
        if ($word === "turn off ") {
            //$lights[$col][$row] = 0;
            $maxRows = intval($part21);
            $maxCols = intval($part22);
            for ($col = intval($part11); $col <= $maxCols; $col++) {
                for ($row = intval($part12); $row <= $maxRows; $row++) {
                    $lights[$col][$row] = 0;
                }
            }
        }


        if ($word === "turn on ") {
            //$lights[$col][$row] = 0;
            $maxRows = intval($part21);
            $maxCols = intval($part22);
            for ($col = intval($part11); $col <= $maxCols; $col++) {
                for ($row = intval($part12); $row <= $maxRows; $row++) {
                    $lights[$col][$row] = 1;
                }
            }
        }
    }
    fclose($handle);
    $maxRows = 1000;
    $maxCols = 1000;
    for ($col = 0; $col < $maxCols; $col++) {
        for ($row = 0; $row < $maxRows; $row++) {
            if ($lights[$col][$row] === 1)
                $light = $light + 1;
        }
    }
}

echo "<br>";
echo $light;
echo "<br>";
