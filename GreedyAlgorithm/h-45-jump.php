<?php
# https://leetcode-cn.com/problems/jump-game-ii/
/**
 * @Time: 2020/4/17 22:44
 * @DESC: 45. 跳跃游戏II
 * 给定一个非负整数数组，你最初位于数组的第一个位置。
 * 数组中的每个元素代表你在该位置可以跳跃的最大长度。
 * 你的目标是使用最少的跳跃次数到达数组的最后一个位置。
 * @param $nums
 * @return int
 */
function jump($nums){
    $end = $f = $step = 0;
    $len = count($nums) - 1;
    for ($i = 0; $i < $len; $i++){
        $f = max($f,$nums[$i] + $i);
        if ($i == $end){
            $step++;
            $end = $f;
        }
    }
    return $step;
}

var_dump(jump([2,3,1,1,4])); // 2