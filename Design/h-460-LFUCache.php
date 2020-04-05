<?php
# https://leetcode-cn.com/problems/lfu-cache/
/**
 * Class LFUCache
 * 460. LFU缓存 每日一题
 * todo：待优化
 * 请你为 最不经常使用（LFU）缓存算法设计并实现数据结构。它应该支持以下操作：get 和 put。
 * get(key) - 如果键存在于缓存中，则获取键的值（总是正数），否则返回 -1。
 * put(key, value) - 如果键不存在，请设置或插入值。当缓存达到其容量时，则应该在插入新项之前，使最不经常使用的项无效。在此问题中，当存在平局（即两个或更多个键具有相同使用频率）时，应该去除 最近 最少使用的键。
 * 「项的使用次数」就是自插入该项以来对其调用 get 和 put 函数的次数之和。使用次数会在对应项被移除后置为 0 。
 */
class LFUCache {
    /**
     * @param Integer $capacity
     */
    public $cap;
    public $cache;
    public $time;
    function __construct($capacity) {
        $this->cap = $capacity;
        $this->cache = [];
        $this->time = 0;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        $this->time ++;
        if ($this->cap > 0 && isset($this->cache[$key])){
            $this->cache[$key]['count'] ++;
            $this->cache[$key]['time'] = $this->time;
            return $this->cache[$key]['val'];
        }
        return -1;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if($this->cap == 0){
            return;
        }
        $this->time ++;
        if (isset($this->cache[$key])){
            $this->cache[$key]['val'] = $value;
            $this->cache[$key]['count'] ++;
            $this->cache[$key]['time'] = $this->time;
        }else {
            if (count($this->cache) == $this->cap) {
                array_multisort(array_column($this->cache, 'count'), SORT_ASC, array_column($this->cache, 'time'), SORT_ASC, $this->cache);
                array_shift($this->cache);
                $this->cache = array_column($this->cache,NULL,'key');
            }
            $this->cache[$key] = [
                'key' => $key,
                'val' => $value,
                'count' => 1,
                'time' => $this->time,
            ];
        }
    }
}

$capacity = 2;
$obj = new LFUCache($capacity);
var_dump($obj->put(2,1));
var_dump('---------------------');
var_dump($obj->put(3,2));
var_dump('---------------------');
var_dump($obj->get(3));
var_dump($obj->get(2));
var_dump('---------------------');
var_dump($obj->put(4,3));
var_dump('---------------------');
var_dump($obj->get(2));
var_dump('---------------------');
var_dump($obj->get(3));
var_dump('---------------------');
var_dump($obj->get(4));

$arr = [
    [
        'key' => 1,
        'val' => 2,
    ],
    [
        'key' => 3,
        'val' => 4,
    ]
];
$a = array_search('2',array_column($arr,'key'));
var_dump($a);
