<?php
/**
 * @Time: 2020/6/3 9:25 下午
 * @DESC: 837. 新21点 todo：
 * 爱丽丝参与一个大致基于纸牌游戏 “21点” 规则的游戏，描述如下：
 * 爱丽丝以 0 分开始，并在她的得分少于 K 分时抽取数字。
 * 抽取时，她从 [1, W] 的范围中随机获得一个整数作为分数进行累计，其中 W 是整数。
 * 每次抽取都是独立的，其结果具有相同的概率。
 * 当爱丽丝获得不少于 K 分时，她就停止抽取数字。
 * 爱丽丝的分数不超过 N 的概率是多少？
 * @param $N
 * @param $K
 * @param $W
 * @return float|int|mixed
 * @link https://leetcode-cn.com/problems/new-21-game
 */
function new21Game($N, $K, $W) {
    if ($K == 0) {
        return 1;
    }
    $dp = [];
    for ($i = $K; $i <= $N && $i < $K + $W; $i++) {
        $dp[$i] = 1.0;
    }
    $dp[$K - 1] = min($N-$K+1,$W) / $W;
    for ($i = $K-2; $i >= 0; $i--) {
        $dp[$i] = $dp[$i + 1] - ($dp[$i + $W + 1] - $dp[$i+1]) /$W;
    }
    return $dp[0];
}