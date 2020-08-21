<?php
/**
 * @Time: 2020/8/19
 * @DESC: 647. 回文子串
 * 给定一个字符串，你的任务是计算这个字符串中有多少个回文子串。
 * 具有不同开始位置或结束位置的子串，即使是由相同的字符组成，也会被视作不同的子串。
 * 示例 1：
    输入："abc"
    输出：3
    解释：三个回文子串: "a", "b", "c"
 *
 * 示例 2：
    输入："aaa"
    输出：6
    解释：6个回文子串: "a", "a", "a", "aa", "aa", "aaa"
 * @param $s
 * @return int
 * @link: https://leetcode-cn.com/problems/palindromic-substrings
 */
function countSubstrings($s){
    $len = strlen($s);
    $res = $len;
    for ($i = 1; $i < $len; $i++) {
        $add = 1;
        while ($add <= $i && $add <= $len-$i-1 && $s[$i-$add] == $s[$i+$add]){
            $res++;
            $add++;
        }
    }
    for ($i = 1; $i < $len; $i++){
        if ($s[$i] == $s[$i-1]){
            $res++;
            $add = 1;
            while ($add <= $i-1 && $add <= $len-$i-1 && $s[$i-$add-1] == $s[$i+$add]){
                $res++;
                $add++;
            }
        }
    }
    return $res;
}

function countSubstrings1($s){
    $len = strlen($s);
    $res = 0;
    for ($i = 0; $i < 2*$len-1; $i++) {
        $l = intval(floor($i/2));
        $r = intval(ceil($i/2));
        var_dump([$l,$r]);
        while ($l >= 0 && $r < $len && $s[$l] == $s[$r]){
            $l--;
            $r++;
            $res++;
        }
    }
    return $res;
}

function countSubstringsTwoCycle($s) {
    $res = $len = strlen($s);
    for ($i = 0; $i < $len - 1;$i++){
        for ($j = 2; $j <= $len - $i; $j++){
            $str = substr($s,$i,$j);
            var_dump($str);
            if ($str == strrev($str)){
                $res++;
            }
        }
    }
    return $res;
}

$s = "leetcode";
var_dump(countSubstrings($s));