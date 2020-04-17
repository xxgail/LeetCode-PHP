<?php
# https://leetcode-cn.com/problems/jump-game/
/**
 * @Time: 2020/4/17 22:48
 * @DESC: 55. 跳跃游戏
 * 给定一个非负整数数组，你最初位于数组的第一个位置。
 * 数组中的每个元素代表你在该位置可以跳跃的最大长度。
 * 判断你是否能够到达最后一个位置。
 * @param $nums
 * @return bool
 */
function canJump($nums){
    $f = 0;
    $len = count($nums) - 1;
    for ($i = 0; $i < $len; $i++){
        $f = max($f,$nums[$i] + $i);
        if ($f <= $i) return false;
    }
    return $f >= $len;
}


var_dump(canJump([2,3,1,1,4])); //true
var_dump(canJump([3,2,1,0,4])); //false