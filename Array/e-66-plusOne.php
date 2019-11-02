<?php

/**
 * @Time: 2019/9/4 10:36
 * @DESC: 66. 加一 简单
 * 给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 * 你可以假设除了整数 0 之外，这个整数不会以零开头
 * @param $digits
 * @return array
 */
function plusOne($digits) {
    # 普通解法
//    for ($i = count($digits)-1; $i >= 0; $i--){
//        $digits[$i] += 1;
//        if($digits[$i] < 10){
//            break;
//        }else{
//            $digits[$i] = 0;
//            continue;
//        }
//    }
//
//    if($digits[0] == 0){
//        array_unshift($digits,1);
//    }
//    return $digits;

    # 借助addition的解法，好像并没有快多少！甚至还没有上一个快
    $addition = 1;
    $result = [];
    $i = count($digits) - 1;
    do{
        $sum = ($digits[$i] ?? 0) + $addition;
        if($sum == 10){
            array_unshift($result,0);
            $addition = 1;
        }else{
            array_unshift($result,$sum);
            $addition = 0;
        }
        $i --;
    }while($i >= 0 || $addition == 1);
    return $result;
}