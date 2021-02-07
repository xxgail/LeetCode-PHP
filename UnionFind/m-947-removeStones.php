<?php
/**
 * @Time: 2021/1/15
 * @DESC: 947. 移除最多的同行或同列石头
 * n 块石头放置在二维平面中的一些整数坐标点上。每个坐标点上最多只能有一块石头。
 * 如果一块石头的 同行或者同列 上有其他石头存在，那么就可以移除这块石头。
 * 给你一个长度为 n 的数组 stones ，其中 stones[i] = [xi, yi] 表示第 i 块石头的位置，返回 可以移除的石子 的最大数量。
 * 示例 1：
    输入：stones = [[0,0],[0,1],[1,0],[1,2],[2,1],[2,2]]
    输出：5
 * @param $stones
 * @return int
 * @link: https://leetcode-cn.com/problems/most-stones-removed-with-same-row-or-column/
 * 提示：
    1 <= stones.length <= 1000
    0 <= xi, yi <= 10000
    不会有两块石头放在同一个坐标点上
 */
function removeStones($stones) {
    $father = [];
    $rank = [];
    foreach ($stones as $stone) {
        union($stone[0],$stone[1] + 10000, $father, $rank);
    }
    $res = count($stones);
    foreach ($father as $k => $item) {
        if ($k == $item) {
            $res--;
        }
    }
    return $res;
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
    if ($fx == $fy) return;
    if ($rank[$fx] < $rank[$fy]) {
        $rank[$fy] += $rank[$fx];
        $father[$fx] = $fy;
    }else {
        $rank[$fx] += $rank[$fy];
        $father[$fy] = $fx;
    }
}

$stones = [[0,0],[0,1],[1,0],[1,2],[2,1],[2,2]];
//$stones = [[0,0],[0,2],[1,1],[2,0],[2,2]];
//$stones = [[0,0]];
var_dump(removeStones($stones));