<?php
/**
 * @DESC: 插入排序（从小到大）。前面的永远是排好序的，找合适位置插进去就行
 * @param $nums
 * @return array
 * 空间复杂度O(1)
 * 时间复杂度O(n^2)
 */
function insertSort($nums){
    for ($i = 1; $i < count($nums); $i++){
        $current = $nums[$i];
        for ($j = $i-1; $j >= 0 && $nums[$j] > $current; $j--){
            $nums[$j+1] = $nums[$j];
        }
        $nums[$j+1] = $current;
    }
    return $nums;
}

$nums = [1,8,2,6,3,5];
var_dump(insertSort($nums));