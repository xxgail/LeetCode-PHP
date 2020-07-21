<?php
/**
 * @Time: 2020/7/21 14:39
 * @DESC: 91. 解码方法
 * 一条包含字母 A-Z 的消息通过以下方式进行了编码：
 * 'A' -> 1
 * 'B' -> 2
 * ..
 * 'Z' -> 26
 * 给定一个只包含数字的非空字符串，请计算解码方法的总数。
 * @param $s
 * @return int
 * @link: https://leetcode-cn.com/problems/decode-ways
 */
function numDecodings($s){
    if($s[0] == "0"){
        return 0;
    }
    $s = str_split($s);
    $pre = $curr = 1;
    for ($i = 1; $i < count($s); $i++){
        $tmp = $curr;
        if($s[$i] == "0"){
            if ($s[$i-1] == "2" || $s[$i-1] == "1"){
                $curr = $pre;
            }else{
                return 0;
            }
        }else if($s[$i-1] == "1" || ($s[$i-1] == 2 && $s[$i] >= 1 && $s[$i] <= 6)){
            $curr += $pre;
        }
        $pre = $tmp;
    }
    return $curr;
}

//var_dump(numDecodings(226));
//var_dump(numDecodings(236));
var_dump(numDecodings(301));