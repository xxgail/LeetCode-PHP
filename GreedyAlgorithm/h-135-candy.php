<?php
/**
 * @Time: 2020/12/24
 * @DESC: 135. 分发糖果
 * 老师想给孩子们分发糖果，有 N 个孩子站成了一条直线，老师会根据每个孩子的表现，预先给他们评分。
 * 你需要按照以下要求，帮助老师给这些孩子分发糖果：
 * 每个孩子至少分配到 1 个糖果。
 * 评分更高的孩子必须比他两侧的邻位孩子获得更多的糖果。
 * 那么这样下来，老师至少需要准备多少颗糖果呢？
 * 示例 1：
    输入：[1,0,2]
    输出：5
    解释：你可以分别给这三个孩子分发 2、1、2 颗糖果。
 * @param $ratings
 * @return int|mixed
 * @link: https://leetcode-cn.com/problems/candy/
 */
function candy($ratings) {
    $res = 0;
    $n = count($ratings);
    # 从左到右循环一遍
    $left = [1];
    for($i = 1; $i < $n; $i++) {
        if($ratings[$i] > $ratings[$i-1]) {
            $left[$i] = $left[$i-1] + 1;
        }else {
            $left[$i] = 1;
        }
    }
    # 再从右到左循环一遍
    $right = 0;
    for($i = $n-1; $i >= 0; $i--) {
        if($i < $n-1 && $ratings[$i] > $ratings[$i+1]) {
            $right++;
        }else{
            $right=1;
        }
        $res += max($left[$i],$right);
    }
    return $res;
}