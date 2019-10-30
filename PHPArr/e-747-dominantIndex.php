<?php

/**
 * @Time: 2019/9/3 15:20
 * @DESC: 747. 至少是其他数字两倍的最大数 简单
 * 在一个给定的数组nums中，总是存在一个最大元素 。
 * 查找数组中的最大元素是否至少是数组中每个其他数字的两倍。
 * 如果是，则返回最大元素的索引，否则返回-1。
 * @param $nums
 * @return int|string
 */
function dominantIndex($nums) {
    $big_num = max($nums); // 最大值
    foreach($nums as $k => $v){
        if($v != 0 && $v != $big_num && $big_num/$v < 2){
            return -1;
        }
        if($big_num == $v){
            return $k;
        }
    }
}