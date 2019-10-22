<?php
/**
 * @Time: 2019/9/5 15:49
 * @DESC: 14. 最长公共前缀 简单
 * 编写一个函数来查找字符串数组中的最长公共前缀。
 * 如果不存在公共前缀，返回空字符串 ""。
 * @param $strs
 * @return string
 */
function longestCommonPrefix($strs) {
    $short_str = $strs[0];
    for ($i = 0; $i < count($strs); $i++){
        if(strlen($strs[$i]) < strlen($short_str)){
            $short_str = $strs[$i];
        }
    }
    for($i = 1; $i <= strlen($short_str) ; $i++){
        $per_str = substr($short_str,0,$i);
        foreach ($strs as $str) {
            if(substr($str,0,$i) != $per_str){
                return substr($per_str,0,$i - 1);
            }
        }
    }
    return $short_str;
}