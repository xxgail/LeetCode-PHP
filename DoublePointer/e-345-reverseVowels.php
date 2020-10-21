<?php
/**
 * @Time: 2020/10/12
 * @DESC: 345. 反转字符串中的元音字母
 * 编写一个函数，以字符串作为输入，反转该字符串中的元音字母。
 * 示例 1：
    输入："hello"
    输出："holle"
 * 示例 2：
    输入："leetcode"
    输出："leotcede"
 * @param $s
 * @return mixed
 * @link: https://leetcode-cn.com/problems/reverse-vowels-of-a-string/
 */
function reverseVowels($s) {
    $c = strlen($s);
    for($l = 0,$r = $c-1; $l < $r; ){
        if (!in_array($s[$l],['a','e','i','o','u','A','E','I','O','U'])) {
            $l++;
        }
        if (!in_array($s[$r],['a','e','i','o','u','A','E','I','O','U'])) {
            $r--;
        }
        if (in_array($s[$l],['a','e','i','o','u','A','E','I','O','U']) && in_array($s[$r],['a','e','i','o','u','A','E','I','O','U'])) {
            list($s[$l],$s[$r]) = [$s[$r],$s[$l]];
            $l++;
            $r--;
        }
    }
    return $s;
}
$s = "leetcode";
var_dump(reverseVowels($s));