<?php

/**
 * @Time: 2019/9/6 11:54
 * @DESC: 350. 两个数组的交集② 简单
 * 给定两个数组，编写一个函数来计算它们的交集。
 * 说明：
 * 输出结果中每个元素出现的次数，应与元素在两个数组中出现的次数一致。
 * 我们可以不考虑输出结果的顺序
 * @param $nums1
 * @param $nums2
 * @return array
 */
function intersect($nums1, $nums2) {
    $result = [];
    if(count($nums1) == 0){
        return $result;
    }
    for ($i = 0; $i < count($nums1); $i++){
        if(count($nums2) == 0){
            break;
        }
        if(in_array($nums1[$i],$nums2)){
            $result[] = $nums1[$i];
            unset($nums2[array_search($nums1[$i],$nums2)]);
//            $nums2 = array_diff($nums2,[$nums1[$i]]);
            var_dump($nums2);
        }
    }
    return $result;
}
