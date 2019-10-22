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

/**
 * @Time: 2019/9/9 22:37
 * @DESC: 390
 * 给定一个从1 到 n 排序的整数列表。
 * 首先，从左到右，从第一个数字开始，每隔一个数字进行删除，直到列表的末尾。
 * 第二步，在剩下的数字中，从右到左，从倒数第一个数字开始，每隔一个数字进行删除，直到列表开头。
 * 我们不断重复这两步，从左到右和从右到左交替进行，直到只剩下一个数字。
 * 返回长度为 n 的列表中，最后剩下的数字。
 * @param $n
 * @return mixed
 */
function lastRemaining($n) {
    # ---- 找规律，用递归来解决，但是不知道为什么显示超出内存
    # 来源：https://blog.csdn.net/afei__/article/details/83689502
    return $n == 1 ? 1 : 2 * ($n/2 + 1 - lastRemaining($n/2));
    #---- 这是生成数组然后遍历的解法，但是如果$n的值太大会报溢出内存的错误。
    $n = range(1,$n);
    while (count($n) > 1){
        $data = [];
        for ($i = 0; $i < count($n); $i++){
            if($i % 2 != 0){
                $data[] = $n[$i];
            }
        }
        $n = array_reverse($data);
    }
    return $n[0];
}


/**
 * @Time: 2019/9/11 13:47
 * @DESC: 46
 * 给定一个没有重复数字的序列，返回其所有可能的全排列。
 * @param $nums
 * @return array
 */
function permute($nums){
    $result = [];
    permuteFunc($nums,[],$result);
    return $result;
}

function permuteFunc($nums,$data,&$result) {
    if(count($nums) == count($data)){
        array_push($result,$data);
        return $result;
    }
    for ($i = 0; $i < count($nums); $i++){
        if(in_array($nums[$i],$data)){
            continue;
        }

        array_push($data,$nums[$i]);
        permuteFunc($nums,$data,$result);
        array_pop($data);
    }
}

/**
 * @Time: 2019/9/10 16:33
 * @DESC: 47
 * 给定一个可包含重复数字的序列，返回所有不重复的全排列。
 * @param $nums
 * @return array
 */
function permuteUnique($nums){
    if(empty($nums)){
        return [];
    }
    $res = [];
    permuteUniqueFunc($nums,0,[],$res);
    return $res;
}

function permuteUniqueFunc($nums,$index,$current,&$res)
{
    $len = count($nums);
    if($index >= $len && !in_array($current,$res)){
        $res[] = $current;
        return;
    }
    for($i = $index;$i < $len;$i++){
        $current[$index] = $nums[$i];
        [$nums[$i],$nums[$index]] = [$nums[$index],$nums[$i]];
        permuteUniqueFunc($nums,$index+1,$current,$res);
    }
}


/**
 * @Time: 2019/9/11 15:37
 * @DESC: 992
 * 给定一个正整数数组 A，如果 A 的某个子数组中不同整数的个数恰好为 K，则称 A 的这个连续、不一定独立的子数组为好子数组。
 * （例如，[1,2,3,1,2] 中有 3 个不同的整数：1，2，以及 3。）
 * 返回 A 中好子数组的数目。
 *
 * 示例 1：
 * 输出：A = [1,2,1,2,3], K = 2
 * 输入：7
 * 解释：恰好由 2 个不同整数组成的子数组：[1,2], [2,1], [1,2], [2,3], [1,2,1], [2,1,2], [1,2,1,2].
 * @param $A
 * @param $K
 * @return int
 */
function subarraysWithKDistinct($A, $K) {

    # ---------- TODO：超出内存
    $result = 0;
    for ($i = 0; $i <= count($A) - $K; $i++){
        $son_class = array_slice($A, $i,$K);
        $son_class_unique = $son_class;
        $son_class_unique = array_unique($son_class_unique);
        $length = count($son_class_unique);
        $son_class_length = count($son_class);
        if(count($son_class_unique) < $K){
            for ($j = $i + $K;$j < count($A); $j++){
                if($length < $K){
                    $son_class = array_slice($A,$i,$son_class_length);
                    if(!in_array($A[$j],$son_class)){
                        $son_class_length ++;
                        $length ++;
                    }else{
                        $son_class_length ++;
                    }
                }else{
                    break 1;
                }
            }
        }
        if($length == $K){
            $result ++;
            for ($j = $i + $son_class_length;$j < count($A); $j++) {
                $son_class = array_slice($A,$i,$son_class_length);
                $son_class = array_unique($son_class);
                if (in_array($A[$j], $son_class)) {
                    $result ++;
                } else {
                    break 1;
                }
            }
        }
    }
    return $result;
}

