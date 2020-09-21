<?php
require '../TreeNode/TreeNode.php';
/**
 * @Time: 2020/9/16
 * @DESC: 783. 二叉搜索树节点最小距离
 * 给定一个二叉搜索树的根节点 root，返回树中任意两节点的差的最小值。
 * 示例：
    输入: root = [4,2,6,1,3,null,null]
    输出: 1
 * 解释:
    注意，root是树节点对象(TreeNode object)，而不是数组。
    给定的树 [4,2,6,1,3,null,null] 可表示为下图:
        4
       / \
      2   6
     / \
    1   3
    最小的差值是 1, 它是节点1和节点2的差值, 也是节点3和节点2的差值。
 * @param $root
 * @return int
 * @link: https://leetcode-cn.com/problems/minimum-distance-between-bst-nodes/
 */
function minDiffInBST($root) {
    $res = $pre = 100;
    inOrderFunc($root,$res,$pre);
    return $res;
}
function inOrderFunc($root,&$res,&$pre){
    if ($root == null){
        return;
    }
    inOrderFunc($root->left,$res,$pre);
    $res = min($res,abpermuteUniques($pre-$root->val));
    $pre = $root->val;
    inOrderFunc($root->right,$res,$pre);
}

$root = new TreeNode(4);
$root->left = new TreeNode(2);
$root->right = new TreeNode(6);
$root->left->left = new TreeNode(1);
//$root->left->right = new TreeNode(3);
var_dump(minDiffInBST($root));
