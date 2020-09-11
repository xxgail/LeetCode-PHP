<?php
/**
 * @Time: 2020/9/9
 * @DESC: 377. 组合总和 Ⅳ
 * 给定一个由正整数组成且不存在重复数字的数组，找出和为给定目标正整数的组合的个数。
 * 示例:
    nums = [1, 2, 3]
    target = 4
    所有可能的组合为：
    (1, 1, 1, 1)
    (1, 1, 2)
    (1, 2, 1)
    (1, 3)
    (2, 1, 1)
    (2, 2)
    (3, 1)
    请注意，顺序不同的序列被视作不同的组合。
    因此输出为 7。
 * @param $nums
 * @param $target
 * @return int
 * @link: https://leetcode-cn.com/problems/combination-sum-iv/
 */
function combinationSum4($nums, $target)
{
    $dp = array_fill(0,$target+1,0);
    $dp[0] = 1;
    for ($i = 0; $i <= $target; $i++){
        foreach ($nums as $num) {
            if ($i >= $num){
                $dp[$i] += $dp[$i-$num];
            }
        }
    }
    var_dump($dp);
    return $dp[$target];
}

$nums = [1,2,3];
$target = 4;
var_dump(combinationSum4($nums,$target));

### 背包相关问题的解题模板