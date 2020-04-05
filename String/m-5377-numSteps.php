<?php
# https://leetcode-cn.com/problems/number-of-steps-to-reduce-a-number-in-binary-representation-to-one/
/**
 * @Time: 2020/4/5 15:55
 * @DESC: 5377. 将二进制表示减到1的步骤数  183周竞赛
 * 给你一个以二进制形式表示的数字 s 。
 * 请你返回按下述规则将其减少到 1 所需要的步骤数：
 * 如果当前数字为偶数，则将其除以 2 。
 * 如果当前数字为奇数，则将其加上 1 。
 * 题目保证你总是可以按上述规则将测试用例变为 1 。
 * @param $s
 * @return int
 */
function numSteps($s){
    if ($s == '1'){
        return 0;
    }
    $step = 0;
    while ($s != '1'){
        $step ++;
        $len = strlen($s);
        if (substr($s,$len - 1,1) == '0'){ # 判断最后一位是不是0
            $s = substr($s,0,$len - 1);
        }else{
            $zero = strrpos($s,'0');
            if ($zero === false){
                $s = str_pad('1',$len + 1,'0');
            }else{
                $s = str_pad(substr($s,0,$zero).'1',$len,'0');
            }
        }
    }
    return $step;
}

var_dump(numSteps('1101'));
//var_dump(numSteps("1"));

### 解题思路
# 1.判断最后一位是不是0：
# 是0，就是偶数。除以2就是去掉最后一个0
# 不是0，就是奇数，加一就是在最后一位加一其余进位。
# str_pad — 使用另一个字符串填充字符串为指定长度
