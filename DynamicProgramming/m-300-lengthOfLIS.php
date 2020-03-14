<?php
/**
 * @Time: 2020/3/14 18:19
 * @DESC: 300. 最长上升子序列 中等
 * 给定一个无序的整数数组，找到其中最长上升子序列的长度。
 *
 * 示例:
 * 输入: [10,9,2,5,3,7,101,18]
 * 输出: 4
 * 解释: 最长的上升子序列是 [2,3,7,101]，它的长度是 4。
 *
 * 说明: 可能会有多种最长上升子序列的组合，你只需要输出对应的长度即可。
 * @param $numbers
 * @return int|mixed
 */
function lengthOfLIS($numbers){
    if(count($numbers) <= 1){
        return count($numbers);
    }
    $dp[0] = 1;
    $res = $dp[0];
    for ($i = 1; $i < count($numbers); $i++){
        $max = 0;
        for ($j = 0; $j < $i; $j++){
            if ($numbers[$j] < $numbers[$i]){ # 要跟前面所有比该元素小的dp作比较
                $max = max($max,$dp[$j]);
            }
        }
        $dp[$i] = $max + 1;
        $res = max($res,$dp[$i]);
    }
    return $res;
}

$numbers = [4,10,4,3,8,9];
$numbers = [10,9,2,5,3,7,101,18];
print_r(lengthOfLIS($numbers));

###
# 动态规划！_(:⁍」)_
# 因为这个涉及到了最长的上升子数列，所以没有元素必须是连续的这个要求，就是可以跳过去。
# 所以每遍历到一个元素都要让该元素与前面所有比它小的元素比较一下
# (很显然我为了图方便快捷没有/懒得跟前面所有元素相比，所以才会18/24个通过测试用例)
# 如果前面没有比它小的元素，那选择该值在"上升子序列"中的长度就是1
# so~