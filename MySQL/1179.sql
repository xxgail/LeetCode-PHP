CREATE TABLE `Department` (
    `id` int(10),
    `revenue` int(10),
    `month` varchar(10)
);
/**
  部门表 Department：

+---------------+---------+
| Column Name   | Type    |
+---------------+---------+
| id            | int     |
| revenue       | int     |
| month         | varchar |
+---------------+---------+
(id, month) 是表的联合主键。
这个表格有关于每个部门每月收入的信息。
月份（month）可以取下列值 ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]。

编写一个 SQL 查询来重新格式化表，使得新的表中有一个部门 id 列和一些对应每个月 的收入（revenue）列。

查询结果格式如下面的示例所示：

Department 表：
+------+---------+-------+
| id   | revenue | month |
+------+---------+-------+
| 1    | 8000    | Jan   |
| 2    | 9000    | Jan   |
| 3    | 10000   | Feb   |
| 1    | 7000    | Feb   |
| 1    | 6000    | Mar   |
+------+---------+-------+

查询得到的结果表：
+------+-------------+-------------+-------------+-----+-------------+
| id   | Jan_Revenue | Feb_Revenue | Mar_Revenue | ... | Dec_Revenue |
+------+-------------+-------------+-------------+-----+-------------+
| 1    | 8000        | 7000        | 6000        | ... | null        |
| 2    | 9000        | null        | null        | ... | null        |
| 3    | null        | 10000       | null        | ... | null        |
+------+-------------+-------------+-------------+-----+-------------+

注意，结果表有 13 列 (1个部门 id 列 + 12个月份的收入列)。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reformat-department-table
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
SELECT id,
       MAX(CASE WHEN month = 'Jan' THEN revenue END) as Jan_Revenue,
       MAX(CASE WHEN month = 'Feb' THEN revenue END) as Feb_Revenue,
       MAX(CASE WHEN month = 'Mar' THEN revenue END) as Mar_Revenue,
       MAX(CASE WHEN month = 'Apr' THEN revenue END) as Apr_Revenue,
       MAX(CASE WHEN month = 'May' THEN revenue END) as May_Revenue,
       MAX(CASE WHEN month = 'Jun' THEN revenue END) as Jun_Revenue,
       MAX(CASE WHEN month = 'Jul' THEN revenue END) as Jul_Revenue,
       MAX(CASE WHEN month = 'Aug' THEN revenue END) as Aug_Revenue,
       MAX(CASE WHEN month = 'Sep' THEN revenue END) as Sep_Revenue,
       MAX(CASE WHEN month = 'Oct' THEN revenue END) as Oct_Revenue,
       MAX(CASE WHEN month = 'Nov' THEN revenue END) as Nov_Revenue,
       MAX(CASE WHEN month = 'Dec' THEN revenue END) as Dec_Revenue
FROM
     Department
GROUP BY id;

/**
  # case when的原理
当一个单元格中有多个数据时，case when只会提取当中的第一个数据。

以CASE WHEN month='Feb' THEN revenue END 为例，当id=1时，它只会提取month对应单元格里的第一个数据，即Jan，它不等于Feb，所以找不到Feb对应的revenue，所以返回NULL。
  （可以试试把我上面答案里的sum()统统去掉，执行结果与预期不一样。错就错在当id=1时,Feb_Revenue和Mar_Revenue的值变成了NULL）

那该如何解决单元格内含多个数据的情况呢？答案就是使用聚合函数，聚合函数就用来输入多个数据，输出一个数据的。
 */