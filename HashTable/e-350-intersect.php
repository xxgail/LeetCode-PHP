<?php
# https://leetcode-cn.com/problems/intersection-of-two-arrays-ii/
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
    # 普通的循环数组
//    $result = [];
//    $count1 = count($nums1);
//    $count2 = count($nums2);
//    if($count1 == 0 || $count2 == 0){
//        return $result;
//    }
//    for ($i = 0; $i < $count1; $i++){
//        if($count2 == 0){
//            break;
//        }
//        if(in_array($nums1[$i],$nums2)){
//            $result[] = $nums1[$i];
//            unset($nums2[array_search($nums1[$i],$nums2)]);
//            $count2 --;
//        }
//    }
//    return $result;

    # hash表
    $hash1 = array_count_values($nums1);
    $hash2 = array_count_values($nums2);
    $result = [];
    foreach ($hash1 as $k => $val) {
        $result = array_merge($result,isset($hash2[$k]) ? array_fill(0,min($hash2[$k], $val),$k) : []);
    }
    return $result;
}


$nums1 = [1,2,2,1];
$nums2 = [2,2];
var_dump(intersect($nums1,$nums2));

$nums1 = [4,9,5];
$nums2 = [9,4,9,8,4];
var_dump(intersect($nums1,$nums2));