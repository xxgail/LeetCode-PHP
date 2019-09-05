<?php

/**
 * @Time: 2019/9/3 17:10
 * @DESC: 151
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

/**
 * @Time: 2019/9/3 18:16
 * @DESC: 93
 * 给定一个只包含数字的字符串，复原它并返回所有可能的 IP 地址格式。
 * 示例:
 * 输入: "25525511135"
 * 输出: ["255.255.11.135", "255.255.111.35"]
 * @param $s
 * @return array|string
 */
function restoreIpAddresses($s) { //todo: 做不出来
    $ip = '';
    if($s < 1111 || $s>255255255255){
        return [];
    }

    $ip1 = substr($s,0,3);
    $surplus = substr($s,3);
    if($surplus > 111){

    }

//    if(strlen($s) == 12){
//        $s_arr = str_split($s,3);
//        foreach ($s_arr as $item) {
//            if($item > 255){
//                return [];
//            }
//            $ip .= $item.'.';
//        }
//    }
    return rtrim($ip,'.');
}

// 123 456 789 1
// 123 456 78 91
// 123 456 7 891
// 123 45 678 91
// 123 45 67 891
// 123 4 567 891
// 12 34 567 891
// 1 234 567 891

/**
 * @Time: 2019/9/4 18:04
 * @DESC: 二进制求和
 * 给定两个二进制字符串，返回他们的和（用二进制表示）。
 * 输入为非空字符串且只包含数字 1 和 0。
 * @param $a
 * @param $b
 */
function addBinary($a, $b) {
    $len = strlen($a) - strlen($b);
    $two = 0;
    if($len > 0){
        $two = substr($a,0,$len);
        $a = substr($a,$len);
    }elseif($len < 0){
        $len = -1 * $len;
        $two = substr($b,0,$len);
        $b = substr($b,$len);
    }
//    $one_data = bindec($a) + bindec($b);
    $a = str_split($a);
    $b = str_split($b);
    $one_data = [];
    for ($i = count($a)-1; $i >= 0; $i--){
        if($a[$i] + $b[$i] < 2){
            $one_data[$i] = $a[$i] + $b[$i];
            var_dump('11'.$i.$one_data[$i]);
        }else{
            $one_data[$i] = 0;
            if($i >= 1){
                $a[$i-1] += 1;
            }
        }

    }
    ksort($one_data);
    if($one_data[0] == 0 && $two){
        array_unshift($one_data,1);
    }

    $one_str = implode('',$one_data);
    $two_str = '';
    if(count($one_data) > count($a) && $two){
        $two = str_split($two);
        for($i = count($two)-1; $i >= 0; $i--){
            if($two[$i] + 1 < 2){
                $two[$i] += 1;
                break;
            }else{
                $two[$i] = 0;
                if($i >= 1){
                    $two[$i-1] += 1;
                }

                if($two[0] == 0){
                    array_unshift($two,1);
                }
                continue;
            }
        }
        $one_str = substr($one_str,1);
        $two_str = implode('',$two);
    }
//    return $two_str;
    return $two_str.$one_str;
    $two_str = '';
    if($two){
        if(strlen($one_str) > strlen($a)){
            $one_str = substr($one_str,1);
//            return $one_str;
            $two_data = bindec($two) + 1;
            $two_str = decbin($two_data);
        }else{
            $two_str = $two;
        }
    }

    $data = $two_str.$one_str;
    return $data;
}

/**
 * @Time: 2019/9/5 15:44
 * @DESC:
 * 实现 strStr() 函数。
 * 给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。
 * 如果不存在，则返回  -1。
 * @param $haystack
 * @param $needle
 * @return int
 */
function strStrTest($haystack, $needle) {
    if($haystack == $needle || !$needle){
        return 0;
    }
    $new_arr = explode($needle,$haystack);

    if($new_arr[0] == $haystack){
        return -1;
    }else{
        return strlen($new_arr[0]);
    }
}


/**
 * @Time: 2019/9/5 15:49
 * @DESC:
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