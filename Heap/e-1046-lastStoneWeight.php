<?php
/**
 * @Time: 2020/12/30
 * @DESC: 1046. 最后一块石头的重量
 * 有一堆石头，每块石头的重量都是正整数。
 * 每一回合，从中选出两块 最重的 石头，然后将它们一起粉碎。假设石头的重量分别为 x 和 y，且 x <= y。那么粉碎的可能结果如下：
 * 如果 x == y，那么两块石头都会被完全粉碎；
 * 如果 x != y，那么重量为 x 的石头将会完全粉碎，而重量为 y 的石头新重量为 y-x。
 * 最后，最多只会剩下一块石头。返回此石头的重量。如果没有石头剩下，就返回 0。
 * @param $stones
 * @return int
 * @link: https://leetcode-cn.com/problems/last-stone-weight
 */
function lastStoneWeight($stones) {
    # 循环
//    while(count($stones) > 1) {
//        rsort($stones);
//        array_push($stones,array_shift($stones) - array_shift($stones));
//    }
//    return abs($stones[0] - $stones[1]);
    # 最大堆
    if(count($stones) <= 1) {
        return $stones[0] ?? 0;
    }
    $h = new SplMaxHeap();
    while ($stones) {
        $h->insert(array_pop($stones));
    }
    while ($h->count() > 2) {
        $h->insert($h->extract() - $h->extract());
    }
    return $h->extract() - $h->extract();
}

$stones = [2];
var_dump(lastStoneWeight($stones));