<?php
require 'TreeNode.php';
/**
 * @Time: 2020/9/25
 * @DESC: 106. 从中序与后序遍历序列构造二叉树
 * 根据一棵树的中序遍历与后序遍历构造二叉树。
 * 注意:
 * 你可以假设树中没有重复的元素。
 * 例如，给出
    中序遍历 inorder = [9,3,15,20,7]
    后序遍历 postorder = [9,15,7,20,3]
    返回如下的二叉树：
        3
       / \
      9  20
        /  \
       15   7
 * @param $inorder
 * @param $postorder
 * @return TreeNode
 * @link: https://leetcode-cn.com/problems/construct-binary-tree-from-inorder-and-postorder-traversal/
 */
function buildTree($inorder, $postorder) {
    if ($inorder == []) return null;
    $r = array_pop($postorder);
    $root = new TreeNode($r);
    $index = array_search($r,$inorder);
    $root->left = buildTree(array_slice($inorder,0,$index),array_slice($postorder,0,$index));
    $root->right = buildTree(array_slice($inorder,$index+1),array_slice($postorder,$index));
    return $root;
}

$inorder = [9,3,15,20,7];
$postorder = [9,15,7,20,3];
var_dump(buildTree($inorder,$postorder));