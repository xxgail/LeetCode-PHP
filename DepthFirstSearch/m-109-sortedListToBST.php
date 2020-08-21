<?php
require '../LinkedList/ListNode.php';
require '../TreeNode/TreeNode.php';

/**
 * @Time: 2020/8/18
 * @DESC: 109. 有序链表转换二叉搜索树
 * 给定一个单链表，其中的元素按升序排序，将其转换为高度平衡的二叉搜索树。
 * 本题中，一个高度平衡二叉树是指一个二叉树每个节点的左右两个子树的高度差的绝对值不超过 1。
 * 示例:
    给定的有序链表： [-10, -3, 0, 5, 9],
    一个可能的答案是：[0, -3, 9, -10, null, 5], 它可以表示下面这个高度平衡二叉搜索树：
                0
               / \
             -3   9
            /     /
           -10   5

 * @param $head
 * @return TreeNode
 * @link: https://leetcode-cn.com/problems/convert-sorted-list-to-binary-search-tree
 */
function sortedListToBST($head) {
    $arr = [];
    while ($head != null){
        array_push($arr,$head->val);
        $head = $head->next;
    }
    return arrToBST($arr);
}

function arrToBST($arr){
    if ($arr == []) return null;
    $mid = floor(count($arr)/2);
    $tree = new TreeNode($arr[$mid]);
    $tree->left = arrToBST(array_slice($arr,0,$mid));
    $tree->right = arrToBST(array_slice($arr,$mid+1,count($arr)-$mid));
    return $tree;
}

$head = new ListNode(-10);
$head->next = new ListNode(-3);
$head->next->next = new ListNode(0);
$head->next->next->next = new ListNode(5);
$head->next->next->next->next = new ListNode(9);
$head->next->next->next->next->next = new ListNode(10);
//$head->next->next->next->next->next->next = new ListNode(12);
var_dump(sortedListToBSTDFS($head));


function sortedListToBSTDFS($head){
    if ($head == null){
        return null;
    }
    $node = $head;
    $root = new TreeNode(0);
    $que = [$root];
    $node = $node->next;
    while ($node){
        $n = array_shift($que);
        $n->left = new TreeNode(0);
        array_push($que,$n->left);
        $node = $node->next;
        if($node == null){
            break;
        }
        $n->right = new TreeNode(0);
        array_push($que,$n->right);
        $node = $node->next;
    }
    dfsBuild($head,$root);
    return $root;
}

function dfsBuild(&$li,&$root){
    if ($root == null){
        return;
    }
    dfsBuild($li,$root->left);
    $root->val = $li->val;
    $li = $li->next;
    dfsBuild($li,$root->right);
}