<?php
/**
 * @Time: 2020/9/24
 * @DESC: 501. 二叉搜索树中的众数
 * 给定一个有相同值的二叉搜索树（BST），找出 BST 中的所有众数（出现频率最高的元素）。
 * 例如：
    给定 BST [1,null,2,2],
    1
     \
      2
     /
    2
    返回[2].
 * 提示：如果众数超过1个，不需考虑输出顺序
 * @param $root
 * @return array
 * @link: https://leetcode-cn.com/problems/find-mode-in-binary-search-tree/
 */
function findMode($root) {
    $res = [];
    $pre = null;
    $maxCount = 0;
    $count = 0;
    findModeDfs($root,$res,$pre,$maxCount,$count);
    return $res;
}

function findModeDfs($root, &$res, &$pre, &$maxCount, &$count) {
    if ($root === null) return;
    findModeDfs($root->left,$res,$pre,$maxCount,$count);

    if ($pre === null) {
        $pre = $root->val;
        $count++;
        $maxCount++;
    }else if ($root->val === $pre) {
        $count++;
    }else {
        $pre = $root->val;
        $count = 1;
    }
    if ($count > $maxCount) {
        $res = [$pre];
        $maxCount = $count;
    }else if($count == $maxCount) {
        $res[] = $pre;
    }

    findModeDfs($root->right,$res,$pre,$maxCount,$count);
}