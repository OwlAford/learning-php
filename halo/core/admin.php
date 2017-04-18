<?php
  require_once '../config.php';
  require_once LIBPATH . 'mysql.php';

  /**
   * 检查管理员是否存在
   * @param unknown_type $sql
   * @return Ambigous <multitype>
   */
  function checkAdmin($username, $password) {
    $conn = connect();
    $sql = "SELECT * FROM admin WHERE username = '{$username}' and password = '{$password}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $conn -> close();
    return $row;
  }

  /**
   * 检查账户是否存在
   * @return string
   */
  function hasUser($username) {
    $conn = connect();
    $sql = "SELECT * FROM admin WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
  }

  /**
   * 添加管理员
   * @return string
   */
  function addUser($username, $password) {
    $conn = connect();
    $mysqltime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO admin (username, password, reg_time)
    VALUES ('{$username}', '{$password}', '{$mysqltime}');";
    if (hasUser($username)) {
      return 'exist';
    } else {
      mysqli_query($conn, $sql);
      return mysqli_insert_id($conn);
    }
  }

?>