<?php
/**
 * TreeNode
 * ————————————————————————————————
 */
require 'TreeNode.php';

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


/**
 * @Time: 2019/9/16 15:02
 * @DESC: 938
 * 给定二叉搜索树的根结点 root，返回 L 和 R（含）之间的所有结点的值的和（L<=节点<=R。
 * 二叉搜索树保证具有唯一的值。
 * @param $root
 * @param $L
 * @param $R
 * @return int
 */
function rangeSumBST($root, $L, $R) {
    # ------------- 普通的遍历
//    $data = [];
//    $result = 0;
//    array_push($data,$root);
//    while ($data){
//        $current_node = array_pop($data);
//
//        if($current_node->val >= $L && $current_node->val <= $R){
//            $result += $current_node->val;
//        }
//
//        if($current_node->right){
//            array_push($data,$current_node->right);
//        }
//
//        if($current_node->left){
//            array_push($data,$current_node->left);
//        }
//    }
//
//    return $result;
    # ------------- 递归
    /**
     * 重要知识点：二叉查找树（Binary Search Tree），（又：二叉搜索树，二叉排序树）
     * 它或者是一棵空树，或者是具有下列性质的二叉树：
     * 若它的左子树不空，则左子树上所有结点的值均小于它的根结点的值；
     * 若它的右子树不空，则右子树上所有结点的值均大于它的根结点的值；
     * 它的左、右子树也分别为二叉排序树。
     */
    if($root == null){
        return 0;
    }

    if($root->val < $L){
        return rangeSumBST($root->right,$L,$R);
    }

    if($root->val > $R){
        return rangeSumBST($root->left,$L,$R);
    }

    $result = $root->val + rangeSumBST($root->left,$L,$R) + rangeSumBST($root->right,$L,$R);
    return $result;
}

/**
 * @Time: 2019/10/10 14:55
 * @DESC: 700. 简单
 * 给定二叉搜索树（BST）的根节点和一个值。
 * 你需要在BST中找到节点值等于给定值的节点，返回以该节点为根的子树。
 * 如果节点不存在，则返回 NULL。
 *
 * 二叉搜索树！！！！ 特征！！！
 * @param $root
 * @param $val
 * @return array
 */
function searchBST($root, $val) {
//    $data = [];
//    array_push($data,$root);
//    while (!empty($data)){
//        $center_node = array_pop($data);
//
//        if($center_node->val == $val)
//            return $center_node;
//
//        if($center_node->right != null){
//            array_push($data,$center_node->right);
//        }
//        if($center_node->left != null){
//            array_push($data,$center_node->left);
//        }
//    }
//    return null;
    if($root == null) return null;
    if($root->val < $val) return searchBST($root->right,$val);
    if($root->val > $val) return searchBST($root->left,$val);
    return $root;
}

/**
 * @Time: 2019/10/11 14:15
 * @DESC: 654. 最大二叉树
 * 给定一个不含重复元素的整数数组。一个以此数组构建的最大二叉树定义如下：
 * 二叉树的根是数组中的最大元素。
 * 左子树是通过数组中最大值左边部分构造出的最大二叉树。
 * 右子树是通过数组中最大值右边部分构造出的最大二叉树。
 * 通过给定的数组构建最大二叉树，并且输出这个树的根节点。
 * @param $nums
 * @return TreeNode
 */
function constructMaximumBinaryTree($nums) {
    $max = max($nums);
    $root = new TreeNode($max);
    $root_key = array_search($max,$nums);
    $left = array_slice($nums,0,$root_key);
    if($left){
        $root->left = constructMaximumBinaryTree($left);
    }

    $right = array_slice($nums,$root_key + 1);
    if($right){
        $root->right = constructMaximumBinaryTree($right);
    }
    return $root;
}

/**
 * @Time: 2019/10/12 14:57
 * @DESC: 1008. 中等 先序遍历构造二叉树
 * 返回与给定先序遍历 preorder 相匹配的二叉搜索树（binary search tree）的根结点。
 * (回想一下，二叉搜索树是二叉树的一种，其每个节点都满足以下规则，对于 node.left 的任何后代，值总 < node.val，而 node.right 的任何后代，值总 > node.val。此外，先序遍历首先显示节点的值，然后遍历 node.left，接着遍历 node.right。）
 * @param $preorder
 * @return array
 */
function bstFromPreorder($preorder) {
    $root = new TreeNode($preorder[0]);
    for ($i = 1; $i < count($preorder); $i++){
        bstFromPreorderFunc($root,$preorder[$i]);
    }
    return levelOrderFunc($root);
}

/**
 * @Time: 2019/10/12 15:16
 * @DESC: 回调函数，来生成二叉搜索树。
 * @param $root
 * @param $num
 */
function bstFromPreorderFunc($root,$num){
    if($num < $root->val){
        if($root->left == null){
            $root->left = new TreeNode($num);
        }else{
            bstFromPreorderFunc($root->left,$num);
        }
    }else{
        if($root->right == null){
            $root->right = new TreeNode($num);
        }else{
            bstFromPreorderFunc($root->right,$num);
        }
    }
}

/**
 * @Time: 2019/10/12 15:18
 * @DESC: 深层遍历。返回一维数组，不用分层，相对来说比较简单。
 * @param $root
 * @return array
 */
function levelOrderFunc($root){
    $data = [];
    $result = [];
    $data[] = $root;
    while ($data != null){
        $current_node = array_shift($data);
        if($current_node != null){
            $result[] = $current_node->val;
        }else{
            $result[] = null;
        }

        if($current_node->left != null){
            $data[] = $current_node->left;
        }

        if($current_node->right != null){
            $data[] = $current_node->right;
        }
    }
    return $result;
}

$data = bstFromPreorder([8,5,1,7,10,12]);
var_dump($data);