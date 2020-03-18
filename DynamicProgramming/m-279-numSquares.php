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
function numSquares($n) {
    $dp = [];
    $dp[0] = 0;
    $dp[1] = 1;
    for ($i = 2; $i <= $n; $i++) {
        $min = $n; // 初始化为n，就是全部由1组成
        for ($j = 1; $j * $j <= $i; $j++) {
            if ($j * $j == $i) {
                $min = 1;
                break;
            }
            $min = min($min, $dp[$j * $j] + $dp[$i - $j * $j]);
        }
        $dp[$i] = $min;
    }

    return $dp[$n];
}

##----
# 动态规划。


// 超出时间限制 ╥﹏╥
//    $min = $n;
//    numSquaresFunc($n,0,$min);
//    return $min;
function numSquaresFunc($n,$res,&$min){
    if($n == 0){
        if($res < $min){
            $min = $res;
        }
        return;
    }
    $k = ceil(sqrt($n));
    if(pow($k,2) == $n){
        if($res + 1 < $min){
            $min = $res + 1;
        }
        return;
    }

    for ($i = $k-1; $i >= (($k > 4) ? ceil(sqrt($k)) : floor(sqrt($k))); $i--){
        numSquaresFunc($n - pow($i,2),$res+1,$min);
    }
}

// 数学的解法，评论区的大佬真的是什么都会
function numSquaresMath($n){
    while ($n % 4 === 0) {
        $n /= 4;
    }
    if ($n % 8 === 7) { // 参考28（25+1+1+1），除以4 = 7（1+4+1+1）
        return 4;
    }

    $a = 0;
    while ($a * $a <= $n) { // 注意条件
        $b = (int)sqrt($n - $a * $a);
        if ($a*$a + $b*$b === $n) {
            return !!$a + !!$b; // 其实就是返回2或者1
//            return ($a?1:0) + ($b?1:0); // 相当于这个
        }
        $a++;
    }

    return 3;
}

var_dump(numSquaresMath(25));

### tips
# !!$a 双感叹号代表 !(!$a)，表示真实存在的数据转换成布尔值。就是如果a>0就返回1，=0就返回0。