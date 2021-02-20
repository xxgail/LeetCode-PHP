<?php
/**
 * @Time: 2021/2/19
 * @DESC: 1004. 最大连续1的个数 III
 * 给定一个由若干 0 和 1 组成的数组 A，我们最多可以将 K 个值从 0 变成 1 。
 * 返回仅包含 1 的最长（连续）子数组的长度。
 * 示例 1：
    输入：A = [1,1,1,0,0,0,1,1,1,1,0], K = 2
    输出：6
    解释：
    [1,1,1,0,0, 1 ,1,1,1,1, 1 ]
    粗体数字从 0 翻转到 1，最长的子数组长度为 6。
 * @param $A
 * @param $K
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/max-consecutive-ones-iii/
 */
function longestOnes($A, $K) {
    $max = 0;
    $k = 0;
    $left = 0;
    $right = 0;
    $len = count($A);
    while ($right < $len) {
        if ($A[$right] == 0) {
            $k++;
        }
        $right++;
        while ($k > $K) {
            if ($A[$left] == 0) {
                $k--;
            }
            $left++;
        }
        $max = max($max, $right - $left);
    }
    return $max;
}

$A = [1,1,1,0,0,0,1,1,1,1,0];
$K = 2;
//$A = [0,0,1,1,0,0,1,1,1,0,1,1,0,0,0,1,1,1,1];
//$K = 3;
$A = [0,0,1,1,1,0,0];
$K = 0;
var_dump(longestOnes($A,$K));