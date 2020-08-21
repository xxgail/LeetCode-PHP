<?php
/**
 * @Time: 2020/8/20
 * @DESC: 529. 扫雷游戏
 * 给定一个代表游戏板的二维字符矩阵。
 * 'M'代表一个未挖出的地雷，
 * 'E'代表一个未挖出的空方块，
 * 'B'代表没有相邻（上，下，左，右，和所有4个对角线）地雷的已挖出的空白方块，
 * 数字（'1' 到 '8'）表示有多少地雷与这块已挖出的方块相邻，
 * 'X'则表示一个已挖出的地雷。
 * 现在给出在所有未挖出的方块中（'M'或者'E'）的下一个点击位置（行和列索引），根据以下规则，返回相应位置被点击后对应的面板：
 * 如果一个地雷（'M'）被挖出，游戏就结束了 - 把它改为'X'。
 * 如果一个没有相邻地雷的空方块（'E'）被挖出，修改它为（'B'），并且所有和其相邻的未挖出方块都应该被递归地揭露。
 * 如果一个至少与一个地雷相邻的空方块（'E'）被挖出，修改它为数字（'1'到'8'），表示相邻地雷的数量。
 * 如果在此次点击中，若无更多方块可被揭露，则返回面板。
 * 示例 1：
 * 输入:
 * [
 * ['E', 'E', 'E', 'E', 'E'],
 * ['E', 'E', 'M', 'E', 'E'],
 * ['E', 'E', 'E', 'E', 'E'],
 * ['E', 'E', 'E', 'E', 'E']
 * ]
 * Click : [3,0]
 *
 * 输出:
 * [
 * ['B', '1', 'E', '1', 'B'],
 * ['B', '1', 'M', '1', 'B'],
 * ['B', '1', '1', '1', 'B'],
 * ['B', 'B', 'B', 'B', 'B']
 * ]
 * @param $board [][]string
 * @param $click []int
 * @return mixed [][]string
 * @link: https://leetcode-cn.com/problems/minesweeper
 */

function updateBoard($board, $click) {
    if ($board[$click[0]][$click[1]] == 'M'){
        $board[$click[0]][$click[1]] = 'X';
        return $board;
    }
    updateBoardDFS($board,$click[0],$click[1]);
    return $board;

    # BFS
    $dirX = [0, 1, 0, -1, 1, 1, -1, -1];
    $dirY = [1, 0, -1, 0, 1, -1, 1, -1];
    $h = count($board);
    $w = count($board[0]);
    $visit = $board;
    $list = [$click];
    while ($list){
        $curr = array_shift($list);
        $x = $curr[0];
        $y = $curr[1];
        $bomb_count = bomb($board,$x,$y);
        if ($bomb_count == 0){
            $board[$x][$y] = 'B';
            for ($i = 0; $i < 8; $i++){
                $tx = $x + $dirX[$i];
                $ty = $y + $dirY[$i];
                if ($tx < 0 || $tx >= $h || $ty < 0 || $ty >= $w || $board[$tx][$ty] != 'E' || !$visit[$tx][$ty]){
                    continue;
                }
                $list[] = [$tx,$ty];
                $visit[$tx][$ty] = false;
            }
        }else{
            $board[$x][$y] = strval($bomb_count);
        }
    }
    return $board;
}

/**
 * @Time: 2020/8/20
 * @DESC: DFS辅助方法
 * @param $board
 * @param $x
 * @param $y
 */
function updateBoardDFS(&$board,$x,$y){
    $dirX = [0, 1, 0, -1, 1, 1, -1, -1];
    $dirY = [1, 0, -1, 0, 1, -1, 1, -1];
    $h = count($board);
    $w = count($board[0]);
    $bomb_count = bomb($board,$x,$y);
    if ($bomb_count != 0){
        $board[$x][$y] = strval($bomb_count);
    }else{
        $board[$x][$y] = 'B';
        for ($i = 0; $i < 8; $i++){
            $tx = $x + $dirX[$i];
            $ty = $y + $dirY[$i];
            if ($tx < 0 || $tx >= $h || $ty < 0 || $ty >= $w || $board[$tx][$ty] != 'E'){
                continue;
            }
            updateBoardDFS($board,$tx,$ty);
        }
    }
}

function bomb($board,$x,$y){
    $dirX = [0, 1, 0, -1, 1, 1, -1, -1];
    $dirY = [1, 0, -1, 0, 1, -1, 1, -1];
    $count = 0;
    for ($i = 0; $i < 8; $i++){
        $tx = $x + $dirX[$i];
        $ty = $y + $dirY[$i];
        if (isset($board[$tx][$ty]) && $board[$tx][$ty] == 'M'){
            $count++;
        }
    }
    return $count;
}

$board = [
    ['E', 'E', 'E', 'E', 'E'],
    ['E', 'E', 'M', 'E', 'E'],
    ['E', 'E', 'E', 'E', 'E'],
    ['E', 'E', 'E', 'E', 'E']
];
$click = [3,1];
//
//$board = [['B', '1', 'E', '1', 'B'],
//    ['B', '1', 'M', '1', 'B'],
//    ['B', '1', '1', '1', 'B'],
//    ['B', 'B', 'B', 'B', 'B']];
//
//$click = [1,2];
var_dump(updateBoard($board,$click));

