<?php
/**
 * @Time: 2020/9/3
 * @DESC: 51. N皇后
 * n皇后问题研究的是如何将 n个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。
 * 给定一个整数 n，返回所有不同的n皇后问题的解决方案。
 * 每一种解法包含一个明确的n 皇后问题的棋子放置方案，该方案中 'Q' 和 '.' 分别代表了皇后和空位。
 * 示例：
    输入：4
    输出：[
    [".Q..",  // 解法 1
    "...Q",
    "Q...",
    "..Q."],

    ["..Q.",  // 解法 2
    "Q...",
    "...Q",
    ".Q.."]
    ]
    解释: 4 皇后问题存在两个不同的解法。
 * @param $n
 * @return array
 * @link: https://leetcode-cn.com/problems/n-queens
 */
function solveNQueens($n) {
    $board = array_fill(0,$n,array_fill(0,$n,'.'));
    $res = [];
    solveNQueensFunc(0,$n,$board,$res);
    return $res;
}

function solveNQueensFunc($row,$n,$board,&$res){
    if($row == $n){
        $tmp = [];
        foreach ($board as $item) {
            $tmp[] = implode('',$item);
        }
        $res[] = $tmp;
        return;
    }

    for ($column = 0; $column < $n; $column++){
        if (IsOk($board,$row,$column,$n)){
            $board[$row][$column] = 'Q';
            solveNQueensFunc($row+1,$n,$board,$res);
            $board[$row][$column] = '.';
        }
    }
}

function IsOk($board,$row,$column,$n){
    for ($i = 0; $i < $n; $i++){
        if ($board[$i][$column] == 'Q') return false;
    }

    for ($i = $row - 1,$j = $column + 1;$i >= 0 && $j < $n; $i--,$j++){
        if ($board[$i][$j] == 'Q') return false;
    }

    for ($i = $row-1,$j = $column-1; $i >= 0 && $j >= 0; $i--,$j--){
        if ($board[$i][$j] == 'Q') return false;
    }
    return true;
}

var_dump(solveNQueens(4));