<?php
/**
 * @Time: 2020/4/30 16:26
 * @DESC: 202. 快乐数
 * 编写一个算法来判断一个数 n 是不是快乐数。
 * 「快乐数」定义为：对于一个正整数，每一次将该数替换为它每个位置上的数字的平方和，然后重复这个过程直到这个数变为 1，也可能是 无限循环 但始终变不到 1。
 * 如果 可以变为  1，那么这个数就是快乐数。
 * 如果 n 是快乐数就返回 True ；不是，则返回 False 。
 * @link https://leetcode-cn.com/problems/happy-number
 * @param $n
 * @return bool
 */
function isHappy($n) {
    $n = str_split($n);
    $sum = 0;
    for ($i = 0; $i < count($n); $i++) {
        $sum += $n[$i] * $n[$i];
    }

    if ($sum == 1 || $sum == 7) { // 10以内只有1跟7是快乐数
        return true;
    }

    if ($sum < 10) {
        return false;
    }

    return isHappy($sum);
}