<?php
function maxSatisfied($customers, $grumpy, $X) {
    $len = count($grumpy);
    if ($len == $X) {
        return array_sum($customers);
    }
    $left = 0;
    $right = $left + $X - 1;
    $maxProfit = 0;
    for($i = 0; $i < $len; $i++) {
        $maxProfit += ($grumpy[$i] == 0 ? $customers[$i] : 0);
    }
    $base = $maxProfit;
    while ($right < $len) {
        $current = $base;
        for ($i = $left; $i <= $right; $i++) {
            $current += $grumpy[$i] == 1 ? $customers[$i] : 0;
        }
        $maxProfit = max($maxProfit, $current);
        $left++;
        $right++;
    }
    return $maxProfit;
}

$customers = [1,0,1,2,1,1,7,5];
$grumpy = [0,1,0,1,0,1,0,1];
$X = 3;
var_dump(maxSatisfied($customers, $grumpy, $X));