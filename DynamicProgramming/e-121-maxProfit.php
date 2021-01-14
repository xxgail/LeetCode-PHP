<?php
/**
 * @Time: 2020/3/9 22:43
 * @DESC: 121. 买卖股票的最佳时期 简单
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 * 如果你最多只允许完成一笔交易（即买入和卖出一支股票），设计一个算法来计算你所能获取的最大利润。
 * 注意你不能在买入股票前卖出股票。。
 * @param $prices
 * @return mixed
 * @link https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock/
 */
function maxProfit($prices){
    // 这道题好像不用动态规划？就算写了也是可以省略的...
    $max = 0;
    $min = $prices[0] ?? 0;
    for ($i = 1; $i < count($prices); $i++) {
        $min = min($prices[$i-1],$min);
        $max = max($prices[$i]-$min,$max);
    }
    return $max;
}

$prices = [7,1,5,3,6,4];
print_r(maxProfit($prices));


# ---------------------------------------
/**
 * @Time: 2020/3/9 22:42
 * @DESC: 用循环♻来写吧！
 * @param $prices
 * @return int|mixed
 */
function maxProfitCyc($prices){
    $min = $prices[0];
    $max = 0;
    for ($i = 1; $i < count($prices); $i++){
        if ($prices[$i] <= $prices[$i-1]){ // 加了这行判断能稍微快一点
            continue;
        }
        $min = min($min,$prices[$i-1]);
        $max = max($max,$prices[$i] - $min);
    }
    return $max;
}

print_r(maxProfitCyc([7,1,5,3,6,4]));

###
# 我以为的动态规划原来只是for循环？
# 第一次提交