<?php
/**
 * @Time: 2020/8/7
 * @DESC: 100. 相同的树
 * 给定两个二叉树，编写一个函数来检验它们是否相同。
 * 如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。
 * 示例 1:
    输入:       1         1
              / \       / \
             2   3     2   3
            [1,2,3],   [1,2,3]
    输出: true
 * @param $p
 * @param $q
 * @return bool
 * @link https://leetcode-cn.com/problems/same-tree
 */
function isSameTree($p, $q) {
    if($p == null && $q == null) return true;
    if($p == null || $q == null) return false;

    return ($p->val == $q->val)
        && isSameTree($p->left,$q->left)
        && isSameTree($p->right,$q->right);
}