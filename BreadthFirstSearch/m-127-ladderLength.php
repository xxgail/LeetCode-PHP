<?php
/**
 * @Time: 2019/11/3 21:52
 * @DESC:
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
function ladderLength($beginWord, $endWord, $wordList) {//todo
    if(!in_array($endWord,$wordList)){
        return 0;
    }
}