<?php
/**
 * @Time: 2020/3/21 01:14
 * @DESC: 365. 水壶问题 中等
 * 有两个容量分别为 x升 和 y升 的水壶以及无限多的水。
 * 请判断能否通过使用这两个水壶，从而可以得到恰好 z升 的水
 * 如果可以，最后请用以上水壶中的一或两个来盛放取得的 z升水。
 * 你允许：
 * 装满任意一个水壶
 * 清空任意一个水壶
 * 从一个水壶向另外一个水壶倒水，直到装满或者倒空
 * @param $x
 * @param $y
 * @param $z
 * @return bool
 */
function canMeasureWater($x, $y, $z){
    if ($z > $x + $y){
        return false;
    }

    if ($x == 0 || $y == 0){
        return $z == 0 || $z == $x + $y;
    }

    if ($z % $x == 0 || $z % $y == 0 || $z % gcd($y,$x) == 0){
        return true;
    }

    return false;
}

# 辗转相除法求最大公约数
function gcd($a,$b){
    return $b == 0 ? $a : gcd($b, $a % $b);
}

var_dump(canMeasureWater(1,1,3));

### 数学的解法就是求最大公约数
# 有时间看一下深度优先算法的解法