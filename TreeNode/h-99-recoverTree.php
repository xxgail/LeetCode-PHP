<?php
require 'TreeNode.php';
/**
 * @Time: 2020/8/8
 * @DESC: 99. 恢复二叉搜索树
 * 二叉搜索树中的两个节点被错误地交换。
 * 请在不改变其结构的情况下，恢复这棵树。
 * 示例 1:
    输入: [1,3,null,null,2]
       1
      /
     3
      \
       2
    输出: [3,1,null,null,2]
        3
       /
      1
       \
        2
 * @param $root
 * @return mixed
 * @link https://leetcode-cn.com/problems/recover-binary-search-tree
 */
function recoverTree($root){
    $data = [];
    inOrders($root,$data);
    $w1 = $w2 = -1;
    for ($i = 0; $i < count($data) - 1; $i++) {
        if ($data[$i + 1] < $data[$i]) {
            $w2 = $data[$i + 1];
            if ($w1 == -1) {
                $w1 = $data[$i];
            } else {
                break;
            }
        }
    }
    recover($root,2,$w1,$w2);
    return $root;
}

function inOrders($root,&$data){
    if ($root == null){
        return;
    }
    inOrders($root->left,$data);
    $data[] = $root->val;
    inOrders($root->right,$data);
}

function recover(&$root,$count,$w1,$w2) {
    if ($root == null){
        return null;
    }
    if ($root->val == $w1 || $root->val == $w2){
        $root->val = $root->val == $w1 ? $w2 : $w1;
        if (--$count == 0){
            return;
        }
    }
    recover($root->left,$count,$w1,$w2);
    recover($root->right,$count,$w1,$w2);
}

$root = new TreeNode(1);
$root->left = new TreeNode(3);
$root->left->right = new TreeNode(2);
var_dump(recoverTree($root));

