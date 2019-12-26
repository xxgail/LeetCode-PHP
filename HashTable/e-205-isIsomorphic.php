<?php
/**
 * @Time: 2019/12/26 21:13
 * @DESC: 205. 同构字符串
 * 给定两个字符串 s 和 t，判断它们是否是同构的。
 * 如果 s 中的字符可以被替换得到 t ，那么这两个字符串是同构的。
 * 所有出现的字符都必须用另一个字符替换，同时保留字符的顺序。
 * 两个字符不能映射到同一个字符上，但字符可以映射自己本身。
 * @param $s
 * @param $t
 * @return bool
 */
function isIsomorphic($s, $t) {
    if($s == $t){
        return true;
    }
    $res1 = [];
    $res2 = [];
    for($i = 0; $i < strlen($s); $i++){
        if((isset($res1[$s[$i]]) && $res1[$s[$i]] != $t[$i]) || (isset($res2[$t[$i]]) && $res2[$t[$i]] != $s[$i])){
            return false;
        }
        $res1[$s[$i]] = $t[$i];
        $res2[$t[$i]] = $s[$i];
    }
    return true;
}


##----
# 构建双数组进行双映射的判断，不过好像太慢了