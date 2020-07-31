<?php
/**
 * @Time: 2020/7/30 9:29
 * @DESC: 343. 整数拆分
 * 给定一个正整数 n，将其拆分为至少两个正整数的和，并使这些整数的乘积最大化。 返回你可以获得的最大乘积。
 * 示例 1:
    输入: 2
    输出: 1
    解释: 2 = 1 + 1, 1 × 1 = 1。
 * 示例 2:
    输入: 10
    输出: 36
    解释: 10 = 3 + 3 + 4, 3 × 3 × 4 = 36。
 * @param $n
 * @return mixed
 * @link: https://leetcode-cn.com/problems/integer-break
 */
function integerBreak($n) {
    $dp = array_fill(0,$n+1,0);
    for ($i = 2; $i <= $n; $i++){
        for ($j = 1; $j < $i; $j++){
            $dp[$i] = max($dp[$i],$j * ($i - $j), $j * $dp[$i-$j]);
        }
    }
    return $dp[$n];
}