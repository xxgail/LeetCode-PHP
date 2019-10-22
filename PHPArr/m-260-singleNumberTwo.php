<?php

/**
 * @Time: 2019/10/15 11:48
 * @DESC: 260. 只出现一次的数字 ③
 * 给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。 找出只出现一次的那两个元素。
 * @param $nums
 * @return array
 */
function singleNumberTwo($nums) {
    $data = [];
    $nums = array_count_values($nums);
    foreach ($nums as $k => $num) {
        if($num == 1){
            $data[] = $k;
        }
    }
    return $data;
}
