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

    $length = count($nums);
    $answer = [];

    // answer[i] 表示索引 i 左侧所有元素的乘积
    // 因为索引为 '0' 的元素左侧没有元素， 所以 answer[0] = 1
    $answer[0] = 1;
    for ($i = 1; $i < $length; $i++) {
        $answer[$i] = $nums[$i-1] * $answer[$i-1];
    }

    // R 为右侧所有元素的乘积
    // 刚开始右边没有元素，所以 R = 1
    $R = 1;
    for ($i = $length - 1; $i >= 0; $i--) {
        // 对于索引 i，左边的乘积为 answer[i]，右边的乘积为 R
        $answer[$i] = $answer[$i] * $R;
        // R 需要包含右边所有的乘积，所以计算下一个结果时需要将当前值乘到 R 上
        $R *= $nums[$i];
    }
    return $answer;
}