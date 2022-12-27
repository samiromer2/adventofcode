<?php
$floor = 0;
$counterB = 0;
$firstbase = 0;
$myfile = fopen("input.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while (!feof($myfile)) {
    $counterB++;
    $singlechar = fgetc($myfile);
    if ($singlechar == '(')
        $floor++;
    if ($singlechar == ')')
        $floor--;
    if ($floor == -1 && $firstbase == 0) {
        $firstbase = $counterB;
        echo "basement ";
    }
}
fclose($myfile);
echo $floor;
echo "<br>";
echo "first basement" . $firstbase;