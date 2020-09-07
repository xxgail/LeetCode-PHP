<?php
/**
 * @Time: 2020/9/7
 * @DESC: 637. 二叉树的层平均值
 * 给定一个非空二叉树, 返回一个由每层节点平均值组成的数组。
 * 示例 1：
    输入：
        3
       / \
      9  20
     / \
    15  7
    输出：[3, 14.5, 11]
 * 解释：第 0 层的平均值是 3 ,  第1层是 14.5 , 第2层是 11 。因此返回 [3, 14.5, 11] 。
 * @param $root
 * @return array
 * @link: https://leetcode-cn.com/problems/average-of-levels-in-binary-tree/
 */
function averageOfLevels($root){
    if ($root == null) return [];
    $q = [$root];
    $res = [];
    while ($q){
        $c = count($q);
        $sum = 0;
        $tmp = [];
        for ($i = 0; $i < $c; $i++){
            $sum += $q[$i]->val;
            if($q[$i]->left != null){
                $tmp[] = $q[$i]->left;
            }
            if($q[$i]->right != null){
                $tmp[] = $q[$i]->right;
            }
        }
        $q = $tmp;
        $res[] = $sum / $c;
    }
    return $res;
}