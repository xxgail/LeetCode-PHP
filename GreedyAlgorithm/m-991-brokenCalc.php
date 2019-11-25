<?php
/**
 * @Time: 2019/11/25 14:47
 * @DESC: 991. 坏了的计算器
 * 在显示着数字的坏计算器上，我们可以执行以下两种操作：
 * 双倍（Double）：将显示屏上的数字乘 2；
 * 递减（Decrement）：将显示屏上的数字减 1 。
 * 最初，计算器显示数字 X。
 * 返回显示数字 Y 所需的最小操作数。
 * @param $X
 * @param $Y
 * @return int
 */
function brokenCalc($X, $Y) {
    if($X >= $Y){
        return $X-$Y;
    }
    $n = 0;
    while ($X < $Y){
        $n ++;
        if($Y % 2 == 0){
            $Y /= 2;
        }else{
            $Y ++;
        }
    }
    return $n + $X - $Y;
}

##----
# 反向操作。稳！