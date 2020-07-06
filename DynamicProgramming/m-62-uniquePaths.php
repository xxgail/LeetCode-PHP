<?php
/**
 * @Time: 2020/7/6 16:32
 * @DESC: 62. 不同路径
 * 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
 * 机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。
 * 问总共有多少条不同的路径？
 * @param $m
 * @param $n
 * @return int
 * @link: https://leetcode-cn.com/problems/unique-paths
 */
function uniquePaths($m, $n) {
    if ($m == 1 || $n == 1){
        return 1;
    }
    $dp = [];
    $dp[0][0] = 0;
    for ($j = 1; $j < $n; $j++){
        for ($i = 1; $i < $m; $i++){
            $dp[$i][0] = 1;
            $dp[0][$j] = 1;
            $dp[$i][$j] = $dp[$i-1][$j] + $dp[$i][$j-1]; // 公式
        }
    }
    return $dp[$m-1][$n-1];
}

$m = 2;
$n = 3;
var_dump(uniquePaths($m,$n));