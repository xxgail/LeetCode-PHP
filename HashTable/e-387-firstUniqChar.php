<?php
/**
 * @Time: 2019/9/14 22:44
 * @DESC: 387. 字符串中第一个唯一字符
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。
 * @param $s
 * @return int|string
 * @link https://leetcode-cn.com/problems/first-unique-character-in-a-string/
 */
function firstUniqChar($s) {
    # 64ms
    if($s){
        $s_arr = str_split($s);
        foreach ($s_arr as $k => $v){
            if(strpos($s,$v) == strrpos($s,$v)){ # 前后查找
                return $k;
            }
        }
    }
    return -1;
    # -----------
    # hash 40ms
    if($s == "") return -1;
    $a = array_count_values(str_split($s));
    foreach($a as $k => $v) {
        if($v == 1){
            return strpos($s,$k);
        }
    }
    return -1;
}