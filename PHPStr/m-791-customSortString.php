<?php
/**
 * @Time: 2019/10/21 17:12
 * @DESC: 791. 自定义字符串排序。中等
 * 字符串S和 T 只包含小写字符。在S中，所有字符只会出现一次。
 * S 已经根据某种规则进行了排序。我们要根据S中的字符顺序对T进行排序。
 * 更具体地说，如果S中x在y之前出现，那么返回的字符串中x也应出现在y之前。
 * 返回任意一种符合条件的字符串T。
 * @param $S
 * @param $T
 * @return string
 */
function customSortString($S, $T) {
    $new_T = '';
    for ($i = 0; $i < strlen($S); $i++){
        $count = substr_count($T,$S[$i]);
        if($count > 0){
            for ($j = 0; $j < $count; $j++){
                $new_T .= $S[$i];
            }
            $T = str_replace($S[$i],'',$T);
        }
    }
    $new_T .= $T;
    return $new_T;
}