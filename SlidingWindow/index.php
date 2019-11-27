<?php

require 'm-567-checkInclusion.php';

$start_time = microtime(true);
#------------------------- test start ----------------------------

$s1= "ab";
$s2 = "eidbaoo";
$data = checkInclusion($s1,$s2);
var_dump($data);

#------------------------- test end ------------------------------
$end_time = microtime(true);//获取程序执行结束的时间
$total = $end_time - $start_time;   //计算差值
var_dump($total);