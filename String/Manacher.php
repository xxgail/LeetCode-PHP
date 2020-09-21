<?php
function manacherInit($s){
    return '$#'.implode('#',str_split($s)).'#^';
}

function manacher($s){
    $s_new = manacherInit($s);
    $len = strlen($s_new);
    $max_len = -1;
    $p = array_fill(0,$len,0);
    $mx = 0;
    $id = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($i < $mx){
            $p[$i] = min($p[2 * $id - $i],$mx-1);
        } else {
            $p[$i] = 1;
        }

        while (($i-$p[$i] >= 0) && ($i+$p[$i] < $len) && $s_new[$i-$p[$i]] == $s_new[$i+$p[$i]]){
            $p[$i]++;
        }

        if ($mx < $i + $p[$i]) {
            $id = $i;
            $mx = $i + $p[$i];
        }

        $max_len = max($max_len,$p[$i]-1);
    }
    return $max_len;
}

var_dump(manacher("abbahopxpo"));