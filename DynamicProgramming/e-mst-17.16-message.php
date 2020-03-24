<?php
# https://leetcode-cn.com/problems/the-masseuse-lcci/
/**
 * @Time: 2020/3/24 12:15
 * @DESC: 面试题17.16. 按摩师
 * 其实就是打家劫舍，不过竟然还有数组为空和长度为1的情况...
 * @param $nums
 * @return int|mixed
 */
function message($nums){
    $count = count($nums);
    if ($count == 0){
        return 0;
    }elseif ($count == 1){
        return $nums[0];
    }
    $dp = [];
    $dp[0] = $nums[0];
    $dp[1] = max($nums[0],$nums[1]);
    for ($i = 2; $i < $count; $i++){
        $dp[$i] = max($dp[$i-2]+$nums[$i],$dp[$i-1]);
    }
    return $dp[$count-1];
}

var_dump(message([1,2,3,1]));
var_dump(message([2,7,9,3,1]));
var_dump(message([2,1,4,5,3,1,1,3]));