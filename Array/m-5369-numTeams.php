<?php
# https://leetcode-cn.com/problems/count-number-of-teams/
/**
 * @Time: 2020/3/29 13:52
 * @DESC: 5369. 统计作战单位数 182周竞赛
 *  n 名士兵站成一排。每个士兵都有一个 独一无二 的评分 rating 。
 * 每 3 个士兵可以组成一个作战单位，分组规则如下：
 * 从队伍中选出下标分别为 i、j、k 的 3 名士兵，他们的评分分别为 rating[i]、rating[j]、rating[k]
 * 作战单位需满足： rating[i] < rating[j] < rating[k] 或者 rating[i] > rating[j] > rating[k] ，其中  0 <= i < j < k < n
 * 请你返回按上述条件可以组建的作战单位数量。每个士兵都可以是多个作战单位的一部分。
 * @param $rating
 * @return int
 */
function numTeams($rating){
    // ----- 时间负责度降为O(n2)
    $len = count($rating);
    if ($len < 3){
        return 0;
    }
    $res = 0;
    for ($i = 1; $i < $len-1; $i++){
        $small_left = $large_left = $small_right = $large_right = 0;
        for ($k = $i-1; $k >= 0; $k--){
            $rating[$k] < $rating[$i] ? $small_left++ : $large_left++;
        }

        for ($k = $i+1; $k < $len; $k++){
            $rating[$k] > $rating[$i] ? $large_right++ : $small_right++;
        }
        $res += $small_left * $large_right + $large_left * $small_right;
    }
    return $res;

//    // ----- 暴力循环O(n3)
//    $len = count($rating);
//    if ($len < 3){
//        return 0;
//    }
//    $res = 0;
//    for ($i = 0; $i < $len-2; $i++){
//        for ($j = $len-1; $j > $i+1;$j--){
//            if (abs($rating[$j] - $rating[$i]) == 1){
//                continue;
//            }
//            $m = $j-1;
//            while ($m > $i){
//                if (($rating[$m] > $rating[$i] && $rating[$m] < $rating[$j]) ||
//                    ($rating[$m] < $rating[$i] && $rating[$m] > $rating[$j])){
//                    $res++;
//                }
//                $m--;
//            }
//        }
//    }
//    return $res;
}

$rating = [2,1,3,4];
var_dump(numTeams($rating));