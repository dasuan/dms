<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
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
$table_name="users";
$sql="SELECT * FROM ".$table_name;
$result = $db->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
$user = $_SESSION['user_name'];
$mailbox = $row['user_email'];
echo "已登录用户：" . $user."<br />";
echo "邮箱：" . $mailbox;		
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<






?>

<?php
require_once("footer.php");
?>

