<?php
/**
 * @Time: 2019/9/3 15:03
 * @DESC: 524. 通过删除字母匹配到字典里最长单词 中等
 * 给定一个字符串和一个字符串字典，找到字典里面最长的字符串，该字符串可以通过删除给定字符串的某些字符来得到。
 * 如果答案不止一个，返回长度最长且字典顺序最小的字符串。
 * 如果答案不存在，则返回空字符串。
 * @param $s
 * @param $d
 * @return mixed|string
 */
function findLongestWord($s, $d) { // todo: 寻找最佳思路
    $data = [];
    foreach($d as $k => $v){
        $s_arr = str_split($s);
        $is_in = 1;
        $v_arr = str_split($v);
        foreach($v_arr as $v_str){
            if(in_array($v_str,$s_arr)){
                $k = array_search($v_str,$s_arr);
                $s_arr = array_slice($s_arr,$k+1); // 分割
                // var_dump($s_arr);
            }else{
                $is_in = 0;
            }
        }
        if($is_in == 1){
            $data[] = [
                'length' => count($v_arr),
                'dict' => $v,
            ];
        }

    }
    if(count($data) == 0){
        return "";
    }
    // 字典最小
    array_multisort(array_column($data,'dict'),SORT_ASC,$data);
    // 长度最长的一个
    array_multisort(array_column($data,'length'),SORT_DESC,$data);
    return $data[0]['dict'];
}