<?php
/**
 * @Time: 2020/3/12 15:53
 * @DESC: 1071. 字符串的最大公因子 简单
 * 对于字符串 S 和 T，只有在 S = T + ... + T（T 与自身连接 1 次或多次）时，我们才认定 “T 能除尽 S”。
 * 返回最长字符串 X，要求满足 X 能除尽 str1 且 X 能除尽 str2。
 * @param $str1
 * @param $str2
 * @return string
 */
function gcdOfStrings($str1, $str2){
    if ($str1.$str2 != $str2.$str1){
        return "";
    }
    return substr($str2,0,goc(strlen($str1),strlen($str2)));
}

function goc($a,$b){
    return $b == 0 ? $a : goc($b, $a % $b);
}

$str1 = 'ABAB';
$str2 = 'ABABABABAB';
var_dump(gcdOfStrings($str1,$str2));

###
# 辗转相除法 # 看题解
# 数学中寻找最大公约数 举例 6、4
# 6 / 4 = 1 .. 2 # 再用除数除以余数
# 4 / 2 = 2 .. 0 # 余数为0时截止，所以6和4的最大公约数为2
# 同理有公因子的字符串也是由公因子重复获取