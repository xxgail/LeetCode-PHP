<?php
/**
 * @Time: 2020/7/23 09:37:23
 * @DESC: 64. 最短路径
 * 给定一个包含非负整数的 m x n 网格，请找出一条从左上角到右下角的路径，使得路径上的数字总和为最小。
 * 说明：每次只能向下或者向右移动一步。
 * 示例:
 * 输入:
 * [
 *   [1,3,1],
 *   [1,5,1],
 *   [4,2,1]
 * ]
 * 输出: 7
 * 解释: 因为路径 1→3→1→1→1 的总和最小。
 * @param $grid
 * @return int
 * @link https://leetcode-cn.com/problems/minimum-path-sum/submissions/
 */
function minPathSum($grid) {
    $h = count($grid);
    if ($h == 0) return 0;
    if ($h == 1) return array_sum($grid[0]);
    $w = count($grid[0]);
    $dp[0][0] = $grid[0][0];
    for ($i = 1; $i < $w; $i++){
        $dp[0][$i] = $dp[0][$i-1] + $grid[0][$i];
    }
    for ($i = 1; $i < $h; $i++){
        $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];
    }
    for ($i = 1; $i < $h; $i++){
        for ($j = 1; $j < $w; $j++){
            $dp[$i][$j] = min($dp[$i-1][$j],$dp[$i][$j-1]) + $grid[$i][$j];
        }
    }
    return $dp[$h-1][$w-1];
}

$grid = [
    [1,3,1],
    [1,5,1],
    [4,2,1]
];
$grid = [[1,1,1,1],[2,2,2,2]];
var_dump(minPathSum($grid));