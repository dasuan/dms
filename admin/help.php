<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");

check_permission($level_help);


echo '
<div class="panel panel-success ">
	<div class="panel-heading">帮助 </div>
	<div class="panel-body bulletin">
	<p>
		有问题请联系: </br>
		  QQ   <a href="tencent://QQInterLive/?Cmd=2&amp;Uin=1069072177">1069072177</a> (Click to be friends) </br>
		  Mail <a href="mailto:1069072177@qq.com?Subject=DMS_GET_HELP" target="_top">1069072177@qq.com</a> </br>
		  Blog <a href="http://kyshel.com">kyshel.com</a> </br>
	</p>
	</div>
</div>

';




?>















<!-- <div style="position: fixed;bottom: 0;"> 
    <p class="text-muted"><a href="../">Front</a> &nbsp;&nbsp; Powered by <a href="http://github.com/dasuan">dasuan</a> &copy; <?php echo date("Y");?>, Copyleft. </p>
</div> -->
