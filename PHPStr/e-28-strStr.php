<?php
/**
 * @Time: 2019/9/5 15:44
 * @DESC: 28. 实现 strStr() 函数。 简单
 * 给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。
 * 如果不存在，则返回  -1。
 * @param $haystack
 * @param $needle
 * @return int
 */
function strStrTest($haystack, $needle) {
    if($haystack == $needle || !$needle){
        return 0;
    }
    $new_arr = explode($needle,$haystack);

    if($new_arr[0] == $haystack){
        return -1;
    }else{
        return strlen($new_arr[0]);
    }
}