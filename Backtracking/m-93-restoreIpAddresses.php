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
 * @link https://leetcode-cn.com/problems/restore-ip-addresses/
 */
function restoreIpAddresses($s) {
    if ($s > 255255255255){
        return [];
    }
    $result = [];
    helper([],0,$s,$result);
    return $result;
}

function helper($ip,$point,$s,&$result) {
    if (count($ip) == 4 && $point == strlen($s)){
        $result[] = implode('.',$ip);
        return;
    }
    for ($i = 1;$i <= min(3,strlen($s)-$point); $i++) {
        $sub = substr($s,$point,$i);
        if (($i > 1 && $s[$point] == 0) || $sub > 255){
            continue;
        }
        array_push($ip,$sub);
        helper($ip,$point+$i,$s,$result);
        array_pop($ip);
    }
}

$s = "25525511135";
$s = "0000";
//$s = "010010";
$s = "19216811";
var_dump(restoreIpAddresses($s));

###
# 2020/08/09
# 回溯算法
# 条件是不能大于255 ，不能用0开头（可以是0）