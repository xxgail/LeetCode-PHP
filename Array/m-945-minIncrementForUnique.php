<?php
/**
 * @Time: 2020/3/22 20:37
 * @DESC: 945. 使数组唯一的最小增量 中等
 * 给定整数数组 A，每次 move 操作将会选择任意 A[i]，并将其递增 1。
 * 返回使 A 中的每个值都是唯一的最少操作次数。
 * 示例
 * 输入：[3,2,1,2,1,7]
 * 输出：6
 * 解释：经过 6 次 move 操作，数组将变为 [3, 4, 1, 2, 5, 7]。
 * 可以看出 5 次或 5 次以下的 move 操作是不能让数组的每个值唯一的。
 * @param $A
 * @return int|mixed
 */
function minIncrementForUnique($A){
    if (count($A) <= 1){
        return 0;
    }
    sort($A);
    $offset = $A[0];
    $res = 0;
    for ($i = 0; $i < count($A); $i++){
        $diff = $i + $offset - $A[$i]; # $i + $offset 是数组唯一的情况下该存在的值。
        if ($diff > 0){
            $res += $diff;
        }else{
            $offset -= $diff;
        }
    }
    return $res;
}

var_dump(minIncrementForUnique([3,2,1,2,1,7,7,8,8,10,10,10,10,10]));