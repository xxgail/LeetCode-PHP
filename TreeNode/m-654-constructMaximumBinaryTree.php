<?php

require 'TreeNode.php';

/**
 * @Time: 2019/10/11 14:15
 * @DESC: 654. 最大二叉树 中等
 * 给定一个不含重复元素的整数数组。一个以此数组构建的最大二叉树定义如下：
 * 二叉树的根是数组中的最大元素。
 * 左子树是通过数组中最大值左边部分构造出的最大二叉树。
 * 右子树是通过数组中最大值右边部分构造出的最大二叉树。
 * 通过给定的数组构建最大二叉树，并且输出这个树的根节点。
 * @param $nums
 * @return TreeNode
 */
function constructMaximumBinaryTree($nums) {
    $max = max($nums);
    $root = new TreeNode($max);
    $root_key = array_search($max,$nums);
    $left = array_slice($nums,0,$root_key);
    if($left){
        $root->left = constructMaximumBinaryTree($left);
    }

    $right = array_slice($nums,$root_key + 1);
    if($right){
        $root->right = constructMaximumBinaryTree($right);
    }
    return $root;
}