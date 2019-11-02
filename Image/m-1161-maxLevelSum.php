<?php

/**
 * @Time: 2019/10/21 16:49
 * @DESC: 1161. 最大层内元素和。 中等
 * 给你一个二叉树的根节点 root。
 * 设根节点位于二叉树的第 1 层，而根节点的子节点位于第 2 层，依此类推。
 * 请你找出层内元素之和 最大 的那几层（可能只有一层）的层号，并返回。
 * @param $root
 * @return int
 */
function maxLevelSum($root) {
    $result = 1;
    $sum = $root->val;
    $max = $root->val;
    $level = 1;
    maxLevelSumFunc([$root],$sum,$max,$level,$result);
    return $result;
}

// todo:优化
function maxLevelSumFunc($arr,$sum,$max,$level,&$result){
    if($sum > $max){
        $max = $sum;
        $result = $level;
    }
    $new_arr = [];
    $sum = 0;

    foreach ($arr as $item) {
        if($item->left != null){
            $new_arr[] = $item->left;
            $sum += $item->left->val;
        }
        if($item->right != null){
            $new_arr[] = $item->right;
            $sum += $item->right->val;
        }
    }
    if($new_arr){
        $level ++;
        maxLevelSumFunc($new_arr,$sum,$max,$level,$result);
    }
}