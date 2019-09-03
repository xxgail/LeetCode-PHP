<?php
/**
 * @Time: 2019/9/3 14:55
 * @DESC: 667
 * 给定两个整数 n 和 k，你需要实现一个数组，这个数组包含从 1 到 n 的 n 个不同整数，同时满足以下条件：
 * ① 如果这个数组是 [a1, a2, a3, ... , an] ，那么数组 [|a1 - a2|, |a2 - a3|, |a3 - a4|, ... , |an-1 - an|] 中应该有且仅有 k 个不同整数；.
 * ② 如果存在多种答案，你只需实现并返回其中任意一种.
 * @param $n
 * @param $k
 * @return array
 */
function constructArray($n, $k) {
    $data = [];
    if($k == 1){
        for($i = 1; $i <= $n;$i++){
            $data[] = $i;
        }
    }else{
        for($i = 0; $i <= $k; $i++){
            if($i % 2 == 0){
                $data[$i] = ($i + 2)/2;
            }else{
                $data[$i] = 1 + $k - ($i - 1)/2;
            }
        }
        for($i = $k + 1;$i < $n;$i++){
            $data[$i] = $i + 1;
        }
    }
    return $data;
}


/**
 * @Time: 2019/9/3 15:01
 * @DESC: 136
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 * @param $nums
 * @return int|string|null
 */
function singleNumber($nums) {
    $nums = array_count_values($nums);
    asort($nums); // 倒序
    reset($nums); // reset 将指针移到数组的第一个元素并返回
    $first_key = key($nums);
    return $first_key;
}

/**
 * @Time: 2019/9/3 15:03
 * @DESC: 524
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


/**
 * @Time: 2019/9/3 15:20
 * @DESC: 747
 * 在一个给定的数组nums中，总是存在一个最大元素 。
 * 查找数组中的最大元素是否至少是数组中每个其他数字的两倍。
 * 如果是，则返回最大元素的索引，否则返回-1。
 * @param $nums
 * @return int|string
 */
function dominantIndex($nums) {
    $big_num = max($nums); // 最大值
    foreach($nums as $k => $v){
        if($v != 0 && $v != $big_num && $big_num/$v < 2){
            return -1;
        }
        if($big_num == $v){
            $result = $k;
        }
    }
    return $result;
}

/**
 * @Time: 2019/9/3 16:41
 * @DESC: 1051
 * 学校在拍年度纪念照时，一般要求学生按照 非递减 的高度顺序排列。
 * 请你返回至少有多少个学生没有站在正确位置数量。
 * 该人数指的是：能让所有学生以 非递减 高度排列的必要移动人数。
 * @param $heights
 * @return int
 */
function heightChecker($heights) {
    $new_heights = $heights;
    sort($new_heights);
    $a = 0;
    for($i = 0; $i < count($heights);$i++){
        if($heights[$i] ^ $new_heights[$i]){ // 位运算
            $a += 1;
        }
    }
    return $a;
}

/**
 * @Time: 2019/9/3 17:10
 * @DESC: 151
 * 给定一个字符串，逐个翻转字符串中的每个单词。
 * @param $s
 * @return string
 */
function reverseWords($s) {
    $s_arr = explode(' ',$s);
    $new_data = [];
    foreach($s_arr as $v){
        if($v){
            $new_data[] = $v; // 去掉空格
        }
    }
    $new_data = array_reverse($new_data); // 翻转
    return implode(' ',$new_data);
}

/**
 * @Time: 2019/9/3 18:16
 * @DESC: 93
 * 给定一个只包含数字的字符串，复原它并返回所有可能的 IP 地址格式。
 * 示例:
 * 输入: "25525511135"
 * 输出: ["255.255.11.135", "255.255.111.35"]
 * @param $s
 * @return array|string
 */
function restoreIpAddresses($s) { //todo: 做不出来
    $ip = '';
    if($s < 1111 || $s>255255255255){
        return [];
    }

    $ip1 = substr($s,0,3);
    $surplus = substr($s,3);
    if($surplus > 111){

    }

//    if(strlen($s) == 12){
//        $s_arr = str_split($s,3);
//        foreach ($s_arr as $item) {
//            if($item > 255){
//                return [];
//            }
//            $ip .= $item.'.';
//        }
//    }
    return rtrim($ip,'.');
}

// 123 456 789 1
// 123 456 78 91
// 123 456 7 891
// 123 45 678 91
// 123 45 67 891
// 123 4 567 891
// 12 34 567 891
// 1 234 567 891

/**
 * @Time: 2019/9/3 23:02
 * @DESC: 781
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