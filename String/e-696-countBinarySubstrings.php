<?php
/**
 * @Time: 2020/8/10
 * @DESC: 696. 计数二进制子串
 * 给定一个字符串s，计算具有相同数量0和1的非空(连续)子字符串的数量，并且这些子字符串中的所有0和所有1都是组合在一起的。
 * 重复出现的子串要计算它们出现的次数。
 * 示例 1 :
    输入: "00110011"
    输出: 6
    解释: 有6个子串具有相同数量的连续1和0：“0011”，“01”，“1100”，“10”，“0011” 和 “01”。
    请注意，一些重复出现的子串要计算它们出现的次数。
    另外，“00110011”不是有效的子串，因为所有的0（和1）没有组合在一起。
 * @param $s
 * @return int
 * @link: https://leetcode-cn.com/problems/count-binary-substrings
 */
function countBinarySubstrings($s) {
    if ($s == ""){
        return 0;
    }
    $res = $last = 0;
    $c = $p = 1;
    $len = strlen($s);
    while ($p < $len){
        if ($s[$p] != $s[$p-1]){
            $res += min($last,$c);
            $last = $c;
            $c = 1;
        }else{
            $c++;
        }
        $p++;
    }
    $res += min($last,$c);
    return $res;
}

$s = "00111011"; // list就是[2,3,1,2]
var_dump(countBinarySubstrings($s));
