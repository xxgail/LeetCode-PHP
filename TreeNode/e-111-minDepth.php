<?php
require 'TreeNode.php';
/**
 * @Time: 2020/8/17 2020/8/21
 * @DESC: 111. 二叉树的最小深度
 * 给定一个二叉树，找出其最小深度。
 * 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 * 说明: 叶子节点是指没有子节点的节点。
 * @param $root
 * @return int
 * @link: https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/
 */
function minDepth($root){
    if ($root == null){
        return 0;
    }
    if ($root->left == null){
        return minDepth($root->right) + 1;
    }
    if ($root->right == null){
        return minDepth($root->left) + 1;
    }
    return min(minDepth($root->left),minDepth($root->right))+1;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
var_dump(minDepthBFS($root));

# 非递归 广度优先搜索解法
function minDepthBFS($root){
    if ($root == null){
        return 0;
    }
    $q = [$root];
    $res = 0;
    while ($q){
        $temp = [];
        $res++;
        for ($i = 0; $i < count($q); $i++){
            if ($q[$i]->left == null && $q[$i]->right == null) return $res;
            if($q[$i]->left != null) array_push($temp,$q[$i]->left);
            if($q[$i]->right != null) array_push($temp,$q[$i]->right);
        }
        $q = $temp;
    }
    return $res;
}