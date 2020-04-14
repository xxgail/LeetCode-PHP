<?php
require 'ListNode.php';
# https://leetcode-cn.com/problems/add-two-numbers-ii/
/**
 * @Time: 2020/4/14 13:22
 * @DESC: 445. 两数相加II 中等
 * 给你两个 非空 链表来代表两个非负整数。数字最高位位于链表开始位置。
 * 它们的每个节点只存储一位数字。将这两数相加会返回一个新的链表。
 * 你可以假设除了数字 0 之外，这两个数字都不会以零开头。
 * @param $l1
 * @param $l2
 * @return ListNode|null
 */
function addTwoNumbersII($l1, $l2){
    $arr1 = listNodeToArr($l1);
    $arr2 = listNodeToArr($l2);
    $addition = 0;
    $res = null;

    while ($arr1 || $arr2 || $addition) {
        $sum = array_pop($arr1) + array_pop($arr2) + $addition;
        $addition = 0;
        if ($sum >= 10) {
            $sum -= 10;
            $addition = 1;
        }

        $node = new ListNode($sum);
        $node->next = $res;
        $res = $node;
    }
    return $res;
}

/**
 * @Time: 2020/4/14 13:31
 * @DESC: 链表转数组/栈
 * @param $node
 * @return array
 */
function listNodeToArr($node){
    $arr = [];
    while ($node != null) {
        array_push($arr,$node->val);
        $node = $node->next;
    }
    return $arr;
}


$node1 = new ListNode(7);
$node1->next = new ListNode(2);
$node1->next->next = new ListNode(4);
$node1->next->next->next = new ListNode(3);
$node2 = new ListNode(5);
$node2->next = new ListNode(6);
$node2->next->next = new ListNode(4);

var_dump("xxg");
print_r(addTwoNumbersII($node1,$node2));