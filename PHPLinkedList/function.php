<?php
//require 'ListNode.php';
// 链表
class ListNode {
    public $data;   // 节点数据
    public $next;   // 下一节点

    public function __construct($data) {
        $this->data = $data;
        $this->next = NULL;
    }
}

class Solution {
    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    private $header;

    function __construct()
    {
        $this->header = new ListNode();
    }

    // 查找待删除节点的前一个节点
    public function findPrevious($item) {
        $current = $this->header;
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }
        return $current;
    }

    public function removeElements($head, $val) {
        $previous = $this->findPrevious($val);
        if ($previous->next != null) {
            $previous->next = $previous->next->next;
        }
    }
}