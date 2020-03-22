<?php
/**
 * @Time: 2020/3/22 12:07
 * @DESC: 5364. 按既定顺序创建目标数组
 * 给你两个整数数组 nums 和 index
 * 你需要按照以下规则创建目标数组：
 * 目标数组 target 最初为空。
 * 按从左到右的顺序依次读取 nums[i] 和 index[i]，在 target 数组中的下标 index[i] 处插入值 nums[i] 。
 * 重复上一步，直到在 nums 和 index 中都没有要读取的元素。
 * 请你返回目标数组。
 * 题目保证数字插入位置总是存在。
 * @param $nums
 * @param $index
 * @return array
 */
function createTargetArray($nums,$index){
    $res = [];
    $count = count($nums);
    for ($i = 0; $i < $count; $i++){
        array_splice($res,$index[$i],0,$nums[$i]);
    }
    return $res;
}

$nums = [0,1,2,3,4];
$index = [0,1,2,2,1];
var_dump(createTargetArray($nums,$index));
$nums = [1,2,3,4,0];
$index = [0,1,2,3,0];
var_dump(createTargetArray($nums,$index));
$nums = [1];
$index = [0];
var_dump(createTargetArray($nums,$index));

###
# array_splice($input,$offset,$length,$replacement)
# 把 input 数组中由 offset 和 length 指定的单元去掉，如果提供了 replacement 参数，则用其中的单元取代。
# 如果省略 length，则移除数组中从 offset 到结尾的所有部分。如果指定了 length 并且为正值，则移除这么多单元。如果指定了 length 并且为负值，则移除从 offset 到数组末尾倒数 length 为止中间所有的单元。 如果设置了 length 为零，不会移除单元。