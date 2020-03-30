<?php
# https://leetcode-cn.com/problems/as-far-from-land-as-possible/
/**
 * @Time: 2020/3/29 22:44
 * @DESC: 1162. 地图分析
 * 你现在手里有一份大小为 N x N 的『地图』（网格） grid，上面的每个『区域』（单元格）都用 0 和 1 标记好了。其中 0 代表海洋，1 代表陆地，你知道距离陆地区域最远的海洋区域是是哪一个吗？请返回该海洋区域到离它最近的陆地区域的距离。
 * 我们这里说的距离是『曼哈顿距离』（ Manhattan Distance）：(x0, y0) 和 (x1, y1) 这两个区域之间的距离是 |x0 - x1| + |y0 - y1| 。
 * 如果我们的地图上只有陆地或者海洋，请返回 -1。
 * @param $grid
 * @return int|mixed
 */
function maxDistance($grid){
    $dx = [0,0,1,-1];
    $dy = [1,-1,0,0];

    $queue = [];
    $len = count($grid);
    for ($i = 0; $i < $len; $i++){
        for ($j = 0; $j < $len; $j++){
            if ($grid[$i][$j] == 1){
                $queue[] = [$i,$j];
            }
        }
    }

    $hasOcean = false;
    $point = [];
    while ($queue != []){
        $point = array_shift($queue);
        $x = $point[0]; $y = $point[1];
        for ($i = 0; $i < 4; $i++){
            $newX = $x + $dx[$i];
            $newY = $y + $dy[$i];
            if ($newX < 0 || $newX >= $len || $newY < 0 || $newY >= $len || $grid[$newX][$newY] != 0){
                continue;
            }
            $grid[$newX][$newY] = $grid[$x][$y] + 1;
            $hasOcean = true;
            array_push($queue,[$newX,$newY]);
        }
    }

    if ($point == null || !$hasOcean){
        return -1;
    }

    return $grid[$point[0]][$point[1]] - 1;
}

$grid = [[1,0,1],[0,0,0],[1,0,1]];
var_dump(maxDistance($grid));