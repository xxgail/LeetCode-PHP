<?php
/**
 * @Time: 2019/10/10 17:04
 * @DESC: 1002. 简单
 * 给定仅有小写字母组成的字符串数组 A，返回列表中的每个字符串中都显示的全部字符（包括重复字符）组成的列表。
 * @param $A
 * @return array
 */
function commonChars($A) {
    $data = [];
    for ($j = 0; $j < strlen($A[0]); $j++){
        for($i = 1; $i < count($A); $i++){
            if(strpos($A[$i],$A[0][$j]) === false){
                continue 2;
            }else{
                $location = strpos($A[$i],$A[0][$j]); # 查找位置
                $A[$i] = substr_replace($A[$i],"",$location,1); # 删除
            }
        }
        $data[] = $A[0][$j];
    }
    return $data;
}