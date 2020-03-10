<?php
require 'TreeNode.php';
/**
 * @Time: 2020/3/10 20:43
 * @DESC:
 * 给定一棵二叉树，你需要计算它的直径长度。
 * 一棵二叉树的直径长度是任意两个结点路径长度中的最大值。
 * 这条路径可能穿过根结点。
 * 示例 :
 * 给定二叉树
 *      1
 *   /    \
 *  2      3
 * / \
 * 4   5
 * 返回 3, 它的长度是路径 [4,2,1,3] 或者 [5,2,1,3]。
 * 注意：两结点之间的路径长度是以它们之间边的数目表示。
 * @param $root
 * @return int
 */
function diameterOfBinaryTree($root){
    $dep = 1;
    diameterOfBinaryTreeFunc($root,$dep);
    return $dep - 1;
}


function diameterOfBinaryTreeFunc($root,&$dep){
    if ($root == null){
        return 0;
    }
    $left = diameterOfBinaryTreeFunc($root->left,$dep);
    $right = diameterOfBinaryTreeFunc($root->right,$dep);

    $dep = max($dep,$left+$right+1); // 寻找最长的路径
    return max($left,$right) + 1;// max 用于找到最底下那个分支，寻找左/右最长的路径
}

### 为什么一直没有写出正确答案
# 读题啊认真读题啊！！不是非要经过根节点的！只是可能！
# 所以每个节点都要算一下经过它的最长路径

//$root = new TreeNode(1);
//$root->left = new TreeNode(2);
//$root->right = new TreeNode(3);
//$root->left->left = new TreeNode(4);
//$root->left->right = new TreeNode(5);
//$root->right->right = new TreeNode(6);
//print_r(diameterOfBinaryTree($root));


$root = new TreeNode(4);
$root->left = new TreeNode(-7);
$root->right = new TreeNode(-3);
$root->right->left = new TreeNode(-9);
$root->right->right = new TreeNode(-3);
$root->right->left->left = new TreeNode(9);
$root->right->left->right = new TreeNode(-7);
$root->right->right->left = new TreeNode(-4);
$root->right->left->left->left = new TreeNode(6);
$root->right->left->right->left = new TreeNode(-6);
$root->right->left->right->right = new TreeNode(-6);
$root->right->left->left->left->left = new TreeNode(0);
$root->right->left->left->left->right = new TreeNode(6);
$root->right->left->right->left->left = new TreeNode(5);
$root->right->left->right->right->left = new TreeNode(9);
$root->right->left->left->left->right->left = new TreeNode(6);
$root->right->left->left->left->right->right = new TreeNode(6);
$root->right->left->right->right->left->left = new TreeNode(-2);
print_r(diameterOfBinaryTree($root));