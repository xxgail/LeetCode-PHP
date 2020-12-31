<?php
/**
 * @Time: 2020/12/31
 * @DESC: 514. 自由之路
 * @param $ring
 * @param $key
 * @return mixed
 * @link: https://leetcode-cn.com/problems/freedom-trail/
 */
function findRotateSteps($ring, $key) {
    $n = strlen($ring);
    $m = strlen($key);
    $pos = [];
    for($i = 0; $i < $n; $i++) {
        $pos[ord($ring[$i])-97] = [$i];
    }
    $dp = [];
    foreach ($pos as $k => $v) {
        $dp[$k] = array_fill(0, $n, 0);
        foreach ($v as $j) {
            $dp[$k][$j] = PHP_INT_MAX;
        }
    }
    foreach ($pos[ord($key[0])-97] as $po) {
        $dp[0][$po] = min($po, $n-$po) + 1;
    }
    for ($i = 1; $i < $m; $i++) {
        foreach ($pos[ord($key[$i])-97] as $j) {
            foreach ($pos[ord($key[$i-1])-97] as $k) {
                $dp[$i][$j] = min($dp[$i][$j], $dp[$i-1][$k]+min(abs($j-$k), $n-abs($j-$k))+1);
            }
        }
    }
    return min($dp[$m-1]);
}

$ring = "godding";
$key = "gd";
var_dump(findRotateSteps($ring,$key));