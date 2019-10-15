<?php
/**
 * String
 * ————————————————————————————————
 */


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
 * @Time: 2019/9/4 18:04
 * @DESC: 二进制求和
 * 给定两个二进制字符串，返回他们的和（用二进制表示）。
 * 输入为非空字符串且只包含数字 1 和 0。
 * @param $a
 * @param $b
 * @return string
 */
function addBinary($a, $b) { //todo: 做不出来
    $len = strlen($a) - strlen($b);
    $two = 0;
    if($len > 0){
        $two = substr($a,0,$len);
        $a = substr($a,$len);
    }elseif($len < 0){
        $len = -1 * $len;
        $two = substr($b,0,$len);
        $b = substr($b,$len);
    }
//    $one_data = bindec($a) + bindec($b);
    $a = str_split($a);
    $b = str_split($b);
    $one_data = [];
    for ($i = count($a)-1; $i >= 0; $i--){
        if($a[$i] + $b[$i] < 2){
            $one_data[$i] = $a[$i] + $b[$i];
            var_dump('11'.$i.$one_data[$i]);
        }else{
            $one_data[$i] = 0;
            if($i >= 1){
                $a[$i-1] += 1;
            }
        }

    }
    ksort($one_data);
    if($one_data[0] == 0 && $two){
        array_unshift($one_data,1);
    }

    $one_str = implode('',$one_data);
    $two_str = '';
    if(count($one_data) > count($a) && $two){
        $two = str_split($two);
        for($i = count($two)-1; $i >= 0; $i--){
            if($two[$i] + 1 < 2){
                $two[$i] += 1;
                break;
            }else{
                $two[$i] = 0;
                if($i >= 1){
                    $two[$i-1] += 1;
                }

                if($two[0] == 0){
                    array_unshift($two,1);
                }
                continue;
            }
        }
        $one_str = substr($one_str,1);
        $two_str = implode('',$two);
    }
//    return $two_str;
    return $two_str.$one_str;
    $two_str = '';
    if($two){
        if(strlen($one_str) > strlen($a)){
            $one_str = substr($one_str,1);
//            return $one_str;
            $two_data = bindec($two) + 1;
            $two_str = decbin($two_data);
        }else{
            $two_str = $two;
        }
    }

    $data = $two_str.$one_str;
    return $data;
}

/**
 * @Time: 2019/9/5 15:44
 * @DESC:
 * 实现 strStr() 函数。
 * 给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。
 * 如果不存在，则返回  -1。
 * @param $haystack
 * @param $needle
 * @return int
 */
function strStrTest($haystack, $needle) {
    if($haystack == $needle || !$needle){
        return 0;
    }
    $new_arr = explode($needle,$haystack);

    if($new_arr[0] == $haystack){
        return -1;
    }else{
        return strlen($new_arr[0]);
    }
}


/**
 * @Time: 2019/9/5 15:49
 * @DESC:
 * 编写一个函数来查找字符串数组中的最长公共前缀。
 * 如果不存在公共前缀，返回空字符串 ""。
 * @param $strs
 * @return string
 */
function longestCommonPrefix($strs) {
    $short_str = $strs[0];
    for ($i = 0; $i < count($strs); $i++){
        if(strlen($strs[$i]) < strlen($short_str)){
            $short_str = $strs[$i];
        }
    }
    for($i = 1; $i <= strlen($short_str) ; $i++){
        $per_str = substr($short_str,0,$i);
        foreach ($strs as $str) {
            if(substr($str,0,$i) != $per_str){
                return substr($per_str,0,$i - 1);
            }
        }
    }
    return $short_str;
}

/**
 * @Time: 2019/9/16 15:13
 * @DESC: 771.简单
 * 给定字符串J 代表石头中宝石的类型，和字符串 S代表你拥有的石头。 
 * S 中每个字符代表了一种你拥有的石头的类型，你想知道你拥有的石头中有多少是宝石。
 * J 中的字母不重复，J 和 S中的所有字符都是字母。
 * 字母区分大小写，因此"a"和"A"是不同类型的石头。
 * @param $J
 * @param $S
 * @return int
 */
function numJewelsInStones($J, $S) {
    $J_arr = str_split($J);
    $result = 0;
    foreach ($J_arr as $item){
        $new_S = str_replace($item,"",$S);
        $result += strlen($S) - strlen($new_S);
    }
    return $result;
}

/**
 * @Time: 2019/9/16 15:15
 * @DESC: 709. 简单
 * 将该字符串中的大写字母转换成小写字母，之后返回新的字符串。
 * @param $str
 * @return string
 */
function toLowerCase($str) {
    // 用ASCII码
    // ord 字符串转ASCII。chr ASCII转字符串
    // 大写字母65~90 小写字母 97~122 差32位
    $result = '';
    for ($i = 0; $i < strlen($str); $i++){
        $result .= ord($str[$i]) >= 65 && ord($str[$i]) <= 90 ? chr(ord($str[$i]) + 32) : $str[$i];
    }
    return $result;

//    return strtolower($str);
}

