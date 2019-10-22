<?php
/**
 * @Time: 2019/9/4 18:04
 * @DESC: 67. 二进制求和 简单
 * 给定两个二进制字符串，返回他们的和（用二进制表示）。
 * 输入为非空字符串且只包含数字 1 和 0。
 * @param $a
 * @param $b
 * @return string
 */
function addBinary($a, $b) {
    $len = strlen($a) - strlen($b);
    $two = 0;
    if($len > 0){
        $two = substr($a,0,$len);
        $a = substr($a,$len);
    }elseif($len < 0){
        $len = -1 * $len;
        $two = substr($b,0,$len);
        $b = substr($b,$len);
    }
//    $one_data = bindec($a) + bindec($b);
    $a = str_split($a);
    $b = str_split($b);
    $one_data = [];
    for ($i = count($a)-1; $i >= 0; $i--){
        if($a[$i] + $b[$i] < 2){
            $one_data[$i] = $a[$i] + $b[$i];
            var_dump('11'.$i.$one_data[$i]);
        }else{
            $one_data[$i] = 0;
            if($i >= 1){
                $a[$i-1] += 1;
            }
        }

    }
    ksort($one_data);
    if($one_data[0] == 0 && $two){
        array_unshift($one_data,1);
    }

    $one_str = implode('',$one_data);
    $two_str = '';
    if(count($one_data) > count($a) && $two){
        $two = str_split($two);
        for($i = count($two)-1; $i >= 0; $i--){
            if($two[$i] + 1 < 2){
                $two[$i] += 1;
                break;
            }else{
                $two[$i] = 0;
                if($i >= 1){
                    $two[$i-1] += 1;
                }

                if($two[0] == 0){
                    array_unshift($two,1);
                }
                continue;
            }
        }
        $one_str = substr($one_str,1);
        $two_str = implode('',$two);
    }
//    return $two_str;
    return $two_str.$one_str;
    $two_str = '';
    if($two){
        if(strlen($one_str) > strlen($a)){
            $one_str = substr($one_str,1);
//            return $one_str;
            $two_data = bindec($two) + 1;
            $two_str = decbin($two_data);
        }else{
            $two_str = $two;
        }
    }

    $data = $two_str.$one_str;
    return $data;
}