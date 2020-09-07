<?php

/**
 * @Time: 2019/9/8 22:24
 * @DESC: 102. 深度遍历
 * 给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。
 * 逐层返回成数组
 * @param $root
 * @return array
 * @link https://leetcode-cn.com/problems/binary-tree-level-order-traversal/
 */
function levelOrder($root) {
    $data = [];
    $result = [];
    $i = 0;
    $j = 1;
    $node_count = 0;
    array_push($data,$root);
    while(!empty($data)){
        $current = array_shift($data);
        if($current->val !== null){ // 防止节点的值为0
            $result[$i][] = $current->val;
        }
        $j --;

        if($current->left != null){
            array_push($data,$current->left);
            $node_count ++;
        }
        if($current->right != null){
            array_push($data,$current->right);
            $node_count ++;
        }
        if($j == 0){
            $i ++;
            $j = $node_count;
        }
    }
    return $result;
}


/**
 * @Time: 2019/10/12 15:18
 * @DESC: 深层遍历。返回一维数组，不用分层，相对来说比较简单。
 * @param $root
 * @return array
 */
function levelOrderOne($root){
    $data = [];
    $result = [];
    $data[] = $root;
    while ($data != null){
        $current_node = array_shift($data);
        if($current_node != null){
            $result[] = $current_node->val;
        }else{
            $result[] = null;
        }

        if($current_node->left != null){
            $data[] = $current_node->left;
        }

        if($current_node->right != null){
            $data[] = $current_node->right;
        }
    }
    return $result;
}


function levelOrderBFS($root){
    if ($root == null) return [];
    $q = [$root];
    $res = [];
    while ($q){
        $tmp = $item = [];
        for ($i = 0; $i < count($q); $i++){
            $item[] = $q[$i]->val;
            if ($q[$i]->left != null){
                $tmp[] = $q[$i]->left;
            }
            if ($q[$i]->right != null){
                $tmp[] = $q[$i]->right;
            }
        }
        $res[] = $item;
        $q = $tmp;
    }
    return $res;
}