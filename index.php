<?php
include 'PHPArr/function.php';
require 'PHPStr/function.php';
include "PHPLinkedList/function.php";
include "PHPTreeNode/TreeNode.php";
include "PHPTreeNode/function.php";

$root = new TreeNode(0);
$root->left = new TreeNode(1);
$root->left->left = new TreeNode(1);
$root->right = new TreeNode(2);
$root->right->right = new TreeNode(2);
//$data = preorderTraversal($root);
//$data = inorderTraversal($root);
//$data = postorderTraversal($root);
//$data = levelOrder($root);
//$data = isSymmetric($root);
//var_dump($data);
//$data = constructArray(5,4);
//$data = singleNumber([2,2,1,3,3,4,4]);
//$data = heightChecker([1,2,1,2,1,1,1,2,1]);
//$data = reverseWords("the sky is blue");
//$data = restoreIpAddresses('999');
//$data = numRabbits([10,10,10]);
//$data = plusOne([9,9,9]);
//$a =  "11";
//$b = "1";
//$data = addBinary($a,$b);

//$haystack = 'hello';
//$needle = 'lwl';
//$data = strStrTest($haystack,$needle);
//print_r($data);

//$data = longestCommonPrefix([1]);
//$numbers = [12,13,23,28,43,44,59,60,61,68,70,86,88,92,124,125,136,168,173,173,180,199,212,221,227,230,277,282,306,314,316,321,325,328,336,337,363,365,368,370,370,371,375,384,387,394,400,404,414,422,422,427,430,435,457,493,506,527,531,538,541,546,568,583,585,587,650,652,677,691,730,737,740,751,755,764,778,783,785,789,794,803,809,815,847,858,863,863,874,887,896,916,920,926,927,930,933,957,981,997];
//$target = 542;
//$data = twoSum($numbers,$target);

//$nums1 = [3,1,2,2];
//$nums2 = [2];
//$data = intersect($nums1,$nums2);
//print_r($data);

//$link = new Solution();
//$head = [1,2,6,3,4,5,6];
//$val = 6;
//$data = $link->removeElements($head,$val);
//print_r($data);

$n = 4;
$data = lastRemaining($n);
print_r($data);
