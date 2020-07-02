<?php
/**
 * @Time: 2020/7/1 11:49
 * @DESC: 718. 最长重复子数组
 * 给两个整数数组 A 和 B ，返回两个数组中公共的、长度最长的子数组的长度。
 * 示例 1:
 * 输入:
 * A: [1,2,3,2,1]
 * B: [3,2,1,4,7]
 * 输出: 3
 * 解释:
 * 长度最长的公共子数组是 [3, 2, 1]。
 * @param $A
 * @param $B
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/maximum-length-of-repeated-subarray
 */
function findLength($A, $B) {
    if ($A == $B) {
        return count($A);
    }
    $n = count($A);
    $m = count($B);
    $res = 0;
    for ($i = 0; $i < $n; $i++) {
        $len = min($n - $i, $m);
        if ($len <= $res) {
            break;
        }
        $maxLen = commonPrefix($A, $B, $i, 0, $len);
        $res = max($maxLen, $res);
    }
    for ($i = 0; $i < $m; $i++) {
        $len = min($m - $i, $n);
        if ($len <= $res) {
            break;
        }
        $maxLen = commonPrefix($A, $B, 0, $i, $len);
        $res = max($maxLen, $res);
    }
    return $res;
}

function commonPrefix($A, $B, $startA, $startB, $len) {
    $res = 0;
    $k = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($A[$startA + $i] == $B[$startB + $i]) {
            $k++;
        } else {
            $k = 0;
        }
        $res = max($res, $k);
    }
    return $res;
}