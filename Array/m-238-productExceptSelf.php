<?php
/**
 * @Time: 2019/10/29 18:00
 * @DESC: 238. 除自身以外数组的乘积
 * 给定长度为 n 的整数数组 nums，其中 n > 1，返回输出数组 output ，其中 output[i] 等于 nums 中除 nums[i] 之外其余各元素的乘积。
 * 示例:
 * 输入: [1,2,3,4]
 * 输出: [24,12,8,6]
 * 说明: 请不要使用除法，且在 O(n) 时间复杂度内完成此题。
 * @param $nums
 * @return array
 */
function productExceptSelf($nums) {
    $result = [];
    for($i = 0; $i < count($nums); $i++){
        if(array_search($nums[$i],$nums) != $i){ // 去重
            $result[] = $result[array_search($nums[$i],$nums)];
            continue;
        }
        $res = 1;
        for ($j = 0; $j < count($nums); $j++){
            if($j != $i){
                $res *= $nums[$j];
            }
        }
        $result[] = $res;
    }
    return $result;
}