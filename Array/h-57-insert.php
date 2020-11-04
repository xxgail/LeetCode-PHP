<?php
/**
 * @Time: 2020/11/4
 * @DESC: 57. 插入区间
 * 给出一个无重叠的 ，按照区间起始端点排序的区间列表。
 * 在列表中插入一个新的区间，你需要确保列表中的区间仍然有序且不重叠（如果有必要的话，可以合并区间）。
 * 示例 1：
    输入：intervals = [[1,3],[6,9]], newInterval = [2,5]
    输出：[[1,5],[6,9]]
 * 示例2：
    输入：intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]], newInterval = [4,8]
    输出：[[1,2],[3,10],[12,16]]
 * 解释：这是因为新的区间 [4,8] 与 [3,5],[6,7],[8,10] 重叠。
 * @param $intervals
 * @param $newInterval
 * @return array
 * @link: https://leetcode-cn.com/problems/insert-interval
 */
function insert($intervals, $newInterval) {
    $len = count($intervals);
    # 1. 小于最小值
    if ($newInterval[1] < $intervals[0][0]) { # [[1,2],[3,5],[6,7],[8,10],[12,16]] [-1,0]
        array_unshift($intervals,$newInterval);
        return $intervals;
    }
    # 2. 大于最大值
    if ($newInterval[0] > $intervals[$len-1][1]) { # [[1,2],[3,5],[6,7],[8,10],[12,16]] [17,18]
        array_push($intervals,$newInterval);
        return $intervals;
    }
    # 3. 小于最小值且大于最大值
    if ($newInterval[0] <= $intervals[0][0] && $newInterval[1] >= $intervals[$len-1][1]) {
        return [$newInterval];
    }
    for($i = 0; $i < $len; $i++) {
        if ($intervals[$i][0] <= $newInterval[0] && $intervals[$i][1] >= $newInterval[1]) { # [[1,2],[3,5],[6,7],[8,10],[12,16]] [13,14]
            # 4. 在某一个区间内
            return $intervals;
        } else if ($i < $len - 1 && $intervals[$i][1] < $newInterval[0] && $intervals[$i + 1][0] > $newInterval[1]) {
            # 5. 不在任意的一个区间内
            array_splice($intervals, $i + 1, 0, [$newInterval]);
            return $intervals;
        } else if ($intervals[$i][1] >= $newInterval[0]) {
            $intervals[$i][0] = min($intervals[$i][0], $newInterval[0]);
            if ($i == $len-1 || $intervals[$i+1][0] > $newInterval[1]) {
                $intervals[$i][1] = max($newInterval[1], $intervals[$i][1]);
                return $intervals;
            }
            $large = $newInterval[1];
            $p = $i + 1;
            while ($p < $len) {
                if ($intervals[$p][0] > $large) {
                    $intervals[$i][1] = $large;
                    return $intervals;
                }
                if ($intervals[$p][0] <= $large && $intervals[$p][1] > $large) {
                    $intervals[$i][1] = $intervals[$p][1];
                    unset($intervals[$p]);
                    return array_values($intervals);
                }
                unset($intervals[$p]);
                $p++;
            }
            if ($p == $len) {
                $intervals[$i][1] = $large;
                return array_values($intervals);
            }
        }
    }
}
# 遍历1，把新区间放到列表中
# 1. 新区间在原列表中的某一个区间内
# 2. 新区间在原列表的最左边
    # 2.1 与左边重合
    # 2.2 与左边不重合
# 3. 新区间在原列表的最右边
    # 3.1 与右边重合
    # 3.2 与右边不重合

$intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]];
$newInterval = [4,11];
//$intervals = [[1,3],[6,9]];
//$newInterval = [2,5];
print_r(insert($intervals,$newInterval));

$A = ['1','2'];
array_splice($A,2,0,['A']);
var_dump($A);