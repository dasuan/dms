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

          

		<div class="login-box">

            <div  onmouseover="this.style.cursor='pointer'" onclick="document.location='../';" class="col-sm-12 text-center login-header">
                <i class="login-logo fa fa-building-o fa-4x"></i>
                <h4 class="login-title">中德 DMS</h4>
            </div>


            <div class="col-sm-12">
                <form method="post" action="index.php" class="form-signin" style="z-index: 1;">		
					<div class="login-form">
						<!-- <div class="form-signin-heading" align="center"><?php echo $lang['login_title_h2']; ?>&nbsp;</div> -->
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
            </div>
        </div>


        <style type="text/css">
		.login-box {
		    width: 100%;
		    max-width: 350px;
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    padding: 0;
		    }
			.app-footer{
				position: fixed;
				bottom: 0;
				margin: 0;
			}
        </style>

<div class="app-footer">
  <div class="container">
    <!-- <hr /> -->
    <p class="text-muted">Powered by <a id="t" style="color: #BDC3C7;" href="http://github.com/dasuan">dasuan</a> &copy; <?php echo date("Y");?>, Copyleft. </p>
</div>
</div>




















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







