<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
check_permission($level_display);
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
	else if (isset($_GET["display_routine"])) {
		echo '
		<li><a href="display.php">显示</a></li>
		<li class="active">情况记录</li>
		';
	}
	else{
		echo '<li class="active">显示</li>';
	}
	echo '
</ol>';

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Developer code>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//Below code must has to limit, because it can see the full table data
/*
echo "<h1>This is Display page!</h1>";
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
*/
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<Developer code<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



//This is input code         >>>>>>>>>>>>step2
if(isset($_POST["display_date_floor"])){

	$date=$_POST["date"];
	$region=$_POST["region"];
	$build_num=$_POST["build_num"];
	$part=$_POST["part"];
	$floor=$_POST["floor"];

	if ($region=="1") {
		$region="南";
	}elseif ($region=="2") {
		$region="北";
	}
	// else{
	// 	die("不住宿");
	// }

	//$sql_checkdate="SELECT * FROM routine_list where date = '" . $date ."'";
	$sql_check="SELECT * FROM dorm,routine_list WHERE routine_list.date='$date' and dorm.region = '$region' and dorm.build_num = '$build_num' and dorm.part = '$part' and dorm.floor = '$floor' and dorm.dorm_num=routine_list.dorm_num ";
	$result_of_check = $db->query($sql_check);

	if ($result_of_check->num_rows != 0) {
		//echo "result_checkdate is $result_of_date_check->num_rows <br />";

		echo '
		<div class="panel panel-success">
			<div class="panel-heading">日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录如下表所示：</div>
			<div class="panel-body" id="dvData">
				';

			//Add contents start
			$add_floor=$region."$build_num"."#"."$part"."区"."$floor"."层";
			$sql="SELECT * FROM routine_list where date = '" . $date ."' and add_floor = '".$add_floor."' " ;
			$result= $db->query($sql);
			if ($result->num_rows != 0) {
				echo "<table class='table table-bordered'>
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳台&卫生间</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>备注</th>
					<th>总分</th>			
				</tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";

						echo "<td>" .$row['date']."</td>" ;
						echo "<td>" .$row['dorm_num']."</td>" ;
						echo "<td>" .$row['wc_balcony']."</td>" ;
						echo "<td>" .$row['bed']."</td>" ;
						echo "<td>" .$row['desk_cupboard']."</td>" ;
						echo "<td>" .$row['ground']."</td>" ;
						echo "<td>" .$row['security']."</td>" ;
						echo "<td>" .$row['comments']."</td>" ;
						echo "<td>" .$row['score']."</td>" ;

					echo "</tr>";
				}
			}

				echo "</table>";
				$this_page=$_SERVER['PHP_SELF'];
				echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
				echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';
				//echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
				//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';

				//Add contents finish

				echo '
			</div>
		</div>';

		//table head ceiling>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			echo '
			<style>
			            .second{
			                width:77.5%;
			                height:37px;
			                border-color: rgb(198, 198, 198);
			                background-color: rgb(238, 238, 238);
			                background-image: -o-linear-gradient(to bottom, rgb(248, 248, 248) 0px, rgb(238, 238, 238) 100%);
			                background-image: linear-gradient(to bottom, rgb(248, 248, 248) 0px, rgb(238, 238, 238) 100%);
			                background-image: -webkit-gradient(linear, 0 0, 0 bottom, from(rgb(248, 248, 248)), to(rgb(238, 238, 238)));
			                
			            }
			            .pad_left_15{
			            	padding-left: 15px;
			            }           
			        </style>

			        <script type="text/javascript">
			            /**
			            * 网页加载完毕后，确定各div的位置
			            */
			            $(document).ready(function(){
			                floatdiv();
			            });
			            /**
			            * 网页滚动时，确定各div的位置
			            */
			            $(window).scroll(function(){
			                floatdiv();
			            });
			            /**
			            * div浮动函数
			            */
			            function floatdiv(){
			                var scrollTop = $(this).scrollTop();
			                /*查找class=second 的元素，调整css*/
			                if (scrollTop > 180) {
			                    $(".second").css({
			                        "position" : "fixed",
			                        "top"      : "50px",
			                        "left"     : "19.5%",
			                        "z-index"  : "999"
			                    });

			                } else {
			                    $(".second").css({
			                        "position" : "static"
			                        "display" : "none"
			                    });

			                }
			            }

			            window.onscroll = function() { 
						console.info(window.scrollY); 
						} 

			</script>

			<div class="second panel pad_left_15">
			<table class="table">
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳台&amp;卫生间</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>备注</th>
					<th>总分</th>			
				</tr>
				<tr style="visibility:hidden;"><td>2016-04-04</td><td>南10#601</td><td>20</td><td>20</td><td>20</td><td>20</td><td>20</td><td></td><td>100</td></tr>	
			</table>
			</div> 
			';
	//table head ceiling<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

	//include export js 
	$filename=$date;
	require_once("export.php");

	}

	else{

		echo '<div class="well">';
		echo '<div class="alert alert-danger" role="alert">
		日期为<strong>'.$date.'</strong> ，楼层为<strong>'.$region.$build_num.'#'.$part.'区'.$floor.'层</strong>的记录 <strong>不存在！</strong></div>';
		$this_page=$_SERVER['PHP_SELF'];
		echo '<a href="'.$this_page.'"><button class="btn btn-default">重新选择</button></a>';
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	
	}

