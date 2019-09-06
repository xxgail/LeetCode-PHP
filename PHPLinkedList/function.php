<?php
require 'ListNode.php';
// 链表

class Solution {
    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    public function removeElements($head, $val) {
        $data = new ListNode($head);
        $current = $data->header;
        var_dump($current);
        while ($current != null && $current->data == $val) {
            $current = $current->next;
        }
        return $head;
    }
}