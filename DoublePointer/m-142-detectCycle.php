<?php
/**
 * @Time: 2020/10/10
 * @DESC: 142. 环形链表 II
 * 给定一个链表，返回链表开始入环的第一个节点。 如果链表无环，则返回 null
 * 为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。
 * 如果 pos 是 -1，则在该链表中没有环。
 * 说明：不允许修改给定的链表。
 * @param $head
 * @return null
 * @link: https://leetcode-cn.com/problems/linked-list-cycle-ii/
 */
function detectCycle($head) {
    $fast = $slow = $head;
    while($fast != null) {
        $slow = $slow->next;
        if ($fast->next == null) {
            return null;
        }
        $fast = $fast->next->next;
        if($fast === $slow) {
            $p = $head;
            while ($p != $slow) {
                $p = $p->next;
                $slow = $slow->next;
            }
            return $p;
        }
    }
    return null;
}