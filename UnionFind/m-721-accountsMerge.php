<?php
/**
 * @Time: 2021/1/18
 * @DESC: 721. 账户合并
 * 给定一个列表 accounts，每个元素 accounts[i] 是一个字符串列表，其中第一个元素 accounts[i][0] 是 名称 (name)，其余元素是 emails 表示该账户的邮箱地址。
 * 现在，我们想合并这些账户。如果两个账户都有一些共同的邮箱地址，则两个账户必定属于同一个人。请注意，即使两个账户具有相同的名称，它们也可能属于不同的人，因为人们可能具有相同的名称。一个人最初可以拥有任意数量的账户，但其所有账户都具有相同的名称。
 * 合并账户后，按以下格式返回账户：每个账户的第一个元素是名称，其余元素是按字符 ASCII 顺序排列的邮箱地址。账户本身可以以任意顺序返回。
 * 示例 1：
    输入：accounts = [["John", "johnsmith@mail.com", "john00@mail.com"], ["John", "johnnybravo@mail.com"], ["John", "johnsmith@mail.com", "john_newyork@mail.com"], ["Mary", "mary@mail.com"]]
    输出：[["John", 'john00@mail.com', 'john_newyork@mail.com', 'johnsmith@mail.com'],  ["John", "johnnybravo@mail.com"], ["Mary", "mary@mail.com"]]
    解释：第一个和第三个 John 是同一个人，因为他们有共同的邮箱地址 "johnsmith@mail.com"。
         第二个 John 和 Mary 是不同的人，因为他们的邮箱地址没有被其他帐户使用。
 * @param $accounts
 * @return array
 * @link: https://leetcode-cn.com/problems/accounts-merge/
 */
function accountsMerge($accounts) {
    $emailName = [];
    $emailHash = [];
    $number = 0;
    foreach ($accounts as $account) {
        $name = array_shift($account);
        foreach ($account as $item) {
            if (!isset($emailHash[$item])) {
                $emailHash[$item] = $number;
                $emailName[$item] = $name;
                $number++;
            }
        }
    }
    $parent = range(0,$number);
    foreach ($accounts as $account) {
        array_shift($account);
        $first = array_shift($account);
        if ($account) {
            foreach ($account as $item) {
                union($emailHash[$item],$emailHash[$first],$parent);
            }
        }
    }
    $HashEmails = [];
    foreach ($emailHash as $email => $hash) {
        $f = find($hash,$parent);
        $HashEmails[$f][] = $email;
    }
    $res = [];
    foreach ($HashEmails as $hashEmail) {
        sort($hashEmail);
        array_unshift($hashEmail,$emailName[$hashEmail[0]]);
        $res[] = $hashEmail;
    }
    return $res;
}

function find($x,&$parent) {
    if ($parent[$x] != $x) {
        $parent[$x] = find($parent[$x],$parent);
    }
    return $parent[$x];
}

function union($x,$y,&$parent) {
    $parent[find($x,$parent)] = find($y,$parent);
}

$accounts = [["John", "johnsmith@mail.com", "john00@mail.com"], ["John", "johnnybravo@mail.com"], ["John", "johnsmith@mail.com", "john_newyork@mail.com"], ["Mary", "mary@mail.com"]];
var_dump(accountsMerge($accounts));