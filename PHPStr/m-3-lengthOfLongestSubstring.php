<?php
/**
 * @Time: 2019/10/22 23:18
 * @DESC:
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 * @param $s
 * @return int
 */
function lengthOfLongestSubstring($s){
    $max = 0;
    $result = '';
    for ($i = 0; $i < strlen($s); $i++){
        if(strpos($result,$s[$i]) !== false){
            $result = '';
        }else{
            $result .= $s[$i];
        }
        $len = strlen($result);
        if($len > $max){
            $max = $len;
        }
    }
    return $max;
}