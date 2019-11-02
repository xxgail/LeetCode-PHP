<?php

/**
 * @Time: 2019/10/21 21:23
 * @DESC: 16. 最接近的三数之和 中等。
 * 给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target 最接近。返回这三个数的和。假定每组输入只存在唯一答案。
 * 类似于第15题
 * @param $nums
 * @param $target
 * @return mixed
 */
function threeSumClosest($nums, $target) {
    sort($nums);
//    $result = [];
    $sum = $nums[0] + $nums[1] + $nums[2];
    $result = $sum;
    $min = $sum > $target ? $sum - $target : $target - $sum;
    for ($i = 0; $i < count($nums); $i++){
        if($i > 0 && $nums[$i] == $nums[$i-1] && $i < count($nums) - 1){
            continue;// 去重
        }

        $left = $i + 1;
        $right = count($nums) - 1;

        do{
            if($left >= $right){
                break;
            }
            $sum = $nums[$i] + $nums[$left] + $nums[$right];
            $diff = $sum > $target ? $sum - $target : $target - $sum;
            if($diff < $min){
                $min = $diff;
                $result = $sum;
            }

            if($sum < $target){
                while($nums[$left + 1] == $nums[$left] && $left < $right){
                    $left ++;// 去重
                }
                $left ++;
            }else{
                while($nums[$right - 1] == $nums[$right] && $left < $right){
                    $right --;// 去重
                }
                $right --;
            }
        }while ($left < $right);
    }
    return $result;
}
