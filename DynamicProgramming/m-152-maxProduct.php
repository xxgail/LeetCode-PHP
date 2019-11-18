<?php
/**
 * @Time: 2019/11/15 14:50
 * @DESC: 152. 乘积最大子序列
 * 给定一个整数数组 nums ，找出一个序列中乘积最大的连续子序列（该序列至少包含一个数）。
 * 示例 1:
 * 输入: [2,3,-2,4]
 * 输出: 6
 * 解释: 子数组 [2,3] 有最大乘积 6。
 *
 * 示例 2:
 * 输入: [-2,0,-1]
 * 输出: 0
 * 解释: 结果不能为 2, 因为 [-2,-1] 不是子数组。
 * @param $nums
 * @return mixed
 */
function maxProduct($nums) {
    $max = PHP_INT_MIN; # int类型的最小值
    $imax = 1;
    $imin = 1;
    foreach($nums as $num){
        if($num < 0){
            list($imax,$imin) = [$imin,$imax];
        }
        $imax = max($num,$imax * $num);
        $imin = min($num,$imin * $num);
        $max = max($max, $imax);
    }
    return $max;
}

##---
# 题解中的思路
# 标签：动态规划
# 遍历数组时计算当前最大值，不断更新
# 令imax为当前最大值，则当前最大值为 imax = max(imax * nums[i], nums[i])
# 由于存在负数，那么会导致最大的变最小的，最小的变最大的。因此还需要维护当前最小值imin，imin = min(imin * nums[i], nums[i])
# 当负数出现时则imax与imin进行交换再进行下一步计算
# 时间复杂度：O(n)