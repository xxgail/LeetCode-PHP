<?php
/**
 * @Time: 2019/11/27 16:30
 * @DESC: 567. 字符串的排列
 * 给定两个字符串 s1 和 s2，写一个函数来判断 s2 是否包含 s1 的排列。
 * 换句话说，第一个字符串的排列之一是第二个字符串的子串。
 * 示例1:
 * 输入: s1 = "ab" s2 = "eidbaooo"
 * 输出: True
 * 解释: s2 包含 s1 的排列之一 ("ba").
 *
 * 示例2:
 * 输入: s1= "ab" s2 = "eidboaoo"
 * 输出: False
 * @param $s1
 * @param $s2
 * @return bool
 */
function checkInclusion($s1, $s2) {
    $len = strlen($s1);
    $s1 = str_split($s1);
    sort($s1);
    $s2 = str_split($s2);
    for ($i = 0; $i < $len; $i++){
        $s = $s2;
        while ($s){
            $loca = array_search($s1[$i],$s);
            if($loca){
                $s1_like = array_slice($s,$loca,$len);
                sort($s1_like);
                if(s1 == $s1_like){
                    return true;
                }else{
                    $s = array_splice($s,$loca);
                }
            }else{
                break;
            }
        }
    }
    return false;
}