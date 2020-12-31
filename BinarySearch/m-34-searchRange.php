<?php
/**
 * @Time: 2020/7/22 15:39
 * @DESC: 34. 在排序数组中查找元素的第一个和最后一个位置
 * 给定一个按照升序排列的整数数组 nums，和一个目标值 target
 * 找出给定目标值在数组中的开始位置和结束位置。
 * 你的算法时间复杂度必须是 O(log n) 级别。
 * 如果数组中不存在目标值，返回 [-1, -1]。
 *
 * 示例 1:
 * 输入: nums = [5,7,7,8,8,10], target = 8
 * 输出: [3,4]
 *
 * 示例 2:
 * 输入: nums = [5,7,7,8,8,10], target = 6
 * 输出: [-1,-1]
 * @param $nums []int
 * @param $target int
 * @return int[] int
 * @link: https://leetcode-cn.com/problems/find-first-and-last-position-of-element-in-sorted-array
 */
function searchRange($nums, $target) {
    # 二分法
    $left = 0;
    $right = count($nums) - 1;
    while ($left <= $right){
        $mid = floor(($left + $right) / 2);
        if ($nums[$mid] == $target){
            $left = $right = $mid;
            while ($left - 1 >= 0 && $nums[$left - 1] == $target){
                $left--;
            }
            while ($right + 1 < count($nums) && $nums[$right + 1] == $target){
                $right ++;
            }
            return [$left,$right];
        }elseif ($nums[$mid] < $target){
            $left = $mid + 1;
        }else{
            $right = $mid - 1;
        }
    }
    return [-1,-1];
}

$nums = [10];
$target = 10;
var_dump(searchRange($nums,$target));
