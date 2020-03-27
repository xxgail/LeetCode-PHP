<?php
/**
 * Class Common 公共方法类
 */
class Common
{
    /**
     * @Time: 2020/3/27 11:02
     * @DESC: 求两个正整数的最大公约数
     * @param $a
     * @param $b
     * @return int
     */
    public static function goc($a,$b){
        return $b == 0 ? $a : Common::goc($b, $a % $b);
    }
}