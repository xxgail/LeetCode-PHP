<?php
/**
 * @Time: 2020/3/13 14:58
 * @DESC: 169. 多数元素 简单
 * 给定一个大小为 n 的数组，找到其中的多数元素。
 * 多数元素是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 * @param $nums
 * @return mixed
 */
function majorityElement($nums){
    # ------ 最普通的方法 执行用时76ms
//    $len = count($nums) / 2;
//    $arr = [];
//    foreach($nums as $k => $v){
//        $arr[$v] = isset($arr[$v]) ? $arr[$v] + 1 : 1;
//        if($arr[$v] > $len){
//            return $v;
//        }
//    }
    # ----- 先排序再截取 用时80ms
//    sort($nums);
//    return $nums[count($nums)/2];

    # ----- 根据出现过的频率遍历整个数组 用时48ms
    $last = $nums[0];
    $count = 0;
    foreach ($nums as $num) {
        if ($count == 0){
            $last = $num;
            $count++;
            continue;
        }
        if ($last == $num){
            $count++;
        }else{
            $count--;
        }
    }
    return $last;
}