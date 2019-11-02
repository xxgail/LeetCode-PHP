<?php
/**
 * @Time: 2019/10/29 11:49
 * @DESC: 11. 盛最多水的容器
 * 给定 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0)。找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
 *说明：你不能倾斜容器，且 n 的值至少为 2。
 * @param $height
 * @return int|mixed
 */
function maxArea($height) {
    # 暴力循环法，超出时间限制 〒▽〒
//    $max_area = min($height[0],$height[1]) * 1;
//    for ($i = 0; $i < count($height) - 1; $i++){
//        $left = $i;
//        $right = $i + 1;
//
//        while ($right < count($height)){
//            $max_area = max($max_area,min($height[$left],$height[$right]) * ($right - $left));
//            $right ++;
//        }
//    }
//    return $max_area;

    # 双指针法。 success
    $max_area = 0;
    $left = 0;
    $right = count($height) - 1;
    while ($left < $right){
        $max_area = max($max_area,min($height[$left],$height[$right]) * ($right - $left));
        if($height[$left] < $height[$right]){
            $left ++;
        }else{
            $right --;
        }
    }
    return $max_area;
}