<?php
/**
 * @Time: 2019/9/11 15:37
 * @DESC: 992
 * 给定一个正整数数组 A，如果 A 的某个子数组中不同整数的个数恰好为 K，则称 A 的这个连续、不一定独立的子数组为好子数组。
 * （例如，[1,2,3,1,2] 中有 3 个不同的整数：1，2，以及 3。）
 * 返回 A 中好子数组的数目。
 *
 * 示例 1：
 * 输出：A = [1,2,1,2,3], K = 2
 * 输入：7
 * 解释：恰好由 2 个不同整数组成的子数组：[1,2], [2,1], [1,2], [2,3], [1,2,1], [2,1,2], [1,2,1,2].
 * @param $A
 * @param $K
 * @return int
 */
function subarraysWithKDistinct($A, $K) {
    # ---------- TODO：超出内存
    $res = 0;
    for ($i = 0; $i <= count($A)-$K; $i++){
        $arr = array_unique(array_slice($A,$i,$K));
        $arr_len = count($arr);
        if($arr_len == $K){
            $res++;
        }
        $end = $i + $K;
        while ($end < count($A) && $arr_len <= $K){
            if(!in_array($A[$end],$arr)){
                $arr_len++;
                array_unshift($arr,$A[$end]);
            }

            if($arr_len == $K){
                $res++;
            }
            $end++;
        }
    }
    return $res;


//    $result = 0;
//    for ($i = 0; $i <= count($A) - $K; $i++){
//        $son_class = array_slice($A, $i,$K);
//        $son_class_unique = $son_class;
//        $son_class_unique = array_unique($son_class_unique);
//        $length = count($son_class_unique);
//        $son_class_length = count($son_class);
//        if(count($son_class_unique) < $K){
//            for ($j = $i + $K;$j < count($A); $j++){
//                if($length < $K){
//                    $son_class = array_slice($A,$i,$son_class_length);
//                    if(!in_array($A[$j],$son_class)){
//                        $son_class_length ++;
//                        $length ++;
//                    }else{
//                        $son_class_length ++;
//                    }
//                }else{
//                    break 1;
//                }
//            }
//        }
//        if($length == $K){
//            $result ++;
//            for ($j = $i + $son_class_length;$j < count($A); $j++) {
//                $son_class = array_slice($A,$i,$son_class_length);
//                $son_class = array_unique($son_class);
//                if (in_array($A[$j], $son_class)) {
//                    $result ++;
//                } else {
//                    break 1;
//                }
//            }
//        }
//    }
//    return $result;
}