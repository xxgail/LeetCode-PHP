<?php
/**
 * @Time: 2021/2/2
 * @DESC: 424. 替换后的最长重复字符
 * 给你一个仅由大写英文字母组成的字符串，你可以将任意位置上的字符替换成另外的字符，总共可最多替换 k 次。在执行上述操作后，找到包含重复字母的最长子串的长度。
 * 注意：字符串长度 和 k 不会超过 104。
 * 示例 1：
    输入：s = "ABAB", k = 2
    输出：4
    解释：用两个'A'替换为两个'B',反之亦然。
 * @param $s
 * @param $k
 * @return int
 * @link: https://leetcode-cn.com/problems/longest-repeating-character-replacement/
 */
function characterReplacement($s, $k) {
    $hash = [];
    $s = str_split($s);
    $maxLen = $left = 0;
    foreach ($s as $right => $item) {
        $hash[$item] = ($hash[$item] ?? 0) + 1;
        $maxLen = max($maxLen, $hash[$item]);
        if ($right - $left + 1 - $maxLen > $k) {
            $hash[$s[$left]]--;
            $left++;
        }
    }
    return count($s) - $left;
}