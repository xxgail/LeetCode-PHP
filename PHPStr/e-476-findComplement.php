<?php
/**
 * @Time: 2019/10/10 17:04
 * @DESC: 476. 数字的补数 简单
 * 给定一个正整数，输出它的补数。补数是对该数的二进制表示取反。
 * 注意:
 * 给定的整数保证在32位带符号整数的范围内。
 * 你可以假定二进制数不包含前导零位。
 * @param $num
 * @return float|int
 */
function findComplement($num) {
    return pow(2,strlen(decbin($num))) - $num - 1;
}