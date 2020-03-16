<?php
/**
 * @Time: 2020/3/16 13:17
 * @DESC: 面试题01.06 字符串压缩 简单
 * 利用字符重复出现的次数，编写一种方法，实现基本的字符串压缩功能。
 * 比如，字符串aabcccccaaa会变为a2b1c5a3。
 * 若“压缩”后的字符串没有变短，则返回原先的字符串。
 * 你可以假设字符串中只包含大小写英文字母（a至z）。
 * @param $S
 * @return string
 */
function compressString($S){
    $res = $S[0];
    $num = 1;
    $len = strlen($S);
    for ($i = 1; $i < $len; $i ++){
        if ($S[$i] == $S[$i-1]){
            $num ++;
        }else{
            $res .= $num;
            $res .= $S[$i];
            $num = 1;
        }
    }
    $res .= $num;
    return $len <= strlen($res) ? $S : $res;
}

$S = "abbccd";
print_r(compressString($S));