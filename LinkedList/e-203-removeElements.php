<?php
/**
 * @Time: 2019/9/11 18:09
 * @DESC: 203
 * 删除链表中等于给定值 val 的所有节点。
 * @param $head
 * @param $val
 * @return mixed
 */
function removeElements($head, $val) {
    # 递归操作。
    if (!$head)
        return $head;
    $head->next = removeElements($head->next, $val);
    return $head->data == $val ? $head->next : $head;

    # 常规遍历。报超时的错
//    $header = new ListNode(0);
//    $current = $header;
//    $header->next = $head;
//    if($current != null && $current->next != null){
//        if($current->next->val == $val){
//            $current->next = $current->next->next;
//        }else{
//            $current = $current->next;
//        }
//    }
//
//    return $header->next;
}