die();

}elseif (isset($_POST["dorm_num"])) {

	$dorm_num=$_POST["dorm_num"];
	if($dorm_num=="none"){
		echo "<div class='well'><div class='alert alert-danger' role='alert'>未选择宿舍号！</div>";
		$this_page=$_SERVER['PHP_SELF'];
		//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
		echo '<a class="btn btn-default" href="'.$this_page.'">重新选择</a>';		
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	}else{
//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-success">
			<div class="panel-heading"><strong class="text-danger">'.$dorm_num.'</strong>宿舍的记录如下：</div>
			<div class="panel-body" id="dvData">
				';
//Add contents start
				$table_name="routine_list";
				$sql="SELECT * FROM $table_name WHERE dorm_num='$dorm_num'";
				$result = $db->query($sql) or die($db->error);
				echo "<table class='table table-bordered'>
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳台&卫生间</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>备注</th>
					<th>总分</th>
				</tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";

						echo "<td>" .$row['date']."</td>" ;
						echo "<td>" .$row['dorm_num']."</td>" ;
						echo "<td>" .$row['wc_balcony']."</td>" ;
						echo "<td>" .$row['bed']."</td>" ;
						echo "<td>" .$row['desk_cupboard']."</td>" ;
						echo "<td>" .$row['ground']."</td>" ;
						echo "<td>" .$row['security']."</td>" ;
						echo "<td>" .$row['comments']."</td>" ;
						echo "<td>" .$row['score']."</td>" ;


					echo "</tr>";
				}
				echo "</table>";
			
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';		
			//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
			echo "</form>";			
//Add contents finish

			echo '
		</div>
	</div>';
}

//include export js 
			$filename=$dorm_num;
			require_once("export.php");

//Panel end        <<<<<<<<<<<<<<<
	die();
}elseif (isset($_POST["stu_id"])) {
	$stu_id=$_POST["stu_id"];
	$table_name="students";
	$sql="SELECT * FROM $table_name WHERE stu_id='$stu_id'";
	$stu_info = $db->query($sql) or die($db->error);
	$num_rows=$stu_info->num_rows;

	if($num_rows==0){
		echo "<div class='well'><div class='alert alert-danger' role='alert'>学号为 <strong>".$stu_id."</strong> 的学生不存在！</div>";
		$this_page=$_SERVER['PHP_SELF'];
		//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
		echo '<a class="btn btn-default" href="'.$this_page.'">重新选择</a>';		
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	}else{
		$row = $stu_info->fetch_array(MYSQLI_ASSOC);
		$dorm_num=$row['dorm_num'];
		$bed_num=$row['bed_num'];
//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-success">
			<div class="panel-heading">学号为 <strong class="text-danger">'.$stu_id.'</strong> 的学生宿舍号为 <strong class="text-danger">'.$dorm_num.'</strong> ，床号为 <strong class="text-danger">'.$bed_num.'</strong> ，记录如下：</div>
			<div class="panel-body" id="dvData">
				';
//Add contents start
				$table_name="routine_list";
				$sql="SELECT * FROM $table_name WHERE dorm_num='$dorm_num'";
				$result = $db->query($sql) or die($db->error);
				echo "<table class='table table-bordered'>
				<tr>
					<th>检查日期</th>
					<th>宿舍号</th>
					<th>阳台&卫生间</th>
					<th>床铺</th>
					<th>桌柜</th>
					<th>地面</th>
					<th>安全</th>
					<th>备注</th>
					<th>总分</th>
				</tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";

						echo "<td>" .$row['date']."</td>" ;
						echo "<td>" .$row['dorm_num']."</td>" ;
						echo "<td>" .$row['wc_balcony']."</td>" ;
						echo "<td>" .$row['bed']."</td>" ;
						echo "<td>" .$row['desk_cupboard']."</td>" ;
						echo "<td>" .$row['ground']."</td>" ;
						echo "<td>" .$row['security']."</td>" ;
						echo "<td>" .$row['comments']."</td>" ;
						echo "<td>" .$row['score']."</td>" ;


					echo "</tr>";
				}
				echo "</table>";
			
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
			echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';		
			//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
			echo "</form>";			
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<


//include export js 
		$filename=$stu_id;
		require_once("export.php");
}
	die();
}elseif (isset($_POST["stu_name"])) {
	$stu_name=$_POST["stu_name"];
	$table_name="students";
	$sql="SELECT * FROM $table_name WHERE name='$stu_name'";
	$stu_info = $db->query($sql) or die($db->error);
	$num_rows=$stu_info->num_rows;

	if($num_rows==0){
		echo "<div class='well'><div class='alert alert-danger' role='alert'>学生 <strong>".$stu_name."</strong> 不存在！</div>";
		$this_page=$_SERVER['PHP_SELF'];
		//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
		echo '<a class="btn btn-default" href="'.$this_page.'">重新选择</a>';		
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	}else{
		$row = $stu_info->fetch_array(MYSQLI_ASSOC);
		$dorm_num=$row['dorm_num'];
		$bed_num=$row['bed_num'];
//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-success">
			<div class="panel-heading">学生 <strong class="text-danger">'.$stu_name.'</strong> 的宿舍号为 <strong class="text-danger">'.$dorm_num.'</strong> ，床号为 <strong class="text-danger">'.$bed_num.'</strong> ，记录如下：</div>
			<div class="panel-body" id="dvData">
				';
//Add contents start
				$table_name="routine";
				$sql="SELECT * FROM $table_name WHERE dorm_num='$dorm_num'";
				$result = $db->query($sql) or die($db->error);
				echo "<table class='table table-bordered'>
				<tr>
					<th>日期</th>
					<th>宿舍号</th>
					<th>备注</th>
					<th>成绩</th>
				</tr>";
				while($row = $result->fetch_array(MYSQLI_ASSOC)){
					echo "<tr>";
					foreach($row as $x=>$x_value) {
						echo "<td>" .$x_value."</td>" ;
					}
					echo "</tr>";
				}
				echo "</table>";
			
			$this_page=$_SERVER['PHP_SELF'];
			echo '<a href="#" id="export" role="button" class="btn btn-default">导出表格</a>';
			echo '<a class="btn btn-default float_right" href="'.$this_page.'">继续查询</a>';		
			//echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
			echo "</form>";			
//Add contents finish

			echo '
		</div>
	</div>';
//Panel end        <<<<<<<<<<<<<<<

	//include export js 
	$filename=$stu_name;
	require_once("export.php");
}
	die();
}

