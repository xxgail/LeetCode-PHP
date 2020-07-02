<?php
function kthSmallest($matrix, $k) {
    # 暴力解法，转为一维数组再排序，取值 O(n2)
//    $result = [];
//    for ($i = 0; $i < count($matrix); $i++) {
//        $result = array_merge($result, $matrix[$i]);
//    }
//    sort($result);
//    return $result[$k - 1];

    # 小顶堆
    $h = new SplMinHeap();
    for ($i = 0; $i < count($matrix); $i++){
        $h->insert([$matrix[$i][0],$i,0]);
    }
    for ($i = 0; $i < $k - 1; $i++){
        $now = $h->extract();
        if ($now[2] != count($matrix)-1){
            $h->insert([$matrix[$now[1]][$now[2]+1],$now[1],$now[2]+1]);
        }
    }
    return $h->top()[0];
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