<?php 
  require_once '../config.php';
  require_once ROOTPATH . '/utils/image/verifyCode.php';
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
      $res = array(
        'response' => '表单验证成功！',
        'rescode' => '102'
      );
    }
  }
  header('Content-Type:application/json;charset=utf-8');
  echo json_encode($res);
?>