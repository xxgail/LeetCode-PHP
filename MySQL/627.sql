CREATE TABLE IF NOT EXISTS `salary` (
    `id` int(11) AUTO_INCREMENT,
    `name` varchar(10) NOT NULL,
    `sex` varchar(10) NOT NULL ,
    `salary` int(11) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
INSERT INTO `salary` VALUE (1, 'A', 'm', 100);
INSERT INTO `salary` VALUE (2, 'B', 'f', 200);
/**
  给定一个 salary 表，如下所示，有 m = 男性 和 f = 女性 的值。
  交换所有的 f 和 m 值（例如，将所有 f 值更改为 m，反之亦然）。
  要求只使用一个更新（Update）语句，并且没有中间的临时表。

注意，您必只能写一个 Update 语句，请不要编写任何 Select 语句。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/swap-salary
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
# 使用update和case when
UPDATE `salary` SET sex =
    CASE
        WHEN sex = 'm' THEN 'f'
        WHEN sex = 'f' THEN 'm'
    END ;

# IF 表达式 IF( expr1 , expr2 , expr3 ) expr1 的值为 TRUE，则返回值为 expr2 expr1 的值为FALSE，则返回值为 expr3
UPDATE salary SET sex =
                      IF(sex = 'm', 'f', 'm');