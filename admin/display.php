<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); 
require_once("db_connection.php");
require_once("functions.php");
//Display welcome message
echo '
<ol class="breadcrumb">
  <li><a href="index.php">主页</a></li>
';

if (isset($_GET["display_dorm"])) {
	echo '
	<li><a href="display.php">显示</a></li>
	<li class="active">宿舍</li>
	';
}
else if (isset($_GET["display_students"])) {
	echo '
	<li><a href="display.php">显示</a></li>
	<li class="active">学生</li>
	';
}
else if (isset($_GET["display_routine"])) {
	echo '
	<li><a href="display.php">显示</a></li>
	<li class="active">情况记录</li>
	';
}
else{
	echo '<li class="active">显示</li>';
}


echo '</ol>';



echo "<h1>This is Display page!</h1>";

$this_page=$_SERVER['PHP_SELF'];

echo "<a href='".$this_page."?display_dorm'>display_dorm </a>";
echo "<a href='".$this_page."?display_students'>display_students </a>";
echo "<a href='".$this_page."?display_routine'>display_routine </a>";
if (isset($_GET["display_dorm"])) {
	table_get("dorm");
}
if (isset($_GET["display_students"])) {
	table_get("students");
}
if (isset($_GET["display_routine"])) {
	table_get("routine");
}

require_once("footer.php"); 
?>

