<?php
require 'ListNode.php';
/**
 * @Time: 2020/10/20
 * @DESC: 143. 重排链表
 * 给定一个单链表 L：L0→L1→…→Ln-1→Ln ，
 * 将其重新排列后变为： L0→Ln→L1→Ln-1→L2→Ln-2→…
 * 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 * 示例 1:
    给定链表 1->2->3->4, 重新排列为 1->4->2->3.
 * @param $head
 * @link: https://leetcode-cn.com/problems/reorder-list
 */
function reorderList($head) {
    $arr = [];
    while($head != null) {
        $arr[] = $head;
        $head = $head->next;
    }
    $len = sizeof($arr);
    $i = 0;
    $j = $len - 1;
    while ($i <= $j){
        if ($i == $j || $i + 1 == $j) {
            $arr[$j]->next = null;
            break;
        }
        $tmp = $arr[$i]->next;
        $arr[$i]->next = $arr[$j];
        $arr[$j]->next = $tmp;
        $i++;
        $j--;
    }
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
var_dump(reorderList($head));