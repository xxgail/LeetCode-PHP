<?php
require_once 'ListNode.php';
# https://leetcode-cn.com/problems/add-two-numbers/
/**
 * @Time: 2020/3/26 00:49
 * @DESC: 2. 两数相加 中等
 * 给出两个 非空 的链表用来表示两个非负的整数。
 * 其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 * 示例：
 * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 0 -> 8
 * 原因：342 + 465 = 807
 * @param $sl1
 * @param $sl2
 * @return null
 */
function addTwoNumbers($sl1,$sl2){
    $result = new ListNode(0);
    $current = $result;

    $addition = 0;
    while ($sl1 != null || $sl2 != null || $addition != 0){
        $sum = ($sl1->val??0) + ($sl2->val??0) + $addition;
        $addition = 0;
        if ($sum >= 10){
            $sum = $sum-10;
            $addition ++;
        }
        $current->next = new ListNode($sum);
        $current = $current->next;

        $sl1 = $sl1->next;
        $sl2 = $sl2->next;
    }

    return $result->next;
}


$head = new ListNode(1);
$head->next = new ListNode(2);
//var_dump(linkLen($head));

$sl1 = new ListNode(5);
$sl1->next = new ListNode(4);
$sl1->next->next = new ListNode(3);
$sl2 = new ListNode(2);
$sl2->next = new ListNode(6);
$sl2->next->next = new ListNode(4);
var_dump(addTwoNumbers($sl1,$sl2));
