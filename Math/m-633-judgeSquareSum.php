<?php
/**
 * @Time: 2021/4/29
 * @DESC: 给定一个非负整数 c，你要判断是否存在两个整数 a 和 b，使得a^2 + b^2 = c 。
    示例 1：
        输入：c = 5
        输出：true
        解释：1 * 1 + 2 * 2 = 5
    示例 2：
        输入：c = 3
        输出：false
 * @param $c
 * @return bool
 * @link: https://leetcode-cn.com/problems/sum-of-square-numbers
 */
function judgeSquareSum($c) {
    if (pow(ceil(sqrt($c)),2) == $c) {
        return true;
    }
    $b = ceil(sqrt($c/2));
    if (pow($b,2) * 2 == $c) {
        return true;
    }
    for ($i = 1; $i < $b; $i++) {
        if (pow(ceil(sqrt($c - pow($i,2))),2) == $c - pow($i,2)) {
            return true;
        }
    }
    return false;
}

# 双指针
function judgeSquareSumDouble($c) {
    $left = 0;
    $right = floor(sqrt($c));
    while ($left <= $right) {
        $sum = $left * $left + $right * $right;
        if ($sum == $c) {
            return true;
        }else if ($sum > $c) {
            $right--;
        }else{
            $left++;
        }
    }
    return false;
}
//var_dump(judgeSquareSum(5));
//var_dump(judgeSquareSum(3));
//var_dump(judgeSquareSum(4));
var_dump(judgeSquareSum(5));
//var_dump(judgeSquareSum(pow(2,31)-1));