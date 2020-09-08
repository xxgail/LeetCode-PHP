<?php
/**
 * @Time: 2020/9/8
 * @DESC: 77. 组合
 * 给定两个整数 n 和 k，返回 1 ... n 中所有可能的 k 个数的组合。
 * 示例:
    输入: n = 4, k = 2
    输出:
    [
    [2,4],
    [3,4],
    [2,3],
    [1,2],
    [1,3],
    [1,4],
    ]
 * @param $n
 * @param $k
 * @return array
 * @link: https://leetcode-cn.com/problems/combinations/
 */
function combine($n, $k) {
    $res = [];
    combineFunc([],$n,$k,1,$res);
    return $res;
}

function combineFunc($path,$n,$k,$start,&$res) {
    if(count($path) == $k){
        $res[] = $path;
        return;
    }
    for($i = $start; $i <= $n;$i++){
        $path[] = $i;
        combineFunc($path,$n,$k,$i+1,$res);
        array_pop($path);
    }
}