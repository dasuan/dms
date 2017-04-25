<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");

check_permission($level_info);


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
<div class="">
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
			已记录成绩条数：'.$record_cnt.'<br>			
		</p>
		</div>
	</div>
</div>
';


/*>>>>>>>>>>>>>> project >>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
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
<div class="">

	<div class="panel panel-default ">
		<div class="panel-heading">Project</div>
		<div class="panel-body ">
			<p>
			系统版本：QUST 宿舍养成管理系统 v0.1 <br>
			运行地点：中德科技学院 <br>
			项目起始：2016年3月 <br>
			运行时间：'.$interval->m.'个月'.$interval->d.'天，Developing <br>
			代码行数：后台8700行 ，前台2200行 <br>

			<hr style="margin-top: 0px; margin-bottom: 10px;">
			Contact Developer: </br>
			QQ   <a href="tencent://QQInterLive/?Cmd=2&amp;Uin=1069072177">1069072177</a> (Click to be friends) </br>
			Mail <a href="mailto:1069072177@qq.com?Subject=DMS_GET_HELP" target="_top">1069072177@qq.com</a> </br>
			Blog <a href="http://kyshel.com">kyshel.com</a> </br>
			</p>	  		
		</div>
	</div>



</div>
';



?>











