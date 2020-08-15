<?php
/**
 * @Time: 2020/8/11
 * @DESC: 130. 被围绕的区域
 * 给定一个二维的矩阵，包含 'X' 和 'O'（字母 O）。
 * 找到所有被 'X' 围绕的区域，并将这些区域里所有的 'O' 用 'X' 填充。
 * 示例:
    X X X X
    X O O X
    X X O X
    X O X X
 * 运行你的函数后，矩阵变为：
    X X X X
    X X X X
    X X X X
    X O X X
 * 解释:
 * 被围绕的区间不会存在于边界上，换句话说，任何边界上的'O'都不会被填充为'X'。
 * 任何不在边界上，或不与边界上的'O'相连的'O'最终都会被填充为'X'。
 * 如果两个元素在水平或垂直方向相邻，则称它们是“相连”的。
 * @param $board
 * @return mixed
 * @link: https://leetcode-cn.com/problems/surrounded-regions
 */
function solve(&$board){
    if (count($board) == 0 || count($board[0]) == 0) {
        return $board;
    }

    $n = count($board);
    $m = count($board[0]);
    for ($i = 0; $i < $n; $i++){
        dfs($board,$i,0,$n,$m);
        dfs($board,$i,$m-1,$n,$m);
    }
    for ($i = 1; $i < $m-1; $i++){
        dfs($board,0,$i,$n,$m);
        dfs($board,$n-1,$i,$n,$m);
    }
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($board[$i][$j] == '-'){
                $board[$i][$j] = 'O';
            }elseif ($board[$i][$j] == 'O'){
                $board[$i][$j] = 'X';
            }
        }
    }
    return $board;
}

function dfs(&$board,$x,$y,$n,$m){
    if ($x < 0 || $x >= $n || $y < 0 || $y >= $m || $board[$x][$y] != "O") {
        return;
    }
    $board[$x][$y] = '-';
    dfs($board,$x+1,$y,$n,$m);
    dfs($board,$x-1,$y,$n,$m);
    dfs($board,$x,$y+1,$n,$m);
    dfs($board,$x,$y-1,$n,$m);
}

$board = [
    ["X","X","X","X",],
    ["X","O","O","X",],
    ["X","X","O","X",],
    ["X","O","X","X",],
];
var_dump(solve($board));


function solveBfs(&$board){
    $dx = [1,-1,0,0];
    $dy = [0,0,1,-1];
    if (count($board) == 0 || count($board[0]) == 0){
        return $board;
    }
    $n = count($board);
    $m = count($board[0]);
    $queue = [];
    for ($i = 0; $i < $n; $i++){
        if ($board[$i][0] == "O"){
            array_push($queue,[$i,0]);
        }
        if ($board[$i][$m-1] == "O"){
            array_push($queue,[$i,$m-1]);
        }
    }
    for ($i = 1; $i < $m-1; $i++) {
        if ($board[0][$i] == "O"){
            array_push($queue,[0,$i]);
        }
        if ($board[$n-1][$i] == "O"){
            array_push($queue,[$n-1,$i]);
        }
    }
    while ($queue){
        $cell = array_shift($queue);
        $board[$cell[0]][$cell[1]] = "-";
        for ($i = 0; $i < 4; $i++) {
            $mx = $cell[0]+$dx[$i];
            $my = $cell[1]+$dy[$i];
            if ($mx < 0 || $my < 0 || $mx >= $n || $my >= $m || $board[$mx][$my] != "O"){
                continue;
            }
            array_push($queue,[$mx,$my]);
        }
    }
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($board[$i][$j] == "-"){
                $board[$i][$j] = "O";
            }elseif ($board[$i][$j] == "O"){
                $board[$i][$j] = "X";
            }
        }
    }
    return $board;
}