/**
 * @Time: 2019/9/14 22:04
 * @DESC: 217
 * 给定一个整数数组，判断是否存在重复元素。
 * 如果任何值在数组中出现至少两次，函数返回 true。
 * 如果数组中每个元素都不相同，则返回 false。
 * @param $nums
 * @return bool
 */
function containsDuplicate($nums) {
    for ($i = 0; $i < count($nums); $i++){
        if(array_search($nums[$i],$nums) != $i){
            return true;
        }
    }
    return false;
}

/**
 * @Time: 2019/9/14 22:44
 * @DESC: 387
 * 给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。
 * @param $s
 * @return int|string
 */
function firstUniqChar($s) {
    if($s){
        $s_arr = str_split($s);
        foreach ($s_arr as $k => $v){
            if(strpos($s,$v) == strrpos($s,$v)){
                return $k;
            }
        }
    }
    return -1;
}

/**
 * @Time: 2019/9/16 15:36
 * @DESC: 832.简单
 * 给定一个二进制矩阵 A，我们想先水平翻转图像，然后反转图像并返回结果。
 * 水平翻转图片就是将图片的每一行都进行翻转，即逆序。例如，水平翻转 [1, 1, 0] 的结果是 [0, 1, 1]。
 * 反转图片的意思是图片中的 0 全部被 1 替换， 1 全部被 0 替换。例如，反转 [0, 1, 1] 的结果是 [1, 0, 0]。
 * @param $A
 * @return mixed
 */
function flipAndInvertImage($A) {
    for($i = 0; $i < count($A); $i++){
        $A[$i] = array_reverse($A[$i]);
        for($j = 0; $j < count($A[$i]); $j++){
            if($A[$i][$j] == 0){
                $A[$i][$j] = 1;
            }else{
                $A[$i][$j] = 0;
            }
        }
    }
    return $A;
}

//$A = [
//    [0,0,1],
//    [1,1,0]
//];
//$data = flipAndInvertImage($A);
//var_dump($data);

/**
 * @Time: 2019/10/8 21:11
 * @DESC: 5079.简单
 * 给出三个均为 严格递增排列 的整数数组 arr1，arr2 和 arr3。
 * 返回一个由 仅 在这三个数组中 同时出现 的整数所构成的有序数组。
 * @param $arr1
 * @param $arr2
 * @param $arr3
 * @return array
 */
function arraysIntersection($arr1, $arr2, $arr3) {
    $array = array_intersect($arr1,$arr2,$arr3); // (ー△ー；) 感觉这个解法有点太简单了emm
    return $array;
}

/**
 * @Time: 2019/10/9 11:42
 * @DESC: 804.简单
 * 国际摩尔斯密码定义一种标准编码方式，将每个字母对应于一个由一系列点和短线组成的字符串， 比如: "a" 对应 ".-", "b" 对应 "-...", "c" 对应 "-.-.", 等等。
 * 为了方便，所有26个英文字母对应摩尔斯密码表如下：
 * [".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."。
 * 给定一个单词列表，每个单词可以写成每个字母对应摩尔斯密码的组合。
 * 例如，"cab" 可以写成 "-.-..--..."，(即 "-.-." + "-..." + ".-"字符串的结合)。
 * 我们将这样一个连接过程称作单词翻译。
 * 返回我们可以获得所有词不同单词翻译的数量。
 * @param $words
 * @return int
 */
function uniqueMorseRepresentations($words) {
    $dict = [".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."];
    $new_data = [];
    foreach ($words as $word) {
        $new_word = '';
        for ($i = 0; $i < strlen($word); $i++){
            $new_word .= $dict[ord($word[$i])-97]; # ord 转换为ASCII码
        }
        $new_data[] = $new_word;
    }
    $new_data = array_unique($new_data);
    return count($new_data);
}

/**
 * @Time: 2019/10/9 13:27
 * @DESC: 461. 简单
 * 两个整数之间的汉明距离指的是这两个数字对应二进制位不同的位置的数目。
 * 给出两个整数 x 和 y，计算它们之间的汉明距离。
 * @param $x
 * @param $y
 * @return int
 */
