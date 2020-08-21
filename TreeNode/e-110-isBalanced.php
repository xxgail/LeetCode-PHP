<?php
require "TreeNode.php";
/**
 * @Time: 2020/8/17
 * @DESC: 110. 平衡二叉树
 * 给定一个二叉树，判断它是否是高度平衡的二叉树。
 * 本题中，一棵高度平衡二叉树定义为：
 *      一个二叉树每个节点的左右两个子树的高度差的绝对值不超过1。
 * @param $root
 * @return bool
 * @link: https://leetcode-cn.com/problems/balanced-binary-tree/
 */
function isBalanced($root) {
    if ($root == null){
        return true;
    }
    return abs(height($root->left) - height($root->right)) <= 1
        && isBalanced($root->left)
        && isBalanced($root->right);
}

/**
 * @Time: 2020/8/17
 * @DESC: 求树的高度
 * @param $root
 * @return int
 */
function height($root){
    if ($root == null){
        return 0;
    }
    return 1 + max(height($root->left),height($root->right));
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
var_dump(isBalanced($root));