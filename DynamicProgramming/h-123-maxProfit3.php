<?php
/**
 * @Time: 2021/1/9
 * @DESC: 123. 买卖股票的最佳时机 III
 * 给定一个数组，它的第 i 个元素是一支给定的股票在第 i 天的价格。
 * 设计一个算法来计算你所能获取的最大利润。你最多可以完成 两笔 交易。
 * 注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 * 示例 1:
    输入：prices = [3,3,5,0,0,3,1,4]
    输出：6
 * @param $prices
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-iii/
 */
function maxProfit3($prices) {
    # 第一次买和第二次买
    $buy1 = $buy2 = -$prices[0];
    # 第一次卖和第二次卖
    $sell1 = $sell2 = 0;
    for ($i = 1; $i < count($prices); $i++) {
        print_r([$buy1,$sell1,$buy2,$sell2]);
        $buy1 = max($buy1, -$prices[$i]);
        $sell1 = max($sell1, $prices[$i]+$buy1);
        $buy2 = max($buy2, $sell1-$prices[$i]);
        $sell2 = max($sell2, $prices[$i] + $buy2);
    }
    return $sell2;
}

$prices = [3,3,5,0,0,3,1,4];
var_dump(maxProfit3($prices));

// ------------------------
// price    3   3   5   0   0   3   1   4
// buy1     -3  -3  -3  -3  -3  -3  -3  -3
// sell1    x   0   2   2   2   2   2   2
// buy2     x   x   x   0   0   0   0   0
// sell2    x   x   x   x   0   5   5