<?php
/**
 * @Time: 2021/2/5
 * @DESC: 1208. 尽可能使字符串相等
 * 给你两个长度相同的字符串，s 和 t。
 * 将 s 中的第 i 个字符变到 t 中的第 i 个字符需要 |s[i] - t[i]| 的开销（开销可能为 0），也就是两个字符的 ASCII 码值的差的绝对值。
 * 用于变更字符串的最大预算是 maxCost。在转化字符串时，总开销应当小于等于该预算，这也意味着字符串的转化可能是不完全的。
 * 如果你可以将 s 的子字符串转化为它在 t 中对应的子字符串，则返回可以转化的最大长度。
 * 如果 s 中没有子字符串可以转化成 t 中对应的子字符串，则返回 0。
 * 示例 1：
    输入：s = "abcd", t = "bcdf", cost = 3
    输出：3
    解释：s 中的 "abc" 可以变为 "bcd"。开销为 3，所以最大长度为 3。
 * @param $s
 * @param $t
 * @param $maxCost
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/get-equal-substrings-within-budget/
 */
function equalSubstring($s, $t, $maxCost) {
    $len = strlen($s);
    if ($s == $t) return $len;
    $maxLen = 0;
    $s = stringToAsciiArr($s);
    $t = stringToAsciiArr($t);
    $current_sum = 0;
    $left = $right = 0;
    while ($right < $len) {
        if ($right < $len) {
            $current_sum += abs($s[$right] - $t[$right]);
            $right++;
        }
        while ($current_sum > $maxCost && $left < $len) {
            $current_sum -= abs($s[$left] - $t[$left]);
            $left++;
        }
        if ($current_sum <= $maxCost) {
            $maxLen = max($maxLen, $right - $left);
        }
        if ($right == $len) $left++;
    }
    return $maxLen;
}

function stringToAsciiArr($str) {
    $arr = str_split($str);
    foreach ($arr as $k => $item) {
        $arr[$k] = ord($item);
    }
    return $arr;
}

$s = 'abcd';
$t = 'abcd';
$maxCost = 1;
$t = "krrgw";
$s = "zjxss";
$maxCost = 19;
var_dump(equalSubstring($s,$t,$maxCost));