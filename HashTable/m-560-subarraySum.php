<?php
/**
 * @Time: 2020/5/15 16:50
 * @DESC: 560. 和为K的子数组
 * 给定一个整数数组和一个整数 k，你需要找到该数组中和为 k 的连续的子数组的个数。
 * 示例 1 :
 * 输入:nums = [1,1,1], k = 2
 * 输出: 2 , [1,1] 与 [1,1] 为两种不同的情况。
 * @param $nums
 * @param $k
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/subarray-sum-equals-k
 */
function subarraySum($nums, $k) {
    # O(n2) 超时
    // $len = count($nums);
    // $res = 0;
    // for ($i=0; $i < $len; $i++) {
    // 	$sum = 0;
    // 	for ($j=$i; $j >= 0; $j--) {
    // 		$sum += $nums[$j];
    // 		if ($sum == $k) {
    // 			$res ++;
    // 		}
    // 	}
    // }
    // return $res;

    # O(n) 哈希表
    $res = $sum = 0;
    $m = [];
    $m[0] = 1;
    for ($i = 0; $i < count($nums); $i++) {
        $sum += $nums[$i];
        $res += $m[$sum-$k] ?? 0;
        $m[$sum] = ($m[$sum] ?? 0) + 1;
    }
    return $res;
}

$nums = [3, 4, 7, 2, -3, 1, 4, 2];
$k = 7;
var_dump(subarraySum($nums, $k));