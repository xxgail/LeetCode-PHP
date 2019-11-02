<?php
/**
 * @Time: 2019/10/24 16:48
 * @DESC: 227. 基本计算机② 中等
 * 实现一个基本的计算器来计算一个简单的字符串表达式的值。
 * 字符串表达式仅包含非负整数，+， - ，*，/ 四种运算符和空格  。 整数除法仅保留整数部分。
 * @param $s
 * @return float|int
 */
function calculate($s){
    $s = str_replace(' ','',$s);
    $s = str_replace('-','+-',$s);
    $s = explode('+',$s);
    foreach ($s as $k => $item) {
        $item = str_replace('/','*/',$item);
        $item = explode('*',$item);
        $result = $item[0];

        for ($i = 1; $i < count($item); $i++){
            if($item[$i][0] == '/'){
                $item[$i] = substr($item[$i],1);
                $result = intval($result/$item[$i]);
            }else{
                $result *= (int)$item[$i];
            }
        }
        $s[$k] = $result;
    }
    return array_sum($s);
}

##---
# 加减比较好解决，直接将减号改成加相反数即可。
# 乘除稍微做了一下处理，把除法改成乘法加