<?php
/**
 * @Time: 2020/9/2
 * @DESC:剑指 Offer 20. 表示数值的字符串
 * 请实现一个函数用来判断字符串是否表示数值（包括整数和小数）。
 * 例如，字符串"+100"、"5e2"、"-123"、"3.1416"、"-1E-16"、"0123"都表示数值，但"12e"、"1a3.14"、"1.2.3"、"+-5"及"12e+5.4"都不是。
 * @param $s
 * @return bool
 * @link: https://leetcode-cn.com/problems/biao-shi-shu-zhi-de-zi-fu-chuan-lcof/
 */
function isNumber($s) {
//    return is_numeric(trim($s,' '));
    // todo
    $states = [
        [' ' => 0, 's' => 1, 'd' => 2, '.' => 4],
        ['d' => 2, '.' => 4],
        ['d' => 2, '.' => 3, 'e' => 5, ' ' => 8],
        ['d' => 3, 'e' => 5, ' ' => 8],
        ['d' => 3],
        ['s' => 6, 'd' => 7],
        ['d' => 7],
        ['d' => 7, ' ' => 8],
        [' ' => 8],
    ];
    $p = 0;
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++){
        $char = $s[$i];
        if (in_array($char,['0','1','2','3','4','5','6','7','8','9'])){
            $t = 'd';
        }elseif ($char == '+' || $char == '-') {
            $t = 's';
        }elseif ($char == 'e' || $char == 'E') {
            $t = 'e';
        }elseif ($char == '.' || $char == ' ') {
            $t = $char;
        }else {
            $t = '?';
        }
        if (!isset($states[$p][$t])) return false;
        $p = intval($states[$p][$t]);
    }
    return in_array($p,[2,3,7,8]);
}

var_dump(isNumber("12e"));