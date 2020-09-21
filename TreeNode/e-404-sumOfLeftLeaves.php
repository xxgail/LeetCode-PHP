<?php
/**
 * @Time: 2020/9/19
 * @DESC: 404. 左叶子之和
 * 计算给定二叉树的所有左叶子之和。
 * 示例：
        3
       / \
      9   20
         /  \
        15   7
    在这个二叉树中，有两个左叶子，分别是 9 和 15，所以返回 24
 * @param $root
 * @return int
 * @link: https://leetcode-cn.com/problems/sum-of-left-leaves/
 */
function sumOfLeftLeaves($root) {
    $sum = 0;
    sumDfs($root,$sum);
    return $sum;
}

function sumDfs($root,&$sum) {
    if ($root == null) return;
    if ($root->left != null) {
        if ($root->left->left == null && $root->left->right == null) {
            $sum += $root->left->val;
        }else {
            sumDfs($root->left,$sum);
        }
    }
    if ($root->right != null && ($root->right->left != null || $root->right->right != null)) {
        sumDfs($root->right,$sum);
    }
}