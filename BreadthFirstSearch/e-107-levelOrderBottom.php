<?php
/**
 * @Time: 2020/9/6
 * @DESC: 107. 二叉树的层次遍历 II
 * 给定一个二叉树，返回其节点值自底向上的层次遍历。 （即按从叶子节点所在层到根节点所在的层，逐层从左向右遍历）
 * 例如：
    给定二叉树 [3,9,20,null,null,15,7],
        3
       / \
      9  20
     / \
    15  7
    返回其自底向上的层次遍历为：
    [
    [15,7],
    [9,20],
    [3]
    ]
 * @param $root
 * @return array
 * @link: https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii/
 */
function levelOrderBottom($root) {
    if($root == null) return [];
    $q = [$root];
    $res = [];
    while($q){
        $tmp = [];
        $item = [];
        for($i = 0; $i < count($q); $i++){
            $item[] = $q[$i]->val;
            if($q[$i]->left != null){
                $tmp[] = $q[$i]->left;
            }
            if($q[$i]->right != null){
                $tmp[] = $q[$i]->right;
            }
        }
        $q = $tmp;
        array_unshift($res,$item);
    }
    return $res;
}