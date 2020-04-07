<?php
# https://leetcode-cn.com/problems/longest-happy-string/
/**
 * @Time: 2020/4/5 23:04
 * @DESC: 5195. 最长快乐字符串 183周竞赛
 * 如果字符串中不含有任何 'aaa'，'bbb' 或 'ccc' 这样的字符串作为子串，那么该字符串就是一个「快乐字符串」。
 * 给你三个整数 a，b ，c，请你返回 任意一个 满足下列全部条件的字符串 s：
 * s 是一个尽可能长的快乐字符串。
 * s 中 最多 有a 个字母 'a'、b 个字母 'b'、c 个字母 'c' 。
 * s 中只含有 'a'、'b' 、'c' 三种字母。
 * 如果不存在这样的字符串 s ，请返回一个空字符串 ""。
 * @param $a
 * @param $b
 * @param $c
 * @return string
 */
function longestDiverseString($a,$b,$c){
    $res = '';
    $hash = [
        'a' => $a,
        'b' => $b,
        'c' => $c,
    ];
    while (true){
        arsort($hash);

        $i = 0;
        $add = '';
        foreach ($hash as $k => $v) {
            if ($res && $k == substr($res,strlen($res) - 1,1)){
                $i ++;
                continue;
            }
            if ($i == 0 && $v >= 2){
                $add = $k.$k;
                $hash[$k] -= 2;
            }else{
                if ($v > 0){
                    $add = $k;
                    $hash[$k]--;
                }
            }
            break;
        }

        if (!$add) break;
        $res .= $add;
    }
    return $res;
}

var_dump(longestDiverseString(0,1,7));