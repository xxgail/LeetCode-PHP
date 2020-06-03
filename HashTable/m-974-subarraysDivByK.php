<?php
/**
 * @Time: 2020/6/3 9:50 下午
 * @DESC: 974. 和可被K整除的子数组
 * 给定一个整数数组 A，返回其中元素之和可被 K 整除的（连续、非空）子数组的数目。
 * @param $A
 * @param $K
 * @return int
 * @link https://leetcode-cn.com/problems/subarray-sums-divisible-by-k/
 */
function subarraysDivByK($A, $K) {
    $sum = 0;
    $res = 0;
    $record = [0 => 1];
    for ($i = 0; $i < count($A); $i++) {
        $sum += $A[$i];
        $modulus = ($sum % $K + $K) % $K;
        $res += ($record[$modulus] ?? 0);
        $record[$modulus] = ($record[$modulus] ?? 0) + 1;
    }
    return $res;
}