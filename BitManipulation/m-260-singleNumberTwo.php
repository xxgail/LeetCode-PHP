<?php
# https://leetcode-cn.com/problems/single-number-iii/
# https://leetcode-cn.com/problems/shu-zu-zhong-shu-zi-chu-xian-de-ci-shu-lcof/
/**
 * @Time: 2019/10/15 11:48
 * @DESC: 260. 只出现一次的数字 ③
 * 给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。
 * 找出只出现一次的那两个元素。
 *
 * @Time: 2020/04/28 21:20
 * @DESC: 面试题60-1. 数组中数字出现的次数
 * 一个整型数组 nums 里除两个数字之外，其他数字都出现了两次。
 * 请写程序找出这两个只出现一次的数字。
 * 要求时间复杂度是O(n)，空间复杂度是O(1)。
 * @param $nums
 * @return array
 */
function singleNumberTwo($nums) {
    $res = 0;
    $len = count($nums);
    for ($i = 0; $i < $len; $i++) {
        $res ^= $nums[$i]; // 1^0 = 1  1^1 = 0  0^0 = 0
    }

    $index = 1;
    while (($res & $index) == 0) {
        $index <<= 1; // 左移一次乘以2
    }

    $r1 = $r2 = 0;
    for ($i = 0; $i < $len; $i++) {
        if (($nums[$i] & $index) == 0) {
            $r1 ^= $nums[$i];
        } else {
            $r2 ^= $nums[$i];
        }
    }

    return [$r1, $r2];

//    $data = [];
//    $nums = array_count_values($nums);
//    foreach ($nums as $k => $num) {
//        if($num == 1){
//            $data[] = $k;
//        }
//    }
//    return $data;
}

var_dump(singleNumberTwo([1,2,10,4,1,4,3,3]));//[2,10]