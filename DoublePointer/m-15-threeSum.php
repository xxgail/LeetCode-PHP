<?php

/**
 * @Time: 2019/10/19 22:32
 * @DESC: 15. 三数之和。 中等
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 * 注意：答案中不可以包含重复的三元组。
 * @param $nums
 * @return array
 */
function threeSum($nums) {
    $result = [];
    sort($nums);
    for($i = 0; $i < count($nums); $i++){
        if($i > 0 && $nums[$i] == $nums[$i-1] && $i < count($nums) - 1){
            continue;// 去重
        }

        // 双指针
        $left = $i + 1;
        $right = count($nums) - 1;
        do{
            if($left >= $right){
                break;
            }
            $sum = $nums[$i] + $nums[$left] + $nums[$right];
            if($sum == 0){
                $result[] = [$nums[$i], $nums[$left], $nums[$right]];
            }

            if($sum <= 0){
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
        }while($left < $right);
    }
    return $result;
}