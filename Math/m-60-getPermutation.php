<?php
/**
 * @Time: 2020/9/8
 * @DESC: 60. 第k个排列
 * 给出集合[1,2,3,…,n]，其所有元素共有 n! 种排列。
 * 按大小顺序列出所有排列情况，并一一标记，当n = 3 时, 所有排列如下：
    "123"
    "132"
    "213"
    "231"
    "312"
    "321"
    给定n 和k，返回第k个排列。
 * 说明：
    给定 n 的范围是 [1, 9]。
    给定 k 的范围是 [1, n!]。
 * 示例 1:
    输入: n = 3, k = 3
    输出: "213"
 * 示例 2:
    输入: n = 4, k = 9
    输出: "2314"
 * @param $n
 * @param $k
 * @return string
 * @link: https://leetcode-cn.com/problems/permutation-sequence
 */
function getPermutation($n, $k) {
    $f = 1;
    $str = "";
    for ($i = 1; $i < $n; $i++){
        $f *= $i;
        $str .= $i;
    }
    $str .= $n;
    $res = "";
    while ($n > 0){
        $index = ceil($k / $f) - 1;
        var_dump($index);
        if ($index == -1){
            $res .= strrev($str);
            break;
        }
        $k %= $f;
        $res .= $str[intval($index)];
        $str = substr($str,0,$index).substr($str,$index+1);
        $n --;
        $f /= $n;
    }
    return $res;
}


var_dump(getPermutation(4,9));