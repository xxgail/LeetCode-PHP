<?php
function shipWithinDays($weights, $D) {
    $right = array_sum($weights);
    $left = max(ceil($right / $D), max($weights));
    while ($left < $right) {
        $mid = $left + floor(($right - $left) / 2);
        if (check($weights, $D, $mid)) {
            $right = $mid;
        }else {
            $left = $mid + 1;
        }
    }
    return $left;
}

function check($weights, $D, $ans) {
    $n = count($weights);
    $sum = 0;
    for ($i = 0; $i < $n; $i++) {
        $sum += $weights[$i];
        if ($sum > $ans) {
            $D--;
            $sum = $weights[$i];
        }
    }
    if ($D >= 1 && $sum <= $ans) {
        return true;
    }
    return false;
}

$weights = [1,2,3,4,5,6,7,8,9,10];
$D = 5;
var_dump(shipWithinDays($weights, $D));
$weights = [3,2,2,4,1,4];
$D = 3;
var_dump(shipWithinDays($weights, $D));
$weights = [1,2,3,1,1];
$D = 4;
var_dump(shipWithinDays($weights, $D));