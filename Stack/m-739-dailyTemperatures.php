<?php
/**
 * @Time: 2020/6/13 10:38
 * @DESC: 739. 每日温度
 * 请根据每日 气温 列表，重新生成一个列表。
 * 对应位置的输出为：要想观测到更高的气温，至少需要等待的天数。
 * 如果气温在这之后都不会升高，请在该位置用 0 来代替。
 * 例如，给定一个列表 temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，你的输出应该是 [1, 1, 4, 2, 1, 1, 0, 0]。
 * 提示：气温 列表长度的范围是 [1, 30000]。每个气温的值的均为华氏度，都是在 [30, 100] 范围内的整数。
 * @param $T
 * @return array
 * @link: https://leetcode-cn.com/problems/daily-temperatures
 */
function dailyTemperatures($T) {
    if($T == []){
        return $T;
    }
    $len = count($T);
    $res = array_fill(0, $len, 0);
    $s = new SplStack(); // 最大栈
    for ($i = 0; $i < $len; $i++) {
        while (!$s->isEmpty() && $T[$i] > $T[$s->top()]) {
            $prev = $s->pop();
            $res[$prev] = $i - $prev;
        }
        $s->push($i);
    }
    return $res;
}


$temperatures = [73, 74, 75, 71, 69, 72, 76, 73];
var_dump(dailyTemperatures($temperatures));