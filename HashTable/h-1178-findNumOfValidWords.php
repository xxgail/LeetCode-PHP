<?php
function findNumOfValidWords($words, $puzzles) {
    $hashWords = [];
    foreach($words as $k => $word) {
        $word_arr = array_values(array_unique(str_split($word)));
        for($i = 0; $i < count($word_arr); $i++) {
            if(isset($hashWords[$word_arr[$i]])) {
                $hashWords[$word_arr[$i]][] = $word;
            }else{
                $hashWords[$word_arr[$i]] = [$word];
            }
        }
    }
    return $hashWords;
    $res = [];
    foreach($puzzles as $puzzle) {
        $pre = substr($puzzle,0,1);
        if(!isset($hashWords[$pre])) {
            $res[] = 0;
        }else {
            $res[] = setNum($hashWords[$pre], $puzzle);
        }
    }
    return $res;
}

function setNum($hashWord, $puzzle) {
    $res = 0;
    foreach($hashWord as $word) {
        if(array_diff(str_split($word), str_split($puzzle)) == []) {
            $res++;
        }
    }
    return $res;
}

$words = ["kkaz","kaaz","aazk","aaaz","abcdefghijklmnopqrstuvwxyz","kkka","kkkz","aaaa","kkkk","zzzz"];
$puzzles = ["kazxyuv"];
var_dump(findNumOfValidWords($words, $puzzles));