<?php

/**
 * Class MinStack
 * 155. 最小栈
 * 设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
    push(x) —— 将元素 x 推入栈中。
    pop() —— 删除栈顶的元素。
    top() —— 获取栈顶元素。
    getMin() —— 检索栈中的最小元素。
 * 输入：
    ["MinStack","push","push","push","getMin","pop","top","getMin"]
    [[],[-2],[0],[-3],[],[],[],[]]
 * 输出：
    [null,null,null,null,-3,null,0,-2]
 * @link https://leetcode-cn.com/problems/min-stack
 */
class MinStack {
    /**
     * initialize your data structure here.
     */
    public $stack;
    public $min;
    function __construct() {
        $this->stack = new SplStack();
        $this->min = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->stack->push($x);
        if ($this->min->isEmpty() || $this->min->top() >= $x){
            $this->min->push($x);
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        if ($this->stack->isEmpty()){
            return null;
        }
        if($this->stack->pop() == $this->min->top()){
            $this->min->pop();
        }
        return $this->stack->pop();
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->stack->isEmpty() ? null : $this->stack->top();
    }

    /**
     * @return Integer
     */
    function getMin() {
        if ($this->min->isEmpty()){
            return null;
        }
        return $this->min->top();
    }
}