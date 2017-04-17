<?php
  //> 预处理语句
  // 预处理语句用于执行多个相同的 SQL 语句，并且执行效率更高。
  // 预处理语句大大减少了分析时间，只做了一次查询（虽然语句多次执行）。
  // 绑定参数减少了服务器带宽，你只需要发送查询的参数，而不是整个语句。
  // 预处理语句针对SQL注入是非常有用的，因为参数值发送后使用不同的协议，保证了数据的合法性。

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

  // 预处理及绑定
  $stmt = $conn -> prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
  // 该函数绑定了 SQL 的参数，且告诉数据库参数的值。 "sss" 参数列处理其余参数的数据类型。s 字符告诉数据库该参数为字符串。
  // 参数有以下四种类型:
  // i - integer（整型）
  // d - double（双精度浮点型）
  // s - string（字符串）
  // b - BLOB（binary large object:二进制大对象）
  $stmt->bind_param("sss", $firstname, $lastname, $email);
   
  // 设置参数并执行
  $firstname = "John";
  $lastname = "Doe";
  $email = "john@qq.com";
  $stmt->execute();
   
  $firstname = "Mary";
  $lastname = "Moe";
  $email = "mary@qq.com";
  $stmt->execute();
   
  $firstname = "Julie";
  $lastname = "Dooley";
  $email = "julie@qq.com";
  $stmt->execute();
   
  echo "新记录插入成功";
   
  $stmt->close();
  $conn->close();

?>
