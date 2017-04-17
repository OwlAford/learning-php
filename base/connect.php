<?php
  require_once('config.php');

  // 创建连接
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

  // 检测连接
  if ($conn -> connect_error) {
    die('连接失败: ' . $conn -> connect_error);
  } else {
    echo '数据库连接成功！';
  }

  // 字符集
  $conn -> query('set names utf8');

 ?>