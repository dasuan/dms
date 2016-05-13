<?php
//This is admin index page
require_once("auth.php");
require_once("header.php");
require_once("db_connection.php");

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
/*
echo '
<div class="left15">
	<div class="panel panel-default ">
	  <div class="panel-body ">
	  欢迎使用 QUST宿舍成绩管理系统 ！
	  </div>
	</div>
</div>
';
*/


/*>>>>>>>>>>>>>> warning & project >>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
// this is left cause let them pay attetion to this

//cal time develop takes
$this_year=date("Y");
$this_month=date("m");
$this_day=date("d");
$date1 = new DateTime("2016-03-07");
$date2 = new DateTime("$this_year-$this_month-$this_day");
$interval = $date1->diff($date2);
// echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
// // shows the total amount of days (not divided into years, months and days like above)
// echo "difference " . $interval->days . " days ";

echo '
<div class="col-sm-6 col-md-4 ">

	<div class="panel panel-default ">
	  <div class="panel-heading">使用说明</div>
	  <div class="panel-body ">	    
	    <h5 class="alert alert-danger">1.请使用<strong>Chrome</strong>或<strong>Firefox</strong>浏览器</h5>
	    <h5 class="alert alert-danger">2.或将浏览器切换到 <strong>极速模式:</strong><br><br>
		<img src="images/webkit.png" class="webkit_img" /></h5>

		<h5 class="alert alert-danger">3.请将浏览器窗口 <strong>最大化</strong></h5>
		<h5 class="alert alert-danger">4.完成操作后请及时点右上角 <strong>退出！</strong></h5>
	  </div>
	</div>

	<div class="panel panel-default ">
		<div class="panel-heading">Project</div>
		<div class="panel-body ">
			<p>
			系统版本：QUST 学生宿舍成绩管理系统 v0.1 <br>
			运行地点：中德科技学院 <br>
			项目起始：2016年3月 <br>
			开发总计：'.$interval->m.'个月'.$interval->d.'天，Developing <br>
			代码行数：后台8700行 ，前台2200行 <br>
			<hr style="margin-top: 0px; margin-bottom: 10px;">
			Contact Developer: </br>
			Tel 15864728220 </br>
			QQ   <a href="tencent://QQInterLive/?Cmd=2&amp;Uin=1069072177">1069072177</a> (Click to be friends) </br>
			Mail <a href="mailto:1069072177@qq.com?Subject=DMS_GET_HELP" target="_top">1069072177@qq.com</a> </br>
			Blog <a href="http://kyshel.com">kyshel.com</a> </br>
			</p>	  		
		</div>
	</div>

</div>
';





/*>>>>>>>>>>>>>> status >>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
$sql="SELECT * FROM routine_add ORDER BY routine_add_id DESC";
$result = $db->query($sql) or die($db->error);
$row = $result->fetch_array(MYSQLI_ASSOC);
$last_dorm_num_sum=$row['dorm_num_sum'];
$last_add_time=$row['add_time'];
$last_routine_add_action=$row['routine_add_action'];
$last_routine_date=$row['date'];
$last_add_floor=$row['add_floor'];
$last_add_user=$row['user_name'];
switch ($last_routine_add_action) {
	case 'add':
		$last_routine_add_action="增加";
		break;

	case 'update':
		$last_routine_add_action="修改";
		break;

	case 'del':
		$last_routine_add_action="删除";
		break;
	
	default:
		break;
}

$this_year=date("Y");
$this_month=date("m");
$this_day=date("d");
$weekarray=array("日","一","二","三","四","五","六");

echo '
<div class="col-sm-6 col-md-8 ">
	<div class="panel panel-success ">
		<div class="panel-heading">Status </div>
		<div class="panel-body bulletin">
			<div class="float_left">
			欢迎使用 QUST宿舍成绩管理系统 ！ <br>
			<hr style="margin-top: 10px; margin-bottom: 10px;">
			今天是'.$this_year.'年'.$this_month.'月'.$this_day.'日，星期'.$weekarray[date("w")].'<br>
			<hr style="margin-top: 10px; margin-bottom: 10px;">
			最后更新时间： '.$last_add_time.'<br>
			-----------日期： '.$last_routine_date.'<br>
			<!-- -----------用户： '.$last_add_user.'<br> -->
			-----------操作： '.$last_routine_add_action.'<br>
			-----------楼层： '.$last_add_floor.'<br>
			-----------宿舍：'.$last_dorm_num_sum.'

			
			</div>

';
//require_once("cal_embed.php");					
echo	'
		</div>
	</div>
</div>
';


/*>>>>>>>>>>>>>> bulletin >>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
echo '
<div class="col-sm-6 col-md-8 ">
	<div class="panel panel-success ">
		<div class="panel-heading">Bulletin <!--a class="float_r" href="dlog.php">>Details</a--></div>
		<div class="panel-body bulletin">
		<p>		
			2016-05-09 更改后台主页面样式 (增强用户体验)<br>
			2016-05-08 增加更新功能 (后勤处要求) <br>
			2016-05-07 再次更改录入界面结构,调整列顺序 (后勤处要求)<br>
			2016-05-02 录入界面五项基本成绩由默认20改为0(后勤处要求)<br>
			2016-05-01 查询界面字段居中(后勤处要求)<br>
			2016-04-30 更改录入界面结构,添加"学生处检查表"一列 (后勤处要求)

		</p>
		</div>
	</div>
</div>
';




/*>>>>>>>>>>>>>> data >>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
//dorm_cnt
$sql="SELECT COUNT(*) FROM dorm";
$result = $db->query($sql) or die($db->error);
$row = $result->fetch_array(MYSQLI_ASSOC);
$dorm_cnt=$row['COUNT(*)'];
//build_cnt
$sql="SELECT DISTINCT build_num FROM dorm WHERE region= '南' ";
$result = $db->query($sql) or die($db->error);
$build_cnt_s = $result->num_rows;
$sql="SELECT DISTINCT build_num FROM dorm WHERE region= '北' ";
$result = $db->query($sql) or die($db->error);
$build_cnt_n = $result->num_rows;  //type is int, checked
$build_cnt=$build_cnt_s+$build_cnt_n;
//record_cnt
$sql="SELECT COUNT(*) FROM routine_list";
$result = $db->query($sql) or die($db->error);
$row = $result->fetch_array(MYSQLI_ASSOC);
$record_cnt=$row['COUNT(*)'];
echo '
<div class="col-sm-6 col-md-8 ">
	<div class="panel panel-success ">
		<div class="panel-heading">Data </div>
		<div class="panel-body bulletin">
		<p>			
			宿舍数目：'.$dorm_cnt.'<br>
			楼栋数目：'.$build_cnt.'<br>
			数据来源：后勤处 <br>
			导入时间：2016-5-11 <br>
			<!-- 等待数据：宿舍所属学院，学生学号与宿舍分布 -->
			<hr style="margin-top: 0px; margin-bottom: 10px;">
			已记录条数：'.$record_cnt.'<br>			
		</p>
		</div>
	</div>
</div>
';



?>

<div id="dms_footer" role="contentinfo">
		<p id="footer-left" class="alignleft">
		<span id="footer-thankyou">DMS is developing by <a href="https://kyshel.com/">Kyshel</a></span>	</p>
	<p id="footer-upgrade" class="alignright">
		Version 0.1	</p>
	<div class="clear"></div>
</div>

<style>
#dms_footer {
    position: absolute;
    bottom: -50px;
    left: 0;
    right: 0;
    padding: 10px 20px;
    color: #555d66;
}
.alignleft{
	float: left;
}
.alignright{
	float: right;
}
</style>


