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

	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">


</head>

<body class="login-page">

          
<!-- 	<form method="post" action="index.php" class="form-signin" style="z-index: 1;">		
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
	</form> -->


		<div class="login-box">

                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Flat Admin V2</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <form>
                                <div class="control">
                                    <input type="text" class="form-control" value="admin@gmail.com">
                                </div>
                                <div class="control">
                                    <input type="password" class="form-control" value="123456">
                                </div>
                                <div class="login-button text-center">
                                    <input type="submit" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

        </div>

        <style type="text/css">
        body.login-page {
  background: url(../../img/app-header-bg.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; }
  body.login-page .login-box {
    width: 100%;
    max-width: 320px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 0;
    }
    body.login-page .login-box > .title {
      margin-bottom: 1em; }
    body.login-page .login-box > .row {
      margin-left: 0;
      margin-right: 0;
      margin-bottom: 0; }
  body.login-page .login-form {
    padding: 0em; }
    body.login-page .login-form .login-header {
      margin-bottom: 1.2em;
      font-size: 1.5em; }
    body.login-page .login-form .login-body {
      padding: 1.5em;
      border-radius: 1px; }
    body.login-page .login-form input {
      margin-bottom: 0.8em;
      margin-top: 0.5em;
      padding: 1.2em 1em;
      font-size: 1.1em;
      border-radius: 1px; }
  body.login-page .login-button .btn {
    padding: 0.5em 2em;
    font-size: 1.1em;
    border-radius: 1px;
    margin-bottom: 0; }
  body.login-page .login-footer {
    padding-top: 8px;
    padding-bottom: 8px;
    width: 100%;
    text-align: right;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px; }

        </style>





















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

<!-- 	<div style="width: 500px;height: 500px;"  id="t"></div>
	<script src="js/sweep.js"></script>
	<script>
	;(function() {

	  function loop () {
	    sweep(t, ['color', 'border-color','background'], 'hsl(0, 1, 0.5)', 'hsl(359, 1, 0.5)', {
	      callback: loop,
	      direction: 1,
	      duration: 10000,
	      space: 'HUSL'
	    });
	  }

	  var t = document.getElementById('t');
	  loop();

	})();
	</script> -->
<div id="particles-js" class="_gradient"></div>
<script src="js/particles.js"></script>
<script src="js/app.js"></script>
<script src="js/color.js"></script>

<style type="text/css">
#particles-js{
  width: 100%;
  height: 100%;
  position: absolute;
  top:0;
  left: 0;
  background-color: #1ABC9C;
  background-image: url('');
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
  z-index: -1;            
}
</style>

</body>
</html>







