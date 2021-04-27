<?php
function disMoney($money, $num, $min, $max) {
    if ($min * $num > $money || $max * $num < $money) {
        return false;
    }
    $remain = $money - $min * $num;
    $path = array_fill(0,$num,$min);
    $res = null;
    return $res;
    $rand = rand(0,min($max - $min,$remain));
    $res[0] += $rand;
    $remain -= $rand;
    while ($remain > 0) {
        for ($i = 1; $i < $num; $i++) {
            if ($i % 2 == 0) {
                $rand = rand(0,min($max - $res[$i], $rand));
            }else {
                $rand = rand($rand, min($max - $res[$i],$max-$min));
            }
            if ($rand >= $remain) {
                $res[$i] += $remain;
                $remain = 0;
                break;
            }else {
                $remain -= $rand;
                $res[$i] += $rand;
            }
        }
    }
    var_dump(array_sum($res));
    return $res;
}

print_r(disMoney(100,15,3,10));