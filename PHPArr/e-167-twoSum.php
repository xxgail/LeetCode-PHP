<?php
/**
 * @Time: 2019/9/5 18:30
 * @DESC: 167. 两数之和②-输入有序数组。简单
 * 给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。
 * 函数应该返回这两个下标值 index1 和 index2，其中 index1 必须小于 index2。
 * 说明:
 * 返回的下标值（index1 和 index2）不是从零开始的。
 * 你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
 * @param $numbers
 * @param $target
 * @return array
 */
function twoSum($numbers, $target) {
    # 普通循环
    for($i = 0; $i < count($numbers); $i++){
        if($i > 0){
            if($numbers[$i] == $numbers[$i-1]){
                continue; // continue 是指跳出本次for循环。break是指结束本地for循环
            }
        }

        $surplus = $target - $numbers[$i];
        if($surplus >= 0){
            for ($j = $i+1; $j < count($numbers); $j++){
                if($numbers[$j] == $surplus){
                    return [$i+1,$j+1];
                }
            }
        }else{
            break;
        }
    }
    return [];

    # -------------------------------------------------------------------
    # 双指针移动
    $left = 0;
    $right = count($numbers) - 1;
    while ($left < $right){
        $sum = $numbers[$left] + $numbers[$right];
        if($sum == $target){
            return [$left,$right];
        }

        if($sum < $target){
            $left++;
        }else{
            $right++;
        }
    }
}