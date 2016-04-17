<?php
//This is add page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php");
check_permission($level_develop);
//site map
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">开发选项</li>
</ol>
';
//Display welcome message
//echo "<h1>This is user page</h1> ";


//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-info">
			<div class="panel-heading">开发选项</div>
			<div class="panel-body" id="dvData">
			';//id="dvData" for export module
//Add contents start
echo '<a href="display_table.php">Get all tables</a>';



//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<






?>

<?php
require_once("footer.php");
?>

