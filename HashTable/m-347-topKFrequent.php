<?php
/**
 * @Time: 2020/9/7
 * @DESC: 347. 前 K 个高频元素
 * 给定一个非空的整数数组，返回其中出现频率前 k 高的元素。
 * 示例 1:
    输入: nums = [1,1,1,2,2,3], k = 2
    输出: [1,2]
 * 示例 2:
    输入: nums = [1], k = 1
    输出: [1]
 * @param $nums
 * @param $k
 * @return array
 * @link: https://leetcode-cn.com/problems/top-k-frequent-elements/
 */
function topKFrequent($nums, $k) {
    # 1 优先队列
    $hash = array_count_values($nums);
    $pq = new SplPriorityQueue;
    foreach ($hash as $key => $val) {
        $pq->insert($key,$val);
    }
    $res = [];
    for ($i = 0; $i < $k; $i++){
        $res[] = $pq->extract();
    }
    return $res;

    # 2 hash表排序取前k个
    $hash = array_count_values($nums);
    arsort($hash);
    return array_slice(array_keys($hash),0,$k);
}

$nums = [1,1,1,2,2,3];
var_dump(topKFrequent($nums,2));