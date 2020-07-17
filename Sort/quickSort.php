<?php
/**
 * @DESC: 快速排序
 * 分治+1，把原始的数组筛选成较小和较大的两个子数组，然后递归地排序两个子数组。
 * @param $nums
 * @return array
 * 时间复杂度O(n^2)
 * 空间复杂度O(logn)
 */
function quickSort($nums){
    _sort($nums,0,count($nums)-1);
    return $nums;
}

function _sort(&$nums,$left,$right){
    if ($left >= $right) return;

    $p = partition($nums,$left,$right);
    _sort($nums,$left,$p-1);
    _sort($nums,$p+1,$right);
}

function partition(&$nums,$left,$right){
    $len = count($nums);
    if ($len <= 1){
        return $nums;
    }
    $p = $nums[$left];
    while ($left < $right){
        while ($nums[$right] >= $p && $right > $left){
            $right--;
        }
        $nums[$left] = $nums[$right];
        while ($nums[$left] <= $p && $right > $left){
            $left++;
        }
        $nums[$right] = $nums[$left];
    }
    $nums[$right] = $p;
    return $right;
}

$nums = [1,4,2,6,3,5];
var_dump(quickSort($nums));
