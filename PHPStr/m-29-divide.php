<?php
/**
 * @Time: 2019/9/16 16:39
 * @DESC: 29.中等变态而已
 * 给定两个整数，被除数 dividend 和除数 divisor。
 * 将两数相除，要求不使用乘法、除法和 mod 运算符。
 * 返回被除数 dividend 除以除数 divisor 得到的商。
 * 被除数和除数均为 32 位有符号整数。
 * 除数不为 0。
 * 假设我们的环境只能存储 32 位有符号整数，其数值范围是 [−231,  231 − 1]。
 * 本题中，如果除法结果溢出，则返回 231 − 1。
 * @param $dividend
 * @param $divisor
 * @return float|int
 */
function divide($dividend, $divisor) {
    if($dividend == 0){
        return 0;
    }

    if ($dividend < -2147483647 && $divisor == -1)
        return 2147483647;

    if($dividend > 0 && $divisor > 0 || $dividend < 0 && $divisor < 0){
        $sign = 1;
    }else{
        $sign = -1;
    }

    $dividend = abs($dividend);
    $divisor = abs($divisor);
    if($divisor == 1){
        return $dividend * $sign;
    }

    $result = 0;
    while ($dividend >= $divisor){
        $k = 1;
        $tmp = $divisor;
        #(参考评论大佬的解题思路)本题中，如果除法结果溢出，则返回$max，在子while循环条件中得以利用
        while($dividend >= $tmp+$tmp && $tmp+$tmp>0){
            $tmp += $tmp;
            $k += $k;
        }
        $result += $k;
        $dividend -= $tmp;
    }

    return $sign * $result;
}