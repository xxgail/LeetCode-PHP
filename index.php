<?php
include 'PHPArr/function.php';
require 'PHPStr/function.php';

//$data = constructArray(5,4);
//$data = singleNumber([2,2,1,3,3,4,4]);
//$data = heightChecker([1,2,1,2,1,1,1,2,1]);
//$data = reverseWords("the sky is blue");
//$data = restoreIpAddresses('999');
//$data = numRabbits([10,10,10]);
//$data = plusOne([9,9,9]);
$a =  "11";
$b = "1";
$data = addBinary($a,$b);

//$haystack = 'hello';
//$needle = 'lwl';
//$data = strStrTest($haystack,$needle);

$data = longestCommonPrefix([1]);
$data = twoSum([1,2,3,4,4,9,56,90],8);
print_r($data);

