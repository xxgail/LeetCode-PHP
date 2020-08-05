<?php
require '../TreeNode/TreeNode.php';
/**
 * @Time: 2020/8/5
 * @DESC: 337. 打家劫舍③
 * 在上次打劫完一条街道之后和一圈房屋后，小偷又发现了一个新的可行窃的地区。这个地区只有一个入口，我们称之为“根”。
 * 除了“根”之外，每栋房子有且只有一个“父“房子与之相连。一番侦察之后，聪明的小偷意识到“这个地方的所有房屋的排列类似于一棵二叉树”。 如果两个直接相连的房子在同一天晚上被打劫，房屋将自动报警。
 * 计算在不触动警报的情况下，小偷一晚能够盗取的最高金额。
 * 示例
        1
       / \
      2   3
     /
    4
 * 输出 7 。原因：3+4 = 7
 * @param $root
 * @return int
 * @link: https://leetcode-cn.com/problems/house-robber-iii
 */
function rob3($root) {
    return max(helper($root));
}

function helper($root){
    $res = [0,0];
    if ($root == null) return $res;
    $left = helper($root->left);
    $right = helper($root->right);
    $res[0] = max($left) + max($right); // 当前节点未选中
    $res[1] = $root->val + $left[0] + $right[0]; // 当前节点被选中
    return $res;
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);

var_dump(rob3($root));

### 解题思路
# 最开始以为是需要深度遍历，计算每层的节点，然后隔层相加。写完发现不对，还是需要用到动态规划
# 所以最终还是求最大值的问题。