<?php
include 'PHPArr/function.php';

//$data = constructArray(5,4);
//$data = singleNumber([2,2,1,3,3,4,4]);
//$data = heightChecker([1,2,1,2,1,1,1,2,1]);
//$data = reverseWords("the sky is blue");
//$data = restoreIpAddresses('999');
//$data = numRabbits([10,10,10]);
//$data = plusOne([9,9,9]);
$a = "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101";
$b = "110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011";
$data = addBinary($a,$b);
print_r($data);

