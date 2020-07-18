<?php
/**
 * @DESC: 拓扑排序
 * 图必须是有向图，图里面没有环。
 * 一般用来理清具有依赖关系的任务。
 * @param $nums
 * @return array
 * 时间复杂度O(n)
 */
function topologicalSort($nums){
    # 广度优先搜索
    $res = [];
    $q = new SplQueue();
    $va = new SplQueue();
    foreach ($nums as $k => $num){
        if ($num['in_degree'] == 0) {$q->push($num); $va->push($k);} # 找出所有入度为0的数
    }
    while (!$q->isEmpty()){
        $v = $q->shift();
        $res[] = $va->shift(); # 存值
        for ($i = 0; $i < count($v['out_degree']); $i++){ # 遍历出度
            $nums[$v['out_degree'][$i]]['in_degree'] --; # 依次减一
            if ($nums[$v['out_degree'][$i]]['in_degree'] == 0){ # 存取新的入度为0的数
                $q->push($nums[$v['out_degree'][$i]]);
                $va->push($v['out_degree'][$i]);
            }
        }
    }
    return $res;
}

$nums = [
    1 => [
        'in_degree' => 0, # 入度（指向箭头）
        'out_degree' => [2,4], # 出度（指出箭头）
    ],
    2 => [
        'in_degree' => 1,
        'out_degree' => [3,4],
    ],
    3 => [
        'in_degree' => 2,
        'out_degree' => [5],
    ],
    4 => [
        'in_degree' => 2,
        'out_degree' => [3,5],
    ],
    5 => [
        'in_degree' => 2,
        'out_degree' => [],
    ],
];
var_dump(topologicalSort($nums));
