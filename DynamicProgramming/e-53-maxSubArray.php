<?php
/**
 * @Time: 2019/11/18 15:40
 * @DESC: 53. 最大自序和
 * 给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 * 示例:
 * 输入: [-2,1,-3,4,-1,2,1,-5,4],
 * 输出: 6
 * 解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
 * @param $nums
 * @return int
 */
function maxSubArray($nums) {
    $curr = $nums[0];
    $res = $nums[0];
    for ($i = 1; $i < count($nums); $i++){
        $curr = $curr > 0 ? $curr + $nums[$i] : $nums[$i];
        $res = max($res,$curr);
    }

    return $res;
}