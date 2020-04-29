<?php
/**
 * @Time: 2019/11/27 14:49
 * @DESC: 318. 最大单词长度乘积
 * 给定一个字符串数组 words，找到 length(word[i]) * length(word[j]) 的最大值，并且这两个单词不含有公共字母。你可以认为每个单词只包含小写字母。如果不存在这样的两个单词，返回 0。
 * 示例 1:
 * 输入: ["abcw","baz","foo","bar","xtfn","abcdef"]
 * 输出: 16
 * 解释: 这两个单词为 "abcw", "xtfn"。
 * @param $words
 * @return int
 */
function maxProduct($words) {
//    return similar_text('abc','ydyod');

    # 2020.04.29 位运算解决
    $len = count($words);
    $hash = array_fill(0,$len,0);
    $max = 0;
    for ($i = 0; $i < $len; $i++){
        for ($j = 0; $j < strlen($words[$i]); $j++){
            $hash[$i] |= 1 << (ord($words[$i][$j]) - 97);
        }
    }

    for ($i = 0; $i < $len; $i++){
        for ($j = $i+1; $j < $len; $j++){
            if (($hash[$i] & $hash[$j]) == 0){
                $max = max($max,strlen($words[$i])*strlen($words[$j]));
            }
        }
    }
    return $max;

//    $arr = [];
//    for($i = 0; $i < count($words); $i++){
//        for($j = 0; $j < strlen($words[$i]); $j++){
//            $arr[$i][$words[$i][$j]] = 1;
//        }
//    }
//
//    $max = 0;
//    for ($i = 0; $i < count($words)-1;$i++){
//        $right = $i+1;
//        while ($right < count($words)){
//            if(empty(array_intersect_key($arr[$i],$arr[$right]))){
//                $max = max($max,strlen($words[$i])*strlen($words[$right]));
//            }
//            $right++;
//        }
//    }
//    return $max;
}

$words = ["abcw","baz","foo","bar","xtfn","abcdef"];
$words = ["abcd", ""];
var_dump(maxProduct($words));