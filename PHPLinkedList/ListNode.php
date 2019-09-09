<?php
/**
 * Class ListNode
 * ————————————————————————————————
 */
class ListNode {
    public $data;   // 节点数据
    public $next;   // 下一节点

    public function __construct($data) {
        $this->data = $data;
        $this->next = NULL;
    }
}