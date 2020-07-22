<?php
/**
 * @Time: 2020/7/22 12:42
 * @DESC: 剑指Offer11. 旋转数组的最小数字
 * 把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。输入一个递增排序的数组的一个旋转，输出旋转数组的最小元素。例如，数组 [3,4,5,1,2] 为 [1,2,3,4,5] 的一个旋转，该数组的最小值为1。  
 * 示例 1：
    输入：[3,4,5,1,2]
    输出：1
 *
 * 示例 2：
    输入：[2,2,2,0,1]
    输出：0
 * @param $numbers []int
 * @return mixed int
 * @link: https://leetcode-cn.com/problems/xuan-zhuan-shu-zu-de-zui-xiao-shu-zi-lcof
 */
function minArray($numbers) {
    $left = 0;
    $right = count($numbers)-1;
    while ($left < $right){
        $mid = floor(($left + $right) / 2);
        if ($numbers[$mid] > $numbers[$right]){
            $left = $mid + 1;
        }else if ($numbers[$mid] < $numbers[$right]){
            $right = $mid;
        }else {
            $right--;
        }
    }
    return $numbers[$left];
}

$numbers = [2,2,-1,0,1];
var_dump(minArray($numbers));