<?php

date_default_timezone_set('Asia/Shanghai');

// no session
/*
if(isset($_SESSION['user_level'])){
	$USER_LEVEL=$_SESSION['user_level'];
	$USER_LEVEL=$USER_LEVEL+0;
}else{
	echo "<h1>You have no level</h1>";
	die();
}

if(isset($_SESSION['user_role'])){
	$USER_ROLE=$_SESSION['user_role'];	
}else{
	echo "<h1>You have no role.</h1>";
	die();
}
*/


//need level
$level_display=3;
$level_add=3;
$level_del=2;
$level_import=1;
$level_log=3;
$level_userinfo=3;
$level_help=3;

session_start();

$git_hub = "This project was developing by kyshel-> https://github.com/kyshel/dms";
echo '
<script type="text/javascript">console.log("'.$git_hub.'")</script>     
';







?>
