<?php
/**
 * @Time: 2020/8/13
 * @DESC: 43. 字符串相乘
 * 给定两个以字符串形式表示的非负整数 num1 和 num2，返回 num1 和 num2 的乘积，它们的乘积也表示为字符串形式。
 * 示例 1:
    输入: num1 = "2", num2 = "3"
    输出: "6"
 *
 * 示例2:
    输入: num1 = "123", num2 = "456"
    输出: "56088"
 *
 * 说明：
    num1 和 num2 的长度小于110。
    num1 和 num2 只包含数字0-9。
    num1 和 num2 均不以零开头，除非是数字 0 本身。
    不能使用任何标准库的大数类型（比如 BigInteger）或直接将输入转换为整数来处理。
 * @param $num1
 * @param $num2
 * @return string
 * @link: https://leetcode-cn.com/problems/multiply-strings
 */
function multiply($num1,$num2) {
    // 👌
    if ($num1 == '0' || $num2 == '0') {
        return '0';
    }
    $n1 = strlen($num1)-1;
    $n2 = strlen($num2)-1;
    $res = array_fill(0,$n1+$n2+2,0);
    while ($n1 >= 0){
        $j = $n2;
        while ($j >= 0){
            $n = $num1[$n1] * $num2[$j];
            var_dump($n);
            $res[$n1 + $j + 1] += $n;
            $j--;
        }
        $n1--;
    }
    $result = '';
    $add = 0;
    $n = count($res) - 1;
    while ($n >= 0 || $add){
        $s = $res[$n] + $add;
        $add = floor($s / 10);
        $result = $s % 10 . $result;
        $n --;
    }

    return ltrim($result,"0");


    # 速度很慢很慢很慢
//    $n1 = $n = strlen($num1)-1;
//    $res = '';
//    $i = 0;
//    while ($n1 >= 0){
//        $item = multi($num1[$n1],$num2).str_repeat('0',$i);
//        $res = addStrings($res,$item);
//        $n1 --;
//        $i ++;
//    }
//    return $res;
}

function multi($num1,$num2){
    $res = '';
    $addition = 0;
    $n2 = strlen($num2)-1;
    while ($n2 >= 0 || $addition){
        $s = $num1 * ($n2 >= 0 ? $num2[$n2] : 0) + $addition;
        $addition = floor($s / 10);
        $res = $s % 10 . $res;
        $n2--;
    }
    return $res;
}

function addStrings($num1, $num2) {
    $addition = 0;
    $l1 = strlen($num1) - 1;
    $l2 = strlen($num2) - 1;
    $res = '';
    while($l1 >= 0 || $l2 >= 0 || $addition){
        $s = ($l1 >= 0 ? $num1[$l1] : 0)
            + ($l2 >= 0 ? $num2[$l2] : 0)
            + $addition;
        $addition = floor($s / 10);
        $res = $s % 10 . $res;
        $l1--;
        $l2--;
    }
    return $res;
}

$num1 = "123";
$num2 = "456";
//$num1 = "999";
//var_dump(multi("2","5043"));
var_dump(multiply($num1,$num2));