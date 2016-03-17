<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); 
require_once("db_connection.php");
require_once("functions.php");
//Display welcome message
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

?>
