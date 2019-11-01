<?php
/**
 * @Time: 2019/10/25 15:40
 * @DESC: 866 todo 未完成
 * 求出大于或等于 N 的最小回文素数。
 * 回顾一下，如果一个数大于 1，且其因数只有 1 和它自身，那么这个数是素数。
 * 例如，2，3，5，7，11 以及 13 是素数。
 * 回顾一下，如果一个数从左往右读与从右往左读是一样的，那么这个数是回文数。
 * 例如，12321 是回文数。
 * @param $N
 * @return false|float|int|string
 */
function primePalindrome($N) {
    if($N <= 2){
        return 2;
    }
    $a = false;

    do{
        $n = true;
        $N_str = '.'.$N.'.';
        if(strlen($N) == 8){
            $N += 9999999;
        }
        if($N_str == strrev($N_str) && $N % 2 !== 0 && strlen($N) != 8){
            var_dump($N);
            for ($i = 2; $i < $N; $i++){
                if($N % $i == 0){
                    $n = false;
                    $N ++;
                    break;
                }else{
                    continue;
                }
            }
            if($n == true){
                return $N;
            }
        }else{
            if(strlen($N) > 2){
                $half = floor(strlen($N)/2);
                if(strrev(substr($N,0,$half)) < substr($N,floor((strlen($N)+1)/2))){
                    $N += 10 * $half;
                }elseif(strrev(substr($N,0,$half)) > substr($N,floor((strlen($N)+1)/2))){
                    $N += strrev(substr($N,0,$half)) - substr($N,floor((strlen($N)+1)/2));
                }else{
                    $N++;
                }
            }else{
                $N ++;
            }
        }
    }while ($a == false);

}