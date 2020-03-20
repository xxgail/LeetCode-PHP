<?php

//todo: 看堆的定义
//https://learnku.com/articles/14747/common-algorithm-php-implementation-heap-sorting
# 把无序的数组调整为一个符合堆性质的数组
/**
 * @Time: 2020/3/20 17:55
 * @DESC:
 * @param $arr [待排序的无序数组]
 * @param $start [第一个需要调整的非叶子节点]
 * @param $len [元素个数]
 */
function headAdjust(&$arr,$start,$len){
    for ($child = $start * 2 + 1; $child < $len; $child = $child * 2 + 1){
        if ($child != $len - 1 && $arr[$child] < $arr[$child+1]){
            $child ++;
        }

        if ($arr[$start] >= $arr[$child]){
            break;
        }

        list($arr[$start], $arr[$child]) = array($arr[$child],$arr[$start]);

        $start = $child;
    }
}

function heapSort(&$arr){
    $len = count($arr);

    for ($i = ($len >> 1) - 1; $i >= 0; $i--){
        headAdjust($arr,$i,$len);
    }

    for ($i = $len - 1; $i >= 0; $i--){
        list($arr[0],$arr[$i]) = array($arr[$i],$arr[0]);

        headAdjust($arr,0,$i);
    }
}