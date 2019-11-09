<?php
/**
 * @Time: 2019/11/7 15:08
 * @DESC: 740. 删除与获得点数
 * 给定一个整数数组 nums ，你可以对它进行一些操作。
 * 每次操作中，选择任意一个 nums[i] ，删除它并获得 nums[i] 的点数。之后，你必须删除每个等于 nums[i] - 1 或 nums[i] + 1 的元素。
 * 开始你拥有 0 个点数。返回你能通过这些操作获得的最大点数。
 *
 * 示例 1:
 * 输入: nums = [3, 4, 2]
 * 输出: 6
 * 解释:
 * 删除 4 来获得 4 个点数，因此 3 也被删除。
 * 之后，删除 2 来获得 2 个点数。总共获得 6 个点数。
 * @param $nums
 * @return int
 */
function deleteAndEarn($nums) {
    if($nums == []){
        return 0;
    }
    sort($nums);
    $begin = $nums[0];
    $end = end($nums);
    $nums = array_count_values($nums);
    for ($i = $begin; $i < $end; $i++){
        $nums[$i] = $nums[$i] ?? 0;
    }
    ksort($nums);

    $prevMax = 0;
    $currMax = 0;
    foreach ($nums as $k => $item) {
        $temp = $currMax;
        $currMax = max($prevMax + $k * $item, $currMax);
        $prevMax = $temp;
    }
    return $currMax;
}

##----
# 啊啊啊啊啊啊啊啊我是怎么写出来的！！！