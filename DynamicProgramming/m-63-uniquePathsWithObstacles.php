<?php
/**
 * @Time: 2020/7/6 17:37
 * @DESC: 63. 不同路径②
 * 一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
 * 机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。
 * 现在考虑网格中有障碍物。那么从左上角到右下角将会有多少条不同的路径？
 * 网格中的障碍物和空位置分别用 1 和 0 来表示。
 * 说明：m 和 n 的值均不超过 100。
 * @param $obstacleGrid
 * @return int
 * @link: https://leetcode-cn.com/problems/unique-paths-ii
 */
function uniquePathsWithObstacles($obstacleGrid) {
    $n = count($obstacleGrid);
    $m = count($obstacleGrid[0]);
    if ($obstacleGrid[0][0] == 1){
        return 0;
    }
    $dp = [];
    $dp[0][0] = 1;
    for ($i = 0; $i < $n; $i++){
        for ($j = 0; $j < $m; $j++){
            if ($obstacleGrid[$i][$j] == 1){
                $dp[$i][$j] = 0;
            }else{
                if ($i >= 1 && $j >= 1){
                    $dp[$i][$j] = $dp[$i-1][$j] + $dp[$i][$j-1]; // 公式
                }elseif ($i >= 1){
                    $dp[$i][$j] = $dp[$i-1][$j];
                }elseif ($j >= 1){
                    $dp[$i][$j] = $dp[$i][$j-1];
                }
            }
        }
//        var_dump($dp);
    }
    return $dp[$n-1][$m-1];
}


// 3x3 网格的正中间有一个障碍物。
// 从左上角到右下角一共有 2 条不同的路径：
// 1. 向右 -> 向右 -> 向下 -> 向下
// 2. 向下 -> 向下 -> 向右 -> 向右
$obstacleGrid = [
    [0,0,0],
    [0,1,0],
    [0,0,0]
]; // 2

$obstacleGrid = [[0],[0],[0]]; // 1
$obstacleGrid = [[0,0],[1,0]]; // 1
//$obstacleGrid = [[0,0],[1,1],[0,0]]; // 0
var_dump(uniquePathsWithObstacles($obstacleGrid));