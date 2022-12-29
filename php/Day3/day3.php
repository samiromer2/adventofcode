<?php
$position      = [0, 0];
$positionrobot = [0, 0];
$counter = 0;
$visited[]="0-0";
$myfile = fopen("input.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while (!feof($myfile)) {
    $singlechar = fgetc($myfile);
    if ($counter%2 != 0) {
        switch ($singlechar) {
            case '^':
                //$position = [$position[0], $position[1] + 1];
                $position[1]=$position[1] + 1;
                break;
            case 'v':
                $position[1] =  $position[1] - 1;
                break;
            case '>':
                $position[0] = $position[0] + 1;
                break;
            case '<':
                $position[0] = $position[0] - 1;
                break;
        }
        
         $visited[] = $position[0] . "-" . $position[1];
       
    }
    if ($counter%2 == 0) {
        switch ($singlechar) {
            case '^':
                $positionrobot[1] =  intval($positionrobot[1]) + 1;
                break;
            case 'v':
                $positionrobot[1] =  intval($positionrobot[1]) - 1;
                break;
            case '>':
                $positionrobot[0] = intval($positionrobot[0]) + 1;
                break;
            case '<':
                $positionrobot[0] = intval($positionrobot[0]) - 1;
                break;
        }
         $visited[] = $positionrobot[0]."-".$positionrobot[1];
       
    }
     $counter ++;
}
fclose($myfile);
print_r($visited);
//echo "<br><br>";
$result = array_unique($visited);
//print_r($result);
echo count($result);
