<?php

require 'TreeNode.php';

/**
 * @Time: 2019/10/17 17:40
 * @DESC: 106. 中等 从中序与后序遍历序列构造二叉树
 * 根据一棵树的中序遍历与后序遍历构造二叉树。
 * 注意:
 * 你可以假设树中没有重复的元素。
 * @param $inorder
 * @param $postorder
 * @return TreeNode
 */
function buildTree($inorder, $postorder) {
    $root_val = end($postorder);
    $root = new TreeNode($root_val);
    $root_key = array_search($root_val,$inorder); # 找到根节点在中序中的位置

    # 切割数组生成左子树
    $in_order_left = array_slice($inorder,0,$root_key);
    $post_order_left = array_slice($postorder,0,$root_key);
    if($in_order_left != null){
        $root->left = buildTree($in_order_left,$post_order_left);
    }

    # 剩余数组生成右子树
    $in_order_right = array_slice($inorder,$root_key+1);
    $post_order_right = array_slice($postorder,$root_key,count($in_order_right));
    if($in_order_right != null){
        $root->right = buildTree($in_order_right,$post_order_right);
    }

    return $root;
}