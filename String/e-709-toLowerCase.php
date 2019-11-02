<?php
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