<?php
/**
 * @Time: 2019/11/25 10:38
 * @DESC: 651. 非递减数列
 * 给定一个长度为 n 的整数数组，你的任务是判断在最多改变 1 个元素的情况下，该数组能否变成一个非递减数列。
 * 我们是这样定义一个非递减数列的：对于数组中所有的 i (1 <= i < n)，满足 array[i] <= array[i + 1]。
 * 示例 1:
 * 输入: [4,2,3]
 * 输出: True
 * 解释: 你可以通过把第一个4变成1来使得它成为一个非递减数列。
 * @param $nums
 * @return bool
 */
function checkPossibility($nums) {
    $n = 0;
    for ($i = 0; $i < count($nums)-1; $i++){
        if ($nums[$i+1] < $nums[$i]){
            $n++;
            if($n > 1){
                return false;
            }
            # 比较前后的代码
            if($i > 0 && $nums[$i + 1] < $nums[$i - 1]) {
                $nums[$i + 1] = $nums[$i];
            } else {
                $nums[$i] = $nums[$i + 1];
            }
        }
    }
    return true;
}

$nums = [3,4,2,3];
//$nums = [4,2,3];
$nums = [2,3,3,2,4];
$data = checkPossibility($nums);
var_dump($data);