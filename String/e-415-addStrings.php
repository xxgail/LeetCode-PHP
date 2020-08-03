<?php
/**
 * @Time: 2020/8/3
 * @DESC: 415. 字符串相加
 * 给定两个字符串形式的非负整数 num1 和num2 ，计算它们的和。
 * 注意：
 * num1 和num2 的长度都小于 5100.
 * num1 和num2 都只包含数字 0-9.
 * num1 和num2 都不包含任何前导零。
 * 你不能使用任何內建 BigInteger 库， 也不能直接将输入的字符串转换为整数形式。
 * @param $num1
 * @param $num2
 * @return string
 * @link: https://leetcode-cn.com/problems/add-strings
 */
function addStrings($num1, $num2) {
    $addition = 0;
    $l1 = strlen($num1) - 1;
    $l2 = strlen($num2) - 1;
    $res = '';
    while($l1 >= 0 || $l2 >= 0 || $addition){
        $s = ($l1 >= 0 ? substr($num1,$l1,1) : 0)
            + ($l2 >= 0 ? substr($num2,$l2,1) : 0)
            + $addition;
        $addition = floor($s / 10);
        $res = $s % 10 . $res;
        $l1--;
        $l2--;
    }
    return $res;
}

$num1 = "401716832807512840963";
$num2 = "167141802233061013023557397451289113296441069";
var_dump(addStrings($num1,$num2));

###
# 注意事项：一定要输出字符串，防止数量过大出现10次方的表达形式