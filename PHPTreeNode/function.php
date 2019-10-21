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

/**
 * @Time: 2019/10/14 14:28
 * @DESC: 814. 中等 二叉树剪枝
 * 给定二叉树根结点 root ，此外树的每个结点的值要么是 0，要么是 1。
 * 返回移除了所有不包含 1 的子树的原二叉树。
 * @param $root
 * @return null
 */
function pruneTree($root) {
    if($root->val == 0 && $root->left == null && $root->right == null){
        return null;
    }

    $root->left = pruneTree($root->left);

    $root->right = pruneTree($root->right);

    return $root;
}


/**
 * @Time: 2019/10/15 16:34
 * @DESC: 230. 二叉搜索树中第K小的元素
 * 给定一个二叉搜索树，编写一个函数 kthSmallest 来查找其中第 k 个最小的元素。
 * 说明：
 * 你可以假设 k 总是有效的，1 ≤ k ≤ 二叉搜索树元素个数。
 * @param $root
 * @param $k
 * @return mixed
 */
function kthSmallest($root, $k) {
    $result = [];
    inorderTraversalFunc($root,$result);
    return $result[$k - 1];
}

/**
 * @Time: 2019/10/15 16:33
 * @DESC: 用递归方法中序遍历二叉树返回数组
 * @param $root
 * @param $result
 */
function inorderTraversalFunc($root,&$result){
    if($root->left != null){
        inorderTraversalFunc($root->left,$result);
    }

    $result[] = $root->val;

    if($root->right != null){
        inorderTraversalFunc($root->right,$result);
    }
}

/**
 * @Time: 2019/10/17 17:40
 * @DESC: 106. 中等 从中序与后序遍历序列构造二叉树
 * 根据一棵树的中序遍历与后序遍历构造二叉树。
 * 注意:
 * 你可以假设树中没有重复的元素。
 * @param $inorder
 * @param $postorder
 * @return TreeNode
 */
function buildTree($inorder, $postorder) {
    $root_val = end($postorder);
    $root = new TreeNode($root_val);
    $root_key = array_search($root_val,$inorder); # 找到根节点在中序中的位置

    # 切割数组生成左子树
    $in_order_left = array_slice($inorder,0,$root_key);
    $post_order_left = array_slice($postorder,0,$root_key);
    if($in_order_left != null){
        $root->left = buildTree($in_order_left,$post_order_left);
    }

    # 剩余数组生成右子树
    $in_order_right = array_slice($inorder,$root_key+1);
    $post_order_right = array_slice($postorder,$root_key,count($in_order_right));
    if($in_order_right != null){
        $root->right = buildTree($in_order_right,$post_order_right);
    }

    return $root;
}

/**
 * @Time: 2019/10/18 15:12
 * @DESC: 199. 二叉树的右视图。中等
 * 给定一棵二叉树，想象自己站在它的右侧，按照从顶部到底部的顺序，返回从右侧所能看到的节点值。
 * 即每层最右侧的值
 * @param $root
 * @return array
 */
function rightSideView($root) {
    ## --- 利用循环深度遍历，获取每一层的最右边的值 √
//    $data = [];
//    $end_result = [];
//    $data[] = $root;
//    $current_node = null;
//    $level = 1;
//    $node_count = 1;
//    while ($data != null){
//        $current_node = array_shift($data);
//        $level --;
//        $node_count --;
//        if($level == 0){
//            $end_result[] = $current_node->val;
//        }
//
//        if($current_node->left != null){
//            $data[] = $current_node->left;
//            $node_count ++;
//        }
//        if($current_node->right != null){
//            $data[] = $current_node->right;
//            $node_count ++;
//        }
//        if($level == 0){
//            $level = $node_count;
//        }
//    }
//    return $end_result;

    ## --- 利用递归，逐层获取，取最后一个值 √
    $result = [];
    $result[] = $root->val;
    rightSideViewFunc([$root],$result);
    return $result;
}

function rightSideViewFunc($roots,&$result){
    $new_root = [];
    for ($i = 0; $i < count($roots); $i++){
        if($roots[$i]->left != null){
            $new_root[] = $roots[$i]->left;
        }

        if($roots[$i]->right != null){
            $new_root[] = $roots[$i]->right;
        }
    }
    if($new_root){
        $result[] = end($new_root)->val;
        rightSideViewFunc($new_root,$result);
    }
}



//$root->right->right = new TreeNode(12);
//$data = rightSideView($root);
//var_dump($data);

/**
 * @Time: 2019/10/21 13:59
 * @DESC: 1104. 二叉树寻路。中等
 * 在一棵无限的二叉树上，每个节点都有两个子节点，树中的节点 逐行 依次按 “之” 字形进行标记。
 * 如下图所示，在奇数行（即，第一行、第三行、第五行……）中，按从左到右的顺序进行标记；
 * 而偶数行（即，第二行、第四行、第六行……）中，按从右到左的顺序进行标记。
 *        1
 *    3       2
 * 4    5   6   7
 * 给你树上某一个节点的标号 label，请你返回从根节点到该标号为 label 节点的路径，该路径是由途经的节点标号所组成的。
 * @param $label
 * @return array
 */
function pathInZigZagTree($label) {
    $result = [];
    $line = 1;
    while (pow(2,$line) <= $label){
        $line ++;
    } // 找到label在第几行

    if($line % 2 == 0){ // 相对于最左边的结点的值的偏移量
        $diff = pow(2,$line) - 1 - $label;
    }else{
        $diff = $label - pow(2,$line - 1);
    }

    // 因为每个结点有两个子节点，所以相对于左边的偏移量是2倍递减。获取到每层的偏移量
    for ($i = $line; $i > 0; $i--,$diff = intval($diff/2)){
        if($i % 2 == 0){
            $result[] = pow(2,$i) - 1 - $diff;
        }else{
            $result[] = pow(2,$i-1) + $diff;
        }
    }
    return array_reverse($result);
}

/**
 * @Time: 2019/10/21 16:49
 * @DESC: 1161. 最大层内元素和。 中等
 * 给你一个二叉树的根节点 root。
 * 设根节点位于二叉树的第 1 层，而根节点的子节点位于第 2 层，依此类推。
 * 请你找出层内元素之和 最大 的那几层（可能只有一层）的层号，并返回。
 * @param $root
 * @return int
 */
function maxLevelSum($root) {
    $result = 1;
    $sum = $root->val;
    $max = $root->val;
    $level = 1;
    maxLevelSumFunc([$root],$sum,$max,$level,$result);
    return $result;
}

// todo:优化
function maxLevelSumFunc($arr,$sum,$max,$level,&$result){
    if($sum > $max){
        $max = $sum;
        $result = $level;
    }
    $new_arr = [];
    $sum = 0;

    foreach ($arr as $item) {
        if($item->left != null){
            $new_arr[] = $item->left;
            $sum += $item->left->val;
        }
        if($item->right != null){
            $new_arr[] = $item->right;
            $sum += $item->right->val;
        }
    }
    if($new_arr){
        $level ++;
        maxLevelSumFunc($new_arr,$sum,$max,$level,$result);
    }
}
$root = new TreeNode(1);
$root->left = new TreeNode(7);
$root->left->left = new TreeNode(7);
$root->left->right = new TreeNode(-8);
$root->right = new TreeNode(0);
$data = maxLevelSum($root);
var_dump($data);