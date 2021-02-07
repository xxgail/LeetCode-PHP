<?php
/**
 * @Time: 2021/1/19
 * @DESC: 1584. 连接所有点的最小费用
 * 给你一个points 数组，表示 2D 平面上的一些点，其中 points[i] = [xi, yi] 。
 * 连接点 [xi, yi] 和点 [xj, yj] 的费用为它们之间的 曼哈顿距离 ：|xi - xj| + |yi - yj| ，其中 |val| 表示 val 的绝对值。
 * 请你返回将所有点连接的最小总费用。只有任意两点之间 有且仅有 一条简单路径时，才认为所有点都已连接。
 * @param $points
 * @return int|mixed
 * @link:https://leetcode-cn.com/problems/min-cost-to-connect-all-points/
 */
function minCostConnectPoints($points) {
    $len = count($points);
    $edges = [];
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i+1; $j < $len; $j++) {
            $edges[] = [
                'v' => $i,
                'w' => $j,
                'dis' => dist($points[$i],$points[$j]),
            ];
        }
    }
    usort($edges, function ($a, $b) use ($edges) {
        return $a['dis'] > $b['dis'];
    });
    $parent = [];
    $rank = [];
    $res = 0;
    foreach ($edges as $edge) {
        if (union($edge['v'], $edge['w'],$parent, $rank)) {
            $res += $edge['dis'];
            $len--;
            if ($len == 1) {
                break;
            }
        }
    }
    return $res;
}

function dist($from, $to) {
    return abs($from[0] - $to[0]) + abs($from[1]-$to[1]);
}

function find($x, &$father, &$rank) {
    if (!isset($father[$x])) {
        $father[$x] = $x;
        $rank[$x] = 1;
    }
    if ($father[$x] != $x) {
        $father[$x] = find($father[$x],$father,$rank);
    }
    return $father[$x];
}

function union($x, $y, &$father, &$rank) {
    $fx = find($x,$father,$rank);
    $fy = find($y,$father,$rank);
    if ($fx == $fy) return false;
    if ($rank[$fx] < $rank[$fy]) {
        $rank[$fy] += $rank[$fx];
        $father[$fx] = $fy;
    }else {
        $rank[$fx] += $rank[$fy];
        $father[$fy] = $fx;
    }
    return true;
}
$points = [[0,0],[2,2],[3,10],[5,2],[7,0]];
var_dump(minCostConnectPoints($points));