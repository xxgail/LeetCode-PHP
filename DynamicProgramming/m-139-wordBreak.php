<?php
/**
 * @Time: 2019/11/18 14:43
 * @DESC: 139. 单词拆分
 * 给定一个非空字符串 s 和一个包含非空单词列表的字典 wordDict，判定 s 是否可以被空格拆分为一个或多个在字典中出现的单词。
 * 说明：
 * 拆分时可以重复使用字典中的单词。
 * 你可以假设字典中没有重复的单词。
 * 示例 1：
 * 输入: s = "leetcode", wordDict = ["leet", "code"]
 * 输出: true
 * 解释: 返回 true 因为 "leetcode" 可以被拆分成 "leet code"。
 * @param $s
 * @param $wordDict
 * @return bool
 */
function wordBreak($s,$wordDict) {
    $dp[''] = true;
    for ($i = 1; $i <= strlen($s); $i++){
        $str = substr($s,0,$i);
        $dp[$str] = false; // 初始值赋值为false
        foreach ($wordDict as $item) {
            $k = strrpos($str,$item); // strrpos() 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
            if ($k === false){
                continue;
            }
            $a = substr_replace($str,'',$k,strlen($item)); # 删除截取字符串，用于只删除最后一次出现的。
            $dp[$str] = isset($dp[$a]) && $dp[$a];
            if ($dp[$str] == true){
                break;
            }
        }
    }
    return $dp[$s];
}

$s = 'leetcode';
$wordDict = ['leet','code'];
var_dump(wordBreak($s,$wordDict));
$s = 'applepenapple';
$wordDict = ['apple','pen'];
var_dump(wordBreak($s,$wordDict));
$s = "catsandog";
$wordDict = ["cats", "dog", "sand", "and", "cat"];
var_dump(wordBreak($s,$wordDict));

###
# 动态规划！
# 建立一个以字符串为key的数组，如果前一段有的话就返回true

# 全排列，但是很明显会超时。超时超时
//function wordBreak($s, $wordDict) {
//    $result = [];
//    wordBreakFunc($wordDict,[],$result);
//    if($result){
//        foreach ($result as $item) {
//            $ss = $s;
//            for ($i = 0; $i < count($item); $i++){
//                $ss = str_replace($item[$i],'*',$ss);
//            }
//            if(str_replace('*','',$ss) == ''){
//                return true;
//            }
//        }
//    }
//    return false;
//}
//function wordBreakFunc($nums,$data,&$result) {
//    if(count($nums) == count($data)){
//        array_push($result,$data);
//        return $result;
//    }
//    for ($i = 0; $i < count($nums); $i++){
//        if(in_array($nums[$i],$data)){
//            continue;
//        }
//
//        array_push($data,$nums[$i]);
//        wordBreakFunc($nums,$data,$result);
//        array_pop($data);
//    }
//}