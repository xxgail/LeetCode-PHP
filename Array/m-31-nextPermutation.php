<?php
/**
 * @Time: 2019/10/23 22:52
 * @DESC: 31 下一个排列
 * 实现获取下一个排列的函数，算法需要将给定数字序列重新排列成字典序中下一个更大的排列。
 * 如果不存在下一个更大的排列，则将数字重新排列成最小的排列（即升序排列）。
 * 必须原地修改，只允许使用额外常数空间。
 * 以下是一些例子，输入位于左侧列，其相应输出位于右侧列。
 * @param $nums
 * @link https://leetcode-cn.com/problems/next-permutation/
 */
function nextPermutation(&$nums) {
    
    $left = '';
    for($i = count($nums) - 1; $i > 0; $i--) {
        if ($nums[$i] <= $nums[$i - 1]) {
            continue;
        } else {
            $left = $i - 1;
            break;
        }
    }
    if($left === ''){
        $nums = array_reverse($nums);
    } else{
        $right = '';
        for ($i = count($nums) - 1; $i > $left; $i--){
            if($nums[$i] <= $nums[$left]){
                continue;
            }else{
                $right = $i;
                break;
            }
        }
        $a = $nums[$left];
        $nums[$left] = $nums[$right];
        $nums[$right] = $a;

        $arr1 = array_slice($nums,0,$left + 1);
        $arr2 = array_reverse(array_splice($nums,$left + 1));

        $nums = array_merge($arr1,$arr2);
    }
}

## 136542
# 从后往前找，找到第一个不是递增的数的坐标，即为要更换的数，即为3
# 在后面的数中找到第一个比3大的数：4
# 将3 4 位置调换。
# 将4 后面的数字按照升序排列