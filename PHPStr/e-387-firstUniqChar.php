<?php

/**
 * @Time: 2019/9/14 22:44
 * @DESC: 387. 字符串中第一个唯一字符
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。
 * @param $s
 * @return int|string
 */
function firstUniqChar($s) {
    if($s){
        $s_arr = str_split($s);
        foreach ($s_arr as $k => $v){
            if(strpos($s,$v) == strrpos($s,$v)){
                return $k;
            }
        }
    }
    return -1;
}