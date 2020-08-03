<?php
/**
 * @Time: 2020/8/1
 * @DESC: 632. 最小区间
 * 你有 k 个升序排列的整数数组。找到一个最小区间，使得 k 个列表中的每个列表至少有一个数包含在其中。
 * 我们定义如果 b-a < d-c 或者在 b-a == d-c 时 a < c，则区间 [a,b] 比 [c,d] 小。
 * 示例 1:
    输入:[[4,10,15,24,26], [0,9,12,20], [5,18,22,30]]
    输出: [20,24]
    解释:
    列表 1：[4, 10, 15, 24, 26]，24 在区间 [20,24] 中。
    列表 2：[0, 9, 12, 20]，20 在区间 [20,24] 中。
    列表 3：[5, 18, 22, 30]，22 在区间 [20,24] 中。
 * @param $nums
 * @return array
 * @link: https://leetcode-cn.com/problems/smallest-range-covering-elements-from-k-lists
 */
function smallestRange($nums){
    # hash-table + 双指针 TODO：
    $size = count($nums);
    $indices = array_fill(0,0,[]);
    $xMin = PHP_INT_MAX;
    $xMax = PHP_INT_MIN;
    for ($i = 0; $i < $size; $i++) {
        foreach ($nums[$i] as $num) {
            $indices[$num][] = $i;
            $xMin = min($xMin,$num);
            $xMax = max($xMax,$num);
        }
    }

    $freq = array_fill(0,$size,0);
    $inside = 0;
    $left = $xMin;
    $right = $xMin - 1;
    $bestLeft = $xMin;
    $bestRight = $xMax;

    while ($right < $xMax) {
        $right++;
        if (isset($indices[$right]) && count($indices[$right]) > 0) {
            foreach ($indices[$right] as $index) {
                $freq[$index]++;
                if ($freq[$index] == 1){
                    $inside++;
                }
            }
            while ($inside == $size){
                if ($right - $left < $bestRight - $bestLeft) {
                    $bestLeft = $left;
                    $bestRight = $right;
                }
                if (isset($indices[$left]) && count($indices[$left]) > 0) {
                    foreach ($indices[$left] as $index) {
                        $freq[$index]--;
                        if ($freq[$index] == 0){
                            $inside--;
                        }
                    }
                }
                $left++;
            }
        }
    }
    return [$bestLeft, $bestRight];
}



$nums = [[4,10,15,24,26], [0,9,12,20], [5,18,22,30]];
var_dump(smallestRange($nums));