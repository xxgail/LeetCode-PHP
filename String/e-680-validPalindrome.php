<?php
/**
 * @Time: 2020/5/20 17:46
 * @DESC: 680. 验证回文字符串2
 * 给定一个非空字符串 s，最多删除一个字符。判断是否能成为回文字符串。
 * 回文字符串即对称字符串
 * @param $s
 * @return bool
 * @link: https://leetcode-cn.com/problems/valid-palindrome-ii/
 */
function validPalindrome($s) {
    if (validPalindromeFunc($s)) {
        return true;
    }
    $l = 0;
    $r = strlen($s) - 1;
    while (true) {
        if ($s[$l] == $s[$r]) {
            $l++;
            $r--;
        } else {
            return validPalindromeFunc(substr($s, 0, $l) . substr($s, $l + 1)) || validPalindromeFunc(substr($s, 0, $r) . substr($s, $r + 1));
        }
    }
}

function validPalindromeFunc($s) {
    $len = floor(strlen($s) / 2);
    if (substr($s, 0, $len) == substr(strrev($s), 0, $len)) {
        return true;
    }
    return false;
}

 var_dump(validPalindrome('abca'));
 var_dump(validPalindrome("ebcbbececabbacecbbcbe"));