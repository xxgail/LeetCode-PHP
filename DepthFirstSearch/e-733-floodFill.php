<?php
/**
 * @Time: 2020/8/16
 * @DESC: 733. 图像渲染
 * 有一幅以二维整数数组表示的图画，每一个整数表示该图画的像素值大小，数值在 0 到 65535 之间。
 * 给你一个坐标(sr, sc)表示图像渲染开始的像素值（行 ，列）和一个新的颜色值newColor，让你重新上色这幅图像。
 * 为了完成上色工作，从初始坐标开始，记录初始坐标的上下左右四个方向上像素值与初始坐标相同的相连像素点，接着再记录这四个方向上符合条件的像素点与他们对应四个方向上像素值与初始坐标相同的相连像素点，……，重复该过程。将所有有记录的像素点的颜色值改为新的颜色值。
 * 最后返回经过上色渲染后的图像。
 * 示例 1:
    输入:
    image = [[1,1,1],[1,1,0],[1,0,1]]
    sr = 1, sc = 1, newColor = 2
    输出: [[2,2,2],[2,2,0],[2,0,1]]
 * @param $image
 * @param $sr
 * @param $sc
 * @param $newColor
 * @return array
 * @link https://leetcode-cn.com/problems/flood-fill
 */
function floodFill($image, $sr, $sc, $newColor) {
    $target = $image[$sr][$sc];
    if ($target == $newColor){
        return $image;
    }
    $list = [[$sr,$sc]];
    $h = count($image);
    $w = count($image[0]);
    while (!empty($list)){
        $curr = array_shift($list);
        $sr = $curr[0];
        $sc = $curr[1];
        $image[$sr][$sc] = $newColor;
        if ($sr - 1 >= 0 && $image[$sr-1][$sc] == $target){
            array_push($list,[$sr-1,$sc]);
        }
        if ($sr + 1 < $h && $image[$sr+1][$sc] == $target){
            array_push($list,[$sr+1,$sc]);
        }
        if ($sc - 1 >= 0 && $image[$sr][$sc-1] == $target){
            array_push($list,[$sr,$sc-1]);
        }
        if ($sc + 1 < $w && $image[$sr][$sc+1] == $target){
            array_push($list,[$sr,$sc+1]);
        }
        var_dump($list);
    }
    return $image;
}


$image = [[1,1,1],[1,1,0],[1,0,1]];
$sr = 1;
$sc = 1;
$newColor = 2;
$image = [[0,0,0],[0,0,0]];
$sr = 0;
$sc = 0;
$newColor = 2;
var_dump(floodFill($image,$sr,$sc,$newColor));