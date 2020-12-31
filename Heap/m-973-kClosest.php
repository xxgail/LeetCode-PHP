<?php
/**
 * @Time: 2020/11/9
 * @DESC: 973. 最接近原点的 K 个点
 * 我们有一个由平面上的点组成的列表 points 需要从中找出 K 个距离原点 (0, 0) 最近的点。
 * （这里，平面上两点之间的距离是欧几里德距离。）
 * 你可以按任何顺序返回答案。除了点坐标的顺序之外，答案确保是唯一的。
 * 示例 1：
    输入：points = [[1,3],[-2,2]], K = 1
    输出：[[-2,2]]
 * @param $points
 * @param $K
 * @return array
 * @link: https://leetcode-cn.com/problems/k-closest-points-to-origin/
 */
function kClosest($points, $K) {
    $q = new SplPriorityQueue();
    foreach ($points as $point) {
        $q->insert($point,- pow($point[0],2) - pow($point[1],2));
    }
    $res = [];
    for ($i = 0; $i < $K; $i++){
        $res[] = $q->extract();
    }
    return $res;
}

$points = [[3,3],[5,-1],[-2,4]];
$K = 2;
var_dump(kClosest($points,$K));