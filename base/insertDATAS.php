<?php
  //> 插入多条数据
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

  $sql = "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com');";

  $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Mary', 'Moe', 'mary@example.com');";

  $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
  VALUES ('Julie', 'Dooley', 'julie@example.com')";
   
  if ($conn->multi_query($sql) === TRUE) {
    echo '新记录插入成功';
  } else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
  }

  $conn->close();
?>
