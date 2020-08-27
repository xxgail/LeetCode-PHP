<?php
/**
 * @Time: 2020/5/9 14:10
 * @DESC: 17. 电话号码的字母组合
 * 给定一个仅包含数字2-9的字符串，返回所有它能表示的字母组合。
 * 给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。
 * 示例:
 * 输入："23"
 * 输出：["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].
 * @param $digits
 * @return array
 * @link: https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number
 */
function letterCombinations($digits) {
    $result = [];
    letterFunc([], str_split($digits), $result);
    return $result;
}

const DICT = [
    '2' => ['a', 'b', 'c'],
    '3' => ['d', 'e', 'f'],
    '4' => ['g', 'h', 'i'],
    '5' => ['j', 'k', 'l'],
    '6' => ['m', 'n', 'o'],
    '7' => ['p', 'q', 'r', 's'],
    '8' => ['t', 'u', 'v'],
    '9' => ['w', 'x', 'y', 'z'],
];

function letterFunc($res, $digits, &$result) {
    if ($digits == []) {
        $result[] = implode('', $res);
        return;
    }
    $k = array_shift($digits);

    for ($i = 0; $i < count(DICT[$k]); $i++) {
        $res[] = DICT[$k][$i];
        letterFunc($res, $digits, $result);
        array_pop($res);
    }
}

var_dump(letterCombinations('234'));

####
# 全排列问题，回溯就对了