function hammingDistance($x, $y) {
    $a = decbin($x ^ $y);
    $result = 0;
    for ($i = 0; $i < strlen($a); $i++){
        if($a[$i] == 1){
            $result ++;
        }
    }
    return $result;
}

/**
 * @Time: 2019/10/9 18:00
 * @DESC: 942.简单
 * 给定只含 "I"（增大）或 "D"（减小）的字符串 S ，令 N = S.length。
 * 返回 [0, 1, ..., N] 的任意排列 A 使得对于所有 i = 0, ..., N-1，都有：
 * 如果 S[i] == "I"，那么 A[i] < A[i+1]
 * 如果 S[i] == "D"，那么 A[i] > A[i+1]
 * @param $S
 * @return array
 */
function diStringMatch($S) {
//    $N = strlen($S);
    $I = 0;
    $D = strlen($S);
    for ($i = 0; $i < strlen($S); $i++){
        if($S[$i] == 'I'){
            $data[] = $I;
            $I ++;
        }else{
            $data[] = $D;
            $D --;
        }
    }
    $data[] = $I;
    return $data;
}

/**
 * @Time: 2019/10/10 14:14
 * @DESC: 728. 简单
 * 自除数 是指可以被它包含的每一位数除尽的数。
 * 例如，128 是一个自除数，因为 128 % 1 == 0，128 % 2 == 0，128 % 8 == 0。
 * 还有，自除数不允许包含 0 。
 * 给定上边界和下边界数字，输出一个列表，列表的元素是边界（含边界）内所有的自除数。
 * @param $left
 * @param $right
 * @return array
 */
function selfDividingNumbers($left, $right) {
    $data = [];
    for ($i = $left; $i <= $right; $i++){
        $i_str = (string)$i;
        for ($j = 0; $j < strlen($i_str); $j++){
            if($i_str[$j] == 0 || $i % $i_str[$j] != 0){
                continue 2;
            }
        }
        $data[] = $i;
    }
    return $data;
}

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

/**
 * @Time: 2019/10/11 18:01
 * @DESC: 78. 中等
 * 给定一组不含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 * 说明：解集不能包含重复的子集。
 *
 * 类似于全排列。
 * 用到的也是回溯法
 * @param $nums
 * @return array
 */
function subsets($nums) {
    $current=[];
    $res=[];
    subsetsFunc($nums,0,$current,$res);
    return $res;
}

function subsetsFunc($nums,$index,&$current,&$res)
{
    $res[] = $current;
    for($i=$index;$i<count($nums);$i++){ #
        $current[] = $nums[$i];
        subsetsFunc($nums,$i+1,$current,$res);
        array_pop($current);
    }
}

/**
 * @Time: 2019/10/15 11:48
 * @DESC: 260.
 * 给定一个整数数组 nums，其中恰好有两个元素只出现一次，其余所有元素均出现两次。 找出只出现一次的那两个元素。
 * @param $nums
 * @return array
 */
function singleNumberTwo($nums) {
    $data = [];
    $nums = array_count_values($nums);
    foreach ($nums as $k => $num) {
        if($num == 1){
            $data[] = $k;
        }
    }
    return $data;
}

/**
 * @Time: 2019/10/17 11:40
 * @DESC: 287. 寻找重复数
 * 给定一个包含 n + 1 个整数的数组 nums，其数字都在 1 到 n 之间（包括 1 和 n），可知至少存在一个重复的整数。假设只有一个重复的整数，找出这个重复的数。
 * @param $nums
 * @return mixed
 */
function findDuplicate($nums) {
    // 不能改变原数组的值
    sort($nums);
    for ($i = 0; $i < count($nums) - 1; $i++){
        if($nums[$i] == $nums[$i+1]){
            return $nums[$i];
        }
    }
}

/**
 * @Time: 2019/10/19 22:32
 * @DESC: 15. 三数之和。 中等
 * 给定一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？找出所有满足条件且不重复的三元组。
 * 注意：答案中不可以包含重复的三元组。
 * @param $nums
 * @return array
 */
