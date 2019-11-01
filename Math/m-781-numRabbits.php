<?php

/**
 * @Time: 2019/9/3 23:02
 * @DESC: 781. 森林中的兔子 中等
 * 森林中，每个兔子都有颜色。其中一些兔子（可能是全部）告诉你还有多少其他的兔子和自己有相同的颜色。
 * 我们将这些回答放在 answers 数组里。
 * 返回森林中兔子的最少数量。
 * @param $answers
 * @return float|int
 */
function numRabbits($answers) {
    $new_arr = array_count_values($answers);
    $data = 0;
    foreach ($new_arr as $k => $value){
        $data += ceil($value/($k + 1 )) * ($k + 1);
    }
    return $data;
}