<?php
/**
 * @Time: 2019/10/10 14:55
 * @DESC: 700. 简单
 * 给定二叉搜索树（BST）的根节点和一个值。
 * 你需要在BST中找到节点值等于给定值的节点，返回以该节点为根的子树。
 * 如果节点不存在，则返回 NULL。
 *
 * 二叉搜索树！！！！ 特征！！！
 * @param $root
 * @param $val
 * @return array
 */
function searchBST($root, $val) {
//    $data = [];
//    array_push($data,$root);
//    while (!empty($data)){
//        $center_node = array_pop($data);
//
//        if($center_node->val == $val)
//            return $center_node;
//
//        if($center_node->right != null){
//            array_push($data,$center_node->right);
//        }
//        if($center_node->left != null){
//            array_push($data,$center_node->left);
//        }
//    }
//    return null;
    if($root == null) return null;
    if($root->val < $val) return searchBST($root->right,$val);
    if($root->val > $val) return searchBST($root->left,$val);
    return $root;
}