<?php
require 'ListNode.php';
/**
 * @Time: 2020/5/20 17:49
 * @DESC: 25. K个一组翻转链表
 * 给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
 * k 是一个正整数，它的值小于或等于链表的长度。
 * 如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
 * 示例：
 * 给你这个链表：1->2->3->4->5
 * 当 k = 2 时，应当返回: 2->1->4->3->5
 * 当 k = 3 时，应当返回: 3->2->1->4->5
 * @param $head
 * @param $k
 * @return ListNode
 * @link: https://leetcode-cn.com/problems/reverse-nodes-in-k-group
 */
function reverseKGroup($head,$k){ # TODO：有时间优化一下
    if ($k <= 1){
        return $head;
    }
    $r = [];
    while ($head != null){
        array_push($r,$head->val);
        $head = $head->next;
    }
    $constant = count($r) - count($r) % $k;
    $change = floor(count($r) / $k);
    $c_r = [];
    for ($i = 0; $i < $change; $i++){
        $start = $i * $k;
        $end = ($i+1) * $k;
        for ($j = $end - 1; $j >= $start; $j--){
            $c_r[] = $r[$j];
        }
    }
    array_splice($r,0,$constant);
    $r = array_merge($c_r,$r);

    $res = new ListNode($r[0]);
    $current = $res;
    for ($i = 1; $i < count($r); $i++){
        $current->next = new ListNode($r[$i]);
        $current = $current->next;
    }
    return $res;
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
//$head->next->next->next->next->next = new ListNode(6);
//var_dump(a($head,0));
var_dump(reverseKGroup($head,3));
//var_dump(a($head,2));
//var_dump(a($head,3));