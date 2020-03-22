<?php
/**
 * @Time: 2020/3/22 12:05
 * @DESC: 5367. 最长快乐前缀
 * 「快乐前缀」是在原字符串中既是 非空 前缀也是后缀（不包括原字符串自身）的字符串。
 * 给你一个字符串 s，请你返回它的 最长快乐前缀。
 * 如果不存在满足题意的前缀，则返回一个空字符串。
 * @param $s
 * @return false|string
 */
function longestPrefix($s){
    $len = strlen($s);
    $res = 0;
    for ($i = 1; $i < strlen($s); $i++){
        if (substr($s,0,$i) == substr($s,$len-$i)){
            $res = $i;
        }else{
            continue;
        }
    }
    return substr($s,0,$res);
}

var_dump(longestPrefix("level"));
var_dump(longestPrefix("ababab"));
var_dump(longestPrefix("leetcodeleet"));
var_dump(longestPrefix("a"));