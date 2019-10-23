<?php
/**
 * @Time: 2019/10/23 17:30
 * @DESC: 412. FizzBuzz
 * 写一个程序，输出从 1 到 n 数字的字符串表示。
 * 1. 如果 n 是3的倍数，输出“Fizz”；
 * 2. 如果 n 是5的倍数，输出“Buzz”；
 * 3.如果 n 同时是3和5的倍数，输出 “FizzBuzz”。
 * @param $n
 * @return array
 */
function fizzBuzz($n) {
    $result = [];
    for($i = 1; $i <= $n; $i++){
        if($i % 3 == 0 && $i % 5 == 0){
            $result[] = 'FizzBuzz';
            continue;
        }
        if($i % 3 == 0){
            $result[] = 'Fizz';
        }elseif($i % 5 == 0){
            $result[] = 'Buzz';
        }else{
            $result[] = ''.$i.'';
        }
    }
    return $result;
}