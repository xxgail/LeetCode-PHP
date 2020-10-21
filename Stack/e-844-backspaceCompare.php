<?php
function backspaceCompare($S, $T) {
    $s = $t = [];
    for ($i = 0; $i < strlen($S); $i++) {
        if ($S[$i] == '#') {
            array_pop($s);
        }else {
            array_push($s,$S[$i]);
        }
    }
    for ($j = 0; $j < strlen($T); $j++) {
        if ($T[$j] == '#') {
            array_pop($t);
        }else {
            array_push($t,$T[$j]);
        }
    }
    return $s == $t;
}

$S = "ab#c";
$T = "ad#c";
var_dump(backspaceCompare($S,$T));
$S = "ab##";
$T = "c#d#";
var_dump(backspaceCompare($S,$T));
$S = "a##c";
$T = "#a#c";
var_dump(backspaceCompare($S,$T));

$S = "a#c";
$T = "b";
var_dump(backspaceCompare($S,$T));
