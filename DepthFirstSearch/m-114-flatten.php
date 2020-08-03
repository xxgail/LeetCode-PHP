<?php
require '../TreeNode/TreeNode.php';

class Solution {

    public $last = null;

    /**
     * @Time: 2020/8/3
     * @DESC: 114. 二叉树展开为链表
     * 给定一个二叉树，原地将它展开为一个单链表。
     * 例如，给定二叉树

           1
          / \
         2   5
        / \   \
       3   4   6
     将其展开为：
     1
      \
       2
        \
         3
          \
           4
            \
             5
              \
               6
     * @param $root
     * @return null
     * @link: https://leetcode-cn.com/problems/flatten-binary-tree-to-linked-list
     */
    function flatten($root) {
        if($root == null){
            return null;
        }
        $this->flatten($root->right);
        $this->flatten($root->left);
        $root->right = $this->last;
        $root->left = null;
        $this->last = $root;
    }
}


$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$a = new Solution();
var_dump($a->flatten($root));
