<?php
/**
 * @Time: 2021/2/4
 * @DESC: 643. 子数组最大平均数 I
 * 给定 n 个整数，找出平均数最大且长度为 k 的连续子数组，并输出该最大平均数。
 * 示例：
    输入：[1,12,-5,-6,50,3], k = 4
    输出：12.75
    解释：最大平均数 (12-5-6+50)/4 = 51/4 = 12.75
 * @param $nums
 * @param $k
 * @return float|int
 * @link: https://leetcode-cn.com/problems/maximum-average-subarray-i/
 */
function findMaxAverage($nums, $k) {
    $len = count($nums);
    $current = $max_sum = array_sum(array_slice($nums,0,$k));
    for ($i = $k; $i < $len; $i++) {
        $current -= ($nums[$i - $k] - $nums[$i]);
        $max_sum = max($max_sum, $current);
    }
    return $max_sum / $k;
}

$nums = [1,12,-5,-6,50,3];
$k = 1;
var_dump(findMaxAverage($nums, $k));