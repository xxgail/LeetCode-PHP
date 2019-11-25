<?php

require 'm-991-brokenCalc.php';

$start_time = microtime(true);
#------------------------- test start ----------------------------
$X = 1;
$Y = 1000000000;
$data = brokenCalc($X,$Y);
var_dump($data);

#------------------------- test end ------------------------------
$end_time = microtime(true);//获取程序执行结束的时间
$total = $end_time - $start_time;   //计算差值
var_dump($total);