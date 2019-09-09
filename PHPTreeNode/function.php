<?php
/**
 * TreeNode
 * ————————————————————————————————
 */


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

/**
 * @Time: 2019/9/8 22:24
 * @DESC: 深度遍历
 * 给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。
 * 逐层返回成数组
 * @param $root
 * @return array
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
 * @Time: 2019/9/7 15:45
 * @DESC: 101
 * 给定一个二叉树，检查它是否是镜像对称的。
 * @param $a
 * @return bool
 */
function isSymmetric($a){
    return isMirror($a,$a);
}

function isMirror($t1, $t2)
{
    if ($t1->val == null && $t2->val == null) return true;
    if ($t1->val == null || $t2->val == null) return false;
    return ($t1->val == $t2->val)
        && isMirror($t1->right, $t2->left)
        && isMirror($t1->left, $t2->right);
}