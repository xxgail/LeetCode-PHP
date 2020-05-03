<?php
require 'ListNode.php';
/**
 * @Time: 2020/5/3 12:19
 * @DESC: 21. 合并两个有序链表
 * 将两个升序链表合并为一个新的升序链表并返回。
 * 新链表是通过拼接给定的两个链表的所有节点组成的。 
 * 示例：
 * 输入：1->2->4, 1->3->4
 * 输出：1->1->2->3->4->4
 * @param $l1
 * @param $l2
 * @return null
 * @link https://leetcode-cn.com/problems/merge-two-sorted-lists/
 */
function mergeTwoLists($l1, $l2) {
    $res = new ListNode(0);
    $current = $res;
    while($l1 != null && $l2 != null){
        if ($l1->val <= $l2->val){
            $current->next = new ListNode($l1->val);
            $current = $current->next;
            $l1 = $l1->next;
        }else{
            $current->next = new ListNode($l2->val);
            $current = $current->next;
            $l2 = $l2->next;
        }
    }
    if($l1 != null){
        $current->next = $l1;
    }

    if($l2 != null){
        $current->next = $l2;
    }

    return $res->next;
}
