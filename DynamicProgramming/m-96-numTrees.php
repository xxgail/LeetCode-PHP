<?php
/**
 * @Time: 2020/7/15 9:05
 * @DESC: 96. 不同的二叉搜索树
 * 给定一个整数 n，求以 1 ... n 为节点组成的二叉搜索树有多少种？
 * 示例:
    输入: 3
    输出: 5
    解释:
    给定 n = 3, 一共有 5 种不同结构的二叉搜索树:
    1         3    3      2      1
    \       /     /      / \      \
    3     2      1       1  3      2
    /     /       \                 \
    2     1        2                 3
 * @param $n
 * @return int
 * @link: https://leetcode-cn.com/problems/unique-binary-search-trees
 */
function numTrees($n){
    $dp = array_fill(0,$n+1,0);
    $dp[0] = $dp[1] = 1;
    for ($i = 2; $i <= $n; $i++){
       for ($j = 1; $j <= $i; $j++){
           $dp[$i] += $dp[$j-1] * $dp[$i-$j];
       }
    }
    return $dp[$n];
}

var_dump(numTrees(3));