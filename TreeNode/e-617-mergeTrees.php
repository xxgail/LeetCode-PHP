<?php
require 'TreeNode.php';
/**
 * @Time: 2020/9/23
 * @DESC:617. 合并二叉树
 * 给定两个二叉树，想象当你将它们中的一个覆盖到另一个上时，两个二叉树的一些节点便会重叠。
 * 你需要将他们合并为一个新的二叉树。
 * 合并的规则是如果两个节点重叠，那么将他们的值相加作为节点合并后的新值，否则不为 NULL 的节点将直接作为新二叉树的节点。
 * 示例 1:
    输入:
    Tree 1                     Tree 2
         1                         2
        / \                       / \
       3   2                     1   3
      /                           \   \
     5                             4   7
    输出:
    合并后的树:
        3
       / \
      4   5
     / \   \
    5   4   7
 * 注意: 合并必须从两个树的根节点开始。
 * @param $t1
 * @param $t2
 * @return TreeNode
 * @link: https://leetcode-cn.com/problems/merge-two-binary-trees/
 */
function mergeTrees($t1,$t2) {
    if ($t1 == null) return $t2;
    if ($t2 == null) return $t1;
    $newTree = new TreeNode($t1->val+$t2->val);
    $newTree->left = mergeTwoLists($t1->left,$t2->left);
    $newTree->right = mergeTwoLists($t1->right,$t2->right);
    return $newTree;
}

$t1 = new TreeNode(1);
$t1->left = new TreeNode(2);
$t1->right = new TreeNode(3);
$t1->left->left = new TreeNode(5);
$t2 = new TreeNode(2);
$t2->left = new TreeNode(1);
$t2->right = new TreeNode(3);
$t2->left->right = new TreeNode(4);
$t2->right->right = new TreeNode(7);
var_dump(mergeTwoLists($t1,$t2));