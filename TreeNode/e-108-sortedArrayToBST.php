<?php
require "TreeNode.php";
/**
 * @Time: 2020/7/3 14:18
 * @DESC: 108. 将有序数组转换为二叉搜索树
 * 将一个按照升序排列的有序数组，转换为一棵高度平衡二叉搜索树。
 * 本题中，一个高度平衡二叉树是指一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1。
 * 给定有序数组: [-10,-3,0,5,9],一个可能的答案是：[0,-3,9,-10,null,5]，它可以表示下面这个高度平衡二叉搜索树：
 *      0
 *     / \
 *    -3  9
 *    /   /
 *  -10  5
 * @param $nums
 * @return TreeNode|null
 * @link: https://leetcode-cn.com/problems/convert-sorted-array-to-binary-search-tree/
 */
function sortedArrayToBST($nums){
    return Func($nums,0,count($nums)-1);
}

function Func($nums,$left,$right){
    if ($left > $right){
        return null;
    }

    $mid = floor(($left + $right) / 2); // 每次都取中间靠左的数为根
    $tree = new TreeNode($nums[$mid]);
    $tree->left = Func($nums,$left,$mid-1);
    $tree->right = Func($nums,$mid+1,$right);
    return $tree;
}