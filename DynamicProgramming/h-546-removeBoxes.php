<?php
class SolutionRemoveBoxes{
    public $dp = [];

    /**
     * @Time: 2020/8/15
     * @DESC: 546. 移除盒子
     * 给出一些不同颜色的盒子，盒子的颜色由数字表示，即不同的数字表示不同的颜色。
     * 你将经过若干轮操作去去掉盒子，直到所有的盒子都去掉为止。
     * 每一轮你可以移除具有相同颜色的连续 k 个盒子（k>= 1），这样一轮之后你将得到 k*k 个积分。
     * 当你将所有盒子都去掉之后，求你能获得的最大积分和。
     * 示例：
        输入：boxes = [1,3,2,2,2,3,4,3,1]
        输出：23
        解释：
        [1, 3, 2, 2, 2, 3, 4, 3, 1]
        ----> [1, 3, 3, 4, 3, 1] (3*3=9 分)
        ----> [1, 3, 3, 3, 1] (1*1=1 分)
        ----> [1, 1] (3*3=9 分)
        ----> [] (2*2=4 分)
     * @param $boxes
     * @return int
     * @link: https://leetcode-cn.com/problems/remove-boxes
     */
    function removeBoxes($boxes){
        return $this->calculatePoints($boxes,0,count($boxes)-1,0);
    }

    function calculatePoints($boxes,$l,$r,$k){
        if ($l > $r) return 0;
        if (isset($this->dp[$l][$r][$k]) && $this->dp[$l][$r][$k] != 0) return $this->dp[$l][$r][$k];
        while ($r > $l && $boxes[$r] == $boxes[$r-1]){
            --$r;
            ++$k;
        }
        $this->dp[$l][$r][$k] = $this->calculatePoints($boxes,$l,$r-1,0) + ($k+1)*($k+1);
        for ($i = $l; $i < $r; $i++){
            if ($boxes[$i] == $boxes[$r]){
                $this->dp[$l][$r][$k] = max($this->dp[$l][$r][$k] ?? 0,$this->calculatePoints($boxes,$l,$i,$k+1) + $this->calculatePoints($boxes,$i+1,$r-1,0));
            }
        }
        return $this->dp[$l][$r][$k];
    }
}


$boxes = [3,8,8,5,5,3,9,2,4,4,6,5,8,4,8,6,9,6,2,8,6,4,1,9,5,3,10,5,3,3,9,8,8,6,5,3,7,4,9,6,3,9,4,3,5,10,7,6,10,7];
$s = new SolutionRemoveBoxes();
var_dump($s->removeBoxes($boxes));