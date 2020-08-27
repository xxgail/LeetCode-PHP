<?php
/**
 * @Time: 2020/8/27
 * @DESC: 332. 重新安排行程
 * 给定一个机票的字符串二维数组 [from, to]，子数组中的两个成员分别表示飞机出发和降落的机场地点，对该行程进行重新规划排序。所有这些机票都属于一个从 JFK（肯尼迪国际机场）出发的先生，所以该行程必须从 JFK 开始。
 * 说明:
 * 如果存在多种有效的行程，你可以按字符自然排序返回最小的行程组合。例如，行程 ["JFK", "LGA"] 与 ["JFK", "LGB"] 相比就更小，排序更靠前
 * 所有的机场都用三个大写字母表示（机场代码）。
 * 假定所有机票至少存在一种合理的行程。
 * 示例 1:
    输入: [["MUC", "LHR"], ["JFK", "MUC"], ["SFO", "SJC"], ["LHR", "SFO"]]
    输出: ["JFK", "MUC", "LHR", "SFO", "SJC"]
 * 示例 2:
    输入: [["JFK","SFO"],["JFK","ATL"],["SFO","ATL"],["ATL","JFK"],["ATL","SFO"]]
    输出: ["JFK","ATL","JFK","SFO","ATL","SFO"]
    解释: 另一种有效的行程是["JFK","SFO","ATL","JFK","ATL","SFO"]。但是它自然排序更大更靠后。
 * @param $tickets
 * @return array
 * @link: https://leetcode-cn.com/problems/reconstruct-itinerary
 */
function findItinerary($tickets) {
    $images = [];
    foreach ($tickets as $ticket) {
        $images[$ticket[0]][] = $ticket[1];
    }
    foreach ($images as $k=>$image) {
        sort($images[$k]); // 自然排序
    }
    $path = [];
    findItineraryDFS($images,"JFK",$path);
    return $path;
}

function findItineraryDFS(&$images,$start,&$path){
    while (!empty($images[$start])) {
        findItineraryDFS($images,array_shift($images[$start]),$path);
    }
    array_unshift($path,$start);
}




$tickets = [["MUC", "LHR"], ["JFK", "MUC"], ["SFO", "SJC"], ["LHR", "SFO"]];
$tickets = [["JFK","SFO"],["JFK","ATL"],["SFO","ATL"],["ATL","JFK"],["ATL","SFO"]];
var_dump(findItinerary($tickets));