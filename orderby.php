<?php
  //> ORDER BY 关键词

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

  $result = mysqli_query($conn, "
    SELECT * FROM MyGuests ORDER BY reg_date
  ");

  while ($row = mysqli_fetch_array($result)) {
    echo $row['firstname'];
    echo " " . $row['lastname'];
    echo " " . $row['email'];
    echo "<br>";
  }

  $conn->close();

?>
