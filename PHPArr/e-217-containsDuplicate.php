<?php

/**
 * @Time: 2019/9/14 22:04
 * @DESC: 217. 存在重复元素
 * 给定一个整数数组，判断是否存在重复元素。
 * 如果任何值在数组中出现至少两次，函数返回 true。
 * 如果数组中每个元素都不相同，则返回 false。
 * @param $nums
 * @return bool
 */
function containsDuplicate($nums) {
    for ($i = 0; $i < count($nums); $i++){
        if(array_search($nums[$i],$nums) != $i){
            return true;
        }
    }
    return false;
}