<?php
/**
 * @Time: 2020/10/29
 * @DESC: 5. 最长回文子串
 * 给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。
 * 示例 1：
    输入: "babad"
    输出: "bab"
    注意: "aba" 也是一个有效答案。
 * 示例 2：
    输入: "cbbd"
    输出: "bb"
 * @param $s
 * @return string
 * @link: https://leetcode-cn.com/problems/longest-palindromic-substring/
 */
function longestPalindrome($s) {
    $max = 0;
    $maxStr = $s[0];
    $s_ = '^'.implode('#',str_split($s)).'$';
    for ($i = 1; $i < strlen($s_); $i++) {
        $res = longestPalindromeLen($s_,$i);
        if ($res['len'] > $max) {
            $max = $res['len'];
            $maxStr = $res['str'];
        }
    }
    return $maxStr;
}

function longestPalindromeLen($s, $i) {
    $res = [
        'len' => $s[$i] == '#' ? 0 : 1,
        'str' => $s[$i] == '#' ? '' : $s[$i],
    ];
    $l = $i-1;
    $r = $i+1;
    while ($l > 0 && $r < strlen($s)) {
        if ($s[$l] == $s[$r]) {
            if ($s[$l] != '#') {
                $res['len'] += 2;
                $res['str'] = $s[$l].$res['str'].$s[$r];
            }
            $l--;
            $r++;
        }else {
            break;
        }
    }
    return $res;
}
$s = "bb";
var_dump(longestPalindrome($s));