<?php



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



/*need level*/
$level_index=3;
// operate
$level_display=3;
$level_add=3;
$level_del=2;
$level_update=2;

$level_import=1;
$level_log=3;
$level_userinfo=3;
$level_help=3;
$level_develop=1;
$level_stu_m=1;
//160601
$level_info=3;












?>