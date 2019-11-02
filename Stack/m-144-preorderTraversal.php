<?php
/**
 * @Time: 2019/9/8 16:13
 * @DESC:
 * 前序遍历（根左右
 * @param $root
 * @return array
 */
function preorderTraversal($root) {
    $data = [];
    array_push($data,$root);
    $result = [];
    while (!empty($data)){
        $center_node = array_pop($data);

        if($center_node->val != null)
            $result[] = $center_node->val;

        if($center_node->right != null){
            array_push($data,$center_node->right);
        }
        if($center_node->left != null){
            array_push($data,$center_node->left);
        }
    }
    return $result;
}