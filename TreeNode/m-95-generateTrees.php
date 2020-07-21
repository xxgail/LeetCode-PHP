<?php
require 'TreeNode.php';
/**
 * @Time: 2020/7/21 14:03
 * @DESC: 95. 不同的二叉搜索树②
 * 给定一个整数 n，生成所有由 1 ... n 为节点所组成的 二叉搜索树。
 * @param $n
 * @return array []TreeNode
 * @link: https://leetcode-cn.com/problems/unique-binary-search-trees-ii/
 */
function generateTrees($n) {
    if ($n == 0){
        return [];
    }
    return helper(1,$n);
}

function helper($start,$end){
    if ($start > $end){
        return [null]; # 生成空树
    }
    $allTrees = [];
    for ($i = $start; $i <= $end; $i++){
        $left = helper($start,$i-1); # 左边数据生成的树列表
        $right = helper($i+1,$end); # 右边数据生成的树列表
        foreach ($left as $l) {
            foreach ($right as $r) { # 双重遍历随机组合
                $current = new TreeNode($i);
                $current->left = $l;
                $current->right = $r;
                $allTrees[] = $current;
            }
        }
    }
    return $allTrees;
}

var_dump(generateTrees(2));
