<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
</head>

<body>
	<form action="doLogin.php" method="post">
		<div class="row">
			<label>用户名：<input type="text" name="username" placeholder="请输入用户名"></label>
		</div>
		<div class="row">
			<label>密码：<input type="text" name="password" placeholder="请输入密码"></label>
		</div>
		<div class="row">
			<label>验证码：<input type="text" name="verify" placeholder="请输入验证码"></label>
			<img src="loginVerifyCode.php" alt="验证码" />
		</div>
	</form>
</body>
</html>
