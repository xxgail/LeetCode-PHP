<?php
require '../TreeNode/TreeNode.php';
/**
 * @Time: 2020/8/17
 * @DESC: 103. 二叉树的锯齿形层次遍历
 * 给定一个二叉树，返回其节点值的锯齿形层次遍历。（即先从左往右，再从右往左进行下一层遍历，以此类推，层与层之间交替进行）。
 * 例如：
    给定二叉树[3,9,20,null,null,15,7],
        3
       / \
      9  20
        /  \
       15   7
    返回锯齿形层次遍历如下：
    [
        [3],
        [20,9],
        [15,7]
    ]
 * @param $root
 * @return array
 * @link: https://leetcode-cn.com/problems/binary-tree-zigzag-level-order-traversal
 */
function zigzagLevelOrder($root) {
    if ($root == null){
        return [];
    }
    $q = new SplQueue();
    $q->push($root);
    $zigzag = true;
    $res = [];
    while (!$q->isEmpty()){
        $item = [];
        $count = $q->count();
        for ($i = 0; $i < $count; $i++){
            $curr = $q->shift();
            $item[] = $curr->val;
            if ($curr->left != null) $q->push($curr->left);
            if ($curr->right != null) $q->push($curr->right);
        }
        $res[] = $zigzag ? $item : array_reverse($item);
        $zigzag = !$zigzag;
    }
    return $res;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);
var_dump(zigzagLevelOrder($root));

# 广度优先搜索
# 比层序遍历多了一个翻转判断