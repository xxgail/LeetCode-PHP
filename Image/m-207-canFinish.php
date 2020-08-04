<?php
/**
 * @Time: 2020/8/4
 * @DESC: 207. 课程表
 * 你这个学期必须选修 numCourse 门课程，记为 0 到 numCourse-1 。
 * 在选修某些课程之前需要一些先修课程。 
 * 例如，想要学习课程 0 ，你需要先完成课程 1 ，我们用一个匹配来表示他们：[0,1]
 * @param $numCourses
 * @param $prerequisites
 * @return bool
 * @link: https://leetcode-cn.com/problems/course-schedule
 */
function canFinish($numCourses, $prerequisites) {
    if($prerequisites == []){
        return true;
    }
    $list = [];
    foreach ($prerequisites as $item) {
        if (isset($list[$item[0]])){
            $list[$item[0]]['in_degree']++;
        }else {
            $list[$item[0]] = [
                'in_degree' => 1,
                'out_degree' => [],
            ];
        }
        if (isset($list[$item[1]])){
            $list[$item[1]]['out_degree'][] = $item[0];
        }else{
            $list[$item[1]] = [
                'in_degree' => 0,
                'out_degree' => [$item[0]],
            ];
        }
    }
    $c = count($list);
    # 拓扑排序
    $q = new SplQueue();
    foreach ($list as $k => $num){
        if ($num['in_degree'] == 0) {$q->push($num); } # 找出所有入度为0的数
    }
    if ($q->isEmpty()){
        return false;
    }
    while (!$q->isEmpty()){
        $v = $q->shift();
        $c--;
        for ($i = 0; $i < count($v['out_degree']); $i++){ # 遍历出度
            $list[$v['out_degree'][$i]]['in_degree'] --; # 依次减一
            if ($list[$v['out_degree'][$i]]['in_degree'] == 0){ # 存取新的入度为0的数
                $q->push($list[$v['out_degree'][$i]]);
            }
        }
    }
    return $c == 0;
}

var_dump(canFinish(4,[[0,1],[0,2],[1,3],[3,0]]));

### 解题思路
# 第一步：生成形成闭环的图
#   [0,1] 即为 1 -> 0
#   出度记录箭头指向的目标值
#   入度记录指向该目标的箭头数量
# 第二步：利用拓扑排序，进行遍历
#   如果没有出度为0的目标值，即形成闭环，返回false
#   最后判断最终遍历完的结果是否等于numCourses（numCourses没用到？？