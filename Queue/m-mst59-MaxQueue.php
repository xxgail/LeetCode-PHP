<?php

/**
 * @Time: 2020/3/7 22:39
 * @DESC: Class MaxQueue
 * 面试题59 - II. 队列的最大值 中等
 * 请定义一个队列并实现函数 max_value 得到队列里的最大值
 * 要求函数max_value、push_back 和 pop_front 的均摊时间复杂度都是O(1)。
 * 若队列为空，pop_front 和 max_value 需要返回 -1
 */
class MaxQueue {
    public $queue;
    public $max;
    function __construct()
    {
        $this->queue = new SplQueue();
        $this->max = new SplQueue();
    }


    function max_value(){ // max
        if ($this->queue->isEmpty()){
            return -1;
        }
        return $this->max->dequeue();
    }

    function push_back($value){ // array_push
        $this->queue->enqueue($value);
        return null;
    }


    //

    function pop_front(){ // array_shift
        if ($this->queue->isEmpty()){
            return -1;
        }
        return $this->queue->dequeue();
    }
}

$obj = new MaxQueue();
print_r($obj);
print_r($obj->push_back(1));
print_r($obj->push_back(2));
print_r($obj->max_value());
$ret_3 = $obj->pop_front();
print_r($ret_3);

###
# TODO： 时间复杂度要为O(1)
