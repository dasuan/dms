<?php
//This is display page
require_once("auth.php"); // verify whether login
require_once("header.php"); //nav
require_once("db_connection.php");
require_once("functions.php"); //must under db
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






if (isset($_POST["date"])){
	$date=$_POST["date"];
	$table_name="routine";
	$sql="SELECT * FROM $table_name WHERE date='$date'";
	$result = $db->query($sql) or die($db->error);
	$num_rows=$result->num_rows;

	if($num_rows==0){
		echo "<div class='well'><div class='alert alert-danger' role='alert'><strong>".$date."</strong>的记录不存在！</div>";
		$this_page=$_SERVER['PHP_SELF'];
		//echo '<a href="#" id ="export" role="button" class="btn btn-default">导出表格</a>';
		echo '<a class="btn btn-default" href="'.$this_page.'">重新选择</a>';		
		echo '<a href="index.php"><button class="btn btn-default float_right">返回主面板</button></a>';
		echo '</div>';
	}else{



		$date=$_POST["date"];
//Panel start >>>>>>>>>>>>>>>>>>>>
		echo '
		<div class="panel panel-success">
			<div class="panel-heading"><strong class="text-danger">'.$date.'</strong>的记录如下：</div>
			<div class="panel-body" id="dvData">
			';//id="dvData" for export module
//Add contents start
			$table_name="routine";
			$sql="SELECT * FROM $table_name WHERE date='$date'";
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
	$filename=$date;
	require_once("export.php");
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
	$sql="SELECT * FROM $table_name WHERE id='$stu_id'";
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
echo '
<div class="panel panel-info">
	<div class="panel-heading">通过日期查询</div>
	<div class="panel-body">
		';
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."' name='date_form'>";
		require_once("date_form.php");
		echo '<div class="button_div"><button class="btn btn-default display_dorm_num_select_button" type="submit" name="date_submit">提交日期</button></div>';
		echo "</form>
	</div>
</div>";


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



//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Developer code>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//Below code must has to limit, because it can see the full table data
/*
echo "<h1>This is Display page!</h1>";
$this_page=$_SERVER['PHP_SELF'];
echo "<a href='".$this_page."?display_dorm'>display_dorm </a>";
echo "<a href='".$this_page."?display_students'>display_students </a>";
echo "<a href='".$this_page."?display_routine'>display_routine </a>";
echo "<a href='".$this_page."?display_routine_date'>display_routine_date </a>";
echo "<a href='".$this_page."?display_log'>display_log</a>";
if (isset($_GET["display_dorm"])) {
	table_get("dorm");
}
if (isset($_GET["display_students"])) {
	table_get("students");
}
if (isset($_GET["display_routine"])) {
	table_get("routine");
}
if (isset($_GET["display_routine_date"])) {
	table_get("routine_date");
}
if (isset($_GET["display_log"])) {
	table_get("log");
}
*/
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<Developer code<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

require_once("footer.php");
?>
