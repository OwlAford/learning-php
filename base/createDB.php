<?php
  if (function_exists('mysqli_connect')) {
    echo 'Mysql扩展已经安装！' . '<br/>';
  }

  $conn = new mysqli('127.0.0.1', 'root', '123456');
  // 检测连接
  if ($conn->connect_error) {
    die('连接失败: ' . $conn->connect_error);
  } 
  echo '连接成功！' . '<br/>';

  // 创建数据库
  $sql = 'CREATE DATABASE myDB';
  if ($conn -> query($sql) === TRUE) {
    echo '数据库创建成功' . '<br/>';
  } else {
    echo 'Error creating database: ' . $conn -> error . '<br/>';
  }

  // 关闭数据库连接
  $conn -> close();
?>
