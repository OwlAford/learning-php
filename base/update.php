<?php
  //> ORDER BY 关键词
  require_once('config.php');

  // 创建连接
  $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

  // 检测连接
  if ($conn -> connect_error) {
    die('连接失败: ' . $conn -> connect_error);
  } else {
    echo '数据库连接成功！';
  }
  
  $result = mysqli_query($conn, "
    UPDATE MyGuests SET email = 'abc@qq.com'
    WHERE firstname = 'John' AND lastname = 'Doe'
  ");

  if ($result) {
    echo '数据修改成功！';
  } else {
    echo '数据修改失败！';
  }

  $conn->close();

?>
