<?php

/**
 * @Time: 2019/9/8 16:13
 * @DESC:
 * 中序遍历 （左根右
 * @param $root
 * @return array
 */
function inorderTraversal($root) {
    $data = [];
    $result = [];
    $current_node = $root;
    while($data || $current_node != null){
        while($current_node != null){
            array_push($data,$current_node);
            $current_node = $current_node->left;
        }

        $current_node = array_pop($data);
        if($current_node->val != null)
            $result[] = $current_node->val;

        $current_node = $current_node->right;
    }
    return $result;
}