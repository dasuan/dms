<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
check_permission(5);
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">用户信息</li>
</ol>
';
//Display welcome message
//echo "<h1>This is user page</h1> ";


//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-info">
			<div class="panel-heading">用户信息</div>
			<div class="panel-body" id="dvData">
			';//id="dvData" for export module
//Add contents start
$user_name=$_SESSION['user_name'];
$sql="SELECT * FROM users WHERE user_name = '".$user_name."'";
$result = $db->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$mailbox = $row['user_email'];
$user_role = $row['user_role'];
echo "已登录用户：" . $user_name."<br />";
echo "邮箱：" . $mailbox."<br />";	
echo "角色：" ;	
switch($user_role)
	{
		case 1:
		echo "超级管理员";
		break;

		case 2:
		echo "宿舍管理员";
		break;

		case 3:
		echo "学生辅导员";
		break;

		case 4:
		echo "学生管理员";
		break;

		default:
		die("你没有身份！");
	}


//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<






?>

<?php
require_once("footer.php");
?>
