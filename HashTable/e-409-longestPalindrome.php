<?php
/**
 * @Time: 2020/3/19 12:09
 * @DESC: 409. 最长回文串 简单
 * 给定一个包含大写字母和小写字母的字符串，找到通过这些字母构造成的最长的回文串。
 * 在构造过程中，请注意区分大小写。比如 "Aa" 不能当做一个回文字符串。
 * 注意:
 * 假设字符串的长度不会超过 1010。
 * @param $s
 * @return float|int|mixed
 */
function longestPalindrome($s){
//    $hash = [];
//    $len = strlen($s);
//    for ($i = 0; $i < $len; $i++){
//        $hash[$s[$i]] = (isset($hash[$s[$i]]) ? $hash[$s[$i]] : 0) + 1;
//    }
    $hash = array_count_values(str_split($s)); // 构建hash表
    $res = 0;
    foreach ($hash as $item) {
        if ($res % 2 == 0){
            $res += $item;
        }else{
            $res += floor($item / 2) * 2;
        }
    }
    return $res;
}

$s = 'ccc';
var_dump(longestPalindrome($s));