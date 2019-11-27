<?php

require 'm-318-maxProduct.php';

$start_time = microtime(true);
#------------------------- test start ----------------------------
$words = ["abcw","baz","foo","bar","xtfn","abcdef"];
//$words =  ["a","ab","abc","d","cd","bcd","abcd"];
//$words =  ["a","aa","aaa","aaaa"];
$data = maxProduct($words);
var_dump($data);

//$data = array_intersect(['a','b','c'],['f','o']) ? false : true;
//var_dump($data);

#------------------------- test end ------------------------------
$end_time = microtime(true);//获取程序执行结束的时间
$total = $end_time - $start_time;   //计算差值
var_dump($total);