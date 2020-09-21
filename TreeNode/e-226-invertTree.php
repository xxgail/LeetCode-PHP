<?php
/**
 * @Time: 2020/9/16
 * @DESC: 226. 翻转二叉树
 * 翻转一棵二叉树。
 * 示例：
    输入：
        4
       / \
      2   7
     / \   / \
    1   3 6   9
    输出：
        4
       / \
      7   2
     / \   / \
    9   6 3   1
 * @param $root
 * @return null
 * @link: https://leetcode-cn.com/problems/invert-binary-tree/
 */
function invertTree($root) {
    if ($root == null) return null;
    $left = invertTree($root->left);
    $right = invertTree($root->right);
    $root->left = $right;
    $root->right = $left;
    return $root;
}
