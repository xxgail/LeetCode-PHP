<?php
/**
 * @Time: 2020-02-20 14:23
 * @DESC: 1190. 反转每对括号间的子串 中等
 * 给出一个字符串 s（仅含有小写英文字母和括号）。
 * 请你按照从括号内到外的顺序，逐层反转每对匹配括号中的字符串，并返回最终的结果。
 * 注意，您的结果中 不应 包含任何括号。
 * 示例 1：
 * 输入：s = "(abcd)"
 * 输出："dcba"
 * 示例 2：
 * 输入：s = "(u(love)i)"
 * 输出："iloveu"
 * @param $s
 * @return mixed
 */
function reverseParentheses($s){
    $strings = [''];
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++){
        if ($s[$i] == '('){
            array_push($strings,"");
        }elseif ($s[$i] == ')'){
            $str = array_pop($strings);
            array_push($strings,array_pop($strings).strrev($str));
        }else{
            array_push($strings,array_pop($strings).$s[$i]);
        }
    }
    return $strings[0];
}


$s = "n(ev(t)((()lfevf))yd)cb()";
print_r(reverseParentheses($s));
print_r(reverseParentheses($s) == "ndyfvefltvecb");
$s1 = "(ed(et(oc))el)";
print_r(reverseParentheses($s1));
$s2 = "ta()usw((((a))))";
print_r(reverseParentheses($s2));
$s3 = "(u(love)i)";
print_r(reverseParentheses($s3));
$s4 = "kae(c(x((ffr()(t(ky)esr()oc)bl)kwx)qz)a(yovg(())dpx((w(co(tuz))zldu(nukcno(j)nohpg)g)bxp)djjbw))ho(h)";
print_r(reverseParentheses($s4) == "kaeyovgdpxpxbwtuzoczldugphonjonckungdjjbwaxxwkffrcorsekytblqzchoh");

###
# 还是用栈的思想，开始的时候想着用一个普通的栈，把正括号存进去，在遇到反括号的时候再将该正括号删除。
# 但是可能是条件写的不够准确，还是会有几个案例过不去。
# 比如遇到单独的()或者(a)的时候，应该将它加到上一个存进栈中的字符串的后面。
# 这个就比较方便了，虽然还是参考别人的想法，所以一定要记住这个解题思路。
# 解题思路是：遇到正括号时存入一个新的空字符串，将每个字符都加到栈的最后一个元素的末尾。在遇到反括号时，将最后一个元素反转，加到前一个元素的末尾。
# 就很nice(๑•̀ㅂ•́)و✧