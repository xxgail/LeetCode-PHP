<?php
class Solution1 {
    public $fa,$rank;

    function smallestStringWithSwaps($s, $pairs) {
        $n = strlen($s);
        $this->fa = range(0,$n-1);
        $this->rank = array_fill(0,$n,1);
        foreach ($pairs as $pair) {
            $this->union($pair[0],$pair[1]);
        }
        $groups = array_fill(0,$n,[]);
        for ($i = 0; $i < $n; $i++) {
            $groups[$this->find($i)][] = ord($s[$i]);
        }
        foreach ($groups as $group) {
            sort($group);
        }
        $res = [];
        for ($i = 0; $i < $n; $i++) {
            $f = $this->find($i);
            $res[$i] = array_shift($groups[$f]);
        }
        return implode('',$res);
    }

    function union($x,$y) {
        $fx = $this->find($x);
        $fy = $this->find($y);
        if ($fx == $fy) {
            return;
        }
        if ($this->rank[$fx] < $this->rank[$fy]) {
            $tmp = $fx;
            $fx = $fy;
            $fy = $tmp;
        }

        $this->rank[$fx] += $this->rank[$fy];
        $this->fa[$fy] = $fx;
    }


    function find($x) {
        if ($this->fa[$x] != $x) {
            $this->fa[$x] = $this->find($this->fa[$x]);
        }
        return $this->fa[$x];
    }
}
