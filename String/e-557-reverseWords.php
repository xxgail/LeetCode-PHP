<?php
/**
 * @Time: 2020/8/30
 * @DESC: 557. 反转字符串中的单词 III
 * 给定一个字符串，你需要反转字符串中每个单词的字符顺序，同时仍保留空格和单词的初始顺序。
 * 示例：
    输入："Let's take LeetCode contest"
    输出："s'teL ekat edoCteeL tsetnoc"
 * @param $s
 * @return string
 * @link https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/
 */
function reverseWords($s) {
    $arr = explode(' ',$s);
    foreach ($arr as $k => $v) {
        $arr[$k] = strrev($v);
    }
    return implode(' ',$arr);
}