<?php

require 'h-992-subarraysWithKDistinct.php';

$start_time = microtime(true);
#------------------------- test start ----------------------------
$X = [2,2,1,2,2,2,1,1];
$X = [1,2,1,2,3];
$Y = 2;
$X = [1,2,1,3,4];
$Y = 3;
$data = subarraysWithKDistinct($X,$Y);
var_dump($data);

#------------------------- test end ------------------------------
$end_time = microtime(true);//获取程序执行结束的时间
$total = $end_time - $start_time;   //计算差值
var_dump($total);