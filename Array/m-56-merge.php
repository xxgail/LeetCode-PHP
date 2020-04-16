<?php
# https://leetcode-cn.com/problems/merge-intervals/
/**
 * @Time: 2020/4/16 21:52
 * @DESC: 56. 合并区间
 * 给出一个区间的集合，请合并所有重叠的区间。
 * 示例 1:
 * 输入: [[1,3],[2,6],[8,10],[15,18]]
 * 输出: [[1,6],[8,10],[15,18]]
 * 解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
 * @param $intervals
 * @return array
 */
function merge($intervals){
    sort($intervals);

    $i = 0;
    $j = 1;
    $len = count($intervals);
    $res = [];
    while ($j < $len){
        if ($intervals[$i][1] >= $intervals[$j][0]){
            $intervals[$i][1] = max($intervals[$i][1],$intervals[$j][1]);
        }else{
            $res[] = $intervals[$i];
            $i = $j;
        }
        $j++;
    }
    $res[] = $intervals[$i];
    return $res;
}

$intervals = [[1,3],[2,6],[8,10],[15,18]];
$intervals = [[1,4],[4,5]];
$intervals = [[2,3],[1,4]];
var_dump(merge($intervals));