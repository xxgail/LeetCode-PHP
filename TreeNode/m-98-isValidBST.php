<?php
require "TreeNode.php";
# https://leetcode-cn.com/problems/validate-binary-search-tree/
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
    # 普通递归
    return isValidBSTFunc($root,null,null);

    # 中序遍历然后判断是否是递增数组
//    $data = [];
//    inOrders($root,$data);
//    for ($i = 1; $i < count($data); $i++){
//        if ($data[$i] <= $data[$i-1]){
//            return false;
//        }
//    }
//    return true;
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

$root = new TreeNode(5);
$root->left = new TreeNode(1);
$root->right = new TreeNode(4);
$root->right->left = new TreeNode(3);
$root->right->right = new TreeNode(5);
//$root = new TreeNode(1);
//$root->left = new TreeNode(1);
var_dump(isValidBST($root));


# 二叉搜索树的中序遍历就是其所有节点的val按照升序排列
/**
 * @DESC: 中序遍历递归生成数组
 * @param $root
 * @param $data
 */
function inOrders($root,&$data){
    if ($root == null){
        return;
    }
    inOrders($root->left,$data);
    $data[] = $root->val;
    inOrders($root->right,$data);
}

