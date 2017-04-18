<?php
  require_once '../config.php';

  /**
   * 连接数据库
   * @return resource
   */
  function connect() {
    // 创建连接
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    // 检测连接
    if ($conn -> connect_error) {
      die('连接失败: ' . $conn -> connect_error);
    }
    // 字符集
    $conn -> query('set names utf8');
    return $conn;
  }

?>