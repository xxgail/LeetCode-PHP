<?php
require "TreeNode.php";
# https://leetcode-cn.com/problems/count-complete-tree-nodes/
/**
 * @Time: 2020/3/28 13:50
 * @DESC: 222. 完全二叉树的节点个数
 * 给出一个完全二叉树，求出该树的节点个数。
 * 说明：
 * 完全二叉树的定义如下：在完全二叉树中，除了最底层节点可能没填满外，其余每层节点数都达到最大值，并且最下面一层的节点都集中在该层最左边的若干位置。若最底层为第 h 层，则该层包含 1~ 2h 个节点。
 * @param $root
 * @return int
 */
function countNodes($root){
    return $root == null ? 0 : countNodes($root->left) + countNodes($root->right) + 1;
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);
//$root->right->right = new TreeNode(7);
var_dump(countNodes($root));