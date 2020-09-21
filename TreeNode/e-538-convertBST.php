<?php
class Solution {

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    protected $sum = 0;

    /**
     * @Time: 2020/9/21
     * @DESC: 538. 把二叉搜索树转换为累加树
     * 给定一个二叉搜索树（Binary Search Tree），把它转换成为累加树（Greater Tree)，使得每个节点的值是原来的节点值加上所有大于它的节点值之和。
     * 例如：
        输入: 原始二叉搜索树:
            5
           / \
          2  13
        输出: 转换为累加树:
            18
           / \
          20  13
     * @param $root
     * @return mixed
     * @link: https://leetcode-cn.com/problems/convert-bst-to-greater-tree/
     */
    public function convertBST($root)
    {
        $this->dfs($root);
        return $root;
    }

    private function dfs($root)
    {
        if ($root === null) return;
        // 反向的中序遍历
        $this->dfs($root->right);
        $this->sum += $root->val;
        $root->val = $this->sum;
        $this->dfs($root->left);
    }
}