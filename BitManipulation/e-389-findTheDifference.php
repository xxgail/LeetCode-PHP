<?php
/**
 * @Time: 2020/12/18
 * @DESC: 389. 找不同
 * 给定两个字符串 s 和 t，它们只包含小写字母。
 * 字符串 t 由字符串 s 随机重排，然后在随机位置添加一个字母。
 * 请找出在 t 中被添加的字母。
 * 示例 1：
    输入：s = "abcd", t = "abcde"
    输出："e"
    解释：'e' 是那个被添加的字母。
 * @param $s
 * @param $t
 * @return string
 * @link: https://leetcode-cn.com/problems/find-the-difference/
 */
function findTheDifference($s, $t) {
    $ans = substr($t,-1,1);
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {
        $ans ^= substr($s,$i,1) ^ substr($t,$i,1);
    }
    return $ans;
}