<?php
/**
 * @Time: 2019/11/7 13:38
 * @DESC: 198. 打家劫舍
 * 你是一个专业的小偷，计划偷窃沿街的房屋。每间房内都藏有一定的现金，影响你偷窃的唯一制约因素就是相邻的房屋装有相互连通的防盗系统，如果两间相邻的房屋在同一晚上被小偷闯入，系统会自动报警。
 * 给定一个代表每个房屋存放金额的非负整数数组，计算你在不触动警报装置的情况下，能够偷窃到的最高金额。
 * 示例 1:
 * 输入: [1,2,3,1]
 * 输出: 4
 * 解释: 偷窃 1 号房屋 (金额 = 1) ，然后偷窃 3 号房屋 (金额 = 3)。
 * 偷窃到的最高金额 = 1 + 3 = 4 。
 * @param $nums
 * @return int
 */
function rob($nums){ // 用循环代替递归
    $prevMax = 0;
    $currMax = 0;
    for ($i = 0; $i < count($nums); $i++) {
        $temp = $currMax;
        $currMax = max($prevMax + $nums[$i], $currMax);
        $prevMax = $temp;
    }
    return $currMax;
}

/**
 * @Time: 2020/3/9 20:58
 * @DESC: 动态规划
 * @param $nums
 * @return mixed
 */
function robDp($nums){
    $dp[0] = $nums[0];
    $dp[1] = max($nums[0],$nums[1]);
    for ($i = 2; $i < count($nums); $i++){
        $dp[$i] = max($dp[$i-2] + $nums[$i],$dp[$i-1]);
    }
    return $dp[count($nums)-1];
}

/**
 * @Time: 2020/3/9 20:48
 * @DESC: 用递归来写的解法
 * @param $nums
 * @return mixed
 */
function robRec($nums){
    return robRecFunc($nums,count($nums)-1);
}

function robRecFunc($nums,$i){
    if ($i == 0){
        return $nums[0];
    }elseif ($i == 1){
        return max($nums[0],$nums[1]);
    }else {
        $a = robRecFunc($nums,$i - 2) + $nums[$i];
        $b = robRecFunc($nums,$i - 1);
        return max($a, $b);
    }
}

##----- 官方解法
# 考虑所有可能的抢劫方案过于困难。一个自然而然的想法是首先从最简单的情况开始。记：
# f(k) = 从前 k 个房屋中能抢劫到的最大数额，Ai= 第 i 个房屋的钱数。
# 首先看 n = 1 的情况，显然 f(1) = A1。
# 再看 n = 2，f(2) = max(A1, A2)。
# 对于 n = 3，有两个选项:
# 抢第三个房子，将数额与第一个房子相加。
# 不抢第三个房子，保持当前现有最大数额（即前两个数中较大的一个）。
# 显然，你想选择数额更大的选项。于是，可以总结出公式：
# f(k) = max(f(k – 2) + Ak, f(k – 1));
# 我们选择 f(–1) = f(0) = 0 为初始情况，这将极大地简化代码。
# 答案为 f(n)。
# 可以用一个数组来存储并计算结果。
# 不过由于每一步你只需要前两个最大值，两个变量就足够用了。

print_r(robDp([1,2,4,1,7,8,3]));