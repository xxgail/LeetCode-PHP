<?php
/**
 * @Time: 2020/10/22
 * @DESC: 763. 划分字母区间
 * 字符串 S 由小写字母组成。
 * 我们要把这个字符串划分为尽可能多的片段，同一个字母只会出现在其中的一个片段。
 * 返回一个表示每个字符串片段的长度的列表。
 * 示例 1：
    输入：S = "ababcbacadefegdehijhklij"
    输出：[9,7,8]
 * 解释：
    划分结果为 "ababcbaca", "defegde", "hijhklij"。
    每个字母最多出现在一个片段中。
    像 "ababcbacadefegde", "hijhklij" 的划分是错误的，因为划分的片段数较少。
 * @param $S
 * @return array []int
 * @link: https://leetcode-cn.com/problems/partition-labels/
 */
function partitionLabels($S) {
    $lastP = [];
    $len = strlen($S);
    for ($i = 0; $i < $len; $i++){
        $lastP[$S[$i]] = strrpos($S,$S[$i]);
    }
    $res = [];
    $start = $end = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($lastP[$S[$i]] > $end) {
            $end = $lastP[$S[$i]];
        }
        if ($end == $i) {
            $res[] = $end - $start + 1;
            $start = $end + 1;
        }
    }
    return $res;
}

$S = "ababcbacadefegdehijhklij";
var_dump(partitionLabels($S));