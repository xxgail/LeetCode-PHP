<?php
# https://leetcode-cn.com/problems/string-matching-in-an-array/
/**
 * @Time: 2020/4/12 14:24
 * @DESC: 5380. 数组中的字符串匹配 184周赛
 * 给你一个字符串数组 words ，数组中的每个字符串都可以看作是一个单词。
 * 请你按 任意 顺序返回 words 中是其他单词的子字符串的所有单词。
 * 如果你可以删除 words[j] 最左侧和/或最右侧的若干字符得到 word[i] ，那么字符串 words[i] 就是 words[j] 的一个子字符串。
 * @param $words
 * @return array
 */
function stringMatching($words){
    $res = [];
    for ($i = 0; $i < count($words); $i++){
        for ($j = 0; $j < count($words); $j++){
            if ($i == $j || strlen($words[$i]) > strlen($words[$j])){
                continue;
            }
            if (strpos($words[$j],$words[$i]) !== false){
                $res[] = $words[$i];
            }
        }
    }
    return array_unique($res);
}

var_dump(stringMatching(["blue","green","bu"]));