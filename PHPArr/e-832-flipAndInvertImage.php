<?php

/**
 * @Time: 2019/9/16 15:36
 * @DESC: 832.简单
 * 给定一个二进制矩阵 A，我们想先水平翻转图像，然后反转图像并返回结果。
 * 水平翻转图片就是将图片的每一行都进行翻转，即逆序。例如，水平翻转 [1, 1, 0] 的结果是 [0, 1, 1]。
 * 反转图片的意思是图片中的 0 全部被 1 替换， 1 全部被 0 替换。例如，反转 [0, 1, 1] 的结果是 [1, 0, 0]。
 * @param $A
 * @return mixed
 */
function flipAndInvertImage($A) {
    for($i = 0; $i < count($A); $i++){
        $A[$i] = array_reverse($A[$i]);
        for($j = 0; $j < count($A[$i]); $j++){
            if($A[$i][$j] == 0){
                $A[$i][$j] = 1;
            }else{
                $A[$i][$j] = 0;
            }
        }
    }
    return $A;
}