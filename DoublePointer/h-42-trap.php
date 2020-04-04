<?php
# https://leetcode-cn.com/problems/trapping-rain-water/
/**
 * @Time: 2020/4/4 22:50
 * @DESC:
 * 给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
 * https://assets.leetcode-cn.com/aliyun-lc-upload/uploads/2018/10/22/rainwatertrap.png
 * 上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。 
 * 示例:
 * 输入: [0,1,0,2,1,0,1,3,2,1,2,1]
 * 输出: 6
 * @param $height
 * @return int|mixed
 */
function trap($height){
    $left = 0;
    $right = count($height) - 1;
    $sum = $left_max = $right_max = 0;
    while ($left < $right){
        if ($height[$left] < $height[$right]){
            if ($height[$left] > $left_max){
                $left_max = $height[$left];
            }else{
                $sum += $left_max - $height[$left];
            }
            $left ++;
        }else{
            if ($height[$right] > $right_max){
                $right_max = $height[$right];
            }else{
                $sum += $right_max - $height[$right];
            }
            $right--;
        }
    }
    return $sum;
}

$height = [0,1,0,2,1,0,1,3,2,1,1,2,1];
$height = [4,2,3];
//$height = [5,4,1,2];

var_dump(trap($height));