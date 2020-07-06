<?php
/**
 * @Time: 2020/7/4 17:36
 * @DESC: 32. 最长有效括号
 * 给定一个只包含 '(' 和 ')' 的字符串，找出最长的包含有效括号的子串的长度。
 * 示例 1:
    输入: "(()"
    输出: 2
    解释: 最长有效括号子串为 "()"
 *
 * 示例 2:
    输入: ")()())"
    输出: 4
    解释: 最长有效括号子串为 "()()"
 * @param $s
 * @return int
 * @link: https://leetcode-cn.com/problems/longest-valid-parentheses
 */
function longestValidParentheses($s) {
    $max = 0;
    $dp = array_fill(-1, strlen($s), 0);
    for ($i = 1; $i < strlen($s); $i++) {
        if ($s[$i] == ")") {
            if ($s[$i - 1] == "(") {
                $dp[$i] = $dp[$i - 2] + 2;
            } elseif ($i - $dp[$i - 1] > 0 && $s[$i - $dp[$i - 1] - 1] == "(") {
                $dp[$i] = $dp[$i - 1] + $dp[$i - $dp[$i - 1] - 2] + 2;
            }
            $max = max($max, $dp[$i]);
        }
    }
    return $max;
}

$s = "()(())";
var_dump(longestValidParentheses($s)); // 6
$s = "(()(()))";
var_dump(longestValidParentheses($s)); // 8