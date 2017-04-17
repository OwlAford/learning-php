<?php
  $filename = 'no-exist.txt';
  try {
    if (!file_exists($filename)) {
      throw new Exception('文件不存在');
    }
  } catch(Exception $e) {
    $msg = 'Error:异常所在行' . $e->getLine() . '，异常所在文件：' . $e->getFile() . '错误详情：' . $e->getMessage();
    echo $msg;
    // 将异常信息记录到日志中
    file_put_contents('error.log', $msg);
  }

  // 自定义的异常类，继承了PHP的异常基类Exception
  class MyException extends Exception {
    function getInfo() {
      return '自定义错误信息';
    }
  }

  try {
    throw new MyException('error');
  } catch(Exception $e) {
    echo $e->getInfo();
  }

?>
