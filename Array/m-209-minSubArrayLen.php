<?php
/**
 * @Time: 2020/6/28 11:00
 * @DESC: 209. 长度最小的子数组
 * 给定一个含有 n 个正整数的数组和一个正整数 s ，找出该数组中满足其和 ≥ s 的长度最小的连续子数组，并返回其长度。
 * 如果不存在符合条件的连续子数组，返回 0。
 * @param $s
 * @param $nums
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/minimum-size-subarray-sum
 */
function minSubArrayLen($s, $nums) {
    $count = count($nums);
    $res = PHP_INT_MAX;
    $left = 0;
    $sum = 0;
    for ($i=0; $i < $count; $i++) {
        $sum += $nums[$i];
        while ($sum >= $s) {
            $res = min($res, $i - $left + 1);
            $sum -= $nums[$left++];
        }
    }
    return $res == PHP_INT_MAX ? 0 : $res;
}