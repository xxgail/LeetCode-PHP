<?php
/**
 * @Time: 2019/10/10 23:37
 * @DESC: 386. 中等
 * 给定一个整数 n, 返回从 1 到 n 的字典顺序。
 * 例如，
 * 给定 n =13，返回 [1,10,11,12,13,2,3,4,5,6,7,8,9] 。
 * @param $n
 * @return array
 */
function lexicalOrder($n) {
    $data = [];
    for ($i = 1; $i <= $n; $i++){
        $data[] = '.'.$i.'.';
    }
    sort($data);

    foreach ($data as $k => $val) {
        $data[$k] = (int)trim($val,'.');
    }
    return $data;
}