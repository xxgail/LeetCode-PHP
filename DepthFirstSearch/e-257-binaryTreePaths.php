<?php
require '../TreeNode/TreeNode.php';
/**
 * @Time: 2020/9/4
 * @DESC: 257. 二叉树的所有路径
 * 给定一个二叉树，返回所有从根节点到叶子节点的路径。
 * 说明: 叶子节点是指没有子节点的节点。
 * 示例:
    输入:
        1
       / \
      2   3
       \
        5
    输出: ["1->2->5", "1->3"]
    解释: 所有根节点到叶子节点的路径为: 1->2->5, 1->3
 * @param $root
 * @return array
 * @link: https://leetcode-cn.com/problems/binary-tree-paths/
 */
function binaryTreePaths($root) {
    if ($root == null) return [];
    $res = [];
    dfs($root,[],$res);
    return $res;
}

function dfs($root,$path,&$res){
    $path[] = $root->val;
    if ($root->left == null && $root->right == null){
        $res[] = implode('->',$path);
        return;
    }
    if ($root->left != null){
        dfs($root->left,$path,$res);
    }
    if ($root->right != null){
        dfs($root->right,$path,$res);
    }
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->right = new TreeNode(5);
var_dump(binaryTreePaths($root));