<?php
/**
 * @Time: 2019/10/23 14:34
 * @DESC: 451. 根据字符出现频率排序。
 * 给定一个字符串，请将字符串里的字符按照出现的频率降序排列。
 * @param $s
 * @return string
 */
function frequencySort($s) {
    $arr = str_split($s);
    $arr = array_count_values($arr);
    arsort($arr); // arsort 按照数组的值倒序排列，相对应的键也随之变化

    $s = '';
    foreach($arr as $k => $v){
        $s .= str_repeat($k,$v); //str_repeat — 重复一个字符串
    }
    return $s;
}