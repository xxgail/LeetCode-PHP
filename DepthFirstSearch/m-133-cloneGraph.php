<?php
class Node {
    public $val = null;
    public $neighbors = null;
    function __construct($val = 0) {
        $this->val = $val;
        $this->neighbors = array();
    }
}

/**
 * @Time: 2020/8/12
 * @DESC: 133. 克隆图
 * 给你无向连通图中一个节点的引用，请你返回该图的深拷贝（克隆）。
 * 图中的每个节点都包含它的值 val（int） 和其邻居的列表（list[Node]）。
 * class Node {
 * public int val;
 * public List<Node> neighbors;
 * }
 * 测试用例格式：
    简单起见，每个节点的值都和它的索引相同。例如，第一个节点值为 1（val = 1），第二个节点值为 2（val = 2），以此类推。该图在测试用例中使用邻接列表表示。
    邻接列表 是用于表示有限图的无序列表的集合。每个列表都描述了图中节点的邻居集。
    给定节点将始终是图中的第一个节点（值为 1）。你必须将 给定节点的拷贝 作为对克隆图的引用返回。
 * @param $node
 * @return mixed|Node|null
 * @link: https://leetcode-cn.com/problems/clone-graph
 */
function cloneGraph($node) {
    $map = new SplObjectStorage();
    return dfs($node,$map);
}

function dfs($node,&$map){
    if ($node == null) return null;
    if ($map->contains($node)) return $map[$node];
    $clone = new Node($node->val);
    $map[$node] = $clone;
    foreach ($node->neighbors as $n){
        $clone->neighbors[] = dfs($n,$map);
    }
    return $clone;
}

