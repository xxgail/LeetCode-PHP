<?php
# https://leetcode-cn.com/problems/rotate-matrix-lcci/
/**
 * @Time: 2020/4/7 12:55
 * @DESC: 面试题 01.07. 旋转矩阵
 * 给你一幅由 N × N 矩阵表示的图像，其中每个像素的大小为 4 字节。请你设计一种算法，将图像旋转 90 度。
 * 不占用额外内存空间能否做到？
 * @param $matrix
 * @return array
 */
function rotate(&$matrix){
    # 双重遍历 O(n^2)
//    $n = count($matrix);
//    $a = $matrix;
//    for ($i = 0; $i < $n; $i++){
//        for ($j = 0; $j < $n; $j++){
//            $matrix[$i][$j] = $a[$n-$j-1][$i];
//        }
//    }
//    return $matrix;
    # O((n/2)^2)
    $n = count($matrix);
    for ($i = 0; $i < floor($n/2); $i++){
        for ($j = 0; $j < floor(($n+1)/2); $j++){
            list($matrix[$i][$j],$matrix[$j][$n-1-$i],$matrix[$n-$i-1][$n-$j-1],$matrix[$n-$j-1][$i])
                = [$matrix[$n-$j-1][$i],$matrix[$i][$j],$matrix[$j][$n-1-$i],$matrix[$n-$i-1][$n-$j-1]];
        }
    }
    return $matrix;
}
$matrix =
    [
        [1,2,3],
        [4,5,6],
        [7,8,9]
    ];
$matrix =
    [
        [ 5, 1, 9,11],
        [ 2, 4, 8,10],
        [13, 3, 6, 7],
        [15,14,12,16]
    ];
var_dump(rotate($matrix));

### 向右旋转90°