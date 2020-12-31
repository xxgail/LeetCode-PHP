<?php
/**
 * @Time: 2020/12/16
 * @DESC: 290. 单词规律
 * 给定一种规律 pattern 和一个字符串 str ，判断 str 是否遵循相同的规律。
 * 这里的 遵循 指完全匹配，例如， pattern 里的每个字母和字符串 str 中的每个非空单词之间存在着双向连接的对应规律。
 * 示例1:
    输入: pattern = "abba", str = "dog cat cat dog"
    输出: true
 * @param $pattern
 * @param $s
 * @return bool
 * @link: https://leetcode-cn.com/problems/word-pattern/
 */
function wordPattern($pattern, $s) {
    $s = explode(" ", $s);
    if (count($s) != strlen($pattern)) {
        return false;
    }
    $hash1 = $hash2 = [];
    foreach ($s as $k => $item) {
        if ((isset($hash1[$item]) && $hash1[$item] != $pattern[$k])
            || (isset($hash2[$pattern[$k]]) && $hash2[$pattern[$k]] != $item)) {
            return false;
        }
        $hash1[$item] = $pattern[$k];
        $hash2[$pattern[$k]] = $item;
    }
    return true;
}