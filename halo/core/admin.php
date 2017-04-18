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
   * 添加管理员
   * @return string
   */
  function addUser() {
    
  }

?>