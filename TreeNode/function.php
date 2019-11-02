<?php
/**
 * TreeNode
 * ————————————————————————————————
 */
require 'TreeNode.php';
require 'm-623-addOneRow.php';

$root = new TreeNode(4);
$root->left = new TreeNode(2);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(1);
$root->right = new TreeNode(6);
$root->right->left = new TreeNode(5);
$v = 111;
$d = 2;
$data = addOneRow($root,$v,$d);
print_r($data);






























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