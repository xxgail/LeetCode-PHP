<?php
/**
 * @Time: 2019/9/7 15:45
 * @DESC: 101
 * 给定一个二叉树，检查它是否是镜像对称的。
 * @param $root
 * @return bool
 */
function isSymmetric($root){
    return isMirror($root,$root);
}

function isMirror($t1, $t2)
{
    if ($t1->val == null && $t2->val == null) return true;
    if ($t1->val == null || $t2->val == null) return false;
    return ($t1->val == $t2->val)
        && isMirror($t1->right, $t2->left)
        && isMirror($t1->left, $t2->right);
}