//choose date 
//This is choose date&condition code   >>>>>>>>>>>step1
//Panel start      >>>>>>>>>>>>>>>>>>>>
echo '
<div class="panel panel-info">
	<div class="panel-heading">通过日期与楼层查询</div>
	<div class="panel-body">
		';

//Add contents start
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
		require_once("date_form.php");
		echo '
		<select name="region" onchange="f_region(this.value)" id="region" class="form-control drop_list_add" required>
			<option value="" selected="selected">请选择地区</option> 
			<option value="1">南苑</option>
			<option value="2">北苑</option>
		</select>
		<select name="build_num" onchange="f_build_num(this.value)" id="build_num" class="form-control drop_list_add" required>
			<option value="" selected="selected">请选择楼号</option> 
		</select>
		<select name="part" onchange="f_part(this.value)" id="part" class="form-control drop_list_add" required>
			<option value="" selected="selected">请选择ab区</option> 
		</select>
		<select name="floor" onchange="" id="floor" class="form-control drop_list_add" required>
			<option value="" selected="selected">请选择楼层</option> 
		</select>
		<div class="button_div"><button class="btn btn-default btn_add" type="submit" name="display_date_floor" value="display_date_floor">提交</button></div>
		';
		echo "</form>";
		require_once("add_js.php");
//Add contents finish

		echo '
	</div>
</div>';
//Panel end    <<<<<<<<<<<<<<<<<<<<<<<<




//choose dorm_num
echo '
<div class="panel panel-info">
	<div class="panel-heading">通过宿舍号查询</div>
	<div class="panel-body">
		';
		//define a form to submit dorm_num
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='dorm_num'>";
		//define a select input
		echo '<select name="dorm_num" class= "form-control display_dorm_num_select">';
		echo '<option value="none" selected="selected">请选择宿舍号</option>';
		//connect to dorm table
		$sql="SELECT * FROM dorm";
		$result = $db->query($sql);
		//per row loop
		while($row = $result->fetch_array(MYSQLI_ASSOC)){	
			//per row's dormnum's value display option
			$row_dorm_num=$row['dorm_num'];
			echo "<option value='$row_dorm_num'>$row_dorm_num</option>";
		}
		echo '</select>';
		echo '<div class="button_div"><button class="btn btn-default" type="submit" name="login">提交宿舍号</button></div>';
		echo "</form>
	</div>
</div>";

//choose student id
echo '		
<div class="panel panel-info">
	<div class="panel-heading">通过学号查询</div>
	<div class="panel-body">
		';
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='stu_id'>";
		echo '<input id="stu_id" class="form-control display_input" type="text" name="stu_id" placeholder="请输入学号" required />';
		echo '<div class="button_div"><button class="btn btn-default" type="submit" name="stu_id_button">提交学号</button></div>';
		echo "</form>
	</div>
</div>";

//choose student name
echo '
<div class="panel panel-info">
	<div class="panel-heading">通过姓名查询</div>
	<div class="panel-body">
		';
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='stu_id'>";
		echo '<input id="stu_id" class="form-control display_input" type="text" name="stu_name" placeholder="请输入姓名" required />';
		echo '<div class="button_div"><button class="btn btn-default" type="submit" name="stu_name_btn">提交姓名</button></div>';
		echo "</form>";

		echo '
	</div>
</div>
';


?>


<?
require_once("footer.php");
?>
