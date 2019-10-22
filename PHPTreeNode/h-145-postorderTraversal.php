<?php
/**
 * @Time: 2019/9/8 18:23
 * @DESC:
 * 后序遍历 （左右根
 * @param $root
 * @return array
 */
function postorderTraversal($root) {
    $data = [];
    $new_data = [];
    $result = [];
    array_push($data,$root);
    while($data){
        $current_node = array_pop($data);
        array_push($new_data,$current_node);
        if($current_node->left != null)
            array_push($data,$current_node->left);

        if($current_node->right != null)
            array_push($data,$current_node->right);
    }

    while ($new_data){
        $current_node = array_pop($new_data);
        if($current_node->val != null){
            $result[] = $current_node->val;
        }
    }
    return $result;
}