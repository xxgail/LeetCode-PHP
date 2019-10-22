<?php
/**
 * @Time: 2019/10/15 17:59
 * @DESC: 1221.分割平衡字符串。简单
 * 在一个「平衡字符串」中，'L' 和 'R' 字符的数量是相同的。
 * 给出一个平衡字符串 s，请你将它分割成尽可能多的平衡字符串。
 * 返回可以通过分割得到的平衡字符串的最大数量。
 * @param $s
 * @return int
 */
function balancedStringSplit($s) {
    $lr = 0;
    $result = 0;
    for ($i = 0; $i < strlen($s); $i++){
        if($s[$i] == 'L'){
            $lr++;
        }else{
            $lr--;
        }
        if($lr == 0){
            $result ++;
        }
    }
    return $result;
}