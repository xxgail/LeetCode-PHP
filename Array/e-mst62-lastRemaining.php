<?php
# https://leetcode-cn.com/problems/yuan-quan-zhong-zui-hou-sheng-xia-de-shu-zi-lcof/
/**
 * @Time: 2020/3/30 19:39
 * @DESC: 面试题62. 圆圈中最后剩下的数字 简单
 * 0,1,,n-1这n个数字排成一个圆圈，从数字0开始，每次从这个圆圈里删除第m个数字。
 * 求出这个圆圈里剩下的最后一个数字。
 * 例如，0、1、2、3、4这5个数字组成一个圆圈，从数字0开始每次删除第3个数字，则删除的前4个数字依次是2、0、4、1，因此最后剩下的数字是3。
 * @param $n
 * @param $m
 * @return int
 */
function lastRemaining($n,$m){
    # ----- 虽然看不懂但是通过的写法
    $res = 0;
    for($i = 2; $i <= $n; $i++){
        $res = ($res + $m) % $i;
    }
    return $res;

    # ----- 超时的写法O(n2)
//    $arr = [];
//    for ($i = 0; $i < $n; $i++){
//        $arr[] = $i;
//    }
//
//    $k = 0;
//    while ($n > 1){
//        $k = ($k + $m - 1) % $n;
//        array_splice($arr,$k,1);
//        $n--;
//    }
//    return $arr[0];
}

$n = 5;
$m = 3;
var_dump(lastRemaining($n,$m));