<?php
/**
 * @Time: 2020/02/20 21:23
 * @DESC: 402. 移掉K位数字
 * 给定一个以字符串表示的非负整数 num，移除这个数中的 k 位数字，使得剩下的数字最小。
 * 注意:
 * num 的长度小于 10002 且 ≥ k。
 * num 不会包含任何前导零。
 * @param $num
 * @param $k
 * @return int
 */
function removeKdigits($num,$k){
    $nums = str_split($num);

    $res = [];
    for ($i = 0; $i < count($nums); $i++){
        while ($k > 0 && $res != [] && $res[count($res)-1] > $nums[$i]) {
            array_pop($res);
            $k--;
        }
        $res[] = $nums[$i];
    }

    array_splice($res,count($res) - $k,$k);

    while (isset($res[0]) && $res[0] == 0){
        array_shift($res);
    }
    if ($res == []){
        return "0";
    }
    $res = implode('',$res);

    return $res;
}

var_dump(removeKdigits("10",1));