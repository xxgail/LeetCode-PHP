<?php
# https://leetcode-cn.com/problems/surface-area-of-3d-shapes/
/**
 * @Time: 2020/3/25 11:02
 * @DESC: 892. 三维形体的表面积 简单
 * 在 N * N 的网格上，我们放置一些 1 * 1 * 1  的立方体。
 * 每个值 v = grid[i][j] 表示 v 个正方体叠放在对应单元格 (i, j) 上。
 * 请你返回最终形体的表面积。
 * @param $grid
 * @return int
 */
function surfaceArea($grid){
    $area = 0;
    for ($i = 0; $i < count($grid); $i++){
        for ($j = 0; $j < count($grid[0]);$j ++){
            if ($grid[$i][$j] == 0){
                continue;
            }
            if ($i == 0 && $j == 0){
                $area += 4 * $grid[$i][$j] + 2;
            } else if ($i == 0 && $j != 0){
                $area += 4 * $grid[$i][$j] + 2 - min($grid[$i][$j-1],$grid[$i][$j]) * 2;
            }else if ($j == 0 && $i != 0){
                $area += 4 * $grid[$i][$j] + 2 - min($grid[$i-1][$j],$grid[$i][$j]) * 2;
            }else{
                $area += 4 * $grid[$i][$j] + 2 - min($grid[$i-1][$j],$grid[$i][$j]) * 2 - min($grid[$i][$j-1],$grid[$i][$j]) * 2;
            }
        }
    }
    return $area;
}


### 解题思路：
# 只求一个点的小方块的面积公式为 grid[i][j] * 6 - (grid[i][j] - 1) * 2，其中减去的是上下重合的面积，可以简写为 grid[i][j] * 4 + 2
# 考虑到方块之间有重合，所以是需要求自己的面积，然后减去与左侧及上侧小方块重合的面积。
# 其中特殊的位于临界位置的三个条件：
# grid[0][0] : 只需要求自己的面积
# grid[0][j] (j>0) : 只需要求自己的面积然后减去与左侧小方块重合的面积
# grid[i][0] (i>0) : 只需要求自己的面积然后减去与上侧小方块重合的面积


$grid = [[2]];
var_dump(surfaceArea($grid)); // 10

$grid = [[1,2],[3,4]];
var_dump(surfaceArea($grid)); // 34

$grid = [[1,0],[0,2]];
var_dump(surfaceArea($grid)); // 16

$grid = [[1,1,1],[1,0,1],[1,1,1]];
var_dump(surfaceArea($grid)); // 32

$grid = [[2,2,2],[2,1,2],[2,2,2]];
var_dump(surfaceArea($grid)); // 46