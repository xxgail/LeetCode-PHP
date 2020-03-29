<?php
# https://leetcode-cn.com/problems/find-all-good-strings/
# TODO 没做
function findGoodStrings($n, $s1, $s2, $evil){
    if (strpos($s1,$evil) === 0 && strpos($s2,$evil) === 0){
        return 0;
    }
    if ($s2 < $s1){
        return 0;
    }
}