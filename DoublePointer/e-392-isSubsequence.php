<?php
/**
 * @Time: 2020/7/27 10:08
 * @DESC: 392. 判断子序列
 * 给定字符串 s 和 t ，判断 s 是否为 t 的子序列。
 * 你可以认为 s 和 t 中仅包含英文小写字母。字符串 t 可能会很长（长度 ~= 500,000），而 s 是个短字符串（长度 <=100）。
 * 字符串的一个子序列是原始字符串删除一些（也可以不删除）字符而不改变剩余字符相对位置形成的新字符串。（例如，"ace"是"abcde"的一个子序列，而"aec"不是）。
 * 示例 1:
    s = "abc", t = "ahbgdc"
    返回 true.
 * 示例 2:
    s = "axc", t = "ahbgdc"
    返回 false.
 * @param $s
 * @param $t
 * @return bool
 * @link: https://leetcode-cn.com/problems/is-subsequence
 */
function isSubsequence($s, $t) {
    # 双指针
    $len_s = strlen($s);
    $len_t = strlen($t);
    $point_s = 0;
    $point_t = 0;
    while ($point_s < $len_s && $point_t < $len_t){
        if ($s[$point_s] == $t[$point_t]){
            $point_s ++;
        }
        $point_t++;
    }
    return $point_s == $len_s;
}
