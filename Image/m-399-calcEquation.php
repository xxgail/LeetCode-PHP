<?php
/**
 * @Time: 2021/1/6
 * @DESC: 399. 除法求值
 * 给你一个变量对数组 equations 和一个实数值数组 values 作为已知条件，其中 equations[i] = [Ai, Bi] 和 values[i] 共同表示等式 Ai / Bi = values[i] 。每个 Ai 或 Bi 是一个表示单个变量的字符串。
 * 另有一些以数组 queries 表示的问题，其中 queries[j] = [Cj, Dj] 表示第 j 个问题，请你根据已知条件找出 Cj / Dj = ? 的结果作为答案。
 * 返回 所有问题的答案 。如果存在某个无法确定的答案，则用 -1.0 替代这个答案。
 * 注意：输入总是有效的。你可以假设除法运算中不会出现除数为 0 的情况，且不存在任何矛盾的结果。
 * 示例 1：
    输入：equations = [["a","b"],["b","c"]], values = [2.0,3.0], queries = [["a","c"],["b","a"],["a","e"],["a","a"],["x","x"]]
    输出：[6.00000,0.50000,-1.00000,1.00000,-1.00000]
 * @param $equations
 * @param $values
 * @param $queries
 * @return array
 * @link: https://leetcode-cn.com/problems/evaluate-division/
 */
function calcEquation($equations, $values, $queries) {
    $hash_id = [];
    $image = [];
    $count = 0;
    foreach ($equations as $k => $equation) {
        $a = $equation[0];
        $b = $equation[1];
        if (!isset($hash_id[$a])) {
            $hash_id[$a] = $count;
            $count++;
        }
        if (!isset($hash_id[$b])) {
            $hash_id[$b] = $count;
            $count++;
        }
        $v = $hash_id[$a];
        $w = $hash_id[$b];
        if (isset($image[$v])) {
            $image[$v][] = [
                'to' => $w,
                'weight' => $values[$k],
            ];
        }else{
            $image[$v] = [[
                'to' => $w,
                'weight' => $values[$k],
            ]];
        }
        if (isset($image[$w])) {
            $image[$w][] = [
                'to' => $v,
                'weight' => 1 / $values[$k],
            ];
        }else{
            $image[$w] = [[
                'to' => $v,
                'weight' => 1 / $values[$k],
            ]];
        }
    }
    var_dump($image);
    $res = [];
    foreach ($queries as $k => $query) {
        if (isset($hash_id[$query[0]]) && isset($hash_id[$query[1]])) {
            $res[] = bfs($hash_id[$query[0]],$hash_id[$query[1]],$image);
        }else {
            $res[] = -1;
        }
    }
    return $res;
}

function bfs($start,$end, $image) {
    $ratios = array_fill(0,count($image),'1');
    $ratios[$start] = 1;
    $q = [$start];
    while ($q) {
        $v = array_shift($q);
        if ($v == $end) {
            return $ratios[$v];
        }
        foreach ($image[$v] as $item) {
            $w = $item['out'];
            if (isset($ratios[$w]) && $ratios[$w] == '1') {
                $ratios[$w] = $ratios[$v] * $item['val'];
                array_push($q,$w);
            }
        }
    }
    return -1;
}

$equations = [["a","b"],["e","f"],["b","e"],["x","y"]];
$values = [3.4,1.4,2.3,1];
$queries = [["b","a"],["a","f"],["f","f"],["e","e"],["c","c"],["a","c"],["f","e"],["a","x"]];
var_dump(calcEquation($equations,$values,$queries));