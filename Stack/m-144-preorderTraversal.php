<?php
require_once '../TreeNode/TreeNode.php';
/**
 * @Time: 2019/9/8 16:13
 * @DESC:
 * 前序遍历（根左右
 * @param $root
 * @return array
 */
function preOrderTraversal($root) {
    $s = new SplStack();
    $s->push($root);
    $result = [];
    while (!$s->isEmpty()){
        $current = $s->pop();

        if($current->val != null)
            $result[] = $current->val;

        if($current->right != null){
            $s->push($current->right);
        }

        if($current->left != null){
            $s->push($current->left);
        }
    }
    return $result;
}

/**
 * @Time: 2020/4/1 21:40
 * @DESC: 递归
 * @param $root
 * @param $data
 */
function preOrder($root,&$data){
    if ($root == null){
        return;
    }
    $data[] = $root->val;
    preOrder($root->left,$data);
    preOrder($root->right,$data);
}

$data = [];
$root = new TreeNode(1);
$root->left = new TreeNode(3);
$root->right = new TreeNode(2);
preOrder($root,$data);
//var_dump($data);
var_dump(preOrderTraversal($root));