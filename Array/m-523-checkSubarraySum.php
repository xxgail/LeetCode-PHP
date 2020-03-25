<?php
#https://leetcode-cn.com/problems/continuous-subarray-sum/
/**
 * @Time: 2020/3/25 13:25
 * @DESC: 523. 连续的字数组和 中等
 * 给定一个包含非负数的数组和一个目标整数 k，编写一个函数来判断该数组是否含有连续的子数组。
 * 其大小至少为 2，总和为 k 的倍数，即总和为 n*k，其中 n 也是一个整数。
 * @param $nums
 * @param $k
 * @return bool
 */
function checkSubarraySum($nums,$k){
    # 暴力解法（双循环）
    if (count($nums) < 2){
        return false;
    }
    for ($i = 1; $i < count($nums); $i++){
        $res = $nums[$i];
        for ($j = $i - 1; $j >= 0; $j--){
            $res += $nums[$j];
            if ($res == $k || $res % $k == 0){
                return true;
            }
        }
    }
    return false;
}

$nums = [5,2,5,3,1];
$k = 6;
var_dump(checkSubarraySumH($nums,$k));

$nums = [0,0,0,0,0];
$k = 0;
var_dump(checkSubarraySumH($nums,$k));


/**
 * @Time: 2020/3/25 15:52
 * @DESC: 题解中看到的，用hash表来解决
 * @param $nums
 * @param $k
 * @return bool
 */
function checkSubarraySumH($nums,$k){
    $sum = 0;
    $hash = [];
    $hash[0] = -1;
    for ($i = 0; $i < count($nums); $i++) {
        $sum += $nums[$i];
        if ($k != 0)
            $sum = $sum % $k;

        if (isset($hash[$sum])) {
            if ($i - $hash[$sum] > 1) return true;
        } else {
            $hash[$sum] = $i;
        }
    }
    return false;
}

# nums = [5,2,5,3,1]; k = 6
# i  nums[i]  sum  sum%k   hash
# -  -        0    -       0=>-1
# 0  5        5    5       0 => -1, 5 => 0
# 1  2        7    1       0 => -1, 5 => 0, 1 => 1
# 2  5        12   0       存在0，2-(-1) = 3 > 1 return true