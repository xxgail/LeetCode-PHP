<?php
/**
 * TreeNode
 * ————————————————————————————————
 */
require 'TreeNode.php';
































//$root->right->right = new TreeNode(12);
//$data = rightSideView($root);
//var_dump($data);




$root = new TreeNode(1);
$root->left = new TreeNode(7);
$root->left->left = new TreeNode(7);
$root->left->right = new TreeNode(-8);
$root->right = new TreeNode(0);
//$data = maxLevelSum($root);
//var_dump($data);