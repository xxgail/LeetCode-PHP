<?php
/**
 * @Time: 2020/7/28 8:58
 * @DESC: 104. 二叉树的最大深度
 * 给定一个二叉树，找出其最大深度。
 * 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。
 * 说明: 叶子节点是指没有子节点的节点。
 *
 * 示例：
    给定二叉树 [3,9,20,null,null,15,7]，
            3
           / \
          9  20
            /  \
           15   7
    返回它的最大深度 3 。
 * @param $root
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/maximum-depth-of-binary-tree
 */
function maxDepth($root) {
    if ($root == null){
        return 0;
    }
    return max(maxDepth($root->left) + maxDepth($root->right)) + 1;
}