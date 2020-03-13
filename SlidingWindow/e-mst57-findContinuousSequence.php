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
    # ----- 普通解法 184ms
    $result = [];
//    $i = 1;
//    while ($i < $target/2){
//        $j = $i;
//        $sum = $target;
//        $item = [];
//        while ($sum >= $j){
//            $item[] = $j;
//            $sum -= $j;
//            $j ++;
//        }
//        if ($sum == 0){
//            $result[] = $item;
//        }
//        $i ++;
//    }

    # ----- 双指针OK 68ms
    $left = 1;
    while ($left <= $target/2){
        $sum = $right = $left;
        while ($sum < $target){
            $right ++;
            $sum += $right;
        }
        if ($sum == $target){
            $result[] = range($left,$right);
        }
        $left++;
    }

    # ----- 滑动窗口 60ms
//    $left = 1;
//    $right = 2;
//    while ($left < $right && $left <= $target/2){
//        $sum = ($left + $right) * ($right - $left + 1) / 2;
//        if ($sum == $target){
//            $result[] = range($left,$right);
//            $left ++;
//            $right ++;
//        }elseif ($sum < $target){
//            $right ++;
//        }else{
//            $left ++;
//        }
//    }
    return $result;
}

print_r(findContinuousSequence(15));

###
# 暴力循环法解决了，看到题解才知道是滑动窗口的题（应该算是吧
# 所以还需要用滑动窗口写一遍

# range($start,$end,[$step=1]) 根据范围创建数组，包含指定的元素
# range(1,3) = [1,2,3]