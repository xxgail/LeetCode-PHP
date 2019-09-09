<?php
/**
 * Array
 * ————————————————————————————————
 */


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

/**
 * @Time: 2019/9/4 10:36
 * @DESC:
 * 给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 * 你可以假设除了整数 0 之外，这个整数不会以零开头
 * @param $digits
 * @return string
 */
function plusOne($digits) {
    for ($i = count($digits)-1; $i >= 0; $i--){
//        if($digits[$i] + 1 > 9){
//            $digits[$i] = 0;
//            continue;
//        }else{
//            $digits[$i] += 1;
//            break;
//        }

        $digits[$i] += 1;
        if($digits[$i] < 10){
            break;
        }else{
            $digits[$i] = 0;
            continue;
        }
    }

    if($digits[0] == 0){
        array_unshift($digits,1);
    }
    return $digits;
}

/**
 * @Time: 2019/9/5 18:30
 * @DESC:
 * 给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。
 * 函数应该返回这两个下标值 index1 和 index2，其中 index1 必须小于 index2。
 * 说明:
 * 返回的下标值（index1 和 index2）不是从零开始的。
 * 你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
 * @param $numbers
 * @param $target
 * @return array
 */
function twoSum($numbers, $target) {
    for($i = 0; $i < count($numbers); $i++){
        if($i > 0){
            if($numbers[$i] == $numbers[$i-1]){
                continue; // continue 是指跳出本次for循环。break是指结束本地for循环
            }
        }

        $surplus = $target - $numbers[$i];
        if($surplus >= 0){
            for ($j = $i+1; $j < count($numbers); $j++){
                if($numbers[$j] == $surplus){
                    return [$i+1,$j+1];
                }
            }
        }else{
            break;
        }
    }
    return [];
}

/**
 * @Time: 2019/9/6 11:54
 * @DESC: 350
 * 给定两个数组，编写一个函数来计算它们的交集。
 * 说明：
 * 输出结果中每个元素出现的次数，应与元素在两个数组中出现的次数一致。
 * 我们可以不考虑输出结果的顺序
 * @param $nums1
 * @param $nums2
 * @return array
 */
function intersect($nums1, $nums2) {
    $result = [];
    if(count($nums1) == 0){
        return $result;
    }
    for ($i = 0; $i < count($nums1); $i++){
        if(count($nums2) == 0){
            break;
        }
        if(in_array($nums1[$i],$nums2)){
            $result[] = $nums1[$i];
            unset($nums2[array_search($nums1[$i],$nums2)]);
//            $nums2 = array_diff($nums2,[$nums1[$i]]);
            var_dump($nums2);
        }
    }
    return $result;
}
