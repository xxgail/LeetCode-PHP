<?php

/**
 * @Time: 2019/10/10 14:14
 * @DESC: 728. 简单
 * 自除数 是指可以被它包含的每一位数除尽的数。
 * 例如，128 是一个自除数，因为 128 % 1 == 0，128 % 2 == 0，128 % 8 == 0。
 * 还有，自除数不允许包含 0 。
 * 给定上边界和下边界数字，输出一个列表，列表的元素是边界（含边界）内所有的自除数。
 * @param $left
 * @param $right
 * @return array
 */
function selfDividingNumbers($left, $right) {
    $data = [];
    for ($i = $left; $i <= $right; $i++){
        $i_str = (string)$i;
        for ($j = 0; $j < strlen($i_str); $j++){
            if($i_str[$j] == 0 || $i % $i_str[$j] != 0){
                continue 2;
            }
        }
        $data[] = $i;
    }
    return $data;
}