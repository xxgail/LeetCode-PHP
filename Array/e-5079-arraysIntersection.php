<?php

/**
 * @Time: 2019/10/8 21:11
 * @DESC: 5079.简单
 * 给出三个均为 严格递增排列 的整数数组 arr1，arr2 和 arr3。
 * 返回一个由 仅 在这三个数组中 同时出现 的整数所构成的有序数组。
 * @param $arr1
 * @param $arr2
 * @param $arr3
 * @return array
 */
function arraysIntersection($arr1, $arr2, $arr3) {
    $array = array_intersect($arr1,$arr2,$arr3); // (ー△ー；) 感觉这个解法有点太简单了emm
    return $array;
}