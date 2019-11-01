<?php
/**
 * @Time: 2019/11/1 13:48
 * @DESC: 279. 完全平方数
 * 给定正整数 n，找到若干个完全平方数（比如 1, 4, 9, 16, ...）使得它们的和等于 n。
 * 你需要让组成和的完全平方数的个数最少。
 * 示例 1:
 * 输入: n = 12
 * 输出: 3
 * 解释: 12 = 4 + 4 + 4.
 * @param $n
 * @return int
 */
function numSquares($n) { # todo: 超出时间限制 ╥﹏╥
    $min = $n;
    numSquaresFunc($n,0,$min);
    return $min;
}

function numSquaresFunc($n,$res,&$min){
    $k = ceil(sqrt($n));
    if(pow($k,2) == $n){
        if($res + 1 < $min){
            $min = $res + 1;
        }
        return;
    }
    for ($i = $k-1; $i >= ceil(sqrt($k)); $i--){
        numSquaresFunc($n - pow($i,2),$res+1,$min);
    }
}

##----
# 动态规划。
# 可能我想的方向还是不对。