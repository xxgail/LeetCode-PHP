<?php
/**
 * @Time: 2019/10/15 15:48
 * @DESC: 537. 复数乘法 中等
 * 给定两个表示复数的字符串。
 * 返回表示它们乘积的字符串。注意，根据定义 i2 = -1 。
 * @param $a
 * @param $b
 * @return string
 */
function complexNumberMultiply($a, $b) {
    $a = explode('+',$a);
    $b = explode('+',$b);
    $a_s = $a[0];
    $a_x = rtrim($a[1],'i');
    $b_s = $b[0];
    $b_x = rtrim($b[1],'i');

    $s = $a_s * $b_s - $a_x * $b_x;
    $x = $a_s * $b_x + $a_x * $b_s;

    $result = $s.'+'.$x.'i';
    return $result;
}