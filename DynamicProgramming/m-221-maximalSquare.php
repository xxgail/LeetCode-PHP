<?php
/**
 * @Time: 2020/5/9 14:17
 * @DESC: 221. 最大正方形
 * 在一个由 0 和 1 组成的二维矩阵内，找到只包含 1 的最大正方形，并返回其面积。
 * 示例:
 * 输入:
   1 0 1 0 0
   1 0 1 1 1
   1 1 1 1 1
   1 0 0 1 0
 * 输出: 4
 * @param $matrix
 * @return float|int
 * @link: https://leetcode-cn.com/problems/maximal-square
 */
function maximalSquare($matrix) {
    $max = max($matrix[0][0] ?? 0, $matrix[0][1] ?? 0, $matrix[1][0] ?? 0);
    for ($i = 1; $i < count($matrix); $i++) {
        for ($j = 1; $j < count($matrix[$i]); $j++) {
            if ($matrix[$i][$j] == 1) {
                $matrix[$i][$j] = min($matrix[$i - 1][$j], $matrix[$i][$j - 1], $matrix[$i - 1][$j - 1]) + 1;
                $max = max($max, $matrix[$i][$j]);
            }
        }
    }

    return $max * $max;
}

$matrix = ['0','1'];
var_dump(maximalSquare($matrix));

### 二维数组动态规划，参考题解。