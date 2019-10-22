<?php

require 'TreeNode.php';

/**
 * @Time: 2019/10/12 14:57
 * @DESC: 1008. 中等 先序遍历构造二叉树
 * 返回与给定先序遍历 preorder 相匹配的二叉搜索树（binary search tree）的根结点。
 * (回想一下，二叉搜索树是二叉树的一种，其每个节点都满足以下规则，对于 node.left 的任何后代，值总 < node.val，而 node.right 的任何后代，值总 > node.val。此外，先序遍历首先显示节点的值，然后遍历 node.left，接着遍历 node.right。）
 * @param $preorder
 * @return array
 */
function bstFromPreorder($preorder) {
    $root = new TreeNode($preorder[0]);
    for ($i = 1; $i < count($preorder); $i++){
        bstFromPreorderFunc($root,$preorder[$i]);
    }
    return levelOrderFunc($root);
}

/**
 * @Time: 2019/10/12 15:16
 * @DESC: 回调函数，来生成二叉搜索树。
 * @param $root
 * @param $num
 */
function bstFromPreorderFunc($root,$num){
    if($num < $root->val){
        if($root->left == null){
            $root->left = new TreeNode($num);
        }else{
            bstFromPreorderFunc($root->left,$num);
        }
    }else{
        if($root->right == null){
            $root->right = new TreeNode($num);
        }else{
            bstFromPreorderFunc($root->right,$num);
        }
    }
}