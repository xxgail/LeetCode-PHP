<?php
require 'TreeNode.php';
/**
 * @Time: 2020/6/3 9:53 下午
 * @DESC: 105. 从前序和中序遍历序列构造二叉树
 * 根据一棵树的前序遍历与中序遍历构造二叉树。
 * 注意:
 * 你可以假设树中没有重复的元素。
 * 例如，给出
 * 前序遍历 preorder = [3,9,20,15,7]
 * 中序遍历 inorder = [9,3,15,20,7]
 * 返回如下的二叉树：
 *     3
 *    / \
 *   9  20
 *  /  \
 * 15   7
 * @param $preorder
 * @param $inorder
 * @return TreeNode|null
 * @link https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal
 */
function buildTree($preorder, $inorder) {
    if ($preorder == []) {
        return null;
    }
    $root = new TreeNode($preorder[0]);
    $root_key = array_search($preorder[0], $inorder);
    $root->left = buildTree(array_slice($preorder, 1, $root_key), array_slice($inorder, 0, $root_key));
    $root->right = buildTree(array_slice($preorder, 1 + $root_key), array_slice($inorder,1 + $root_key));
    return $root;
}