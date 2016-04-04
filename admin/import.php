<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");
require_once("functions.php"); 
check_permission(1);
//Display welcome message
echo '
<ol class="breadcrumb">
  <li><a href="index.php">主页</a></li>
  <li class="active">导入</li>
</ol>
';
echo "<h1>This is import page</h1> ";

require_once("import_list.php");

require_once("footer.php");
?>
