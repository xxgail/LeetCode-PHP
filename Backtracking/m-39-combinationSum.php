<?php
/**
 * @Time: 2020/9/9
 * @DESC:39. 组合总和
 * 给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。
 * candidates 中的数字可以无限制重复被选取。
 * 说明：
    所有数字（包括 target）都是正整数。
    解集不能包含重复的组合。
 * 示例 1：
    输入：candidates = [2,3,6,7], target = 7,
    所求解集为：
    [
    [7],
    [2,2,3]
    ]
 * 示例 2：
    输入：candidates = [2,3,5], target = 8,
    所求解集为：
    [
    [2,2,2,2],
    [2,3,3],
    [3,5]
    ]
 * @param $candidates
 * @param $target
 * @return array
 * @link: https://leetcode-cn.com/problems/combination-sum/
 */
function combinationSum($candidates, $target) {
    $res = [];
    bt($candidates,$target,[],0,0,$res);
    return $res;
}

function bt($candidates,$target,$path,$sum,$start,&$res){
    if ($sum > $target){
        return;
    }
    if ($sum == $target){
        $res[] = $path;
        return;
    }
    for ($i = $start; $i < count($candidates); $i++){
        $path[] = $candidates[$i];
        bt($candidates,$target,$path,$sum + $candidates[$i],$i,$res);
        array_pop($path);
    }
}

$candidates = [2,3,5];
$target = 8;
var_dump(combinationSum($candidates,$target));