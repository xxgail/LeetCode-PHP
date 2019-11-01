<?php
/**
 * @Time: 2019/9/4 18:04
 * @DESC: 67. 二进制求和 简单
 * 给定两个二进制字符串，返回他们的和（用二进制表示）。
 * 输入为非空字符串且只包含数字 1 和 0。
 * @param $a
 * @param $b
 * @return string
 */
function addBinary($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    $addition = 0;
    $result = [];

    do{
        $current_a = array_pop($a);
        $current_b = array_pop($b);
        $sum = $current_a + $current_b + $addition;
        $addition = 0;
        if($sum < 2){
            array_unshift($result,$sum);
        }else{
            $sum -= 2;
            array_unshift($result,$sum);
            $addition += 1;
        }
    }while($a != null || $b != null || $addition != 0);

    return implode('',$result);
}

##----
# 借助一个额外的进位数，当达到临界点时加一即可。
# 利用数组的array_pop和array_unshift(从头插入数据)。
# 再转换为字符串即可。