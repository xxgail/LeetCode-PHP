<?php
/**
 * @Time: 2021/2/22
 * @DESC: 766. 托普利茨矩阵
 * 给你一个 m x n 的矩阵 matrix 。如果这个矩阵是托普利茨矩阵，返回 true ；否则，返回 false 。
 * 如果矩阵上每一条由左上到右下的对角线上的元素都相同，那么这个矩阵是 托普利茨矩阵 。
 * @param $matrix
 * @return bool
 * @link: https://leetcode-cn.com/problems/toeplitz-matrix/
 */
function isToeplitzMatrix($matrix) {
    $m = count($matrix);
    $n = count($matrix[0]);
    for($i = 0; $i < $m; $i++) {
        for($j = 0; $j < $n; $j++) {
            if($i > 0 && $j > 0 && $matrix[$i-1][$j-1] != $matrix[$i][$j]) return false;
        }
    }
    return true;

    $m = count($matrix);
    $n = count($matrix[0]);
    for($j = 0; $j < $n-1; $j++) {
        $tmp = $matrix[0][$j];
        $i = 1;
        while($i < $m && $i + $j < $n) {
            if($matrix[$i][$i+$j] != $tmp) {
                return false;
            }
            $i++;
        }
    }
    for($i = 1; $i < $m-1; $i++) {
        $tmp = $matrix[$i][0];
        $j = 1;
        while($j < $n && $i + $j < $m) {
            if($matrix[$i+$j][$j] != $tmp) {
                return false;
            }
            $j++;
        }
    }
    return true;
}