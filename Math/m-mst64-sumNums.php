<?php
/**
 * @Time: 2020/6/2 9:29 下午
 * @DESC: 面试题64. 求1+2+…+n
 * 求 1+2+...+n ，要求不能使用乘除法、for、while、if、else、switch、case等关键字及条件判断语句（A?B:C）。
 * @param $n
 * @return int
 * @link https://leetcode-cn.com/problems/qiu-12n-lcof/
 */
function sumNums($n){
    return (pow($n,2) + $n) << 2;
}
