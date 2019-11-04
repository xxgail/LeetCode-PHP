<?php
/**
 * @Time: 2019/11/4 21:50
 * @DESC: 153. 寻找旋转排序数组中的最小值
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 * ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
 * 请找出其中最小的元素。
 * 你可以假设数组中不存在重复元素。
 * @param $nums
 * @return mixed|null
 */
function findMin($nums) {
    if(count($nums) == 0){
        return null;
    }
    if(count($nums) == 1){
        return $nums[0];
    }
    for($i = 1; $i < count($nums); $i++){
        if($nums[$i] > $nums[$i-1]){
            continue;
        }else{
            return $nums[$i];
        }
    }
    return $nums[0];
}