<?php
/**
 * @DESC: 归并排序
 * 核心思想是分治，把一个复杂问题拆分成若干个子问题来求解。
 * @param $nums
 * @return array
 * 时间复杂度 T(n) = 2 * T(n/2) + O(n)
 * 空间复杂度 O(n)
 */
function mergeSort($nums){
    _sort($nums,0,count($nums)-1);
    return $nums;
}

function _sort(&$nums, $left, $right){
    if ($left >= $right) return;

    $mid = floor(($left+$right)/2);

    _sort($nums,$left,$mid);
    _sort($nums,$mid+1,$right);
    merge($nums,$left,$mid,$right);
}

function merge(&$nums,$left,$mid,$right){
    $cp = $nums;
    $k = $i = $left;
    $j = $mid + 1;
    while ($k <= $right){
        if ($i > $mid){ # 左半边的数据都处理完毕
            $nums[$k++] = $cp[$j++];
        }else if ($j > $right){ # 右半边的数据都处理完毕
            $nums[$k++] = $cp[$i++];
        }else if ($cp[$j] < $cp[$i]){ # 右边的数小于左边的数
            $nums[$k++] = $cp[$j++];
        }else{ # 左边的数小于右边的数
            $nums[$k++] = $cp[$i++];
        }
    }
}

$nums = [1,8,2,6,3,5];
var_dump(mergeSort($nums));