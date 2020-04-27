<?php
# https://leetcode-cn.com/problems/search-in-rotated-sorted-array/
/**
 * @Time: 2020/4/27 11:08 下午
 * @DESC: 33. 搜索旋转排序数组
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 * ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
 * 搜索一个给定的目标值，如果数组中存在这个目标值，则返回它的索引，否则返回 -1 。
 * 你可以假设数组中不存在重复的元素。
 * 你的算法时间复杂度必须是 O(log n) 级别。
 * @param $nums
 * @param $target
 * @return false|int
 */
function search($nums, $target) {
    $len = count($nums);
    if ($len == 0) {
        return -1;
    }
    if ($len == 1) {
        return $nums[0] == $target ? 0 : -1;
    }
    $l = 0;
    $r = $len - 1;
    while ($l <= $r) {
        // 二分法查找
        $mid = floor(($l + $r) / 2);
        if ($nums[$mid] == $target) {
            return $mid;
        }
        if ($nums[$mid] >= $nums[$l]) { // 左边是递增的
            if ($nums[$mid] < $target || $nums[$l] > $target) {
                $l = $mid + 1;
            } else {
                $r = $mid - 1;
            }
        } else if ($nums[$mid] < $nums[$l]) { // 右边是递增的
            if ($nums[$mid] > $target || $nums[$r] < $target) {
                $r = $mid - 1;
            } else {
                $l = $mid + 1;
            }
        }
    }
    return -1;
}

$nums = [4,5,6,7,0,1,2];
var_dump(search($nums,0)); // 4