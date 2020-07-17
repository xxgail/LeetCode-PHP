<?php
/**
 * @Time: 2020/7/17 9:07
 * @DESC: 35. 搜索插入位置
 * 给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。
 * 如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
 * 你可以假设数组中无重复元素。
 * @param $nums []int
 * @param $target int
 * @return int
 * @link: https://leetcode-cn.com/problems/search-insert-position/
 */
function searchInsert($nums, $target) {
    # 二分法查找
    $res = count($nums);
    $left = 0;
    $right = $res-1;
    while ($left <= $right) {
        $mid = floor(($left + $right)/2);
        if ($nums[$mid] >= $target) {
            $res = $mid;
            $right = $mid - 1;
        }else{
            $left = $mid + 1;
        }
    }
    return $res;

    # 普通遍历
//    $len = count($nums);
//    for($i = 0; $i < $len; $i++){
//        if($nums[$i] >= $target){
//            return $i;
//        }
//    }
//    return $len;
}