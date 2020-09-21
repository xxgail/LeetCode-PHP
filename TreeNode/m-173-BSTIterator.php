<?php
require 'TreeNode.php';

/**
 * Class BSTIterator
 * 实现一个二叉搜索树迭代器。你将使用二叉搜索树的根节点初始化迭代器。
 * 调用 next() 将返回二叉搜索树中的下一个最小的数。
 * @link https://leetcode-cn.com/problems/binary-search-tree-iterator/
 */
class BSTIterator {
    /**
     * @param TreeNode $root
     */
    public $res;
    function __construct($root) {
        $this->res = [];
        $this->inOrder($root);
        var_dump($this->res);
    }

    private function inOrder($root) {
        if ($root == null) return;
        $this->inOrder($root->left);
        $this->res[] = $root->val;
        $this->inOrder($root->right);
    }

    /**
     * @return the next smallest number
     * @return Integer
     */
    function next() {
        return array_shift($this->res);
    }

    /**
     * @return bool we have a next smallest number
     * @return Boolean
     */
    function hasNext() {
        return count($this->res) > 1;
    }
}

$root = new TreeNode(7);
$root->left = new TreeNode(3);
$root->right = new TreeNode(15);
$root->right->left = new TreeNode(9);
$root->right->right = new TreeNode(20);

$bst = new BSTIterator($root);
var_dump($bst->hasNext());