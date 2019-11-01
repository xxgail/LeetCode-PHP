<?php

/**
 * @Time: 2019/10/9 13:27
 * @DESC: 461. 简单
 * 两个整数之间的汉明距离指的是这两个数字对应二进制位不同的位置的数目。
 * 给出两个整数 x 和 y，计算它们之间的汉明距离。
 * @param $x
 * @param $y
 * @return int
 */
function hammingDistance($x, $y) {
    $a = decbin($x ^ $y);
    $result = 0;
    for ($i = 0; $i < strlen($a); $i++){
        if($a[$i] == 1){
            $result ++;
        }
    }
    return $result;
}