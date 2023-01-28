<?php 

// If your secret key is abcdef, the answer is 609043, because the MD5 hash of abcdef609043 starts with five zeroes (000001dbbfa...), and it is the lowest such number to do so.

$input = 'yzbqklnj';
$allgood = 0;
//$i = 0;
$i = 0;
//$i = 141991;
while ($allgood == 0)
{
$input = $input .$i;
$output = md5($input);
// echo $output = hash_hmac('md5', $input, $secretKey);

if (strpos($output, '00000') === 0) {
    $allgood = 1;
 }
    echo $i;
	echo " ";
    $i++;
}
echo $i-1;
// echo "<br>";

// echo  dechex($output);
