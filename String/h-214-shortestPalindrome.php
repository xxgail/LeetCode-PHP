<?php
/**
 * @Time: 2020/8/29
 * @DESC: 214. 最短回文串
 * 给定一个字符串 s，你可以通过在字符串前面添加字符将其转换为回文串。找到并返回可以用这种方式转换的最短回文串。
 * 示例1:
    输入: "aacecaaa"
    输出: "aaacecaaa"
 * 示例 2:
    输入: "abcd"
    输出: "dcbabcd"
 * @param $s
 * @return string
 * @link: https://leetcode-cn.com/problems/shortest-palindrome
 */
function shortestPalindrome($s) {
    $i = strlen($s)-1;
    $l = 0;
    while ($s != strrev($s)){
        $s = substr($s,0,$l).$s[$i].substr($s,$l);
        $l++;
    }
    return $s;
}

$s = "aba";
var_dump(shortestPalindrome($s));