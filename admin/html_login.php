<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit">
	<title>中德DMS登录</title>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- flat-ui -->
	<link rel="stylesheet" href="css/flat-ui.min.css">
	<!-- Jack's define -->
	<link rel="stylesheet" href="css/dms.css">
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<!-- 	<link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="js/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="js/bootstrap.min.js"></script>

</head>

<body>

          
	<form method="post" action="index.php" class="form-signin">		
		<div class="login-form">
			<div class="form-signin-heading" align="center"><?php echo $lang['login_title_h2']; ?>&nbsp;</div>
			<div class="form-group">
				<div class="input-group">
					<span class="glyphicon glyphicon-user input-group-addon" for="user_name"></span>
					<input name="user_name" type="text" class="form-control login-field" value="" placeholder="用户名" id="login-name" required autofocus />					
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="glyphicon glyphicon-lock input-group-addon" for="user_name"></span>
					<input name="user_password" type="password" class="form-control login-field" value="" placeholder="密码" id="login-pass" required />
				</div>
			</div>
			<input class="btn btn-primary btn-lg btn-block" type="submit"  name="login" value="登录" />
		</div>
	</form>



<!-- 
	<div class="container">
		<form class="form-signin" method="post" action="index.php" name="loginform">
			<h2 class="form-signin-heading">Please sign in</h2>
			<label for="login_input_username" class="sr-only">Username</label>
			<input id="login_input_username" class="login_input form-control" type="text" name="user_name" placeholder="Username" required autofocus />
			<label for="login_input_password" class="sr-only">Password</label>
			<input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" placeholder="Password" required />
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Log in</button>
			<a href="register.php">Register new account</a>
		</form>
	</div>
-->

<!-- 	<div class="container">
		<form class="form-signin" method="post" action="index.php" name="loginform">
			<h2 class="form-signin-heading" align="center"><?php echo $lang['login_title_h2']; ?>&nbsp;</h2>
			<label for="login_input_username" class="sr-only">用户名</label>
			<input id="login_input_username" class="login_input form-control" type="text" name="user_name" placeholder="用户名" required autofocus />
			<label for="login_input_password" class="sr-only">密码</label>
			<input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" placeholder="密码" required />
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> 保持登录状态
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">登录</button>
			<a href="register.php">Register new account</a>
		</form>
	</div> -->


</body>
</html>







