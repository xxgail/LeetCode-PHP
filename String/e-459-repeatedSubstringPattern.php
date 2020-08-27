<?php
/**
 * @Time: 2020/8/24
 * @DESC: 459. 重复的子字符串
 * 给定一个非空的字符串，判断它是否可以由它的一个子串重复多次构成。给定的字符串只含有小写英文字母，并且长度不超过10000。
 * 示例 1:
 * 输入: "abab"
 * 输出: True
 * 解释: 可由子字符串 "ab" 重复两次构成。
 * @param $s
 * @return bool
 * @link: https://leetcode-cn.com/problems/repeated-substring-pattern
 */
function repeatedSubstringPattern($s) {
//    for($i = 1; $i < strlen($s); $i++){
//        if(!str_replace(substr($s,0,$i),'',$s)){
//            return true;
//        }
//    }
    return strpos(substr($s.$s,1,-1),$s) !== false;
}

$s = "aaa";
var_dump(repeatedSubstringPattern($s));