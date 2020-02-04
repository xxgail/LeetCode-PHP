# MySQL 语法

## 命令行打开MySQL：
- 启动 >mysql -u root -p
- 退出 >exit

## 一、对数据库的操作
### 1. 增删
- CREATE DATABASE 库名;
- DROP DATABASE 库名;

## 二、对数据表的操作

### 1. 切换到该数据库
- USE 库名;

### 2. 查
- SHOW TABLES;(查看所有数据表)
- DESC 表名;(查看表结构)
- SHOW CREATE TABLE 表名;(查看创建表的SQL语句)

### 3. 表的增删
- CREATE TABLE 表名 (..);
- DROP TABLE 表名;

### 4. 表的改（字段）
- ALTER TABLE 表名 ADD COLUMN 字段名 类型;
- ALTER TABLE 表名 DROP COLUMN 字段名;
- ALTER TABLE 表名 CHANGE COLUMN 字段名 新的字段名 新的类型;

## 三、对字段的具体操作
### 1. 增删改
- **INSERT INTO** 表名 (字段) **VALUES** (值) [(值) ..增加多条];
- **UPDATE** 表名 **SET** 字段 = 值 **WHERE** .. ;
- **DELETE FROM** 表名 **WHERE** ..;   

### 2. 查
- SELECT * FROM 表名; (*全部)
- SELECT 字段,字段 FROM 表名; (可以只查询指定字段)
- SELECT 字段 别名,字段 FROM 表名; (可以给字段起别名，结果返回别名)
- SELECT * FROM 表名 WHERE .. (NOT,AND,OR);
(优先级：not>and>or。 但是可以加括号改变优先级)
- SELECT * FROM 表名 WHERE .. ORDER BY 字段 DESC ,字段;(
排序放在条件后面。默认正序（ASC）可省略。多字段时用逗号隔开即可)
- SELECT * FROM 表名 LIMIT 4 OFFSET 0;(分页 LIMIT M OFFSET N。从第N条记录开始查M条)
- SELECT COUNT(*) FROM 表名; (聚合函数COUNT SUM AVG MAX MIN)
- SELECT * FROM 表名 GROUP BY 字段; (分组)
- SELECT * FROM 表名 INNER JOIN 表名 ON 条件;
    - INNER JOIN 交集
    - LEFT OUTER JOIN 左表全部
    - RIGHT OUTER JOIN 右表全部
    - FULL OUTER JOIN 两个表全部

---
# MySQL 报错

### 1.MySQL连接时报错
- 错误信息：Server returns invalid timezone. Go to 'Advanced' tab and set 'serverTimezone' property manually. 
- 详情：服务器返回无效时区。转到“高级”选项卡并手动设置“serverTimezone”属性。
- 处理方法：
    ```mysql
      show variables like '%time_zone%';
      set global time_zone='+8:00';
    ```