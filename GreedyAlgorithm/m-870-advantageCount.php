<?php
/**
 * @Time: 2019/10/29 13:38
 * @DESC: 870. 田忌赛马 优势洗牌
 * 给定两个大小相等的数组 A 和 B，A 相对于 B 的优势可以用满足 A[i] > B[i] 的索引 i 的数目来描述。
 * 返回 A 的任意排列，使其相对于 B 的优势最大化。
 * @param $A
 * @param $B
 * @return array
 */
function advantageCount($A, $B) {
    sort($A);
    $result = [];
    for ($i = 0; $i < count($B); $i++){
        // 换成二分法查找
        $start = 0; $end = count($A)-1;
        while ($start < $end){
            $mid = floor(($start + $end)/2);
            if($A[$mid] > $B[$i]){
                $end = $mid;
            }else{
                $start = $mid + 1;
            }
        }

        if($A[$start] <= $B[$i]){
            $start = 0;
        }
        $result[] = $A[$start];
        unset($A[$start]); # 删除A中已经被选中的元素。
        $A = array_values($A);
    }
    return $result;
}
