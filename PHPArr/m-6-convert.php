<?php

/**
 * @Time: 2019/10/22 13:23
 * @DESC: 6. Z 字形变换
 * 将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。
 * 比如输入字符串为 "LEETCODEISHIRING" 行数为 3 时，排列如下：
 * L   C   I   R
 * E T O E S I I G
 * E   D   H   N
 * 之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："LCIRETOESIIGEDHN"。
 * 请你实现这个将字符串进行指定行数变换的函数：
 * string convert(string s, int numRows);
 * @param $s
 * @param $numRows
 * @return string
 */
function convert($s, $numRows) {
    $str_length = strlen($s);
    if($str_length <= $numRows || $numRows == 1){
        return $s;
    }
    $result = [];
    $row = 0; // 行号
    $column = 0; // 列号
    for ($i = 0; $i < $str_length;){
        if($column%($numRows-1) == 0 || ($column + $row) % ($numRows - 1) == 0){
            $result[$row][$column] = $s[$i];
            $i ++;
        }
        $row ++;
        if($row == $numRows){ // 达到最大行数，开始新的一列。
            $column ++;
            $row = 0;
        }
    }
    // result 为生成的二维数组
    $new_s = '';
    foreach ($result as $item) {
        $new_s .= implode('',$item);
    }
    return $new_s;
}