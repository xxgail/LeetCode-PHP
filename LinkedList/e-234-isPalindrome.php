<?php
require 'ListNode.php';
/**
 * @Time: 2020/10/30
 * @DESC: 234. 回文链表
 * 请判断一个链表是否为回文链表。
 * 示例 1:
    输入: 1->2
    输出: false
 * 示例 2:
    输入: 1->2->2->1
    输出: true
 * @param $head
 * @return bool
 * @link: https://leetcode-cn.com/problems/palindrome-linked-list/
 */
function isPalindrome($head) {
    if ($head == null || $head->next == null) return true;
    $res = null;
    while($head){
        $current = $res;
        $res = new ListNode($head->val);
        $res->next = $current;
        $head = $head->next;
        if($res == $head) {
            return true;
        }
    }
    return false;
}

$head = new ListNode(1);
//$head->next = new ListNode(2);
//$head->next->next = new ListNode(2);
//$head->next->next->next = new ListNode(1);
//var_dump(isPalindrome($head));
