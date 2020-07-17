<?php
/**
 * @DESC: 冒泡排序（从小到大）
 * @param $nums
 * @return array
 * 空间复杂度O(1)
 * 时间复杂度O(n^2)
 */
function bubbleSort($nums){
    for ($i = 0; $i < count($nums); $i++){
        for ($j = 0; $j < count($nums)-$i-1; $j++){
            if ($nums[$j+1] < $nums[$j]){ // 小的往上冒
                list($nums[$j],$nums[$j+1]) = array($nums[$j+1],$nums[$j]);
            }
        }
    }
    return $nums;
}

$nums = [1,4,2,6,3,5];
var_dump(bubbleSort($nums));