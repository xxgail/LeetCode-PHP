<?php

/**
 * @Time: 2019/10/11 18:01
 * @DESC: 78. 子集 中等
 * 给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 * 说明：解集不能包含重复的子集。
 *
 * 类似于全排列。
 * 用到的也是回溯法
 * @param $nums
 * @return array
 */
function subsets($nums) {
    $current=[];
    $res=[];
    subsetsFunc($nums,0,$current,$res);
    return $res;
}

function subsetsFunc($nums,$index,&$current,&$res)
{
    $res[] = $current;
    for($i=$index;$i<count($nums);$i++){ #
        $current[] = $nums[$i];
        subsetsFunc($nums,$i+1,$current,$res);
        array_pop($current);
    }
}
