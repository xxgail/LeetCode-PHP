<?php
require "TreeNode.php";
/**
 * @Time: 2020/3/27 17:09
 * @DESC: 94. 二叉搜索树
 * 给定一个二叉树，判断其是否是一个有效的二叉搜索树。
 * 假设一个二叉搜索树具有如下特征：
 *    节点的左子树只包含小于当前节点的数。
 *    节点的右子树只包含大于当前节点的数。
 *    所有左子树和右子树自身必须也是二叉搜索树。
 * @param $root
 * @return bool
 */
function isValidBST($root){
    return isValidBSTFunc($root,null,null);
}

function isValidBSTFunc($root,$small,$big){
    if($root == null) return true;

    // 因为small或者big可能为0,所以要用!==！！
    if ($small !== null && $root->val <= $small) return false;
    if ($big !== null && $root->val >= $big) return false;

    // 右边都要比根节点大，所以要设置一个最小值
    // 左边都要比根节点大，所以要设置一个最大值
    return isValidBSTFunc($root->right,$root->val,$big) && isValidBSTFunc($root->left,$small,$root->val);
}

//$root = new TreeNode(10);
//$root->left = new TreeNode(5);
//$root->right = new TreeNode(15);
//$root->right->left = new TreeNode(11);
//$root->right->right = new TreeNode(20);
$root = new TreeNode(0);
$root->right = new TreeNode(-1);
var_dump(isValidBST($root));

# 二叉搜索树的中序遍历就是其所有节点的val按照升序排列
# TODO：中序遍历也是可以的
