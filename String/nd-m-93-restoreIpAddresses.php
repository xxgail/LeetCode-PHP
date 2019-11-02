<?php
/**
 * @Time: 2019/9/3 18:16
 * @DESC: 93. 复原IP地址 中等
 * 给定一个只包含数字的字符串，复原它并返回所有可能的 IP 地址格式。
 * 示例:
 * 输入: "25525511135"
 * 输出: ["255.255.11.135", "255.255.111.35"]
 * @param $s
 * @return array|string
 */
function restoreIpAddresses($s) {
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