<?php

/**
 * @Time: 2019/10/19 22:33
 * @DESC: 1. 两数之和。简单
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那两个整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * @param $nums
 * @param $target
 * @return array
 */
function twoSum1($nums, $target) {
//    $new_nums = [];
//    foreach($nums as $num){
//        $new_nums[] = $target - $num;
//    }
//
//    for($i = 0; $i < count($nums); $i++){
//        $site = array_search($nums[$i],$new_nums);
//        if($site !== false && $site != $i){
//            return [$i,$site];
//        }
//    }

    for ($i = 0; $i < count($nums); $i++){
        for ($j = 0; $j < count($nums); $j++){
            if($i != $j && $nums[$i] + $nums[$j] == $target){
                return [$i,$j];
            }
        }
    }
}