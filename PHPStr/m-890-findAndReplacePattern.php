<?php
/**
 * @Time: 2019/10/25 13:58
 * @DESC: 890. 查找和替换模式
 * 你有一个单词列表 words 和一个模式  pattern，你想知道 words 中的哪些单词与模式匹配。
 *如果存在字母的排列 p ，使得将模式中的每个字母 x 替换为 p(x) 之后，我们就得到了所需的单词，那么单词与模式是匹配的。
 * （回想一下，字母的排列是从字母到字母的双射：每个字母映射到另一个字母，没有两个字母映射到同一个字母。）
 * 返回 words 中与给定模式匹配的单词列表。
 * 你可以按任何顺序返回答案。
 *
 * 示例：
 * 输入：words = ["abc","deq","mee","aqq","dkd","ccc"], pattern = "abb"
 * 输出：["mee","aqq"]
 * 解释：
 * "mee" 与模式匹配，因为存在排列 {a -> m, b -> e, ...}。
 * "ccc" 与模式不匹配，因为 {a -> c, b -> c, ...} 不是排列。
 * 因为 a 和 b 映射到同一个字母。
 * @param $words
 * @param $pattern
 * @return array
 */
function findAndReplacePattern($words, $pattern) {
    $result = [];

    for($i = 0; $i < count($words); $i++){
        $w_p = [];
        $p_w = [];
        $w = true;
        for ($j = 0; $j < strlen($pattern); $j++){
            # 双映射，即一个值只能对应一个value，一个value只能对应一个值
            if((array_key_exists($words[$i][$j],$w_p) && $w_p[$words[$i][$j]] != $pattern[$j]) ||
                (in_array($pattern[$j],$w_p) && array_search($pattern[$j],$w_p) != $words[$i][$j]))
            {
                $w = false;
                break;
            }else{
                $w_p[$words[$i][$j]] = $pattern[$j];
            }

            ## 跟上面的一样，不过是借助了相反的对应关系来判断（多了一个数组）。
//            if(array_key_exists($words[$i][$j],$w_p) && $w_p[$words[$i][$j]] != $pattern[$j]){
//                $w = false;
//                break;
//            }else{
//                $w_p[$words[$i][$j]] = $pattern[$j];
//            }
//            if(array_key_exists($pattern[$j],$p_w) && $p_w[$pattern[$j]] != $words[$i][$j]){
//                $w = false;
//                break;
//            }else{
//                $p_w[$pattern[$j]] = $words[$i][$j];
//            }
        }
        if($w == true){
            $result[] = $words[$i];
        }
    }
    return $result;
}

##----
# 映射。其实就是key => value
# ((´-_-)-_-)-_-)