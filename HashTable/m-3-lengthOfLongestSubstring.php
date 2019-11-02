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
    $len = 0;
    for ($i = 0; $i < strlen($s); $i++){
        $repeat = strpos($result,$s[$i]);
        if($repeat !== false){
            $result = substr($result,$repeat + 1);
            $len -= ($repeat+1);
        }
        $result .= $s[$i];
        $len ++;

//        $len = strlen($result); // 从运行速度上来看，$len的加减比计算长度快
        if($len > $max){
            $max = $len;
        }
    }
    return $max;
}