<?php
/**
 * @Time: 2020/6/5 9:56 下午
 * @DESC: 面试题29. 顺时针打印矩阵
 * 输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字。
 *
 * 示例 1：
 * 输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
 * 输出：[1,2,3,6,9,8,7,4,5]
 *
 * 示例 2：
 * 输入：matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]]
 * 输出：[1,2,3,4,8,12,11,10,9,5,6,7]
 * @param $matrix
 * @return array
 * @link https://leetcode-cn.com/problems/shun-shi-zhen-da-yin-ju-zhen-lcof
 */
function spiralOrder($matrix) {
    $h = count($matrix);
    if ($h == 0) {
        return [];
    }

    $w = count($matrix[0]);
    $sum = $w * $h; # 总个数
    $res = [];
    $top = 0;
    $bottom = $h - 1;
    $left = 0;
    $right = $w - 1;
    $c = 0;
    while (true) {
        for ($i = $left; $i <= $right; $i++) {
            $res[] = $matrix[$top][$i];
            $c++;
        }
        $top++;
        if ($c == $sum) {
            break;
        }
        for ($i = $top; $i <= $bottom; $i++) {
            $res[] = $matrix[$i][$right];
            $c++;
        }
        $right--;
        if ($c == $sum) {
            break;
        }
        for ($i = $right; $i >= $left; $i--) {
            $res[] = $matrix[$bottom][$i];
            $c++;
        }
        $bottom--;
        if ($c == $sum) {
            break;
        }
        for ($i = $bottom; $i >= $top; $i--) {
            $res[] = $matrix[$i][$left];
            $c++;
        }
        $left++;
        if ($c == $sum) {
            break;
        }
    }
    return $res;
}