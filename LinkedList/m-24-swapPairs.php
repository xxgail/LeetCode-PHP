<?php
require 'ListNode.php';
/**
 * @Time: 2020/10/13
 * @DESC: 24. 两两交换链表中的节点
 * 给定一个链表，两两交换其中相邻的节点，并返回交换后的链表。
 * 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 * 示例 1：
    输入：head = [1,2,3,4]
    输出：[2,1,4,3]
 * 示例 2：
    输入：head = []
    输出：[]
 * 示例 3：
    输入：head = [1]
    输出：[1]
 * @param $head
 * @return ListNode
 * @link: https://leetcode-cn.com/problems/swap-nodes-in-pairs/
 */
function swapPairs($head) {
    if ($head == null || $head->next == null) {
        return $head;
    }
    $next = $head->next;
    $head->next = swapPairs($next->next);
    $next->next = $head;
    return $next;
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
//$head->next->next->next = new ListNode(4);
var_dump(swapPairs($head));