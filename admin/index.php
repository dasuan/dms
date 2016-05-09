<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");

//css
echo '
<style>
.left15{
	padding-right: 15px;
    padding-left: 15px;
}
.webkit_img{
	width:100%;
}
.bulletin{
	
}
.float_r{
	float:right;
}
</style>

';

//welcome
echo '
<div class="left15">
	<div class="panel panel-default ">
	  <div class="panel-body ">
	  欢迎使用中德宿舍成绩录入系统！
	  </div>
	</div>
</div>

';



echo '
<div class="col-sm-6 col-md-4 ">
	<div class="panel panel-default ">
	  <div class="panel-heading">使用说明</div>
	  <div class="panel-body ">
	    
	    
	    <h5 class="alert alert-danger">1.请使用Chrome或Firefox浏览器,<br><br>或将浏览器切换到 <strong>极速模式:</strong><br><br>
		<img src="images/webkit.png" class="webkit_img" /></h5>
		<h5 class="alert alert-danger">2.请将浏览器窗口 <strong>最大化</strong></h5>
		<h5 class="alert alert-danger">3.完成操作后请及时点右上角 <strong>退出！</strong></h5>
	  </div>
	</div>
</div>
';


echo '
<div class="col-sm-6 col-md-8 ">
	<div class="panel panel-default ">
		<div class="panel-heading">开发日志 <a class="float_r" href="dlog.php">详细记录</a></div>
		<div class="panel-body bulletin">
		<p>
			2016-05-09 更改后台主页面样式 (增强用户体验)<br>
			2016-05-08 增加更新功能 (后勤处要求) <br>
			2016-05-07 再次更改录入界面结构 (后勤处要求)<br>
			2016-05-02 录入界面五项基本成绩由默认20改为0(后勤处要求)<br>
			2016-05-01 查询界面字段居中(后勤处要求)<br>
			2016-04-30 更改录入界面结构,添加"学生处检查表"一列 (后勤处要求)<br>
		</p>
		</div>
	</div>
</div>
';

echo '
<div class="col-sm-6 col-md-8">
	<div class="panel panel-default ">
	  <div class="panel-heading">概况</div>
	  <div class="panel-body ">
	  <p>
		  项目版本：中德宿舍成绩管理系统 v0.1 <br>
		  花费时长：3个月 </br>
		  代码行数：后台8700行 ，前台2200行 </br>
		  联系作者：手机 15864728220 </br>
		  -------------- QQ   <a href="tencent://QQInterLive/?Cmd=2&amp;Uin=1069072177">1069072177</a> (点击直接加好友) </br>
		  -------------- Blog <a href="http://kyshel.com">kyshel.com</a> </br>

	  </p>	  		
	  </div>
	</div>
</div>
';

// echo '
// <h2 class="alert alert-success">欢迎使用中德宿舍成绩录入系统！</h1> 
// <!-- <h1 class="alert alert-success">请在左侧列表选择要进行的操作~</h1> -->
// <h2 class="alert alert-danger">请使用Chrome或Firefox浏览器，或切换到 <strong>极速模式！</strong>
// <img src="images/webkit.png" /></h1>
// <h2 class="alert alert-danger">为获得最佳浏览效果，请将浏览器窗口<strong>最大化！</strong></h1>
// <h2 class="alert alert-danger">完成操作后请及时点右上角 <strong>退出！</strong></h1>
// ';







?>



