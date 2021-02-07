<?php
/**
 * @Time: 2021/2/4
 * @DESC: 1658. 将 x 减到 0 的最小操作数
 * 给你一个整数数组 nums 和一个整数 x 。每一次操作时，你应当移除数组 nums 最左边或最右边的元素，然后从 x 中减去该元素的值。请注意，需要 修改 数组以供接下来的操作使用。
 * 如果可以将 x 恰好 减到 0 ，返回 最小操作数 ；否则，返回 -1 。
 * 示例 1：
    输入：nums = [1,1,4,2,3], x = 5
    输出：2
    解释：最佳解决方案是移除后两个元素，将 x 减到 0 。
 * @param $nums
 * @param $x
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/minimum-operations-to-reduce-x-to-zero/
 */
function minOperations($nums, $x) {
    $sum = array_sum($nums) - $x;
    if ($sum < 0) {
        return -1;
    }
    $len = count($nums);
    if ($sum == 0) {
        return $len;
    }
    $maxLen = -1;
    $current = 0;
    $left = 0;
    $right = 0;
    while ($left < $len) {
        if ($right < $len) {
            $current += $nums[$right++];
        }
        while ($current > $sum && $left < $len) {
            $current -= $nums[$left++];
        }
        if ($current == $sum) {
            $maxLen = max($maxLen, $right-$left);
        }
        if ($right == $len) $left++;
    }
    return $maxLen == -1 ? -1 : $len-$maxLen;
}