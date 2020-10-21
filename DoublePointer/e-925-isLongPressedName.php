<?php
/**
 * @Time: 2020/10/21
 * @DESC: 925. 长按键入
 * 你的朋友正在使用键盘输入他的名字 name
 * 偶尔，在键入字符 c 时，按键可能会被长按，而字符可能被输入 1 次或多次。
 * 你将会检查键盘输入的字符 typed
 * 如果它对应的可能是你的朋友的名字（其中一些字符可能被长按），那么就返回 True
 * @param $name
 * @param $typed
 * @return bool
 * @link: https://leetcode-cn.com/problems/long-pressed-name/
 */
function isLongPressedName($name, $typed) {
    $len = strlen($typed);
    $i = $j = 0;
    while ($j < $len) {
        if ($name[$i] == $typed[$j]) {
            $i++;
            $j++;
        }else if ($j > 0 && $typed[$j] == $typed[$j-1]) {
            $j++;
        }else {
            return false;
        }
    }
    return $i == len($name)-1;
}