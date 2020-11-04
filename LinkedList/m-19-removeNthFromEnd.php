<?php
require 'ListNode.php';
/**
 * @Time: 2020/10/30
 * @DESC: 19. 删除链表的倒数第N个节点
 * 给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。
 * 示例：
 * 给定一个链表: 1->2->3->4->5, 和 n = 2.
 * 当删除了倒数第二个节点后，链表变为 1->2->3->5.
 * @param $head
 * @param $n
 * @return null
 * @link: https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/
 */
function removeNthFromEnd($head,$n) {
    $res = new ListNode(null);
    $res->next = $head;
    $fast = $slow = $res;
    for ($i = 0; $i <= $n; $i++) {
        $fast = $fast->next;
    }

    while ($fast !== null) {
        $fast = $fast->next;
        $slow = $slow->next;
    }
    $slow->next = $slow->next->next;

    return $res->next;
}