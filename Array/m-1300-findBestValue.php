<?php
# https://leetcode-cn.com/problems/sum-of-mutated-array-closest-to-target/
/**
 * @Time: 2020/3/24 18:11
 * @DESC: 1300. 转变数组后最接近目标值的数组和 中等
 * 给你一个整数数组 arr 和一个目标值 target ，请你返回一个整数 value ，使得将数组中所有大于 value 的值变成 value 后，数组的和最接近  target （最接近表示两者之差的绝对值最小）。
 * 如果有多种使得和最接近 target 的方案，请你返回这些整数中的最小值。
 * 请注意，答案不一定是 arr 中的数字。
 * @param $arr
 * @param $target
 * @return int
 */
function findBestValue($arr, $target){
    # 1.
    if (array_sum($arr) <= $target){
        return max($arr);
    }

    # 2.
    $avg = round($target / count($arr));
    if ($avg <= min($arr)){
        return $avg;
    }

    # 3.
    $surplus = $target - min($arr);
    $surplus_count = count($arr)-1;
    return ($surplus % $surplus_count > $surplus_count / 2) ? ceil($surplus / $surplus_count) : floor($surplus / $surplus_count);
}

# 第一种情况
$arr = [2,3,5];
$target = 10;
var_dump(findBestValue($arr,$target));

# 第二种情况
$arr = [4,9,3];
$target = 10;
var_dump(findBestValue($arr,$target));

# 以下两个例子满足第三种情况
# floor
$arr = [1547,83230,57084,93444,70879];
$target = 71237;
var_dump(findBestValue($arr,$target)); // 17422

# ceil
$arr = [40091,2502,74024,53101,60555,33732,23467,40560,32693,13013];
$target = 78666;
var_dump(findBestValue($arr,$target)); // 8463