/**
 * @Time: 2019/9/16 16:39
 * @DESC: 29.中等变态而已
 * 给定两个整数，被除数 dividend 和除数 divisor。
 * 将两数相除，要求不使用乘法、除法和 mod 运算符。
 * 返回被除数 dividend 除以除数 divisor 得到的商。
 * 被除数和除数均为 32 位有符号整数。
 * 除数不为 0。
 * 假设我们的环境只能存储 32 位有符号整数，其数值范围是 [−231,  231 − 1]。
 * 本题中，如果除法结果溢出，则返回 231 − 1。
 * @param $dividend
 * @param $divisor
 * @return float|int
 */
function divide($dividend, $divisor) {
    if($dividend == 0){
        return 0;
    }

    if ($dividend < -2147483647 && $divisor == -1)
        return 2147483647;

    if($dividend > 0 && $divisor > 0 || $dividend < 0 && $divisor < 0){
        $sign = 1;
    }else{
        $sign = -1;
    }

    $dividend = abs($dividend);
    $divisor = abs($divisor);
    if($divisor == 1){
        return $dividend * $sign;
    }

    $result = 0;
    while ($dividend >= $divisor){
        $k = 1;
        $tmp = $divisor;
        #(参考评论大佬的解题思路)本题中，如果除法结果溢出，则返回$max，在子while循环条件中得以利用
        while($dividend >= $tmp+$tmp && $tmp+$tmp>0){
            $tmp += $tmp;
            $k += $k;
        }
        $result += $k;
        $dividend -= $tmp;
    }

    return $sign * $result;
}

/**
 * @Time: 2019/9/16 17:04
 * @DESC: 859.简单
 * 给定两个由小写字母构成的字符串 A 和 B ，只要我们可以通过交换 A 中的两个字母得到与 B 相等的结果，就返回 true ；否则返回 false 。
 * @param $A
 * @param $B
 * @return bool
 */
function buddyStrings($A, $B) {
    if(!$A || !$B){
        return false;
    }
    if($A == $B){
        for($i = 0; $i < strlen($A); $i++){
            if(strpos($A,$A[$i]) != $i){
                return true;
            }
        }
        return false;
    }

    $A_ = [];
    $B_ = [];
    for ($i = 0; $i < strlen($A); $i++){
        if($A[$i] == $B[$i]){
            continue;
        }else{
            $A_[] = $A[$i];
            $B_[] = $B[$i];
        }
    }
//    return $B_;
    if(count($A_) == 2 && $A_ == array_reverse($B_)){
        return true;
    }
    return false;
}

/**
 * @Time: 2019/10/10 17:04
 * @DESC:
 * 查找补数。
 * @param $num
 * @return float|int
 */
function findComplement($num) {
    return pow(2,strlen(decbin($num))) - $num - 1;
}

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

function judgeCircle($moves) {
    $LR = 0;
    $UD = 0;
    for($i = 0; $i < strlen($moves); $i++){
        switch ($moves[$i]){
            case 'L':
                $LR ++;
                break;
            case 'R':
                $LR --;
                break;
            case 'U':
                $UD ++;
                break;
            case 'D':
                $UD --;
                break;
        }
    }
    if($LR == 0 && $UD == 0){
        return true;
    }else{
        return false;
    }
}

/**
 * @Time: 2019/10/15 15:48
 * @DESC: 537. 复数乘法
 * 给定两个表示复数的字符串。
 * 返回表示它们乘积的字符串。注意，根据定义 i2 = -1 。
 * @param $a
 * @param $b
 * @return string
 */
function complexNumberMultiply($a, $b) {
    $a = explode('+',$a);
    $b = explode('+',$b);
    $a_s = $a[0];
    $a_x = rtrim($a[1],'i');
    $b_s = $b[0];
    $b_x = rtrim($b[1],'i');

    $s = $a_s * $b_s - $a_x * $b_x;
    $x = $a_s * $b_x + $a_x * $b_s;

    $result = $s.'+'.$x.'i';
    return $result;
}

/**
 * @Time: 2019/10/15 17:59
 * @DESC: 1221.分割平衡字符串。简单
 * 在一个「平衡字符串」中，'L' 和 'R' 字符的数量是相同的。
 * 给出一个平衡字符串 s，请你将它分割成尽可能多的平衡字符串。
 * 返回可以通过分割得到的平衡字符串的最大数量。
 * @param $s
 * @return int
 */
function balancedStringSplit($s) {
    $lr = 0;
    $result = 0;
    for ($i = 0; $i < strlen($s); $i++){
        if($s[$i] == 'L'){
            $lr++;
        }else{
            $lr--;
        }
        if($lr == 0){
            $result ++;
        }
    }
    return $result;
}

$data = balancedStringSplit('LLRRLRLRLR');
var_dump($data);