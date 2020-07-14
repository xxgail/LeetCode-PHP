<?php
/**
 * @Time: 2020/7/14 9:10
 * @DESC: 120. 三角形最小路径和
 * 给定一个三角形，找出自顶向下的最小路径和。每一步只能移动到下一行中相邻的结点上。
 * 相邻的结点 在这里指的是 下标 与 上一层结点下标 相同或者等于 上一层结点下标 + 1 的两个结点。
 * @param $triangle
 * @return int
 * @link: https://leetcode-cn.com/problems/triangle
 */
function minimumTotal($triangle) {
    $height = count($triangle);
    if ($height < 1){
        return $triangle[0][0] ?? 0;
    }
    $dp[0][0] = $triangle[0][0];
    for ($i = 1; $i < $height; $i++){
        $dp[$i][0] = $dp[$i-1][0] + $triangle[$i][0];
        $dp[$i][$i] = $dp[$i-1][$i-1] + $triangle[$i][$i];
        for ($j = 1; $j < $i; $j++){
            $dp[$i][$j] = min($dp[$i-1][$j-1],$dp[$i-1][$j]) + $triangle[$i][$j];
        }
        var_dump($dp[$i]);
    }
    return min($dp[$height-1]);
}

$triangle = [
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
];
var_dump(minimumTotal($triangle)); // 11