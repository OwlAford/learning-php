<?php
  //> 从 MySQL 数据库读取数据

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

  $sql = 'SELECT id, firstname, lastname FROM MyGuests';
  $result = $conn -> query($sql);

  if ($result -> num_rows > 0) {
    // 输出每行数据
    while ($row = $result -> fetch_assoc()) {
      echo '<br> id: ' . $row['id'] . ' - Name: ' . $row['firstname'] . ' ' . $row['lastname'];
    }
  } else {
    echo '0 个结果';
  }
  $conn->close();

?>
