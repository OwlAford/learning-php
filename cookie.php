<?php
  //> cookie
  setcookie('time', time());

  ob_start();
  print_r($_COOKIE); 
  $content = ob_get_contents();
  $content = str_replace(' ', '&nbsp;', $content);
  ob_clean();
  header('content-type:text/html; charset=utf-8');
  echo '当前的Cookie为：<br>';
  echo nl2br($content);

  //> cookie过期
  setcookie('delay', '设定60秒过期cookie', time() + 60);
  header('Set-Cookie:test=1393832059; expires=' . gmdate('D, d M Y H:i:s \G\M\T', time() + 60));

  // coolie判断是否过期
  echo 'test' . (isset($_COOKIE['test']) ? '未过期' : '过期');
  echo 'delay' . (isset($_COOKIE['delay']) ? '未过期' : '过期');

  //> session
  //开始使用session
  session_start();
  //设置一个session
  $_SESSION['testsession'] = time();
  $_SESSION['ary'] = array('name' => 'jobs');
  $_SESSION['obj'] = new stdClass();
  //显示当前的session_id
  echo 'session_id:' . session_id();
  echo '<br>';
  //读取session值
  echo $_SESSION['testsession'];
  //销毁一个session
  unset($_SESSION['testsession']);
  echo '<br>';
  var_dump($_SESSION);

?>
