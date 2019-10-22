<?php

/**
 * @Time: 2019/10/15 16:34
 * @DESC: 230. 二叉搜索树中第K小的元素 中等
 * 给定一个二叉搜索树，编写一个函数 kthSmallest 来查找其中第 k 个最小的元素。
 * 说明：
 * 你可以假设 k 总是有效的，1 ≤ k ≤ 二叉搜索树元素个数。
 * @param $root
 * @param $k
 * @return mixed
 */
function kthSmallest($root, $k) {
    $result = [];
    inorderTraversalFunc($root,$result);
    return $result[$k - 1];
}

/**
 * @Time: 2019/10/15 16:33
 * @DESC: 用递归方法中序遍历二叉树返回数组
 * @param $root
 * @param $result
 */
function inorderTraversalFunc($root,&$result){
    if($root->left != null){
        inorderTraversalFunc($root->left,$result);
    }

    $result[] = $root->val;

    if($root->right != null){
        inorderTraversalFunc($root->right,$result);
    }
}