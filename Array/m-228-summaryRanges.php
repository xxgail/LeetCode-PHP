<?php
/**
 * @Time: 2019/10/27 18:40
 * @DESC: 228. 汇总区间 中等
 * 给定一个无重复元素的有序整数数组，返回数组区间范围的汇总。
 * @param $nums
 * @return array
 */
function summaryRanges($nums) {
    if($nums == []){
        return [];
    }
    $count = count($nums);
    $left = 0;
    $right = 0;
    $i = $right + 1;
    $result = [];
    do{
        if($i == $count || $nums[$i] - $nums[$right] > 1){
            if($nums[$left] == $nums[$right]){
                $result[] = $nums[$left];
            }else{
                $result[] = $nums[$left].'->'.$nums[$right];
            }
            $left = $right = $i;
        }else{
            $right ++;
        }
        $i ++;
    }while($i <= $count);
    return $result;
}

##--
# 依旧利用双指针的解题思路
# 但是数组的循环部分要额外往外扩展（为了最后一个值