<?php
/**
 * @Time: 2020/8/25
 * @DESC: 491. 递增子序列
 * 给定一个整型数组, 你的任务是找到所有该数组的递增子序列，递增子序列的长度至少是2。
 * 示例:
    输入: [4, 6, 7, 7]
    输出: [[4, 6], [4, 7], [4, 6, 7], [4, 6, 7, 7], [6, 7], [6, 7, 7], [7,7], [4,7,7]]
 * 说明:
 * 给定数组的长度不会超过15。
 * 数组中的整数范围是[-100,100]。
 * 给定数组中可能包含重复数字，相等的数字应该被视为递增的一种情况。
 * @param $nums
 * @return array
 * @link: https://leetcode-cn.com/problems/increasing-subsequences
 */
function findSubsequences($nums) {
    $result = [];
    findSubsequencesBT($nums,0,[],$result);
    return array_values($result);
}

# 回溯解法
function findSubsequencesBT($nums,$i,$res,&$result){
    if (count($res) > 1){
        $result[implode(',',$res)] = $res; # hash表去重
    }

    for ($j = $i; $j < count($nums); $j++){
        if ($res == [] || end($res) <= $nums[$j]){
            array_push($res,$nums[$j]);
            helper($nums,$j+1,$res,$result);
            array_pop($res);
        }
    }
}

$start_time = time();
$nums = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
//$nums = [4,4,6,7];
var_dump(findSubsequences($nums));
$end_time = time();
var_dump('消耗时间：'.$end_time-$start_time);

###
# 类似于全排列，所以还是回溯算法