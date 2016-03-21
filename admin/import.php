<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
//Display welcome message
echo "<h1>This is import page</h1> ";

echo "<a href='import_dorm.php'>import_dorm </a>";
echo "<a href='import_students.php'>import_students </a>";
echo "<a href='import_routine.php'>import_routine </a>";

require_once("footer.php");
?>
