<?php
# https://leetcode-cn.com/problems/short-encoding-of-words/
/**
 * @Time: 2020/3/28 11:28
 * @DESC: 820. 单词的压缩编码
 * 给定一个单词列表，我们将这个列表编码成一个索引字符串 S 与一个索引列表 A。
 * 例如，如果这个列表是 ["time", "me", "bell"]，我们就可以将其表示为 S = "time#bell#" 和 indexes = [0, 2, 5]。
 * 对于每一个索引，我们可以通过从字符串 S 中索引的位置开始读取字符串，直到 "#" 结束，来恢复我们之前的单词列表。
 * 返回成功对给定单词列表进行编码的最小字符串长度。
 * @param $words
 * @return int
 */
function minimumLengthEncoding($words){
    usort($words,function ($a,$b){
        if (strlen($a) > strlen($b)){
            return -1;
        }else{
            return 1;
        }
    }); // 按照数组内字符串的长度倒序排
    $result = "";
    foreach ($words as $word) {
        if (strrpos($result,$word."#") === false){
            $result .= $word."#";
        }
    }
    return strlen($result);
}

var_dump(minimumLengthEncoding(["me","time","leetcode"]));