<?php
/**
 * @Time: 2020/11/16
 * @DESC: 406. 根据身高重建队列
 * 假设有打乱顺序的一群人站成一个队列。
 * 每个人由一个整数对(h, k)表示，其中h是这个人的身高，k是排在这个人前面且身高大于或等于h的人数。
 * 编写一个算法来重建这个队列。
 * 注意：总人数少于1100人。
 * 示例
    输入: [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]]
    输出: [[5,0], [7,0], [5,2], [6,1], [4,4], [7,1]]
 * @param $people
 * @return array
 * @link: https://leetcode-cn.com/problems/queue-reconstruction-by-height/
 */
function reconstructQueue($people) {
    $n = count($people);

    if ($n <= 1) return $people;

    usort($people, function ($a,$b) {
        if ($a[0] == $b[0]) return $a[1] > $b[1];
        return $a[0] < $b[0];
    });

    var_dump($people);

    $res = [];
    $res[0] = $people[0];
    for ($i = 1; $i < $n; $i++) {
        array_splice($res, $people[$i][1], 0, [$people[$i]]);
    }

    return $res;
}

$people = [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]];
var_dump(reconstructQueue($people));