<?php
  require_once '../config.php';
  date_default_timezone_set('Asia/Shanghai');
  /**
   * 连接数据库
   * @return resource
   */
  function connect() {
    // 创建连接
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
    // 检测连接
    if (mysqli_connect_errno($conn)) {
      die('连接 MySQL 失败: ' . mysqli_connect_error());
    }
    // 字符集
    $conn -> query('set names utf8');
    return $conn;
  }

?>