<?php
# https://leetcode-cn.com/problems/number-of-ways-to-paint-n-x-3-grid/
/**
 * @Time: 2020/4/12 14:29
 * @DESC: 5383. 给 N * 3 网格图涂色的方法 184周竞赛
 * 你有一个 n x 3 的网格图 grid ，你需要用 红，黄，绿 三种颜色之一给每一个格子上色，且确保相邻格子颜色不同（也就是有相同水平边或者垂直边的格子颜色不同）。
 * 给你网格图的行数 n 。请你返回给 grid 涂色的方案数。
 * 由于答案可能会非常大，请你返回答案对 10^9 + 7 取余的结果。
 * @param $n
 * @return int
 */
function numOfWays($n){
    # ----- 参考题解的数学算法
    $ABC = $ABA = 6;
    $mod = 10 ** 9 + 7;
    while (--$n){
        list($ABC,$ABA) = [
            ($ABC * 2 + $ABA * 2) % $mod,
            ($ABC * 2 + $ABA * 3) % $mod,
        ];
    }
    return ($ABC + $ABA) % $mod;

    # ----- 想多了就超时的回溯算法，没过
//    $res = 0;
//    Func([],0,0,$n,$res);
//    return $res % (pow(10,9) + 7);
}

function Func($item,$i,$j,$n,&$res){
    if ($i < $n && $j == 3){
        $i ++;
        $j = 0;
    }

    if ($i == $n && $j == 0){
        $res ++;
        return;
    }

    $arr = ['r','g','y']; // 红绿黄
    for ($k = 0; $k < count($arr); $k++){
        if ($i == 0 && $j > 0){
            if ($item[$i][$j-1] == $arr[$k]){
                continue;
            }
        } else if ($i > 0 && $j == 0){
            if ($item[$i-1][$j] == $arr[$k]){
                continue;
            }
        } else if ($i > 0 && $j > 0){
            if ($item[$i][$j-1] == $arr[$k] || $item[$i-1][$j] == $arr[$k]){
                continue;
            }
        }
        $item[$i][$j] = $arr[$k];
        $j ++;
        Func($item,$i,$j,$n,$res);
        $j --;
        array_pop($item[$i]);
    }
}



var_dump(numOfWays(6));