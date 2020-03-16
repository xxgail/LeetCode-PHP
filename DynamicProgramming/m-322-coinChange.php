<?php
/**
 * @Time: 2020/3/8 22:04
 * @DESC: 322. 零钱兑换 中等
 * 给定不同面额的硬币 coins 和一个总金额 amount
 * 编写一个函数来计算可以凑成总金额所需的最少的硬币个数。
 * 如果没有任何一种硬币组合能组成总金额，返回 -1。
 * @param $coins
 * @param $amount
 * @return int
 */
function coinChange($coins,$amount){ //
    $dp = array_fill(0,$amount+1,$amount+1);
    $dp[0] = 0;
    for ($i = 0; $i < $amount+1; $i++){
        foreach ($coins as $coin) {
            if ($i < $coin){
                continue;
            }
            $dp[$i] = min($dp[$i],$dp[$i - $coin] + 1); // 此时的1代表硬币数量
        }
    }
    return ($dp[$amount] == $amount + 1) ? -1 : $dp[$amount];
}

$coins = [1,2,5];
$amount = 11;
print_r(coinChange($coins,$amount));

$coins = [2];
$amount = 3;
print_r(coinChange($coins,$amount));