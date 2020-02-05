<?php
/**
 * @Time: 2020/2/5 17:33
 * @DESC: 268. 缺失数字 简单
 * 给定一个包含 0, 1, 2, ..., n 中 n 个数的序列，找出 0 .. n 中没有出现在序列中的那个数。
 **** 你的算法应具有线性时间复杂度。
 * @param $nums
 * @return float|int
 */
function missingNumber($nums) {
    $sum = array_sum($nums);
    // return $sum;
    $len = count($nums);
    for($i = 0; $i < $len + 1; $i++){
        $sum -= $i;
    }
    return $sum * -1;
}

###
# todo: 线性时间复杂度？？