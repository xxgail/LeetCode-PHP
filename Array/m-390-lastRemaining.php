<?php
/**
 * @Time: 2019/9/9 22:37
 * @DESC: 390. 消除游戏 中等
 * 给定一个从1 到 n 排序的整数列表。
 * 首先，从左到右，从第一个数字开始，每隔一个数字进行删除，直到列表的末尾。
 * 第二步，在剩下的数字中，从右到左，从倒数第一个数字开始，每隔一个数字进行删除，直到列表开头。
 * 我们不断重复这两步，从左到右和从右到左交替进行，直到只剩下一个数字。
 * 返回长度为 n 的列表中，最后剩下的数字。
 * @param $n
 * @return mixed
 */
function lastRemaining($n) {
    # 通过。
    if($n < 3){return $n;}
    if($n%2 == 1){
        return lastRemaining($n - 1);
    }else{
        return 2 * ($n/2 + 1 - lastRemaining($n/2));
    }


    # ---- 找规律，用递归来解决，但是不知道为什么显示超出内存
    # 来源：https://blog.csdn.net/afei__/article/details/83689502
    return $n == 1 ? 1 : 2 * ($n/2 + 1 - lastRemaining($n/2));


    #---- 这是生成数组然后遍历的解法，但是如果$n的值太大会报溢出内存的错误。
    $n = range(1,$n);
    while (count($n) > 1){
        $data = [];
        for ($i = 0; $i < count($n); $i++){
            if($i % 2 != 0){
                $data[] = $n[$i];
            }
        }
        $n = array_reverse($data);
    }
    return $n[0];
}