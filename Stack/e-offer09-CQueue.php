<?php

/**
 * Class CQueue
 * 用两个栈实现一个队列。队列的声明如下，请实现它的两个函数 appendTail 和 deleteHead ，分别完成在队列尾部插入整数和在队列头部删除整数的功能。(若队列中没有元素，deleteHead 操作返回 -1 )
 * @link https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof
 */
class CQueue {
    /**
     */
    public $q1,$q2;
    function __construct() {
        $this->q1 = new SplQueue();
        $this->q2 = new SplQueue();
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value) {
        $this->q1->push($value);
    }

    /**
     * @return Integer
     */
    function deleteHead() {
        if ($this->q2->isEmpty()){
            while (!$this->q1->isEmpty()){
                $this->q2->push($this->q1->pop());
            }
        }
        if ($this->q2->isEmpty()){
            return -1;
        }else{
            return $this->q2->pop();
        }
    }
}

/**
 * 示例 1：
输入：
["CQueue","appendTail","deleteHead","deleteHead"]
[[],[3],[],[]]
输出：[null,null,3,-1]

 * 示例 2：
输入：
["CQueue","deleteHead","appendTail","appendTail","deleteHead","deleteHead"]
[[],[],[5],[2],[],[]]
输出：[null,-1,null,null,5,2]
 */