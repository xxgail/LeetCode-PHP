<?php
/**
 * @Time: 2020/9/9
 * @DESC:216. 组合总和 III
 * 找出所有相加之和为 n 的 k 个数的组合。
 * 组合中只允许含有 1 - 9 的正整数，并且每种组合中不存在重复的数字。
 * 说明：
    所有数字都是正整数。
    解集不能包含重复的组合。
 * 示例 1:
    输入: k = 3, n = 7
    输出: [[1,2,4]]
 * 示例 2:
    输入: k = 3, n = 9
    输出: [[1,2,6], [1,3,5], [2,3,4]]
 * @param $k
 * @param $n
 * @return array
 * @link: https://leetcode-cn.com/problems/combination-sum-iii/
 */
function combinationSum3($k, $n) {
    if ($n / $k > 9){
        return [];
    }
    $res = [];
    combinationSum3BT($k,$n,1,[],0,$res);
    return $res;
}

function combinationSum3BT($k, $n, $start, $path, $sum, &$res) {
    if ($sum > $n) {
        return;
    }
    if ($k < 0) {
        return;
    }
    if ($sum == $n && $k == 0) {
        $res[] = $path;
    }
    for ($i = $start; $i <= 9; $i++) {
        $path[] = $i;
        combinationSum3BT($k-1,$n,$i+1,$path,$sum+$i,$res);
        array_pop($path);
    }
}

var_dump(combinationSum3(3,25));