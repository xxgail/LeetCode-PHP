<?php

/**
 * @Time: 2019/10/17 11:40
 * @DESC: 287. 寻找重复数
 * 给定一个包含 n + 1 个整数的数组 nums，其数字都在 1 到 n 之间（包括 1 和 n），可知至少存在一个重复的整数。假设只有一个重复的整数，找出这个重复的数。
 * @param $nums
 * @return mixed
 */
function findDuplicate($nums) {
    // 不能改变原数组的值
    sort($nums);
    for ($i = 0; $i < count($nums) - 1; $i++){
        if($nums[$i] == $nums[$i+1]){
            return $nums[$i];
        }
    }
}