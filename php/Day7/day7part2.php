<?php
/*here to init the 1000x1000 grid*/
function checkin($values, $keytofind)
{
    foreach ($values as $key => $value) {
        if ($key == $keytofind)
            return (1);
    }
    return (0);
}
function doing($id1, $op, $id2)
{
    if ($op == 'RSHIFT')
        return ($id1 >> $id2);
    if ($op == 'LSHIFT')
        return ($id1 << $id2);
    if ($op == 'OR')
        return ($id1 | $id2);
    if ($op == 'AND')
        return ($id1 & $id2);
}
$values = [];
$valuessize = [];
$not_contains = array('RSHIFT', 'OR', 'LSHIFT', 'AND');
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        list($part1, $wheregone) = explode("->", $line);
        $wheregone = trim($wheregone);
        $valuessize[$wheregone] = 0;
    }
    fclose($handle);
}
$f = sizeof($valuessize);
$f2ndtime = $f;
loopforce:
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        list($part1, $wheregone) = explode("->", $line);
        //echo $line."<br>";
        $wheregone = trim($wheregone);
        /* check so if its 3 ops item and item */
        $worked = 0;
        foreach ($not_contains as $not_contain) {
            if (strpos($line, $not_contain) !== FALSE) {
                list($identifider1, $op, $identifider2) = explode(" ", $part1);
                $op = trim($op);
                $identifider1 = trim($identifider1);
                $identifider2 = trim($identifider2);
                /*if letter and or shift letter & value*/
                if (checkin($values, $identifider1) == 1 && $identifider2 == intval($identifider2)) {
                    $values[$wheregone] = doing($values[$identifider1], $op, $identifider2);
                }
                if (checkin($values, $identifider2) == 1 && $identifider1 == intval($identifider1)) {
                    $values[$wheregone] = doing($identifider1, $op, $values[$identifider2]);
                }
                /* here if its and or shift letter & letter*/
                if (checkin($values, $identifider1) == 1 && checkin($values, $identifider2) == 1)
                    $values[$wheregone] = doing($values[$identifider1], $op, $values[$identifider2]);
                $worked = 1;
            }
        }
        /* not or just a number */
        if ($worked == 0) {
            $word = "NOT";
            if (strpos($part1, $word) !== false) {
                list($op, $whatfrom) = explode(" ", $part1);
                $whatfrom = trim($whatfrom);
                if (checkin($values, $whatfrom) == 1)
                    $values[$wheregone] = ~($values[$whatfrom]) + 65536;
                $worked = 1;
            }
            /*here to checks if its an assignmenting to a number*/
            list($partfirst) = explode(" ", $part1);
            if (intval($part1) == ($partfirst)) {
                $values[$wheregone] = intval($part1);
                $worked = 1;
            }
        }
        if ($worked == 0) {
            $part1 = trim($part1);
            if (checkin($values, $part1) == 1) {
                $values[$wheregone] = $values[$part1];
                $worked = 1;
            }
        }
    }
    fclose($handle);
}
$f = $f - 1;
if ($f >= 0)
    goto loopforce;
print_r($values['a']);
echo "<br>";

$values2nd = [];
$values2nd['b'] = trim($values['a']);
loopforce2ndtime:
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        list($part1, $wheregone) = explode("->", $line);
        //echo $line."<br>";
        $wheregone = trim($wheregone);
        if ($wheregone == 'b')
            goto skipb;
        /* check so if its 3 ops item and item */
        $worked = 0;
        foreach ($not_contains as $not_contain) {
            if (strpos($line, $not_contain) !== FALSE) {
                list($identifider1, $op, $identifider2) = explode(" ", $part1);
                $op = trim($op);
                $identifider1 = trim($identifider1);
                $identifider2 = trim($identifider2);
                /*if letter and or shift letter & value*/
                if (checkin($values2nd, $identifider1) == 1 && $identifider2 == intval($identifider2)) {
                    $values2nd[$wheregone] = doing($values2nd[$identifider1], $op, $identifider2);
                }
                if (checkin($values2nd, $identifider2) == 1 && $identifider1 == intval($identifider1)) {
                    $values2nd[$wheregone] = doing($identifider1, $op, $values2nd[$identifider2]);
                }
                /* here if its and or shift letter & letter*/
                if (checkin($values2nd, $identifider1) == 1 && checkin($values2nd, $identifider2) == 1)
                    $values2nd[$wheregone] = doing($values2nd[$identifider1], $op, $values2nd[$identifider2]);
                $worked = 1;
            }
        }
        /* not or just a number */
        if ($worked == 0) {
            $word = "NOT";
            if (strpos($part1, $word) !== false) {
                list($op, $whatfrom) = explode(" ", $part1);
                $whatfrom = trim($whatfrom);
                if (checkin($values2nd, $whatfrom) == 1)
                    $values2nd[$wheregone] = ~($values2nd[$whatfrom]) + 65536;
                $worked = 1;
            }
            /*here to checks if its an assignmenting to a number*/
            list($partfirst) = explode(" ", $part1);
            if (intval($part1) == ($partfirst)) {
                $values2nd[$wheregone] = intval($part1);
                $worked = 1;
            }
        }
        if ($worked == 0) {
            $part1 = trim($part1);
            if (checkin($values2nd, $part1) == 1) {
                $values2nd[$wheregone] = $values2nd[$part1];
                $worked = 1;
            }
        }
        skipb:
    }
    fclose($handle);
}
$f2ndtime = $f2ndtime - 1;
if ($f2ndtime >= 0)
    goto loopforce2ndtime;
print_r($values2nd['a']);
//print_r($values2nd);