<?php
/**
 * @Time: 2019/9/3 17:10
 * @DESC: 151. 翻转字符串里的单词 中等
 * 给定一个字符串，逐个翻转字符串中的每个单词。
 * @param $s
 * @return string
 */
function reverseWords($s) {
    # ---- 一行解决
//    return implode(" ",array_reverse(array_filter(explode(' ',$s))));

    # ---- 代码稍微多一点
    $res = "";
    $left = 0;
    $right = $left+1;
    while ($right <= strlen($s)){
        if ($s[$left] == " "){
            $left++;
            $right++;
            continue;
        }
        if ($right == strlen($s) || $s[$right] == " "){
            $res = substr($s,$left,$right-$left) ." ". $res;

            $left = $right + 1;
            $right = $left + 1;
        }else{
            $right++;
        }
    }
    return rtrim($res);
}

$s = "the sky is blue";
//$s = "  hello  world!  ";
//$s = "a good      example";
$s = "            ";
var_dump(reverseWords($s));