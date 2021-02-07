<?php
/**
 * @Time: 2021/1/22
 * @DESC: 989. 数组形式的整数加法
 * 对于非负整数 X 而言，X 的数组形式是每位数字按从左到右的顺序形成的数组。例如，如果 X = 1231，那么其数组形式为 [1,2,3,1]。
 * 给定非负整数 X 的数组形式 A，返回整数 X+K 的数组形式。
 * 示例 1：
    输入：A = [1,2,0,0], K = 34
    输出：[1,2,3,4]
    解释：1200 + 34 = 1234
 * @param $A
 * @param $K
 * @return array
 * @link: https://leetcode-cn.com/problems/add-to-array-form-of-integer/
 */
function addToArrayForm($A, $K) {
    # 解法一：精度计算
    return str_split(bcadd(implode('',$A), $K));

    # 解法二：..
    $K = str_split($K);
    $add = 0;
    $res = [];
    while ($A || $K || $add) {
        $a = $A ? array_pop($A) : 0;
        $k = $K ? array_pop($K) : 0;
        $sum = $a + $k + $add;
        $add = intval($sum / 10);
        $sum %= 10;
        array_unshift($res, $sum);
    }
    return $res;
}

$A = [2,1,5];
$K = 806;
var_dump(addToArrayForm($A,$K));