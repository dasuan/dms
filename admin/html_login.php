<!-- login form box -->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>CDTF DMS Login</title>

	<!-- From date-picker -->
	<!-- 	<link href="css/bootstrap.css" rel="stylesheet"> -->
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<!-- 	<link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="js/jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="js/bootstrap.min.js"></script>

	<style type="text/css">
/*body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}

#container {
	background: #CCC;
	margin: 0 auto;
	width: 945px;
}

#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
*/

body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #eee;
}

.form-signin {
	max-width: 330px;
	padding: 15px;
	margin: 0 auto;
}

.form-signin .form-control {
	position: relative;
	height: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 10px;
	font-size: 16px;
}
.form-signin input[type="text"] {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
}


</style>


</head>
<!-- <body>
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
</body> -->
<body>
	<div class="container">
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
	</div>
</body>







</html>







