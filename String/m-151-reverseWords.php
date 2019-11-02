<?php
/**
 * @Time: 2019/9/3 17:10
 * @DESC: 151. 翻转字符串里的单词 中等
 * 给定一个字符串，逐个翻转字符串中的每个单词。
 * @param $s
 * @return string
 */
function reverseWords($s) {
    $s_arr = explode(' ',$s);
    $new_data = [];
    foreach($s_arr as $v){
        if($v){
            $new_data[] = $v; // 去掉空格
        }
    }
    $new_data = array_reverse($new_data); // 翻转
    return implode(' ',$new_data);
}