<?php
/**
 * @Time: 2020/4/9 21:39
 * @DESC: 22. 括号生成 中等
 * 数字 n 代表生成括号的对数，请你设计一个函数，用于能够生成所有可能的并且 有效的 括号组合。
 * 示例：
 * 输入：n = 3
 * 输出：["((()))","(()())","(())()","()(())","()()()"]
 * @param $n
 * @return array
 */
function generateParenthesis($n){
    $result = [];
    Func('',$n,$n,$result);
    return $result;
}

function Func($str,$left,$right,&$result){
    if ($left == 0 && $right == 0){
        $result[] = $str;
        return;
    }

    # ---- 优化之后的 8ms
    if ($left > 0){
        Func($str.'(',$left-1,$right,$result);
    }

    if ($right > $left){
        Func($str.')',$left,$right-1,$result);
    }

    # ---- 套公式的代码，优化之前，16ms
//    if ($right >= $left){
//        $arr = $left > 0 ? ['(',')'] : ['('];
//        for ($i = 0; $i < count($arr); $i++){
//            $str .= $arr[$i];
//            $arr[$i] == '(' ? $left-- : $right --;
//            Func($str,$left,$right,$result);
//            substr($str,-1) == '(' ? $left++ : $right ++;
//            $str = substr($str,0,-1);
//        }
//    }
}

var_dump(generateParenthesis(0));