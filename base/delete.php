<?php
  //> 删除数据库中的数据

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

  $result = mysqli_query($conn,"
    DELETE FROM MyGuests WHERE email = 'abc@qq.com'
  ");

  if ($result) {
    echo '数据删除成功！';
  }

  $conn->close();

?>
