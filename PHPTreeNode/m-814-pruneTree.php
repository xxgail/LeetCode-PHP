<?php
/**
 * @Time: 2019/10/14 14:28
 * @DESC: 814. 中等 二叉树剪枝
 * 给定二叉树根结点 root ，此外树的每个结点的值要么是 0，要么是 1。
 * 返回移除了所有不包含 1 的子树的原二叉树。
 * @param $root
 * @return null
 */
function pruneTree($root) {
    if($root->val == 0 && $root->left == null && $root->right == null){
        return null;
    }

    $root->left = pruneTree($root->left);

    $root->right = pruneTree($root->right);

    return $root;
}