<?php
/**
 * @Time: 2020/12/31
 * @DESC: 435. 无重叠区间
 * 给定一个区间的集合，找到需要移除区间的最小数量，使剩余区间互不重叠。
 * 注意:
    可以认为区间的终点总是大于它的起点。
    区间 [1,2] 和 [2,3] 的边界相互“接触”，但没有相互重叠。
 * 示例 1:
    输入: [ [1,2], [2,3], [3,4], [1,3] ]
    输出: 1
    解释: 移除 [1,3] 后，剩下的区间没有重叠。
 * @param $intervals
 * @return int
 * @link: https://leetcode-cn.com/problems/non-overlapping-intervals/
 */
function eraseOverlapIntervals($intervals) {
    # 根据右区间排序
    usort($intervals,function ($a,$b) { return $a[1] - $b[1];});
    $len = count($intervals);
    $now = $intervals[0][1];
    $start = 1;
    $num = 0;
    while ($start < $len) {
        if ($intervals[$start][0] >= $now) {
            $now = $intervals[$start][1];
        }else {
            $num++;
        }
        $start++;
    }
    return $num;
}

$intervals = [ [1,2], [2,3] ];
$intervals = [ [1,2], [2,3], [3,4], [1,3] ];
var_dump(eraseOverlapIntervals($intervals));