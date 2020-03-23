<?php
require_once "ListNode.php";
/**
 * @Time: 2020/3/23 16:04
 * @DESC: 876. 链表的中间节点 简单
 * 给定一个带有头结点 head 的非空单链表，返回链表的中间结点。
 * 如果有两个中间结点，则返回第二个中间结点。
 * @param $head
 * @return mixed
 */
function middleNode($head){
    # 计算链表长度然后查找的方法
//    $len = 0;
//    $head_ = $head;
//    while ($head_ != null){
//        $len ++;
//        $head_ = $head_->next;
//    } # 此刻head_中的指针已经跑到最后了，所以要生成一个新的变量来进行长度的运算
//
//    $middle = floor($len/2);
//    while ($middle > 0){
//        $middle --;
//        $head = $head->next;
//    }
//    return $head;

    # 快慢节点，慢节点的step是1，快节点的step是2。
    # 所以在快节点到链表的尾端的时候，慢节点刚好到中间位置。
    $fast = $head;
    $slow = $head;
    while ($fast->next != null){
        $slow = $slow->next;
        $fast = $fast->next->next ?? $fast->next;
    }
    return $slow;
}

$head = new ListNode(1);
//$head->next = new ListNode(2);
//$head->next->next = new ListNode(3);
//$head->next->next->next = new ListNode(4);

var_dump(middleNode($head));

### 快慢节点举例说明
# 1->2->3->4
# i = 0  slow = 1   fast = 1 # 开始时指向头结点
# i = 1  slow = 2   fast = 3
# i = 2  slow = 3   fast = 4 (因为后面没有了