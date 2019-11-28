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
    $m = strlen($s1);
    $n = strlen($s2);
    if($m > $n){
        return false;
    }

    $hash1 = [];
    $hash2 = [];
    for ($i = 0; $i < $m; $i++){
        if (!isset($hash1[$s1[$i]])){
            $hash1[$s1[$i]] = 1;
        }else{
            $hash1[$s1[$i]] ++;
        }

        if(!isset($hash2[$s2[$i]])){
            $hash2[$s2[$i]] = 1;
        }else{
            $hash2[$s2[$i]]++;
        }
    }

    for ($i = $m; $i < $n; $i++){
        if (isEqual($hash1,$hash2)){
            return true;
        }else{
            $hash2[$s2[$i-$m]] --;
            if(!isset($hash2[$s2[$i]])) {
                $hash2[$s2[$i]] = 1;
            }else{
                $hash2[$s2[$i]]++;
            }
        }
    }

    return isEqual($hash1,$hash2);
}

function isEqual($hash1,$hash2){
    foreach ($hash1 as $k => $value) {
        if(!(isset($hash2[$k]) && $hash2[$k] == $value)){
            return false;
        }
    }

    return true;
}

##----
# 双哈希表+滑动窗口
# 着重看一下PHP的哈希表