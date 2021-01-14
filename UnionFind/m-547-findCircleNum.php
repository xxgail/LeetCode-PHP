<?php
/**
 * @Time: 2021/1/7
 * @DESC: 547. 省份数量
 * 有 n 个城市，其中一些彼此相连，另一些没有相连。如果城市 a 与城市 b 直接相连，且城市 b 与城市 c 直接相连，那么城市 a 与城市 c 间接相连。
 * 省份 是一组直接或间接相连的城市，组内不含其他没有相连的城市。
 * 给你一个 n x n 的矩阵 isConnected ，其中 isConnected[i][j] = 1 表示第 i 个城市和第 j 个城市直接相连，而 isConnected[i][j] = 0 表示二者不直接相连。
 * 返回矩阵中 省份 的数量。
 * 示例 1：
    输入：isConnected = [[1,1,0],[1,1,0],[0,0,1]]
    输出：2
 * @param $isConnected
 * @return int
 * @link: https://leetcode-cn.com/problems/number-of-provinces/
 */
function findCircleNum($isConnected) {
    $len = count($isConnected);
    $visited = array_fill(0,$len,false);
    $res = 0;
    $queue = [];
    for ($i = 0; $i < $len; $i++) {
        if (!$visited[$i]) {
            array_push($queue,$i);
            while ($queue) {
                $ii = array_shift($queue);
                $visited[$ii] = true;
                for ($j = 0; $j < $len; $j++) {
                    if ($isConnected[$ii][$j] == 1 && !$visited[$j]) {
                        array_push($queue,$j);
                    }
                }
            }
            $res++;
        }
    }
    return $res;
}


# -------------------- 并查集解法
function find($x,&$parent) {
    if ($x == $parent[$x]) {
        return $x;
    }else {
        $parent[$x] = find($parent[$x],$parent);
        return $parent[$x];
    }
}

function union($i,$j,&$parent) {
    $x = find($i,$parent);
    $y = find($j,$parent);
    $parent[$x] = $y;
}

function findCircleNum1($isConnected) {
    $len = count($isConnected);
    $parent = range(0, $len-1);
    $res = 0;
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i+1; $j < $len; $j++) {
            if ($isConnected[$i][$j] == 1) {
                union($i,$j,$parent);
            }
        }
    }
    foreach ($parent as $k => $item) {
        $res += $k == $item;
    }
    return $res;
}

$isConnected = [[1,0,0],[0,1,0],[0,0,1]];
var_dump(findCircleNum1($isConnected));