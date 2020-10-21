<?php
function minimumOperations($leaves) {
    $l = strlen($leaves);
    $gMin = $g = ($leaves[0] == 'y' ? 1 : -1);
    $res = PHP_INT_MAX;
    for ($i = 1; $i < $l; $i++) {
        $isYellow = ($leaves[$i] == 'y' ? 1 : 0);
        $g += (2 * $isYellow - 1);
        if ($i != $l-1) {
            $res = min($res,$gMin-$g);
        }
        $gMin = min($gMin,$g);
    }
    return $res + ($g+$l)/2;
}

$leaves = "rrryyyrryyyrr";
var_dump(minimumOperations($leaves));