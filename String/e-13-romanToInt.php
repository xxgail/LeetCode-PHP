<?php

/**
 * @Time: 2020/2/4 17:56
 * @DESC: 13. romanToInt 罗马数字转整数。简单
 * 罗马数字包含以下七种字符: I， V， X， L，C，D 和 M。
 * 字符          数值
 * I             1
 * V             5
 * X             10
 * L             50
 * C             100
 * D             500
 * M             1000
 * 例如， 罗马数字 2 写做 II ，即为两个并列的 1。12 写做 XII ，即为 X + II 。 27 写做  XXVII, 即为 XX + V + II 。
 * 通常情况下，罗马数字中小的数字在大的数字的右边。但也存在特例，例如 4 不写做 IIII，而是 IV。数字 1 在数字 5 的左边，所表示的数等于大数 5 减小数 1 得到的数值 4 。同样地，数字 9 表示为 IX。这个特殊的规则只适用于以下六种情况：
 * I 可以放在 V (5) 和 X (10) 的左边，来表示 4 和 9。
 * X 可以放在 L (50) 和 C (100) 的左边，来表示 40 和 90。 
 * C 可以放在 D (500) 和 M (1000) 的左边，来表示 400 和 900。
 * 给定一个罗马数字，将其转换成整数。输入确保在 1 到 3999 的范围内。
 * @param $s
 * @return int|mixed
 */
function romanToInt($s){
    $s_arr = str_split($s);
    $s = implode('/',$s_arr);

    $dict = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    $spec = [
        'I/V' => 4,
        'I/X' => 9,
        'X/L' => 40,
        'X/C' => 90,
        'C/D' => 400,
        'C/M' => 900,
    ];

    foreach ($spec as $k => $item) {
        $s = str_replace($k,$item,$s);
    }
//    print_r($s);
    $s_arr = explode('/',$s);
    $sum = 0;
    foreach ($s_arr as $item) {
        $sum += $dict[$item] ?? $item;
    }
    return $sum;
//    print_r($sum);
}

$s = "MCMXCIV";
romanToInt($s);

###
# 字符串映射，优先级问题
# 执行用时 :24 ms, 在所有 PHP 提交中击败了52.88%的用户
# 内存消耗 :14.5 MB, 在所有 PHP 提交中击败了97.30%的用户