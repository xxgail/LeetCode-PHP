<?php

/**
 * Class TreeNode
 * ————————————————
 * 原文链接：https://blog.csdn.net/nuli888/article/details/52181785
 */
class TreeNode{
    public $val = null;
    public $left = null;
    public $right = null;
}

//先序遍历 根节点 ---> 左子树 ---> 右子树
function preorder($root){
    $stack=array();
    array_push($stack,$root);
    while(!empty($stack)){
        $center_node=array_pop($stack);
        echo $center_node->value.' ';//先输出根节点
        if($center_node->right!=null){
            array_push($stack,$center_node->right);//压入左子树
        }
        if($center_node->left!=null){
            array_push($stack,$center_node->left);
        }
    }
}
//中序遍历，左子树---> 根节点 ---> 右子树
function inorder($root){
    $stack = array();
    $center_node = $root;
    while (!empty($stack) || $center_node != null) {
        while ($center_node != null) {
            array_push($stack, $center_node);
            $center_node = $center_node->left;
        }

        $center_node = array_pop($stack);
        echo $center_node->value . " ";

        $center_node = $center_node->right;
    }
}
//后序遍历，左子树 ---> 右子树 ---> 根节点
function tailorder($root){
    $stack=array();
    $outstack=array();
    array_push($stack,$root);
    while(!empty($stack)){
        $center_node=array_pop($stack);
        array_push($outstack,$center_node);//最先压入根节点，最后输出
        if($center_node->left!=null){
            array_push($stack,$center_node->left);
        }
        if($center_node->right!=null){
            array_push($stack,$center_node->right);
        }
    }

    while(!empty($outstack)){
        $center_node=array_pop($outstack);
        echo $center_node->value.' ';
    }

}

$a=new TreeNode();
$b=new TreeNode();
$c=new TreeNode();
$d=new TreeNode();
$e=new TreeNode();
$f=new TreeNode();
$g=new TreeNode();
$a->val=1;
$b->val=2;
$c->val=2;
$d->val=null;
$e->val=3;
$f->val=null;
$g->val=3;
$a->left=$b;
$a->right=$c;
$b->left=$d;
$b->right=$e;
$c->left=$f;
$c->right=$g;
//preorder($a);//A B D C E F
//inorder($a);//D B A E C F
//tailorder($a);//D B E F C A
isSymmetric($a);

/**
 * @Time: 2019/9/7 15:45
 * @DESC: 101
 * 给定一个二叉树，检查它是否是镜像对称的。
 * @param $a
 * @return bool
 */
function isSymmetric($a){
    return isMirror($a,$a);
}

function isMirror($t1, $t2){ // TODO: 真的看不懂
//    var_dump($t1->right);
    if($t1 == null && $t2 == null) return true;
    if($t1 == null || $t2 == null) return false;
    return  ($t1->val == $t2->val)
        && isMirror($t1->right, $t2->left)
        && isMirror($t1->left, $t2->right);
}