<?php
/**
 * @Time: 2020/2/5 17:33
 * @DESC: 268. 缺失数字 简单
 * 给定一个包含 0, 1, 2, ..., n 中 n 个数的序列，找出 0 .. n 中没有出现在序列中的那个数。
 **** 你的算法应具有线性时间复杂度。
 * @param $nums
 * @return float|int
 */
function missingNumber($nums) {
    $sum = array_sum($nums);
    // return $sum;
    $len = count($nums);
    $sum1 = $len * ($len + 1) / 2;
    return $sum1 - $sum;
}

###
# 线性时间复杂度 O(n) 即只有一次for循环♻️
# 按数量级递增排列，常见的时间复杂度有：
# 常数阶O(1)
# 对数阶O(log2n)
# 线性阶O(n)
# 线性对数阶O(nlog2n)
# 平方阶O(n2)
# 立方阶O(n3)
# k次方阶O(nk)
# 指数阶O(2n)。
# 随着问题规模n的不断增大，上述时间复杂度不断增大，算法的执行效率越低。