<?php
/**
 * @Time: 2020/3/11 14:07
 * @DESC: 1013. 将数组分成和相等的三个部分 简单
 * 给你一个整数数组 A，只有可以将其划分为三个和相等的非空部分时才返回 true，否则返回 false
 * 形式上，如果可以找出索引 i+1 < j 且满足 (A[0] + A[1] + ... + A[i] == A[i+1] + A[i+2] + ... + A[j-1] == A[j] + A[j-1] + ... + A[A.length - 1]) 就可以将数组三等分。
 * @param $A
 * @return bool
 */
function canThreePartsEqualSum($A){
    $sum = array_sum($A);
    if ($sum % 3 != 0) {
        return false;
    }
    $avg = $sum / 3;
    $s = 0;
    $count = 0;
    for ($i = 0; $i < count($A); $i++){
        $s += $A[$i];
        if ($s == $avg){
            $s = 0; // 达到可以均分三份的值就重新置零
            $count ++; // 记数是为了满足这种条件 [1,-1,1,-1]
        }
    }
    if ($count >= 3){
        return true;
    }else{
        return false;
    }
}

$A = [12,-4,16,-5,9,-3,3,8,0];
var_dump(canThreePartsEqualSum($A));

### 多读题还是有好处的