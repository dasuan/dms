<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
require_once("functions.php"); //must under db
check_permission(1);
//site map
/*
echo '
<ol class="breadcrumb">
	<li><a href="index.php">主页</a></li>
	<li class="active">开发日志</li>
</ol>
';
*/

echo '<iframe id="ha"src="http://211.87.148.243/t/dlog.html" width="100%"></iframe>';


echo "</div>";
echo "</div>";
?>

<script language="javascript">
	var ss;
	window.onload=function()
	{
		changeDiv(); 
	}
	window.onresize=function(){  
		changeDiv();  
	} 
	function changeDiv(){
		var w=document.documentElement.clientWidth ;//可见区域宽度
		var h=document.documentElement.clientHeight;//可见区域高度
		ss=document.getElementById('ha');
		//alert(w);
		//ss.style.width=w+"px";
		h=h-50;
		ss.style.height=h+"px";
	}
</script>