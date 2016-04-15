<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php"); 
check_permission($level_import);
//Display welcome message
echo '
<ol class="breadcrumb">
  <li><a href="index.php">主页</a></li>
  <li class="active">导入</li>
</ol>
';

//echo "<h1>This is import page</h1> ";
echo "<h1>为确保安全，该功能已关闭！</h1> ";
die();

require_once("import_list.php");

require_once("footer.php");
?>
