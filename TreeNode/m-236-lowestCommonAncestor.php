<?php
require 'TreeNode.php';
/**
 * @Time: 2020/5/12 17:47
 * @DESC:
 * 给定一个二叉树, 找到该树中两个指定节点的最近公共祖先。
 * 百度百科中最近公共祖先的定义为：“对于有根树 T 的两个结点 p、q，最近公共祖先表示为一个结点 x，满足 x 是 p、q 的祖先且 x 的深度尽可能大（一个节点也可以是它自己的祖先）。”
 * @param $root
 * @param $p
 * @param $q
 * @return TreeNode|null
 * @link: https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-tree
 */
function lowestCommonAncestor($root, $p, $q) {
    if ($root == null) {
        return null;
    }
    if ($root->val == $p->val || $root->val == $q->val) {
        return $root;
    }

    $left = lowestCommonAncestor($root->left, $p, $q);
    $right = lowestCommonAncestor($root->right, $p, $q);

    if ($left != null && $right != null) {
        return $root;
    }
    if ($left == null) {
        return $right;
    }

    return $left;
}

$root = new TreeNode(3);
$root->left = new TreeNode(5);
$root->right = new TreeNode(1);
$root->left->left = new TreeNode(6);
$root->left->right = new TreeNode(2);
$root->right->left = new TreeNode(0);
$root->right->right = new TreeNode(8);
$root->left->right->left = new TreeNode(7);
$root->left->right->right = new TreeNode(4);

$p = new TreeNode(5);
$q = new TreeNode(1);
var_dump(lowestCommonAncestor($root,$p,$q));

$p = new TreeNode(5);
$q = new TreeNode(4);
var_dump(lowestCommonAncestor($root,$p,$q));
