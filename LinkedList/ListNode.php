<?php
/**
 * Class ListNode
 * ————————————————————————————————
 */
class ListNode {
    public $val;   // 节点数据
    public $next;   // 下一节点

    public function __construct($val) {
        $this->val = $val;
        $this->next = NULL;
    }
}