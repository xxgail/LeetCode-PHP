<?php
function nextGreaterElement($nums1, $nums2) {
    $len = count($nums1);
    $res = array_fill(0,$len,-1);
    $len2 = count($nums2);
    for ($i = 0; $i < $len; $i++) {
        for ($j = array_search($nums1[$i],$nums2); $j < $len2; $j++) {
            if ($nums2[$j] > $nums1[$i]) {
                $res[$i] = $nums2[$j];
                break;
            }
        }
    }
    return $res;
}

$nums1 = [4,1,2];
$nums2 = [1,3,4,2];
var_dump(nextGreaterElement($nums1,$nums2));