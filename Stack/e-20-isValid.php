<?php
/**
 * @Time: 2020/2/10
 * @DESC: 20. 有效的括号 简单
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
 * 有效字符串需满足：
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 * 注意空字符串可被认为是有效字符串。
 * @param $s
 * @return bool
 * @link https://leetcode-cn.com/problems/valid-parentheses/
 */
function isValid($s){
    $len = strlen($s);
    $stack = new SplStack();
    for ($i = 0; $i < $len; $i++){
        switch ($s[$i]){
            case '(':
            case '[':
            case "{":
                $stack->push($s[$i]);
                break;
            case ')':
                if ($stack->isEmpty() || $stack->pop() != '('){
                    return false;
                }
                break;
            case ']':
                if ($stack->isEmpty() || $stack->pop() != '['){
                    return false;
                }
                break;
            case '}':
                if ($stack->isEmpty() || $stack->pop() != '{'){
                    return false;
                }
                break;
        }
    }
    return $stack->isEmpty();
//    $len = strlen($s);
//    $arr = [];
//    for ($i = 0; $i < $len; $i++){
//        if (in_array($s[$i],['}',']',')']) && $arr == []){
//            return false;
//        }
//        if (in_array($s[$i],['{','[','('])){
//            array_push($arr,$s[$i]);
//        }elseif ($s[$i] == '}'){
//            if (array_pop($arr) != "{"){
//                return false;
//            }
//        }elseif ($s[$i] == ']'){
//            if (array_pop($arr) != "[") {
//                return false;
//            }
//        }else{
//            if (array_pop($arr) != "("){
//                return false;
//            }
//        }
//    }
//    if($arr == []){
//        return true;
//    }else{
//        return false;
//    }
}

$s = '()';
var_dump(isValid($s));

### ---
# 有效的括号是指分割完字符串之后必须是"对称"的。我是这么理解的
# 所以用栈就比较方便，先入后出。（不愧是我！