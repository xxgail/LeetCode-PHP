<?php
//require 'TreeNode.php';
/**
 * @Time: 2019/10/28 10:31
 * @DESC: 623. 在二叉树中增加一行
 * 给定一个二叉树，根节点为第1层，深度为 1。在其第 d 层追加一行值为 v 的节点。
 * 添加规则：给定一个深度值 d （正整数），针对深度为 d-1 层的每一非空节点 N，为 N 创建两个值为 v 的左子树和右子树。
 * 将 N 原先的左子树，连接为新节点 v 的左子树；将 N 原先的右子树，连接为新节点 v 的右子树。
 * 如果 d 的值为 1，深度 d - 1 不存在，则创建一个新的根节点 v，原先的整棵树将作为 v 的左子树。
 * @param $root
 * @param $v
 * @param $d
 * @return TreeNode
 */
function addOneRow($root, $v, $d) {
    if($d == 1){
        $d = new TreeNode($v);
        $d->left = $root;
        return $d;
    }
    $deep = 1;
    $data[] = $root;
    $node_count = 0;
    $j = 1;

    while ($deep < $d){
        $current_node = array_shift($data);
        $j --;
        if($deep == $d-1){
            $a = $current_node->left;
            $current_node->left = new TreeNode($v);
            $current_node->left->left = $a;

            $b = $current_node->right;
            $current_node->right = new TreeNode($v);
            $current_node->right->right = $b;

            if($j == 0){
                break;
            }
        }else{
            if($current_node->left != null){
                $data[] = $current_node->left;
                $node_count ++;
            }

            if($current_node->right != null){
                $data[] = $current_node->right;
                $node_count ++;
            }
            if($j == 0){
                $deep++;
                $j = $node_count;
            }
        }


    }
    return $root;

}