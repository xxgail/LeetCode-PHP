<?php
/**
 * @Time: 2019/9/3 15:01
 * @DESC: 136. 只出现一次的数字 简单
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 * @param $nums
 * @return int|string|null
 */
function singleNumber($nums) {
    // 2020.4.28 原来用位运算就可以了啊orz
    $res = 0;
    for ($i = 0; $i < count($nums); $i++){
        $res ^= $nums[$i];
        var_dump($res);
    }
    return $res;

    // 2019.9.3
    $nums = array_count_values($nums);
    asort($nums); // 倒序
    reset($nums); // reset 将指针移到数组的第一个元素并返回
    $first_key = key($nums);
    return $first_key;
}

var_dump(singleNumber([1,2,5,5,3,2,3]));