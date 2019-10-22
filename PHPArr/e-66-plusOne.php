<?php

/**
 * @Time: 2019/9/4 10:36
 * @DESC: 66. 加一 简单
 * 给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 * 你可以假设除了整数 0 之外，这个整数不会以零开头
 * @param $digits
 * @return string
 */
function plusOne($digits) {
    for ($i = count($digits)-1; $i >= 0; $i--){
//        if($digits[$i] + 1 > 9){
//            $digits[$i] = 0;
//            continue;
//        }else{
//            $digits[$i] += 1;
//            break;
//        }

        $digits[$i] += 1;
        if($digits[$i] < 10){
            break;
        }else{
            $digits[$i] = 0;
            continue;
        }
    }

    if($digits[0] == 0){
        array_unshift($digits,1);
    }
    return $digits;
}