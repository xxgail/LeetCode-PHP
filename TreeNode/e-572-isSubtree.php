<?php
require 'TreeNode.php';
/**
 * @Time: 2020/5/9 14:00
 * @DESC: 572. 另一棵树的子树
 * 给定两个非空二叉树 s 和 t，检验 s 中是否包含和 t 具有相同结构和节点值的子树。s 的一个子树包括 s 的一个节点和这个节点的所有子孙。s 也可以看做它自身的一棵子树。
 * 示例 1:
 * 给定的树 s:
 *   3
    / \
    4   5
   / \
 * 1  2
 * 给定的树 t：
 *   4
    / \
 *  1  2
 * 返回 true，因为 t 与 s 的一个子树拥有相同的结构和节点值。
 * @param $s
 * @param $t
 * @return bool
 * @link: https://leetcode-cn.com/problems/subtree-of-another-tree
 */
function isSubtree($s, $t) {
    if ($s == null && $t == null) {
        return true;
    }

    if ($s == null && $t != null) {
        return false;
    }

    return isSubtree($s->left, $t) || isSubtree($s->right, $t) || isSameTree($s, $t);
}

function isSameTree($s, $t) {
    if ($s == null && $t == null) {
        return true;
    }

    return $s && $t && $s == $t && isSameTree($s->left, $t->left) && isSameTree($s->right, $t->right);
}


$s = new TreeNode(3);
$s->left = new TreeNode(4);
$s->right = new TreeNode(5);
$s->left->left = new TreeNode(1);
$s->left->right = new TreeNode(2);
$t = new TreeNode(4);
$t->left = new TreeNode(1);
$t->right = new TreeNode(2);
var_dump(isSubtree($s,$t)); // true

$t = new TreeNode(4);
$t->left = new TreeNode(1);
$t->right = new TreeNode(2);
$t->left->left = new TreeNode(0);
var_dump(isSubtree($s,$t)); // false