<?php
$house = 0;

$myfile = fopen("input.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while (!feof($myfile)) {
     $singlechar = fgetc($myfile);
    switch ($singlechar) {
        case '^':
            echo "north";
            break;
        case 'v':
            echo "south";
            break;
        case '>':
            echo "east";
            break;
        case '<':
            echo "west";
            break;

        default:
            echo "Weird";
            break;
    }
}
fclose($myfile);
