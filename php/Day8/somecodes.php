<!-- $a & $b 	And 	Bits that are set in both $a and $b are set.
$a | $b 	Or (inclusive or) 	Bits that are set in either $a or $b are set.
$a ^ $b 	Xor (exclusive or) 	Bits that are set in $a or $b but not both are set.
~ $a 	Not 	Bits that are set in $a are not set, and vice versa.
$a << $b 	Shift left 	Shift the bits of $a $b steps to the left (each step means "multiply by two")
$a >> $b 	Shift right 	Shift the bits of $a $b steps to the right (each step means "divide by two") 

$a and $b 	And 	true if both $a and $b are true.
$a or $b 	Or 	true if either $a or $b is true.
$a xor $b 	Xor 	true if either $a or $b is true, but not both.
! $a 	Not 	true if $a is not true.
$a && $b 	And 	true if both $a and $b are true.
$a || $b 	Or 	true if either $a or $b is true. -->

<?php
//123 -> x
echo "<br> x = ".$x = 123;
//456 -> y
echo "<br> y = ".$y = 456;
//x AND y -> d
echo "<br> d = ".$d = $x & $y;
//x OR y -> e
echo "<br> e = ".$e = $x | $y; 
//x LSHIFT 2 -> f
echo "<br> f =".$f = $x<<2; 
//y RSHIFT 2 -> g
echo "<br> g =".$g = $y>>2;
//NOT x -> h
echo "<br> h = ".$h = ~ $x + 65536;
//NOT y -> i
echo "<br> i = ".$i = ~ $y + 65536;
echo "<br>";
echo $test = ~'lk' + 65536;
?>