<?php
/**
 * @Time: 2019/9/11 13:47
 * @DESC: 46. 全排列 中等
 * 给定一个没有重复数字的序列，返回其所有可能的全排列。
 * @param $nums
 * @return array
 */
function permute($nums){
    $result = [];
    permuteFunc($nums,[],$result);
    return $result;
}

function permuteFunc($nums,$data,&$result) {
    if(count($nums) == count($data)){
        array_push($result,$data);
        return $result;
    }
    for ($i = 0; $i < count($nums); $i++){
        if(in_array($nums[$i],$data)){
            continue;
        }

        array_push($data,$nums[$i]);
        permuteFunc($nums,$data,$result);
        array_pop($data);
    }
}