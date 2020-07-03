<?php
/**
 * @Time: 2020/7/2 10:29
 * @DESC: 378. 有序矩阵中第K小的元素
 * 给定一个 n x n 矩阵，其中每行和每列元素均按升序排序，找到矩阵中第 k 小的元素。
 * 请注意，它是排序后的第 k 小元素，而不是第 k 个不同的元素。
 * 示例：
    matrix = [
        [ 1,  5,  9],
        [10, 11, 13],
        [12, 13, 15]
    ],
    k = 8,
    返回 13。
 * @param $matrix
 * @param $k
 * @return mixed
 * @link: https://leetcode-cn.com/problems/kth-smallest-element-in-a-sorted-matrix
 */
function kthSmallest($matrix, $k) {
    # 暴力解法，转为一维数组再排序，取值 O(n2)
//    $result = [];
//    for ($i = 0; $i < count($matrix); $i++) {
//        $result = array_merge($result, $matrix[$i]);
//    }
//    sort($result);
//    return $result[$k - 1];

    # 小顶堆
//    $h = new SplMinHeap();
//    for ($i = 0; $i < count($matrix); $i++){
//        $h->insert([$matrix[$i][0],$i,0]);
//    }
//    for ($i = 0; $i < $k - 1; $i++){
//        $now = $h->extract();
//        if ($now[2] != count($matrix)-1){
//            $h->insert([$matrix[$now[1]][$now[2]+1],$now[1],$now[2]+1]);
//        }
//    }
//    return $h->top()[0];

    # 二分法查找
    $n = count($matrix);
    $left = $matrix[0][0];
    $right = $matrix[$n-1][$n-1];
    while ($left < $right){
        $mid = $left + ($right - $left)/2;
        if (check($matrix,$mid,$k,$n)){
            $right = $mid;
        }else{
            $left = $mid + 1;
        }
    }
    return $left;
}

function check($matrix, $mid, $k, $n){
    $i = $n-1;
    $j = 0;
    $num = 0;
    while ($i >= 0 && $j < $n){
        if ($matrix[$i][$j] <= $mid){
            $num += $i + 1;
            $j++;
        }else{
            $i--;
        }
    }
    return $num >= $k;
}

$matrix = [
    [1, 5, 9],
    [10, 11, 13],
    [12, 13, 15],
];
$k = 2;
$matrix = [[1,2],[3,3]];
$k = 4;
var_dump(kthSmallest($matrix, $k));