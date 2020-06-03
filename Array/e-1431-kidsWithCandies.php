<?php
/**
 * @Time: 2020/6/1 9:32 下午
 * @DESC: 1431. 拥有最多糖果的孩子
 * 给你一个数组 candies 和一个整数 extraCandies ，其中 candies[i] 代表第 i 个孩子拥有的糖果数目。
 * 对每一个孩子，检查是否存在一种方案，将额外的 extraCandies 个糖果分配给孩子们之后，此孩子有 最多 的糖果。注意，允许有多个孩子同时拥有 最多 的糖果数目。
 * 输入：candies = [2,3,5,1,3], extraCandies = 3
 * 输出：[true,true,true,false,true]
 * @param $candies
 * @param $extraCandies
 * @return mixed
 * @link https://leetcode-cn.com/problems/kids-with-the-greatest-number-of-candies
 */
function kidsWithCandies($candies, $extraCandies) {
    $max = max($candies);
    for($i = 0; $i < count($candies); $i++){
        $candies[$i] = ($max - $candies[$i]) <= $extraCandies;
    }
    return $candies;
}