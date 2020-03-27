<?php
# https://leetcode-cn.com/problems/x-of-a-kind-in-a-deck-of-cards/
/**
 * @Time: 2020/3/27 10:48
 * @DESC: 914. 卡牌分组 简单
 * 给定一副牌，每张牌上都写着一个整数。
 * 此时，你需要选定一个数字 X，使我们可以将整副牌按下述规则分成 1 组或更多组：
 * 每组都有 X 张牌。
 * 组内所有的牌上都写着相同的整数。
 * 仅当你可选的 X >= 2 时返回 true
 *
 * 示例 1：
 * 输入：[1,2,3,4,4,3,2,1]
 * 输出：true
 * 解释：可行的分组是 [1,1]，[2,2]，[3,3]，[4,4]
 * @param $deck
 * @return bool
 */
function hasGroupsSizeX($deck){
    if (count($deck) < 2){
        return false;
    }

    $deck = array_count_values($deck);

    $goc = 0;
    foreach ($deck as $item) {
        if ($goc == 0){
            $goc = $item;
        }else{
            $goc = Common::goc($item,$goc);
        }
    }
    return $goc > 1;
}

$deck = [1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3,3,3];
var_dump(hasGroupsSizeX($deck));
$deck = [1,2,3,4,4,3,2,1];
var_dump(hasGroupsSizeX($deck));
$deck = [1,1,1,2,2,2,3,3];
var_dump(hasGroupsSizeX($deck));
$deck = [1];
var_dump(hasGroupsSizeX($deck));
$deck = [1,1];
var_dump(hasGroupsSizeX($deck));
$deck = [1,1,2,2,2,2];
var_dump(hasGroupsSizeX($deck));

###
# 题目总结为一句话，只要这个数组的元素出现的频率的最大公约数 > 1，就是true