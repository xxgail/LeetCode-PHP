<?php
# https://leetcode-cn.com/problems/design-underground-system/
/**
 * Class UndergroundSystem
 * 5370. 设计地铁系统  182周竞赛
 * 请你实现一个类 UndergroundSystem ，它支持以下 3 种方法：
 * 1. checkIn(int id, string stationName, int t)
 * 编号为 id 的乘客在 t 时刻进入地铁站 stationName 。
 * 一个乘客在同一时间只能在一个地铁站进入或者离开。
 * 2. checkOut(int id, string stationName, int t)
 * 编号为 id 的乘客在 t 时刻离开地铁站 stationName 。
 * 3. getAverageTime(string startStation, string endStation) 
 * 返回从地铁站 startStation 到地铁站 endStation 的平均花费时间。
 * 平均时间计算的行程包括当前为止所有从 startStation 直接到达 endStation 的行程。
 * 调用 getAverageTime 时，询问的路线至少包含一趟行程。
 * 你可以假设所有对 checkIn 和 checkOut 的调用都是符合逻辑的。
 * 也就是说，如果一个顾客在 t1 时刻到达某个地铁站，那么他离开的时间 t2 一定满足 t2 > t1 。
 * 所有的事件都按时间顺序给出。
 */
class UndergroundSystem {
    /**
     */
    public $people = [];
    public $under = [];
    function __construct() {

    }

    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkIn($id, $stationName, $t) {
        $this->people[$id] = [$stationName, $t];
    }

    /**
     * @param Integer $id
     * @param String $stationName
     * @param Integer $t
     * @return NULL
     */
    function checkOut($id, $stationName, $t) {
        if ($this->people[$id]){
            $way = $this->people[$id][0] .'-'. $stationName;
            $this->under[$way]["time"] = ($this->under[$way]["time"] ?? 0) + ($t - $this->people[$id][1]);
            $this->under[$way]["num"] = ($this->under[$way]["num"] ?? 0) + 1;
        }
    }

    /**
     * @param String $startStation
     * @param String $endStation
     * @return Float
     */
    function getAverageTime($startStation, $endStation) {
        $way = $startStation .'-'. $endStation;
        return isset($this->under[$way]) ? floatval($this->under[$way]["time"]/$this->under[$way]["num"]) : null;
    }
}

/**
 * Your UndergroundSystem object will be instantiated and called as such:
 * $obj = UndergroundSystem();
 * $obj->checkIn($id, $stationName, $t);
 * $obj->checkOut($id, $stationName, $t);
 * $ret_3 = $obj->getAverageTime($startStation, $endStation);
 */

$obj = new UndergroundSystem();
$obj->checkIn(45,"aa",3);
$obj->checkIn(10,"aa",10);
$obj->checkOut(45,"bb",15);
$obj->checkOut(10,"bb",20);
var_dump($obj->getAverageTime("aa","bb"));
$obj->checkIn(11,"aa",24);
var_dump($obj->getAverageTime("aa","bb"));
