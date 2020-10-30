<?php
/**
 * @Time: 2020/10/29
 * @DESC: 129. 求根到叶子节点数字之和
 * 给定一个二叉树，它的每个结点都存放一个 0-9 的数字，每条从根到叶子节点的路径都代表一个数字。
 * 例如，从根到叶子节点路径 1->2->3 代表数字 123。
 * 计算从根到叶子节点生成的所有数字之和。
 * 说明: 叶子节点是指没有子节点的节点。
 * @param $root
 * @return int
 * @link: https://leetcode-cn.com/problems/sum-root-to-leaf-numbers/
 */
function sumNumbers($root) {
    $sum = 0;
    if ($root == null) return $sum;
    sumNumbersDfs($root, 0, $sum);
    return $sum;
}

function sumNumbersDfs($root, $path, &$sum) {
    $path = $path*10 + $root->val;
    if ($root->left == null && $root->right == null) {
        $sum += $path;
        return;
    }
    if ($root->left != null) {
        sumNumbersDfs($root->left, $path,$sum);
    }
    if ($root->right != null) {
        sumNumbersDfs($root->right, $path, $sum);
    }
}