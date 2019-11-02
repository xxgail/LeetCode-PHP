<?php
/**
 * @Time: 2019/10/23 15:57
 * @DESC: 215. 数组中的第K个最大元素
 * 在未排序的数组中找到第 k 个最大的元素。
 * 请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
 * @param $nums
 * @param $k
 * @return mixed
 */
function findKthLargest($nums, $k) {
    rsort($nums);
    return $nums[$k - 1];
}

##----
# 直接排序的 算法的时间复杂度为 O(N log N)，空间复杂度为 O(1)。
# 官方给的是用堆来解决。（堆还没看）
# (⊙_⊙)