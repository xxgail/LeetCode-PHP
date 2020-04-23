<?php
# https://leetcode-cn.com/problems/count-number-of-nice-subarrays/
/**
 * @Time: 2020/4/23 20:20
 * @DESC: 1248. 统计「优美子数组」
 * 给你一个整数数组 nums 和一个整数 k。
 * 如果某个 连续 子数组中恰好有 k 个奇数数字，我们就认为这个子数组是「优美子数组」。
 * 请返回这个数组中「优美子数组」的数目。
 * @param $nums
 * @param $k
 * @return int
 */
function numberOfSubarrays($nums, $k) {
    $map = [];
    $m = 0;
    $len_nums = count($nums);
    for ($i = 0; $i < $len_nums; $i++) {
        if ($nums[$i] % 2 == 1) {
            $map[] = $m;
            $m = 0;
        } else {
            $m++;
        }
    }
    $map[] = $m; // [0=>3,1=>2,2=>3];

    $len_map = count($map);

    $res = 0;
    for ($i = 0; $i < $len_map; $i++) {
        if ($i + $k >= $len_map) {
            break;
        }

        $res += ($map[$i] + 1) * ($map[$i + $k] + 1);
    }
    return $res;
}

$nums = [2,2,2,1,2,2,1,2,2,2];
var_dump(numberOfSubarrays($nums,2)); // 16