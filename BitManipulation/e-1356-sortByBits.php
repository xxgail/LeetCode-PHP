<?php
/**
 * @Time: 2020/11/6
 * @DESC: 1356. 根据数字二进制下 1 的数目排序
 * 给你一个整数数组 arr 。请你将数组中的元素按照其二进制表示中数字 1 的数目升序排序。
 * 如果存在多个数字二进制中 1 的数目相同，则必须将它们按照数值大小升序排列。
 * 请你返回排序后的数组。
 * @param $arr
 * @return array
 * @link: https://leetcode-cn.com/problems/sort-integers-by-the-number-of-1-bits/
 */
function sortByBits($arr) {
    $hash = [];
    for($i = 0; $i < count($arr); $i++) {
        $c = oneNums($arr[$i]);
        if(isset($hash[$c])) {
            $hash[$c][] = $arr[$i];
        }else {
            $hash[$c] = [$arr[$i]];
        }
    }
    ksort($hash);
    $res = [];
    foreach($hash as $item) {
        sort($item);
        $res = array_merge($res,$item);
    }
    return $res;
}

function oneNums($num) {
    $res = 0;
    while($num != 0) {
        if ($num & 1) {
            $res++;
        }
        $num >>= 1;
    }
    return $res;
}