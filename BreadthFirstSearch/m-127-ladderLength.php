<?php
/**
 * @Time: 2019/11/3 21:52
 * @DESC: 127. 单词接龙
 * 给定两个单词（beginWord 和 endWord）和一个字典，找到从 beginWord 到 endWord 的最短转换序列的长度。
 * 转换需遵循如下规则：
 * 每次转换只能改变一个字母。
 * 转换过程中的中间单词必须是字典中的单词。
 * 说明:
 * 如果不存在这样的转换序列，返回 0。
 * 所有单词具有相同的长度。
 * 所有单词只由小写字母组成。
 * 字典中不存在重复的单词。
 * 你可以假设 beginWord 和 endWord 是非空的，且二者不相同。
 * @param $beginWord
 * @param $endWord
 * @param $wordList
 * @return int
 */
function ladderLength($beginWord, $endWord, $wordList) {
    if(!in_array($endWord,$wordList)){ # 如果字典里没有endWord就直接返回0
        return 0;
    }

    $result = 1; # 类似于树的层数，从第一层查找
    $data[] = $beginWord;
    $count = 1; # 标记本层的元素个数
    while ($data != null){
        $wordList = array_values(array_diff($wordList,$data)); # 去重
        $current_word = array_shift($data);
        $count --;
        for ($i = 0; $i < count($wordList); $i++){
            if(str_diff_count($current_word,$wordList[$i]) == 1){
                if($wordList[$i] == $endWord){ # 如果找到该元素就直接跳出while循环
                    $result ++;
                    return $result;
                }
                $data[] = $wordList[$i];
            }
        }
        if($count == 0){ # 该层循环结束之后就开始下一层
            $result ++; # 层数加一
            $count = count($data); # 本层的元素个数更新
            if($count == 0){ # 如果没有下一层元素，则直接返回0
                return 0;
            }
        }
    }
}

/**
 * @Time: 2019/11/4 14:40
 * @DESC: 比较两个长度相等的字符串，返回不一样的字符个数
 * @param $str1
 * @param $str2
 * @return int
 */
function str_diff_count($str1,$str2){
    $result = 0;
    for ($i = 0; $i < strlen($str1); $i++){
        if($str1[$i] != $str2[$i]){
            $result++;
        }
    }
    return $result;
}

var_dump(mb_strlen("aaa" ^ "aab"));


#---
# 执行结果：通过
# 执行用时 :4756 ms, 在所有 php 提交中击败了8.70%的用户
# 内存消耗 :16.1 MB, 在所有 php 提交中击败了100.00%的用户

#---
# 类似于二叉树的深层遍历