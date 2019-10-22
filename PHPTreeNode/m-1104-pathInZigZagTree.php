<?php
/**
 * @Time: 2019/10/21 13:59
 * @DESC: 1104. 二叉树寻路。中等
 * 在一棵无限的二叉树上，每个节点都有两个子节点，树中的节点 逐行 依次按 “之” 字形进行标记。
 * 如下图所示，在奇数行（即，第一行、第三行、第五行……）中，按从左到右的顺序进行标记；
 * 而偶数行（即，第二行、第四行、第六行……）中，按从右到左的顺序进行标记。
 *        1
 *    3       2
 * 4    5   6   7
 * 给你树上某一个节点的标号 label，请你返回从根节点到该标号为 label 节点的路径，该路径是由途经的节点标号所组成的。
 * @param $label
 * @return array
 */
function pathInZigZagTree($label) {
    $result = [];
    $line = 1;
    while (pow(2,$line) <= $label){
        $line ++;
    } // 找到label在第几行

    if($line % 2 == 0){ // 相对于最左边的结点的值的偏移量
        $diff = pow(2,$line) - 1 - $label;
    }else{
        $diff = $label - pow(2,$line - 1);
    }

    // 因为每个结点有两个子节点，所以相对于左边的偏移量是2倍递减。获取到每层的偏移量
    for ($i = $line; $i > 0; $i--,$diff = intval($diff/2)){
        if($i % 2 == 0){
            $result[] = pow(2,$i) - 1 - $diff;
        }else{
            $result[] = pow(2,$i-1) + $diff;
        }
    }
    return array_reverse($result);
}