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
 * @link https://leetcode-cn.com/problems/longest-word-in-dictionary-through-deleting/
 */
function findLongestWord($s, $d) {
    # 2020.04.30  双百！
    $data = [];
    for ($i = 0; $i < count($d); $i++) {
        $str = $s;
        $len = strlen($d[$i]);
        for ($j = 0; $j < $len; $j++) {
            $k = strpos($str, $d[$i][$j]);
            if ($k === false || $str == "") {
                continue 2;
            }
            $str = substr($str, $k + 1); // ！！确保顺序一致
        }
        $data[] = [
            'dict' => $d[$i],
            'len' => $len,
        ];
    }

    if ($data == []) {
        return "";
    }
    $dict = array_column($data, 'dict');
//    array_multisort($dict, SORT_ASC, $data);
    $length = array_column($data, 'len');
//    array_multisort($length, SORT_DESC, $data);
    // 写到一起的话要反过来写(๑•̀ㅂ•́)و✧
    array_multisort($length,SORT_DESC, $dict,SORT_ASC, $data);

    return $data[0]['dict'];

    # 2019.09.03
//    if(count($s) > 1000){
//        $s = sub_str($s,0,1000);
//    }
//
//    foreach($d as $k => $v){
//        $s_arr = str_split($s);
//        $is_in = 1;
//        $new_arr = str_split($v);
//        foreach($new_arr as $arrv){
//            if(in_array($arrv,$s_arr)){
//                $k = array_search($arrv,$s_arr);
//                $s_arr = array_slice($s_arr,$k+1);
//                // var_dump($s_arr);
//            }else{
//                $is_in = 0;
//            }
//        }
//        if($is_in == 1){
//            $data[] = [
//                'length' => count($new_arr),
//                'dict' => $v,
//            ];
//        }
//
//    }
//    if(count($data) == 0){
//        return "";
//    }
//    $dict = array_column($data,'dict');
//    array_multisort($dict,SORT_ASC,$data);
//    $length = array_column($data,'length');
//    array_multisort($length,SORT_DESC,$data);
//    return $data[0]['dict'];
}

$s = "aewfafwafjlwajflwajflwafj";
$d = ["apple", "ewaf", "awefawfwaf", "awef", "awefe", "ewafeffewafewf"];
var_dump(findLongestWord($s, $d));