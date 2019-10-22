<?php

/**
 * @Time: 2019/10/9 18:00
 * @DESC: 942.简单
 * 给定只含 "I"（增大）或 "D"（减小）的字符串 S ，令 N = S.length。
 * 返回 [0, 1, ..., N] 的任意排列 A 使得对于所有 i = 0, ..., N-1，都有：
 * 如果 S[i] == "I"，那么 A[i] < A[i+1]
 * 如果 S[i] == "D"，那么 A[i] > A[i+1]
 * @param $S
 * @return array
 */
function diStringMatch($S) {
//    $N = strlen($S);
    $I = 0;
    $D = strlen($S);
    for ($i = 0; $i < strlen($S); $i++){
        if($S[$i] == 'I'){
            $data[] = $I;
            $I ++;
        }else{
            $data[] = $D;
            $D --;
        }
    }
    $data[] = $I;
    return $data;
}