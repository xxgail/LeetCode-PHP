<?php
/**
 * @Time: 2019/9/16 15:02
 * @DESC: 938 二叉搜索树的范围和 简单
 * 给定二叉搜索树的根结点 root，返回 L 和 R（含）之间的所有结点的值的和（L<=节点<=R。
 * 二叉搜索树保证具有唯一的值。
 * @param $root
 * @param $L
 * @param $R
 * @return int
 */
function rangeSumBST($root, $L, $R) {
    # ------------- 普通的遍历
//    $data = [];
//    $result = 0;
//    array_push($data,$root);
//    while ($data){
//        $current_node = array_pop($data);
//
//        if($current_node->val >= $L && $current_node->val <= $R){
//            $result += $current_node->val;
//        }
//
//        if($current_node->right){
//            array_push($data,$current_node->right);
//        }
//
//        if($current_node->left){
//            array_push($data,$current_node->left);
//        }
//    }
//
//    return $result;
    # ------------- 递归
    /**
     * 重要知识点：二叉查找树（Binary Search Tree），（又：二叉搜索树，二叉排序树）
     * 它或者是一棵空树，或者是具有下列性质的二叉树：
     * 若它的左子树不空，则左子树上所有结点的值均小于它的根结点的值；
     * 若它的右子树不空，则右子树上所有结点的值均大于它的根结点的值；
     * 它的左、右子树也分别为二叉排序树。
     */
    if($root == null){
        return 0;
    }

    if($root->val < $L){
        return rangeSumBST($root->right,$L,$R);
    }

    if($root->val > $R){
        return rangeSumBST($root->left,$L,$R);
    }

    return $root->val + rangeSumBST($root->left,$L,$R) + rangeSumBST($root->right,$L,$R);
}
