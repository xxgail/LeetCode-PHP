<?php
/**
 * @Time: 2020/8/6
 * @DESC: 336. 回文对
 * 给定一组唯一的单词， 找出所有不同 的索引对(i, j)，使得列表中的两个单词， words[i] + words[j] ，可拼接成回文串。
 * 示例 1:
 * 输入: ["abcd","dcba","lls","s","sssll",""]
 * 输出: [[0,1],[1,0],[3,2],[2,4]]
 * 解释: 可拼接成的回文串为 ["dcbaabcd","abcddcba","slls","llssssll"]
 * @param $words
 * @return array
 * @link: https://leetcode-cn.com/problems/palindrome-pairs
 */
function palindromePairs($words){
    # 比较组成回文的两个字符串长度
    # 1. len1 = len2 -> s1是s2的翻转
    # 2. len1 > len2 -> 可以将s1拆成两部分，其中第一部分是s2的翻转，第二部分是回文
    # 3. len1 < len2 -> 同理可以将s2拆成两部分，第一部分是回文，第二部分是s1的翻转
    $wordsRevHash = [];
    foreach ($words as $k => $word) {
        $wordsRevHash[strrev($word)] = $k;
    }
    $res = [];
    for ($i = 0; $i < count($words); $i++){
        $word = $words[$i];
        $l = strlen($word);
        if ($l == 0){
            continue;
        }
        for ($j = 0; $j <= $l; $j++){
            if ($l == $j || helper(substr($word,$j))){
                $leftId = $wordsRevHash[substr($word,0,$j)] ?? null;
                if ($leftId !== null && $leftId != $i){
                    $res[] = [$i,$leftId];
                }
            }
            if ($j != 0 && helper(substr($word,0,$j))){
                $rightId = $wordsRevHash[substr($word,$j)] ?? null;
                if ($rightId !== null && $rightId != $i){
                    $res[] = [$rightId,$i];
                }
            }
        }
    }

    return $res;
}

function helper($word){
    if(strrev($word) == $word) return true;

    return false;
}


# 暴力循环 = 超时（23333
function palindromePairs1($words) {
    $res = [];
    for ($i = 0; $i < count($words)-1; $i++){
        for ($j = $i+1; $j < count($words); $j++){
            if (helper($words[$i].$words[$j])){
                $res[] = [$i,$j];
            }
            if (helper($words[$j].$words[$i])){
                $res[] = [$j,$i];
            }
        }
    }
    return $res;
}


$words = ["abcd","dcba","lls","s","sssll"];
//$words = ["a","b","c","ab","ac","aa"];
//$words = ["baaabab","aaaaba","babbb","b","babaaab","baabaa","ba","ababa","abbaaa","aababaaa","aabba","ababaaab","babab","bb","aa","aaaaabba","abba","babbbaa","baaba","aaabb"];

var_dump(palindromePairs($words));