function threeSum($nums) {
    $result = [];
    sort($nums);
    for($i = 0; $i < count($nums); $i++){
        if($i > 0 && $nums[$i] == $nums[$i-1] && $i < count($nums) - 1){
            continue;// 去重
        }

        // 双指针
        $left = $i + 1;
        $right = count($nums) - 1;
        do{
            if($left >= $right){
                break;
            }
            $sum = $nums[$i] + $nums[$left] + $nums[$right];
            if($sum == 0){
                $result[] = [$nums[$i], $nums[$left], $nums[$right]];
            }

            if($sum <= 0){
                while($nums[$left + 1] == $nums[$left] && $left < $right){
                    $left ++;// 去重
                }
                $left ++;
            }else{
                while($nums[$right - 1] == $nums[$right] && $left < $right){
                    $right --;// 去重
                }
                $right --;
            }
        }while($left < $right);
    }
    return $result;
}

$s1 = [5,1,-4,-10,9,-1,-4,-5,-8,3,1,4,2,-8,-4,3,-4,-5,1,7,8,6,2,8];
$s2 = [0,-4,1,-5];
//$data = threeSumClosest($s2,0);
//print_r($data);
//$da = twoSum1($s2,5);
//var_dump($da);


/**
 * @Time: 2019/10/19 22:33
 * @DESC: 1. 两数之和。简单
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那两个整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * @param $nums
 * @param $target
 * @return array
 */
function twoSum1($nums, $target) {
    $new_nums = [];
    foreach($nums as $num){
        $new_nums[] = $target - $num;
    }

    for($i = 0; $i < count($nums); $i++){
        $site = array_search($nums[$i],$new_nums);
        if($site !== false && $site != $i){
            return [$i,$site];
        }
    }
}

/**
 * @Time: 2019/10/21 21:23
 * @DESC: 16. 最接近的三数之和 中等。
 * 给定一个包括 n 个整数的数组 nums 和 一个目标值 target。找出 nums 中的三个整数，使得它们的和与 target 最接近。返回这三个数的和。假定每组输入只存在唯一答案。
 * 类似于第15题
 * @param $nums
 * @param $target
 * @return mixed
 */
function threeSumClosest($nums, $target) {
    sort($nums);
//    $result = [];
    $sum = $nums[0] + $nums[1] + $nums[2];
    $result = $sum;
    $min = $sum > $target ? $sum - $target : $target - $sum;
    for ($i = 0; $i < count($nums); $i++){
        if($i > 0 && $nums[$i] == $nums[$i-1] && $i < count($nums) - 1){
            continue;// 去重
        }

        $left = $i + 1;
        $right = count($nums) - 1;

        do{
            if($left >= $right){
                break;
            }
            $sum = $nums[$i] + $nums[$left] + $nums[$right];
            $diff = $sum > $target ? $sum - $target : $target - $sum;
            if($diff < $min){
                $min = $diff;
                $result = $sum;
            }

            if($sum < $target){
                while($nums[$left + 1] == $nums[$left] && $left < $right){
                    $left ++;// 去重
                }
                $left ++;
            }else{
                while($nums[$right - 1] == $nums[$right] && $left < $right){
                    $right --;// 去重
                }
                $right --;
            }
        }while ($left < $right);
    }
    return $result;
}

/**
 * @Time: 2019/10/22 13:23
 * @DESC: 6. Z 字形变换
 * 将一个给定字符串根据给定的行数，以从上往下、从左到右进行 Z 字形排列。
 * 比如输入字符串为 "LEETCODEISHIRING" 行数为 3 时，排列如下：
 * L   C   I   R
 * E T O E S I I G
 * E   D   H   N
 * 之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："LCIRETOESIIGEDHN"。
 * 请你实现这个将字符串进行指定行数变换的函数：
 * string convert(string s, int numRows);
 * @param $s
 * @param $numRows
 * @return string
 */
function convert($s, $numRows) {
    $str_length = strlen($s);
    if($str_length <= $numRows || $numRows == 1){
        return $s;
    }
    $result = [];
    $row = 0; // 行号
    $column = 0; // 列号
    for ($i = 0; $i < $str_length;){
        if($column%($numRows-1) == 0 || ($column + $row) % ($numRows - 1) == 0){
            $result[$row][$column] = $s[$i];
            $i ++;
        }
        $row ++;
        if($row == $numRows){ // 达到最大行数，开始新的一列。
            $column ++;
            $row = 0;
        }
    }
    // result 为生成的二维数组
    $new_s = '';
    foreach ($result as $item) {
        $new_s .= implode('',$item);
    }
    return $new_s;
}

$string = 'ABCDEFGHIGKLMN';
$line = 6;
$data = convert($string,$line);
print_r($data);