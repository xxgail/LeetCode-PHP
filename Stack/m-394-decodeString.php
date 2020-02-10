<?php
/**
 * @Time: 2020/2/10 14:44
 * @DESC: 394. 字符串解码 中等
 * 给定一个经过编码的字符串，返回它解码后的字符串。
 * 编码规则为: k[encoded_string]，表示其中方括号内部的 encoded_string 正好重复 k 次。注意 k 保证为正整数。
 * 你可以认为输入字符串总是有效的；输入字符串中没有额外的空格，且输入的方括号总是符合格式要求的。
 * 此外，你可以认为原始数据不包含数字，所有的数字只表示重复的次数 k ，例如不会出现像 3a 或 2[4] 的输入。
 * 示例:
 * s = "3[a]2[bc]", 返回 "aaabcbc".
 * s = "3[a2[c]]", 返回 "accaccacc".
 * @param $s
 * @return string
 */
function decodeString($s) {

    $len = strlen($s);
    $num = 0;
    $str = "";
    # --------------------- 利用PHP的数组作为栈
//    $numbers = [];
//    $strings = [];
//    for ($i = 0; $i < $len; $i++){
//        $n = ord($s[$i]);
//        if ($n >= 48 && $n <= 57){ # 数字
//            $num = $num * 10 + $s[$i];
//        }elseif (($n >= 97 && $n <= 122) ||($n >= 65 && $n <= 90)){
//            $str .= $s[$i];
//        }elseif ($n == 91){
//            array_push($numbers,$num);
//            $num = 0;
//            array_push($strings,$str);
//            $str = "";
//        }else{
//            $times = array_pop($numbers);
//            $str = array_pop($strings).str_repeat($str,$times);
//        }
//
//    }
//    return $str;

    # ----------------------- 借助SplStack类来实现
    # SplStack类：通过使用一个双向链表来提供栈的主要功能
    $numbers = new SplStack();
    $strings = new SplStack();
    for ($i = 0; $i < $len; $i++){
        $n = ord($s[$i]);
        if ($n >= 48 && $n <= 57){ # 数字
            $num = $num * 10 + $s[$i];
        }elseif (($n >= 97 && $n <= 122) ||($n >= 65 && $n <= 90)){
            $str .= $s[$i];
        }elseif ($n == 91){
            $numbers->push($num);
            $num = 0;
            $strings->push($str);
            $str = "";
        }else{
            $times = $numbers->pop();
            $str = $strings->pop().str_repeat($str,$times);
            # str_repeat 重复一个字符串
        }

    }
    return $str;
}


$s = "2[abc]3[cd]ef";
print_r(decodeString($s));
###
# ASCII码
# [ 91
# ] 93
# 0~9 48~57
# a~z 97~122
# A~Z 65~90
# 主要考查对栈的应用：先入后出
#入栈    出栈
#   \   ⬆️
#   ⬇️  /
# |-------| 栈顶
# |-------|
# |_______| 栈底
