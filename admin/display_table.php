<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
require_once("functions.php"); //must under db
//site map
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
	else if (isset($_GET["display_routine_add"])) {
		echo '
		<li><a href="display.php">显示</a></li>
		<li class="active">情况单项记录</li>
		';
	}
	else if (isset($_GET["display_routine_list"])) {
		echo '
		<li><a href="display.php">显示</a></li>
		<li class="active">情况记录列表</li>
		';
	}
	else if (isset($_GET["display_log"])) {
		echo '
		<li><a href="display.php">显示</a></li>
		<li class="active">系统日志</li>
		';
	}
	else{
		echo '<li class="active">显示</li>';
	}
	echo '
</ol>';




echo "<h1>This is Display_table page!</h1>";
echo "<h1>此页面仅为底层数据查看</h1>";
$this_page=$_SERVER['PHP_SELF'];
echo "<a href='".$this_page."?display_dorm'>display_dorm </a>";
echo "<a href='".$this_page."?display_students'>display_students </a>";
echo "<a href='".$this_page."?display_routine_add'>display_routine_add </a>";
echo "<a href='".$this_page."?display_routine_list'>display_routine_list </a>";
echo "<a href='".$this_page."?display_log'>display_log</a>";
if (isset($_GET["display_dorm"])) {
	table_get("dorm");
	die();
}
if (isset($_GET["display_students"])) {
	table_get("students");
	die();
}
if (isset($_GET["display_routine_list"])) {
	table_get("routine_list");
	die();
}
if (isset($_GET["display_routine_add"])) {
	table_get("routine_add");
	die();
}
if (isset($_GET["display_log"])) {
	table_get("log");
	die();
}

?>