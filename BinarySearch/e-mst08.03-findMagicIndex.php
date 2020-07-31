<?php
/**
 * @Time: 2020/7/31 17:23
 * @DESC: 面试题 08.03. 魔术索引
 * 魔术索引。 在数组A[0...n-1]中，有所谓的魔术索引，满足条件A[i] = i。
 * 给定一个有序整数数组，编写一种方法找出魔术索引，若有的话，在数组A中找出一个魔术索引，如果没有，则返回-1。
 * 若有多个魔术索引，返回索引值最小的一个。
 * 示例1:
    输入：nums = [0, 2, 3, 4, 5]
    输出：0
    说明: 0下标的元素为0
 * 示例2:
    输入：nums = [1, 1, 1]
    输出：1
 * @param $nums
 * @return int
 * @link: https://leetcode-cn.com/problems/magic-index-lcci
 */
function findMagicIndex($nums) {
    # 遍历
    foreach($nums as $k=>$v){
        if($k == $v){
            return $v;
        }
    }
    return -1;

    # 二分
    return getAnswer($nums,0,count($nums)-1);
}

function getAnswer($nums,$left,$right) {
    if ($left > $right){
        return -1;
    }
    $mid = floor(($left + $right) / 2);
    $leftAnswer = getAnswer($nums,$left,$mid-1);
    if ($leftAnswer != -1){
        return $leftAnswer;
    }elseif ($nums[$mid] == $mid){
        return $mid;
    }
    return getAnswer($nums,$mid+1,$right);
}