<?php
/**
 * @Time: 2019/11/4 15:10
 * @DESC: 126. 单词接龙②
 * 给定两个单词（beginWord 和 endWord）和一个字典 wordList，找出所有从 beginWord 到 endWord 的最短转换序列。
 * 转换需遵循如下规则：
 * 每次转换只能改变一个字母。
 * 转换过程中的中间单词必须是字典中的单词。
 *
 * 说明:
 * 如果不存在这样的转换序列，返回一个空列表。
 * 所有单词具有相同的长度。
 * 所有单词只由小写字母组成。
 * 字典中不存在重复的单词。
 * 你可以假设 beginWord 和 endWord 是非空的，且二者不相同。
 *
 * 示例 1:
 * 输入:
 * beginWord = "hit",
 * endWord = "cog",
 * wordList = ["hot","dot","dog","lot","log","cog"]
 * 输出:
 * [
 * ["hit","hot","dot","dog","cog"],
 * ["hit","hot","lot","log","cog"]
 * ]
 * @param $beginWord
 * @param $endWord
 * @param $wordList
 * @return array
 */
function findLadders($beginWord, $endWord, $wordList) { //todo :
    if(!in_array($endWord,$wordList)){ # 如果字典里没有endWord就直接返回0
        return [];
    }

    $result = []; # 类似于树的层数，从第一层查找
    $data[] = $beginWord;
    $count = 1; # 标记本层的元素个数
    $next_count = 0; # 标记下一层的元素个数
    $res = [
        $beginWord => [],
    ];
    while ($data != null){
        $wordList = array_values(array_diff($wordList,$data)); # 去重
        $current_word = array_shift($data);
        $count --;

        for ($i = 0; $i < count($wordList); $i++){
            if(str_diff_count1($current_word,$wordList[$i]) == 1){
                if($wordList[$i] == $endWord){ # 如果找到该元素就直接跳出while循环
                    $result ++;
                    break 2;
                }
                $data[] = $wordList[$i];
                $res[$beginWord][] = $wordList[$i];
                $next_count ++;
            }
        }
//        return reset($res);
        if($count == 0){ # 该层循环结束之后就开始下一层
            if($next_count == 0){ # 如果没有下一层元素，则直接返回0
                return 0;
                break;
            }
            $result ++; # 层数加一
            $count = $next_count; # 本层的元素个数更新
            $next_count = 0; # 下一层的元素个数置零
            $new_res = [];
            foreach (reset($res) as $k => $item) {
                $new_res[] = [
                    $item => [$k,$item]
                ];
            }
            $res = $new_res;
        }
    }
    return $result;
}

function str_diff_count1($str1,$str2){
    $result = 0;
    for ($i = 0; $i < strlen($str1); $i++){
        if($str1[$i] != $str2[$i]){
            $result++;
        }
    }
    return $result;
}