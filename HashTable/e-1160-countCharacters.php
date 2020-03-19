<?php
/**
 * @Time: 2020/3/17 13:37
 * @DESC: 1160. 拼写单词 简单
 * 给你一份『词汇表』（字符串数组） words 和一张『字母表』（字符串） chars。
 * 假如你可以用 chars 中的『字母』（字符）拼写出 words 中的某个『单词』（字符串），那么我们就认为你掌握了这个单词。
 * 注意：每次拼写时，chars 中的每个字母都只能用一次。
 * 返回词汇表 words 中你掌握的所有单词的 长度之和。
 * @param $words
 * @param $chars
 * @return int
 */
function countCharacters($words,$chars){
    # ----- 哈希表解法
//    $hash = [];
//    $len_chars = strlen($chars);
//
//    for ($i = 0; $i < $len_chars; $i++){
//        $hash[$chars[$i]] = ($hash[$chars[$i]] ?? 0)+ 1;
//    }
//
//    $res = 0;
//    foreach ($words as $word){
//        $hash_arr = $hash;
//        $len_word = strlen($word);
//        for ($i = 0; $i < $len_word; $i++){
//            if (!isset($hash_arr[$word[$i]]) || --$hash_arr[$word[$i]] < 0){
//                continue 2;
//            }
//        }
//        $res += $len_word;
//    }
//    return $res;


    # ----- 字符串
    $res = 0;
    foreach ($words as $word){
        $char = $chars;
        $len = strlen($word);
        $res += $len;
        for ($i = 0; $i < $len; $i++){
            $k = strpos($char,$word[$i]);
            if ($k === false) {
                $res -= $len;
                break;
            }
            $char = substr_replace($char,'',$k,1);
        }
    }
    return $res;
}

$words = ['hello','world',"leetcode"];
$chars = 'welldonehoneyr';
var_dump(countCharacters($words,$chars));

$words = ["cat","bt","hat","tree"];
$chars = "atach";
var_dump(countCharacters($words,$chars));

$words = ["dyiclysmffuhibgfvapygkorkqllqlvokosagyelotobicwcmebnpznjbirzrzsrtzjxhsfpiwyfhzyonmuabtlwin","ndqeyhhcquplmznwslewjzuyfgklssvkqxmqjpwhrshycmvrb","ulrrbpspyudncdlbkxkrqpivfftrggemkpyjl","boygirdlggnh","xmqohbyqwagkjzpyawsydmdaattthmuvjbzwpyopyafphx","nulvimegcsiwvhwuiyednoxpugfeimnnyeoczuzxgxbqjvegcxeqnjbwnbvowastqhojepisusvsidhqmszbrnynkyop","hiefuovybkpgzygprmndrkyspoiyapdwkxebgsmodhzpx","juldqdzeskpffaoqcyyxiqqowsalqumddcufhouhrskozhlmobiwzxnhdkidr","lnnvsdcrvzfmrvurucrzlfyigcycffpiuoo","oxgaskztzroxuntiwlfyufddl","tfspedteabxatkaypitjfkhkkigdwdkctqbczcugripkgcyfezpuklfqfcsccboarbfbjfrkxp","qnagrpfzlyrouolqquytwnwnsqnmuzphne","eeilfdaookieawrrbvtnqfzcricvhpiv","sisvsjzyrbdsjcwwygdnxcjhzhsxhpceqz","yhouqhjevqxtecomahbwoptzlkyvjexhzcbccusbjjdgcfzlkoqwiwue","hwxxighzvceaplsycajkhynkhzkwkouszwaiuzqcleyflqrxgjsvlegvupzqijbornbfwpefhxekgpuvgiyeudhncv","cpwcjwgbcquirnsazumgjjcltitmeyfaudbnbqhflvecjsupjmgwfbjo","teyygdmmyadppuopvqdodaczob","qaeowuwqsqffvibrtxnjnzvzuuonrkwpysyxvkijemmpdmtnqxwekbpfzs","qqxpxpmemkldghbmbyxpkwgkaykaerhmwwjonrhcsubchs"];
$chars = "usdruypficfbpfbivlrhutcgvyjenlxzeovdyjtgvvfdjzcmikjraspdfp";
var_dump(countCharacters($words,$chars));

###
# hash表就是建立一个字符为key，出现的数量为value的表。然后遍历words中的元素来-1
# 字符串就是普通的遍历然后删除字符，找一次删除一个。
# tips : strpos()方法如果找不到字符串的话返回的是false，当然，如果位置在第一个也会返回坐标0，所以要用===来判断。