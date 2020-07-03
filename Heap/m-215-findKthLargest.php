<?php
/**
 * @Time: 2019/10/23 15:57
 * @DESC: 215. 数组中的第K个最大元素
 * 在未排序的数组中找到第 k 个最大的元素。
 * 请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
 * @param $nums
 * @param $k
 * @return mixed
 * @link https://leetcode-cn.com/problems/kth-largest-element-in-an-array/
 */
function findKthLargest($nums, $k) {
    # 直接排序的 算法的时间复杂度为 O(N log N)，空间复杂度为 O(1)。
//    rsort($nums);
//    return $nums[$k - 1];

    # 大堆 好慢
//    $h = new SplMaxHeap();
//    for ($i = 0; $i < count($nums); $i++){
//        $h->insert($nums[$i]);
//    }
//    $res = 0;
//    for ($i = 0; $i < $k; $i++){
//        $res = $h->extract();
//    }
//    return $res;

    # 小堆就很快，保证堆的数量，然后返回顶。
    $h = new SplMinHeap();
    $len = count($nums);
    for ($i = 0; $i < $len; $i++){
        if ($h->count() < $k){
            $h->insert($nums[$i]);
        }elseif ($h->top() < $nums[$i]){
            $h->extract();
            $h->insert($nums[$i]);
        }
    }
    return $h->top();
}