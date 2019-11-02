<?php

/**
 * @Time: 2019/9/10 16:33
 * @DESC: 47. 全排列② 中等
 * 给定一个可包含重复数字的序列，返回所有不重复的全排列。
 * @param $nums
 * @return array
 */
function permuteUnique($nums){
    if(empty($nums)){
        return [];
    }
    $res = [];
    permuteUniqueFunc($nums,0,[],$res);
    return $res;
}

function permuteUniqueFunc($nums,$index,$current,&$res)
{
    $len = count($nums);
    if($index >= $len && !in_array($current,$res)){
        $res[] = $current;
        return;
    }
    for($i = $index;$i < $len;$i++){
        $current[$index] = $nums[$i];
        [$nums[$i],$nums[$index]] = [$nums[$index],$nums[$i]];
        permuteUniqueFunc($nums,$index+1,$current,$res);
    }
}