<?php
/**
 * @Time: 2020/3/6 15:09
 * @DESC: 面试题57 - II. 和为s的连续正数序列 简单
 * 输入一个正整数 target ，输出所有和为 target 的连续正整数序列（至少含有两个数）。
 * 序列内的数字由小到大排列，不同序列按照首个数字从小到大排列。
 * @param $target
 * @return array
 */
function findContinuousSequence($target){
    $result = [];
    $i = 1;
    while ($i < $target/2){
        $j = $i;
        $sum = $target;
        $item = [];
        while ($sum >= $j){
            $item[] = $j;
            $sum -= $j;
            $j ++;
        }
        if ($sum == 0){
            $result[] = $item;
        }
        $i ++;
    }

    return $result;
}

print_r(findContinuousSequence(100000));

###
# 暴力循环法解决了，看到题解才知道是滑动窗口的题（应该算是吧
# 所以还需要用滑动窗口写一遍 TODO

