<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
</head>

<body>
  <div class="row">
    <label>用户名：<input type="text" name="username" id="username" placeholder="请输入用户名"></label>
  </div>
  <div class="row">
    <label>密码：<input type="text" name="password" id="password" placeholder="请输入密码"></label>
  </div>
  <div class="row">
    <label>验证码：<input type="text" name="verifycode" id="verifycode" placeholder="请输入验证码"></label>
    <img alt="验证码"  id="codeImg" onclick="setCode()" />
  </div>
  <div class="row">
    <input type="button" value="登录" onclick="login()">
  </div>
  <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
  function setCode() {
    $('#codeImg').attr('src', 'loginVerifyCode.php?' + Date.now())
  }
  setCode()
  function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    var verifycode = $('#verifycode').val();
    if (username && password && verifycode) {
      $.post('doLogin.php', {
        'username': username,
        'password': password,
        'verifycode': verifycode
      }, function(data, status) {
        console.log(data)
        if (data.rescode == '100') {
          setCode()
        } 
      })
      .done(function() {
        alert('success');
      })
      .fail(function() {
        alert('error');
      })
      // .always(function() {
      //   console.log('finished');
      // });
    } else {
      alert('请正确输入表单！')
    }
  }
  </script>
</body>
</html>
