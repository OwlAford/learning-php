<?php
  //> 创建表
  $servername = '127.0.0.1';
  $username = 'root';
  $password = '123456';
  $dbname = 'myDB';

  // 创建连接
  $conn = new mysqli($servername, $username, $password, $dbname);
  // 检测连接
  if ($conn -> connect_error) {
    die('连接失败: ' . $conn -> connect_error);
  } 

  // 使用 sql 创建数据表
  $sql = 'CREATE TABLE MyGuests (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
  )';

  // NOT NULL - 每一行都必须含有值（不能为空），null 值是不允许的。
  // DEFAULT value - 设置默认值
  // UNSIGNED - 使用无符号数值类型，0 及正数
  // AUTO INCREMENT - 设置 MySQL 字段的值在新增记录时每次自动增长 1
  // PRIMARY KEY - 设置数据表中每条记录的唯一标识。 通常列的 PRIMARY KEY 设置为 ID 数值，与 AUTO_INCREMENT 一起使用。

  if ($conn -> query($sql) === TRUE) {
    echo 'Table MyGuests created successfully';
  } else {
    echo '创建数据表错误: ' . $conn -> error;
  }

  $conn->close();
?>
