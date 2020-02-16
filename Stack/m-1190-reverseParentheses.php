<?php
function reverseParentheses($s){
    $strings = [''];
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++){
        if ($s[$i] == '('){
            array_push($strings,"");
        }elseif ($s[$i] == ')'){
            $str = array_pop($strings);
            array_push($strings,array_pop($strings).strrev($str));
        }else{
            array_push($strings,array_pop($strings).$s[$i]);
        }
    }
    return $strings[0];
}


$s = "n(ev(t)((()lfevf))yd)cb()";
print_r(reverseParentheses($s));
print_r(reverseParentheses($s) == "ndyfvefltvecb");
$s1 = "(ed(et(oc))el)";
print_r(reverseParentheses($s1));
$s2 = "ta()usw((((a))))";
print_r(reverseParentheses($s2));
$s3 = "(u(love)i)";
print_r(reverseParentheses($s3));
$s4 = "kae(c(x((ffr()(t(ky)esr()oc)bl)kwx)qz)a(yovg(())dpx((w(co(tuz))zldu(nukcno(j)nohpg)g)bxp)djjbw))ho(h)";
print_r(reverseParentheses($s4) == "kaeyovgdpxpxbwtuzoczldugphonjonckungdjjbwaxxwkffrcorsekytblqzchoh");