<?php
/**
 * @Time: 2019/9/16 17:04
 * @DESC: 859.简单
 * 给定两个由小写字母构成的字符串 A 和 B ，只要我们可以通过交换 A 中的两个字母得到与 B 相等的结果，就返回 true ；否则返回 false 。
 * @param $A
 * @param $B
 * @return bool
 */
function buddyStrings($A, $B) {
    if(!$A || !$B){
        return false;
    }
    if($A == $B){
        for($i = 0; $i < strlen($A); $i++){
            if(strpos($A,$A[$i]) != $i){
                return true;
            }
        }
        return false;
    }

    $A_ = [];
    $B_ = [];
    for ($i = 0; $i < strlen($A); $i++){
        if($A[$i] == $B[$i]){
            continue;
        }else{
            $A_[] = $A[$i];
            $B_[] = $B[$i];
        }
    }
//    return $B_;
    if(count($A_) == 2 && $A_ == array_reverse($B_)){
        return true;
    }
    return false;
}