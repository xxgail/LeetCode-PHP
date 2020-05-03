<?php
/**
 * @Time: 2019/10/22 23:18
 * @DESC: 3. 无重复字符的最长子串
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 * @param $s
 * @return int
 */
function lengthOfLongestSubstring($s){
    $max = 0;
    $result = '';
    $len = 0;
    for ($i = 0; $i < strlen($s); $i++){
        $repeat = strpos($result,$s[$i]);
        if($repeat !== false){
            $result = substr($result,$repeat + 1);
            $len -= ($repeat+1);
        }
        $result .= $s[$i];
        $len ++;

        $max = $len > $max ? $len : $max;
    }
    return $max;
}