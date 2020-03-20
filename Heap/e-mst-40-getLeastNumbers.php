<?php
/**
 * @Time: 2020/3/20 16:37
 * @DESC: 面试题40. 最小的K个数
 * 输入整数数组 arr ，找出其中最小的 k 个数。
 * 例如，输入4、5、1、6、2、7、3、8这8个数字，则最小的4个数字是1、2、3、4。
 * @param $arr
 * @param $k
 * @return array
 */
function getLeastNumbers($arr, $k) {
    sort($arr);
    return array_slice($arr,0,$k);
}

### 堆排序