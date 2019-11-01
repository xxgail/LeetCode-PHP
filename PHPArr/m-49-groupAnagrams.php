<?php
/**
 * @Time: 2019/11/1 11:44
 * @DESC: 49.
 * 给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。
 * 示例:
 * 输入: ["eat", "tea", "tan", "ate", "nat", "bat"],
 * 输出:
 * [
 *  ["ate","eat","tea"],
 *  ["nat","tan"],
 *  ["bat"]
 * ]
 *
 * 说明：
 * 所有输入均为小写字母。
 * 不考虑答案输出的顺序。
 * @param $strs
 * @return array
 */
function groupAnagrams($strs) {
    $result = [];
    for ($i = 0; $i < count($strs); $i++){
        $s = str_split($strs[$i]);
        sort($s);
        $s = implode('',$s);
        $result[$s][] = $strs[$i];
    }

    return array_values($result);
}

##-----
# 将每个元素都正序排列
# 再筛选组成新的数组