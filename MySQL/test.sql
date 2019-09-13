# 182.
# 查找重复的电子邮箱
SELECT email FROM user group by email having COUNT(email) > 1;

# 178.
# 编写一个 SQL 查询来实现分数排名。
# 如果两个分数相同，则两个分数排名（Rank）相同。
# 请注意，平分后的下一个名次应该是下一个连续的整数值。换句话说，名次之间不应该有“间隔”。
# todo:


# 627.
# 给定一个 salary 表，如下所示，有 m = 男性 和 f = 女性 的值。
# 交换所有的 f 和 m 值（例如，将所有 f 值更改为 m，反之亦然）。
# 要求只使用一个更新（Update）语句，并且没有中间的临时表。
# 注意，您必只能写一个 Update 语句，请不要编写任何 Select 语句。
UPDATE salary SET sex =
                        CASE
                            WHEN sex = 'f' THEN 'm'
                            WHEN sex = 'm' THEN 'f'
                        END;


# 183.
SELECT c.Name Customers From Customers c LEFT JOIN Orders o ON c.Id = o.CustomerId WHERE o.Id is null;


# 596.
# 有一个courses 表 ，有: student (学生) 和 class (课程)。
# 请列出所有超过或等于5名学生的课。
SELECT class FROM courses GROUP BY class having COUNT(DISTINCT student) >= 5;


# 177.
# 编写一个 SQL 查询，获取 Employee 表中第 n 高的薪水（Salary）。
CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
    SET N = N-1;
    RETURN (
        # Write your MySQL query statement below.
        SELECT DISTINCT Salary FROM Employee Order By Salary DESC LIMIT 1 OFFSET N
    );
END