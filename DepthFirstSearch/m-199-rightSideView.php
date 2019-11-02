<?php
/**
 * @Time: 2019/10/18 15:12
 * @DESC: 199. 二叉树的右视图。中等
 * 给定一棵二叉树，想象自己站在它的右侧，按照从顶部到底部的顺序，返回从右侧所能看到的节点值。
 * 即每层最右侧的值
 * @param $root
 * @return array
 */
function rightSideView($root) {
    ## --- 利用循环深度遍历，获取每一层的最右边的值 √
//    $data = [];
//    $end_result = [];
//    $data[] = $root;
//    $current_node = null;
//    $level = 1;
//    $node_count = 1;
//    while ($data != null){
//        $current_node = array_shift($data);
//        $level --;
//        $node_count --;
//        if($level == 0){
//            $end_result[] = $current_node->val;
//        }
//
//        if($current_node->left != null){
//            $data[] = $current_node->left;
//            $node_count ++;
//        }
//        if($current_node->right != null){
//            $data[] = $current_node->right;
//            $node_count ++;
//        }
//        if($level == 0){
//            $level = $node_count;
//        }
//    }
//    return $end_result;

    ## --- 利用递归，逐层获取，取最后一个值 √
    $result = [];
    $result[] = $root->val;
    rightSideViewFunc([$root],$result);
    return $result;
}

function rightSideViewFunc($roots,&$result){
    $new_root = [];
    for ($i = 0; $i < count($roots); $i++){
        if($roots[$i]->left != null){
            $new_root[] = $roots[$i]->left;
        }

        if($roots[$i]->right != null){
            $new_root[] = $roots[$i]->right;
        }
    }
    if($new_root){
        $result[] = end($new_root)->val;
        rightSideViewFunc($new_root,$result);
    }
}
