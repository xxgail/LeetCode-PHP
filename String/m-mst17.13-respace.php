<?php
/**
 * @Time: 2020/7/9 14:33
 * @DESC: 面试题 17.13. 恢复空格
 * 你不小心把一个长篇文章中的空格、标点都删掉了，并且大写也弄成了小写。像句子"I reset the computer. It still didn’t boot!"已经变成了"iresetthecomputeritstilldidntboot"。在处理标点符号和大小写之前，你得先把它断成词语。当然了，你有一本厚厚的词典dictionary，不过，有些词没在词典里。假设文章用sentence表示，设计一个算法，把文章断开，要求未识别的字符最少，返回未识别的字符数。
 * 输入：
 * dictionary = ["looked","just","like","her","brother"]
 * sentence = "jesslookedjustliketimherbrother"
 * 输出： 7
 * 解释： 断句后为"jess looked just like tim her brother"，共7个未识别字符。
 * @param $dictionary
 * @param $sentence
 * @return mixed
 * @link: https://leetcode-cn.com/problems/re-space-lcci
 */
function respace($dictionary, $sentence) {
    # 双层循环
    $len = strlen($sentence);
    $dp = array_fill(0, $len + 1, 0);
    for ($i = 1; $i <= $len; $i++) {
        $dp[$i] = $dp[$i - 1] + 1;
        for ($j = 0; $j < $i; $j++) {
            $s = substr($sentence, $j, $i - $j);
            if (in_array($s, $dictionary)) {
                $dp[$i] = min($dp[$i], $dp[$j]);
            }
        }
    }
    return $dp[$len];

    # 哈希 todo:
}