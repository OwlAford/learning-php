<?php 
  require_once '../config.php';
  require_once UTILPATH . 'image/verifyCode.php';
  require_once COREPATH . 'admin.php';

  $username = $_POST['username'];
  $username = addslashes($username);
  $password = md5($_POST['password']);
  $verifyCode = $_POST['verifycode'];
  if (empty($username) || empty($password) || empty($verifyCode)) {
  	$res = array(
      'response' => '请正确填写表单！',
      'rescode' => '103'
    );
  } else {
    // 验证验证码
    if (!securityCoder::check($verifyCode)) { 
      $res = array(
        'response' => '验证码无效！',
        'rescode' => '100'
      );
    } else {
      // 用户校验
      if (checkAdmin($username, $password)) {
        $res = array(
          'response' => '用户校验成功！',
          'rescode' => '104'
        );
      } else {
        $res = array(
          'response' => '用户校验失败！',
          'rescode' => '105'

        );
      }
    }
  }
  header('Content-Type:application/json;charset=utf-8');
  echo json_encode($res);
?>