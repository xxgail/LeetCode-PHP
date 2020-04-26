<?php
require 'ListNode.php';
# https://leetcode-cn.com/problems/merge-k-sorted-lists/
/**
 * @Time: 2020/4/26 10:01 下午
 * @DESC: 23. 合并K个排序列表
 * 合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。
 * 示例:
 * 输入:
 * [
 *   1->4->5,
 *   1->3->4,
 *   2->6
 * ]
 * 输出: 1->1->2->3->4->4->5->6
 * @param $lists
 * @return null
 */
function mergeKLists($lists){
    $arr = [];
    # 1. 链表转数组
    for ($i = 0; $i < count($lists); $i++){
        while ($lists[$i] != null){
            array_push($arr,$lists[$i]->val);
            $lists[$i] = $lists[$i]->next;
        }
    }
    # 2. 排序
    sort($arr);
    # 3. 生成新的链表
    $res = new ListNode(0);
    $current = $res;
    for ($i = 0; $i < count($arr); $i++){
        $current->next = new ListNode($arr[$i]);
        $current = $current->next;
    }
    return $res->next;
}

$one = new ListNode(1);
$one->next = new ListNode(4);
$one->next->next = new ListNode(5);
$two = new ListNode(1);
$two->next = new ListNode(3);
$two->next->next = new ListNode(4);
$three = new ListNode(2);
$three->next = new ListNode(6);
$lists = [$one,$two,$three];
var_dump(mergeKLists($lists));