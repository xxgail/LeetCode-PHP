<?php
/**
 * @Time: 2020/9/9
 * @DESC: 40. 组合总和 II
 * 给定一个数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。
 * candidates 中的每个数字在每个组合中只能使用一次。
 * 说明：
    所有数字（包括目标数）都是正整数。
    解集不能包含重复的组合。
 * 示例 1:
    输入: candidates = [10,1,2,7,6,1,5], target = 8,
    所求解集为:
    [
    [1, 7],
    [1, 2, 5],
    [2, 6],
    [1, 1, 6]
    ]
 * 示例 2:
    输入: candidates = [2,5,2,1,2], target = 5,
    所求解集为:
    [
    [1,2,2],
    [5]
    ]
 * @param $candidates
 * @param $target
 * @return array
 * @link: https://leetcode-cn.com/problems/combination-sum-ii/
 */
function combinationSum2($candidates, $target) {
    $res = [];
    sort($candidates);
    combinationSum2bt($candidates,$target,[],0,0,$res);
    return $res;
}

function combinationSum2bt($candidates,$target,$path,$sum,$start,&$res){
    if ($sum > $target){
        return;
    }
    if ($sum == $target && !in_array($path,$res)){
        $res[] = $path;
        return;
    }
    for ($i = $start; $i < count($candidates); $i++){
        $path[] = $candidates[$i];
        combinationSum2bt($candidates,$target,$path,$sum + $candidates[$i],$i+1,$res);
        array_pop($path);
    }
}

$candidates = [10,1,2,7,6,1,5];
$target = 8;
var_dump(combinationSum2($candidates,$target));