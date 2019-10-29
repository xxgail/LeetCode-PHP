<?php
/**
 * @Time: 2019/10/29 13:38
 * @DESC: 870. 田忌赛马
 * 给定两个大小相等的数组 A 和 B，A 相对于 B 的优势可以用满足 A[i] > B[i] 的索引 i 的数目来描述。
 * 返回 A 的任意排列，使其相对于 B 的优势最大化。
 * @param $A
 * @param $B
 * @return array
 */
function advantageCount($A, $B) {
    # todo : 超出时间限制 〒▽〒
    sort($A);
    $result = [];
    for ($i = 0; $i < count($B); $i++){
        if($B[$i] >= end($A)){
            $result[] = array_shift($A);
            continue;
        }
        for ($j = 0; $j < count($A); $j++){
            if($A[$j] > $B[$i]){
                $result[] = $A[$j];
                unset($A[$j]);
                $A = array_values($A);
                break;
            }else{
                continue;
            }
        }
    }
    return $result;
}